<?php 
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Новости</title>
<?php 
	require_once("php/functions.php");

	print(include_template("header.php"));
	$newslist = get_data_news();
?>

    <div class="news">
	<div class="zagclassbackground"><div class="zagclass"></div></div>
		
		<div class="newslist">
		<?php foreach($newslist as $value):?>
		<form action="personalpageNews.php" method="POST">
		
		<input type="hidden" value="<?=$value["id"]?>" name="iddd">
        <div class="newsblock">
		
			<img src="<?=$value["image"]?>" alt="">
			
		
			<caption><?=$value["date"]?></caption>
			<hr>
			<h3><?=$value["name"]?></h3>
            <hr>
                <div><?=$value["text"]?></div>
            
			<input type="submit" value="Подробнее...">
		</div>
		
		</form>
		<?php endforeach;?>	
		</div>
	<?php
	print(include_template("footer.php"));
	unset($newslist);
	?>
