<?php

require 'includes/header_logged.php';
require '../models/uploadFile.php';

if (isset($_SESSION['session'])) {
    if ($_SESSION['session']['admin'] == false) {
        echo "<script>document.location= 'categorie_produit.php'</script>";
    }
} else
    echo "<script>document.location= 'categorie_produit.php'</script>";

$id = $_GET['id_produit'];


$req = $DB->requete("SELECT * FROM produits WHERE id_produit = '$id'");
$cat = $req->categorie;
$request = $DB->query("SELECT DISTINCT categorie FROM produits WHERE categorie != '$cat' ");

?>
<form method="post" enctype="multipart/form-data">
    <select name="categorie">
        <option value="<?= $cat; ?>"><?= $cat; ?></option>
        <?php foreach ($request as $salu): ?>
            <option value="<?= $salu->categorie; ?>"><?= $salu->categorie; ?></option>
        <?php endforeach; ?>
    </select></br>
    <input type="text" name="nom" placeholder="Nom produit" value="<?= $req->nom_produit; ?>"></br>
    <input type="number" name="prix" step="0.1" value="<?= $req->prix_produit; ?>"></br>
    <input type="text" name="partenaire" placeholder="partenaire" value="<?= $req->partenaire_produit; ?>"</br>
    <input type="text" name="partenaire_web" placeholder="partenaire web"
           value="<?= $req->partenaireweb_produit; ?>">
    <img src="../assets/images/upload/<?= $req->image; ?>">
    <div id="impfile">
        <input name="upload" type="file"></div>
<textarea name="desc" cols="120" rows="10"
          placeholder="description"><?= $req->description_produit; ?></textarea></br>
    <input type="submit" name="valider">

</form>

<?php

$id = $req->id_produit;
if (isset($_POST['valider'])) {


    if ($_FILES['upload']['name'] != "") {
        $upload = new uploadFile();
        $tmp_name = $_FILES['upload']['tmp_name'];
        $name = md5(microtime(true)) . $_FILES['upload']['name'];
        $upload->upload($tmp_name, $name);

        $DB->insert("UPDATE produits SET image = '$name' WHERE id_produit = '$id'");
    }

    if (!empty ($_POST['categorie']) && !empty ($_POST['prix']) && !empty ($_POST['nom']) && !empty ($_POST['desc'])
    ) {
        $categorie = $_POST['categorie'];
        $prix = $_POST['prix'];


        $partenaire = htmlspecialchars(addslashes($_POST['partenaire']));
        $part_web = htmlspecialchars(addslashes($_POST['partenaire_web']));
        $nom = htmlspecialchars(trim(addslashes($_POST['nom'])));
//$name = md5(microtime(true)) . $_FILES['upload']['name'];
        $description = htmlspecialchars(addslashes($_POST['desc']));
        $DB->insert("UPDATE produits SET nom_produit = '$nom', prix_produit = '$prix', description_produit = '$description', categorie = '$categorie' , partenaire_produit = '$partenaire' , partenaireweb_produit = '$part_web' WHERE id_produit = '$id' ");

        echo "<script>document.location = 'categorie_produit.php'</script>";


    } else
        echo "
<script>alert('veuillez remplir tous les champs!')</script>";

}

require '../views/includes/footer.php'; ?>



