<?php
require ('header.php');

if(!isset($_SESSION['pseudo']))
{
	header('Location:id.php');
}
require ('connect.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MoonGang - Gestion</title>
<style>
body {
	background-color: #030631;
}

.gest {
	border: 1px solid white;
	width: 30%;
	padding: 10px;
}

#mail {
	margin-top: 20px;	
}

#mdp {
	margin-top: 20px;
}

#pseudo {
	margin-top: 20px;
}

</style>
</head>

<body> <!-- MISE EN PLACE DE L'APPARENCE DE LA PAGE, DEFINITION DU CORPS DE PAGE ET DU CSS-->
<div style="background-color:#c4cfee; width: 80%; min-height: 1000px; padding: 10px; margin:auto; -moz-border-radius: 10px; -webkit-border-radius: 10px; border-top-left-radius:10px;">
<center><a href="index.php"><img src="http://img34.imageshack.us/img34/4835/mg3h.jpg" alt="Logo MG" style="margin-bottom:60px;" /></a></center>

<div style="margin-left:100px; margin-right: 100px; border: 1px solid white; padding: 7px; background-color:#94a7e0; -moz-border-radius: 10px; -webkit-border-radius: 10px; border-top-left-radius:10px;"><!-- CORPS DE LA PAGE -->
<em>Bienvenue dans votre espace de gestion de compte</em><br /><br />

<?php
$pseudo = $_SESSION['pseudo'];
$req = 'SELECT * FROM mg_user WHERE pseudo="'.$pseudo.'"';
$sql = mysql_query($req) or die('Erreur SQL !<br />'.$sql.'<br/>'.mysql_error());
$data = mysql_fetch_assoc($sql);
?>

<div id="act" class="gest"><!-- OBJET INFOS ACTUELLES -->
<strong>Mes infos :</strong><br />
Mon pseudo : <span style=" position:absolute; left: 500px;"><?php echo $data['pseudo']; ?></span><br />
Mon adresse mail : <span style=" position:absolute; left: 500px;"><?php echo $data['mail']; ?></span><br />
Type de compte : <span style=" position:absolute; left: 500px;"><?php if($data['type'] == 1) { echo '<span style="color: white;">Administrateur</span>'; } else { echo "Utilisateur"; } ?></span><br />
Identifiant du compte : <span style=" position:absolute; left: 500px;"><?php echo $data['id']; ?></span><br />
<span style="font-size:13px;">(Peut vous &ecirc;tre demand&eacute; en cas de probl&egrave;me li&eacute; à votre compte)</span>
</div><!-- FIN OBJET INFOS ACTUELLES -->

<div id="pseudo" class="gest"><!-- OBJET CHANGEMENT PSEUDO -->
<strong>Changer son pseudo : </strong><br />
<form action="pseudouser.php" method="post">
Nouveau : <input type="text" name="newp" style=" position:absolute; left: 500px;" /><br />
Confirmer : <input type="text" name="renewp" style=" position:absolute; left: 500px;" /><br />
<input type="submit" value="Envoyer" style=" position:absolute; left: 500px;" />
</form>
</div>

<div id="mdp" class="gest"><!-- OBJET CHANGEMENT MDP -->
<strong>Changer son mot de passe :</strong><br/>
<?php
// INSERTION DE DEUX CHIFFRES ALEATOIRES POUR LA VERIFICATION ANTI-ROBOT
        /*    $number_1 = rand(1, 9);
            $number_2 = rand(1, 9);
            $answer = substr(md5($number_1+$number_2),5,10);*/
?>

 <!-- DEBUT FORMULAIRE CHANGER MDP -->
<form action="mdpuser.php" method="post"> 
Actuel : <input type="password" name="old" style=" position:absolute; left: 500px;" /><br />
Nouveau : <input type="password" name="new" style=" position:absolute; left: 500px;" /><br />
Confirmer : <input type="password" name="renew" style=" position:absolute; left: 500px;" /><br />
<!--<?php /* echo $number_1; ?> + <?php echo $number_2; */?> = ? <input type="text" name="user_answer" style=" position:absolute; left: 500px;" /><input type="hidden" name="answer" value="<?php // echo $answer; ?>" /><br />-->
<input type="submit" value="Envoyer" style=" position:absolute; left: 500px;" />
</form>
</div><!-- FIN OBJET CHANGEMENT MDP -->


<div id="mail" class="gest">
<strong>Changer son @mail :</strong><br/>
<?php
// INSERTION DE DEUX CHIFFRES ALEATOIRES POUR LA VERIFICATION ANTI-ROBOT
          /*  $number_3 = rand(1, 9);
            $number_4 = rand(1, 9);
            $answere = substr(md5($number_3+$number_4),5,10); */
?>
 <!-- DEBUT FORMULAIRE CHANGER MAIL -->
<form action="mailuser.php" method="post">
Nouvelle adresse : <input type="text" name="new" style=" position:absolute; left: 500px;" /><br />
Confirmer : <input type="text" name="renew" style=" position:absolute; left: 500px;" /><br />
<!--<?php // echo $number_3; ?> + <?php //echo $number_4; ?> = ? <input type="text" name="user_answere" style=" position:absolute; left: 500px;" /><input type="hidden" name="answere" value="<?php // echo $answere; ?>" /><br />-->
<input type="submit" value="Envoyer" style=" position:absolute; left: 500px;" />
</form>
</div>



</div><!-- FIN DU CORPS DE PAGE -->
</div>
<?php // DETECTION DES EVENEMENTS ET AFFICHAGE DES ALERTES EN CONSEQUENCES
if(isset($_GET['cap']) && ($_GET['cap'] == 1))
{
	echo '<SCRIPT language=javascript>alert("Votre calcul n\'est pas bon !");</SCRIPT>';
	unset($_GET['cap']);
}
if(isset($_GET['etat']) && ($_GET['etat'] == 1))
{
	echo '<SCRIPT language=javascript>alert("Mot de passe modifié !");</SCRIPT>';
	unset($_GET['etat']);
}
if(isset($_GET['etat']) && ($_GET['etat'] == 0))
{
	echo '<SCRIPT language=javascript>alert("Ancien mot de passe invalide");</SCRIPT>';
	unset($_GET['etat']);
}
if(isset($_GET['etat']) && ($_GET['etat'] == 2))
{
	echo '<SCRIPT language=javascript>alert("Confirmation invalide");</SCRIPT>';
	unset($_GET['etat']);
}
if(isset($_GET['mail']) && ($_GET['mail'] == 1))
{
	echo '<SCRIPT language=javascript>alert("Votre @mail a bien été changée");</SCRIPT>';
	unset($_GET['mail']);
}
if(isset($_GET['err']) && ($_GET['err'] == 1))
{
	echo '<SCRIPT language=javascript>alert("Une erreur inconnue est survenue !");</SCRIPT>';
	unset($_GET['err']);
}
if(isset($_GET['ps']) && ($_GET['ps'] == 1))
{
	echo '<SCRIPT language=javascript>alert("Pseudo modifié !");</SCRIPT>';
	unset($_GET['err']);
}
?>
</body>
</html>