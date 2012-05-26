<?php
require ('header.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MoonGang - Liste des membres</title>
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
<style>
#outdiv { 
height: 3230px;
overflow: hidden; 
position: relative; 
width: 650px; 
} 

#iniframe { 
height: 3730px; 
left: -292px; 
position: absolute; 
top: -535px; 
width: 1280px; 
} 

#outdive {
	height: 140px;
	overflow: hidden; 
	position: relative; 
	width: 650px; 
} 

#iniframee { 
height: 1480px; 
left: -292px; 
position: absolute; 
top: -320px; 
width: 1280px; 
}

#cache {
	width : 40%;
	height: 345%;
	position: absolute;
	left:30%;	
	top: 60%;
	background-color: transparent;
}
	
</style>
<center>
<em>Donn&eacute;es issues du site officiel de Dofus</em><br />
<div id="outdive">
<iframe src="http://www.dofus.com/fr/guilde/jiva/moongang-21000001/actualites" scrolling="no" width="1280px" height="180px" id="iniframee"></iframe>
</div>

<div id="outdiv">
<iframe src="http://www.dofus.com/fr/guilde/jiva/moongang-21000001/membres" scrolling="no" width="1280px" height="3550px" id="iniframe"></iframe>
</div>

<div id="cache">
</div>
</center>

</div>

</div>
</body>
</html>