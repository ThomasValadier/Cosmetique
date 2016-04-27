<?php

require_once '../views/includes/header_logged.php';
require_once '../controllers/test-profil-user.php';

$resultatTest = $_SESSION['session']['resultatTest'];

if (!isset($_SESSION['session']) && !isset($resultatTest))
{
    echo '<script language="JavaScript" type="text/javascript">window.location.replace("../views/register.php");</script>';
}

?>

<!-- CONTENT TITLE -->
<div class="col-md-offset-1 col-md-10 content-title-resultatTest">
    <?php
    if ($_SESSION['session']['resultatTest'] == 1):
        echo "<h1>Peaux grasses</h1><p>Avec le test que vous avez passé, nous avons pu trier les produits et vous proposez ce dont vous avez besoin.</p>";
    elseif ($_SESSION['session']['resultatTest'] == 2):
        echo "<h1>Peaux mixtes à grasses</h1><p>Avec le test que vous avez passé, nous avons pu trier les produits et vous proposez ce dont vous avez besoin.</p>";
    elseif ($_SESSION['session']['resultatTest'] == 3):
        echo "<h1>Peaux sèches & déshydratées</h1><p>Avec le test que vous avez passé, nous avons pu trier les produits et vous proposez ce dont vous avez besoin.</p>";
    elseif ($_SESSION['session']['resultatTest'] == 4):
        echo "<h1>Peaux sensibles</h1><p>Avec le test que vous avez passé, nous avons pu trier les produits et vous proposez ce dont vous avez besoin.</p>";
    endif;
    ?>

</div>

<!-- CONTENT QUESTION -->
<div class="col-md-offset-1 col-md-10 content-produit-perso">
    <?php

    $produits = $DB->query("SELECT * FROM produits WHERE resultatTest = '$resultatTest'");

    foreach ( $produits as $produit ):

    ?>

        <div class="box_produit">
            <div class="row zone_image">
                <a href="../views/produit.php?id_produit=<?= $produit->id_produit; ?>"><img class="img-responsive" src="../assets/images/upload/<?= $produit->image; ?>"></a>
            </div>
            <div class="row zone_description">
                <div class="row zone_nom">
                    <p><?= $produit->nom_produit; ?></p>
                </div>
                <div class="row zone_prix">
                    <p><?= number_format($produit->prix_produit,2,',',''); ?> €</p>
                </div>
                <div class="row zone_add">
                    <a class="addPanier" href="../controllers/addpanier.php?id_produit=<?= $produit->id_produit; ?>">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
        </div>

    <?php endforeach ?>

</div>
<!-- FIN CONTENT QUESTION -->

<?php require_once '../views/includes/footer.php'; ?>
