<?php 
    /** 
     * Page connect
     * Permet de se créer un compte ou alors de se connecter
     * 
     * @package: connect.php
     * @author: Hugo <borgne.hugo@gmail.com>
     * @since: 03/02/2023
     * @version: 1.0.0
     */
    include ('includes/inc_header.php'); 

    /** L'utilisateur est déjà connecté, on l'envoie sur l'accueil */
    if (isset($_SESSION['email'])) {
        header('Location:index.php');
    }
?>

<div class="row">
    <div class="col-5 me-5 mb-5"><?php include ('includes/inc_register.php') ?></div>
    <div class="col-5  ms-5"><?php include ('includes/inc_login.php') ?></div>
</div>

<?php include ('includes/inc_footer.php'); ?>