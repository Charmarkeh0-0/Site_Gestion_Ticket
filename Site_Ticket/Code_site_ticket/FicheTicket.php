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

            //recuperation des valeurs du tickets
            $IdTicket=$_POST['IdTicket'];
            $resultat3=mysqli_query($sum,"SELECT * FROM ticket WHERE IdTicket='$IdTicket';");
            while($ligne=mysqli_fetch_row($resultat3)){
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

        ?>        
        <!-- Content section-->
        <?php include 'NavBarCompte.php';?>
        <section class="py-5">
            <div class="content-wrapper pl-3" style="background: rgba(2.4, 36.1, 41.6, 0);">
                <div class="container-fluid" style="background: rgba(2.4, 36.1, 41.6, 0);padding-left: 10%; padding-right: 10%;">
                <?php include 'TopBar.php'; ?>
                    <center><div class="card-body rounded-bottom w-75 mt-4" style="background:whitesmoke;">
                    <table class="table table-bordered" style="color:blue;">
                    <thead>
                        <tr>
                        <th>ID : <?php echo $IdTicket;?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <?php 
                            $resultatClient=mysqli_query($sum,"SELECT * FROM utilisateur WHERE IdUtil='$IdClient';");
                            while($ligne=mysqli_fetch_row($resultatClient)){
                                $NomClient=$ligne[2];
                            }
                        ?>
                        <td style="color:midnightblue;text-align: left;">
                            <b style="">Nom client:</b>
                        </td>
                        <td style="color:midnightblue;text-align: right;">
                            <?php echo "$NomClient"; ?>
                        </td>
                        </tr>     
                        <tr>
                        <td style="color:midnightblue;text-align: left;">
                            <b style="">Probleme:</b>
                        </td>
                        <td style="color:midnightblue;text-align: right;">
                            <?php echo "$Probleme"; ?>
                        </td>
                        </tr>     
                        <tr>
                        <td style="color:midnightblue;text-align: left;">
                            <b style="">Produit:</b>
                        </td>
                        <td style="color:midnightblue;text-align: right;">
                            <?php echo "$Produit"; ?>
                        </td>
                        </tr>     
                        <tr>
                        <td style="color:midnightblue;text-align: left;">
                            <b style="">Id Service:</b>
                        </td>
                        <td style="color:midnightblue;text-align: right;">
                            <?php echo "$IdService"; ?>
                        </td>
                        </tr>     
                        <tr>
                        <td style="color:midnightblue;text-align: left;">
                            <b style="">Date de creation:</b>
                        </td>
                        <td style="color:midnightblue;text-align: right;">
                            <?php echo "$DateCreation"; ?>
                        </td>
                        </tr>     
                        <tr>
                        <td style="color:midnightblue;text-align: left;">
                            <b style="">Debut du probleme:</b>
                        </td>
                        <td style="color:midnightblue;text-align: right;">
                            <?php echo "$DateDebutProblem"; ?>
                        </td>
                        </tr>     
                        <tr>
                        <td style="color:midnightblue;text-align: left;">
                            <b style="">Impact sur le business:</b>
                        </td>
                        <td style="color:midnightblue;text-align: right;">
                            <?php echo "$ImpactBusiness"; ?>
                        </td>
                        </tr>     
                        <tr>
                        <td style="color:midnightblue;text-align: left;">
                            <b style="">Description:</b>
                        </td>
                        <td style="color:midnightblue;text-align: right;">
                            <?php echo "$Description"; ?>
                        </td>
                        </tr>
                        <tr>
                        <td style="color:midnightblue;text-align: left;">
                            <b style="">Derniere mise a jour:</b>
                        </td>
                        <td style="color:midnightblue;text-align: right;">
                            <?php echo "$DerniereMaJ"; ?>
                        </td>
                        </tr>     
                    </tbody>
                    </table>
                    <a href="Acceuil.php" class="btn text-white w-100" style="background:blue;">Retour </a>
                </div></center>
                </div>
            </div>    
        </section>
        <!-- Content section-->       
        <?php include 'FooterCompte.php';?>
    </body>
</html>
