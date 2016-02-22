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
        


session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
 header("Location: main.php");
}

$res=mysqli_query($mysqlCon, "SELECT * FROM user WHERE user_id=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res);

mysqli_select_db($mysqlCon, $db_name) or die("Error: " . mysqli_error($mysqlCon));

        $food = mysqli_real_escape_string($mysqlCon, $_REQUEST['food']);     
        $rent = mysqli_real_escape_string($mysqlCon, $_REQUEST['rent']);  
        $health_insurance = mysqli_real_escape_string($mysqlCon, $_REQUEST['health_insurance']);
        $car_insurance = mysqli_real_escape_string($mysqlCon, $_REQUEST['car_insurance']);
        $utilities = mysqli_real_escape_string($mysqlCon, $_REQUEST['utilities']);
        $other = mysqli_real_escape_string($mysqlCon, $_REQUEST['other']);
        $month = mysqli_real_escape_string($mysqlCon, $_REQUEST['month']);
        $sql = "INSERT INTO expenses (user_id, food, rent, health_insurance, car_insurance, utilities, other, month)
VALUES ('$userRow[user_id]', '$food','$rent','$health_insurance','$car_insurance', '$utilities', '$other', '$month')";

if (mysqli_query($mysqlCon, $sql) === TRUE) {
    echo "<h2>You have added these expenses to ". $month . "</h2>";
    define('DB_HOST', getenv('OPENSHIFT_MYSQL_DB_HOST'));
define('DB_PORT',getenv('OPENSHIFT_MYSQL_DB_PORT')); 
define('DB_USER',getenv('OPENSHIFT_MYSQL_DB_USERNAME'));
define('DB_PASS',getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
define('DB_NAME',getenv('OPENSHIFT_GEAR_NAME'));

$dsn = 'mysql:dbname='.DB_NAME.';host='.DB_HOST.';port='.DB_PORT;
$dbh = new PDO($dsn, DB_USER, DB_PASS);

$result = $dbh->prepare("SELECT * FROM expenses WHERE user_id = $userRow[user_id] AND month = '$month'");
    $result->execute();

    while ($row = $result->fetch(PDO::FETCH_ASSOC))
    {
            echo '<br /><h3> Month: ' . $row['month'].'</h3>';
            echo '<br /> Food: ' . $row['food'];
            echo '<br /> rent: '. $row['rent'];  
            echo '<br /> Health Insurance: '.$row['health_insurance'];  
            echo '<br /> Car Insurance: '.$row['car_insurance']; 
            echo '<br /> Utilities: '. $row['utilities'];
            echo '<br /> other: '. $row['other'];
            
    }
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
 
