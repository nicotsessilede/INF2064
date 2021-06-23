<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
	Nouveau Client
    </title>
</head>
<body>
<?php
	define("serveur","localhost");
	define("utilisateur","root");
	define("mot_de_passe",'');
	define("base","ferme");

	$bdd=mysqli_connect(serveur,utilisateur,mot_de_passe,base) or die(mysqli_connect_error());

?>
<?php
	//require_once 'connexion.php';
	if($_POST){
		extract($_POST);
		$sql="INSERT INTO clients VALUES('$nom_cli','$prenom_cli','$login','$password','$region','$departement','$arrondissement')";

		$resultat=mysqli_query($bdd,$sql);
		if($resultat){
			echo "Client enregistré avec succès.";
		}
		else{
			echo "Erreur d'enregistrement d'un client";
		}
		mysqli_close($bdd);
	}
?>
	<h1>Nouveau Client : </h1>
	<form action="nouveau_client.php" method="POST" onsubmit="return validateForm()">
	<label>Login : </label>
	<input type="text" name="login" size="30" /><br />
	
	<label>Nom : </label>
	<input type="text" name="nom_cli" size="30" /><br />

	<label>Prenom : </label>
	<input type="text" name="prenom_cli" size="30" /><br />

	<label>Region :</label>
	<select name="region">
		<option value="EN">Extrême-Nord</option>
		<option value="NO">Nord</option>
		<option value="AD">Adamaoua</option>
		<option value="ES">Est</option>
		<option value="CE">Centre</option>
		<option value="SU">Sud</option>
		<option value="LT">Littoral</option>
		<option value="OU">Ouest</option> 
		<option value="NW">Nord-Ouest</option>
		<option value="SW">Sud-Ouest</option>
	</select>
	<label>Département :</label>
	<select name="departement">
	<option value="">attent</option>
	</select>
	<label>Sexe :</label>
	<select name="sexe">
	<option value="">attent</option>
	</select>
	<label>Mot de Pass : </label>
	<input type="password" name="password" size="30" /><br />

	<input type="submit" value="Enregistrer" />
	<!--<input type="reset" value="Effacer " /><br /><br /> -->

	<a href="index.php">Retour a la page d'accueil</a>
</form>
</body>

</html>