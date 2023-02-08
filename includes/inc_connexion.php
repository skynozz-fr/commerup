<?php 
    /** 
     * Connexion à la base de données
     * 
     * @package: inc_connexion.php
     * @author: Hugo <borgne.hugo@gmail.com>
     * @since: 03/02/2023
     * @version: 1.0.0
     */

    $mysqli = new mysqli('localhost', 'root', '', 'commerup-v2');
    $mysqli->set_charset('utf8');
?>