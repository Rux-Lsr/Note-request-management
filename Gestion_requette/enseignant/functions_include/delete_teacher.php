<?php
    require_once 'connect.php';
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $stmt = $con->prepare("DELETE FROM enseignant WHERE id_enseignant = :id_");
        $stmt->bindParam(':id_', $id);
        $res=$stmt->execute();
        if($res) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
?>
