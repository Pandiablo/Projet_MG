<?php
session_start();
require ('connect.php');
$ps = $_SESSION['pseudo'];
extract($_POST);


if(!isset($_SESSION['pseudo'])) // Test si l'utilisateur est connecté
{
	header('Location:id.php');
}


/*$user_answer = substr(md5($user_answer),5,10);

if($answer != $user_answer)
{
header('Location:gest_membre.php?cap=1'); // Calcul invalide
}*/

if($newp == $renewp)
{
	mysql_query("UPDATE mg_user SET pseudo='$newp' WHERE pseudo='$ps'") or die('Erreur SQL !<br />'.$sql.'<br/>'.mysql_error());
	$_SESSION['pseudo'] = $newp;
	header("Location:gest_membre.php?ps=1"); // ALL GREEN !

}
else
{
	if($newp != $renewp)
	{
		header("Location:gest_membre.php?etat=2"); // Confirmation invalide	
	}
	else
	{
	header("Location:gest_membre.php?err=1"); // Erreur inconnue
	}
}
?>