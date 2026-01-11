# Panduan Instalasi Database YakinPerabot

## Cara Import Database ke Laragon

### Metode 1: Menggunakan phpMyAdmin (Paling Mudah)

1. **Pastikan Laragon sudah berjalan**
   - Buka Laragon
   - Klik tombol "Start All" untuk menjalankan Apache dan MySQL

2. **Buka phpMyAdmin**
   - Klik tombol "Database" atau "phpMyAdmin" di Laragon
   - Atau buka browser dan akses: `http://localhost/phpmyadmin`

3. **Import Database**
   - Klik tab "Import" di bagian atas
   - Klik tombol "Choose File" atau "Pilih File"
   - Pilih file `database_yakinperabot.sql` yang ada di folder project
   - Pastikan format file adalah "SQL"
   - Klik tombol "Go" atau "Kirim" di bagian bawah
   - Tunggu hingga proses import selesai

4. **Verifikasi**
   - Klik tab "Databases" di bagian kiri
   - Pastikan database `yakinperabot_db` sudah muncul
   - Klik database tersebut untuk melihat tabel-tabelnya

### Metode 2: Menggunakan MySQL Command Line

1. **Buka Terminal/Command Prompt**
   - Buka Laragon Terminal atau Command Prompt
   - Atau buka PowerShell

2. **Jalankan perintah import**
   ```bash
   mysql -u root -p < database_yakinperabot.sql
   ```
   - Jika tidak ada password, tekan Enter saja
   - Jika ada password, masukkan password MySQL

3. **Atau dengan cara ini:**
   ```bash
   mysql -u root
   ```
   Kemudian jalankan:
   ```sql
   source D:/Document/KULIAH/STT Payakumbuh/Tugas-tugas Kuliah/VS Code/PBW/221013001_AFIFATUL MAWADDAH_PBW/toko_online_yakinperabot/toko_online_yakinperabot/database_yakinperabot.sql
   ```
   (Sesuaikan path dengan lokasi file Anda)

### Metode 3: Copy-Paste Manual di phpMyAdmin

1. Buka phpMyAdmin
2. Klik tab "SQL"
3. Buka file `database_yakinperabot.sql` dengan text editor
4. Copy semua isinya
5. Paste ke textarea SQL di phpMyAdmin
6. Klik "Go" atau "Kirim"

## Informasi Login Default

Setelah database diimport, Anda bisa login dengan:

- **Username:** `admin`
- **Password:** `admin`

**PENTING:** Setelah login pertama kali, segera ubah password melalui menu Profile di dashboard!

## Struktur Database

Database ini terdiri dari 4 tabel utama:

1. **admin** - Data administrator
2. **category** - Kategori produk
3. **product** - Data produk
4. **customer** - Data pelanggan

## Troubleshooting

### Jika muncul error "Database already exists"
- Hapus database lama terlebih dahulu di phpMyAdmin
- Atau edit file SQL dan uncomment baris `DROP DATABASE IF EXISTS yakinperabot_db;`

### Jika koneksi database gagal
- Pastikan MySQL di Laragon sudah running
- Cek file `db.php` apakah konfigurasi sudah benar:
  - hostname: localhost
  - username: root
  - password: (kosong, atau sesuai setting Laragon Anda)
  - dbname: yakinperabot_db

### Jika import gagal
- Pastikan file SQL tidak korup
- Pastikan MySQL sudah running
- Cek error message di phpMyAdmin untuk detail lebih lanjut

## Catatan

- Database ini sudah termasuk data admin default dan beberapa kategori contoh
- Anda bisa menambahkan produk dan kategori baru melalui dashboard admin
- Semua data yang ada di database sebelumnya akan hilang setelah import (karena database dibuat ulang)
