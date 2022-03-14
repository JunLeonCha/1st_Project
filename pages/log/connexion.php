<?php

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
?>

<?php

/* Connection Link */
include('utils/db.php');

/* Vérifie si le formulaire est envoyé avec le poste : $_POST['login'] */
if (isset($_POST['login'])) {

    /* Create new Var for POST*/
    $email = htmlspecialchars($_POST['email']);
    $pwd = $_POST['password'];

    /* recherche Utilisateurs depuis l'envoie du poste : POST['email'] */
    $stmt = $pdo->prepare("SELECT * FROM Utilisateurs WHERE email=?");
    $stmt->execute([$email]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    /*Création de variable, interval de temps*/
    $update_Time = ((new DateTime($result['date_Tentative']))->add(new DateInterval('PT900S')))->format("Y-m-d H:i:s");

    /* if POST, Create var: $errors 
    $errors is an empty array*/
    $errors = array();

    /* Création de variable */
    $pwdHashBD = $result['password'];

    /* Si password du formulaire est égale à password BDD */
    if (password_verify($pwd, $pwdHashBD)) {

        /* Si nombre de tentative dans la BDD supérieure ou égale à 3 et que la date (Année, Mois, Jour - Heure, Minute, Seconde ) est supérieur ou égale à la variable update_time, alors met à jour le nombre de tentative et la date de tentative à NULL */
        if ($result["nombre_Tentative"] >= 3 && date("Y-m-d H:i:s") >= $update_Time) {
            $stmt_nb_tentative = $pdo->prepare("UPDATE Utilisateurs 
                                        SET nombre_Tentative = NULL, date_Tentative=NULL
                                        WHERE email = ?");
            $stmt_nb_tentative->execute([$email]);
        }
    }
    if ($result["nombre_Tentative"] >= 3) {
        echo "<div class='alert-register'><p class='errors'>Vous avez atteint la limite de tentative de connexion, 
        <br>votre compte est temporairement vérouillé.</div>";
        die();
    }

    /*Create var*/
    if (!empty($_POST)) {

        if (empty($email)) {
            /* Si mon envoi POST email du formulaire est vide, renvoi un tableau qui affiche une erreur*/
            $errors['email'] = "Vous n'avez pas rentré D'adresse mail";
        } elseif (empty($pwd)) {
            /* Si mon envoi POST password du formulaire est vide, renvoi un tableau qui affiche une erreur*/
            $errors['password'] = "Vous n'avez pas rentré de : <br> Mot de passe";
        } elseif (!password_verify($pwd, $pwdHashBD)) {
            /* Si mon envoi POST password différent de passwordHash dans BDD    , renvoi un tableau qui affiche une erreur*/

            if ($result["nombre_Tentative"] >= 3) {
                $errors["nombre_Tentative"] = "Nombre de tentative atteints.";
                /* if, nombre_Tentative > Or = 3 then display error array for maximum attempt reach*/
            } else {
                /* else AUTO_INCREMENT [nombre_Tentative] until > Or = 3*/
                $stmt_nb_tentative = $pdo->prepare("UPDATE Utilisateurs 
                                        SET nombre_Tentative = nombre_Tentative +1, date_Tentative=CURRENT_TIMESTAMP 
                                        WHERE email = ?");
                $stmt_nb_tentative->execute([$email]);

                $errors['password-Hash'] = "<p>Votre adresse mail ou Mot de passe est invalide</p>";
            }
        }
        /* if there's no errors, connexion succed And save profil in session*/
        if (empty($errors)) {
            $_SESSION["etatConnexion"] = 1;
            $_SESSION["id"] = $result['ID_UTILISATEUR'];
            $_SESSION["prenom"] = $result['prenom'];
            $_SESSION["nom"] = $result['nom'];
            $_SESSION["date_Naissance"] = $result['date_Naissance'];
            $_SESSION["email"] = $result['email'];
            $_SESSION["num_Tel"] = $result['num_Tel'];
            $_SESSION['adresse'] = $result['adresse'];
            $_SESSION["ville"] = $result['ville'];
            $_SESSION["cde_Postal"] = $result["cde_Postal"];
            $_SESSION["num_Tel"] = $result["num_Tel"];
            $_SESSION["is_admin"] = $result["utilisateur_Admin"];
            $_SESSION["nombre_Tentative"] = $result["nombre_Tentative"];
            $_SESSION["date_Tentative"] = $result["date_Tentative"];
            $_SESSION["date_Inscription"] = $result["date_Inscription"];
            $_SESSION["password"] = $result["password"];
            $_SESSION["Connexion"] = "1";
            $_SESSION["timeLastAction"] = time();

            $stmt_nb_tentative = $pdo->prepare("UPDATE Utilisateurs 
                                        SET nombre_Tentative = NULL, date_Tentative=NULL
                                        WHERE email = ?");
            $stmt_nb_tentative->execute([$email]);

            header('Location: index.php?page=home');
        }
    }
}
?>
<?php if (!empty($errors)) : ?>
<div class="alert-register">
  <ul>
    <?php foreach ($errors as $error) : ?>
    <li><?= $error; ?></li>
    <?php endforeach;
            header('Refresh:3 url=index.php?page=authentif'); ?>
  </ul>
</div>
<?php endif; ?>