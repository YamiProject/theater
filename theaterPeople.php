<?php 
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Люди театра</title>

    <?php 
    require_once("php/functions.php");

	print(include_template("header.php"));
    $actorlist = get_data_actors();
    $producerlist = get_data_producers();?>
    
    <div class="thpeople">
        
        <section class="thpeopleactorssection">
        <div class="zagclassbackground"><div class="zagclass"></div></div>
            <div class="thpeoplelistofact">
            <?php foreach($actorlist as $value):?>
				<form action="personalpageActor.php" method="POST">
					<a href="javascript:{}" onclick="this.parentNode.submit();">
					<div class="personalactproblock" style="background-size: cover; background-repeat: no-repeat; background-image: url(<?=$value["photo"]?>);">
						<div class="insidelistofact">
                        <input type="hidden" name="iddd" value="<?=$value["id"]?>">
							<h3><?=$value["name"]?></h3>			
						</div>
					</div>
				</a>
                </form>
			<?php endforeach;?>
            </div>
        </section>

        <section class="thpeopleproducerssection">
        <div class="zagclassbackground"><div class="zagclass"></div></div>
            <div class="thpeoplelistofact">
            <?php foreach($producerlist as $valuee):?>
				<form action="personalpageProducer.php" method="POST">
					<a href="javascript:{}" onclick="this.parentNode.submit();">
					<div class="personalactproblock" style="background-size: cover; background-repeat: no-repeat; background-image: url(<?=$valuee["photo"]?>);">
						<div class="insidelistofact">
                        <input type="hidden" name="iddd" value="<?=$valuee["id"]?>">
							<h3><?=$valuee["name"]?></h3>			
						</div>
					</div>
				</a>
                </form>
			<?php endforeach;?>
            </div>
        </section>
    </div>

    <?php
    print(include_template("footer.php"));
    unset($actorlist);
    unset($producerlist);?>
