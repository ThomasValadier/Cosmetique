<?php

require '../views/includes/header_logged.php';

require_once '../controllers/post-comment.php';

//- INSTANCIE LE PRODUIT PRE-SELECTIONNE -//
$id = $_GET['id_produit'];

// if ($_SERVER['PHP_SELF'] == "/Projet-[START-UP-DAY]/views/produit.php")
// {
//     $_SERVER['PHP_SELF'] = "/Projet-[START-UP-DAY]/views/produit.php?id_produit=".$id;
// }

$produit = $DB->requete("SELECT * FROM produits where id_produit= '$id'");


?>

<!-- BEGIN CONTENT PRODUIT - DETAILS PRODUIT -->
<div class="col-md-offset-1 col-md-10 content-produit">
    <div class="col-md-7 img-produit">
        <img src="../assets/images/upload/<?= $produit->image; ?>" alt="#" />
    </div>
    <div class="col-md-5 content-produit-details">
        <div class="row nom-produit">
            <h1>
                <?= $produit->nom_produit; ?>
            </h1>
        </div>
        <div class="row prix-produit">
            <p>
                <?= number_format($produit->prix_produit,2,',',''); ?> €
            </p>
        </div>
        <div class="row description-produit">
            <p>
                <?= $produit->description_produit; ?>
            </p>
        </div>
        <div class="row ajouter-produit">
            <a class="addPanier" href="../controllers/addpanier.php?id_produit=<?= $produit->id_produit; ?>">
              Ajouter au panier
            </a>
        </div>
    </div>
</div>
<!-- END CONTENT PRODUIT -->


<!-- CONTENT TITLE COMMENTAIRE - BUTTON SLIDE -->
<div class="col-md-offset-1 col-md-10 title-content-commentaire">
    <h3>Commentaires</h3>
    <?php if (!isset($_SESSION['session'])): ?>
    <p>
        Se connecter pour poster un commentaire
    </p>
    <?php endif; ?>
    <!--<div class="row">

    </div>
    <p>
        Voir tous les commentaires
    </p>
    <a id="slide-commentaire"><i class="fa fa-angle-down" aria-hidden="true"></i></a>-->
</div>

<!-- CONTENT FORM COMMENTAIRE - CONTENT COMMENTAIRE - CONTENT LIST COMMENTAIRE -->
<?php $commentaires = $DB->query("SELECT * FROM commentaires C LEFT JOIN produits P ON C.id_produit = P.id_produit LEFT JOIN users U ON C.id_user = U.id_user WHERE C.id_produit = '$id' ORDER BY id_commentaire DESC"); ?>

<?php if (isset($_SESSION['session'])): ?>
    <!-- CONTENT FORM COMMENTAIRE -->
    <div class="col-md-offset-1 col-md-10 content-form-commentaire">
        <form method="post">
            <input type="hidden" name="produit" value="<?= $id; ?>">
            <textarea name="commentaire" placeholder="Saisissez votre message"></textarea>
            <button name="envoyer" type="submit">Envoyer</button>
        </form>
    </div>
<?php endif; ?>

<!-- CONTENT COMMENTAIRE -->
<div class="col-md-offset-1 col-md-10 content-commentaire">

    <!-- CONTENT LIST COMMENTAIRE -->
    <?php foreach ($commentaires as $commentaire): ?>
    <div class="content-list-commentaire">
        <?php if($commentaire->id_user == $_SESSION['session']['id_user']): ?>
        <form method="post">
            <input type="hidden" name="id_comment" value="<?= $commentaire->id_commentaire; ?>">
            <button type="submit" name="effacer">x</i></button>
        </form>
        <?php endif; ?>
        <p>
            "<?= $commentaire->contenu_commentaire; ?>"
        </p>
        <h4><?= $commentaire->identifiant_user ?> - <?= date("d/m/Y", strtotime($commentaire->date_commentaire)); ?></h4>
    </div>
    <?php endforeach ?>

</div>

<?php require_once '../views/includes/footer.php'; ?>
