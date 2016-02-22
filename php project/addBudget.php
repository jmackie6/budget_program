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
        $sql = "INSERT INTO budget (user_id, b_food, b_rent, b_health_insurance, b_car_insurance, b_utilities, b_other, month)       
VALUES ('$userRow[user_id]', '$b_food','$b_rent','$b_health_insurance','$b_car_insurance', '$b_utilities', '$b_other', '$month')";


if (mysqli_query($mysqlCon, $sql) === TRUE) {
    echo "New record created successfully";
} else {

    echo "Error: " . $sql . "<br>";
    
}

// if (mysqli_query($mysqlCon, $sql) == TRUE && mysqli_query($mysqlCon, $sql2) == TRUE) {
//     echo "Updated successfully";

//     mysqli_select_db($mysqlCon, $db_name) or die("Error: " . mysqli_error($mysqlCon)); 
        
//         $expense = "SELECT * FROM expenses WHERE user_id = $userRow[user_id] AND month = $month"; 
        
//         $r_query = mysql_query($mysqlCon, $expense); 
        
//         while ($row = mysql_fetch_array($r_query)){   
//           //echo '<br /> food: ' . $row['food'];  
//           //echo '<br /> rent: '. $row['rent'];  
//           //echo '<br /> email: '.$row['email'];   
//         }  
// } else {
//     echo "Error: " . $sql . "<br>";
// }

?>
     </div>
   <ul id="menulist">
          <a  class="page2" href="home.php">                        
                     <li class="menuitem">Back To Homepage                           
            </a>
    </ul>
  </body>
</html>  
 
