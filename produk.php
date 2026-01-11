<?php
    error_reporting(0);
    include 'db.php';
    $kontak = mysqli_query($conn, "SELECT atelp, aemail, aaddress FROM admin WHERE aid = 1");
    $a = mysqli_fetch_object($kontak);
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
                <h1><a href="index.php">YakinPerabot</a></h1>
                <ul>
                    <li><a href="produk.php">Produk</a></li>
                </ul>
            </div>
        </header>

        <!--search-->
        <div class="search">
            <div class="container">
                <form action="produk.php">
                    <input type="text" name="search" placeholder="Cari Produk" value="<?php echo $_GET['search'] ?>">
                    <input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>">
                    <input type="submit" name="cari" value="Cari">
                </form>
            </div>
        </div>

        <!--new product-->
        <div class="section">
            <div class="container">
                <h3>Produk</h3>
                <div class="box">
                    <?php
                        if ($_GET['search'] != '' || $_GET['kat'] != '') {
                            $where = "AND pname LIKE '%".$_GET['search']."%' AND cid LIKE '%".$_GET['kat']."%' ";
                        }
                        $produk = mysqli_query($conn, "SELECT * FROM product WHERE pstatus = 1 $where ORDER BY pid  DESC");
                        if (mysqli_num_rows($produk) > 0) {
                            while($p = mysqli_fetch_array($produk)){
                    ?>
                        <a href="detail-produk.php?id=<?php echo $p['pid'] ?>">
                            <div class="col-4">
                                <img src="produk/<?php echo $p['pimage'] ?>">
                                <p class="nama"><?php echo substr($p['pname'], 0, 30) ?></p>
                                <p class="harga">Rp. <?php echo number_format($p['pprice']) ?></p>
                            </div>
                        </a>
                    <?php }}else{ ?>
                        <p>Product tidak ada</p>
                    <?php } ?>
                </div>
            </div>
        </div>

        <!--footer-->
        <div class="footer">
            <div class="container">
                <h4>Alamat</h4>
                <p><?php echo $a->aaddress ?></p>

                <h4>Email</h4>
                <p><?php echo $a->aemail ?></p>

                <h4>No. HP</h4>
                <p><?php echo $a->atelp ?></p>
                <small>Copyright &copy; 2024 - YakinPerabot.</small>
            </div>
        </div>
    </body>
</html>