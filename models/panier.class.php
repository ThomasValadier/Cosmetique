<?php
class panier{

  private $DB;

  public function __construct($DB){
    if(!isset($_SESSION)){
      session_start();
    }
    if(!isset($_SESSION['panier'])){
      $_SESSION['panier'] = array();
    }
    $this->DB = $DB;
    if(isset($_GET['delPanier'])){
      $this->del($_GET['delPanier']);
    }
    if(isset($_GET['moinsPanier'])){
      $this->moins($_GET['moinsPanier']);
    }
  }

  public function count(){
    return array_sum($_SESSION['panier']);
  }

  public function total(){
    $total = 0;
    $ids = array_keys($_SESSION['panier']);
    if (empty($ids)){
      $produits = array();
    }else{
      $produits = $this->DB->query('SELECT id_produit, prix_produit FROM produits WHERE id_produit IN ('.implode(',',$ids).')');
    }
    foreach ($produits as $produit){
      $total += $produit->prix_produit * $_SESSION['panier'][$produit->id_produit];
    }
    return $total;
  }

  public function add($produit_id){
    if(isset($_SESSION['panier'][$produit_id])){
      $_SESSION['panier'][$produit_id];
    }else{
      $_SESSION['panier'][$produit_id] = 1;
    }
  }

  public function del($produit_id){
    unset($_SESSION['panier'][$produit_id]);
  }

  public function plus($produit_id){
    if(isset($_SESSION['panier'][$produit_id])){
      $_SESSION['panier'][$produit_id]++;
    }else{
      $_SESSION['panier'][$produit_id] = 1;
    }
  }

  public function moins($produit_id){
      if(isset($_SESSION['panier'][$produit_id])){
        $_SESSION['panier'][$produit_id]--;
      }else{
        $_SESSION['panier'][$produit_id] = 1;
      }
  }

}
