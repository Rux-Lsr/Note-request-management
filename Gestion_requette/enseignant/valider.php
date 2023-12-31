<?php
    require_once "functions_include/connect.php";
    if ($_POST["reponse"] == true) {
        $stm = $con->prepare("UPDATE requette set requette.status = 1 where id_Requette=:id_");
        $stm->bindValue(':id_',$_POST['id']);
        $stm->execute();
        echo "ok";
    }else
     echo "error";