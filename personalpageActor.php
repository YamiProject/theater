<?php 
	session_start();
	require_once("php/functions.php");
	$id = $_POST["iddd"];
	$actor = get_data_about_actor($id);
	$name = $actor["name"];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?=$name?></title>
    
	<?php 
	
	print(include_template("header.php"));

	?>

<div class="personalactor">
	<h1><?=$name?></h1>	
	
		<div class="personalactorblock">
			
			<div class="actorimgblock">
				
			<img style="" src="<?=$actor["photo"]?>"><p><?=$actor["birth"]?></p></div>
			
			<div class="actortextblock"><p><?=$actor["info"]?></p></div>
			
		</div>
		<a href="theaterPeople.php" class="thpeoplebackbutton"><p>На страницу<br> людей театра</p></a>
		
	</div>
	<?php
	print(include_template("footer.php"));
	unset($actor);
	?>
