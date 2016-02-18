<!DOCTYPE html>
<html lang = "en">
  <head>
       <meta charset = "utf-8" />
       <title>Monthly Budget Helper</title>
       <link rel="stylesheet" type="text/css" href="home.css">
       <style>
         P.mainTitle 
         {
               color: white; 
               font-family:"times";     
               font-style:normal; 
               font-size:45pt;
         }         
         p.sideBar
         {
               font-family: courier;
               
         }
         p.main
         {
               font-size: 15px;
               
               
         }
         p.bottom
         {
               font-size: 30px;
               
         }
       
       </style>
  </head>
  <body>
     <div id="top">
       <p class="mainTitle">Updated Income For The Month</P> 
       
        
     </div>
     
      <div id="main">
       
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

session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
 header("Location: main.php");
}


$res=mysql_query("SELECT * FROM user WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);

mysqli_select_db($mysqlCon, $db_name) or die("Error: " . mysqli_error($mysqlCon));

        $food = mysql_real_escape_string($_REQUEST['food']);     
        $rent = mysql_real_escape_string($_REQUEST['rent']);  
        $health_insurance = mysql_real_escape_string($_REQUEST['health_insurance']);
        $car_insurance = mysql_real_escape_string($_REQUEST['car_insurance']);
        $utilities = mysql_real_escape_string($_REQUEST['utilities']);
        $other = mysql_real_escape_string($_REQUEST['other']);
        $month = mysql_real_escape_string($_REQUEST['month']);
        $sql = "INSERT INTO expenses (user_id, food, rent, health_insurance, car_insurance, utilities, other, month)
VALUES ('$userRow[user_id]', '$food','$rent','$health_insurance','$car_insurance', '$utilities', '$other', '$month')";

if (mysql_query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>";
}

?>
     </div>
   <ul id="menulist">
          <a  class="page2" href="home.php">                        
                     <li class="menuitem">Back To Homepage                           
            </a>
    </ul>
  </body>
</html>  
 
