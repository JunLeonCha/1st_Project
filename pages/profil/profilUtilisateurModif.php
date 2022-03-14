<?php
//modification en BD d'une information utilisateur
//chargement des paramètres de la BD
//récupération des valeurs des champs de formulaire
include('utils/db.php');
include('models/profil.php');
//  $pwd_Confirm = htmlspecialchars($_POST['confirm-password"']);
//  $pwd_Confirm_Hash = password_hash($pwd_Confirm, PASSWORD_DEFAULT);
// $new_pwd = ($pwd_Hash == $pwd_Confirm_Hash);
//id de l'utilisateur (clé primaire en BD)

if (isset($_POST["update_Profil"])) {
    profil::profilPersonalUpdate($pdo, $_POST);
    //MAJ des donner dans la session
    echo "<p class='text-center'>Modification de votre profil réussi<p>";
    header('refresh: 3, url=index.php?page=home');
    die();
}

if (isset($_POST['update_Password'])) {
    if (isset($_POST['password']) && $_POST['password'] == $_POST['password_confirm']) {
        profil::profilPwdUpdate($pdo, $_POST);
        echo "<p class='text-center'>Modification de votre Mot de passe éffectué<p>";
        header('refresh: 3, url=index.php?page=home');
    } else {
        echo "Votre nouveau mot de passe ne correspond pas à la confirmation du noveau mot de pase";
    }
}