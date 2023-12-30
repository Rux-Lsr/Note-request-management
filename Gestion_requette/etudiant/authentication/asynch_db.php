<?php
    
    $msg = "E-mail ou mot de passe incorrect";
    if(isset($_POST['mail']) && isset($_POST['pswd'])){
        $mail = htmlspecialchars( $_POST['mail']);
        $mdp = htmlspecialchars($_POST['pswd']);
        if(!empty($mail) && !empty($mdp)){
            require_once '../functions_include\connect.php';
            $sql = "SELECT id_Etudiant, nom, matricule_Etudiant, email_Etudiant, id_filiere from etudiant where email_Etudiant = :mail and mdp = :mdp";
            $stm = $con->prepare($sql);
            $stm ->bindValue(':mail',$mail , PDO::PARAM_STR );
            $stm ->bindValue(':mdp' ,$mdp);
            $stm->execute();

            $result = $stm->fetch(PDO::FETCH_ASSOC);
                   if($result){
                    $_SESSION["user"] = $result;
                    echo "ok";
                   }else 
                    echo $msg;
                }

            }
