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

	if (isset($_COOKIE['cart']) && !empty($_COOKIE['cart'])) {
		$order_total_quantity = 0;
		$order_total_price = 0;
		$order_cart = unserialize($_COOKIE['cart']);

		unset($_COOKIE['cart']);

		foreach ($order_cart as $id => $article) {
			$order_total_quantity = $order_total_quantity + $article['quantity'];
			$order_total_price = $order_total_price + $article['price'] * $article['quantity'];
		} 
		$order_cart = serialize($order_cart);

		include ('includes/inc_header.php'); 

		$confirmation = $mysqli->query('SELECT id, firstname FROM users WHERE email ="' . $_SESSION['email'] . '"');
		$row = $confirmation->fetch_array();
		$firstname = $row['firstname'];
		$user_id = $row['id'];

		$mysqli->query("INSERT INTO orders (user_id, date, cart, total_products, total_price) VALUES ($user_id, NOW(), '$order_cart', $order_total_quantity, $order_total_price )");
	} else {
		header('Location:index.php');
	}
?>

<div class="alert alert-success mt-5" role="alert">
<h4 class="alert-heading">Merci <?= $firstname ?> votre commande est validée !</h4>
<p>Nous préparons votre commande avec soins pour la déposer au plus vite chez vous.</p>
<hr>
<p class="mb-0">Date de livraison estimée : entre le 20/02/2023 et le 27/02/2023</p>
</div>

<?php include ('includes/inc_footer.php'); ?>