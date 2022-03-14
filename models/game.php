<?php
class addGame
{
  public static function addGame($pdoP, $values)
  {
    try {
      $stmtAddGame = $pdoP->prepare("INSERT INTO jeux (titre_Jeu) VALUES (?)");
      $stmtAddGame->execute([$values['add-Game']]);
      return true;
    } catch (PDOException $e) {
      return false;
    }
  }
}

class selectGame
{
  public static function Game($pdoP)
  {
    try {
      $stmtGame = $pdoP->prepare("SELECT * FROM Jeux");
      $stmtGame->execute();
      return $stmtGame->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return false;
    }
  }
}