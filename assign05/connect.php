<?php

function dbConnect() {

    $dbHost = '';
    $dbPort = '';
    $dbUsername = '';
    $dbPassword = '';
    $dbName = '';

    $onOpenShift = getenv('OPENSHIFT_MYSQL_DB_HOST');

    if ($onOpenShift == null || $onOpenShift == '') {
      // in our Local host enviornment 
      $dbHost = '127.0.0.1';
      // $dbPort = '8889';
      $dbPort = '3306';
      $dbUsername = 'root';
      $dbPassword = 'soccer66';
      $dbName = 'budget_program';

      //echo " DB host:$dbHost:$dbPort dbName:$dbName user:$dbUser";
      echo "hello";
    }
    else {

      //open shift environment
      $dbName = 'php';
      $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
      $dbPort = getenv('OPENSHIFT_MYSQL_DB_HOST');
      $dbUser = getenv('OPENSHIFT_MYSQL_DB_HOST');
      $dbPassword = getenv('OPENSHIFT_MYSQL_DB_HOST');
    }

    
    echo "hello";
    echo " DB host:$dbHost:$dbPort dbName:$dbName user:$dbUser";

    $db = new PDO("mysql:host=$dbHost:$dbPort;dbname=$dbName", $dbUser, $dbPassword);
        
    return $db;

}

?>