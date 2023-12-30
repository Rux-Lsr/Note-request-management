<?php
    $reponse = $_POST['reponse'];
    if ($reponse == 'true') {
        require_once '../functions_include/connect.php';
        $stm = $con->prepare("DELETE from requette where id_Requette = :id_");
        $stm->bindValue(':id_', $_POST['id']);
        $stm->execute();
        echo "success";
    }else{
        echo "annulée";
    }

?>