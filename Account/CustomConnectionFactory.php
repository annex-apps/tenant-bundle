<?php

namespace Annex\TenantBundle\Account;

use Doctrine\Bundle\DoctrineBundle\ConnectionFactory;
use Doctrine\Common\EventManager;
use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\Driver\PDOException;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class CustomConnectionFactory extends ConnectionFactory
{

    private $db;
    private $server;
    private $database;
    private $username;
    private $password;
    private $accountId;

    /** @var string Used to detect we are on the SSL main heroku domain */
    private $appUrl;

    /**
     * @param Session $session
     * @param $tenantDb
     * @param $appUrl
     */
    function __construct(Session $session, $tenantDb, $appUrl)
    {

        $this->session  = $session;

        // the name of the DB that holds the tenant table
        $this->database = $tenantDb;

        // The domain of the generic handler eg annex-notifier.herokuapp.com
        $this->appUrl = $appUrl;

        if ($url = getenv('RDS_URL')) {
            // Production
            $dbparts = parse_url($url);
            $this->server   = $dbparts['host'];
            $this->username = $dbparts['user'];
            $this->password = $dbparts['pass'];
        } else if (getenv('DEV_DB_USER')) {
            // Dev
            $this->server   = '127.0.0.1';
            $this->username = getenv('DEV_DB_USER');
            $this->password = getenv('DEV_DB_PASS');
        }

        if (!$this->server || !$this->username || !$this->password) {
            throw new PDOException("Could not get DB account details.");
        }
    }

    /**
     * @param array $params
     * @param Configuration $config
     * @param EventManager $eventManager
     * @param array $mappingTypes
     * @return \Doctrine\DBAL\Connection
     */
    public function createConnection(array $params, Configuration $config = null, EventManager $eventManager = null, array $mappingTypes = array())
    {

        if ($account_code = $this->determineAccountCode()) {

            if ($result = $this->getAccountInformation($account_code)) {
                // Switch to use the tenant DB
                $this->database     = $result[0]['db_schema'];
                $this->accountId    = $result[0]['id'];
                $this->session->set('tenantId', $this->accountId);
            } else {
                die("Account {$account_code} not found.");
            }

        }

        $params['driver']   = 'pdo_mysql';
        $params['port']     = 3306;
        $params['host']     = $this->server;
        $params['user']     = $this->username;
        $params['password'] = $this->password;
        $params['dbname']   = $this->database;

        //continue with regular connection creation using new params
        return parent::createConnection($params, $config, $eventManager, $mappingTypes);

    }

    /**
     * @param $account_code
     * @return array
     */
    private function getAccountInformation($account_code)
    {
        try {
            $this->db = new \PDO(
                "mysql:host={$this->server};dbname={$this->database};charset=utf8mb4",
                $this->username,
                $this->password);
        } catch(PDOException $ex) {
            die("Couldn't connect to database {$this->database} with username {$this->username}.");
        }

        try {
            if ( $stmt = $this->db->query("
              SELECT
                id,
                name,
                owner_name,
                owner_email,
                status,
                plan,
                db_schema,
                brightpearl_account_code,
                brightpearl_data_centre,
                brightpearl_token
              FROM tenant
              WHERE stub = '{$account_code}'
              LIMIT 1
              ") ){
                return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            } else {
                die("Query failed for account {$account_code} on DB {$this->database}");
            }
        } catch(PDOException $ex) {
            die("Failed to run query");
        }
    }

    /**
     * @return bool|string
     */
    private function determineAccountCode()
    {
        // Launching a new account, clicking activation link in email
        if (isset($_GET['accountCode']) && $_GET['accountCode']) {
            return $_REQUEST['accountCode'];
        }

        // Comment out this section to test the signup process on dev
        // When you receive the activation email, un-comment this section and then click the link to activate
        if (getenv('SYMFONY_ENV') != 'prod') {
            return 'yosemite';
        }

        // When receiving callbacks from Stripe or other services to the main domain handler
        if (isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST'] == $this->appUrl) {
            // return false directs the connection to continue to core DB rather than tenant DB
            return false;
        }

        // Get account from subdomain (will not return anything when called from command line)
        if (isset($_SERVER['HTTP_HOST'])) {
            $d = explode(".",$_SERVER['HTTP_HOST']);
            // Allowing www as a special case lets us use the domain for signup and helper actions
            if ($d[0] != 'localhost:8000' && $d[0] != 'www') {
                return $d[0];
            }
        }

        return false;

    }

}