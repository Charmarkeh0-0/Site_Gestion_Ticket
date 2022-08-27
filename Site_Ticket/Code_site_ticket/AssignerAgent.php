<?php 
//connexion
$serveur="localhost";
$utilisateur="root";
$motDePasse="";
$baseDeDonnee="Site_ticket";

$sum=mysqli_connect($serveur,$utilisateur,$motDePasse,$baseDeDonnee);

//Ouverture de la session
session_start();
$Id=$_SESSION['Id'];

$IdTicket=$_POST['IdTicket'];
$Agent=$_POST['Agent'];
$Location=$_POST['Location'];

$resultat=mysqli_query($sum,"SELECT * FROM ticket WHERE IdTicket='$IdTicket';");
while($ligne=mysqli_fetch_row($resultat)){
    $IdTicket=$ligne[0];
    $Status=$ligne[1];
    $Probleme=$ligne[2];
    $ProblemeBool=$ligne[3];
    $Produit=$ligne[4];
    $IdService=$ligne[5];
    $DateCreation=$ligne[6];
    $DateDebutProblem=$ligne[7];
    $ImpactBusiness=$ligne[8];
    $Description=$ligne[9];
    $DerniereMaJ=$ligne[10];
    $IdAgent=$ligne[11];
    $IdClient=$ligne[12];
}


$resultat1=mysqli_query($sum,"SELECT * FROM utilisateur WHERE PrenomUtil='$Agent';");
while($ligne=mysqli_fetch_row($resultat1)){
    $IdUtil=$ligne[0];
    $NomUtil=$ligne[1];
    $PrenomUtil=$ligne[2];
    $EmailUtil=$ligne[3];
    $TelephoneUtil=$ligne[4];
    $DateNaissanceUtil=$ligne[5];
    $AdresseUtil=$ligne[6];
    $MDPUtil=$ligne[7];
    $RoleUtil=$ligne[8];
    $NbTicket=$ligne[9];
    $NbTicketEnCours=$ligne[10];
    $NbTicketFinie=$ligne[11];
}

$resultat2=mysqli_query($sum,"UPDATE ticket SET IdAgent='$IdUtil' WHERE IdTicket='$IdTicket';");
$resultat3=mysqli_query($sum,"UPDATE utilisateur SET NbTicket=NbTicket+1 , NbTicketEnCours=NbTicketEnCours+1 WHERE IdUtil='$IdUtil';");
$resultat4=mysqli_query($sum,"UPDATE utilisateur SET NbTicketEnCours=NbTicketEnCours+1 WHERE RoleUtil='Directeur';");
$resultat4=mysqli_query($sum,"UPDATE utilisateur SET NbTicketEnCours=NbTicketEnCours+1 WHERE IdUtil='$IdClient';");
$resultat5=mysqli_query($sum,"UPDATE ticket SET Status='En cours' WHERE IdTicket='$IdTicket';");
$DerniereMaJ=date("Y-m-d");
$resultat6=mysqli_query($sum,"UPDATE ticket SET DerniereMaJ='$DerniereMaJ' WHERE IdTicket='$IdTicket';");

header("Location:".$Location);

                            
?>