/****** Start 1. : Div General ******/
<div class="container-form-log">
  <form action="index.php?page=passwordForgot-next" method="post">
    <div class="container-label-input">
      <label for="">Email</label>
      <input type="email" name="email" required>
    </div>

    <div class="container-label-input">
      <label for="">Nouveau mot de passe</label>
      <input type="password" name="password" required>
    </div>

    <div class="container-label-input">
      <label for="">Confirmer nouveau mot de passe</label>
      <input type="password" name="password-confirm" require>
    </div>

    <div class="container-button">
      <button name="send">Envoyer</button>
    </div>
  </form>
</div>