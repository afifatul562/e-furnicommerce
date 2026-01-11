<?php
    session_start();
    include 'db.php';
    if ($_SESSION['status_login'] != true) {
        echo '<script>window.location="login.php"</script>';
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>YakinPerabot</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    </head>
    <body>
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
        <div class="section">
            <div class="container">
                <h3>Tambah Data Pelanggan</h3>
                <div class="box">
                    <form action="" method="POST">
                        <input type="text" name="nama" class="input-control" placeholder="Nama Lengkap" required>
                        <input type="text" name="alamat" class="input-control" placeholder="Alamat" required>
                        <input type="text" name="hp" class="input-control" placeholder="No Handphone" required>
                        <input type="submit" name="submit" value="Submit" class="btn">
                    </form>
                    <?php
                        if (isset($_POST['submit'])) {
                            // menampung inputan dari form & pengamanan
                            $nama   = mysqli_real_escape_string($conn, ucwords($_POST['nama']));
                            $alamat = mysqli_real_escape_string($conn, ucwords($_POST['alamat']));
                            $hp     = mysqli_real_escape_string($conn, $_POST['hp']);
                            
                            $insert = mysqli_query($conn, "INSERT INTO customer VALUES (
                                        null,
                                        '".$nama."',
                                        '".$alamat."',
                                        '".$hp."')");

                                if ($insert) {
                                    echo '<script>alert("simpan data berhasil")</script>';
                                    echo '<script>window.location="data-pelanggan.php"</script>';
                                }else {
                                    echo 'gagal'.mysqli_error($conn);
                                }
                            }
                        
                    ?>
                </div>
            </div>
        </div>
        <footer>
        <div class="container">
            <small>Copyright &copy; 2024 - YakinPerabot.</small>
        </div>
        </footer>
    </body>
</html>