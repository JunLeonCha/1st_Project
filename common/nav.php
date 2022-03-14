<div class="header-nav">
  <!-- Début de la div : navbar-user -->
  <div class="navbar-user">
    <!-- Titre -->
    <a href="" class="navbar-branding">My Project</a>

    <!-- Liste ordonée -->
    <ul class="navbar-menu">
      <li class="navbar-item">
        <a href="index.php?page=home" class="navbar-link">
          <i class='bx bxs-home'></i>
          Accueil</a>
      </li>

      <?php
      if (isset($_SESSION['id'])) {
      ?> <li class="navbar-item">
        <a href="index.php?page=profil/profil" class="navbar-link">
          <i class='bx bxs-user-circle'></i>
          Profil</a>
      </li> <?php
              if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) { ?>
      <li class="navbar-item">
        <a href="index.php?page=admin/dashboard" class="navbar-link" id="transitionDashboard">
          <i class='bx bxs-dashboard'></i>
          Tableau de bord</a>
      </li>
      <?php } ?>
      <li class="navbar-item">
        <a href="index.php?page=log/deconnexion" class="navbar-link">
          <i class='bx bx-exit'></i>
          Déconnexion</a>
      </li>
      <?php } else { ?>

      <li class="navbar-item">
        <a href="index.php?page=register/inscription" class="navbar-link">
          <i class='bx bxs-user-plus'></i>
          S'enregistrer</a>
      </li>

      <li class="navbar-item">
        <a href="index.php?page=log/authentif" class="navbar-link">
          <i class='bx bxs-log-in-circle'></i>
          Connexion</a>
      </li>
      <?php } ?>
    </ul>
    <!-- Début de la div : menuburger -->
    <div class="hamburger">

      <span class="navbar-bar"></span>
      <span class="navbar-bar"></span>
      <span class="navbar-bar"></span>
      <!-- fin de la div : menuburger -->
    </div>
    <!-- Fin de la div: navbar-user -->
  </div>
</div>

<script>
const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".navbar-menu");

hamburger.addEventListener("click", () => {
  hamburger.classList.toggle("active");
  navMenu.classList.toggle("active");
})

document.querySelectorAll(".navbar-link").forEach(n => n.addEventListener("click", () => {
  hamburger.classList.remove("active");
  navMenu.classList.remove("active");
}))
</script>