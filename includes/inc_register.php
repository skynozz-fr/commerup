<?php 
    /** 
     * Se créer un compte
     * 
     * @package: inc_register.php
     * @author: Hugo <borgne.hugo@gmail.com>
     * @since: 09/02/2023
     * @version: 1.0.0
     */

    /**  L'utilisateur valide le formulaire */
    if (isset($_POST['submit_register'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $address = $_POST['address'];
        $zip_code = $_POST['zip_code'];
        $city = $_POST['city'];
        $from = $_POST['from'];
        
        /** On vérifie que les variables ne soit pas vide */
        if (empty($email) OR empty($password) OR empty($phone) OR empty($firstname) OR empty($lastname) OR empty($address) OR empty($zip_code) OR empty($city)) {
            $message_register = "<p class='alert alert-danger'>Veuillez renseignez tout les champs pour vous inscrire.</p>";

        /** On vérifie si l'utilisateur existe déjà en bdd */
        } else {
            $register = $mysqli->query("SELECT count(id) AS total FROM users WHERE email = '$email'"); 
            $row = $register->fetch_array();
            if ($row['total'] > 0) {
                $message_register = "<p class='alert alert-danger'>Désolé cet email correspond déja a un compte.</p>";

            /** Création du compte de l'utilisateur */
            } else {
                $password_hash = password_hash($password, PASSWORD_BCRYPT); 
                if ($mysqli->query("INSERT INTO users (email, password, phone, firstname, lastname, address, zip_code, city) VALUES ('$email', '$password_hash', '$phone', '$firstname', '$lastname', '$address', '$zip_code', '$city')")) {
                    $message_register = "<p class='alert alert-success'>Votre compte a bien était créé.</p>";
                    
                    /** On connecte l'utilisateur */
                    $_SESSION['email'] = $email;
                    
                    /** On redirige l'utilisateur en prennant compte de sa provenance */
                    if($from == 'panier') {
                        header('Location:order.php');
                    } else {
                        header('Location:index.php');
                    }
                } else {
                    $message_register = "<p class='alert alert-danger'>Votre compte n'a pas était créé.</p>";
                }
            }
        }
    }
?>

<h3 class='fw-bold mt-3 mb-3'>Pas encore de compte ?</h3>
<h5 class='mt-3 mb-3'>No problem, remplie les cases...</h5>
<?php if (isset($message_register)) echo $message_register; ?>
<form method="post">
    <div class="form-floating mb-3">
        <input type="email" name="email" class="form-control" placeholder="Adresse email" required>
        <label>Adresse email</label>
    </div>
    <div class="form-floating mb-3">
        <input type="password" name="password" class="form-control" placeholder="Mot de passe" required>
        <label>Mot de passe</label>
    </div>
    <div class="form-floating mb-3">
        <input type="tel" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" name="phone" class="form-control" placeholder="Téléphone" required>
        <label>Télephone</label>
    </div>
    <div class="row">
        <div class="col-6 mb-3">
            <div class="form-floating">
                <input type="firstname" name="firstname" class="form-control" placeholder="Prénom" required>
                <label>Prénom</label>
            </div>
        </div>
        <div class="col-6 mb-3">
            <div class="form-floating">
                <input type="lastname" name="lastname" class="form-control" placeholder="Nom" required>
                <label>Nom</label>
            </div>
        </div>
    </div>
    <div class="form-floating mb-3">
        <input type="address" name="address" class="form-control" placeholder="Adresse" required>
        <label>Adresse</label>
    </div>
    <div class="row">
        <div class="col-4 mb-3">
            <div class="form-floating">
                <input type="zip_code" name="zip_code" class="form-control" placeholder="Code postal" required>
                <label>Code postal</label>
            </div>
        </div>
        <div class="col-8">
            <div class="form-floating">
                <input type="city" name="city" class="form-control" placeholder="Ville" required>
                <label>Ville</label>
            </div>
        </div>
    </div>
    <button type="submit" name="submit_register" class="btn btn-outline-dark">S'inscrire</button>
</form>