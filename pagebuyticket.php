<?php 
        session_start();
        
        require_once("php/functions.php");
        $date=$_POST["iddd"];
        $tickets = get_data_about_tickets($date);
      
        $places = transform_ticket_table($tickets);
        $exist=false;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>Покупка билетов</title>
    <link rel="stylesheet" type="text/css" href="theaterStyle.css">
    <script src="js/theaterJS.js"></script>
</head>
<body class="minibody">
    <header class="miniheader">
		<div class="general">
            <img src="images/logo.svg" id="logo">
		</div>
    </header>
    
    <div class="minipage">	
    <div class="minizagclassbackground"><div class="minizagclass minizagtick"></div></div>
            <div class="ticketseatinfo">
            <span>Спектакль: <?=$tickets[1]["name"]?></span><br> <span>Время: <?=date("m-d H:i:s",strtotime($date))?></span>
            </div>
            <div class="ticketposition">
            <div class="ticketfield">
                <?php for($i=1;$i<=8;$i++):?>
                    <div class="ticketrow">
                    <?php for($j=1;$j<=12;$j++):
                        if($places[$i][$j]!="No"):
                        $exist=true;
                        if($places[$i][$j]["price"]<=1000):
                            $color="green";
                        elseif ($places[$i][$j]["price"]>1000 && $places[$i][$j]["price"]<=4000):
                            $color="blue";
                        else:
                            $color="purple";
                        endif; 
                        ?>
                        <input type="button" class="activeticket" style="background-color:<?=$color?>; font-size:0pt" onclick="ticketchoise(this)" value="<?=$places[$i][$j]["row"].",".$places[$i][$j]["seat"].",".$places[$i][$j]["price"]?>">
                        <?php else:?>
                        <input type="button" disabled class="noactiveticket">
                        <?php
                    endif;
                    endfor;?>
                        <br>
                    </div>
                    <?php endfor;?>              
            </div>
                
    
            <div class="ticketspricevalue">
                <input type="button" disabled class="activeticket" style="background-color:green"><span>1000</span>
                <input type="button" disabled class="activeticket" style="background-color:blue"><span>до 4000</span>
                <input type="button" disabled class="activeticket" style="background-color:purple"><span>более 4000</span>
            </div>

        <div class="ticketout">
        <?php if($exist==true):?>
        <form class="miniform" action="theatercodeBuyTicket.php" method = "post">
        <input id="buy" type="hidden" name="buying" value="">
        <input type="hidden" name="userlogin" value="<?=$_SESSION["login_user"]?>">
        <input type="hidden" name="specdate" value="<?=$date?>">
        <span id="showprice"></span><span>=</span><span id="finalprice">0</span>
        <input id="buybotton" type="submit" value="Купить" class="ticketbuynoactive" disabled> 
        </div>
         
        <?php else:?>
            <span>Нет свободных мест!</span> 
        <?php endif;?>
        </form>
        </div>
    </div>

    <footer class="minifooter">
      <hr>
      <a href="index.php"><input type="button" value="Вернуться на главную страницу" class="regback"></a>
	</footer>
</body>
</html>

