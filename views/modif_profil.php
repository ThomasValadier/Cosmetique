<?php

require_once 'includes/header_logged.php';
require_once '../controllers/modif_profil.php';

$id_user = $_SESSION['session']['id_user'];

$req = $DB->requete("SELECT * FROM users WHERE id_user = '$id_user'")

?>

<div class="col-md-offset-1 col-md-10 titre-page-profil">
    <h1>MODIFICATION INFORMATIONS</h1>
</div>

<form method="post">

    <div class="col-md-offset-1 col-md-10 content-profil-info-perso">

        <div class="col-md-6 content-info-perso">
            <div class="item-info-modif">
                <input type="text" name="nom" value="<?= $req->nom_user; ?>">
            </div>
            <div class="item-info-modif">
                <input type="text" name="prenom" value="<?= $req->prenom_user; ?>">
            </div>
            <div class="item-info-modif">
                <input type="password" name="password" value="<?= $req->password_user; ?>">
            </div>
            <div class="item-info-modif">
                <input type="password" name="repeatPassword" value="<?= $req->password_user; ?>">
            </div>
            <div class="item-info-modif">
                <input type="email" name="email" value="<?= $req->email_user; ?>">
            </div>
        </div>

        <div class="col-md-6 content-info-perso">

            <div class="item-info-modif">
                <input type="text" name="adresse" value="<?= $req->adresse_user; ?>">
            </div>
            <div class="item-info-modif">
                <input type="text" name="ville" value="<?= $req->ville_user; ?>">
            </div>
            <div class="item-info-modif">
                <input type="text" name="codePostal" value="<?= $req->codePostal_user; ?>">
            </div>
            <div class="item-info-modif">
                <input type="text" name="telephone" value="0<?= $req->telephone_user; ?>">
            </div>
            <div class="item-info-modif item-modif">
                <button type="submit" name="modifier_profil">MODIFIER</button>
            </div>
        </div>

    </div>

</form>

<?php require_once 'includes/footer.php'; ?>
