-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Des 2021 pada 20.28
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.9

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
-- Struktur dari tabel `access_menu`
--

CREATE TABLE `access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `list_menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `access_menu`
--

INSERT INTO `access_menu` (`id`, `role_id`, `list_menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(16, 3, 2),
(30, 1, 2),
(31, 1, 3),
(32, 2, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `Description` varchar(128) NOT NULL,
  `content` text NOT NULL,
  `category` varchar(128) NOT NULL,
  `date_created` text NOT NULL,
  `image` varchar(123) NOT NULL,
  `status` int(128) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id`, `title`, `Description`, `content`, `category`, `date_created`, `image`, `status`, `user_id`) VALUES
(1, 'Meet Up Mentor', 'askdjlsadjlksjdlsadksadkbsaklflsakbflkbf', '<p><strong>asdsadsadsfasfsaf</strong></p>\r\n', 'Trading', '1640602231', 'memphis-slide-2016.png', 1, 1),
(2, 'tes', 'tes', '<p>asd</p>\r\n', 'Trading', '1640633081', 'wp1932920-memphis-may-fire-wallpapers.jpg', 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_menu`
--

CREATE TABLE `list_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `list_menu`
--

INSERT INTO `list_menu` (`id`, `menu`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'Vip');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `file` varchar(128) NOT NULL,
  `category` varchar(128) NOT NULL,
  `date_created` varchar(128) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id`, `title`, `file`, `category`, `date_created`, `status`) VALUES
(1, 'tes', 'Laporan_Sementara.pdf', 'Trading', '1640597029', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'vip'),
(3, 'member');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sosial_media`
--

CREATE TABLE `sosial_media` (
  `id_sosial_media` int(11) NOT NULL,
  `facebook` varchar(128) NOT NULL,
  `twitter` varchar(128) NOT NULL,
  `github` varchar(128) NOT NULL,
  `instagram` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sosial_media`
--

INSERT INTO `sosial_media` (`id_sosial_media`, `facebook`, `twitter`, `github`, `instagram`) VALUES
(1, '', '', '', ''),
(2, '', '', '', ''),
(3, '', '', '', ''),
(4, '', '', 'habibal28', 'al_bayhaqqi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_menu`
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
-- Dumping data untuk tabel `sub_menu`
--

INSERT INTO `sub_menu` (`id`, `sub_menu`, `icon`, `url`, `is_active`, `list_menu_id`) VALUES
(1, 'dashboard', 'fas fa-fw fa-fire', 'Member', 1, 2),
(2, 'profile', 'fa fa-fw fa-user', 'Member/profile', 1, 2),
(3, 'learning', 'fas fa-fw fa-folder', 'Member/materi', 1, 2),
(4, 'home', 'fas fa-fw fa-fire', 'Administrator/index', 1, 1),
(5, 'users', 'fas fa-fw fa-users', 'Administrator/manageUser', 1, 1),
(6, 'learning', 'fas fa-fw fa-folder', 'Administrator/manageMateri/false', 1, 1),
(7, 'events', 'fas fa-fw fa-bullhorn', 'Administrator/manageEvent/false', 1, 1),
(8, 'role access', 'fas fa-fw fa-tasks', 'Administrator/manageRole', 1, 1),
(9, 'events', 'fas fa-fw fa-bullhorn', 'Member/event', 1, 2),
(10, 'videos', 'fab fa-fw fa-youtube', 'Vip/vidio', 1, 3),
(11, 'Trabar & Anabar', 'fab fa-fw fa-meetup', 'Vip/trabarAnabar', 1, 3),
(12, 'join grub VIP', 'fas fa-fw fa-link', 'https://www.t.me/+2JXC5VpFu7lkZWZl', 1, 3),
(13, 'videos', 'fab fa-fw fa-youtube', 'Administrator/manageVidio/false', 1, 1),
(14, 'trabar & anabar', 'fab fa-fw fa-meetup', 'Administrator/manageTrabarAnabar/false', 1, 1),
(15, 'upgrade account', 'fab fa-fw fa-superpowers', 'Member/upgradeAkun', 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `trabaranabar`
--

CREATE TABLE `trabaranabar` (
  `id_trabarAnabar` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `description` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `thumbnail` varchar(128) NOT NULL,
  `date_created` varchar(128) NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `trabaranabar`
--

INSERT INTO `trabaranabar` (`id_trabarAnabar`, `title`, `description`, `content`, `thumbnail`, `date_created`, `status`, `user_id`) VALUES
(1, 'Trabar part II', 'Trabar adalah Trading bareng oleh mentor. ini adlah trabar ke II', '<p><strong>hahahah&nbsp;</strong></p>\r\n', 'live trading.jpg', '1640597051', 1, 1),
(3, 'Merchandise Useless', 'ini adalah Merchandise Useless', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque at ex facilisis, porttitor urna eget, placerat eros. Proin eu dolor sem. Donec eget augue non nibh ullamcorper faucibus. In semper arcu magna, ut tristique arcu volutpat at. Sed in auctor nunc. Fusce vel est sed nunc bibendum rhoncus. Proin quis nunc vitae sem vestibulum rutrum non pharetra libero. Vestibulum commodo fermentum nisi sit amet consequat. Vestibulum euismod molestie velit in hendrerit. Nunc sed turpis venenatis dui sagittis elementum.</p>\r\n\r\n<p>Integer ultrices arcu eget sapien ultricies, et tristique odio semper. Morbi finibus, erat quis interdum tincidunt, nisl massa venenatis mi, eu congue orci ipsum eget eros. Ut porta velit vel felis mattis, et suscipit sem ullamcorper. Aliquam erat volutpat. Quisque placerat a dui feugiat venenatis. Cras ut dolor a nibh tempor vestibulum in at dui. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam nec ante volutpat, pulvinar ex sit amet, finibus nisi. Nunc quis metus purus. Mauris volutpat eros id quam ultrices, id sollicitudin leo rutrum. Quisque scelerisque dolor vitae elit dictum tempus.</p>\r\n\r\n<p>Donec ornare tellus elementum elementum laoreet. Nullam id laoreet nulla. Nulla tempus dictum libero, a eleifend libero tincidunt sed. Proin ut aliquam justo. Aliquam erat volutpat. Aenean feugiat sed massa vel posuere. Etiam viverra dictum eros sed dignissim. In lacus tortor, malesuada vitae malesuada nec, lobortis eu orci. Cras viverra scelerisque nibh porttitor bibendum. Morbi rutrum faucibus nisi eu malesuada. Fusce at faucibus erat, sed ultrices ex. Nulla facilisis est ante, ut blandit ipsum condimentum vel. Pellentesque at eros nec arcu vehicula maximus. Suspendisse id nibh vel ex dignissim ultricies. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>\r\n\r\n<p>Aenean eget massa eu nulla gravida tempus quis in ex. Etiam eget leo odio. Proin mollis faucibus purus finibus ullamcorper. Cras fermentum risus vehicula erat vehicula placerat. Pellentesque erat ex, vestibulum id erat quis, commodo faucibus elit. Mauris eu vulputate leo, eu iaculis augue. Proin suscipit tempor lacus, id feugiat nulla iaculis eget. Curabitur quis nulla id nisl bibendum accumsan. Phasellus congue quis turpis vitae efficitur. In hac habitasse platea dictumst. Aliquam tincidunt leo ut erat vulputate tincidunt. Duis elit orci, ornare sit amet sollicitudin id, sollicitudin eu tellus. Sed aliquet nisi id felis mollis, ut dapibus mauris cursus. Maecenas id dui ut erat efficitur consequat.</p>\r\n\r\n<p>Proin quis quam lacus. Nulla laoreet nec sem non hendrerit. Praesent pretium bibendum est nec vestibulum. Proin et turpis sit amet lectus egestas porta. In erat odio, feugiat eu lacinia non, tincidunt sed dui. Mauris quis risus vel nisi tincidunt gravida. Nulla quis faucibus sapien. Vivamus rutrum viverra erat, sed imperdiet ex tempus at. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum viverra quis nisi vitae mollis. Praesent quis tortor ut lectus vehicula aliquet. In accumsan vitae tellus nec varius. Vestibulum ut augue finibus, vehicula massa volutpat, feugiat massa.</p>\r\n\r\n<p>Praesent porttitor erat at euismod ullamcorper. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed hendrerit quam quis efficitur gravida. Vivamus rhoncus condimentum felis eu dignissim. Quisque porta aliquet congue. Donec faucibus scelerisque est, ut pretium nisi vestibulum et. Sed sagittis interdum neque a cursus. Sed leo massa, fermentum eget convallis bibendum, sagittis in est. Donec pretium sollicitudin pharetra. Suspendisse ac congue odio.</p>\r\n\r\n<p>Maecenas neque nibh, maximus ac ultricies ut, posuere non justo. Aenean rutrum fringilla aliquet. Nunc pharetra tristique pharetra. Cras scelerisque lacus nec ligula laoreet, ac euismod enim tempor. Sed viverra, nisi vitae pellentesque ultrices, nibh ante tincidunt arcu, non luctus dui nisi non odio. Nulla sollicitudin, risus nec iaculis vulputate, tellus enim convallis elit, id semper ligula purus a sem. Sed eleifend metus vitae ante sodales, non pharetra odio hendrerit. Cras vulputate urna eget pharetra maximus. Quisque vestibulum, enim eu eleifend varius, odio orci hendrerit ligula, in porta diam nisi sit amet ante.</p>\r\n', 'WhatsApp_Image_2021-12-22_at_23_21_471.jpeg', '1640600943', 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `date_created` varchar(128) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `image` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `sosial_media_id` int(11) NOT NULL,
  `role` int(13) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `date_created`, `phone`, `image`, `description`, `sosial_media_id`, `role`, `is_active`) VALUES
(1, 'Administrator', 'emzob30@gmail.com', '$2y$10$1Y3oHrYYUGM/yP5Fk3D.LOyLJcdEcGeuMLIVoAWVe2AMEeUD94LYe', '2021-12-27', '', 'avatar-1.png', '', 1, 1, 1),
(3, 'habib al bay', 'emzob8030@gmail.com', '$2y$10$7DHGAD.CaJzoBiQf5FMp9OiGlmvAZMQlsL2jLiYaMkt5zAgspkZou', '2021-12-27', '0881036881755', 'avatar-1.png', 'saya adalah mahasiswa semester 5\r\n', 4, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(123) NOT NULL,
  `token` varchar(123) NOT NULL,
  `date_created` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `vidio`
--

CREATE TABLE `vidio` (
  `id_vidio` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `link` varchar(128) NOT NULL,
  `thumbnail` varchar(128) NOT NULL,
  `date_created` varchar(128) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `vidio`
--

INSERT INTO `vidio` (`id_vidio`, `judul`, `link`, `thumbnail`, `date_created`, `status`) VALUES
(1, 'cara membaca candle stick part I', 'https://www.youtube.com/watch?v=u40H8cUJq5E', 'candle stick.jpg', '1640597051', 1),
(2, 'Pengenealan Binomo part I', 'https://www.youtube.com/watch?v=KAZtyDNLxXI', 'memphis-slide-20161.png', '1640602202', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `access_menu`
--
ALTER TABLE `access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `list_menu`
--
ALTER TABLE `list_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sosial_media`
--
ALTER TABLE `sosial_media`
  ADD PRIMARY KEY (`id_sosial_media`);

--
-- Indeks untuk tabel `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `trabaranabar`
--
ALTER TABLE `trabaranabar`
  ADD PRIMARY KEY (`id_trabarAnabar`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `vidio`
--
ALTER TABLE `vidio`
  ADD PRIMARY KEY (`id_vidio`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `access_menu`
--
ALTER TABLE `access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `list_menu`
--
ALTER TABLE `list_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `sosial_media`
--
ALTER TABLE `sosial_media`
  MODIFY `id_sosial_media` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `trabaranabar`
--
ALTER TABLE `trabaranabar`
  MODIFY `id_trabarAnabar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `vidio`
--
ALTER TABLE `vidio`
  MODIFY `id_vidio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
