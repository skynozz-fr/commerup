<?php
    include ('inc_connexion.php');

    session_start();

    if (isset($_SESSION['email'])) {
        $result = $mysqli->query('SELECT email FROM users WHERE email = "' . $_SESSION['email'] . '"');
        $row = $result->fetch_array();

        if (!isset($row['email'])) {
            session_destroy();
        }
    }
?>