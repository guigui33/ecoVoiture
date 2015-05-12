

<?php include('entete_footer.php'); 
entete('home');
?>
<center>
<fieldset>
 <legend> Trouver le covoiturage qui correspond a vos attentes : </legend>
<form name="rechercher" action="rechercher.php" method="POST">
	<div id="entrerfavoris">
	<input class="bginput"  name="depart" id="depart" size="50" placeholder="Ville de depart" type="text" onchange="checkText(this.id)">
	<input class="bginput"  name="destination" id="destination" size="50"  placeholder="Ville de destination" type="text" onchange="checkText(this.id)">
	<input class="bginput"  name="date" id="date"  placeholder="Date du trajet" type="date" onchange="checkText(this.id)">
	<a style="font-size: 36px;" ><button class="btn btn-default" type="submit">Rechercher</button></a>
</div>
</form>
</fieldset>
<form action="proposer.php" method="post" >
<fieldset>
 <legend> Proposer un trajet : </legend>
<form name="rechercher" action="rechercher.php" method="POST">
	<div id="entrerfavoris">
	<input class="bginput"  name="depart" id="depart" size="50" placeholder="Ville de depart" type="text" onchange="checkText(this.id)">
	<input class="bginput"  name="destination" id="destination" size="50"  placeholder="Ville de destination" type="text" onchange="checkText(this.id)">
	<input class="bginput"  name="date" id="date"  placeholder="Date du trajet" type="date" onchange="checkText(this.id)">
	<a style="font-size: 36px;" ><button class="btn btn-default" type="submit">Proposer</button></a>
</div>
</form>
</fieldset>
<?php footer();
?>