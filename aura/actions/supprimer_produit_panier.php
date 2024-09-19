<?php
session_start();
$id = $_GET['idc'];
echo $id;
$total_supprimer = $_SESSION['panier'][3][$id][1];
$_SESSION['panier'][1] -= $total_supprimer;
unset($_SESSION['panier'][3][$id]);

header('location:../panier.php');
