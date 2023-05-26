-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Bulan Mei 2023 pada 05.24
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
  `nama_akun` varchar(255) NOT NULL,
  `jenis_akun` varchar(50) NOT NULL,
  `normal_balance` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_dafakun`
--

INSERT INTO `tbl_dafakun` (`id_akun`, `nama_akun`, `jenis_akun`, `normal_balance`) VALUES
(11101, 'KAS YOGYAKARTA', 'kas', ''),
(11102, 'KAS JAKARTA', 'kas', ''),
(11103, 'BANK PERMATA USD', 'bank', ''),
(11104, 'BANK PERMATA AUD', 'bank', ''),
(11105, 'BANK PERMATA IDR', 'bank', ''),
(11106, 'BANK PERMATA EURO', 'bank', ''),
(11107, 'BANK DANAMON USD', 'bank', ''),
(11108, 'BCA JAKARTA', 'bank', ''),
(11109, 'BCA YOGYAKARTA', 'bank', ''),
(11110, 'BANK NIAGA YOGYAKARTA', 'bank', ''),
(11111, 'BANK NIAGA USD', 'bank', ''),
(11112, 'BANK DANAMON IDR', 'bank', ''),
(11113, 'BANK PERMATA GIRO OR', 'bank', ''),
(11114, 'BRI YOGYAKARTA', 'bank', ''),
(11115, 'BANK PERMATA POUNDSTERLING', 'bank', ''),
(11116, 'BANK NIAGA GIRO', 'bank', ''),
(11117, 'DEPOSITO', 'bank', ''),
(11201, 'PIUTANG DAGANG', '', ''),
(11202, 'PIUTANG KARYAWAN', '', ''),
(11203, 'PIUTANG LAIN - LAIN', '', ''),
(11204, 'PIUTANG PPh 21 KARYAWAN', '', ''),
(11301, 'PERSEDIAAN BAHAN BAKU', '', ''),
(11302, 'PERSEDIAAN BAHAN TAMBAHAN', '', ''),
(11303, 'PERSEDIAAN BAHAN EMBALASE', '', ''),
(11304, 'PERSEDIAAN BARANG DALAM PROSES', '', ''),
(11305, 'PERSEDIAAN BAHAN SANITASI', '', ''),
(11306, 'PERSEDIAAN BARANG JADI', '', ''),
(11307, 'PERSEDIAAN BARANG DAGANG', '', ''),
(11401, 'UANG MUKA PPH PASAL 25', '', ''),
(11402, 'UANG MUKA PPH PASAL 22', '', ''),
(11403, 'UANG MUKA PPH PASAL 23', '', ''),
(11404, 'UANG MUKA PPN', '', ''),
(11405, 'UANG MUKA PPH PASAL 4 AYAT 2', '', ''),
(11409, 'UANG MUKA PEMBELIAN PERALATAN LABORATORIUM', '', ''),
(11410, 'UANG MUKA PEMBELIAN MEBEL DAN PERALAT. KANTOR', '', ''),
(11411, 'UANG MUKA PEMBELIAN BAHAN BAKU', '', ''),
(11412, 'UANG MUKA PEMBELIAN BAHAN PENOLONG', '', ''),
(11501, 'UANG MUKA PEMBELIAN TANAH DAN ATAU BANGUNAN', '', ''),
(11502, 'UANG MUKA PEMB. MESIN DAN PERLENGK. PABRIK', '', ''),
(11503, 'UANG MUKA PEMBELIAN KENDARAAN', '', ''),
(12101, 'TANAH DAN PEKARANGAN', '', ''),
(12102, 'HAK GUNA BANGUNAN', '', ''),
(12103, 'GEDUNG DAN BANGUNAN', '', ''),
(12104, 'AKUMULASI PENYUSUTAN GEDUNG DAN ATAU BANGUNAN', '', ''),
(12105, 'MESIN DAN PERALATAN PABRIK', '', ''),
(12106, 'AKUMULASI PENYUSUTAN GEDUNG DAN ATAU BANGUNAN', '', ''),
(12107, 'KENDARAAN', '', ''),
(12108, 'AKUMULASI PENYUSUTAN KENDARAAN', '', ''),
(12109, 'PERALATAN LABORATORIUM', '', ''),
(12110, 'AKUMULASI PENYUSUTAN PERALATAN LABORATORIUM', '', ''),
(12111, 'MEBEL DAN PERALATAN KANTOR', '', ''),
(12112, 'AKUMULASI PENYUSUTAN MEBEL DAN PERALATAN KANTOR', '', ''),
(21101, 'UTANG DAGANG', '', ''),
(21102, 'UTANG PEMBELIAN AKTIVA', '', ''),
(21103, 'UTANG SEWA TANAH DAN ATAU BANGUNAN', '', ''),
(21104, 'UTANG SEWA PERALATAN', '', ''),
(21105, 'UTANG BIAYA', '', ''),
(21199, 'UTANG LANCAR LAIN', '', ''),
(21201, 'UTANG PPN', '', ''),
(21202, 'UTANG PPh 21', '', ''),
(21203, 'UTANG PPh 23', '', ''),
(21204, 'UTANG PPh Final (4 ayat 2)', '', ''),
(21205, 'UTANG PPh 25', '', ''),
(21206, 'UTANG JANGKA PANJANG', '', ''),
(30101, 'MODAL SAHAM', '', ''),
(30201, 'LABA / RUGI', '', ''),
(30202, 'LABA DITAHAN', '', ''),
(30301, 'DIVIDEN', '', ''),
(41101, 'PENJUALAN PRODUK', '', ''),
(41102, 'PENJUALAN BAHAN BAKU', '', ''),
(41103, 'PENJUALAN BAHAN PELENGKAP', '', ''),
(41199, 'PENJUALAN LAIN-LAIN', '', ''),
(41201, 'RETUR PENJUALAN PRODUK SEDERHANA', '', ''),
(41202, 'RETUR PENJUALAN PRODUK STANDART', '', ''),
(41203, 'RETUR PENJUALAN BAHAN BAKU', '', ''),
(41204, 'RETUR PENJUALAN BAHAN PELENGKAP', '', ''),
(41301, 'POTONGAN PENJUALAN PRODUK', '', ''),
(41302, 'POTONGAN PENJUALAN BAHAN BAKU', '', ''),
(41303, 'POTONGAN PENJUALAN BAHAN PELENGKAP', '', ''),
(51101, 'PEMBELIAN BAHAN BAKU', '', ''),
(51102, 'PEMBELIAN BAHAN PELENGKAP', '', ''),
(51201, 'RETUR PEMBELIAN BAHAN BAKU', '', ''),
(51202, 'RETUR PEMBELIAN BAHAN PELENGKAP', '', ''),
(51301, 'POTONGAN PEMBELIAN BAHAN BAKU', '', ''),
(51302, 'POTONGAN PEMBELIAN BAHAN PELENGKAP', '', ''),
(61001, 'HPP PRODUK', '', ''),
(61002, 'HPP BAHAN BAKU', '', ''),
(61003, 'HPP BAHAN PELENGKAP', '', ''),
(62001, 'BIAYA GAJI DAN UPAH BAGIAN PRODUKSI', '', ''),
(62002, 'BIAYA PRODUKSI', '', ''),
(62003, 'BIAYA BAHAN BAKAR SOLAR DAN LPG', '', ''),
(62004, 'BIAYA PEMELIHARAAN DAN PERAWATAN PERALATAN PABRIK DAN MESIN - MESIN PABRIK\r\n', '', ''),
(62005, 'BIAYA PEMELIHARAAN DAN PERAWATAN BANGUNAN DAN LINGKUNGAN\r\n', '', ''),
(62006, 'BIAYA ASURANSI\r\n', '', ''),
(62007, 'BIAYA DEP. GEDUNG DAN BANGUNAN', '', ''),
(62008, 'BIAYA DEP. MESIN DAN PERLENGKAPAN PABRIK', '', ''),
(62009, 'BIAYA LISTRIK DAN ENERGI', '', ''),
(62010, 'BIAYA SEWA TANGKI', '', ''),
(71001, 'BIAYA KEPERLUAN PENJUALAN\r\n', '', ''),
(71002, 'BIAYA JASA PERANTARA PENJUALAN', '', ''),
(71003, 'BIAYA PROMOSI\r\n', '', ''),
(71004, 'BIAYA PAJAK REKLAME DAN PENYIARAN', '', ''),
(71005, 'BIAYA SEWA', '', ''),
(71006, 'BIAYA ROYALITY', '', ''),
(71007, 'BIAYA PERJALANAN', '', ''),
(71008, 'BIAYA AKOMODASI', '', ''),
(71009, 'BIAYA MAKAN', '', ''),
(71010, 'BIAYA BAHAN BAKAR', '', ''),
(71011, 'BIAYA LAIN-LAIN', '', ''),
(71012, 'BIAYA KIRIM DAN ANGKUTAN PENJUALAN', '', ''),
(71013, 'BIAYA PERAWATAN DAN PEMELIHARAAN KENDARAAN', '', ''),
(71014, 'BIAYA DEP. KENDARAAN', '', ''),
(71015, 'BIAYA GAJI BAGIAN PEMASARAN', '', ''),
(71016, 'BIAYA UPAH PERANTARA PENJUALAN', '', ''),
(71017, 'BIAYA KERUGIAN PIUTANG\r\n', '', ''),
(72001, 'BIAYA GAJI DAN UPAH BAGIAN ADM. DAN UMUM', '', ''),
(72002, 'BIAYA MATERAI', '', ''),
(72003, 'BIAYA KEPERLUAN KANTOR', '', ''),
(72004, 'BIAYA CETAK', '', ''),
(72005, 'BIAYA TELEPON', '', ''),
(72006, 'BIAYA LISTRIK JAKARTA', '', ''),
(72007, 'BIAYA LANGGANAN KORAN DAN MAJALAH', '', ''),
(72008, 'BIAYA DIKLAT', '', ''),
(72009, 'BIAYA TENAGA AHLI DAN KONSULTASI', '', ''),
(72010, 'PAJAK BUMI DAN BANGUNAN', '', ''),
(72011, 'BIAYA PEMELIHARAAN MEBEL DAN ALAT KANTOR', '', ''),
(72012, 'BIAYA DEP. MEBEL DAN PERALATAN KANTOR', '', ''),
(72013, 'BIAYA PERLENGKAPAN KANTOR', '', ''),
(72014, 'MANAJEMEN FEE PEMERIKSAAN LABORATORIUM', '', ''),
(72015, 'BIAYA DEP. PERALATAN LABORATORIUM', '', ''),
(72016, 'BIAYA DEP. INSTALASI', '', ''),
(72017, 'BIAYA ADMINISTRASI BANK', '', ''),
(72018, 'BIAYA DENDA PAJAK', '', ''),
(81001, 'PENDAPATAN JASA GIRO', '', ''),
(81002, 'PENDAPATAN BUNGA DEPOSITO', '', ''),
(81003, 'PENDAPATAN SELISIH KURS', '', ''),
(81004, 'PENDAPATAN MAKLON', '', ''),
(91001, 'KERUGIAN SELISIH KRUS', '', ''),
(91002, 'PAJAK JASA GIRO', '', ''),
(91003, 'BIAYA MAKLON', '', '');

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
-- Struktur dari tabel `tbl_faq`
--

CREATE TABLE `tbl_faq` (
  `id_faq` int(4) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL,
  `jawaban` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_faq`
--

INSERT INTO `tbl_faq` (`id_faq`, `pertanyaan`, `jawaban`, `kategori`) VALUES
(3, 'Bagaimana caranya membuat struk pengembalian titipan di SI AMIR?', 'Program SI AMIR tidak menyediakan struk pengembalian titipan. Apabila terdapat Sisa maupun Kekurangan pada Pengembalian Bon Salesman/Piutang Karyawan, tetap dianggap sebagai Piutang Karyawan.', ''),
(4, 'Bagaimana caranya membukukan apabila ada sisa pada pengembalian Piutang Karyawan?', 'Tetap input pengembalian sesuai dengan bukti yang telah di verifikasi. Apabila masih terdapat sisa pengembalian yang harus dikembalikan ke Salesman, tetap diakui sebagai Piutang Karyawan dan secara sistem akan di akui sebagai kelebihan Piutang Karyawan', ''),
(5, 'Bagaimana catanya membukukan pengembalian kelebihan Piutang Karyawan?', 'Pengembalian tersebut dapat dilakukan dengan cara membuat Dokumen Pengeluaran yang ditandatangan oleh GM atau Direktur (sesuai ketentuan Acc Pengeluaran), lalu diinput ke program SI AMIR sebagai Uang Keluar pada Piutang Karyawan', ''),
(6, 'Bagaimana caranya untuk edit transaksi bank?', 'Pada program SI AMIR, user tidak diperkenankan untuk edit. Untuk melakukan input harus ada bukti transaksi/dokumen, apabila belum ada bukti transaksi, tidak diperkenankan untuk melakukan input.', ''),
(7, 'biaya yang ada faktur pajaknya masuk di utang ppn atau uang muka ppn', '.', ''),
(8, 'pinjaman bon sales masuk ke dalam akun piutang lain-lain atau piutang karyawan ', '?', ''),
(9, 'bagaimana cara mengurutkan data transaksi yg sudah berganti hari ', '?', ''),
(10, 'bagaimana cara mencetak mutasi kas periode 1 bulan ', '?', '');

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
  `NIK` varchar(50) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `divisi_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`NIK`, `nama_karyawan`, `divisi_id`) VALUES
('1', 'DODI KURNIAWAN', 2),
('10', 'IRFAN ARDIANSYAH', 2),
('11', 'YUDI YUNIARTO ', 2),
('12', 'HENGKI DINO PURWANTO', 2),
('13', 'ARI PRASTYO WIBOWO', 2),
('14', 'ZAINI', 2),
('15', 'INES LAVENIA YUNITA', 2),
('16', 'KASIDI', 2),
('17', 'SIDIQ PURNOMO', 2),
('18', 'AGUNG SUMARDHANY', 2),
('19', 'EKO SETYOBIONO', 2),
('2', 'AGUS ARIYANTO', 2),
('20', 'MUJIONO', 2),
('21', 'MUH NUR PRASETYO', 2),
('22', 'MOCH BAKIR', 2),
('23', 'ARIK PURNOMO', 2),
('24', 'TUWASNO', 2),
('25', 'ONNY KASMUDARTO', 2),
('26', 'ISMANTO', 2),
('27', 'SUGENG RIYONO', 2),
('28', 'RIZAL MUSTOFA', 2),
('29', 'ABDUL AZIZ', 2),
('3', 'B AGUNG NUGROHO', 2),
('30', 'HENGKY', 2),
('31', 'ADE RESTU', 2),
('32', 'WIDYA WIRYAWAN', 2),
('33', 'INDRA', 2),
('34', 'MUKTI', 2),
('35', 'GILANG', 2),
('36', 'DEWI K', 2),
('37', 'DANIK S', 2),
('38', 'TRI UTAMI', 2),
('39', 'TITIK S', 2),
('4', 'HARJANTI DWI SETYANI', 2),
('40', 'DIKHA S', 2),
('41', 'SLAMET Y', 2),
('5', 'WELLY PURWANTORO', 2),
('6', 'KRISTIANUS SISWANTO', 2),
('7', 'ADITYA NOVIANTA', 2),
('8', 'BASUKI', 2),
('9', 'HERY PURNOMO', 2);

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
(1, 'Kas Masuk', 'KM', 'Debet'),
(2, 'Kas Keluar', 'KK', 'Kredit'),
(3, 'Bank Masuk', 'BM', 'Debet'),
(4, 'Bank Keluar', 'BK', 'Kredit'),
(5, 'Pelunasan Piutang Karyawan', 'PK', 'Debet'),
(6, 'Saldo Awal', 'SA', '');

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
  `kode_transaksi` varchar(50) NOT NULL DEFAULT '',
  `no_transaksi` varchar(50) NOT NULL DEFAULT '',
  `tgl_transaksi` date NOT NULL,
  `jenis_transaksi` varchar(50) NOT NULL,
  `akun` varchar(50) NOT NULL,
  `kategori_id` varchar(4) NOT NULL DEFAULT '',
  `nominal_transaksi` decimal(50,2) NOT NULL,
  `keterangan` varchar(255) NOT NULL DEFAULT '',
  `user_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `isLogin` tinyint(4) NOT NULL DEFAULT 0,
  `isDeleted` tinyint(4) NOT NULL DEFAULT 0,
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_users`
--

INSERT INTO `tbl_users` (`userId`, `username`, `password`, `name`, `roleId`, `isLogin`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(25, 'admin', '$2y$10$SAvFim22ptA9gHVORtIaru1dn9rhgerJlJCPxRNA02MjQaJnkxawq', 'Tri Cahya Wibawa', 1, 0, 0, 0, '2022-11-21 02:24:48', NULL, NULL),
(26, 'adminkas', '$2y$10$1LEUNRABhviwwADmC02KKuga8FPs60gYWxgeLaysPWWGBz7ZvS.pi', 'Admin Kas', 3, 0, 0, 25, '2022-11-21 08:39:17', 25, '2022-11-23 02:24:10'),
(27, 'adminbank', '$2y$10$s5gqBa.txPnTIwsb0GNA..WO.5nWFbgELXkWFQNbv54P6cFPz/eKS', 'Admin Bank', 4, 0, 0, 25, '2022-11-21 08:39:51', 25, '2022-11-23 02:24:28'),
(28, 'kabag', '$2y$10$6nu8lVNGElzWH9w7OGpv6eLKOhLsEgHcKvGYXDTZ6EcznAtGotU7a', 'Kepala Bagian', 5, 0, 0, 25, '2022-11-23 02:14:35', NULL, NULL),
(29, 'adminpk', '$2y$10$jLKp7VDe8ESadwalwQLS7.L//ktGvxP3LPzM9PjfjnWXalNOR8T2m', 'Admin Piutang Karyawan', 6, 0, 0, 25, '2022-11-24 09:17:06', NULL, NULL),
(30, 'mey', '$2y$10$.RkobikvpKc0OHi9EMGGeemJtfyBQUA6UO0euvuw1ouI9zhi0VwA.', 'Mey', 3, 0, 0, 25, '2023-01-30 03:48:41', 25, '2023-05-24 04:09:34'),
(31, 'indra', '$2y$10$fqwLABxgrk6L7qz4ZkwEZO9FiwgIiiYDXYuEvHFlvHklHWmcrwM/a', 'Indra', 4, 0, 0, 25, '2023-01-30 03:49:01', 25, '2023-05-24 04:05:13'),
(32, 'silvia', '$2y$10$hTZIvJJaFeBBxQ7eTguPJeUKO6Myx8nX0dwsJZYPBGIZ0q5Ky9r.W', 'Silvia', 6, 0, 0, 25, '2023-01-30 03:49:22', NULL, NULL);

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
-- Indeks untuk tabel `tbl_faq`
--
ALTER TABLE `tbl_faq`
  ADD PRIMARY KEY (`id_faq`);

--
-- Indeks untuk tabel `tbl_items`
--
ALTER TABLE `tbl_items`
  ADD PRIMARY KEY (`itemId`);

--
-- Indeks untuk tabel `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`NIK`);

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
-- AUTO_INCREMENT untuk tabel `tbl_faq`
--
ALTER TABLE `tbl_faq`
  MODIFY `id_faq` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2917;

--
-- AUTO_INCREMENT untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
