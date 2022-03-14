<?php
class butin
{
  public static function butinAdd($pdoP, $values)
  {
    try {
      $stmtAddButin = $pdoP->prepare("INSERT INTO butins (nom_Butin, detail_Butin, Rang_Butin, ID_JEU) VALUES(?,?,?,?)");
      $stmtAddButin->execute([$values['butinName'], $values["butinDescription"], $values["butinRanking"], $values['id_NameGame']]);
      return true;
    } catch (PDOException $e) {
      return false;
    }
  }
}