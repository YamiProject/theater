<?php
session_start();

require_once("php/functions.php");
$tickets = $_POST["buying"];
$user = get_data_about_user($_POST["userlogin"]);
$date = $_POST["specdate"];


$array = explode(";", $tickets);
array_pop($array);
$array2 = array();

foreach($array as $x)
{
   
    $elemt = explode(",", $x);
   
    array_push($array2, array($elemt[0], $elemt[1]));
}

for($i=0;$i<count($array2);$i++)
ticket_buy($date, $array2[$i][0],$array2[$i][1],$user["id"]);

header("Location: pagebuyticketComplete.php");
?>