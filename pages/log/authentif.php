<form action="index.php?page=log/connexion" method="post">
  <div class="container-form-log">
    <div class="container-label-input">
      <label for="" class="h5">Email</label>
      <input class="alert-Input" type="email" name="email" require pattern="^[^@\s]+@[^@\s]+\.[^@\s]+$">
    </div>

    <div class="container-label-input">
      <label for="" method="post" class="h5">Mot de passe</label>
      <input class="alert-Input" type="password" name="password">
    </div>
    <?php
    // if (isset($_SESSION["Connexion"]) && $_SESSION["Connexion"] == 0) {
    //     echo "<p>Identifiant ou mot de passe incorrect</p>";
    // }
    ?>
    <div class="container-button">
      <button name="login">Connexion</button>
    </div>

    <div class="password-forgot">
      <a href="index.php?page=passwordForgot">Mot de passe oublié?</a>
    </div>
  </div>
</form>