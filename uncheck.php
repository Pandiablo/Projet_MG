<?php
session_start();

unset($_SESSION['pseudo'], $_SESSION['mdp']);

header("Location:index.php");




?>