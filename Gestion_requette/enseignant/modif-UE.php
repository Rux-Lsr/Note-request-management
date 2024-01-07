<?php session_start() ;
    //verification de privilege d'administration
    if(!isset($_SESSION['user']) || isset($_SESSION['user']['matricule_Etudiant']))
        header('Location: ..\error_pages\401.php');
    if($_SESSION['user']['privilege']!=1)
        header('Location: ..\error_pages\401.php');

    require_once 'functions_include/connect.php';
    require_once 'functions_include/those.php';
    require_once 'functions_include/admin_adding.php';
    //recuperation des UE
    $sql = "SELECT code_UE, libelle_UE, id_filiere from ue where id_UE=:id_";
    $stm = $con->prepare($sql);
    $stm->bindValue(":id_", $_GET['code_ue']);
    $stm->execute();
    $ues = $stm->fetch(PDO::FETCH_ASSOC);
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
        <div id="layoutSidenav_content">
            <?php include_once "templates/sideBar.php" ?>
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Administrateur</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Modifier UE</li>
                    </ol>
                </div>
               <?php
                   if(isset($_POST['sub2'])){
                        $sql = "UPDATE ue set libelle_UE=:lib, code_UE=:code_, id_filiere=:filiere, code_niveau=:niveau where id_UE=:id_";
                        $stm = $con->prepare($sql);
                        $res = $stm->execute(array(
                            'filiere'=>htmlspecialchars($_POST['filiere']),
                            'niveau'=>htmlspecialchars($_POST['niveau']),
                            'code_'=>htmlspecialchars($_POST['code']),
                            'id_'=>htmlspecialchars($_GET['code_ue']),
                            'lib'=>htmlspecialchars($_POST['libelle'])
                        )
                        );
                        if($res)
                            echo "<div class='alert alert-success'>Mise à jour de l'UE effectuée avec success</div>";
                        else echo "<div class='alert alert-warning'>L'Ajout de l'UE a echouée</div>";
                    }
                ?>
                <div class="container">
                    <div class="row w-100" >
                        <div class="col-lg-5 w-100">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Formulaires</h3>
                                </div>
                                <div class="card-body">
                                    <div class="accordion" id="formAccordion">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingUniteEnseignant">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseUniteEnseignant" aria-expanded="false" aria-controls="collapseUniteEnseignant">
                                                    Unité d'enseignement
                                                </button>
                                            </h2>
                                            <div id="collapseUniteEnseignant" class="accordion-collapse collapse" aria-labelledby="headingUniteEnseignant" data-bs-parent="#formAccordion">
                                                <div class="accordion-body">
                                                    
                                                    <!-- Formulaire Unité d'enseignant -->
                                                    <form action="" method="post">
                                                        <div class="form-floating mb-3">
                                                            <input class="form-control" id="inputLibelle" type="text" placeholder="Libelle" required name="libelle" value="<?=$ues['libelle_UE']?>"/>
                                                            <label for="inputLibelle">Libelle</label>
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <input class="form-control" id="inputCode" type="text" placeholder="Code" required name="code"  value="<?=$ues['code_UE']?>"/>
                                                            <label for="inputCode">Code</label>
                                                        </div>
                                                        <div style="display: flex;">
                                                            <div><label for="filere">Filere</label>
                                                                <select id="mon-select" class="form-select"  name="filiere" required selec>
                                                                    <option value="1" <?=($ues['id_filiere']==1) ? "selected" : " ";?>>ICT4D</option>
                                                                    <option value="2" disabled <?=($ues['id_filiere']==2) ? "selected" : " ";?>>INFO(comming soon)</option>
                                                                </select>
                                                            </div>
                                                            <div style="margin-left: 5px;">
                                                                <label for="niveau">Niveau</label>
                                                                <select id="mon-select" class="form-select"  name="niveau" required>
                                                                    <option value="1" <?=($ues['id_filiere']==1) ? "selected" : " ";?>>1</option>
                                                                    <option value="2" <?=($ues['id_filiere']==2) ? "selected" : " ";?>>2</option>
                                                                    <option value="3" <?=($ues['id_filiere']==3) ? "selected" : " ";?>>3</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                       
                                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                            <button class="btn btn-primary" name="sub2" type="submit">Enregistrer</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <!-- Footer -->
                                </div>
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
