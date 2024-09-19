<?php
session_start();
include "../functions/categorie.php";
include "../functions/data.php";

$categories = getAllCategories();
if (!isset($_SESSION['nom'])) {
    header('location:../connexion.php');
}
$data = getData();


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>AURA</title>
    <link rel="icon" href="../images/logo1.png" type="image/png">


    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">

    <!-- Bootstrap core CSS -->
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
        </button> <input class="form-control form-control-dark  w-100" type="text" placeholder="Rechercher AURA" aria-label="recherche">
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="btn btn-primary" href="../deconnexion.php">Se déconnecter</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid mt-5">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky ">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active mt-5" href="accueil.php">
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
                            <a class="nav-link" href="internautes/liste.php">
                                <span data-feather="users"></span>
                                Utilisateurs
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  " href="profil.php">
                                <span data-feather="user"></span>
                                Profile
                            </a>
                        </li>
                    </ul>



                </div>
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                <div class="container">
                    <div class="row col-12">
                        <div class="col-4">Nombre de produit disponibles </div>
                        <div class="col-4">Nombre des clients </div>
                        <div class="col-4">Nombre des catégories </div>
                    </div>
                </div>

                <canvas id="myChart" width="400" height="200"></canvas>

                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                <script>
                    var ctx = document.getElementById('myChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['Produits', 'Clients', 'Catégories'],
                            datasets: [{
                                label: 'Statistiques',
                                data: [<?php echo $data['produits']; ?>, <?php echo $data['internautes']; ?>, <?php echo $data['categories']; ?>],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>


            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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