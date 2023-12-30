
<?php 
    session_start();
    if(!isset($_SESSION['user']) || isset($_SESSION['user']['matricule_Etudiant']))
        header('Location: ..\error_pages\401.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Paramettre de compte</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <style> 
            label{
                font-weight: bold;
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
    <?php include_once "templates/fixedNavBar.php";?>
        <div id="layoutSidenav">
            <?php include_once "templates/sideBar.php" ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Parametre de compte</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Mon compte</a></li>
                            <li class="breadcrumb-item active">Paramettre</li>
                        </ol>
                        <?php 
                            require_once "functions_include/account_functions.php";
                            require_once 'functions_include/connect.php';
                            if (isset($_POST['sb1'])) {
                                updateCommon($_POST['usr_name']);
                            }else if (isset($_POST['sb2'])) {
                                updateCommon($_POST['mail'],1);
                            }else if (isset($_POST['sb_mat'])) {
                                updateCommon($_POST['matricule'],2);
                            }else if (isset($_POST["sb3"])) {
                                updatePswd($_POST['mdp'], $_POST['n_mdp']);
                            }else {
                                
                            }
                        ?>
                        <div class="mb-4" >
                        <h4>Informations de compte</h4>
                        <form action="" method="post">
                            <div class="form-check">
                                <label for="usr_name" class="text-secondary font-weight-bold col-form-label">Nom d'utilisateur</label>
                                <input type="text" class="form-control form-control-lg" id="usr_name" name="usr_name" value="<?=$_SESSION['user']['nom_enseignant']?>" placeholder="Veuillez saisir votre nom d'utilisateur"  required >
                                
                                <button class="btn btn-primary mt-1" id=publish type="submit" name="sb1">Modifier</button>
                                
                            </div>
                        </form>
                       <form action="" method="post">
                            <div class="form-check">
                                <label for="mail_n" class="text-secondary font-weight-bold col-form-label">Email</label>
                                <input type="email" class="form-control form-control-lg" id="mail_n" name="mail"  value="<?=$_SESSION['user']['email_enseignant']?>" placeholder="Veuillez saisir votre E-mail"  required >
                                <button class="btn btn-primary mt-1" type="submit" name="sb2">Modifier</button>
                            </div>
                           
                       </form>
                        <hr>
                        <form action="" method="post">
                            <div class="form-check">
                                <label for="objet" class="text-secondary font-weight-bold col-form-label">Mot de passe actuel</label>
                                <input type="password" class="form-control form-control-lg" id="mdp" name="mdp" value="" placeholder="Veuillez saisir votre Mot de passe actuel"  required>
                            </div>
                            <div class="form-check">
                            <label for="objet" class="text-secondary font-weight-bold col-form-label">Nouveau mot de passe</label>
                            <input type="password" class="form-control form-control-lg" id="n_mdp" name="n_mdp" value="" placeholder="Veuillez saisir votre nouveau mot de passe" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Doit contenir au moins un chiffre, une lettre majuscule, une lettre minuscule, et au moins 8 caractères ou plus" required>
                            <br>
                            <button class="btn btn-warning" type="submit"  name="sb3">Modifier</button>
                        </div>
                        </form>
                        
                        <hr>
                        <form action="" method="post">
                        <div class="form-check">
                            <label for="objet" class="text-secondary font-weight-bold col-form-label">Suppression de Compte</label>
                            <br>
                            <button class="btn btn-danger" onclick="delAccount();" type="submit" name="sb4">Supprimmer le compte</button>
                        </div>
                        
                        </form>
                    </div>
                            <script>
                                function delAccount(){
                                    let reponse = confirm("Voulez vous vraiment supprimer votre compte (cette action est irreversible)?")
                                    window.preventDefaul();
                                    let xhr = new XMLHttpRequest();
                                    xhr.open("POST", "functions_include/del_account.php", true);
                                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                    let params = "reponse="+reponse
                                    xhr.send(params);
                                    
                                }
                            </script>
                        </div>
                    </div>
                </main>
                <?php //include_once "templates/footer.php";?>
            </div>
        </div>
       
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
