<?php
$id = $_GET['id'];
function Connect_U()
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
$conn = Connect_U();
$_REQUEST = "Update internaute SET etat= 1 WHERE id='$id'";
$res = $conn->query($_REQUEST);
if ($res) {
    header('location:liste.php?valider=ok');
} else {
    echo 'Erreur de validation';
}
