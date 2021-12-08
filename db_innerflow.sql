-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2021 at 02:55 PM
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
(2, 'Trabar', '      Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat nulla quae laborum sed. Dicta nam quisquam eius ad, cupiditate amet debitis, quo ut facilis quasi assumenda perspiciatis. Sit quia, in nemo cupiditate tempore, porro necessitatibus, sunt numquam nostrum ratione aliquam rem. Unde quibusdam ut harum impedit natus nemo corporis, dolorum quasi nulla ex! Cumque iure illum voluptatum porro voluptate rem explicabo neque repellendus mollitia possimus fugit assumenda dolorem odio necessitatibus illo quo quos laboriosam, nesciunt animi similique deserunt quae expedita. Et ex sequi quis consectetur aliquam recusandae similique adipisci numquam aspernatur maiores aperiam ab optio voluptatum, corporis repellat, rerum ipsa quos possimus! Autem officia, quae quisquam porro voluptates soluta neque quis, excepturi magnam eveniet, eum veniam harum minus repellat minima at? Minima obcaecati nobis odio earum et deleniti reprehenderit omnis consequatur vitae eius, pariatur a voluptatibus, non neque quaerat laudantium asperiores corporis fuga, aliquam est modi odit iure. Exercitationem deserunt, perferendis, eaque nam tempore ullam nesciunt delectus ratione iure et sint iste quisquam. Corporis nobis labore delectus quos deleniti magni quas quam deserunt sapiente! Voluptates voluptate consectetur impedit nihil ea, ab suscipit hic quae repudiandae beatae labore quaerat voluptatibus possimus inventore sit quo nesciunt itaque architecto, tempora, cupiditate maiores sapiente ex adipisci odio. Quam tempora possimus quia laborum atque veritatis eius a suscipit nihil, delectus rerum blanditiis aperiam aliquam esse obcaecati quibusdam sit exercitationem. Ducimus fugit repellat consequatur exercitationem cupiditate, qui possimus unde tempore fugiat! Rerum excepturi aliquid culpa temporibus sapiente ea quam voluptatum? Itaque, corporis repellat ratione sint quas fuga laboriosam officiis adipisci laborum earum impedit quam inventore. At iure atque optio laudantium alias ea! Dolorem quaerat exercitationem eligendi labore, numquam ab tempora, molestiae quod delectus saepe temporibus animi voluptas, veniam laudantium obcaecati eaque nam. Eius, consequatur aut? Quis esse sapiente alias quo nam porro omnis fugit. Debitis, velit?\n      Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat nulla quae laborum sed. Dicta nam quisquam eius ad, cupiditate amet debitis, quo ut facilis quasi assumenda perspiciatis. Sit quia, in nemo cupiditate tempore, porro necessitatibus, sunt numquam nostrum ratione aliquam rem. Unde quibusdam ut harum impedit natus nemo corporis, dolorum quasi nulla ex! Cumque iure illum voluptatum porro voluptate rem explicabo neque repellendus mollitia possimus fugit assumenda dolorem odio necessitatibus illo quo quos laboriosam, nesciunt animi similique deserunt quae expedita. Et ex sequi quis consectetur aliquam recusandae similique adipisci numquam aspernatur maiores aperiam ab optio voluptatum, corporis repellat, rerum ipsa quos possimus! Autem officia, quae quisquam porro voluptates soluta neque quis, excepturi magnam eveniet, eum veniam harum minus repellat minima at? Minima obcaecati nobis odio earum et deleniti reprehenderit omnis consequatur vitae eius, pariatur a voluptatibus, non neque quaerat laudantium asperiores corporis fuga, aliquam est modi odit iure. Exercitationem deserunt, perferendis, eaque nam tempore ullam nesciunt delectus ratione iure et sint iste quisquam. Corporis nobis labore delectus quos deleniti magni quas quam deserunt sapiente! Voluptates voluptate consectetur impedit nihil ea, ab suscipit hic quae repudiandae beatae labore quaerat voluptatibus possimus inventore sit quo nesciunt itaque architecto, tempora, cupiditate maiores sapiente ex adipisci odio. Quam tempora possimus quia laborum atque veritatis eius a suscipit nihil, delectus rerum blanditiis aperiam aliquam esse obcaecati quibusdam sit exercitationem. Ducimus fugit repellat consequatur exercitationem cupiditate, qui possimus unde tempore fugiat! Rerum excepturi aliquid culpa temporibus sapiente ea quam voluptatum? Itaque, corporis repellat ratione sint quas fuga laboriosam officiis adipisci laborum earum impedit quam inventore. At iure atque optio laudantium alias ea! Dolorem quaerat exercitationem eligendi labore, numquam ab tempora, molestiae quod delectus saepe temporibus animi voluptas, veniam laudantium obcaecati eaque nam. Eius, consequatur aut? Quis esse sapiente alias quo nam porro omnis fugit. Debitis, velit?\n      Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellat nulla quae laborum sed. Dicta nam quisquam eius ad, cupiditate amet debitis, quo ut facilis quasi assumenda perspiciatis. Sit quia, in nemo cupiditate tempore, porro necessitatibus, sunt numquam nostrum ratione aliquam rem. Unde quibusdam ut harum impedit natus nemo corporis, dolorum quasi nulla ex! Cumque iure illum voluptatum porro voluptate rem explicabo neque repellendus mollitia possimus fugit assumenda dolorem odio necessitatibus illo quo quos laboriosam, nesciunt animi similique deserunt quae expedita. Et ex sequi quis consectetur aliquam recusandae similique adipisci numquam aspernatur maiores aperiam ab optio voluptatum, corporis repellat, rerum ipsa quos possimus! Autem officia, quae quisquam porro voluptates soluta neque quis, excepturi magnam eveniet, eum veniam harum minus repellat minima at? Minima obcaecati nobis odio earum et deleniti reprehenderit omnis consequatur vitae eius, pariatur a voluptatibus, non neque quaerat laudantium asperiores corporis fuga, aliquam est modi odit iure. Exercitationem deserunt, perferendis, eaque nam tempore ullam nesciunt delectus ratione iure et sint iste quisquam. Corporis nobis labore delectus quos deleniti magni quas quam deserunt sapiente! Voluptates voluptate consectetur impedit nihil ea, ab suscipit hic quae repudiandae beatae labore quaerat voluptatibus possimus inventore sit quo nesciunt itaque architecto, tempora, cupiditate maiores sapiente ex adipisci odio. Quam tempora possimus quia laborum atque veritatis eius a suscipit nihil, delectus rerum blanditiis aperiam aliquam esse obcaecati quibusdam sit exercitationem. Ducimus fugit repellat consequatur exercitationem cupiditate, qui possimus unde tempore fugiat! Rerum excepturi aliquid culpa temporibus sapiente ea quam voluptatum? Itaque, corporis repellat ratione sint quas fuga laboriosam officiis adipisci laborum earum impedit quam inventore. At iure atque optio laudantium alias ea! Dolorem quaerat exercitationem eligendi labore, numquam ab tempora, molestiae quod delectus saepe temporibus animi voluptas, veniam laudantium obcaecati eaque nam. Eius, consequatur aut? Quis esse sapiente alias quo nam porro omnis fugit. Debitis, velit?\nLorem ipsum dolor sit amet consectetur adipisicing elit. Itaque non repellendus consequuntur? Sit libero reprehenderit similique cumque. Aperiam, totam facere at, iste, vel ullam temporibus voluptate dignissimos sapiente minima assumenda cum iusto suscipit numquam in accusamus harum voluptatum saepe? Expedita deserunt quam dolores suscipit rerum, voluptates unde neque. Eum dicta rerum velit quasi minus harum eveniet totam non. Ipsa dolore illo vel excepturi voluptatem repellendus facilis quidem atque aliquid perferendis reprehenderit perspiciatis adipisci rerum, laboriosam error, consequatur tenetur dignissimos corrupti quo veniam. Deserunt, explicabo animi exercitationem aut, deleniti similique dicta delectus dolore quod asperiores iste quae, adipisci suscipit illum inventore iure? Facilis aspernatur, nisi dignissimos consequatur molestiae debitis modi ea eos, sunt distinctio impedit illo consectetur nulla assumenda suscipit ab reiciendis aut rerum ipsa. Saepe a quaerat quae distinctio voluptatum facere perspiciatis reiciendis ea! Enim maxime nemo odio dignissimos, reprehenderit et officia, quas libero quidem necessitatibus quo voluptatum dolorum architecto nam. Omnis quae hic sit voluptates iusto deserunt ex placeat soluta ratione rem? Necessitatibus eum magni accusamus provident. Dolore eos fugit minima distinctio possimus reprehenderit voluptate earum qui, eaque inventore, aspernatur dolorum quisquam quo? Accusamus ipsum ipsam suscipit voluptatum dignissimos quibusdam molestias mollitia architecto, ad blanditiis fugit harum quaerat iure sapiente, id eveniet a. Sequi accusamus numquam minima dolor tenetur odio repellat voluptas ut, accusantium laboriosam veniam eius, suscipit voluptatibus pariatur rerum facilis quia architecto quaerat blanditiis molestias facere esse quasi. Ipsam, rem recusandae, dolorum totam quaerat, tempora esse maxime doloribus magnam enim sint. Libero facere repudiandae consequatur recusandae? Officia, optio, ratione, voluptates fugiat deleniti quo repudiandae amet odit dolores dignissimos et perferendis voluptatum molestiae velit quia consequatur dolore itaque sed aperiam cum voluptatem. Id laudantium neque voluptate officiis reiciendis enim omnis dolorum soluta. Nulla vitae iure, laborum eum eveniet voluptatibus libero laboriosam laudantium possimus, quas, quos nesciunt praesentium asperiores.\nLorem ipsum dolor sit amet consectetur adipisicing elit. Itaque non repellendus consequuntur? Sit libero reprehenderit similique cumque. Aperiam, totam facere at, iste, vel ullam temporibus voluptate dignissimos sapiente minima assumenda cum iusto suscipit numquam in accusamus harum voluptatum saepe? Expedita deserunt quam dolores suscipit rerum, voluptates unde neque. Eum dicta rerum velit quasi minus harum eveniet totam non. Ipsa dolore illo vel excepturi voluptatem repellendus facilis quidem atque aliquid perferendis reprehenderit perspiciatis adipisci rerum, laboriosam error, consequatur tenetur dignissimos corrupti quo veniam. Deserunt, explicabo animi exercitationem aut, deleniti similique dicta delectus dolore quod asperiores iste quae, adipisci suscipit illum inventore iure? Facilis aspernatur, nisi dignissimos consequatur molestiae debitis modi ea eos, sunt distinctio impedit illo consectetur nulla assumenda suscipit ab reiciendis aut rerum ipsa. Saepe a quaerat quae distinctio voluptatum facere perspiciatis reiciendis ea! Enim maxime nemo odio dignissimos, reprehenderit et officia, quas libero quidem necessitatibus quo voluptatum dolorum architecto nam. Omnis quae hic sit voluptates iusto deserunt ex placeat soluta ratione rem? Necessitatibus eum magni accusamus provident. Dolore eos fugit minima distinctio possimus reprehenderit voluptate earum qui, eaque inventore, aspernatur dolorum quisquam quo? Accusamus ipsum ipsam suscipit voluptatum dignissimos quibusdam molestias mollitia architecto, ad blanditiis fugit harum quaerat iure sapiente, id eveniet a. Sequi accusamus numquam minima dolor tenetur odio repellat voluptas ut, accusantium laboriosam veniam eius, suscipit voluptatibus pariatur rerum facilis quia architecto quaerat blanditiis molestias facere esse quasi. Ipsam, rem recusandae, dolorum totam quaerat, tempora esse maxime doloribus magnam enim sint. Libero facere repudiandae consequatur recusandae? Officia, optio, ratione, voluptates fugiat deleniti quo repudiandae amet odit dolores dignissimos et perferendis voluptatum molestiae velit quia consequatur dolore itaque sed aperiam cum voluptatem. Id laudantium neque voluptate officiis reiciendis enim omnis dolorum soluta. Nulla vitae iure, laborum eum eveniet voluptatibus libero laboriosam laudantium possimus, quas, quos nesciunt praesentium asperiores.\n\nLorem ipsum dolor sit amet consectetur adipisicing elit. Itaque non repellendus consequuntur? Sit libero reprehenderit similique cumque. Aperiam, totam facere at, iste, vel ullam temporibus voluptate dignissimos sapiente minima assumenda cum iusto suscipit numquam in accusamus harum voluptatum saepe? Expedita deserunt quam dolores suscipit rerum, voluptates unde neque. Eum dicta rerum velit quasi minus harum eveniet totam non. Ipsa dolore illo vel excepturi voluptatem repellendus facilis quidem atque aliquid perferendis reprehenderit perspiciatis adipisci rerum, laboriosam error, consequatur tenetur dignissimos corrupti quo veniam. Deserunt, explicabo animi exercitationem aut, deleniti similique dicta delectus dolore quod asperiores iste quae, adipisci suscipit illum inventore iure? Facilis aspernatur, nisi dignissimos consequatur molestiae debitis modi ea eos, sunt distinctio impedit illo consectetur nulla assumenda suscipit ab reiciendis aut rerum ipsa. Saepe a quaerat quae distinctio voluptatum facere perspiciatis reiciendis ea! Enim maxime nemo odio dignissimos, reprehenderit et officia, quas libero quidem necessitatibus quo voluptatum dolorum architecto nam. Omnis quae hic sit voluptates iusto deserunt ex placeat soluta ratione rem? Necessitatibus eum magni accusamus provident. Dolore eos fugit minima distinctio possimus reprehenderit voluptate earum qui, eaque inventore, aspernatur dolorum quisquam quo? Accusamus ipsum ipsam suscipit voluptatum dignissimos quibusdam molestias mollitia architecto, ad blanditiis fugit harum quaerat iure sapiente, id eveniet a. Sequi accusamus numquam minima dolor tenetur odio repellat voluptas ut, accusantium laboriosam veniam eius, suscipit voluptatibus pariatur rerum facilis quia architecto quaerat blanditiis molestias facere esse quasi. Ipsam, rem recusandae, dolorum totam quaerat, tempora esse maxime doloribus magnam enim sint. Libero facere repudiandae consequatur recusandae? Officia, optio, ratione, voluptates fugiat deleniti quo repudiandae amet odit dolores dignissimos et perferendis voluptatum molestiae velit quia consequatur dolore itaque sed aperiam cum voluptatem. Id laudantium neque voluptate officiis reiciendis enim omnis dolorum soluta. Nulla vitae iure, laborum eum eveniet voluptatibus libero laboriosam laudantium possimus, quas, quos nesciunt praesentium asperiores.', 'Trading', '1638887337', 1, 1),
(3, 'cryptocurrentcy era 4.0', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus dicta praesentium corrupti similique consectetur fugiat, odit adipisci quis animi dolore quos reprehenderit. Totam, corrupti possimus.\r\n', 'Cryptocurrency', '1638890131', 0, 2),
(5, 'Seminar Trading 4.0', '\nLorem ipsum dolor sit amet consectetur adipisicing elit. Itaque non repellendus consequuntur? Sit libero reprehenderit similique cumque. Aperiam, totam facere at, iste, vel ullam temporibus voluptate dignissimos sapiente minima assumenda cum iusto suscipit numquam in accusamus harum voluptatum saepe? Expedita deserunt quam dolores suscipit rerum, voluptates unde neque. Eum dicta rerum velit quasi minus harum eveniet totam non. Ipsa dolore illo vel excepturi voluptatem repellendus facilis quidem atque aliquid perferendis reprehenderit perspiciatis adipisci rerum, laboriosam error, consequatur tenetur dignissimos corrupti quo veniam. Deserunt, explicabo animi exercitationem aut, deleniti similique dicta delectus dolore quod asperiores iste quae, adipisci suscipit illum inventore iure? Facilis aspernatur, nisi dignissimos consequatur molestiae debitis modi ea eos, sunt distinctio impedit illo consectetur nulla assumenda suscipit ab reiciendis aut rerum ipsa. Saepe a quaerat quae distinctio voluptatum facere perspiciatis reiciendis ea! Enim maxime nemo odio dignissimos, reprehenderit et officia, quas libero quidem necessitatibus quo voluptatum dolorum architecto nam. Omnis quae hic sit voluptates iusto deserunt ex placeat soluta ratione rem? Necessitatibus eum magni accusamus provident. Dolore eos fugit minima distinctio possimus reprehenderit voluptate earum qui, eaque inventore, aspernatur dolorum quisquam quo? Accusamus ipsum ipsam suscipit voluptatum dignissimos quibusdam molestias mollitia architecto, ad blanditiis fugit harum quaerat iure sapiente, id eveniet a. Sequi accusamus numquam minima dolor tenetur odio repellat voluptas ut, accusantium laboriosam veniam eius, suscipit voluptatibus pariatur rerum facilis quia architecto quaerat blanditiis molestias facere esse quasi. Ipsam, rem recusandae, dolorum totam quaerat, tempora esse maxime doloribus magnam enim sint. Libero facere repudiandae consequatur recusandae? Officia, optio, ratione, voluptates fugiat deleniti quo repudiandae amet odit dolores dignissimos et perferendis voluptatum molestiae velit quia consequatur dolore itaque sed aperiam cum voluptatem. Id laudantium neque voluptate officiis reiciendis enim omnis dolorum soluta. Nulla vitae iure, laborum eum eveniet voluptatibus libero laboriosam laudantium possimus, quas, quos nesciunt praesentium asperiores.', 'Trading', '1638960014', 1, 1);

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
