-- Database: yakinperabot_db
-- Untuk Laragon
-- Dibuat ulang setelah database korup

-- Hapus database jika sudah ada (hati-hati!)
-- DROP DATABASE IF EXISTS yakinperabot_db;

-- Buat database baru
CREATE DATABASE IF NOT EXISTS yakinperabot_db CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

-- Gunakan database
USE yakinperabot_db;

-- Tabel Admin
CREATE TABLE IF NOT EXISTS admin (
    aid INT(11) NOT NULL AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    aname VARCHAR(100) NOT NULL,
    atelp VARCHAR(20) NOT NULL,
    aemail VARCHAR(100) NOT NULL,
    aaddress TEXT NOT NULL,
    PRIMARY KEY (aid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabel Category (Kategori)
CREATE TABLE IF NOT EXISTS category (
    cid INT(11) NOT NULL AUTO_INCREMENT,
    cname VARCHAR(100) NOT NULL,
    PRIMARY KEY (cid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabel Product (Produk)
CREATE TABLE IF NOT EXISTS product (
    pid INT(11) NOT NULL AUTO_INCREMENT,
    cid INT(11) NOT NULL,
    pname VARCHAR(200) NOT NULL,
    pprice DECIMAL(15,2) NOT NULL,
    pdescription TEXT,
    pimage VARCHAR(255) NOT NULL,
    pstatus TINYINT(1) NOT NULL DEFAULT 1,
    pcreated TIMESTAMP NULL DEFAULT NULL,
    PRIMARY KEY (pid),
    KEY cid (cid),
    CONSTRAINT product_ibfk_1 FOREIGN KEY (cid) REFERENCES category (cid) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Tabel Customer (Pelanggan)
CREATE TABLE IF NOT EXISTS customer (
    cusid INT(11) NOT NULL AUTO_INCREMENT,
    cusname VARCHAR(100) NOT NULL,
    cusaddress TEXT NOT NULL,
    custelp VARCHAR(20) NOT NULL,
    PRIMARY KEY (cusid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert data admin default
-- Username: admin
-- Password: admin (MD5: 21232f297a57a5a743894a0e4a801fc3)
INSERT INTO admin (aid, username, password, aname, atelp, aemail, aaddress) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', '081234567890', 'admin@yakinperabot.com', 'Jl. Contoh No. 123, Kota Payakumbuh');

-- Insert beberapa kategori contoh
INSERT INTO category (cid, cname) VALUES
(1, 'Kursi'),
(2, 'Meja'),
(3, 'Lemari'),
(4, 'Kamar Set'),
(5, 'Rak');
