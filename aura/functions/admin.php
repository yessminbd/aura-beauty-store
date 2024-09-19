<?php
function Connect_A()
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


function connectAdmin($data)
{
    $conn = Connect_A();
    $_REQUEST = "SELECT * FROM administrateur WHERE email='$data[email]' AND password='$data[password]'";
    $res = $conn->query($_REQUEST);
    $admin = $res->fetch();
    var_dump($admin);
    return $admin;
}
function EditAdmin($data)
{
    $conn = Connect_A();
    if ($data['password'] != "") {
        $_REQUEST = "UPDATE  administrateur SET nom='$data[nom]' ,email='$data[email]', password='$data[password]' WHERE id='$data[id]'";
    } else {
        $_REQUEST = "UPDATE  administrateur SET nom='$data[nom]' ,email='$data[email]' WHERE id='$data[id]'";
    }
    $res = $conn->query($_REQUEST);
    return true;
}
