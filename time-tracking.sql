-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 30 Apr 2018 pada 22.01
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `time-tracking`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `app` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `activities`
--

INSERT INTO `activities` (`id`, `userid`, `date`, `time`, `app`, `title`) VALUES
(1, 1, '2018-02-20', '08:43:00', 'Google Chrome', 'YouTube'),
(2, 2, '2018-02-20', '08:44:00', 'Postman', 'http://localhost/ci-rest-api/task'),
(3, 1, '2018-02-25', '08:53:00', 'Visual Studio Code', 'activies.php - www'),
(9, 1, '2018-02-26', '17:30:06', 'Google Chrome', 'Recka | Home'),
(10, 1, '2018-02-27', '08:36:46', 'Visual Studio Code', 'activities.php - www'),
(11, 1, '2018-02-28', '10:03:00', 'Atom', 'activities.php -- C:\\wamp64\\www\\time-tracking'),
(12, 1, '2018-02-28', '14:05:00', 'Google Chrome', 'Datatables - Buttons Applying Custom with icon'),
(13, 1, '2018-02-28', '14:08:00', 'Atom', 'User.php -- C:\\wamp64\\www\\time-tracking	'),
(14, 1, '2018-02-28', '14:37:00', 'Timdoctor', 'Timedoctor Lite | v2.3'),
(15, 1, '2018-02-28', '14:39:00', 'Spotify', 'Tulus - Sewindu'),
(16, 1, '2018-02-28', '14:40:00', 'Google Chrome', 'localhost / MySQL / ci-rest-api'),
(17, 1, '2018-03-01', '10:25:00', 'Spotify', 'Rich Brian - Occupied'),
(18, 1, '2018-03-01', '11:43:00', 'Google Chrome', 'Codeigniter Forums'),
(19, 1, '2018-03-01', '11:44:00', 'Google Chrome', 'Recka | Home'),
(20, 1, '2018-03-02', '14:42:29', 'Visual Studio Code', 'Activities.php - www'),
(21, 1, '2018-03-02', '14:43:15', 'Google Chrome', 'Recka | Home'),
(22, 1, '2018-03-02', '14:44:48', 'Postman', 'Postman'),
(23, 1, '2018-03-05', '13:25:56', 'Postman', 'Postman'),
(24, 1, '2018-03-05', '13:26:08', 'Postman', 'Postman'),
(25, 1, '2018-03-05', '13:26:08', 'Postman', 'Postman'),
(26, 1, '2018-03-05', '13:26:09', 'Postman', 'Postman'),
(27, 1, '2018-03-05', '13:26:09', 'Postman', 'Postman'),
(28, 1, '2018-03-05', '13:26:10', 'Postman', 'Postman'),
(29, 1, '2018-03-05', '13:26:10', 'Postman', 'Postman'),
(30, 1, '2018-03-05', '13:26:11', 'Google Chrome', 'PhpMyAdmin'),
(31, 1, '2018-03-05', '13:26:11', 'Postman', 'Postman'),
(32, 1, '2018-03-05', '13:26:12', 'Postman', 'Postman'),
(33, 1, '2018-03-05', '13:26:12', 'Postman', 'Postman'),
(34, 1, '2018-03-05', '13:26:13', 'Postman', 'Postman'),
(35, 1, '2018-03-05', '13:26:13', 'Postman', 'Postman'),
(36, 1, '2018-03-05', '13:26:13', 'Postman', 'Postman'),
(37, 1, '2018-03-05', '13:26:14', 'Postman', 'Postman'),
(38, 1, '2018-03-05', '13:26:14', 'Postman', 'Postman'),
(39, 1, '2018-03-05', '13:26:14', 'Postman', 'Postman'),
(40, 1, '2018-03-05', '13:26:15', 'Postman', 'Postman'),
(41, 1, '2018-03-05', '13:26:15', 'Postman', 'Postman'),
(42, 1, '2018-03-05', '13:26:16', 'Postman', 'Postman'),
(43, 1, '2018-03-05', '13:26:16', 'Postman', 'Postman'),
(44, 1, '2018-03-05', '13:26:17', 'Postman', 'Postman'),
(45, 1, '2018-03-05', '13:26:17', 'Postman', 'Postman'),
(46, 1, '2018-03-05', '13:26:18', 'Postman', 'Postman'),
(47, 1, '2018-03-05', '13:26:18', 'Postman', 'Postman'),
(48, 1, '2018-03-05', '13:26:19', 'Postman', 'Postman'),
(49, 1, '2018-03-05', '13:26:19', 'Postman', 'Postman'),
(50, 1, '2018-03-05', '13:26:20', 'Postman', 'Postman'),
(51, 4, '2018-03-07', '10:16:25', 'Visual Studio Code', 'Screenshot.php - www'),
(52, 4, '2018-03-07', '10:17:06', 'Visual Studio Code', 'User.php - www'),
(53, 4, '2018-03-08', '10:08:00', 'Snipping Tool', 'Snipping Tool'),
(54, 1, '2018-03-08', '10:27:19', 'Google Chrome', 'Recka | Home'),
(55, 3, '2018-03-08', '10:59:41', 'Google Chrome', 'Youtube'),
(56, 3, '2018-03-08', '11:00:04', 'Google Chrome', 'Facebook'),
(57, 3, '2018-03-08', '11:06:18', 'Google Chrome', 'Google'),
(58, 3, '2018-03-08', '12:11:16', 'Google Chrome', 'WhatsApp'),
(59, 3, '2018-03-08', '13:37:31', 'Google Chrome', 'PHPTESTER'),
(60, 1, '2018-03-09', '09:55:00', 'Visual Studio Code', 'Activities.php - www'),
(61, 1, '2018-03-09', '10:12:00', 'Visual Studio Code', 'User.php - www'),
(62, 1, '2018-03-09', '10:12:00', 'Visual Studio Code', 'User.php - www'),
(63, 2, '2018-03-15', '10:47:00', 'Google Chrome', 'GitHub'),
(64, 1, '2018-03-15', '12:48:00', 'Google Chrome', 'Recka | Activities'),
(65, 1, '2018-03-19', '08:30:00', 'Google Chrome', 'Recka | Activities'),
(66, 4, '2018-03-22', '11:04:00', 'Google Chrome', 'New Tab'),
(67, 3, '2018-03-22', '11:05:00', 'Google Chrome', 'View Page Source'),
(68, 2, '2018-03-23', '10:14:00', 'Google Chrome', 'View Page Source'),
(69, 2, '2018-03-23', '10:20:00', 'Google Chrome', 'Navs - Bootstrap'),
(70, 1, '2018-03-26', '08:28:00', 'Google Chrome', 'localhost / MySQL / time-tracking'),
(71, 1, '2018-03-26', '08:29:00', 'Google Chrome', 'phpMyAdmin'),
(72, 2, '2018-04-03', '15:53:00', 'Google Chrome', 'detail-blog-images'),
(73, 1, '2018-04-06', '11:38:00', 'Google Chrome', 'WhatsApp'),
(74, 1, '2018-04-08', '11:38:00', 'Google Chrome', 'Recka | Aktivitas'),
(75, 1, '2018-04-09', '08:53:00', 'Visual Studio Code', 'Model_activities.php - www'),
(76, 1, '2018-04-19', '13:09:00', 'Atom', 'Client.php -- C:\\wamp\\www'),
(77, 1, '2018-04-19', '13:10:00', 'Postman', 'Postman'),
(78, 1, '2018-04-19', '13:11:00', 'Google Chrome', 'Navbar - Bootstrap'),
(79, 1, '2018-04-19', '13:12:00', 'Google Chrome', 'columnDefs'),
(80, 1, '2018-04-19', '13:13:00', 'Google Chrome', 'Rekca | Aktivitas'),
(81, 1, '2018-04-19', '13:14:00', 'Google Chrome', 'Rekca | Aktivitas'),
(82, 1, '2018-04-19', '13:15:00', 'Atom', 'activities,php -- C:\\wamp\\www'),
(83, 1, '2018-04-19', '13:16:00', 'Spotify', 'Rich Brian - Tresspass'),
(84, 1, '2018-04-19', '13:17:00', 'Google Chrome', 'Project - Dashboard - GitLab'),
(85, 1, '2018-04-19', '13:18:00', 'Google Chrome', 'Recka | Aktivitas'),
(86, 1, '2018-04-19', '13:19:00', 'Google Chrome', 'Recka | Profil'),
(87, 1, '2018-04-19', '13:20:00', 'Google Chrome', 'Recka | Pengguna'),
(88, 4, '2018-04-23', '11:28:00', 'Google Chrome', 'Recka | Detail'),
(89, 1, '2018-04-23', '11:29:00', 'Google Chrome', 'Recka | Beranda'),
(90, 1, '2018-04-23', '11:30:00', 'Google Chrome', 'Recka | Beranda');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo_profile` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `name`, `photo_profile`) VALUES
(1, 'Yudha', 'akbarsaputrait@outlook.com', '$2y$10$cupOcTna8wKcoyg0OtHq2OMvHFJS0.QeQQZl4hk1IwID1lUtA0WcC', 'Akbar Anung Yudha Saputra', 'e812c94c77590973fbe7701cfc3c3dc0.png'),
(2, 'admin', 'akbarsaputrait@outlook.com', '$2y$10$ThzaFqOgjOlsNi811arkkeGTMp4KkBQ8KXkDE6LF7Zyhzt5FYZ8OS', 'Akbar Saputra', 'a2a0fb3e247178297a5b4f52ac221828.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pc` varchar(10) NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` set('Online','Offline') NOT NULL,
  `photo_profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `client`
--

INSERT INTO `client` (`id`, `name`, `username`, `password`, `email`, `pc`, `token`, `status`, `photo_profile`) VALUES
(1, 'Akbar Anung Yudha Saputra', 'akbar', '$2y$10$DU39Lb0nWmTcxUZRBg4IGOaGeT83CxKWYp/U5uN8t1/AJtJAy9yUq', 'akbarsaputra45@hotmail.com', 'PC-01', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjEiLCJ1c2VybmFtZSI6ImFrYmFyIiwiZW1haWwiOiJha2JhcnNhcHV0cmE0NUBob3RtYWlsLmNvbSJ9.0nWr0xWQ2m5zQ9-cOoOzKziPQsQrg6P6Bb1kgk4-TtU', 'Online', 'a138a009fe038ce553a9b9e9c8714403.jpg'),
(2, 'Azam Rizky Andrian', 'azam', '$2y$10$9Sq00hD7IKg85WWBlTbJV.dQcx0zKHN5npMYJZ0H4spLFzbK5.uwO', 'azam@gmail.com', 'PC-02', '', 'Offline', '7144ed5aa4b3e5029c063fe5a9492870.jpg'),
(3, 'Abdul Azis', 'azis', '$2y$10$6WPMXZPwSTQ4HpFlFYqwiufZpHMg1CUNH6dSuHsCDkipmiGuZSb9q', 'abdazis19@gmail.com', 'PC-03', '', 'Offline', 'bdb831782c0867c2297f7d0a6d49d761.jpg'),
(4, 'M. Bakhrul Bila Sahil', 'bahrul', '$2y$10$6BcF3lGPXMjTYBMdaZzm.uJjK9hw.ykaQAQIpRc/PCdnRzQdnZfXe', 'bahrulrpl@gmail.com', 'PC-04', '', 'Offline', '59688fe4e6fbbe1bbe8d78c165af23f6.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` set('Doing') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `project`
--

INSERT INTO `project` (`id`, `name`, `status`) VALUES
(1, 'Admin Dashboard Time Tracking', 'Doing'),
(2, 'Website sekolah Bahrul Maghfiroh', 'Doing');

-- --------------------------------------------------------

--
-- Struktur dari tabel `screenshot`
--

CREATE TABLE `screenshot` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `app` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `screenshot`
--

INSERT INTO `screenshot` (`id`, `userid`, `app`, `title`, `filename`, `date`, `time`) VALUES
(92, 3, 'Visual Studio Code', 'Screenshot.php - www', '385ca1fc25f78ced3df199ff26e68849.PNG', '2018-03-08', '13:56:32'),
(93, 3, 'Chrome Web ', 'Recka | Home', 'cd03126f57675b0d298002bf67fe9abf.png', '2018-03-08', '14:13:17'),
(94, 3, 'Visual Studio Code', 'activities.php - www', '1e8a14c107e1150a4743597d1901fe83.PNG', '2018-03-08', '14:42:33'),
(95, 3, 'Postman', 'Screenshot with Authorization Client', '41e760e26739f03cfc9d27db8b4c90f9.PNG', '2018-03-08', '14:46:00'),
(96, 1, 'Chrome Browser', 'Recka | Home', 'eff0feb5ce7404de8224d1dade1c030b.png', '2018-03-08', '16:00:18'),
(97, 1, 'Chrome Browser', 'Recka | Home', '747b852fb3c0f8dd48ed8de670f98d0d.PNG', '2018-03-09', '13:56:45'),
(98, 1, 'Postman', 'Postman', '7f7a62bef625fa71fcc216420e694ac9.PNG', '2018-03-09', '13:58:29'),
(99, 1, 'Visual Studio Code', 'Activities.php - www', '5d3ad0f714e5e00c40714fb3455ad291.PNG', '2018-03-09', '14:04:59'),
(100, 1, 'Chrome Browser', 'Recka | Home', '1480da561b434739ec58372cfe607c64.PNG', '2018-03-12', '09:23:18'),
(101, 1, 'Chrome Browser', 'New Tab', '32a28809de7b382c77edc25c8c7d13ed.PNG', '2018-03-12', '09:29:48'),
(102, 1, 'Chrome Browser', 'Recka | Home', '1d7d9d298c51a6ca56870944e2df7e88.PNG', '2018-03-12', '09:33:41'),
(103, 1, 'Chrome Browser', 'Recka | Home', '71dec0c91ac3870ebb8aa1f0aeced82c.png', '2018-03-13', '12:26:44'),
(104, 1, 'Chrome Browser', 'Recka | Home', '06c84006199a35ac3ea9225b3da88381.PNG', '2018-03-14', '12:26:53'),
(105, 1, 'Chrome Browser', 'Recka | Activities', 'da2e19acc4ac938db056f689e554c639.PNG', '2018-03-14', '12:45:02'),
(106, 1, 'Atom', 'activities.php -- C:\\wamp64\\www', '1e967db8b717ca0a872852487ac91298.PNG', '2018-03-15', '09:27:51'),
(107, 1, 'Chrome Browser', 'Recka | Activities', '7a56c1d44a800b550b9fcda627e727b6.PNG', '2018-03-15', '09:29:28'),
(108, 2, 'Chrome Browser', 'Github', '7f96c0b7d88f9bedfa1dfdebfcd0e0a8.PNG', '2018-03-15', '10:46:18'),
(109, 1, 'Chrome Browser', 'Recka | Aktivitas', '7eb125bd4cc4560b5e2a59a14f3e8d9e.PNG', '2018-03-21', '13:52:54'),
(110, 1, 'Postman', 'Postman', '758ed64ddbe2e6fec8f74fa1ed49e84a.PNG', '2018-03-21', '13:58:01'),
(111, 2, 'Chrome Browser', 'Recka | Aktivitas', '03bec2593fb3f5b799a3a800916f4cdc.PNG', '2018-03-23', '08:46:55'),
(112, 1, 'Chrome Browser', 'Recka | Aktivitas', 'fbd33bb2a91fae91d2f1be2d8a1aa616.PNG', '2018-03-26', '06:55:43'),
(113, 2, 'Chrome Browser', 'time-tracking - GitLab', 'ebc7430d00c51cc24a59d86b53295926.PNG', '2018-04-03', '13:15:11'),
(114, 1, 'GitKraken', 'GitKraken', 'f83e15d14d482b0f29be1dfb83fb2cf5.PNG', '2018-04-19', '13:00:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `id_project` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `waiting` date DEFAULT NULL,
  `progress` date DEFAULT NULL,
  `done` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tasks`
--

INSERT INTO `tasks` (`id`, `id_project`, `userid`, `name`, `waiting`, `progress`, `done`) VALUES
(1, 1, 1, 'Mengerjakan template admin dashboard', '2018-03-24', '2018-03-25', NULL),
(2, 1, 1, 'Datatable Ajax', '2018-03-27', '2018-03-29', '2018-04-19'),
(3, 1, 1, 'API screenshot', '2018-04-01', '2018-04-05', '2018-04-06'),
(4, 1, 1, 'More info about client', '2018-04-05', '2018-04-07', '2018-04-08'),
(5, 1, 1, 'Responsive dashboard acitivities', '2018-04-07', '2018-04-09', '2018-04-12'),
(6, 2, 1, 'Mengatur responsive tampilan home', '2018-03-30', '2018-04-02', '2018-04-10'),
(7, 2, 2, 'Navbar position absolute', NULL, '2018-04-03', '2018-04-05'),
(8, 2, 2, 'Responsive Image', NULL, '2018-04-09', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `screenshot`
--
ALTER TABLE `screenshot`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indeks untuk tabel `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_project` (`id_project`),
  ADD KEY `userid` (`userid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `screenshot`
--
ALTER TABLE `screenshot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT untuk tabel `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `client` (`id`);

--
-- Ketidakleluasaan untuk tabel `screenshot`
--
ALTER TABLE `screenshot`
  ADD CONSTRAINT `screenshot_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `client` (`id`);

--
-- Ketidakleluasaan untuk tabel `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`id_project`) REFERENCES `project` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
