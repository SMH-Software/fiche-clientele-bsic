<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace d'identification</title>
    <link rel="shortcut icon" href="../../assets/img/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="../../assets/css/form.css?v=1.1">
</head>
<body>
    <section class="container">
       
       <form action="../../actions/login.php" method="POST" class="form">
           
           <div class="form-head">
               <ion-icon name="person-outline"></ion-icon>
               <h1>connectez-vous</h1>
           </div>
           
           <div class="form-group">
                <ion-icon name="person-circle-outline"></ion-icon>
               <input type="text" id="login" placeholder="Login" name="login" required autocomplete="off">
           </div>
           <div class="form-group">
               <ion-icon name="lock-closed-outline"></ion-icon>
               <input type="password" id="mdp" placeholder="Mot de passe" name="mdp" required autocomplete="off"> 
           </div>
          
           
           <button type="submit" name="submit">se connecter</button>
       </form>
   </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php include('../../actions/alerts.php') ?>
</body>
</html>