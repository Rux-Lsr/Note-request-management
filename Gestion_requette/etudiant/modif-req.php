<?php session_start() ;
   if(!isset($_SESSION['user']['matricule_Etudiant']))
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
        <title>Static Navigation - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body>
    <?php include_once "templates/fixedNavBar.php";?>
        <div id="layoutSidenav">
            <?php include_once "templates/sideBar.php" ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Edition de requette rejetée</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">tableau de bord</a></li>
                            <li class="breadcrumb-item active">modifier requette</li>
                        </ol>
                        <?php 
                            if (isset($_POST["submit1"])) {


                            $objet = $_POST['objet'];
                            $libelle = $_POST['libelle'];
                        
                            // Téléchargement du fichier
                            $file_name = $_FILES['piece']['name'];
                            $file_tmp = $_FILES['piece']['tmp_name'];
                            $file_size = $_FILES['piece']['size'];
                            $file_parts = explode('.', $file_name);
                            $file_ext = strtolower(end($file_parts));
                        
                            $upload_dir = 'uploads/';
                            $file_path = $upload_dir . $file_name;
                            $t = 1;
                            // Vérification de l'extension du fichier
                            $extensions = array("jpeg","jpg","png","pdf","doc","docx","txt");
                            if(!in_array($file_ext, $extensions)){
                                $t = 0;
                                echo('<div class="alert alert-danger">Extension non autorisée, veuillez choisir un fichier JPEG, PNG, PDF, DOC, DOCX ou TXT</div>');
                            }
                        
                            // Vérification de la taille du fichier (3Mo max)
                            if($file_size > 3000000){
                                echo("<div class='alert alert-danger'>Le fichier est trop volumineux, veuillez choisir un fichier de moins de 3Mo.</div>");
                                $t = 0;
                            }
                        
                           if($t == 1){
                             // Déplacement du fichier vers le répertoire de destination
                             move_uploaded_file($file_tmp, $file_path);
                        
                             // Préparation de la requête SQL
                             
                             require_once 'functions_include\connect.php';
                             $stm = $con->prepare("UPDATE requette set objet_Requette = :obj, corps_Requette = :cps, justificatif_Requette=:piece, requette.status=:st where id_Requette=:id_rq");
                             // Exécution de la requête SQL
                             $stm->execute(array(
                                 'obj' => $objet,
                                 'cps' => $libelle,
                                 'piece' => $file_path,
                                 'st' => 0,
                                 'id_rq' => $_GET['id_rq']
                             ));

                             echo "<div class='alert alert-success'>Votre requette a été modifiée et ressoumise avec success.</div>";
                           }
                        
                           
                        } 

                        ?>
                        <?php include_once "templates/template_req.php";?>
                    </div>
                </main>
                <?php include_once "templates/footer.php";?>
            </div>
        </div>
        <script>
            document.getElementById("selectlevel").style.display = "none"
            document.getElementById("selectlevel").disabled=true;
            document.getElementById("titleUe").disabled = true;
            document.getElementById("titleUe").style.display ="none";

            let url = new URL(window.location.href);

            // Créez un objet URLSearchParams à partir de la chaîne de requête de l'URL
            let params = new URLSearchParams(url.search);

            // Utilisez la méthode get pour obtenir la valeur d'un paramètre
            let id_rq = params.get('id_rq');
            let id_ue = params.get('id_ue');
            let obj = params.get('obj'),  pieceJtf = params.get('jtf');

            document.getElementById("objet").value= obj;
            
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
