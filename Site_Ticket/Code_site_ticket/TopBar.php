<?php 
	//Recuperer utilisateur
	$IdUtil = $_SESSION['Id'];
	
	//Recuperation du nombre de ticket 
	$NbTicket=0;
	$NbTicketEnCours=0;
	$NbTicketFinie=0;
	$query1 = mysqli_query($sum,"SELECT * FROM utilisateur WHERE idUtil = '$IdUtil';");
	while($ligne=mysqli_fetch_row($query1)){
        $NbTicket=$ligne[9];
		$NbTicketEnCours=$ligne[10];
		$NbTicketFinie=$ligne[11];
    }
	$NbTicketNA = $NbTicket -($NbTicketEnCours+$NbTicketFinie);
	//Recuperation du nombre de compte
	$query4 = mysqli_query($sum,"SELECT COUNT(*) FROM utilisateur");
	while($ligne=mysqli_fetch_row($query4)){
        $NombreDeCompte=$ligne[0];
    }
?>
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class=" col">
            <!-- small box -->
            <div class="container-fluid rounded" style="background: rgba(254, 254, 254, 1);">
                <div class="inner pt-3 pb-3 " style="color:blue;">
                    <?php if($RoleUtil=='Agent'){?>
                        <h5>  Ticket en cours: <?php echo $NbTicketEnCours ;?></h5>
                    <?php }else{ ?>
                        <h5>  Ticket non assigner: <?php echo $NbTicketNA ;?></h5>
                    <?php } ?>
                    <a href="Acceuil.php" class="btn btn-white w-100" style="color: blue ; border-style:solid; border-color:blue;"> Voir Plus</a>
                </div>
            </div>
        </div>
    <?php if($RoleUtil!='Agent'){ ?>
        <div class=" col">
            <!-- small box -->
            <div class="container-fluid rounded" style="background: rgba(254, 254, 254, 1);">
                <div class="inner pt-3 pb-3 " style="color:blue;">
                    <h5>  Ticket en cours: <?php echo $NbTicketEnCours ;?></h5>
                    <a href="TicketEnCours.php" class="btn btn-white w-100" style="color: blue ; border-style:solid; border-color:blue;"> Voir Plus</a>
                </div>
            </div>
        </div>
    <?php } ?>
        <div class="col">
            <!-- small box -->
            <div class="container-fluid rounded" style="background: rgba(254, 254, 254, 1);">
                <div class="inner pt-3 pb-3 " style="color:blue;">
                    <h5>  Ticket finie: <?php echo $NbTicketFinie ;?></h5>
                    <a href="TicketFinie.php" class="btn btn-white w-100" style="color: blue ; border-style:solid; border-color:blue;"> Voir Plus</a>
                </div>
            </div>
        </div>
        <?php if($RoleUtil=="Directeur"){?>
        <div class="col">
            <!-- small box -->
            <div class="container-fluid rounded" style="background: rgba(254, 254, 254, 1);">
                <div class="inner pt-3 pb-3 " style="color:blue;">
                    <h5> Nombre de compte : <?php echo $NombreDeCompte ;?></h5>
                    <a href="ListeAgent.php" class="btn btn-white w-100" style="color: blue ; border-style:solid; border-color:blue;"> Voir Plus</a>
                </div>
            </div>
        </div>
        <?php } ?>
</div>