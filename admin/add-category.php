<?php
session_start();
include('login-check.php');
if (isset($_POST['submit'])) {
    $nazivkategorije = $_POST['nazivkategorije'];
    if (isset($_POST['objavljeno'])) {
        $objavljeno = $_POST['objavljeno'];
    } else {
        $objavljeno = 'Ne';
    }
    if (isset($_POST['aktivno'])) {
        $aktivno = $_POST['aktivno'];
    } else {
        $aktivno = 'Ne';
    }
    if (isset($_FILES['foto_naziv']['name'])) {
        $foto_naziv = $_FILES['foto_naziv']['name'];
        $src = $_FILES['foto_naziv']['tmp_name'];
        $dest = '../images/' . $foto_naziv;
        $upload = move_uploaded_file($src, $dest);
        if ($upload == FALSE) {
            $_SESSION['image-uploaded'] = 'Greška! Niste uspjeli priložiti fotografiju.';
            header('location:http://localhost/pcshop/admin/add-category.php');
            die();
        }
    } else {
        $foto_naziv = '';
    }
    $sql = "INSERT INTO tbl_kategorije SET naziv = '$nazivkategorije', foto_naziv = '$foto_naziv', objavljeno = '$objavljeno', aktivno = '$aktivno'";
    $conn = mysqli_connect('localhost', 'root', '') or die(mysqli_error($conn));
    $db_select = mysqli_select_db($conn, 'pc_shop') or (mysqli_error($conn));
    $rezultat = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if ($rezultat == TRUE) {
        $_SESSION['category-added'] = 'Uspješno ste dodali kategoriju!';
        header('location:' . 'http://localhost/pcshop/admin/manage-categories.php');
    } else {
        $_SESSION['category-added'] = 'Greška! Niste uspjeli dodati kategoriju.';
        header('location:' . 'http://localhost/pcshop/admin/add-category.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PC Arena | Dodaj kategoriju</title>
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

    <!-- Form Add Category -->
    <form style="width: 550px" action="" method="POST" enctype="multipart/form-data">
        <?php
        if (isset($_SESSION['image-uploaded'])) {
            echo $_SESSION['image-uploaded'];
            unset($_SESSION['image-uploaded']);
        }
        ?>
        <br><br>
        <div class="text-input">
            <label>Naziv kategorije:</label>
            <input type="text" name="nazivkategorije" placeholder="Unesite naziv kategorije">
        </div>
        <div class="text-input">
            <label>Priložite fotografiju:</label>
            <input style="margin-left: 20px" type="file" name="foto_naziv" class="file">
        </div>
        <div class="text-input">
            <label>Objavljena kategorija:</label>
            <div class="radio1">
                <input type="radio" name="objavljeno" value="Da"> Da
                <input type="radio" name="objavljeno" value="Ne"> Ne
            </div>
        </div>
        <div class="text-input">
            <label>Aktivna kategorija:</label>
            <div class="radio2">
                <input type="radio" name="aktivno" value="Da"> Da
                <input type="radio" name="aktivno" value="Ne"> Ne
            </div>
        </div>
        <input type="hidden" name="id" value="id">
        <input style="width: 170px" type="submit" name="submit" value="Dodaj kategoriju" class="center">
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