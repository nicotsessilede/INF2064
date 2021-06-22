<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL|E_STRICT);
    require("biblio.php");
    if(isset($_POST['grade'])and isset($_POST['unite_denseignement'])and isset($_POST['login'])and isset($_POST['password'])){
		$grade    = $_POST['grade'];
		$unite_denseignement          = $_POST['password'];
		$login        = $_POST['login'];
		$password     = $_POST['password'];
		inserEnseignant($grade, $unite_denseignement, $login, $password);
		echo "Enrégistrement de <b>$unite_denseignement </b> effectué avec succès</h1>";
   	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<title>Accueil</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<center>
<?php
	if(isset($_POST['login'])and isset($_POST['password'])){
		$login    = $_POST['login'];
		$password = $_POST['password'];
		$unite_denseignement = passwordLogin($login,$password);
		echo "<h1>$unite_denseignement </h1>";
   	}
	
?>
</center>
<div id="general">
<form method="post" action="accueil.php">
<input type="submit" name="entrer" value="Afficher les enseignants" />
<a href="index.php" >Se connecter<a>
<input type="hidden" name="login" value="$login" />
<input type="hidden" name="password" value="$password" />
</form>
<table>
<?php
// Afficher les enseignants enrégistrés
   if(isset($_POST['entrer'])){
	echo "<h2>Affichage des enseignants</h2>";
	$chaine =afficheEnseignant();
	echo $chaine;
   }
?>
</table>
</div>
</body>
</html>
