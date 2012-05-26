<?php
require ('../headernews.php');

if(isset($_SESSION['pseudo']))
{
require('../connect.php');
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


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MoonGang - Edition de News</title>
<style>
body {
	background-color: #030631;
}

</style>
</head>

<body>
<div style="background-color:#c4cfee; width: 80%; min-height: 1000px; padding: 10px; margin:auto; -moz-border-radius: 10px; -webkit-border-radius: 10px; border-top-left-radius:10px;">
<center><a href="../index.php"><img src="http://img34.imageshack.us/img34/4835/mg3h.jpg" alt="Logo MG" style="margin-bottom:60px;" /></a></center>

<div style="margin-left:100px; margin-right: 100px; border: 1px solid black; padding: 7px; background-color:#94a7e0; -moz-border-radius: 10px; -webkit-border-radius: 10px; border-top-left-radius:10px;">
<?php
require('../connect.php');


if(!empty($_POST))
{
	extract($_POST);
	$sql = "UPDATE news SET titre='$titre', contenu='$contenu' WHERE id=$id";
	$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br/>'.mysql_error());
	echo "<strong>La news a &eacute;t&eacute; modifi&eacute;e</strong>";
	echo "<br /><br />";
	$_GET["id"] = $id;
}

$sql = "SELECT * FROM news WHERE id=".$_GET['id']."";
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br/>'.mysql_error());
$data = mysql_fetch_assoc($req);

?>


<form method="post" action="edit.php">
<input name="id" type="hidden" value="<?php echo $data["id"]; ?>"/>
Titre : <input type="text" name="titre" value="<?php echo $data["titre"]; ?>"/><br />
Contenu :<br />
<textarea name="contenu" style="width:100%;min-height:200px;"><?php echo $content=str_replace("<br />", "", $data["contenu"]); ?></textarea><br />
<br />
<input type="submit" value="Modifier la news"/>
</form>

<a href="../gest.php">Retour &agrave; l'administration</a>
</div>

</div>
</body>
</html>