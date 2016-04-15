<?php require 'includes/header_logged.php';
require '../controllers/modif.php';
?>
<div id="modif">
    <h2>Modification produit</h2>
    <div id="form_modif">
        <form method="post" enctype="multipart/form-data">
            <div id="image">
                <img src="../assets/images/upload/<?= $req->image; ?>"></br></br>
                <span class="indic">Image</span></br>
                <div id="impfile">
                    <input name="upload" type="file"></div>
                </div>
                <select name="categorie">
                    <option value="<?= $cat; ?>"><?= $cat; ?></option>
                    <?php foreach ($request as $cat): ?>
                        <option value="<?= $cat->categorie; ?>"><?= $cat->categorie; ?></option>
                    <?php endforeach; ?>
                </select></br>
                <input type="text" name="nom" placeholder="Nom produit" value="<?= $req->nom_produit; ?>"></br>
                <input type="number" name="prix" step="0.1" value="<?= $req->prix_produit; ?>"></br>
                <input type="text" name="partenaire" placeholder="partenaire"
                       value="<?= $req->partenaire_produit; ?>"</br></br>
                <input type="text" name="partenaire_web" placeholder="partenaire web"
                       value="<?= $req->partenaireweb_produit; ?>"></br>

<textarea name="desc" cols="120" rows="10"
          placeholder="description"><?= $req->description_produit; ?></textarea></br>
                <span class="indic">Code produit</span></br><input type="number" id="code" value="<?= $req->resultat ?>"
                                                                   step="1"
                                                                   min="1"
                                                                   max="8"></br>
                <button type="submit" name="valider">Modifier</button>

        </form>
    </div>
</div>

<?php require '../views/includes/footer.php'; ?>



