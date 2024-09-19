<html lang="en">

<head>
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="AURA Logo"></a> <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link me-5" href="index.php" style="color: #EF49B0; font-weight: bold;">
                            Accueil
                        </a>

                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false" style="color: #EF49B0; font-weight: bold;">
                            Catégories
                        </a>
                        <ul class="dropdown-menu">
                            <?php foreach ($categories as $categorie) {
                                print '<li><a class="dropdown-item" href="#">' . $categorie['nom'] . '</a></li>';
                            } ?>
                        </ul>
                    </li>

                </ul>

                <form class="d-flex mx-auto " action="index.php" method="POST">
                    <input class="form-control form-control-dark  w-100 me-2" type="search" placeholder="Rechercher" aria-label="Search" name="search">
                    <button class="btn btn-primary " type="submit">Search</button>
                </form>
                <?php
                if (isset($_SESSION['email'])) {
                    if (isset($_SESSION['panier']) && is_array($_SESSION['panier'][3])) {
                        print '
                    <a href="panier.php" class="btn btn-primary">Panier (' . count($_SESSION['panier'][3]) . ')</a>';
                    } else {
                        print '
                        <a href="panier.php" class="btn btn-primary">Panier (0)</a>';
                    }
                    print '
                     <a href="profil.php" class="btn btn-primary">Profile</a>
                     <a href="deconnexion.php" class="btn btn-primary">Se déconnecter</a>

                    ';
                } else {
                    print '
                     <a href="connexion.php" class="btn btn-primary">Se connecter</a>
                     <a href="registre.php" class="btn btn-primary">Sinscrire</a>';
                };
                ?>


            </div>
        </div>
    </nav>
</body>

</html>