<div class="sidebar">
  <div class="logo_content">
    <div class="logo">
      <i class='bx bxl-visual-studio'></i>
      <div class="logo_name">My Project
        <br><span style="font-size:13px;">Tableau de Bord</span>
      </div>
    </div>
    <i class='bx bx-menu' id="btn-hamburger"></i>
  </div>
  <ul class="sidebar-Ul">
    <li>
      <a href="index.php?page=home">
        <i class='bx bx-home'></i>
        <span class="links-name">Accueil</span>
      </a>
      <span class="tooltip-lg">Accueil</span>
    </li>

    <li>
      <a class="dashboardTransition" href="index.php?page=admin/dashboard">
        <i class='bx bx-grid-alt'></i>
        <span class="links-name">Tableau de bord</span>
      </a>
      <span class="tooltip-lg">Tableau de bord</span>
    </li>

    <li>
      <a href="">
        <i class='bx bx-pie-chart-alt-2'></i>
        <span class="links-name">Statistique</span>
      </a>
      <span class="tooltip-lg">Statistique</span>
    </li>

    <li>
      <a href="index.php?page=admin/listUtilisateurs">
        <i class="bx bx-user"></i>
        <span class="links-name">Liste Utilisateurs</span>
      </a>
      <span class="tooltip-lg">Liste Utilisateurs</span>
    </li>

    <li>
      <a href="index.php?page=admin/operationCom">
        <i class='bx bx-folder-plus'></i>
        <span class="links-name">Action</span>
      </a>
      <span class="tooltip-lg">Action commercial</span>
    </li>

    <li>
      <a href="index.php?page=admin/butin-game">
        <i class='bx bx-folder'></i>
        <span class="links-name">Fichier</span>
      </a>
      <span class="tooltip-lg">Fichier</span>
    </li>
  </ul>
</div>
<script>
let btn = document.querySelector("#btn-hamburger");
let sidebar = document.querySelector(".sidebar");

btn.onclick = function() {
  sidebar.classList.toggle("active");
}
</script>