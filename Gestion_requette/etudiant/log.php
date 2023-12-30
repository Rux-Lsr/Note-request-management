<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lol</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
         .navbar-custom {
            background-color: #f8f9fa; /* Couleur claire */
            box-shadow: 0 4px 2px -2px rgba(0, 0, 0, 0.1); /* Bordure inférieure ombrée */
            margin-bottom: 20px;
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
<body class="bg-light">
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
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="../../enseignant/authentication/login.php">Enseignant</a>
                    </li> -->
                </ul>
            </div>
        </nav>
        <div class="alert alert-success">Votre compte a été crée avec success</div>
        <a href="authentication/login.php" class="btn-success">Cliquez ici pour vous vous diriger vers la page de connexion</button>
        <footer class="py-4 bg-light mt-auto footer">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; ICT4D academic project 2023</div>
        </div>
    </div>
</body>
</html>