<?php

    /** L'utilisateur est déjà connecté, on l'envoie sur l'accueil */
    if (isset($_SESSION['email'])) {
        header('Location:index.php');
    }

    /** L'utilisateur cherche a se connecter */
    if (isset($_POST['submit_login'])) {
        $user_input_email = $_POST['user_input_email'];
        $user_input_password = $_POST['user_input_password'];

        /** On vérifie les identifiants de l'utilisateur */
        if (empty($user_input_email) OR empty($user_input_password)) {
            $message_login = "<p class='alert alert-danger'>Vous devez saisir les informations demandées.</p>";
        
        /** On cherche l'utilisateur en bdd */
        } else {
            $connexion = $mysqli->query('SELECT id, email, password FROM users WHERE email = "' . $user_input_email . '"');
            $row = $connexion->fetch_array();

            /** L'utilisateur n'est pas trouvé */
            if (!isset($row['email'])) {
                $message_login = "<p class='alert alert-danger'>Erreur d'identification.</p>";

            /** On vérifie son mdp */
            } else {
                $email = $row['email'];
                $password = $row['password'];
                $id = $row['id'];
                
                /** Le mdp est correct */
                if (password_verify($user_input_password, $password)) {
                    $_SESSION['email'] = $email;
                    $_SESSION['id'] = $id;
                    header('Location:index.php');

                /** Le mdp est incorrect */
                } else {
                    $message_login = "<p class='alert alert-danger'>Erreur d'identification.</p>";
                }
            }
        }
    }
?>

<h4 class='mt-3 mb-3 text-center'>Vous avez déjà un compte ?</h4>
<h5 class='mt-3 mb-3 text-center'>Connectez vous juste ici :</h5>
<?php if (isset($message_login)) echo $message_login; ?>
<form method="post">
    <div class="mb-3">
        <label class="form-label">Adresse email :</label>
        <input type="email" name="user_input_email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label  class="form-label">Mot de passe :</label>
        <input type="password" name ="user_input_password" class="form-control" required>
    </div>
        <button type="submit" name="submit_login" class="btn btn-primary">Se connecter</button>
</form>