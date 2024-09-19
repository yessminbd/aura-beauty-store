<?php



$idCategorie = $_GET['idc'];
function Connect_cat()
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
$idCategorie = $_GET['idc'];
$conn = Connect_cat();
$_REQUEST = "DELETE FROM categorie WHERE id='$idCategorie'";
$res = $conn->query($_REQUEST);
if ($res) {
    header('location:liste.php?supp=ok');
}
