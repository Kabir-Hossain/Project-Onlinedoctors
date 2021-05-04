-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2018 at 05:42 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cpro_00159125`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bid` int(4) NOT NULL,
  `did` int(4) NOT NULL,
  `doctor` text NOT NULL,
  `uname` text NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `number` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bid`, `did`, `doctor`, `uname`, `date`, `time`, `number`) VALUES
(17, 8, 'Professor Dr. Fazlul Hoque', 'Kabir', '2018-04-27', '09:00-09:30', 1747060854),
(18, 13, 'Professor Dr. Lutful Kabir', 'Kabir Hussain', '2018-05-11', '09:00-09:30', 1747060854),
(19, 13, 'Professor Dr. Lutful Kabir', 'Kabir Hussain', '2018-04-28', '08:00-08:30', 1747060854),
(20, 9, 'Professor Dr. H A M Nazmul Ahsan', 'Kabir Hussain', '2018-05-15', '11:00-11:30', 1747060854),
(21, 13, 'Professor Dr. Lutful Kabir', 'MD Kabir Hussain', '2018-04-28', '09:30-10:00', 1915353289),
(22, 11, 'Professor Dr. Ferdous Ara J. Janan', 'Kabir Hussain', '2018-04-28', '10:30-11:00', 1747060854);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(6) NOT NULL,
  `drname` varchar(100) NOT NULL,
  `degree` varchar(100) NOT NULL,
  `speciality` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `dateofbirth` varchar(10) NOT NULL,
  `gender` text NOT NULL,
  `address` varchar(300) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `checked` int(11) NOT NULL DEFAULT '0' COMMENT '0 uncheck, 1 approved'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `drname`, `degree`, `speciality`, `email`, `mobile`, `dateofbirth`, `gender`, `address`, `password`, `image`, `checked`) VALUES
(8, 'Professor Dr. Fazlul Hoque', 'MBBS, FCPS, FRCP ( Edinburgh )', 'Dermatologist', 'fazlul@gmail.com', '880 1715153935', '1973-02-19', 'Male', 'Dhaka Medical College & Hospital', '202cb962ac59075b964b07152d234b70', '20180427192920_Prof.dr.Akmfazlulhaque.jpg', 1),
(9, 'Professor Dr. H A M Nazmul Ahsan', 'MBBS, FCPS, FRCP (Glasgow) ', 'Medicine', 'ham@gmail.com', '96614913', '1972-02-02', 'Male', 'Popular Diagnostic Centre Ltd', '202cb962ac59075b964b07152d234b70', '20180424204812_Dr_Bala-Murali.jpg', 0),
(10, 'Dr. Abdul Hamid', 'MBBS, DTCD, MRIT', 'Neurologist', 'abdul@gmail.com', '9124436', '1973-03-08', 'Male', 'City Hospital Ltd.', '202cb962ac59075b964b07152d234b70', '20180424205104_1471429311_2_Prof Anisur Rahman.jpg', 1),
(11, 'Professor Dr. Ferdous Ara J. Janan', 'MBBS, MD ( USA ), FRCP ( Edin. ), FACP ( USA )', 'Medicine', 'ferdous@gmal.com', '880-2- 9111911', '1985-04-15', 'Female', 'Popular Diagnostic Centre Ltd.', '202cb962ac59075b964b07152d234b70', '20180424205616_ferdous.jpg', 1),
(12, 'Prof. Dr. Sharifun Nahar', 'MBBS, MS(Ortho)', 'Orthopaedic Surgeon', 'sharifun@gmail.com', '01915353289', '1976-03-26', 'Female', 'Monowara Hospital (Pvt) Ltd', '202cb962ac59075b964b07152d234b70', '20180424210131_sharifun.jpg', 1),
(13, 'Professor Dr. Lutful Kabir', 'MBBS, FRCP ( UK )', 'Medicine', 'kabir@gmail.com', '01915353289', '1976-03-13', 'Male', 'Bangladesh Medical College & Hospital', '202cb962ac59075b964b07152d234b70', '20180424210433_kabir.jpg', 1),
(14, 'Dr Asif Akber', 'MBBS, FCPS, MS', 'Medicine', 'asifali@gmail.com', '01534353647', '1988-12-19', 'Male', 'Kolabagan, Dhaka', '202cb962ac59075b964b07152d234b70', '20180428000954_doctor-img2.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(14) NOT NULL,
  `date` varchar(12) NOT NULL,
  `gender` text NOT NULL,
  `address` varchar(300) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `role` int(5) NOT NULL DEFAULT '1' COMMENT '0-Admin, 1-User'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `date`, `gender`, `address`, `pass`, `role`) VALUES
(1, 'Admin', 'admin@daffodil.ac', '01747060854', '12-16-1996', 'Male', '47/A Panthapath, Dhaka', '202cb962ac59075b964b07152d234b70', 0),
(2, 'Konok', 'konok@gmail.com', '01747060854', '12/03/2017', 'Male', '47/A Panthapath, Dhaka', '202cb962ac59075b964b07152d234b70', 1),
(6, 'Kabir Hussain', '313@daffodil.ac', '01747060854', '1996-12-16', 'Male', '47/A Panthapath, Dhaka', '202cb962ac59075b964b07152d234b70', 1),
(7, 'Inan Hasan', 'bmhasan14@gmail.com', '01620902709', '01/05/1996', 'Male', 'madaripur', '9f36407ead0629fc166f14dde7970f68', 1),
(12, 'Jahid Hasan', 'jahid01611122216@gmail.com', '01611122216', '1995-11-29', 'Male', '44/8, Panthapath, Dhaka', '202cb962ac59075b964b07152d234b70', 1),
(13, 'Kabir Hussain', 'kabbirs96@gmail.com', '01747060854', '1996-12-16', 'Male', '44/8, Panthapath, Dhaka', '202cb962ac59075b964b07152d234b70', 1),
(14, 'MD Kabir Hussain', '1000313@daffodil.ac', '01915353289', '1996-12-16', 'Male', '44/8 Panthapath Dhaka', '202cb962ac59075b964b07152d234b70', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
