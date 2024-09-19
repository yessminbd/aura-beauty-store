<?php
include('../../functions/categorie.php');
session_start();

$categories = getAllCategories();

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
                <a class="btn btn-primary" href=" ../deconnexion.php">Se déconnecter</a>
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
                            <a class="nav-link active" href="liste.php">
                                <span data-feather="file"></span>
                                Catégories
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../produits/liste.php">
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
                            <a class="nav-link" href="#">
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
                    <h3 style="font-weight: bold;">Liste des catégories</h3>
                    <a href=" #" class="btn btn-secondary ms-auto" data-toggle="modal" data-target="#exampleModal">Ajouter</a>
                </div>

                <div>


                    <div>

                        <?php
                        if (isset($_GET['ajout'])) {
                            echo ' <div class="alert alert-success">Catégorie ajoutée avec succés</div>';
                        };   ?>
                        <?php
                        if (isset($_GET['supp'])) {
                            echo ' <div class="alert alert-success">Catégorie supprimée avec succés</div>';
                        };   ?>
                        <?php
                        if (isset($_GET['modifier'])) {
                            echo ' <div class="alert alert-success">Catégorie modifiée avec succés</div>';
                        };   ?>


                    </div>
                    <table class="table ">
                        <thead>

                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($categories as $categorie) {
                                $i++;
                                echo ' <tr>
                                <th scope="row">' . $i . '</th>
                                <td>' . $categorie['nom'] . '</td>
                                <td>' . $categorie['description'] . '</td>
                                <td>
                                    <a href="#"data-toggle="modal" data-target="#editModal' . $categorie['id'] . '" class="btn btn-secondary">Modifier</a>
                                    <a onclick="return popUpDeleteCategorie()" href="supprimer.php?idc=' . $categorie['id'] . '" class="btn btn-secondary">Supprimer</a>

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
    <!-- Ajout -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-weight: bold;" class="modal-title" id="exampleModalLabel">Ajouter une catégorie</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="ajout.php" method="POST">
                        <div class="mb-3">
                            <input type="text" name="nom" class="form-control form-control-dark  " placeholder="Nom du catégorie" required>
                        </div>
                        <div class="mb-3">
                            <textarea name="description" class="form-control form-control-dark" placeholder="Description de catégorie ..." rows="3" required></textarea>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn  btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn  btn-secondary">Ajouter</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modifier -->
    <?php
    foreach ($categories as $index => $categorie) {
    ?> <div class="modal fade" id="editModal<?php echo $categorie['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-weight: bold;" class="modal-title" id="exampleModalLabel">Modifier catégorie</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="modifier.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $categorie['id'] ?>">

                            <div class="mb-3">
                                <input type="text" name="nom" class="form-control form-control-dark " value="<?php echo $categorie['nom'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <textarea name="description" class="form-control form-control-dark" rows="3" required><?php echo $categorie['description'] ?></textarea>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn  btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn  btn-secondary">Modifier</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <script>
        function popUpDeleteCategorie() {
            return confirm("Voulez-vous vraiment supprimer cette catégorie ?")
        }
    </script>
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