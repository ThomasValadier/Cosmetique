<?php require '../includes/header.php'; ?>

<div class="row">
  <div class="col-md-offset-1 col-md-10 titre">
    <p id="titre_1">PANIER</p>
    <p id="titre_2">Vos articles sont sauvegardés pendant un certain temps</p>
  </div>
</div>

<form action="panier.php" method="post">

  <div class="row">
    <div class="col-md-offset-1 col-md-2 shopping_bag">
      <p id="shopping_produit">Produit</p>
    </div>
    <div class="col-md-5 shopping_bag">
      <p>Nom</p>
    </div>
    <div class="col-md-1 shopping_bag">
      <p>Qté</p>
    </div>
    <div class="col-md-1 shopping_bag">
      <p>Prix</p>
    </div>
    <div class="col-md-1 shopping_bag">
      <p id="supp">Supp</p>
    </div>
  </div>

  <?php
  $ids = array_keys($_SESSION['panier']);
  if (empty($ids)){
    $produits = array();
  }else{
    $produits = $DB->query('SELECT * FROM produits WHERE id_produit IN ('.implode(',',$ids).')');
  }
  foreach($produits as $produit):
  ?>

    <div class="row">

      <div class="col-md-offset-1 col-md-2 produit_bag">
        <a href=""><img src="../assets/images/1.jpg" alt="image_produit"/></a>
      </div>

      <div class="col-md-4 produit_bag">
        <p> <?= $produit->nom_produit; ?> </p>
      </div>

      <div class="col-md-1 produit_bag" id="plus_moins">
        <a class="plusPanier" href="addpanier.php?id_produit=<?= $produit->id_produit; ?>">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
        <a href="panier.php?moinsPanier=<?= $produit->id_produit; ?>">
          <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
        </a>
      </div>

      <div class="col-md-1 produit_bag">
        <p> <?= $_SESSION['panier'][$produit->id_produit]; ?> </p>
      </div>

      <div class="col-md-1 produit_bag">
        <p> <?= number_format($produit->prix_produit,2,',',''); ?>€ </p>
      </div>

      <div class="col-md-1 produit_bag">
        <a href="panier.php?delPanier=<?= $produit->id_produit; ?>"<span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
      </div>

    </div>

  <?php endforeach ?>

  <div class="row">
    <div class="col-md-offset-1 col-md-10 zone_total">
      <p>Total :<span id="prix_total"><?= number_format($panier_produit->total(),2,',',' '); ?> €</span></p>
    </div>
  </div>

</form>

<div class="row">
  <div class="col-md-offset-1 col-md-5 zone_retour">
    <a href="#">Continuer Shopping</a>
  </div>
  <div class="col-md-5 zone_validation">
    <input type="submit" name="order" value="Order Now">
  </div>
</div>

<?php require '../includes/footer.php'; ?>
