<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
 header("Location: main.php");
}
$res=mysqli_query($mysqlCon, "SELECT * FROM user WHERE user_id=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['username']; ?></title>
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="home.css">
       <style>
         P.mainTitle 
         {
               color: white; 
               font-family:"times";     
               font-style:normal; 
               font-size:30pt;
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
		<div id="header">
 		<div id="left">
    		<label>Monthly Budget Program</label>
    	</div>
    	<div id="right">
     	<div id="content">
          Hello-- <?php echo $userRow['username']; ?>&nbsp;<a class="sign" href="logout.php?logout">--Sign Out--</a>
        </div>
    	</div>
		</div>
        <div id="top">
       <p class="mainTitle">Start Budgeting Your Money</P> 
       
        <h3 class="title">This is the best way to see where your money is going each month </h3>
     </div>
     <div id="menubar">
      <ul id="menulist">

                    <li class="menuitem">Budget Program Features                            
            
            <a  class="page2" href="seeBudget.php">                        
                     <li class="menuitem">Budget                            
            </a> 
            <a  class="page2" href="userFormBudget.php">                        
                     <li class="menuitem">New Month Budget                            
            </a> 
            <a  class="page2" href="updateBudget.php">                        
                     <li class="menuitem">Update Budget                            
            </a>
            <a  class="page2" href="seeExpenses.php">                        
                     <li class="menuitem">Expenses                            
            </a>
            <a  class="page2" href="userFormExpenses.php">                        
                     <li class="menuitem">New Month Expenses                            
            </a>
            <a  class="page2" href="updateExpenses.php">                        
                     <li class="menuitem">Update Expenses                            
            </a>
            <a  class="page2" href="seeIncome.php">                        
                     <li class="menuitem">Income                            
            </a>
            <a  class="page2" href="userFormIncome.php">                        
                     <li class="menuitem">New Month Income                            
            </a>
            <a  class="page2" href="updateIncome.php">                        
                     <li class="menuitem">Update Income                            
            </a>
            <a  class="page2" href="tithing.php">                        
                     <li class="menuitem">Tithing                            
            </a> 
            <a  class="page2" href="search.php">                        
                     <li class="menuitem"> Search By Month                           
            </a>   
            <a  class="page2" href="overallResults.php">                        
                     <li class="menuitem">Notifications                          
            </a>                     
            
      </ul>
                
    </div>
      <div id="main">
       <?php
mysqli_select_db($mysqlCon, $db_name) or die("Error: " . mysqli_error($mysqlCon));
    
        
$sql1 = "SELECT * FROM expenses ORDER BY expenses_id DESC LIMIT 1 WHERE user_id = $userRow[user_id]"; 
        
$r_query = mysqli_query($mysqlCon, $sql1); 
        
while ($row = mysqli_fetch_array($r_query)){   
          echo '<br /> food: ' . $row['food'];  
          echo '<br /> rent: '. $row['rent'];  
          echo '<br /> Car Insurance: '.$row['car_insurance'];   
        }  

?>
        
     </div>
	</body>
</html>