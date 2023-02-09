<?php 
    /** 
     * Affichage du menu
     * 
     * @package: inc_menu.php
     * @author: Hugo <borgne.hugo@gmail.com>
     * @since: 03/02/2023
     * @version: 1.0.0
     */
?>

<header>
    <nav class="navbar text-bg-light p-3 mb-5 border-bottom">
        <div class="container-fluid">
            <a class="navbar-brand me-auto fs-5" href="index.php">
                <img src="images/logo.png" alt="Logo" height="50" class="d-inline-block align-text-mid me-1">
                CommerUp
            </a>
            <div class="text-end">
                <?php 
                    // Etat de l'identification de l'utilisateur
                    if (isset($_SESSION['email'])) {
                        echo 'Vous etes connecté en tant que "<strong>' . $_SESSION['email'] . '</strong>"';
                        echo '<a class="ms-2 me-5" href="logout.php"><button type="button" class="btn btn-outline-dark">Déconnexion</button></a>';
                    } 
                    else {
                        echo '<a class="me-5" href="connect.php?from=menu"><button type="button" class="btn btn-outline-dark me-2">Connexion</button></a>';
                    }
                ?>  
            </div>
            <a class="nav-link link-dark me-5 fs-5" href="index.php">
                <i class="bi bi-house-heart fs-3"></i>
                Accueil
            </a>
            <a class="nav-link link-dark position-relative" href="cart.php">
                <i class="bi bi-basket3 fs-3"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark">
                    <?= $total_quantity; ?>
                </span>
            </a>
        </div>
    </nav>
</header>