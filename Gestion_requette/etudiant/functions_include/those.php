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

    function getStatusRq($st, $id_Requette, $numReq, $id_UE, $objet){
        switch ($st){
            case 0 :
                return "<button type = \"button\" class='btn btn-warning'>En cours de traitement</button>";
            case 1 :
                return "<button type=\"button\" class='btn btn-success'>Validé</button>";
            case -1:
                return "<a class='btn btn-danger' href='trash-rq.php?id_rq=$id_Requette&id_ue=$id_UE&obj=$objet&num_rq=$numReq'>Rejettée</a>";
        }
    }
    function actionDependOnStatus($st, $id_Requette, $numReq, $id_UE, $objet){
        switch($st){
            case 0 :
                return "<button class=\"btn btn-warning\" onclick='confirmDelete($numReq)'>Annuler</button>";
            case 1 :
                return "<button type=\"button\" class=\"btn btn-success\">OK</button>";
            case -1:
                return "<a class=\"btn btn-danger\" disable href='modif-req.php?id_rq=$id_Requette&id_ue=$id_UE&obj=$objet'>Modifier</a>";
            case 2:
                return "<a class=\"btn btn-primary\" disable href='modif-req.php?id_rq=$id_Requette&id_ue=$id_UE&obj=$objet'>Modifier</a>";
        }
    }
?>