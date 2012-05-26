<?php
session_start();


mysql_connect("mysql.exano.net","moongang_mg","diabolik79");
mysql_select_db("moongang_users");
mysql_query("SET NAMES 'utf8'");


 if(isset($_POST['pseudo'], $_POST['mdp']))
 {
	 $user = mysql_real_escape_string(stripslashes($_POST['pseudo']));
	 $mdp = mysql_real_escape_string(stripslashes($_POST['mdp']));
	 $mdp = hash("gost",$mdp);
	 
	 $req = mysql_query('select mdp from mg_user where pseudo="'.$user.'"');
	 
	 $data = mysql_fetch_array($req);
	 
	if($data['mdp']==$mdp and mysql_num_rows($req)>0)
	{
		$_SESSION['pseudo'] = $_POST['pseudo'];
		header('Location:index.php');
	}
	else
	{
		$_SESSION['fail'] = 1;
		header('Location:id.php');
	}
 }
 else
 {
	$_SESSION['fail'] = 1;
	header('Location:id.php');
 }


/*
if(!empty($_POST["pseudo"]) && !empty($_POST['mdp'])) //Test de la présence du formulaire rempli
{
if($_POST['pseudo']=="admin" AND $_POST['mdp']=="mg" OR $_SESSION['pseudo']=="admin" AND $_SESSION['mdp']=="mg")
{
	$_SESSION['pseudo'] = $_POST['pseudo']; //Association des identifiants à la session
	$_SESSION['mdp'] = $_POST['mdp'];
}
}
if($_SESSION['pseudo']=="admin" AND $_SESSION['mdp']=="mg") // Si identifiants corrects
{
  header("Location:gest.php"); // On redirige vers l'interface d'administration
}
else
{
	header("Location:id.php"); // Sinon on redirige vers la page d'accueil
}*/
?>