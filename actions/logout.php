<?php
    session_start();

    require_once('./db.php');

    if(isset($_REQUEST['key'])) {
        $key = $_REQUEST['key'];
        //
        $check="SELECT * FROM `tuser` WHERE `LOGIN`='$key'";
        $rcheck=$pdo->prepare($check);
        $rcheck->execute();
        $data = $rcheck->fetch();

        //Ajout de l'etat
        $etat="INSERT INTO `tetat` (`NOM`, `PROFIL`, `CLE_UNIQUE`, `CODE_AG`,`ETAT`) VALUES (?,?,?,?,?)";
        $params=array($data['NOM'], $data['PRO'], $data['LOGIN'], $data['CODE_AG'], "Déconnecté");
        $rEtat=$pdo->prepare($etat);
        $rEtat->execute($params);

    }

    session_destroy();
    header("location:../index.php");
?>