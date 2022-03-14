<!DOCTYPE html>
<html lang="en">

<head>
  <title></title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="css/admin/sideBarAdminStyle.css" rel="stylesheet" />
  <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>
  <div class="container-navbar" id="slideNavbar">
    <div class="container-logo-And-name">
      <!--Logo-->
      <div class="logo">
        <i class='bx bxl-visual-studio'></i>
        <div class="name">Anjou Web Awards</div>
      </div>
    </div>
    <!--Liens-->
    <div class="container-link">
      <div class="linkNav">
        <div class="boxIcons" onclick="redirection('home')">
          <i class="bx bxs-home"></i>
        </div>
        <p class="opacitySlide" onclick="redirection('home')">Home</p>
      </div>
      <div class="linkNav">
        <div class="boxIcons" onclick="redirection('admin/dashboard')">
          <i class='bx bx-grid-alt'></i>
        </div>
        <p class="opacitySlide" onclick="redirection('admin/dashboard')">
          Dashboard
        </p>
      </div>
      <div class="linkNav">
        <div class="boxIcons" onclick="redirection('home')">
          <i class='bx bx-pie-chart-alt-2'></i>
        </div>
        <p class="opacitySlide" onclick="redirection('home')">Listing</p>
      </div>
      <div class=" linkNav">
        <div class="boxIcons" onclick="redirection('admin/listUtilisateurs')">
          <i class="bx bx-user"></i>
        </div>
        <p class="opacitySlide" onclick="redirection('admin/listUtilisateurs')">
          Utilisateurs
        </p>
      </div>
      <div class="linkNav">
        <div class="boxIcons" onclick="redirection('admin/operationCom')">
          <i class='bx bx-folder-plus'></i>
        </div>
        <p class="opacitySlide" onclick="redirection('admin/operationCom')">Action</p>
      </div>

      <div class="linkNav">
        <div class="boxIcons" onclick="redirection('admin/butin-game')">
          <i class='bx bxs-game'></i>
        </div>
        <p class="opacitySlide" onclick="redirection('admin/butin-game')">Liste Jeux </p>
      </div>
    </div>
    <div class="menu">
      <!--Menu-->
      <i class="bx bx-menu"></i>
    </div>
  </div>

  <script>
  function redirection(url) {
    window.location.href = "index.php?page=" + url;
  }

  const menu = document.querySelector(".menu");
  const opacitySlide = document.querySelectorAll(".slideNavbar");
  const logoAndName = document.querySelector(".container-logo-And-name");

  menu.addEventListener("click", () => {
    menu.classList.toggle("active");
    slideNavbar.classList.toggle("active");
    logoAndName.classList.toggle("active");
  });
  </script>
</body>

</html>