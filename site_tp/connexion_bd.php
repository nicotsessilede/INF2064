<?php
$bdd=mysqli_connect(serveur,utilisateur,mot_de_passe,base);
?>

<?php
if($bdd=mysqli_connect(serveur,utilisateur,mot_de_passe,base)){
echo 'connexion réussite !!';
}
else{
die(mysqli_connect_error());
}
?>