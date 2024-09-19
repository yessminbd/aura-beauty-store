<?php
function Connect()
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
function getData()
{
    $data = array();
    $conn = Connect();
    $_REQUEST_produits = "SELECT count(*) FROM produit";
    $res_produits = $conn->query($_REQUEST_produits);
    $produits = $res_produits->fetch();
    $_REQUEST_categories = "SELECT count(*) FROM categorie";
    $res_categories = $conn->query($_REQUEST_categories);
    $categories = $res_categories->fetch();
    $_REQUEST_internautes = "SELECT count(*) FROM internaute";
    $res_internautes = $conn->query($_REQUEST_internautes);
    $internautes = $res_internautes->fetch();

    $data["produits"] = $produits[0];
    $data["categories"] = $categories[0];
    $data["internautes"] = $internautes[0];
    return $data;
}
