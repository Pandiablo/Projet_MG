<?php
session_start();
require ('connect.php');

extract($_POST);

$mdp = hash("gost",$mdp);

mysql_query("INSERT INTO mg_user (pseudo, mdp, mail, type, idevent) VALUES ('$pseudo','$mdp', '$mail', '$type', '$event')") or die('Erreur SQL !<br /><br/>'.mysql_error());

header("Location:gest.php?etat=1");
?>