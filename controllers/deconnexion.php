<?php require_once '../models/_header.php';

session_destroy();
echo '<script language="JavaScript" type="text/javascript">window.location.replace("../views/categorie_produit.php");</script>';
