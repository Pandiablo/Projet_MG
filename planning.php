<?php
require ('header.php');
require ('connect.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MoonGang - Planning</title>
<style>
body {
	background-color: #030631;
}

.event {
	padding: 5px;
	width: 	
}
</style>
</head>

<body>
<div style="background-color:#c4cfee; width: 80%; min-height: 1000px; padding: 10px; margin:auto; -moz-border-radius: 10px; -webkit-border-radius: 10px; border-top-left-radius:10px;">
<center><a href="index.php"><img src="http://img34.imageshack.us/img34/4835/mg3h.jpg" alt="Logo MG" style="margin-bottom:60px;" /></a></center>

<div style="margin-left:100px; margin-right: 100px; border: 1px solid white; padding: 7px; background-color:#94a7e0; -moz-border-radius: 10px; -webkit-border-radius: 10px; border-top-left-radius:10px;">
<center><em>Le Planning est une fonctionnalit&eacute; encore en cours d'impl&eacute;mentation !</em></center>
<?php
$sql = 'SELECT * FROM event ORDER BY id DESC';
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br/>'.mysql_error());
$count;
$pseudo = $_SESSION['pseudo'];
$sqql = 'SELECT id FROM mg_user WHERE pseudo="'.$pseudo.'"';
$reeq = mysql_query($sqql) or die('Erreur SQL !<br />'.$sqql.'<br/>'.mysql_error());
$d = mysql_fetch_assoc($reeq);
$uid = $d['id'];

while($data=mysql_fetch_assoc($req))
{
	echo '<fieldset>';
	echo '<div class="event"><br />';
	echo '<legend><span class="titre">';
	echo '<strong>'.$data['titre'].' </strong></span></legend><span class="date"> '.date("j/m/Y G:i",strtotime($data['date'])).'</span><br />';
	echo '<div class="desc"><em>'.$desc=nl2br($data['desc']).'</em></div><br />';
	$count = 0;
	echo 'Participants : <br />';
	echo '<ul>';
	for($i=1; $i < 9; $i++)
	{
		if($data[$i] != "")
		$count += 1;
		echo '<li>';
		if($i == 1) { echo '<span style="color: white;">'; }
		echo $data[$i].'</li>';	
		if($i == 1) { echo '</span>'; }	
	}
	echo '</ul>';
	$rest = 8 - $count;
	echo '<span class="prest">';
	echo 'Places restantes : '.$rest.'<br />';
	echo '<button><a href="insevent.php?id='.$data['id'].'&uid='.$uid.'">S\'inscrire</a></button>';
	echo '</span>';
	echo '</div>';
	echo '</fieldset><br />';
}

?>
<br /><br />
<a href="addevent.php">Ajouter un &eacute;v&eacute;nement</a> /!\ Non Fonctionnel /!\


</div>
<?php
if(isset($_GET['a']) && ($_GET['a'] == 1))
{
	echo '<SCRIPT language=javascript>alert("Evénement ajouté !");</SCRIPT>';
	unset($_GET['err']);
}

if(isset($_GET['i']) && ($_GET['i'] == 1))
{
	echo '<SCRIPT language=javascript>alert("Inscription réussie !");</SCRIPT>';
	unset($_GET['err']);
}

if(isset($_GET['d']) && ($_GET['d'] == 1))
{
	echo '<SCRIPT language=javascript>alert("Désinscription réussie !");</SCRIPT>';
	unset($_GET['err']);
}
?>
</div>
</body>
</html>