<?php

require_once '../models/_header.php';
require_once '../models/user.classe.php';

//- CONTROL LA CONNEXION D'UN UTILISATEUR

//- ON TEST SI LE FORMULAIRE A BIEN ETE CREE
if (isset($_POST['connexion']))
{
    if (!empty($_POST['pseudo']) && !empty($_POST['password']))
    {
        $user_identifiant = $_POST['pseudo'];
        $user_password = $_POST['password'];

        //- ON LANCE UNE REQUETE
        $user_connexion = $DB->requete("SELECT id_user, identifiant_user, password_user, is_admin FROM users WHERE identifiant_user = '$user_identifiant'");
        //- ON TEST SI L'UTILISATEUR EXISTE EN BASE DE DONNEES
        if ($user_connexion->identifiant_user == $_POST['pseudo'])
        {
            //- ON TEST SI LE MOT DE PASSE CORRESPOND
            if ($user_password == $user_connexion->password_user)
            {
                //- TOUT COLLE IDENTIFIANT + PASSWORD - ON CREER LA SESSION
                $_SESSION['session'] = array(
                    'login' => $user_connexion->identifiant_user,
                    'id_session' => 1,
                    'admin' => $user_connexion->is_admin, //nouveau
                    'id_user' => $user_connexion->id_user //nouveau
                );
                echo '<script language="JavaScript" type="text/javascript">window.location.replace("../views/categorie_produit.php");</script>';
            }
            else
            {
                echo "LE PASSWORD EST MAUVAIS";
            }
        }
        else
        {
            echo "L'IDENTIFIANT N'EXISTE PAS";
        }
    }

}
else
{
    echo 'ERREUR SUR LENVOI DU FORM';
}
