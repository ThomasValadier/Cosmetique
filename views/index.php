<?php require '../views/includes/header_logged.php' ?>


<!---Main Container--->
<div class="wrapper">

  <div class="top-content col-md-offset-1 col-md-10">
    <div class="overlay text-uppercase">
            <h1>Cosmetic Bio</h1>
            <p>Voir nos produit</p>
    </div>
    <?php require 'includes/carousel.php'; ?>
  </div>

  <div class="middle-content"><!--Partie images thumbnails-->
    <div class="portfolio">
      <?php
      $produits = $DB->query('SELECT * FROM produits WHERE id_produit < 4');
      foreach($produits as $produit):

      ?>
      <div class="portofolio-item">
<img src="assets/images/Produits_Images/Bourrache.png" alt="" />
      </div>
    <?php endforeach ?>
   </div>
  </div>

  <div class="bottom-content">
    <div class="contact">
      <h2>Contactez Nous...</h2>
      <div class="col-md-4"><h2>E-mail</h2><a href="le maildebibi@hotmail.com">le maildebibi@hotmail.com</a></div>
      <div class="col-md-8 map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.0379626591766!2d2.399438215424667!3d48.8574864792874!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66d87cd17cecb%3A0xef8012d74a4be163!2s27+Rue+de+Fontarabie%2C+75020+Paris%2C+France!5e0!3m2!1sen!2sus!4v1461514745278" width ="100%" height="300px" frameborder="0" style="border:0" allowfullscreen></iframe></div>

    </div>

    <div class="footer">
      <button class="btn btn-facebook"><i class="fa fa-facebook"></i> | Connectez avec Facebook</button>
      <p>All Rights Reserved.</p>

    </div>

  </div>

</div>


<!--FOOTER--->
<?php require 'includes/footer.php';?>
