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

    function getStatusRq($st){
        switch ($st){
            case 0 :
                return "<button class='btn btn-warning'>En cours de traitement</button>";
            case 1 :
                return "<button class='btn btn-success'>Validé</button>";
            case -1:
                return "<button class='btn btn-danger'>Rejettée</button>";
        }
    }
    function actionDependOnStatus($st, $id_Requette, $numReq){
        switch($st){
            case 0 :
                return "<button class=\"btn btn-danger\" onclick='confirmDelete($numReq)'>Annuler</button>";
            case 1 :
                return "<button class=\"btn btn-success\">OK</button>";
            case -1:
                return "<button class=\"btn btn-warning\" disable href='modif-req.php?id_rq=$id_Requette'>Modifier</button>";
        }
    }
?>