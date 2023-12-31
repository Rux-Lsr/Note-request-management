<?php session_start() ;
     if(!isset($_SESSION['user']) || isset($_SESSION['user']['matricule_Etudiant']))
     header('Location: ..\error_pages\401.php');

    // Préparation de la requête SQL
    require_once 'functions_include\connect.php';

    
     if(isset($_POST["rejetter"])){
        $stm = $con->prepare("UPDATE requette r set r.status = -1, r.raison_rejet =:rj
         where id_Requette=:id_");
        $stm->bindValue(':id_',$_GET['id_rq']);
        $stm->bindValue(":rj", $_POST['jtf']);
        $stm->execute();
        header("Location: index.php");
    }

    $stm = $con->prepare("SELECT * from requette where id_Requette =:id_ and id_enseignant=:id_e");
    // Exécution de la requête SQL
    $stm->execute(array(
        'id_' => $_GET['id_rq'],
        'id_e'=>$_SESSION['user']['id_enseignant']
    ));

    $rq = $stm->fetch(PDO::FETCH_ASSOC);
    if($rq == false){
        header('Location: ..\error_pages\401.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Repondre à la requette- SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
    <?php include_once "templates/fixedNavBar.php";?>
        <div id="layoutSidenav">
            <?php include_once "templates/sideBar.php" ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Traitement de requette</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">dashboard</a></li>
                            <li class="breadcrumb-item active">Requette</li>
                        </ol>
                        <?php include_once "templates/template_req.php";?>
                    </div>
                </main>
                <?php include_once "templates/footer.php";?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
