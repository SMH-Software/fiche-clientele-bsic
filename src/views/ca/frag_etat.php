
<?php 
    include('../../../actions/secure.php');
    require_once('../../../actions/db.php');

    $nombre_par_page = 10; // Nombre d'éléments par page
    $page_actuelle = isset($_GET['page']) ? $_GET['page'] : 1; // Page actuelle, par défaut 1

   // Calculer le point de départ pour la requête SQL
    $offset = ($page_actuelle - 1) * $nombre_par_page;
    $key = $_SESSION['PROFIL']['LOGIN'];
    $code_ag = $_SESSION['PROFIL']['CODE_AG'];

    $sql = "SELECT * FROM tetat WHERE `CLE_UNIQUE`!='$key' AND `CODE_AG`='$code_ag' ORDER BY ID DESC LIMIT :offset, :nombre_par_page";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindParam(':nombre_par_page', $nombre_par_page, PDO::PARAM_INT);
    $stmt->execute();
    
    // Requête pour compter le nombre total d'éléments
    $total_elements = $stmt->rowCount();

    // Calculer le nombre total de pages
    $nombre_de_pages = ceil($total_elements / $nombre_par_page);

    require_once('../../../actions/myFunctions.php');

    if($total_elements == 0){ ?>
        <div class="alert alert-info" role="alert">
            Aucun état trouvé (<?= $total_elements; ?>)
        </div>
    <?php } else { ?> 
        <div class="table-box">
            <table >
                <thead class="">
                    <tr>
                        <th>NOM</th>
                        <th>PROFIL</th>
                        <th>ETAT</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($etat=$stmt->fetch()) {?> 

                        <tr>
                            <td><?= $etat['NOM'] ?></td>
                            <td><?= $etat['PROFIL'] ?></td>
                            <td>
                                <h6> 
                                    <span class="badge <?= $etat['ETAT'] == "Connecté" ? "text-bg-success":"text-bg-danger" ?>">
                                        <?= $etat['ETAT'] ?>
                                    </span>
                                </h6>
                            </td>
                        </tr>
                                    
                    <?php } ?>
                                            
                </tbody>
            </table>
        </div>

        <div class="pagination">
            <?php for ($i = 1; $i <= $nombre_de_pages; $i++) : ?>
                <a href="?page=<?= $i ?>"><?= $i ?></a>
            <?php endfor ?>
        </div>
    <?php } 
?>