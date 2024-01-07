<!DOCTYPE html>
<html>
<head>
    <title>Acceuil</title>
    <!-- CSS de Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-custom {
            background-color: #f8f9fa; /* Couleur claire */
            box-shadow: 0 4px 2px -2px rgba(0, 0, 0, 0.1); /* Bordure inférieure ombrée */
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
        /* Ajout d'un style pour le rectangle arrondi */
        .rounded-rectangle {
            border-radius: 25px;
            background-color: #f8f9fa;
            padding: 20px;
            margin: 20px;
            text-align: center;
        }
        /* Ajout d'un style pour le bouton de confirmation */
        .confirm-button {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <a class="navbar-brand" href="index.php">Gestion de requette</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="etudiant/authentication/login.php">Etudiant <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="enseignant/authentication/login.php">Enseignant</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <!-- Modification du titre et du contenu de la page -->
        <div class="rounded-rectangle">
            <h1>Bienvenue sur notre application de requête</h1>
            <p>Connectez-vous en tant que</p>
        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <!-- Modification du style des boutons -->
                <a href="enseignant/authentication/login.php" class="confirm-button">Enseignant</a>
            </div>
            <div class="col text-center">
                <a href="etudiant/authentication/login.php" class="confirm-button">Etudiant</a>
            </div>
        </div>
    </div>
    <footer class="py-4 bg-light mt-auto footer">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright © ICT4D academic project 2023</div>
        </div>
    </div>
</footer>
    <!-- JS de Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
