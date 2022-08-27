<?php 
	//connexion
	$serveur="localhost";
	$utilisateur="root";
	$motDePasse="";
	$baseDeDonnee="Site_ticket";

	$sum=mysqli_connect($serveur,$utilisateur,$motDePasse,$baseDeDonnee);
	
	//Recuperation nombre de ticket total
	$query1 = mysqli_query($sum,"SELECT COUNT(*) FROM Ticket;");
	while($ligne=mysqli_fetch_row($query1)){
        $NbTicket=$ligne[0];
    }
	//Recuperation nombre de ticket en cours total
	$query2 = mysqli_query($sum,"SELECT COUNT(*) FROM Ticket WHERE Status='En cours';");
	while($ligne=mysqli_fetch_row($query2)){
        $NbTicketEnCours=$ligne[0];
    }
	//Recuperation nombre de ticket finie total
	$query3 = mysqli_query($sum,"SELECT COUNT(*) FROM Ticket WHERE Status='Finie';");
	while($ligne=mysqli_fetch_row($query3)){
        $NbTicketFinie=$ligne[0];
    }
	
	//Update director
	$query3 = mysqli_query($sum,"UPDATE utilisateur SET NbTicket='$NbTicket' , NbTicketEnCours='$NbTicketEnCours' , NbTicketFinie='$NbTicketFinie' WHERE RoleUtil='Directeur';");
	
	//Put all users in array
	$userList = array();
	$i = 0;
	$query4 = mysqli_query($sum,"SELECT * FROM utilisateur WHERE RoleUtil!='Directeur';");
	while($ligne=mysqli_fetch_row($query4)){
		$userList[$i]=$ligne[0];
		$i = $i+1;
    }	
	
	foreach($userList as $u){
		echo("User: ".$u." = ");
		//Recuperation nombre de ticket 
		$query5 = mysqli_query($sum,"SELECT COUNT(*) FROM ticket WHERE IdAgent=$u OR IdClient=$u;");
		while($ligne=mysqli_fetch_row($query5)){
			echo($ligne[0]." ");
			$NbTicketU=$ligne[0];
		}
		//Recuperation nombre de ticket en cours total
		$query6 = mysqli_query($sum,"SELECT COUNT(*) FROM ticket WHERE Status='En cours' AND IdAgent=$u OR Status='En cours' AND IdClient=$u;");
		while($ligne=mysqli_fetch_row($query6)){
			echo($ligne[0]." ");
			$NbTicketEnCoursU=$ligne[0];
		}
		//Recuperation nombre de ticket finie total
		$query7 = mysqli_query($sum,"SELECT COUNT(*) FROM ticket WHERE Status='Finie' AND IdAgent=$u OR Status='Finie' AND IdClient=$u;");
		while($ligne=mysqli_fetch_row($query7)){
			echo($ligne[0]."<br>");
			$NbTicketFinieU=$ligne[0];
		}
		
		//Update director
		$query8 = mysqli_query($sum,"UPDATE utilisateur SET NbTicket='$NbTicketU' , NbTicketEnCours='$NbTicketEnCoursU' , NbTicketFinie='$NbTicketFinieU' WHERE idUtil='$u';");
	}

	header("Location:Acceuil.php");
?>