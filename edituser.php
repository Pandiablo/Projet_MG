<?php
require ('header.php');

if(isset($_SESSION['pseudo']))
{
require('connect.php');
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
}
?>
<?php require ('connect.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MoonGang - Edition d'utilisateur</title>
<style>
body {
	background-color: #030631;
}

</style>
</head>

<body>
<div style="background-color:#c4cfee; width: 80%; min-height: 1000px; padding: 10px; margin:auto; -moz-border-radius: 10px; -webkit-border-radius: 10px; border-top-left-radius:10px;">
<center><a href="index.php"><img src="http://img34.imageshack.us/img34/4835/mg3h.jpg" alt="Logo MG" style="margin-bottom:60px;" /></a></center>

<div style="margin-left:100px; margin-right: 100px; border: 1px solid black; padding: 7px; background-color:#94a7e0; -moz-border-radius: 10px; -webkit-border-radius: 10px; border-top-left-radius:10px;">
<div id="membre" class="gest">
<style>
.gest {
	/*border: 1px solid white;*/
	width: 30%;
	padding: 10px;
}
</style>
<?php
extract($_POST);
if(!empty($_POST))
{
	$sql = "UPDATE mg_user SET pseudo='$pseudo', mail='$mail', type=$type WHERE id=$id";
	$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br/>'.mysql_error());
	echo "<strong>L'utilisateur a &eacute;t&eacute; modifi&eacute;e</strong>";
	echo "<br /><br />";
	$_GET["id"] = $id;
	
	if($_POST['remdp'])
	{
		$mdpn = hash("gost","moongang");
		$sqlm = "UPDATE mg_user SET mdp='$mdpn' WHERE id=".$id."";
		$reqm = mysql_query($sqlm) or die('Erreur SQL !<br />'.$sql.'<br/>'.mysql_error());
	}
}

$sql = "SELECT * from mg_user WHERE id=".$_GET['id']."";
$req = mysql_query($sql);
$data = mysql_fetch_array($req);


?>
<strong>Edition de l'utilisateur :</strong>
<form action="edituser.php" method="post">
Pseudo : <input type="text" name="pseudo" style=" position:absolute; left: 500px;" value="<?php echo $data['pseudo']; ?>" /><br />
Type (1 pour admin, sinon 0) : <input type="text" name="type" style=" position:absolute; left: 500px;" value="<?php echo $data['type']; ?>" /><br />
@Mail : <input type="text" name="mail" style=" position:absolute; left: 500px;" value="<?php echo $data['mail']; ?>" /><br />
R&eacute;initialiser le mot de passe ? : <input type="checkbox" name="remdp" style="position:absolute; left: 500px;" /><br />
<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"  />
<input type="submit" value="Envoyer" style=" position:absolute; left: 500px;" />
</form>
<br />
Les mots de passe sont réitinialisés à "moongang".
<br />
<a href="gest.php">Retour &agrave; l'administration</a>
</div>



</div>
</div>
</body>
</html>