<?php
include('utils/db.php');
include('models/game.php');
include('models/butin.php');

if (isset($_POST['post-Add-Game'])) {
  addGame::addGame($pdo, $_POST);
}

if (isset($_POST['post-Add-Butin'])) {
  butin::butinAdd($pdo, $_POST);
}

$resultsGame = selectGame::Game($pdo);
?>
<div class="box-container">

  <div class="container-Form-Game">
    <form action="index.php?page=admin/butin-game" method="POST">
      <div>
        <label for="">Nom du Jeux</label>
        <input type="text" name="add-Game" required>
      </div>

      <div>
        <button type="submit" name="post-Add-Game">Envoyer</button>
      </div>
    </form>
  </div>

  <div class="container-Form-Butin">
    <form action="index.php?page=admin/butin-game" method="POST">
      <div>
        <label for="">Nom du Gain</label>
        <input type="text" name="butinName" required>
      </div>

      <div>
        <label for="">Description</label>
        <input type="text" name="butinDescription" required>
      </div>

      <div>
        <select name="butinRanking">
          <option value="1">Rang 1</option>
          <option value="2">Rang 2</option>
          <option value="3">Rang 3</option>
        </select>
      </div>

      <div>
        <select name="id_NameGame">
          <option>Choisissez un jeu</option>
          <?php foreach ($resultsGame as $resultgame) { ?>
          <option value="<?php echo $resultgame["ID_JEU"] ?>"><?php echo $resultgame['titre_Jeu'];
                                                              } ?></option>
        </select>
      </div>

      <div>
        <button type="submit" name="post-Add-Butin">Envoyer</button>
      </div>
    </form>
  </div>


</div>