<?php

    require '../views/includes/header_logged.php';

?>

    <!-- TITLE REGISTER -->
    <div class="col-md-offset-1 col-md-10 title-register">
        <h1>informations personnelles</h1>
    </div>

    <div class="col-md-offset-1 col-md-10 form-register">

        <!-- FORMULAIRE D'INSCRIPTION -->
        <form class="form-horizontal" method="post" action="../controllers/register_user.php">

            <!-- identifiant input-->
            <div class="row item-form-register">
                <input name="pseudo" type="text" placeholder="IDENTIFIANT" required>
            </div>

            <!-- password input-->
            <div class="row item-form-register">
                <input name="password" type="password" placeholder="MOT DE PASSE" required>
                <span class="help-block">8 caractères minimum</span>
            </div>

            <!-- password confirm input-->
            <div class="row item-form-register">
                <input name="repeatPassword" type="password" placeholder="CONFIRMATION MOT DE PASSE" required>
                <span class="help-block">8 caractères minimum</span>
            </div>

            <!-- email input-->
            <div class="row item-form-register">
                <input name="email" type="email" placeholder="E-MAIL" required>
            </div>

            <!-- nom input-->
            <div class="row item-form-register">
                <input name="nom" type="text" placeholder="NOM" required>
            </div>

            <!-- prénom input-->
            <div class="row item-form-register">
                <input name="prenom" type="text" placeholder="PRENOM" required>
            </div>

            <!-- sexe input -->
            <div class="row item-form-register">
                <div class="choix_sexe">
                    <input type="radio" name="sexe" value="femme" checked="checked"><span id="sexe">Femme</span>
                    <input type="radio" name="sexe" value="homme"><span id="sexe">Homme</span>
                </div>
            </div>

            <!-- adresse input -->
            <div class="row item-form-register">
                <input type="text" name="adresse" placeholder="ADRESSE">
            </div>

            <!-- ville input -->
            <div class="row item-form-register">
                <input type="text" name="ville" placeholder="VILLE">
            </div>

            <!-- code postal input -->
            <div class="row item-form-register">
                <input type="text" name="codePostal" placeholder="CODE POSTAL">
            </div>

            <!-- telephone input -->
            <div class="row item-form-register">
                <input type="text" name="telephone" placeholder="TELEPHONE">
            </div>

            <!-- Button -->
            <div class="row item-form-register button-inscription">
                <input type="submit" name="valider-register1">
            </div>

        </form>

    </div>

<?php require '../views/includes/footer.php'; ?>
