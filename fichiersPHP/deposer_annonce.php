<?PHP
require_once("entete_footer.php");//inclus le fichier entete
entete('Proposer un trajet');
?>

<h2 style="background:blue"> Proposer un trajet </h2>

<form action="??" method="POST">
	<fieldset>
	<legend>Itin&eacute;raire</legend>
	Ville de d&eacute;part : <input type="text" name="ville_depart" required><br/>
	Ville d'arriv&eacute;e : <input type="text" name="ville_arrivee" required><br/>
	D&eacute;tours accept&eacute;s : <input type="checkbox" name="psswd" required><br/>
	</fieldset>
	
	<br/>
	
	<fieldset>
	<legend>Informations suppl&eacute;mentaires</legend>
	Date du trajet : <input type="date" name="date_trajet" required> <br/>
	Heure du d&eacute;part : 

				<select name="heure_depart" size="1">
					<option>00
					<option>01
					<option>02
					<option>03
					<option>04
					<option>05
					<option>06
					<option>07
					<option selected>08
					<option>09
					<option>10
					<option>11
					<option>12
					<option>13
					<option>14
					<option>15
					<option>16
					<option>17
					<option>18
					<option>19
					<option>20
					<option>21
					<option>22
					<option>23
				</select>H
				
				<select name="minutes_depart" size="1">
					<option>00
					<option>01
					<option>02
					<option>03
					<option>04
					<option>05
					<option>06
					<option>07
					<option>08
					<option>09
					<option>10
					<option>11
					<option>12
					<option>13
					<option>14
					<option>15
					<option>16
					<option>17
					<option>18
					<option>19
					<option>20
					<option>21
					<option>22
					<option>23
					<option>24
					<option>25
					<option>26
					<option>27
					<option>28
					<option>29
					<option selected>30
					<option>31
					<option>32
					<option>33
					<option>34
					<option>35
					<option>36
					<option>37
					<option>38
					<option>39
					<option>40
					<option>41
					<option>42
					<option>43
					<option>44
					<option>45
					<option>46
					<option>47
					<option>48
					<option>49
					<option>50
					<option>51
					<option>52
					<option>53
					<option>54
					<option>55
					<option>56
					<option>57
					<option>58
					<option>59
			</select>

 
 
 
<br/>
	Nombre de place (sans le conducteur) :
				<select name="nombre_places" size="1">
					<option>1
					<option>2
					<option>3
					<option selected>4
					<option>5
					<option>6
				</select><br/>
	Voiture utilis&eacute;e :
	
				<select name="voiture_utilisee" size="1">
					<option selected>faire les requetes
				</select><br/>
	Taille bagages :
	
				<select name="taille_bagages" size="1">
					<option> petit
					<option selected>moyen
					<option> grand
				</select><br/>
	Autres informations : <textarea name="infos_trajet" required></textarea>

	</fieldset>
	
	<input type="checkbox" name="validerCondGeneral" value="validerCondGeneral" required> En cochant cette case, je certifie &ecirc;tre &eacute;tudiant et j'accepte 
	<a href="condGeneralEcovoiture.php">les conditions g&eacute;nrales d'utilisation d'Ecovoiture</a> <br/><br/>
	<input type="submit" value="Proposer mon Voyage"></input>
</form>
<br/>






<?php footer(); ?>