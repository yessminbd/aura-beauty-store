<?php
include "functions/categorie.php";
include "functions/internaute.php";
session_start();
if (isset($_SESSION['nom'])) {
    header('location:profil.php');
}
$categories = getAllCategories();
$showRegistrationAlert = 0;
if (!empty($_POST)) {
    if (addInternaute($_POST)) {
        $showRegistrationAlert = 1;
    }
}


?>
<!doctype html>
<html lang="en">

<head>
    <link rel="icon" href="images/logo1.png" type="image/png">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AURA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <link href="css/dashboard.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <?php include "include/header.php" ?>

    <!-- debut form -->
    <div>
        <h1 class=" text-center mt-5">Bienvenue sur AURA</h1>

        <form action="registre.php" method="POST" class="d-flex flex-column justify-content-center align-items-center mt-4">
            <div class="mb-3 w-50">
                <input name="email" type="email" class="form-control form-control-dark" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Email" required>
            </div>
            <div class="mb-3 w-50">
                <input name="nom" type="text" class="form-control form-control-dark" id="exampleInputNom" placeholder="Nom" required>
            </div>
            <div class="mb-3 w-50">
                <input name="prenom" type="text" class="form-control form-control-dark" id="exampleInputPrenom" placeholder="Prénom" required>
            </div>
            <div class="mb-3 w-50">
                <input name="telephone" type="text" maxlength="8" class="form-control form-control-dark" id="exampleInputTelephone" placeholder="Téléphone" required>
            </div>
            <div class="mb-3 w-50">
                <input name="password" type="password" minlenght="8" class="form-control form-control-dark" id="exampleInputPassword" placeholder="Mot de passe" required>
            </div>
            <button type="submit" class="btn btn-primary w-50 mb-5">S'inscrire</button>
        </form>

    </div>
    </div>


    <!-- footer -->
    <?php include "include/footer.php" ?>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link href="css/style.css" rel="stylesheet">

    <?php
    if ($showRegistrationAlert == 1) {
        print "<script>
swal('Votre compte a été créé avec succès. Vous pouvez maintenant vous connecter')

              </script>";
    }
    ?>

</body>

</html>