<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        TP PHP
    </title>
</head>
<body>
<?php
	require_once 'connexion.php';

	if($_POST){
		extract($_POST);
		$sql="INSERT INTO etudiants VALUES('$matricule','$nom_etud','$prenom_etud','$date_nais','$sexe','$adresse')";

		$resultat=mysqli_query($bdd,$sql);
		if($resultat){
			echo "Etudiant enregistré avec succès.";
		}
		else{
			echo "Erreur d'enregistrement d'un étudiant";
		}
		mysqli_close($bdd);
	}
?>
	<h1>Nouveau Etudiant : </h1>
<form action="ajouter.php" method="POST">
	<label>Matricule : </label>
	<input type="text" name="matricule" size="12" /><br />

	<label>Nom : </label>
	<input type="text" name="nom_etud" size="30" /><br />

	<label>Prénom : </label>
	<input type="text" name="prenom_etud" size="30" /><br />

	<label>Date de naissance : </label>
	<input type="date" name="date_nais" /><br />

	<label>Sexe :</label>
	<select name="sexe">
		<option value="M">Masculin</option>
		<option value="F">Féminin</option>
	</select>

	<label>Adresse : </label>
	<input type="text" name="adresse" size="30" /><br />

	<input type="submit" value="Enregistrer" />
	<input type="reset" value="Effacer " /><br /><br />

	<a href="index.php">Retour a la page d'accueil</a>
</form>
</body>

</html>