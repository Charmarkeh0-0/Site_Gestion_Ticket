<?php
    //partie connexion

    $serveur="localhost";
    $utilisateur="root";
    $motDePasse="";
    $base="Site_ticket";

    $sum=mysqli_connect($serveur,$utilisateur,$motDePasse,$base);

    //partie recuperer

    $Identifiant=$_POST["Identifiant"];
    $MotDePasse=$_POST["MotDePasse"];


    //requete

    $resultat=mysqli_query($sum,"SELECT * FROM utilisateur WHERE PrenomUtil='$Identifiant' AND MDPUtil='$MotDePasse';");
    
    while($ligne=mysqli_fetch_row($resultat)){
        $IdUtil=$ligne[0];
        $NomUtil=$ligne[1];
        $PrenomUtil=$ligne[2];
        $EmailUtil=$ligne[3];
        $TelephoneUtil=$ligne[4];
        $DateNaissanceUtil=$ligne[5];
        $AdresseUtil=$ligne[6];
        $MDPUtil=$ligne[7];
        $RoleUtil=$ligne[8];
        $NombreTicket=$ligne[9];
        $NombreTicketEnCours=$ligne[10];
        $NombreTicketFinie=$ligne[11];
    }   

    $resultat2=mysqli_query($sum,"SELECT * FROM utilisateur WHERE PrenomUtil='$Identifiant' AND MDPUtil='$MotDePasse' AND Activer=1;");
    //verification

    if(mysqli_fetch_row($resultat2)==0){
        header("Location:LogIn.php");
    }else{            
        session_start();
        $_SESSION['Id']= $IdUtil;
        header("Location:updateUsers.php");
    }
?>