<?php 
    session_start();
    
    if(!isset($_SESSION['PROFIL'])){
        header("location:../../index.php");
    }
?>