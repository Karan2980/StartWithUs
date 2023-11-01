-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2023 at 06:47 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reglog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('ramesh@gmail.com', '143');

-- --------------------------------------------------------

--
-- Table structure for table `consultant`
--

CREATE TABLE `consultant` (
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consultant`
--

INSERT INTO `consultant` (`email`, `password`) VALUES
('sanjay@gmail.com', '123'),
('kiran@gmail.com', '123'),
('genima@gmail.com', '123'),
('soman@gmail.com', '123'),
('ishaan@gmail.com', '123'),
('niraj@gmail.com', '123'),
('abhay@gmail.com', '123'),
('kripa@gmail.com', '123'),
('dhruv@gmail.com', '123'),
('jay@gmail.com', '123'),
('anjali@gmail.com', '123'),
('jaya@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `consultant1`
--

CREATE TABLE `consultant1` (
  `id` int(11) NOT NULL,
  `Name` varchar(75) NOT NULL,
  `type` varchar(75) NOT NULL,
  `satisfaction` int(11) NOT NULL,
  `Work` int(11) NOT NULL,
  `image` tinyint(1) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consultant1`
--

INSERT INTO `consultant1` (`id`, `Name`, `type`, `satisfaction`, `Work`, `image`, `description`) VALUES
(1, 'Vikas Narayan', 'IT', 90, 4, 0, ''),
(2, 'Sonali Nayak', 'IT', 95, 5, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `consultant` varchar(75) NOT NULL,
  `consultant_email` varchar(100) NOT NULL,
  `transaction_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `name`, `email`, `amount`, `consultant`, `consultant_email`, `transaction_id`) VALUES
(7, 'Karan', 'gloria@gmail.com', 500, 'sanjay', 'sanjay@gmail.com', 12112134),
(8, 'glori', 'karan@gmail.com', 500, 'sanjay', 'sanjay@gmail.com', 9876541),
(9, 'Karan', 'karan@gmail.com', 4000, 'sanjay', 'sanjay@gmail.com', 9876547),
(10, 'Karan', 'karan@gmail.com', 4000, 'sanjay', 'sanjay@gmail.com', 9876547),
(11, 'kim', 'kim@gmail.com', 4000, 'sanjay', 'sanjay@gmail.com', 12112133),
(12, 'kim', 'kim@gmail.com', 4000, 'sanjay', 'sanjay@gmail.com', 12112133);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `name` varchar(75) NOT NULL,
  `email` varchar(75) NOT NULL,
  `rating` int(50) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `consultant_name` varchar(75) NOT NULL,
  `consultant_email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `email`, `rating`, `comment`, `consultant_name`, `consultant_email`, `created_at`) VALUES
(1, 'kim', 'Nmailaram@gmail.com', 4, 'good', 'sanjay', 'sanjay@gmail.com', '2023-10-27 18:54:05'),
(2, 'kim', 'Nmailaram@gmail.com', 4, 'good', 'sanjay', 'sanjay@gmail.com', '2023-10-27 18:58:01'),
(3, 'kim', 'Nmailaram@gmail.com', 4, 'good', 'sanjay', 'sanjay@gmail.com', '2023-10-27 18:59:56');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` int(100) NOT NULL,
  `password` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consultant1`
--
ALTER TABLE `consultant1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consultant1`
--
ALTER TABLE `consultant1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
