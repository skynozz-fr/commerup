<?php 
    /** 
     * Page commandes effectué
     * Récapitulatif des commandes passé par l'utilisateur
     * 
     * @package: orders.php
     * @author: Hugo <borgne.hugo@gmail.com>
     * @since: 03/02/2023
     * @version: 1.0.0
     */

    include ('includes/inc_header.php');

    echo "<h3 class='mb-5 text-center'><i class='bi bi-cart3'></i> Mes commandes</h3>";

    $user_sql = $mysqli->query('SELECT id FROM users WHERE email ="' . $_SESSION['email'] .'"');
    $user_row = $user_sql->fetch_array();

    $order_sql = $mysqli->query('
    SELECT date, total_products, total_price 
    FROM orders 
    WHERE user_id ="' . $user_row['id'] .'"
    ORDER BY date DESC;
    ');

    echo "<p class='mb-5 fs-5 fw-bold'>Total : " . $order_sql->num_rows . " commandes <br></p>" ;
    while ($order_row = $order_sql->fetch_array()) {
    ?>

<div class="card d-inline-flex mb-4 me-4" style="width: 18rem;">
    <div class="card-body">
        <p class="card-text">
            Date : <?= date('d/m/y H:i', strtotime($order_row['date']))?><br>
            <?= $order_row['total_products'] ?> article<?= $order_row['total_products'] > 1 ? 's' : '' ?><br>
            Total : <?= $order_row['total_price'] ?> € <div class="border-bottom"></div>
        </p>
        <a href="index.php" class="link-secondary">Commander a nouveau</a><br>
        <a href="#" class="link-secondary">Suivre ma commande</a>
    </div>
</div>

    <?php } 
    include ('includes/inc_footer.php');
?>
