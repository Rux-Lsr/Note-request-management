<?php session_start();
    if(!isset($_SESSION['user']) || isset($_SESSION['user']['matricule_Etudiant']))
    header('Location: ..\error_pages\401.php');

        require_once 'functions_include/connect.php';
        require_once 'functions_include/those.php';
        $stm = $con->prepare("SELECT ue.code_UE, ue.id_UE, r.objet_Requette, r.status, r.date_soumission, id_Requette, raison_rejet from requette r JOIN ue on ue.id_UE = r.id_UE  where r.id_Etudiant = :id_ and r.status=-1");
        $stm->execute(array('id_'=>$_SESSION['user']['id_Etudiant']));

        $rqs = $stm->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Requettes rejettées</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <style>
            form{
                margin-left: 5%;
                margin-bottom: 10px;
            }
            .container{
                display:flex;
                flex-direction: column-reverse;
                flex-wrap: wrap;
                justify-content: space-around;
            }
        </style>
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
                            <li class="breadcrumb-item"><a href="index.php">tableau de bord</a></li>
                            <li class="breadcrumb-item active">requettes rejetées</li>
                        </ol>
                    </div>
                   <div class="container">
                    <?php 
                        $i = 1;
                        foreach ($rqs as $rq) {
                    ?>
                        <form enctype="multipart/form-data" action=""  method="get" >
                            <div class="card d-flex col-md-10" style="width: 100%;">
                                <div class="card-body">
                                    <h5 class="card-title">#<?=$rq['code_UE']?> : <?=$rq['objet_Requette']?></h5>
                                    <p class="card-text "><b>Raison du rejet :</b> <?=$rq['raison_rejet']?></p>
                                    <?=actionDependOnStatus(2,$rq['id_Requette'], $i, $rq['id_UE'], $rq['objet_Requette'])?>
                                    <?=actionDependOnStatus(0,$rq['id_Requette'], $i, $rq['id_UE'], $rq['objet_Requette'])?>
                                    <input type="hidden" id='id_' value="<?=$rq['id_Requette']?>" readonly>
                                </div>
                            </div>
                        </form>
                    <?php
                        $i++;
                        }
                    ?>
                     <script>
                        function confirmDelete(numeroReq){
                                let reponse = confirm("Confirmer la suppresion  de la requette N°"+ numeroReq);
                                console.log("Reponse: "+reponse);
                                
                                let xhr = new XMLHttpRequest();
                                xhr.open("POST", "functions_include/del.php", true);
                                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                let params = "reponse="+reponse+"&id="+document.getElementById('id_').value
                                xhr.send(params);
                                
                        }
                    </script>
                   </div>
                </main>
                <?php include_once "templates/footer.php";?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
