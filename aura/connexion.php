<?php
include "functions/categorie.php";
include "functions/internaute.php";
session_start();
if (isset($_SESSION['nom'])) {
    header('location:profil.php');
}

$categories = getAllCategories();
$internaute = true;
if (!empty($_POST)) {
    $internaute = connectInternaute($_POST);
    if (is_array($internaute) && count($internaute) > 0) {
        session_start();
        $_SESSION['id'] = $internaute['id'];
        $_SESSION['email'] = $internaute['email'];
        $_SESSION['nom'] = $internaute['nom'];
        $_SESSION['prenom'] = $internaute['prenom'];
        $_SESSION['etat'] = $internaute['etat'];
        $_SESSION['telephone'] = $internaute['telephone'];
        $_SESSION['password'] = $internaute['password'];
        header('location:profil.php');
    };
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

    <link href="css/style.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">


</head>

<body>
    <?php include "include/header.php" ?>

    <!-- debut form -->
    <div class="d-flex flex-column justify-content-center  mt-5 ">
        <a href="index.php" style="display: flex; justify-content: center; align-items: center;">
            <img src="images/logo.png" alt="AURA Logo" style="width: 180px; height: auto;">
        </a>
        <h1 class=" text-center">Connexion</h1>
        <form action="connexion.php" method="POST" class="d-flex flex-column justify-content-center align-items-center mt-4 ">
            <div class="mb-3 w-50">
                <input name="email" type="email" class="form-control form-control-dark " id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Email">
            </div>

            <div class="mb-3 w-50">
                <input name="password" minlength="8" type="password" class="form-control form-control-dark" id="exampleInputPassword" placeholder="Mot de passe" required>
            </div>
            <div class="mb-3 w-50">
                <a style="color: #EF49B0;" href="registre.php">Vous n'avez pas encore de compte ?</a>
            </div>
            <button type="submit" class="btn btn-primary mb-5 w-50">Se connecter</button>
        </form>

    </div>
    </div>


    <!-- footer -->
    <?php include "include/footer.php" ?>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    <?php
    if (!$internaute) {
        print "<script>
        swal('Les informations de connexion que vous avez saisies sont incorrectes. Veuillez réessayer.')
                      </script>";
    }
    ?>
</body>

</html>