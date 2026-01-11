<?php
    session_start();
    include 'db.php';
    if ($_SESSION['status_login'] != true) {
        echo '<script>window.location="login.php"</script>';
    }

    $pelanggan = mysqli_query($conn, "SELECT * FROM customer WHERE cusid = '".$_GET['id']."' ");
    if (mysqli_num_rows($pelanggan) == 0) {
        echo '<script>window.location="data-pelanggan.php"</script>';
    }
    $c = mysqli_fetch_object($pelanggan);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, initial-scale=1">
        <title>YakinPerabot</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    </head>
    <body>
        <!--header-->
        <header>
            <div class="container">
                <h1><a href="dashboard.php">YakinPerabot</a></h1>
                <ul>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="data-kategori.php">Data Kategori</a></li>
                    <li><a href="data-produk.php">Data Produk</a></li>
                    <li><a href="data-pelanggan.php">Data Pelanggan</a></li>
                    <li><a href="keluar.php">Keluar</a></li>
                </ul>
            </div>
        </header>
        <!--content-->
        <div class="section">
            <div class="container">
                <h3>Edit Data Pelanggan</h3>
                <div class="box">
                    <form action="" method="POST">
                        <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?php echo $c->cusname ?>" required>
                        <input type="text" name="alamat" placeholder="Alamat" class="input-control" value="<?php echo $c->cusaddress ?>" required>
                        <input type="text" name="hp" placeholder="No Handphone" class="input-control" value="<?php echo $c->custelp ?>" required>
                        <input type="submit" name="submit" value="Submit" class="btn">
                    </form>
                    <?php
                        if (isset($_POST['submit'])) {
                            $nama = ucwords($_POST['nama']);
                            $alamat = ucwords($_POST['alamat']);
                            $hp = $_POST['hp'];

                            $update = mysqli_query($conn, "UPDATE customer SET
                                                    cusname =  '".$nama."',
                                                    cusaddress =  '".$alamat."',
                                                    custelp =  '".$hp."'
                                                    WHERE cusid  = '".$c->cusid."' ");
                            
                            if ($update) {
                                echo '<script>alert("Edit data berhasil")</script>';
                                echo '<script>window.location="data-pelanggan.php"</script>';
                             }else {
                                echo 'gagal'.mysqli_error($conn);
                             }
                        }
                        
                    ?>
                </div>
            </div>
        </div>
        <!--footer-->
        <footer>
        <div class="container">
            <small>Copyright &copy; 2024 - YakinPerabot.</small>
        </div>
        </footer>
    </body>
</html>