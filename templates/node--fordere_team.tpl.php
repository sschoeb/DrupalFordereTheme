

<h2>Infos</h2>
<div class="teamcontainer">
Heimlokal: <?php  echo $team -> getLocation() -> name;?> <br />
<div class="left">
<h3><?php echo $team -> getPlayer1() -> name;?></h3>

<img class="userphoto"
	src="<?php echo  $team -> getPlayer1() -> getPlayerPhotoPath();?>" /><br /><?php if(user_access('fordere player detail')){ ?>Telefon: <?php echo $team -> getPlayer1() -> getPhone();?><br />E-Mail: <?php echo $team -> getPlayer1() -> getContactEmail();?>
<?php }?></div>
<div class="right">
<h3><?php echo $team -> getPlayer2() -> name;?></h3>

<img class="userphoto"
	src="<?php echo $team -> getPlayer2() -> getPlayerPhotoPath();?>" /><?php if(user_access('fordere player detail')){?><br />Telefon: <?php echo $team -> getPlayer2() -> getPhone();?><br />E-Mail: <?php echo $team -> getPlayer2() -> getContactEmail();?>
<?php }?></div>
<div style="clear: both"></div>
</div>

<?php

if (isset ( $result ) && count ( $result ) > 0) {
	?>

<h2>Ergebnisse</h2>

<?php
	foreach ( $result as $champ ) {
		
		if (count ( $champ ['games'] ) == 0) {
			continue;
		}
		
		?><h3><?php echo $champ['name'];?></h3>
<table class="leaguetable">
	<tr>
		<th>Datum</th>
		<th>Lokal</th>
		<th>Gegner</th>
		<th>Resultat</th>
	</tr>
<?php
		
		foreach ( $champ ['games'] as $game ) {
			$gegner = $game->getGuestTeam ();
			$gameres = $game->getResult ();
			if ($game->getGuestTeam ()->id == $nid) {
				$gegner = $game->getHomeTeam ();
				$gameres = $game->getInvertedResult ();
			}
			
			?><tr>
			
			<?php
			
			if($game -> state < 3)
			{
				
				?>
				<td colspan="2">Noch nicht gespielt</td><td><a href="<?php echo url('node/' . $gegner -> id); ?>"><?php echo $gegner -> getName();?></a></td>
				<td><a href="<?php echo url('node/' . $game -> id); ?>">Offen</a></td>
		
				<?php
				continue; 
			}
			
			if ($game->isForfaitGame () ) {
				if ($game->isForfaitLoose ( $nid )) {
					
					?>
				<td colspan="2">Forfait-Niederlage</td>
		<td><a href="<?php echo url('node/' . $gegner -> id); ?>"><?php echo $gegner -> getName();?></a></td>
		<td>0:4</td>
				<?php
				} else {
					?>
				<td colspan="2">Forfait-Sieg</td>
		<td><a href="<?php echo url('node/' . $gegner -> id); ?>"><?php echo $gegner -> getName();?></a></td>
		<td>4:0</td>
				<?php
				}
			
			} else {
				?>
				<td><?php
				if (is_numeric ( $game->playDate )) {
					echo date ( 'd.m.y H:i', $game->playDate );
				}
				?></td>
		<td><?php echo $game -> getLocation() -> name; ?></td>
		<td><a href="<?php echo url('node/' . $gegner -> id); ?>"><?php echo $gegner -> getName();?></a></td>
		<td><a href="<?php echo url('node/' . $game -> id); ?>"><?php echo $gameres;?></a></td>
				
				<?php
			}
			
			?>
			
			</tr><?php
		}
		?></table><?php
	}
	?>
<?php
}

?>






