-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Bulan Mei 2021 pada 15.47
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ekost`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kost`
--

CREATE TABLE `kost` (
  `id_kost` int(11) NOT NULL,
  `id_pemilik` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `tersedia` int(2) NOT NULL,
  `status` enum('Laki-laki','Perempuan','Campur') DEFAULT NULL,
  `fasilitas` text NOT NULL,
  `harga_3bulan` int(9) NOT NULL,
  `harga_6bulan` int(9) NOT NULL,
  `harga_pertahun` int(9) NOT NULL,
  `kontak` varchar(20) NOT NULL,
  `file` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kost`
--

INSERT INTO `kost` (`id_kost`, `id_pemilik`, `nama`, `alamat`, `latitude`, `longitude`, `tersedia`, `status`, `fasilitas`, `harga_3bulan`, `harga_6bulan`, `harga_pertahun`, `kontak`, `file`) VALUES
(2, 5, 'Mekar kost', 'jln indralaya', 0, 0, 9, 'Perempuan', 'dipan', 2000000, 4000000, 6000000, '081366232489', '515052021133842.png'),
(3, 5, 'Izza kost', 'Kertapati', 0, 0, 8, 'Perempuan', 'lemari', 1000000, 2000000, 4000000, '0711516444', '515052021133009.jpg'),
(4, 9, 'Sita Kost', 'Jalan Sumater', 0, 0, 10, 'Perempuan', 'Galon dan Dipan', 0, 2400000, 4600000, '42423414', '915052021152820.png'),
(5, 5, 'Mom Kost', 'Kertapati', 0, 0, 6, 'Perempuan', 'kolam renang', 1000000, 2000000, 3000000, '082179528135', '515052021133020.jpg'),
(9, 11, 'mutiara kost', 'indralaya', 0, 0, 4, 'Perempuan', 'free listrik, dapur umum', 3000000, 5000000, 9000000, '085378505825', '1115052021124208.png'),
(10, 5, 'Halo Kost', 'jln lintas lampung', 0, 0, 18, 'Campur', 'dapur bersama, galon, kipas angin', 0, 2000000, 12000000, '0711516444', '515052021152140.png'),
(11, 9, 'Kucing Kost', 'tapati', 0, 0, 6, 'Laki-laki', 'Lapangan bola', 0, 6000000, 8000000, '23912309219301', '915052021152810.png'),
(13, 12, 'Kostnya Pungmil', 'Alang - Alang Lebar', 0, 0, 10, 'Campur', '5 Kamar untuk perempuan, 5 kamar untuk laki-laki', 0, 4500000, 8700000, '081366282839', '1215052021153837.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilik`
--

CREATE TABLE `pemilik` (
  `id_pemilik` int(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemilik`
--

INSERT INTO `pemilik` (`id_pemilik`, `nama`, `alamat`, `telepon`, `email`, `username`, `password`) VALUES
(1, 'Pemilik Kost', 'Karangbendo Wetan RT. 02 RW.08', '081234567890', 'pemilik@gmail.com', 'pemilik', '58399557dae3c60e23c78606771dfa3d'),
(2, 'Izzati Millah Hanifa', 'Sebrang Ulu 1', '081366232489', 'izzatimillahhanifah@gmail.com', 'izmil', 'a028c66200a8509502ee5d186e5a13fd'),
(3, 'pemilik', 'dmsk', '090', 'ikoo98@gmail.com', 'pemilik', '218140990315bb39d948a523d61549b4'),
(4, 'izzati', 'kertapati', '0711', 'izzati@gmail.com', 'izzati', '72a3cf87bc1f9889b8cf233b828fd153'),
(5, 'Izzati Millah Hanifa', 'kmlkm', '09201', 'izzatimillahhanifah@gmail.com', 'izzatimillh', 'd49147831384d8f43f00db6fd61dfa91'),
(6, 'mil', 'tapati', '0813', 'mil@gmail.com', 'mil', 'da937a066b0348bf22d22c2457b4ba78'),
(7, 'Izzati Millah', 'sumatera', '0711', 'izzatimillah@gmail.com', 'izza', '4b569f5568af7aea0bd5b56c8267d22c'),
(8, 'izza kost', 'abcd', '123', 'umsi@umich.edu', 'izzakost', '76e353e15085ce0597331e03f14f0451'),
(9, 'Sita Kost', 'Jalan Sumater', '0711516444', 'sitakost28@gmail.com', 'sita28', '22eb6d573a7bdfd019b97909cbe36141'),
(10, 'izza kost', 'kertapati', '0711516444', 'umsi@umich.edu', 'izza123', '76e353e15085ce0597331e03f14f0451'),
(11, 'mutiara', 'indralaya', '085378505825', 'mutiarafajaria723@gmail.com', 'mutiara', '02d7d0ea0a12955b91e987e76148c6e1'),
(12, 'Pungmil', 'Alang - Alang Lebar', '081366282839', 'pungmil_kil@gmail.com', 'pungmilkil', '2ccfc56a2583776f0841dfac327bdc43');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `kost`
--
ALTER TABLE `kost`
  ADD PRIMARY KEY (`id_kost`),
  ADD KEY `fk_pemilik` (`id_pemilik`);

--
-- Indeks untuk tabel `pemilik`
--
ALTER TABLE `pemilik`
  ADD PRIMARY KEY (`id_pemilik`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kost`
--
ALTER TABLE `kost`
  MODIFY `id_kost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `pemilik`
--
ALTER TABLE `pemilik`
  MODIFY `id_pemilik` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kost`
--
ALTER TABLE `kost`
  ADD CONSTRAINT `kost_ibfk_1` FOREIGN KEY (`id_pemilik`) REFERENCES `pemilik` (`id_pemilik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
