<?php
require ('header.php');

if(isset($_SESSION['pseudo']))
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
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MoonGang - Administration</title>
<style>
body {
	background-color: #030631;
}

.gest {
	border: 1px solid white;
	width: 30%;
	padding: 10px;
}

.gesti {
	border: 1px solid white;
	width: 90%;
	padding: 10px;
	margin-top: 20px;
}

#user {
	margin-top: 20px;	
}

</style>
</head>

<body>
<div style="background-color:#c4cfee; width: 80%; min-height: 1000px; padding: 10px; margin:auto; -moz-border-radius: 10px; -webkit-border-radius: 10px; border-top-left-radius:10px;">
<center><a href="index.php"><img src="http://img34.imageshack.us/img34/4835/mg3h.jpg" alt="Logo MG" style="margin-bottom:60px;" /></a></center>

<div style="margin-left:100px; margin-right: 100px; border: 1px solid white; padding: 7px; background-color:#94a7e0; -moz-border-radius: 10px; -webkit-border-radius: 10px; border-top-left-radius:10px;">
<span style="font-family: Arial;font-size: 17px;">Administration - Connect&eacute; en tant que <strong><span style="color: white;"><?php echo $_SESSION['pseudo']; ?></span></strong></span>
<br />
<center>Gestion des events en cours d'impl&eacute;mentation !</center>
<br /><br /><br />
<div id="membre" class="gest"><!-- DEBUT DE GESTION DES MEMBRES -->
<strong>Ajout de membre :</strong>
<form action="adduser.php" method="post">
Pseudo : <input type="text" name="pseudo" style=" position:absolute; left: 500px;" /><br />
Type (1 pour admin, sinon 0) : <input type="text" name="type" style=" position:absolute; left: 500px;" /><br />
@Mail : <input type="text" name="mail" style=" position:absolute; left: 500px;" /><br />
<input type="hidden" name="mdp" value="moongang" style=" position:absolute; left: 500px;" />
<input type="submit" value="Envoyer" style=" position:absolute; left: 500px;" />
</form>
</div><!-- FIN DE GESTION DES MEMBRES -->

<div id="news" class="gesti"> <!-- DEBUT DE GESTION DES NEWS -->
<strong>Gestion des News :</strong>
<form method="post" action="News/creer.php">
Titre : <input type="text" name="titre"/><br />
Contenu :<br />
<textarea name="contenu" style="width:90%;min-height:200px;"></textarea><br />

<input type="submit" value="Ajouter la news"/>
</form>

<?php
include ('connect.php');

$sql = "SELECT * FROM news";
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br/>'.mysql_error());

echo "-----------------------------------------<br /><br />";
echo "Gestion des news existantes :";
while($data=mysql_fetch_assoc($req))
{
	echo "<p>{$data["titre"]} -- ";
	echo '<a href="News/edit.php?id='.$data['id'].'">Modifier</a>';
	echo ' -- <a href="News/delete.php?id='.$data['id'].'">X</a>';
	echo "</p>";
}
?>
</div> <!-- FIN DE GESTION DES NEWS -->

<div class="gest" id="user">
<?php
include ('connect.php');

$sqql = "SELECT * FROM mg_user";
$reeq = mysql_query($sqql) or die('Erreur SQL !<br />'.$sqql.'<br />'.mysql_error());
echo "<strong>Gestion des utilisateurs :</strong><br />";
echo "Les comptes administrateurs ont un pseudo blanc<br />";
while($datta = mysql_fetch_array($reeq))
{
	echo "<p>";
	if ($datta['type'] == 1)
	{
		echo '<span style="color: white;">';
	}
	echo $datta['pseudo'];
	if ($datta['type'] == 1)
	{
		echo '</span>';
	}
	echo " -- ";
	echo '<a href="edituser.php?id='.$datta['id'].'">Editer</a> -- ';
	echo '<a href="deluser.php?id='.$datta['id'].'">X</a></p>';	
}

?>
</div>






</div>

</div>
<?php
if(isset($_GET['etat']) && ($_GET['etat'] == 1))
{
	echo '<SCRIPT language=javascript>alert("L\'utilisateur a bien ete enregistre");</SCRIPT>';
	unset($_GET['etat']);
}

if(isset($_GET['del']) && ($_GET['del'] == 1))
{
	echo '<SCRIPT language=javascript>alert("L\'utilisateur à bien été supprimé");</SCRIPT>';
	unset($_GET['etat']);
}
?>
</body>
</html>