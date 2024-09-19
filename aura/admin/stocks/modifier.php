<?php
session_start();
function Connect_S()
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
$quantite = $_POST['quantite'];
$conn = Connect_S();
$_REQUEST = "UPDATE  stock SET quantite='$quantite'  WHERE id='$id' ";
$res = $conn->query($_REQUEST);
if ($res) {
    header('location:liste.php?modifier=ok');
}
