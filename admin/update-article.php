<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PC Arena | Izmjeni proizvod</title>
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
        $sql2 = "SELECT * FROM tbl_ponuda WHERE id = $id";
        $conn = mysqli_connect('localhost', 'root', '') or die(mysqli_error($conn));
        $db_select = mysqli_select_db($conn, 'pc_shop') or (mysqli_error($conn));
        $rezultat2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));
        $brojredova2 = mysqli_num_rows($rezultat2);
        if ($brojredova2 == 1) {
            $row2 = mysqli_fetch_assoc($rezultat2);
            $naziv = $row2['naziv'];
            $opis = $row2['opis'];
            $cijena = $row2['cijena'];
            $kategorija = $row2['kategorija_id'];
            $aktivno = $row2['objavljeno'];
            $objavljeno = $row2['aktivno'];
        } else {
            $_SESSION['no-article-found'] = 'Greška! Proizvod nije pronađen.';
            header('location:http//localhost/pcshop/admin/manage-ponuda.php');
        }
    } else {
        header('location:http//localhost/pcshop/admin/manage-ponuda.php');
    }
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $naziv = $_POST['nazivartikla'];
        $opis = $_POST['opis'];
        $cijena = $_POST['cijena'];
        $kategorija = $_POST['kategorija'];
        $aktivno = $_POST['objavljeno'];
        $objavljeno = $_POST['aktivno'];
        $sql3 = "UPDATE tbl_ponuda SET
            naziv = '$naziv',
            opis = '$opis',
            cijena = '$cijena',
            kategorija_id = '$kategorija',
            objavljeno = '$objavljeno',
            aktivno = '$aktivno'
            WHERE id = $id";
        $conn = mysqli_connect('localhost', 'root', '') or die(mysqli_error($conn));
        $db_select = mysqli_select_db($conn, 'pc_shop') or (mysqli_error($conn));
        $rezultat3 = mysqli_query($conn, $sql3) or die(mysqli_error($conn));
        if ($rezultat3 == TRUE) {
            $_SESSION['article-updated'] = 'Uspješno ste izmijenili proizvod!';
            header('location:http://localhost/pcshop/admin/manage-ponuda.php');
        } else {
            $_SESSION['article-updated'] = 'Greška! Niste uspjeli izmijeniti proizvod.';
            header('location:http://localhost/pcshop/admin/update-article.php');
        }
    }
    ?>

    <!-- Form Add Category -->
    <form style="width: 550px" action="" method="POST" enctype="multipart/form-data">
        <br><br>
        <div class="text-input">
            <label>Naziv:</label>
            <input type="text" name="nazivartikla" value="<?php echo $naziv; ?>">
        </div>
        <div class="text-input">
            <label>Opis:</label>
            <textarea style="margin-left: 115px" name="opis"><?php echo $opis; ?></textarea>
        </div>
        <div class="text-input">
            <label>Cijena:</label>
            <input style="margin-left: 103px" type="num" name="cijena" value="<?php echo $cijena; ?>">
        </div>
        </div>
        <div class="text-input">
            <label>Odaberite kategoriju:</label>
            <select style="margin-left: 12px" name="kategorija">
                <?php
                $sql = "SELECT * FROM tbl_kategorije WHERE aktivno = 'Da'";
                $conn = mysqli_connect('localhost', 'root', '') or die(mysqli_error($conn));
                $db_select = mysqli_select_db($conn, 'pc_shop') or (mysqli_error($conn));
                $rezultat = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                $brojredova = mysqli_num_rows($rezultat);
                if ($brojredova > 0) {
                    while ($row = mysqli_fetch_assoc($rezultat)) {
                        $kategorijaid = $row['id'];
                        $kategorijanaziv = $row['naziv'];
                ?>
                        <option <?php if ($kategorija == $kategorijaid) {
                                    echo "selected";
                                } ?> value="<?php echo $kategorijaid; ?>"><?php echo $kategorijanaziv; ?></option>;
                    <?php
                    }
                } else {
                    ?>
                    echo "<option value='0'>Kategorija nije pronađena</option>";
                <?php
                }
                ?>
        </div>
        </select>
        <br><br>
        <div class="text-input">
            <label>Objavljena kategorija:</label>
            <div class="radio1">
                <input <?php if ($aktivno == 'Da') {
                            echo "checked";
                        } ?> type="radio" name="objavljeno" value="Da">Da
                <input <?php if ($aktivno == 'Ne') {
                            echo "checked";
                        } ?>type="radio" name="objavljeno" value="Ne">Ne
            </div>
        </div>
        <div class="text-input">
            <label>Aktivna kategorija:</label>
            <div class="radio2">
                <input <?php if ($objavljeno == 'Da') {
                            echo "checked";
                        } ?> type="radio" name="aktivno" value="Da">Da
                <input <?php if ($objavljeno == 'Ne') {
                            echo "checked";
                        } ?> type="radio" name="aktivno" value="Ne">Ne
            </div>
        </div>
        </div>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input style="width: 170px" type="submit" name="submit" value="Izmijeni proizvod" class="center">
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>