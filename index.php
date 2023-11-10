<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PC Arena | Početna</title>
  <!-- Google Font Titillium Web -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <!-- Navigation Bar -->
  <nav>
    <div class="navbar">
      <span class="pcshop-title">PC Arena</span>
      <ul>
        <li><a href="index.php">Početna</a></li>
        <li><a href="categories.php">Kategorije</a></li>
        <li><a href="ponuda.php">Ponuda</a></li>
        <li><a href="#">Kontakt</a></li>
        <li><a href="admin/login.php">Prijava</a></li>
      </ul>
    </div>
  </nav>

  <!-- Search Bar -->
  <div class="container-searchbar">
    <form action="search.php" method="post" class="search-bar">
      <input type="search" name="search" placeholder="Pretraži ponudu" name="q">
      <button type="submit"> <i class="fa fa-search"></i> </button>
    </form>
  </div>

  <!-- Article -->
  <div id="article_container">
    <div class="article_container_img"></div>
    <div class="article_container_content">
      <div class="the">
        <div class="line"></div>
        <h4>Pretplatite se na naš newsletter</h4>
        <div class="line"></div>
      </div>
      <h1>Nvidia RTX 4090</h1>
      <div class="divider"></div>
      <p class="article">
        NVIDIA® GeForce RTX™ 4090 je ultimativni GeForce GPU. Donosi ogroman skok u performansama,
        učinkovitosti i grafici koju pokreće AI. Iskusite igranje ultra visokih performansi, nevjerojatno
        detaljne virtualne svjetove, neviđenu produktivnost i nove načine stvaranja. Pokreće ga NVIDIA Ada
        Lovelace arhitektura i dolazi s 24 GB G6X memorije za pružanje vrhunskog iskustva za igrače i kreatore.
        Overclocking stručnjak Allen 'Splave' Golibersuch likuje nakon postizanja svjetskog rekorda brzine takta
        GPU-a na GeForce RTX 4090 grafičkoj kartici. Osim postizanja stabilnog GPU takta od 3,945MHz, postignut
        je svjetski rekord GPUPi v3.3 32B rezultat.
      </p>
      <div class="btn">Saznaj više</div>
    </div>
  </div>

  <!-- Footer -->
  <footer>
    <ul class="icons">
      <li><a href="#"><ion-icon name="logo-whatsapp"></ion-icon></a></li>
      <li><a href="#"><ion-icon name="logo-facebook"></ion-icon></a></li>
      <li><a href="#"><ion-icon name="logo-instagram"></ion-icon></a></li>
    </ul>
    <ul class="menu">
      <li><a href="#">Početna</a></li>
      <li><a href="#">Kategorije</a></li>
      <li><a href="#">Ponuda</a></li>
      <li><a href="#">Kontakt</a></li>
    </ul>
    <div class="footer-copyright">
      <p>Copyright &copy; All Rights Reserved | Designed by Aleksandar Radić</p>
    </div>
  </footer>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
</body>

</html>