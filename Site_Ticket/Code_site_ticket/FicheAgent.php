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
            $resultat1=mysqli_query($sum,"SELECT * FROM utilisateur WHERE IdUtil='$Id'");
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

            //recuperation des valeurs du compte selectionner
            if(isset($_POST['IdCompte'])){
                $IdCompte=$_POST['IdCompte'];
                $_SESSION['IdCompte']=$IdCompte;
            }else{
                $IdCompte=$_SESSION['IdCompte'];
            }
            
            $resultat2=mysqli_query($sum,"SELECT * FROM utilisateur WHERE IdUtil='$IdCompte'");
            while($ligne=mysqli_fetch_row($resultat2)){
                $IdUtilTmp=$ligne[0];
                $NomUtilTmp=$ligne[1];
                $PrenomUtilTmp=$ligne[2];
                $EmailUtilTmp=$ligne[3];
                $TelephoneUtilTmp=$ligne[4];
                $DateNaissanceUtilTmp=$ligne[5];
                $AdresseUtilTmp=$ligne[6];
                $MDPUtilTmp=$ligne[7];
                $RoleUtilTmp=$ligne[8];
                $NbTicketTmp=$ligne[9];
                $NbTicketEnCoursTmp=$ligne[10];
                $NbTicketFinieTmp=$ligne[11];
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
                        <th>Id compte: <?php echo $IdUtilTmp;?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td style="color:midnightblue;text-align: left;">
                            <b style="">Nom:</b>
                        </td>
                        <td style="color:midnightblue;text-align: right;">
                            <?php echo "$NomUtilTmp"; ?>
                        </td>
                        </tr>                        
                        <tr>
                        <tr>
                        <td style="color:midnightblue;text-align: left;">
                            <b style="">Prenom:</b>
                        </td>
                        <td style="color:midnightblue;text-align: right;">
                            <?php echo "$PrenomUtilTmp"; ?>
                        </td>
                        </tr>   
                        <tr>
                        <td style="color:midnightblue;text-align: left;">
                            <b style="">E-mail:</b>
                        </td>
                        <td style="color:midnightblue;text-align: right;">
                            <?php echo "$EmailUtilTmp"; ?>
                        </td>
                        </tr>   
                        <tr>
                        <td style="color:midnightblue;text-align: left;">
                            <b style="">Telephone:</b>
                        </td>
                        <td style="color:midnightblue;text-align: right;">
                            <?php echo "$TelephoneUtilTmp"; ?>
                        </td>
                        </tr>   
                        <tr>
                        <td style="color:midnightblue;text-align: left;">
                            <b style="">Date de naissance:</b>
                        </td>
                        <td style="color:midnightblue;text-align: right;">
                            <?php echo "$DateNaissanceUtilTmp"; ?>
                        </td>
                        </tr>   
                        <tr>
                        <td style="color:midnightblue;text-align: left;">
                            <b style="">Adresse:</b>
                        </td>
                        <td style="color:midnightblue;text-align: right;">
                            <?php echo "$AdresseUtilTmp"; ?>
                        </td>
                        </tr>   
                        <tr>
                        <td style="color:midnightblue;text-align: left;">
                            <b style="">Mot de passe:</b>
                        </td>
                        <td style="color:midnightblue;text-align: right;">
                            <?php 
                              $MDPChiffrer='';
                              $MDP='';
                              $Size=strlen($MDPUtil); 
                              for($i=0;$i<$Size;$i++){
                                $MDPChiffrer.='*';
                              }

                              if(isset($_POST['Dechiffrer'])){
                                if(strcmp($_POST['Dechiffrer'], $MDPUtil) == 0){
                                  $MDP=$MDPChiffrer;
                                }else{
                                  $MDP=$MDPUtil;
                                }
                              }else{
                                $MDP=$MDPChiffrer;
                              }
                            ?>
                            <form method="post" action="FicheAgent.php">
                              <input type="submit" name="Dechiffrer" class=" btn bg-white" style="color:red; border-style:solid; border-color:red;" value="<?php echo $MDP ?>">
                            </form>
                        </td>
                        </tr>   
                        <tr>
                        <td style="color:midnightblue;text-align: left;">
                            <b style="">Role:</b>
                        </td>
                        <td style="color:midnightblue;text-align: right;">
                            <?php echo "$RoleUtilTmp"; ?>
                        </td>
                        </tr>   
                        <tr>
                        <td style="color:midnightblue;text-align: left;">
                            <b style="">Nombre de ticket total:</b>
                        </td>
                        <td style="color:midnightblue;text-align: right;">
                            <form method="post" action="ListeTicketCompte.php">
                                <input type="hidden" name="IdCompte" value="<?php echo $IdUtilTmp; ?>">
                                <input type="hidden" name="Type" value="NombreTotal">
                                <input type="submit" name="NbTicketCompte" class="btn bg-white" style="color:blue; border-style: solid; border-color:blue;" value="<?php echo $NbTicketTmp; ?>">                        
                            </form>
                        </td>
                        </tr>   
                        <tr>
                        <td style="color:midnightblue;text-align: left;">
                            <b style="">Nombre de ticket en cours:</b>
                        </td>
                        <td style="color:midnightblue;text-align: right;">
                            <form method="post" action="ListeTicketCompte.php">
                                <input type="hidden" name="IdCompte" value="<?php echo $IdUtilTmp; ?>">
                                <input type="hidden" name="Type" value="NombreEnCours">
                                <input type="submit" name="NbTicketCompte" class="btn bg-white" style="color:blue; border-style: solid; border-color:blue;" value="<?php echo $NbTicketEnCoursTmp; ?>">                        
                            </form>
                        </td>
                        </tr>   
                        <tr>
                        <td style="color:midnightblue;text-align: left;">
                            <b style="">Nombre de ticket finie:</b>
                        </td>
                        <td style="color:midnightblue;text-align: right;">
                             <form method="post" action="ListeTicketCompte.php">
                                <input type="hidden" name="IdCompte" value="<?php echo $IdUtilTmp; ?>">
                                <input type="hidden" name="Type" value="NombreFinie">
                                <input type="submit" name="NbTicketCompte" class="btn bg-white" style="color:blue; border-style: solid; border-color:blue;" value="<?php echo $NbTicketFinieTmp; ?>">                        
                            </form>
                        </td>
                        </tr>   
                    </tbody>
                    </table>
                    <a href="ListeAgent.php" class="btn text-white w-100" style="background:blue;">Retour </a>
                </div></center>
                </div>
            </div>    
        </section>
        <!-- Content section-->       
        <?php include 'FooterCompte.php';?>
    </body>
</html>
