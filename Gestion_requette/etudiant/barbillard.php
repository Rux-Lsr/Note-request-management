<?php session_start();
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
        <title>Etudiant- admin</title>
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
                        <h1 class="mt-4">Consultez vos notes</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">tableau de bord</a></li>
                            <li class="breadcrumb-item active">Barbillard</li>
                        </ol>
                    </div>
                   
                    <?php 
                        require_once 'functions_include\connect.php';
                        $rqs =null;
                        
                        $sql = "SELECT f.id, src, code_UE, date_de_publication, f.id_ue from fiche_de_note f , ue where ue.id_UE = f.id_ue group by code_UE";
                        $stm = $con->prepare($sql);
                        $stm->execute();

                        $rqs = $stm->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <hr>
                   <div class="container">
                        
                        <div>
                            <?php 
                                foreach ($rqs as $rq) {
                                ?>

                                <form action="" method="post">
                                    <h5>#<?=$rq["code_UE"]?> - posté le : <?=$rq["date_de_publication"]?> | <a href="<?=$rq['src']?>" target="_blank" class="btn btn-primary">Visualiser</a></h5> 
                                    <div class="text-center">
                                        <img src="<?=$rq['src']?>" class="img-fluid " alt="lol">
                                    </div>
                                </form>
                            <br>
                            <hr>
                            <br> 
                            <?php
                                    }
                            ?>  
                        </div>               
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
