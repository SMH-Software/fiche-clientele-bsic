<?php include('../../../actions/secure.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord Admin | Etats</title>
    <link rel="shortcut icon" href="../../../assets/img/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="../../../assets/css/style.css?v=1.1">
</head>
<body>
    <div class="container-side">
        <?php include('../../layout/sidbar_admin.php') ?>
        <div class="content">
            <h2>Etat</h2>
            <div class="banner"></div> 
        </div>
    </div>


    
    <script src="../../../assets/js/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="module" src="../../../assets/js/etat.js" defer></script>

    <script>
        setInterval('load_etat()', 500);
        function load_etat() {
            $('.banner').load('frag_etat.php');
        }
    </script>

    <?php include('../../../actions/alerts.php') ?>
</body>
</html>