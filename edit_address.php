<?php 
    /** 
	* Page modifier son adresse
	* Affichage de la page modifier son adresse 
	* 
	* @package: edit_adress.php
	* @author: Hugo <borgne.hugo@gmail.com>
	* @since: 09/02/2023
	* @version: 1.0.0
	*/

    include ('includes/inc_header.php'); 
?>

<h3 class="mb-5 text-center"><i class="bi bi-geo-alt"></i> Modifier l'adresse</h3>

<?php 
    $email = $_SESSION['email'];

    if (isset($_POST['submit_edit'])) {
        $address_user = $_POST['address'];
        $zip_code_user = $_POST['zip_code'];
        $city_user = $_POST['city'];

        if (empty($address_user) OR empty($zip_code_user) OR empty($city_user)) {
            $message_edit = "<p class='alert alert-danger'>Vous devez remplir tout les champs pour effectuer la modification de votre adresse</p>";
        } else {
            if ($mysqli->query('UPDATE users SET address = "' . $address_user . '", zip_code = "' . $zip_code_user . '", city = "' . $city_user . '" WHERE email = "' . $email . '"')) {
                $message_edit = "<p class='alert alert-success'>Votre adresse a bien était modifié</p>";
            } else {
                $messge_edit = "<p class='alert alert-danger'>Votre adresse n'a pas était modifié</p>";
            }
        }
    }

    $edit = $mysqli->query('SELECT id, address, zip_code, city FROM users WHERE email = "' . $email . '"'); 
    $row = $edit->fetch_array();

    $address = $row['address'];
    $zip_code = $row['zip_code'];
    $city = $row['city'];
?>

<h3 class="mb-3">Modifier votre adresse</h3>
<?php if(isset($message_edit)) echo $message_edit; ?>
<form method="post">
    <div class="form-floating mb-3">
        <input type="address" name="address" value="<?= $address ?>" class="form-control" placeholder="Adresse" required>
        <label>Adresse</label>
    </div>
    <div class="row">
        <div class="col-4 mb-3">
            <div class="form-floating mb-3">
                <input type="zip_code" name="zip_code" value="<?= $zip_code ?>" class="form-control" placeholder="Code postal" required>
                <label>Code postal</label>
            </div>
        </div>
        <div class="col-8">
            <div class="form-floating mb-3">
                <input type="city" name="city" value="<?= $city ?>" class="form-control" placeholder="Ville" required>
                <label>Ville</label>
            </div>
        </div>
    </div>
    <button type="submit" name="submit_edit" class="btn btn-outline-dark">Sauvegarder</button>
</form>

<?php include ('includes/inc_footer.php'); ?>