<?php 
	session_start();

	$id = $_POST["iddd"];
	require_once("php/functions.php");
	$spectacle = get_data_about_spectacle($id);

	$name = $spectacle[0]["name"];
	$flag = false;
	foreach($spectacle as $value)
	if(strtotime($value["date"])>strtotime("today"))
	$flag = true;
	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Спектакль: <?=$name?></title>

	<?php 
	
	print(include_template("header.php"));
	
	?>

        <div class="personalspectaclepage">
			<div class="personalspectacleblock">
				<img src="<?=$spectacle[0]["image"]?>" alt="">
				<div>
				<h1><?=$spectacle[0]["name"]?></h1>
				<hr>
				<p class="personalspecttext"><?=$spectacle[0]["info"]?></p>
				</div>
			</div>
			
			<?php if($flag==false):?>
			<h3>Актуальных показов нет, приносим свои ивинения!</h3>
			<?php else:?>
			<h3>Список показов:</h3>
			<div class="personalspecticketblock">
			<?php 
			foreach($spectacle as $value):
			if(strtotime($value["date"])>strtotime("today")):
			?>
			<form action="pagebuyticket.php" method="POST">
			<?php if(isset($_SESSION["login_user"])):?>
			<a href="javascript:{}" onclick="this.parentNode.submit();">
			<input type="hidden" name="iddd" value="<?=$value["date"]?>">
			<input type="hidden" name="idddu" value="<?=$_SESSION["login_user"]?>">
			<?php else:?>
				<a href="theaterLogIn.php">
				
			<?php endif;?>
			<div>
				<p><?= date("d-m H:i:s",strtotime($value["date"]))?></p></div>
			</a>
			</form>
			<?php 
			
			endif;

		
			endforeach;
			endif;?>
			</div>
			<a href="theaterRepertoire.php" class="thpspecbackbutton"><p>На страницу спектаклей</p></a>
		</div>	
		

	<?php
	print(include_template("footer.php"));
	unset($spectacle);
	?>
