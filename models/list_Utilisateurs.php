<?php
class listUtilisateurs
{
  public static function listUtilisateurs($pdoP)
  {
    $client_Req = $pdoP->prepare("SELECT * FROM Utilisateurs");
    $client_Req->execute();
    return $client_Req->fetchAll(PDO::FETCH_ASSOC);
  }
}