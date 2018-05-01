-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 01, 2018 at 02:29 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `busmanagement`
--
CREATE DATABASE IF NOT EXISTS `busmanagement` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `busmanagement`;

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--
-- Creation: Apr 08, 2018 at 05:39 AM
--

DROP TABLE IF EXISTS `bus`;
CREATE TABLE `bus` (
  `bus_id` int(1) NOT NULL,
  `to_pec` varchar(239) DEFAULT NULL,
  `from_pec` varchar(233) DEFAULT NULL,
  `sem1` varchar(17) DEFAULT NULL,
  `sem2` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `bus`:
--

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`bus_id`, `to_pec`, `from_pec`, `sem1`, `sem2`) VALUES
(1, 'villianur-7.45 am,sulthanpet-8.00 am,Reddiarpalem police station-8.10 am,I.G.Statue-8.20 am,P.E.C-8.50 am', 'P.E.C-5.00 pm,I.G.Statue-5.30 pm,Reddiarpalem police station-5.40 pm,sulthanpet-5.45 pm,villianur-6.00 pm', '0,0,0,0,0', '55,55,55,55,55'),
(2, 'Ariankuppam-8.00 am,Murugankuppam-8.10 am,Nainarmandapam-8.20 am,P.E.C-8.50 am', 'P.E.C-5.00 pm,Nainarmanadapam-5.30 pm,Murugankuppam-5.40 pm,Ariankuppam-5.45 pm', '54,54,55,55,55', '55,55,55,55,55'),
(3, 'kurumampet-8.05 am,iyankuttipalayam-8.00 am,dharampuri-8.10 am,muthirapalayam-8.15 am,mettupalayam-8.15 am,shanmugapuram-8.20 am,kathirkamam-8.25 am,koundanpalayam-8.25 am,Rainbow nagar-8.30 am,muthialpet Perumal Koil-8.35 am P.E.C-8.50 am', 'P.E.C-5.00 pm,Nainarmanadapam-5.30 pm,Murugankuppam-5.40 pm,Ariankuppam-5.45 pm', '55,55,55,55,55', '55,55,55,55,55'),
(4, 'ponniamman koil-8.10 am,kumaran nagar-8.15 am,vanavil-8.25 am,J.T.S-8.30 am,P.E.C-8.50 am', 'P.E.C-5.00 pm,J.T.S-5.30 pm,vanavil-5.40 pm,kumaran nagar-5.45 pm,ponniamman koil-5.50 pm', '55,55,55,55,55', '55,55,55,55,55'),
(5, 'Marappalam-8.00 am,B.D.nagar-8.10 am,T.M.Nagar-8.20 am,B.W.College-8.30 am,P.E.C-8.50 am', 'P.E.C-5.00 pm,B.W.College-5.30 pm,T.M.Nagar-5.40 pm,B.D.Nagar-5.45 pm,Marappalam-5.50 pm', '55,55,55,55,55', '55,55,55,55,55'),
(6, 'Pavazhanchavady-8.00 am,Saradhambal Temple-8.10 am,saram-8.20 am,VST Mandapam-8.30 am,P.E.C-8.50 am', 'P.E.C-5.00 pm,VST Mandapam-5.30 pm,Saran-5.40 pm,saradhambal Temple-5.45 pm,Pavazhanchavady-5.50 pm', '55,55,55,55,55', '55,55,55,55,55'),
(7, 'JIPMER-8.10 am,SS Mahal-8.15 am,VVP Nagar-8.15 am,Govt Press-8.15 am,jeeva colony-8.20 am,G.H Lawspet-8.20 am,Rice Mill-8.25 am,Ganesh Temple-8.30 am,Bharathi Nagar-8.35 am,P.E.C-8.50 am', 'P.E.C-5.00 pm,Bharathi Nagar-5.15 pm, Ganesh Temple-5.20 pm,Rice Mill-5.25 p.m,G.H Lawspet-5.30 pm,jeeva colony-5.30 pm,Govt Press-5.35 pm,VVP Nagar-5.40 pm,SS Mahal-5.45 pm,JIPMER-5.50 PM', '55,55,55,55,55', '55,55,55,55,55'),
(8, 'Nellithope-8.10 am,N.T.C. Mill-8.15 am,KK Arangam-8.15 am,Chinna Kadai-8.20 am,Law College-8.20 am,G.H Pondicherry-8.25 am,A.P Mill-8.30 am,Renuka Theatre-8.30 am,Muthialpet clock tower-8.35 am,Muthialpet market-8.35 am,P.E.C-8.50 AM', 'P.E.C-5.00 pm,Muthialpet market-5.15 pm,Muthialpet clock tower-5.15 pm,Renuka Theatre-5.20 pm,A.P Mill-5.20 pm,G.H Pondicherry-5.25 pm,Law College -5.30 pm,Chinna Kadai-5.35 pm,KK Arangam-5.40 pm,N.T.C Mill-5.45 pm,Nellithope-5.50 pm', '55,55,55,55,55', '55,55,55,55,55'),
(9, 'Arumbarthapuram-8.10 am,Kamban Nagar -8.20 am,Srinivas Towers-8.25 am,Ananandarangar Mahal-8.30 am,Balaji Theatre-8.30 am,Sedhu Nursing Home-8.35 am,P.E.C-8.50 am', 'P.E.C-5.00 pm,Sedhu Nursing Home-5.15 pm,Balaji Nagar-5.20 pm,Ananandarangar Mahal-5.20 pm,Srinivas Towers-5.25 pm,Kamban Nagar -5.30p.m,Arumbarthapuram-5.40 pm', '55,55,55,55,55', '55,55,55,55,55');

-- --------------------------------------------------------

--
-- Table structure for table `pass`
--
-- Creation: Apr 08, 2018 at 06:05 PM
--

DROP TABLE IF EXISTS `pass`;
CREATE TABLE `pass` (
  `id` int(11) NOT NULL,
  `reg_no` varchar(8) NOT NULL,
  `valid_thru` text NOT NULL,
  `old_rec` varchar(3) NOT NULL,
  `date_time` datetime NOT NULL,
  `pass_type` varchar(20) NOT NULL,
  `cost` varchar(4) NOT NULL,
  `bus_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `pass`:
--

--
-- Dumping data for table `pass`
--

INSERT INTO `pass` (`id`, `reg_no`, `valid_thru`, `old_rec`, `date_time`, `pass_type`, `cost`, `bus_no`) VALUES
(29, '15CS145', 'March', 'yes', '2018-04-09 00:10:49', 'Monthly', '1000', 1),
(30, '15CS145', 'April', 'yes', '2018-04-09 00:12:06', 'Monthly', '1000', 1),
(31, '15CS145', 'May', 'yes', '2018-04-09 00:12:14', 'Monthly', '1000', 1),
(32, '15CS145', 'August', 'yes', '2018-04-11 11:23:46', 'Monthly', '1000', 1),
(33, '15CS145', 'Spetember', 'yes', '2018-04-11 11:24:04', 'Monthly', '1000', 1),
(34, '15CS145', 'January,February,March,April,May', 'yes', '2018-04-11 11:28:11', 'Even Sem', '4500', 1),
(35, '15CS145', 'July,August,Spetember,October,November,January,February,March,April,May', 'yes', '2018-04-12 14:26:16', 'Yearly', '8000', 1),
(36, '15CS145', 'July,August,Spetember,October,November,January,February,March,April,May', 'yes', '2018-04-12 14:27:05', 'Yearly', '8000', 1),
(37, '15CS143', 'April', 'yes', '2018-04-12 19:24:00', 'Monthly', '1000', 1),
(38, '15CS145', 'July', 'yes', '2018-04-16 12:17:35', 'Monthly', '1000', 1),
(39, '15CS145', 'March', 'yes', '2018-04-16 12:18:31', 'Monthly', '1000', 1),
(40, '15CS145', 'August', 'yes', '2018-04-16 12:23:09', 'Monthly', '1000', 1),
(41, '15CS101', 'July', 'no', '2018-04-18 10:53:12', 'Monthly', '1000', 2),
(42, '15CS101', 'August', 'no', '2018-04-18 10:53:48', 'Monthly', '1000', 2);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--
-- Creation: Apr 08, 2018 at 05:22 AM
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` int(2) NOT NULL,
  `reg_no` varchar(20) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(6) NOT NULL,
  `dept` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `students`:
--

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `reg_no`, `name`, `email`, `password`, `dept`) VALUES
(1, '15CS101', 'ALAPAKA PHANENDRA SAI SHREE VINAY', 'pindra829@gmail.com', '71157', 'cse'),
(2, '15CS102', 'ABBAVARAM SRINIVAS REDDY A', 'seenuindia007@gmail.com', '', 'cse'),
(3, '15CS104', 'ALLAGADDA SAI UPENDRA NATH', 'sainath940@gmail.com', '', 'cse'),
(4, '15CS105', 'APARNA B', 'aparnabalaji1997@gmail.com', '', 'cse'),
(5, '15CS106', 'ARAVELLI SATYA RAGHU KALYAN PAVAN', 'pavanaravelli690@gmail.com', '', 'cse'),
(6, '15CS107', 'ASHOK KUMAR', 'sashokkumarjs@gmail.com', '', 'cse'),
(7, '15CS108', 'ASWINI V', 'aswini2702@gmail.com', '', 'cse'),
(8, '15CS109', 'BEFY G', 'befy.g1103@gmai.com', '', 'cse'),
(9, '15CS110', 'BHAKYAVATHY V', 'bhakyavathi28@gmail.com', '', 'cse'),
(10, '15CS111', 'BHAVESH L', 'studybhavesh@gmail.com', '', 'cse'),
(11, '15CS112', 'CHAKKA VAISHNAVI', 'vaishnavichakka1997@gmail.com', '', 'cse'),
(12, '15CS113', 'DARANI R', 'dharaniravichandran25@gmail.com', '', 'cse'),
(13, '15CS114', 'DRISHYA SV', 'svdrishya@gmail.com', '', 'cse'),
(14, '15CS115', 'GANDHAM HARSHA VARDHAN', 'harshavardhan495@gmail.com', '', 'cse'),
(15, '15CS116', 'GUNDABATHULA VENKATA SAI KASIRATHNAM', 'gvs.kasirathnam@gmail.com', '', 'cse'),
(16, '15CS117', 'HARSHARAJ S', 'harsharaj67@gmail.com', '', 'cse'),
(17, '15CS118', 'HRUDAYASRI VATSALYA K', 'greathrudaya@gmail.com', '', 'cse'),
(18, '15CS119', 'INDIRA R', 'indhuicy@gmail.com', '', 'cse'),
(19, '15CS120', 'IYSHWAARIYA S', 'ishupecpondy@gmail.com', '', 'cse'),
(20, '15CS121', 'JAISURIA R', 'r.jaisuriya97@outlook.om', '', 'cse'),
(21, '15CS123', 'KALAIVANI I', '12kalaivani@gmail.com', '', 'cse'),
(22, '15CS124', 'KAMALESH R', 'kamaleships@gmail.com', '', 'cse'),
(23, '15CS125', 'KARTHIK S', 'karthickkarthik98@gamil.com', '', 'cse'),
(24, '15CS126', 'KEERTHANA J', 'jkay.keerthana@gmail.com', '', 'cse'),
(25, '15CS127', 'KUMARAN S', 'rightkumaran@gmail.com', '', 'cse'),
(26, '15CS128', 'LOKESH P', 'lokesh.poobal@gmail.com', '', 'cse'),
(27, '15CS129', 'MADHUMITHA C', 'madhumitha0698@gmail.com', '', 'cse'),
(28, '15CS130', 'MARATI DAIVA PRASAD', 'daivaprasad934@gmail.com', '', 'cse'),
(29, '15CS131', 'MATHUVANTHANI', 'mathuvanthani20@gmail.com', '', 'cse'),
(30, '15CS132', 'MUTHURAMAN G', 'muthu09021998@gmail.com', '', 'cse'),
(31, '15CS133', 'NARENDRAN D', 'dwa.andrewnarendran@gmail.com', '', 'cse'),
(32, '15CS134', 'PANNEERSELVAM S', 'panneerspar@gmail.com', '', 'cse'),
(33, '15CS135', 'PRADEP S', 'pradepprince@gmail.com', '', 'cse'),
(34, '15CS137', 'PRAKASH BABU R', 'bbabuprakash97@gmail.com', '', 'cse'),
(35, '15CS138', 'PRATIKSHA G', 'pratikshagajraj97@gmail.com', '', 'cse'),
(36, '15CS139', 'PRITHI R', 'pratikamali@gmail.com', '', 'cse'),
(37, '15CS140', 'PRIYADHARSHINI N', 'priyanat67@gmail.com', '', 'cse'),
(38, '15CS141', 'RABIA ZAHERA ABDUL USMANI', 'rzausmani@gmail.com', '', 'cse'),
(39, '15CS142', 'RAJAVELU S', 'rajavelu96666@gmail.com', '', 'cse'),
(40, '15CS143', 'RASINENI GNANESH', 'rasinenignanesh@gmail.com', '11229', 'cse'),
(41, '15CS144', 'RATHNAPRIYA M', 'vinumayaraman1997@gmail.com', '', 'cse'),
(42, '15CS145', 'ROHIT MAPAKSHI', 'rohitmapakshi@gmail.com', '45291', 'cse'),
(43, '15CS146', 'ROSHINI N', 'suwetharavi37@gmail.com', '', 'cse'),
(44, '15CS147', 'RUSSO RICKSON B', 'russorickson831@gmail.com', '36990', 'cse'),
(45, '15CS148', 'SAHITHYA J', 'sahijagannathan@gmail.com', '', 'cse'),
(46, '15CS149', 'SANTHIYA D', 'san81thiya@gmail.com', '', 'cse'),
(47, '15CS150', 'SRIVIDHYA G', 'srividya446@gmail.com', '', 'cse'),
(48, '15CS151', 'SURUTHI S', 'suruthi1197@gmail.com', '', 'cse'),
(49, '15CS152', 'SUVADHI KUMAR V', 'suvadhi.v@gmail.com', '', 'cse'),
(50, '15CS153', 'VICTORIA SANJANA PRIYADHARSHINI J', 'sanooj9398@gmail.com', '', 'cse'),
(51, '15CS155', 'VIJAY T', 'vijay22081998@gmail.com', '', 'cse'),
(52, '15CS156', 'VISHNU CK', 'vishnuck94@gmail.com', '', 'cse'),
(53, '15EC146', 'SAM BENJAMIN PRAGASAM P', 'sambenjaminjsc@gmail.com', '', 'cse'),
(54, '15EI126', 'MANASI RAKHECHA N', 'manasirk09@gmail.com', '', 'cse'),
(55, '15EI152', 'SWATHY M', 'mswat97@gmail.com', '', 'cse'),
(56, '15IT103', 'ANUSHA A', 'anushaandhan18@gmail.com', '', 'cse'),
(57, '15IT125', 'PRADEEP R', 'pradeep91197@gmail.com', '', 'cse'),
(58, '15IT137', 'SALONI SETHI P', 'payalsalu@gmail.com', '', 'cse'),
(59, '15IT138', 'SANGEETHA M', 'sam19riya@gmail.com', '', 'cse'),
(60, '15ME101', 'ADITYA M R', 'adithyaramesh243@gmail.com', '', 'cse'),
(61, 'admin', 'Admin', 'rohitmapakshi@gmail.com', '89800', 'Pec');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`bus_id`);

--
-- Indexes for table `pass`
--
ALTER TABLE `pass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pass`
--
ALTER TABLE `pass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
