<?php 
        session_start();

        if(isset($_SESSION['error']))
        $error="Неправильно введён логин или пароль!";
         else
        $error="";

    
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>Вход</title>
    <link rel="stylesheet" type="text/css" href="theaterStyle.css">
</head>
<body class="minibody">
    <header class="miniheader">
		<div class="general">
            <a href="index.php"><img src="images/logo.svg" id="logo"></a>	
		</div>
    </header>
    
    <div class="minipage">	
    <div class="minizagclassbackground"><div class="minizagclass minizaglog"></div></div>
        <form action="theatercodeLogin.php" method = "post">
            <div class="loginformpage">
            <label for="login">Логин:</label>
            <input type="text" name="usernamer" required><br>

            <label for="pass">Пароль:</label>
            <input type="password" name="passsword" required><br>
            
            <span><?=$error?></span>
            </div>
            <div class="logbuttons">
                <a href="theaterRegistration.php"><input type="button" value="Регистрация"></a>
                <input type="submit" value="Войти">
            </div>
        </form>
    </div>

    <footer class="minifooter">
      <hr>
      <a href="index.php"><input type="button" value="Вернуться на главную страницу" class="regback"></a>
	</footer>
    <?
    unset($_SESSION['error']);
    session_unset();
    ?>
</body>
</html>

