<?php

namespace Annex\TenantBundle\Account;

use Doctrine\Bundle\DoctrineBundle\ConnectionFactory;
use Doctrine\Common\EventManager;
use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\Driver\PDOException;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\Session;

class CustomConnectionFactory extends ConnectionFactory
{

    private $db;
    private $server;
    private $database;
    private $username;
    private $password;
    private $accountId;

    private $request;

    /** @var string Used to detect we are on the SSL main heroku domain */
    private $appUrl;

    /** @var string to redirect to signup when we have no tenant */
    private $appSignupUrl;

    /** @var string */
    private $env;

    /** @var string */
    private $testAccount;

    /** @var Session */
    private $session;

    /**
     * @param Session $session
     * @param RequestStack $request
     * @param $env
     * @param $tenantDb
     * @param $appUrl
     * @param $appSignupUrl
     */
    function __construct(Session $session, RequestStack $request, $env, $tenantDb, $appUrl, $appSignupUrl, $testAccount)
    {

        $this->session  = $session;

        // the name of the DB that holds the tenant table
        $this->database = $tenantDb;

        // The domain of the generic handler eg annex-notifier.herokuapp.com
        $this->appUrl = $appUrl;

        // www. for signups
        $this->appSignupUrl = $appSignupUrl;

        // Request for forcing the tenant core DB when unit testing
        $this->request = $request;

        $this->env = $env;

        $this->testAccount = $testAccount;

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
                $this->session->set('tenantCode', $account_code);

            } else if (isset($_SERVER['HTTP_HOST']) ) {

                // We're in production and can't find the account, redirect to signup page where we don't need an account
                header("Location: http://www.".$this->appSignupUrl."/signup?accountNotFound=".$account_code);
                die();

            } else {

                // Dev env, just die
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
                subscription,
                db_schema,
                brightpearl_account_code,
                brightpearl_data_centre,
                brightpearl_token
              FROM {$this->database}.tenant
              WHERE stub = '{$account_code}'
              OR brightpearl_account_code = '{$account_code}'
              LIMIT 1
              ") ){
                return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            } else {
                die("Could not get account information for {$account_code} on DB {$this->database}.");
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
        // Brightpearl webooks
        // Requests from Zendesk app
        if (isset($_GET['accountCode']) && $_GET['accountCode']) {
            return $_GET['accountCode'];
        }

        if ($this->request->getCurrentRequest() && $this->request->getCurrentRequest()->get('signup-test')) {
            // Signup form submit which must be to no tenant domain
            return false;
        }

        if ($this->request->getCurrentRequest() && $this->request->getCurrentRequest()->get('accountCode')) {
            // Launch a new account via functional tests (where no subdomain)
            return $this->request->getCurrentRequest()->get('accountCode');
        }

        // When receiving callbacks from Stripe or other services to the main domain handler
        if (isset($_SERVER['HTTP_HOST'])
            && $_SERVER['HTTP_HOST'] == $this->appUrl
            && $_SERVER['HTTP_HOST'] != 'localhost:8000') {
            // return false directs the connection to continue to core DB rather than tenant DB
            return false;
        }

        // Most requests when a user has already identified their account code
        if ($this->session->get('tenantCode')) {
            return $this->session->get('tenantCode');
        }

        // LEGACY
        // Get account from subdomain (will not return anything when called from command line)
        if (isset($_SERVER['HTTP_HOST'])) {
            $d = explode(".",$_SERVER['HTTP_HOST']);
            if ($d[0] == 'www') {
                // $this->database is already set to tenantDb
                return false;
            } else if ($d[0] == 'admin') {
                // $this->database is already set to tenantDb
                return false;
            }
            return $d[0];
        } else if ($u = getenv('RDS_URL')) {
            // We determine the tenant lower in code (eg queue message content)
            return false;
        } else if ($this->env == "test") {
            // Running unit tests
            return $this->testAccount;
        } else {
            // No account can be found (eg RabbitMQ consumer)
            // In this case the account to use is within the queue message
            return false;
        }

    }

}