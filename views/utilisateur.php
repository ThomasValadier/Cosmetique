<?php
require '../views/includes/header_logged.php';
require '../controllers/utilisateurs.php';
require '../models/utilisateurs.class.php';

?>
<div id="contenaire">
    <!-- liste déroulante pour choisir comment classer-->
    <form action="utilisateur.php?affich=<?= $_GET['affich']; ?>">
        <!-- method GET pour pouvoir avoir l'affichage identique que celui attendu en cas de retour à l'affichage précédent sur le navigateur  -->
        <select name="affich">
            <option value="vide" style='background-color:#dcdcc3' selected>Choisissez la categorie</option>
            <option value="F">Femme</option>
            <option value="H">Homme</option>
            <option value="admin">Admin</option>
        </select>
        <button type="submit" name="go">
            <div class="glyphicon glyphicon-search"></div>
        </button>
    </form>
    <!-- fonction qui va dire combien de résultats correspondent (pluriel et résultat null pris en compte  -->
    <div id="compte"><b><?= $utilisateur->compte($req); ?></b></div>

    <!--Afficher les résultats -->
    <div id="contenaire_user">
        <?php foreach ($req as $users): ?>
            <div class="row">
                <span class="col-md-offset-1  col-md-2 col-xs-1"><?= $users->identifiant_user; ?></span>
        <span
            class=" col-md-1 col-xs-1"><?php if ($users->sexe_user == 0) echo 'Homme'; else echo 'Femme'; ?></span>
                <span class="col-md-offset-2 col-xs-offset-1 col-md-2 col-xs-5"> <?= $users->email_user; ?></span>
                <?php if ($users->is_admin) echo '<span class="col-md-2 col-xs-2">Admin</span>'; else echo '<form method="post">
<input type="hidden" name="idus" value = "' . $users->id_user . '">
<span class="col-md-offset-2 col-xs-offset-2 col-md-2 col-xs-1"><button name = "add" type="submit">Créer admin</button></span></form>' ?>
                <!-- ajouter cet utilisateur en admin-->
        <span class="col-md-2 col-xs-1"><?php if ($users->is_admin == 1) echo '<form method="post">
<input type="hidden" name="idus" value = "' . $users->id_user . '"><!-- récupre l utilisateur-->
<button name = "del" type="submit">Supprimer admin</button></form>'; ?></span>
                <!-- retirer le statu d'admin à cet utilisateur-->
            </div>
        <?php endforeach; ?>
    </div>
</div>


<?php require '../views/includes/footer.php'; ?>
