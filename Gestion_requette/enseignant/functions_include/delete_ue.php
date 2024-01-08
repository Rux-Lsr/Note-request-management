<?php
    require_once 'connect.php';
    if(isset($post['id'])) {
        if($_POST["reponse"]  == 'true'){
            $id = $_GET['id'];
            $stmt = $con->prepare("DELETE FROM ue WHERE id_UE = :id_");
            $stmt->bindParam(':id_', $id);
            $res = $stmt->execute();
            if($res) {
                echo 'success';
            } else {
                echo 'error';
        }
        }
    }
?>
