<?php
require '../models/uploadFile.php';

//Si l'utilisateur n'est pas admin il est redirigé vers une autre page
if (isset($_SESSION['session'])) {
    if ($_SESSION['session']['admin'] == false) {  //contrôle de s'il est admin
        echo "<script>document.location= 'categorie_produit.php'</script>";  // s'il n'est pas admin il est redirigé
    }
} else
    echo "<script>document.location= 'categorie_produit.php'</script>"; //s'il n'est pas connecté il ne peut pas être admin donc redirigé

if (isset($_POST['valider'])) {

    $upload = new uploadFile();
    if (isset($_POST['valider']) && !empty($_POST['valider'])) {
        $tmp_name = $_FILES['upload']['tmp_name'];
        $name = md5(microtime(true)) . $_FILES['upload']['name']; //nom de l'image avec un nom unique généré + nom initial (si deux fichier on le même nom, l'ancien fichier serait écrasé
        $upload->upload($tmp_name, $name);//utilisation de la fonction upload qui va mettre l'image dans le fichier upload avec le nom unique généré
    }

    if (!empty ($_POST['categorie']) && !empty ($_POST['prix']) && !empty ($_POST['nom']) //vérification des champs indispensables (les partenaires ne le sont pas)
    ) {
        $categorie = $_POST['categorie'];
        $prix = $_POST['prix'];
        $code = $_POST['code'];
        $partenaire = htmlspecialchars(addslashes($_POST['partenaire'])); //sécurisation
        $part_web = htmlspecialchars(addslashes($_POST['partenaire_web']));
        $nom = htmlspecialchars(trim(addslashes($_POST['nom'])));
        // $actif = $_POST['poste'];
        //$name = md5(microtime(true)) . $_FILES['upload']['name'];
        $description = htmlspecialchars(addslashes($_POST['desc']));
        $DB->insert("INSERT INTO produits VALUES ('','$nom','$prix', '$description', '$categorie', '$partenaire', '$part_web', '$name', 1, '$code' )"); //insertion dans la BDD
        echo "<script>document.location = 'categorie_produit.php'</script>";
    } else
        echo "<script>alert('veuillez remplir tous les champs!')</script>";
}


