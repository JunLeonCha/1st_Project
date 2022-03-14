<?php
class profil
{
  public static function profilPersonalUpdate($pdoP, $values)
  {
    try {
      $id = $_SESSION["id"];
      $prenom = htmlspecialchars($values['prenom']);
      $nom = htmlspecialchars($values['nom']);
      $email = htmlspecialchars($values['email']);
      $num_Tel = htmlspecialchars($values['num_Tel']);
      $adresse = htmlspecialchars($values['adresse']);
      $cde_Postal = htmlspecialchars($values['cde_Postal']);
      $ville = htmlspecialchars($values['ville']);
      $stmt = $pdoP->prepare("UPDATE Utilisateurs SET prenom=?, nom=?, email = ?, num_Tel = ?, adresse = ?, cde_Postal = ?, ville = ?  WHERE ID_UTILISATEUR = ?");
      $stmt->execute([$prenom, $nom, $email, $num_Tel, $adresse, $cde_Postal, $ville, $id]);
      $_SESSION["prenom"] = $prenom;
      $_SESSION["nom"] = $nom;
      $_SESSION["email"] = $email;
      $_SESSION["num_Tel"] = $num_Tel;
      $_SESSION["adresse"] = $adresse;
      $_SESSION["cde_Postal"] = $cde_Postal;
      $_SESSION["ville"] = $ville;
      return true;
    } catch (PDOException $e) {
      return false;
    }
  }
  public static function profilPwdUpdate($pdoP, $values)
  {
    try {
      $id = $_SESSION["id"];
      $pwd = htmlspecialchars($values['password']);
      $pwd_Hash = password_hash($pwd, PASSWORD_DEFAULT);
      $stmt = $pdoP->prepare("UPDATE Utilisateurs SET password = ?  WHERE ID_UTILISATEUR = ?");
      $stmt->execute([$pwd_Hash, $id]);
      //MAJ des donner dans la session
      $_SESSION["password"] = $pwd;
      return true;
    } catch (PDOException $e) {
      return false;
    }
  }
}