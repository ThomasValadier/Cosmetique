<?php

require_once '../views/includes/header.php';
require_once '../controllers/test-profil-user.php';

?>

<!-- 1ERE QUESTION - FORM1 -->
<form name="form4" method="post">

    <!-- CONTENT FULL -->
    <div class="col-md-offset-1 col-md-10 content-test">

        <!-- CONTENT TITLE -->
        <div class="content-title-test">
            <h1>test</h1>
            <p>Ce test déterminera quels produits vous sont conseillés</p>
        </div>

        <!-- CONTENT QUESTION -->
        <div class="content-question-test">

                <div class="row question-test">
                    <h4>selectionnez la problématique qui vous concerne.</h4>
                </div>

                <div class="row reponse-test">
                    <div class="content-reponse1">
                        <input type="submit" name="reponse1-questionFinal1" value="Rougeur / Teint rosé">
                    </div>
                    <div class="content-reponse2">
                        <input type="submit" name="reponse2-questionFinal1" value="Tiraillement">
                    </div>
                </div>

        </div>
        <!-- FIN CONTENT QUESTION -->

    </div>
    <!-- FIN CONTENT FULL -->

</form>
<!-- FIN FORMULAIRE -->

<?php require_once '../views/includes/footer.php'; ?>
