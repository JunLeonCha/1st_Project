<h2 class="text-center m-5">Profil</h2>

<div class="container-profil-general">
  <div class="container-form">
    <form action="index.php?page=profil/profilUtilisateurModif" method="post">
      <div class="container-label-input">
        <label for="" method="post" class="h5">Prénom</label>
        <input type="text" name="prenom" class="" placeholder="Prenom" value="<?php echo $_SESSION['prenom'] ?>">
      </div>

      <div class="container-label-input">
        <label for="" method="post" class="h5">Nom</label>
        <input type="text" name="nom" class="" placeholder="Nom" value="<?php echo $_SESSION['nom'] ?>">
      </div>

      <div class="container-label-input">
        <label for="" method="post" class="h5">Email</label>
        <input type="email" name="email" class="" placeholder="Email" value="<?php echo $_SESSION['email'] ?>">
      </div>

      <div class="container-label-input">
        <label for="" class="h5">Téléphone</label>
        <input type="tel" name="num_Tel" class="" placeholder="+33" value="<?php echo $_SESSION['num_Tel'] ?>">
      </div>

      <div class="container-label-input">
        <label for="" class="h5">Adresse</label>
        <input type="text" name="adresse" class="" value="<?php echo $_SESSION['adresse'] ?>">
      </div>
      <div class="container-label-input">
        <label for="" class="h5">Code postal</label>
        <input type="text" name="cde_Postal" class="" value="<?php echo $_SESSION['cde_Postal'] ?>">
      </div>
      <div class="container-label-input">
        <label for="" class="h5">Ville</label>
        <input type="text" name="ville" class="" value="<?php echo $_SESSION['ville'] ?>">
      </div>

      <div class="container-button">
        <button name="update_Profil" class="btn btn-secondary">Mettre à jour <br>Vos information</button>
      </div>
    </form>
  </div>

  <div class="container-form-2">
    <form action="index.php?page=profil/profilUtilisateurModif" method="post">
      <div class="container-label-input">
        <label for="" method="post" class="h5">Mot de passe</label>
        <input type="password" name="password" class="" placeholder="Mot de passe">
      </div>

      <div class="container-label-input">
        <label for="" class="h5">Confirmez votre mot de passe</label>
        <input type="password" name="password_confirm" placeholder="Confirmez votre Mot de passe">
      </div>

      <div class="container-button">
        <button name="update_Password" class="btn btn-secondary">Mettre à jour <br>Votre mot de
          passe</button>
      </div>
    </form>
  </div>
</div>