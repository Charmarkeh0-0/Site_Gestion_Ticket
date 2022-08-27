<?php

//connexion
$serveur="localhost";
$utilisateur="root";
$motDePasse="";
$baseDeDonnee="Site_ticket";

$sum=mysqli_connect($serveur,$utilisateur,$motDePasse,$baseDeDonnee);

session_start();
$Id=$_SESSION['Id'];

$NomUtil=$_POST['NomUtil'];
$IdUtil=$_POST['IdUtil'];

$resultat5=mysqli_query($sum,"DELETE FROM utilisateur WHERE NomUtil='$NomUtil';");
$resultat6=mysqli_query($sum,"DELETE FROM ticket WHERE IdAgent='$IdUtil' OR IdClient='$IdUtil';");

header("Location:ListeAgent.php");

?>