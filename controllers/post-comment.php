<?php

require_once '../models/_header.php';

//- INSTANCE DE LA JOURNEE ACTUELLE -//
$date = date("F, j, Y");

//- ENVOIS DU FORMULAIRE COMMENTAIRE -//
if (isset($_POST['envoyer']))
{
    if (!empty ($_POST['commentaire']) && !empty($_POST['produit']))
    {
        //- ON ATTRIBUT LES POST ET SESSION DU FORMULAIRE A DES VARIABLES -//
        $id_user = $_SESSION['session']['id_user'];
        $commentaire = addslashes($_POST['commentaire']);
        $produit = $_POST['produit'];
        //- ON INSERE LES VARIABLES EN BASE DE DONNEES -//
        $DB->insert("INSERT INTO commentaires (id_commentaire, contenu_commentaire, date_commentaire, id_user, id_produit) VALUES('', '$commentaire', '$date', '$id_user', '$produit')");

        echo "<script> alert('Merci pour votre commentaire');</script>";
    }
    else
    {
        echo "<script> alert('Veuillez remplir tous les champs!');</script>";
    }
}

//- SUPPRESSION DE COMMENTAIRE -//
if (isset($_POST['effacer']))
{
    //- ON ATTRIBUE LE GET A UNE VARIABLE -//
    $id_comment = $_POST['id_comment'];
    //- ON FAIT UNE REQUETE POUR RETROUVER LE PRODUIT ATTRIBUE AU COMMENTAIRE -//
    $page_produit = $DB->requete("SELECT id_produit FROM commentaires WHERE id_commentaire = '$id_comment'");
    //- VERIFICATION COTE CLIENT - BOITE DE DIALOGUE -//
    // $id_comment = $page
    //- ON SUPPRIME LE COMMENTAIRE -//
    $DB->delete("DELETE FROM commentaires WHERE id_commentaire = '$id_comment'");
    //- ON REDIRIGE VERS LA PAGE DU PRODUIT -//
    echo '<script language="JavaScript" type="text/javascript">window.location.replace("../views/produit.php?id_produit='.$page_produit->id_produit.'");</script>';
}
