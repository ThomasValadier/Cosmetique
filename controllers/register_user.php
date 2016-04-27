<?php

    require '../models/_header.php';
    require '../models/user.class.php';

    //- ON TEST SI LE FORMULAIRE A ETE ENVOYE
    if(isset($_POST['valider-register1']))
    {
        if(!empty($_POST['pseudo']) AND !empty($_POST['password'])  AND !empty($_POST['repeatPassword']) AND !empty($_POST['email']))
        {
            $new_user = new User($_POST['pseudo'], $_POST['password'], $_POST['repeatPassword'], $_POST['email'], $_POST['nom'], $_POST['prenom'], $_POST['sexe'], $_POST['adresse'], $_POST['ville'], $_POST['codePostal'], $_POST['telephone']);
            $verification = $new_user->verif_user();

            if($verification == true)
            {//- VERIFICATION PSEUDO & PASSWORD - OK
                $insertion = $new_user->insert_user();

                if($insertion == 1)
                { //- ON LUI CREER UNE SESSION
                    $pseudo = $_POST['pseudo'];
                    $user = $DB->requete("SELECT id_user FROM users WHERE identifiant_user = '$pseudo'");
                    $_SESSION['session'] = array(
                        'login' => $_POST['pseudo'],
                        'id_session' => 1,
                        'id_user' => $user->id_user
                    );
                    echo '<script language="JavaScript" type="text/javascript">window.location.replace("../views/register2.php");</script>';
                    echo 'UTILISATEUR INSCRIT ET SESSION CREER';
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
    // else
    // { //- LE FORMULAIRE N'A PAS ETE ENVOYE
    //     echo "ERREUR";
    //     echo '<script language="JavaScript" type="text/javascript">window.location.replace("../views/register.php");</script>';
    // }



    if (isset($_POST['valider-register2']))
    {
        $id_user = $_SESSION['session']['id_user'];

        //- INPUT - FORM INFORMATIONS PROFIL
        $question1 = htmlspecialchars(trim(addslashes($_POST['question1'])));
        $question2 = htmlspecialchars(trim(addslashes($_POST['question2'])));
        $question3 = htmlspecialchars(trim(addslashes($_POST['question3'])));
        $question4 = htmlspecialchars(trim(addslashes($_POST['question4'])));
        $question5 = htmlspecialchars(trim(addslashes($_POST['question5'])));
        $question6 = htmlspecialchars(trim(addslashes($_POST['question6'])));
        $question7 = htmlspecialchars(trim(addslashes($_POST['question7'])));
        $question8 = htmlspecialchars(trim(addslashes($_POST['question8'])));
        $question9 = htmlspecialchars(trim(addslashes($_POST['question9'])));
        $question10 = htmlspecialchars(trim(addslashes($_POST['question10'])));

        //- INSERTION EN BASE DE DONNEES
        $DB->insert("INSERT INTO profil_users (id_profil, question_1, question_2, question_3, question_4, question_5, question_6, question_7, question_8, question_9, question_10, id_user) VALUES('', '$question1', '$question2', '$question3', '$question4', '$question5', '$question6', '$question7', '$question8', '$question9', '$question10', '$id_user')");
        // redirection
        echo "<script>document.location = '../views/test-page1.php'</script>";
    }
    else
    {
        echo "<script>document.location = '../views/register2.php'</script>";
    }
