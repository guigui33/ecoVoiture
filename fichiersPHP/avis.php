

<?php 
//include('header.php');
include('entete_footer.php'); 
entete('avis');
?>
<center>
<legend> Donner un avis :  </legend>

<?php
/*try
{
$mydb = mysqli_connect('localhost','root','','ecoVoiture');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
*/
?>
<form method="post" action="traitement.php">
 
    <label for="utilisateur">Quel utilisateur voulez vous noter ? :</label><br />
    <select name="utilisateur" id="utilisateur">
 
<?php
 /*
$reponse = mysqli_query ($mydb,'SELECT Login FROM utilisateurs');
 
while ($donnees = mysqli_fetch_assoc($reponse))
{

		echo '<option value="'.$donnees[0].'">'.$donnees['Login'];
		echo '</option>'."\n";
}
*/
?> 
</select>
    <p>
       <label for="commentaire">
	   Commentaire:
       </label>
       <br />
       <textarea name="commentaire" id="commentaire" rows="10" onFocus="javascript:this.value=''"  >
Poster un commentaire sur l'utilisateur (500 caracteres max)	
       </textarea>       
   </p>
   <p> Note : </p>
   <ul class="notes-echelle">
	<li>
		<label for="note01" title="Note&nbsp;: 1 sur 5">1</label>
		<input type="radio" name="notesA" id="1" value="1" />
	</li>
	<li>
		<label for="note02" title="Note&nbsp;: 2 sur 5">2</label>
		<input type="radio" name="notesA" id="2" value="2" />
	</li>
	<li>
		<label for="note03" title="Note&nbsp;: 3 sur 5">3</label>
		<input type="radio" name="notesA" id="3" value="3" />
	</li>
	<li>
		<label for="note04" title="Note&nbsp;: 4 sur 5">4</label>
		<input type="radio" name="notesA" id="4" value="4" />
	</li>
	<li>
		<label for="note05" title="Note&nbsp;: 5 sur 5">5</label>
		<input type="radio" name="notesA" id="5" value="5" />
	</li>
</ul>
</br>
<a><button class="btn btn-default" type="submit">Poster</button></a>
  
</form>
</center>


 <script>
   // Lorsque le DOM est chargé on applique le Javascript 
   $(document).ready(function() {
	// On ajoute la classe "js" à la liste pour mettre en place par la suite du code CSS uniquement dans le cas où le Javascript est activé
	$("ul.notes-echelle").addClass("js");
	// On passe chaque note à l'état grisé par défaut
	$("ul.notes-echelle li").addClass("note-off");
	// Au survol de chaque note à la souris
	$("ul.notes-echelle li").mouseover(function() {
		// On passe les notes supérieures à l'état inactif (par défaut)
		$(this).nextAll("li").addClass("note-off");
		// On passe les notes inférieures à l'état actif
		$(this).prevAll("li").removeClass("note-off");
		// On passe la note survolée à l'état actif (par défaut)
		$(this).removeClass("note-off");
	});
	// Lorsque l'on sort du sytème de notation à la souris
	$("ul.notes-echelle").mouseout(function() {
		// On passe toutes les notes à l'état inactif
		$(this).children("li").addClass("note-off");
		// On simule (trigger) un mouseover sur la note cochée s'il y a lieu
		$(this).find("li input:checked").parent("li").trigger("mouseover");
	});
});

 </script>
<?php
footer();
?>


