<?php require '../views/includes/header_logged.php'; ?>

<div class="col-md-offset-1 col-md-10 titre_panier">
    <p>panier</p>
    <span><p>Vos articles sont sauvegardés pendant un certain temps</p></span>
</div>

<form action="panier.php" method="post">

    <div class="col-md-offset-1 col-md-10 titre-list-panier">
        <div class="col-md-7 item-titre-panier"><p>nom</p></div>
        <div class="col-md-2 item-titre-panier"></div>
        <div class="col-md-1 item-titre-panier"><p>qte</p></div>
        <div class="col-md-1 item-titre-panier"><p>prix</p></div>
        <div class="col-md-1 item-titre-panier"><p>supp</p></div>
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

    <div class="col-md-offset-1 col-md-10 item-list-panier">
        <div class="col-md-9 detail-list-panier">
            <p><?= $produit->nom_produit; ?></p>
        </div>
        <div class="col-md-1 detail-list-panier">
            <p><span><?= $_SESSION['panier'][$produit->id_produit]; ?></span></p>
        </div>
        <div class="col-md-1 detail-list-panier">
            <p> <?= number_format($produit->prix_produit,2,',',''); ?>€ </p>
        </div>
        <div class="col-md-1 detail-list-panier supp">
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

<div class="col-md-offset-1 col-md-10 zone-final">
  <div class="col-md-6 final-retour">
    <a href="../views/categorie_produit.php">Continuer Shopping</a>
  </div>
  <div class="col-md-6 final-valider">
    <input type="submit" name="order" value="VALIDER PANIER">
  </div>
</div>

<?php require '../views/includes/footer.php'; ?>
