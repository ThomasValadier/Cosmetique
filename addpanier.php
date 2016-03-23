<?php
  require '_header.php';

  $json = array('error' => true);

  if (isset($_GET['id_produit'])){
    $produit = $DB->query('SELECT id_produit FROM produits WHERE id_produit=:id_produit', array('id_produit' => $_GET['id_produit']));
    if (empty($produit)){
      $json['message'] = "Ce produit n'existe pas";
    }
    if($produit >= 1){
      $panier_produit->plus($produit[0]->id_produit);
      $json['error'] = false;
      $json['message'] = 'Le produit a été ajouté au panier';
    }
  $panier_produit->add($produit[0]->id_produit);
  $json['error'] = false;
  //$json['total'] = $panier_produit->total();
  $json['count'] = $panier_produit->count();
  $json['message'] = 'Le produit a été ajouté au panier';
  }
  else {
    $json['message'] = "Vous n'avez pas séléctionné d'article à ajouter au panier";
  }
  echo json_encode($json);
