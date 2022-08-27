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

            $resultat3=mysqli_query($sum,"SELECT * FROM utilisateur WHERE RoleUtil='Agent';");
            $NombreEmployer=0;
            while($ligne=mysqli_fetch_row($resultat3)){
                $NombreEmployer++;
            }

            //Activer un compte

            if(isset($_POST['Activer'])){
                $IdCompte=$_POST['IdCompte'];
                $Activation=$_POST['Activation'];

                $resultat4=mysqli_query($sum,"UPDATE utilisateur SET Activer='$Activation' WHERE IdUtil='$IdCompte';");

                header("Location:ListeAgent.php");
            }

            //Recherche de compte
            if(isset($_POST['Rechercher'])){
                $Needle=$_POST['NomCompte'];
            }else{
                $Needle="";
            }

        ?>        
        <div class="wrapper">
        <!-- Content section-->
        <?php include 'NavBarCompte.php';?>
        <section class="py-5" style="padding-left: 5%; padding-right: 5%;">
            <div class="content-wrapper pl-3" style="background: rgba(2.4, 36.1, 41.6, 0);">
                <?php include 'TopBar.php'; ?>
                <div class="card mt-4" style="color: blue;">
                    <div class="card-header rounded-top" style="height:70px;">
                        <h3 class="card-title" style="position:absolute; left: 20px;">Liste des comptes</h3>
                        <form method="post" action="ListeAgent.php" >
                            <input type="text" name="NomCompte" class="form-control w-25" style="position: absolute; right: 10%;" placeholder="Recherche nom ou prenom">
                            <input type="submit" name="Rechercher" class="btn" value="Rechercher" style="color:blue; background-color:whitesmoke ; border-style: solid; border-color: blue; position:absolute; right: 10px;">
                        </form>
                    </div>
                </div>
            </div>
                <div class="card-body rounded-bottom" style="background:whitesmoke;">
                    <table class="table table-bordered" style="color:blue;">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>E-mail</th>
                            <th>Telephone</th>
                            <th>Role</th>
                            <th>Activation</th>
                            <th>Desactivation</th>
                            <th>Supprimer</th>
                            <th>En savoir plus</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        //requete


                        $resultatS=mysqli_query($sum," SELECT * FROM utilisateur WHERE RoleUtil!='Directeur' AND NomUtil LIKE '%{$Needle}%' OR PrenomUtil LIKE '%{$Needle}%';");

                        //parcourir la requête 

                        while($ligne=mysqli_fetch_row($resultatS)) {

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
                            $ActiverTmp=$ligne[12];
                        ?>
                        <tr>
                        <td style="color:midnightblue;">
                            <?php echo "$IdUtilTmp"; ?>
                        </td>
                        <td style="color:midnightblue;">
                            <?php echo "$NomUtilTmp"; ?>
                        </td>
                        <td style="color:midnightblue;">
                            <?php echo "$PrenomUtilTmp"; ?>
                        </td>
                        <td style="color:midnightblue;">
                            <?php echo "$EmailUtilTmp"; ?>
                        </td>
                        <td style="color:midnightblue;">
                            <?php echo "$TelephoneUtilTmp"; ?>
                        </td>
                        <td style="color:midnightblue;">
                            <?php echo "$RoleUtilTmp"; ?>
                        </td>
                        <td>
                            <form method="post" action="ListeAgent.php">
                                <input type='hidden' name='IdCompte' value='<?php echo $IdUtilTmp; ?>'> 
                           <?php 
                                echo "<input type='hidden' name='Activation' value=1>";
                                if($ActiverTmp==0){
                                    echo "<input type='submit' name='Activer' value='Activer' class='btn bg-white' style='border-style: solid; border-color: blue; color:blue;'>";
                                }else{
                                    echo "<input type='submit' name='Activer' value='Activer' class='btn text-white' style='background-color:blue;'>";
                                }
                            ?>
                            </form>
                        </td>
                        <td>
                            <form method="post" action="ListeAgent.php">
                                <input type='hidden' name='IdCompte' value='<?php echo $IdUtilTmp; ?>'> 
                           <?php 
                                    echo "<input type='hidden' name='Activation' value=0>";
                                    if($ActiverTmp==0){
                                        echo "<input type='submit' name='Activer' value='Desactiver' class='btn text-white' style='background-color:blue;'>";
                                    }else{
                                        echo "<input type='submit' name='Activer' value='Desactiver' class='btn bg-white' style='border-style: solid; border-color: blue; color:blue;'>";
                                    }
                                    
                            ?>
                            </form>
                        </td>
                        <td>
                            <form method="post" action="SupprimerAgent.php">                        
                            <input type="hidden" name="NomUtil" value="<?php echo "$NomUtilTmp";?>" >
							<input type="hidden" name="IdUtil" value="<?php echo "$IdUtilTmp";?>" >
                            <input type="image" name="Supprimer"  value="Supprimer" src="../Ressource/delete-left-solid.png" alt="submit" width="40" height="40" style="position:relative; left:20px;">
                            </form>
                        </td>
                        <td>
                            <form method="post" action="FicheAgent.php">                        
                            <input type="hidden" name="IdCompte" value="<?php echo "$IdUtilTmp";?>" >
                            <input type="image" name="Fiche"  value="Fiche" src="../Ressource/circle-info-solid.png" alt="submit" width="40" height="40" style="position:relative; left:20px;">
                            </form>
                        </td>
                        <?php } ?>
                    </tbody>
                    </table>
                </div>
                </div>
            </div>    
        </section>       
        <!-- Content section-->
        <?php include 'FooterCompte.php';?>
    </div>
    </body>
</html>