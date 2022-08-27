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
    <body style="background-image: url('../Ressource/BG-Website.jpg');text-align:center;
  display:grid;
  grid-template-rows: auto 1fr auto;
  min-height:100vh;">
      
        <?php 
            //connexion
            $serveur="localhost";
            $utilisateur="root";
            $motDePasse="";
            $baseDeDonnee="Site_ticket";

            $sum=mysqli_connect($serveur,$utilisateur,$motDePasse,$baseDeDonnee);

            $resultat1=mysqli_query($sum,"SELECT * FROM ticket ORDER BY IdTicket DESC;");
          
            $i=1;

            while($ligne=mysqli_fetch_row($resultat1)) {

                ${"IdTicket".$i}=$ligne[0];
                ${"NomClient".$i}=$ligne[1];
                ${"EmailClient".$i}=$ligne[2];
                ${"TextTicket".$i}=$ligne[3];
                ${"DateTicket".$i}=$ligne[4];
                ${"IdAgent".$i}=$ligne[5];
                ${"EtatTicket".$i}=$ligne[6];
            
                $i++;
            }

            //Demande de compte

            if(isset($_POST['demande'])){

                $Nom=$_POST['Nom'];
                $Prenom=$_POST['Prenom'];
                $Email=$_POST['Email'];
                $Telephone=$_POST['NumeroTel'];
                $DateNaissance=$_POST['DateNaissance'];
                $Adresse=$_POST['Adresse'];
                $MotDePasse=$_POST['MotDePasse'];
                $NbTicket=0;
                $NbTicketEnCours=0;
                $NbTicketFinie=0;
                $Activer=0;
                $Role=$_POST['Role'];

                $resultat2=mysqli_query($sum,"INSERT INTO utilisateur (NomUtil,PrenomUtil,EmailUtil,TelephoneUtil,DateNaissance,AdresseUtil,MDPUtil,RoleUtil,NbTicket,NbTicketEnCours,NbTicketFinie,Activer) VALUES ('$Nom','$Prenom','$Email',$Telephone,'$DateNaissance','$Adresse','$MotDePasse','$Role','$NbTicket','$NbTicketEnCours','$NbTicketFinie','$Activer');");

                if($resultat2==0){
                    echo "Erreur";
                }else{
                    header("Location:Login.php");
                }

            }
        ?>
        <div class="wrapper">
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark " style="background: rgba(254, 254, 254, 0.6);">
            <div class="container">
                
                <div class="user-panel ml-3 ml-2 mt-1 mb-1  w-25  elevation-2 ">
                    <a href="AcceuilClient.php">
                    <ul class="navbar-nav">
                        <li class="nav-item mr-2">
                            <img height=150; src="../Ressource/Logo.png" alt="Djibouti Telecom" class=" elevation-3 ">
                        </li>
                    </ul></a>
                </div>
                
            </div>
        </nav>

        <!-- Content section-->
        
        <section class="py-5">
            <div class="container my-5">
                <div class="container-fluid border mt-5 w-50 rounded" style="background: rgba(255, 255 , 255, 0.6);">
                <form action="Login2.php" method="POST" style="max-width:480px;margin:auto;">
                    <h1 class="h3 mb-3 mt-3 font-weight-normal" style="color:blue;">Connexion</h1>
                    <input type="text" name="Identifiant" class="form-control mt-2" placeholder="Identifiant" required autofocus>
                    <input type="password" name="MotDePasse" class="form-control mt-2" placeholder="Mot de passe" required autofocus>
                    <div class="mt-3 pb-3">
                        <input type="submit" name="Connexion" value="Connexion" class="btn btn-lg btn-block elevation-3" style="width:100%; color: whitesmoke; background: blue;">
                </form>
                    <button type="button" class="btn mt-2 w-100" id="myBtn" style="color: blue; border-style: solid; border-color: blue;">
                        Demander un compte ?
                    </button>
                    </div>
                     
                    <!-- The Modal --> 
                    <div id="myModal" class="modal pt-5" >
                      <!-- Modal content -->
                      <div class="modal-content w-50" style="color:blue; margin:auto; background: rgba(2.4, 36.1, 41.6, 0); border-color: rgba(2.4, 36.1, 41.6, 0) ; box-shadow: 0 0 10px 0 black;">                       
                        <div class="card" height="100%">
                            <div class="card-header">
                              <b><span class="close" style="position:absolute; right:10px; font-size: 25px;">&times;</span></b>
                              <h3 class="card-title">Demander un compte</h3>
                            </div>
                          <!-- /.card-header -->
                          <div class="card-body " style="background: rgba(254, 254, 254, 0.6);" >
                            <form action="Login.php" method="post" style="max-width:480px;margin:auto;" >
                              <input type="text" name="Nom" class="form-control mt-3" placeholder="Nom" required autofocus>
                              <input type="text" name="Prenom" class="form-control mt-3" placeholder="Prenom" required autofocus>
                              <input type="text" name="Email" class="form-control mt-3" placeholder="Email" required autofocus>
                              <input type="text" name="NumeroTel" class="form-control mt-3" placeholder="Telephone" required autofocus>
                              <input type="date" name="DateNaissance" class="form-control mt-3" placeholder="Date de naissance">
                              <input type="text" name="Adresse" class="form-control mt-3" placeholder="Adresse">
                              <select name="Role" class="form-control mt-3" placeholder="Role">
                                  <option>Client</option>
                                  <option>Agent</option>
                              </select>
                              <input type="password" name="MotDePasse" class="form-control mt-3" placeholder="Mot de passe" required autofocus>
                              <div class="mt-3 pb-3">
                                <input type="submit" name="demande" value="Demander" class="btn btn-lg text-white btn-block" style="width:100%; background: blue;">
                              </div>
                            </form>
                          </div>
                          <!-- /.card-body -->
                        </div>
                      </div>
                    </div>
            </div>   
            <!-- Empty space -->
            <div style="height: 5rem"></div>
        </section>
        <!-- Content section-->
<div style="height: 10rem"></div>
</div>
        <!-- Footer-->
<footer class="py-4" style="background: rgba(254, 254, 254, 0.6); color: blue;  box-shadow: 0 0 25px 0 black;  flex-shrink: 0;">
    <div class="row" style="margin-left: 10%; margin-right: 10%;">
        <div class="col-4">
        <p>
            Djibouti Télécom innove sans cesse pour mettre à la disposition de ses clients les dernières technologies du secteur à des tarifs abordables. L’enseigne est devenu ainsi le tout premier opérateur à commercialiser la 4G+ (LTE Advanced ) dans la région.
        </p>
        </div>
        <div class="col">
        <p>
            <b>AGENCES</b><br>
            21 32 13 61 <br>
            Dim - Jeu: 08:00 - 17:00 <br>
        </p>
        </div>
        <div class="col">
            <b>CONTACT INFO</b><br>
            Adresse:<br>
            No.3, Boulevard Georges Pompidou DJ<br>
            Heures de travail:<br>
            Dim – Jeu: 08:00 – 17:00<br>
        </div>
        <div class="col">
            <b>TELEPHONE</b><br>
            12: Renseignement<br>
            13: Dérangements lignes fixe<br>
            21358585: ADSL, Problem d’internet<br>
        </div>
    </div>
</div>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
<!-- Modal -->
<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
        modal.style.display = "none";
        }
    }
</script>
    </body>
</html>
