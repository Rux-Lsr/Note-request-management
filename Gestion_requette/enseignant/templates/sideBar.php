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
                <?php 
                    if($_SESSION['user']['privilege']==1):
                ?>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Administrateur
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>  
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseInsertion" aria-expanded="false" aria-controls="collapseInsertion">
                                Edition
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseInsertion" aria-labelledby="headingOne" data-bs-parent="#collapseLayouts">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="insert.php">Insertion</a>
                                    <a class="nav-link" href="#">Consultation</a>
                                </nav>
                            </div>
                            <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseEdition" aria-expanded="false" aria-controls="collapseEdition">
                                Edition
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseEdition" aria-labelledby="headingOne" data-bs-parent="#collapseLayouts">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="#">Sous-menu 1</a>
                                    <a class="nav-link" href="#">Sous-menu 2</a>
                                </nav>
                            </div> -->
                        </nav>
                    </div>
                <?php endif;?>   
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
