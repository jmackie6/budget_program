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
    	
//  if (isset($_POST['submit'])) { 
// $_session['game'] = $_POST['game'];
// $_session['party'] = $_POST['party'];
// } 

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
//$data_results = $data;
// <table style="margin: auto">
//     		<colgroup>
//         		<col span="6" style="background-color:#A3BCC4">
       
//       		</colgroup>
//       		<tr>
//             	<th>game</th>
//              	<th>party</th>
//              	<th>card</th>
//              	<th>strategy</th>
//              	<th>coop</th>
//              	<th>dice</th>
//       		</tr>
// 		</table> -->
// 		<?php

// $tempArray1[] = $data;
// if (isset($data)) {
//     echo "$game". "  "."  $party"."  ". "  $card"."  ". "  $strategy"."  ". "  $coop"."  ". "  $dice"."  ";
//     echo "<br>";
// }
// else
// {
// 	echo "";
// }



// echo "<br>";
//                echo "<tr>";
//                   echo "<td>"."$game"."</td>" . "                ";
//                   echo "<td>"."$party"."</td>";
//                   echo "<td>"."$card"."</td>";
//                   echo "<td>"."$strategy"."</td>";
//                   echo "<td>"."$coop"."</td>";
//                   echo "<td>"."$dice"."</td>";
//               echo "</tr>". "<br>";
// $json = json_encode($tempArray1);

$data_results = file_get_contents('survey.txt');

$tempArray = json_decode($data_results);



// foreach($tempArray as $item) 
//       {
//   				  //echo "Votes: ";

//                   echo "<span>$item->game</span>";
//                   echo $item->party . "  ";
//                   echo $item->card . "  ";
//                   echo $item->strategy . "  ";
//                   echo $item->coop . "  ";
//                   echo $item->dice . "  ";
//                   echo "<br><br>";
//       }
// foreach($tempArray as $item) 
//       {
//       		echo "<br>";
//                echo "<tr>";
//                   echo "<td>".$item->game."</td>" . "                ";
//                   echo "<td>".$item->party."</td>";
//                   echo "<td>".$item->card."</td>";
//                   echo "<td>".$item->strategy."</td>";
//                   echo "<td>".$item->coop."</td>";
//                   echo "<td>".$item->dice."</td>";
//               echo "</tr>". "<br>";
//       }

$tempArray[] = $data;
// echo $tempArray."<br>";
$jsonData = json_encode($tempArray);

file_put_contents('survey.txt', $jsonData);  

//echo "$game"."<br>"."  $party"."<br>". "  $card"."<br>". "  $strategy"."<br>". "  $coop"."<br>". "  $dice"."<br>";
echo "<span>.".$game. "</span>". "  "."  $party"."  ". "  $card"."  ". "  $strategy"."  ". "  $coop"."  ". "  $dice"."  ";
echo "<br>";

foreach($tempArray as $item) 
      {
  				  
                  echo $item->game;
                  echo $item->party . "  ";
                  echo $item->card . "  ";
                  echo $item->strategy . "  ";
                  echo $item->coop . "  ";
                  echo $item->dice . "  ";
                  echo "<br>";
      }
?>
		<a href= "survey.html" class="button"> 
            <p class="a">Go back To Question Page</p> 
		</a> 
		<br><br>

    <body>
<html>