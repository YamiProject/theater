<?php


require_once("php/functions.php");

$logname = $_POST["login"];
$email = $_POST["email"];
$password = $_POST["passw1"];
$name = $_POST["name"];
$secname = $_POST["secname"];
$number = $_POST["number"];

$check = users();

$us=false;
$em=false;


foreach($check as $value)
{
    if($value["login"]==$logname)
    $us=true;
    if($value["email"]==$email)
    $em=true;
}

if($us==false && $em==false)
{
    require("php/connectto.php");
    $link = mysqli_connect($lc , $pls, $pw, $datebase);
    if(!$link)
    die("Connection error!");

    $query =  "INSERT INTO th_user VALUE(null, '$logname', '$email','$password','$name','$secname','$number', null)";
    $result = $link->query($query);

    if(!$result)
    die("Query error!");

    session_start(['cookie_lifetime' => 86400]);
    $_SESSION['login_user']=$logname;
    header('Location: theaterProfile.php');
    
}
else
{
    session_start(['cookie_lifetime' => 30]);
    if($us==true)
    $_SESSION["logex"]=true;

    if($em==true)
    $_SESSION["emex"]=true;

    header('Location: theaterRegistration.php');

}
?>