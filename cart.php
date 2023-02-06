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
    ?>
    <div class="table-responsive"> 
        <?php 
            /** Le panier contient des articles */
            if($cart) { 
        ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">Image</th>
                        <th scope="col" class="text-center">Quantité</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prix unitaire</th>
                        <th scope="col">Prix total</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    
                    <?php   
                    /** Initialisation des variables */
                    $total = 0;
                    $total_quantity = 0;

                    /** On boucle sur les articles du panier */
                    foreach ($cart as $id => $article) {
                        $picture = $article['picture'];
                        $quantity = $article['quantity'];
                        $name = $article['name'];
                        $pu = $article['price'];

                        /** Calcul du prix total pour une ligne de produit */
                        $pt = $pu * $quantity;

                        /** Calcul du prix total du panier */
                        $total = $total + $pt;

                        /** Calcul du nombre de produits dans le panier */
                        $total_quantity = $total_quantity + $quantity; 

                        /** Formatage des prix */
                        $pt_FR = number_format($pt,2);
                        $total_FR = number_format($total,2);

                        ?>
                        <tr>
                            <th scope="row" style="width: 100px;"><img src="images/<?= $picture ?>" alt<?= $name ?> height="100"></th>
                            <td class="align-middle text-center" style="width: 10%;"><?= $quantity ?></td>
                            <td class="align-middle"><?= $name ?></td>
                            <td class="align-middle" style="width: 15%"><?= $pu ?> €</td>
                            <td class="align-middle" style="width: 15%;"><?= $pt_FR ?> €</td>
                            <td class="align-middle" style="width: 5%;">
                                <form method="post">
                                    <input type="hidden" name="action" value="delete_product_cart">
                                    <input type="hidden" name="product_id" value="<?= $id ?>">
                                    <button class="btn-close"></button>
                                </form>
                            </td>
                        </tr>
            
                    <?php } ?>

                    <tfoot class="table-group-divider">
                        <tr>
                            <td class="text-end fs-5 pt-4" style="border-bottom: 0;" colspan="6">
                                <?= $total_quantity ?> article<?= $total_quantity > 1 ? 's' : '' ?> pour un total de <?= $total_FR ?> € <br>
                                <form method="post">
                                    <input type="hidden" name="action" value="delete_cart">
                                    <button class='btn btn-dark mt-3'><i class='bi bi-bag-x-fill me-2'></i>Vider le panier</button>
                                </form>
                            </td>
                        </tr>
                    </tfoot>
                </tbody>
            </table>

        <?php 
            /** Le panier est vide */
            } else {
                echo '<p class="fs-5"><i class="bi bi-emoji-frown me-3 fs-4"></i>Votre panier est vide, <a href="index.php" class="link-dark">continuer vos achats</a></p>'; 
            } 
        ?>  
    </div>
</div>

<?php include ('includes/inc_footer.php'); ?>