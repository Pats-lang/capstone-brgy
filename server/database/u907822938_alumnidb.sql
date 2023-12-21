-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2023 at 10:10 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u907822938_alumnidb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_username` varchar(20) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_fullname` varchar(20) NOT NULL,
  `admin` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_username`, `admin_password`, `admin_fullname`, `admin`) VALUES
('admin', '$2y$10$zs9N951Be4tU4vEeLK9zvuBbh3yOeMigbjWSueHs/IlKzMiocbA.W', 'admin', '2'),
('conag', '$2y$10$jHAZF6pfVmYpN2GpinihcO8y0GySkx0VFeuF4IVto/pyKmRTk/MsK', 'conagconag', '1'),
('DIKO', '$2y$10$wd9aCf4ZU14ZEklaGGDwiO.12Hn73HsvsD3tJIBuQZjfj4OydcFWS', 'roman', '1'),
('margie', '$2y$10$PEMuBKaz9BhKJr3sH0Luy.MqbiEEBAyXG7fFQkEL7s4oovl21Boge', 'margie', '2'),
('patpat', '$2y$10$hHzCArjHZHGZpci1C2UyW.qnlo0Tj8gZdLxxXurOIrTKSPdRUsStC', 'patriciapiolopascual', '1'),
('rowee', '$2y$10$CaNRQvBZXNbHe2hkYaXo0e2IbNVCgccvmzRpwH.8iMUWFUovyQF2S', 'roweewee', '2');

-- --------------------------------------------------------

--
-- Table structure for table `affiliations`
--

CREATE TABLE `affiliations` (
  `id` int(20) NOT NULL,
  `member_id` int(20) DEFAULT NULL,
  `organizations` varchar(50) NOT NULL,
  `position` varchar(20) NOT NULL,
  `duration` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `affiliations`
--

INSERT INTO `affiliations` (`id`, `member_id`, `organizations`, `position`, `duration`) VALUES
(1, 2023101, 'cyAffOrgA', 'cyAffPosA', 'cyAffDurA'),
(2, 2023201, '', '', ''),
(3, 2023301, '', '', ''),
(4, 2023401, '', '', ''),
(5, 2023102, '', '', ''),
(6, 2023401, '', '', ''),
(7, 2023401, '', '', ''),
(8, 2023501, '', '', ''),
(9, 2023601, 'd', 'd', 'd'),
(10, 2023101, '', '', ''),
(11, 2023201, '', '', ''),
(12, 2023201, '', '', ''),
(13, 2023301, '', '', ''),
(14, 2023401, '', '', ''),
(15, 2023501, '', '', ''),
(16, 2023601, '', '', ''),
(17, 2023701, '', '', ''),
(18, 2023801, '', '', ''),
(19, 2023901, '', '', ''),
(20, 20231001, '', '', ''),
(21, 20231101, '', '', ''),
(22, 2023102, '', '', ''),
(23, 2023202, '', '', ''),
(24, 20231201, '', '', ''),
(25, 20231301, '', '', ''),
(26, 20231401, '', '', ''),
(27, 20231501, '', '', ''),
(28, 20231601, '', '', ''),
(29, 20231601, '', '', ''),
(30, 20231701, '', '', ''),
(31, 20231801, '', '', ''),
(32, 2023302, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE `awards` (
  `id` int(20) NOT NULL,
  `member_id` int(20) DEFAULT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `awards`
--

INSERT INTO `awards` (`id`, `member_id`, `name`) VALUES
(1, 2023101, 'cyAwardsA'),
(2, 2023101, 'cyAwardsB'),
(3, 2023101, 'cyAwardsC'),
(4, 2023101, 'cyAwardsD'),
(5, 2023201, ''),
(6, 2023301, ''),
(7, 2023401, ''),
(8, 2023102, ''),
(9, 2023401, ''),
(10, 2023401, ''),
(11, 2023501, ''),
(12, 2023601, 'd'),
(13, 2023101, ''),
(14, 2023201, ''),
(15, 2023201, ''),
(16, 2023301, ''),
(17, 2023401, ''),
(18, 2023501, ''),
(19, 2023601, ''),
(20, 2023701, ''),
(21, 2023801, ''),
(22, 2023901, ''),
(23, 20231001, ''),
(24, 20231101, ''),
(25, 2023102, ''),
(26, 2023202, ''),
(27, 20231201, ''),
(28, 20231301, ''),
(29, 20231401, ''),
(30, 20231501, ''),
(31, 20231601, ''),
(32, 20231601, ''),
(33, 20231701, ''),
(34, 20231801, ''),
(35, 2023302, '');

-- --------------------------------------------------------

--
-- Table structure for table `campus`
--

CREATE TABLE `campus` (
  `campus_id` varchar(5) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `campus`
--

INSERT INTO `campus` (`campus_id`, `name`) VALUES
('01', 'Main Campus'),
('02', 'South Campus');

-- --------------------------------------------------------

--
-- Table structure for table `change_logs`
--

CREATE TABLE `change_logs` (
  `id` int(10) NOT NULL,
  `admin` varchar(20) NOT NULL,
  `operation` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `change_logs`
--

INSERT INTO `change_logs` (`id`, `admin`, `operation`, `description`, `timestamp`) VALUES
(1, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-11-27 08:25:18'),
(2, 'patpat', 'delete', 'Admin: <b>PATPATPTESTA</b> have been deleted at <b>System Administrators.</b>', '2023-11-27 08:27:14'),
(3, 'patpat', 'edit', 'Announcement: <b>TEST TITLE ANNOUNCEMENT #1</b> have been updated at <b>Announcements.</b>', '2023-11-27 10:00:59'),
(4, 'patpat', 'add', 'Announcement: <b>TEST TITLE ANNOUNCEMENT #2</b> have been added at <b>Announcements.</b>', '2023-11-27 10:02:04'),
(5, 'patpat', 'edit', 'Announcement: <b>TEST TITLE ANNOUNCEMENT #2</b> have been updated at <b>Announcements.</b>', '2023-11-27 10:33:59'),
(6, 'patpat', 'add', 'Alumni Member: <b>20231201</b> have been registered at  <b>Alumni Members.</b>', '2023-11-27 14:14:42'),
(7, 'patpat', 'delete', 'Announcement: <b>AN11</b> have been deleted at <b>Announcements.</b>', '2023-11-27 14:33:12'),
(8, 'patpat', 'delete', 'Announcement: <b>AN12</b> have been deleted at <b>Announcements.</b>', '2023-11-27 14:33:16'),
(9, 'patpat', 'delete', 'Announcement: <b>AN3</b> have been deleted at <b>Announcements.</b>', '2023-11-27 14:33:21'),
(10, 'patpat', 'add', 'Announcement: <b>TEST TITLE ANNOUNCEMENT #1</b> have been added at <b>Announcements.</b>', '2023-11-27 14:34:06'),
(11, 'patpat', 'edit', 'Announcement: <b>TEST TITLE ANNOUNCEMENT #2</b> has been updated at <b>Announcements.</b>', '2023-11-27 14:46:36'),
(12, 'patpat', 'edit', 'Announcement: <b>TEST TITLE ANNOUNCEMENT #2</b> has been updated at <b>Announcements.</b>', '2023-11-27 14:46:54'),
(13, 'patpat', 'edit', 'Announcement: <b>TEST TITLE ANNOUNCEMENT 333</b> has been updated at <b>Announcements.</b>', '2023-11-27 15:59:00'),
(14, 'patpat', 'edit', 'Announcement: <b>TEST TITLE ANNOUNCEMENT 1</b> has been updated at <b>Announcements.</b>', '2023-11-27 16:51:21'),
(15, 'patpat', 'add', 'Alumni Member: <b>20231301</b> have been registered at  <b>Alumni Members.</b>', '2023-11-27 16:53:36'),
(16, 'patpat', 'add', 'Announcement: <b>TEST BOARD OF DIRECTORS#1</b> have been added at <b>Announcements.</b>', '2023-11-27 16:54:24'),
(17, 'patpat', 'delete', 'Announcement: <b>AN14</b> have been deleted at <b>Announcements.</b>', '2023-11-27 16:55:15'),
(18, 'patpat', 'delete', 'Announcement: <b>AN15</b> have been deleted at <b>Announcements.</b>', '2023-11-27 19:42:46'),
(19, 'patpat', 'edit', 'Announcement: <b>TEST TITLE ANNOUNCEMENT 1</b> has been updated at <b>Announcements.</b>', '2023-11-27 19:42:57'),
(20, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-11-29 03:07:04'),
(21, 'patpat', 'edit', 'Announcement: <b>TEST TITLE ANNOUNCEMENT 2</b> has been updated at <b>Announcements.</b>', '2023-11-29 03:12:19'),
(22, 'patpat', 'edit', 'Announcement: <b>TEST TITLE ANNOUNCEMENT 1</b> has been updated at <b>Announcements.</b>', '2023-11-29 03:42:46'),
(23, 'patpat', 'edit', 'Announcement: <b>TEST TITLE ANNOUNCEMENT 2</b> has been updated at <b>Announcements.</b>', '2023-11-29 03:42:55'),
(24, 'patpat', 'edit', 'Announcement: <b>TEST TITLE ANNOUNCEMENT 1</b> has been updated at <b>Announcements.</b>', '2023-11-29 03:43:04'),
(25, 'patpat', 'edit', 'Board of Director <b>TEST BOARD OF DIRECTORS#1</b> has been updated at <b>Board of Director.</b>', '2023-11-29 03:47:43'),
(26, 'patpat', 'add', 'Announcement: <b>TEST TITLE ANNOUNCEMENT #2</b> have been added at <b>Announcements.</b>', '2023-11-29 03:49:20'),
(27, 'patpat', 'delete', 'Announcement: <b>AN16</b> have been deleted at <b>Announcements.</b>', '2023-11-29 03:49:29'),
(28, 'patpat', 'edit', 'Board of Director <b>TEST BOARD OF DIRECTORS#23</b> has been updated at <b>Board of Director.</b>', '2023-11-29 03:53:26'),
(29, 'patpat', 'add', 'Board of Directors: <b>ADASD</b> have been added at <b>Board of Directors.</b>', '2023-11-29 03:55:54'),
(30, 'patpat', 'add', 'Board of Directors: <b>DSADA</b> have been added at <b>Board of Directors.</b>', '2023-11-29 04:02:36'),
(31, 'patpat', 'edit', 'Board of Director <b>DSADAAAAA</b> has been updated at <b>Board of Director.</b>', '2023-11-29 04:02:47'),
(32, 'patpat', 'delete', 'Board of Directors: <b>AN8</b> have been deleted at <b>Board of Directors.</b>', '2023-11-29 04:04:15'),
(33, 'patpat', 'add', 'Projects: <b>PROJECT TESTING #2</b> have been added at <b>Projects.</b>', '2023-11-29 04:11:05'),
(34, 'patpat', 'edit', ' Projects <b>PROJECT TESTING #3</b> has been updated at <b> Projects.</b>', '2023-11-29 04:11:26'),
(35, 'patpat', 'delete', 'Projects: <b>AN7</b> have been deleted at <b>Projects.</b>', '2023-11-29 04:11:37'),
(36, 'patpat', 'add', 'Projects: <b>12313</b> have been added at <b>Projects.</b>', '2023-11-29 04:17:26'),
(37, 'patpat', 'delete', 'History: <b>AN0</b> have been deleted at <b>Board of History.</b>', '2023-11-29 04:20:06'),
(38, 'patpat', 'delete', 'History: <b>AN0</b> have been deleted at <b>Board of History.</b>', '2023-11-29 04:22:40'),
(39, 'patpat', 'delete', 'History: <b>AN0</b> have been deleted at <b>Board of History.</b>', '2023-11-29 04:26:24'),
(40, 'patpat', 'delete', 'History: <b>AN1</b> have been deleted at <b>Board of History.</b>', '2023-11-29 04:26:32'),
(41, 'patpat', 'add', 'History: <b>ASDAD</b> have been added at <b>History.</b>', '2023-11-29 04:26:43'),
(42, 'patpat', 'edit', 'History <b>ASDADASDADASDASDADASDASADADSFSF</b> has been updated at <b> History.</b>', '2023-11-29 04:28:29'),
(43, 'patpat', 'edit', 'History <b>TO CONNECT, ENGAGE, AND EMPOWER OUR DIVERSE COMMUNITY OF ALUMNI, FOSTERING A LIFELONG AND MUTUALLY BENEFICIAL RELATIONSHIP BETWEEN OUR GRADUATES AND THEIR ALMA MATER.</b> has been updated a', '2023-11-29 04:31:19'),
(44, 'patpat', 'edit', 'History <b>TO CONNECT, ENGAGE, AND EMPOWER OUR DIVERSE COMMUNITY OF ALUMNI, FOSTERING A LIFELONG AND MUTUALLY BENEFICIAL RELATIONSHIP BETWEEN OUR GRADUATES AND THEIR ALMA MATER.</b> has been updated a', '2023-11-29 04:31:43'),
(45, 'patpat', 'edit', 'History <b>TO CONNECT, ENGAGE, AND EMPOWER OUR DIVERSE COMMUNITY OF ALUMNI, FOSTERING A LIFELONG AND MUTUALLY BENEFICIAL RELATIONSHIP BETWEEN OUR GRADUATES AND THEIR ALMA MATER.ASDDAAAAAAAAAAA</b> has', '2023-11-29 04:31:55'),
(46, 'patpat', 'edit', 'History <b>TO CONNECT, ENGAGE, AND EMPOWER OUR DIVERSE COMMUNITY OF ALUMNI, FOSTERING A LIFELONG AND MUTUALLY BENEFICIAL RELATIONSHIP BETWEEN OUR GRADUATES AND THEIR ALMA MATER.ASDDAAAAAAAAAAA</b> has', '2023-11-29 04:32:04'),
(47, 'patpat', 'edit', 'History <b>TO CONNECT, ENGAGE, AND EMPOWER OUR DIVERSE COMMUNITY OF ALUMNI, FOSTERING A LIFELONG AND MUTUALLY BENEFICIAL RELATIONSHIP BETWEEN OUR GRADUATES AND THEIR ALMA MATER.</b> has been updated a', '2023-11-29 04:32:14'),
(48, 'patpat', 'edit', 'History <b>TO CONNECT, ENGAGE, AND EMPOWER OUR DIVERSE COMMUNITY OF ALUMNI, FOSTERING A LIFELONG AND MUTUALLY BENEFICIAL RELATIONSHIP BETWEEN OUR GRADUATES AND THEIR ALMA MATER.SSS</b> has been update', '2023-11-29 14:36:51'),
(49, 'patpat', 'add', 'Announcement: <b>ASMKAKDJKAJS</b> have been added at <b>Announcements.</b>', '2023-11-29 14:48:19'),
(50, 'patpat', 'edit', 'Board of Director <b>PROJECT TESTING #!</b> has been updated at <b>Board of Director.</b>', '2023-11-29 15:03:39'),
(51, 'patpat', 'delete', 'Board of Directors: <b>BD9</b> have been deleted at <b>Board of Directors.</b>', '2023-11-29 15:09:55'),
(52, 'patpat', 'add', 'Board of Directors: <b>ASDSAD</b> have been added at <b>Board of Directors.</b>', '2023-11-29 15:10:06'),
(53, 'patpat', 'edit', 'Board of Director <b>ASDSAD</b> has been updated at <b>Board of Director.</b>', '2023-11-29 15:14:36'),
(54, 'patpat', 'edit', 'Board of Director <b>PROJECT TESTING #!</b> has been updated at <b>Board of Director.</b>', '2023-11-29 15:14:46'),
(55, 'patpat', 'edit', 'Board of Director <b>ASDSAD</b> has been updated at <b>Board of Director.</b>', '2023-11-29 15:15:27'),
(56, 'patpat', 'edit', 'Board of Director <b>ASDSAD</b> has been updated at <b>Board of Director.</b>', '2023-11-29 15:15:36'),
(57, 'patpat', 'edit', 'Board of Director <b>MAYOR ALONG MALAPITAN</b> has been updated at <b>Board of Director.</b>', '2023-11-29 15:15:51'),
(58, 'patpat', 'edit', 'Board of Director <b>TEODORO MACARAEG</b> has been updated at <b>Board of Director.</b>', '2023-11-29 15:16:17'),
(59, 'patpat', 'edit', 'Board of Director <b>TEODORO MACARAEG</b> has been updated at <b>Board of Director.</b>', '2023-11-29 15:23:29'),
(60, 'patpat', 'edit', 'Board of Director <b>MAYOR ALONG MALAPITAN</b> has been updated at <b>Board of Director.</b>', '2023-11-29 15:23:45'),
(61, 'patpat', 'edit', 'Board of Director <b>TEODORO MACARAEG</b> has been updated at <b>Board of Director.</b>', '2023-11-29 15:24:04'),
(62, 'patpat', 'edit', 'Board of Director <b>TEODORO MACARAEG</b> has been updated at <b>Board of Director.</b>', '2023-11-29 15:25:17'),
(63, 'patpat', 'edit', 'Board of Director <b>MAYOR ALONG MALAPITAN</b> has been updated at <b>Board of Director.</b>', '2023-11-29 15:25:43'),
(64, 'patpat', 'edit', 'Board of Director <b>MAYOR ALONG MALAPITAN</b> has been updated at <b>Board of Director.</b>', '2023-11-29 15:26:59'),
(65, 'patpat', 'delete', 'Board of Directors: <b>BD6</b> have been deleted at <b>Board of Directors.</b>', '2023-11-29 15:29:55'),
(66, 'patpat', 'edit', 'Board of Director <b>TEODORO MACARAEG</b> has been updated at <b>Board of Director.</b>', '2023-11-29 15:30:13'),
(67, 'patpat', 'add', 'Board of Directors: <b>SADSA</b> have been added at <b>Board of Directors.</b>', '2023-11-29 15:31:26'),
(68, 'patpat', 'edit', 'Board of Director <b>SADSA</b> has been updated at <b>Board of Director.</b>', '2023-11-29 15:33:13'),
(69, 'patpat', 'edit', 'Board of Director <b>SADSA</b> has been updated at <b>Board of Director.</b>', '2023-11-29 15:35:02'),
(70, 'patpat', 'edit', 'Board of Director <b>PROF. JOHN NICKLAUS S. JUNIO</b> has been updated at <b>Board of Director.</b>', '2023-11-29 15:56:04'),
(71, 'patpat', 'edit', 'Board of Director <b>PROF. JOHN NICKLAUS S. JUNIO</b> has been updated at <b>Board of Director.</b>', '2023-11-29 15:56:15'),
(72, 'patpat', 'edit', 'Board of Director <b>PROF. TEODORO MACARAEG</b> has been updated at <b>Board of Director.</b>', '2023-11-29 16:01:08'),
(73, 'patpat', 'add', 'Board of Directors: <b>PROF. JOHN MATTHEW JACKSON</b> have been added at <b>Board of Directors.</b>', '2023-11-29 16:02:34'),
(74, 'patpat', 'add', 'Board of Directors: <b>ENGR. JANE TAKLESA</b> have been added at <b>Board of Directors.</b>', '2023-11-29 16:03:47'),
(75, 'patpat', 'add', 'Board of Directors: <b>PROF. CATHRINA PUKLAWAN</b> have been added at <b>Board of Directors.</b>', '2023-11-29 16:04:25'),
(76, 'patpat', 'add', 'Board of Directors: <b>ATTY. DAVINCI CODIE</b> have been added at <b>Board of Directors.</b>', '2023-11-29 16:05:01'),
(77, 'patpat', 'edit', 'Announcement: <b>ASMKAKDJKAJS</b> has been updated at <b>Announcements.</b>', '2023-11-29 16:23:48'),
(78, 'patpat', 'edit', 'Announcement: <b>ASMKAKDJKAJS</b> has been updated at <b>Announcements.</b>', '2023-11-29 16:24:54'),
(79, 'patpat', 'add', 'Admin: <b>MARGIE</b> have been added at <b>System Administrators.</b>', '2023-11-29 18:41:30'),
(80, 'patpat', 'delete', 'Admin: <b>SIOPAO</b> have been deleted at <b>System Administrators.</b>', '2023-11-29 18:52:12'),
(81, 'patpat', 'delete', 'Admin: <b>CYRUS</b> have been deleted at <b>System Administrators.</b>', '2023-11-29 18:52:36'),
(82, 'patpat', 'delete', 'Admin: <b>DDDDDDDD</b> have been deleted at <b>System Administrators.</b>', '2023-11-29 18:54:08'),
(83, 'patpat', 'delete', 'Admin: <b>MARGIE</b> have been deleted at <b>System Administrators.</b>', '2023-11-29 18:54:13'),
(84, 'patpat', 'add', 'Admin: <b>ADMIN</b> has been added to <b>System Administrators.</b>', '2023-11-29 18:54:22'),
(85, 'admin', 'login', 'Admin: <b>ADMIN</b> Just logged on to the System', '2023-11-29 18:54:32'),
(86, 'admin', 'delete', 'Admin: <b>MARGIE</b> have been deleted at <b>System Administrators.</b>', '2023-11-29 19:21:29'),
(87, 'admin', 'add', 'Admin: <b>MARGIE</b> has been added to <b>System Administrators.</b>', '2023-11-29 19:21:41'),
(88, 'margie', 'login', 'Admin: <b>MARGIE</b> Just logged on to the System', '2023-11-29 19:22:00'),
(89, 'margie', 'edit', 'Admin: <b>MARGIE</b> have been edited at <b>System Administrators.</b>', '2023-11-29 19:40:15'),
(90, 'margie', 'login', 'Admin: <b>MARGIE</b> Just logged on to the System', '2023-11-29 19:47:05'),
(91, 'margie', 'edit', 'Admin: <b>CONAG</b> have been edited at <b>System Administrators.</b>', '2023-11-29 19:51:50'),
(92, 'margie', 'edit', 'Admin: <b>NEWADMIN</b> have been edited at <b>System Administrators.</b>', '2023-11-29 19:51:58'),
(93, 'margie', 'edit', 'Admin: <b>CONAG</b> have been edited at <b>System Administrators.</b>', '2023-11-29 19:55:33'),
(94, 'margie', 'edit', 'Admin: <b>NEWADMIN</b> have been edited at <b>System Administrators.</b>', '2023-11-29 19:55:45'),
(95, 'margie', 'edit', 'Admin: <b>PATPAT</b> have been edited at <b>System Administrators.</b>', '2023-11-29 19:55:59'),
(96, 'margie', 'edit', 'Admin: <b>ROWEE</b> have been edited at <b>System Administrators.</b>', '2023-11-29 19:56:07'),
(97, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-11-29 20:06:12'),
(98, 'margie', 'login', 'Admin: <b>MARGIE</b> Just logged on to the System', '2023-11-29 20:06:44'),
(99, 'margie', 'login', 'Admin: <b>MARGIE</b> Just logged on to the System', '2023-11-29 20:11:57'),
(100, 'conag', 'login', 'Admin: <b>CONAG</b> Just logged on to the System', '2023-11-29 20:13:18'),
(101, 'conag', 'login', 'Admin: <b>CONAG</b> Just logged on to the System', '2023-11-29 20:37:32'),
(102, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-11-29 20:37:43'),
(103, 'conag', 'login', 'Admin: <b>CONAG</b> Just logged on to the System', '2023-11-29 20:38:00'),
(104, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-11-29 20:38:11'),
(105, 'patpat', 'edit', 'Admin: <b>CONAG</b> have been edited at <b>System Administrators.</b>', '2023-11-29 20:38:23'),
(106, 'conag', 'login', 'Admin: <b>CONAG</b> Just logged on to the System', '2023-11-29 20:38:31'),
(107, 'margie', 'login', 'Admin: <b>MARGIE</b> Just logged on to the System', '2023-11-29 20:53:59'),
(108, 'conag', 'login', 'Admin: <b>CONAG</b> Just logged on to the System', '2023-11-30 07:47:12'),
(109, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-11-30 14:16:50'),
(110, 'admin', 'login', 'Admin: <b>ADMIN</b> Just logged on to the System', '2023-11-30 17:12:12'),
(111, 'margie', 'login', 'Admin: <b>MARGIE</b> Just logged on to the System', '2023-11-30 17:13:26'),
(112, 'margie', 'login', 'Admin: <b>MARGIE</b> Just logged on to the System', '2023-11-30 17:41:29'),
(113, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-11-30 17:41:42'),
(114, 'margie', 'login', 'Admin: <b>MARGIE</b> Just logged on to the System', '2023-11-30 17:42:29'),
(115, 'margie', 'login', 'Admin: <b>MARGIE</b> Just logged on to the System', '2023-11-30 17:44:05'),
(116, 'margie', 'login', 'Admin: <b>MARGIE</b> Just logged on to the System', '2023-11-30 17:44:42'),
(117, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-11-30 17:52:21'),
(118, 'margie', 'login', 'Admin: <b>MARGIE</b> Just logged on to the System', '2023-11-30 17:55:04'),
(119, 'margie', 'add', 'Projects: <b>TEST TITLE ANNOUNCEMENT #2</b> have been added at <b>Projects.</b>', '2023-11-30 17:55:47'),
(120, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-11-30 17:56:10'),
(121, 'margie', 'login', 'Admin: <b>MARGIE</b> Just logged on to the System', '2023-11-30 18:02:27'),
(122, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-12-01 03:14:36'),
(123, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-12-01 03:14:37'),
(124, 'margie', 'login', 'Admin: <b>MARGIE</b> Just logged on to the System', '2023-12-01 03:23:14'),
(125, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-12-01 03:23:26'),
(126, 'patpat', 'edit', 'Board of Director <b>PROF. JOHN MATTHEW JACKSON</b> has been updated at <b>Board of Director.</b>', '2023-12-01 07:51:59'),
(127, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-12-03 18:07:37'),
(128, 'margie', 'login', 'Admin: <b>MARGIE</b> Just logged on to the System', '2023-12-03 18:44:35'),
(129, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-12-03 18:45:26'),
(130, 'margie', 'login', 'Admin: <b>MARGIE</b> Just logged on to the System', '2023-12-04 18:26:02'),
(131, 'margie', 'login', 'Admin: <b>MARGIE</b> Just logged on to the System', '2023-12-04 18:27:59'),
(132, 'margie', 'login', 'Admin: <b>MARGIE</b> Just logged on to the System', '2023-12-04 18:28:22'),
(133, 'margie', 'login', 'Admin: <b>MARGIE</b> Just logged on to the System', '2023-12-04 18:33:00'),
(134, 'conag', 'login', 'Admin: <b>CONAG</b> Just logged on to the System', '2023-12-04 18:33:13'),
(135, 'margie', 'login', 'Admin: <b>MARGIE</b> Just logged on to the System', '2023-12-04 18:35:28'),
(136, 'conag', 'login', 'Admin: <b>CONAG</b> Just logged on to the System', '2023-12-04 18:35:44'),
(137, 'margie', 'login', 'Admin: <b>MARGIE</b> Just logged on to the System', '2023-12-04 18:36:53'),
(138, 'margie', 'login', 'Admin: <b>MARGIE</b> Just logged on to the System', '2023-12-04 18:37:30'),
(139, 'margie', 'login', 'Admin: <b>MARGIE</b> Just logged on to the System', '2023-12-04 18:37:38'),
(140, 'margie', 'login', 'Admin: <b>MARGIE</b> Just logged on to the System', '2023-12-04 18:38:59'),
(141, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-12-04 18:41:07'),
(142, 'patpat', 'add', 'Announcement: <b>ADASD</b> have been added at <b>Announcements.</b>', '2023-12-04 18:47:59'),
(143, 'patpat', 'delete', 'Announcement: <b>AN18</b> have been deleted at <b>Announcements.</b>', '2023-12-04 18:49:26'),
(144, 'patpat', 'add', 'Announcement: <b>ASDAD</b> have been added at <b>Announcements.</b>', '2023-12-04 18:49:36'),
(145, 'patpat', 'edit', 'Announcement: <b>ASDADSA</b> have been updated at <b>Announcements.</b>', '2023-12-04 18:49:48'),
(146, 'patpat', 'delete', 'Announcement: <b>AN19</b> have been deleted at <b>Announcements.</b>', '2023-12-04 18:50:30'),
(147, 'patpat', 'add', 'Announcement: <b>ASDASD</b> have been added at <b>Announcements.</b>', '2023-12-04 18:50:39'),
(148, 'patpat', 'edit', 'Announcement: <b>ASDASD</b> has been updated at <b>Announcements.</b>', '2023-12-04 18:50:47'),
(149, 'patpat', 'delete', 'Announcement: <b>AN20</b> have been deleted at <b>Announcements.</b>', '2023-12-04 18:50:58'),
(150, 'patpat', 'add', 'Board of Directors: <b>ASDADASD</b> have been added at <b>Board of Directors.</b>', '2023-12-04 18:52:27'),
(151, 'patpat', 'edit', 'Board of Director <b>ASDADASD</b> has been updated at <b>Board of Director.</b>', '2023-12-04 18:52:39'),
(152, 'patpat', 'delete', 'Board of Directors: <b>BD16</b> have been deleted at <b>Board of Directors.</b>', '2023-12-04 18:52:44'),
(153, 'patpat', 'edit', ' Projects <b>TEST TITLE AASDASDANNOUNCEMENT #3</b> has been updated at <b> Projects.</b>', '2023-12-04 19:04:11'),
(154, 'patpat', 'delete', 'Projects: <b>PR6</b> have been deleted at <b>Projects.</b>', '2023-12-04 19:04:23'),
(155, 'patpat', 'edit', 'Announcement: <b>TEST TITLE ANNOUNCEMENT 1</b> has been updated at <b>Announcements.</b>', '2023-12-04 19:04:41'),
(156, 'patpat', 'add', 'History: <b>ASDASD</b> have been added at <b>History.</b>', '2023-12-04 19:07:20'),
(157, 'patpat', 'edit', 'History <b>TED</b> has been updated at <b> History.</b>', '2023-12-04 19:07:56'),
(158, 'patpat', 'delete', 'History: <b>HS3</b> have been deleted at <b>Board of History.</b>', '2023-12-04 19:08:01'),
(159, 'patpat', 'add', 'Projects: <b>HUNYO</b> have been added at <b>Projects.</b>', '2023-12-04 19:08:20'),
(160, 'patpat', 'delete', 'Projects: <b>PR9</b> have been deleted at <b>Projects.</b>', '2023-12-04 19:08:30'),
(161, 'patpat', 'add', 'Admin: <b>HEYE</b> has been added to <b>System Administrators.</b>', '2023-12-04 19:19:03'),
(162, 'patpat', 'add', 'Admin: <b>DIKO</b> has been added to <b>System Administrators.</b>', '2023-12-04 19:33:56'),
(163, 'patpat', 'delete', 'Admin: <b>HEYE</b> have been deleted at <b>System Administrators.</b>', '2023-12-04 19:47:26'),
(164, 'patpat', 'edit', 'Admin: <b>ADMIN</b> have been edited at <b>System Administrators.</b>', '2023-12-04 19:47:33'),
(165, 'patpat', 'edit', 'Admin: <b>ADMIN</b> have been edited at <b>System Administrators.</b>', '2023-12-04 19:48:57'),
(166, 'patpat', 'edit', 'Admin: <b>ADMIN</b> have been edited at <b>System Administrators.</b>', '2023-12-04 19:51:02'),
(167, 'patpat', 'delete', 'Admin: <b>NEWADMIN</b> have been deleted at <b>System Administrators.</b>', '2023-12-04 19:51:11'),
(168, 'admin', 'login', 'Admin: <b>ADMIN</b> Just logged on to the System', '2023-12-04 19:54:04'),
(169, 'admin', 'login', 'Admin: <b>ADMIN</b> Just logged on to the System', '2023-12-04 19:54:34'),
(170, 'admin', 'login', 'Admin: <b>ADMIN</b> Just logged on to the System', '2023-12-04 20:03:42'),
(171, 'admin', 'login', 'Admin: <b>ADMIN</b> Just logged on to the System', '2023-12-04 20:03:59'),
(172, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-12-04 20:09:16'),
(173, 'admin', 'login', 'Admin: <b>ADMIN</b> Just logged on to the System', '2023-12-04 20:18:11'),
(174, 'admin', 'login', 'Admin: <b>ADMIN</b> Just logged on to the System', '2023-12-04 20:19:51'),
(175, 'admin', 'login', 'Admin: <b>ADMIN</b> Just logged on to the System', '2023-12-04 20:22:47'),
(176, 'admin', 'delete', 'Announcement: <b>AN13</b> have been deleted at <b>Announcements.</b>', '2023-12-04 20:26:36');

-- --------------------------------------------------------

--
-- Table structure for table `client_announcement`
--

CREATE TABLE `client_announcement` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `img` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `last_modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_announcement`
--

INSERT INTO `client_announcement` (`id`, `title`, `img`, `description`, `last_modified`) VALUES
(17, 'asmkakdjkajs', '348387424_266376169286479_9159403169164732536_n.png', 'asdasdasddsasdas', '2023-11-29 16:24:00');

-- --------------------------------------------------------

--
-- Table structure for table `directors`
--

CREATE TABLE `directors` (
  `id_director` int(50) NOT NULL,
  `name_director` varchar(1000) NOT NULL,
  `img_director` varchar(1000) NOT NULL,
  `position` varchar(1000) NOT NULL,
  `direct_timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `directors`
--

INSERT INTO `directors` (`id_director`, `name_director`, `img_director`, `position`, `direct_timestamp`) VALUES
(10, 'Prof. John Nicklaus S. Junio', 'junio.png', 'President', '2023-11-29 23:56:07'),
(11, 'Prof. Teodoro Macaraeg', 'macaraeg.png', 'Vice President', '2023-11-30 00:00:55'),
(12, 'Prof. John Matthew Jackson', '2.png', 'Treasurer', '2023-12-01 15:51:47'),
(13, 'Engr. Jane Taklesa', 'mnone.png', 'Auditor', '2023-11-30 00:03:27'),
(14, 'Prof. Cathrina Puklawan', 'mnone.png', 'PRO', '2023-11-30 00:03:52'),
(15, 'Atty. Davinci Codie', 'none.png', 'Business Manager', '2023-11-30 00:04:29');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(100) NOT NULL,
  `img` varchar(1000) NOT NULL,
  `mission` varchar(1000) NOT NULL,
  `vission` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `img`, `mission`, `vission`) VALUES
(2, 'ss.png', 'To connect, engage, and empower our diverse community of alumni, fostering a lifelong and mutually beneficial relationship between our graduates and their alma mater.sss', 'The University of Caloocan City Alumni Association envisions a vibrant and interconnected network of alumni who are proud ambassadors of our institution. We aspire to be a dynamic force in strengthening the bonds among alumni, fostering a culture of giving and volunteerism, and providing invaluable support to our university.');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(100) NOT NULL,
  `info_des 1` mediumtext NOT NULL,
  `info_des2` mediumtext NOT NULL,
  `info_des3` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `info_des 1`, `info_des2`, `info_des3`) VALUES
(1, 'Alumni Association ', 'An alumni organization for a state university is a group or association formed by former students (alumni) of that particular state university. These organizations are typically established to serve various purposes and provide benefits to alumni, the university, and the broader community.', 'An alumni organization for a state university is a group or association formed by former students (alumni) of that particular state university. These organizations are typically established to serve various purposes and provide benefits to alumni, the university, and the broader community. \r\nAlumni organizations are essential for maintaining the spirit and legacy of a state university. They help alumni stay engaged with their alma mater, provide valuable resources, and contribute to the overall success and reputation of the university.');

-- --------------------------------------------------------

--
-- Table structure for table `inquire`
--

CREATE TABLE `inquire` (
  `id` int(11) NOT NULL,
  `i_name` varchar(50) NOT NULL,
  `i_email` varchar(200) NOT NULL,
  `i_message` varchar(1000) NOT NULL,
  `r_message` varchar(1000) NOT NULL,
  `i_status` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inquire`
--

INSERT INTO `inquire` (`id`, `i_name`, `i_email`, `i_message`, `r_message`, `i_status`) VALUES
(5, 'Margie Del Cstillo', 'villamilmilla@gmail.com', 'can i have a custom event with my self place ?', 'Yes you can have it Ma\'am', 1),
(9, 'Paula Jean ', 'paulajeanpascual@gmail.com', 'good day, are you offering a personalize event like the place of the event is will be from us ?', 'Yes, Ma\'am Paula but we need to talk about it. If you want to, we can call you via messenger or via viber so we can talk about it more.', 1),
(12, 'Joan Hazel Agpuldo', 'jhagpuldo.cbpa@gmail.com', 'hi ', 'hiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii', 1),
(13, 'Arabella Belardo', 'belardoarabella05@gmail.com', 'hi po', 'hi dn po', 1),
(14, 'Paolo Rafael Tampico', 'paolorafaeltampico@gmail.com', 'Can you manage to organize an event for my 21st Birthday? ', 'Yes Sir Paolo! We are more than happy to organazie an event for you 21st Birthday!S', 1),
(15, 'Cathy', 'Ispongklong.031@gmail.com', 'kajfahdjkad', 'ahjkdhjahdad', 1),
(16, 'Cathy Llena ', 'cathy.llena@ucc-caloocan.edu.ph', 'can i request a special theme', 'yes we can offer that', 1),
(17, 'topeq', 'ispongklong.031@gmail.com', 'panget si tope?', 'oo panget sya ', 1),
(18, 'jhezryll roxas', 'jhezryll69@gmail.com', 'pogi mo jhez', 'oo nga pogi mo talaga', 1),
(19, 'jhezryll roxas', 'ispongklong.031@gmail.com', 'HAJHDSADHAHDSJADJAHDAJHD', '', 0),
(20, 'percy ', 'ispongklong.031@gmail.com', 'ahdsahdad\r\n', 'bakiittt', 1),
(21, 'sadaadad', 'ispongklong.031@gmail.com', 'asdadsadsadsd', '', 0),
(22, 'jhezryll roxas', 'ispongklong.031@gmail.com', 'sadadsada', '', 0),
(23, 'jhezryll roxas', 'ispongklong.031@gmail.com', 'asdad', '', 0),
(24, 'jhezryll roxas', 'ispongklong.031@gmail.com', 'asdad', '', 0),
(25, 'jhezryll roxas', 'ispongklong.031@gmail.com', 'jtr', '', 0),
(26, 'Cyrus  Cruza Cantero', 'ccantero27@yahoo.com', 'asdsad', '', 0),
(27, 'John Loyd', 'asd@asdas', 'd', '', 0),
(28, 'test', 'asda@asdas', 'testtest', '', 0),
(29, 'asd', 'asd@test', 'asd', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(20) NOT NULL,
  `year` int(10) NOT NULL,
  `member_count` int(5) NOT NULL,
  `campus_id` varchar(5) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `birth_date` date NOT NULL,
  `civil_status` varchar(20) NOT NULL,
  `course` varchar(100) NOT NULL,
  `year_graduated` int(10) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `cellphone_no` varchar(20) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `signature` varchar(100) NOT NULL,
  `time_registered` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `year`, `member_count`, `campus_id`, `name`, `address`, `birth_date`, `civil_status`, `course`, `year_graduated`, `email_address`, `cellphone_no`, `picture`, `signature`, `time_registered`) VALUES
(2023101, 2023, 1, '01', 'asdasddddddddd', 'ddddddddddddddddddd', '2023-11-14', 'Single', 'BS Computer Science', 1232, 'dddddddddddddddddddd@asd', '12313111111', '404164883_908048160322508_8406637081693107494_n.jpg', '404164883_908048160322508_8406637081693107494_n.jpg', '2023-11-27 02:56:15'),
(2023102, 2023, 1, '02', 'asdasdasasd', 'asdsadasdasdas', '2023-11-16', 'Single', 'BS Information Technology', 2222, 'asdasdas@sadasdasdasd', '22222222222', '404164883_908048160322508_8406637081693107494_n.jpg', '404164883_908048160322508_8406637081693107494_n.jpg', '2023-11-27 04:01:57'),
(2023201, 2023, 2, '01', 'asdad', 'ddddd', '2023-11-08', 'Single', 'BS Computer Science', 2222, 'sdadas@asdasdas1111111111', '11111111111', 'gopheonix-da5353d8-65da-414d-9f10-0f2bfd835031.jpg', 'gopheonix-da5353d8-65da-414d-9f10-0f2bfd835031.jpg', '2023-11-27 02:58:49'),
(2023202, 2023, 2, '02', 'asdddadasasdasdas', 'dd22222', '2023-11-08', 'Married', 'BS Information Technology', 2232, 'asdasd@3213111ddddddddddddddd', '02365641111', '404164883_908048160322508_8406637081693107494_n.jpg', '404164883_908048160322508_8406637081693107494_n.jpg', '2023-11-27 04:22:53'),
(2023301, 2023, 3, '01', 'asdasdadd', 'asddasdsadsadsadasdsadsa', '2023-11-09', 'Single', 'BS Information Technology', 2222, 'asdadasad@asdasdassadasdasd', '21313123333', '404164883_908048160322508_8406637081693107494_n.jpg', '404164883_908048160322508_8406637081693107494_n.jpg', '2023-11-27 03:18:57'),
(2023302, 2023, 3, '02', 'Patricia Pascual', '22 phalili street', '2001-12-31', 'Single', 'BS Information Technology', 1234, 'ispongklong.031@gmail.com', '12345678901', 'junio.png', 'junio.png', '2023-12-04 20:51:32'),
(2023401, 2023, 4, '01', 'd', 'ad', '2023-11-15', 'Single', 'BS Information Technology', 22, 'd@d', '222', '404164883_908048160322508_8406637081693107494_n.jpg', '393758666_1334441123842379_5659633149707537726_n.png', '2023-11-27 03:21:34'),
(2023501, 2023, 5, '01', 'asdads', 'asdasdadas', '2023-11-12', 'Single', 'BS Entertainment and Multimedia Computing', 2222, 'asdasdas@asdasdasd', '222222', '404164883_908048160322508_8406637081693107494_n.jpg', '404164883_908048160322508_8406637081693107494_n.jpg', '2023-11-27 03:23:00'),
(2023601, 2023, 6, '01', 'asdsadas', '21312312', '2023-11-08', 'Single', 'BS Information Technology', 3213123, '123123123@asdasdas', '333', '404164883_908048160322508_8406637081693107494_n.jpg', '404164883_908048160322508_8406637081693107494_n.jpg', '2023-11-27 03:24:22'),
(2023701, 2023, 7, '01', 'dd', '3123123', '2023-11-25', 'Married', 'BS Information Technology', 2222, '222221321@asd', '2312312321', '404164883_908048160322508_8406637081693107494_n.jpg', '404164883_908048160322508_8406637081693107494_n.jpg', '2023-11-27 03:26:19'),
(2023801, 2023, 8, '01', 'asdasdad', '312312312', '2023-11-09', 'Married', 'BS Information System', 2222, 'asdasdas@asdadas', '123123', '404164883_908048160322508_8406637081693107494_n.jpg', '404164883_908048160322508_8406637081693107494_n.jpg', '2023-11-27 03:27:13'),
(2023901, 2023, 9, '01', 'dasdas', '31231231', '2023-11-08', 'Single', 'BS Computer Science', 12313, '21312@31231', '1231', '404164883_908048160322508_8406637081693107494_n.jpg', '404164883_908048160322508_8406637081693107494_n.jpg', '2023-11-27 03:31:08'),
(20231001, 2023, 10, '01', 'dddd', '131231312', '2023-11-09', 'Married', 'BS Entertainment and Multimedia Computing', 13123, '12313!@3213123', '1231313', '404164883_908048160322508_8406637081693107494_n.jpg', '404164883_908048160322508_8406637081693107494_n.jpg', '2023-11-27 03:36:13'),
(20231101, 2023, 11, '01', '123123', '3333', '2023-11-16', 'Single', 'BS Information Technology', 3333, '3332222@123', '1231231', '404164883_908048160322508_8406637081693107494_n.jpg', '404164883_908048160322508_8406637081693107494_n.jpg', '2023-11-27 03:42:16'),
(20231201, 2023, 12, '01', 'asdad', 'sadadsa', '2001-12-31', 'Married', 'BS Computer Science', 1231, 'ispongklong.031@gmail.com', '12345678908', '404164883_908048160322508_8406637081693107494_n.jpg', 'old-man-clipart-design-illustration-free-png.png', '2023-11-27 14:14:42'),
(20231301, 2023, 13, '01', 'asdad', '22 phalili street', '2001-12-31', 'Single', 'BS Information Technology', 1234, 'ispongklong.031@gmail.com', '12345678901', '1.png', 'IMG_4995.jpeg', '2023-11-27 16:53:36'),
(20231401, 2023, 14, '01', 'Patricia Pascual', '22 phalili street', '2001-12-31', 'Single', 'BS Information Technology', 1234, 'ispongklong.031@gmail.com', '09196994697', 'junio.png', 'mnone.png', '2023-12-03 18:04:38'),
(20231501, 2023, 15, '01', 'Patricia Pascual', '22 phalili street', '2001-12-31', 'Single', 'BS Computer Science', 1234, 'ispongklong.031@gmail.com', '12345678901', 'macaraeg.png', 'junio.png', '2023-12-03 18:07:04'),
(20231601, 2023, 16, '01', 'Patricia Pascual', '22 phalili street', '2001-12-31', 'Single', 'BS Computer Science', 1234, 'ispongklong.031@gmail.com', '12345678901', '/assets/images/member_pictures/1.png', '/assets/images/member_pictures/370258923_382637540784716_4908483697085139831_n.jpg', '2023-12-03 18:20:33'),
(20231701, 2023, 17, '01', 'Patricia Pascual', '22 phalili street', '2001-12-31', 'Married', 'BS Computer Science', 1234, 'ispongklong.031@gmail.com', '12345678901', 'junio.png', 'mnone.png', '2023-12-04 18:19:56'),
(20231801, 2023, 18, '01', 'Patricia Pascual', '22 phalili street', '2001-12-31', 'Single', 'BS Computer Science', 1234, 'ispongklong.031@gmail.com', '12345678910', '../../assets/images/member_pictures/old-man-clipart-design-illustration-free-png.png', '../../assets/images/member_pictures/mnone.png', '2023-12-04 20:30:31');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(100) NOT NULL,
  `img` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `last_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `img`, `title`, `description`, `last_modified`) VALUES
(8, 'IMG_4999.jpeg', 'Test Title Announcement #2', 'Test Title Announcement #2Test Title Announcement #2Test Title Announcement #2Test Title Announcement #2Test Title Announcement #2Test Title Announcement #2Test Title Announcement #2Test Title Announcement #2', '2023-11-30 17:55:18');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `id` int(20) NOT NULL,
  `member_id` int(20) DEFAULT NULL,
  `title` varchar(50) NOT NULL,
  `venue` varchar(50) NOT NULL,
  `duration` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainings`
--

INSERT INTO `trainings` (`id`, `member_id`, `title`, `venue`, `duration`) VALUES
(1, 2023101, 'cyTrainingsTitleA', 'cyTrainingsVenueA', 'cyTrainingsDurA'),
(2, 2023201, '', '', ''),
(3, 2023301, '', '', ''),
(4, 2023401, '', '', ''),
(5, 2023102, '', '', ''),
(6, 2023401, '', '', ''),
(7, 2023401, '', '', ''),
(8, 2023501, '', '', ''),
(9, 2023601, 'd', 'd', 'd'),
(10, 2023101, '', '', ''),
(11, 2023201, '', '', ''),
(12, 2023201, '', '', ''),
(13, 2023301, '', '', ''),
(14, 2023401, '', '', ''),
(15, 2023501, '', '', ''),
(16, 2023601, '', '', ''),
(17, 2023701, '', '', ''),
(18, 2023801, '', '', ''),
(19, 2023901, '', '', ''),
(20, 20231001, '', '', ''),
(21, 20231101, '', '', ''),
(22, 2023102, '', '', ''),
(23, 2023202, '', '', ''),
(24, 20231201, '', '', ''),
(25, 20231301, '', '', ''),
(26, 20231401, '', '', ''),
(27, 20231501, '', '', ''),
(28, 20231601, '', '', ''),
(29, 20231601, '', '', ''),
(30, 20231701, '', '', ''),
(31, 20231801, '', '', ''),
(32, 2023302, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `work_experience`
--

CREATE TABLE `work_experience` (
  `id` int(20) NOT NULL,
  `member_id` int(20) DEFAULT NULL,
  `company` varchar(50) NOT NULL,
  `position` varchar(20) NOT NULL,
  `duration` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `work_experience`
--

INSERT INTO `work_experience` (`id`, `member_id`, `company`, `position`, `duration`) VALUES
(1, 2023101, 'cyWorkComA', 'cyWorkPosA', 'cyWorkDurA'),
(2, 2023101, 'cyWorkComB', 'cyWorkComB', 'cyWorkComB'),
(3, 2023201, '', '', ''),
(4, 2023301, '', '', ''),
(5, 2023401, '', '', ''),
(6, 2023102, '', '', ''),
(7, 2023401, '', '', ''),
(8, 2023401, '', '', ''),
(9, 2023501, '', '', ''),
(10, 2023601, 'd', 'as', 'd'),
(11, 2023101, '', '', ''),
(12, 2023201, '', '', ''),
(13, 2023201, '', '', ''),
(14, 2023301, '', '', ''),
(15, 2023401, '', '', ''),
(16, 2023501, '', '', ''),
(17, 2023601, '', '', ''),
(18, 2023701, '', '', ''),
(19, 2023801, '', '', ''),
(20, 2023901, '', '', ''),
(21, 20231001, '', '', ''),
(22, 20231101, '', '', ''),
(23, 2023102, '', '', ''),
(24, 2023202, '', '', ''),
(25, 20231201, '', '', ''),
(26, 20231301, '', '', ''),
(27, 20231401, '', '', ''),
(28, 20231501, '', '', ''),
(29, 20231601, '', '', ''),
(30, 20231601, '', '', ''),
(31, 20231701, '', '', ''),
(32, 20231801, '', '', ''),
(33, 2023302, '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_username`);

--
-- Indexes for table `affiliations`
--
ALTER TABLE `affiliations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `members_id` (`member_id`);

--
-- Indexes for table `awards`
--
ALTER TABLE `awards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `members_id` (`member_id`);

--
-- Indexes for table `campus`
--
ALTER TABLE `campus`
  ADD PRIMARY KEY (`campus_id`);

--
-- Indexes for table `change_logs`
--
ALTER TABLE `change_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_announcement`
--
ALTER TABLE `client_announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `directors`
--
ALTER TABLE `directors`
  ADD PRIMARY KEY (`id_director`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquire`
--
ALTER TABLE `inquire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `campus_id` (`campus_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `members_id` (`member_id`);

--
-- Indexes for table `work_experience`
--
ALTER TABLE `work_experience`
  ADD PRIMARY KEY (`id`),
  ADD KEY `members_id` (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `affiliations`
--
ALTER TABLE `affiliations`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `awards`
--
ALTER TABLE `awards`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `change_logs`
--
ALTER TABLE `change_logs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `client_announcement`
--
ALTER TABLE `client_announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `directors`
--
ALTER TABLE `directors`
  MODIFY `id_director` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inquire`
--
ALTER TABLE `inquire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `work_experience`
--
ALTER TABLE `work_experience`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `affiliations`
--
ALTER TABLE `affiliations`
  ADD CONSTRAINT `affiliations_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `awards`
--
ALTER TABLE `awards`
  ADD CONSTRAINT `awards_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`campus_id`) REFERENCES `campus` (`campus_id`);

--
-- Constraints for table `trainings`
--
ALTER TABLE `trainings`
  ADD CONSTRAINT `trainings_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `work_experience`
--
ALTER TABLE `work_experience`
  ADD CONSTRAINT `work_experience_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
