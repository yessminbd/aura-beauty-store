<?php
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

function getAllCategories()
{
    $conn = Connect_cat();
    //creation de la requette
    $request = "SELECT * from categorie";
    //execution de la requette
    $res = $conn->query($request);
    //resultat de la requette
    $categories = $res->fetchAll();
    // var_dump($categories);}

    return $categories;
}
function addCategory()
{
    $conn = Connect_cat();
    $request = "SELECT * from categorie";
    //execution de la requette
    $res = $conn->query($request);
    //resultat de la requette
    $categories = $res->fetchAll();
    // var_dump($categories);}

    return $categories;
}
