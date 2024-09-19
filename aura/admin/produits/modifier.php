<?php
session_start();
function Connect_P()
{
    //connexion vers BD
    $servername = "localhost";
    $DBuser = "root";
    $DBpassword = "";
    $DBname = "ecommerce";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser, $DBpassword);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    return $conn;
}
$id = $_POST['id'];
$nom = $_POST['nom'];
$description = $_POST['description'];
$prix = $_POST['prix'];
$categorie = $_POST['categorie'];

$date_modification = date("Y-m-d");

// Connexion à la base de données
$conn = Connect_P();

try {
    // Préparation de la requête SQL avec des paramètres
    $stmt = $conn->prepare("UPDATE produit SET nom = :nom, description = :description, prix = :prix, categorie = :categorie, date_modification = :date_modification WHERE id = :id");

    // Lier les valeurs aux paramètres
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':prix', $prix);
    $stmt->bindParam(':categorie', $categorie);
    $stmt->bindParam(':date_modification', $date_modification);

    // Exécuter la requête
    $stmt->execute();

    // Redirection en cas de succès
    header('location:liste.php?modifier=ok');
} catch (PDOException $e) {
    // Gestion des erreurs
    echo "Erreur : " . $e->getMessage();
}
