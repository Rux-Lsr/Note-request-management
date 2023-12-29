<?php session_start();
    if(!isset($_SESSION['user']))
        header('Location: error_pages\401.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Edudiant Admin</title>
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
    <body>
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
                   <div class="container">

                    <h4>Libelle matiere | posté le yyyy/mm/dd</h4>
                    <div>
                    <div class="text-center">
                        <img src="assets\img\_27c0601c-87c2-4819-ac72-0ebf3efd7ad1.jpeg" class="img-fluid d-block mx-auto" alt="Description de l'image">
                    </div>
                    <br>
                    <div class="text-center">
                        <img src="assets\img\_7bef1e9a-0e28-40ab-9686-1a5440ec5032.jpeg" class="img-fluid d-block mx-auto" alt="Description de l'image">
                    </div>
                    <br>
                    <div class="text-center">
                        <img src="assets/img/_ef8a7092-873e-4916-8784-18c1206305ca.jpeg" class="img-fluid d-block mx-auto" alt="Description de l'image">
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
