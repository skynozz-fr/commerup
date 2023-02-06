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