-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2021 at 04:30 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_innerflow`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_menu`
--

CREATE TABLE `access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `list_menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `access_menu`
--

INSERT INTO `access_menu` (`id`, `role_id`, `list_menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `content` text NOT NULL,
  `category` varchar(128) NOT NULL,
  `date_created` text NOT NULL,
  `status` int(128) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `title`, `content`, `category`, `date_created`, `status`, `user_id`) VALUES
(2, 'Trabar', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus dicta praesentium corrupti similique consectetur fugiat, odit adipisci quis animi dolore quos reprehenderit. Totam, corrupti possimus.', 'Trading', '1638887337', 1, 1),
(3, 'cryptocurrentcy era 4.0', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus dicta praesentium corrupti similique consectetur fugiat, odit adipisci quis animi dolore quos reprehenderit. Totam, corrupti possimus.\r\n', 'Cryptocurrency', '1638890131', 0, 2),
(5, 'Seminar Trading 4.0', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus dicta praesentium corrupti similique consectetur fugiat, odit adipisci quis animi dolore quos reprehenderit. Totam, corrupti possimus.', 'Trading', '1638890762', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `list_menu`
--

CREATE TABLE `list_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list_menu`
--

INSERT INTO `list_menu` (`id`, `menu`) VALUES
(1, 'admin'),
(2, 'member');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'member');

-- --------------------------------------------------------

--
-- Table structure for table `sub_menu`
--

CREATE TABLE `sub_menu` (
  `id` int(11) NOT NULL,
  `sub_menu` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `is_active` int(11) NOT NULL,
  `list_menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_menu`
--

INSERT INTO `sub_menu` (`id`, `sub_menu`, `icon`, `url`, `is_active`, `list_menu_id`) VALUES
(1, 'profile', 'fa fa-fw fa-user', 'Member/profile', 1, 2),
(2, 'events', 'fas fa-fw fa-bullhorn', 'Member/event', 1, 2),
(3, 'materi', 'fas fa-fw fa-folder', 'Member/materi', 1, 2),
(4, 'home', 'fas fa-fw fa-fire', 'Administrator/index', 1, 1),
(5, 'users', 'fas fa-fw fa-users', 'Administrator/manageUser', 1, 1),
(6, 'materi', 'fas fa-fw fa-folder', 'Administrator/manageMateri', 1, 1),
(7, 'events', 'fas fa-fw fa-bullhorn', 'Administrator/manageEvent', 1, 1),
(8, 'role access', 'fas fa-fw fa-tasks', 'Administrator/manageRole', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `image` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `role` int(13) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `phone`, `image`, `description`, `role`, `is_active`) VALUES
(1, 'habib al bay', 'emzob30@gmail.com', '$2y$10$vUu3Q6duk.cHRS1o.vbhcuNktnNgzZJXZxVqTZo8hV5qGKAIHB/h6', '0881036881755', 'avatar-1.png', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugit ipsam eum tempore laboriosam aut nemo sunt fugiat? Ipsam pariatur ipsum laboriosam vitae adipisci aliquam soluta?', 1, 1),
(2, 'indy ramadhan ', 'indy@gmail.com', '$2y$10$UxZwh0kXb5Mnwnia.ox/WOjgIWVmIkBXk3lgBQO1cOIftHKh2xgAK', '089776523234', 'avatar-1.png', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugit ipsam eum tempore laboriosam aut nemo sunt fugiat? Ipsam pariatur ipsum laboriosam vitae adipisci aliquam soluta?', 2, 1),
(3, 'tomi', '2@gmail.com', '$2y$10$MT9IAt4C3m.KwMcCNI3P/e77D6zEC97iT.Qj6v4ie1.NhrR8aXZhW', '0881036881755', 'avatar-1.png', '      Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum possimus dignissimos ad eius atque recusandae iure reprehenderit assumenda maiores ab nulla non id eveniet deserunt quisquam velit quam sunt, optio minima vitae suscipit praesentium! Perspiciatis quaerat maiores illum earum at.', 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_menu`
--
ALTER TABLE `access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_menu`
--
ALTER TABLE `list_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_menu`
--
ALTER TABLE `access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `list_menu`
--
ALTER TABLE `list_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
