<?php
require 'includes/header_logged.php';
require '../controllers/depose.php';
?>

<div class="col-md-offset-1 col-md-10 titre-page-depose">
    <h1>ajout produit</h1>
    <p>Tous les champs sont obligatoires</p>
</div>

<div class="col-md-offset-1 col-md-10 form-ajout-produit">

    <!-- Formulaire d'ajout produit -->
    <form class="form-horizontal" method="post" enctype="multipart/form-data">

        <div class="row item-ajout-produit">
            <input type="text" name="nom" placeholder="NOM" required>
        </div>

        <div class="row item-ajout-produit">
            <input type="number" name="prix" placeholder="PRIX" step="0.1" min="1" required>
        </div>

        <div class="row item-ajout-produit categorie-ajout">
            <select name="categorie" required>
                <option value="0" selected disabled>Choisissez la categorie</option>
                <option value="maquillage">Maquillage</option>
                <option value="soin visage">Visage</option>
                <option value="soin corps">corps</option>
            </select>
        </div>

        <div class="row item-ajout-produit">
            <input type="text" name="partenaire" placeholder="PARTENAIRE" required>
        </div>

        <div class="row item-ajout-produit">
            <input type="text" name="partenaire_web" placeholder="PARTENAIRE WEB" required>
        </div>

        <div class="row item-ajout-produit">
            <input type="text" name="quantite" placeholder="QUANTITE" required>
        </div>

        <div class="row item-ajout-produit image-ajout">
            <span id="impfile">
                <input name="upload" type="file" required>
            </span>
        </div>

        <div class="row item-ajout-produit description-ajout">
            <textarea name="desc" placeholder="DESCRIPTION" required></textarea>
        </div>

        <div class="row item-ajout-produit resultat-ajout">
            <select name="resultatTest" required>
                <option selected disabled>Choisissez la resultat du produit</option>
                <option value="1">Resultat 1</option>
                <option value="2">Resultat 2</option>
                <option value="3">Resultat 3</option>
                <option value="4">Resultat 4</option>
            </select>
        </div>

        <div class="row item-ajout-produit actif-ajout">
            <select name="produitActif" required>
                <option selected disabled>Le produit est actif</option>
                <option value="1">OUI</option>
                <option value="0">NON</option>
            </select>
        </div>

        <!-- Button -->
        <div class="row item-ajout-produit ajout-produit-envoyer">
            <input type="submit" name="valider">
        </div>

    </form>

</div>




<?php require '../views/includes/footer.php'; ?>
