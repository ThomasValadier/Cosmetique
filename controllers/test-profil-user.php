<?php

require_once '../models/_header.php';

$id_user_current = $_SESSION['session']['login'];


//- PAGE 1 - QUESTION 1
if(isset($_POST['reponse1-question1']))
{
    echo '<script language="JavaScript" type="text/javascript">window.location.replace("../views/test-page2.php");</script>';
}
if(isset($_POST['reponse2-question1']))
{
    echo '<script language="JavaScript" type="text/javascript">window.location.replace("../views/test-page3.php");</script>';
}


// //- PAGE 2, PAGE 4, PAGE 6, PAGE 7 - QUESTION 2
if(isset($_POST['reponse1-questionFinal1']))
{   //- ON VA ENREGISTER SON CHOIX EN BASE DE DONNEES
    $DB->insert("UPDATE users SET resultatTest_user = 1 WHERE identifiant_user = '$id_user_current'");
    //- ON STOCK LE RESULTAT DU TEST EN VARIABLE DE SESSION POUR
    $_SESSION['session']['resultatTest'] = 1;
    //- ON REDIRIGE VERS LA PAGE 8 - RESULTAT DU TEST / PROPOSITION DE PRODUITS
    //echo "YES RES 1";
    echo '<script language="JavaScript" type="text/javascript">window.location.replace("../views/test-page8.php");</script>';
}
if(isset($_POST['reponse2-questionFinal1']))
{   //- ON VA ENREGISTER SON CHOIX EN BASE DE DONNEES
    $DB->insert("UPDATE users SET resultatTest_user = 2 WHERE identifiant_user = '$id_user_current'");
    //- ON STOCK LE RESULTAT DU TEST
    $_SESSION['session']['resultatTest'] = 2;
    //- ON REDIRIGE VERS LA PAGE 8 - RESULTAT DU TEST / PROPOSITION DE PRODUITS
    echo '<script language="JavaScript" type="text/javascript">window.location.replace("../views/test-page8.php");</script>';
    //echo "YES RES 2";
}

// //- PAGE 2, PAGE 4, PAGE 6, PAGE 7 - QUESTION 2
if(isset($_POST['reponse1-questionFinal2']))
{   //- ON VA ENREGISTER SON CHOIX EN BASE DE DONNEES
    $DB->insert("UPDATE users SET resultatTest_user = 1 WHERE identifiant_user = '$id_user_current'");
    //- ON STOCK LE RESULTAT DU TEST EN VARIABLE DE SESSION POUR
    $_SESSION['session']['resultatTest'] = 3;
    //- ON REDIRIGE VERS LA PAGE 8 - RESULTAT DU TEST / PROPOSITION DE PRODUITS
    //echo "YES RES 1";
    echo '<script language="JavaScript" type="text/javascript">window.location.replace("../views/test-page8.php");</script>';
}
if(isset($_POST['reponse2-questionFinal2']))
{   //- ON VA ENREGISTER SON CHOIX EN BASE DE DONNEES
    $DB->insert("UPDATE users SET resultatTest_user = 2 WHERE identifiant_user = '$id_user_current'");
    //- ON STOCK LE RESULTAT DU TEST
    $_SESSION['session']['resultatTest'] = 4;
    //- ON REDIRIGE VERS LA PAGE 8 - RESULTAT DU TEST / PROPOSITION DE PRODUITS
    echo '<script language="JavaScript" type="text/javascript">window.location.replace("../views/test-page8.php");</script>';
    //echo "YES RES 2";
}

//- PAGE 3 - QUESTION 3
if(isset($_POST['reponse1-question3']))
{
    echo '<script language="JavaScript" type="text/javascript">window.location.replace("../views/test-page4.php");</script>';
}
if(isset($_POST['reponse2-question3']))
{
    echo '<script language="JavaScript" type="text/javascript">window.location.replace("../views/test-page5.php");</script>';
}

//- PAGE 5 - QUESTION 5
if(isset($_POST['reponse1-question5']))
{
    echo '<script language="JavaScript" type="text/javascript">window.location.replace("../views/test-page6.php");</script>';
}
if(isset($_POST['reponse2-question5']))
{
    echo '<script language="JavaScript" type="text/javascript">window.location.replace("../views/test-page7.php");</script>';
}
