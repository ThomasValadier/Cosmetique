<?php

require_once 'includes/header_logged.php';

$id_user = $_GET['id_user'];

$req = $DB->requete("SELECT * FROM users WHERE id_user = '$id_user'")

?>

<div class="col-md-offset-1 col-md-10 titre-page-profil">
    <h1>informations personnelles</h1>
</div>

<div class="col-md-offset-1 col-md-10 content-profil-info-perso">

    <div class="col-md-6 content-info-perso">
        <div class="item-info">
            <p>Nom, Prenom<span><?= $req->nom_user.' '.$req->prenom_user; ?></span></p>
        </div>
        <div class="item-info">
            <p>Identifiant<span><?= $req->identifiant_user; ?></span></p>
        </div>
        <div class="item-info">
            <p>Email<span><?= $req->email_user; ?></span></p>
        </div>
        <div class="item-info">
            <p>Sexe<span><?= $req->sexe_user; ?></span></p>
        </div>
        <div class="item-info">
            <p>Resultat Test<span><?= $req->resultatTest_user; ?></span></p>
        </div>
    </div>

    <div class="col-md-6 content-info-perso">
        <div class="item-info">
            <p>Telephone<span>0<?= $req->telephone_user; ?></span></p>
        </div>
        <div class="item-info">
            <p>Adresse<span><?= $req->adresse_user; ?></span></p>
        </div>
        <div class="item-info">
            <p>Ville<span><?= $req->ville_user; ?></span></p>
        </div>
        <div class="item-info">
            <p>Code Postal<span><?= $req->codePostal_user; ?></span></p>
        </div>
        <div class="item-info item-modifier">
            <a href="../views/modif_profil.php">modifier</a>
        </div>
    </div>

</div>

<div class="col-md-offset-1 col-md-10 titre-page-profil">
    <h1>informations profil</h1>
</div>

<div class="col-md-offset-1 col-md-10 content-profil">

    <?php $question = $DB->requete("SELECT * FROM profil_users WHERE id_user = '$id_user'"); ?>

    <div class="col-md-6 content-list-profil">
        <div class="item-profil">
            <div class="item-question">
                <p>Où vivez-vous ?</p>
            </div>
            <div class="item-reponse">
                <p><?= $question->question_1; ?></p>
            </div>
        </div>
        <div class="item-profil">
            <div class="item-question">
                <p>Où travaillez-vous ?</p>
            </div>
            <div class="item-reponse">
                <p><?= $question->question_2; ?></p>
            </div>
        </div>
        <div class="item-profil">
            <div class="item-question">
                <p>Etes-vous fumeur ?</p>
            </div>
            <div class="item-reponse">
                <p><?= $question->question_3; ?></p>
            </div>
        </div>
        <div class="item-profil">
            <div class="item-question">
                <p>Mangez-vous relativement équilibrée ?</p>
            </div>
            <div class="item-reponse">
                <p><?= $question->question_4; ?></p>
            </div>
        </div>
        <div class="item-profil">
            <div class="item-question">
                <p>Consommez-vous des produits bios ?</p>
            </div>
            <div class="item-reponse">
                <p><?= $question->question_5; ?></p>
            </div>
        </div>
    </div>

    <div class="col-md-6 content-list-profil">
        <div class="item-profil">
            <div class="item-question">
                <p>Prenez-vous des médicaments ?</p>
            </div>
            <div class="item-reponse">
                <p><?= $question->question_6; ?></p>
            </div>
        </div>
        <div class="item-profil">
            <div class="item-question">
                <p>Etes-vous enceinte ou allaitante ?</p>
            </div>
            <div class="item-reponse">
                <p><?= $question->question_7; ?></p>
            </div>
        </div>
        <div class="item-profil">
            <div class="item-question">
                <p>Avez-vous déja fait des allergies a des produits cosmetics ?</p>
            </div>
            <div class="item-reponse">
                <p><?= $question->question_8; ?></p>
            </div>
        </div>
        <div class="item-profil">
            <div class="item-question">
                <p>Etes-vous sujettes a des émotions fortes (vies personnelle, professionnelle, affective) ?</p>
            </div>
            <div class="item-reponse">
                <p><?= $question->question_9; ?></p>
            </div>
        </div>
        <div class="item-profil">
            <div class="item-question">
                <p>Avez-vous un ryhtme de sommeil régulier ?</p>
            </div>
            <div class="item-reponse">
                <p><?= $question->question_10; ?></p>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
