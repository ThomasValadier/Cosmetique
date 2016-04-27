<?php

require '../views/includes/header_logged.php';

$resultatGET = $_GET['resultatTest'];

?>

<!-- CATEGORIE : MAQUILLAGE -->
<div class="col-md-offset-1 col-md-10 content-title-resultatTest">
    <?php
    if ($resultatGET == 1):
        echo "<h1>Peaux grasses</h1>";
    elseif ($resultatGET == 2):
        echo "<h1>Peaux mixtes à grasses</h1>";
    elseif ($resultatGET == 3):
        echo "<h1>Peaux sèches & déshydratées</h1>";
    elseif ($resultatGET == 4):
        echo "<h1>Peaux sensibles</h1>";
    endif;
    ?>

</div>

<!-- ZONE PRODUIT -->
<div class="col-md-offset-1 col-md-10 zone_produit">

    <?php $produits = $DB->query("SELECT * FROM produits WHERE resultatTest = '$resultatGET' AND produit_actif = 1"); ?><!-- affichage que si le produit est actif-->
    <?php foreach ($produits as $produit): ?>

        <div class="box_produit">
            <div class="row zone_image">
                <a href="../views/produit.php?id_produit=<?= $produit->id_produit; ?>"><img class="img-responsive" src="../assets/images/upload/<?= $produit->image; ?>">
                </a>
            </div>
            <div class="row zone_description">
                <p><?= $produit->nom_produit; ?></p>
            </div>
            <div class="row zone_prix">
                <p><?= number_format($produit->prix_produit, 2, ',', ''); ?> €</p>
            </div>
            <div class="row zone-add">
                <?php

                if (isset($_SESSION['session']))
                {
                    if (isset($_SESSION['session']['admin']))
                    {
                        echo '<a href="modif.php?id_produit='.$produit->id_produit.'"><button><div class="glyphicon glyphicon-pencil"></div></button></a>';
                        echo '<form method="post">
                                <input type="hidden" name="suppr" value ="'.$produit->id_produit.'">
                                <button type = "submit" name="del" onclick="if(!confirm(\'Etes vous sûr de vouloir supprimer ce produit ?\'))return false"><span class="glyphicon glyphicon-remove"> </span></button>
                                </form>';
                        if (isset($_POST['del']))
                        {
                            $supp = $_POST['suppr'];
                            $DB->insert("DELETE from produits WHERE id_produit = '$supp'"); // rend le produit inactif (tout reste en BDD meme si l'article est supprimé du site
                            echo "<script>document.location = 'categorie_produit.php'</script>";
                            break;
                        }
                    }
                    else
                    {
                        echo '  <a class="addPanier" href="../controllers/addpanier.php?id_produit='.$produit->id_produit.'">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                </a>';
                    }
                }
                else
                {
                    echo '  <a class="addPanier" href="../controllers/addpanier.php?id_produit='.$produit->id_produit.'">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                            </a>';
                }

                ?>
            </div>
        </div>

    <?php endforeach ?>

</div>




<?php require_once '../views/includes/footer.php'; ?>