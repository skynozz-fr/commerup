<?php 
    
    /**  L'utilisateur valide le formulaire */
    if (isset($_POST['submit_register'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $address = $_POST['address'];
        $zip_code = $_POST['zip_code'];
        $city = $_POST['city'];
        
        /** On vérifie que les variables ne soit pas vide */
        if ((empty($email)) OR (empty($password)) OR empty($firstname) OR empty($lastname) OR empty($address) OR empty($zip_code) OR empty($city)) {
            $message_register = "<p class='alert alert-danger'>Veuillez renseignez tout les champs pour vous inscrire.</p>";

        /** On vérifie si l'utilisateur existe déjà en bdd */
        } else {
            $register = $mysqli->query("SELECT count(id) FROM users WHERE email = '$email'"); 
            $row = $register->fetch_array();
            if ($row[0] > 0) {
                $message_register = "<p class='alert alert-danger'>Désolé cet email correspond déja a un compte.</p>";

            /** Création du compte de l'utilisateur */
            } else {
                $password_hash = password_hash($password, PASSWORD_BCRYPT); 
                if ($mysqli->query("INSERT INTO users (email, password , firstname, lastname, address, zip_code, city) VALUES ('$email', '$password_hash', '$firstname', '$lastname', '$address', '$zip_code', '$city')")) {
                    $message_register = "<p class='alert alert-success'>Votre compte a bien était créé.</p>";
                } else {
                    $message_register = "<p class='alert alert-danger'>Votre compte n'a pas était créé.</p>";
                }
            }
        }
    }
?>

<h4 class='mt-3 mb-3 text-center'>Vous n'avez pas de compte ?</h4>
<h5 class='mt-3 mb-3 text-center'>Créez en un juste ici :</h5>
<?php if (isset($message_register)) echo $message_register; ?>
<form method="post">
    <div class="mb-3">
        <label class="form-label">Adresse email :</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Mot de passe :</label>
        <input type="password" name ="password" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Prénom :</label>
        <input type="firstname" name ="firstname" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Nom :</label>
        <input type="lastname" name ="lastname" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Addresse :</label>
        <input type="address" name ="address" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Code postale :</label>
        <input type="zip_code" name ="zip_code" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Ville :</label>
        <input type="city" name ="city" class="form-control" required>
    </div>
    <button type="submit" name="submit_register" class="btn btn-primary">S'inscrire</button>
</form>