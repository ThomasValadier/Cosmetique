<?php

    require_once '../views/includes/header_logged.php';
    
?>

    <!-- TITLE REGISTER -->
    <div class="col-md-offset-1 col-md-10 title-register">
        <h1>informations profil</h1>
    </div>

<form method="post" action="../controllers/register_user.php">

    <div class="col-md-offset-1 col-md-10 content-profil">

        <div class="col-md-6 content-form-profil">

            <div class="item-form-profil">
                <div class="item-question">
                    <p>Où vivez-vous ?</p>
                </div>
                <div class="item-reponse">
                    <input type="text" name="question1" placeholder="Reponse">
                </div>
            </div>
            <div class="item-form-profil">
                <div class="item-question">
                    <p>Où travaillez-vous ?</p>
                </div>
                <div class="item-reponse">
                    <input type="text" name="question2" placeholder="Reponse">
                </div>
            </div>
            <div class="item-form-profil">
                <div class="item-question">
                    <p>Etes-vous fumeur ?</p>
                </div>
                <div class="item-reponse">
                    <input type="text" name="question3" placeholder="Reponse">
                </div>
            </div>
            <div class="item-form-profil">
                <div class="item-question">
                    <p>Mangez-vous relativement équilibrée ?</p>
                </div>
                <div class="item-reponse">
                    <input type="text" name="question4" placeholder="Reponse">
                </div>
            </div>
            <div class="item-form-profil">
                <div class="item-question">
                    <p>Consommez-vous des produits bios ?</p>
                </div>
                <div class="item-reponse">
                    <input type="text" name="question5" placeholder="Reponse">
                </div>
            </div>

        </div>

        <div class="col-md-6 content-form-profil">

            <div class="item-form-profil">
                <div class="item-question">
                    <p>Prenez-vous des médicaments ?</p>
                </div>
                <div class="item-reponse">
                    <input type="text" name="question6" placeholder="Reponse">
                </div>
            </div>
            <div class="item-form-profil">
                <div class="item-question">
                    <p>Etes-vous enceinte ou allaitante ?</p>
                </div>
                <div class="item-reponse">
                    <input type="text" name="question7" placeholder="Reponse">
                </div>
            </div>
            <div class="item-form-profil">
                <div class="item-question">
                    <p>Avez-vous déja fait des allergies a des produits cosmetics ?</p>
                </div>
                <div class="item-reponse">
                    <input type="text" name="question8" placeholder="Reponse">
                </div>
            </div>
            <div class="item-form-profil">
                <div class="item-question">
                    <p>Etes-vous sujettes a des émotions fortes (vies personnelle, professionnelle, affective) ?</p>
                </div>
                <div class="item-reponse">
                    <input type="text" name="question9" placeholder="Reponse">
                </div>
            </div>
            <div class="item-form-profil">
                <div class="item-question">
                    <p>Avez-vous un ryhtme de sommeil régulier ?</p>
                </div>
                <div class="item-reponse">
                    <input type="text" name="question10" placeholder="Reponse">
                </div>
            </div>

        </div>
    </div>

    <div class="col-md-offset-1 col-md-10 content-profil-envoyer">
        <input type="submit" name="valider-register2">
    </div>

</form>

<?php require '../views/includes/footer.php'; ?>
