<?php
include_once('connexion.php');$resultat=mysqli_query($bdd,'SELECT * FROM etudiants');
while($donnee=mysqli_fetch_assoc($resultat)){
echo '<tr>';
echo "<td>".$donnee['matricule']." </td>";
echo "<td>".$donnee['nom_etud']." </td>";
echo "<td>".$donnee['prenom_etud']." </td>";
echo "<td>".$donnee['date_nais']." </td>";
if ($donnee['matricule']=='M') echo '<td>Masculin </td>';
else echo '<td>Féminin </td>>';
echo "<td>".$donnee['adresse']." </td>";
echo '</tr>';
}
mysqli_free_result($resultat);
?>