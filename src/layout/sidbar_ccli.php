<div class="sidebar-box">
    <div class="sidebar">
        <a href="./dashboard.php"> <ion-icon name="speedometer-outline"></ion-icon> Tableau de bord</a>
        <hr>
        <a href="./saisie.php"> <ion-icon name="clipboard-outline"></ion-icon>Saisie</a>
        <a href="./evenement.php"> <ion-icon name="newspaper-outline"></ion-icon>Evénements</a>

        <a href="../../../actions/logout.php?key=<?= $_SESSION['PROFIL']['LOGIN'] ?>" onclick="return confirm('Vous allez êtes déconnecter, OK ?')"> <ion-icon name="log-out-outline"></ion-icon>se déconnecter</a>
    </div>
</div>