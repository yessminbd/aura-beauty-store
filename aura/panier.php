<?php
include "functions/categorie.php";
include "functions/produit.php";
session_start();
// var_dump($_SESSION['panier']);
$total = 0;
if (isset($_SESSION['panier'])) {
    $total = $_SESSION['panier'][1];
}
$commandes = array();
$categories = getAllCategories();
if (!empty($_POST)) { //search
    //recuperer donnees saisies
    $produits = searchProduct($_POST['search']);
} else {
    $produits = getAllProducts();
}
if (isset($_SESSION['panier'])) {

    if (isset($_SESSION['panier'][3]) > 0) {
        $commandes = $_SESSION['panier'][3];
    }
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

    <div class="container d-flex justify-content-center align-items-center" ">
        <div class=" row col-5 mt-5 mb-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Produit</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Total</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($commandes as $index => $commande) {
                    echo '<tr>
                        <th scope="row">' . $index + 1  . '</th>
                        <td>' . $commande[4] . '</td>
                        <td>' . $commande[0] . '</td>
                        <td>' . $commande[1] . '</td>
                        <td><a href ="actions/supprimer_produit_panier.php?idc=' . $index . '" class="btn btn-secondary"/>Supprimer</td>
                    </tr>';
                }
                ?>

            </tbody>
        </table>
        <div class="text-start mt-3">
            <h7 style="font-weight: bold; font-size: 15px;">Total : <?php echo $total; ?> TND</h7>
        </div>
        <div class="d-flex justify-content-between mt-3">
            <a href="index.php" style="font-weight: bold;" class="btn btn-primary w-50 me-2">Continuer mes achats</a>
            <a href="actions/valider.php" class="btn btn-primary w-50 ms-2">Commander </a>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <footer class="mt-5"><?php include "include/footer.php" ?></footer>

</body>

</html>