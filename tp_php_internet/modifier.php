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
<h1>Modification d'un Etudiant :</h1>
<?php
	if($_POST){
		extract($_POST);
		$sql="UPDATE etudiants SET nom_etud='$nom_etud',
			prenom_etud='$prenom_etud',
			date_nais='$date_nais',
			sexe='$sexe',
			adresse='$adresse'
			WHERE matricule='$matricule'
		";
		$resultat=mysqli_query($bdd,$sql);
		if($resultat) echo "Etudiant modifié avce succès";
		else echo "Erreur de modification d'un étudiant";

		mysqli_close($bdd);
	}
?>

<?php
	require_once 'connexion.php';
	if(isset($_GET['matricule'])){
		$matricule=$_GET['matricule'];
		$sql="SELECT * FROM etudiants WHERE matricule='$matricule'";
		$resultat=mysqli_query($bdd,$sql);
		if($resultat){
			$rows=mysqli_fetch_assoc($resultat);
			extract($rows);
			mysqli_free_result($resultat);
		}
		else{
			echo "aucun etudiant avec le matrocule :".$matricule;
			return;
		}
	}else{
		echo 'veuillez choisir un etudiant !';
		return;
	}
?>


<form action='modifier.php?matricule=<?php echo $matricule; ?>' method="POST">
	<label>Matricule : </label>
	<input type="text" name="matricule" value='<?php echo $matricule; ?>' size="12" /><br />

	<label>Nom : </label>
	<input type="text" name="nom_etud" value='<?php echo $nom_etud; ?>' size="30" /><br />

	<label>Prénom : </label>
	<input type="text" name="prenom_etud" value='<?php echo $prenom_etud; ?>' size="30" /><br />

	<label>Date de naissance : </label>
	<input type="date" name="date_nais" value='<?php echo $date_nais; ?>' /><br />

	<label>Sexe :</label>
	<select name="sexe">
		<option value="M" <?php if($sexe=="M") echo 'selected';?> >Masculin</option>
		<option value="F" <?php if($sexe=="F") echo 'selected';?> >Féminin</option>
	</select>

	<label>Adresse : </label>
	<input type="text" name="adresse" value='<?php echo $adresse; ?>' size="30" /><br />

	<input type="submit" value="Modifier" />
	<input type="reset" value="Effacer " /><br /><br />

	<a href="index.php">Retour a la page d'accueil</a>
</form>

</body>

</html>