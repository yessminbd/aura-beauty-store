<?php
function connect()
{
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
function getAllProducts()
{
    //connexion vers BD
    $conn = connect();

    //creation de la requette
    $request = "SELECT * from produit";
    //execution de la requette
    $res = $conn->query($request);
    //resultat de la requette
    $products = $res->fetchAll();
    // var_dump($products);}

    return $products;
}
function searchProduct($keyword)
{
    $conn = connect();
    $request = "SELECT * FROM produit WHERE nom LIKE '%$keyword%' ";
    $res = $conn->query($request);
    $products = $res->fetchAll();
    return $products;
}
function getProduitById($id)
{
    $conn = connect();
    $_REQUEST = "SELECT * FROM produit WHERE id=$id";
    $res = $conn->query($_REQUEST);
    $produit = $res->fetch();
    return $produit;
}
function getAllStocks()
{
    $conn = connect();

    $request = "SELECT p.nom,s.id,s.quantite FROM produit p,stock s WHERE p.id=s.produit ";
    $res = $conn->query($request);
    $stocks = $res->fetchAll();
    return $stocks;
}
