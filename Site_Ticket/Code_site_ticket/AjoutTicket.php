<?php
    $serveur="localhost";
    $utilisateur="root";
    $motDePasse="";
    $baseDeDonnee="Site_ticket";

    $sum=mysqli_connect($serveur,$utilisateur,$motDePasse,$baseDeDonnee);

    session_start();
    $Id=$_SESSION['Id'];


    $Status="Non assigner";
    $Probleme=$_POST['Probleme'];
    $ProblemeBool="Oui";
    $Produit=$_POST['Produit'];
    $IdService=$_POST['IdService'];
    $DateCreation=date("Y-m-d");
    $DateDebutProblem=$_POST["DebutProbleme"];
    $ImpactBusiness=$_POST["ImpactBusiness"];
    $Description=$_POST["Description"];
    $DerniereMaJ=date("Y-m-d");


    $resultat=mysqli_query($sum,"INSERT INTO ticket(Status,Probleme,ProblemeBool,Produit,IdService,DateCreation,DateDebutProblem,ImpactBusiness,Description,DerniereMaJ,IdClient) 
        VALUES ('$Status','$Probleme','$ProblemeBool','$Produit','$IdService','$DateCreation','$DateDebutProblem','$ImpactBusiness','$Description','$DerniereMaJ','$Id');");

    $resultat2=mysqli_query($sum,"UPDATE utilisateur SET NbTicket=NbTicket+1 WHERE RoleUtil='Directeur';");
    $resultat3=mysqli_query($sum,"UPDATE utilisateur SET NbTicket=NbTicket+1 WHERE idUtil='$Id';");
    $DerniereMaJ=date("Y-m-d");
    $resultat6=mysqli_query($sum,"UPDATE ticket SET DerniereMaJ='$DerniereMaJ' WHERE IdTicket='$IdTicket';");

    header("Location:Acceuil.php");

?>