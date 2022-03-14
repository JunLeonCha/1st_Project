<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('utils/db.php');

$stmtGame = $pdo->prepare("SELECT * FROM Jeux WHERE Jeux.ID_JEU = ?");
$stmtGame->execute([$_POST['selectGame']]);
$resultsGame = $stmtGame->fetchAll(PDO::FETCH_ASSOC);

$stmtButin = $pdo->prepare("SELECT butins.nom_Butin, butins.detail_Butin, butins.Rang_Butin, butins.ID_JEU, jeux.titre_Jeu 
FROM butins
INNER JOIN jeux ON jeux.ID_JEU=butins.ID_JEU
WHERE butins.ID_JEU = ?");
$stmtButin->execute([$_POST['selectGame']]);
$resultsButin = $stmtButin->fetchAll(PDO::FETCH_ASSOC);

// function ButinTest($pdoP, $value)
// {
//   $stmtButinTest = $pdoP->prepare("SELECT butins.nom_Butin, butins.detail_butin FROM butins WHERE butins.ID_JEU = ? ");
//   $stmtButinTest->execute([$value['selectGame']]);
//   return $stmtButinTest->fetchAll(PDO::FETCH_ASSOC);
// }

if (isset($_POST['selectGame'])) {
?>
<div class='box-container'>
  <div class='action-present'>
    <?php foreach ($resultsGame as $resultGame) {
        echo "<h2>" . $resultGame['titre_Jeu'] . "</h2>";
      } ?>
    <table class='table-boarder-collapse-op'>
      <thead class='background-thead'>
        <tr>
          <th>Libellé</th>
          <th>Détail</th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach ($resultsButin as $resultbutin) {
            echo
            "<tr>
          <th>" . $resultbutin['nom_Butin'] . "</th>
          <th>" . $resultbutin['detail_Butin'] . "</th>
        </tr>"
          ?>
      </tbody>
  </div>
</div>
<?php
          }
        } else {
          echo "<p style='text-align:center;'>Marche pas</p>";
        }