<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Compte agent | Djibouti telecom</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="../bootstrap-5.1.3-dist/css/bootstrap.css"/>
    </head>
    <body style="background-image: url('../Ressource/BG-Website.jpg');">
      
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

            //recuperation des valeurs de l'utilisateur actuel
            $resultat2=mysqli_query($sum,"SELECT * FROM utilisateur WHERE IdUtil='$Id'");
            while($ligne=mysqli_fetch_row($resultat2)){
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

            //Partie Directeur
            //Recuperation du nombre de compte pour le directeur
            $resultat3=mysqli_query($sum,"SELECT COUNT(*) FROM utilisateur WHERE RoleUtil!='Directeur';");
            while($ligne=mysqli_fetch_row($resultat3)){
                $NombreDeCompte=$ligne[0];
            }

            //Assigner un ticket a un agent (php)
            if(isset($_POST['Assigner'])){
                $Assigner=$_POST['agent'];
                $IdTicket=$_POST['IdTicket'];

                $resultat4=mysqli_query($sum,"SELECT * FROM utilisateur WHERE NomUtil='$Assigner';");
                while($ligne=mysqli_fetch_row($resultat4)){
                    $IdUtilTmp2=$ligne[0];
                }
                mysqli_query($sum,"UPDATE ticket SET IdAgent='$IdUtilTmp2' WHERE IdTicket='$IdTicket';");
                mysqli_query($sum,"UPDATE utilisateur SET NbTicketEnCours=NbTicketEnCours+1 AND NbTicket=NbTicket+1 WHERE IdUtil='$IdUtilTmp2';");
                mysqli_query($sum,"UPDATE utilisateur SET NbTicketEnCours=NbTicketEnCours+1 WHERE RoleUtil='Directeur';");
            }

            //Recherche de compte
            if(isset($_POST['Rechercher'])){
                $Needle=$_POST['NomCompte'];
            }else{
                $Needle="";
            }

        ?>        
        <!-- Content section-->
        <?php include 'NavBarCompte.php';?>
        <section class="py-5">
            <div class="content-wrapper pl-3" style="background: rgba(2.4, 36.1, 41.6, 0);">
                <div class="container-fluid" style="background: rgba(2.4, 36.1, 41.6, 0);padding-left: 5%; padding-right: 5%;">
                <?php include 'TopBar.php'; ?>
                <div class="card mt-4" style="color: blue;">
                    <div class="card-header rounded-top" style="height:70px;">
                        <h3 class="card-title" style="position:absolute; left: 20px;">Ticket en cours</h3>
                        <form method="post" action="TicketEnCours.php" >
                            <input type="text" name="NomCompte" class="form-control w-25" style="position: absolute; right: 10%;" placeholder="ex: id , probleme , produit">
                            <input type="submit" name="Rechercher" class="btn" value="Rechercher" style="color:blue; background-color:whitesmoke ; border-style: solid; border-color: blue; position:absolute; right: 5px;">
                        </form>
                    </div>
                    <div class="card-body rounded-bottom mt-4" style="background:whitesmoke;">
                    <table class="table table-bordered" style="color:blue;">
                    <thead>
                        <tr>
                        <th style="width: 50px">Nom Agent</th>
                        <th style="width: 50px">Id Ticket</th>
                        <th>Status</th>
                        <th>Probleme</th>
                        <th>Produit</th>
                        <th>Id Service</th>
                        <th>Creation</th>
                        <th>Debut du probleme</th>
                        <th>Mise a jour </th>
                        <th style="width: 100px">Supprimer</th>
                        <th style="width: 100px">En savoir plus</th>
                        </tr>
                    </thead>

                    <?php 
                        //Recuperation de tout les tickets
                        $resultat1=mysqli_query($sum,"SELECT * FROM ticket WHERE IdTicket LIKE '%{$Needle}%' OR Probleme LIKE '%{$Needle}%' OR Produit LIKE '%{$Needle}%' ORDER BY DateCreation DESC;");

                        while($ligne=mysqli_fetch_row($resultat1)){

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
                            

                            if($Status=="En cours" && $IdClient==$IdUtil && $IdAgent!=NULL){

                    ?>
                    <!--Tableau des tickets pour client-->
                    <tbody>
                        <tr>
                        <?php 
                            $resultatClient=mysqli_query($sum,"SELECT * FROM utilisateur WHERE IdUtil='$IdAgent';");
                            while($ligne=mysqli_fetch_row($resultatClient)){
                                $NomAgent=$ligne[2];
                            }
                        ?>                     
                        <td style="color:midnightblue;">
                            <?php echo "$NomAgent"; ?>
                        </td>
                        <td style="color:midnightblue;">
                            <?php echo "$IdTicket"; ?>
                        </td>
                        <td style="color:midnightblue;">
                            <?php echo "$Status"; ?>
                        </td>
                        <td style="color:midnightblue;">
                            <?php echo "$Probleme"; ?><br>
                        </td>
                        <td style="color:midnightblue;">
                            <?php echo "$Produit"; ?>
                        </td>
                        <td style="color:midnightblue;">
                            <?php echo "$IdService"; ?>
                        </td>
                        <td style="color:midnightblue;">
                            <?php echo "$DateCreation"; ?>
                        </td>
                        <td style="color:midnightblue;">
                            <?php echo "$DateDebutProblem"; ?>
                        </td>
                        <td style="color:midnightblue;">
                            <?php echo "$DerniereMaJ"; ?>
                        </td>
                        <td>
                            <form method="post" action="SupprimerTicket.php">                        
                            <input type="hidden" name="IdTicket" value="<?php echo "$IdTicket";?>" >
                            <input type="hidden" name="Location" value="TicketEnCours.php">
                            <input type="image" name="Supprimer"  value="Supprimer" src="../Ressource/delete-left-solid.png" alt="submit" width="40" height="40" style="position:relative; left:20px;">
                            </form>
                        </td>
                        <td>
                            <form method="post" action="FicheTicket.php">                        
                            <input type="hidden" name="IdTicket" value="<?php echo "$IdTicket";?>" >
                            <input type="image" name="Fiche"  value="Fiche" src="../Ressource/circle-info-solid.png" alt="submit" width="40" height="40" style="position:relative; left:20px;">
                            </form>
                        </td>
                        </tr>
                    </tbody>
                    

                    <?php
                            }else if($Status=="En cours" && $IdAgent!=NULL && $RoleUtil=='Directeur'){

                    ?>
                    <!--Tableau des tickets pour le directeur-->
                    <tbody>
                        <tr>
                        <?php 
                            $resultatClient=mysqli_query($sum,"SELECT * FROM utilisateur WHERE IdUtil='$IdAgent';");
                            while($ligne=mysqli_fetch_row($resultatClient)){
                                $NomAgent=$ligne[2];
                            }
                        ?>                     
                        <td style="color:midnightblue;">
                            <?php echo "$NomAgent"; ?>
                        </td>
                        <td style="color:midnightblue;">
                            <?php echo "$IdTicket"; ?>
                        </td>
                        <td style="color:midnightblue;">
                            <?php echo "$Status"; ?>
                        </td>
                        <td style="color:midnightblue;">
                            <?php echo "$Probleme"; ?><br>
                        </td>
                        <td style="color:midnightblue;">
                            <?php echo "$Produit"; ?>
                        </td>
                        <td style="color:midnightblue;">
                            <?php echo "$IdService"; ?>
                        </td>
                        <td style="color:midnightblue;">
                            <?php echo "$DateCreation"; ?>
                        </td>
                        <td style="color:midnightblue;">
                            <?php echo "$DateDebutProblem"; ?>
                        </td>
                        <td style="color:midnightblue;">
                            <?php echo "$DerniereMaJ"; ?>
                        </td>
                        <td>
                            <form method="post" action="SupprimerTicket.php">                        
                            <input type="hidden" name="IdTicket" value="<?php echo "$IdTicket";?>" >
                            <input type="hidden" name="Location" value="TicketEnCours.php">
                            <input type="image" name="Supprimer"  value="Supprimer" src="../Ressource/delete-left-solid.png" alt="submit" width="40" height="40" style="position:relative; left:20px;">
                            </form>
                        </td>
                        <td>
                            <form method="post" action="FicheTicket.php">                        
                            <input type="hidden" name="IdTicket" value="<?php echo "$IdTicket";?>" >
                            <input type="image" name="Fiche"  value="Fiche" src="../Ressource/circle-info-solid.png" alt="submit" width="40" height="40" style="position:relative; left:20px;">
                            </form>
                        </td>
                        </tr>
                    </tbody>
                    <?php
                            }}
                    ?>
                    </table>
                </div>
                </div>
            </div>    
        </section>
        <!-- Content section-->       
        <?php include 'FooterCompte.php';?>
    </body>
</html>
