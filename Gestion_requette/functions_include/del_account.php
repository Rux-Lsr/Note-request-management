<?php  
    session_start();
    if($_POST["reponse"] == 'true'){
        $con = new PDO("mysql:dbname=requette;host=localhost","root","");
        if($con == false)
            die("Connexion echoué");

        $sql = "DELETE FROM etudiant where id_Etudiant = :id_";
        $stm =$con->prepare($sql);
        $stm->bindValue(':id_', $_SESSION["user"]["id_Etudiant"]);
        $stm->execute();

        session_destroy();
        header('Location: ');
    }
