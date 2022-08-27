<!-- Empty space -->
<div style="height: 10rem"></div>
<!-- Footer-->
<footer class="py-4" style="background: rgba(254, 254, 254, 0.6); color: blue;  box-shadow: 0 0 25px 0 black;  flex-shrink: 0;">
    <div class="row" style="margin-left: 5%; margin-right: 0%;">
        <div class="col-7">
        <p>
            Djibouti Télécom innove sans cesse pour mettre à la disposition de ses clients les dernières technologies du secteur à des tarifs abordables. L’enseigne est devenu ainsi le tout premier opérateur à commercialiser la 4G+ (LTE Advanced ) dans la région.
        </p>
        </div>
        <div class="col-2">
            <p>
                <b>Adresse:</b>
                No.3, Boulevard Georges Pompidou DJ<br>
                <b>Heures de travail:</b>
                Dim – Jeu: 08:00 – 17:00
            </p>
        </div>
        <div class="col-2">
            <p>
                <b>Numéros de téléphone:</b>
                12: Renseignement
                13: Dérangements lignes fixe
                21358585: ADSL, Problem d’internet
            </p>
        </div>
    </div>
</footer>
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
<script>
    /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
    function myFunction() {
      document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown menu if the user clicks outside of it
    window.onclick = function(event) {
      if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }
</script>