<?php session_start();
    if(!isset($_SESSION['user']) || isset($_SESSION['user']['matricule']))
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
        <title>Enseignant- Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <style>
            form{
                margin-left: 5%;
                margin-bottom: 10px;
            }
            .container{
                display:flex;
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: space-around;
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
                        <h1 class="mt-4">Consultez vos Notes sur les differentes UE</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">tableau de bord</a></li>
                            <li class="breadcrumb-item active">Barbillard</li>
                        </ol>
                    </div>
                    <?php 
                    require_once 'functions_include\connect.php';
                        $rqs =null;
                         if (isset($_POST["publish"])) {
                            // Téléchargement du fichier
                            $file_name = $_FILES['piece']['name'];
                            $file_tmp = $_FILES['piece']['tmp_name'];
                            $file_size = $_FILES['piece']['size'];
                            $file_parts = explode('.', $file_name);
                            $file_ext = strtolower(end($file_parts));
                        
                            $upload_dir = '../uploads/';
                            $file_path = $upload_dir . $file_name;
                            $t = 1;
                            // Vérification de l'extension du fichier
                            $extensions = array("jpeg","jpg","png");
                            if(!in_array($file_ext, $extensions)){
                                $t = 0;
                                echo('<div class="alert alert-danger">Echec de publication: Extension non autorisée, veuillez choisir un fichier JPEG, PNG, jpeg</div>');
                            }
                        
                            // Vérification de la taille du fichier (3Mo max)
                            if($file_size > 3000000){
                                echo("<div class='alert alert-danger'>Echec de publication: Le fichier est trop volumineux, veuillez choisir un fichier de moins de 3Mo.</div>");
                                $t = 0;
                            }

                            if($t == 1){
                                // Déplacement du fichier vers le répertoire de destination
                                move_uploaded_file($file_tmp, $file_path);
                           
                                // Préparation de la requête SQL
                                
                                require_once 'functions_include\connect.php';
                                $stm = $con->prepare("INSERT into fiche_de_note(src, id_ue) values(:src, :id_ue)");
                                // Exécution de la requête SQL
                                $stm->execute(array(
                                    'src' => $file_path,
                                    'id_ue' => $_SESSION['user']['id_enseignant']
                                ));
   
                                echo "<div class='alert alert-success'>Publication reussie</div>";
                              }
                        }
                        $sql = "SELECT src, code_UE, date_de_publication, f.id_ue from fiche_de_note f , ue where ue.id_UE = f.id_ue order by date_de_publication";
                        $stm = $con->prepare($sql);
                        $stm->execute();

                        $rqs = $stm->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                   <div class="container">
                   <h4>Uploader Note</h4>
                   <br>
                   <hr>
                        <form action="" method="post" enctype="multipart/form-data">
                        
                            <div class="form-check mx-0">
                                <input type="file" name="piece" class="file-upload-default" id="fichier" required style="display: none;">
                            
                                <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info"  disabled placeholder=" PNG ou JPG, JPEG" id="fileName">
                                <span class="input-group-append">
                                    <button class="btn btn-primary " id="parcourir">Parcourir...</button>
                                </span>
                                <span class="input-group-append">
                                    <button class="btn btn-success " name="publish" type="submit">publier</button>
                                </span>
                                <script>
                                    let browseBtn = document.getElementById("parcourir");
                                    let file = document.querySelector("#fichier");
                                    console.log(file+"\n "+ browseBtn);

                                    browseBtn.addEventListener("click", function (){
                                        file.click();
                                        console.log("Click sur parcourir")
                                    });
                                    file.addEventListener("change", function(e){
                                        document.getElementById("fileName").value = e.target.files[0].name;
                                        console.log("changement d'etat de lentree de fichier");
                                    });
                                </script>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <form action="" method="post">
                            <div>
                            <?php 
                                foreach ($rqs as $rq) {
                                    if($rq['id_ue']==$_SESSION['user']["id_enseignant"]){
                                ?>

                                <h5><?=$rq["code_UE"]?> - posté le : <?=$rq["date_de_publication"]?>| <button type="button" class="btn btn-danger" id="">Supprimer</button></h5> 
                                <div class="text-center">
                                    <img src="<?=$rq['src']?>" class="img-fluid " alt="lol">
                                </div>
                            <br>
                            <hr>
                            <br>
                            <?php
                                    }else{
                                        ?>
                                <h5><?=$rq["code_UE"]?> - posté le : <?=$rq["date_de_publication"]?>|<button  type="button" class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#myModal">Supprimer</button></h5> 
                                <div class="text-center">
                                    <img src="<?=$rq['src']?>" class="img-fluid " alt="lol">
                                </div>

                            <?php
                                    }
                                }
                            ?>  
                        </div>
                        
        
                        </form>
                                        
                    </div>
                </main>
                <?php include_once "templates/footer.php";?>
            </div>
        </div>
        
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
