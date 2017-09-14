-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14 Sep 2017 pada 16.49
-- Versi Server: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuliner`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int(20) NOT NULL,
  `nama_fasilitas` varchar(100) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `nama_fasilitas`, `url`) VALUES
(1, 'Wifi', ''),
(2, 'Smoking Room', ''),
(4, 'Live Musik', ''),
(5, 'Rooftop', ''),
(6, 'Outdoor', ''),
(7, 'Tempat Ibadah', ''),
(8, 'Toilet', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga`
--

CREATE TABLE `harga` (
  `id_harga` int(11) NOT NULL,
  `harga` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `harga`
--

INSERT INTO `harga` (`id_harga`, `harga`) VALUES
(1, '5.000-20.000'),
(2, '20.000-50.000'),
(4, '>50.000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pengguna`
--

CREATE TABLE `jenis_pengguna` (
  `id_jenis_pengguna` int(20) NOT NULL,
  `nama_jenis_pengguna` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_tempat`
--

CREATE TABLE `kategori_tempat` (
  `id_kategori_tempat` int(20) NOT NULL,
  `nama_kategori_tempat` varchar(100) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_tempat`
--

INSERT INTO `kategori_tempat` (`id_kategori_tempat`, `nama_kategori_tempat`, `url`) VALUES
(1, 'Restaurant', ''),
(2, 'Cafe', ''),
(3, 'Kaki Lima', ''),
(4, 'FoodCourt', ''),
(5, 'Cake and Bakery', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `relasi_foto_tempat`
--

CREATE TABLE `relasi_foto_tempat` (
  `id_relasi_foto_tempat` int(20) NOT NULL,
  `url` varchar(255) NOT NULL,
  `id_user` int(20) NOT NULL,
  `id_tempat` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `relasi_tempat_fasilitas`
--

CREATE TABLE `relasi_tempat_fasilitas` (
  `id_relasi_tempat_fasilitas` int(20) NOT NULL,
  `id_tempat` int(20) NOT NULL,
  `id_fasilitas` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `review`
--

CREATE TABLE `review` (
  `id_review` int(20) NOT NULL,
  `id_user` int(20) NOT NULL,
  `id_tempat` int(20) NOT NULL,
  `isi` text NOT NULL,
  `like` int(20) NOT NULL,
  `rating_tempat` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tempat`
--

CREATE TABLE `tbl_tempat` (
  `id_tempat` int(20) NOT NULL,
  `nama_tempat` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_kategori_tempat` varchar(20) NOT NULL,
  `url` varchar(255) NOT NULL,
  `open_time` time NOT NULL,
  `close_time` time NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `id_harga` varchar(100) NOT NULL,
  `status` int(20) NOT NULL,
  `rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tempat`
--

INSERT INTO `tbl_tempat` (`id_tempat`, `nama_tempat`, `alamat`, `no_telp`, `deskripsi`, `id_kategori_tempat`, `url`, `open_time`, `close_time`, `lat`, `lng`, `id_harga`, `status`, `rating`) VALUES
(1001, 'DON KALIBER 12', 'Jl. Kaliurang No.4-7, Sardonoharjo, Ngaglik, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55581', '0274-2800008', '  Manly culinary spot at northern Jogja. \r\nDisini ada beberapa tenant makanan yang bisa kalian coba :\r\n- twelve monkey\r\n- bubur bulan\r\n- muther panzer\r\n- mie ronggeng\r\n- elliot ness\r\n- don appetite\r\n- madam sus\r\n  ', 'Restaurant', 'DONKALIBER12.jpg', '10:00:00', '11:00:00', -7.707813, 110.410558, '', 0, 0),
(1002, 'Martabak Sematjam Warunk', ' Jl.PERUMNAS seturan raya 158 (depan balihai/goebox cafe)sleman jogjakarta', '081222236517', 'Tersedia Berbagai Menu (Martabak,terang bulan,crepes, tipker, nasgor rempah, roti, dimsum, coffe, milk, Noodle kekinian dll)', 'Cake and Bakery', 'MartabakSematjamWarunk.jpg', '03:00:00', '12:00:00', -7.77242, 110.404911, '', 0, 0),
(1003, 'Soto Ayam Ambengan Cak Ndhut', 'Jl. Parangtritis No.186, Bangunharjo, Sewon, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55187', ' 08111 8111 76', '   Soto denganbumbu rempah nya kenceng, kuah nya tasty dan PAKE KOYA . Porsiannya juga banyak lagi, harga satu porsi soto special dengan isian daging, kulit, telor muda & uritan dibandrol harga 13.000 aja gaes . Wajib cobain nih kalau kalian termasuk penikmat soto   ', 'Kaki Lima', 'SotoAyamAmbeganCakNdhut.jpg', '07:00:00', '09:00:00', -7.827, 110.367372, '', 0, 0),
(1004, 'Mom Milk', 'Jl. Kranggan, Cokrodiningratan, Jetis, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55233', '0899-3663-666', '  Best Milk from Solo. ðŸ“Solo, Semarang, Jakarta Barat, Bekasi, Malang. ', 'Cafe', 'MomMilk.jpg', '11:00:00', '11:00:00', -7.781629, 110.364885, '', 0, 0),
(1005, 'Kedai Roti Bakar 543 ', 'Angkringan Jentik, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281', '081223335739', '   Roti Bakar â€¢ Susu Segar â€¢ Indomie â€¢ Rice Bowl â€¢ Dessert      ', 'Restaurant', 'KedaiRotiBakar543Jogja.jpg', '10:00:00', '12:00:00', -7.771697, 110.406157, '', 0, 0),
(1006, 'sfas', 'fsafsf', 'sdasdd', '  dsadas  ', 'Please Select', '1515194_1416106622031981_350304391_n.jpg', '00:00:00', '00:00:00', -7.76433, 110.41119, '', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(20) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `url` varchar(255) NOT NULL,
  `id_jenis_pengguna` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama_user`, `username`, `password`, `url`, `id_jenis_pengguna`) VALUES
(3, 'nassiramin', 'saranghantu', '', '', 0),
(4, 'anas', 'saranghantu', '', '', 0),
(5, 'nassiramin', 'sarangha', '', '', 0),
(6, 'anas', 'jerapah', '', '', 0),
(7, 'dimas', 'sarangha', '', '', 0),
(8, 'dimas', 'sarangha', '', '', 0),
(9, 'bayu', 'anassana', '', '', 0),
(10, 'bayu', 'anassana', '', '', 0),
(11, 'vgod', 'anassana', '', '', 0),
(12, 'vgod', 'anassana', '', '', 0),
(13, 'seno', 'anassana', '', '', 0),
(14, 'aji', 'anassana', '', '', 0),
(15, 'aji', 'anassana', '', '', 0),
(16, 'aqua', 'anassana', '', '', 0),
(17, 'acer', 'sarangha', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`id_harga`);

--
-- Indexes for table `jenis_pengguna`
--
ALTER TABLE `jenis_pengguna`
  ADD PRIMARY KEY (`id_jenis_pengguna`);

--
-- Indexes for table `kategori_tempat`
--
ALTER TABLE `kategori_tempat`
  ADD PRIMARY KEY (`id_kategori_tempat`);

--
-- Indexes for table `relasi_tempat_fasilitas`
--
ALTER TABLE `relasi_tempat_fasilitas`
  ADD PRIMARY KEY (`id_relasi_tempat_fasilitas`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`);

--
-- Indexes for table `tbl_tempat`
--
ALTER TABLE `tbl_tempat`
  ADD PRIMARY KEY (`id_tempat`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `harga`
--
ALTER TABLE `harga`
  MODIFY `id_harga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `jenis_pengguna`
--
ALTER TABLE `jenis_pengguna`
  MODIFY `id_jenis_pengguna` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kategori_tempat`
--
ALTER TABLE `kategori_tempat`
  MODIFY `id_kategori_tempat` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `relasi_tempat_fasilitas`
--
ALTER TABLE `relasi_tempat_fasilitas`
  MODIFY `id_relasi_tempat_fasilitas` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_tempat`
--
ALTER TABLE `tbl_tempat`
  MODIFY `id_tempat` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1007;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
