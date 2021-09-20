-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 20 Jul 2020 pada 17.17
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tkbangunan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `nama`, `username`, `password`) VALUES
(1, 'Admin 1', 'admin', '$2y$10$94Dm7hGLu7SARBVm4bHPGe/XweoDb19GFc0/AM/OIplyuR3fkuE.u');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga_barang` bigint(20) NOT NULL,
  `stok_barang` int(4) NOT NULL,
  `tgl` datetime NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `id_satuan`, `nama_barang`, `harga_barang`, `stok_barang`, `tgl`, `deskripsi`, `gambar`, `slug`) VALUES
(1, 1, 'Paku Kayu Ukuran 1.5inc - 2inc - 2.5inc - 3inc', 18000, 90, '2020-07-20 16:09:56', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n', '5208615b91bfcd27852ec90c3b4cb1dc.jpeg', 'paku-kayu-ukuran-15inc-2inc-25inc-3inc'),
(2, 2, 'Paku Beton', 25000, 100, '2020-07-20 15:26:22', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n', '548aebc78811c243f5740112843c38a1.jpeg', 'paku-beton'),
(3, 3, 'Wastafel', 200000, 100, '2020-07-20 15:28:13', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n', '4e2166fafd4695c31adcc48114c73925.png', 'wastafel'),
(4, 4, 'Ember Kecil', 15000, 100, '2020-07-20 15:29:35', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n', 'e061914d1d2e553057c86d99a56f1c3e.jpg', 'ember-kecil'),
(5, 11, 'Plastik Cor', 7000, 99, '2020-07-20 15:32:13', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n', 'e2b1b1765d58d0241812c6fd03443657.jpg', 'plastik-cor'),
(6, 4, 'Terpal 3m X 4m', 70000, 98, '2020-07-20 15:33:27', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n', '08996399361ec7467843eb333d7a3228.jpeg', 'terpal-3m-x-4m'),
(7, 11, 'Geotextille lebar 4m', 130000, 98, '2020-07-20 15:35:15', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n', '0cd0caad44bafd32cb9f67674b3e5200.jpg', 'geotextille-lebar-4m'),
(8, 5, 'Triplek Tebal Ukuran 3mm', 53000, 89, '2020-07-20 15:37:25', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n', '46aea18c3613fd6582410d9a73b1912e.jpeg', 'triplek-tebal-ukuran-3mm'),
(9, 7, 'Cat Kayu', 40000, 100, '2020-07-20 15:39:37', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n', '037eec0c2be8c78f39efbe8022b5f913.jpg', 'cat-kayu'),
(10, 5, 'Papan Mal', 13000, 100, '2020-07-20 15:41:04', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n', '4f70c953299b3f18035f9c4f6040473d.jpg', 'papan-mal'),
(11, 6, 'Cerucuk Ukuran 5.7', 7000, 99, '2020-07-20 15:44:27', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n', '1244c2d8f23e12109c963592e4b8861c.jpg', 'cerucuk-ukuran-57'),
(12, 6, 'Cerucuk Ukuran 6.8', 8000, 100, '2020-07-20 15:47:47', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n', '849e5f36cf70ff58a53418e394f74f55.jpg', 'cerucuk-ukuran-68'),
(13, 6, 'Cerucuk Ukuran 8.10', 10000, 100, '2020-07-20 15:48:36', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n', 'c78592edc38c4ae1ade2bd05e89d4be9.jpg', 'cerucuk-ukuran-810'),
(14, 8, 'Semen Holcim 4kg', 64000, 89, '2020-07-20 15:52:16', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n', 'bd2d751d0d9607a00f513218d405c7fe.jpg', 'semen-holcim-4kg'),
(15, 8, 'Semen Holcim 50kg', 72000, 95, '2020-07-20 15:52:53', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n', '4cffe2b756413907a6186d5e546e12b0.jpeg', 'semen-holcim-50kg'),
(16, 9, 'Batu Beton Ukuran 1cm2', 250000, 96, '2020-07-20 16:09:19', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n', '17db1b6c0523a66e56e69776fdd17c02.jpeg', 'batu-beton-ukuran-1cm2'),
(17, 9, 'Pasir Halus - Kasar', 130000, 99, '2020-07-20 22:08:07', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n', '403c5dad786265d44ff74ad19e410b23.jpg', 'pasir-halus-kasar'),
(18, 10, 'Thinner', 20000, 86, '2020-07-20 16:04:28', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n', '688d003dc1c4cb9ae559092b2b69890b.jpg', 'thinner');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gambar_barang`
--

CREATE TABLE `tb_gambar_barang` (
  `id_gambar` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id_invoice` int(11) NOT NULL,
  `no_invoice` varchar(50) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `tgl` datetime NOT NULL,
  `status` enum('Menunggu Konfirmasi','Proses','Dikirim','Selesai','Dibatalkan') NOT NULL,
  `total` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `no_invoice` varchar(50) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty` int(3) NOT NULL,
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `tb_pesanan`
--
DELIMITER $$
CREATE TRIGGER `stok` AFTER INSERT ON `tb_pesanan` FOR EACH ROW BEGIN
 UPDATE tb_barang SET stok_barang=stok_barang-NEW.qty
 WHERE id_barang=NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_satuan`
--

CREATE TABLE `tb_satuan` (
  `id_satuan` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_satuan`
--

INSERT INTO `tb_satuan` (`id_satuan`, `satuan`) VALUES
(1, 'kg'),
(2, 'kotak'),
(3, 'biji'),
(4, 'buah'),
(5, 'keping'),
(6, 'batang'),
(7, 'kaleng'),
(8, 'zak'),
(9, 'pickup'),
(10, 'botol'),
(11, 'm');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_toko`
--

CREATE TABLE `tb_toko` (
  `id_toko` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `no_telp` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `ig` varchar(100) NOT NULL,
  `fb` varchar(100) NOT NULL,
  `iframe` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_toko`
--

INSERT INTO `tb_toko` (`id_toko`, `nama`, `deskripsi`, `keterangan`, `gambar`, `no_telp`, `email`, `alamat`, `ig`, `fb`, `iframe`) VALUES
(1, 'Bangunan', '<p>lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem&nbsp;lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem</p>\r\n', '<p>Jam Buka Toko : 08.00-18.00 Setiap Senin - Jumat<br />\r\nMinggu: Tutup</p>\r\n', 'e9a37426d0f23fa3f77c9c85302bc605.png', '081234567890', 'email@emailtoko.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'https://instagram.com/user', 'https://facebook.com/user', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31918.540246585926!2d109.3369856!3d-0.036044799999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e1d59bda5d0cadd%3A0x5217d4caea80b3d0!2sAyani%20Megamall%20Pontianak!5e0!3m2!1sid!2sid!4v1595080131983!5m2!1sid!2sid\" width=\"100%\" height=\"450px\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `slug` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `email`, `no_telp`, `alamat`, `password`, `slug`) VALUES
(5, 'User1', 'user1@user.com', '08123456789', 'Jalan', '$2y$10$Z3YcSZjZ.tyxETWpMXFaxu87OS9auzTu7xPOc3qaTfof2HR8tnzfW', ''),
(6, 'User2', 'user2@user.com', '', '', '$2y$10$FCZ3LDBMkL/ZyTHMVjVZluFB2sYMxn2Pz97lf21t0MgzH6zZCOneu', 'user2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_satuan` (`id_satuan`);

--
-- Indeks untuk tabel `tb_gambar_barang`
--
ALTER TABLE `tb_gambar_barang`
  ADD PRIMARY KEY (`id_gambar`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`no_invoice`) USING BTREE,
  ADD UNIQUE KEY `id_invoice` (`id_invoice`),
  ADD KEY `email_user` (`email_user`);

--
-- Indeks untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `no_invoice` (`no_invoice`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `tb_satuan`
--
ALTER TABLE `tb_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indeks untuk tabel `tb_toko`
--
ALTER TABLE `tb_toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_gambar_barang`
--
ALTER TABLE `tb_gambar_barang`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_satuan`
--
ALTER TABLE `tb_satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_toko`
--
ALTER TABLE `tb_toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD CONSTRAINT `tb_barang_ibfk_1` FOREIGN KEY (`id_satuan`) REFERENCES `tb_satuan` (`id_satuan`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_gambar_barang`
--
ALTER TABLE `tb_gambar_barang`
  ADD CONSTRAINT `tb_gambar_barang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD CONSTRAINT `tb_invoice_ibfk_1` FOREIGN KEY (`email_user`) REFERENCES `tb_user` (`email`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD CONSTRAINT `tb_pesanan_ibfk_3` FOREIGN KEY (`no_invoice`) REFERENCES `tb_invoice` (`no_invoice`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_pesanan_ibfk_4` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
