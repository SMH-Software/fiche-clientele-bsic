<?php
    session_start();
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

        //Connexion avec la base de données
        require_once('./db.php');

        //Récupération des champs de saisi (login et mot de pass) du formulaire
        $login = htmlspecialchars($_POST['login']);
        $mdp = htmlspecialchars($_POST['mdp']);
       /*  $mdp = sha1(htmlspecialchars($_POST['mdp'])); */

        //requette de vérification dans la base de donnée
        $connexion="SELECT * FROM tuser WHERE `LOGIN`='$login' AND `MDP`='$mdp'";
        $result=$pdo->prepare($connexion);
        $result->execute();

        //Vérification et redirection
        if($profil=$result->fetch()){
            
            /* function addEtat() {
                $etat="INSERT INTO `tetat` (`NOM`, `PROFIL`,`CLE_UNIQUE`,`CODE_AG`, `ETAT`) VALUES (?,?,?,?,?)";
                $params=array($profil['NOM'],$profil['PRO'],$profil['LOGIN'],$profil['CODE_AG'], "Connecté");
                $rEtat=$pdo->prepare($etat);
                $rEtat->execute($params);
            } */

            if($profil['PRO'] === "admin"){
                $_SESSION['PROFIL'] = $profil;
                header("location:../src/views/admin/dashboard.php");
            }elseif($profil['PRO'] === "Chef Agence"){

                //Ajout de l'etat
                $etat="INSERT INTO `tetat` (`NOM`, `PROFIL`,`CLE_UNIQUE`,`CODE_AG`, `ETAT`) VALUES (?,?,?,?,?)";
                $params=array($profil['NOM'],$profil['PRO'],$profil['LOGIN'],$profil['CODE_AG'], "Connecté");
                $rEtat=$pdo->prepare($etat);
                $rEtat->execute($params);

                $_SESSION['PROFIL'] = $profil;
                header("location:../src/views/ca/dashboard.php");

            }elseif($profil['PRO'] === "Chargé Clientèle"){

                //Ajout de l'etat
                $etat="INSERT INTO `tetat` (`NOM`, `PROFIL`,`CLE_UNIQUE`,`CODE_AG`, `ETAT`) VALUES (?,?,?,?,?)";
                $params=array($profil['NOM'],$profil['PRO'],$profil['LOGIN'],$profil['CODE_AG'], "Connecté");
                $rEtat=$pdo->prepare($etat);
                $rEtat->execute($params);

                $_SESSION['PROFIL'] = $profil;
                header("location:../src/views/ccli/dashboard.php");

            }elseif($profil['PRO'] === "Organisateur"){

                //Ajout de l'etat
                $etat="INSERT INTO `tetat` (`NOM`, `PROFIL`,`CLE_UNIQUE`,`CODE_AG`, `ETAT`) VALUES (?,?,?,?,?)";
                $params=array($profil['NOM'],$profil['PRO'],$profil['LOGIN'],$profil['CODE_AG'], "Connecté");
                $rEtat=$pdo->prepare($etat);
                $rEtat->execute($params);

                $_SESSION['PROFIL'] = $profil;
                header("location:../src/views/org/dashboard.php");
            }

        }else{ 

            //Message d'erreur si informations de connexion incorrectes
            $_SESSION['error'] = 'Login ou mot de passe incorrect';
            header("location:../index.php");
        }
        
       
    } 
?>