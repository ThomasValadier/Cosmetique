<?php
require 'includes/header_logged.php';
require '../controllers/depose.php';
?>

<div id=depot>
    <h2>Déposer un nouveau produit</h2>
    <div id="form_depot">
        <form method="post" enctype="multipart/form-data">
            <select name="categorie">
               <span id="choix"><option value="0" selected disabled>Choisissez la categorie</option></span>
                <option value="maquillage">Maquillage</option>
                <option value="visage">Visage</option>
                <option value="corps">corps</option>
            </select></br>
            <input type="text" name="nom" placeholder="Nom produit"></br>
            <input type="number" name="prix" placeholder="prix" step="0.1" min="1"></br>
            <input type="text" name="partenaire" placeholder="partenaire"></br>
            <input type="text" name="partenaire_web" placeholder="partenaire web"></br>
            <span class="indic">Selectionnez image</span>
        <span id="impfile">
            <input name="upload" type="file">
        </span>
            <textarea name="desc" rows="10" placeholder="description"></textarea></br>
            <span class="indic">Entrez le code produit</span></br><input type="number" id="valeur" name="code" value="1"
                                                                         step="1"
                                                                         min="1" max="8"></br>
            <!--  <input type="radio" name="poste" value="1" checked> Publier
              <input type="radio" name="poste" value="0"> Publier plus tard</br>-->
            <button type="submit" name="valider">Valider</button>

        </form>
    </div>
</div>
<?php require '../views/includes/footer.php'; ?>


