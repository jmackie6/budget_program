<?php
/**
 * Created by PhpStorm.
 * User: Jared
 * Date: 1/23/2016
 * Time: 12:28 PM
 */

//$type = $_POST['type'];
//First Student
$game     = filter_input(INPUT_POST, 'name',     FILTER_SANITIZE_STRING);
$party    = filter_input(INPUT_POST, 'email',    FILTER_VALIDATE_EMAIL );
$card    = filter_input(INPUT_POST, 'major',    FILTER_SANITIZE_STRING);
$strategy  = filter_input(INPUT_POST, 'visited',  FILTER_SANITIZE_STRING);
$coop = filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_STRING);
$dice = filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_STRING);

$game=$_REQUEST['game'];
$party=$_REQUEST['party'];
$card=$_REQUEST['card'];
$strategy=$_REQUEST['strategy'];
$coop=$_REQUEST['coop'];
$dice=$_REQUEST['dice'];

// $game=$_POST['game'];
// $party=$_POST['party'];
// $card=$_POST['card'];
// $strategy=$_POST['strategy'];
// $coop=$_POST['coop'];
// $dice=$_POST['dice'];

// echo "<h1>$game</h1>\n";
// echo "$party\n";
// echo "$card\n";
// echo "$strategy\n";
// echo "$coop\n";
// echo "$dice\n";

// Organizing files for JSON
//$data = array("type" => $type , "fname" => $fname1 ,
//    "lname" => $lname1 , "id" => $id1 ,
//    "skill" => $skill , "instrument" => $instrument ,
//    "location" => $location , "room" => $room , "time" => $time);

$data = array("game" => $type, "party" => $party, "card" => $card, "strategy" => $strategy, "coop" => $coop, "dice" => $dice);
//if ($type == "Duet")
//    $duetData = array("type" => $type , "fname" => $fname2 ,
//        "lname" => $lname2 , "id" => $id2 , "skill" => $skill ,
//        "instrument" => $instrument , "location" => $location ,
//        "room" => $room , "time" => $time);
//
////open or read json data
$data_results = file_get_contents('survey.txt');
//echo "$data_results";
$tempArray = json_decode($data_results);
//echo "$tempArray";
foreach($tempArray->results as $item) 
      {
              echo '<tr>';
                  echo '<td>'.$item['game'].'</td>';
                  echo '<td>'.$item['party'].'</td>';
                  echo '<td>'.$item['card'].'</td>';
                  echo '<td>'.$item['strategy'].'</td>';
                  echo '<td>'.$item['coop'].'</td>';
                  echo '<td>'.$item['dice'].'</td>';
              echo '</tr>';
      }
// foreach($tempArray as $key => $value)
// {
//    echo $value['game'];
//    echo $value['party'];
//    // etc
// }
////append additional json to json file
//
$tempArray[] = $data;
//// Append if duet
//if ($type == "Duet")
//    $tempArray[] = $duetData;
////Write file after re-encoding
$jsonData = json_encode($tempArray);

file_put_contents('survey.txt', $jsonData);  
//echo "$jsonData";
?>