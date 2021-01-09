<?php
session_start();

require_once("php/functions.php");
$userdatachange = get_data_about_user($_SESSION["login_user"]);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Изменение данных профиля: <?=$_SESSION["login_user"]?></title>
    <link rel="stylesheet" type="text/css" href="theaterStyle.css">
    <script src="js/theaterJS.js"></script>
</head>
<body class="minibody">
    <header class="miniheader">
		<div class="general">
            <a href="index.php"><img src="images/logo.svg" id="logo"></a>	
		</div>
    </header>

    <div class="minipage">	
    <div class="minizagclassbackground minizagchangclasssize"><div class="minizagclass minizagchange"></div></div>
        <form action="theatercodeChange.php" method="POST">
                <div class="profilechangeform">
                    
                        <label for="name">Имя:</label><br>
                        <input type="text" name="name" onkeyup="ckeckname(this)" value="<?=$userdatachange["name"]?>" required><span class="error" id="erroname"></span><br>
                        <label for="secname">Фамилия:</label><br>
                        <input type="text" name="secname" onkeyup="ckecksecname(this)" value="<?=$userdatachange["sec_name"]?>" required><span class="error" id="errosecname"></span><br>
                        <label for="phone">Номер телефона:</label><br>
                        <label class="profchangetnumber" > +8 </label><input style="margin-left:5px" type="text" name="number" onkeydown="ckeckphone(this)" onkeyup="ckeckphone(this)" value="<?=substr($userdatachange["phone"],2)?>" maxlength="10" required><span class="error" id="errophone"></span><br> 
                        <label for="phone">URL ссылка на фото</label><br>
                        <input type="text" name="url" onkeyup="checkimg(this)" value="<?=$userdatachange["image"]?>" ><span class="error" id="erroimage"></span><br> 
                    
                </div>
              
            <div class="changeprofilebuttons">
                    <a href="theaterProfile.php" ><input type="button" class="profilechangeback" value="Назад"></a>
                    <input type="submit" id="acs" class="profilchangebuttonactive" value="Изменить">
            </div>
        </form> 
    </div>
    <footer class="minifooter">
      <hr>
      <a href="index.php"><input type="button" value="Вернуться на главную страницу" class="regback"></a>
	</footer>
    <?unset($userdatachange)?>
</body>
</html>

