<?php
require '../views/includes/header_logged.php';
require '../controllers/utilisateur.php';

?>
<!-- TITRE -->
<div class="col-md-offset-1 col-md-10 titre-page-utilisateur">
    <h1>utilisateurs</h1>
</div>

<div class="col-md-offset-1 col-md-10 recherche-utilisateur">
    <!-- liste déroulante pour choisir comment classer-->
    <form>
        <!-- method GET pour pouvoir avoir l'affichage identique que celui attendu en cas de retour à l'affichage précédent sur le navigateur  -->
        <div class="row recherche-select">
            <select name="affich">
                <option value="vide" selected>Choisissez la categorie</option>
                <option value="femme">Femme</option>
                <option value="homme">Homme</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <div class="row recherche-envoyer">
            <button type="submit" name="envoyer">
                <div class="glyphicon glyphicon-search"></div>
            </button>
        </div>

    </form>

</div>

<!-- TITRE LISTE UTILISATEUR -->
<div class="col-md-offset-1 col-md-10 titre-list-utilisateur">
    <div class="col-md-2 item-titre-list"><p>Nom, prénom</p></div>
    <div class="col-md-1 item-titre-list"><p>Identifiant</p></div>
    <div class="col-md-1 item-titre-list"><p>Sexe</p></div>
    <div class="col-md-2 item-titre-list"><p>E-mail</p></div>
    <div class="col-md-2 item-titre-list"><p>Telephone</p></div>
    <div class="col-md-3 item-titre-list"><p>Adresse</p></div>
</div>

<div class="col-md-offset-1 col-md-10 content-utilisateur">
    <?php $reqs = $DB->query($requete); ?>
    <?php foreach ($reqs as $req): ?>
        <div class="row list-utilisateur">
            <div class="col-md-2 item-list"><p><?= $req->identifiant_user; ?></p></div>
            <div class="col-md-1 item-list"><p><?= $req->identifiant_user; ?></p></div>
            <div class="col-md-1 item-list"><p><?= $req->sexe_user; ?></p></div>
            <div class="col-md-2 item-list"><p><?= $req->email_user; ?></p></div>
            <div class="col-md-2 item-list"><p><?= $req->identifiant_user; ?></p></div>
            <div class="col-md-3 item-list"><p><?= $req->adresse_user.' '.$req->codePostal_user.', '.$req->ville_user; ?></p></div>
            <div class="col-md-1 item-list"><a href="../views/profil-user.php?id_user=<?= $req->id_user; ?>">Profil</a></div>
        </div>
    <?php endforeach; ?>
</div>


<?php require '../views/includes/footer.php'; ?>
