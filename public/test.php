<?php 
namespace Test;

require(__DIR__.'/../vendor/autoload.php');

echo 'TEST2';

$configArray = array(
    'database' => array(
        'adapter' => 'pdo_mysql',
        'params'  => array(
            'host'     => 'db',
            'username' => 'test',
            'password' => 'test',
            'dbname'   => 'test'
        )
    )
);

$databaseConfig = $configArray['database'];
$dsn = "mysql:dbname={$databaseConfig['params']['dbname']};host={$databaseConfig['params']['host']}";
$user = $databaseConfig['params']['username'];
$password = $databaseConfig['params']['password'];

try {
    $dbh = new \PDO($dsn, $user, $password);
} catch (\PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
var_dump($dbh, $dsn, $user, $password);
exit;
 
// Create the object-oriented wrapper upon the configuration data
$dbConfig = new \Zend_Config($configArray);

$dbAdapter = \Zend_Db::factory($dbConfig->database->adapter, $dbConfig->database->params->toArray());
\Zend_Db_Table::setDefaultAdapter($dbAdapter);
$dbTable = new \Zend_Db_Table('product');
$select = $dbTable->select();
//$select->where('category_id=?', 123);
var_dump($select);

// $adapter = new \Zend_Paginator_Adapter_DbTableSelect($select);

// $paginator = new \Zend_Paginator($adapter);
// $paginator->setItemCountPerPage(10);
// $paginator->setCurrentPageNumber(1);
