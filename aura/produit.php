<?php
include "functions/categorie.php";
include "functions/produit.php";
$categories = getAllCategories();
session_start();
if (isset($_GET['id'])) { //existance de l'id

    $produit = getProduitById($_GET['id']);
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
    <?php
    if (isset($_SESSION['etat']) && $_SESSION['etat'] == 0) {
        echo '        <div class="alert alert-danger">Votre compte n est pas encore validé</div>
';
    }
    ?>
    <div class="row col-12 mt-5">

        <div class="card col-6 offset-3"> <!-- Réduction de la largeur de la carte -->
            <img src="images/<?php echo $produit['image'] ?>" class="card-img-top" alt="..." style="object-fit: cover; width: 100%; height: 300px;"> <!-- Ajustement de la taille de l'image -->
            <div class="card-body">
                <h5 class="card-title"><?php echo $produit['nom'] ?></h5>
                <p class="card-text"><?php echo $produit['description'] ?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><?php echo $produit['prix'] ?> TND</li>
                <?php foreach ($categories as $index => $categorie) {
                    if ($categorie['id'] == $produit['categorie']) {
                        print '<li class="list-group-item">' . $categorie['nom'] . '</li>';
                    }
                } ?>

            </ul>
            <form action="actions/commander.php" method="POST">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <input type="hidden" value="<?php echo $produit['id'] ?>" name="id" />
                    <input min="1" value="1" name=" quantite" class="form-control form-control-dark" step="1" type="number" placeholder="Quantité" style="width: 120px;" />

                    <button type="submit" <?php if (isset($_SESSION['etat']) && $_SESSION['etat'] == 0 || !isset($_SESSION['etat'])) {
                                                echo 'disabled';
                                            } ?> class="btn btn-secondary style=" width: 170px;">Commander</button>
                </div>
            </form>

        </div>
    </div>




    <?php include "include/footer.php" ?>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>