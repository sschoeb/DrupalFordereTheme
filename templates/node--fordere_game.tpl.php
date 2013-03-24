<div class="game_teams">

<div class="game_hometeam"><?php echo $hometeam -> getName(); ?><br />
<span class="game_teammembers"><?php echo $hometeam -> getPlayer1() -> name;?>, <?php echo $hometeam -> getPlayer2() -> name;?></span><br />
<img src="<?php echo $hometeam -> getPlayer1() -> getPlayerPhotoPath(); ?>" />
<img src="<?php echo $hometeam -> getPlayer2() -> getPlayerPhotoPath(); ?>"
	class="game_innerimage" /></div>
<div class="game_result"><?php echo $result; ?><br />
<!--<a class="game_actionlink" href="">Abmachen</a>--></div>
<div class="game_guestteam"><?php echo $guestteam -> getName(); ?>
<br /><span class="game_teammembers"><?php echo $guestteam -> getPlayer1() -> name;?>, <?php echo $guestteam -> getPlayer2() -> name;?></span><br />
<img src="<?php echo $guestteam -> getPlayer1() -> getPlayerPhotoPath(); ?>"
	class="game_innerimage" /> <img
	src="<?php echo $guestteam -> getPlayer2() -> getPlayerPhotoPath(); ?>" /></div>
<div style="clear: both;">
</div>
</div>
<br />
<h3>Spieldetails</h3>
<span class="game_details">
<?php 
switch($game -> state){
	case 1:
		?>
		Spiel wurde noch nicht geplant oder gespielt.
		<?php 
		break;
	case 2:
		?>
Geplantes Datum: <?php echo date ( 'Y.m.d H:i', $game -> playdate);?><br />
Eingetragen am: <?php echo date ( 'Y.m.d H:i', $game -> registerdate);?><br />
Lokal: <?php echo $game -> getLocation() -> name;?><br />
		<?php 
		break;
	case 3:
		?>
Gespielt am: <?php echo date ( 'Y.m.d H:i', $game -> playDate);?><br />
Eingetragen am: <?php echo date ( 'Y.m.d H:i', $game -> registerDate);?><br />
Lokal: <?php echo $game -> getLocation() -> name;?><br />
		<?php 
		break;
}

?>
</span>


<!--<?php print render($content['comments']); ?>-->