<?php
    error_reporting(0);
    include 'db.php';
    $kontak = mysqli_query($conn, "SELECT atelp, aemail, aaddress FROM admin WHERE aid = 1");
    $a = mysqli_fetch_object($kontak);

    $produk = mysqli_query($conn, "SELECT * FROM product WHERE pid = '".$_GET['id']."'");
    $p = mysqli_fetch_object($produk);
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

        <!--product detail-->
        <div class="section">
            <div class="container">
                <h3>Detail Produk</h3>
                <div class="box">
                    <div class="col-2">
                        <img src="produk/<?php echo $p->pimage ?>" width="100%">
                    </div>
                    <div class="col-2">
                        <h3><?php echo $p->pname ?></h3>
                        <h4>Rp. <?php echo number_format($p->pprice )?></h4>
                        <p>Deskripsi :<br>
                            <?php echo $p->pdescription ?>
                        </p>
                        <p><a href="https://api.whatsapp.com/send?phone=<?php echo $a->atelp ?>&text=Haii, Saya Tertarik dengan produk Anda." target="_blank">
                            Hubungi Kami Via Whatsapp 
                            <img src="img/iconwa.png" width="50px"></a>
                        </p>
                    </div>
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