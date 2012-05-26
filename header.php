<?php
session_start();
?>

<style type="text/css">
.navbox {
	position: absolute;
	float: left;
	top: 100px;

}

ul.nav {
	list-style: none;
	display: block;
	width: 200px;
	position: relative;
	top: 100px;
	left: 100px;
	padding: 60px 0 60px 0;
	background: url(shad2.png) no-repeat;
	-webkit-background-size: 50% 100%;
}

li {
	margin: 5px 0 0 0;
}

ul.nav li a {
	transition: width 0.3s ease-out, height 0.3s ease-out;
	-webkit-transition: all 0.3s ease-out;
	background: #cbcbcb url(border.png) no-repeat;
	color: #174867;
	padding: 7px 15px 7px 15px;
	-webkit-border-top-right-radius: 10px;
	-moz-border-top-right-radius: 10px;
	border-top-right-radius: 10px;
 	-webkit-border-bottom-right-radius: 10px;
	-moz-border-radius-bottomright: 10px;
	width: 100px;
	display: block;
	text-decoration: none;
	-webkit-box-shadow: 2px 2px 4px #888;
}

ul.nav li a:hover {
	background: #ebebeb /*url(border.png) no-repeat*/;
	color: #67a5cd;
	padding: 7px 15px 7px 30px;
	color:#F90;
}

li {
	margin-top: 2px;
	margin-bottom: 5px;
}

#opt {
	position: absolute;
	top: 10px;
	right: 10px;	
}

</style>

<div class="navbox">
<ul class="nav">
<li><a href="index.php">Accueil</a></li>
<li><a href="presentation.php">Pr&eacute;sentation du MoonGang</a></li>
<!--<li><a href="conditions.php">Conditions de recrutement</a></li>-->
<li><a href="candid.php">Nous rejoindre</a></li>
<li><a href="liste.php">Liste des membres</a></li>
<li><a href="actu.php">Actualit&eacute;s</a></li>
<li><a href="http://moongang.forumactif.com/">Forum</a></li>
<?php
if(!isset($_SESSION['pseudo']))
{
echo '<li><a href="id.php">Se connecter</a></li>';
}
?>
<?php
if(isset($_SESSION['pseudo']))
{
echo "<br /><br />";
echo '<li><a href="planning.php">Planning</a></li>';
echo '<li><a href="gest_membre.php">Gestion de compte</a></li>';
mysql_connect("mysql.exano.net","moongang_mg","diabolik79");
mysql_select_db("moongang_users");
mysql_query("SET NAMES 'utf8'");
$user = $_SESSION['pseudo'];

$req = mysql_query('select type from mg_user where pseudo="'.$user.'"');
$data = mysql_fetch_array($req);
if($data['type'] == 1)
	{
		echo '<li><a href="gest.php">Administration</a></li>';
	}
echo '<li><a href="uncheck.php">Se d&eacute;connecter</a></li>';

}
?>
</ul>
</div>

<?php
if(isset($_SESSION['pseudo']))
{
echo '<span style="font-family: Arial;font-size: 17px; color: white;">Connect&eacute; en tant que </span><span style="font-family: Arial;font-size: 17px; color: #F90;"><strong>'.$_SESSION["pseudo"].'</strong></span>';
}
?>

<!-- LOGO CHROME -->
<a href="opti.php"><img src="chrome.png" alt="Site Optimis&eacute; pour Google Chrome" title="Site Optimis&eacute; pour Google Chrome" id="opt" /></a>
