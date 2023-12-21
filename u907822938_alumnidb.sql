-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2023 at 05:09 PM
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
('cyrus', '$2y$10$UHGMwfSHD0UMaYwnQjKFsuyVoQou66DCZdc/vZ.jKjb2MV84xIP22', 'Cyrus Cantero', '1'),
('DIKO', '$2y$10$wd9aCf4ZU14ZEklaGGDwiO.12Hn73HsvsD3tJIBuQZjfj4OydcFWS', 'roman', '1'),
('margie', '$2y$10$PEMuBKaz9BhKJr3sH0Luy.MqbiEEBAyXG7fFQkEL7s4oovl21Boge', 'margie', '2'),
('paolo', '$2y$10$FLY/Eo9k3LP5RfuTOBi6zOkLHHk6bqOKnM70FkNLadbCMmpXwNEhW', 'Paolo Tampico', '1'),
('patpat', '$2y$10$hHzCArjHZHGZpci1C2UyW.qnlo0Tj8gZdLxxXurOIrTKSPdRUsStC', 'patriciapiolopascual', '1'),
('rowee', '$2y$10$CaNRQvBZXNbHe2hkYaXo0e2IbNVCgccvmzRpwH.8iMUWFUovyQF2S', 'roweewee', '2'),
('superadmin', '$2y$10$Tr3qx6LJMptbyc6QcGDmnuszINaxiyI8O6booRZn4TjBICI85IXGq', 'SuperAdmin', '1');

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
(38, 20232201, '', '', ''),
(41, 20232301, '', '', ''),
(53, 2023102, 'organizationsA', 'organizationsPosA', 'organizationsDurA'),
(54, 20232401, '', '', ''),
(55, 20232501, '', '', ''),
(56, 2023202, '', '', ''),
(57, 2023302, '', '', ''),
(58, 2023402, '', '', '');

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
(41, 20232201, ''),
(44, 20232301, ''),
(56, 2023102, 'awardsA'),
(57, 20232401, ''),
(58, 20232501, ''),
(59, 2023202, ''),
(60, 2023302, ''),
(61, 2023402, '');

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
(176, 'admin', 'delete', 'Announcement: <b>AN13</b> have been deleted at <b>Announcements.</b>', '2023-12-04 20:26:36'),
(177, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-12-04 21:41:44'),
(178, 'patpat', 'add', 'Alumni Member: <b>20231901</b> have been registered at  <b>Alumni Members.</b>', '2023-12-05 03:06:13'),
(179, 'patpat', 'add', 'Alumni Member: <b>20232001</b> have been registered at  <b>Alumni Members.</b>', '2023-12-05 03:09:47'),
(180, 'patpat', 'add', 'Alumni Member: <b>20232101</b> have been registered at  <b>Alumni Members.</b>', '2023-12-05 03:46:14'),
(181, 'patpat', 'edit', 'Inquiries <b>I- 5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 05:17:58'),
(182, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 05:21:37'),
(183, 'patpat', 'edit', 'Inquiries <b> I-19</b> has been replied in<b>Inquiries.</b>', '2023-12-05 05:29:58'),
(184, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 05:31:25'),
(185, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 05:36:29'),
(186, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 05:37:11'),
(187, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 05:39:24'),
(188, 'patpat', 'edit', 'Inquiries <b> I-19</b> has been replied in<b>Inquiries.</b>', '2023-12-05 05:40:20'),
(189, 'patpat', 'edit', 'Inquiries <b> I-19</b> has been replied in<b>Inquiries.</b>', '2023-12-05 05:41:43'),
(190, 'patpat', 'edit', 'Inquiries <b> I-19</b> has been replied in<b>Inquiries.</b>', '2023-12-05 05:42:12'),
(191, 'patpat', 'edit', 'Inquiries <b> I-19</b> has been replied in<b>Inquiries.</b>', '2023-12-05 05:43:43'),
(192, 'patpat', 'edit', 'Inquiries <b> I-19</b> has been replied in<b>Inquiries.</b>', '2023-12-05 05:44:38'),
(193, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:10:00'),
(194, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:11:02'),
(195, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:11:03'),
(196, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:11:03'),
(197, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:11:03'),
(198, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:11:03'),
(199, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:11:07'),
(200, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:11:10'),
(201, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:11:13'),
(202, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:11:15'),
(203, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:11:24'),
(204, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:23:54'),
(205, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:25:22'),
(206, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:25:22'),
(207, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:25:23'),
(208, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:25:23'),
(209, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:25:23'),
(210, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:25:25'),
(211, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:25:25'),
(212, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:25:25'),
(213, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:25:25'),
(214, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:25:25'),
(215, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:25:25'),
(216, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:25:25'),
(217, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:25:25'),
(218, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:25:25'),
(219, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:25:25'),
(220, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:25:25'),
(221, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:25:28'),
(222, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:25:30'),
(223, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:25:33'),
(224, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:25:42'),
(225, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:25:44'),
(226, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:25:47'),
(227, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:25:50'),
(228, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:26:44'),
(229, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:26:44'),
(230, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:26:44'),
(231, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:26:44'),
(232, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:26:47'),
(233, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:26:50'),
(234, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:26:52'),
(235, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:26:55'),
(236, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:26:58'),
(237, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:27:47'),
(238, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:27:47'),
(239, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:27:51'),
(240, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:27:51'),
(241, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:27:52'),
(242, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:27:52'),
(243, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:27:52'),
(244, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:27:52'),
(245, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:27:52'),
(246, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:27:52'),
(247, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:27:52'),
(248, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:27:52'),
(249, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:27:52'),
(250, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:27:52'),
(251, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:27:52'),
(252, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:27:52'),
(253, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:27:55'),
(254, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:27:57'),
(255, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:28:00'),
(256, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:29:25'),
(257, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:29:27'),
(258, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:29:27'),
(259, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:29:27'),
(260, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:29:27'),
(261, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:29:27'),
(262, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:29:27'),
(263, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:29:27'),
(264, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:29:27'),
(265, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:29:27'),
(266, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:29:30'),
(267, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:29:32'),
(268, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:29:35'),
(269, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:29:38'),
(270, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:30:14'),
(271, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:30:26'),
(272, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:31:35'),
(273, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:32:38'),
(274, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:32:56'),
(275, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:33:58'),
(276, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:34:19'),
(277, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:39:13'),
(278, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:39:27'),
(279, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:39:47'),
(280, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:40:18'),
(281, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:40:36'),
(282, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-05 06:42:16'),
(283, 'admin', 'login', 'Admin: <b>ADMIN</b> Just logged on to the System', '2023-12-05 07:09:06'),
(284, 'admin', 'login', 'Admin: <b>ADMIN</b> Just logged on to the System', '2023-12-05 07:09:07'),
(285, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-12-05 07:16:36'),
(286, 'margie', 'login', 'Admin: <b>MARGIE</b> Just logged on to the System', '2023-12-05 07:28:15'),
(287, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-12-05 07:36:32'),
(288, 'margie', 'login', 'Admin: <b>MARGIE</b> Just logged on to the System', '2023-12-05 07:39:44'),
(289, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-12-05 10:30:25'),
(290, 'patpat', 'add', 'Announcement: <b>TEST BOARD OF DIRECTORS#1</b> have been added at <b>Announcements.</b>', '2023-12-05 10:39:56'),
(291, 'patpat', 'delete', 'Announcement: <b>AN21</b> have been deleted at <b>Announcements.</b>', '2023-12-05 10:40:02'),
(292, 'admin', 'login', 'Admin: <b>ADMIN</b> Just logged on to the System', '2023-12-05 10:43:06'),
(293, 'conag', 'login', 'Admin: <b>CONAG</b> Just logged on to the System', '2023-12-05 10:44:57'),
(294, 'conag', 'edit', 'Announcement: <b>HOTDOG</b> has been updated at <b>Announcements.</b>', '2023-12-05 13:09:01'),
(295, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-12-05 13:47:28'),
(296, 'patpat', 'edit', 'Main Campus: <b>PATRICIA PASCUAL</b> has been edited at <b>Main Campus.</b>', '2023-12-05 16:14:26'),
(297, 'patpat', 'edit', 'Main Campus: <b>PATRICIA PASCUAL</b> has been edited at <b>Main Campus.</b>', '2023-12-05 16:15:40'),
(298, 'patpat', 'edit', 'Main Campus: <b>PATRICIA PASCUAL</b> has been edited at <b>Main Campus.</b>', '2023-12-05 16:17:48'),
(299, 'patpat', 'edit', 'Alumni Id Inquiries: <b>PATRICIA PASCUAL</b> has been edited', '2023-12-05 16:19:40'),
(300, 'patpat', 'edit', 'Alumni Id Inquiries: <b>ARABELLA BELARDO</b> has been edited', '2023-12-05 16:20:43'),
(301, 'patpat', 'edit', 'Alumni Id Inquiries: <b>ARABELLA BELARDO</b> has been edited', '2023-12-05 16:46:06'),
(302, 'patpat', 'edit', 'Alumni Id Inquiries: <b>ARABELLA BELARDO</b> has been edited', '2023-12-05 16:52:11'),
(303, 'patpat', 'edit', 'Alumni Id Inquiries: <b>ARABELLA BELARDO</b> has been edited', '2023-12-05 17:02:03'),
(304, 'patpat', 'edit', 'Alumni Id Inquiries: <b>ARABELLA BELARDO</b> has been edited', '2023-12-05 17:03:06'),
(305, 'patpat', 'edit', 'Alumni Id Inquiries: <b>ARABELLA BELARDO</b> has been edited', '2023-12-05 17:11:45'),
(306, 'rowee', 'login', 'Admin: <b>ROWEE</b> Just logged on to the System', '2023-12-05 18:21:38'),
(307, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-12-05 18:45:27'),
(308, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-12-05 22:41:36'),
(309, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-12-05 22:55:35'),
(310, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-12-05 22:58:43'),
(311, 'rowee', 'login', 'Admin: <b>ROWEE</b> Just logged on to the System', '2023-12-06 04:20:47'),
(312, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-12-06 04:21:42'),
(313, 'rowee', 'login', 'Admin: <b>ROWEE</b> Just logged on to the System', '2023-12-06 06:15:17'),
(314, 'conag', 'login', 'Admin: <b>CONAG</b> Just logged on to the System', '2023-12-06 06:45:09'),
(315, 'rowee', 'login', 'Admin: <b>ROWEE</b> Just logged on to the System', '2023-12-06 06:53:17'),
(316, 'conag', 'login', 'Admin: <b>CONAG</b> Just logged on to the System', '2023-12-06 06:55:35'),
(317, 'conag', 'edit', 'Announcement: <b>TEST TITLE ANNOUNCEMENT #1</b> has been updated at <b>Announcements.</b>', '2023-12-06 07:07:29'),
(318, 'conag', 'edit', 'Announcement: <b>TEST TITLE ANNOUNCEMENT #2</b> has been updated at <b>Announcements.</b>', '2023-12-06 07:07:58'),
(319, 'conag', 'edit', 'Announcement: <b>TEST TITLE ANNOUNCEMENT #2</b> has been updated at <b>Announcements.</b>', '2023-12-06 07:08:09'),
(320, 'conag', 'edit', ' Projects <b>TEST TITLE PROJECTS #1</b> has been updated at <b> Projects.</b>', '2023-12-06 07:08:42'),
(321, 'conag', 'add', 'Projects: <b>PROJECT TESTING #2</b> have been added at <b>Projects.</b>', '2023-12-06 07:10:20'),
(322, 'conag', 'edit', 'Board of Director <b>PROF. JOHN MATTHEW JACKSON</b> has been updated at <b>Board of Director.</b>', '2023-12-06 07:18:33'),
(323, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-12-06 08:12:25'),
(324, 'rowee', 'login', 'Admin: <b>ROWEE</b> Just logged on to the System', '2023-12-06 08:12:45'),
(325, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-12-06 08:14:07'),
(326, 'rowee', 'login', 'Admin: <b>ROWEE</b> Just logged on to the System', '2023-12-06 08:16:40'),
(327, 'rowee', 'edit', 'Alumni Id Inquiries: <b>ROWEE JOHN CAPINPIN</b> has been edited', '2023-12-06 08:19:57'),
(328, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-12-06 09:10:33'),
(329, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-12-06 09:46:47'),
(330, 'rowee', 'login', 'Admin: <b>ROWEE</b> Just logged on to the System', '2023-12-06 09:55:24'),
(331, 'rowee', 'add', 'Projects: <b>PROJECT TESTING #!</b> have been added at <b>Projects.</b>', '2023-12-06 09:56:51'),
(332, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-12-06 17:52:57'),
(333, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-06 17:53:33'),
(334, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-06 18:49:59'),
(335, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-06 18:57:05'),
(336, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-06 18:59:38'),
(337, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-06 19:03:01'),
(338, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-06 19:04:44'),
(339, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-06 19:05:08'),
(340, 'patpat', 'edit', 'Inquiries <b> I-19</b> has been replied in<b>Inquiries.</b>', '2023-12-06 19:06:21'),
(341, 'patpat', 'edit', 'Inquiries <b> I-19</b> has been replied in<b>Inquiries.</b>', '2023-12-06 19:09:44'),
(342, 'patpat', 'edit', 'Inquiries <b> I-19</b> has been replied in<b>Inquiries.</b>', '2023-12-06 19:10:28'),
(343, 'patpat', 'edit', 'Inquiries <b> I-19</b> has been replied in<b>Inquiries.</b>', '2023-12-06 19:11:01'),
(344, 'patpat', 'edit', 'Inquiries <b> I-19</b> has been replied in<b>Inquiries.</b>', '2023-12-06 19:12:01'),
(345, 'patpat', 'edit', 'Inquiries <b> I-19</b> has been replied in<b>Inquiries.</b>', '2023-12-06 19:13:19'),
(346, 'patpat', 'edit', 'Inquiries <b> I-19</b> has been replied in<b>Inquiries.</b>', '2023-12-06 19:14:28'),
(347, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-06 19:15:08'),
(348, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-06 19:15:43'),
(349, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-06 19:20:28'),
(350, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-06 19:23:13'),
(351, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-06 19:24:02'),
(352, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-06 19:25:09'),
(353, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-06 19:27:48'),
(354, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-06 19:28:55'),
(355, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-06 19:32:06'),
(356, 'patpat', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-06 19:33:58'),
(357, 'patpat', 'edit', 'Alumni Id Inquiries: <b>JOHN LOYD CONAG</b> has been edited', '2023-12-06 23:28:30'),
(358, 'patpat', 'edit', 'Alumni Id Inquiries: <b>PATRICIA PASCUAL</b> has been edited', '2023-12-07 03:59:08'),
(359, 'patpat', 'edit', 'Alumni Id Inquiries: <b>JOHN LOYD CONAG</b> has been edited', '2023-12-07 04:19:35'),
(360, 'patpat', 'edit', 'Alumni Id Inquiries: <b>JOHN LOYD CONAG</b> has been edited', '2023-12-07 04:39:13'),
(361, 'patpat', 'edit', 'Alumni Id Inquiries: <b>PATRICIA PASCUAL</b> has been edited', '2023-12-07 04:55:20'),
(362, 'patpat', 'edit', 'Alumni Id Inquiries: <b>PATRICIA PASCUAL</b> has been edited', '2023-12-07 04:55:41'),
(363, 'patpat', 'edit', 'Alumni Id Inquiries: <b>PATRICIA PASCUAL</b> has been edited', '2023-12-07 04:55:52'),
(364, 'patpat', 'edit', 'Alumni Id Inquiries: <b>PATRICIA PASCUAL</b> has been edited', '2023-12-07 04:58:58'),
(365, 'margie', 'login', 'Admin: <b>MARGIE</b> Just logged on to the System', '2023-12-07 05:10:31'),
(366, 'margie', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-07 05:41:55'),
(367, 'margie', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-07 05:51:21'),
(368, 'margie', 'edit', 'Inquiries <b> I-26</b> has been replied in<b>Inquiries.</b>', '2023-12-07 05:56:58'),
(369, 'margie', 'edit', 'Inquiries <b> I-13</b> has been replied in<b>Inquiries.</b>', '2023-12-07 05:57:26'),
(370, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-12-08 17:27:06'),
(371, 'patpat', 'add', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY</b> has been added to <b>System Settings.</b>', '2023-12-10 06:03:23'),
(372, 'patpat', 'add', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY</b> has been added to <b>System Settings.</b>', '2023-12-10 06:32:50'),
(373, 'patpat', 'add', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY</b> has been added to <b>System Settings.</b>', '2023-12-10 07:23:22'),
(374, 'patpat', 'update', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY</b> has been updated.', '2023-12-10 07:26:40'),
(375, 'patpat', 'update', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY</b> has been updated.', '2023-12-10 07:27:35'),
(376, 'patpat', 'update', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY</b> has been updated.', '2023-12-10 07:30:03'),
(377, 'patpat', 'update', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY</b> has been updated.', '2023-12-10 07:30:55'),
(378, 'patpat', 'edit', 'Settings: <b></b> has been updated.', '2023-12-10 08:18:05'),
(379, 'patpat', 'edit', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated.', '2023-12-10 08:30:27'),
(380, 'patpat', 'edit', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated.', '2023-12-10 08:31:05'),
(381, 'patpat', 'edit', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated.', '2023-12-10 08:31:25'),
(382, 'patpat', 'edit', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated.', '2023-12-10 08:31:43'),
(383, 'patpat', 'edit', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated.', '2023-12-10 08:34:29'),
(384, 'patpat', 'edit', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated.', '2023-12-10 08:36:34'),
(385, 'patpat', 'edit', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated.', '2023-12-10 08:45:43'),
(386, 'patpat', 'edit', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated.', '2023-12-10 08:47:49'),
(387, 'patpat', 'edit', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated.', '2023-12-10 08:54:33'),
(388, 'patpat', 'edit', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated.', '2023-12-10 08:55:39'),
(389, 'patpat', 'edit', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated.', '2023-12-10 08:59:04'),
(390, 'patpat', 'edit', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated.', '2023-12-10 09:03:56'),
(391, 'rowee', 'login', 'Admin: <b>ROWEE</b> Just logged on to the System', '2023-12-10 09:07:52'),
(392, 'rowee', 'edit', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated.', '2023-12-10 09:16:23'),
(393, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-12-10 09:16:55'),
(394, 'rowee', 'login', 'Admin: <b>ROWEE</b> Just logged on to the System', '2023-12-10 09:20:50'),
(395, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-12-10 09:25:09'),
(396, 'patpat', 'edit', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated.', '2023-12-10 09:32:37'),
(397, 'patpat', 'edit', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated.', '2023-12-10 09:34:23'),
(398, 'patpat', 'edit', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated.', '2023-12-10 09:52:43'),
(399, 'patpat', 'edit', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated.', '2023-12-10 09:53:17'),
(400, 'patpat', 'edit', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated.', '2023-12-10 09:53:40'),
(401, 'patpat', 'edit', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated.', '2023-12-10 09:55:11'),
(402, 'patpat', 'edit', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated.', '2023-12-10 09:56:18'),
(403, 'patpat', 'edit', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated.', '2023-12-10 09:56:57'),
(404, 'patpat', 'edit', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated.', '2023-12-10 10:00:23'),
(405, 'patpat', 'edit', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated.', '2023-12-10 10:01:01'),
(406, 'rowee', 'login', 'Admin: <b>ROWEE</b> Just logged on to the System', '2023-12-10 11:20:03'),
(407, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-12-10 17:51:56'),
(408, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-12-10 17:52:48'),
(409, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-12-10 17:54:18'),
(410, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-12-10 17:55:33'),
(411, 'rowee', 'login', 'Admin: <b>ROWEE</b> Just logged on to the System', '2023-12-10 17:55:56'),
(412, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-12-11 20:45:32'),
(413, 'rowee', 'login', 'Admin: <b>ROWEE</b> Just logged on to the System', '2023-12-11 20:45:57'),
(414, 'rowee', 'add', 'Projects: <b>PROJECT TESTING #!</b> have been added at <b>Projects.</b>', '2023-12-11 20:48:36'),
(415, 'rowee', 'edit', 'Alumni Id Inquiries: <b>ADADA</b> has been edited', '2023-12-12 04:23:43'),
(416, 'rowee', 'edit', 'Alumni Id Inquiries: <b>ADADA</b> has been edited', '2023-12-12 04:24:08'),
(417, 'rowee', 'edit', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated.', '2023-12-12 04:38:40'),
(418, 'conag', 'login', 'Admin: <b>CONAG</b> Just logged on to the System', '2023-12-12 04:39:21'),
(419, 'rowee', 'login', 'Admin: <b>ROWEE</b> Just logged on to the System', '2023-12-12 04:39:34'),
(420, 'rowee', 'edit', ' System Settings <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated at <b>System Settings.</b>', '2023-12-12 05:27:27'),
(421, 'rowee', 'login', 'Admin: <b>ROWEE</b> Just logged on to the System', '2023-12-12 05:27:48'),
(422, 'rowee', 'edit', ' System Settings <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated at <b>System Settings.</b>', '2023-12-12 05:28:49'),
(423, 'rowee', 'edit', ' System Settings <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated at <b>System Settings.</b>', '2023-12-12 05:29:21'),
(424, 'rowee', 'edit', ' System Settings <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated at <b>System Settings.</b>', '2023-12-12 05:29:29'),
(425, 'rowee', 'edit', ' System Settings <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated at <b>System Settings.</b>', '2023-12-12 05:29:30'),
(426, 'rowee', 'edit', ' System Settings <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated at <b>System Settings.</b>', '2023-12-12 05:29:31'),
(427, 'rowee', 'edit', ' System Settings <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated at <b>System Settings.</b>', '2023-12-12 05:29:31'),
(428, 'rowee', 'edit', ' System Settings <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated at <b>System Settings.</b>', '2023-12-12 05:29:31'),
(429, 'rowee', 'edit', ' System Settings <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated at <b>System Settings.</b>', '2023-12-12 05:29:32');
INSERT INTO `change_logs` (`id`, `admin`, `operation`, `description`, `timestamp`) VALUES
(430, 'rowee', 'edit', ' System Settings <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated at <b>System Settings.</b>', '2023-12-12 05:29:32'),
(431, 'rowee', 'edit', ' System Settings <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated at <b>System Settings.</b>', '2023-12-12 05:29:53'),
(432, 'rowee', 'edit', ' System Settings <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated at <b>System Settings.</b>', '2023-12-12 05:34:22'),
(433, 'rowee', 'edit', ' System Settings <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated at <b>System Settings.</b>', '2023-12-12 05:35:09'),
(434, 'rowee', 'edit', ' System Settings <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated at <b>System Settings.</b>', '2023-12-12 05:35:25'),
(435, 'rowee', 'edit', ' System Settings <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated at <b>System Settings.</b>', '2023-12-12 05:46:06'),
(436, 'rowee', 'login', 'Admin: <b>ROWEE</b> Just logged on to the System', '2023-12-12 05:46:45'),
(437, 'rowee', 'edit', ' System Settings <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated at <b>System Settings.</b>', '2023-12-12 05:47:48'),
(438, 'rowee', 'edit', ' System Settings <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated at <b>System Settings.</b>', '2023-12-12 05:50:46'),
(439, 'rowee', 'edit', ' System Settings <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated at <b>System Settings.</b>', '2023-12-12 05:54:19'),
(440, 'rowee', 'edit', ' System Settings <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated at <b>System Settings.</b>', '2023-12-12 05:59:37'),
(441, 'rowee', 'update', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated.', '2023-12-12 06:02:45'),
(442, 'conag', 'login', 'Admin: <b>CONAG</b> Just logged on to the System', '2023-12-12 06:04:58'),
(443, 'conag', 'edit', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated.', '2023-12-12 06:06:45'),
(444, 'rowee', 'login', 'Admin: <b>ROWEE</b> Just logged on to the System', '2023-12-12 06:08:16'),
(445, 'rowee', 'edit', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated.', '2023-12-12 06:10:57'),
(446, 'conag', 'login', 'Admin: <b>CONAG</b> Just logged on to the System', '2023-12-12 06:30:28'),
(447, 'conag', 'edit', 'Inquiries <b> I-5</b> has been replied in<b>Inquiries.</b>', '2023-12-12 06:31:00'),
(448, 'conag', 'login', 'Admin: <b>CONAG</b> Just logged on to the System', '2023-12-12 08:15:11'),
(449, 'conag', 'login', 'Admin: <b>CONAG</b> Just logged on to the System', '2023-12-12 08:15:44'),
(450, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-12-12 11:40:23'),
(451, 'patpat', 'edit', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated.', '2023-12-12 11:40:44'),
(452, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-12-12 14:40:34'),
(453, 'conag', 'login', 'Admin: <b>CONAG</b> Just logged on to the System', '2023-12-12 15:42:55'),
(454, 'conag', 'edit', 'Lost Alumni ID inquiries: <b>AJDKAJDA</b> has been edited', '2023-12-12 15:43:52'),
(455, 'conag', 'edit', 'Lost Alumni ID inquiries: <b>AJDKAJDA</b> has been edited', '2023-12-12 15:45:46'),
(456, 'conag', 'edit', 'Alumni Id Inquiries: <b>JOHN LOYD CONAG</b> has been edited', '2023-12-12 16:32:16'),
(457, 'admin', 'login', 'Admin: <b>ADMIN</b> Just logged on to the System', '2023-12-13 10:42:54'),
(458, 'rowee', 'login', 'Admin: <b>ROWEE</b> Just logged on to the System', '2023-12-13 11:36:33'),
(459, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-12-13 11:40:42'),
(460, 'admin', 'login', 'Admin: <b>ADMIN</b> Just logged on to the System', '2023-12-13 13:25:35'),
(461, 'admin', 'login', 'Admin: <b>ADMIN</b> Just logged on to the System', '2023-12-13 13:25:56'),
(462, 'admin', 'login', 'Admin: <b>ADMIN</b> Just logged on to the System', '2023-12-13 13:28:17'),
(463, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-12-13 13:48:01'),
(464, 'patpat', 'add', 'Admin: <b>SUPERADMIN</b> has been added to <b>System Administrators.</b>', '2023-12-13 13:48:59'),
(465, 'superadmin', 'login', 'Admin: <b>SUPERADMIN</b> Just logged on to the System', '2023-12-13 13:49:11'),
(466, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-12-13 13:49:59'),
(467, 'admin', 'login', 'Admin: <b>ADMIN</b> Just logged on to the System', '2023-12-13 13:50:10'),
(468, 'rowee', 'login', 'Admin: <b>ROWEE</b> Just logged on to the System', '2023-12-13 14:05:56'),
(469, 'rowee', 'login', 'Admin: <b>ROWEE</b> Just logged on to the System', '2023-12-13 14:08:13'),
(470, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-12-13 14:19:45'),
(471, 'conag', 'login', 'Admin: <b>CONAG</b> Just logged on to the System', '2023-12-13 14:26:55'),
(472, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-12-13 14:44:27'),
(473, 'superadmin', 'login', 'Admin: <b>SUPERADMIN</b> Just logged on to the System', '2023-12-13 15:11:37'),
(474, 'rowee', 'login', 'Admin: <b>ROWEE</b> Just logged on to the System', '2023-12-13 15:18:43'),
(475, 'rowee', 'login', 'Admin: <b>ROWEE</b> Just logged on to the System', '2023-12-13 15:25:37'),
(476, 'rowee', 'login', 'Admin: <b>ROWEE</b> Just logged on to the System', '2023-12-13 17:55:11'),
(477, 'conag', 'login', 'Admin: <b>CONAG</b> Just logged on to the System', '2023-12-13 18:19:12'),
(478, 'conag', 'edit', 'Announcement: <b>TEST TITLE ANNOUNCEMENT #2</b> has been updated at <b>Announcements.</b>', '2023-12-13 18:31:10'),
(479, 'conag', 'edit', 'Announcement: <b>2023 UCC ALUMNI REUNION</b> has been updated at <b>Announcements.</b>', '2023-12-13 18:32:10'),
(480, 'conag', 'edit', 'Announcement: <b>FRESHMEN ADVISORY</b> has been updated at <b>Announcements.</b>', '2023-12-13 18:35:09'),
(481, 'conag', 'edit', 'Announcement: <b>FRESHMEN ADVISORY</b> has been updated at <b>Announcements.</b>', '2023-12-13 18:39:39'),
(482, 'conag', 'edit', 'Announcement: <b>2023 UCC ALUMNI REUNION</b> has been updated at <b>Announcements.</b>', '2023-12-13 18:40:02'),
(483, 'conag', 'edit', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated.', '2023-12-13 18:40:54'),
(484, 'conag', 'edit', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated.', '2023-12-13 18:41:09'),
(485, 'conag', 'edit', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated.', '2023-12-13 18:41:23'),
(486, 'conag', 'edit', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated.', '2023-12-13 18:41:34'),
(487, 'conag', 'delete', 'Announcement: <b>AN22</b> have been deleted at <b>Announcements.</b>', '2023-12-13 18:42:32'),
(488, 'conag', 'edit', 'Announcement: <b>2023 UCC ALUMNI REUNION</b> has been updated at <b>Announcements.</b>', '2023-12-13 18:43:20'),
(489, 'conag', 'edit', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated.', '2023-12-13 18:45:20'),
(490, 'conag', 'delete', 'Projects: <b>PR8</b> have been deleted at <b>Projects.</b>', '2023-12-13 18:50:47'),
(491, 'conag', 'delete', 'Projects: <b>PR10</b> have been deleted at <b>Projects.</b>', '2023-12-13 18:50:50'),
(492, 'conag', 'delete', 'Projects: <b>PR11</b> have been deleted at <b>Projects.</b>', '2023-12-13 18:50:54'),
(493, 'conag', 'delete', 'Projects: <b>PR12</b> have been deleted at <b>Projects.</b>', '2023-12-13 18:50:57'),
(494, 'conag', 'add', 'Projects: <b>UCC’S FIRST ALUMNI GRAND HOMECOMING</b> have been added at <b>Projects.</b>', '2023-12-13 19:00:12'),
(495, 'conag', 'edit', ' Projects <b>UCC’S FIRST ALUMNI GRAND HOMECOMING</b> has been updated at <b> Projects.</b>', '2023-12-13 19:01:38'),
(496, 'conag', 'edit', ' Projects <b>UCC’S FIRST ALUMNI GRAND HOMECOMING</b> has been updated at <b> Projects.</b>', '2023-12-13 19:02:02'),
(497, 'conag', 'edit', ' Projects <b>UCC’S FIRST ALUMNI GRAND HOMECOMING</b> has been updated at <b> Projects.</b>', '2023-12-13 19:02:34'),
(498, 'conag', 'edit', ' Projects <b>UCC’S FIRST ALUMNI GRAND HOMECOMING</b> has been updated at <b> Projects.</b>', '2023-12-13 19:03:26'),
(499, 'conag', 'edit', ' Projects <b>UCC’S FIRST ALUMNI GRAND HOMECOMING</b> has been updated at <b> Projects.</b>', '2023-12-13 19:05:09'),
(500, 'conag', 'edit', ' Projects <b>UCC’S FIRST ALUMNI GRAND HOMECOMING</b> has been updated at <b> Projects.</b>', '2023-12-13 19:05:21'),
(501, 'conag', 'add', 'Projects: <b>UCC NORTH LEADERS’ SUMMIT 2020</b> have been added at <b>Projects.</b>', '2023-12-13 19:08:13'),
(502, 'conag', 'edit', ' Projects <b>UCC NORTH LEADERS’ SUMMIT 2020</b> has been updated at <b> Projects.</b>', '2023-12-13 19:08:27'),
(503, 'conag', 'add', 'Projects: <b>CALOOCAN CITY FRONTLINERS: &QUOT;GIVE LOVE TO THOSE WHO KEEP US SAFE&QUOT;</b> have been added at <b>Projects.</b>', '2023-12-13 19:09:50'),
(504, 'conag', 'edit', ' Projects <b>CALOOCAN CITY FRONTLINERS: &AMP;QUOT;GIVE LOVE TO THOSE WHO KEEP US SAFE&AMP;QUOT;</b> has been updated at <b> Projects.</b>', '2023-12-13 19:11:13'),
(505, 'conag', 'add', 'Admin: <b>PAOLO</b> has been added to <b>System Administrators.</b>', '2023-12-13 19:14:06'),
(506, 'conag', 'edit', ' Projects <b>CALOOCAN CITY FRONTLINERS: &QUOT;GIVE LOVE TO THOSE WHO KEEP US SAFE.&QUOT;</b> has been updated at <b> Projects.</b>', '2023-12-13 19:33:08'),
(507, 'conag', 'edit', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated.', '2023-12-13 19:36:23'),
(508, 'conag', 'edit', 'Inquiries <b> I-31</b> has been replied in<b>Inquiries.</b>', '2023-12-13 19:37:49'),
(509, 'paolo', 'login', 'Admin: <b>PAOLO</b> Just logged on to the System', '2023-12-13 19:38:34'),
(510, 'admin', 'login', 'Admin: <b>ADMIN</b> Just logged on to the System', '2023-12-13 22:01:53'),
(511, 'admin', 'add', 'Alumni Member: <b>2023102</b> have been registered at  <b>Alumni Members.</b>', '2023-12-13 22:41:13'),
(512, 'superadmin', 'login', 'Admin: <b>SUPERADMIN</b> Just logged on to the System', '2023-12-13 22:41:35'),
(513, 'superadmin', 'add', 'Admin: <b>CYRUS</b> has been added to <b>System Administrators.</b>', '2023-12-13 23:07:37'),
(514, 'superadmin', 'edit', 'Lost Alumni ID inquiries: <b>ADADA</b> has been edited', '2023-12-13 23:23:55'),
(515, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-12-14 02:20:47'),
(516, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-12-14 02:26:16'),
(517, 'patpat', 'edit', 'Announcement: <b>2023 UCC ALUMNI REUNION</b> has been updated at <b>Announcements.</b>', '2023-12-14 02:33:23'),
(518, 'patpat', 'edit', 'Board of Director <b>PROF. CATHERINE PAA LLENA</b> has been updated at <b>Board of Director.</b>', '2023-12-14 02:34:05'),
(519, 'patpat', 'edit', 'Board of Director <b>PROF. CATHERINE PAA LLENA</b> has been updated at <b>Board of Director.</b>', '2023-12-14 02:34:39'),
(520, 'patpat', 'add', 'Alumni Member: <b>20232401</b> have been registered at  <b>Alumni Members.</b>', '2023-12-14 02:36:08'),
(521, 'patpat', 'add', 'Alumni Member: <b>20232501</b> have been registered at  <b>Alumni Members.</b>', '2023-12-14 02:44:01'),
(522, 'patpat', 'add', 'Alumni Member: <b>2023202</b> have been registered at  <b>Alumni Members.</b>', '2023-12-14 02:45:29'),
(523, 'patpat', 'add', 'Alumni Member: <b>2023302</b> have been registered at  <b>Alumni Members.</b>', '2023-12-14 03:04:00'),
(524, 'patpat', 'add', 'Alumni Member: <b>2023402</b> have been registered at  <b>Alumni Members.</b>', '2023-12-14 03:05:20'),
(525, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-12-15 19:24:05'),
(526, '', '', '', '2023-12-20 16:44:15'),
(527, 'patpat', 'login', 'Admin: <b>PATPAT</b> Just logged on to the System', '2023-12-20 16:45:52'),
(528, 'patpat', 'edit', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated.', '2023-12-20 16:53:06'),
(529, 'patpat', 'edit', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated.', '2023-12-20 16:56:32'),
(530, 'conag', 'login', 'Admin: <b>CONAG</b> Just logged on to the System', '2023-12-21 12:51:05'),
(531, 'conag', 'edit', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated.', '2023-12-21 12:51:48'),
(532, 'conag', 'edit', 'Settings: <b>UNIVERSITY OF CALOOCAN CITY ALUMNI ASSOCIATION</b> has been updated.', '2023-12-21 12:51:59');

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
(17, '2023 UCC Alumni Reunion', 'ucccccc.jpg', 'Embark on a nostalgic journey at the University of Caloocan City Alumni Reunion 2023, featuring a heartwarming Welcome Back Mixer, showcasing diverse alumni achievements, and offering guided Campus Tours for a trip down memory lane. The event also includes the classic tradition of Class Photos and Yearbook Signing, creating a memorable evening of camaraderie and shared stories as we celebrate the enduring spirit of the UCC community. Join us for a joyous reunion!', '2023-12-14 02:31:57');

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
(12, 'Prof. Catherine Paa Llena', 'mnone.png', 'Treasurer', '2023-12-14 10:34:22'),
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
(5, 'Margie Del Cstillo', 'patriciapascual031@gmail.com', 'can i have a custom event with my self place ?', 'namo', 1),
(9, 'Paula Jean ', 'paulajeanpascual@gmail.com', 'good day, are you offering a personalize event like the place of the event is will be from us ?', 'Yes, Ma\'am Paula but we need to talk about it. If you want to, we can call you via messenger or via viber so we can talk about it more.', 1),
(12, 'Joan Hazel Agpuldo', 'jhagpuldo.cbpa@gmail.com', 'hi ', 'hiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii', 1),
(13, 'Arabella Belardo', 'belardoarabella05@gmail.com', 'hi po', 'hello pohello pohello pohello pohello pohello pohello pohello pohello pohello pohello po', 1),
(14, 'Paolo Rafael Tampico', 'paolorafaeltampico@gmail.com', 'Can you manage to organize an event for my 21st Birthday? ', 'Yes Sir Paolo! We are more than happy to organazie an event for you 21st Birthday!S', 1),
(15, 'Cathy', 'Ispongklong.031@gmail.com', 'kajfahdjkad', 'ahjkdhjahdad', 1),
(16, 'Cathy Llena ', 'cathy.llena@ucc-caloocan.edu.ph', 'can i request a special theme', 'yes we can offer that', 1),
(17, 'topeq', 'ispongklong.031@gmail.com', 'panget si tope?', 'oo panget sya ', 1),
(18, 'jhezryll roxas', 'jhezryll69@gmail.com', 'pogi mo jhez', 'oo nga pogi mo talaga', 1),
(19, 'jhezryll roxas', 'ispongklong.031@gmail.com', 'HAJHDSADHAHDSJADJAHDAJHD', 'HAJHDSADHAHDSJADJAHDAJHDHAJHDSADHAHDSJADJAHDAJHDHAJHDSADHAHDSJADJAHDAJHDHAJHDSADHAHDSJADJAHDAJHDHAJHDSADHAHDSJADJAHDAJHDHAJHDSADHAHDSJADJAHDAJHDHAJHDSADHAHDSJADJAHDAJHD', 1),
(20, 'percy ', 'ispongklong.031@gmail.com', 'ahdsahdad\r\n', 'bakiittt', 1),
(21, 'sadaadad', 'ispongklong.031@gmail.com', 'asdadsadsadsd', '', 0),
(22, 'jhezryll roxas', 'ispongklong.031@gmail.com', 'sadadsada', '', 0),
(23, 'jhezryll roxas', 'ispongklong.031@gmail.com', 'asdad', '', 0),
(24, 'jhezryll roxas', 'ispongklong.031@gmail.com', 'asdad', '', 0),
(25, 'jhezryll roxas', 'ispongklong.031@gmail.com', 'jtr', '', 0),
(26, 'Cyrus  Cruza Cantero', 'ccantero27@yahoo.com', 'asdsad', 'asdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsadasdsad', 1),
(27, 'John Loyd', 'asd@asdas', 'd', '', 0),
(28, 'test', 'asda@asdas', 'testtest', '', 0),
(29, 'asd', 'asd@test', 'asd', '', 0),
(30, 'johnloydconag', 'patriciapascual031@gmail.com', 'awwwww', '', 0),
(31, 'Paolo Rafael Salazar Tampico', 'paolorafaeltampico@gmail.com', 'Hello', 'Hi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lost`
--

CREATE TABLE `lost` (
  `lost_id` int(11) NOT NULL,
  `member_id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `campus` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `bday` varchar(100) NOT NULL,
  `reason` varchar(1000) NOT NULL,
  `status` varchar(2) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lost`
--

INSERT INTO `lost` (`lost_id`, `member_id`, `name`, `campus`, `email`, `bday`, `reason`, `status`, `img`) VALUES
(1, 20232201, 'adada', 'Main', 'patriciapascual031@gmail.com', '2312-12-31', 'wdad', '2', '406729828_2309370609453554_3793695396401982078_n.jpg'),
(2, 20232301, 'ajdkajda', 'North', 'ispongklong.031@gmail.com', '2001-12-31', 'dadsa', '2', '400714235_715023210245942_8449131719716423864_n.jpg'),
(3, 20232201, 'jhezryll roxas', 'Main', 'patriciapascual031@gmail.com', '2001-12-31', 'gfgfhhdhd', '2', '125205598_363269561446827_9086718857881668738_n.jpg'),
(4, 0, '', 'Main', '', '', '', '2', 'id_card_2023102.jpg'),
(5, 0, '', 'Main', '', '', '', '2', 'id_card_2023102.jpg'),
(6, 0, '', 'Main', '', '', '', '1', 'id_card_2023102 (1).jpg'),
(7, 0, '', 'Main', '', '', '', '1', '407940590_2571318373035956_2441755577858992683_n.jpg');

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
  `time_registered` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(2) NOT NULL,
  `cid` int(2) NOT NULL,
  `idfront` varchar(100) NOT NULL,
  `idback` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `year`, `member_count`, `campus_id`, `name`, `address`, `birth_date`, `civil_status`, `course`, `year_graduated`, `email_address`, `cellphone_no`, `picture`, `signature`, `time_registered`, `status`, `cid`, `idfront`, `idback`) VALUES
(2023102, 2023, 1, '02', 'Cyrus Cruza Cantero', '888 Libis Baesa Caloocan City', '2002-07-27', 'Single', 'BS Information System', 2024, 'ccantero27@yahoo.com', '9517563059', '8.png', 'signature.png', '2023-12-13 22:41:12', 0, 2, 'id_card_2023102.jpg', 'id_back_2023102.jpg'),
(2023202, 2023, 2, '02', 'John Loyd Conag', '#90 Doroteo Jose Caloocan city', '2000-12-15', 'Married', 'BS Computer Science', 2024, 'pat@gmail.com', '09235281232', '371749405_991551525422217_3762699887477749564_n.jpg', '386871167_2351982908525022_5642113776923797612_n-removebg-preview.png', '2023-12-14 02:45:29', 0, 2, '', ''),
(2023302, 2023, 3, '02', 'John Carlo Salvador', '208 Laktuan Street Caloocan City', '1998-12-20', 'Single', 'BS Information System', 2000, 'ispongklong.031@gmail.com', '09213457871', '2.png', '386871167_2351982908525022_5642113776923797612_n-removebg-preview.png', '2023-12-14 03:04:00', 0, 2, '', ''),
(2023402, 2023, 4, '02', 'Jhaymie Ortillano', '#90 Kailangan Street Bentes Caloocan city', '1998-01-05', 'Single', 'BS Information Technology', 2009, 'ortillano@gmail.com', '09123456232', '4.png', '386871167_2351982908525022_5642113776923797612_n-removebg-preview.png', '2023-12-14 03:05:20', 0, 2, '', ''),
(20232201, 2023, 22, '01', 'Arabella Belardo', '22 phalili street', '2001-12-31', 'Single', 'BSCS', 2022, 'ispongklong.031@gmail.com', '12345678910', '406324842_1561503707987024_7094248268964852629_n.jpg', '386871167_2351982908525022_5642113776923797612_n-removebg-preview.png', '2023-12-05 13:50:00', 0, 2, 'id_card_20232201.jpg', 'id_back_20232201.jpg'),
(20232301, 2023, 23, '01', 'Patricia Pascual', '22 phalili street', '2001-12-31', 'Single', 'BSIS', 2024, 'patriciapascual031@gmail.com', '91969946971', '361663471_562646889204640_8918046942959478034_n.jpg', '386871167_2351982908525022_5642113776923797612_n-removebg-preview.png', '2023-12-06 09:46:35', 0, 2, 'id_card_20232301.jpg', 'id_back_20232301.jpg'),
(20232401, 2023, 24, '01', 'Margie Del Castillo', '#02 Kaunlaran Street', '1991-09-17', 'Single', 'BS Computer Science', 2006, 'margiedelcastillo@gmail.com', '09105771232', 'CASTILLO.png', 'Untitled-1.png', '2023-12-14 02:36:07', 0, 2, '', ''),
(20232501, 2023, 25, '01', 'Paolo Ragael Tampico', '22 phalili street', '1998-09-29', 'Single', 'BS Entertainment and Multimedia Computing', 2001, 'ispongklong.031@gmail.com', '09245323421', '350103191_633833165330578_7784305614369978648_n.jpg', 'Untitled-1.png', '2023-12-14 02:44:01', 0, 2, '', '');

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
(13, '1907705_1421757944734617_863302852_o.jpg', 'UCC’s First Alumni Grand Homecoming', 'Since July 1, 1971, UCC’s foremost alumni reunion took place yet the historical event seemed belittled by alumni - interpreted by 136 registrants on attendance sheet, the night of Feb. 8, 2014 at Oukami Events Place, Grace Park, Caloocan City.', '2023-12-14 03:05:16'),
(14, '83774833_2609361109307622_5080533951357911040_n.jpg', 'UCC NORTH LEADERS’ SUMMIT 2020', 'Honorable Councilor Enteng Malapitan graces North Campuses’ leaders on this year’s Council of Presidents’ Meeting upholding the theme, SYNERGY: LEADERS’ SUMMIT at Camarin Campus Covered Court, 30th of January.', '2023-12-14 03:08:19'),
(15, '96360581_2699431020300630_5948038519615127552_n.jpg', 'Caloocan City Frontliners: &quot;Give Love to those who keep us safe.&quot;', 'Psychology Society of University of Caloocan City South Campus held a campaign donations for Caloocan City frontliners with the theme: &amp;quot;Give Love to those who keep us safe.&amp;quot; at Caloocan City Hall, May 7, 2020.', '2023-12-14 03:32:54');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(2) NOT NULL,
  `sName` varchar(100) NOT NULL,
  `sDescription` varchar(1000) NOT NULL,
  `sAlias` varchar(100) NOT NULL,
  `sLogo` varchar(100) NOT NULL,
  `sLinks` varchar(1000) NOT NULL,
  `sAddress` varchar(100) NOT NULL,
  `sEmail` varchar(100) NOT NULL,
  `sContact` varchar(100) NOT NULL,
  `sMain` varchar(10000) NOT NULL,
  `sNorth` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `sName`, `sDescription`, `sAlias`, `sLogo`, `sLinks`, `sAddress`, `sEmail`, `sContact`, `sMain`, `sNorth`) VALUES
(2, 'University of Caloocan City Alumni Association', 'University of Caloocan City Alumni Management System', 'UCC', 'Untitled design.png', 'https://ucc-caloocan.edu.ph/index', 'Biglang Awa Street Cor 11th Ave Catleya, Caloocan 1400 Metro Manila, Philippines', 'admin@ucc-caloocan.edu.ph', '9231065814', 'An alumni organization for a state university is a group or association formed by former students (alumni) of that particular state university. These organizations are typically established to serve various purposes and provide benefits to alumni, the university, and the broader community. Alumni organizations are essential for maintaining the spirit and legacy of a state university. They help alumni stay engaged with their alma mater, provide valuable resources, and contribute to the overall success and reputation of the university.  An alumni organization for a state university is a group or association formed by former students (alumni) of that particular state university. These organizations are typically established to serve various purposes and provide benefits to alumni, the university, and the broader community. Alumni organizations are essential for maintaining the spirit and legacy of a state university. They help alumni stay engaged with their alma mater, provide valuable resources, and contribute to the overall success and reputation of the university.', 'An alumni organization for a state university is a group or association formed by former students (alumni) of that particular state university. These organizations are typically established to serve various purposes and provide benefits to alumni, the university, and the broader community.');

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
(38, 20232201, '', '', ''),
(41, 20232301, '', '', ''),
(53, 2023102, 'trainingsTitleA', 'trainingsVenA', 'trainingsDurA'),
(54, 20232401, '', '', ''),
(55, 20232501, '', '', ''),
(56, 2023202, '', '', ''),
(57, 2023302, '', '', ''),
(58, 2023402, '', '', '');

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
(39, 20232201, '', '', ''),
(42, 20232301, '', '', ''),
(54, 2023102, 'workComA', 'workPosA', 'workDurA'),
(55, 2023102, 'workComB', 'workPosB', 'workDurB'),
(56, 20232401, '', '', ''),
(57, 20232501, '', '', ''),
(58, 2023202, '', '', ''),
(59, 2023302, '', '', ''),
(60, 2023402, '', '', '');

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
-- Indexes for table `lost`
--
ALTER TABLE `lost`
  ADD PRIMARY KEY (`lost_id`);

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `awards`
--
ALTER TABLE `awards`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `change_logs`
--
ALTER TABLE `change_logs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=533;

--
-- AUTO_INCREMENT for table `client_announcement`
--
ALTER TABLE `client_announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `lost`
--
ALTER TABLE `lost`
  MODIFY `lost_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `work_experience`
--
ALTER TABLE `work_experience`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

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
