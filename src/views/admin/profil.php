<?php include('../../../actions/secure.php') ?>
<?php 

    require_once('../../../actions/db.php');
    
    
    // Paramètres de pagination
    $nombre_par_page = 5; // Nombre d'éléments par page
    $page_actuelle = isset($_GET['page']) ? $_GET['page'] : 1; // Page actuelle, par défaut 1

    // Calculer le point de départ pour la requête SQL
    $offset = ($page_actuelle - 1) * $nombre_par_page;

    // Requête SQL pour récupérer les données paginées
    $sql = "SELECT * FROM tprofil ORDER BY ID DESC LIMIT :offset, :nombre_par_page";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindParam(':nombre_par_page', $nombre_par_page, PDO::PARAM_INT);
    $stmt->execute();

    
    // Requête pour compter le nombre total d'éléments
    $total_elements = $stmt->rowCount();

    // Calculer le nombre total de pages
    $nombre_de_pages = ceil($total_elements / $nombre_par_page);

    

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Profil</title>
    <link rel="shortcut icon" href="../../../assets/img/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="../../../assets/css/style.css?v=1.1">
    
</head>
<body>
    <div class="container-side">
        <?php include('../../layout/sidbar_admin.php') ?>
       
        <div class="content">
            <h2>Profil</h2>

            <!-- <button class="addbtn" id="addProfil">
                <ion-icon name="add-circle-outline"></ion-icon>
                enrégistrer un nouveau profil
            </button> -->
            
            <div class="banner">
               <!--  <div class="form-box" id="form-profil">
                    <form method="POST" action="../../../actions/create.php">
                        <input type="text" name="no" placeholder="Nom" required>
                        <input type="text" name="pro" placeholder="Profi" required>
                        <input type="text" name="expl" placeholder="Explain" required>

                        <input type="text" name="create" value="profil" hidden>
                        <button type="submit" name="submit">Valider</button>
                    </form>
                   
                </div> -->

                <?php if($total_elements == 0){?>
                    <div class="alert alert-info" id="alert" role="alert">
                        Aucun profil trouvé (<?= $total_elements; ?>)
                    </div>
                <?php }else { ?> 
                    <div class="table-box">
                        <table class="">
                            <thead class="">
                                <tr>
                                    <th>nom</th>
                                    <th>profil</th>
                                    <th>expl</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $count = 1;
                                    while($profil=$stmt->fetch()) { ?> 
                                    <tr>
                                        <td><?= $profil['NO'] ?></td>
                                        <td><?= $profil['PRO'] ?></td>
                                        <td><?= $profil['EXPL'] ?></td>
                                       
                                    </tr>
                                <?php } ?>   
                            </tbody>
                        </table>
                    </div>
                                
                   <div class="pagination">
                        <?php for ($i = 1; $i <= $nombre_de_pages; $i++) : ?>
                            <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        <?php endfor; ?>
                   </div>

                <?php } ?>
                
            </div>
             
        </div>
       
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="../../../assets/js/profil.js"></script>

    <?php include('../../../actions/alerts.php') ?>
</body>
</html>