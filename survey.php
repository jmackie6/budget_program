<html>
  <header>
    	<title>Jared's Survey</title>
    	<link rel="stylesheet" type="text/css" href="survey.css">
    	<script src="homePage.js"></script>
    	<script src="jquery-1.11.3.min.js"></script>
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    	</header>
  	<body><br>
  		<p class="title">Game Survey Results</p>
    	<br>
    	<table>
      		<tr>
            	<th>game</th>
             	<th>party</th>
             	<th>card</th>
             	<th>strategy</th>
             	<th>coop</th>
             	<th>dice</th>
      		</tr>
		</table>
<?php
/**
 * Created by PhpStorm.
 * User: Jared
 * Date: 1/23/2016
 * Time: 12:28 PM
 */


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




$data = array("game" => $game, "party" => $party, "card" => $card, "strategy" => $strategy, "coop" => $coop, "dice" => $dice);


$data_results = file_get_contents('survey.txt');
//echo "$data_results";
$tempArray = json_decode($data_results);
//echo "$tempArray";
foreach($tempArray as $item) 
      {

              echo '<tr>';
                  echo '<td>'.$item->game.'</td>';
                  echo '<td>'.$item->party.'</td>';
                  echo '<td>'.$item->card.'</td>';
                  echo '<td>'.$item->strategy.'</td>';
                  echo '<td>'.$item->coop.'</td>';
                  echo '<td>'.$item->dice.'</td>';
              echo '</tr>';
      }

$tempArray[] = $data;

$jsonData = json_encode($tempArray);

file_put_contents('survey.txt', $jsonData);  
// foreach($tempArray as $key => $value)
// {
//    echo $value['game'];
//    echo $value['party'];
//    // etc
// }


// $jsonData = json_encode($tempArray);

// file_put_contents('survey.txt', $jsonData);  
//echo "$jsonData";
?>
<br><br>

    <body>
<html>