<?php
include('../../functions/categorie.php');
include('../../functions/internaute.php');

session_start();
$categories = getAllCategories();
$internautes = getAllUsers();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AURA</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
    <link rel="icon" href="../../images/logo1.png" type="image/png">
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/dashboard.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">


</head>

<body>
    <nav class="navbar  sticky-top  flex-md-nowrap p-0">
        <a class="navbar-brand" href="../accueil.php"><img src="../../images/logo.png" alt="AURA Logo"></a> <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark  w-100" type="text" placeholder="Rechercher AURA" aria-label="Search">
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="btn btn-primary" href=" ../../deconnexion.php">Se déconnecter</a>
            </li>
        </ul>
    </nav>
    <div class="container-fluid mt-5 ">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky ">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link  mt-5" href="../accueil.php">
                                <span data-feather="home"></span>
                                Accueil <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../commandes/liste.php">
                                <span data-feather="package"></span>
                                Paniers
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../categories/liste.php">
                                <span data-feather="file"></span>
                                Catégories
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../produits/liste.php">
                                <span data-feather="shopping-cart"></span>
                                Produits
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../stocks/liste.php">
                                <span data-feather="box"></span>
                                Stock
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="liste.php">
                                <span data-feather="users"></span>
                                Utilisateurs
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../profil.php">
                                <span data-feather="user"></span>
                                Profile
                            </a>
                        </li>
                    </ul>



                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10  px-4">
                <div class="d-flex justify-content-between  flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 ">
                    <h3 style="font-weight: bold;">Liste des utilisateurs</h3>
                </div>


                <?php
                if (isset($_GET['valider'])) {
                    echo ' <div class="alert alert-success">Utilisateur validé avec succés</div>';
                };   ?>

                <div>


                    <div>



                    </div>
                    <table class="table ">
                        <thead>

                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Email</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Téléphone</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($internautes as $index => $internaute) {
                                $index++;
                                echo ' <tr>
                                <td>' . $index . '</td>
                                <td>' . $internaute['email'] . '</td>
                                <td>' . $internaute['nom'] . '</td>
                                <td>' . $internaute['prenom'] . '</td>
                                <td>' . $internaute['telephone'] . '</td>
                                <td>
                                    <a href="valider.php?id=' . $internaute['id'] . '"   class="btn btn-secondary">Valider</a>
                                </td>

                            </tr>';
                            }


                            ?>

                        </tbody>
                    </table>
                </div>


            </main>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="../js/jquery-slim.min.js"><\/script>')
    </script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>

    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace()
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>

</body>





</html>