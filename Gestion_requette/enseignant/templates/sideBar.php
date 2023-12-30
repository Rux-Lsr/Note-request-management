
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-lg navbar-fixed bg-light "  id="sidenavAccordion" style="box-shadow: 10px 0px 10px 0px rgba(0,0,0,0.1);">
        <div class="sb-sidenav-menu" >
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Acceuil</div>
                <a class="nav-link" href="index.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Tableau de bord
                </a>
                <a class="nav-link" href="barbillard.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Barbillard
                </a>
                   
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <?php 
            if (isset($_SESSION['user'])){
                echo $_SESSION['user']['nom_enseignant'];
                echo "-";
                echo $_SESSION['user']['email_enseignant'];
            }else
                echo "Enseignant - NON AUTORISE";
            ?>
        </div>
    </nav>
</div>