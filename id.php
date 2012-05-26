<?php
require ('header.php');

if(isset($_SESSION['pseudo']))
{
header('Location:index.php');
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MoonGang - Connexion</title>
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
<?php /*
if($_SESSION['fail'] == 1)
{
	echo 'Mauvaise combinaison pseudo / mot de passe, merci de r&eacute;essayer !';
	$_SESSION['fail'] = 0;
	echo '<br />';
}*/
?>
<form action="check.php" method="post">
<input type="hidden" name="ip" value="" /><br />
Pseudo : <input type="text" name="pseudo" style="position:absolute; left: 400px;" /><br />
Mot de passe : <input type="password" name="mdp" style="position:absolute; left: 400px;" /><br />
<input type="submit" value="Se connecter" style="position:absolute; left: 400px; margin-top: 3px;" /><br />
</form>


</div>

</div>
</body>
</html>