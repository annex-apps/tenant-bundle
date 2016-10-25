<?php

namespace Annex\TenantBundle\Account;

use Doctrine\Bundle\DoctrineBundle\ConnectionFactory;
use Doctrine\Common\EventManager;
use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\Driver\PDOException;
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

    /**
     * @param Session $session
     */
    function __construct(Session $session)
    {

        $this->session  = $session;

        // the name of the DB that holds the tenant table
        $this->database = 'notifier_core';

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

                $account_name       = $result[0]['name'];

                // Switch to use the tenant DB
                $this->database     = $result[0]['db_schema'];
                $this->accountId    = $result[0]['id'];

                // Session information is used to set container parameters in TenantInformationExtension
                $this->session->set('account_id', $this->accountId);
                $this->session->set('account_code', $account_code);
                $this->session->set('account_name', $account_name);
                $this->session->set('account_owner_name', $result[0]['owner_name']);
                $this->session->set('account_owner_email', $result[0]['owner_email']);
                $this->session->set('account_status', $result[0]['status']);

                // Brightpearl data. Account code is usually the same as Annex account code but doesn't have to be
                $this->session->set('brightpearl_account_code', $result[0]['brightpearl_account_code']);
                $this->session->set('brightpearl_data_centre', $result[0]['brightpearl_data_centre']);
                $this->session->set('brightpearl_token', $result[0]['brightpearl_token']);

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
            //@todo escape account code
            if ( $stmt = $this->db->query("
              SELECT id,
                name,
                owner_name,
                owner_email,
                status,
                db_schema,
                brightpearl_account_code,
                brightpearl_data_centre,
                brightpearl_token
              FROM notifier_core.tenant
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
     * @return string
     */
    private function determineAccountCode()
    {

        if (isset($_GET['account']) && $_GET['account']) {
            // AJAX call to a common app domain from a user script
            return $_REQUEST['account'];
        }

        if (isset($_GET['state']) && $_GET['state']) {
            // We're coming back from Stripe.com oAuth into the HTTPS Heroku domain so we don't have a subdomain
            return $_REQUEST['state'];
        }

        // Comment out this section to test the signup process on dev
        // When you receive the activation email, un-comment this section and then click the link to activate
        if (getenv('SYMFONY_ENV') != 'prod') {
            return 'yosemite';
        }

        // Get account from subdomain
        if (isset($_SERVER['HTTP_HOST'])) {
            $d = explode(".",$_SERVER['HTTP_HOST']);
            if ($d[0] != 'localhost:8000') {
                return $d[0];
            }
        }

        return false;

    }

}