<?php
include('commande.php');

session_start();
$paniers = getAllPanier();
$commandes = getAllCommandes();
if (isset($_POST['btnSubmit'])) {
    //Il faut changer l'etat du panier 
    changerEtatPanier($_POST);
    header('location:liste.php');
}
if (isset($_POST['btnchercher'])) {
    if ($_POST['etat'] == "Tous") {
        $paniers = getAllPanier();
    } else {
        $paniers = getPanierByEtat($paniers, $_POST['etat']);
    }
}
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
                            <a class="nav-link active" href="../commandes/liste.php">
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
                            <a class="nav-link " href="../Internautes/liste.php">
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
                    <h3 style="font-weight: bold;">Liste des paniers</h3>
                </div>


                <div>


                    <div>

                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                            <div class="form-group d-flex">
                                <select class="form-control form-control-dark mr-3" name="etat">
                                    <option>Sélectionner par </option>
                                    <option value="Tous">Tous </option>
                                    <option value="en cours">En cours</option>
                                    <option value="En cours de livraison">En cours de livraison</option>
                                    <option value="Commande livrée">Commande livrée</option>
                                </select>
                                <button name="btnchercher" class="btn btn-secondary" type="submit">Chercher</button>
                            </div>
                        </form>

                    </div>
                    <table class="table ">
                        <thead>

                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Client</th>
                                <th scope="col">Date</th>
                                <th scope="col">Etat</th>
                                <th scope="col">Total (TND)</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($paniers as $index => $panier) {
                                $index++;
                                echo ' <tr>
                                <td>' . $index . '</td>
                                <td>' . $panier['nom'] . ' ' . $panier['prenom'] . '</td>
                                <td>' . $panier['date_creation'] . '</td>            <td>' . $panier['etat'] . '</td>                    <td>' . $panier['total'] . '</td>
                                <td>
                                    <a href="#"  data-toggle="modal" data-target="#listModal' . $panier['id'] . '" class="btn btn-secondary">Afficher</a>
                                    <a href="#"   data-toggle="modal" data-target="#traiterModal' . $panier['id'] . '"  class="btn btn-secondary">Traiter</a>
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
    <div>
        <?php
        foreach ($paniers as $index => $panier) {
        ?> <div class="modal fade" id="listModal<?php echo $panier['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 style="font-weight: bold;" class="modal-title" id="exampleModalLabel">Liste des commandes </h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="table ml-5">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Nom du produit</th>
                                        <th>Quantité</th>
                                        <th>Total (TND)</th>
                                    </tr>
                                    <tr>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($commandes as $commande) {
                                        if ($commande['panier'] == $panier['id']) {
                                            print ' <tr>
                                            <td><img style="height: 20px;" src="../../images/' . $commande['image'] . '"></a></td>
                                            <td>' . $commande['nom'] . '</td>
                                            <td>' . $commande['quantite'] . '</td>
                                            <td>' . $commande['total'] . '</td>
                                            </tr>';
                                        }
                                    } ?>
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    </div>
    <!-- traiter -->
    <?php
    foreach ($paniers as $index => $panier) {
    ?> <div class="modal fade" id="traiterModal<?php echo $panier['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="font-weight: bold;" class="modal-title" id="exampleModalLabel">Traiter commandes </h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="table ml-5">
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                            <input name="id" type="hidden" value="<?php echo $panier['id']; ?>"></input>
                            <select name="etat" style="width: 250px" class="form-control form-control-dark mt-4 ">
                                <option class="form-control-dark" value="En cours de livraison">En cours de livraison</option>
                                <option class="form-control-dark" value="Commande livrée">Commande livrée</option>

                            </select>
                            <button type="submit" name="btnSubmit" class="btn btn-secondary mt-4 w-50">Enregistrer</button>


                        </form>

                    </div>
                </div>
            </div>
        </div>

    <?php
    } ?>
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