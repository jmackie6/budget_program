<?php


define('DB_HOST', getenv('OPENSHIFT_MYSQL_DB_HOST'));
define('DB_PORT', getenv('OPENSHIFT_MYSQL_DB_PORT'));
define('DB_USER', getenv('OPENSHIFT_MYSQL_DB_USERNAME'));
define('DB_PASS', getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
define('DB_NAME', getenv('OPENSHIFT_GEAR_NAME'));

$dbhost = constant("DB_HOST"); // Host name 
$dbport = constant("DB_PORT"); // Host port
$dbusername = constant("DB_USER"); // Mysql username 
$dbpassword = constant("DB_PASS"); // Mysql password 
$db_name = constant("DB_NAME"); // Database name 


$mysqlCon = mysqli_connect($dbhost, $dbusername, $dbpassword, "", $dbport) or die("Error: " . mysqli_error($mysqlCon));
mysqli_select_db($mysqlCon, $db_name) or die("Error: " . mysqli_error($mysqlCon));
?>

<?php
// define('DB_HOST', getenv('OPENSHIFT_MYSQL_DB_HOST'));
// define('DB_PORT',getenv('OPENSHIFT_MYSQL_DB_PORT')); 
// define('DB_USER',getenv('OPENSHIFT_MYSQL_DB_USERNAME'));
// define('DB_PASS',getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
// define('DB_NAME',getenv('OPENSHIFT_GEAR_NAME'));

// $dsn = 'mysql:dbname='.DB_NAME.';host='.DB_HOST.';port='.DB_PORT;
// $dbh = new PDO($dsn, DB_USER, DB_PASS);

// // ** MySQL settings - You can get this info from your web host ** //
// /** The name of the database */
// define('DB_NAME', $_ENV['OPENSHIFT_APP_NAME']);

// /** MySQL database username */
// define('DB_USER', $_ENV['OPENSHIFT_MYSQL_DB_USERNAME']);

// /** MySQL database password */
// define('DB_PASSWORD', $_ENV['OPENSHIFT_MYSQL_DB_PASSWORD']);

// /** MySQL hostname */
// define('DB_HOST', $_ENV['OPENSHIFT_MYSQL_DB_HOST'] . ':' . $_ENV['OPENSHIFT_MYSQL_DB_PORT']);

// $link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
// if (!$link) {
//     die('Could not connect: ' . mysql_error());
// }
// printf("MySQL server version: %s\n", mysql_get_server_info());
// ?>