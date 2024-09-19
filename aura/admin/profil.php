<?php
session_start();
include('../functions/admin.php');
if (!isset($_SESSION['email'])) {
    header('location:connexion.php');
}
if (isset($_POST['btnModifier'])) {
    if (EditAdmin($_POST)) {
        $_SESSION['nom'] = $_POST['nom'];
        $_SESSION['email'] = $_POST['email'];
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AURA</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">
    <link rel="icon" href="../images/logo1.png" type="image/png">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/dashboard.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">


</head>

<body>
    <nav class="navbar  sticky-top  flex-md-nowrap p-0">
        <a class="navbar-brand" href="accueil.php"><img src="../images/logo.png" alt="AURA Logo"></a> <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark  w-100" type="text" placeholder="Rechercher AURA" aria-label="Search">
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="btn btn-primary" href="../deconnexion.php">Se déconnecter</a>
            </li>
        </ul>
    </nav>
    <div class="container-fluid mt-4">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky ">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link  mt-5" href="accueil.php">
                                <span data-feather="home"></span>
                                Accueil <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="commandes/liste.php">
                                <span data-feather="package"></span>
                                Paniers
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="categories/liste.php">
                                <span data-feather="file"></span>
                                Catégories
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="produits/liste.php">
                                <span data-feather="shopping-cart"></span>
                                Produits
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="stocks/liste.php">
                                <span data-feather="box"></span>
                                Stock
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="users"></span>
                                Utilisateurs
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active " href="profil.php">
                                <span data-feather="user"></span>
                                Profile
                            </a>
                        </li>
                    </ul>



                </div>
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom"> <?php echo '<h3 style="font-weight: bold;"> Bienvenue ' . $_SESSION['nom'] . '</3>';                     ?> </div>

                <div>
                    <h5 class="mb-3" style="font-weight: bold;">Email : <?php echo $_SESSION['email']; ?> </h5><a data-toggle="modal" data-target="#modifier" href="" class=" btn btn-secondary w-50">Modifier</a>
                </div>
            </main>
        </div>
    </div>
    <div>
        <div class="modal fade" id="modifier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-weight: bold;" class="modal-title" id="exampleModalLabel">Modifier mon profil</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
                            <input type="hidden" name="id">

                            <div class="mb-3">
                                <input type="hidden" name="id" value="<?php echo $_SESSION['id'] ?>">
                                <input type="text" name="nom" class="form-control form-control-dark " placeholder="Tapez votre nom" value="<?php echo $_SESSION['nom'] ?>">
                                <input type="email" name="email" class="form-control form-control-dark " placeholder="Tapez votre email" value="<?php echo $_SESSION['email'] ?>">
                                <input type="password" name="password" class="form-control form-control-dark " minlength="8" placeholder="Tapez votre mot de passe" value="<?php ?>">

                            </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn  btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" name="btnModifier" class="btn  btn-secondary">Modifier</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="../js/jquery-slim.min.js"><\/script>')
    </script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace()
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.1/dist/Chart.min.js"></script>
</body>





</html>