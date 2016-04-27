<?php

require_once '../models/_header.php';

if (isset($_POST['modifier_profil']))
{
    $nom = htmlspecialchars(trim(addslashes($_POST['nom'])));
    $prenom = htmlspecialchars(trim(addslashes($_POST['prenom'])));
    $password = htmlspecialchars(trim(addslashes($_POST['password'])));
    $repeatPassword = htmlspecialchars(trim(addslashes($_POST['repeatPassword'])));
    $email = htmlspecialchars(trim(addslashes($_POST['email'])));
    $adresse = htmlspecialchars(trim(addslashes($_POST['adresse'])));
    $ville = htmlspecialchars(trim(addslashes($_POST['ville'])));
    $codePostal = htmlspecialchars(trim(addslashes($_POST['codePostal'])));
    $telephone = htmlspecialchars(trim(addslashes($_POST['telephone'])));
    $id_user = $_SESSION['session']['id_user'];

    if ($password != $repeatPassword)
    {
        echo "ERREUR - LES PASSWORDS NE SONT PAS IDENTIQUE";
    }
    else
    {   //- INSERTION EN BDD
        $DB->insert("UPDATE users SET nom_user = '$nom', prenom_user = '$prenom', password_user = '$password', email_user = '$email' , adresse_user = '$adresse' , ville_user = '$ville', codePostal_user = '$codePostal', telephone_user = '$telephone' WHERE id_user = '$id_user' ");
        //- REDIRECTION
        echo '<script language="JavaScript" type="text/javascript">window.location.replace("../views/profil-user.php");</script>';
    }
}
