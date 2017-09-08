-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 07 Sep 2017 pada 17.39
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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(12) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_tempat`
--

CREATE TABLE `kategori_tempat` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_tempat`
--

INSERT INTO `kategori_tempat` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Restaurant'),
(2, 'Cafe'),
(3, 'Kaki Lima'),
(4, 'FoodCourt'),
(5, 'Cake and Bakery');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating`
--

CREATE TABLE `rating` (
  `id` int(10) NOT NULL,
  `rating` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tempat`
--

CREATE TABLE `tbl_tempat` (
  `id_tempat` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `alamat_tempat` text NOT NULL,
  `no_tempat` varchar(15) NOT NULL,
  `deskripsi_tempat` text NOT NULL,
  `id_kategori` varchar(255) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `open_time` time NOT NULL,
  `close_time` time NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `wifi` varchar(11) NOT NULL,
  `smoking` varchar(11) NOT NULL,
  `happy_hours` varchar(11) NOT NULL,
  `live_musik` varchar(11) NOT NULL,
  `rooftop` varchar(11) NOT NULL,
  `outdoor` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_tempat`
--

INSERT INTO `tbl_tempat` (`id_tempat`, `nama`, `alamat_tempat`, `no_tempat`, `deskripsi_tempat`, `id_kategori`, `gambar`, `open_time`, `close_time`, `lat`, `lng`, `wifi`, `smoking`, `happy_hours`, `live_musik`, `rooftop`, `outdoor`) VALUES
(1001, 'DON KALIBER 12', 'Jl. Kaliurang No.4-7, Sardonoharjo, Ngaglik, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55581', '0274-2800008', '  Manly culinary spot at northern Jogja. \r\nDisini ada beberapa tenant makanan yang bisa kalian coba :\r\n- twelve monkey\r\n- bubur bulan\r\n- muther panzer\r\n- mie ronggeng\r\n- elliot ness\r\n- don appetite\r\n- madam sus\r\n  ', 'Restaurant', 'DONKALIBER12.jpg', '10:00:00', '11:00:00', -7.707813, 110.410558, 'yes', 'yes', 'no', 'no', 'no', 'yes'),
(1002, 'Martabak Sematjam Warunk', ' Jl.PERUMNAS seturan raya 158 (depan balihai/goebox cafe)sleman jogjakarta', '081222236517', 'Tersedia Berbagai Menu (Martabak,terang bulan,crepes, tipker, nasgor rempah, roti, dimsum, coffe, milk, Noodle kekinian dll)', 'Cake and Bakery', 'MartabakSematjamWarunk.jpg', '03:00:00', '12:00:00', -7.77242, 110.404911, 'no', 'yes', 'no', 'no', 'no', 'yes'),
(1003, 'Soto Ayam Ambengan Cak Ndhut', 'Jl. Parangtritis No.186, Bangunharjo, Sewon, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55187', ' 08111 8111 76', '   Soto denganbumbu rempah nya kenceng, kuah nya tasty dan PAKE KOYA . Porsiannya juga banyak lagi, harga satu porsi soto special dengan isian daging, kulit, telor muda & uritan dibandrol harga 13.000 aja gaes . Wajib cobain nih kalau kalian termasuk penikmat soto   ', 'Kaki Lima', 'SotoAyamAmbeganCakNdhut.jpg', '07:00:00', '09:00:00', -7.827, 110.367372, 'no', 'yes', 'no', 'no', 'no', 'no'),
(1004, 'Mom Milk', 'Jl. Kranggan, Cokrodiningratan, Jetis, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55233', '0899-3663-666', '  Best Milk from Solo. ðŸ“Solo, Semarang, Jakarta Barat, Bekasi, Malang. ', 'Cafe', 'MomMilk.jpg', '11:00:00', '11:00:00', -7.781629, 110.364885, 'yes', 'yes', 'no', 'no', 'no', 'yes'),
(1005, 'Kedai Roti Bakar 543 ', 'Angkringan Jentik, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281', '081223335739', '   Roti Bakar â€¢ Susu Segar â€¢ Indomie â€¢ Rice Bowl â€¢ Dessert      ', 'Restaurant', 'KedaiRotiBakar543Jogja.jpg', '10:00:00', '12:00:00', -7.771697, 110.406157, 'yes', 'yes', 'no', 'no', 'no', 'yes'),
(1006, 'sfas', 'fsafsf', 'sdasdd', '  dsadas  ', 'Please Select', '1515194_1416106622031981_350304391_n.jpg', '00:00:00', '00:00:00', -7.76433, 110.41119, 'no', 'no', 'no', 'no', 'no', 'no');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(3, 'nassiramin', 'saranghantu'),
(4, 'anas', 'saranghantu'),
(5, 'nassiramin', 'sarangha'),
(6, 'anas', 'jerapah'),
(7, 'dimas', 'sarangha'),
(8, 'dimas', 'sarangha'),
(9, 'bayu', 'anassana'),
(10, 'bayu', 'anassana'),
(11, 'vgod', 'anassana'),
(12, 'vgod', 'anassana'),
(13, 'seno', 'anassana'),
(14, 'aji', 'anassana'),
(15, 'aji', 'anassana'),
(16, 'aqua', 'anassana'),
(17, 'acer', 'sarangha');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kategori_tempat`
--
ALTER TABLE `kategori_tempat`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tempat`
--
ALTER TABLE `tbl_tempat`
  ADD PRIMARY KEY (`id_tempat`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kategori_tempat`
--
ALTER TABLE `kategori_tempat`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_tempat`
--
ALTER TABLE `tbl_tempat`
  MODIFY `id_tempat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1007;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
