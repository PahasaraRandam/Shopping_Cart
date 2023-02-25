-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2023 at 02:27 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `email`, `password`, `img`) VALUES
(1, 'Sukumala', 'Okitha', 'admin@gmail.com', '123', '7.png'),
(2, 'Sulakshana', 'rathnapala', 'admin2@gmail.com', '123', '7.png');

-- --------------------------------------------------------

--
-- Table structure for table `cmp_user`
--

CREATE TABLE `cmp_user` (
  `id` int(5) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(25) NOT NULL,
  `last_login` datetime NOT NULL,
  `img` varchar(200) NOT NULL,
  `is_deleted` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cmp_user`
--

INSERT INTO `cmp_user` (`id`, `first_name`, `last_name`, `email`, `password`, `last_login`, `img`, `is_deleted`) VALUES
(1, 'pahasara', 'randam', 'pahasara@gmail.com', '123', '2023-02-23 23:41:55', '3.png', 0),
(2, 'lakmal', 'fernando', 'aththaKiyanasathyapala@gmail.com', '123', '2023-02-25 17:42:49', '8.png', 0),
(3, 'sanduwa', 'fernando', 'anuki@gmail.com', '123', '0000-00-00 00:00:00', '9.png', 0),
(4, 'Sasanka', 'Kumara', 'Sasanka@gmail.com', '123', '0000-00-00 00:00:00', '2.png', 0),
(5, 'Disura', 'Ruwanpathirana', 'disura@gmail.com', '123', '0000-00-00 00:00:00', '7.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `shopping_user`
--

CREATE TABLE `shopping_user` (
  `id` int(5) NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `description` varchar(400) NOT NULL,
  `img` varchar(200) NOT NULL,
  `price` int(10) NOT NULL,
  `category` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shopping_user`
--

INSERT INTO `shopping_user` (`id`, `item_name`, `email`, `description`, `img`, `price`, `category`) VALUES
(1, 'Spider Man', 'aththaKiyanasathyapala@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae dolores similique repellendus illum at velit non, placeat eius fugit, error molestias in cumque, qui vitae repudiandae molestiae magni laudantium quas.', 'spiderman.jpg', 200, 'Toys'),
(2, 'Batman', 'aththaKiyanasathyapala@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae dolores similique repellendus illum at velit non, placeat eius fugit, error molestias in cumque, qui vitae repudiandae molestiae magni laudantium quas.', 'batman.jpg', 200, 'Toy'),
(3, 'SupperMan', 'aththaKiyanasathyapala@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae dolores similique repellendus illum at velit non, placeat eius fugit, error molestias in cumque, qui vitae repudiandae molestiae magni laudantium quas.', 'superman.jpg', 199, 'Toy'),
(4, 'Teady', 'aththaKiyanasathyapala@gmail.com', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam sit ut, et, explicabo modi sequi quaerat fugiat in aut obcaecati dolores at? Adipisci, dolores minima.', 'bears.jpg', 200, 'Teady'),
(5, 'Teady', 'aththaKiyanasathyapala@gmail.com', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam sit ut, et, explicabo modi sequi quaerat fugiat in aut obcaecati dolores at? Adipisci, dolores minima.', 'teady.jfif', 200, 'Teady'),
(6, 'Black Panther', 'aththaKiyanasathyapala@gmail.com', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam sit ut, et, explicabo modi sequi quaerat fugiat in aut obcaecati dolores at? Adipisci, dolores minima.', 'black_panther.jpg', 200, 'Toy'),
(7, 'Iron Man', 'pahasara@gmail.com', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam sit ut, et, explicabo modi sequi quaerat fugiat in aut obcaecati dolores at? Adipisci, dolores minima.', 'ironman.jfif', 300, 'Toy'),
(8, 'Puppy', 'pahasara@gmail.com', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam sit ut, et, explicabo modi sequi quaerat fugiat in aut obcaecati dolores at? Adipisci, dolores minima.', 'puppy.jfif', 199, 'Puppy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cmp_user`
--
ALTER TABLE `cmp_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopping_user`
--
ALTER TABLE `shopping_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cmp_user`
--
ALTER TABLE `cmp_user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shopping_user`
--
ALTER TABLE `shopping_user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
