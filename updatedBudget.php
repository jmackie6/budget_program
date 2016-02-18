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
       <p class="mainTitle"></P> 
       
        
     </div>
     
      <div id="main">
       
<?php
        
// define('DB_HOST', getenv('OPENSHIFT_MYSQL_DB_HOST'));
// define('DB_PORT', getenv('OPENSHIFT_MYSQL_DB_PORT'));
// define('DB_USER', getenv('OPENSHIFT_MYSQL_DB_USERNAME'));
// define('DB_PASS', getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
// define('DB_NAME', getenv('OPENSHIFT_GEAR_NAME'));

// $dbhost = constant("DB_HOST"); // Host name 
// $dbport = constant("DB_PORT"); // Host port
// $dbusername = constant("DB_USER"); // Mysql username 
// $dbpassword = constant("DB_PASS"); // Mysql password 
// $db_name = constant("DB_NAME"); // Database name 

// $mysqlCon = mysqli_connect($dbhost, $dbusername, $dbpassword, "", $dbport) or die("Error: " . mysqli_error($mysqlCon));
// mysqli_select_db($mysqlCon, $db_name) or die("Error: " . mysqli_error($mysqlCon));

session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
 header("Location: main.php");
}
$res=mysqli_query($mysqlCon, "SELECT * FROM user WHERE user_id=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res);

mysqli_select_db($mysqlCon, $db_name) or die("Error: " . mysqli_error($mysqlCon));


        $b_food = mysqli_real_escape_string($mysqlCon, $_REQUEST['b_food']);     
        $b_rent = mysqli_real_escape_string($mysqlCon, $_REQUEST['b_rent']);  
        $b_health_insurance = mysqli_real_escape_string($mysqlCon, $_REQUEST['b_health_insurance']);
        $b_car_insurance = mysqli_real_escape_string($mysqlCon, $_REQUEST['b_car_insurance']);
        $b_utilities = mysqli_real_escape_string($mysqlCon, $_REQUEST['b_utilities']);
        $b_other = mysqli_real_escape_string($mysqlCon, $_REQUEST['b_other']);
        $month = mysqli_real_escape_string($mysqlCon, $_REQUEST['month']);

        $sql = "UPDATE budget SET  b_food = $b_food WHERE user_id = $userRow[user_id]";
        $sql2 = "UPDATE budget SET  b_rent = $b_rent WHERE user_id = $userRow[user_id]";
        $sql3 = "UPDATE budget SET  b_health_insurance = $b_health_insurance WHERE user_id = $userRow[user_id]";
        $sql4 = "UPDATE budget SET  b_car_insurance = $b_car_insurance WHERE user_id = $userRow[user_id]";
        $sql5 = "UPDATE budget SET  b_utilities = $b_utilities WHERE user_id = $userRow[user_id]";
        $sql6 = "UPDATE budget SET  b_other = $b_other WHERE user_id = $userRow[user_id]";
        $sql7 = "UPDATE budget SET  month = $month WHERE user_id = $userRow[user_id]";
        
if (mysqli_query($mysqlCon, $sql) === TRUE) {
    echo "Updated successfully";
} else {
    echo "Error: " . $sql . "<br>";
}
if (mysqli_query($mysqlCon, $sql2) === TRUE) {
    echo "Updated successfully";
} else {
    echo "Error: " . $sql . "<br>";
}
if (mysqli_query($mysqlCon, $sql3) === TRUE) {
    echo "Updated successfully";
} else {
    echo "Error: " . $sql . "<br>";
}
if (mysqli_query($mysqlCon, $sql4) === TRUE) {
    echo "Updated successfully";
} else {
    echo "Error: " . $sql . "<br>";
}
if (mysqli_query($mysqlCon, $sql5) === TRUE) {
    echo "Updated successfully";
} else {
    echo "Error: " . $sql . "<br>";
}
if (mysqli_query($mysqlCon, $sql6) === TRUE) {
    echo "Updated successfully";
} else {
    echo "Error: " . $sql . "<br>";
}
if (mysqli_query($mysqlCon, $sql7) === TRUE) {
    echo "Updated successfully";
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
 
