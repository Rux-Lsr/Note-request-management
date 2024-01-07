<?php session_start() ;
    if(!isset($_SESSION['user']) || isset($_SESSION['user']['matricule_Etudiant']))
        header('Location: ..\error_pages\401.php');

    require_once 'functions_include/connect.php';
    require_once 'functions_include/those.php';
    require_once 'functions_include/admin_adding.php';
    //recuperation des UE
    $sql = "SELECT nom_enseignant, email_enseignant from enseignant where id_enseignant=:id_";
    $stm = $con->prepare($sql);
    $stm->bindValue(":id_", $_GET['id']);
    $stm->execute();
    $ens = $stm->fetch(PDO::FETCH_ASSOC);
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
                        <li class="breadcrumb-item active">Modifier enseignant</li>
                    </ol>
                </div>
               <?php
                if(isset($_POST['sub1'])){
                    $sql = "UPDATE enseignant set mdp=:pswd where id_enseignant=:id_";
                    $stm = $con->prepare($sql);
                    $stm->bindValue(":id_", $_GET['id']);
                    $stm->bindValue(":pswd", $_POST['pswd']);
                    $res=$stm->execute();
                    if($res == true){
                        echo "<div class='alert alert-success' role='alert'>Mot de passe réinitialisé avec success</div>";
                    }else{
                        echo "<div class='alert alert-danger' role='alert'>Echec de reinitialisation de mot de passe</div>";
                    }
                }
                ?>
                <div class="container">
                    <div class="row w-100" >
                        <div class="col-lg-5 w-100">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Modification</h3>
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
                                                            <input class="form-control" id="inputName" type="text" placeholder="Nom"  name="nom_ens" value="<?=$ens['nom_enseignant']?>" disabled/>
                                                            <label for="nom">Nom</label>
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <input class="form-control" id="inputMail" type="email" placeholder="email"  name="mail" value="<?=$ens['email_enseignant']?>" disabled/>
                                                            <label for="inputMail">Email address</label>
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <input class="form-control" id="inputPassword" type="text" placeholder="Password" required name="pswd" readonly/>
                                                            <label for="inputPassword">Password</label><br>
                                                            <button class="btn btn-primary" type ='button' id="generate">Generer</button>
                                                        </div>
                                                        <script>
                                                            document.getElementById('generate').addEventListener('click', function() {
                                                                var length = 8,
                                                                    charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789#\"',;:!§/.?%µù*£¨^$=+",
                                                                    retVal = "";
                                                                for (var i = 0, n = charset.length; i < length; ++i) {
                                                                    retVal += charset.charAt(Math.floor(Math.random() * n));
                                                                }
                                                                document.getElementById('inputPassword').value = retVal;
                                                            });
                                                        </script>
                                                       
                                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                            <button class="btn btn-primary" name="sub1" type="submit">Enregistrer</button>
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
