<?php
$whitelist = array('home', 'log/authentif', 'log/connexion', 'register/inscription', 'passwordForgot-next', 'profil/profil', 'profil/profilUtilisateurModif', 'test',);

if (isset($_SESSION["Connexion"]) && $_SESSION["Connexion"] == 1) {
    //la connexion a été établie
    array_push($whitelist, 'log/deconnexion');
    //déclarer des accès specifique admin
    // if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) {
    //     array_push($whitelist, 'navAdmin', 'dashboard', 'listUtilisateurs', 'operationCom');
    // }
}

$whitelistAdmin = array(
    'admin/navAdmin', 'admin/dashboard', 'admin/profilUtilisateurModif', 'admin/listUtilisateurs', 'admin/operationCom', 'admin/sendAddAction', 'admin/sendUpdateAction', 'admin/sendDeleteAction', 'admin/butin', 'admin/butin-game', 'admin/article', 'admin/testModal', 'admin/ajax'
);