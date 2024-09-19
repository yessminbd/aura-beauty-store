<?php
session_start();
include "functions/categorie.php";
$categories = getAllCategories();
if (!isset($_SESSION['nom'])) {
    header('location:connexion.php');
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="images/logo1.png" type="image/png">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AURA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">


</head>

<body>
    <?php include "include/header.php" ?>


    <div class="profile-container">


        <form action="profil.php" method="POST">
            <div class="form-group mt-3">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control form-control-dark" value=<?php echo $_SESSION['email'] ?> required>
            </div>

            <div class="form-group mt-3">
                <label for="nom">Nom</label>
                <input type="text" name="nom" class="form-control form-control-dark" value=<?php echo $_SESSION['nom'] ?> required>
            </div>

            <div class="form-group mt-3">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" class="form-control form-control-dark" value=<?php echo $_SESSION['prenom'] ?> required>
            </div>

            <div class="form-group mt-3">
                <label for="telephone">Téléphone</label>
                <input type="tel" class="form-control form-control-dark" name="telephone" maxlength="8" value=<?php echo $_SESSION['telephone'] ?>>
            </div>

            <div class="d-flex justify-content-end mt-3">
                <a href="connexion.php" class="btn btn-primary">Mettre à jour</a>
                <a href="deconnexion.php" class="btn btn-primary ms-3">Se déconnecter</a>
            </div>


        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <?php include "include/footer.php" ?>
</body>





</html>