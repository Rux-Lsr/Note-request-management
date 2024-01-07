
<?php 
    session_start();
    if(!isset($_SESSION['user']['matricule_Etudiant']))
        header('Location: ..\error_pages\401.php');
        require_once "functions_include/connect.php";
        $sql = "SELECT id_UE, code_UE from ue where code_niveau= :nv and ue.id_filiere={$_SESSION['user']['id_filiere']}";
        $stm = $con->prepare($sql);
        $stm->bindValue(":nv", $_SESSION['user']['niveau']);
        $stm->execute();

        $ues = $stm->fetchAll();
        //var_dump($ues);

        
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Redaction de requette</title>
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
                        <h1 class="mt-4">Redaction de requette</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">rediger</li>
                        </ol>
                        <div class='alert alert-success' style="display: none;" id="alertBox"></div>
                        <div class='alert alert-danger' style="display: none;" id="alertBoxDanger"></div>
                        <div class="mb-4" >
                        <?php include_once "templates/template_req.php";?>
                    </div>
                    </div>
                </div>
                        </div>
                    </div>
                </main>
                <?php //include_once "templates/footer.php";?>
            </div>
        </div>
        <script>
            window.onload = function(e){
                e.preventDefault();
            }

            document.getElementById("query_template").addEventListener("submit", function(e){
                e.preventDefault();
                let xhr = new XMLHttpRequest();
                let data = new FormData(this);
                xhr.onreadystatechange = function (){
                    if(xhr.readyState == 4 && xhr.status == 200) {
                        console.log(this.response);
                        if(this.response == "ok"){
                            document.getElementById("alertBox").innerText = "Votre requette a été soumise avec success";
                            document.getElementById("alertBox").style.display = "block";
                            location.href = "index.php";
                        }else{
                            document.getElementById("alertBaxDanger").innerText = this.response;
                            document.getElementById("alertBaxDanger").style.display = "block";
                        }
                    }else if(xhr.readyState == 4 )
                    {
                        console.log("une erreur c'est produite ...");
                    }
                }

                xhr.open("POST", "asynch_db.php", true);
                xhr.send(data)
            })
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
