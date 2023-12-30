<?php
    function updateCommon($param, $type = 0){
        $con = new PDO("mysql:dbname=requette;host=localhost","root","");
        $param = htmlspecialchars($param);
        if($con == false)
            die("Connexion echoué");
        if($type == 0){ 
          

            $sql = "UPDATE enseignant SET nom_enseignant=:usr where id_enseignant=:id_";
            $stm = $con->prepare($sql);
            $stm->bindParam(":usr",$param);
            $stm->bindParam(":id_",$_SESSION['user']['id_enseignant']);
            $stm->execute();
            echo "<div class=\"alert alert-success mx-0 mt-0\">Nom d'utilisateur mis à jour avec success</div>";
            //mise à jour de la nouvelle variable de session
            $sql = "SELECT id_enseignant, nom_enseignant,  email_enseignant from enseignant where id_enseignant = :id_";
            $stm = $con->prepare($sql);
            $stm ->bindValue(':id_',$_SESSION['user']['id_enseignant'] , PDO::PARAM_STR);
            $stm->execute();
            $result = $stm->fetch(PDO::FETCH_ASSOC);
            
                $_SESSION["user"] = $result;
            
    
        }else if($type==1){
              //verification de doublon de mail dans la bd
              $sql = "SELECT count(*) FROM enseignant where email_enseignant=:mail";
              $stm = $con->prepare($sql);
              $stm->bindValue(':mail', $param);
              $stm->execute();
              $count = $stm->fetchColumn();
            if($count < 1)
            {
                $sql = "UPDATE enseignant SET email_enseignant=:usr where id_enseignant=:id_";
                $stm = $con->prepare($sql);
                $stm->bindParam(":usr",$param);
                $stm->bindParam(":id_",$_SESSION['user']['id_enseignant']);
                $stm->execute();
                echo "<div class=\"alert alert-success mx-0 mt-0\">Email mis à jour avec success</div>";
                $sql = "SELECT id_enseignant, nom_enseignant,  email_enseignant, id_filiere from enseignant where id_enseignant = :id_";
                $stm = $con->prepare($sql);
                $stm ->bindValue(':id_',$_SESSION['user']['id_enseignant'] , PDO::PARAM_STR);
                $stm->execute();
                $result = $stm->fetch(PDO::FETCH_ASSOC);
                $_SESSION["user"] = $result;
            }else{
                echo "<div class=\"alert alert-danger mx-0 mt-0\">Email Deja existant</div>";
            }
           
        }
    }

    function updatePswd($param, $new_mdp){
        $con = new PDO("mysql:dbname=requette;host=localhost","root","");
        $param = htmlspecialchars($param);
        if($con == false)
            die("Connexion echoué");

        $param = htmlspecialchars($param);
        $sql = "SELECT count(*) FROM enseignant where id_enseignant=:id_ and mdp=:pswd";
        $stm = $con->prepare($sql);
        $stm->bindValue(':id_', $_SESSION["user"]["id_enseignant"]);
        $stm->bindValue(':pswd', $param);
        $stm->execute();
        $count = $stm->fetchColumn();
        if ($count > 0) {
            $sql = "UPDATE enseignant SET mdp=:ps where id_enseignant=:id_";
            $stm = $con->prepare($sql);
            $stm->bindParam(":ps",$new_mdp);
            $stm->bindParam(":id_",$_SESSION['user']['id_enseignant']);
            $stm->execute();
            echo "<div class=\"alert alert-success mx-0 mt-0\">Mot de passe mis à jour avec success</div>";
        }else {
            echo "<div class=\"alert alert-warning mx-0 mt-0\">mot de passe actuel erroné</div>";
        }
    }






    