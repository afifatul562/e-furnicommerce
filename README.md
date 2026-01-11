# E-FurniCommerce - Toko Online Furniture

Website toko online furniture berbasis PHP dengan sistem CRUD untuk mengelola produk, kategori, dan pelanggan.

## Fitur

- 🏠 Halaman utama dengan produk terbaru dan kategori
- 🔍 Pencarian produk
- 📦 Manajemen produk (CRUD)
- 📂 Manajemen kategori
- 👥 Manajemen pelanggan
- 🔐 Sistem login admin
- 📱 Responsive design

## Instalasi

1. Clone repository ini
2. Import database dari file `database_yakinperabot.sql` ke MySQL
3. Copy `db.php.example` menjadi `db.php` dan sesuaikan konfigurasi database:
   ```php
   $hostname = 'localhost';
   $username = 'root';
   $password = '';
   $dbname = 'yakinperabot_db';
   ```
4. Pastikan folder `produk/` dapat ditulis (untuk upload gambar produk)
5. Akses website melalui browser

## Struktur Database

Lihat file `database_yakinperabot.sql` untuk struktur database lengkap.

## Teknologi

- PHP
- MySQL
- HTML/CSS
- JavaScript

## Lisensi

Copyright © 2024 - E-FurniCommerce
