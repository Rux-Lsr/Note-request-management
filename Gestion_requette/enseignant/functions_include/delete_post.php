<?php
    if(isset($_POST['id'])){
       if($_POST['reponse']=="true"){
            $sql = "DELETE from fiche_de_note where fiche_de_note.id = :id_";
            require_once "connect.php";

            $stm = $con->prepare($sql);
            $stm->bindValue(':id_', $_POST['id']);
            $stm->execute();

       }
    }

    