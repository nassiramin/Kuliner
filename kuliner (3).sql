-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25 Okt 2017 pada 18.51
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
(1, 'Wifi', 'wifi-connection-signal-symbol (1).png'),
(2, 'Smoking Room', 'cigarette.png'),
(3, 'Live Music', 'live-show-microphone.png'),
(4, 'Rooftop', 'broken-roof.png'),
(5, 'Outdoor', 'picnic.png'),
(6, 'Tempat Ibadah', 'window.png'),
(7, 'Tempat Meeting', 'meeting-room.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga`
--

CREATE TABLE `harga` (
  `id_harga` int(20) NOT NULL,
  `harga` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `harga`
--

INSERT INTO `harga` (`id_harga`, `harga`) VALUES
(1, 'Rp.5000 - Rp.15.000 / orang'),
(2, 'Rp.15.000 - Rp.30.000 /orang'),
(3, '> Rp.30.000 /orang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pengguna`
--

CREATE TABLE `jenis_pengguna` (
  `id_jenis_pengguna` int(20) NOT NULL,
  `nama_jenis_pengguna` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_pengguna`
--

INSERT INTO `jenis_pengguna` (`id_jenis_pengguna`, `nama_jenis_pengguna`) VALUES
(1, 'admin'),
(2, 'user');

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
(1, 'Restaurant / Tempat Makan', 'makan.jpg'),
(2, 'Coffeshop', 'coffe.jpg'),
(3, 'Kaki Lima', 'kakilima.jpg'),
(4, 'FoodCourt', 'foodcourt.jpg'),
(5, 'Cake and Bakery', 'cake.jpg');

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

--
-- Dumping data untuk tabel `relasi_tempat_fasilitas`
--

INSERT INTO `relasi_tempat_fasilitas` (`id_relasi_tempat_fasilitas`, `id_tempat`, `id_fasilitas`) VALUES
(6, 1001, 1),
(7, 1001, 2),
(8, 1001, 5),
(9, 1001, 6),
(10, 1002, 2),
(11, 1002, 5),
(12, 1003, 2),
(13, 1003, 5),
(14, 1004, 1),
(15, 1004, 2),
(16, 1004, 5),
(17, 1004, 6),
(18, 1005, 1),
(19, 1005, 2),
(20, 1005, 3),
(21, 1005, 5),
(22, 1005, 6),
(23, 1006, 1),
(24, 1006, 2),
(25, 1007, 2),
(26, 1007, 5),
(27, 1008, 1),
(28, 1008, 2),
(29, 1008, 3),
(30, 1008, 5),
(31, 1008, 6),
(32, 1008, 7),
(33, 1009, 1),
(34, 1009, 2),
(35, 1009, 7),
(39, 1010, 1),
(40, 1010, 2),
(41, 1010, 3),
(42, 1011, 2),
(43, 1013, 1),
(44, 1013, 2),
(45, 1013, 5),
(46, 1013, 6),
(47, 1014, 1),
(48, 1014, 2),
(49, 1014, 6),
(50, 1015, 1),
(51, 1015, 6),
(52, 1016, 1),
(53, 1017, 1),
(54, 1017, 6),
(55, 1018, 1),
(56, 1018, 2),
(57, 1019, 1),
(58, 1019, 2),
(59, 1020, 1),
(60, 1020, 2),
(61, 1020, 5),
(62, 1021, 5),
(63, 1022, 5),
(64, 1023, 5),
(65, 1024, 1),
(66, 1024, 2),
(67, 1024, 6),
(68, 1024, 7),
(69, 1025, 5),
(70, 1025, 6),
(71, 1026, 1),
(72, 1026, 2),
(73, 1026, 5),
(74, 1027, 1),
(75, 1027, 2),
(76, 1027, 5),
(77, 1028, 1),
(78, 1028, 2),
(79, 1028, 5),
(80, 1029, 1),
(81, 1029, 2),
(82, 1029, 5),
(83, 1030, 1),
(84, 1030, 6),
(87, 1031, 1),
(88, 1031, 2),
(89, 1031, 5),
(93, 1032, 1),
(94, 1032, 2),
(95, 1032, 5),
(96, 1033, 1),
(97, 1033, 2),
(98, 1033, 5),
(99, 1034, 1),
(100, 1034, 2),
(101, 1034, 3),
(102, 1034, 5),
(103, 1035, 1),
(104, 1035, 2),
(105, 1035, 3),
(106, 1035, 4),
(107, 1035, 6),
(108, 1036, 1),
(109, 1036, 2),
(110, 1036, 3),
(111, 1036, 4),
(112, 1036, 5),
(113, 1037, 1),
(114, 1037, 2),
(115, 1037, 3),
(116, 1037, 5),
(117, 1037, 6),
(118, 1038, 1),
(119, 1038, 2),
(120, 1038, 3),
(121, 1038, 6),
(122, 1039, 1),
(123, 1039, 2),
(124, 1039, 3),
(125, 1039, 4),
(126, 1039, 5),
(127, 1039, 6),
(128, 1040, 1),
(129, 1040, 2),
(130, 1041, 1),
(131, 1043, 1),
(133, 1044, 2),
(134, 1045, 2),
(135, 1046, 2),
(136, 1047, 2),
(137, 1048, 2),
(138, 1049, 2),
(139, 1050, 1),
(140, 1050, 2),
(141, 1050, 5),
(142, 1051, 1),
(143, 1051, 2),
(144, 1051, 3),
(145, 1051, 5),
(146, 1052, 1),
(147, 1052, 2),
(148, 1052, 5),
(149, 1053, 1),
(150, 1053, 2),
(151, 1053, 3),
(152, 1053, 5),
(153, 1054, 1),
(154, 1054, 2),
(155, 1054, 3),
(156, 1054, 5),
(157, 1054, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `review`
--

CREATE TABLE `review` (
  `id_review` int(20) NOT NULL,
  `id_user` int(20) NOT NULL,
  `id_tempat` int(20) NOT NULL,
  `isi` text NOT NULL,
  `suka` int(20) NOT NULL,
  `rating_tempat` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempat`
--

CREATE TABLE `tempat` (
  `id_tempat` int(20) NOT NULL,
  `nama_tempat` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_kategori_tempat` int(20) NOT NULL,
  `url` varchar(255) NOT NULL,
  `open_time` time NOT NULL,
  `close_time` time NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `id_harga` int(20) NOT NULL,
  `status` int(20) NOT NULL,
  `rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tempat`
--

INSERT INTO `tempat` (`id_tempat`, `nama_tempat`, `alamat`, `no_telp`, `deskripsi`, `id_kategori_tempat`, `url`, `open_time`, `close_time`, `lat`, `lng`, `id_harga`, `status`, `rating`) VALUES
(1001, 'DON KALIBER 12', 'Jl. Kaliurang No.4-7, Sardonoharjo, Ngaglik, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55581', '0274-2800008', '  Manly culinary spot at northern Jogja. \r\nDisini ada beberapa tenant makanan yang bisa kalian coba :\r\n- twelve monkey\r\n- bubur bulan\r\n- muther panzer\r\n- mie ronggeng\r\n- elliot ness\r\n- don appetite\r\n- madam sus\r\n      ', 1, 'donkaliber.jpg', '10:00:00', '11:00:00', -7.707813, 110.410558, 2, 0, 2),
(1002, 'Martabak Sematjam Warunk', ' Jl.PERUMNAS seturan raya 158 (depan balihai/goebox cafe)sleman jogjakarta', '081222236517', 'Tersedia Berbagai Menu (Martabak,terang bulan,crepes, tipker, nasgor rempah, roti, dimsum, coffe, milk, Noodle kekinian dll)        ', 5, 'martabak.jpg', '03:00:00', '12:00:00', -7.77242, 110.404911, 2, 0, 0),
(1003, 'Soto Ayam Ambengan Cak Ndhut', 'Jl. Parangtritis No.186, Bangunharjo, Sewon, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55187', ' 08111 8111 76', '   Soto denganbumbu rempah nya kenceng, kuah nya tasty dan PAKE KOYA . Porsiannya juga banyak lagi, harga satu porsi soto special dengan isian daging, kulit, telor muda & uritan dibandrol harga 13.000 aja gaes . Wajib cobain nih kalau kalian termasuk penikmat soto       ', 3, 'sotoayamcakndhut.jpg', '07:00:00', '09:00:00', -7.827, 110.367372, 1, 0, 0),
(1004, 'Mom Milk', 'Jl. Kranggan, Cokrodiningratan, Jetis, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55233', '0899-3663-666', '  Best Milk from Solo. ðŸ“Solo, Semarang, Jakarta Barat, Bekasi, Malang.     ', 2, 'mommilks.jpg', '11:00:00', '11:00:00', -7.781629, 110.364885, 2, 0, 0),
(1005, 'Kedai Roti Bakar 543 ', 'Angkringan Jentik, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281', '081223335739', '   Roti Bakar â€¢ Susu Segar â€¢ Indomie â€¢ Rice Bowl â€¢ Dessert          ', 1, 'kedairotibakar.jpg', '10:00:00', '12:00:00', -7.771697, 110.406157, 2, 0, 0),
(1006, 'Kedai Ketik', 'Jl. Nologaten, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281, Indonesia  (seberang depot Larisa)', ' +62 812-2913-9900', 'Berbeda dari  kebanyakan cafe atau kedai yang lebih menjual pada menunya saja tapi di tempat yang satu ini akan ditemukan 3 konsep yang saling bertentangan. Vintage, industrial dan pop adalah konsep dimaksud dimana masing-masing konsep memiliki ciri khas tersendiri  ', 2, '22710596_140440306601174_1888921067683053568_n.jpg', '09:00:00', '09:00:00', -7.78023, 110.40006, 1, 0, 0),
(1007, 'Soto Pak Zaenal', 'Jl. Prof. DR. Soepomo Sh, Warungboto, Umbulharjo, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55164, Indonesia. (utara kampus 3 UAD)', '-', ' Soto lyfe! Nyoto di pak Zaenal ', 3, '22708898_151257898820547_2393018145104199680_n.jpg', '07:00:00', '03:00:00', -7.80761, 110.389742, 1, 0, 0),
(1008, 'Sasanti Restaurant ', 'Jalan Palagan Tentara Pelajar No. 52 A, Sariharjo, Ngaglik, Sariharjo, Ngaglik, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55582, Indonesia. ', '+62 274 866345', '  Resto ini mempunyai bangunan joglo lengkap bergaya Jawa klasik degan suasana yang menyenangkan', 1, '22637532_1727629487547021_5884543209169747968_n.jpg', '10:00:00', '10:00:00', -7.74216, 110.374243, 3, 0, 0),
(1009, 'Dixie Jogjakarta', 'Jalan Affandi No. 40B, Caturtunggal, Depok, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281, Indonesia', '+62 274 560745', '  dixie easy dining merupakan kafe yang cozy untuk hangout bersama kawan dan keluarga. selain wifi, kafe ini juga disediakan mushola dan ac/non ac ada. desaain interior yang juga bagus banget untuk berfoto.', 1, '22639420_354535098325240_5772281783483629568_n.jpg', '09:00:00', '12:00:00', -7.770032, 110.390827, 2, 0, 0),
(1010, 'Warunk Kopi Nostalgila', ' Jl. Tunjung Baru No.14, Baciro, Gondokusuman, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55225, Indonesia', '+62 838-6778-0700', '  Tempat nongkrong asikk, murah, free wifi, parkir luas & ada live musicnya \r\nBanyak menu barunya  Harga menu paling mahal 20k aja \r\nCocok buat yang mau nongkrong dan ngerjain tugas', 2, '22582671_1991255754451757_7748993129453191168_n.jpg', '04:00:00', '01:00:00', -7.794016, 110.379476, 1, 0, 0),
(1011, 'Sate Klathak Pak Pong', 'Jalan Imogiri Timur Km. 10, Wonokromo, Pleret, Wonokromo, Pleret, Bantul, Daerah Istimewa Yogyakarta 55791, Indonesia', '+62 811-2645-251', '  Tusukan jeruji membuat daging matang merata dan ga alot karena over cooked.', 3, '22794431_1958478794420220_924305218689040384_n.jpg', '09:00:00', '12:00:00', -7.871242, 110.387471, 2, 0, 0),
(1013, 'GYA Cafe, Resto & Creative Space', ' Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55222, Indonesia. (Komplek Auditorium RRI Gejayan, seberang sushi tei)', '+62 878-3912-5626', '  Tempat nongkrong baru di Jogja yg nyaman banget, luas, strategis di tengah kota ðŸ‘Œ\r\nBuat ngerjain tugas oke nih ada wifinya.', 2, '22636934_146243476110877_5954243991443603456_n.jpg', '11:00:00', '12:00:00', -7.779509, 110.387723, 2, 0, 0),
(1014, 'Parsley Bakery & Resto ', 'Jalan Kaliurang KM.5,3 No.A19, Caturtunggal, Depok, Caturtunggal, Kecamatan Depok, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281, Indonesia. Dekat Meilani Modiste', '+62 274 520043', 'Sedang mencari roti? Atau sedang merasa lapar? Langsung saja datang ke Parsley Bakery & Resto, yang berlokasi di Jl. Kaliurang.  Cocok untuk kalian datang bersama teman, keluarga atau pasangan.', 5, '21689397_173072369932769_1002536888344510464_n.jpg', '07:00:00', '10:00:00', -7.759643, 110.381321, 2, 0, 0),
(1015, 'Jogja Scrummy', ' Jl. Laksda Adisucipto No.75, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281, Indonesia', '+62 813-1776-0060', 'Sedang mencari Kue? Langsung saja datang ke Jogja Scrummy', 5, '22580947_1914036945586728_3406053767471169536_n.jpg', '07:00:00', '10:00:00', -7.783089, 110.415552, 2, 0, 0),
(1016, 'Cokelat Monggo', ' Jl. Dalem KG III / 978, Purbayan Kotagede, Purbayan, Kotagede, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55173, Indonesia', '+62 274 373192', 'Sedang ingin menikmati hidangan Cokelat dengan rasa yang nikmat? Cobalah datang ke kedai Chocolate Monggo. Disini kalian dapat menikmati berbagai macam jenis Cokelat dengan bermacam-macam varian rasa dan harga yang cukup terjangkau.', 5, '21981068_1648629791834061_398368052179107840_n.jpg', '08:00:00', '10:00:00', -7.831728, 110.399138, 3, 0, 0),
(1017, 'Amanda Brownies', 'Jl. Laksda Adisucipto No.268, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281, Indonesia. Dekat Affandi Museum', ' +62 274 485076', '  Amanda Brownies adalah salah satu toko Kue Brownies besar yang telah membuka cabangnya di beberapa kota di Indonesia.', 5, '22352306_121584118522060_816253127240974336_n.jpg', '07:00:00', '09:00:00', -7.783023, 110.400496, 2, 0, 0),
(1018, 'Dapur Oma', 'Jalan Pringgodani, Condongcatur, Kec. Depok, Yogyakarta, Daerah Istimewa Yogyakarta 55281, Indonesia', '+62 811-1262-677', 'Masakannya ala rumahan dan buat kamu yg doyan pedes wajib cobain kesini', 1, '22277508_355071411602028_5328012466624397312_n.jpg', '10:00:00', '10:00:00', -7.759793, 110.413961, 1, 0, 0),
(1019, 'Roaster And Bear', 'Jl. P. Mangkubumi No.52, Gowongan, Jetis, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55233, Indonesia. Dekat Hotel Harper Mangkubumi', '+62 274 2920027', 'Roaster And Bear adalah Restoran bernuansa Kafe yang terletak di Jl. Pangeran Mangkubumi.\r\nTempatnya cocok untuk nonkrong bersama pasangan atau teman.', 2, '15538347_1899841950235243_2911672747887165440_n.jpg', '11:00:00', '11:00:00', -7.784551, 110.36713, 2, 0, 0),
(1020, 'Luk Coffee & Book', ' Jalan Cendrawasih,Condongcatur,Depok, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 57283, Indonesia', '+62 812-2233-0056', 'Lucky Coffee & Book yang ada di kawasan Cendrawasih ini menyediakan Kopi dan aneka makanan Nusantara dan Internasional yang nikmat. Tempatnya nyaman, membuat kamu akan betah berlama-lama di tempat ini', 2, '16230855_1385133424889936_5663972114256887808_n.jpg', '11:00:00', '11:00:00', -7.772527, 110.397398, 2, 0, 0),
(1021, 'Mouton Slice And Grill', 'Jl. Tirtodipuran No.67, Mantrijeron, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55143 .(Dekat Hotel Indrakila)', '0857-2936-6789', 'Bagi kalian penggemar masakan olahan daging Kambing, dapat menyambangi Mouton Slice & Grill!\r\nMouton Slice & Grill juga dapat menjadi destinasi yang tepat untuk nongkrong bersama para sahabat dan cocok untuk berlama-lama.', 1, '22500568_514782862229835_3212253336858263552_n.jpg', '05:00:00', '11:00:00', -7.818668, 110.36718, 2, 0, 0),
(1022, 'Tengkleng Merapi', 'Demangan, Jl. Affandi No.351, Demangan, Gondokusuman, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55221 (utara SMA GAMA)', '0877-3822-1777', 'Disini terdapat berbagai olahan Daging seperti Ati, Ayam, Menthog, Kelinci, Kambing, Sapi \r\nVarian Menunya juga macem-macem ada Tengkleng, Gulai, Tongseng, Rica2, Sate.', 1, '22351629_353809125061437_3011894353745412096_n.jpg', '04:00:00', '10:00:00', -7.774077, 110.389241, 2, 0, 0),
(1023, 'Serabi Bandung Kang Sena Gejayan', ' Jl. Gejayan No. 20, Condongcatur, Kec. Depok, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281  (sebelum pom bensin)', '0896-7134-7523', 'Tempat makan kaki lima ini menyediakan varian rasa Soerabi yang lezat.\r\nHarganya terjangkau.  ', 3, '22220913_140229963384689_1313854530483388416_n.jpg', '06:00:00', '10:00:00', -7.760853, 110.394341, 1, 0, 0),
(1024, 'Aroem Manis Jogja', 'A, Jl. Glagahsari No.31, Warungboto, Umbulharjo, Yogyakarta City, Special Region of Yogyakarta 55164 (utara UTY Kampus 2)', '0813-2778-2778', 'Aroem Manis merupakan restoran yang berada di Jalan Glagahsari ini menyajikan aneka makanan khas mancanegara dan internasional. Harganya cukup terjangkau.\r\n', 1, '22159110_118159412211652_8877379564662161408_n.jpg', '09:00:00', '11:00:00', -7.804097, 110.38885, 1, 0, 0),
(1025, 'Nasi Nagih', 'Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281 (satu lokasi dengan Dapur Oma)', '0897-1417-337', '  Sangat cocok buat kalian pecinta pedas, harga terjangkau untuk mahasiswa  ', 1, '22157720_1079256808876526_4911257637976276992_n.jpg', '12:00:00', '09:00:00', -7.759759, 110.414169, 1, 0, 0),
(1026, 'Caliber coffe', 'Jl. C Simanjuntak No.65, Terban, Gondokusuman, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55223  (seberang Pands Swalayan)', '-', 'Cafe dengan konsep army look yang jadi satu dengan distro yang produknya bertema army ', 2, '22070985_510018709332972_8755321043695960064_n.jpg', '10:00:00', '10:00:00', -7.779389, 110.373137, 2, 0, 0),
(1027, 'Epic Coffee & Epilog Furniture', 'Jl. Palagan Tentara Pelajar No.29, Sariharjo, Ngaglik, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55581 (Dekat Hyatt Regency Golf)', '(0274) 4530704', 'Epic Coffee di Palagan Tentara Pelajar tempat yang cocok untuk bersantai bersama teman dan keluarga.\r\n', 2, '20479022_1923836001173172_7787872453316837376_n.jpg', '10:00:00', '11:00:00', -7.73418, 110.377655, 2, 0, 0),
(1028, 'Lantai Bumi Coffee & Space', ' Sinduadi, Mlati, Sleman Regency, Special Region of Yogyakarta, Sinduadi, Mlati, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55284 (Dekat SDN Pugung Kidul)', '(0274) 5011651', 'Kalian sedang mencari tempat nongkrong? Langsung saja datang ke Lantai Bumi, yang berlokasi di Jl. Pogung Kidul. Cocok untuk kaliandatang bersama teman atau pasangan.', 2, '21569293_164647564089983_6001785594328383488_n.jpg', '08:00:00', '12:00:00', -7.759703, 110.37633, 2, 0, 0),
(1029, 'No27 Coffee', 'Jalan Pringgodani No. 14, Dusun Demangan Baru, Catur Tunggal, Kecamatan Depok, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281 (Dekat Universitas Atma Jaya Yogyakarta)', '0813-1086-0354', 'Perpaduan konsep tradisional dan modern yang sangat cocok untuk kalian yang sedang mencari tempat nongkrong yang seru  bersama teman . \r\n\r\n', 2, '22710626_2129072343978981_2186699349407301632_n.jpg', '08:00:00', '11:00:00', -7.774762, 110.393485, 2, 0, 0),
(1030, 'Zara Zara Ice Cream', 'Jalan Ringroad Utara, Caturtunggal, Depok, Maguwoharjo, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55282 (Dekat Hotel Aryuka)', '0811-4070-707', 'Zara Zara Ice Cream adalah salah satu kafe yang menyajikan Es Krim Nitrogen sebagai hidangan utamanya. Memiliki Interiornya yang luas dan juga nyaman, membuat kalian betah berlama-lama di sini.', 2, '16230960_1334224623311307_5439541703465762816_n.jpg', '12:00:00', '11:00:00', -7.753979, 110.382039, 2, 0, 0),
(1031, 'Maraville Coffee', 'Gang Sitisonya 1B Jalan Kaliurang km 5, Caturtunggal, Depok, Sinduadi, Mlati, Sleman Regency, Special Region of Yogyakarta 55281', ' 0858-4879-6449', 'Tempat nongkrong di Kota Yogyakarta, berdekorasi semi classic yang menyajikan sarapan, makan siang, makan malam, minuman, dan lain-lain.', 2, '21826967_2066466270248381_449350739911770112_n.jpg', '09:00:00', '12:00:00', -7.762047, 110.379454, 2, 0, 0),
(1032, 'The91Jogja', 'Jalan Affandi, CTV / 20, Caturtunggal, Kec. Depok, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55281 (Dekat Apotek Gejayan)', '(0274) 2923572', '  No Barista Just Coffee Addict', 2, '15035789_161755684293812_5215918716461514752_n.jpg', '04:00:00', '12:00:00', -7.768264, 110.391404, 2, 0, 0),
(1033, 'Warunk Upnormal Yogyakarta', 'Jl. Seturan Raya No.90, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281', '(0274) 4333322', 'Warunk Upnormal  merupakan sebuah tempat makan yang menyediakan berbagai makanan ringan seperti Indomie dan Roti Bakar. Nyaman,santai dan cocok untuk anak-anak \r\n', 2, '22499711_283272938858207_8777648770486632448_n.jpg', '10:00:00', '02:00:00', -7.765431, 110.410628, 2, 0, 0),
(1034, 'Coffee Legend', 'Jl. Abu Bakar Ali No.24, Kotabaru, Gondokusuman, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55224', '(0274) 541290', 'Coffee Legend menyajikan aneka menu main course dengan cita rasa yang lezat.  Cocok untuk pertemuan group dan nongkrong bersama teman teman', 2, '21909656_1941435152779163_217996287788711936_n.jpg', '12:00:00', '12:00:00', -7.788167, 110.372782, 2, 0, 0),
(1035, 'Baki Dimsum & Coffee', 'Jl. Pintu Selatan UPN Kav. Madukismo No.11c, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281', '0821-3605-4398', '  Tempat nongkrong baru yang nyaman, santai dan cocok untuk berkelompok dengan teman teman ', 2, '20347216_1973950282820081_4529681159872839680_n.jpg', '10:00:00', '02:00:00', -7.764166, 110.4105, 2, 0, 0),
(1036, 'Canting Restaurant', 'Galeria Mall Lt. 4 Rooftop, Jalan Sudirman No. 99-101, Terban, Gondokusuman, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55223', '(0274) 580905', 'Canting Restaurant yang ada di kawasan Galeria Mall ini adalah sebuah restoran yang mengusung konsep fine dining yang dilengkapi dengan interior yang cantik dan elegean.\r\nMenu yang ditawarkan beragam, mulai dari masakan Nusantara dan western food.', 1, '22352461_126417981352565_2582555240855240704_n.jpg', '11:00:00', '11:00:00', -7.78194, 110.378974, 2, 0, 0),
(1037, 'Nanamia Pizzeria', 'Jl. Tirtodipuran No.1, Mantrijeron, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55143', '(0274) 450826', ' Tempat makan yang terletak di Jl. Tirtodipuran ini menyajikan berbagai macam hidangan khas Italia dengan rasa yang nikmat. Dengan sentuhan ala Mediterania, menjadikan tempat makan ini sebagai salah satu destinasi kuliner.', 2, '21909274_427057394356922_5262979089735614464_n.jpg', '11:00:00', '11:00:00', -7.818079, 110.362325, 2, 0, 0),
(1038, 'After Nine Grill & Chill', 'Jl. Kaliurang No.27, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281', '087739444750', 'Live acoustic every Wednesday, Friday & Saturday start 7 pm onwards.  ', 2, '22639560_182283752338289_3295592792075534336_n.jpg', '10:00:00', '12:00:00', -7.759435, 110.381078, 2, 0, 0),
(1039, 'Playground Cafe', 'Jl. Timoho No.31, Baciro, Gondokusuman, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55225', '(0274) 566518', 'Playground Cafe merupakan salah satu tempat makan yang cocok sebagai tempat berkumpul bersama teman-teman.Tersedia aneka sate tradisonal, Cake, aneka minuman hangan dan juga minuman dingin. ', 2, '22280447_707156746139666_8442045587959840768_n.jpg', '04:00:00', '12:00:00', -7.790869, 110.393186, 1, 0, 0),
(1040, 'Cinema Bakery', 'Jl. Prawirotaman I No.2, Brontokusuman, Mergangsan, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55153', '(0274) 2871063', 'Cinema Bakery di Prawirotaman memnyediakan Roti dengan berbagai pilihan rasa.', 5, '15035658_1605157206457161_3924127291243757568_n.jpg', '08:00:00', '10:00:00', -7.818937, 110.36848, 2, 0, 0),
(1041, 'J.CO Donuts & Coffee ', 'Mall Malioboro Lantai UG, Jalan Malioboro No. 52-58, Suryatmajan, Danurejan, Suryatmajan, Danurejan, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55213', '0815-8898-000', 'J.CO Donuts & Coffee is a lifestyle cafe retailer in Indonesia specializing in Donuts, Coffee and Frozen Yogurt. J.CO has grown their chain to 168 stores in Indonesia and some countries in South East Asia.', 5, '22582443_167050277209792_4386033307188461568_n.jpg', '10:00:00', '10:00:00', -7.793388, 110.365941, 3, 0, 0),
(1042, 'Mirota Bakery', 'Jl. FM. Noto no. 7, Kotabaru, Gondokusuman, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55224', '(0274) 513384', 'Mirota Bakery menawarkan berbagai macam menu roti dan kue dengan cita rasa yang lezat.\r\nCocok untuk kalian yang sedang mencari kudapan atau sekedar buah tangan untuk sanak saudara.  ', 5, '19379354_240544503109642_3917912104199258112_n.jpg', '08:00:00', '09:00:00', -7.785043, 110.371309, 2, 0, 0),
(1043, 'The Harvest ', 'Jalan C. Simanjuntak No. 5, Terban, Gondokusuman, Terban, Gondokusuman, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55223', '(0274) 5011178', 'Interior di Bakery ini sangat elegan. Suasananya benar-benar pas untuk menikmati Dessert.  ', 5, '22582397_505295566502323_1103694754123612160_n.jpg', '08:00:00', '10:00:00', -7.78291, 110.372252, 3, 0, 0),
(1044, 'Nasi Goreng Kambing Pak Beni ', 'Jl. Affandi No.33, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281', '-', 'Cocok buat kalian yang sedang bosan dengan makanan di rumah.', 3, '12317749_1025666304142912_1531448565_n.jpg', '06:00:00', '12:00:00', -7.760977, 110.394481, 2, 0, 0),
(1045, 'Angkringan Lek Man', 'Jl. P. Mangkubumi, Gowongan, Jetis, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55233', '-', 'Angkringan yang sudah cukup lama berdiri di yogyakarta, cocok buat kamu yang ingin nongkrong bersama teman-teman', 3, '17596128_1481546308556292_2518711260669804544_n.jpg', '05:00:00', '03:00:00', -7.785501, 110.366749, 1, 0, 0),
(1046, 'Angkringan kopi joss', 'Jl. Jend. Sudirman No.44, Gowongan, Jetis, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55233', '-', 'Angkringan yang menyediakan kopi joss yaitu kopi yang di hidangkan dengan arang panas di dalamnya', 3, '13549428_1148665998487206_2082083717_n.jpg', '06:00:00', '04:00:00', -7.783078, 110.370762, 1, 0, 0),
(1047, 'Sate Taichan Kanee', 'Blok C, Jl. Seturan Raya No.6, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281', ' 0819-2976-5270', 'Tempat makan kaki lima yangmenyediakan Sate yang lezat dengan harga terjangkau. ', 3, '13408752_648523421999532_556407849_n.jpg', '06:00:00', '01:00:00', -7.769273, 110.409832, 2, 0, 0),
(1048, 'Soto Ayam Kampung Pak Dalbe', 'Jl. Babarsari No.43, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281', '-', 'Cocok untuk kalian yang ingin sarap pagi', 3, '22638997_753344231516311_4101462372021960704_n.jpg', '07:00:00', '10:00:00', -7.774271, 110.413845, 1, 0, 0),
(1049, 'Angkringan Goebok Derita', ' Jalan Seturan Raya, Puluhdadi, Gang Amarto, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281', '0895-1752-5273', 'Tempat nongkrong asik bersama teman saat malam hari di Jogja.', 3, '22581918_820792064771678_49314677053718528_n.jpg', '06:00:00', '12:00:00', -7.762668, 110.411882, 1, 0, 0),
(1050, 'Foodcourt Taman JEC', ' Jalan Raya Janti, Banguntapan, Bantul, Daerah Istimewa Yogyakarta 55198', '0877-3969-3350', 'Cuma di satu temat aja kamu bisa nikmati berbagai macam kuliner asli Indonesia.', 4, '21820172_487404251625422_928212513646968832_n.jpg', '11:00:00', '10:00:00', -7.799089, 110.403235, 2, 0, 0),
(1051, 'Foodiest', 'Jl. Cenderawasih No.32, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281', '0852-2644-7000', 'New Concept Food Court  ', 4, '22637183_125255514856762_2287152926449205248_n.jpg', '11:00:00', '12:00:00', -7.779591, 110.389023, 2, 0, 0),
(1052, 'Food Court UGM', 'Sinduadi, Mlati, Sinduadi, Sleman, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281', '-', '  Foodpark menyediakan tiga area makan yang bisa kita jadikan pilihan, seperti di area lantai atas dengan sofa dan meja besar yang bisa digunakan untuk meeting, di lantai bawah dekat deretan outlet food court atau di area taman dengan pohon-pohon rindang', 4, '15538954_1821854344760333_8747010277683232768_n.jpg', '10:00:00', '10:00:00', -7.774094, 110.375818, 2, 0, 0),
(1053, 'Warung Musik Kampayo', 'XT Square, 150-151, Jl. Veteran No.16, Pandeyan, Umbulharjo, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55161', '0812-2957-769', 'Food court yang tak hanya menyuguhkan berbagai makanan, tapi juga menyajikan live music indie setiap hari  ', 4, '18095039_1910969579149578_6243207711786270720_n.jpg', '01:00:00', '12:00:00', -7.816744, 110.386618, 2, 0, 0),
(1054, 'Jogja Paradise', 'Jl. Magelang, Sinduadi, Mlati, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55284', '(0274) 622616', 'Jogja Paradise adalah food court terbesar di Jogja yang mengusung konsep One Stop Food Center dengan perpaduan klasik dan modern  ', 4, '22711068_1456755211040940_4245184287122391040_n.jpg', '10:00:00', '10:00:00', -7.752176, 110.362589, 2, 0, 0);

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
(1, 'anas', 'anas', 'anas', '', 2),
(3, 'tes123', 'tes', 'tes', '', 1),
(19, 'Nasir Amin', 'admin', 'admin', '', 1);

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
-- Indexes for table `relasi_foto_tempat`
--
ALTER TABLE `relasi_foto_tempat`
  ADD KEY `id_user` (`id_user`,`id_tempat`),
  ADD KEY `id_tempat` (`id_tempat`);

--
-- Indexes for table `relasi_tempat_fasilitas`
--
ALTER TABLE `relasi_tempat_fasilitas`
  ADD PRIMARY KEY (`id_relasi_tempat_fasilitas`),
  ADD KEY `id_fasilitas` (`id_fasilitas`),
  ADD KEY `id_tempat` (`id_tempat`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `id_user` (`id_user`,`id_tempat`),
  ADD KEY `id_tempat` (`id_tempat`);

--
-- Indexes for table `tempat`
--
ALTER TABLE `tempat`
  ADD PRIMARY KEY (`id_tempat`),
  ADD KEY `id_kategori_tempat` (`id_kategori_tempat`),
  ADD KEY `id_harga` (`id_harga`),
  ADD KEY `id_harga_2` (`id_harga`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_jenis_pengguna` (`id_jenis_pengguna`),
  ADD KEY `id_jenis_pengguna_2` (`id_jenis_pengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `harga`
--
ALTER TABLE `harga`
  MODIFY `id_harga` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jenis_pengguna`
--
ALTER TABLE `jenis_pengguna`
  MODIFY `id_jenis_pengguna` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kategori_tempat`
--
ALTER TABLE `kategori_tempat`
  MODIFY `id_kategori_tempat` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `relasi_tempat_fasilitas`
--
ALTER TABLE `relasi_tempat_fasilitas`
  MODIFY `id_relasi_tempat_fasilitas` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tempat`
--
ALTER TABLE `tempat`
  MODIFY `id_tempat` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1055;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `relasi_foto_tempat`
--
ALTER TABLE `relasi_foto_tempat`
  ADD CONSTRAINT `relasi_foto_tempat_ibfk_1` FOREIGN KEY (`id_tempat`) REFERENCES `tempat` (`id_tempat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `relasi_tempat_fasilitas`
--
ALTER TABLE `relasi_tempat_fasilitas`
  ADD CONSTRAINT `relasi_tempat_fasilitas_ibfk_1` FOREIGN KEY (`id_fasilitas`) REFERENCES `fasilitas` (`id_fasilitas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relasi_tempat_fasilitas_ibfk_2` FOREIGN KEY (`id_tempat`) REFERENCES `tempat` (`id_tempat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`id_tempat`) REFERENCES `tempat` (`id_tempat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tempat`
--
ALTER TABLE `tempat`
  ADD CONSTRAINT `tempat_ibfk_1` FOREIGN KEY (`id_kategori_tempat`) REFERENCES `kategori_tempat` (`id_kategori_tempat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tempat_ibfk_2` FOREIGN KEY (`id_harga`) REFERENCES `harga` (`id_harga`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
