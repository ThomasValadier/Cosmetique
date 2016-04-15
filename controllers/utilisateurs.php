<?php


if (isset($_SESSION['session'])) {
    if ($_SESSION['session']['admin'] == false) {
        echo "<script>document.location= 'categorie_produit.php'</script>";
    }
} else
    echo "<script>document.location= 'categorie_produit.php'</script>";


if (isset($_GET['go'])) {

    if ($_GET['affich'] == 'F') {
        $req = $DB->query("SELECT * FROM users WHERE sexe_user = true");

    } elseif ($_GET['affich'] == 'H') {
        $req = $DB->query("SELECT * FROM users WHERE sexe_user = false");

    } elseif ($_GET['affich'] == 'admin') {
        $req = $DB->query("SELECT * FROM users WHERE is_admin = true");

    } else
        $req = $DB->query("SELECT * FROM users");
} else
    $req = $DB->query("SELECT * FROM users");

if (isset($_POST['add'])) {
    $id_us = $_POST['idus'];
    $DB->insert("UPDATE users SET is_admin = 1 WHERE id_user = '$id_us'");
    echo '<script>document.location = "utilisateur.php?affich=vide"</script>';
    //  break;
}
if (isset($_POST['del'])) {
    $id_us = $_POST['idus'];
    $DB->insert("UPDATE users SET is_admin = 0 WHERE id_user = '$id_us'");
    echo '<script>document.location = "utilisateur.php?affich=vide"</script>';
    //   break;
}