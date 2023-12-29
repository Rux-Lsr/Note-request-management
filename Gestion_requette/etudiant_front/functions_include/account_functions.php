<?php
    function updateCommon($param, $type = 0){
        $con = new PDO("mysql:dbname=requette;host=localhost","root","");
        $param = htmlspecialchars($param);
        if($con == false)
            die("Connexion echoué");
        if($type == 0){ 
          

            $sql = "UPDATE etudiant SET nom=:usr where id_Etudiant=:id_";
            $stm = $con->prepare($sql);
            $stm->bindParam(":usr",$param);
            $stm->bindParam(":id_",$_SESSION['user']['id_Etudiant']);
            $stm->execute();
            echo "<div class=\"alert alert-success mx-0 mt-0\">Nom d'utilisateur mis à jour avec success</div>";
            //mise à jour de la nouvelle variable de session
            $sql = "SELECT id_Etudiant, nom, matricule_Etudiant, email_Etudiant, id_filiere from etudiant where id_Etudiant = :id_";
            $stm = $con->prepare($sql);
            $stm ->bindValue(':id_',$_SESSION['user']['id_Etudiant'] , PDO::PARAM_STR);
            $stm->execute();
            $result = $stm->fetch(PDO::FETCH_ASSOC);
            
                $_SESSION["user"] = $result;
            
    
        }else if($type==1){
              //verification de doublon de mail dans la bd
              $sql = "SELECT count(*) FROM etudiant where email_Etudiant=:mail";
              $stm = $con->prepare($sql);
              $stm->bindValue(':mail', $_SESSION["user"]["email_Etudiant"]);
              $stm->execute();
              $count = $stm->fetchColumn();
            if($count < 1)
            {
                $sql = "UPDATE etudiant SET email_Etudiant=:usr where id_Etudiant=:id_";
                $stm = $con->prepare($sql);
                $stm->bindParam(":usr",$param);
                $stm->bindParam(":id_",$_SESSION['user']['id_Etudiant']);
                $stm->execute();
                echo "<div class=\"alert alert-success mx-0 mt-0\">Email mis à jour avec success</div>";
                $sql = "SELECT id_Etudiant, nom, matricule_Etudiant, email_Etudiant, id_filiere from etudiant where id_Etudiant = :id_";
                $stm = $con->prepare($sql);
                $stm ->bindValue(':id_',$_SESSION['user']['id_Etudiant'] , PDO::PARAM_STR);
                $stm->execute();
                $result = $stm->fetch(PDO::FETCH_ASSOC);
                $_SESSION["user"] = $result;
            }else{
                echo "<div class=\"alert alert-danger mx-0 mt-0\">Email Deja existant</div>";
            }
           
        }else if($type==2){
            $sql = "SELECT count(*) FROM etudiant where matricule_Etudiant=:mat";
            $stm = $con->prepare($sql);
            $stm->bindValue(':mat', $_SESSION["user"]["matricule_Etudiant"]);
            $stm->execute();
            $count = $stm->fetchColumn();

            if ($count < 1) {
                $sql = "UPDATE etudiant SET matricule_Etudiant=:usr where id_Etudiant=:id_";
                $stm = $con->prepare($sql);
                $stm->bindParam(":usr",$param);
                $stm->bindParam(":id_",$_SESSION['user']['id_Etudiant']);
                $stm->execute();
    
                echo "<div class=\"alert alert-success mx-0 mt-0\">Matricule mis à jour avec success</div>";
    
                $sql = "SELECT id_Etudiant, nom, matricule_Etudiant, email_Etudiant, id_filiere from etudiant where id_Etudiant = :id_";
                $stm = $con->prepare($sql);
                $stm ->bindValue(':id_',$_SESSION['user']['id_Etudiant'] , PDO::PARAM_STR);
                $stm->execute();
                $result = $stm->fetch(PDO::FETCH_ASSOC);
                $_SESSION["user"] = $result;
            }else{
                echo "<div class=\"alert alert-danger mx-0 mt-0\">matricule deja existant</div>";
            }
           
        }

    }

    function updatePswd($param, $new_mdp){
        $con = new PDO("mysql:dbname=requette;host=localhost","root","");
        $param = htmlspecialchars($param);
        if($con == false)
            die("Connexion echoué");

        $param = htmlspecialchars($param);
        $sql = "SELECT count(*) FROM etudiant where id_Etudiant=:id_ and mdp=:pswd";
        $stm = $con->prepare($sql);
        $stm->bindValue(':id_', $_SESSION["user"]["id_Etudiant"]);
        $stm->bindValue(':pswd', $param);
        $stm->execute();
        $count = $stm->fetchColumn();
        if ($count > 0) {
            $sql = "UPDATE etudiant SET mdp=:ps where id_Etudiant=:id_";
            $stm = $con->prepare($sql);
            $stm->bindParam(":ps",$new_mdp);
            $stm->bindParam(":id_",$_SESSION['user']['id_Etudiant']);
            $stm->execute();
            echo "<div class=\"alert alert-success mx-0 mt-0\">Mot de passe mis à jour avec success</div>";
        }else {
            echo "<div class=\"alert alert-warning mx-0 mt-0\">mot de passe actuel erroné</div>";
        }
    }






    