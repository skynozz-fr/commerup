<?php  
    /** 
     * Page panier
     * Affichage du panier du visiteur
     * 
     * @package: cart.php
     * @author: Hugo <borgne.hugo@gmail.com>
     * @since: 03/02/2023
     * @version: 1.0.0
     */

    include ('includes/inc_header.php'); 
?>

<h3 class="mb-5 text-center"><i class="bi bi-basket3"></i> Votre panier</h3>

<div class="panier">
    <?php 

    /** On vérifie si le panier ou un produit a été supprimé */
    if ($success !== null ) {

        /** Le panier ou un produit a bien été supprimé */
        if ($success === true) {
            echo "<p class='alert alert-success text-center mb-4' role='alert'><i class='bi bi-check-lg me-2'></i>$message</p>";

        /** Une erreur est survenue */
        } elseif ($success === false) {
            echo "<p class='alert alert-danger text-center mb-4' role='alert'><i class='bi bi-x-lg me-2'></i>$message</p>";
        }
    }

    $page = 'cart';
    include ('includes/inc_panier.php');
    ?>
</div>

<?php include ('includes/inc_footer.php'); ?>