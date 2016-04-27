<?php
if (isset($_SESSION['session']))
{
    if ($_SESSION['session']['admin'] == false)
    {
        echo "<script>document.location= 'categorie_produit.php'</script>";
    }
}
else
{
    echo "<script>document.location= 'categorie_produit.php'</script>";
}


if (isset($_GET['envoyer']))
{
    if ($_GET['affich'] == 'femme')
    {
        $requete = "SELECT * FROM users WHERE sexe_user = 'femme'";
    }
    elseif ($_GET['affich'] == 'homme')
    {
        $requete = "SELECT * FROM users WHERE sexe_user = 'homme'";
    }
    elseif ($_GET['affich'] == 'admin')
    {
        $requete = "SELECT * FROM users WHERE is_admin = 1";
    }
}
else
{
    $requete = "SELECT * FROM users";
}


// else
// {
//     if (isset($_POST['add']))
//     {
//         $id_us = $_POST['idus'];
//         $DB->insert("UPDATE users SET is_admin = 1 WHERE id_user = '$id_us'");
//         echo '<script>document.location = "utilisateur.php?affich=vide"</script>';
//         //  break;
//     }
//     if (isset($_POST['del']))
//     {
//     $id_us = $_POST['idus'];
//     $DB->insert("UPDATE users SET is_admin = 0 WHERE id_user = '$id_us'");
//     echo '<script>document.location = "utilisateur.php?affich=vide"</script>';
//     //   break;
//     }
// }
