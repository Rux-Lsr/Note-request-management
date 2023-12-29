<?php
        $con = new PDO("mysql:dbname=requette;host=localhost","root","");
        if($con == false)
            die("Connexion echoué");
?>