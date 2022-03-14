<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
//fonction qui renvoie le nom de la page courante
function getPageCourante()
{
    //page par défaut
    $page = "home";
    if (isset($_GET['page'])) {
        //si le nom de la page est contenu dans l'URL
        $page =  $_GET['page'];
    }
    return $page;
}
//fonction qui renvoie la chaine active si le lien correspond à la page
//sur laquelle l'utilisateur se trouve.
function getActive($pageLien)
{
    $pageC = getPageCourante();
    if ($pageLien == $pageC) {
        //si le nom du lien de la page de la barre de navigation est le même que la page
        //sur laquelle l'utilisateur est, le lien doit être actif
        return "active";
    } else {
        return "";
    }
}
//Fonction pour check tout les utilisateurs avec
function getUtilisateur_And_Update()
{
    include('./utils/db.php');
    $stmt = $pdo->prepare("SELECT nombre_Tentative, date_Tentative FROM Utilisateurs");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $update_Time = ((new DateTime($result['date_Tentative']))->add(new DateInterval('PT900S')))->format("Y-m-d H:i:s");

    if (isset($_SESSION) && $result["nombre_Tentative"] >= 3 && date("Y-m-d H:i:s") >= $update_Time) {
        $stmt_nb_tentative = $pdo->prepare("UPDATE Utilisateurs 
                                    SET nombre_Tentative = NULL, date_Tentative=CURRENT_TIMESTAMP ");
        $stmt_nb_tentative->execute();
    }
}