<?php session_start() ;
    if(!isset($_SESSION['user']['matricule_Etudiant']))
        header('Location: ..\error_pages\401.php');

    require_once 'functions_include/connect.php';
    require_once 'functions_include/those.php';
    $stm = $con->prepare("SELECT ue.code_UE, r.objet_Requette, e.nom_enseignant, r.status, r.date_soumission, id_Requette, r.id_UE, justificatif_Requette from requette r JOIN ue on ue.id_UE = r.id_UE join enseignant e on e.id_enseignant = r.id_enseignant where r.id_Etudiant = :id_");
    $stm->execute(array('id_'=>$_SESSION['user']['id_Etudiant']));
    $rqs = $stm->fetchAll(PDO::FETCH_ASSOC);

    $stm = $con->prepare("SELECT count(*) from requette r where r.id_Etudiant = :id_");
    $stm->execute(array('id_'=>$_SESSION['user']['id_Etudiant']));
    $count = $stm->fetch(PDO::FETCH_ASSOC)['count(*)'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - Gestion de requette</title>
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
                                Status des requettes (<?=$count?>)
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr> 
                                            <th>N°</th>
                                            <th>UE</th>
                                            <th>Objet</th>
                                            <th>Enseignant</th>
                                            <th>Status</th>
                                            <th>Date de soumission</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php 
                                            $i = 1;
                                            foreach ($rqs as $rq) { 
                                        ?>
                                            <form action="" method="get" >
                                                <tr>
                                                    <td><?=$i?></td>
                                                    <td><?=$rq['code_UE']?></td>
                                                    <td><?=$rq['objet_Requette']?></td>
                                                    <td><?=$rq['nom_enseignant']?></td>
                                                    <td><?=getStatusRq($rq['status'], $rq['id_Requette'], $i, $rq['id_UE'], $rq['objet_Requette'])?></td>
                                                    <td><?=$rq['date_soumission']?></td>
                                                    <td><?=actionDependOnStatus($rq['status'], $rq['id_Requette'], $i, $rq['id_UE'], $rq['objet_Requette'])?></td>
                                                </tr>
                                                <input type="hidden" id='id_' value="<?=$rq['id_Requette']?>" readonly>
                                            </form>  
                                        <?php
                                            $i++;
                                            }
                                        ?>
                                       <script>
                                        function confirmDelete(numeroReq){
                                                let reponse = confirm("Confirmer la suppresion  de la requette N°"+ numeroReq);
                                                let xhr = new XMLHttpRequest();
                                                xhr.open("POST", "functions_include/del.php", true);
                                                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                                let params = "reponse="+reponse+"&id="+document.getElementById('id_').value
                                                xhr.send(params);

                                                xhr.onreadystatechange = function(){
                                                    if(this.readyState == 4 && this.status==200){
                                                        console.log(this.response);
                                                    }
                                                }

                                                window.preventDefault();
                                        }
                                        </script>
                                        
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
       
    </body>
</html>
