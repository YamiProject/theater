<?php 
	session_start();

	require_once("php/functions.php");
	$id = $_POST["iddd"];
	$producer = get_data_about_producer($id);
	$name = $producer["name"];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?=$name?></title>

	<?php 
	

	print(include_template("header.php"));
   
	
	?>

	<div class="personalproducer">
		<h1><?=$name?></h1>	
			<div class="personalproducerblock">
				<div class="producerimgblock"><img src="<?=$producer["photo"]?>"><hr><p><?=$producer["birth"]?></p></div>
				<div class="producertextblock"><p><?=$producer["info"]?></p></div>

			</div>
			<a href="theaterPeople.php" class="thpeoplebackbutton"><p>На страницу<br> людей театра</p></a>
	</div>

	<?php
	print(include_template("footer.php"));
	unset($producer);
	?>
