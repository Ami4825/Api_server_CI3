-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Des 2022 pada 08.41
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `submissions`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_product`
--

CREATE TABLE `hasil_product` (
  `id` int(11) NOT NULL,
  `id_kups` int(11) NOT NULL,
  `nama_product` varchar(255) NOT NULL,
  `jenis_product` varchar(255) NOT NULL,
  `jumlah_produksi` varchar(255) NOT NULL,
  `harga_satuan` varchar(255) NOT NULL,
  `komoditas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hasil_product`
--

INSERT INTO `hasil_product` (`id`, `id_kups`, `nama_product`, `jenis_product`, `jumlah_produksi`, `harga_satuan`, `komoditas`) VALUES
(1, 2, 'Madu rasa duren', 'Bahan jadi', '60', 'Rp 30.000', 'madu'),
(2, 1, 'Kopi Sako', 'Produck jadi', '60 kg', 'RP 30.000', 'Kopi'),
(3, 1, 'Kopi Sasa', 'produk jadi', '90 kg', 'Rp 25.000', 'kopi'),
(4, 1, 'Kopi Tumulawak', 'produk jadi', '80 kg', 'Rp 20.000', 'kopi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, '$2y$10$JfiajfuWprW1QmUTflVRfOw/DgrqmEEAp', 1, 0, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kups`
--

CREATE TABLE `kups` (
  `id` int(11) NOT NULL,
  `Nama_kups` varchar(255) NOT NULL,
  `tahun_berdiri` varchar(255) NOT NULL,
  `Nomor_SK` varchar(255) NOT NULL,
  `nama_izin` varchar(255) NOT NULL,
  `Provinsi` varchar(255) NOT NULL,
  `kabupaten` varchar(255) NOT NULL,
  `Kecamatan` varchar(255) NOT NULL,
  `Desa` varchar(255) NOT NULL,
  `Potensi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kups`
--

INSERT INTO `kups` (`id`, `Nama_kups`, `tahun_berdiri`, `Nomor_SK`, `nama_izin`, `Provinsi`, `kabupaten`, `Kecamatan`, `Desa`, `Potensi`) VALUES
(1, 'Pemuda Adat Kasepuhan Karang', '2018', 'SK.6744/MENLHK-PSKL/KUM.1/12/2016', 'MHA Kasepuhan Karang', 'BANTEN', 'Lebak', 'Muncang', 'Jagaraksa', 'kopi'),
(2, 'KTH Werdhi Wana Rta', '2018', 'SK. 8881/MENLHK-PSKL/PKPS/PSL.0/12/2018  ', 'KTH Werdhi Wana Rta', 'BALI', 'JEMBRANA', 'Mendoyo', ' Kel. Tegalcangkring', 'Madu dan kopi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `limits`
--

CREATE TABLE `limits` (
  `id` int(11) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `count` int(10) NOT NULL,
  `hour_started` int(11) NOT NULL,
  `api_key` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `limits`
--

INSERT INTO `limits` (`id`, `uri`, `count`, `hour_started`, `api_key`) VALUES
(1, 'uri:api/Mahasiswa/index:get', 18, 1663647019, 'joss12'),
(2, 'uri:Usaha/index:get', 7, 1663826908, 'joss12'),
(3, 'uri:Usaha/index:get', 2, 1671521816, '$2y$10$JfiajfuWprW1QmUTflVRfOw/DgrqmEEAp'),
(4, 'uri:Produk/index:get', 1, 1671521914, '$2y$10$JfiajfuWprW1QmUTflVRfOw/DgrqmEEAp');

-- --------------------------------------------------------

--
-- Struktur dari tabel `usaha`
--

CREATE TABLE `usaha` (
  `id` int(11) NOT NULL,
  `SurelEmail` varchar(255) NOT NULL,
  `NamaLembaga` varchar(255) NOT NULL,
  `NomorSuratKeputusan` varchar(255) NOT NULL,
  `telpon` varchar(13) NOT NULL,
  `id_product` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `update_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `usaha`
--

INSERT INTO `usaha` (`id`, `SurelEmail`, `NamaLembaga`, `NomorSuratKeputusan`, `telpon`, `id_product`, `created_at`, `update_at`) VALUES
(2, 'bobbybadjeber@gmail.com', 'LPHD TANJUNG HARAPAN', 'SK. 5812/MENLHK-PSKL/PKPS/PSL.0/9/2018', '081311206663', 1, 2147483647, 2147483647),
(9, 'Azmibahar48@gmail.com', 'Lembaga 1', '11', '081293446565', 0, 1664270474, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `hasil_product`
--
ALTER TABLE `hasil_product`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kups`
--
ALTER TABLE `kups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `limits`
--
ALTER TABLE `limits`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `usaha`
--
ALTER TABLE `usaha`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `hasil_product`
--
ALTER TABLE `hasil_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kups`
--
ALTER TABLE `kups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `limits`
--
ALTER TABLE `limits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `usaha`
--
ALTER TABLE `usaha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
