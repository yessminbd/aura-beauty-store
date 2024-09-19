<?php
session_start();

function Connect_P()
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

$nom = $_POST['nom'];
$description = $_POST['description'];
$prix = $_POST['prix'];
$quantite = $_POST['quantite'];
$categorie = $_POST['categorie'];
$createur = $_SESSION['id'];
$date_creation = date('Y-m-d');
$date = date('Y-m-d');
$image = '';
if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
    $target_dir = "../../images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $image = basename($_FILES["image"]["name"]);
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
} else {
    echo "No file uploaded or there was an error.";
}

$conn = Connect_P();

$sql = "INSERT INTO produit (nom, description, prix, createur, image, categorie, date_creation) 
        VALUES (:nom, :description, :prix, :createur, :image, :categorie, :date_creation)";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':nom', $nom);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':prix', $prix);
$stmt->bindParam(':createur', $createur);
$stmt->bindParam(':image', $image);
$stmt->bindParam(':categorie', $categorie);
$stmt->bindParam(':date_creation', $date_creation);

if ($stmt->execute()) {
    $produit = $conn->lastInsertId();
    $sql1 = "INSERT INTO stock (produit, quantite, createur, date_creation) 
VALUES (:produit, :quantite, :createur, :date_creation)";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bindParam(':produit', $produit);
    $stmt1->bindParam(':quantite', $quantite);
    $stmt1->bindParam(':createur', $createur);
    $stmt1->bindParam(':date_creation', $date);
    if ($stmt1->execute()) {
        header('location:liste.php?ajout=ok');
    } else {
        echo 'Erreur ajout du stock du produit ';
    }
} else {
    echo "Erreur lors de l'ajout du produit.";
}
