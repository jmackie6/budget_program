<!DOCTYPE html>
<html lang = "en">
  <head>
       <meta charset = "utf-8" />
       <title>Jared Mackie's buisness page</title>
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
         h4.last
         {
               color: green;
               font-family: sans-serif;
         }
       
       </style>
  </head>
  <body>
     <div id="top">
       <p class="mainTitle">Welcome to BudgetHelper</P> 
       
        <h3 class="title">The best way to see where your money is going </h3>
     </div>
     <div id="sidebar" font-color="black">
       <p class="sidebar">
         
          
         <a  class="page2" href="http://www.dicetower.com/">The Dice Tower                           
         </a> <br><br>
         <a  class="page2" href="https://www.boardgamegeek.com/">Board Game Geek                           
         </a> 
       </P> 
       
     </div>
     <div id="menubar">
	  <ul id="menulist">
                                    
                     <li class="menuitem">Budget Program Features                            
             
            <a  class="page2" href="assign03page2.html">                        
                     <li class="menuitem">Add To Budget                            
            </a> 
            <a  class="page2" href="assign03page2.html">                        
                     <li class="menuitem">See Budget                            
            </a> 
            <a  class="page2" href="assign03page2.html">                        
                     <li class="menuitem">Add To Expenses                            
            </a> 
            <a  class="page2" href="assign03page2.html">                        
                     <li class="menuitem">See Expenses                            
            </a>
            <a  class="page2" href="assign03page2.html">                        
                     <li class="menuitem">Logout                            
            </a> 
            <a  class="page2" href="assign03page2.html"> 
                     <li class="menuitem">
                            
            </a> 
	      	
	  </ul>
                
    </div>
      <div id="main">
       <p class="main">Overview Of Your Budget</P> 
        
<?php


$connection = mysql_connect('localhost', 'root', 'soccer66'); //The Blank string is the password
mysql_select_db('budget_program');

$query = "SELECT * FROM expenses"; //You don't need a ; like you do in SQL
$result = mysql_query($query);

//echo "<table>"; // start a table tag in the HTML

while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
echo  "food: " . $row['food'] . "\n" . "rent: " .$row['rent'] . "\n" . "health insurance: " .$row['health_insurance'] . "\n" . "car insurance: " .$row['car_insurance'] . "\n" . "utilities: " .$row['utilities'] . "\n" . "other: " .$row['other'] . "\n";  //$row['index'] the index here is a field name
}

mysql_close(); //Make sure to close out the database connection
?>
        
       
     </div>
   
  </body>
</html>  
 

