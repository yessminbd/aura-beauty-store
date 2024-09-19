<?php
session_start();
function Connect_cat()
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
$date_modification = date("Y-m-d");
$conn = Connect_cat();
$_REQUEST = "UPDATE  categorie SET nom='$nom' ,description='$description',date_modification='$date_modification' WHERE id='$id' ";
$res = $conn->query($_REQUEST);
if ($res) {
    header('location:liste.php?modifier=ok');
}
