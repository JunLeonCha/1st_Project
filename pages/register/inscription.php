<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// ---- Si Formulaire d'inscription est rempli correctement, affiche un tableau vide sans erreur ---- //



if (!empty($_POST)) {
  include('utils/db.php');
  include('models/inscription.php');
  $errors = array();


  // ---- Si Formulaire d'inscription n'est pas rempli correctement en fonction des conditions, affiche un tableau qui précise les erreurs. ----//

  if (empty(htmlspecialchars($_POST['nom']))) {
    $errors['nom'] = "Vous n'avez pas rempli de nom";
  }
  if (empty($_POST['prenom'])) {
    $errors['prenom'] = "Vous n'avez pas rempli de prénom";
  }
  if (empty($_POST['adresse'])) {
    $errors['adresse'] = "L'adresse n'est pas valide";
  }
  if (empty($_POST['ville'])) {
    $errors['ville'] = "Vous n'avez pas entré de ville";
  }
  if (empty($_POST['cde_Postal'])) {
    $errors['cde_Postal'] = "Vous n'avez pas entré de code Postal";
  }
  if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "votre email n'est pas valide";
  } else {
    $req = $pdo->prepare("SELECT ID_UTILISATEUR FROM Utilisateurs WHERE email =?");
    $req->execute([$_POST['email']]);
    $email = $req->fetch();
    if ($email) {
      $errors['email'] = 'Cette email est déjà enregistré.';
    }
  }

  if (empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']) {
    $errors['password'] = "Vous devez rentrer un mot de passe valide";
  }

  if (empty($errors)) {
    register::register($pdo, $_POST);
    header("Refresh:3; url=index.php?page=home"); //redirection vers le formulaire de connexion dans 3 secondes
    echo "Vous êtes maintenant enregistré! <br><br><i>Redirection en cours vers la page d'accueil...</i>";
    exit('');
  }
}
?>

<?php if (!empty($errors)) : ?>
<div class="alert-msg">
  <ul>
    <?php foreach ($errors as $error) : ?>
    <li><?= $error; ?></li>
    <?php endforeach ?>
  </ul>
</div>
<?php endif; ?>

<!-- Formulaire d'inscription -->

<form action="index.php?page=register/inscription" method="POST">
  <div class="container-form-register">
    <div class="container-label-input">
      <label for="" class="h5">Nom</label>
      <input type="text" name="nom" class="" required>
    </div>
    <div class="container-label-input">
      <label for="" class="h5">Prénom</label>
      <input type="text" name="prenom" class="" required>
    </div>
    <div class="container-label-input">
      <label for="" class="h5">Date de Naissance</label>
      <input type="date" name="birthday" class="" required>
    </div>
    <div class="container-label-input">
      <label for="" class="h5">Adresse</label>
      <input type="text" name="adresse" class="" required>
    </div>
    <div class="container-label-input">
      <label for="" class="h5">Code postal</label>
      <input type="text" name="cde_Postal" class="" required>
    </div>
    <div class="container-label-input">
      <label for="" class="h5">Ville</label>
      <input type="text" name="ville" class="" required>
    </div>
    <div class="container-label-input">
      <label for="" class="h5">Email</label>
      <input type="email" name="email" class="" required>
    </div>
    <div class="container-label-input">
      <label for="" class="h5">Téléphone</label>
      <input type="tel" name="num_Tel" class="">
    </div>
    <div class="container-label-input">
      <label for="" class="h5">Mot de passe</label>
      <input type="password" name="password" class="" required>
    </div>
    <div class="container-label-input">
      <label for="" class="h5">Confirmez votre mot de passe</label>
      <input type="password" name="password_confirm" class="" required>
    </div>
    <div class="container-button">
      <button class="register" type="submit" class="">M'inscrire</button>
    </div>
  </div>
</form>