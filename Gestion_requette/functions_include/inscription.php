<?php

    function insertInto($tableName, $nom, $matricule, $mail, $pswd, $filiere){
        require_once "connect.php";
        $id_fil = ($filiere == "ICT4D") ? 1 : 2 ;
        if($tableName == "etudiant"){
            
            $sql = "INSERT INTO"+$tableName+"(`nom`, `matricule_Etudiant`, `email_Etudiant`, `id_filiere`, `mdp`)
                                                VALUES("+htmlspecialchars($nom)+","+htmlspecialchars($matricule)+","+htmlspecialchars($mail)+","+$id_fil+","+htmlspecialchars($pswd)+")";
            $stm = $con->query($sql);
            $stm->execute();
        }else if($tableName =="enseignant"){
            $sql = "INSERT INTO"+$tableName+"(`nom_enseignant`, `email_enseignant`, `id_filiere`, `mdp`)
            VALUES("+htmlspecialchars($nom)+","+htmlspecialchars($mail)+","+$id_fil+","+htmlspecialchars($pswd)+")";
            $stm = $con->query($sql);
            $stm->execute();
        }
    }