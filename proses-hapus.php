<?php

    include 'db.php';

    if (isset($_GET['idk'])) {
        $delete = mysqli_query($conn, "DELETE FROM category WHERE cid = '".$_GET['idk']."' ");
        echo '<script>window.location="data-kategori.php"</script>';
    }

    if (isset($_GET['idp'])) {
        $produk = mysqli_query($conn, "SELECT pimage FROM product WHERE pid = '".$_GET['idp']."' ");
        $p = mysqli_fetch_object($produk);
        unlink('./produk/'.$p->pimage);

        $delete = mysqli_query($conn, "DELETE FROM product WHERE pid = '".$_GET['idp']."' ");
        echo '<script>window.location="data-produk.php"</script>';
    }

    if (isset($_GET['idpel'])) {
        $delete = mysqli_query($conn, "DELETE FROM customer WHERE cusid = '".$_GET['idpel']."' ");
        echo '<script>window.location="data-pelanggan.php"</script>';
    }

?>