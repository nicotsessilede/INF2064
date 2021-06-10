<?php
/*****************************Connexion à la base de données ********************************/
	function connecter()
	{
		try
		{
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host=localhost;dbname=tp_bd', 'root', '', $pdo_options);
			//echo "Connexion reussi";
			$bdd->query("SET NAMES UTF8");
			return $bdd;
		}
		catch (Exception $e)
		{
				die('Erreur : ' . $e->getMessage());
		}

	}
/**************************************Checking du login et du mot de passe **********************************************/
	function passwordLogin($login,$password)
	{
		$bdd = connecter();
		$req = $bdd->prepare('SELECT * FROM etudiant WHERE login = ? AND passwd = PASSWORD(?)');
		$p = $req->execute(array($login,$password));
		$param = $req->fetch();
		if(!$param)
		{
			$chaine = 'Compte inexistant';
		}
		else
		{
		   $etudiant_obj = getTuple("etudiant","login", $param['login']);
		   $etudiant = $etudiant_obj->fetch();
		   
		   $chaine = 'Bonjour '.$etudiant['nom'];
		}
	    return $chaine;
	}

	function passwordLogin_enseignant($login,$password)
	{
		$bdd = connecter();
		$req = $bdd->prepare('SELECT * FROM enseignant WHERE login = ? AND passwd = PASSWORD(?)');
		$p = $req->execute(array($login,$password));
		$param = $req->fetch();
		if(!$param)
		{
			$chaine = 'Compte inexistant';
		}
		else
		{
		   $eneignant_obj = getTuple("enseignant","login", $param['login']);
		   $enseignant = $enseignant_obj->fetch();
		   
		   $chaine = 'Bonjour '.$enseignant['unite_denseignement'];
		}
	    return $chaine;
	}

	function afficheEtudiants()
	{
		$bdd = connecter();
		$req = $bdd->prepare('SELECT * FROM etudiant ORDER BY nom DESC');
		$p = $req->execute();
		$row = $req->fetch();
		$chaine="";
   		if($row) {
			while($row) {
        		 //ecriture des tags de retour
			 $chaine=$chaine."<tr>\n";
			 $chaine=$chaine."<td>".$row['matricule']."</td>";
			 $chaine=$chaine."<td>".$row['nom']."</td>";
			 $chaine=$chaine."<td>".$row['login']."</td>";
			 $chaine=$chaine."\n</tr>\n";
			 $row = $req->fetch();
		       }

		} else {
			$chaine="<tr><td>pas d'entrée</td></tr>";
		}
		return $chaine;
	}

	function afficheEnseignant()
	{
		$bdd = connecter();
		$req = $bdd->prepare('SELECT * FROM enseignant ORDER BY unite_denseignement DESC');
		$p = $req->execute();
		$row = $req->fetch();
		$chaine="";
   		if($row) {
			while($row) {
        		 //ecriture des tags de retour
			 $chaine=$chaine."<tr>\n";
			 $chaine=$chaine."<td>".$row['grade']."</td>";
			 $chaine=$chaine."<td>".$row['unite_denseignement']."</td>";
			 $chaine=$chaine."<td>".$row['login']."</td>";
			 $chaine=$chaine."\n</tr>\n";
			 $row = $req->fetch();
		       }

		} else {
			$chaine="<tr><td>pas d'entrée</td></tr>";
		}
		return $chaine;
	}
/*******************************Obtention d'un ensemble de tuple*********************************/
	function getTuple($tab,$param,$val)
	{
		$bdd = connecter(); 
		$req = $bdd->prepare('SELECT * FROM '. $tab.' WHERE '.$param. '= ?');
	 
		$req->execute(array($val));
		
		return $req;
	}
	

	function inserEnseignant($grade, $unite_denseignement, $login, $passwd)
	{
		try{
			$bdd = connecter();
			$req = $bdd->prepare('INSERT INTO enseignant (grade, unite_denseignement, login, passwd) values(?,?,?,PASSWORD(?))');
			$req->execute(array($grade, $unite_denseignement, $login, $passwd));
			return true;
		}
		catch(PDOException $e){
			echo $e->getMessage();
			return false;
		}
	}
?>

