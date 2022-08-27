<style>
/* Dropdown Button */
.dropbtn {
  background-color: rgba(254, 254, 254, 0.6);
  color: white;
  padding: 16px;
  font-size: 16px;
  border: white;
  cursor: pointer;
  border-radius: 25px;
  box-shadow: 0 0 15px 0 black;
}

/* Dropdown button on hover & focus */
.dropbtn:hover, .dropbtn:focus {
  background-color: blue;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  left: -28%;
  background-color: rgba(0,0,0,0);
  min-width: 100px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd}

/* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
.show {display:block;}
</style>
<?php
    if(!isset($_SESSION['Id'])){
        header("Location:Login.php");
    }
?>
<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark " style="background: rgba(254, 254, 254, 0.6);  box-shadow: 0 0 25px 0 black; flex-shrink: 0;">
    <div class="container">
        
        <div class="user-panel ml-3 ml-2 mt-1 mb-1  w-25  elevation-2 ">
            <a href="Acceuil.php">
            <ul class="navbar-nav">
                <li class="nav-item mr-2">
                    <img height=150; src="../Ressource/Logo.png" alt="Djibouti Telecom" class=" elevation-3 ">
                </li>
            </ul></a>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="position: absolute; right: 10%;">
           <div class="dropdown">
          <img onclick="myFunction()" class="dropbtn" src="../Ressource/PhotoCompte.png" height=75>
          </img>
          <div id="myDropdown" class="dropdown-content" style="text-align: left;">
            <a class="btn nav-link bg-light w-100 mt-1" href="Profil.php" style="border-style: solid; border-color:blue; color: blue;">Profil</a>
            <form action="Deconnexion.php" method="post">
                <input type="submit" class="btn nav-link text-light w-100 mt-1" style="background: blue;" value="Deconnexion">
            </form>
          </div>
        </div> 
        </div>
        
    </div>
</nav>
