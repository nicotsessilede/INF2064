<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Basic -->
    <meta charset="utf-8">
	<th>Actions</th>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        TP PHP
    </title>
</head>
<body>

<?php
	if(isset($_GET['action'])){
		if($_GET['action']=='vrai'){
			echo "<div>Etudiant supprimé avec succès </div>";
		}
		else if($_GET['action']=='non'){
			echo "<div>Erreur de suppression de l'étudiants </div>";
		}
	}
?>

<a href="ajouter.php">Ajouter un Etudiant </a>
<table>
	<thead>
		<tr>
			<th>Matricule</th>
			<th>Nom</th>
			<th>Prénom</th>
			<th>Date de naissance</th>
			<th>Sexe</th>
			<th>Adresse</th>
			<th>Actions</th>
		</tr>
	</thead>
</table>

<?php 
	include_once('connexion.php');
	$resultat=mysqli_query($bdd,'SELECT * FROM etudiants');

	while($donnee=mysqli_fetch_assoc($resultat)){
		$matricule=$donnee['matricule'];
		echo '<tr>';
		echo "<td>".$donnee['matricule']." </td>";
		echo "<td>".$donnee['nom_etud']." </td>";
		echo "<td>".$donnee['prenom_etud']." </td>";
		echo "<td>".$donnee['date_nais']." </td>";

		if ($donnee['matricule']=='M') echo '<td>Masculin </td>';
		else echo '<td>Féminin </td>>';

		echo "<td>".$donnee['adresse']." </td>";
		echo "<td>";
			echo "<a href='modifier.php?matricule=$matricule'>Modifier</a>";
			echo ' / ';
			echo "<a href='supprimer.php?matricule=$matricule'>Supprimer</a>";
		echo "</td>";
		echo '</tr>';
	}


	mysqli_free_result($resultat);
?>
//<a href="ajouter.php">Ajouter un Etudiant </a>
</body>

</html>