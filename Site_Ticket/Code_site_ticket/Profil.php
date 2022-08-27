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
        <link rel="stylesheet" href="C:\Users\chark\Desktop\AdminLTE-3.2.0\dist\css\adminlte.min.css"/>
    </head>
    <body style="background-image: url('../Ressource/BG-Website.jpg');">
      <?php
          $serveur="localhost";
          $utilisateur="root";
          $motDePasse="";
          $baseDeDonnee="Site_ticket";

          $sum=mysqli_connect($serveur,$utilisateur,$motDePasse,$baseDeDonnee);

          session_start();
          $Id=$_SESSION['Id'];

          $resultat2=mysqli_query($sum,"SELECT * FROM utilisateur WHERE idUtil='$Id'");

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
              $Activer=$ligne[12];
        }

          if(isset($_POST['Modifier'])){ 

              $NomUtilTmp=$_POST['Nom'];
              $PrenomUtilTmp=$_POST['Prenom'];
              $EmailUtilTmp=$_POST['Email'];
              $TelephoneUtilTmp=$_POST['NumeroTel'];
              $MDPUtilTmp=$_POST['MotDePasse'];

              mysqli_query($sum,"UPDATE utilisateur SET NomUtil='$NomUtilTmp', PrenomUtil='$PrenomUtilTmp', EmailUtil='$EmailUtilTmp', TelephoneUtil='$TelephoneUtilTmp', MDPUtil='$MDPUtilTmp'   WHERE idUtil='$Id';");

              header("Location:Profil.php");

          }
      ?>
        <?php include 'NavBarCompte.php';?>
        <!-- Content section-->
        
        <section class="py-5">
            <div class="content-wrapper pl-3" style="background: rgba(2.4, 36.1, 41.6, 0);padding-right: 5%; padding-left: 5%;">
              <?php include 'TopBar.php'; ?>
                <div class="card mt-3">
            <div class="card-header bg-light" style="color:blue; height: 70px;">
                  <h2 class="card-title" style="position:absolute; left:20px">A propos de vous</h2>
                    <button type="button" class="btn mt-2" id="myBtn" style="position:absolute; right:10px; color: blue; border-style: solid; border-color: blue;">
                        Modifier
                    </button>
                    <!-- The Modal --> 
                    <div id="myModal" class="modal pt-5"  >
                      <!-- Modal content -->
                      <div class="modal-content w-50" style="color:blue; margin:auto; background: rgba(2.4, 36.1, 41.6, 0); border-color: rgba(2.4, 36.1, 41.6, 0); box-shadow: 0 0 10px 0 black;">                       
                        <div class="card" height="100%">
                            <div class="card-header">
                              <b><span class="close" style="position:absolute; right:10px; font-size: 25px;">&times;</span></b>
                              <h3 class="card-title">Modification profil</h3>
                            </div>
                          <!-- /.card-header -->
                          <div class="card-body w-75" style="background: rgba(254, 254, 254, 0.6);" >
                            <form action="Profil.php" method="post" style="max-width:480px;margin:auto; color:gray;" >

                              <p style="position: absolute; left: 20px;">Nom:</p><input type="text" name="Nom" class="form-control mt-3" value="<?php echo $NomUtil ;?>" placeholder="Prenom" style="margin-left: 25%;">
                              <p class="mt-3" style="position: absolute; left: 20px;">Prenom:</p><input type="text" name="Prenom" class="form-control mt-3" value="<?php echo $PrenomUtil; ?>" placeholder="Nom" style="margin-left: 25%;">
                              <p class="mt-3" style="position: absolute; left: 20px;">Email:</p><input type="text" name="Email" class="form-control mt-3" value="<?php echo $EmailUtil; ?>" placeholder="Email" style="margin-left: 25%;">
                              <p class="mt-3" style="position: absolute; left: 20px;">Telephone:</p><input type="text" name="NumeroTel" class="form-control mt-3" value="<?php echo $TelephoneUtil; ?>" placeholder="Date de naissance" style="margin-left: 25%;">
                              <p class="mt-3" style="position: absolute; left: 20px;">Mot de passe:</p><input type="password" name="MotDePasse" class="form-control mt-3" value="<?php echo $MDPUtil; ?>" placeholder="Adresse" style="margin-left: 25%;">
                              <div class="mt-3 pb-3">
                                <input type="submit" name="Modifier" value="Modifier" class="btn btn-lg text-white btn-block" style="width:100%; background: blue; margin-left: 25%;">
                              </div>
                            </form>
                          </div>
                          <!-- /.card-body -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="color:blue; background: rgba(2.4, 36.1, 41.6, 0); padding-left: 10%; padding-right: 10%;">
                <div class="container bg-white pt-3 pb-3 rounded">
                  <table class="table table-bordered rounded" style="color:blue; border-color:ghostwhite;">
                        <tr class="bg-light">
                        <th style="text-align: left;"><h2>Id compte:</h2></th>
                        <th style="text-align: right;"><h2><?php echo $IdUtil;?></h2></th>
                        </tr>
                        <h4><tr>
                        <td style="color:midnightblue;text-align: left;">
                            <b style="">Nom:</b>
                        </td>
                        <td style="color:midnightblue;text-align: right;">
                            <?php echo "$NomUtil"; ?>
                        </td>
                        </tr>                        
                        <tr>
                        <tr>
                        <td style="color:midnightblue;text-align: left;">
                            <b style="">Prenom:</b>
                        </td>
                        <td style="color:midnightblue;text-align: right;">
                            <?php echo "$PrenomUtil"; ?>
                        </td>
                        </tr>   
                        <tr>
                        <td style="color:midnightblue;text-align: left;">
                            <b style="">E-mail:</b>
                        </td>
                        <td style="color:midnightblue;text-align: right;">
                            <?php echo "$EmailUtil"; ?>
                        </td>
                        </tr>   
                        <tr>
                        <td style="color:midnightblue;text-align: left;">
                            <b style="">Telephone:</b>
                        </td>
                        <td style="color:midnightblue;text-align: right;">
                            <?php echo "$TelephoneUtil"; ?>
                        </td>
                        </tr>   
                        <tr>
                        <td style="color:midnightblue;text-align: left;">
                            <b style="">Date de naissance:</b>
                        </td>
                        <td style="color:midnightblue;text-align: right;">
                            <?php echo "$DateNaissanceUtil"; ?>
                        </td>
                        </tr>   
                        <tr>
                        <td style="color:midnightblue;text-align: left;">
                            <b style="">Adresse:</b>
                        </td>
                        <td style="color:midnightblue;text-align: right;">
                            <?php echo "$AdresseUtil"; ?>
                        </td>
                        </tr>   
                        <tr>
                        <h4><td style="color:midnightblue;text-align: left;">
                            <b style="">Mot de passe:</b>
                        </td></h4>
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
                            <form method="post" action="Profil.php">
                              <input type="submit" name="Dechiffrer" class=" btn bg-white" style="color:red; border-style:solid; border-color:red;" value="<?php echo $MDP ?>">
                            </form>
                            
                        </td>
                        </tr>
                        <h4><tr>
                        <td style="color:midnightblue;text-align: left;">
                            <b style="">Role:</b>
                        </td>
                        <td style="color:midnightblue;text-align: right;">
                            <?php echo "$RoleUtil"; ?>
                        </td>
                        </tr></h4>     
                    </table>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>    
        </section>
        
        <!-- Content section-->

        <?php include 'FooterCompte.php';?>
    </body>
</html>
