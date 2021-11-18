-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 02, 2021 at 12:01 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `raspored`
--
CREATE DATABASE IF NOT EXISTS `raspored` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `raspored`;

-- --------------------------------------------------------

--
-- Table structure for table `admini`
--

DROP TABLE IF EXISTS `admini`;
CREATE TABLE IF NOT EXISTS `admini` (
  `IDadmin` int(11) NOT NULL AUTO_INCREMENT,
  `Ime` varchar(20) DEFAULT NULL,
  `Prezime` varchar(30) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Lozinka` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`IDadmin`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admini`
--

INSERT INTO `admini` (`IDadmin`, `Ime`, `Prezime`, `Email`, `Lozinka`) VALUES
(1, 'Tamara', 'Jovanovic', 'jt170158d@student.etf.bg.ac.rs', '$2y$10$Gkv0PBahxJU1vi1KskDKl.UTjNVHg8VpZaPSkO2vs34g7PDQPQcDC'),
(2, 'Nikola', 'Urosevic', 'un170400d@student.etf.bg.ac.rs', '$2y$10$Bj.SMxjhUcXJRRM2zgXzUONwz8p7O.mTsTv9s4yNe9/.2rd4uK3RO'),
(3, 'Aleksandra', 'Smiljanic', 'aleksandra@etf.bg.ac.rs', '$2y$10$fGwdW2ssmF7W7/.HjifFweeO8iLxMDGXC/RwzC08TrCSozui6zpGq');

-- --------------------------------------------------------

--
-- Table structure for table `kalendar`
--

DROP TABLE IF EXISTS `kalendar`;
CREATE TABLE IF NOT EXISTS `kalendar` (
  `IDDatum` int(11) NOT NULL AUTO_INCREMENT,
  `IDMedicinara` int(11) DEFAULT NULL,
  `Dan` varchar(20) DEFAULT NULL,
  `PrePosle` int(11) DEFAULT NULL,
  `RadnoVreme` varchar(30) DEFAULT NULL,
  `RasporedpoTerminima` varchar(20) DEFAULT NULL,
  `Datum` date DEFAULT NULL,
  PRIMARY KEY (`IDDatum`)
) ENGINE=MyISAM AUTO_INCREMENT=478 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kalendar`
--

INSERT INTO `kalendar` (`IDDatum`, `IDMedicinara`, `Dan`, `PrePosle`, `RadnoVreme`, `RasporedpoTerminima`, `Datum`) VALUES
(242, 0, 'Tue', 1, '07:00-13:00', NULL, '2021-08-31'),
(235, 0, 'Fri', NULL, '06:30-14:30', NULL, '2021-09-10'),
(121, 0, 'Fri', NULL, '07:00-23:00', NULL, '2021-08-20'),
(119, 0, 'Wed', NULL, '07:00-23:00', NULL, '2021-08-18'),
(118, 0, 'Tue', NULL, '07:00-23:00', NULL, '2021-08-17'),
(117, 0, 'Mon', NULL, '07:00-23:00', NULL, '2021-08-16'),
(116, 0, 'Sun', NULL, '07:00-23:00', NULL, '2021-08-15'),
(181, 0, 'Sat', NULL, '08:00-22:00', NULL, '2021-09-25'),
(236, 0, 'Sat', NULL, '06:30-14:30', NULL, '2021-09-11'),
(240, 0, 'Sun', 2, '16:00-13:00', NULL, '2021-08-29'),
(239, 0, 'Fri', 2, '16:00-13:00', NULL, '2021-08-27'),
(180, 0, 'Fri', NULL, '08:00-22:00', NULL, '2021-09-24'),
(173, 0, 'Fri', NULL, '08:00-22:00', NULL, '2021-09-17'),
(174, 0, 'Sat', NULL, '08:00-22:00', NULL, '2021-09-18'),
(176, 0, 'Mon', NULL, '08:00-22:00', NULL, '2021-09-20'),
(177, 0, 'Tue', NULL, '08:00-22:00', NULL, '2021-09-21'),
(178, 0, 'Wed', NULL, '08:00-22:00', NULL, '2021-09-22'),
(179, 0, 'Thu', NULL, '08:00-22:00', NULL, '2021-09-23'),
(172, 0, 'Thu', NULL, '08:00-22:00', NULL, '2021-09-16'),
(171, 0, 'Wed', NULL, '08:00-22:00', NULL, '2021-09-15'),
(233, 0, 'Wed', NULL, '06:30-14:30', NULL, '2021-09-08'),
(132, 0, 'Tue', NULL, '07:00-23:00', NULL, '2021-08-31'),
(234, 0, 'Thu', NULL, '06:30-14:30', NULL, '2021-09-09'),
(170, 0, 'Tue', NULL, '08:00-22:00', NULL, '2021-09-14'),
(169, 0, 'Mon', NULL, '08:00-22:00', NULL, '2021-09-13'),
(230, 0, 'Sun', NULL, '06:30-14:30', NULL, '2021-09-05'),
(229, 0, 'Sat', NULL, '06:30-14:30', NULL, '2021-09-04'),
(131, 0, 'Mon', NULL, '07:00-23:00', NULL, '2021-08-30'),
(128, 0, 'Fri', NULL, '07:00-23:00', NULL, '2021-08-27'),
(130, 0, 'Sun', NULL, '07:00-23:00', NULL, '2021-08-29'),
(232, 0, 'Tue', NULL, '06:30-14:30', NULL, '2021-09-07'),
(231, 0, 'Mon', NULL, '06:30-14:30', NULL, '2021-09-06'),
(186, 0, 'Thu', NULL, '08:00-22:00', NULL, '2021-09-30'),
(244, 0, 'Thu', 1, '06:30-13:00', NULL, '2021-09-02'),
(226, 0, 'Wed', NULL, '06:30-14:30', NULL, '2021-09-01'),
(127, 0, 'Thu', NULL, '07:00-23:00', NULL, '2021-08-26'),
(126, 0, 'Wed', NULL, '07:00-23:00', NULL, '2021-08-25'),
(245, 0, 'Fri', 1, '06:30-13:00', NULL, '2021-09-03'),
(228, 0, 'Fri', NULL, '06:30-14:30', NULL, '2021-09-03'),
(185, 0, 'Wed', NULL, '08:00-22:00', NULL, '2021-09-29'),
(184, 0, 'Tue', NULL, '08:00-22:00', NULL, '2021-09-28'),
(241, 0, 'Mon', 1, '07:00-13:00', NULL, '2021-08-30'),
(124, 0, 'Mon', NULL, '07:00-23:00', NULL, '2021-08-23'),
(243, 0, 'Wed', 1, '06:30-13:00', NULL, '2021-09-01'),
(227, 0, 'Thu', NULL, '06:30-14:30', NULL, '2021-09-02'),
(183, 0, 'Mon', NULL, '08:00-22:00', NULL, '2021-09-27'),
(238, 0, 'Thu', 2, '16:00-13:00', NULL, '2021-08-26'),
(237, 0, 'Wed', 2, '16:08-13:00', NULL, '2021-08-25'),
(123, 0, 'Sun', NULL, '07:00-23:00', NULL, '2021-08-22'),
(246, 0, 'Sat', 1, '06:30-13:00', NULL, '2021-09-04'),
(247, 0, 'Thu', 1, '06:30-13:00', NULL, '2021-09-02'),
(248, 0, 'Fri', 1, '06:30-13:00', NULL, '2021-09-03'),
(249, 0, 'Sat', 1, '06:30-13:00', NULL, '2021-09-04'),
(250, 0, 'Sun', 1, '06:30-13:00', NULL, '2021-09-05'),
(251, 0, 'Mon', 1, '06:30-13:00', NULL, '2021-09-06'),
(252, 0, 'Tue', 1, '06:30-13:00', NULL, '2021-09-07'),
(253, 0, 'Wed', 1, '06:30-13:00', NULL, '2021-09-08'),
(254, 0, 'Thu', 1, '06:30-13:00', NULL, '2021-09-09'),
(255, 0, 'Fri', 1, '06:30-13:00', NULL, '2021-09-10'),
(256, 0, 'Sat', 1, '06:30-13:00', NULL, '2021-09-11'),
(257, 0, 'Mon', 1, '08:00-13:00', NULL, '2021-09-13'),
(258, 0, 'Tue', 1, '08:00-13:00', NULL, '2021-09-14'),
(259, 0, 'Wed', 1, '08:00-13:00', NULL, '2021-09-15'),
(260, 0, 'Thu', 1, '08:00-13:00', NULL, '2021-09-16'),
(261, 0, 'Fri', 1, '08:00-13:00', NULL, '2021-09-17'),
(262, 0, 'Sat', 1, '08:00-13:00', NULL, '2021-09-18'),
(263, 0, 'Thu', 1, '06:30-13:00', NULL, '2021-09-02'),
(264, 0, 'Fri', 1, '06:30-13:00', NULL, '2021-09-03'),
(265, 0, 'Sat', 1, '06:30-13:00', NULL, '2021-09-04'),
(266, 0, 'Sun', 1, '06:30-13:00', NULL, '2021-09-05'),
(267, 0, 'Mon', 1, '06:30-13:00', NULL, '2021-09-06'),
(268, 0, 'Tue', 1, '06:30-13:00', NULL, '2021-09-07'),
(269, 0, 'Wed', 1, '06:30-13:00', NULL, '2021-09-08'),
(270, 0, 'Thu', 1, '06:30-13:00', NULL, '2021-09-09'),
(271, 0, 'Fri', 1, '06:30-13:00', NULL, '2021-09-10'),
(272, 0, 'Sat', 1, '06:30-13:00', NULL, '2021-09-11'),
(273, 0, 'Mon', 1, '08:00-13:00', NULL, '2021-09-13'),
(274, 0, 'Tue', 1, '08:00-13:00', NULL, '2021-09-14'),
(275, 0, 'Wed', 1, '08:00-13:00', NULL, '2021-09-15'),
(276, 0, 'Thu', 1, '08:00-13:00', NULL, '2021-09-16'),
(277, 0, 'Fri', 1, '08:00-13:00', NULL, '2021-09-17'),
(278, 0, 'Sat', 1, '08:00-13:00', NULL, '2021-09-18'),
(279, 0, 'Thu', 1, '06:30-13:00', NULL, '2021-09-02'),
(280, 0, 'Fri', 1, '06:30-13:00', NULL, '2021-09-03'),
(281, 0, 'Sat', 1, '06:30-13:00', NULL, '2021-09-04'),
(282, 0, 'Sun', 1, '06:30-13:00', NULL, '2021-09-05'),
(283, 0, 'Mon', 1, '06:30-13:00', NULL, '2021-09-06'),
(284, 0, 'Tue', 1, '06:30-13:00', NULL, '2021-09-07'),
(285, 0, 'Wed', 1, '06:30-13:00', NULL, '2021-09-08'),
(286, 0, 'Thu', 1, '06:30-13:00', NULL, '2021-09-09'),
(287, 0, 'Fri', 1, '06:30-13:00', NULL, '2021-09-10'),
(288, 0, 'Sat', 1, '06:30-13:00', NULL, '2021-09-11'),
(289, 0, 'Mon', 1, '08:00-13:00', NULL, '2021-09-13'),
(290, 0, 'Tue', 1, '08:00-13:00', NULL, '2021-09-14'),
(291, 0, 'Wed', 1, '08:00-13:00', NULL, '2021-09-15'),
(292, 0, 'Thu', 1, '08:00-13:00', NULL, '2021-09-16'),
(293, 0, 'Fri', 1, '08:00-13:00', NULL, '2021-09-17'),
(294, 0, 'Sat', 1, '08:00-13:00', NULL, '2021-09-18'),
(295, 0, 'Thu', 1, '06:30-13:00', NULL, '2021-09-02'),
(296, 0, 'Fri', 1, '06:30-13:00', NULL, '2021-09-03'),
(297, 0, 'Sat', 1, '06:30-13:00', NULL, '2021-09-04'),
(298, 0, 'Sun', 1, '06:30-13:00', NULL, '2021-09-05'),
(299, 0, 'Mon', 1, '06:30-13:00', NULL, '2021-09-06'),
(300, 0, 'Tue', 1, '06:30-13:00', NULL, '2021-09-07'),
(301, 0, 'Wed', 1, '06:30-13:00', NULL, '2021-09-08'),
(302, 0, 'Thu', 1, '06:30-13:00', NULL, '2021-09-09'),
(303, 0, 'Fri', 1, '06:30-13:00', NULL, '2021-09-10'),
(304, 0, 'Sat', 1, '06:30-13:00', NULL, '2021-09-11'),
(305, 0, 'Mon', 1, '08:00-13:00', NULL, '2021-09-13'),
(306, 0, 'Tue', 1, '08:00-13:00', NULL, '2021-09-14'),
(307, 0, 'Wed', 1, '08:00-13:00', NULL, '2021-09-15'),
(308, 0, 'Thu', 1, '08:00-13:00', NULL, '2021-09-16'),
(309, 0, 'Fri', 1, '08:00-13:00', NULL, '2021-09-17'),
(310, 0, 'Sat', 1, '08:00-13:00', NULL, '2021-09-18'),
(311, 0, 'Thu', 1, '06:30-13:00', NULL, '2021-09-02'),
(312, 0, 'Fri', 1, '06:30-13:00', NULL, '2021-09-03'),
(313, 0, 'Sat', 1, '06:30-14:00', NULL, '2021-09-04'),
(314, 0, 'Sun', 1, '06:30-14:00', NULL, '2021-09-05'),
(315, 0, 'Mon', 1, '06:30-14:00', NULL, '2021-09-06'),
(316, 0, 'Tue', 1, '06:30-14:00', NULL, '2021-09-07'),
(317, 0, 'Wed', 1, '06:30-14:00', NULL, '2021-09-08'),
(318, 0, 'Thu', 1, '06:30-14:00', NULL, '2021-09-09'),
(319, 0, 'Fri', 1, '06:30-14:00', NULL, '2021-09-10'),
(320, 0, 'Sat', 1, '06:30-14:00', NULL, '2021-09-11'),
(321, 0, 'Mon', 1, '08:00-14:00', NULL, '2021-09-13'),
(322, 0, 'Tue', 1, '08:00-14:00', NULL, '2021-09-14'),
(323, 0, 'Wed', 1, '08:00-14:00', NULL, '2021-09-15'),
(324, 0, 'Thu', 1, '08:00-14:00', NULL, '2021-09-16'),
(325, 0, 'Fri', 1, '08:00-14:00', NULL, '2021-09-17'),
(326, 0, 'Sat', 1, '08:00-14:00', NULL, '2021-09-18'),
(327, 0, 'Mon', 1, '08:00-14:00', NULL, '2021-09-20'),
(328, 0, 'Tue', 1, '08:00-14:00', NULL, '2021-09-21'),
(329, 0, 'Wed', 1, '08:00-14:00', NULL, '2021-09-22'),
(330, 0, 'Thu', 1, '08:00-14:00', NULL, '2021-09-23'),
(331, 0, 'Fri', 1, '08:00-14:00', NULL, '2021-09-24'),
(332, 0, 'Sat', 1, '08:00-14:00', NULL, '2021-09-25'),
(333, 0, 'Mon', 1, '08:00-14:00', NULL, '2021-09-27'),
(334, 0, 'Tue', 1, '08:00-14:00', NULL, '2021-09-28'),
(335, 0, 'Wed', 1, '08:00-14:00', NULL, '2021-09-29'),
(336, 0, 'Thu', 1, '08:00-14:00', NULL, '2021-09-30'),
(337, 0, 'Thu', 1, '06:30-13:00', NULL, '2021-09-02'),
(338, 0, 'Fri', 1, '06:30-13:00', NULL, '2021-09-03'),
(339, 0, 'Sat', 1, '06:30-14:00', NULL, '2021-09-04'),
(340, 0, 'Sun', 1, '06:30-14:00', NULL, '2021-09-05'),
(341, 0, 'Mon', 1, '06:30-14:00', NULL, '2021-09-06'),
(342, 0, 'Tue', 1, '06:30-14:00', NULL, '2021-09-07'),
(343, 0, 'Wed', 1, '06:30-14:00', NULL, '2021-09-08'),
(344, 0, 'Thu', 1, '06:30-14:00', NULL, '2021-09-09'),
(345, 0, 'Fri', 1, '06:30-14:00', NULL, '2021-09-10'),
(346, 0, 'Sat', 1, '06:30-14:00', NULL, '2021-09-11'),
(347, 0, 'Mon', 1, '08:00-14:00', NULL, '2021-09-13'),
(348, 0, 'Tue', 1, '08:00-14:00', NULL, '2021-09-14'),
(349, 0, 'Wed', 1, '08:00-14:00', NULL, '2021-09-15'),
(350, 0, 'Thu', 1, '08:00-14:00', NULL, '2021-09-16'),
(351, 0, 'Fri', 1, '08:00-14:00', NULL, '2021-09-17'),
(352, 0, 'Sat', 1, '08:00-14:00', NULL, '2021-09-18'),
(353, 0, 'Mon', 1, '08:00-14:00', NULL, '2021-09-20'),
(354, 0, 'Tue', 1, '08:00-14:00', NULL, '2021-09-21'),
(355, 0, 'Wed', 1, '08:00-14:00', NULL, '2021-09-22'),
(356, 0, 'Thu', 1, '08:00-14:00', NULL, '2021-09-23'),
(357, 0, 'Fri', 1, '08:00-14:00', NULL, '2021-09-24'),
(358, 0, 'Sat', 1, '08:00-14:00', NULL, '2021-09-25'),
(359, 0, 'Mon', 1, '08:00-14:00', NULL, '2021-09-27'),
(360, 0, 'Tue', 1, '08:00-14:00', NULL, '2021-09-28'),
(361, 0, 'Wed', 1, '08:00-14:00', NULL, '2021-09-29'),
(362, 0, 'Thu', 1, '08:00-14:00', NULL, '2021-09-30'),
(363, 0, 'Thu', 1, '06:30-13:00', NULL, '2021-09-02'),
(364, 0, 'Fri', 1, '06:30-13:00', NULL, '2021-09-03'),
(365, 0, 'Sat', 1, '06:30-14:00', NULL, '2021-09-04'),
(366, 0, 'Sun', 1, '06:30-14:00', NULL, '2021-09-05'),
(367, 0, 'Mon', 1, '06:30-14:00', NULL, '2021-09-06'),
(368, 0, 'Tue', 1, '06:30-14:00', NULL, '2021-09-07'),
(369, 0, 'Wed', 1, '06:30-14:00', NULL, '2021-09-08'),
(370, 0, 'Thu', 1, '06:30-14:00', NULL, '2021-09-09'),
(371, 0, 'Fri', 1, '06:30-14:00', NULL, '2021-09-10'),
(372, 0, 'Sat', 1, '06:30-14:00', NULL, '2021-09-11'),
(373, 0, 'Mon', 1, '08:00-14:00', NULL, '2021-09-13'),
(374, 0, 'Tue', 1, '08:00-14:00', NULL, '2021-09-14'),
(375, 0, 'Wed', 1, '08:00-14:00', NULL, '2021-09-15'),
(376, 0, 'Thu', 1, '08:00-14:00', NULL, '2021-09-16'),
(377, 0, 'Fri', 1, '08:00-14:00', NULL, '2021-09-17'),
(378, 0, 'Sat', 1, '08:00-14:00', NULL, '2021-09-18'),
(379, 0, 'Mon', 1, '08:00-14:00', NULL, '2021-09-20'),
(380, 0, 'Tue', 1, '08:00-14:00', NULL, '2021-09-21'),
(381, 0, 'Wed', 1, '08:00-14:00', NULL, '2021-09-22'),
(382, 0, 'Thu', 1, '08:00-14:00', NULL, '2021-09-23'),
(383, 0, 'Fri', 1, '08:00-14:00', NULL, '2021-09-24'),
(384, 0, 'Sat', 1, '08:00-14:00', NULL, '2021-09-25'),
(385, 0, 'Mon', 1, '08:00-14:00', NULL, '2021-09-27'),
(386, 0, 'Tue', 1, '08:00-14:00', NULL, '2021-09-28'),
(387, 0, 'Wed', 1, '08:00-14:00', NULL, '2021-09-29'),
(388, 0, 'Thu', 1, '08:00-14:00', NULL, '2021-09-30'),
(389, 0, 'Thu', 1, '06:30-13:00', NULL, '2021-09-02'),
(390, 0, 'Fri', 1, '06:30-13:00', NULL, '2021-09-03'),
(391, 0, 'Sat', 1, '06:30-14:00', NULL, '2021-09-04'),
(392, 0, 'Sun', 1, '06:30-14:00', NULL, '2021-09-05'),
(393, 0, 'Mon', 1, '06:30-14:00', NULL, '2021-09-06'),
(394, 0, 'Tue', 1, '06:30-14:00', NULL, '2021-09-07'),
(395, 0, 'Wed', 1, '06:30-14:00', NULL, '2021-09-08'),
(396, 0, 'Thu', 1, '06:30-14:00', NULL, '2021-09-09'),
(397, 0, 'Fri', 1, '06:30-14:00', NULL, '2021-09-10'),
(398, 0, 'Sat', 1, '06:30-14:00', NULL, '2021-09-11'),
(399, 0, 'Mon', 1, '08:00-14:00', NULL, '2021-09-13'),
(400, 0, 'Tue', 1, '08:00-14:00', NULL, '2021-09-14'),
(401, 0, 'Wed', 1, '08:00-14:00', NULL, '2021-09-15'),
(402, 0, 'Thu', 1, '08:00-14:00', NULL, '2021-09-16'),
(403, 0, 'Fri', 1, '08:00-14:00', NULL, '2021-09-17'),
(404, 0, 'Sat', 1, '08:00-14:00', NULL, '2021-09-18'),
(405, 0, 'Mon', 1, '08:00-14:00', NULL, '2021-09-20'),
(406, 0, 'Tue', 1, '08:00-14:00', NULL, '2021-09-21'),
(407, 0, 'Wed', 1, '08:00-14:00', NULL, '2021-09-22'),
(408, 0, 'Thu', 1, '08:00-14:00', NULL, '2021-09-23'),
(409, 0, 'Fri', 1, '08:00-14:00', NULL, '2021-09-24'),
(410, 0, 'Sat', 1, '08:00-14:00', NULL, '2021-09-25'),
(411, 0, 'Mon', 1, '08:00-14:00', NULL, '2021-09-27'),
(412, 0, 'Tue', 1, '08:00-14:00', NULL, '2021-09-28'),
(413, 0, 'Wed', 1, '08:00-14:00', NULL, '2021-09-29'),
(414, 0, 'Thu', 1, '08:00-14:00', NULL, '2021-09-30'),
(415, 155, 'Wed', 1, '07:00-14:30', NULL, '2021-09-08'),
(416, 155, 'Thu', 1, '07:00-14:30', NULL, '2021-09-09'),
(417, 155, 'Fri', 1, '07:00-14:30', NULL, '2021-09-10'),
(418, 155, 'Sat', 1, '07:00-14:30', NULL, '2021-09-11'),
(419, 155, 'Mon', 1, '08:00-15:00', NULL, '2021-09-13'),
(420, 155, 'Tue', 1, '08:00-15:00', NULL, '2021-09-14'),
(421, 155, 'Wed', 1, '08:00-15:00', NULL, '2021-09-15'),
(422, 155, 'Thu', 1, '08:00-15:00', NULL, '2021-09-16'),
(423, 155, 'Fri', 1, '08:00-15:00', NULL, '2021-09-17'),
(424, 155, 'Sat', 1, '08:00-15:00', NULL, '2021-09-18'),
(425, 155, 'Mon', 1, '08:00-15:00', NULL, '2021-09-20'),
(426, 155, 'Tue', 1, '08:00-15:00', NULL, '2021-09-21'),
(427, 155, 'Wed', 1, '08:00-15:00', NULL, '2021-09-22'),
(428, 155, 'Thu', 1, '08:00-15:00', NULL, '2021-09-23'),
(429, 155, 'Fri', 1, '08:00-15:00', NULL, '2021-09-24'),
(430, 155, 'Sat', 1, '08:00-15:00', NULL, '2021-09-25'),
(431, 155, 'Mon', 1, '08:00-15:00', NULL, '2021-09-27'),
(432, 155, 'Tue', 1, '08:00-15:00', NULL, '2021-09-28'),
(433, 155, 'Wed', 1, '08:00-15:00', NULL, '2021-09-29'),
(434, 155, 'Thu', 1, '08:00-15:00', NULL, '2021-09-30'),
(435, 156, 'Mon', 1, '14:30-22:00', NULL, '2021-09-13'),
(436, 156, 'Tue', 1, '14:30-22:00', NULL, '2021-09-14'),
(437, 156, 'Wed', 1, '14:30-22:00', NULL, '2021-09-15'),
(438, 156, 'Thu', 1, '14:30-22:00', NULL, '2021-09-16'),
(439, 156, 'Fri', 1, '14:30-15:00', NULL, '2021-09-17'),
(440, 156, 'Sat', 1, '14:30-15:00', NULL, '2021-09-18'),
(441, 156, 'Mon', 1, '14:30-15:00', NULL, '2021-09-20'),
(442, 156, 'Tue', 1, '14:30-22:00', NULL, '2021-09-21'),
(443, 156, 'Wed', 1, '14:30-15:00', NULL, '2021-09-22'),
(444, 156, 'Thu', 1, '14:30-22:00', NULL, '2021-09-23'),
(445, 156, 'Fri', 1, '14:30-22:00', NULL, '2021-09-24'),
(446, 156, 'Sat', 1, '14:30-22:00', NULL, '2021-09-25'),
(447, 156, 'Mon', 1, '14:30-22:00', NULL, '2021-09-27'),
(448, 156, 'Tue', 1, '14:30-22:00', NULL, '2021-09-28'),
(449, 156, 'Wed', 1, '14:30-22:00', NULL, '2021-09-29'),
(450, 156, 'Thu', 1, '14:30-22:00', NULL, '2021-09-30'),
(451, 157, 'Wed', 1, '10:30-14:30', NULL, '2021-09-01'),
(452, 157, 'Thu', 1, '10:30-13:00', NULL, '2021-09-02'),
(453, 157, 'Fri', 1, '10:30-13:00', NULL, '2021-09-03'),
(454, 157, 'Sat', 1, '10:30-14:30', NULL, '2021-09-04'),
(455, 157, 'Sun', 1, '10:30-14:30', NULL, '2021-09-05'),
(456, 157, 'Mon', 1, '10:30-14:30', NULL, '2021-09-06'),
(457, 157, 'Tue', 1, '10:30-14:30', NULL, '2021-09-07'),
(458, 157, 'Wed', 1, '10:30-14:30', NULL, '2021-09-08'),
(459, 157, 'Thu', 1, '10:30-14:30', NULL, '2021-09-09'),
(460, 157, 'Fri', 1, '10:30-14:30', NULL, '2021-09-10'),
(461, 157, 'Sat', 1, '10:30-14:30', NULL, '2021-09-11'),
(462, 157, 'Mon', 1, '10:30-18:30', NULL, '2021-09-13'),
(463, 157, 'Tue', 1, '10:30-18:30', NULL, '2021-09-14'),
(464, 157, 'Wed', 1, '10:30-18:30', NULL, '2021-09-15'),
(465, 157, 'Thu', 1, '10:30-18:30', NULL, '2021-09-16'),
(466, 157, 'Fri', 1, '10:30-15:00', NULL, '2021-09-17'),
(467, 157, 'Sat', 1, '10:30-15:00', NULL, '2021-09-18'),
(468, 157, 'Mon', 1, '10:30-15:00', NULL, '2021-09-20'),
(469, 157, 'Tue', 1, '10:30-18:30', NULL, '2021-09-21'),
(470, 157, 'Wed', 1, '10:30-15:00', NULL, '2021-09-22'),
(471, 157, 'Thu', 1, '10:30-18:30', NULL, '2021-09-23'),
(472, 157, 'Fri', 1, '10:30-18:30', NULL, '2021-09-24'),
(473, 157, 'Sat', 1, '10:30-18:30', NULL, '2021-09-25'),
(474, 157, 'Mon', 1, '10:30-18:30', NULL, '2021-09-27'),
(475, 157, 'Tue', 1, '10:30-18:30', NULL, '2021-09-28'),
(476, 157, 'Wed', 1, '10:30-18:30', NULL, '2021-09-29'),
(477, 157, 'Thu', 1, '10:30-18:30', NULL, '2021-09-30');

-- --------------------------------------------------------

--
-- Table structure for table `medicinari`
--

DROP TABLE IF EXISTS `medicinari`;
CREATE TABLE IF NOT EXISTS `medicinari` (
  `IDMedicinara` int(11) NOT NULL AUTO_INCREMENT,
  `Ime` varchar(30) DEFAULT NULL,
  `Prezime` varchar(30) DEFAULT NULL,
  `Telefon` varchar(30) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Sifra` varchar(100) DEFAULT NULL,
  `LicniBroj` varchar(20) DEFAULT NULL,
  `Opis` varchar(100) DEFAULT NULL,
  `Tip` varchar(10) DEFAULT NULL,
  `DatumOd` varchar(15) DEFAULT NULL,
  `DatumDo` varchar(15) DEFAULT NULL,
  `RadnoVremeOd` varchar(10) DEFAULT NULL,
  `RadnoVremeDo` varchar(10) DEFAULT NULL,
  `BrojPacijenata` int(11) DEFAULT NULL,
  `KovidCentar` char(2) DEFAULT NULL,
  PRIMARY KEY (`IDMedicinara`)
) ENGINE=MyISAM AUTO_INCREMENT=158 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicinari`
--

INSERT INTO `medicinari` (`IDMedicinara`, `Ime`, `Prezime`, `Telefon`, `Email`, `Sifra`, `LicniBroj`, `Opis`, `Tip`, `DatumOd`, `DatumDo`, `RadnoVremeOd`, `RadnoVremeDo`, `BrojPacijenata`, `KovidCentar`) VALUES
(156, 'Tamara', 'Jovanovic', '0640545623', 'tamara@gmail.com', '$2y$10$iYMWUIjAgqkVZKnlRiJbO.WK.h2nHL3VEPacdnGoM79flYfQ5DByW', '25', NULL, NULL, '2021-09-01', '2021-09-30', '14:30', '22:30', 3, 'da'),
(155, 'Medicinski', 'Radnik', '8989909889', 'medicinskiradnik@gmail.com', '$2y$10$vYbF04v8rJ2zkE9NiFYkle0MRe9SH/ZFdCo/FZItqatXzOPKEoQye', '0989898990', NULL, NULL, '2021-09-08', '2021-09-30', '07:00', '15:00', 4, 'da'),
(157, 'Milenko', 'Milenkovic', '0378279213', 'milenko@gmail.com', '$2y$10$H6AdRa7ppSu.jTFTSpX9IekhZEXGbSQf6JgQK.CjTh0jv.rF1qkXq', '9892', NULL, NULL, '2021-09-01', '2021-09-30', '10:30', '18:30', 6, 'da');

-- --------------------------------------------------------

--
-- Table structure for table `pacijenti`
--

DROP TABLE IF EXISTS `pacijenti`;
CREATE TABLE IF NOT EXISTS `pacijenti` (
  `IDpacijenta` int(11) NOT NULL AUTO_INCREMENT,
  `Ime` varchar(30) DEFAULT NULL,
  `Prezime` varchar(30) DEFAULT NULL,
  `Telefon` varchar(30) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Sifra` varchar(100) DEFAULT NULL,
  `LiCniBroj` varchar(20) DEFAULT NULL,
  `ListaIDMedicinara` varchar(50) DEFAULT NULL,
  `Karton` varchar(50) DEFAULT NULL,
  `Opis` varchar(50) DEFAULT NULL,
  `BrojNedolazaka` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDpacijenta`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pacijenti`
--

INSERT INTO `pacijenti` (`IDpacijenta`, `Ime`, `Prezime`, `Telefon`, `Email`, `Sifra`, `LiCniBroj`, `ListaIDMedicinara`, `Karton`, `Opis`, `BrojNedolazaka`) VALUES
(20, 'Nenad', 'Nenadovic', '2121', 'nenad@gmail.com', '$2y$10$5X7KoVxJGulWnNPYDs6p/u.CzJ6Zb7rD2kRyOEKrFzynFyCQNgLiO', '1212', '154', '', NULL, 0),
(18, 'Marko', 'Markovic', '0661616', 'marko@gmail.com', '$2y$10$cuzdHta00fONf0ouetuSP.CEn7trUJ.kYHMMmT8AajDfw5BM3P/Nu', '3', '', '', NULL, 1),
(16, 'Dusko', 'Dugousko', '8765', 'dusko@gmail.com', '$2y$10$/cw07Vj08YIPj7Y/kiKqeev6OhkpF6U8qm071eODrMyic03AIuS5G', '34567', '4', '', NULL, 8),
(21, 'Stefan', 'Stefanovic', '8989', 'stefan@gmail.com', '$2y$10$MnCYRBceXu8OXZxtTBnrMOEo2b7N.G5oI9glhXZzgQnV/TNi0zGsu', '9989', '154', '', NULL, 0),
(14, 'Zoran', 'Zoranovic', '098776', 'zoran@gmail.com', '$2y$10$IpLPtRuSnIThUIxdSLOhieT4x2cHQqtRZzAl73EU4d.FbUqHzCkoe', '080909', '', '', NULL, 8),
(19, 'Strahinja', 'Strahinjic', '45678765', 'strahinja@gmail.com', '$2y$10$qL0TvQ6Z86pl//r03/JXEeTzAk2hy2FycsEGdfs0mQN7.gDrNKXg.', '9876456', '152', '', NULL, 0),
(17, 'Sava', 'Savanovic', '132132', 'sava@gmail.com', '$2y$10$ptR2shD0R3SdiVc9yv.HBudgLJrdJaMVN1O9HU03xt5v2Ck8eOwVS', '2999222', '', '', NULL, 0),
(22, 'Pacijent', 'Pacijent', '45678', 'pacijent@gmail.com', '$2y$10$98IfveIa85RaVfNCmjHNbejLmU3GYzpBHux/G0kj.oPRLTE7pxM5i', '2345678', '', '', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vesti`
--

DROP TABLE IF EXISTS `vesti`;
CREATE TABLE IF NOT EXISTS `vesti` (
  `IDVesti` int(11) NOT NULL AUTO_INCREMENT,
  `LinkVesti` varchar(200) NOT NULL,
  `Naslov` varchar(200) DEFAULT NULL,
  `Datum` date DEFAULT NULL,
  `Sadrzaj` varchar(4000) DEFAULT NULL,
  PRIMARY KEY (`IDVesti`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vesti`
--

INSERT INTO `vesti` (`IDVesti`, `LinkVesti`, `Naslov`, `Datum`, `Sadrzaj`) VALUES
(2, 'https://balkans.aljazeera.net/news/world/2021/5/6/nizozemski-naucnici-pcelama-otkrivaju-uzorke-zarazene-korona-virusom', 'Pcele otkrivaju uzorke zarazene korona virusom', '2021-04-24', ' Danski naucnici naucili su pcele, koje imaju dobar njuh, da otkrivaju uzorke zarazene COVID-19, a to bi postignuce moglo skratiti dobijanje rezultata testiranja na korona virus na nekoliko sekundi. Kako bi istrenirali pcele, naucnici u bioveterinarskom istrazivackom laboratoriju na Univerzitetu Wageningen nagradjivali su te insekte zasladjenom vodom nakon sto bi im pokazali uzorke zarazene korona virusom. Kada bi im pokazali nezarazene uzorke, pcele ne bi dobile nista, prenosi Hina, pozivajuci se na Reuters. Voditelj projekta Wim van der Poel, profesor virologije koji je bio dio projekta, rekao je kako su uzete normalne medonosne pcele koje bi, kada su se navikle na takav sistem, isplazile jezik da bi dobile nagradu, sto je postao pokazatelj da je uzorak zarazen.'),
(1, 'https://www.danas.rs/bbc-news-serbian/korona-virus-budzet-i-finansije-u-srbiji-kako-se-prijaviti-za-60-evra/', 'Korona virus, budzet i finansije u Srbiji: Kako se prijaviti za 60 evra', '2021-04-15', 'Godinu dana posle isplate 100 evra iz drzavnog buddzeta, pocela je prijava za dodatnih 60 evra za sve punoletne ljude u Srbiji ce u dve jednake rate u maju i novembru. Procedura je jednostavna i kratko traje, a popunjava se preko sajta Uprave za trezor. Potrebno je uneti tri podatka ce broj licne karte, jedinstveni maticni broj gradjana i banku u kojoj imate racun ili gde zelite da vam drzava otvori racun, ako ga nemate.Prijava traje do 15. maja, a za one koji ne barataju internetom, od 5. maja postojace i kol centar kako bi ljudi mogli telefonom da se prijave, najavili su zvanicnici.');

-- --------------------------------------------------------

--
-- Table structure for table `zakazi`
--

DROP TABLE IF EXISTS `zakazi`;
CREATE TABLE IF NOT EXISTS `zakazi` (
  `IDZakazivanja` int(11) NOT NULL AUTO_INCREMENT,
  `IDPacijenta` int(11) DEFAULT NULL,
  `IDMedicinara` int(11) DEFAULT NULL,
  `IdentifikatorKorone` char(2) DEFAULT NULL,
  `Temperatura` float DEFAULT NULL,
  `BrojDanaTemp` int(11) DEFAULT NULL,
  `Simptomi` varchar(50) DEFAULT NULL,
  `DatumZakazivanja` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IDZakazivanja`)
) ENGINE=MyISAM AUTO_INCREMENT=202 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zakazi`
--

INSERT INTO `zakazi` (`IDZakazivanja`, `IDPacijenta`, `IDMedicinara`, `IdentifikatorKorone`, `Temperatura`, `BrojDanaTemp`, `Simptomi`, `DatumZakazivanja`) VALUES
(201, 17, 155, 'da', 37, 6, 'glavobolja', '2021-09-08 08:00-08:15'),
(193, 22, 155, 'ne', 36, 7, 'vcxz', '2021-09-08 07:30-07:45');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
