<?php include('../../../actions/secure.php') ?>
<?php 

    if(isset($_GET['id'])){
        
        require_once('../../../actions/db.php');

        $id = $_GET['id'];

        $sql = "SELECT * FROM teve WHERE ID='$id'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetch();
    
    }
    
?>

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
            <h2>Mise à jour</h2>
           
            <div class="banner">
                <div class="form-box form-box-saisie edit"  id="form-saisie">
                    <form method="POST" action="../../../actions/update.php">
                            <div class="group-form">
                                <label for="neve">Evenement</label>
                                <select name="neve" id="neve" required>
                                    <option selected>Selectioner un évenement</option>
                                    <option value="Réclamation" <?= $result['NEVE'] == 'Réclamation'? 'selected':'' ?>>Réclamation</option>
                                    <option value="Insatisfaction" <?= $result['NEVE'] == 'Insatisfaction'? 'selected':'' ?> >Insatisfaction</option>
                                    <option value="Suggestion" <?= $result['NEVE'] == 'Suggestion'? 'selected':'' ?> >Suggestion</option>
                                    <option value="Satisfaction" <?= $result['NEVE'] == 'Satisfaction'? 'selected':'' ?> >Satisfaction</option>
                                    <option value="Remarque" <?= $result['NEVE'] == 'Remarque'? 'selected':'' ?> >Remarque</option>
                                </select>
                            </div>
                            <div class="group-form">
                                <label for="tclient">Type client</label>
                                <select name="tclient" id="tclient" required>
                                    <option selected>Selectioner un type</option>
                                    <option value="Client BSIC" <?= $result['TCLI'] == 'Client BSIC'? 'selected':'' ?> >Client BSIC</option>
                                    <option value="Agent BSIC" <?= $result['TCLI'] == 'Agent BSIC'? 'selected':'' ?> >Agent BSIC</option>
                                    <option value="Visiteur" <?= $result['TCLI'] == 'Visiteur'? 'selected':'' ?> >Visiteur</option>
                                    <option value="Autre" <?= $result['TCLI'] == 'Autre'? 'selected':'' ?> >Autre</option>
                                
                                </select>
                            </div>
                            <div class="group-form">
                                <label for="nom_prenom">Nom & Prénom</label>
                                <input type="text" id="nom_prenom" name="nom_prenom" placeholder="Nom & Prénom..." required value="<?= $result['NOM_PRENOM']?>">
                            </div>

                            <div class="group-form">
                                <label for="numCompte">Numéro de compte</label>
                                <input type="number" id="numCompte" name="numCompte" placeholder="Numéro de compte..." required value="<?= $result['NCP']?>">
                            </div>
                        
                            <div class="group-form">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" placeholder="Adresse e-mail..." required value="<?= $result['EMAIL']?>">
                            </div>

                            <div class="group-form">
                                <label for="tel">Tel</label>
                                <input type="number" id="tel" name="tel" placeholder="Téléphone..." required value="<?= $result['TEL']?>">
                            </div>

                            <div class="group-form">
                                <label for="detailEven">Détail de l'énevement</label>
                                <textarea name="detailEven" id="detailEven" cols="40" rows="" placeholder="écrivez ici..."><?= $result['DET']?> </textarea>
                            </div>

                            <input type="text" name="id" value="<?= $result['ID']?>" hidden>
                            <button type="submit" name="submit">enrégistrer les modifications</button>
                    </form>
                </div>
               
            </div>
        </div>
       
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   

    <?php include('../../../actions/alerts.php') ?>
</body>
</html>