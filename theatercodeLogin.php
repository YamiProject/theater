<?php

    $logname = $_POST["usernamer"];
    $password = $_POST["passsword"];
    $auth = false;

    require("php/connectto.php");
    $link = mysqli_connect($lc , $pls, $pw, $datebase);
    if(!$link)
    die("Connection error!");

    $query = "SELECT user_login, user_password FROM th_user";
    $result = $link->query($query);

    if(!$result)
    die("Query error!");

    $rows = $result->num_rows;

    for ($i=0;$i<$rows;++$i)
    {
        $result->data_seek($i);
        $data = $result->fetch_array(MYSQLI_NUM);

        if($logname==$data[0] && $password==$data[1])
        {
        $auth=true;
        break;
        }
    }

    $link->close();

    if($auth==true)
    {
        session_start(['cookie_lifetime' => 86400]);

        $_SESSION['login_user']=$logname;
        $_SESSION['error']="false";
        header('Location: theaterProfile.php');
        
    }
    else
    {
        session_start();
        header('Location: theaterLogIn.php');
        $_SESSION['error']="true";
    }

    
?>