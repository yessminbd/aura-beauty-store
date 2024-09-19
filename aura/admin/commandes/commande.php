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
function getAllPanier()
{
    $conn = connect();

    $request = "SELECT i.nom,i.prenom,i.telephone,p.total, p.id,p.etat,p.date_creation FROM panier p,internaute i WHERE p.internaute=i.id ";
    $res = $conn->query($request);
    $paniers = $res->fetchAll();
    return $paniers;
}
function getAllCommandes()
{
    $conn = connect();

    $request = "SELECT p.nom , p.image ,c.quantite , c.total, c.panier FROM commande c ,produit p WHERE c.produit=p.id ";
    $res = $conn->query($request);
    $commandes = $res->fetchAll();
    return $commandes;
}
function changerEtatPanier($data)
{
    $conn = connect();
    $_REQUEST = "UPDATE panier SET etat='$data[etat]' WHERE id='$data[id]'";
    $res = $conn->query($_REQUEST);
}
function getPanierByEtat($paniers, $etat)
{
    $panierEtat = array();
    foreach ($paniers as $panier) {
        if ($panier['etat'] == $etat) {
            array_push($panierEtat, $panier);
        }
    }
    return $panierEtat;
}
