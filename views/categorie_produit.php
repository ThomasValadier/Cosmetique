<?php
require '../views/includes/header_logged.php';
//var_dump($_SESSION['user_current']);
?>

<!-- TITRE PAGE : CATEGORIE -->
<div class="col-md-offset-1 col-md-10 titre_page">
    <p>
        HOME / CATEGORIES
    </p>
</div>

<!-- CATEGORIE : MAQUILLAGE -->
<div class="row">
    <div class="col-md-offset-1 col-md-10 titre_categorie">
        <h1>MAQUILLAGE</h1>
        <a href="#">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
    </div>
</div>

<!-- ZONE PRODUIT -->
<div class="container zone_produit">

    <?php $produits = $DB->query('SELECT * FROM produits WHERE categorie = "maquillage" AND actif = true '); ?><!-- affichage que si le produit est actif-->
    <?php foreach ($produits as $produit): ?>

        <div class="box_produit">
            <div class="row zone_image">
                <a href="produit.php?id_produit=<?= $produit->id_produit; ?>"><img class="img-responsive"
                                                                                   src="../assets/images/upload/<?= $produit->image; ?>"></a>
            </div>
            <div class="row zone_description">
                <a href="#"><?= $produit->nom_produit; ?></a>
            </div>
            <div class="row zone_prix">
                <a href="#"><?= number_format($produit->prix_produit, 2, ',', ''); ?> €</a>
            </div>
            <div class="row zone_add">
                <?php if (isset($_SESSION['session'])) {
                    if ($_SESSION['session']['admin']) {
                        echo '<a href="modif.php?id_produit=' . $produit->id_produit . '"><button><div class="glyphicon glyphicon-pencil"></div></button></a>';
                        echo '<form method="post">
<input type="hidden" name="suppr" value ="' . $produit->id_produit . '">
<button type = "submit" name="del" onclick="if(!confirm(\'Etes vous sûr de vouloir supprimer ce produit ?\'))return false"><span class="glyphicon glyphicon-remove"> </span></button>

</form>';
                        if (isset($_POST['del'])) {
                            $supp = $_POST['suppr'];
                            $DB->insert("UPDATE produits SET actif = 0 WHERE id_produit = '$supp'"); // rend le produit inactif (tout reste en BDD meme si l'article est supprimé du site
                            echo "<script>document.location = 'categorie_produit.php'</script>";
                            break;
                        }
                    } else
                        echo '
                <a class="addPanier" href="../controllers/addpanier.php?id_produit=' . $produit->id_produit . '">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>';


                } else
                    echo '
                <a class="addPanier" href="../controllers/addpanier.php?id_produit=' . $produit->id_produit . '">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>';

                ?>
            </div>
        </div>

    <?php endforeach ?>

</div>

<!-- CATEGORIE : SOIN POUR LE VISAGE -->
<div class="row">
    <div class="col-md-offset-1 col-md-10 titre_categorie">
        <h1>VISAGE</h1>
        <a href="#">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
    </div>
</div>

<!-- ZONE PRODUIT -->
<div class="container zone_produit">

    <?php $produits = $DB->query('SELECT * FROM produits WHERE categorie = "visage" AND actif = true'); ?>
    <?php foreach ($produits as $produit): ?>

        <div class="box_produit">
            <div class="row zone_image">
                <a href="produit.php?id_produit=<?= $produit->id_produit; ?>"><img class="img-responsive"
                                                                                   src="../assets/images/upload/<?= $produit->image; ?>"></a>
            </div>
            <div class="row zone_description">
                <a href="#"><?= $produit->nom_produit; ?></a>
            </div>
            <div class="row zone_prix">
                <a href="#"><?= number_format($produit->prix_produit, 2, ',', ''); ?> €</a>
            </div>
            <div class="row zone_add">
                <?php if (isset($_SESSION['session'])) {
                    if ($_SESSION['session']['admin']) {
                        echo '<a href="modif.php?id_produit=' . $produit->id_produit . '"><button><div class="glyphicon glyphicon-pencil"></div></button></a>';
                        echo '<form method="post">
<input type="hidden" name="suppr" value ="' . $produit->id_produit . '">
<button type = "submit" name="del"><div class="glyphicon glyphicon-remove"> </div></button>

</form>';
                        if (isset($_POST['del'])) {
                            $supp = $_POST['suppr'];
                            $DB->insert("UPDATE produits SET actif = 0 WHERE id_produit = '$supp'");
                            echo "<script>document.location = 'categorie_produit.php'</script>";
                            break;
                        }
                    } else
                        echo '
                <a class="addPanier" href="../controllers/addpanier.php?id_produit=' . $produit->id_produit . '">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>';


                } else
                    echo '
                <a class="addPanier" href="../controllers/addpanier.php?id_produit=' . $produit->id_produit . '">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>';
                ?>
            </div>
        </div>

    <?php endforeach ?>

</div>

<!-- CATEGORIE : SOIN POUR LE CORPS -->
<div class="row">
    <div class="col-md-offset-1 col-md-10 titre_categorie">
        <h1>CORPS</h1>
        <a href="#">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
    </div>
</div>

<!-- ZONE PRODUIT -->
<div class="container zone_produit">

    <?php $produits = $DB->query('SELECT * FROM produits WHERE categorie = "corps" AND actif = true'); ?>
    <?php foreach ($produits as $produit): ?>

        <div class="box_produit">
            <div class="row zone_image">
                <a href="produit.php?id_produit=<?= $produit->id_produit; ?>"><img class="img-responsive"
                                                                                   src="../assets/images/upload/<?= $produit->image; ?>"></a>
            </div>
            <div class="row zone_description">
                <a href="#"><?= $produit->nom_produit; ?></a>
            </div>
            <div class="row zone_prix">
                <a href="#"><?= number_format($produit->prix_produit, 2, ',', ''); ?> €</a>
            </div>
            <div class="row zone_add">
                <?php if (isset($_SESSION['session'])) {
                    if ($_SESSION['session']['admin']) {
                        echo '<a href="modif.php?id_produit=' . $produit->id_produit . '"><button><div class="glyphicon glyphicon-pencil"></div></button></a>';
                        echo '<form method="post">
<input type="hidden" name="suppr" value ="' . $produit->id_produit . '">
<button type = "submit" name="del"><div class="glyphicon glyphicon-remove"> </div></button>

</form>';
                        if (isset($_POST['del'])) {
                            $supp = $_POST['suppr'];
                            $DB->insert("UPDATE produits SET actif = 0 WHERE id_produit = '$supp'");
                            echo "<script>document.location = 'categorie_produit.php'</script>";
                            break;
                        }
                    } else
                        echo '
                <a class="addPanier" href="../controllers/addpanier.php?id_produit=' . $produit->id_produit . '">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>';


                } else
                    echo '
                <a class="addPanier" href="../controllers/addpanier.php?id_produit=' . $produit->id_produit . '">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>';
                ?>
            </div>
        </div>

    <?php endforeach ?>

</div>

<?php require '../views/includes/footer.php'; ?>
