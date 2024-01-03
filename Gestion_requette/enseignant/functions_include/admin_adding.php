<?php
function insert_UE($libelle, $code, $nv, $filiere){
    require 'functions_include/connect.php';
    
    $lib = htmlspecialchars($libelle);
    $code = htmlspecialchars($code);
    $nv = htmlspecialchars($nv);
    $filiere = htmlspecialchars($filiere);

    // Vérifier si l'UE existe déjà
    $check = $con->prepare("SELECT * FROM ue WHERE code_UE = :code");
    $check->bindValue(':code', $code);
    $check->execute();
    if($check->rowCount() > 0){
        echo "<div class='alert alert-warning'>L'UE existe déjà</div>";
        return;
    }

    $sql = "INSERT into ue(libelle_UE, code_UE, id_filiere, code_niveau) values (:lib, :code, :filiere, :nv)";
    $stm = $con->prepare($sql);
    $stm->bindValue(':lib', $lib);
    $stm->bindValue(':code', $code);
    $stm->bindValue(':filiere', $filiere);
    $stm->bindValue(':nv', $nv);
    $re = $stm->execute();
    if($re){
        echo "<div class='alert alert-success'>Ajout de l'UE effectué avec success</div>";
    }else 
    echo "<div class='alert alert-warning'>Echec d'ajout de l'UE</div>";
}

function insert_Enseignant($nom, $email, $mdp, $ue){
    require 'functions_include/connect.php';
    $nom = htmlspecialchars($nom);
    $email = htmlspecialchars($email);
    $mdp = htmlspecialchars($mdp);
    $ue = htmlspecialchars($ue);

    // Vérifier si l'enseignant existe déjà
    $check = $con->prepare("SELECT * FROM enseignant WHERE email_enseignant = :email");
    $check->bindValue(':email', $email);
    $check->execute();
    if($check->rowCount() > 0){
        echo "<div class='alert alert-warning'>L'enseignant existe déjà avec cet e mail</div>";
        return;
    }

    try {
        // Commencer la transaction
        $con->beginTransaction();

        $sql = "INSERT into enseignant(nom_enseignant, email_enseignant, mdp) values ('$nom', '$email', '$mdp')";
        $stm = $con->prepare($sql);
        $re = $stm->execute();

        $stm =$con->prepare("UPDATE ue set ue.id_enseignant=(select id_enseignant from enseignant where email_enseignant=:e) where id_UE = :ue");
        $stm->bindValue(":e", $email);
        $stm->bindValue(":ue", $ue);
        $re = $stm->execute();

        // Si tout se passe bien, valider la transaction
        $con->commit();

        echo "<div class='alert alert-success'>Enseignant ajouté avec success</div>";
    } catch (Exception $e) {
        // En cas d'erreur, annuler la transaction
        $con->rollBack();
        echo "<div class='alert alert-warning'>Echec d'ajout de l'enseignant:". $e->getMessage()."</div>";
    }
}
?>
