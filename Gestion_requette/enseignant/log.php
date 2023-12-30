<?php 
    session_start();
    if(!isset($_SESSION['user']) || isset($_SESSION['user']['matricule_Etudiant']))
    header('Location: ..\error_pages\401.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lol</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="bg-light">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="#">Etudiant</a>
           
        </nav>
        <div class="alert alert-success">Votre compte a été crée avec success</div>
        <a href="authentication/login.php" class="btn-success">Cliquez ici pour vous vous diriger vers la page de connexion</button>
</body>
</html>