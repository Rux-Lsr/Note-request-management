<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - SB Admin</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script>
            // Fonction qui vérifie si les deux mots de passe sont identiques
            function verifierMdp() {
                // Récupérer les éléments du formulaire
                var mdp = document.getElementById("inputPassword");
                var confirm_mdp = document.getElementById("inputPasswordConfirm");
               
                // Comparer les valeurs des champs
                if (mdp.value == confirm_mdp.value) {
                    // Les mots de passe sont identiques
                confirm_mdp.style.borderColor = "green";
                mdp.style.borderColor = "green";
                
                document.getElementById("submitButton").disabled = false;
                } else {
                    document.getElementById("submitButton").disabled = true;
                    confirm_mdp.style.borderColor = "red";
                    mdp.style.borderColor = "red";
                    
                }
            }
           $('#mon-select').selectpicker();
        </script>
    </head>
    <body class="bg-light">
        <?php 
            if(isset($_POST["submit_button"])){
                
                if(!empty($_POST["user_name"]) && !empty($_POST["matricule"]) && !empty($_POST["mail"])&& !empty($_POST["mdp"])){
                    //require_once "functions_include/connect.php";
                    include_once "../functions_include/inscription.php";
                    $nom = htmlspecialchars($_POST['user_name']);
                    $matricule = htmlspecialchars($_POST['matricule']);
                    $mail=htmlspecialchars($_POST['mail']);
                    $mdp=htmlspecialchars($_POST['mdp']);

                    insertInto("etudiant", $nom,$matricule, $mail, $mdp, $_POST["filiere"]);

                }
                    
            }
        ?>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form action="" method="post">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputUserName" type="text" placeholder="Entrez votre nom d'utilisateur" name="user_name" required/>
                                                        <label for="inputUserName">Nom d'utilisateur</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" pattern="[0-9]{2}[A-Za-z]{1}[0-9]{4}" title="Ex: 21Q5896" id="inputMatricule" type="text" placeholder="Entrez votre matricule" name="matricule" required/>
                                                        <label for="inputMatricule">Matricule</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" name="mail" required/>
                                                <label for="inputEmail">Adresse E-mail</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPassword" type="password" placeholder="Creez votre mot passe" name="mdp" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Doit contenir au moins un chiffre, une lettre majuscule, une lettre minuscule, et au moins 8 caractères ou plus"
required/>                                          
                                                    <label for="inputPassword">Mot de passe</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPasswordConfirm" type="password" placeholder="Confirmer me mot de passe" name="mdp_confirm" oninput="verifierMdp();" required/>
                                                        <label for="inputPasswordConfirm">Confirm Password</label>
                                                        <div id="msg"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <select id="mon-select" class="selectpicker" data-live-search="true" name="filiere">
                                                <option value="1">ICT4D</option>
                                                <option value="2" disabled>INFO(comming soon)</option>
                                            </select>
                                            <!-- <select id="mon-select" class="selectpicker" data-live-search="true" name="niveau">
                                                <option value="1">1</option>
                                                <option value="2" >2</option>
                                                <option value="3" >3</option>
                                            </select> -->
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid">
                                                    <!-- <button name="submit_button"  id="submitButton" class="btn btn-primary btn-block" href="login.php">Creer le compte</button> -->
                                                    <button name="submit_button" type="submit" id="submitButton" type="button" class="btn btn-primary">Creer le compte</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.php">Vous avez un compte? Se connecter</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
            <?php include_once "../templates/footer.php";?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
