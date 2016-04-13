<?php

require 'includes/header_logged.php';
require '../models/uploadFile.php';

if (isset($_SESSION['session'])) {
    if ($_SESSION['session']['admin'] == false) {
        echo "<script>document.location= 'categorie_produit.php'</script>";
    }
} else
    echo "<script>document.location= 'categorie_produit.php'</script>";

if (isset($_POST['valider'])) {

    $upload = new uploadFile();
    if (isset($_POST['valider']) && !empty($_POST['valider'])) {
        $tmp_name = $_FILES['upload']['tmp_name'];
        $name = md5(microtime(true)) . $_FILES['upload']['name'];
        $upload->upload($tmp_name, $name);
    }

    if (!empty ($_POST['categorie']) && !empty ($_POST['prix']) && !empty ($_POST['nom'])
    ) {
        $categorie = $_POST['categorie'];
        $prix = $_POST['prix'];
        $partenaire = htmlspecialchars(addslashes($_POST['partenaire']));
        $part_web = htmlspecialchars(addslashes($_POST['partenaire_web']));
        $nom = htmlspecialchars(trim(addslashes($_POST['nom'])));
        //$name = md5(microtime(true)) . $_FILES['upload']['name'];
        $description = htmlspecialchars(addslashes($_POST['desc']));
        $DB->insert("INSERT INTO produits VALUES ('','$nom','$prix', '$description', '$categorie', '$partenaire', '$part_web', '$name' )");
       echo "<script>document.location = 'categorie_produit.php'</script>";
    } else
        echo "<script>alert('veuillez remplir tous les champs!')</script>";
}


?>


<form method="post" enctype="multipart/form-data">
    <select name="categorie">
        <option value="0" style=\'background-color:#dcdcc3\' selected disabled>Choisissez la categorie</option>
        <option value="maquillage">Maquillage</option>
        <option value="visage">Visage</option>
        <option value="corps">corps</option>
    </select></br>
    <input type="text" name="nom" placeholder="Nom produit"></br>
    <input type="number" name="prix" placeholder="prix"></br>
    <input type="text" name="partenaire" placeholder="partenaire"></br>
    <input type="text" name="partenaire_web" placeholder="partenaire web">
    <div id="impfile">
        <input name="upload" type="file"></div>
    <textarea name="desc" cols="120" rows="10" placeholder="description"></textarea></br>
    <input type="submit" name="valider">

</form>
<?php require '../views/includes/footer.php'; ?>


