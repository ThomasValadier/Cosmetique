<?php

session_start();

require_once 'db.classe.php';
require_once 'panier.class.php';

$DB = new DB();
$panier_produit = new panier($DB);

?>
