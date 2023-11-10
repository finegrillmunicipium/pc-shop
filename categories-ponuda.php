<?php
if (isset($_GET['kategorija_id'])) {
    $kategorija_id = $_GET['kategorija_id'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PC Arena | Kategorije</title>
  <!-- Google Font Titillium Web -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrifty="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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

  <!-- Ponuda -->
  <section class="interior-section-two menu-section">
    <div class="menu-list menu-list__dotted menu-list-1">
      <h2 class="menu-list__title">Ponuda</h2>
      <hr class="separator">
      <ul class="menu-list__items">
        <?php
                $sql = "SELECT * FROM tbl_ponuda WHERE kategorija_id = $kategorija_id";
                $conn = mysqli_connect('localhost', 'root', '') or die(mysqli_error($conn));
                $db_select = mysqli_select_db($conn, 'pc_shop') or (mysqli_error($conn));
                $rezultat = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                $brojredova = mysqli_num_rows($rezultat);
                if ($brojredova > 0) {
                    while ($row = mysqli_fetch_assoc($rezultat)) {
                        $id = $row['id'];
                        $naziv = $row['naziv'];
                        $opis = $row['opis'];
                        $cijena = $row['cijena'];
                ?>
        <li class="menu-list__item">
          <h4 class="menu-list__item-title">
            <span class="item_title">
              <?php echo $naziv; ?>
            </span>
            <div class="btn-menu"><a href="order.php?artikal_id=<?php echo $id; ?>">Naruči</a></div>
          </h4>
          <p class="menu-list__item-desc">
            <span class="desc__content"></span>
          </p>
          <p>
            <?php echo $opis; ?>
          </p>
          <p></p>
          <span class="menu-list__item-price">
            <p>
              <?php echo $cijena; ?> KM
            </p>
          </span>
        </li>
        <?php
                    }
                }
                ?>
      </ul>
    </div>
  </section>

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