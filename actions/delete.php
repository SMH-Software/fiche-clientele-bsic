<?php

    session_start();

    if(isset($_REQUEST['content']) ){

        $id = $_REQUEST['id'];
        $key = $_REQUEST['key'];

        require_once('./db.php');

        if($_REQUEST['content'] === "user"){

            $dUser="DELETE FROM `tuser` WHERE `LOGIN`='$key'";
            $rUser=$pdo->prepare($dUser);
            $rUser->execute();

            $dProfil="DELETE FROM `tprofil` WHERE `CLE_UNIQUE`='$key'";
            $rProfil=$pdo->prepare($dProfil);
            $rProfil->execute();

            $_SESSION['success'] = "Utilisateur supprimé avec succès !";
            header("location:../src/views/admin/utilisateur.php"); 

        }elseif($_REQUEST['content'] === "saisie"){
            $delete="DELETE FROM `teve` WHERE ID='$id'";
            $result=$pdo->prepare($delete);
            $result->execute();

            $_SESSION['success'] = "Saisie supprimée avec succès !";
            header("location:../src/views/ccli/evenement.php");

        }
               
    }

?>