-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 01 Jul 2024 pada 02.08
-- Versi server: 8.0.30
-- Versi PHP: 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restoran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_pelanggan`
--

CREATE TABLE `daftar_pelanggan` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telpn` int NOT NULL,
  `kapasitas_id` int NOT NULL,
  `lokasi_id` int NOT NULL,
  `tanggal_pesan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `daftar_pelanggan`
--

INSERT INTO `daftar_pelanggan` (`id`, `nama`, `alamat`, `no_telpn`, `kapasitas_id`, `lokasi_id`, `tanggal_pesan`) VALUES
(11, 'farel', 'genteng', 8090909, 5, 8, '2024-06-30'),
(16, 'jeki', 'banyuwangi', 80909, 5, 8, '1999-10-20'),
(18, 'alung', 'banyuwangi', 80909, 6, 8, '0442-05-04'),
(19, 'alexander', 'banyuwangi', 8090909, 5, 9, '1222-12-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kapasitas_meja`
--

CREATE TABLE `kapasitas_meja` (
  `id` int NOT NULL,
  `kapasitas` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `kapasitas_meja`
--

INSERT INTO `kapasitas_meja` (`id`, `kapasitas`) VALUES
(2, 6),
(5, 20),
(6, 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `koki`
--

CREATE TABLE `koki` (
  `id` int NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `makanan_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `koki`
--

INSERT INTO `koki` (`id`, `nama`, `makanan_id`) VALUES
(3, 'alexander', NULL),
(4, 'alung', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int NOT NULL,
  `lokasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id`, `lokasi`) VALUES
(8, 'Main Dining Room'),
(9, 'Private room'),
(12, 'ruang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int NOT NULL,
  `makanan` varchar(100) NOT NULL,
  `koki_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `makanan`, `koki_id`) VALUES
(23, 'wagyu', 3),
(24, 'wagyu A4', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `daftar_pelanggan`
--
ALTER TABLE `daftar_pelanggan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lokasi` (`lokasi_id`),
  ADD KEY `kapasitas_id` (`kapasitas_id`);

--
-- Indeks untuk tabel `kapasitas_meja`
--
ALTER TABLE `kapasitas_meja`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `koki`
--
ALTER TABLE `koki`
  ADD PRIMARY KEY (`id`),
  ADD KEY `makanan_id` (`makanan_id`);

--
-- Indeks untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `koki_id` (`koki_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `daftar_pelanggan`
--
ALTER TABLE `daftar_pelanggan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `kapasitas_meja`
--
ALTER TABLE `kapasitas_meja`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `koki`
--
ALTER TABLE `koki`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `daftar_pelanggan`
--
ALTER TABLE `daftar_pelanggan`
  ADD CONSTRAINT `daftar_pelanggan_ibfk_2` FOREIGN KEY (`lokasi_id`) REFERENCES `lokasi` (`id`),
  ADD CONSTRAINT `daftar_pelanggan_ibfk_3` FOREIGN KEY (`kapasitas_id`) REFERENCES `kapasitas_meja` (`id`);

--
-- Ketidakleluasaan untuk tabel `koki`
--
ALTER TABLE `koki`
  ADD CONSTRAINT `koki_ibfk_1` FOREIGN KEY (`makanan_id`) REFERENCES `menu` (`id`);

--
-- Ketidakleluasaan untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`koki_id`) REFERENCES `koki` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
