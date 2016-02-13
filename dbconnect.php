<?php
$server  = getenv('OPENSHIFT_MYSQL_DB_HOST');
$database = 'budget_program';
$username = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
$password = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');


// $connection = mysql_connect($server, $username, $password); //The Blank string is the password
// mysql_select_db($database);

if(!mysql_connect('$server', '$username', '$password')
{
     die('oops connection problem ! --> '.mysql_error());
}
if(!mysql_select_db("budget_program"))
{
     die('oops database selection problem ! --> '.mysql_error());
}
?>