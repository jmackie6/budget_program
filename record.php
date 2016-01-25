<html>
  <header>
    	<title>Jared's Survey</title>
    	<link rel="stylesheet" type="text/css" href="survey.css">
    	<script src="homePage.js"></script>
    	<script src="jquery-1.11.3.min.js"></script>
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    	</header>
  	<body><br>
  		<p class="title">Game Survey Results</p><hr>
    	<br>
<?php
    	
session_start();
   if (isset($_POST['submit'])) { 
  $_session['game'] = $_POST['game'];
  $_session['party'] = $_POST['party'];
  $_session['card'] = $_POST['card'];
  $_session['strategy'] = $_POST['strategy'];
  $_session['coop'] = $_POST['coop'];
  $_session['dice'] = $_POST['dice'];
  //session_start();
  header('Location: results.php'); 

  } 
  else
  {
      header('Location: results.php'); 
  }

$game     = filter_input(INPUT_POST, 'game',     FILTER_SANITIZE_STRING);
$party    = filter_input(INPUT_POST, 'party',    FILTER_VALIDATE_EMAIL );
$card    = filter_input(INPUT_POST, 'card',    FILTER_SANITIZE_STRING);
$strategy  = filter_input(INPUT_POST, 'strategy',  FILTER_SANITIZE_STRING);
$coop = filter_input(INPUT_POST, 'coop', FILTER_SANITIZE_STRING);
$dice = filter_input(INPUT_POST, 'dice', FILTER_SANITIZE_STRING);

$game=$_REQUEST['game'];
$party=$_REQUEST['party'];
$card=$_REQUEST['card'];
$strategy=$_REQUEST['strategy'];
$coop=$_REQUEST['coop'];
$dice=$_REQUEST['dice'];



echo "<h2>Votes</h2>";

$data = array("game" => $game, "party" => $party, "card" => $card, "strategy" => $strategy, "coop" => $coop, "dice" => $dice);


$data_results = file_get_contents('survey.txt');

$tempArray = json_decode($data_results);



foreach($tempArray as $item) 
      {
  		
                  echo $item->game. "<br> ";
                  echo $item->party . " <br> ";
                  echo $item->card . " <br> ";
                  echo $item->strategy . " <br> ";
                  echo $item->coop . " <br> ";
                  echo $item->dice . "<br>  ";
                  echo "<br><br>";
      }


$tempArray[] = $data;
// echo $tempArray."<br>";
$jsonData = json_encode($tempArray);

file_put_contents('survey.txt', $jsonData);  

echo "$game"."<br>"."  $party"."<br>". "  $card"."<br>". "  $strategy"."<br>". "  $coop"."<br>". "  $dice"."<br>";
//echo "<br>".$game. "<br>  "."  $party"." <br> ". "  $card"." <br> ". "  $strategy"."<br>  ". "  $coop"." <br> ". "  $dice"."<br>  ";
echo "<br>";

?>
		<a href= "survey.php" class="button"> 
            <p class="a">Go back To Question Page</p> 
		</a> 
		<br><br>

    <body>
<html>