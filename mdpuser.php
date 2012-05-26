<?php
session_start();
require ('connect.php');
$ps = $_SESSION['pseudo'];
extract($_POST);

$old = hash("gost",$old);

if(!isset($_SESSION['pseudo'])) // Test si l'utilisateur est connecté
{
	header('Location:id.php');
}


/*$user_answer = substr(md5($user_answer),5,10);

if($answer != $user_answer)
{
header('Location:gest_membre.php?cap=1'); // Calcul invalide
}*/

$req = mysql_query("SELECT mdp FROM mg_user WHERE pseudo='$ps'");
$mdp = mysql_fetch_array($req);
$test = $mdp['mdp'];


if($new == $renew && $test == $old)
{

$new = hash("gost",$new);
mysql_query("UPDATE mg_user SET mdp='$new' WHERE pseudo='$ps'") or die('Erreur SQL !<br />'.$sql.'<br/>'.mysql_error());

header("Location:gest_membre.php?etat=1"); // ALL GREEN !
}
else
{
	if($test != $old)
	{
		header("Location:gest_membre.php?etat=0"); // Ancien mdp invalide	
	}
	else
	{
		header("Location:gest_membre.php?etat=2"); //  Confirmation invalide
	}
}
?>