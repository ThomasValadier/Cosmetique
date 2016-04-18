<?php require '../models/uploadFile.php';

//Si l'utilisateur n'est pas admin il est redirigé vers une autre page
if (isset($_SESSION['session'])) {
    if ($_SESSION['session']['admin'] == false) {
        echo "<script>document.location= 'categorie_produit.php'</script>";  // s'il n'est pas admin il est redirigé
    }
} else
    echo "<script>document.location= 'categorie_produit.php'</script>"; //s'il n'est pas connecté il ne peut pas être admin donc redirigé
}

$id = $_GET['id_produit']; //récupération de l'id produit qui a été cliqué dans la page précédente
$req = $DB->requete("SELECT * FROM produits WHERE id_produit = '$id'"); //  on va récuperer toutes les infos du produit
$cat = $req->categorie;
$request = $DB->query("SELECT DISTINCT categorie FROM produits WHERE categorie != '$cat' ");// permet d'afficher dans la liste déroulante les catégories existantes
$id = $req->id_produit;

if (isset($_POST['valider'])) {
    if ($_FILES['upload']['name'] != "") { //un fichier va être uploader ssi le input file n'est pas vide
        $upload = new uploadFile();
        $tmp_name = $_FILES['upload']['tmp_name'];
        $name = md5(microtime(true)) . $_FILES['upload']['name']; //nom de l'image avec un nom uniqué généré + nom initial (si deux fichier on le même nom, l'ancien fichier serait écrasé
        $upload->upload($tmp_name, $name); //utilisation de la fonction upload qui va mettre l'image dans le fichier upload avec un nom unique généré
        $DB->insert("UPDATE produits SET image = '$name' WHERE id_produit = '$id'"); //insertion du nom unique généré dans la BDD pour pouvoir appeller ensuite l'image
    }

    if (!empty ($_POST['categorie']) && !empty ($_POST['prix']) && !empty ($_POST['nom']) && !empty ($_POST['desc'])//les champs partenaire et partenaire web ne sont pas obligatoire, tout comme l'image
    ) {
        $categorie = $_POST['categorie'];
        $prix = $_POST['prix'];
        $partenaire = htmlspecialchars(addslashes($_POST['partenaire'])); //sécurisation
        $part_web = htmlspecialchars(addslashes($_POST['partenaire_web']));
        $nom = htmlspecialchars(trim(addslashes($_POST['nom'])));
//$name = md5(microtime(true)) . $_FILES['upload']['name'];
        $description = htmlspecialchars(addslashes($_POST['desc']));
        $DB->insert("UPDATE produits SET nom_produit = '$nom', prix_produit = '$prix', description_produit = '$description', categorie = '$categorie' , partenaire_produit = '$partenaire' , partenaireweb_produit = '$part_web' WHERE id_produit = '$id' ");//insertion en BDD
        echo "<script>document.location = 'categorie_produit.php'</script>";//puis redirection vers catégorie produit
    } else
        echo "<script>alert('veuillez remplir tous les champs!')</script>";

}
