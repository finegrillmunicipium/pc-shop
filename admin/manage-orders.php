<?php
session_start();
include('login-check.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PC Arena | Upravljaj narudžbama</title>
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

    <!-- Orders Table -->
    <div style="width: 90%" class="main-content">
        <h3>Lista narudžbi</h3>
        <br>
        <?php
        if (isset($_SESSION['order-updated'])) {
            echo $_SESSION['order-updated'];
            unset($_SESSION['order-updated']);
        }
        ?>
        <table>
            <tr>
                <td>Redni broj</td>
                <td>Naziv</td>
                <td>Cijena</td>
                <td>Količina</td>
                <td>Ukupno</td>
                <td>Status</td>
                <td>Ime i prezime kupca</td>
                <td>Email kupca</td>
                <td>Telefon kupca</td>
                <td>Adresa kupca</td>
                <td>Opcije</td>
            </tr>
            <tr></tr>
            <?php
            $sql = "SELECT * FROM tbl_narudzba ORDER BY id DESC";
            $conn = mysqli_connect('localhost', 'root', '') or die(mysqli_error($conn));
            $db_select = mysqli_select_db($conn, 'pc_shop') or die(mysqli_error($conn));
            $rezultat = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            $brojredova = mysqli_num_rows($rezultat);
            $rednibroj = 1;
            if ($brojredova > 0) {
                while ($row = mysqli_fetch_assoc($rezultat)) {
                    $id = $row['id'];
                    $artikal = $row['artikal'];
                    $cijena = $row['cijena'];
                    $kolicina = $row['kolicina'];
                    $ukupno = $row['ukupno'];
                    $status = $row['status'];
                    $ime_prezime_kupca = $row['ime_prezime_kupca'];
                    $email_kupca = $row['email_kupca'];
                    $telefon_kupca = $row['telefon_kupca'];
                    $adresa_kupca = $row['adresa_kupca'];
            ?>
                    <tr>
                        <td><?php echo $rednibroj++; ?></td>
                        <td><?php echo $artikal; ?></td>
                        <td><?php echo $cijena; ?></td>
                        <td><?php echo $kolicina; ?></td>
                        <td><?php echo $ukupno; ?></td>
                        <td><?php echo $status; ?></td>
                        <td><?php echo $ime_prezime_kupca; ?></td>
                        <td><?php echo $email_kupca; ?></td>
                        <td><?php echo $telefon_kupca; ?></td>
                        <td><?php echo $adresa_kupca; ?></td>
                        <td>
                            <a href="update-order.php?id=<?php echo $id; ?>" class="btn-update">Izmijeni narudžbu</a>
                        </td>
                    </tr>
            <?php
                }
            } else {
            }
            ?>
        </table>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>