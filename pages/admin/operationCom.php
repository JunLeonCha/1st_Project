<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
include('utils/db.php');
include('models/operations_Commercial.php');

if (isset($_POST["delete"])) {
  operationCommercial::delete($pdo, $_POST);
}
if (isset($_POST["post-Add-Action"])) {
  if (isset($_POST["op-begin"]) && $_POST["op-begin"])
    operationCommercial::add($pdo, $_POST);
}
if (isset($_POST["post-Update-Action"])) {
  operationCommercial::update($pdo, $_POST);
}

$resultsGame = operationCommercial::selectJeux($pdo);
$resultsOp = operationCommercial::selectAll($pdo);
?>

<!-- Début de la div 1. : Div General -->
<div class="box-container">
  <?php echo "<p style='text-align:center;'>" . $resultOp["ID_JEU"] . "</p>"; ?>
  <!-- Début de la div 1.1 : Div h2 -->
  <div class="box-titre-h2-op">
    <h2 class="h2-text-center h2-bg-border-admin h2-op">Action Commercial effectué</h2>
  </div>
  <!------ Fin de la div 1.1 ------>

  <!-- Début de la div 1.2 : Div qui contient le tableau -->
  <div class="action-present">
    <table class="table-boarder-collapse-op">
      <thead class=" background-thead">
        <tr>
          <th class="">Nom des actions en cours</th>
          <th class="">Date début de l'action</th>
          <th class="">Fin de l'action</th>
          <th class="">Nom du jeu</th>
          <th class="">Accéder à la liste des lots</th>
          <th class="">Supprimer</th>
        </tr>
      </thead>
      <tbody>

        <?php
        foreach ($resultsOp as $resultOp) {
        ?>
        <tr>

          <td class="text-center"> <span class="edit-Game"><?php echo $resultOp['nom_Operation'] ?> <i
                class='bx bxs-edit-alt'>
              </i>
            </span></td>
          <td class="text-center"> <?php echo $resultOp['debut_Operation'] ?> </td>
          <td class="text-center"> <?php echo $resultOp['fin_Operation'] ?> </td>
          <td class="text-center"> <?php echo $resultOp['titre_Jeu'] ?> </td>
          <td class="text-center block-select-game">
            <!-- Formulaire Supprimer Operation -->
            <form action="index.php?page=admin/butin" method="POST" name="butin">
              <button type="submit" name="selectGame" class="selectGame"
                value="<?php echo $resultOp["ID_JEU"] ?>">Cliquez ici</button>
            </form>
          </td>
          <td class="text-center">
            <!-- Formulaire Supprimer Operation -->
            <form action="index.php?page=admin/operationCom" method="POST" name="form-delete">
              <button type="submit" name="delete" class="delete" value="<?php echo $resultOp["ID_OPERATION"] ?>"><i
                  class='bx bxs-folder-minus'></i></button>
            </form>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <!------ Fin de la div 1.2 ------>

  <?php
  ?>
  <!-- Début de la div 1.3 : Div qui contient le Formulaire Ajouter ET Modifier -->
  <div class="box-form-action-c">

    <!-- Début de la div 1.3-1 : Div qui contient le Formulaire Ajouter -->
    <div class="display-flex-h2-form">
      <h2 class="h2-text-center">Ajouter une Action</h2>
      <form action="index.php?page=admin/operationCom" method="post">
        <div class="display-grid-2col space-10px">
          <label for="">Nom de l'action :</label>
          <input type="text" name="nom-op" required>
        </div>

        <div class="display-grid-2col space-10px  ">
          <label for="">Début de l'action :</label>
          <input type="date" name="op-begin" id="dateDebut" min="<?php echo date('Y-m-d'); ?>" required>
        </div>

        <div class="display-grid-2col space-10px">
          <label for="">Fin de l'action :</label>
          <input type="date" name="end-begin" id="dateFin" min="<?php echo date('Y-m-d', strtotime('+7 day')) ?>"
            required>
        </div>

        <div class="text-center">
          <select name="addGame" id="addGame">
            <option value="">Selectionner le jeu à associer...</option>
            <?php foreach ($resultsGame as $resultgame) { ?>
            <option value="<?php echo $resultgame["ID_JEU"] ?>"><?php echo $resultgame['titre_Jeu'];
                                                                } ?></option>
          </select>
        </div>

        <div class=" box-input-center space-65px">
          <input type="submit" name="post-Add-Action">
        </div>
      </form>
    </div>
    <!------ Fin de la div 1.3-1 ------>

    <!-- Début de la div 1.3-2 : Div qui contient le Formulaire de Modification -->
    <div class="display-block-update">
      <h2 class="h2-text-center">Modifier une Action en cours</h2>
      <form action="index.php?page=admin/operationCom" method="post">
        <div class="text-center">
          <select name="modif-Op" id="modif-Op">
            <option value="">Selectionner une Action en cours...</option>
            <?php foreach ($resultsOp as $resultOp) { ?>
            <option value="<?php echo $resultOp["ID_OPERATION"] ?>"><?php echo $resultOp['nom_Operation'];
                                                                      ?></option><?php } ?>
          </select>
        </div>

        <div class="display-grid-2col space-10px">
          <label for="">Renommé l'action :</label>
          <input type="text" name="nom-op" required>
        </div>

        <div class="display-grid-2col space-10px">
          <label for="">Début de l'action :</label>
          <input type="date" name="op-begin" id="dateDebutP" required>
        </div>

        <div class="display-grid-2col space-10px">
          <label for="">Fin de l'action :</label>
          <input type="date" name="end-begin" id="dateFinP" required>
        </div>

        <div class="text-center">
          <select name="modifGame" id="modifGame">
            <option value="">Selectionner le jeu à associer...</option>
            <?php foreach ($resultsGame as $resultgame) { ?>
            <option value="<?php echo $resultgame["ID_JEU"] ?>"><?php echo $resultgame['titre_Jeu'];
                                                                } ?></option>
          </select>
        </div>

        <div class="box-input-center space-20px">
          <input type="submit" name="post-Update-Action"></input>
        </div>
      </form>
    </div>
    <!------ Fin de la Div 1.3-2 ------>
  </div>
  <!------- Fin de la Div 1.3 ------>
</div>

<!------- FIn de la Div 1. ------>