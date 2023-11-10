<?php
session_start();
include('login-check.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PC Arena | Izmjeni narudžbu</title>
    <!-- Google Font Titillium Web -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <!-- Navigation Bar -->
    <nav>
        <div class="navbar">
            <span class="pcshop-title">PC Arena</span>
            <ul>
                <li><a href="index.php">Početna</a></li>
                <li><a href="manage-admin.php">Admin</a></li>
                <li><a href="manage-categories.php">Kategorije</a></li>
                <li><a href="manage-ponuda.php">Ponuda</a></li>
                <li><a href="manage-orders.php">Narudžbe</a></li>
                <li><a href="logout.php">Odjava</a></li>
            </ul>
        </div>
    </nav>

    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM tbl_narudzba WHERE id = $id";
        $conn = mysqli_connect('localhost', 'root', '') or die(mysqli_error($conn));
        $db_select = mysqli_select_db($conn, 'pc_shop') or die(mysqli_error($conn));
        $rezultat = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $brojredova = mysqli_num_rows($rezultat);
        if ($brojredova == 1) {
            $row = mysqli_fetch_assoc($rezultat);
            $naziv = $row['artikal'];
            $cijena = $row['cijena'];
            $kolicina = $row['kolicina'];
            $status = $row['status'];
            $ime_prezime_kupca = $row['ime_prezime_kupca'];
            $email_kupca = $row['email_kupca'];
            $telefon_kupca = $row['telefon_kupca'];
            $adresa_kupca = $row['adresa_kupca'];
        }
    }
    ?>

    <!-- Form Update Order -->
    <form style="width: 600px" action="" method="POST">

        <?php
        if (isset($_SESSION['order-updated'])) {
            echo $_SESSION['order-updated'];
            unset($_SESSION['order-updated']);
        }
        ?>

        <div class="text-input">
            <label>Naziv:<?php echo $naziv; ?></label>
        </div>
        <div class="text-input">
            <label>Cijena:<?php echo $cijena; ?> KM</label>
        </div>
        <div class="text-input">
            <label>Količina:</label>
            <input type="number" name="kolicina" value=<?php echo $kolicina; ?>>
        </div>
        <div>
            <label>Status:</label>
            <select name="status">
                <option <?php if ($status == "Naručeno") {
                            echo "selected";
                        } ?> value="Naručeno">Naručeno</option>
                <option <?php if ($status == "Dostavlja se") {
                            echo "selected";
                        } ?> value="Dostavlja se">Dostavlja se</option>
                <option <?php if ($status == "Dostavljeno") {
                            echo "selected";
                        } ?>value="Dostavljeno">Dostavljeno</option>
                <option <?php if ($status == "Poništeno") {
                            echo "selected";
                        } ?> value="Poništeno">Poništeno</option>
            </select>
        </div>
        <br>
        <div class="text-input">
            <label>Ime i prezime:</label>
            <input type="text" name="imeprezime" value="<?php echo $ime_prezime_kupca; ?>">
        </div>
        <div class="text-input">
            <label>Email:</label>
            <input type="text" name="email" value="<?php echo $email_kupca; ?>">
        </div>
        <div class="text-input">
            <label>Broj telefona:</label>
            <input type="text" name="telefon" value="<?php echo $telefon_kupca; ?>">
        </div>
        <div class="text-input">
            <label>Adresa:</label>
            <input type="hidden" name="id" value=<?php echo $id; ?>>
            <input type="hidden" name="cijena" value=<?php echo $cijena; ?>>
            <input type="text" name="adresa" value="<?php echo $adresa_kupca; ?>">
        </div>
        <input style="width: 180px" type="submit" name="submit" value="Izmijeni narudžbu" class="center">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $naziv = $_POST['naziv'];
        $cijena = $_POST['cijena'];
        $kolicina = $_POST['kolicina'];
        $datum_narudzbe = date('d-m-y h:i:sa');
        $status = $_POST['status'];
        $ime_prezime_kupca = $_POST['imeprezime'];
        $email_kupca = $_POST['email'];
        $telefon_kupca = $_POST['telefon'];
        $adresa_kupca = $_POST['adresa'];
        $sql2 = "UPDATE tbl_narudzba SET 
            kolicina = $kolicina,
            ukupno = (cijena * kolicina),
            status = '$status',
            ime_prezime_kupca = '$ime_prezime_kupca',
            email_kupca = '$email_kupca',
            telefon_kupca = '$telefon_kupca',
            adresa_kupca = '$adresa_kupca'
            WHERE id = $id
            ";
        $conn = mysqli_connect('localhost', 'root', '') or die(mysqli_error($conn));
        $db_select = mysqli_select_db($conn, 'pc_shop') or (mysqli_error($conn));
        $rezultat2 = mysqli_query($conn, $sql2);
        if ($rezultat2 == TRUE) {
            $_SESSION['order-updated'] = 'Uspješno ste izmijenili narudžbu!';
            header('location:http://localhost/pcshop/admin/manage-orders.php');
        } else {
            $_SESSION['order-updated'] = 'Greška! Niste uspjeli izmijeniti narudžbu.';
            header('location:http://localhost/pcshop/admin/update-order.php');
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>