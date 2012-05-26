<?php
session_start();
if(isset($_SESSION['pseudo']))
{
	require('../connect.php');
	$user = $_SESSION['pseudo'];

	$req = mysql_query('select type from mg_user where pseudo="'.$user.'"');
	$data = mysql_fetch_array($req);
	if($data['type'] == 1)
	{
		
	}
	else
	{
	header('Location:index.php');
	}

}
else
{
	header('Location:id.php');	
}


mysql_connect("mysql.exano.net","moongang_mg","diabolik79");
mysql_select_db("moongang_users");


$sql = "DELETE FROM news WHERE id=".$_GET['id']."";
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br/>'.mysql_error());

header("Location: ../gest.php");


?>