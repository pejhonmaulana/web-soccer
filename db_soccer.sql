-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jun 2023 pada 04.18
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_soccer`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_club`
--

CREATE TABLE `tb_club` (
  `id_club` int(11) NOT NULL,
  `nama_club` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_club`
--

INSERT INTO `tb_club` (`id_club`, `nama_club`, `kota`) VALUES
(1, 'Arema Malang', 'Malang'),
(2, 'Persela', 'Lamongan'),
(3, 'Madura United', 'Bangkalan'),
(4, 'Persija', 'Jakarta'),
(5, 'Persib', 'Bandung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_skor`
--

CREATE TABLE `tb_skor` (
  `id_skor` int(11) NOT NULL,
  `id_clubA` int(11) DEFAULT NULL,
  `id_clubB` int(11) DEFAULT NULL,
  `skorA` int(11) DEFAULT NULL,
  `skorB` int(11) DEFAULT NULL,
  `pemenang_id` int(11) DEFAULT NULL,
  `skor_pemenang` int(11) DEFAULT NULL,
  `poin_pemenang` int(11) DEFAULT NULL,
  `kalah_id` int(11) DEFAULT NULL,
  `skor_kalah` int(11) DEFAULT NULL,
  `poin_kalah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_skor`
--

INSERT INTO `tb_skor` (`id_skor`, `id_clubA`, `id_clubB`, `skorA`, `skorB`, `pemenang_id`, `skor_pemenang`, `poin_pemenang`, `kalah_id`, `skor_kalah`, `poin_kalah`) VALUES
(19, 1, 2, 4, 1, 1, 4, 3, 2, 1, 0),
(20, 3, 4, 1, 2, 3, 1, 0, 4, 2, 0),
(24, 4, 5, 4, 3, 4, 4, 3, 5, 3, 0),
(25, 3, 2, 1, 3, 2, 3, 3, 3, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_club`
--
ALTER TABLE `tb_club`
  ADD PRIMARY KEY (`id_club`);

--
-- Indeks untuk tabel `tb_skor`
--
ALTER TABLE `tb_skor`
  ADD PRIMARY KEY (`id_skor`),
  ADD KEY `FK_tb_skor_tb_club` (`id_clubA`),
  ADD KEY `FK_tb_skor_tb_club_2` (`id_clubB`),
  ADD KEY `FK_tb_skor_tb_club_3` (`pemenang_id`),
  ADD KEY `FK_tb_skor_tb_club_kalah` (`kalah_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_club`
--
ALTER TABLE `tb_club`
  MODIFY `id_club` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_skor`
--
ALTER TABLE `tb_skor`
  MODIFY `id_skor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_skor`
--
ALTER TABLE `tb_skor`
  ADD CONSTRAINT `FK_tb_skor_tb_club` FOREIGN KEY (`id_clubA`) REFERENCES `tb_club` (`id_club`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_tb_skor_tb_club_2` FOREIGN KEY (`id_clubB`) REFERENCES `tb_club` (`id_club`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_tb_skor_tb_club_3` FOREIGN KEY (`pemenang_id`) REFERENCES `tb_club` (`id_club`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_tb_skor_tb_club_kalah` FOREIGN KEY (`kalah_id`) REFERENCES `tb_club` (`id_club`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
