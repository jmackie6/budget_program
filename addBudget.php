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
        
        
$db_hostname = 'localhost';
$db_username = 'root';
$db_password = 'soccer66';
$db_database = 'budget_program';

// Database Connection String
$con = mysql_connect($db_hostname,$db_username,$db_password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

$con = mysql_connect($db_hostname,$db_username,$db_password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($db_database, $con);

session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
 header("Location: main.php");
}
$res=mysql_query("SELECT * FROM user WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);

mysql_select_db($db_database, $con);

        $b_food = mysql_real_escape_string($_REQUEST['b_food']);     
        $b_rent = mysql_real_escape_string($_REQUEST['b_rent']);  
        $b_health_insurance = mysql_real_escape_string($_REQUEST['b_health_insurance']);
        $b_car_insurance = mysql_real_escape_string($_REQUEST['b_car_insurance']);
        $b_utilities = mysql_real_escape_string($_REQUEST['b_utilities']);
        $b_other = mysql_real_escape_string($_REQUEST['b_other']);
        $month = mysql_real_escape_string($_REQUEST['month']);
        $sql = "INSERT INTO budget (user_id, b_food, b_rent, b_health_insurance, b_car_insurance, b_utilities, b_other, month)
VALUES ('$userRow[user_id]', '$b_food','$b_rent','$b_health_insurance','$b_car_insurance', '$b_utilities', '$b_other', '$month')";

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
 
