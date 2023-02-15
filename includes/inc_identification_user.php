<?php
    /** 
     * Vérification de l'identification de l'utilisateur
     * 
     * @package: inc_identification_user.php
     * @author: Hugo <borgne.hugo@gmail.com>
     * @since: 09/02/2023
     * @version: 1.0.0
     */ 

    include ('inc_connexion.php');

    session_start();

    if (isset($_SESSION['email'])) {
        $identification = $mysqli->query('SELECT email FROM users WHERE email = "' . $_SESSION['email'] . '"');
        $row = $identification->fetch_array();

        if (!isset($row['email'])) {
            session_destroy();
        }
    }
?>