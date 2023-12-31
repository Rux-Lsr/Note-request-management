<?php

function insertInto($tableName, $nom, $matricule, $mail, $pswd, $filiere){
    require_once "connect.php";
    $id_fil = ($filiere == "ICT4D") ? 1 : 2 ;
    if($tableName == "etudiant"){
        // Préparation de la requête pour vérifier l'existence du matricule
        $sql = "SELECT count(*) as nb FROM $tableName WHERE matricule_Etudiant = :matricule ";
        // Création d'un objet PDOStatement
        $stm = $con->prepare($sql);
        // Liaison de la valeur au marqueur
        $stm->bindValue(":matricule", $matricule);
        // Exécution de la requête
        $stm->execute();
        // Récupération du nombre de lignes
        $count = $stm->fetchColumn();
       
       
        if($count >= 1){
            echo "<div class='alert alert-warning' role='alert'>Matricule deja existant</div>";
        }else{

            // Préparation de la requête pour vérifier l'existence du mail
            $sql = "SELECT count(*) as nb FROM $tableName WHERE email_Etudiant = :mail";
            // Création d'un objet PDOStatement
            $stm = $con->prepare($sql);
            // Liaison de la valeur au marqueur
            $stm->bindValue(":mail", $mail);
            // Exécution de la requête
            $stm->execute();
            // Récupération du nombre de lignes
            $count = $stm->fetchColumn();
            // Si le résultat est supérieur à zéro, le mail existe déjà
            if($count >= 1){
                echo "<div class='alert alert-warning' role='alert'>Adresse e mail deja existante</div>";
            }else{
                // Préparation de la requête pour insérer les données
                $sql = "INSERT INTO $tableName (`nom`, `matricule_Etudiant`, `email_Etudiant`, `id_filiere`, `mdp`)
                        VALUES (:nom, :matricule, :mail, :id_fil, :pswd)";
                // Création d'un objet PDOStatement
                $stm = $con->prepare($sql);
                // Liaison des valeurs aux marqueurs
                $stm->bindValue(":nom", $nom);
                $stm->bindValue(":matricule", $matricule);
                $stm->bindValue(":mail", $mail);
                $stm->bindValue(":id_fil", $id_fil);
                $stm->bindValue(":pswd", $pswd);
                // Exécution de la requête
                $stm->execute();
               header("Location: ../log.php");
            }
        }
    }else if($tableName =="enseignant"){
        // Préparation de la requête pour vérifier l'existence du mail
        $sql = "SELECT * FROM $tableName WHERE email_enseignant = :mail";
        // Création d'un objet PDOStatement
        $stm = $con->prepare($sql);
        // Liaison de la valeur au marqueur
        $stm->bindValue(":mail", $mail);
        // Exécution de la requête
        $stm->execute();
        // Récupération du nombre de lignes
        $rs = $stm->fetchAll(PDO::FETCH_ASSOC);
        $count = count($rs);
        // Si le résultat est supérieur à zéro, le mail existe déjà
        if($count > 0){
            afficher_modal("Message", "Impossible, ce mail existe déjà dans la base de données");
        }else{
            // Préparation de la requête pour insérer les données
            $sql = "INSERT INTO $tableName (`nom_enseignant`, `email_enseignant`, `id_filiere`, `mdp`)
                    VALUES (:nom, :mail, :id_fil, :pswd)";
            // Création d'un objet PDOStatement
            $stm = $con->prepare($sql);
            // Liaison des valeurs aux marqueurs
            $stm->bindValue(":nom", $nom);
            $stm->bindValue(":mail", $mail);
            $stm->bindValue(":id_fil", $id_fil);
            $stm->bindValue(":pswd", $pswd);
            // Exécution de la requête
            $stm->execute();
        }
    }
}


// Définition de la fonction
function afficher_modal($titre, $texte){
    // Affichage du bouton qui déclenche le modal
    echo "";
    // Affichage du contenu du modal
    echo "<div class=\"modal fade\" id=\"monModal\" tabindex=\"-1\" aria-labelledby=\"titreModal\" aria-hidden=\"true\">";
    echo "<div class=\"modal-dialog\">";
    echo "<div class=\"modal-content\">";
    echo "<div class=\"modal-header\">";
    echo "<h5 class=\"modal-title\" id=\"titreModal\">$titre</h5>"; // Utilisation du paramètre $titre
    echo "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Fermer\"></button>";
    echo "</div>";
    echo "<div class=\"modal-body\">";
    echo "<p>$texte</p>"; // Utilisation du paramètre $texte
    echo "</div>";
    echo "<div class=\"modal-footer\">";
    echo "<button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Fermer</button>";
   
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
}

// Appel de la fonction avec des exemples de paramètres


    
?>