<?php  
    /** 
     * Page d'accueil
     * Affichage d'une liste de produits
     * 
     * @package: index.php
     * @author: Hugo <borgne.hugo@gmail.com>
     * @since: 03/02/2023
     * @version: 1.0.0
     */

    include ('includes/inc_header.php'); 
?>

<h3 class="mb-5 text-center"><i class="bi bi-house-heart"></i> Nos coups de cœur</h3>

<?php 
    /** On vérifie si un article a été ajouté */
    if ($success !== null ) {

        /** Le produit a bien été ajouté */
        if ($success === true) {
            echo "<p class='alert alert-success text-center mb-4' role='alert'><i class='bi bi-check-lg me-2'></i>$message</p>";

        /** Une erreur est survenue */
        } elseif ($success === false) {
            echo "<p class='alert alert-danger text-center mb-4' role='alert'><i class='bi bi-x-lg me-2'></i>$message</p>";
        }
    }
?>

<div class="row">
    <?php 
        /** Recherche et affichage de tous les produits */
        $products = $mysqli->query("SELECT * FROM products");
        foreach($products as $product) : 
    ?>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-4 text-center">
            <div class="card d-inline-flex" style="width: 300px;">
                <img src="images/<?= $product['picture'] ?>" class="card-img-top img-fluid" style="height: 300px; width: auto;">
                <div class="card-body">
                    <h5 class="card-title"><?= $product['name'] ?></h5>
                    <p class="text-black fw-bold fs-5"><?= $product['price'] ?> €</p>
                    <form method="post">
                        <input type="hidden" name="action" value="add_product_cart">
                        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                        <button class="btn btn-dark"><i class="bi bi-bag-plus-fill me-2"></i>Ajouter au panier</button>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>

<?php include ('includes/inc_footer.php'); ?>