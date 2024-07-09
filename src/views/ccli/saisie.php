<?php include('../../../actions/secure.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Saisie</title>
    <link rel="shortcut icon" href="../../../assets/img/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="../../../assets/css/style.css?v=1.1">
</head>
<body>
    <div class="container-side">
        <?php include('../../layout/sidbar_ccli.php') ?>
        <div class="content">
            <h2>Saisie</h2>
            <button class="addbtn" id="addSaisie">
                <ion-icon name="add-circle-outline"></ion-icon>
                enrégistrer une nouvelle saisie
            </button>
            
            <div class="banner">
                <div class="form-box form-box-saisie"  id="form-saisie">
                    <form method="POST" action="../../../actions/create.php">
                            <div class="group-form">
                                <label for="neve">Evenement</label>
                                <select name="neve" id="neve">
                                    <option selected>Selectioner un évenement</option>
                                    <option value="Réclamation">Réclamation</option>
                                    <option value="Insatisfaction">Insatisfaction</option>
                                    <option value="Suggestion">Suggestion</option>
                                    <option value="Satisfaction">Satisfaction</option>
                                    <option value="Remarque">Remarque</option>
                                </select>
                            </div>
                            <div class="group-form">
                                <label for="tclient">Type client</label>
                                <select name="tclient" id="tclient">
                                    <option selected>Selectioner un type</option>
                                    <option value="Client BSIC">Client BSIC</option>
                                    <option value="Agent BSIC">Agent BSIC</option>
                                    <option value="Visiteur">Visiteur</option>
                                    <option value="Autre">Autre</option>
                                
                                </select>
                            </div>
                            <div class="group-form">
                                <label for="nom_prenom">Nom & Prénom</label>
                                <input type="text" id="nom_prenom" name="nom_prenom" placeholder="Nom & Prénom..." required>
                            </div>

                            <div class="group-form">
                                <label for="numCompte">Numéro de compte</label>
                                <input type="text" id="numCompte" name="numCompte" placeholder="Numéro de compte..." required>
                            </div>
                        
                            <div class="group-form">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" placeholder="Adresse e-mail..." required>
                            </div>

                            <div class="group-form">
                                <label for="tel">Téléphone</label>
                                <input type="number" id="tel" name="tel" placeholder="Téléphone..." required>
                            </div>

                            

                            <div class="group-form">
                                <label for="detailEven">Détail de l'énevement</label>
                                <textarea name="detailEven" id="detailEven" cols="40" rows="" placeholder="écrivez ici..."></textarea>
                            </div>

                            <input type="text" name="create" value="saisie" hidden>
                            <input type="text" name="key" value="<?= $_SESSION['PROFIL']['LOGIN'] ?>" hidden>
                            <input type="text" name="code_agence" value="<?= $_SESSION['PROFIL']['CODE_AG'] ?>" hidden>
                            <button type="submit" name="submit">Soumettre</button>
                    </form>
                </div>
               
            </div>
        </div>
       
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="../../../assets/js/saisie.js"></script>

    <?php include('../../../actions/alerts.php') ?>
</body>
</html>