<?php session_start() ;
    if(!isset($_SESSION['user']) || isset($_SESSION['user']['matricule_Etudiant']))
    header('Location: ..\error_pages\401.php');

    require_once 'functions_include/connect.php';
    require_once 'functions_include/those.php';
    $stm = $con->prepare("SELECT distinct r.objet_Requette,  r.status, r.date_soumission, id_Requette, r.id_UE, justificatif_Requette, e.nom, e.matricule_Etudiant from requette r  join etudiant e on e.id_Etudiant = r.id_Etudiant where r.id_enseignant = :id_ order by r.status");
    $stm->execute(array('id_'=>$_SESSION['user']['id_enseignant']));

    $rqs = $stm->fetchAll(PDO::FETCH_ASSOC);
    //nombre req non traitée
    $stm = $con->prepare("SELECT count(*) from requette where id_enseignant=:id_ and requette.status=0");
    $stm->bindValue(":id_", $_SESSION["user"]["id_enseignant"]);
    $stm->execute();
    $countnbrequettenontraite = $stm->fetch(PDO::FETCH_ASSOC);
    
    $stm = $con->prepare("SELECT count(*) from requette where id_enseignant=:id_ and requette.status<>0");
    $stm->bindValue(":id_", $_SESSION["user"]["id_enseignant"]);
    $stm->execute();
    $countnbrequettetraite = $stm->fetch(PDO::FETCH_ASSOC)['count(*)'];
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard ens - Gestion de requette</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        
    </head>
    <body class="sb-nav-fixed">
        <?php include_once "templates/fixedNavBar.php";?>
        <div id="layoutSidenav">
            <!-- ; -->
            <div id="layoutSidenav_content">
            <?php include_once "templates/sideBar.php" ?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Requette non traitée (<?=$countnbrequettenontraite["count(*)"];?>)
                            </div>
                            <div class="card-body">
                                <table class="table table-light">
                                    <thead>
                                        <tr> 
                                            <th>N°</th>
                                            <th>Objet</th>
                                            <th>Matricule</th>
                                            <th>Nom</th>
                                            <th>Date de soumission</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php 
                                            $i = 1;
                                            foreach ($rqs as $rq) { 
                                               if($rq['status'] == 0){
                                        ?>
                                            <form action="" method="get">
                                                <tr>
                                                    <td><?=$i?></td>
                                                    <td><?=$rq['objet_Requette']?></td>
                                                    <td><?=$rq['matricule_Etudiant']?></td>
                                                    <td><?=$rq['nom']?></td>
                                                    <td><?=$rq['date_soumission']?></td>
                                                    <td><?=actionDependOnStatus($rq['status'], $rq['id_Requette'], $i, $rq['id_UE'], $rq['objet_Requette'])?></td>
                                                </tr>
                                                <input type="hidden" id='id_' value="<?=$rq['id_Requette']?>" readonly>
                                            </form>  
                                        <?php
                                            $i++;
                                               }
                                            }
                                            if ($countnbrequettenontraite["count(*)"] == 0) {
                                                echo"<tr><td colspan='6'>Pas de requette en attente<td></tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Requette traitées (<?=$countnbrequettetraite?>)
                            </div>
                            <div class="card-body">
                                <table class="table table-light">
                                    <thead>
                                        <tr> 
                                            <th>N°</th>
                                            <th>Objet</th>
                                            <th>Matricule</th>
                                            <th>Nom</th>
                                            <th>Date de soumission</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php 
                                            $i = 1;
                                            foreach ($rqs as $rq) { 
                                               if($rq['status'] != 0){
                                        ?>
                                            <form action="" method="get">
                                                <tr>
                                                    <td><?=$i?></td>
                                                    <td><?=$rq['objet_Requette']?></td>
                                                    <td><?=$rq['matricule_Etudiant']?></td>
                                                    <td><?=$rq['nom']?></td>
                                                    <td><?=$rq['date_soumission']?></td>
                                                    <td><?=actionDependOnStatus($rq['status'], $rq['id_Requette'], $i, $rq['id_UE'], $rq['objet_Requette'])?></td>
                                                </tr>
                                                <input type="hidden" id='id_' value="<?=$rq['id_Requette']?>" readonly>
                                            </form>  
                                        <?php
                                            $i++;
                                               }
                                               if ($countnbrequettenontraite["count(*)"] == 0) {
                                            echo"<tr><td colspan='6'>Pas de requette traitée<td></tr>";
                                            }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>  
                </main>
               <?php include_once "templates/footer.php";?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script> -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/simple-da tatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script> -->
        <!-- <script src="js/datatables-simple-demo.js"></script> -->
    </body>
</html>
