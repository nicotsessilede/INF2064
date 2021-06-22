<?php
include_once('connexion.php');
$resultat=mysqli_query($bdd,'SELECT * FROM etudiants');
while($donnee=mysqli_fetch_assoc($resultat)){
echo $donnee['matricule']." <br />";
echo $donnee['nom_etud']." <br />";
echo $donnee['prenom_etud']." <br />";
echo $donnee['date_nais']." <br />";if ($donnee['matricule']=='M') echo 'Masculin <br />';
else echo 'Féminin <br />';
echo $donnee['matricule']." <br />";
}
mysqli_free_result($resultat);
?>