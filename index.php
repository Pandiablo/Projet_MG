<?php
require ('header.php');
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
#barre {
	color:white;
}
#date {
	float: left;
	margin-right: 15px;	
}
#content {
	position: relative;
	left: 25px;
}
</style>
</head>

<body>
<div style="background-color:#c4cfee; width: 80%; min-height: 1000px; padding: 10px; margin:auto; -moz-border-radius: 10px; -webkit-border-radius: 10px; border-top-left-radius:10px;">
<center><a href="index.php"><img src="http://img34.imageshack.us/img34/4835/mg3h.jpg" alt="Logo MG" style="margin-bottom:60px;" /></a></center>

<div style="margin-left:100px; margin-right: 100px; border: 1px solid white; padding: 7px; background-color:#94a7e0; -moz-border-radius: 10px; -webkit-border-radius: 10px; border-top-left-radius:10px;">
<h3>Les News du Gang :</h3>
<?php

mysql_connect("mysql.exano.net","moongang_mg","diabolik79");
mysql_select_db("moongang_users");
mysql_query("SET NAMES 'utf8'");


$sql = "SELECT * FROM news ORDER BY id DESC";
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br/>'.mysql_error());

$accents[1] = "à";
$accents[2] = "è";
$accents[3] = "é";
$accents[4] = "ê";
$accents[5] = "ù";
$accents[6] = "ô";
$accents[7] = "/*";
$accents[8] = "*/";

$raccents[1] = "&agrave;";
$raccents[2] = "&egrave;";
$raccents[3] = "&eacute;";
$raccents[4] = "&ecirc;";
$raccents[5] = "&ugrave;";
$raccents[6] = "&ocirc;";
$raccents[7] = "<!--";
$raccents[8] = "-->";

					
?>
				<?php
				
					while($data=mysql_fetch_assoc($req))
					{
						echo '<span id="date">Le '.date("j/m/Y G:i",strtotime($data['date'])).'</span>';
						echo "    <strong>"; echo str_replace($accents,$raccents,$data['titre']); echo "</strong><br />";
						//echo "-----------------------------------------<br />";
						echo "<div id=\"content\"><p>".$content=nl2br(str_replace($accents,$raccents,$data['contenu']))."</p></div>";
						//echo "<br />";
						echo '<span id="barre">______________________________________________________________</span><br />';
					}
					
				?>


</div>
</div>
</body>
</html>