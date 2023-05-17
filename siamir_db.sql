-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 15, 2023 at 02:01 AM
-- Server version: 10.4.24-MariaDB-log
-- PHP Version: 7.4.33

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
-- Table structure for table `tbl_dafakun`
--

CREATE TABLE `tbl_dafakun` (
  `id_akun` int(11) NOT NULL,
  `nama_akun` varchar(255) NOT NULL,
  `normal_balance` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_dafakun`
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
(30301, 'DIVIDEN', ''),
(41101, 'PENJUALAN PRODUK', ''),
(41102, 'PENJUALAN BAHAN BAKU', ''),
(41103, 'PENJUALAN BAHAN PELENGKAP', ''),
(41199, 'PENJUALAN LAIN-LAIN', ''),
(41201, 'RETUR PENJUALAN PRODUK SEDERHANA', ''),
(41202, 'RETUR PENJUALAN PRODUK STANDART', ''),
(41203, 'RETUR PENJUALAN BAHAN BAKU', ''),
(41204, 'RETUR PENJUALAN BAHAN PELENGKAP', ''),
(41301, 'POTONGAN PENJUALAN PRODUK', ''),
(41302, 'POTONGAN PENJUALAN BAHAN BAKU', ''),
(41303, 'POTONGAN PENJUALAN BAHAN PELENGKAP', ''),
(51101, 'PEMBELIAN BAHAN BAKU', ''),
(51102, 'PEMBELIAN BAHAN PELENGKAP', ''),
(51201, 'RETUR PEMBELIAN BAHAN BAKU', ''),
(51202, 'RETUR PEMBELIAN BAHAN PELENGKAP', ''),
(51301, 'POTONGAN PEMBELIAN BAHAN BAKU', ''),
(51302, 'POTONGAN PEMBELIAN BAHAN PELENGKAP', ''),
(61001, 'HPP PRODUK', ''),
(61002, 'HPP BAHAN BAKU', ''),
(61003, 'HPP BAHAN PELENGKAP', ''),
(62001, 'BIAYA GAJI DAN UPAH BAGIAN PRODUKSI', ''),
(62002, 'BIAYA PRODUKSI', ''),
(62003, 'BIAYA BAHAN BAKAR SOLAR DAN LPG', ''),
(62004, 'BIAYA PEMELIHARAAN DAN PERAWATAN PERALATAN PABRIK DAN MESIN - MESIN PABRIK\r\n', ''),
(62005, 'BIAYA PEMELIHARAAN DAN PERAWATAN BANGUNAN DAN LINGKUNGAN\r\n', ''),
(62006, 'BIAYA ASURANSI\r\n', ''),
(62007, 'BIAYA DEP. GEDUNG DAN BANGUNAN', ''),
(62008, 'BIAYA DEP. MESIN DAN PERLENGKAPAN PABRIK', ''),
(62009, 'BIAYA LISTRIK DAN ENERGI', ''),
(62010, 'BIAYA SEWA TANGKI', ''),
(71001, 'BIAYA KEPERLUAN PENJUALAN\r\n', ''),
(71002, 'BIAYA JASA PERANTARA PENJUALAN', ''),
(71003, 'BIAYA PROMOSI\r\n', ''),
(71004, 'BIAYA PAJAK REKLAME DAN PENYIARAN', ''),
(71005, 'BIAYA SEWA', ''),
(71006, 'BIAYA ROYALITY', ''),
(71007, 'BIAYA PERJALANAN', ''),
(71008, 'BIAYA AKOMODASI', ''),
(71009, 'BIAYA MAKAN', ''),
(71010, 'BIAYA BAHAN BAKAR', ''),
(71011, 'BIAYA LAIN-LAIN', ''),
(71012, 'BIAYA KIRIM DAN ANGKUTAN PENJUALAN', ''),
(71013, 'BIAYA PERAWATAN DAN PEMELIHARAAN KENDARAAN', ''),
(71014, 'BIAYA DEP. KENDARAAN', ''),
(71015, 'BIAYA GAJI BAGIAN PEMASARAN', ''),
(71016, 'BIAYA UPAH PERANTARA PENJUALAN', ''),
(71017, 'BIAYA KERUGIAN PIUTANG\r\n', ''),
(72001, 'BIAYA GAJI DAN UPAH BAGIAN ADM. DAN UMUM', ''),
(72002, 'BIAYA MATERAI', ''),
(72003, 'BIAYA KEPERLUAN KANTOR', ''),
(72004, 'BIAYA CETAK', ''),
(72005, 'BIAYA TELEPON', ''),
(72006, 'BIAYA LISTRIK JAKARTA', ''),
(72007, 'BIAYA LANGGANAN KORAN DAN MAJALAH', ''),
(72008, 'BIAYA DIKLAT', ''),
(72009, 'BIAYA TENAGA AHLI DAN KONSULTASI', ''),
(72010, 'PAJAK BUMI DAN BANGUNAN', ''),
(72011, 'BIAYA PEMELIHARAAN MEBEL DAN ALAT KANTOR', ''),
(72012, 'BIAYA DEP. MEBEL DAN PERALATAN KANTOR', ''),
(72013, 'BIAYA PERLENGKAPAN KANTOR', ''),
(72014, 'MANAJEMEN FEE PEMERIKSAAN LABORATORIUM', ''),
(72015, 'BIAYA DEP. PERALATAN LABORATORIUM', ''),
(72016, 'BIAYA DEP. INSTALASI', ''),
(72017, 'BIAYA ADMINISTRASI BANK', ''),
(72018, 'BIAYA DENDA PAJAK', ''),
(81001, 'PENDAPATAN JASA GIRO', ''),
(81002, 'PENDAPATAN BUNGA DEPOSITO', ''),
(81003, 'PENDAPATAN SELISIH KURS', ''),
(81004, 'PENDAPATAN MAKLON', ''),
(91001, 'KERUGIAN SELISIH KRUS', ''),
(91002, 'PAJAK JASA GIRO', ''),
(91003, 'BIAYA MAKLON', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_divisi`
--

CREATE TABLE `tbl_divisi` (
  `id_divisi` int(11) NOT NULL,
  `nama_divisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_divisi`
--

INSERT INTO `tbl_divisi` (`id_divisi`, `nama_divisi`) VALUES
(1, 'IT'),
(2, 'MARKETING'),
(3, 'HRD'),
(4, 'AKUNTANSI');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faq`
--

CREATE TABLE `tbl_faq` (
  `id_faq` int(4) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL,
  `jawaban` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_faq`
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
-- Table structure for table `tbl_items`
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
-- Dumping data for table `tbl_items`
--

INSERT INTO `tbl_items` (`itemId`, `itemHeader`, `itemSub`, `itemDesc`, `itemImage`, `isDeleted`, `createdBy`, `createdDtm`, `updatedDtm`, `updatedBy`) VALUES
(1, 'jquery.validation.js', 'Contribution towards jquery.validation.js', 'jquery.validation.js is the client side javascript validation library authored by Jörn Zaefferer hosted on github for us and we are trying to contribute to it. Working on localization now', 'validation.png', 0, 1, '2015-09-02 00:00:00', NULL, NULL),
(2, 'CodeIgniter User Management', 'Demo for user management system', 'This the demo of User Management System (Admin Panel) using CodeIgniter PHP MVC Framework and AdminLTE bootstrap theme. You can download the code from the repository or forked it to contribute. Usage and installation instructions are provided in ReadMe.MD', 'cias.png', 0, 1, '2015-09-02 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `NIK` varchar(50) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `divisi_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_karyawan`
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
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(20) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `kode_kategori` varchar(50) NOT NULL,
  `normal_balance` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`, `kode_kategori`, `normal_balance`) VALUES
(1, 'Kas Masuk', 'KM', 'Debet'),
(2, 'Kas Keluar', 'KK', 'Kredit'),
(3, 'Bank Masuk', 'BM', 'Debet'),
(4, 'Bank Keluar', 'BK', 'Kredit'),
(5, 'Pelunasan Piutang Karyawan', 'PK', 'Debet'),
(6, 'Saldo Awal Kas', 'SAK', ''),
(7, 'Saldo Awal Bank', 'SAB', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `roleId` tinyint(4) NOT NULL COMMENT 'role id',
  `role` varchar(50) NOT NULL COMMENT 'role text'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_roles`
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
-- Table structure for table `tbl_transaksi`
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

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `kode_transaksi`, `no_transaksi`, `tgl_transaksi`, `jenis_transaksi`, `akun`, `kategori_id`, `nominal_transaksi`, `keterangan`, `user_id`) VALUES
(2767, 'KKKJ', '0123001', '2023-01-02', 'Debet', '21105', '2', '2500.00', 'BY. TRANSFER', 31),
(2768, 'KKKJ', '0123001', '2023-01-02', 'Kredit', '11101', '2', '2500.00', '', 31),
(2769, 'KKKJ', '0122001', '2023-01-02', 'Debet', '21105', '2', '257040.00', 'BY. PENJ LAIN-LAIN (PROG DISKON LOVE 1 UTK BID DEWI S)', 31),
(2770, 'KKKJ', '0122001', '2023-01-02', 'Kredit', '11101', '2', '257040.00', '', 31),
(2771, 'KMKJ', '0123002', '2023-01-02', 'Kredit', '11203', '1', '257040.00', 'PELUNASAN PINJAMAN WIDYA W PER KAS.5/12/22', 31),
(2772, 'KMKJ', '0123002', '2023-01-02', 'Debet', '11101', '1', '257040.00', '', 31),
(2773, 'KKKJ', '0123003', '2023-01-02', 'Debet', '21105', '2', '848000.00', 'BY. KIRIM SUSU DR JOGJA KE LANGGENG BATANG', 31),
(2774, 'KKKJ', '0123003', '2023-01-02', 'Kredit', '11101', '2', '848000.00', '', 31),
(2775, 'KMKJ', '0123004', '2023-01-02', 'Kredit', '11203', '1', '1200000.00', 'PELUNASAN PINJAMAN PRASETYO PER KAS.30/12/22', 31),
(2776, 'KMKJ', '0123004', '2023-01-02', 'Debet', '11101', '1', '1200000.00', '', 31),
(2777, 'KKKJ', '0123005', '2023-01-02', 'Debet', '62002', '2', '145000.00', 'BY. JILID LAPORAN CHECKLIST PRODUKSI & PPIC', 31),
(2778, 'KKKJ', '0123005', '2023-01-02', 'Kredit', '11101', '2', '145000.00', '', 31),
(2779, 'KKKJ', '0123006', '2023-01-02', 'Debet', '62002', '2', '265000.00', 'PEMBEL. BOTOL 1LT & 1,5LT UTK PACKING MINYAK NABATI', 31),
(2780, 'KKKJ', '0123006', '2023-01-02', 'Kredit', '11101', '2', '265000.00', '', 31),
(2781, 'KMKJ', '0123007', '2023-01-02', 'Kredit', '11203', '1', '315000.00', 'PELUNASAN PINJAMAN INDRI PER KAS.30/12/22', 31),
(2782, 'KMKJ', '0123007', '2023-01-02', 'Debet', '11101', '1', '315000.00', '', 31),
(2783, 'KKKJ', '0123008', '2023-01-02', 'Debet', '72003', '2', '35000.00', 'PEMBEL. AQUA GELAS UTK KUNJUNGAN TAMU', 31),
(2784, 'KKKJ', '0123008', '2023-01-02', 'Kredit', '11101', '2', '35000.00', '', 31),
(2785, 'KKKJ', '0123009', '2023-01-02', 'Debet', '62005', '2', '194000.00', 'BY. PENGUJIAN AIR LIMBAH DI BBTKLPP JAN\'23', 31),
(2786, 'KKKJ', '0123009', '2023-01-02', 'Kredit', '11101', '2', '194000.00', '', 31),
(2787, 'KKKJ', '0123010', '2023-01-02', 'Debet', '62005', '2', '193000.00', 'BY. PENGUJIAN AIR LIMBAH DI LAB BALAI KULIT JAN\'23', 31),
(2788, 'KKKJ', '0123010', '2023-01-02', 'Kredit', '11101', '2', '193000.00', '', 31),
(2789, 'KKKJ', '0123011', '2023-01-02', 'Debet', '21105', '2', '360000.00', 'BY. KELILING MD DIY BLN DESEMBER\'22.ANI ', 31),
(2790, 'KKKJ', '0123011', '2023-01-02', 'Debet', '21105', '2', '495000.00', 'BY. KELILING MD DIY BLN DESEMBER\'22.ANI ', 31),
(2791, 'KKKJ', '0123011', '2023-01-02', 'Debet', '21105', '2', '95500.00', 'BY. KELILING MD DIY BLN DESEMBER\'22.ANI ', 31),
(2792, 'KKKJ', '0123011', '2023-01-02', 'Kredit', '11101', '2', '950500.00', '', 31),
(2793, 'KMKJ', '0123012', '2023-01-02', 'Kredit', '11203', '1', '1000000.00', 'PELUNASAN PINJAMAN ANI PER KAS.1/12/22', 31),
(2794, 'KMKJ', '0123012', '2023-01-02', 'Debet', '11101', '1', '1000000.00', '', 31),
(2795, 'KKKJ', '0123013', '2023-01-02', 'Debet', '21105', '2', '390000.00', 'BY. KELILING SPG YOGYAKARTA BLN DESEMBER\'22.TRI UTAMI', 31),
(2796, 'KKKJ', '0123013', '2023-01-02', 'Kredit', '11101', '2', '390000.00', '', 31),
(2797, 'KMKJ', '0123014', '2023-01-02', 'Kredit', '11203', '1', '400000.00', 'PELUNASAN PINJAMAN TRI UTAMI PER KAS.1/12/22', 31),
(2798, 'KMKJ', '0123014', '2023-01-02', 'Debet', '11101', '1', '400000.00', '', 31),
(2799, 'KKKJ', '0123015', '2023-01-02', 'Debet', '21105', '2', '91920.00', 'BY. FREEDRINK', 31),
(2800, 'KKKJ', '0123015', '2023-01-02', 'Kredit', '11101', '2', '91920.00', '', 31),
(2801, 'KKKJ', '0123016', '2023-01-02', 'Debet', '21105', '2', '88170.00', 'BY. PROG BANDED SPG TK WIL YOGYAKARTA', 31),
(2802, 'KKKJ', '0123016', '2023-01-02', 'Kredit', '11101', '2', '88170.00', '', 31),
(2803, 'KKKJ', '0123017', '2023-01-02', 'Debet', '21105', '2', '405000.00', 'BY. KELILING SPG YOGYAKARTA BLN DESEMBER\'22.TITIK S', 31),
(2804, 'KKKJ', '0123017', '2023-01-02', 'Debet', '21105', '2', '23700.00', 'BY. KELILING SPG YOGYAKARTA BLN DESEMBER\'22.TITIK S', 31),
(2805, 'KKKJ', '0123017', '2023-01-02', 'Kredit', '11101', '2', '428700.00', '', 31),
(2806, 'KMKJ', '0123018', '2023-01-02', 'Kredit', '11203', '1', '500000.00', 'PELUNASAN PINJAMAN TITIK S PER KAS.1/12/22', 31),
(2807, 'KMKJ', '0123018', '2023-01-02', 'Debet', '11101', '1', '500000.00', '', 31),
(2808, 'KKKJ', '0123019', '2023-01-02', 'Debet', '71010', '2', '405000.00', 'BY. KELILING SPG YOGYAKARTA BLN DESEMBER\'22.DANIK S', 31),
(2809, 'KKKJ', '0123019', '2023-01-02', 'Debet', '71009', '2', '61125.00', 'BY. KELILING SPG YOGYAKARTA BLN DESEMBER\'22.DANIK S', 31),
(2810, 'KKKJ', '0123019', '2023-01-02', 'Kredit', '11101', '2', '466125.00', '', 31),
(2811, 'KMKJ', '0123020', '2023-01-02', 'Kredit', '11203', '1', '500000.00', 'PELUNASAN PINJAMAN DANIK S PER KAS.1/12/22', 31),
(2812, 'KMKJ', '0123020', '2023-01-02', 'Debet', '11101', '1', '500000.00', '', 31),
(2813, 'KKKJ', '0123021', '2023-01-02', 'Debet', '21105', '2', '432000.00', 'BY. KELILING MD SOLO BLN DESEMBER\'22.DEWI K ', 31),
(2814, 'KKKJ', '0123021', '2023-01-02', 'Debet', '21105', '2', '457560.00', 'BY. KELILING MD SOLO BLN DESEMBER\'22.DEWI K ', 31),
(2815, 'KKKJ', '0123021', '2023-01-02', 'Debet', '21105', '2', '365750.00', 'BY. KELILING MD SOLO BLN DESEMBER\'22.DEWI K ', 31),
(2816, 'KKKJ', '0123021', '2023-01-02', 'Kredit', '11101', '2', '1255310.00', '', 31),
(2817, 'KMKJ', '0123022', '2023-01-02', 'Kredit', '11203', '1', '1200000.00', 'PELUNASAN PINJAMAN DEWI K PER KAS.1/12/22', 31),
(2818, 'KMKJ', '0123022', '2023-01-02', 'Debet', '11101', '1', '1200000.00', '', 31),
(2819, 'KKKJ', '0123023', '2023-01-02', 'Debet', '11203', '2', '1000000.00', 'ANI, BON OPERASIONAL JAN\'23 ', 31),
(2820, 'KKKJ', '0123023', '2023-01-02', 'Kredit', '11101', '2', '1000000.00', '', 31),
(2821, 'KKKJ', '0123024', '2023-01-02', 'Debet', '11203', '2', '400000.00', 'TRI UTAMI, BON OPERASIONAL JAN\'23', 31),
(2822, 'KKKJ', '0123024', '2023-01-02', 'Kredit', '11101', '2', '400000.00', '', 31),
(2823, 'KKKJ', '0123025', '2023-01-02', 'Debet', '11203', '2', '500000.00', 'TITIK S, BON OPERASIONAL JAN\'23', 31),
(2824, 'KKKJ', '0123025', '2023-01-02', 'Kredit', '11101', '2', '500000.00', '', 31),
(2825, 'KKKJ', '0123026', '2023-01-02', 'Debet', '11203', '2', '500000.00', 'DANIK S, BON OPERASIONAL JAN\'23', 31),
(2826, 'KKKJ', '0123026', '2023-01-02', 'Kredit', '11101', '2', '500000.00', '', 31),
(2827, 'KKKJ', '0123027', '2023-01-02', 'Debet', '11203', '2', '1200000.00', 'DEWI K, BON OPERASIONAL JAN\'23', 31),
(2828, 'KKKJ', '0123027', '2023-01-02', 'Kredit', '11101', '2', '1200000.00', '', 31),
(2829, 'KMKJ', '0123028', '2023-01-03', 'Kredit', '11114', '1', '160000000.00', 'PEMINDAHAN DANA DARI BRI KE KAS JOGJA', 31),
(2830, 'KMKJ', '0123028', '2023-01-03', 'Debet', '11101', '1', '160000000.00', '', 31),
(2831, 'KKKJ', '0123029', '2023-01-03', 'Debet', '21105', '2', '56000.00', 'PEMBEL. SUSU DANCOW UTK UJI RASA RENCANA MAKLON', 31),
(2832, 'KKKJ', '0123029', '2023-01-03', 'Kredit', '11101', '2', '56000.00', '', 31),
(2833, 'KKKJ', '0123030', '2023-01-03', 'Debet', '11203', '2', '5000000.00', 'HELMI, BON GAJI & LEMBURAN KARYAWAN', 31),
(2834, 'KKKJ', '0123030', '2023-01-03', 'Kredit', '11101', '2', '5000000.00', '', 31),
(2835, 'KKKJ', '0123031', '2023-01-03', 'Debet', '12111', '2', '713500.00', 'PEMBEL. FLASDISHK & CCTV UTK R. BRANKAS - AKUTANSI', 31),
(2836, 'KKKJ', '0123031', '2023-01-03', 'Kredit', '11101', '2', '713500.00', '', 31),
(2837, 'KKKJ', '0123032', '2023-01-03', 'Debet', '11202', '2', '836000.00', 'HENGKI DINO PURWANTO', 31),
(2838, 'KKKJ', '0123032', '2023-01-03', 'Kredit', '11101', '2', '836000.00', '', 31),
(2839, 'KKKJ', '0123033', '2023-01-03', 'Debet', '21105', '2', '2532317.00', 'RETUR DR HENGKY', 31),
(2840, 'KKKJ', '0123033', '2023-01-03', 'Kredit', '11101', '2', '2532317.00', '', 31),
(2841, 'KKKJ', '0123034', '2023-01-03', 'Debet', '21201', '2', '646024.00', 'BY. PPN RSUD AL-IHSAN MASA.03/03/22 (A9774)', 31),
(2842, 'KKKJ', '0123034', '2023-01-03', 'Kredit', '11101', '2', '646024.00', '', 31),
(2843, 'SA', '', '2022-09-30', 'Debet', '11101', '6', '252914579.00', '', 25),
(2844, 'SA', '', '2023-01-01', 'Debet', '11110', '7', '504240105.34', '', 31),
(2846, 'BKBN', '0123035', '2023-01-02', 'Debet', '21201', '4', '268472897.00', 'PEMBAY. PPN MASA NOVEMBER 2022', 31),
(2847, 'BKBN', '0123035', '2023-01-02', 'Kredit', '11110', '4', '268472897.00', '', 31),
(2849, 'BMBN', '0123036', '2023-01-06', 'Kredit', '11201', '3', '87603286.00', 'ANGSURAN PIUT DAG SUNARTO (UD. YONATA) A5244', 31),
(2850, 'BMBN', '0123036', '2023-01-06', 'Debet', '11110', '3', '87603286.00', '', 31),
(2851, 'BKBN', '0123037', '2023-01-10', 'Debet', '11204', '4', '8509466.00', 'PEMBAY. PPH 21 KARYAWAN MASA DESEMBER 2022', 31),
(2852, 'BKBN', '0123037', '2023-01-10', 'Kredit', '11110', '4', '8509466.00', '', 31),
(2853, 'BKBN', '0123038', '2023-01-17', 'Debet', '30202', '4', '14810000.00', 'PEMBAY. DIVIDEN IBU ISWANTI INDARTO', 31),
(2854, 'BKBN', '0123038', '2023-01-17', 'Kredit', '11110', '4', '14810000.00', '', 31),
(2855, 'BKBN', '0123039', '2023-01-17', 'Debet', '30202', '4', '24910000.00', 'PEMBAY. DIVIDEN 2022 BP. SISWANTO HENDRO S', 31),
(2856, 'BKBN', '0123039', '2023-01-17', 'Kredit', '11110', '4', '24910000.00', '', 31),
(2857, 'BKBN', '0123040', '2023-01-17', 'Debet', '30202', '4', '17690000.00', 'PEMBAY. DIVIDEN 2022 IBU NINIEK WIJAYANTI', 31),
(2858, 'BKBN', '0123040', '2023-01-17', 'Kredit', '11110', '4', '17690000.00', '', 31),
(2859, 'BKBN', '0123041', '2023-01-17', 'Debet', '30202', '4', '20570000.00', 'PEMBAY. DIVIDEN 2022 BP. IMAM SANTOSO', 31),
(2860, 'BKBN', '0123041', '2023-01-17', 'Kredit', '11110', '4', '20570000.00', '', 31),
(2861, 'BKBN', '0123042', '2023-01-17', 'Debet', '30202', '4', '22020000.00', 'PEMBAY. DIVIDEN 2022 BP. HAMZAH SULAIMAN', 31),
(2862, 'BKBN', '0123042', '2023-01-17', 'Kredit', '11110', '4', '22020000.00', '', 31),
(2863, 'BKBN', '0123043', '2023-01-18', 'Debet', '62009', '4', '3500.00', 'BY. AUTO DEBET PLN', 31),
(2864, 'BKBN', '0123043', '2023-01-18', 'Kredit', '11110', '4', '3500.00', '', 31),
(2865, 'BKBN', '0123044', '2023-01-18', 'Debet', '62009', '4', '37536569.00', 'BY. LISTRIK 521070520124', 31),
(2866, 'BKBN', '0123044', '2023-01-18', 'Kredit', '11110', '4', '37536569.00', '', 31),
(2867, 'BKBN', '0123045', '2023-01-18', 'Debet', '62009', '4', '3500.00', 'BY. AUTO DEBET PLN', 31),
(2868, 'BKBN', '0123045', '2023-01-18', 'Debet', '62009', '4', '137305.00', 'BY. LISTRIK 521070441098', 31),
(2869, 'BKBN', '0123045', '2023-01-18', 'Kredit', '11110', '4', '140805.00', '', 31),
(2870, 'BMBN', '0123046', '2023-01-20', 'Kredit', '11201', '3', '3115089.00', 'PEMBAY. PIUT DAG MIROTA SAMBILEGI', 31),
(2871, 'BMBN', '0123046', '2023-01-20', 'Debet', '11110', '3', '3115089.00', '', 31),
(2872, 'BKBN', '0123047', '2023-01-20', 'Debet', '72017', '4', '30000.00', 'BY. ADMINISTRASI', 31),
(2873, 'BKBN', '0123047', '2023-01-20', 'Kredit', '11110', '4', '30000.00', '', 31),
(2876, 'BMBN', '0123048', '2023-01-26', 'Kredit', '11109', '3', '50000000.00', 'PEMINDAHAN DANA DARI BCA', 31),
(2877, 'BMBN', '0123048', '2023-01-26', 'Debet', '11110', '3', '50000000.00', '', 31),
(2878, 'BKBN', '0123049', '2023-01-30', 'Debet', '21201', '4', '197194931.00', 'PEMBAY. PPN MASA DESEMBER 2022', 31),
(2879, 'BKBN', '0123049', '2023-01-30', 'Kredit', '11110', '4', '197194931.00', '', 31),
(2880, 'BMBN', '0123050', '2023-01-31', 'Kredit', '81001', '3', '41320.98', 'BUNGA REKENING', 31),
(2881, 'BMBN', '0123050', '2023-01-31', 'Debet', '11110', '3', '41320.98', '', 31),
(2882, 'BKBN', '0123051', '2023-01-31', 'Debet', '91002', '4', '8264.20', 'PAJAK', 31),
(2883, 'BKBN', '0123051', '2023-01-31', 'Kredit', '11110', '4', '8264.20', '', 31),
(2884, 'SA', '', '2023-01-01', 'Debet', '11114', '7', '553411135.81', '', 31),
(2885, 'BMBY', '0123052', '2023-01-01', 'Kredit', '11201', '3', '1273911.00', 'PEMBAY PIUT DAG LAMPUNG TENGAH JAN\'23.FIKRI ', 31),
(2886, 'BMBY', '0123052', '2023-01-01', 'Debet', '11114', '3', '1273911.00', '', 31),
(2887, 'BMBY', '0123053', '2023-01-02', 'Kredit', '11201', '3', '16375000.00', 'PEMBAY PIUT DAG DIY DSK JAN\'23.NOVIANTO', 31),
(2888, 'BMBY', '0123053', '2023-01-02', 'Debet', '11114', '3', '16375000.00', '', 31);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
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
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userId`, `username`, `password`, `name`, `roleId`, `isLogin`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(25, 'admin', '$2y$10$SAvFim22ptA9gHVORtIaru1dn9rhgerJlJCPxRNA02MjQaJnkxawq', 'Tri Cahya Wibawa', 1, 1, 0, 0, '2022-11-21 02:24:48', NULL, NULL),
(26, 'adminkas', '$2y$10$1LEUNRABhviwwADmC02KKuga8FPs60gYWxgeLaysPWWGBz7ZvS.pi', 'Admin Kas', 3, 0, 0, 25, '2022-11-21 08:39:17', 25, '2022-11-23 02:24:10'),
(27, 'adminbank', '$2y$10$s5gqBa.txPnTIwsb0GNA..WO.5nWFbgELXkWFQNbv54P6cFPz/eKS', 'Admin Bank', 4, 0, 0, 25, '2022-11-21 08:39:51', 25, '2022-11-23 02:24:28'),
(28, 'kabag', '$2y$10$6nu8lVNGElzWH9w7OGpv6eLKOhLsEgHcKvGYXDTZ6EcznAtGotU7a', 'Kepala Bagian', 5, 0, 0, 25, '2022-11-23 02:14:35', NULL, NULL),
(29, 'adminpk', '$2y$10$jLKp7VDe8ESadwalwQLS7.L//ktGvxP3LPzM9PjfjnWXalNOR8T2m', 'Admin Piutang Karyawan', 6, 0, 0, 25, '2022-11-24 09:17:06', NULL, NULL),
(30, 'mey', '$2y$10$.RkobikvpKc0OHi9EMGGeemJtfyBQUA6UO0euvuw1ouI9zhi0VwA.', 'Mey', 4, 0, 0, 25, '2023-01-30 03:48:41', NULL, NULL),
(31, 'indra', '$2y$10$fqwLABxgrk6L7qz4ZkwEZO9FiwgIiiYDXYuEvHFlvHklHWmcrwM/a', 'Indra', 5, 1, 0, 25, '2023-01-30 03:49:01', NULL, NULL),
(32, 'silvia', '$2y$10$hTZIvJJaFeBBxQ7eTguPJeUKO6Myx8nX0dwsJZYPBGIZ0q5Ky9r.W', 'Silvia', 6, 0, 0, 25, '2023-01-30 03:49:22', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_dafakun`
--
ALTER TABLE `tbl_dafakun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `tbl_divisi`
--
ALTER TABLE `tbl_divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  ADD PRIMARY KEY (`id_faq`);

--
-- Indexes for table `tbl_items`
--
ALTER TABLE `tbl_items`
  ADD PRIMARY KEY (`itemId`);

--
-- Indexes for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`NIK`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_divisi`
--
ALTER TABLE `tbl_divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  MODIFY `id_faq` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_items`
--
ALTER TABLE `tbl_items`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `roleId` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'role id', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2889;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
