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

$internaute = $_SESSION['id'];
$produit = $_POST["id"];
$quantite = (int) $_POST['quantite'];
$conn = connect_C();

// Selection du produit avec id
$request = "SELECT prix,nom from produit WHERE id='$produit'";
$res = $conn->query($request);
$prix_produit = $res->fetch();
$total = $quantite * $prix_produit['prix'];
$date = date('Y-m-d');

// Enregistrement des donnees 
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array($internaute, 0, $quantite, $date, array());
}

// Make sure the 4th item in the panier (index 3) is an array
if (!is_array($_SESSION['panier'][3])) {
    $_SESSION['panier'][3] = array();
}

// Add the new product to the panier array
$_SESSION['panier'][1] += $total;
$_SESSION['panier'][3][] = array($quantite, $total, $date, $produit, $prix_produit['nom']);

header('location:../panier.php');



// //ajouter panier
// $request_panier = "INSERT INTO panier(internaute,total,date_creation) VALUES('$internaute','$total','$date')";
// $_RES_PANIER = $conn->query($request_panier);
// $panier = $conn->lastInsertId();


// //ajouter commande
// $_REQUEST = "INSERT INTO commande (produit,quantite,panier,total,date_creation) VALUES('$produit','$quantite','$panier','$total','$date')";
// $_RES = $conn->query($_REQUEST);
