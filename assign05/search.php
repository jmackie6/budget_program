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

mysql_select_db($db_database, $con);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search database</title>
<link rel="stylesheet" href="style.css" type="text/css" />

</head>
<body>
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="search" placeholder="search database" required /></td>
</tr>
<tr>
<td><button type="submit" name="search">Search</button></td>
</tr>
<tr>
<td><!-- <a href="main.php">Sign In Here</a> --></td>
</tr>
</table>
</form>
</div>
</center>
<!-- </body>
</html> -->
<!-- <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
<form action="" method="post">  
Search: <input type="text" name="term" /><br />  
<input type="submit" value="Submit" />  
</form>   -->
<?php
if (!empty($_REQUEST['search'])) {

$term = mysql_real_escape_string($_REQUEST['search']);     

$sql = "SELECT * FROM user WHERE Description LIKE '%".$term."%'"; 
$r_query = mysql_query($sql); 

while ($row = mysql_fetch_array($r_query)){  
echo 'Primary key id: ' .$row['user_id'];  
echo '<br /> username: ' .$row['username'];  
echo '<br /> password: '.$row['password'];  
echo '<br /> email: '.$row['email'];   
}  

}
?>
    </body>
</html>
<?php  

  //$search = $_POST["search"];

  //mysql_connect("localhost", "username", "password") OR die (mysql_error());
  //mysql_select_db ("budget_program") or die(mysql_error());

  //function test() {
	// $server  = 'localhost';
	// $database = 'budget_program';
	// $username = 'root';
	// $password = 'soccer66';
	// $dsn = 'mysql:host='.$server.';dbname='.$database;
	//$options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
	//mysql_select_db ("budget_program") //or die(mysql_error());

	//$g1db = new PDO($dsn, $username, $password);
	//	return $g1db;
	//}

//$test = test();

//global $test;
//$connection = mysql_connect('localhost', 'root', 'soccer66');
//mysql_select_db ("budget_program")
//$search = $_POST["search"];

  //$query = "SELECT * FROM `user` WHERE `username`='$search'";

  //$result = mysql_query($query) or die (mysql_error());

  //if($result) 
   //{    
     // while($row=mysql_fetch_row($result))   
       //{      
         // echo $row[0],$row[1],$row[2];   
       //}    
     //}
   //else
     //{ 
       //echo "No result";  
     //} ?>
<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search database</title>
<link rel="stylesheet" href="style.css" type="text/css" />

</head>
<body>
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="search" placeholder="search database" required /></td>
</tr>
<tr>
<td><button type="submit" name="search">Search</button></td>
</tr>
<tr>
<td><a href="main.php">Sign In Here</a></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html> -->
