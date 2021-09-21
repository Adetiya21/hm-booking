-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 21 Sep 2021 pada 16.30
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
-- Database: `db_hmbooking`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `nama`, `username`, `password`) VALUES
(1, 'Admin', '0', '$2y$10$6ujq4CGjxQuMsXIgFQFQ..qGWw5q9jamySymWIbE8K7ANPLR2MY7K');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_booking`
--

CREATE TABLE `tb_booking` (
  `id` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tgl_acara` date NOT NULL,
  `tgl_booking` datetime NOT NULL,
  `alamat_acara` text NOT NULL,
  `alamat_tinggal` text NOT NULL,
  `bukti_transfer` varchar(255) DEFAULT NULL,
  `status` enum('Belum Selesai','Selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_booking`
--

INSERT INTO `tb_booking` (`id`, `id_paket`, `nama`, `no_hp`, `email`, `tgl_acara`, `tgl_booking`, `alamat_acara`, `alamat_tinggal`, `bukti_transfer`, `status`) VALUES
(1, 1, 'User1', '089669432192', 'user1@user.com', '2021-09-28', '2021-09-19 00:00:00', 'Jl Alamat Gg Alamat 1', 'Jl Alamat Gg Alamat 1', '523a57aab1a5bc5e75b4fa0c57d63f2d.png', 'Belum Selesai'),
(3, 7, 'User3', '089669432192', 'user1@user.com', '2021-09-23', '2021-09-19 00:00:00', 'Jl Alamat Gg Alamat 1', 'Jl Alamat Gg Alamat 1', '523a57aab1a5bc5e75b4fa0c57d63f2d.png', 'Selesai'),
(14, 4, 'User2', '089669432192', 'user1@user.com', '2021-09-27', '2021-09-19 00:00:00', 'Jl Alamat Gg Alamat 1', 'Jl Alamat Gg Alamat 1', '523a57aab1a5bc5e75b4fa0c57d63f2d.png', 'Selesai'),
(15, 5, 'User5', '089669432192', 'user1@user.com', '2021-10-03', '2021-09-19 00:00:00', 'Jl Alamat Gg Alamat 1', 'Jl Alamat Gg Alamat 1', '523a57aab1a5bc5e75b4fa0c57d63f2d.png', 'Belum Selesai'),
(20, 1, 'Adetiya', '628123456787', 'adetiyaburhasanp45@gmail.com', '2021-09-30', '2021-09-21 14:30:24', 'Sdttggygb', 'Aderghhvb', '4ade8139d77ef1f424364b8873b93402.jpeg', 'Belum Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_galeri`
--

CREATE TABLE `tb_galeri` (
  `id` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `caption` varchar(50) NOT NULL,
  `kategori` enum('Photo','Video') NOT NULL,
  `status` enum('Non Active','Active') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_galeri`
--

INSERT INTO `tb_galeri` (`id`, `gambar`, `caption`, `kategori`, `status`) VALUES
(1, '6c3c799818c8fc1b51ffd0db9b1e377b.jpg', '', 'Photo', 'Active'),
(2, 'c3b98281ee6782aa3ac8a04c11abfaf2.jpg', '', 'Photo', 'Active'),
(3, 'f48af5a64cf011cd2d42bb338ade99af.jpg', '', 'Photo', 'Active'),
(4, 'd1c2035c93905994c6920a7801112b41.jpg', '', 'Photo', 'Active'),
(5, 'bb76af1bcdf5c464504e2a4dd13792bb.jpg', '', 'Photo', 'Active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_header_landscape`
--

CREATE TABLE `tb_header_landscape` (
  `id` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `status` enum('Non Active','Active') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_header_landscape`
--

INSERT INTO `tb_header_landscape` (`id`, `gambar`, `status`) VALUES
(1, 'landscape.jpeg', 'Active'),
(9, '8e161c208d0d2ee594756686fc0176b1.jpg', 'Active'),
(10, '11c3380d625e6e6a5716e54f7d8215b6.jpg', 'Active'),
(11, '67406e64932bf56f1e33d408180962d1.jpg', 'Non Active'),
(12, '884c05b13a7a903840a2366c83f7e3b8.jpg', 'Active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_header_portrait`
--

CREATE TABLE `tb_header_portrait` (
  `id` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `status` enum('Non Active','Active') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_header_portrait`
--

INSERT INTO `tb_header_portrait` (`id`, `gambar`, `status`) VALUES
(1, 'portrait.jpeg', 'Non Active'),
(2, '47844b34c25f33eddb680821328f1723.jpg', 'Active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `layanan` text NOT NULL,
  `keterangan` text NOT NULL,
  `jml_tim` int(3) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_paket`
--

INSERT INTO `tb_paket` (`id`, `nama`, `harga`, `layanan`, `keterangan`, `jml_tim`, `gambar`) VALUES
(1, 'Paket 1', 1700000, 'Foto Wedding <br> (Resepsi)', '100 Lembar 4R + Album <br>\r\n12 RW + Bingkai', 2, NULL),
(3, 'Paket 2', 2500000, 'Foto Wedding <br> \r\n(Akad + Resepsi)', '100 Lembar 4R + Album <br>\r\n12 RW + Bingkai', 2, NULL),
(4, 'Paket 3', 2800000, 'Foto Wedding <br> \r\nVideo Wedding', 'Video Dokumentasi Max 1 Jam <br>\r\n2 Lembar 8R + Bingkai <br>\r\n100 Lembar 4R + Album <br>\r\n12 R + Bingkai', 3, NULL),
(5, 'Paket 4', 3500000, 'Foto Wedding <br> \r\nVideo Wedding', 'Video Wedding Clip 1-3 Menit <br>\r\nVideo Dokumentasi Max 1 Jam <br>\r\n2 Lembar 8R + Bingkai <br>\r\n100 Lembar 4R + Album <br>\r\n12 RW + Bingkai', 3, NULL),
(7, 'Paket 5', 4000000, 'Foto Wedding <br> \r\nVideo Wedding', 'Video Wedding Clip 2-5 Menit <br>\r\nVideo Dokumentasi Max 2 Jam <br>\r\n2 Lembar 8R + Bingkai <br>\r\n150 Lembar 4R + Album <br>\r\n12 RW + Bingkai', 4, NULL),
(8, 'Paket 6', 4500000, 'Foto Wedding <br> \r\nVideo Wedding', 'Teaser 1 Menit <br>\r\nVideo Wedding Clip 2-5 Menit <br>\r\nVideo Dokumentasi Max 2 Jam <br>\r\n2 Lembar 8R + Bingkai <br>\r\n150 Lembar 4R + Album <br>\r\n12 RW + Bingkai', 4, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tentang`
--

CREATE TABLE `tb_tentang` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tagline` varchar(50) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `tentang` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `ig` varchar(50) DEFAULT NULL,
  `fb` varchar(50) DEFAULT NULL,
  `alamat` text,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_tentang`
--

INSERT INTO `tb_tentang` (`id`, `nama`, `tagline`, `logo`, `tentang`, `no_telp`, `ig`, `fb`, `alamat`, `email`) VALUES
(1, 'HM Project', 'Wedding Photographer', 'dfdbbee3ef36488862260448f7fcc508.png', '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ex, quam. Itaque porro laboriosam architecto quidem consequuntur consectetur dicta maxime, non, voluptatum culpa magnam molestiae, eum cum maiores consequatur libero eos.</p>', '628123456789', 'hmproject_art', '', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paket` (`id_paket`);

--
-- Indeks untuk tabel `tb_galeri`
--
ALTER TABLE `tb_galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_header_landscape`
--
ALTER TABLE `tb_header_landscape`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_header_portrait`
--
ALTER TABLE `tb_header_portrait`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_tentang`
--
ALTER TABLE `tb_tentang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_booking`
--
ALTER TABLE `tb_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tb_galeri`
--
ALTER TABLE `tb_galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_header_landscape`
--
ALTER TABLE `tb_header_landscape`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_header_portrait`
--
ALTER TABLE `tb_header_portrait`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_tentang`
--
ALTER TABLE `tb_tentang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD CONSTRAINT `tb_booking_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `tb_paket` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
