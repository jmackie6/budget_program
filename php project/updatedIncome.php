<!DOCTYPE html>
<html lang = "en">
  <head>
       <meta charset = "utf-8" />
       <title></title>
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

session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
 header("Location: main.php");

}


$res=mysqli_query($mysqlCon, "SELECT * FROM user WHERE user_id=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res);

mysqli_select_db($mysqlCon, $db_name) or die("Error: " . mysqli_error($mysqlCon));
        



$income = mysqli_real_escape_string($mysqlCon, $_REQUEST['income']);     
$month = mysqli_real_escape_string($mysqlCon, $_REQUEST['month']);  
$tithing = mysqli_real_escape_string($mysqlCon, $_REQUEST['income']); 

$sql = "UPDATE income SET income = $income WHERE user_id = $userRow[user_id]"; 
$sql2 = "UPDATE tithing SET tithing = $tithing WHERE user_id = $userRow[user_id]"; 


if (mysqli_query($mysqlCon, $sql) === TRUE) {
    echo "<h2>You have updated you Income</h2>";
} else {
    echo "Error: " . $sql . "<br>";
}
if (mysqli_query($mysqlCon, $sql2) === TRUE) {
    echo "";
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
 
