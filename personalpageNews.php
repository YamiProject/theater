<?php 
	session_start();
	require_once("php/functions.php");
	$id = $_POST["iddd"];
	$news = get_data_about_news($id);
	$name = $news["name"];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?=$name?></title>

	<?php 

	print(include_template("header.php"));
  
	?>

	<div class="personalnews">
		
			<div class="personalnewsblock">

				<div class="personalnewshead"><img src="<?=$news["image"]?>"><h1><?=$name?></h1> <caption>Дата: [<?=$news["date"]?>]</caption>	</div>
				<div class="personalnewstext"><p><?=$news["text"]?></p></div>

			</div>
			<a href="theaterNews.php" class="thpnewsbackbutton"><p>На страницу новостей</p></a>
		</div>

	<?php
	print(include_template("footer.php"));
	unset($news);
	?>