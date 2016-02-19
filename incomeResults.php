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
       <p class="mainTitle">Income</P> 
       
        
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

    $term = mysqli_real_escape_string($mysqlCon, $_REQUEST['income']);   

        if ($term === "all")
        {
          $sql = "SELECT * FROM income WHERE user_id = $userRow[user_id]"; 
          // cursor = database.cursor()    
          // cursor.execute("SELECT user_id FROM round WHERE state == -1 AND state = 2")  
          // for round in cursor:
          // if round[0] != 5
          // do stuff
          if (mysqli_query($mysqlCon, $sql) === TRUE) {
            echo "New record created successfully";
            $r_query = mysqli_query($mysqlCon, $sql); 
        
            while ($row = mysqli_fetch_array($mysqlCon, $r_query)){   
              echo '<br /> Income: ' . $row['income'];  
          
            } 
          } else {
            echo "Error: " . $sql . "<br>";
          }
            // $r_query = mysqli_query($mysqlCon, $sql); 
        
            // while ($row = mysqli_fetch_array($mysqlCon, $r_query)){   
            //   echo '<br /> Income: ' . $row['income'];  
          
            // }  
        }
        else
        {

          $sql2 = "SELECT * FROM income WHERE user_id = $userRow[user_id] AND month = $term"; 
        
          if (mysqli_query($mysqlCon, $sql2) === TRUE) {
            echo "New record created successfully";
            $r2_query = mysqli_query($mysqlCon, $sql2); 
        
            while ($row = mysqli_fetch_array($mysqlCon, $r_query)){   
              echo '<br /> Income: ' . $row['income'];  
          
            }  
          } else {
            echo "Error: " . $sql2 . "<br>";
          }
          // $r_query = mysqli_query($mysqlCon, $sql1); 
          // while ($row = mysqli_fetch_array($mysqlCon, $r_query)){   
          //   echo '<br /> Income: ' . $row['income'];  
          // }  
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