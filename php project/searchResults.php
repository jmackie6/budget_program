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
       <p class="mainTitle">Search Results</P> 
       
        
     </div>
     
      <div id="main">
       
      <?php    

session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
 header("Location: main.php");
}
$res=mysql_query($mysqlCon, "SELECT * FROM user WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);

mysqli_select_db($mysqlCon, $db_name) or die("Error: " . mysqli_error($mysqlCon));

define('DB_HOST', getenv('OPENSHIFT_MYSQL_DB_HOST'));
define('DB_PORT',getenv('OPENSHIFT_MYSQL_DB_PORT')); 
define('DB_USER',getenv('OPENSHIFT_MYSQL_DB_USERNAME'));
define('DB_PASS',getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
define('DB_NAME',getenv('OPENSHIFT_GEAR_NAME'));

$dsn = 'mysql:dbname='.DB_NAME.';host='.DB_HOST.';port='.DB_PORT;
$dbh = new PDO($dsn, DB_USER, DB_PASS);

$term = mysql_real_escape_string($mysqlCon, $_REQUEST['search']);    


        
$result = $dbh->prepare("SELECT * FROM income WHERE user_id = $userRow[user_id] AND month = '$term'");
$result->execute();

          echo '<br /><h3> Month: ' . $term.'</h3>';

          while ($row = $result->fetch(PDO::FETCH_ASSOC))
          {
            echo '<h4> Income </h4>';
            echo '<br /> Income: ' . $row['income'];
          }

// $result2 = $dbh->prepare("SELECT * FROM expeses WHERE user_id = $userRow[user_id] AND month = '$term'");
// $result2->execute();

//           while ($row2 = $result2->fetch(PDO::FETCH_ASSOC))
//           {
//             echo '<h4> Expenses </h4>';
//             echo '<br /> Food: ' . $row2['food'];
//             echo '<br /> rent: '. $row2['rent'];  
//             echo '<br /> Health Insurance: '.$row2['health_insurance'];  
//             echo '<br /> Car Insurance: '.$row2['car_insurance']; 
//             echo '<br /> Utilities: '. $row2['utilities'];
//             echo '<br /> other: '. $row2['other'];
//           }

// $result = $dbh->prepare("SELECT * FROM budget WHERE user_id = $userRow[user_id] AND month = '$term'");
// $result->execute();

//           while ($row = $result->fetch(PDO::FETCH_ASSOC))
//           {
//             echo '<h4> budget </h4>';
//             echo '<br /><h3> Month: ' . $row['month'].'</h3>';
//             echo '<br /> Food: ' . $row['b_food'];
//             echo '<br /> rent: '. $row['b_rent'];  
//             echo '<br /> Health Insurance: '.$row['b_health_insurance'];  
//             echo '<br /> Car Insurance: '.$row['b_car_insurance']; 
//             echo '<br /> Utilities: '. $row['b_utilities'];
//             echo '<br /> other: '. $row['b_other'];
//           }

      ?>
     </div>
   <ul id="menulist">
          <a  class="page2" href="home.php">                        
                     <li class="menuitem">Back To Homepage                           
            </a>
    </ul>
  </body>
</html>  
 
