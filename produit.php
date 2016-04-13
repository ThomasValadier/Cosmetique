<?php require '../views/includes/header_logged.php';
$id_produit = $_GET['id_produit'];
$req = $DB->requete("SELECT * FROM produits where id_produit= '$id_produit' ");
$request = $DB->query("SELECT * FROM commentaire C  WHERE actif = 1 AND id_produit = '$id_produit'
ORDER BY Datecom DESC LIMIT 0,5");
//INNER JOIN produits P ON C.id_produit = P.id_produit WHERE actif = 1 AND id_produit = '$id_produit'
//ORDER BY Datecom DESC LIMIT 0,5");

if (isset($_SESSION['session']) && ($_SESSION['session']['admin'])) {

    echo "<a href=modif.php?id_produit=" . $id_produit . ">modifier produit</a>";

}


?>

<div id="corps">
    <span class="row">
    <div class="col-md-12">
        <h1>
            <?php /*$DB = new PDO ('mysql:host=localhost;dbname=startup', 'root', '');
            $req = $DB->query("SELECT nom_produit FROM produits where id_produit=1 ");
            while ($d = $req->fetch()) {
                echo $d['nom_produit'];
            }*/ ?>
            <?= $req->nom_produit; ?>
        </h1>
    </div>


    <img class="image" src="../assets/images/upload/<?= $req->image ?>">


    <p id="prix">
        <?=
        $req->prix_produit;
        ?>
    </p>


    <div id="pannier"><a href=""
                         TARGET="_blank"><i class="fa fa-2x fa-shopping-cart"></i>
            <p>Ajouter au pannier</p></a></div>


    <p id="description">
        <?=
        $req->description_produit;
        ?>
    </p>


        <!-- <div id="prod">
        <h3>Produits similaires</h3>
    </div>
    <div id="galerie">
        <div class="slider">
            <?php //for ($i = 0; $i < 15; $i++) {
        ?>

                <a href="#">
                    <img src="../assets/images/img.jpg">
                </a>
                <?php
        // }
        ?>

-->
</div>
<div class="suiv"></div>
<div class="prec"></div>
</div>


<div class="comment" class="col-md-offset-1 col-md-10">
    <h3>Commentaire</h3>
    <form id="formul" method="post" action="#">
        <!-- if (isset ($_SESSION['session']));
        <!-- //  if (!isset($_SESSION['utilisateur']) || !isset ($_SESSION['utilisateur']['login']) || !isset ($_SESSION['utilisateur']['password'])) {
        //  $requ = $DB->query("SELECT id_utilisateur FROM users");

        //if (count($raq['id_utilisateur'] == $_SESSION ['utilisateur']['id_utilisateur'])) == 0){
-->
        <!--<p><input class="form" type="text" name="nom" placeholder="Login"></p>-->

        <!--  <p><input class="form" type="password" name="password" placeholder="Password"></p> <!-- }-->
        <p><TEXTAREA class="form" name="message" rows=10 COLS=30
                     placeholder="Votre commentaire"></TEXTAREA></p>
        <button id="bouton" name="submit" type="submit">VALIDER!!</button>
    </form>
    <br>
</div>
<div class=" commentaire col-md-offset-1 col-md-10 col-xs-offset-1 col-xs-9">
    <?php


    foreach ($request as $commentaire): ?>


    <!-- while ($d = $request->fetch()) {
    $id = $d['id'];
    echo ' -->
    <div>
        <div class="pseudo"><?= $commentaire->pseudo ?><br></div>
        <div class='date'>Posté le: <?= $commentaire->Datecom ?></div>
        <br><br>
        <div class="col-md-offset 10"><?= $commentaire->comment ?></div>
        <form action="produit.php?id_produit=<?= $commentaire->id_produit ?>" method="post">
            <input type="hidden" name="id" value="<?= $commentaire->id_commentaire ?>">
            <?php if (isset($_SESSION['session'])){
            if (($_SESSION['session']['admin']) || ($_SESSION['session']['id_user'] == $commentaire->id_user)){
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

        <?php /*if (isset($_SESSION['utilisateur']) && isset ($_SESSION['utilisateur']['login']) && isset
            ($_SESSION['utilisateur']['password'])
        ) {
            // $requ = $DB->query("SELECT id_utilisateur FROM users");
            // while ($raq = $requ->fetch()){
            //if ($raq['id_utilisateur'] == $_SESSION ['utilisateur']['id_utilisateur']{

*/
        /*  echo "<form action=\"produit.php\" method=\"post\">
               <button name=\"effacer" . $id . "\" type = \"submit\"
               onclick = \"if(!confirm('Etes vous sûr de vouloir supprimer votre commentaire ?'))return false\">
               <div class='glyphicon glyphicon-remove'></div>
               </button>
           </form>";

  */


        //}}}


        if (isset($_POST['submit'])) {
            if (isset ($_SESSION['session'])) {
                $login = $_SESSION['session']['login'];
                $id_user = $_SESSION['session']['id_user'];
                if (!empty($_POST['message'])) {
                    //  if (!empty ($_POST['nom']) && !empty ($_POST['message']) && !empty ($_POST['password'])) {
                    //   $password = htmlspecialchars($_POST['password']);
                    $message = htmlspecialchars(addslashes($_POST['message']));
                    //$nom = htmlspecialchars($_POST['nom']);
                    //   $req = $DB->query("SELECT * FROM users WHERE identifiant_user = '$nom' AND password_user = '$password'");
                    //   $result = $req->fetchAll();
                    //  if (count($result) == 1) {

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


