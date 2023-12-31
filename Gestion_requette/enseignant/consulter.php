<?php session_start() ;
    if(!isset($_SESSION['user']) || isset($_SESSION['user']['matricule_Etudiant']))
        header('Location: ..\error_pages\401.php');

    require_once 'functions_include/connect.php';
    require_once 'functions_include/those.php';
    require_once 'functions_include/admin_adding.php';
    //recuperation des UE
    $stm = $con->prepare($sql = "SELECT id_UE, code_UE, libelle_UE, ue.code_niveau, code_filiere from ue Join niveau nv on nv.code_niveau = ue.code_niveau JOIN filiere f on f.id_filiere=ue.id_filiere");
    $stm->execute();
    $rqs = $stm->fetchAll();
    //recuperation de enseignants
    $stm = $con->prepare("SELECT e.id_enseignant, nom_enseignant, email_enseignant, code_UE   from enseignant e join ue on e.id_enseignant=ue.id_enseignant");
    $stm->execute();
    $reqs = $stm->fetchAll();
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
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        
    </head>
    <body class="sb-nav-fixed">
    <?php include_once "templates/fixedNavBar.php";?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <?php include_once "templates/sideBar.php" ?>
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Administrateur</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Consultation</li>
                    </ol>
                </div>
                
                        <div class="alert alert-success" id="t"style="display: none;">Suppression effectuée avec success</div>
                        <div class="alert alert-warning" id='m'style="display: none;">Echec de la suppression de l'unite d'enseignement</div>
                <div class="container">
                <h3>Unité d'enseignements</h3>
                <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Unités d'enseignements
                            </div>
                            <div class="card-body">
                                <table class="table table-light">
                                    <thead>
                                        <tr> 
                                            <th>N°</th>
                                            <th>Libelle</th>
                                            <th>Code ue</th>
                                            <th>filiere</th>
                                            <th>niveau</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                            $i = 1;
                                            foreach ($rqs as $rq) {      
                                        ?>
                                            <form action="" method="get">
                                                <tr>
                                                    <td><?=$i?></td>
                                                    <td><?=$rq['libelle_UE']?></td>
                                                    <td><?=$rq['code_UE']?></td>
                                                    <td><?=$rq['code_filiere']?></td>
                                                    <td><?=$rq['code_niveau']?></td>
                                                    <td><a href="modif-UE.php?code_ue=<?=$rq['id_UE']?>" class="btn btn-success">Editer</a></td>
                                                </tr>
                                                <input type="hidden" id='id_' value="<?=$rq['id_UE']?>" readonly>
                                            </form>  
                                        <?php
                                            $i++;  
                                            }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr>
                        <div class="alert alert-success" id="n" style="display: none;">Suppression effectuée avec success</div>
                        <div class="alert alert-warning" id="p" style="display: none;">Echec de la suppression de l'enseignant</div>
                        <h3>Enseignant</h3>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Enseignant 
                            </div>
                            <div class="card-body">
                                <table class="table table-light">
                                    <thead>
                                        <tr> 
                                            <th>N°</th>
                                            <th>Nom</th>
                                            <th>E-mail</th>
                                            <th>UE</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php 
                                            $i = 1;
                                            foreach ($reqs as $rq) {    
                                        ?>
                                            <form action="" method="get" >
                                                <tr id="row_<?=$rq['id_enseignant']?>">
                                                    <td><?=$i?></td>
                                                    <td><?=$rq['nom_enseignant']?></td>
                                                    <td><?=$rq['email_enseignant']?></td>
                                                    <td><?=$rq['code_UE']?></td>
                                                    <td><a href="modif-ens.php?id=<?=$rq['id_enseignant']?>" class="btn btn-success">Editer</a> </td>
                                                </tr>
                                                
                                            </form>  
                                        <?php
                                            $i++;  
                                            }
                                        ?>
                                        <script>
                                            function deleteRow(nom_enseignant, id_enseignant){
                                                let reponse = confirm("Confirmer la suppresion  de l'enseignant "+ nom_enseignant);
                                                let xhr = new XMLHttpRequest();
                                                xhr.open("POST", "functions_include/delete_ue.php", true);
                                                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                                let params = "reponse="+reponse+"&id="+id_enseignant
                                                xhr.send(params);
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
</body>
</html>
