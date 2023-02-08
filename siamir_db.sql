-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Des 2022 pada 08.03
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siamir_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dafakun`
--

CREATE TABLE `tbl_dafakun` (
  `id_akun` int(11) NOT NULL,
  `nama_akun` varchar(50) NOT NULL,
  `normal_balance` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_dafakun`
--

INSERT INTO `tbl_dafakun` (`id_akun`, `nama_akun`, `normal_balance`) VALUES
(11101, 'KAS JOGJA', ''),
(11102, 'KAS JAKARTA', ''),
(11103, 'BANK PERMATA USD', ''),
(11104, 'BANK PERMATA AUD', ''),
(11105, 'BANK PERMATA IDR', ''),
(11106, 'BANK PERMATA EURO', ''),
(11107, 'BANK DANAMON USD', ''),
(11108, 'BCA JAKARTA', ''),
(11109, 'BCA YOGYAKARTA', ''),
(11110, 'BANK NIAGA YOGYAKARTA', ''),
(11111, 'BANK NIAGA USD', ''),
(11112, 'BANK DANAMON IDR', ''),
(11113, 'BANK PERMATA GIRO OR', ''),
(11114, 'BRI YOGYAKARTA', ''),
(11115, 'BANK PERMATA POUNDSTERLING', ''),
(11116, 'BANK NIAGA GIRO', ''),
(11117, 'DEPOSITO', ''),
(11201, 'PIUTANG DAGANG', ''),
(11202, 'PIUTANG KARYAWAN', ''),
(11203, 'PIUTANG LAIN - LAIN', ''),
(11204, 'PIUTANG PPh 21 KARYAWAN', ''),
(11301, 'PERSEDIAAN BAHAN BAKU', ''),
(11302, 'PERSEDIAAN BAHAN TAMBAHAN', ''),
(11303, 'PERSEDIAAN BAHAN EMBALASE', ''),
(11304, 'PERSEDIAAN BARANG DALAM PROSES', ''),
(11305, 'PERSEDIAAN BAHAN SANITASI', ''),
(11306, 'PERSEDIAAN BARANG JADI', ''),
(11307, 'PERSEDIAAN BARANG DAGANG', ''),
(11401, 'UANG MUKA PPH PASAL 25', ''),
(11402, 'UANG MUKA PPH PASAL 22', ''),
(11403, 'UANG MUKA PPH PASAL 23', ''),
(11404, 'UANG MUKA PPN', ''),
(11405, 'UANG MUKA PPH PASAL 4 AYAT 2', ''),
(11409, 'UANG MUKA PEMBELIAN PERALATAN LABORATORIUM', ''),
(11410, 'UANG MUKA PEMBELIAN MEBEL DAN PERALAT. KANTOR', ''),
(11411, 'UANG MUKA PEMBELIAN BAHAN BAKU', ''),
(11412, 'UANG MUKA PEMBELIAN BAHAN PENOLONG', ''),
(11501, 'UANG MUKA PEMBELIAN TANAH DAN ATAU BANGUNAN', ''),
(11502, 'UANG MUKA PEMB. MESIN DAN PERLENGK. PABRIK', ''),
(11503, 'UANG MUKA PEMBELIAN KENDARAAN', ''),
(12101, 'TANAH DAN PEKARANGAN', ''),
(12102, 'HAK GUNA BANGUNAN', ''),
(12103, 'GEDUNG DAN BANGUNAN', ''),
(12104, 'AKUMULASI PENYUSUTAN GEDUNG DAN ATAU BANGUNAN', ''),
(12105, 'MESIN DAN PERALATAN PABRIK', ''),
(12106, 'AKUMULASI PENYUSUTAN GEDUNG DAN ATAU BANGUNAN', ''),
(12107, 'KENDARAAN', ''),
(12108, 'AKUMULASI PENYUSUTAN KENDARAAN', ''),
(12109, 'PERALATAN LABORATORIUM', ''),
(12110, 'AKUMULASI PENYUSUTAN PERALATAN LABORATORIUM', ''),
(12111, 'MEBEL DAN PERALATAN KANTOR', ''),
(12112, 'AKUMULASI PENYUSUTAN MEBEL DAN PERALATAN KANTOR', ''),
(21101, 'UTANG DAGANG', ''),
(21102, 'UTANG PEMBELIAN AKTIVA', ''),
(21103, 'UTANG SEWA TANAH DAN ATAU BANGUNAN', ''),
(21104, 'UTANG SEWA PERALATAN', ''),
(21105, 'UTANG BIAYA', ''),
(21199, 'UTANG LANCAR LAIN', ''),
(21201, 'UTANG PPN', ''),
(21202, 'UTANG PPh 21', ''),
(21203, 'UTANG PPh 23', ''),
(21204, 'UTANG PPh Final (4 ayat 2)', ''),
(21205, 'UTANG PPh 25', ''),
(22106, 'UTANG JANGKA PANJANG', ''),
(30101, 'MODAL SAHAM', ''),
(30201, 'LABA / RUGI', ''),
(30202, 'LABA DITAHAN', ''),
(30301, 'DIVIDEN', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_divisi`
--

CREATE TABLE `tbl_divisi` (
  `id_divisi` int(11) NOT NULL,
  `nama_divisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_divisi`
--

INSERT INTO `tbl_divisi` (`id_divisi`, `nama_divisi`) VALUES
(1, 'IT'),
(2, 'MARKETING'),
(3, 'HRD'),
(4, 'AKUNTANSI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_items`
--

CREATE TABLE `tbl_items` (
  `itemId` int(11) NOT NULL,
  `itemHeader` varchar(512) NOT NULL COMMENT 'Heading',
  `itemSub` varchar(1021) NOT NULL COMMENT 'sub heading',
  `itemDesc` text DEFAULT NULL COMMENT 'content or description',
  `itemImage` varchar(80) DEFAULT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT 0,
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedDtm` datetime DEFAULT NULL,
  `updatedBy` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_items`
--

INSERT INTO `tbl_items` (`itemId`, `itemHeader`, `itemSub`, `itemDesc`, `itemImage`, `isDeleted`, `createdBy`, `createdDtm`, `updatedDtm`, `updatedBy`) VALUES
(1, 'jquery.validation.js', 'Contribution towards jquery.validation.js', 'jquery.validation.js is the client side javascript validation library authored by Jörn Zaefferer hosted on github for us and we are trying to contribute to it. Working on localization now', 'validation.png', 0, 1, '2015-09-02 00:00:00', NULL, NULL),
(2, 'CodeIgniter User Management', 'Demo for user management system', 'This the demo of User Management System (Admin Panel) using CodeIgniter PHP MVC Framework and AdminLTE bootstrap theme. You can download the code from the repository or forked it to contribute. Usage and installation instructions are provided in ReadMe.MD', 'cias.png', 0, 1, '2015-09-02 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `NIK` int(11) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `divisi_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`id_karyawan`, `NIK`, `nama_karyawan`, `divisi_id`) VALUES
(0, 123, 'tri cahya wibawa', 1),
(0, 234, 'Fajar', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(20) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `kode_kategori` varchar(50) NOT NULL,
  `normal_balance` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`, `kode_kategori`, `normal_balance`) VALUES
(0, 'Saldo Awal', '', ''),
(1, 'Kas Masuk', 'KM', 'Debet'),
(2, 'Kas Keluar', 'KK', 'Kredit'),
(3, 'Bank Masuk', 'BM', 'Debet'),
(4, 'Bank Keluar', 'BK', 'Kredit'),
(5, 'Pelunasan Piutang Karyawan', 'PK', 'Debet');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `roleId` tinyint(4) NOT NULL COMMENT 'role id',
  `role` varchar(50) NOT NULL COMMENT 'role text'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_roles`
--

INSERT INTO `tbl_roles` (`roleId`, `role`) VALUES
(1, 'Super Admin'),
(2, 'Manager/Direksi'),
(3, 'Admin Kas'),
(4, 'Admin Bank'),
(5, 'Kepala Bagian'),
(6, 'Admin Piutang Karyawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kode_transaksi` varchar(50) NOT NULL,
  `no_transaksi` varchar(50) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `jenis_transaksi` varchar(50) NOT NULL,
  `akun` varchar(50) NOT NULL,
  `kategori_id` tinyint(4) NOT NULL,
  `nominal_transaksi` int(50) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `user_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `kode_transaksi`, `no_transaksi`, `tgl_transaksi`, `jenis_transaksi`, `akun`, `kategori_id`, `nominal_transaksi`, `keterangan`, `user_id`) VALUES
(1, '', '', '0000-00-00', 'Debet', '11101', 0, 500000, '', 0),
(852, '', '', '2022-10-01', 'Debet', '11301', 0, 500000, '', 0),
(853, '', '', '0000-00-00', 'Debet', '11102', 0, 100000, '', 25),
(854, '', '', '0000-00-00', 'Debet', '11103', 0, 100000, '', 25),
(857, 'KMKJ', '1222001', '2022-12-08', 'Kredit', '11305', 1, 500000, 'xx', 25),
(858, 'KMKJ', '1222001', '2022-12-08', 'Debet', '11101', 1, 500000, '', 25),
(859, 'PK', '1222002', '2022-12-08', 'Debet', '11203', 5, 500000, 'xx', 0),
(860, 'PK', '1222002', '2022-12-08', 'Kredit', '11202', 5, 500000, 'tri cahya wibawa', 0),
(863, 'KKKJ', '1222003', '2022-12-08', 'Debet', '11202', 2, 1000000, 'tri cahya wibawa', 25),
(864, 'KKKJ', '1222003', '2022-12-08', 'Kredit', '11101', 2, 1000000, '', 25),
(865, 'PK', '1222004', '2022-12-09', 'Debet', '11101', 5, 500000, '', 0),
(866, 'PK', '1222004', '2022-12-09', 'Kredit', '11202', 5, 500000, 'tri cahya wibawa', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_users`
--

CREATE TABLE `tbl_users` (
  `userId` int(11) NOT NULL,
  `username` varchar(128) NOT NULL COMMENT 'login username',
  `password` varchar(128) NOT NULL COMMENT 'hashed login password',
  `name` varchar(128) DEFAULT NULL COMMENT 'full name of user',
  `roleId` tinyint(4) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT 0,
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_users`
--

INSERT INTO `tbl_users` (`userId`, `username`, `password`, `name`, `roleId`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(25, 'admin', '$2y$10$SAvFim22ptA9gHVORtIaru1dn9rhgerJlJCPxRNA02MjQaJnkxawq', 'Tri Cahya Wibawa', 1, 0, 0, '2022-11-21 02:24:48', NULL, NULL),
(26, 'adminkas', '$2y$10$1LEUNRABhviwwADmC02KKuga8FPs60gYWxgeLaysPWWGBz7ZvS.pi', 'Admin Kas', 3, 0, 25, '2022-11-21 08:39:17', 25, '2022-11-23 02:24:10'),
(27, 'adminbank', '$2y$10$s5gqBa.txPnTIwsb0GNA..WO.5nWFbgELXkWFQNbv54P6cFPz/eKS', 'Admin Bank', 4, 0, 25, '2022-11-21 08:39:51', 25, '2022-11-23 02:24:28'),
(28, 'kabag', '$2y$10$6nu8lVNGElzWH9w7OGpv6eLKOhLsEgHcKvGYXDTZ6EcznAtGotU7a', 'Kepala Bagian', 5, 0, 25, '2022-11-23 02:14:35', NULL, NULL),
(29, 'adminpk', '$2y$10$jLKp7VDe8ESadwalwQLS7.L//ktGvxP3LPzM9PjfjnWXalNOR8T2m', 'Admin Piutang Karyawan', 6, 0, 25, '2022-11-24 09:17:06', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang_keluar`
--

CREATE TABLE `tb_barang_keluar` (
  `id` int(10) NOT NULL,
  `id_transaksi` varchar(50) NOT NULL,
  `tanggal_masuk` varchar(20) NOT NULL,
  `tanggal_keluar` varchar(20) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `jumlah` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang_keluar`
--

INSERT INTO `tb_barang_keluar` (`id`, `id_transaksi`, `tanggal_masuk`, `tanggal_keluar`, `lokasi`, `kode_barang`, `nama_barang`, `satuan`, `jumlah`) VALUES
(1, 'WG-201713067948', '8/11/2017', '11/11/2017', 'NTB', '8888166995215', 'Ciki Walens', 'Dus', '50'),
(2, 'WG-201713067948', '8/11/2017', '11/12/2017', 'NTB', '8888166995215', 'Ciki Walens', 'Dus', '6'),
(3, 'WG-201713549728', '4/11/2017', '11/11/2017', 'Banten', '1923081008002', 'Buku Hiragana', 'Pack', '3'),
(4, 'WG-201774896520', '9/11/2017', '12/11/2017', 'Yogyakarta', '60201311121008264', 'Battery ZTE', 'Dus', '3'),
(5, 'WG-201727134650', '05/12/2017', '20/12/2017', 'Jakarta', '29312390203', 'Susu', 'Dus', '17'),
(6, 'WG-201810974628', '15/01/2018', '16/01/2018', 'Lampung', '1923081008002', 'Buku Nihongo', 'Dus', '50'),
(7, 'WG-201781267543', '7/11/2017', '17/01/2018', 'Yogyakarta', '97897952889', 'Buku Framework Codeigniter', 'Dus', '1'),
(8, 'WG-201832570869', '15/01/2018', '17/01/2018', 'Bali', '1923081008002', 'test', 'Dus', '10'),
(9, 'WG-201893850472', '15/01/2018', '18/01/2018', 'Bali', '1923081008002', 'lumpur nartugo', 'Pcs', '11'),
(10, 'WG-201781267543', '7/11/2017', '15/01/2018', 'Yogyakarta', '97897952889', 'Buku Framework Codeigniter', 'Dus', '1'),
(11, 'WG-201727134650', '05/12/2017', '15/01/2018', 'Jakarta', '29312390203', 'Susu', 'Dus', '3'),
(12, 'WG-201774896520', '9/11/2017', '15/01/2018', 'Yogyakarta', '60201311121008264', 'Battery ZTE', 'Dus', '3'),
(13, 'WG-201727134650', '05/12/2017', '16/01/2018', 'Jakarta', '29312390203', 'Susu', 'Dus', '1'),
(14, 'WG-201727134650', '05/12/2017', '17/01/2018', 'Jakarta', '29312390203', 'Susu', 'Dus', '1'),
(15, 'WG-201885472106', '18/01/2018', '19/01/2018', 'Riau', '8996001600146', 'Teh Pucuk', 'Dus', '50'),
(16, 'WG-201871602934', '18/01/2018', '16/03/2018', 'Papua', '312212331222', 'Kopi Hitam', 'Dus', '10'),
(0, 'WG-201871602934', '18/01/2018', '08/12/2022', 'Papua', '312212331222', 'Kopi Hitam', 'Dus', '10'),
(0, 'WG-201871602934', '18/01/2018', '13/12/2022', 'Papua', '312212331222', 'Kopi Hitam', 'Dus', '10');

--
-- Trigger `tb_barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `TG_BARANG_KELUAR` AFTER INSERT ON `tb_barang_keluar` FOR EACH ROW BEGIN
 UPDATE tb_barang_masuk SET jumlah=jumlah-NEW.jumlah
 WHERE kode_barang=NEW.kode_barang;
 DELETE FROM tb_barang_masuk WHERE jumlah = 0;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang_masuk`
--

CREATE TABLE `tb_barang_masuk` (
  `id_transaksi` varchar(50) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `jumlah` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang_masuk`
--

INSERT INTO `tb_barang_masuk` (`id_transaksi`, `tanggal`, `lokasi`, `kode_barang`, `nama_barang`, `satuan`, `jumlah`) VALUES
('WG-201871602934', '18/01/2018', 'Papua', '312212331222', 'Kopi Hitam', 'Dus', '80');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_satuan`
--

CREATE TABLE `tb_satuan` (
  `id_satuan` int(11) NOT NULL,
  `kode_satuan` varchar(100) NOT NULL,
  `nama_satuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_satuan`
--

INSERT INTO `tb_satuan` (`id_satuan`, `kode_satuan`, `nama_satuan`) VALUES
(1, 'Dus', 'Dus'),
(2, 'Pcs', 'Pcs'),
(5, 'Pack', 'Pack');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_dafakun`
--
ALTER TABLE `tbl_dafakun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `tbl_divisi`
--
ALTER TABLE `tbl_divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indeks untuk tabel `tbl_items`
--
ALTER TABLE `tbl_items`
  ADD PRIMARY KEY (`itemId`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indeks untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_divisi`
--
ALTER TABLE `tbl_divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_items`
--
ALTER TABLE `tbl_items`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT untuk tabel `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `roleId` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'role id', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=867;

--
-- AUTO_INCREMENT untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
