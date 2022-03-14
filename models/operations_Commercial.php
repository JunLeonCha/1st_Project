<?php
class operationCommercial
{
  public static function delete($pdoP, $values)
  {
    try {
      $stmtDel = $pdoP->prepare("DELETE FROM Operations WHERE ID_OPERATION  = ?");
      $stmtDel->execute([$values["delete"]]);
      return true;
    } catch (PDOException $e) {
      return false;
    }
  }

  public static function add($pdoP, $values)
  {
    try {
      $dateBegin = date('Y-m-d', strtotime($values["op-begin"]));
      $dateEnd = date('Y-m-d', strtotime($values["end-begin"]));
      /****** Start if, 1.1 : Si Le nom de l'opération est vide envoie une erreur  ******/

      $stmtAdd = $pdoP->prepare("INSERT INTO Operations (nom_Operation, debut_Operation ,fin_Operation, ID_JEU, statut_Operation ) VALUES(?,?,?,?,1)");
      $stmtAdd->execute([$values["nom-op"], $dateBegin, $dateEnd, $values["addGame"]]);
      return true;
    } catch (PDOException $e) {
      return false;
    }
  }

  public static function update($pdoP, $values)
  {
    try {
      $dateBegin = date('Y-m-d', strtotime($values["op-begin"]));
      $dateEnd = date('Y-m-d', strtotime($values["end-begin"]));
      /****** Start if, 1.1 : Si Le nom de l'opération est vide envoie une erreur  ******/

      $stmtUpdate = $pdoP->prepare("UPDATE Operations SET nom_Operation = ? , debut_Operation = ? , fin_Operation = ?, ID_JEU = ? WHERE ID_OPERATION = ?");
      /****** Execute la requête préparé dans la BDD******/
      $stmtUpdate->execute([$values["nom-op"], $dateBegin, $dateEnd, $values["modifGame"], $values["modif-Op"]]);
      return true;
    } catch (PDOException $e) {
      return false;
    }
  }
  public static function selectAll($pdoP)
  {
    $stmtOp = $pdoP->prepare("SELECT operations.*, jeux.titre_Jeu
    FROM operations
    INNER JOIN jeux ON jeux.ID_JEU = operations.ID_JEU");
    $stmtOp->execute();
    return $stmtOp->fetchAll(PDO::FETCH_ASSOC);
  }
  public static function selectJeux($pdoP)
  {
    $stmtGame = $pdoP->prepare("SELECT * FROM Jeux");
    $stmtGame->execute();
    return $stmtGame->fetchAll(PDO::FETCH_ASSOC);
  }
}