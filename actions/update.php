<?php
    session_start();
    // Gestion du formulaire "profil"
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

        require_once('./db.php');

        $eventement = htmlspecialchars($_POST['neve']);
        $tclient = htmlspecialchars($_POST['tclient']);
        $nom_prenom = htmlspecialchars($_POST['nom_prenom']);
        $numCompte = htmlspecialchars($_POST['numCompte']);
        $email = htmlspecialchars($_POST['email']);
        $tel = htmlspecialchars($_POST['tel']);
        $date = (new \DateTime())->format('Y-m-d H:i:s');
        $detailEven = htmlspecialchars($_POST['detailEven']);
        $id = htmlspecialchars($_POST['id']);

        
        $update="UPDATE `teve` SET `NEVE`='$eventement',`TCLI`='$tclient',`NOM_PRENOM`='$nom_prenom',`NCP`='$numCompte',`EMAIL`='$email',`TEL`='$tel', `DCO`='$date',`DET`='$detailEven ' WHERE ID='$id'";
        $result=$pdo->prepare($update);
        $result->execute();
       
        $_SESSION['success'] = 'Modification(s) enrégistrée(s) avec succès ';
        header("location:../src/views/ccli/evenement.php");
        
    } 
?>