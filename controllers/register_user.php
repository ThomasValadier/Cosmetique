<?php
    require '../models/_header.php';
    require '../models/user.classe.php';

    //- ON TEST SI LE FORMULAIRE A ETE ENVOYE
    if(isset($_POST['valider']))
    {
        if(!empty($_POST['pseudo']) AND !empty($_POST['password'])  AND !empty($_POST['repeat_password']) AND !empty($_POST['email']))
        {
            $new_user = new User($_POST['pseudo'], $_POST['password'], $_POST['repeat_password'], $_POST['email']);
            $verification = $new_user->verif_user();

            if($verification == true)
            {//- VERIFICATION PSEUDO & PASSWORD - OK
                $insertion = $new_user->insert_user();

                if($insertion == 1)
                { //- ON LUI CREER UNE SESSION
                    // $_SESSION['id_session'] = 1;
                    // $_SESSION['user_current'] = $_POST['pseudo'];
                    $_SESSION['session'] = array(
                        'login' => $_POST['pseudo'],
                        'id_session' => 1
                    );
                    echo 'UTILISATEUR INSCRIT ET SESSION CREER';
                    echo '<script language="JavaScript" type="text/javascript">window.location.replace("../views/categorie_produit.php");</script>';
                }
                else
                { //- ERREUR LORS DE L'INSCRIPTION DE L'UTILISATEUR
                    echo "Vous n'avez pas pu etre inscrit";
                }
            }
            else
            {
                //- LA VERIFICATION RETOURNE UNE ERREUR
            }
        }
    }
    else
    { //- LE FORMULAIRE N'A PAS ETE ENVOYE
        echo "ERREUR";
        echo '<script language="JavaScript" type="text/javascript">window.location.replace("../views/register.php");</script>';
    }
