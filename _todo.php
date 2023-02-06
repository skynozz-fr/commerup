<?php

/***********
 * Feature 1
 ***********
 *
 *
 * @todo: Dupliquer l'évaluation 2
 * @todo: Lui créer sa base de données  
 * @todo: Header : Ajouter un lien "Register"
 * @todo: Header : Ajouter un lien "Login"
 * @todo: Header : Ajouter un lien "Logout"
 * @todo: Page : register.php (Inscription d'un utilisateur, connexion automatique si succès)
 *          - Créer une table avec les champs suivants : (users)
 *              . id
 *              . email (doit être unique)
 *              . password (doit être hashé)
 *              . firstname
 *              . lastname
 *              . address
 *              . zip_code
 *              . city
 *          - Créer un formulaire avec les champs suivants :
 *              . email (doit être unique)
 *              . password (doit être hashé)
 *              . firstname
 *              . lastname
 *              . address
 *              . zip_code
 *              . city
 * @todo: Page : login.php (Permet de connecter l'utilisateur)
 *          - Créer un formulaire les champs suivants
 *              . email (vérifier qu'il s'agit dun email réél)
 *              . password
 * @todo: Page : logout.php (Permet à l'utilisateur de se déconnecter)
 * @todo: Header : Afficher les nouveaux liens selon l'état de connexion de l'utilisateur
 *
 ***********
 * Feature 2
 ***********
 *
 * @todo: Page cart.php : Ajouter un bouton "Commander"
 * @todo: Bouton "Commander"
 *          - L'utisateur n'est pas connecté, on le redirige sur la page register.php
 *          - L'utilisateur est connecté, on le redirige sur la page de commande
 * @todo: Créer page order.php
 *          - Rappel le total d'articles dans le panier
 *          - Le prix total de la commande
 *          - Les informations de l'utilisateur indispenbsable à l'envoi de la commande
 * @todo: Page order.php
 *          - Ajouter un bouton "Valider la commande"
 *          - Le bouton aura l'action suivante :
 *              . Vider le panier
 *              . Rediriger l'utilisateur vers la page success.php
 * @todo: Page success.php (Afficher un message de succès concernant l'envoi de la commande)
 *
 ***********
 * Feature 3
 ***********
 *
 * @todo: Créer une nouvelle table mysql "orders", elle aura pour champs
 *          . id
 *          . user_id
 *          . date
 *          . cart (le panier de l'utilisateur serializé)
 *          . total_products (le nombre total d'articles)
 *          . total_price (le prix total de la commande)
 * @todo: Page order.php, le bouton "Valider la commande" doit maintenant enregistrer la commande de l'utilisateur
 *
 ***********
 * Feature 4
 ***********
 *
 * @todo: Header: Ajouter un lien "Mes commandes" si l'utilisateur est connecté, redirige vers orders.php
 * @todo: Page orders.php : Cette page doit afficher les commandes passées par l'utilisateur
 *          - Affichage sous forme de tableau
 *          - Indique la date
 *          - La quantité total d'articles
 *          - Le prix total de la commande
 *
 **********/
