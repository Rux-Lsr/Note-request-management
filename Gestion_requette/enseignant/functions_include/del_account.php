<?php  
    session_start();
    if($_POST["reponse"] == 'true'){
        $con = new PDO("mysql:dbname=requette;host=localhost","root","");
        if($con == false)
            die("Connexion echoué");

        $sql = "DELETE FROM enseignant where id_enseignant = :id_";
        $stm =$con->prepare($sql);
        $stm->bindValue(':id_', $_SESSION["user"]["id_enseignant"]);
        $stm->execute();

        session_destroy();
        
    }
