<?php

    session_start();
    if(!empty($_POST) && !empty($_FILES)){
        require_once "functions_include/connect.php";

        // Récupération des données du formulaire
        $ue = $_POST['ue'];
        $objet = $_POST['objet'];
        $libelle = $_POST['libelle'];
    
        // Téléchargement du fichier
        $file_name = $_FILES['piece']['name'];
        $file_tmp = $_FILES['piece']['tmp_name'];
        $file_size = $_FILES['piece']['size'];
        $file_parts = explode('.', $file_name);
        $file_ext = strtolower(end($file_parts));
    
        $upload_dir = '../uploads/';
        $file_path = $upload_dir . $file_name;
        $t = 1;
        // Vérification de l'extension du fichier
        $extensions = array("jpeg","jpg","png","pdf","doc","docx","txt");
        if(!in_array($file_ext, $extensions)){
            $t = 0;
            echo('Extension non autorisée, veuillez choisir un fichier JPEG, PNG, PDF, DOC, DOCX ou TXT');
        }
    
        // Vérification de la taille du fichier (3Mo max)
        if($file_size > 3000000 && $t>0){
            echo("Le fichier est trop volumineux, veuillez choisir un fichier de moins de 3Mo.");
            $t = 0;
        }
    
       if($t == 1){
         // Déplacement du fichier vers le répertoire de destination
         move_uploaded_file($file_tmp, $file_path);
    
         // Préparation de la requête SQL
         $req = $con->prepare('INSERT INTO requette (id_UE, objet_Requette, corps_Requette, justificatif_Requette, id_enseignant,id_Etudiant) VALUES (:id_UE, :objet_Requette, :corps_Requette, :piece, :ens, :etu)');
         require_once 'functions_include/those.php';
         // Exécution de la requête SQL
         $req->execute(array(
             'id_UE' => $ue,
             'objet_Requette' => $objet,
             'corps_Requette' => $libelle,
             'piece' => $file_path,
             'etu' => $_SESSION['user']['id_Etudiant'],
             'ens' => getEnsId($ue)
         ));

         echo "ok";
       }
    
       
    }
    
  
