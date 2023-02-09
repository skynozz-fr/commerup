<?php
    /** 
     * Se connecter
     * 
     * @package: inc_login.php
     * @author: Hugo <borgne.hugo@gmail.com>
     * @since: 09/02/2023
     * @version: 1.0.0
     */

    /** L'utilisateur cherche a se connecter */
    if (isset($_POST['submit_login'])) {
        $user_input_email = $_POST['user_input_email'];
        $user_input_password = $_POST['user_input_password'];
        $from = $_POST['from'];

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
                
                /** Le mdp est correct */
                if (password_verify($user_input_password, $password)) {
                    $_SESSION['email'] = $email;
                    if ($from == 'panier') {
                        header('Location:order.php');
                    } else {
                        header('Location:index.php');
                    }
                /** Le mdp est incorrect */
                } else {
                    $message_login = "<p class='alert alert-danger'>Erreur d'identification.</p>";
                }
            }
        }
    }
?>

<h3 class='fw-bold mt-3 mb-3'>T'as déjà un compte ?</h3>
<h5 class='mt-3 mb-3'>Alors connecte toi...</h5>
<?php if (isset($message_login)) echo $message_login; ?>
<form method="post">
    <div class="form-floating mb-3">
        <input type="email" name="user_input_email" class="form-control" placeholder="Adresse email" required>
        <label>Adresse email</label>
    </div>
    <div class="form-floating mb-3">
        <input type="password" name="user_input_password" class="form-control" placeholder="Mot de passe" required>
        <label>Mot de passe</label>
    </div>
    <input type="hidden" name="from" value="<?= $_GET['from'] ?>">
    <button type="submit" name="submit_login" class="btn btn-outline-dark">Se connecter</button>
</form>