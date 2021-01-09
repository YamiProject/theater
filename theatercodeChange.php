<?php
session_start();

    $name = trim($_POST["name"]);
    $secname = trim($_POST["secname"]);
    $phone = "+8".trim($_POST["number"]);
    if(isset($_POST["url"]))
    $image = trim($_POST["url"]);
    else
    $image = "";

    
    $proname = $_SESSION["login_user"];


    require("php/connectto.php");
    $link = mysqli_connect($lc , $pls, $pw, $datebase);
    if(!$link)
    die("Connection error!");

    $user = array();

    $query = "UPDATE th_user SET user_name='$name', user_sec_name='$secname', 
    user_contact='$phone', user_photo='$image'
    WHERE user_login='$proname'";

    $result = $link->query($query);

    if(!$result)
    die("Query error!");

    $link->close();

header("Location: theaterProfile.php");
?>