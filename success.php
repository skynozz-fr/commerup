<?php 
  /** 
     * Page succès
     * Affichage de la page succès
     * 
     * @package: success.php
     * @author: Hugo <borgne.hugo@gmail.com>
     * @since: 09/02/2023
     * @version: 1.0.0
     */

    unset($_COOKIE['cart']);
    include ('includes/inc_header.php'); 

    $confirmation = $mysqli->query('SELECT firstname FROM users WHERE email ="' . $_SESSION['email'] . '"');
    $row = $confirmation->fetch_array();
    $firstname = $row['firstname'];
?>

<div class="alert alert-success mt-5" role="alert">
  <h4 class="alert-heading">Merci <?= $firstname ?> votre commande est validée !</h4>
  <p>Nous préparons votre commande avec soins pour la déposer au plus vite chez vous.</p>
  <hr>
  <p class="mb-0">Date de livraison estimée : entre le 20/02/2023 et le 27/02/2023</p>
</div>

<?php include ('includes/inc_footer.php'); ?>