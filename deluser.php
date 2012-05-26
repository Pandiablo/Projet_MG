<?php
session_start();

if(isset($_SESSION['pseudo'])) // DEBUT DU SCRIPT DE DETECTION DE COMPTE ADMIN
{
mysql_connect("mysql.exano.net","moongang_mg","diabolik79");
mysql_select_db("moongang_users");
mysql_query("SET NAMES 'utf8'");
$user = $_SESSION['pseudo'];

$req = mysql_query('select type from mg_user where pseudo="'.$user.'"');
$data = mysql_fetch_array($req);
if($data['type'] == 1)
{}
else
{
	header('Location:index.php');
}

}
else
{
	header('Location:id.php');	
} // FIN DU SCRIPT DE DETECTION DE COMPTE ADMIN

require ('connect.php');

$sql = "DELETE FROM mg_user WHERE id=".$_GET['id']."";
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br/>'.mysql_error());

header("Location:gest.php?del=1");


?>