<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <style>
            .navbar-custom {
            background-color: #f8f9fa; /* Couleur claire */
            box-shadow: 0 4px 2px -2px rgba(0, 0, 0, 0.1); /* Bordure inférieure ombrée */
        }
        .navbar-custom .navbar-brand,
        .navbar-custom .navbar-nav .nav-link  {
            color: gray;
        }
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.2); /* Ombre sur la bordure supérieure */
        }
        .navbar-custom:hover .navbar-nav:hover .nav-link:hover{
            color:black;
        }
        </style>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-custom" >
            <a class="navbar-brand" href="#">Gestion de requette</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- <li class="nav-item active">
                        <a class="nav-link" href="etudiant/authentication/login.php">Etudiant <span class="sr-only">(current)</span></a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="../../enseignant/authentication/login.php">Enseignant</a>
                    </li>
                </ul>
            </div>
        </nav>
        <?php 
            $msg = "E-mail ou mot de passe incorrect";
            if(isset($_POST["submit"])){
                $mail = htmlspecialchars( $_POST['mail']);
                $mdp = htmlspecialchars($_POST['pswd']);
                if(!empty($mail) && !empty($mdp)){
                    require_once '../functions_include\connect.php';
                    $sql = "SELECT id_Etudiant, nom, matricule_Etudiant, email_Etudiant, id_filiere from etudiant where email_Etudiant = :mail and mdp = :mdp";
                    $stm = $con->prepare($sql);
                    $stm ->bindValue(':mail',$mail , PDO::PARAM_STR );
                    $stm ->bindValue(':mdp' ,$mdp);
                    $stm->execute();
                    
                    
                    $result = $stm->fetch(PDO::FETCH_ASSOC);
                   if($result){
                    $_SESSION["user"] = $result;
                    header("Location:../index.php");
                   }else 
        ?>
            <div class="alert alert-warning mx-0 mt-0"><?php echo $msg ?></div>
        <?php
                }

            }
        ?>
        
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Connexion - Etudiant</h3></div>
                                    <div class="card-body">
                                        <form action="" method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" required name="mail"/>
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" type="password" placeholder="Password" required name="pswd"/>
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <!-- <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" /> -->
                                                <!--<label class="form-check-label" for="inputRememberPassword">Remember Password</label>!-->
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <!-- <a class="small" href="password.php">Forgot Password?</a> -->
                                                <button class="btn btn-primary" name="submit" type="submit">Connexion</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.php">pas de compte? creer un compte!</a></div>
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
