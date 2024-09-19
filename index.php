<?php
include "functions/categorie.php";
include "functions/produit.php";
session_start();
$categories = getAllCategories();
if (!empty($_POST)) { //search
    //recuperer donnees saisies
    $produits = searchProduct($_POST['search']);
} else {
    $produits = getAllProducts();
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AURA</title>
    <link rel="icon" href="images/logo1.png" type="image/png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">


</head>

<body>
    <?php include "include/header.php" ?>

    <div class="container">
        <div class="row col-12 mt-5">
            <?php
            foreach ($produits as $produit) {
                print '<div class="col-md-4 col-sm-6 col-12">
                <div class="card">
                    <img src="images/' . $produit['image'] . '" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">' . $produit['nom'] . '</h5>
                        <p class="card-text ">' . $produit['prix'] . ' TND</p>
                        <a href="produit.php?id=' . $produit['id'] . '" class="btn btn-secondary w-100">Voir</a>
                    </div>
                </div>
            </div>';
            }
            ?>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <?php include "include/footer.php" ?>

</body>


</html>