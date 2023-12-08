-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2023 at 04:09 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_nyilih`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `count_pending_validation` () RETURNS INT(11)  BEGIN
  DECLARE pending INT DEFAULT 0;
  
  SELECT COUNT(*) INTO pending
  FROM pjbarang
  WHERE status = 'diproses';
  
  SELECT COUNT(*) INTO pending
  FROM pjruang
  WHERE status = 'diproses';
  
  RETURN pending;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(40) NOT NULL,
  `stok` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `stok`) VALUES
(4, 'Kamera', 2),
(5, 'Microphone', 30),
(9, 'Tripod', 11),
(10, 'Sound System', 2),
(11, 'Kabel Olor', 36),
(12, 'LAN', 15),
(13, 'Laptop', 6);

-- --------------------------------------------------------

--
-- Table structure for table `pjbarang`
--

CREATE TABLE `pjbarang` (
  `id_pinjamB` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `banyak_barang` int(40) NOT NULL,
  `kebutuhan` varchar(40) NOT NULL,
  `status` enum('diproses','acc','selesai') NOT NULL DEFAULT 'diproses',
  `id_user` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pjbarang`
--

INSERT INTO `pjbarang` (`id_pinjamB`, `tgl_pinjam`, `tgl_kembali`, `banyak_barang`, `kebutuhan`, `status`, `id_user`, `id_barang`) VALUES
(28, '2023-02-04', '2023-02-12', 3, 'ormawa', 'diproses', 2, 4),
(29, '2023-02-10', '2023-02-10', 6, 'riset', 'acc', 1, 4),
(30, '2023-02-03', '2023-02-24', 5, 'ormawa', 'acc', 1, 4),
(31, '2023-02-07', '2023-02-16', 3, 'ormawa', 'diproses', 1, 5);

--
-- Triggers `pjbarang`
--
DELIMITER $$
CREATE TRIGGER `balikiStok` AFTER UPDATE ON `pjbarang` FOR EACH ROW BEGIN
IF NEW.status = 'selesai' THEN
	UPDATE barang 
    SET stok = stok + NEW.banyak_barang 
    WHERE id_barang = NEW.id_barang;
END IF; 
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `kurangStok` AFTER UPDATE ON `pjbarang` FOR EACH ROW BEGIN 
	IF NEW.status = 'acc' THEN
		UPDATE barang SET stok = stok - NEW.banyak_barang 
    	WHERE id_barang = NEW.id_barang;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `statusUser1` AFTER INSERT ON `pjbarang` FOR EACH ROW BEGIN 
	UPDATE user SET status = 'menunggu validasi' 
	WHERE id_user = NEW.id_user;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `statusUser2` AFTER UPDATE ON `pjbarang` FOR EACH ROW BEGIN
  IF NEW.status = 'acc' THEN
    UPDATE user SET status = 'sudah pinjam' 
    WHERE id_user = NEW.id_user;
  END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `statusUser3` AFTER UPDATE ON `pjbarang` FOR EACH ROW BEGIN
  IF NEW.status = 'selesai' THEN
    UPDATE user SET status = 'belum pinjam' 
    WHERE id_user = NEW.id_user;
  END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pjruang`
--

CREATE TABLE `pjruang` (
  `id_pinjamR` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `kebutuhan` varchar(40) NOT NULL,
  `partisipan` int(40) NOT NULL,
  `status` enum('diproses','acc','selesai') NOT NULL DEFAULT 'diproses',
  `id_user` int(11) NOT NULL,
  `id_ruang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `pjruang`
--
DELIMITER $$
CREATE TRIGGER `statusUserR1` BEFORE INSERT ON `pjruang` FOR EACH ROW BEGIN

    UPDATE user SET status = 'menunggu validasi' 
    WHERE id_user = NEW.id_user;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `statusUserR2` AFTER UPDATE ON `pjruang` FOR EACH ROW BEGIN
  IF NEW.status = 'acc' THEN
    UPDATE user SET status = 'sudah pinjam' 
    WHERE id_user = NEW.id_user;
  END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `statusUserR3` AFTER UPDATE ON `pjruang` FOR EACH ROW BEGIN
  IF NEW.status = 'selesai' THEN
    UPDATE user SET status = 'belum pinjam' 
    WHERE id_user = NEW.id_user;
  END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `ruangan` varchar(40) NOT NULL,
  `jenis_ruangan` enum('Kelas','Lab','Aula') NOT NULL,
  `kapasitas` int(40) NOT NULL,
  `status` enum('Tersedia','Terpakai') NOT NULL DEFAULT 'Tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `ruangan`, `jenis_ruangan`, `kapasitas`, `status`) VALUES
(1, 'KTT 1.02', 'Kelas', 40, 'Tersedia'),
(2, 'KTT 1.03', 'Kelas', 40, 'Tersedia'),
(3, 'KTT 1.04', 'Kelas', 40, 'Tersedia'),
(4, 'KTT 1.05', 'Kelas', 40, 'Tersedia'),
(5, 'KTT 1.07', 'Kelas', 40, 'Tersedia'),
(6, 'KTT 1.08', 'Kelas', 40, 'Tersedia'),
(8, 'Lab. Machine Learning', 'Lab', 45, 'Tersedia'),
(9, 'Lab Algoritma Pemograman', 'Lab', 45, 'Tersedia'),
(10, 'Aula', 'Aula', 100, 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `no_induk` char(10) NOT NULL,
  `level` enum('admin','mahasiswa') NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `status` enum('belum pinjam','sudah pinjam','menunggu validasi') NOT NULL DEFAULT 'belum pinjam',
  `prodi` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `no_induk`, `level`, `username`, `password`, `status`, `prodi`, `email`) VALUES
(1, '1204200015', 'mahasiswa', 'Arcadius Obaja', '1204200015', 'menunggu validasi', 'Sistem Informasi', 'arcadiusobaja@gmail.com'),
(2, '1204200027', 'mahasiswa', 'Bagus Febryanto ', '1204200027', 'menunggu validasi', 'Teknik Industri', 'bagus@gmail.com'),
(3, '1204200159', 'mahasiswa', 'Rizki Eka', '1204200159', 'belum pinjam', 'Teknik Elektro', 'rizka@gmail.com'),
(4, '1234567890', 'admin', 'Sun Chou', 'admin', 'belum pinjam', 'Staff Logistik', 'sunchou@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `pjbarang`
--
ALTER TABLE `pjbarang`
  ADD PRIMARY KEY (`id_pinjamB`),
  ADD KEY `transaksiBarang` (`id_barang`),
  ADD KEY `transaksiUser` (`id_user`);

--
-- Indexes for table `pjruang`
--
ALTER TABLE `pjruang`
  ADD PRIMARY KEY (`id_pinjamR`),
  ADD KEY `user` (`id_user`),
  ADD KEY `ruangan` (`id_ruang`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pjbarang`
--
ALTER TABLE `pjbarang`
  MODIFY `id_pinjamB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `pjruang`
--
ALTER TABLE `pjruang`
  MODIFY `id_pinjamR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pjbarang`
--
ALTER TABLE `pjbarang`
  ADD CONSTRAINT `transaksiBarang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksiUser` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pjruang`
--
ALTER TABLE `pjruang`
  ADD CONSTRAINT `ruangan` FOREIGN KEY (`id_ruang`) REFERENCES `ruangan` (`id_ruangan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
