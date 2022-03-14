<?php
class register
{
  public static function register($pdoP, $values)
  {
    try {
      $birthday = date('Y-m-d', strtotime($values["birthday"]));
      $req = $pdoP->prepare("INSERT INTO Utilisateurs SET nom = ?, prenom = ?, date_Naissance = ?, adresse = ?, ville =?, cde_Postal = ?, email = ?, num_Tel = ?, password = ?");
      $req->execute([htmlspecialchars($values['nom']), htmlspecialchars($values['prenom']), $birthday, htmlspecialchars($values['adresse']), htmlspecialchars($values['ville']), htmlspecialchars($values['cde_Postal']), htmlspecialchars($values['email']), htmlspecialchars($values['num_Tel']), password_hash($values['password'], PASSWORD_DEFAULT)]);
      return true;
    } catch (PDOException $e) {
      return false;
    }
  }
}