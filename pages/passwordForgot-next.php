<?php
include('utils/db.php');

if (isset($_POST)) {
  $stmt = $pdo->prepare("SELECT * FROM Utilisateurs WHERE email = ?");
  $stmt->execute([$_POST["email"]]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  if (isset($_POST["email"]) == $result["email"] && $_POST['password'] == $_POST["password-confirm"]) {
    $stmtNewPass = $pdo->prepare("UPDATE Utilisateurs SET password = ? WHERE email = ?");
    $stmtNewPass->execute([password_hash($_POST["password"], PASSWORD_DEFAULT), $_POST["email"]]);
    echo "Mot de passe changé avec succès";
  } else {
    echo "Adresse email inconnue, ou Erreur Mot de passe : non confirmé";
  }
}