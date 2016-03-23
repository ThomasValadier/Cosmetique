<?php require '../includes/header.php'; ?>

<!-- TITRE PAGE : CATEGORIE -->
<div class="col-md-offset-1 col-md-10 titre_page">
  <p>
    HOME / CATEGORIES
  </p>
</div>

<!-- CATEGORIE : MAQUILLAGE -->
<div class="row">
  <div class="col-md-offset-1 col-md-10 titre_categorie">
    <h1>MAQUILLAGE</h1>
    <a href="#">
      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
    </a>
  </div>
</div>

<!-- ZONE PRODUIT -->
<div class="container zone_produit">

  <?php $produits = $DB->query('SELECT * FROM produits WHERE categorie = "maquillage" '); ?>
  <?php foreach ( $produits as $produit ): ?>

    <div class="box_produit">
      <div class="row zone_image">
        <a href="#"><img class="img-responsive" src="../assets/images/1.jpg"></a>
      </div>
      <div class="row zone_description">
        <a href="#"><?= $produit->nom_produit; ?></a>
      </div>
      <div class="row zone_prix">
        <a href="#"><?= number_format($produit->prix_produit,2,',',''); ?> €</a>
      </div>
      <div class="row zone_add">
        <a class="addPanier" href="../addpanier.php?id_produit=<?= $produit->id_produit; ?>">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
      </div>
    </div>

  <?php endforeach ?>

</div>
<!-- Div séparatrice -->
<div class="col-md-offset-1 col-md-10 separatrice"></div>

<!-- CATEGORIE : SOIN POUR LE VISAGE -->
<div class="row">
  <div class="col-md-offset-1 col-md-10 titre_categorie">
    <h1>VISAGE</h1>
    <a href="#">
      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
    </a>
  </div>
</div>

<!-- ZONE PRODUIT -->
<div class="container zone_produit">

  <?php $produits = $DB->query('SELECT * FROM produits WHERE categorie = "soin visage"'); ?>
  <?php foreach ( $produits as $produit ): ?>

    <div class="box_produit">
      <div class="row zone_image">
        <a href="#"><img class="img-responsive" src="../assets/images/1.jpg"></a>
      </div>
      <div class="row zone_description">
        <a href="#"><?= $produit->nom_produit; ?></a>
      </div>
      <div class="row zone_prix">
        <a href="#"><?= number_format($produit->prix_produit,2,',',''); ?> €</a>
      </div>
      <div class="row zone_add">
        <a class="addPanier" href="../addpanier.php?id_produit=<?= $produit->id_produit; ?>">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
      </div>
    </div>

  <?php endforeach ?>

</div>
<!-- Div séparatrice -->
<div class="col-md-offset-1 col-md-10 separatrice"></div>

<!-- CATEGORIE : SOIN POUR LE CORPS -->
<div class="row">
  <div class="col-md-offset-1 col-md-10 titre_categorie">
    <h1>CORPS</h1>
    <a href="#">
      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
    </a>
  </div>
</div>

<!-- ZONE PRODUIT -->
<div class="container zone_produit">

  <?php $produits = $DB->query('SELECT * FROM produits WHERE categorie = "soin corps"'); ?>
  <?php foreach ( $produits as $produit ): ?>

    <div class="box_produit">
      <div class="row zone_image">
        <a href="#"><img class="img-responsive" src="../assets/images/1.jpg"></a>
      </div>
      <div class="row zone_description">
        <a href="#"><?= $produit->nom_produit; ?></a>
      </div>
      <div class="row zone_prix">
        <a href="#"><?= number_format($produit->prix_produit,2,',',''); ?> €</a>
      </div>
      <div class="row zone_add">
        <a class="addPanier" href="../addpanier.php?id_produit=<?= $produit->id_produit; ?>">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </a>
      </div>
    </div>

  <?php endforeach ?>

</div>

<?php require '../includes/footer.php'; ?>
