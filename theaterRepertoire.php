<?php 
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Репертуар</title>
    
	<?php 
	require_once("php/functions.php");
	
	print(include_template("header.php"));

	$speclist = get_data_spectacles();
	?>

    <div class="repertoire">
	<div class="zagclassbackground"><div class="zagclass"></div></div>

		<?php foreach($speclist as $value):?>
		<form action="personalpageSpectacle.php" method="POST">
        <div class="sepactacleblock">
		
			<img class="repspecimg" src="<?=$value["image"]?>" alt="">
		
			<h2><?=$value["name"]?></h2>
			<hr>
			<p><?=$value["info"]?></p>
			<input type="hidden" name="iddd" value="<?=$value["id"]?>">
			<input type="submit" value="Подробнее...">
		</div>	

		</form>
		<?php endforeach?>
	<?php
	print(include_template("footer.php"));?>
