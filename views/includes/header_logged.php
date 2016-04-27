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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- FONT -->
    <link rel="stylesheet" href="../assets/fonts/Coves_Typeface/stylesheet.css">

    <!-- CSS  -->
    <link rel="stylesheet" href="../assets/stylesheets/stylesheets.css">


</head>

<body>
<header>
    <div class="row navbar">
        <div class="col-md-offset-1 col-md-10 zone_navbar">

            <div class="col-md-1 brand">
                <a href="../views/index.php">CosmeticBio</a>
            </div>

            <div class="col-md-7 items_1">
                <?php
                if (empty($_SESSION['session']['admin']))
                {
                    echo '<ul>
                    <li><a href="../views/test-page8.php"><span>..</span>Page Personalisée<span>...</span></a></li>
                    <li><a href="../views/categorie_produit.php"><span>..</span>Categories<span>..</span></a></li>
                    <li><a href="../views/contact.php"><span>..</span>Contact<span>..</span></a></li>
                    </ul>';
                }
                else
                {
                    echo '<ul>
                    <li><a href="../views/depose.php"><span>..</span>Déposer produit<span>..</span></a></li>
                    <li><a href="../views/categorie_produit.php"><span>..</span>Categories<span>..</span></a></li>
                    <li><a href="../views/utilisateur.php?affich=vide"><span>..</span>Utilisateurs<span>..</span></a></li>
                    </ul> ';
                }

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
                            <a href="../views/panier.php"><span class="glyphicon glyphicon-shopping-cart"aria-hidden="true"></span> Panier (<span id="count"><?= $panier_produit->count(); ?></span>)</a>
                        </li>
                        <li>
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profil
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <li><a href="../views/profil-user.php?id_user=<?= $_SESSION['session']['id_user']; ?>">Espace membre</a></li>
                                    <li><a href="../controllers/deconnexion.php">Deconnexion</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>
</header>

<?php require '../views/includes/modal.php'; ?>
