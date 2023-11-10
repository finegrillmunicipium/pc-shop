<?php
session_start();
if (isset($_GET['artikal_id'])) {
    $artikal_id = $_GET['artikal_id'];
    $sql = "SELECT * FROM tbl_ponuda WHERE id = $artikal_id";
    $conn = mysqli_connect('localhost', 'root', '') or die(mysqli_error($conn));
    $db_select = mysqli_select_db($conn, 'pc_shop') or (mysqli_error($conn));
    $rezultat = mysqli_query($conn, $sql);
    $brojredova = mysqli_num_rows($rezultat);
    if ($brojredova == 1) {
        $row = mysqli_fetch_assoc($rezultat);
        $naziv = $row['naziv'];
        $cijena = $row['cijena'];
        $opis = $row['opis'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PC Arena | Narudžba</title>
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

  <!-- Order Form -->
  <form action="" method="POST">
    <?php
        if (isset($_SESSION['ordered'])) {
            echo $_SESSION['ordered'];
            unset($_SESSION['ordered']);
            die();
        }
        ?>
    <div class="text-input">
      <p>Naručujete:
        <?php echo $naziv; ?>
      </p>
      <input type="hidden" name="naziv" value="<?php echo $naziv; ?>">
    </div>
    <div class="text-input">
      <p>Cijena:
        <?php echo $cijena; ?> KM
      </p>
      <input type="hidden" name="cijena" value="<?php echo $cijena; ?>">
    </div>
    <div class="text-input">
      <label>Količina: </label>
      <input type="number" name="kolicina" value="1" required>
    </div>
    <div class="text-input">
      <label>Ime i prezime:</label>
      <input type="text" name="imeprezime">
    </div>
    <div class="text-input">
      <label>Email:</label>
      <input type="text" name="email">
    </div>
    <div class="text-input">
      <label>Broj telefona:</label>
      <input type="text" name="telefon">
    </div>
    <div class="text-input">
      <label>Adresa:</label>
      <input type="text" name="adresa">
    </div>
    <input type="submit" name="submit" value="Naruči">
  </form>
  <?php
    if (isset($_POST['submit'])) {
        $naziv = $_POST['naziv'];
        $cijena = $_POST['cijena'];
        $kolicina = $_POST['kolicina'];
        $datum_narudzbe = date('d-m-y h:i:sa');
        $status = 'Naruceno';
        $ime_prezime_kupca = $_POST['imeprezime'];
        $email_kupca = $_POST['email'];
        $telefon_kupca = $_POST['telefon'];
        $adresa_kupca = $_POST['adresa'];
        $sql2 = "INSERT INTO tbl_narudzba SET
            artikal = '$naziv', 
            cijena = $cijena,
            kolicina = $kolicina,
            ukupno = (cijena * kolicina),
            datum_narudzbe = '$datum_narudzbe',
            status = '$status',
            ime_prezime_kupca = '$ime_prezime_kupca',
            email_kupca = '$email_kupca',
            telefon_kupca = '$telefon_kupca',
            adresa_kupca = '$adresa_kupca'
            ";
        $conn = mysqli_connect('localhost', 'root', '') or die(mysqli_error($conn));
        $db_select = mysqli_select_db($conn, 'pc_shop') or (mysqli_error($conn));
        $rezultat2 = mysqli_query($conn, $sql2);
        if ($rezultat2 == TRUE) {
            $_SESSION['ordered'] = 'Željeni proizvod je uspješno naručen.';
            header('location:http://localhost/pcshop/order.php');
        } else {
            $_SESSION['ordered'] = 'Greška! Niste uspjeli izvršiti narudžbu!';
            header('location:http://localhost/pcshop/order.php');
        }
    }
    ?>

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