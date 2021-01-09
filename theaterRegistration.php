<?php
session_start();

$errorex="";
$errorex2="";

if(isset($_SESSION["logex"]))
$errorex = "Пользователь с таким логином уже существует";
if(isset($_SESSION["emex"]))
$errorex2 = "Пользователь с таким эмейлом уже существует";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Регистрация</title>
    <link rel="stylesheet" type="text/css" href="theaterStyle.css">
</head>
<body class="minibody">
    <header class="miniheader">
		<div class="general">
            <a href="index.php"><img src="images/logo.svg" id="logo"></a>
            <script src="js/theaterJS.js">document.myForm.reset();</script>	
        
		</div>
    </header>

    <div class="minipage">	
    <div class="minizagclassbackground"><div class="minizagclass minizagreg"></div></div>
          
        <form method="post" action="theatercodeRegistration.php">
            <div class="regform">
                    <div class="firstreg">
                    <label for="login">Логин:</label><br>
                    <input type="text" autocomplete="off" name="login" id="log" required onkeyup="reglogin(this); regcheck()"><span id="errorlg" class="error"><?=$errorex?></span><br>

                    <label for="email">E-mail</label><br>
                    <input type="email" autocomplete="off" name="email" id="em" required onkeyup="regemail(this); regcheck()"><span id="erorrem" class="error"><?=$errorex2?></span><br>

                    <label for="pass">Пароль</label><br>
                    <input type="password" autocomplete="off" name="passw1" id="pas1" required   onkeyup="regpasw(this); regcheck()" value=""><span class="error" id="erropas" ></span><br>
                   
                    <label for="passr">Повторите пароль</label><br>
                    <input type="password" autocomplete="off" name="passw2" id="pas2" required   onkeyup="regsecpasw(); regcheck()" disabled><span class="error" id="erropas2" ></span><br>
                    
                    
                    <label for="name">Имя:</label><br>
                    <input type="text" name="name" id="namer" autocomplete="off"  value="" required   onkeyup="regckeckname(this); regcheck()"><span class="error" id="erroname" ></span><br>
                    <label for="secname">Фамилия:</label><br>
                    <input type="text" name="secname" id="secnamer" autocomplete="off" value="" require   onkeyup="regckecksecname(this); regcheck()"><span class="error" id="erroseconname" ></span><br>
                    <label for="phone">Номер телефона:</label><br>
                    <label>+8 </label><input type="text" maxlength="10" name="number" autocomplete="off"  value="" id="numr" required onkeydown="regckeckphone(this)"   onkeyup="regckeckphone(this); regcheck()"><span class="error" id="errophone" ></span><br>
                    </div>
                </div>
                <span class="error" id="regeroors"></span>
                <div class="regbuttons" >   
                    <input type="submit" class="rebuttonnoactive" id="reg"  disabled value="Зарегистрироваться">
            </div>
        </form> 
            </div>     
            
    </div>

    <footer class="minifooter">
      <hr>
      <a href="index.php"><input type="button" value="Вернуться на главную страницу" class="regback"></a>
    </footer>
    <?session_unset()?>
</body>
</html>