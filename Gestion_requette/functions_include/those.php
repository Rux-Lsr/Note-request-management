<?php
    function getEnsId($ue){
        $con = new PDO("mysql:dbname=requette;host=localhost","root","");
        if($con == false)
            die("Connexion echoué");

        $stm =$con->prepare("SELECT e.id_enseignant from enseignant e join ue on ue.id_enseignant = e.id_enseignant where ue.id_UE = :ue");

        $stm->execute(array('ue'=>$ue));
        $ens = $stm->fetch(PDO::FETCH_ASSOC);
        return $ens['id_enseignant'];
    }
?>