<?php session_start() ;
    if(!isset($_SESSION['user']) || isset($_SESSION['user']['matricule_Etudiant']))
        header('Location: ..\error_pages\401.php');

    require_once 'functions_include/connect.php';
    require_once 'functions_include/those.php';
    require_once 'functions_include/admin_adding.php';
    //recuperation des UE
    $sql = "SELECT code_UE, id_UE from ue where id_enseignant is null";
    $stm = $con->prepare($sql);
    $stm->execute();
    $ues = $stm->fetchAll();
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
                        <li class="breadcrumb-item active">Insertion</li>
                    </ol>
                </div>
               <?php
               if(isset($_POST['sub2'])){
                if(!empty($_POST["libelle"]) && !empty($_POST["code"]) && !empty($_POST["niveau"]) && !empty($_POST["filiere"]))
                    insert_UE($_POST['libelle'], $_POST["code"], $_POST["niveau"], $_POST["filiere"]); 
            }else if(isset($_POST["sub1"])){
                insert_Enseignant($_POST['nom_ens'], $_POST["mail"], $_POST['pswd'], $_POST['ue']);
            }?>
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
                                            <h2 class="accordion-header" id="headingEnseignant">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEnseignant" aria-expanded="false" aria-controls="collapseEnseignant">
                                                    Enseignant
                                                </button>
                                            </h2>
                                            <div id="collapseEnseignant" class="accordion-collapse collapse" aria-labelledby="headingEnseignant" data-bs-parent="#formAccordion">
                                                <div class="accordion-body">
                                                    <!-- Formulaire Enseignant -->
                                                    <form action="" method="post">
                                                        <div class="form-floating mb-3">
                                                            <input class="form-control" id="inputName" type="text" placeholder="Nom" required name="nom_ens"/>
                                                            <label for="nom">Nom</label>
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <input class="form-control" id="inputMail" type="email" placeholder="email" required name="mail"/>
                                                            <label for="inputMail">Email address</label>
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <input class="form-control" id="inputPassword" type="text" placeholder="Password" required name="pswd" readonly/>
                                                            <label for="inputPassword">Password</label>
                                                            <button class="btn btn-primary" type ='button' id="generate">Generer</button>
                                                        </div>
                                                        <script>
                                                            document.getElementById('generate').addEventListener('click', function() {
                                                                var length = 8,
                                                                    charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
                                                                    retVal = "";
                                                                for (var i = 0, n = charset.length; i < length; ++i) {
                                                                    retVal += charset.charAt(Math.floor(Math.random() * n));
                                                                }
                                                                document.getElementById('inputPassword').value = retVal;
                                                            });
                                                        </script>
                                                        <div class="form-floating mb-3">
                                                            <select class="form-control" name="ue">
                                                                <option selected disabled value="">UE</option>
                                                                <?php 
                                                                    foreach($ues as $ue){
                                                                        echo "<option value=\"{$ue['id_UE']}\">".$ue['code_UE']."</option>";
                                                                    }
                                                                ?>
                                                            </select >
                                                        </div>
                                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                            <button class="btn btn-primary" name="sub1" type="submit">Ajouter</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
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
                                                            <input class="form-control" id="inputLibelle" type="text" placeholder="Libelle" required name="libelle"/>
                                                            <label for="inputLibelle">Libelle</label>
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <input class="form-control" id="inputCode" type="text" placeholder="Code" required name="code"/>
                                                            <label for="inputCode">Code</label>
                                                        </div>
                                                        <div style="display: flex;">
                                                            <div><label for="filere">Filere</label>
                                                                <select id="mon-select" class="form-select"  name="filiere" required>
                                                                    <option value="1">ICT4D</option>
                                                                    <option value="2" disabled>INFO(comming soon)</option>
                                                                </select>
                                                            </div>
                                                            <div style="margin-left: 5px;">
                                                                <label for="niveau">Niveau</label>
                                                                <select id="mon-select" class="form-select"  name="niveau" required>
                                                                    <option value="1">1</option>
                                                                    <option value="2" >2</option>
                                                                    <option value="3" >3</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                       
                                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                            <button class="btn btn-primary" name="sub2" type="submit">Ajouter</button>
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
