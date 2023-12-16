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
                        <h1 class="mt-4">Edition de requette rejetée</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">tableau de bord</a></li>
                            <li class="breadcrumb-item active">requettes rejetées</li>
                        </ol>
                    </div>
                   <div class="container">
                   <form enctype="multipart/form-data" action=""  method="post" >
                        <div class="card d-flex col-md-12" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Req 1</h5>
                                <p class="card-text ">Ici, vous pouvez mettre votre texte assez long. Il sera tronqué avec des points de suspension.</p>
                                <a href="#" class="btn btn-primary">Modifier</a>
                            </div>
                        </div>
                    </form>
                    <form enctype="multipart/form-data" action=""  method="post">
                        <div class="card d-flex col-md-12" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Req 2</h5>
                                <p class="card-text ">Ici, vous pouvez mettre votre texte assez long. Il sera tronqué avec des points de suspension.</p>
                                <a href="#" class="btn btn-primary">Modifier</a>
                            </div>
                        </div>
                    </form>
                    <form enctype="multipart/form-data" action=""  method="post">
                        <div class="card d-flex col-md-12" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Req 2</h5>
                                <p class="card-text ">Ici, vous pouvez mettre votre texte assez long. Il sera tronqué avec des points de suspension.</p>
                                <a href="#" class="btn btn-primary">Modifier</a>
                            </div>
                        </div>
                    </form>
                    <form enctype="multipart/form-data" action=""  method="post">
                        <div class="card d-flex col-md-12" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Req 3</h5>
                                <p class="card-text ">Ici, vous pouvez mettre votre texte assez long. Il sera tronqué avec des points de suspension.</p>
                                <a href="#" class="btn btn-primary">Modifier</a>
                            </div>
                        </div>
                    </form>
                    <form enctype="multipart/form-data" action=""  method="post">
                        <div class="card d-flex col-md-12" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Req 1</h5>
                                <p class="card-text ">Ici, vous pouvez mettre votre texte assez long. Il sera tronqué avec des points de suspension.</p>
                                <a href="#" class="btn btn-primary">Modifier</a>
                            </div>
                        </div>
                    </form>
                    <form enctype="multipart/form-data" action=""  method="post">
                        <div class="card d-flex col-md-12" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Req 1</h5>
                                <p class="card-text ">Ici, vous pouvez mettre votre texte assez long. Il sera tronqué avec des points de suspension.</p>
                                <a href="#" class="btn btn-primary">Modifier</a>
                            </div>
                        </div>
                    </form>
                    <form enctype="multipart/form-data" action=""  method="post">
                        <div class="card d-flex col-md-12" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Req ...</h5>
                                <p class="card-text ">Ici, vous pouvez mettre votre texte assez long. Il sera tronqué avec des points de suspension.</p>
                                <a href="#" class="btn btn-primary">Modifier</a>
                            </div>
                        </div>
                    </form>
                   </div>
                </main>
                <?php include_once "templates/footer.php";?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
