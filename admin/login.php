<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PC Arena | Prijava</title>
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
            </ul>
        </div>
    </nav>

    <!-- Login Form -->
    <form style="width: 530px; margin-top: 100px; margin-bottom: 100px" action="" method="POST">
        <?php
        session_start();
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        if (isset($_SESSION['not-logged-in'])) {
            echo $_SESSION['not-logged-in'];
            unset($_SESSION['not-logged-in']);
        }
        ?>
        <br><br>
        <div class="text-input">
            <label>Korisničko ime:</label>
            <input type="text" name="korisnickoime" placeholder="Unesite korisničko ime">
        </div>
        <div class="text-input">
            <label>Lozinka:</label>
            <input type="text" name="lozinka" placeholder="Unesite lozinku">
        </div>
        <input style="width: 80px" type="submit" name="submit" value="Prijava" class="center">
    </form>

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

<?php
if (isset($_POST['submit'])) {
    $korisnickoime = $_POST['korisnickoime'];
    $lozinka = md5($_POST['lozinka']);
    $sql = "SELECT * FROM tbl_admin WHERE korisnicko_ime = '$korisnickoime' AND lozinka = '$lozinka'";
    $conn = mysqli_connect('localhost', 'root', '') or die(mysqli_error($conn));
    $db_select = mysqli_select_db($conn, 'pc_shop') or (mysqli_error($conn));
    $rezultat = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $brojredova = mysqli_num_rows($rezultat);
    if ($brojredova == 1) {
        $_SESSION['login'] = 'Uspješno ste se ulogovali!';
        $_SESSION['user'] = $korisnickoime;
        header('location:' . 'http://localhost/pcshop/admin/index.php');
    } else {
        $_SESSION['login'] = 'Greška! Neispravno korisničko ime i(li) lozinka.';
        header('location:' . 'http://localhost/pcshop/admin/login.php');
    }
}
?>