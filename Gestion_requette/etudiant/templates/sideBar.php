
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-lg navbar-fixed" id="sidenavAccordion" style="box-shadow: 10px 0px 10px 0px rgba(0,0,0,0.1);">
        <div class="sb-sidenav-menu" >
            <div class="nav" >
                <div class="sb-sidenav-menu-heading">Acceuil</div>
                <a class="nav-link" href="index.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Tableau de bord
                </a>
                <a class="nav-link" href="barbillard.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Barbillard
                </a>
                <div class="sb-sidenav-menu-heading">Outils</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Edition de requette
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="redaction.php">Redaction</a>
                        <a class="nav-link" href="trash-req.php">requettes rejetées</a>

                    </nav>
                </div> 
                <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Administrateur
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>  
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="redaction.php">Redaction</a>
                        <a class="nav-link" href="trash-req.php">requettes rejetées</a>

                    </nav>
                </div>   -->
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Connecté en tant que:</div>
            <?php 
            if (isset($_SESSION['user'])){
                echo $_SESSION['user']['nom'];
                echo "-";
                echo $_SESSION['user']['matricule_Etudiant'];
            }else
                echo "Etudiant- NON AUTORISE";
            ?>
        </div>
    </nav>
</div>