<?php 
    session_start();
    
    if(!isset($_SESSION["login_user"]))
		die(header("Location: theaterLogIn.php"));
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Профиль: <?=$_SESSION["login_user"]?></title>
<?php
	require_once("php/functions.php");
    print(include_template("header.php"));
    
    $userdata = get_data_about_user($_SESSION["login_user"]);
    $userstickits = get_data_about_users_tickets($userdata["id"]);
?>
    
    <div class="profilepage">
    <div class="zagclassbackground"><div class="zagclass"></div></div>
        
        <div class="profileinfo">
            <?php if($userdata["image"]!=null):?>
            <img src="<?=$userdata["image"]?>">
            <?php else:?>
                <img src="images/placeforphoto.png">    
            <?php endif;?>
            <div>
                <p>Имя:
                <span><?=$userdata["name"]?></span></p>
                
                <p>Фамилия:
                <span><?=$userdata["sec_name"]?></span></p>

                <p>Почта:
                <span><?=$userdata["email"]?></span></p>

                <p>Телефон:
                <span><?=$userdata["phone"]?></span></p>
            </div>
        </div>
     
        <?php if($userstickits!=null):?>
       <div>
           <h2>Купленные билеты</h2>
           <div class="profiletickets">
                <?php foreach($userstickits as $value):?>
               <div><span>Дата: <?= date("m-d H:i:s",strtotime($value["date"]))?></span><span>Спектакль: <?=$value["name"]?></span><span>Код билета: #<?=$value["id"]?></span></div>
                <?php endforeach;?>
            </div>
       </div>
                <?php endif;?>
       <div class="profilechanger">
            <form action="theatercodeLogout.php">
                <input type="submit" value="Выйти">
            </form>
            <form action="theaterProfileChange.php" method="POST">
            <input type="text" name="usersprofch" value="<?=$_SESSION["login_user"]?>" hidden>
            <input type="submit" value="Редактировать">
            </form>
            
        </div>
    </div>

    <?php
    print(include_template("footer.php"));
    unset($userdata);
    unset($userstickits);
    ?>
