<?php 
    include ('includes/inc_header.php');

    $user_sql = $mysqli->query('SELECT id FROM users WHERE email ="' . $_SESSION['email'] .'"');
    $user_row = $user_sql->fetch_array();

    $order_sql = $mysqli->query('
    SELECT date, total_products, total_price 
    FROM orders 
    WHERE user_id ="' . $user_row['id'] .'"
    ORDER BY date DESC;
    ');

    echo $order_sql->num_rows . " commande <br>";
    while ($order_row = $order_sql->fetch_array()) {
        echo date('d/m/y H:i', strtotime($order_row['date'])) . " " . $order_row['total_products'] . " articles " . $order_row['total_price'] . " €<br>" ;
    }

    include ('includes/inc_footer.php');
?>
