<?php
include('utils/db.php');
include('models/list_Utilisateurs.php');
$client_Results = listUtilisateurs::listUtilisateurs($pdo);
$_age = floor((time() - strtotime($_SESSION["date_Naissance"])) / 31556926);
?>

<!-- Début de la div 1. : Div General -->
<div class="box-container">
  <!-- Début de la div 1.1 : Div tableau -->
  <div class="table-overflow-user">
    <h2 class="h2-text-center h2-bg-border-admin h2-users">Liste Utilisateur</h2>
    <!-- tableau -->
    <table class="table-boarder-collapse-users">
      <!-- Entête du tableau -->
      <thead>
        <tr class="background-thead">
          <th class="text-center">ID</th>
          <th class="text-center">Prenom, Nom</th>
          <th class="text-center">Date Naissance</th>
          <th class="text-center">Adresse</th>
          <th class="text-center">Code Postal</th>
          <th class="text-center">Téléphone</th>
          <th class="text-center">Email</th>
          <th class="text-center">Date Inscription</th>
        </tr>
        <!-- Fin de l'entête du tableau -->
      </thead>
      <!-- Body Tableau -->
      <tbody>
        <?php
        foreach ($client_Results as $client_Result) {
          echo "<tr class=''>
                <td class='text-center'>" . $client_Result['ID_UTILISATEUR'] . "</td>
                <td class='text-center'>" . $client_Result['prenom'] . "<br>" . $client_Result['nom'] . "</td>
                <td class='text-center'>" . $client_Result['date_Naissance'] . "<br>" . $_age . " ans </td> 
                <td class='text-center'>" . $client_Result['adresse'] . "<br>" . $client_Result['ville'] . "</td>
                <td class='text-center'>" . $client_Result['cde_Postal'] . "</td>
                <td class='text-center'>" . $client_Result['num_Tel'] . "</td>
                <td class='text-center'>" . $client_Result['email'] . "</td>
                <td class='text-center'>" . $client_Result['date_Inscription'] . "</td>
                </tr>";
        }
        ?>
      </tbody>
      <!-- Fin Body Tableau -->
    </table>
    <!-- Fin du tableau -->
  </div>
  <!-- Fin de la div 1.1 : Div tableau -->
</div>
<!-- Fin de la div 1. : Div General -->