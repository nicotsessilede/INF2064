<?php
	require_once 'connexion.php';
	if(isset($_GET['matricule'])){
		$matricule=$_GET['matricule'];
		$sql="DELETE FROM etudiants WHERE matricule='$matricule'";
		$resultat=mysqli_query($bdd,$sql);
		if($resultat){
			header('Location:index.php?action=vrai');
		}
		else{
			header('Location:index.php?action=non');
		}
	}else{
		header('Location:index.php');
	}
?>