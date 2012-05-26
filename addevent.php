<?php
session_start();
if(!(isset($_SESSION['pseudo'])))
{
	header("Location: id.php");
}
require ('header.php');

require('connect.php');
$pseudo = $_SESSION['pseudo'];
$sql = "SELECT id FROM mg_user WHERE pseudo='$pseudo'";
$req = mysql_query($sql);
$data = mysql_fetch_assoc($req);
$id = $data['id'];
$_SESSION['id'] = $id;

$i1 = $_SESSION['pseudo'];
$etat = 1;
$insc = 1;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MoonGang</title>
<style>
body {
	background-color: #030631;
}

</style>
</head>

<body>
<div style="background-color:#c4cfee; width: 80%; min-height: 1000px; padding: 10px; margin:auto; -moz-border-radius: 10px; -webkit-border-radius: 10px; border-top-left-radius:10px;">
<center><a href="index.php"><img src="http://img34.imageshack.us/img34/4835/mg3h.jpg" alt="Logo MG" style="margin-bottom:60px;" /></a></center>

<div style="margin-left:100px; margin-right: 100px; border: 1px solid white; padding: 7px; background-color:#94a7e0; -moz-border-radius: 10px; -webkit-border-radius: 10px; border-top-left-radius:10px;">
<?php
if(!empty($_POST))
{
	extract($_POST);
	$sql = "INSERT INTO event (idpro,titre,desc,i1,etat,insc) VALUES (".$id.",'".$titre."','".$desc."','".$pi1."',".$petat.",".$pinsc.")";
	$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br/>'.mysql_error());
	echo "<strong>Cr&eacute;ation effectu&eacute;e !</strong>";
	echo "<br /><br />";
}
?>
<strong>Cr&eacute;ation d'un &eacute;v&eacute;nement :</strong><br  />

<form action="addevent.php" method="post">
Titre : <input type="text" name="titre"  /><br />
Description : <br /><textarea name="desc" style="min-height:100px; min-width:350px;"></textarea><br />
Date (AAAA-MM-JJ hh:mm:ss) : <input type="text" name="date"  /><br />
<input type="hidden" name="idpro" value="<?php echo $id; ?>" />
<input type="hidden" name="petat" value="<?php echo $etat; ?>" />
<input type="hidden" name="pinsc" value="<?php echo $insc; ?>" />
<input type="hidden" name="pi1" value="<?php echo $i1; ?>" />
<input type="submit" value="Envoyer" >
</form>

</div>
</div>
</body>
</html>