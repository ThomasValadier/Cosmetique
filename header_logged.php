<?php require '../models/_header.php'; ?>


<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8"/>
    <title>CosmeticBio Admin</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta name="description" content="CosmeticBio"/>

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- GOOGLE FONT -->
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

    <!-- CSS  -->
    <link rel="stylesheet" href="../assets/stylesheets/stylesheets.css">


</head>

<body>
<header>
    <div class="row navbar">
        <div class="col-md-offset-1 col-md-10 zone_navbar">

            <div class="col-md-1 brand">
                <a href="#">CosmeticBio</a>
            </div>

            <div class="col-md-7 items_1">
                <?php
                if (isset ($_SESSION['session']) && ($_SESSION['session']['admin'] == true)) {
                    echo ' <ul>
                    <li><a href="#"><span>..</span>Messagerie<span>..</span></a></li>
                    <li><a href="depose.php"><span>..</span>Déposer produit<span>..</span></a></li>
                    <li><a href="../views/categorie_produit.php"><span>..</span>Categories<span>..</span></a></li>
                    <!--<li><a href="#"><span>..</span>Contact<span>..</span></a></li>-->
                </ul> ';

                } else
                    echo '<ul>
                    <li><a href="#"><span>..</span>About<span>..</span></a></li>
                    <li><a href="#"><span>..</span>Homme<span>..</span></a></li>
                    <li><a href="#"><span>..</span>Femme<span>..</span></a></li>
                    <li><a href="../views/categorie_produit.php"><span>..</span>Categories<span>..</span></a></li>
                    <li><a href="#"><span>..</span>Contact<span>..</span></a></li>
                </ul>';

                ?>
            </div>
            <?php
            // $user_identity = $_SESSION['user_current'];
            // //- REQUETE POUR ALLER CHERCHER L'UTILISATEUR CONNECTE -->
            // $user_connect = $DB->requete("SELECT id_user FROM users WHERE identifiant_user = '$user_identity'")
            ?>
            <!-- AFFICHAGE NAVBAR DIFFERENT SELON SI L'UTILISATEUR EST CONNECTE OU PAS -->
            <?php if (!isset($_SESSION['session'])): ?>
                <div class="col-md-4 items_2">
                    <ul>
                        <li>
                            <a href="" data-toggle="modal" data-target="#myModal"><span
                                    class="glyphicon glyphicon-user"
                                    aria-hidden="true"></span> Log
                                In</a>
                        </li>
                        <li>
                            <a href="../views/panier.php"><span class="glyphicon glyphicon-shopping-cart"
                                                                aria-hidden="true"></span> Panier (<span
                                    id="count"><?= $panier_produit->count(); ?></span>)</a>
                        </li>
                    </ul>
                </div>
            <?php else: ?>
                <div class="col-md-4 items_2">
                    <ul>
                        <li>
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profil
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <!--<li><a href="#">Espace membre</a></li>-->
                                    <li><a href="../controllers/deconnexion.php">Deconnexion</a></li>
                                </ul>
                            </div>
                        </li>
                        <?php if ($_SESSION['session']['admin'] == false) {
                            echo '<li>
                            <a href="../views/panier.php"><span class="glyphicon glyphicon-shopping-cart"
                                                                aria-hidden="true"></span> Panier (<span
                                    id="count">' . $panier_produit->count() . '</span>)</a>
                        </li>';
                        } ?>

                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>
</header>

<?php require '../views/includes/modal.php'; ?>
