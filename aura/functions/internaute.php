<?php
function Connect_I()
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
function getAllUsers()
{
    $conn = Connect_I();
    //creation de la requette
    $request = "SELECT * from internaute WHERE etat=0 ";
    //execution de la requette
    $res = $conn->query($request);
    //resultat de la requette
    $internautes = $res->fetchAll();
    // var_dump($categories);}

    return $internautes;
}
function addInternaute($data)
{
    $conn = Connect_I();
    // Création de la requête
    $passwordAsh = md5($data['password']);
    $request = "INSERT INTO internaute(nom, prenom, email, password, telephone) VALUES ('" . $data['nom'] . "', '" . $data['prenom'] . "', '" . $data['email'] . "', '" . $passwordAsh . "', '" . $data['telephone'] . "')";

    // Exécution de la requête
    $res = $conn->query($request);
    if ($res) {
        return true;
    } else {
        return false;
    }
}
function connectInternaute($data)
{
    $conn = Connect_I();
    $password = md5($data['password']);
    $_REQUEST = "SELECT * FROM internaute WHERE email='$data[email]' AND password='$password'";
    $res = $conn->query($_REQUEST);
    $internaute = $res->fetch();
    // var_dump($inetrnaute);
    return $internaute;
}
