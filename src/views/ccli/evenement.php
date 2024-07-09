<?php include('../../../actions/secure.php') ?>
<?php 

    require_once('../../../actions/db.php');
   
    
    
    // Paramètres de pagination
    $nombre_par_page = 5; // Nombre d'éléments par page
    $page_actuelle = isset($_GET['page']) ? $_GET['page'] : 1; // Page actuelle, par défaut 1

    // Calculer le point de départ pour la requête SQL
    $offset = ($page_actuelle - 1) * $nombre_par_page;

    $key = $_SESSION['PROFIL']['LOGIN'];
    // Requête SQL pour récupérer les données paginées
    $sql = "SELECT * FROM teve WHERE `CLE_UNIQUE`='$key' ORDER BY ID DESC LIMIT :offset, :nombre_par_page";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindParam(':nombre_par_page', $nombre_par_page, PDO::PARAM_INT);
    $stmt->execute();

    
    // Requête pour compter le nombre total d'éléments
    $total_elements = $stmt->rowCount();

    // Calculer le nombre total de pages
    $nombre_de_pages = ceil($total_elements / $nombre_par_page);

    require_once('../../../actions/myFunctions.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord | Evénements</title>
    <link rel="shortcut icon" href="../../../assets/img/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="../../../assets/css/style.css?v=1.1">
</head>
<body>
    <div class="container-side">
        <?php include('../../layout/sidbar_ccli.php') ?>
        <div class="content">
            <h2>Evénements</h2>
           
            
            <div class="banner">
                
                <?php if($total_elements == 0){?>
                    <div class="alert alert-info" role="alert">
                        Aucun état trouvé (<?= $total_elements; ?>)
                    </div>
                <?php }else { ?> 
                    <div class="table-box">
                        <table >
                            <thead class="">
                                <tr>
                                    <th>événement</th>
                                    <th>t-Client</th>
                                    <th>nom & prénom</th>
                                    <th>n°cpt</th>
                                    <th>email</th>
                                    <th>tel</th>
                                    <th>enrégistré le </th>
                                    <th>actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $count = 1;
                                    while($saisie=$stmt->fetch()) {?> 

                                    <tr style="font-size: 14px; text-align: justify;" data-title="Détail de l'événement : <?= $saisie['DET'] ?>">
                                       
                                        <td><?= $saisie['NEVE'] ?></td>
                                        <td><?= $saisie['TCLI'] ?></td>
                                        <td><?= $saisie['NOM_PRENOM'] ?></td>
                                        <td><?= $saisie['NCP'] ?></td>
                                        <td><?= $saisie['EMAIL'] ?></td>
                                        <td><?= $saisie['TEL'] ?></td>
                                        <td><?= dateFormat($saisie['DCO']) ?></td>
                                        <td>
                                            <a href="../../../actions/ficcli.php?id=<?= $saisie['ID'] ?>" class="editBtn" title="Editer">
                                                <ion-icon name="clipboard-outline"></ion-icon>
                                            </a>
                                           
                                            <a href="./maj.php?id=<?= $saisie['ID'] ?>" class="updateBtn" title="Modifier">
                                                <ion-icon name="create-outline"></ion-icon> 
                                            </a>
                                            <a href="../../../actions/delete.php?id=<?= $saisie['ID'] ?>&content=saisie" class="deleteBtn" title="Supprimer" onclick="return confirm('La ligne selectionnée va être supprimer. OUI ?')">
                                                <ion-icon name="trash-outline"></ion-icon>
                                                
                                            </a>
                                            
                                        </td>  
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

    <script type="module" src="../../../assets/js/etat.js" defer></script>

    <?php include('../../../actions/alerts.php') ?>
</body>
</html>