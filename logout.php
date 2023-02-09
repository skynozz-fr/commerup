<?php 
    /** 
     * Page déconnexion
     * 
     * @package: inc_logout.php
     * @author: Hugo <borgne.hugo@gmail.com>
     * @since: 09/02/2023
     * @version: 1.0.0
     */

session_start();
session_destroy();
header('location:index.php');
?>