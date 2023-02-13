<?php 
    /** 
     * Page récapitulatif de la commande
     * Affichage de la commande du visiteur et de ses informations 
     * 
     * @package: order.php
     * @author: Hugo <borgne.hugo@gmail.com>
     * @since: 09/02/2023
     * @version: 1.0.0
     */

    include ('includes/inc_header.php');

    if (!isset($_SESSION['email'])) {
        $from = $_GET['from'];
        header("Location:connect.php?from=$from");
    }

    $page = 'order';
    $email = $_SESSION['email'];

    $informations = $mysqli->query('SELECT email, firstname, lastname, address, zip_code, city FROM users WHERE email ="' . $email . '"');
    $row = $informations->fetch_array(); 

    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $address = $row['address'];
    $zip_code = $row['zip_code'];
    $city = $row['city'];
?>

<h3 class="mb-5 text-center"><i class="bi bi-basket"></i> Récapitulatif de la commande</h3>

<div class="card w-25 border-0 mb-5 ">
  <div class="card-body p-0">
    <h5 class="card-title mb-3 fw-bold"><i class="bi bi-house me-2"></i>Vos coordonnées</h5>
    <p class="card-text">
        <?= $lastname . " " . $firstname ?><br>
        <?= $address ?><br>
        <?= $zip_code . " " . $city ?><br>
        <a href="mailto:<?= $email ?>" class="link-secondary"><?= $email ?></a>
    </p>
  </div>
</div>

<?php 
    include ('includes/inc_panier.php');
    include ('includes/inc_footer.php');
?>