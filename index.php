<?php

include('./common/functions.php');
// accessibilité à la session courante de l'utilisateur
session_start();
// getUtilisateur_And_Update();
getUtilisateur_And_Update();
// Affichage « de la partie haute » de votre site, commun à l'ensemble de votre site
include('./common/header.php');
// Pages autorisées : whitelist
include('./whitelist/web.php');
// Gestion de l'affichage de la page demandée
$timeSession = isset($_SESSION['timeLastAction']) ? $_SESSION['timeLastAction'] : time();
$timeCourant = time(); //nb s depuis le 01/01/70
$page = isset($_GET['page']) ? $_GET['page'] : "home";
if (
    $timeCourant - $timeSession < 1800 //1800 s = 30min
    && in_array($page, $whitelist) //accès à la page autorisée
) {
    //rafraichissement du temps de la dernière action
    $_SESSION['timeLastAction'] = $timeCourant;
    if ($page == "home") {
        session_regenerate_id(); //rafraichissement de la session ID
    }
    // include la nav, la page et le footer si simple utilisateurs
    include('./common/nav.php');
    include("pages/" . $_GET['page'] . '.php');
    include('./common/footer.php');
} elseif ( //Seconde Condition Si Administrateur veut avoir accès a ses pages
    $timeCourant - $timeSession < 1800 //1800 s = 30min
    && in_array($page, $whitelistAdmin) //accès à la page autorisée)
) {
    // Début de la condition Si administrateur
    if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) {
        //nav pour cas administrateur et sa page
        include('./common/slideBarAdmin.php');
        include("pages/" . $_GET['page'] . '.php');
    } else {
        //Sinon, si aucune des conditions n'est rempli renvoi sur la page home
        header("Location: index.php?page=home");
    }
} else {

    //si le temps d'inactivité a été dépassé, détruire la session
    //et forcer une ré authentification
    if ($timeCourant - $timeSession >= 1800) {
        session_destroy();
        session_start();
    }
    session_regenerate_id();
    //si le champ page n'est pas accessible dans l'URL OU que l'accès à la page n'est pas possible
    //renvoi vers la page home
    header("Location: index.php?page=home");
}
    // Affichage de la partie basse de votre site, commun à l'ensemble de votre site.