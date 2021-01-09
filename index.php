<?php 
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>(fake)Официальный сайт Московского театр "Баронесса"</title>
	<?php
		require_once("php/functions.php");
		
		print(include_template("header.php"));
		
		$speclist = get_data_spectacles();
		$actorlist = get_data_actors();
		$newslist = get_data_newsLIMIT();

		?>
	

	<div class="main">
		
		<div class="mainpinctures">
			<div class="mainpic1" style="background-image:url(images/sliderIMG/build.jpg)">
		
		</div>
			<div class="mainpic2" style="background-image:url(images/sliderIMG/scene.jpg)"></div>
			<div class="mainpic3" style="background-image:url(images/sliderIMG/intheater.jpg)"></div>
			<div class="mainpic4" style="background-image:url(images/sliderIMG/watchers.jpg)"></div>
			<div class="mainpic5" style="background-image:url(images/sliderIMG/bounty.jpg)"></div>
		</div>
		<div class="pointblock">
			<figure id="point1" class="pointsactive"></figure>
			<figure id="point2" class="pointsnoactive"></figure>
			<figure id="point3" class="pointsnoactive"></figure>
			<figure id="point4" class="pointsnoactive"></figure>
			<figure id="point5" class="pointsnoactive"></figure>
		</div>

		<div class="mainsections">
		<section class="mainspectacles">
		<div class="zagclassbackground"><div class="zagclass"></div></div>
			<div class="mainspectacleslist">
				
				<?php foreach($speclist as $value):?>
					<form action="personalpageSpectacle.php" method="POST">
					<a href="javascript:{}" onclick="this.parentNode.submit();">
					<div class="mainspectsection" style="background-size: contain; background-image: url(<?=$value["image"]?>);">
						<div class="mainspectblock"> 
							<input type="hidden" name="iddd" value="<?=$value["id"]?>">
							<h3><?=$value["name"]?></h3>
							<p ><?=$value["info"]?></p>			
						</div>
					</div>
				</a>
				</form>
				<?php endforeach;?>
			</div>
		</section>

		<section class="mainactors">
		<div class="zagclassbackground"><div class="zagclass"></div></div>

			<div class="mainactorslist">
			<?php foreach($actorlist as $value):?>
				<form action="personalpageActor.php" method="POST">
					<a href="javascript:{}" onclick="this.parentNode.submit();">
					<div class="mainactorssection" style="background-size: cover; background-repeat: no-repeat; background-image: url(<?=$value["photo"]?>);">
						<div class="mainactorsblock">
						<input type="hidden" name="iddd" value="<?=$value["id"]?>">
							<h3><?=$value["name"]?></h3>			
						</div>
					</div>
				</a>
				</form>
			<?php endforeach;?>
			</div>
		</section>

		<section class="mainnews">
			<div class="zagclassbackground"><div class="zagclass"></div></div>

			<div class="mainnewslist">
			<?php foreach($newslist as $value):?>
				<form action="personalpageNews.php" method="POST">
				
				<input type="hidden" name="iddd" value="<?=$value["id"]?>">
					<div class="mainnewsblock">
					<img src="<?=$value["image"]?>">
					<hr>
					<article>
						<p class="mainnesttextblock"><?=$value["text"]?>
						</p>
						<input type="submit" value="Подробнее" class="mainnewsbutton">
					</article>
				</div>
				
				</form>
			<?php endforeach;?>
			</div>
		</section>
		</div>
	</div>

	<?php print(include_template("footer.php"));
	unset($newslist);
	unset($actorlist);
	unset($speclist);
	?>

