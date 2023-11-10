<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PC Arena | Izmjeni kategoriju</title>
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
    session_start();
    include('login-check.php');
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM tbl_kategorije WHERE id = $id";
        $conn = mysqli_connect('localhost', 'root', '') or die(mysqli_error($conn));
        $db_select = mysqli_select_db($conn, 'pc_shop') or (mysqli_error($conn));
        $rezultat = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $brojredova = mysqli_num_rows($rezultat);
        if ($brojredova == 1) {
            $row = mysqli_fetch_assoc($rezultat);
            $nazivkategorije = $row['naziv'];
            $trenutnafoto = $row['foto_naziv'];
            $aktivno = $row['objavljeno'];
            $objavljeno = $row['aktivno'];
        } else {
            $_SESSION['no-category-found'] = 'Greška! Kategorija nije pronađena.';
            header('location:http//localhost/pcshop/admin/manage-categories.php');
        }
    } else {
        header('location:http//localhost/pcshop/admin/manage-categories.php');
    }
    ?>

    <!-- Form Update Category -->
    <form style="width: 550px" action="" method="POST" enctype="multipart/form-data">
        <br><br>
        <div class="text-input">
            <label>Naziv kategorije:</label>
            <input type="text" name="nazivkategorije" value="<?php echo $nazivkategorije; ?>">
        </div>
        <div class="text-input">
            <label>Trenutna fotografija:</label>
            <img src="http://localhost/pcshop/images/<?php echo $trenutnafoto; ?>" width="190px" class="filetrenutna">
        </div>
        <div class="text-input">
            <label>Nova fotografija:</label>
            <input type="file" name="foto_naziv" class="filenova" value="<?php echo $fotonaziv; ?>">
        </div>
        <div class="text-input">
            <label>Objavljena kategorija:</label>
            <div class="radio1">
                <input <?php if ($objavljeno == 'Da') {
                            echo "checked";
                        } ?> type="radio" name="objavljeno" value="Da">Da
                <input <?php if ($objavljeno == 'Ne') {
                            echo "checked";
                        } ?> type="radio" name="objavljeno" value="Ne">Ne
            </div>
        </div>
        <div class="text-input">
            <label>Aktivna kategorija:</label>
            <div class="radio2">
                <input <?php if ($aktivno == 'Da') {
                            echo "checked";
                        } ?> type="radio" name="aktivno" value="Da">Da
                <input <?php if ($aktivno == 'Ne') {
                            echo "checked";
                        } ?> type="radio" name="aktivno" value="Ne">Ne
            </div>
        </div>
        <input type="hidden" name="trenutnafoto" value="<?php echo $trenutnafoto; ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input style="width: 180px" type="submit" name="submit" value="Izmijeni kategoriju" class="center">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $nazivkategorije = $_POST['nazivkategorije'];
        $trenutnafoto = $_POST['trenutnafoto'];
        $aktivno = $_POST['objavljeno'];
        $objavljeno = $_POST['aktivno'];
        if (isset($_FILES['foto_naziv']['name'])) {
            $fotografija = $_FILES['foto_naziv']['name'];
            if ($fotografija != '') {
                $src = $_FILES['foto_naziv']['tmp_name'];
                $dest = '../images/' . $fotografija;
                $upload = move_uploaded_file($src, $dest);
                if ($upload == FALSE) {
                    $_SESSION['image-uploaded'] = 'Greška! Niste uspjeli priložiti fotografiju.';
                    header('location:http://localhost/pcshop/admin/add-category.php');
                    die();
                }
                $lokacija = '../images/' . $trenutnafoto;
                $ukloni = unlink($lokacija);
            } else {
                $fotografija = $trenutnafoto;
            }
        } else {
            $fotografija = $trenutnafoto;
        }
        $sql2 = "UPDATE tbl_kategorije SET
            naziv = '$nazivkategorije',
            foto_naziv = '$fotografija',
            objavljeno = '$objavljeno',
            aktivno = '$aktivno'
            WHERE id = $id";
        $conn = mysqli_connect('localhost', 'root', '') or die(mysqli_error($conn));
        $db_select = mysqli_select_db($conn, 'pc_shop') or (mysqli_error($conn));
        $rezultat2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
        if ($rezultat2 == TRUE) {
            $_SESSION['category-updated'] = 'Uspješno ste izmijenili kategoriju!';
            header('location:http://localhost/pcshop/admin/manage-categories.php');
        } else {
            $_SESSION['category-updated'] = 'Greška! Niste uspjeli izmijeniti kategoriju.';
            header('location:http://localhost/pcshop/admin/update-category.php');
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