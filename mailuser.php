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

if($new == $renew)
{
	mysql_query("UPDATE mg_user SET mail='$new' WHERE pseudo='$ps'") or die('Erreur SQL !<br />'.$sql.'<br/>'.mysql_error());

	header("Location:gest_membre.php?mail=1"); // ALL GREEN !

}
else
{
	if($new != $renew)
	{
		header("Location:gest_membre.php?etat=2"); // Confirmation invalide	
	}
	else
	{
	header("Location:gest_membre.php?err=1"); // Erreur inconnue
	}
}
?>