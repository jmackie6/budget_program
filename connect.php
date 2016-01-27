<?php

$dbHost = '';
$dbPort = '';
$dbUsername = '';
$dbPassword = '';
$dbName = 'php';

$dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
$dbPort = getenv('OPENSHIFT_MYSQL_DB_HOST');
$dbUser = getenv('OPENSHIFT_MYSQL_DB_HOST');
$dbPassword = getenv('OPENSHIFT_MYSQL_DB_HOST');

echo 'host:$dbHost:$dbPort dbName:$dbName user:$dbUser';

$db = new PDO("mysql:host=$dbHost:$dbPort;dbname=$dbName", $dbUser, $dbPassword);

?>