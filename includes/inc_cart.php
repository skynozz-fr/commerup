<?php 
    /** 
     * Fonctions de gestion du panier
     * 
     * @package: inc_cart.php
     * @author: Hugo <borgne.hugo@gmail.com>
     * @since: 03/02/2023
     * @version: 1.0.0
     */

    /** On initialise les variables de retour */
    $success = null;
    $message = null;

    /** On récupere le panier de l'utilisateur */
    if(isset($_COOKIE['cart']) && !empty($_COOKIE['cart'])) {
        $cart = unserialize($_COOKIE['cart']); 
    } else {
        $cart = null;
    }

    /** Vérifier si on a une action */
    if (isset($_POST['action'])) {

        /** L'action est un ajout au panier */ 
        if ($_POST['action'] == 'add_product_cart') {

            /** On vérifie l'id */
            if (isset($_POST['product_id'])) {
                $product_id = $_POST['product_id'];

                /** On va chercher le produit */
                $product = $mysqli->query("SELECT * FROM products WHERE id = $product_id");

                /** On vérifie si le produit existe en bdd */
                if ($product->num_rows > 0) {
                    $new_product = $product->fetch_array();

                    /** Le produit est déja présent dans le panier */  
                    if (isset($cart[$product_id])) {

                        /** On incrémente sa quantité */
                        $cart[$product_id]['quantity']++;

                    /** Le produit n'est pas dans le panier */
                    } else {

                        /** On l'ajoute */
                        $cart[$new_product['id']] = [
                            'quantity' => 1,
                            'picture' => $new_product['picture'],
                            'name' => $new_product['name'],
                            'price' => $new_product['price'],

                        ];
                    }
                    $success = true;
                    $message = "Votre produit a bien été ajouté au panier";
                    
                /** Le produit n'existe pas, on affiche un msg d'erreur */
                } else {
                    $success = false;
                    $message = "Désolé mais ce produit n'existe pas";
                }
            }

        /** L'action est la supression d'une ligne du panier */
         } elseif ($_POST['action'] == 'delete_product_cart') {

            /** On vérifie le produit et sa présence dans le panier */
            if (isset($_POST['product_id']) && isset($cart[$_POST['product_id']])) {
                unset($cart[$_POST['product_id']]);
                $success = true;
                $message = "Votre article a bien été supprimé";
            
            /** Le produit n'est pas dans le panier */
            } else {
                $success = false;
                $message = "Désolé, mais ce produit n'existe pas dans votre panier";
            }

        /** L'action est la suppression total du panier */
        } elseif ($_POST['action'] == 'delete_cart') {
            $cart = null;
            $success = true;
            $message = "Votre panier a bien été vidé";
        }
    }

    /** On initialise la quantité d'article */
    $total_quantity = 0;

    /** On stocke le panier dans un cookie pour une durée de 15 jours */
    setcookie('cart', serialize($cart), time()+1296000);

    /** On calcule la quantité d'articles présents dans le panier */
    if ($cart) {
        foreach ($cart as $id => $article) {
            $total_quantity = $total_quantity + $article['quantity'];
        } 
    }
?>