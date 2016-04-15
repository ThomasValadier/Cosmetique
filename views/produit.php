<?php require '../views/includes/header_logged.php';

$id_produit = $_GET['id_produit'];
$req = $DB->requete("SELECT * FROM produits where id_produit= '$id_produit' ");
$request = $DB->query("SELECT * FROM commentaire C  WHERE actif = 1 AND id_produit = '$id_produit'
ORDER BY Datecom DESC LIMIT 0,5");


if (isset($_SESSION['session']) && ($_SESSION['session']['admin'])) { //l'utilisateur peut modifier ou supprimer un produit ssi il est admin

    echo "<button><a href=modif.php?id_produit=" . $id_produit . "><div class=\"glyphicon glyphicon-pencil \"></div></a></button>";//lien vers la page de modification en récuprérant l'id dans le lien
    echo "<form method='post'> <!--suppression du produit-->
<button onclick=\"if(!confirm('Etes vous sûr de vouloir supprimer ce produit ?'))return false\" type = \"submit\" name='del'><div class=\"glyphicon glyphicon-remove\"> </div></button>
</form>";
    if (isset($_POST['del'])) {   //supression du produit
        $DB->insert("UPDATE produits SET actif = 0 WHERE id_produit = '$id_produit'");
        echo "<script>document.location = 'categorie_produit.php'</script>";
    }

}


?>

<div id="corps">
    <span class="row">
    <div class="col-md-12">
        <h1> <?= $req->nom_produit; ?></h1>
    </div>


    <img class="image" src="../assets/images/upload/<?= $req->image ?>">


    <p id="prix">
        <?= $req->prix_produit; ?>
    </p>


    <div id="pannier"><a href=""
                         TARGET="_blank"><i class="fa fa-2x fa-shopping-cart"></i>
            <p>Ajouter au pannier</p></a></div>


    <p id="description">
        <?= $req->description_produit; ?>

    </p>
<div class="comment" class="col-md-offset-1 col-md-10">
    <h3>Commentaire</h3>
    <form id="formul" method="post" action="#">
        <p><TEXTAREA class="form" name="message" rows=10 COLS=30
                     placeholder="Votre commentaire"></TEXTAREA></p>
        <button id="bouton" name="submit" type="submit">VALIDER!!</button>
    </form>
    <br>
</div>
<div class=" commentaire col-md-offset-1 col-md-10 col-xs-offset-1 col-xs-9">
    <?php
    foreach ($request as $commentaire): ?>
    <div>
        <div class="pseudo"><?= $commentaire->pseudo ?><br></div>
        <div class='date'>Posté le: <?= $commentaire->Datecom ?></div>
        <br><br>
        <div class="col-md-offset 10"><?= $commentaire->comment ?></div>
        <form action="produit.php?id_produit=<?= $commentaire->id_produit ?>" method="post">
            <input type="hidden" name="id" value="<?= $commentaire->id_commentaire ?>">
            <?php if (isset($_SESSION['session'])){
            if (($_SESSION['session']['admin']) || ($_SESSION['session']['id_user'] == $commentaire->id_user)){ //si l'utilisateur est admin ou bien s il est propriétaire du commentaire alors il aura l'icon pour supprimer le commentaire
            echo '<button name="effacer" type="submit"
                    onclick="if(!confirm(\'Etes vous sûr de vouloir supprimer votre commentaire ?\'))return false">
                <div class=\'glyphicon glyphicon-remove\'></div>
            </button>'; ?>
        </form>
        <?php if (isset($_POST['effacer'])) {
            $resultsup = $_POST['id'];
            $DB->insert("UPDATE commentaire SET actif = 0 WHERE id_commentaire = '$resultsup'");
            echo '<script>document.location = "produit.php?id_produit=' . $commentaire->id_produit . '"</script>';
            break;
        }
        }
        };
        ?>

        <?php endforeach ?>

        <?php
        if (isset($_POST['submit'])) {
            if (isset ($_SESSION['session'])) {
                $login = $_SESSION['session']['login'];
                $id_user = $_SESSION['session']['id_user'];
                if (!empty($_POST['message'])) {
                    $message = htmlspecialchars(addslashes($_POST['message']));
                    $DB->query("INSERT INTO commentaire VALUES('', '$login', '$message', now(), '$id_produit', '$id_user', 1)");
                    echo "<script> alert('Merci " . "$login " . "pour ton commentaire!!');</script>";
                    echo '<script>document.location = "produit.php?id_produit=' . $id_produit . '"</script> ';
                } else
                    echo "<script>alert('Veuillez remplir tous les champs!');</script>";
            } else
                echo
                "<script> alert('Veuillez vous connecter!');</script>";
        }
        ?>
    </div>
</div>
        <?php require '../views/includes/footer.php'; ?>


