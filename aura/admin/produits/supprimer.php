<?php



$idProduit = $_GET['idp'];
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
$idCategorie = $_GET['idc'];
$conn = Connect_P();
$_REQUEST = "DELETE FROM produit WHERE id='$idProduit'";
$res = $conn->query($_REQUEST);
if ($res) {
    header('location:liste.php?supp=ok');
}
