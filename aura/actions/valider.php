<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('location:../connexion.php');
    exit();
}
function connect_C()
{
    $servername = "localhost";
    $DBuser = "root";
    $DBpassword = "";
    $DBname = "ecommerce";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser, $DBpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    return $conn;
}
$date = date('Y-m-d');
$internaute = $_SESSION['id'];
$total = $_SESSION['panier'][1];
$conn = connect_C();

//ajouter panier
$request_panier = "INSERT INTO panier(internaute,total,date_creation) VALUES('$internaute','$total','$date')";
$_RES_PANIER = $conn->query($request_panier);
$panier_id = $conn->lastInsertId();
$commandes = $_SESSION['panier'][3];
//ajouter commande
foreach ($commandes as $commande) {
    $quantite = (int) $commande[0];
    $total_commande = $commande[1];
    $produit = $commande[3];
    $_REQUEST = "INSERT INTO commande (produit,quantite,panier,total,date_creation) VALUES('$produit','$quantite','$panier_id','$total_commande','$date')";
    $_RES = $conn->query($_REQUEST);
};
$_SESSION['panier'] = null;
header('location:../index.php');
