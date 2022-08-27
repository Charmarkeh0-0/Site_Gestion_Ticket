<?php

    //connexion
    $serveur="localhost";
    $utilisateur="root";
    $motDePasse="";
    $baseDeDonnee="Site_ticket";

    $sum=mysqli_connect($serveur,$utilisateur,$motDePasse,$baseDeDonnee);


    if(isset($_POST['Changer'])){
        $EtatTicket=$_POST['Changer'];
        $IdTicket=$_POST['IdTicket'];
        $Location=$_POST['Location'];

        session_start();
        $Id=$_SESSION['Id'];

        $resultat=mysqli_query($sum,"SELECT * FROM utilisateur WHERE IdUtil='$Id'");

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
                $NbTicket=$ligne[9];
                $NbTicketEnCours=$ligne[10];
                $NbTicketFinie=$ligne[11];

            }

            if($EtatTicket=='En cours'){
                $resultat2=mysqli_query($sum,"UPDATE ticket SET EtatTicket='Finie' WHERE IdTicket='$IdTicket'; ");
                $resultat3=mysqli_query($sum,"UPDATE utilisateur SET NbTicketEnCours=NbTicketEnCours+1 , NbTicketFinie=NbTicketFinie +1 WHERE IdUtil='$IdUtil';");
            }else{
                $resultat2=mysqli_query($sum,"UPDATE ticket SET EtatTicket='En cours' WHERE IdTicket='$IdTicket'; ");
                $resultat3=mysqli_query($sum,"UPDATE utilisateur SET NbTicketEnCours=NbTicketEnCours+1 , NbTicketFinie=NbTicketFinie +1' WHERE IdUtil='$IdUtil';");
            }

            $DerniereMaJ=date("Y-m-d");
            $resultat5=mysqli_query($sum,"UPDATE ticket SET DerniereMaJ='$DerniereMaJ' WHERE IdTicket='$IdTicket';");
    }
    
        header("Location:".$Location);

?>