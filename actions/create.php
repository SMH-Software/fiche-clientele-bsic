<?php
    session_start();
    // Gestion du formulaire "profil"
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

        if(isset($_POST["create"])) {
            
            require_once('./db.php');

            if($_POST["create"] === "user") {

                $login = htmlspecialchars($_POST['login']);
                $nom = htmlspecialchars($_POST['nom']);
                $code_ag = htmlspecialchars($_POST['code_agence']);
              
                // Générer un mot de passe de façon aléatoire
                $set_mdp = str_shuffle($login.rand(0,99999));
                $mdp = strtolower(substr($set_mdp, 0, 8));

                $pro = htmlspecialchars($_POST['profil']);

                //Vérification l'existence d'un utilisateur dans la base de données
                $check="SELECT * FROM tuser WHERE `LOGIN`='$login'";
                $result_check=$pdo->prepare($check);
                $result_check->execute();

                if($checked=$result_check->fetch()){
                    $_SESSION['checked'] = 'Login saisi est déjà attribué';
                    header("location:../src/views/admin/utilisateur.php");
                }else {

                    $create="INSERT INTO `tuser` (`LOGIN`, `NOM`, `MDP`, `PRO`, `CODE_AG`) VALUES (?,?,?,?,?)";
                    $params=array($login,$nom,$mdp,$pro,$code_ag);
                    $result=$pdo->prepare($create);
                    $result->execute($params);
                   
                    $profil="INSERT INTO `tprofil` (`NO`, `PRO`, `CLE_UNIQUE`, `CODE_AG`) VALUES (?,?,?,?)";
                    $params=array($nom,$pro,$login,$code_ag);
                    $result_profil=$pdo->prepare($profil);
                    $result_profil->execute($params);
    
                    $_SESSION['success'] = 'Nouveau user ajouté avec success';
                    header("location:../src/views/admin/utilisateur.php");
                }

            }elseif($_POST["create"] === "saisie") {

                $eventement = htmlspecialchars($_POST['neve']);
                $tclient = htmlspecialchars($_POST['tclient']);
                $nom_prenom = htmlspecialchars($_POST['nom_prenom']);
                $numCompte = htmlspecialchars($_POST['numCompte']);
                $email = htmlspecialchars($_POST['email']);
                $tel = htmlspecialchars($_POST['tel']);
                $date = (new \DateTime())->format('Y-m-d H:i:s');
                $detailEven = nl2br(htmlspecialchars($_POST['detailEven']));
                $key = htmlspecialchars($_POST['key']);
                $code_ag = htmlspecialchars($_POST['code_agence']);


                
                $create="INSERT INTO `teve` (`NEVE`, `TCLI`, `NOM_PRENOM`, `NCP`, `EMAIL`, `TEL`, `DCO`, `DET`, `CLE_UNIQUE`, `CODE_AG`) VALUES (?,?,?,?,?,?,?,?,?,?)";
                $params=array($eventement,$tclient,$nom_prenom,$numCompte,$email,$tel,$date,$detailEven,$key,$code_ag);
                $result=$pdo->prepare($create);
                $result->execute($params);
               
                $_SESSION['success'] = 'Nouvelle saisie ajoutée avec success';
                header("location:../src/views/ccli/saisie.php");

            }

            
        }
        
    } 
?>