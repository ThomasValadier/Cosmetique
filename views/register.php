<?php

    require '../views/includes/header.php';

?>

    <!-- TITLE REGISTER -->
    <div class="col-md-offset-1 col-md-10 title-register">
        <h1>inscription</h1>
    </div>

    <div class="col-md-offset-1 col-md-10 form-register">

        <!-- FORMULAIRE D'INSCRIPTION -->
        <form class="form-horizontal" method="post" action="../controllers/register_user.php">

            <!-- Text input-->
            <div class="row item-form-register">
                <input name="pseudo" type="text" placeholder="Identifiant" required>
            </div>

            <!-- Password input-->
            <div class="row item-form-register">
                <input name="password" type="password" placeholder="mot de passe" required>
                <span class="help-block">8 caractères minimum</span>
            </div>

            <!-- Password input-->
            <div class="row item-form-register">
                <input name="repeat_password" type="password" placeholder="confirmation mot de passe" required>
                <span class="help-block">8 caractères minimum</span>
            </div>

            <!-- email input-->
            <div class="row item-form-register">
                <input name="email" type="email" placeholder="email" required>
            </div>

            <!-- Multiple Radios -->
            <!--<div class="form-group">
                <label class="col-md-4 control-label" for="sexe">Sexe</label>
                <div class="col-md-4">
                    <div class="radio">
                        <label for="sexe-0">
                            <input type="radio" name="sexe" id="sexe-0" value="femme" checked="checked">
                            Femme
                        </label>
                    </div>
                    <div class="radio">
                        <label for="sexe-1">
                            <input type="radio" name="sexe" id="sexe-1" value="homme">
                            Homme
                        </label>
                    </div>
                </div>
            </div>-->

            <!-- Button -->
            <div class="row item-form-register button-inscription">
                <input type="submit" name="valider">
            </div>

        </form>

    </div>

<?php require '../views/includes/footer.php'; ?>
