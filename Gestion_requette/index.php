<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php include_once "templates/fixedNavBar.php";?>
        <div id="layoutSidenav">
            
            <div id="layoutSidenav_content">
            <?php include_once "templates/sideBar.php" ?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Status des requettes
                            </div>
                            <div class="card-body">
                                <table class="table table-light">
                                    <thead>
                                        <tr> 
                                            <th>N°</th>
                                            <th>UE</th>
                                            <th>Objet</th>
                                            <th>Enseignant</th>
                                            <th>Status</th>
                                            <th>Date de soumission</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <tr>
                                            <td>2</td>
                                            <td>Ict201</td>
                                            <td>nom erroné.</td>
                                            <td>Moyou Brice</td>
                                            <td>en cours</td>
                                            <td>2011/04/25</td>
                                            <td><button class="btn btn-warning">Annuler</button></td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Ict203</td>
                                            <td>Pas de note de cc.</td>
                                            <td>Ghislain</td>
                                            <td>Validé</td>
                                            <td>2011/05/25</td>
                                            <td><button class="btn btn-warning" disabled>Annuler</button></td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Ict205</td>
                                            <td>Pas de note de SN.</td>
                                            <td>Ghislain</td>
                                            <td>rejeté</td>
                                            <td>2011/05/25</td>
                                            <td><button class="btn btn-danger" ><a href="modif-req.php" style="text-decoration: none; color:black;">Modifier</a></button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
               <?php include_once "templates/footer.php";?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-da tatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
