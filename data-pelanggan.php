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
                <h3>Data Pelanggan</h3>
                <div class="box">
                    <p><a href="tambah-pelanggan.php">Tambah Data</a></p>
                    <table border="1" cellspacing="0" class="table">
                        <thead>
                            <tr>
                                <th width="60px">No</th>
                                <th>Nama Pelanggan</th>
                                <th>Alamat</th>
                                <th>No Handphone</th>
                                <th width="150px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                $pelanggan = mysqli_query($conn, "SELECT * FROM customer ORDER BY cusid DESC");
                                if (mysqli_num_rows($pelanggan) > 0) {
                                while ($row = mysqli_fetch_array($pelanggan)) {
                            ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['cusname'] ?></td>
                                <td><?php echo $row['cusaddress'] ?></td>
                                <td><?php echo $row['custelp'] ?></td>
                                <td>
                                    <a href="edit-pelanggan.php?id=<?php echo $row['cusid'] ?>">Edit</a> || <a href="
                                    proses-hapus.php?idpel=<?php echo $row['cusid'] ?>" onclick="return confirm('Yakin ingin dihapus?')" >Hapus</a> 
                                </td>
                            </tr>
                            <?php }}else{ ?>
                                <tr>
                                    <td colspan="5">Tidak ada data</td>
                                </tr>
                                <?php } ?>
                        </tbody>
                    </table>
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