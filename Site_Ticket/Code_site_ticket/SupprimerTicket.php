<?php

//connexion
$serveur="localhost";
$utilisateur="root";
$motDePasse="";
$baseDeDonnee="Site_ticket";

$sum=mysqli_connect($serveur,$utilisateur,$motDePasse,$baseDeDonnee);

session_start();
$Id=$_SESSION['Id'];

$IdTicket=$_POST['IdTicket'];
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

$DerniereMaJ=date("Y-m-d");

if($Status=='En cours'){
    $resultat1=mysqli_query($sum,"UPDATE utilisateur SET NbTicketEnCours=NbTicketEnCours-1, Nbticket=NbTicket-1 WHERE IdUtil='$IdAgent';");
    $resultat2=mysqli_query($sum,"UPDATE utilisateur SET NbTicketEnCours=NbTicketEnCours-1, Nbticket=NbTicket-1 WHERE IdUtil='$IdClient';");
    $resultat3=mysqli_query($sum,"UPDATE utilisateur SET NbTicketEnCours=NbTicketEnCours-1, Nbticket=NbTicket-1 WHERE RoleUtil='Directeur';");
}else if($Status=='Finie'){
    $resultat1=mysqli_query($sum,"UPDATE utilisateur SET NbTicketFinie=NbTicketFinie-1, Nbticket=NbTicket-1 WHERE IdUtil='$IdAgent';");
    $resultat2=mysqli_query($sum,"UPDATE utilisateur SET NbTicketFinie=NbTicketFinie-1, Nbticket=NbTicket-1 WHERE IdUtil='$IdClient';");
    $resultat3=mysqli_query($sum,"UPDATE utilisateur SET NbTicketFinie=NbTicketFinie-1, Nbticket=NbTicket-1 WHERE RoleUtil='Directeur';");
}else{
    $resultat1=mysqli_query($sum,"UPDATE utilisateur SET Nbticket=NbTicket-1 WHERE IdUtil='$IdAgent';");
    $resultat2=mysqli_query($sum,"UPDATE utilisateur SET Nbticket=NbTicket-1 WHERE IdUtil='$IdClient';");
    $resultat3=mysqli_query($sum,"UPDATE utilisateur SET Nbticket=NbTicket-1 WHERE RoleUtil='Directeur';");
}
$resultat4=mysqli_query($sum,"DELETE FROM ticket WHERE IdTicket='$IdTicket';");

$resultat5=mysqli_query($sum,"UPDATE ticket SET DerniereMaJ='$DerniereMaJ' WHERE IdTicket='$IdTicket';");

if($Location=='Acceuil.php'){
    header("Location:Acceuil.php");
}else if($Location=='TicketEnCours.php'){
    header("Location:TicketEnCours.php");
}else{
    header("Location:TicketFinie.php");
}

?>