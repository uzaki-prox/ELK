-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16 Jan 2023 pada 04.52
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elt`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `companion`
--

CREATE TABLE `companion` (
  `id_companion` varchar(8) NOT NULL,
  `no_delegation` varchar(8) NOT NULL,
  `no_contest` varchar(5) NOT NULL,
  `niy` varchar(10) NOT NULL,
  `descript` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `contest`
--

CREATE TABLE `contest` (
  `no_contest` varchar(5) NOT NULL,
  `name_contest` varchar(25) NOT NULL,
  `kind_contest` varchar(25) NOT NULL,
  `quota_partisipant` int(11) NOT NULL,
  `contest_level` varchar(13) NOT NULL,
  `institution` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `contact_person` varchar(50) NOT NULL,
  `tlp_cp` varchar(12) NOT NULL,
  `time_contest` datetime NOT NULL,
  `time_tm` datetime NOT NULL,
  `place_contest` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cost`
--

CREATE TABLE `cost` (
  `no_bill` varchar(8) NOT NULL,
  `no_delegasi` varchar(8) NOT NULL,
  `choach` varchar(10) NOT NULL,
  `detail` text NOT NULL,
  `amount` varchar(10) NOT NULL,
  `descript` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `educational`
--

CREATE TABLE `educational` (
  `id_edu` int(11) NOT NULL,
  `name_edu` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `excul`
--

CREATE TABLE `excul` (
  `no_excul` int(11) NOT NULL,
  `name_excul` varchar(25) NOT NULL,
  `choach` varchar(10) NOT NULL,
  `descript` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hostel`
--

CREATE TABLE `hostel` (
  `id_hostel` int(11) NOT NULL,
  `room_hostel` varchar(3) NOT NULL,
  `responsible` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `participant`
--

CREATE TABLE `participant` (
  `id_participant` int(11) NOT NULL,
  `no_delegation` int(11) NOT NULL,
  `no_contest` int(11) NOT NULL,
  `nrs` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `report_delegation`
--

CREATE TABLE `report_delegation` (
  `no_delegation` varchar(8) NOT NULL,
  `champ_status` varchar(15) NOT NULL,
  `place_report` varchar(10) NOT NULL,
  `date_report` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `name_role` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id_role`, `name_role`) VALUES
(1, 'Admin'),
(2, 'Penanggung Jawab'),
(3, 'Pengasuh'),
(4, 'Pendamping');

-- --------------------------------------------------------

--
-- Struktur dari tabel `santri`
--

CREATE TABLE `santri` (
  `nrs` varchar(12) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `class` varchar(7) NOT NULL,
  `hostel` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `submission_delegation`
--

CREATE TABLE `submission_delegation` (
  `no_delegation` varchar(8) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `choach` varchar(10) NOT NULL,
  `no_contest` varchar(5) NOT NULL,
  `edu_level` int(11) NOT NULL,
  `amount_participant` int(11) NOT NULL,
  `expectation` int(11) NOT NULL,
  `place_delegation` varchar(50) NOT NULL,
  `date_delegation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit`
--

CREATE TABLE `unit` (
  `id_unit` int(11) NOT NULL,
  `name_unit` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `unit`
--

INSERT INTO `unit` (`id_unit`, `name_unit`) VALUES
(1, 'Yayasan'),
(2, 'SMP'),
(3, 'SMA'),
(4, 'SMK'),
(5, 'Pesantren');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `niy` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `unit` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`niy`, `name`, `gender`, `unit`, `role`, `password`) VALUES
('20100292', 'Rifky Muzaki', 'Laki-Laki', 1, 1, 'e807f1fcf82d132f9bb018ca6738a19f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contest`
--
ALTER TABLE `contest`
  ADD PRIMARY KEY (`no_contest`);

--
-- Indexes for table `excul`
--
ALTER TABLE `excul`
  ADD PRIMARY KEY (`no_excul`);

--
-- Indexes for table `hostel`
--
ALTER TABLE `hostel`
  ADD PRIMARY KEY (`id_hostel`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `santri`
--
ALTER TABLE `santri`
  ADD PRIMARY KEY (`nrs`);

--
-- Indexes for table `submission_delegation`
--
ALTER TABLE `submission_delegation`
  ADD PRIMARY KEY (`no_delegation`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`niy`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
