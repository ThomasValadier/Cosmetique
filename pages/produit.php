<?php require '../includes/header.php'; ?>
<div id="corps">
    <span class="row">
        <div class="col-md-12">
            <h1>
                <?php $DB = new PDO ('mysql:host=localhost;dbname=startup', 'root', '');
                $req = $DB->query("SELECT nom_produit FROM produits where id_produit=1 ");
                while ($d = $req->fetch()) {
                    echo $d['nom_produit'];
                }
                ?>
            </h1>
        </div>


        <img class="image" src="../assets/images/img.jpg">


        <p id="prix">
            <?php
            $req = $DB->query("SELECT prix_produit FROM produits where id_produit=1 ");
            while ($d = $req->fetch()) {
                echo $d['prix_produit'] . " euros";
            }
            ?>
            </p>


        <div id="pannier"><a href=""
                             TARGET="_blank"><i class="fa fa-2x fa-shopping-cart"></i>
                <p>Ajouter au pannier</p></a></div>


        <p id="description">
            <?php
            $req = $DB->query("SELECT description_produit FROM produits where id_produit=1 ");
            while ($d = $req->fetch()) {
                echo $d['description_produit'];
            }
            ?>
        </p>


        <div id="prod">
            <h3>Produits similaires</h3>
        </div>
        <div id="galerie">
            <div class="slider">
                <?php for ($i = 0; $i < 15; $i++) {
                    ?>

                    <a href="#">
                        <img src="../assets/images/img.jpg">
                    </a>
                    <?php
                }
                ?>


            </div>
            <div class="suiv"></div>
            <div class="prec"></div>
        </div>


        <div class="comment" class="col-md-offset-1 col-md-10">
            <h3>Commentaire</h3>
            <form id="formul" method="post" action="prod.php">
                <p><input class="form" type="text" name="nom" placeholder="Login"></p>

                <p><input class="form" type="password" name="password" placeholder="Password"></p>
                <p><TEXTAREA class="form" name="message" rows=10 COLS=30
                             placeholder="Votre commentaire"></TEXTAREA></p>
                <button id="bouton" name="submit" type="submit">VALIDER!!</button>
            </form>
            <br>
        </div>
        <div class=" commentaire col-md-offset-1 col-md-10 col-xs-offset-1 col-xs-9">
            <?php
            if (isset($_POST['submit'])) {
                if (!empty ($_POST['nom']) && !empty ($_POST['message']) && !empty ($_POST['password'])) {
                    echo '<div><div class="pseudo">' . $_POST['nom'] . "<br></div>";
                    echo '<br><br><div class="col-md-offset 10" >' . $_POST['message'] . "</div>";
                }
            }


            $req = $DB->query("
SELECT * FROM commentaire C
INNER JOIN produits P ON C.id_produit = P.id_produit
ORDER BY Datecom desc LIMIT 0,5");


            while ($d = $req->fetch()) {


                echo '<div><div class="pseudo">' . $d['pseudo'] . "<br></div><div class='date'>" . "Posté le " . $d['Datecom'] . '</div>';
                echo '<br><br><div class="col-md-offset 10" >' . $d['comment'] . "</div>";
                echo '<form action="" method="post">
<button name="effacer" type="submit" onclick="if(!confirm(\'Etes vous sûr de vouloir supprimer votre commentaire ?\')) return false;">Effacer</button></form>';
                if (isset($_POST['effacer'])) {
                    $id = $d['id'];
                    $DB->query("DELETE  FROM commentaire WHERE id = '$id' ");
                    break;

                }
                echo "</div><br><br>";


            }


            if (isset($_POST['submit'])) {
                if (!empty ($_POST['nom']) && !empty ($_POST['message']) && !empty ($_POST['password'])) {
                    $password = htmlspecialchars($_POST['password']);
                    $message = addslashes($_POST['message']);
                    $nom = htmlspecialchars($_POST['nom']);
                    $req = $DB->query("SELECT * FROM users WHERE  identifiant_user = '$nom' AND  password_user = '$password'");
                    $result = $req->fetchAll();
                    if (count($result) == 1) {
                        $DB->query("INSERT INTO commentaire VALUES ('','$nom', '$message', now(),1, 1 )");
                        echo "<script> alert('Merci " . "$nom " . "pour ton commentaire!!');</script>";
                    } else {
                        echo "<script>alert('vous n\'êtes pas identifié!')</script >";
                    }

                } else
                    echo "<script> alert('Veuillez remplir tous les champs!');</script>";
            }

            ?>
        </div>
    </div>