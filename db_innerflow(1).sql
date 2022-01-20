-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jan 2022 pada 13.44
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
(2, 'tes', 'tes', '<p>asd</p>\r\n', 'Trading', '1640633081', 'wp1932920-memphis-may-fire-wallpapers.jpg', 0, 1),
(3, 'tes', 'tes', '<p>coba</p>\r\n', 'Trading', '1641222884', 'wp1932920-memphis-may-fire-wallpapers1.jpg', 1, 1);

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
(1, 'tes', 'Laporan_Sementara.pdf', 'Trading', '1640597029', 1),
(2, 'Trading dasar Part I', '49-93-1-SM_(1).pdf', 'Trading', '1641222922', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `gross_amount` varchar(128) NOT NULL,
  `payment_type` varchar(128) NOT NULL,
  `bank` varchar(128) NOT NULL,
  `va_number` varchar(128) NOT NULL,
  `biller_code` varchar(128) NOT NULL,
  `transaction_status` varchar(128) NOT NULL,
  `transaction_time` varchar(128) NOT NULL,
  `pdf_url` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL,
  `date_modified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `order_id`, `gross_amount`, `payment_type`, `bank`, `va_number`, `biller_code`, `transaction_status`, `transaction_time`, `pdf_url`, `date_created`, `date_modified`) VALUES
(1, 1463578663, '2000000', 'bank_transfer', 'bca', '15329074543', '', '', '2022-01-03 18:02:33', 'https://app.sandbox.midtrans.com/snap/v1/transactions/7a6b20a3-1914-4bf5-b74e-94fd69ffc525/pdf', 1641207808, 1641207808),
(2, 1347194047, '2000000', 'bank_transfer', 'bca', '15329000653', '', 'pending', '2022-01-03 18:04:32', 'https://app.sandbox.midtrans.com/snap/v1/transactions/8a217b19-cc34-4577-a053-e00bc37337da/pdf', 1641207873, 1641207873),
(3, 1884372550, '2000000', 'bank_transfer', 'bni', '9881532975882092', '', 'pending', '2022-01-03 18:06:22', 'https://app.sandbox.midtrans.com/snap/v1/transactions/52820cff-2ab8-4311-a221-8cee44597ff2/pdf', 1641207983, 1641207983),
(4, 1727259401, '2000000', 'bank_transfer', 'bri', '153291802505791310', '', 'pending', '2022-01-03 18:06:39', 'https://app.sandbox.midtrans.com/snap/v1/transactions/11edcc43-56f4-4fb1-94e7-92d4fd80bbe6/pdf', 1641208000, 1641208000),
(5, 1836677322, '2000000', 'bank_transfer', 'permata', '215296145601', '70012', 'pending', '2022-01-03 18:11:41', 'https://app.sandbox.midtrans.com/snap/v1/transactions/70ee1a0d-97cc-4a4d-94c9-598457243f59/pdf', 1641208303, 1641208303),
(6, 1836677322, '2000000', 'bank_transfer', 'permata', '215296145601', '70012', 'pending', '2022-01-03 18:11:41', 'https://app.sandbox.midtrans.com/snap/v1/transactions/70ee1a0d-97cc-4a4d-94c9-598457243f59/pdf', 1641208328, 1641208328),
(7, 358806443, '2000000', 'bank_transfer', 'permata', '319810316495', '70012', 'pending', '2022-01-03 18:12:35', 'https://app.sandbox.midtrans.com/snap/v1/transactions/d68ac9f0-d37a-43d1-9d36-23c8cc8fd91a/pdf', 1641208357, 1641208357),
(8, 786244309, '2000000', 'echannel', 'mandiri', '790523237102', '70012', 'pending', '2022-01-03 19:00:31', 'https://app.sandbox.midtrans.com/snap/v1/transactions/97db69c0-fe3d-45d1-a53b-b15b43f81a9f/pdf', 1641211232, 1641211232),
(9, 1054361551, '2000000', 'cstore', 'alfamart/indomart', '688906189061', '', 'pending', '2022-01-03 19:01:01', 'https://app.sandbox.midtrans.com/snap/v1/transactions/e5f0b7b0-ad0b-424d-8833-d3b04381c58a/pdf', 1641211263, 1641211263),
(10, 90758584, '2000000', 'cstore', 'alfamart/indomart', '2172261856591469', '', 'pending', '2022-01-03 19:01:33', 'https://app.sandbox.midtrans.com/snap/v1/transactions/ce58f7a7-8fd8-45a7-ab21-aedf88924ca1/pdf', 1641211294, 1641211294),
(11, 290813975, '2000000', 'bank_transfer', 'permata', '153009893292168', '', 'pending', '2022-01-03 19:07:05', 'https://app.sandbox.midtrans.com/snap/v1/transactions/66fc698e-67a0-4a2b-afb4-25c7b2797ac5/pdf', 1641211628, 1641211628),
(12, 1319661314, '2000000', 'cstore', 'alfamart/indomart', '732048520485', '', 'pending', '2022-01-03 19:31:07', 'https://app.sandbox.midtrans.com/snap/v1/transactions/f60281e5-2e45-4096-b3db-8c4603ccd947/pdf', 1641213068, 1641213068),
(13, 1785681955, '2000000', 'echannel', 'mandiri', '207736708762', '70012', 'pending', '2022-01-03 19:32:55', 'https://app.sandbox.midtrans.com/snap/v1/transactions/a015d048-70b2-4657-b815-b51482f30bf1/pdf', 1641213176, 1641213176),
(14, 508313654, '2000000', 'echannel', 'mandiri', '692026915035', '70012', 'pending', '2022-01-03 19:34:02', 'https://app.sandbox.midtrans.com/snap/v1/transactions/61c72e92-a6a6-42d5-a7ff-9ec701b3f6af/pdf', 1641213330, 1641213330),
(15, 321558119, '2000000', 'bank_transfer', 'bca', '15329413620', '', 'pending', '2022-01-03 19:36:15', 'https://app.sandbox.midtrans.com/snap/v1/transactions/ffbd3a3b-a441-4b16-b3fd-f5bd56b6a302/pdf', 1641213376, 1641213376),
(16, 1834370583, '2000000', 'bank_transfer', 'bca', '15329806789', '', 'pending', '2022-01-03 19:39:00', 'https://app.sandbox.midtrans.com/snap/v1/transactions/efd1b5c5-8d1c-4d92-9169-1a19574afecf/pdf', 1641213541, 1641213541),
(17, 627179479, '2000000', 'bank_transfer', 'bca', '15329858227', '', 'pending', '2022-01-03 19:39:50', 'https://app.sandbox.midtrans.com/snap/v1/transactions/4c5706e4-c5d9-4c51-8b35-5b35f11a7030/pdf', 1641213591, 1641213591),
(18, 25249044, '2000000', 'bank_transfer', 'permata', '153001362374186', '', 'pending', '2022-01-03 19:52:45', 'https://app.sandbox.midtrans.com/snap/v1/transactions/3c664485-4923-4f40-b4bb-e479c7f6177c/pdf', 1641214368, 1641214368),
(19, 389593808, '2000000', 'bank_transfer', 'bca', '15329469673', '', 'pending', '2022-01-03 19:59:04', 'https://app.sandbox.midtrans.com/snap/v1/transactions/19ebfcd0-6f08-4614-a5bb-2b56f4b245ee/pdf', 1641214745, 1641214745),
(20, 177960378, '2000000', 'bank_transfer', 'bca', '15329646950', '', 'pending', '2022-01-03 19:59:30', 'https://app.sandbox.midtrans.com/snap/v1/transactions/529cce81-c44c-40bf-9698-bc1d03303050/pdf', 1641214770, 1641215473),
(21, 51870488, '2000000', 'bank_transfer', 'bca', '15329320529', '', 'settlement', '2022-01-03 20:11:57', 'https://app.sandbox.midtrans.com/snap/v1/transactions/8c74a1dd-6ce2-406a-80a9-fb0d651c3618/pdf', 1641215518, 1641215589),
(22, 1802387248, '2000000', 'bank_transfer', 'bca', '15329696301', '', 'pending', '2022-01-03 20:26:50', 'https://app.sandbox.midtrans.com/snap/v1/transactions/5d40e2ad-efe7-4ac3-bef7-5463ed2be60b/pdf', 1641216411, 1641216440),
(23, 1439548252, '2000000', 'bank_transfer', 'bca', '15329768959', '', 'settlement', '2022-01-03 20:27:39', 'https://app.sandbox.midtrans.com/snap/v1/transactions/97b2c9b9-d06e-4229-8ed2-db5e91a5cb79/pdf', 1641216460, 1641216505),
(24, 629787001, '2000000', 'bank_transfer', 'bca', '15329690817', '', 'settlement', '2022-01-03 22:17:41', 'https://app.sandbox.midtrans.com/snap/v1/transactions/5bd35875-5b70-45aa-acb1-5b507b43d0d0/pdf', 1641223063, 1641223239),
(25, 58289242, '2000000', 'bank_transfer', 'bca', '15329888848', '', 'settlement', '2022-01-04 02:19:01', 'https://app.sandbox.midtrans.com/snap/v1/transactions/4b0a9d2a-dba6-4ec7-b63b-ef97a9306af6/pdf', 1641237543, 1641237586);

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
(7, '', '', 'habibal28', 'al_bayhaqqi'),
(8, '', '', '', ''),
(11, '', '', '', ''),
(12, '', '', '', '');

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
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sub_menu`
--

INSERT INTO `sub_menu` (`id`, `sub_menu`, `icon`, `url`, `is_active`, `role`) VALUES
(1, 'dashboard', 'fas fa-fw fa-fire', 'Member', 1, 2),
(2, 'profile', 'fas fa-fw fa-user', 'Member/profile', 1, 2),
(3, 'learning', 'fas fa-fw fa-folder', 'Member/materi', 1, 2),
(4, 'dashboard', 'fas fa-fw fa-fire', 'Administrator/index', 1, 1),
(5, 'users', 'fas fa-fw fa-users', 'Administrator/manageUser', 1, 1),
(6, 'learnings', 'fas fa-fw fa-folder', 'Administrator/manageMateri/false', 1, 1),
(7, 'events', 'fas fa-fw fa-bullhorn', 'Administrator/manageEvent/false', 1, 1),
(8, 'role access', 'fas fa-fw fa-tasks', 'Administrator/manageRole', 1, 0),
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
(3, 'Merchandise Useless', 'ini adalah Merchandise Useless', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque at ex facilisis, porttitor urna eget, placerat eros. Proin eu dolor sem. Donec eget augue non nibh ullamcorper faucibus. In semper arcu magna, ut tristique arcu volutpat at. Sed in auctor nunc. Fusce vel est sed nunc bibendum rhoncus. Proin quis nunc vitae sem vestibulum rutrum non pharetra libero. Vestibulum commodo fermentum nisi sit amet consequat. Vestibulum euismod molestie velit in hendrerit. Nunc sed turpis venenatis dui sagittis elementum.</p>\r\n\r\n<p>Integer ultrices arcu eget sapien ultricies, et tristique odio semper. Morbi finibus, erat quis interdum tincidunt, nisl massa venenatis mi, eu congue orci ipsum eget eros. Ut porta velit vel felis mattis, et suscipit sem ullamcorper. Aliquam erat volutpat. Quisque placerat a dui feugiat venenatis. Cras ut dolor a nibh tempor vestibulum in at dui. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam nec ante volutpat, pulvinar ex sit amet, finibus nisi. Nunc quis metus purus. Mauris volutpat eros id quam ultrices, id sollicitudin leo rutrum. Quisque scelerisque dolor vitae elit dictum tempus.</p>\r\n\r\n<p>Donec ornare tellus elementum elementum laoreet. Nullam id laoreet nulla. Nulla tempus dictum libero, a eleifend libero tincidunt sed. Proin ut aliquam justo. Aliquam erat volutpat. Aenean feugiat sed massa vel posuere. Etiam viverra dictum eros sed dignissim. In lacus tortor, malesuada vitae malesuada nec, lobortis eu orci. Cras viverra scelerisque nibh porttitor bibendum. Morbi rutrum faucibus nisi eu malesuada. Fusce at faucibus erat, sed ultrices ex. Nulla facilisis est ante, ut blandit ipsum condimentum vel. Pellentesque at eros nec arcu vehicula maximus. Suspendisse id nibh vel ex dignissim ultricies. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>\r\n\r\n<p>Aenean eget massa eu nulla gravida tempus quis in ex. Etiam eget leo odio. Proin mollis faucibus purus finibus ullamcorper. Cras fermentum risus vehicula erat vehicula placerat. Pellentesque erat ex, vestibulum id erat quis, commodo faucibus elit. Mauris eu vulputate leo, eu iaculis augue. Proin suscipit tempor lacus, id feugiat nulla iaculis eget. Curabitur quis nulla id nisl bibendum accumsan. Phasellus congue quis turpis vitae efficitur. In hac habitasse platea dictumst. Aliquam tincidunt leo ut erat vulputate tincidunt. Duis elit orci, ornare sit amet sollicitudin id, sollicitudin eu tellus. Sed aliquet nisi id felis mollis, ut dapibus mauris cursus. Maecenas id dui ut erat efficitur consequat.</p>\r\n\r\n<p>Proin quis quam lacus. Nulla laoreet nec sem non hendrerit. Praesent pretium bibendum est nec vestibulum. Proin et turpis sit amet lectus egestas porta. In erat odio, feugiat eu lacinia non, tincidunt sed dui. Mauris quis risus vel nisi tincidunt gravida. Nulla quis faucibus sapien. Vivamus rutrum viverra erat, sed imperdiet ex tempus at. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum viverra quis nisi vitae mollis. Praesent quis tortor ut lectus vehicula aliquet. In accumsan vitae tellus nec varius. Vestibulum ut augue finibus, vehicula massa volutpat, feugiat massa.</p>\r\n\r\n<p>Praesent porttitor erat at euismod ullamcorper. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed hendrerit quam quis efficitur gravida. Vivamus rhoncus condimentum felis eu dignissim. Quisque porta aliquet congue. Donec faucibus scelerisque est, ut pretium nisi vestibulum et. Sed sagittis interdum neque a cursus. Sed leo massa, fermentum eget convallis bibendum, sagittis in est. Donec pretium sollicitudin pharetra. Suspendisse ac congue odio.</p>\r\n\r\n<p>Maecenas neque nibh, maximus ac ultricies ut, posuere non justo. Aenean rutrum fringilla aliquet. Nunc pharetra tristique pharetra. Cras scelerisque lacus nec ligula laoreet, ac euismod enim tempor. Sed viverra, nisi vitae pellentesque ultrices, nibh ante tincidunt arcu, non luctus dui nisi non odio. Nulla sollicitudin, risus nec iaculis vulputate, tellus enim convallis elit, id semper ligula purus a sem. Sed eleifend metus vitae ante sodales, non pharetra odio hendrerit. Cras vulputate urna eget pharetra maximus. Quisque vestibulum, enim eu eleifend varius, odio orci hendrerit ligula, in porta diam nisi sit amet ante.</p>\r\n', 'live trading.jpg', '1640600943', 1, 1),
(4, 'Demon Seed', 'Radical cystectomy', '0.52737183', 'live trading.jpg', '2021-12-06', 1, 1),
(5, 'Godzilla: Final Wars (Gojira: Fainaru uôzu)', 'Biopsy of spinal cord or spinal meninges', '2.4087466815', 'live trading.jpg', '2021-12-18', 1, 1),
(6, 'Blue Angel, The (Blaue Engel, Der)', 'Other incision of bone without division, tarsals and metatarsals', '0.1547796733', 'live trading.jpg', '2021-05-17', 1, 1),
(7, 'Material Girls', 'Tracheoesophageal fistulization', '0.233208742', 'live trading.jpg', '2021-12-20', 1, 1),
(8, 'Jerry and Tom', 'Other and unspecified hysterectomy', '0.6910494403', 'live trading.jpg', '2021-08-27', 1, 1),
(9, 'Superman II', 'Phlebography of pulmonary veins using contrast material', '0.0932144606', 'live trading.jpg', '2021-10-07', 1, 1),
(10, 'Samurai Banners (Fûrin kazan)', 'Cyclocryotherapy', '0.1262160575', 'live trading.jpg', '2021-07-05', 1, 1),
(11, 'Unknown, The (a.k.a. Alonzo the Armless)', 'Removal of sutures from thorax', '0.5611381891', 'live trading.jpg', '2021-02-24', 1, 1),
(12, 'Goodbye, 20th Century', 'Closure of anal fistula', '0.0270306877', 'live trading.jpg', '2021-09-16', 1, 1),
(13, 'That Day (Ce jour-là)', 'Other cervical fusion of the posterior column, posterior technique', '2.0295929227', 'live trading.jpg', '2021-06-17', 1, 1),
(14, 'Don\'s Plum', 'Diagnostic procedures on bone, not elsewhere classified, tibia and fibula', '1.3572561323', 'live trading.jpg', '2021-04-05', 1, 1),
(15, 'Come Sweet Death (Komm, süsser Tod)', 'Other urethroscopy', '0.5325170566', 'live trading.jpg', '2021-04-17', 1, 1),
(16, 'J.C. Chávez (a.k.a. Chavez)', 'Other partial breech extraction', '0.4914785903', 'live trading.jpg', '2021-03-14', 1, 1),
(17, 'Call Northside 777', 'Endoscopic insertion of stent (tube) into bile duct', '3.8252195928', 'live trading.jpg', '2021-09-16', 1, 1),
(18, 'Read My Lips (Sur mes lèvres)', 'Delayed suture of flexor tendon of hand', '0.1386686723', 'live trading.jpg', '2021-09-30', 1, 1),
(19, 'Company Business', 'Vagotomy, not otherwise specified', '0.6113427536', 'live trading.jpg', '2021-04-24', 1, 1),
(20, 'Zombeavers', 'Delayed opening of other enterostomy', '0.5816576146', 'live trading.jpg', '2021-10-12', 1, 1),
(21, 'Freakonomics', 'Thermocauterization of corneal lesion', '0.6961666597', 'live trading.jpg', '2021-05-11', 1, 1),
(22, 'Other Boleyn Girl, The', 'Other partial ostectomy, femur', '0.1527581985', 'live trading.jpg', '2021-12-03', 1, 1),
(23, 'Gunless', 'Exploratory verbal psychotherapy', '0.7859765766', 'live trading.jpg', '2021-01-16', 1, 1),
(24, 'Invasion of Astro-Monster (Godzilla vs. Monster Zero) (Kaijû daisensô)', 'Injection of other agent, except neurolytic', '1.0441601976', 'live trading.jpg', '2021-05-06', 1, 1),
(25, 'Paper Heart', 'Other miscellaneous procedures', '0.2742004298', 'live trading.jpg', '2021-05-27', 1, 1),
(26, 'Bottled Up', 'Transurethral removal of obstruction from ureter and renal pelvis', '0.0183968603', 'live trading.jpg', '2021-05-24', 1, 1),
(27, 'Third Wheel, The', 'Other proctopexy', '0.4006154971', 'live trading.jpg', '2021-01-07', 1, 1),
(28, 'Perils of the Sentimental Swordsman', 'Excision of ampulla of Vater (with reimplantation of common duct)', '0.4674863057', 'live trading.jpg', '2021-01-26', 1, 1),
(29, 'Relax... It\'s Just Sex', 'Other revision of vascular procedure', '0.5392228664', 'live trading.jpg', '2021-07-25', 1, 1),
(30, 'American Madness', 'Excision of perirectal tissue', '3.2876150879', 'live trading.jpg', '2021-04-23', 1, 1),
(31, 'Throw Momma from the Train', 'Open abdominoperineal resection of the rectum', '0.8261844154', 'live trading.jpg', '2021-10-05', 1, 1),
(32, 'Grown Ups 2', 'Neurectasis', '0.1000468345', 'live trading.jpg', '2021-07-14', 1, 1),
(33, 'America\'s Sweethearts', 'Gynecological examination', '0.4204018947', 'live trading.jpg', '2021-11-08', 1, 1),
(34, 'I Am Cuba (Soy Cuba/Ya Kuba)', 'Implantation of automatic cardioverter/defibrillator pulse generator only', '0.3282477927', 'live trading.jpg', '2021-02-24', 1, 1),
(35, 'Two Hands', 'Permanent colostomy', '0.5576960131', 'live trading.jpg', '2021-05-01', 1, 1),
(36, 'Breakaway (Speedy Singhs)', 'Relaxation of scar or web contracture of skin', '3.3246507061', 'live trading.jpg', '2021-05-28', 1, 1),
(37, 'Who Is Killing the Great Chefs of Europe?', 'Frontal sinusectomy', '0.3072751256', 'live trading.jpg', '2021-03-07', 1, 1),
(38, 'William Kunstler: Disturbing the Universe', 'Other cervical biopsy', '0.4688538354', 'live trading.jpg', '2021-12-09', 1, 1),
(39, 'Turbo: A Power Rangers Movie', 'Closed [endoscopic] biopsy of bronchus', '0.0257440647', 'live trading.jpg', '2021-09-11', 1, 1),
(40, 'Children of Heaven, The (Bacheha-Ye Aseman)', 'Acupuncture for anesthesia', '0.8345006552', 'live trading.jpg', '2021-05-17', 1, 1),
(41, 'Aliisa', 'Partial ureterectomy', '0.3605207277', 'live trading.jpg', '2021-07-21', 1, 1),
(42, 'Kentuckian, The', 'Midtarsal fusion', '1.805096536', 'live trading.jpg', '2021-09-08', 1, 1),
(43, 'Thoroughly Modern Millie', 'Microscopic examination of specimen from lymph node and of lymph, other microscopic examination', '1.2776063865', 'live trading.jpg', '2021-11-08', 1, 1),
(44, 'Q: The Winged Serpent', 'Menstrual extraction or regulation', '0.341986458', 'live trading.jpg', '2021-02-22', 1, 1),
(45, 'Summer of Blood', 'Closed reduction of fracture with internal fixation, phalanges of hand', '2.8205587656', 'live trading.jpg', '2021-11-18', 1, 1),
(46, 'Righteous Kill', 'Biopsy of vulva', '0.3388331617', 'live trading.jpg', '2021-05-27', 1, 1),
(47, 'Tekkonkinkreet (Tekkon kinkurîto)', 'Nasal function study', '0.3520965525', 'live trading.jpg', '2021-04-23', 1, 1);

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
(2, 'Tierney Kynge', 'tkynge1@mediafire.com', 'CxqTde5LP', '2021-06-13', '6018083641', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'strategize sticky methodologies', 0, 0, 0),
(3, 'Rori Spellicy', 'rspellicy2@whitehouse.gov', 'Y6YFoh7Lti', '2021-04-06', '8768360174', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'deliver front-end convergence', 0, 0, 0),
(4, 'Percy Hubert', 'phubert3@eventbrite.com', 'VzuQT4u8O', '2021-12-20', '2941409592', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'incentivize dynamic interfaces', 0, 0, 0),
(5, 'Benedict Carren', 'bcarren4@buzzfeed.com', 'zZEyYfHrxwdc', '2021-11-06', '8235433996', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'innovate out-of-the-box synergies', 0, 0, 0),
(7, 'Kath Somerfield', 'ksomerfield6@guardian.co.uk', '4HoQc95Iy', '2021-03-17', '3201018133', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'evolve dot-com communities', 0, 0, 0),
(8, 'Jeanelle Blackah', 'jblackah7@webs.com', 'aPttKBcHdpw', '2021-03-27', '6077600875', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'e-enable extensible infomediaries', 0, 0, 0),
(9, 'Quill Dunster', 'qdunster8@twitter.com', 'd6XKGgwu', '2021-01-15', '1207373567', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'engineer intuitive methodologies', 0, 0, 0),
(10, 'Rafaelia Penkethman', 'rpenkethman9@slate.com', 'EZyRaG', '2021-08-19', '2255047532', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'expedite bricks-and-clicks infomediaries', 0, 2, 0),
(11, 'Tansy Crumpton', 'tcrumptona@quantcast.com', 'Ob277ex', '2021-08-25', '4959503213', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'transform plug-and-play deliverables', 0, 3, 1),
(12, 'Scot Devinn', 'sdevinnb@unblog.fr', 'wiWGTi3R', '2021-06-24', '3654648464', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'incentivize clicks-and-mortar infomediaries', 0, 0, 0),
(13, 'Christophe Simmig', 'csimmigc@va.gov', 'rLX8LjiQ', '2021-01-18', '3153082226', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'whiteboard dot-com platforms', 0, 3, 1),
(14, 'Dulcinea Tommasuzzi', 'dtommasuzzid@harvard.edu', 'LNMbTvVorc', '2021-01-02', '2113232690', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'cultivate bleeding-edge deliverables', 0, 0, 0),
(15, 'Cissy Wallman', 'cwallmane@accuweather.com', 'dainM7ozCTTC', '2021-12-18', '4111673762', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'disintermediate rich methodologies', 0, 0, 0),
(16, 'Annabella Vamplers', 'avamplersf@google.cn', 'QEcRFvyS', '2021-07-17', '9688288686', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'scale vertical experiences', 0, 0, 0),
(17, 'Willetta Burless', 'wburlessg@ning.com', 'YTdXHP', '2021-08-19', '2263008072', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'synthesize visionary deliverables', 0, 2, 1),
(18, 'Nessi Denman', 'ndenmanh@berkeley.edu', 'gtoRWl2I', '2021-02-21', '1198686366', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'visualize scalable niches', 0, 3, 1),
(19, 'Marilin Colbran', 'mcolbrani@unc.edu', 'tjK38NxaWD5I', '2021-10-09', '9923210307', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'optimize customized vortals', 0, 0, 0),
(20, 'Jasper Lively', 'jlivelyj@yandex.ru', '123', '2021-01-03', '4017934461', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAQAAAC1+jfqAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'aggregate cutting-edge web-readiness', 8, 3, 1),
(21, 'Louise Leupold', 'lleupoldk@wufoo.com', 'yoJCOcooB5ct', '2021-10-08', '9286878385', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'benchmark turn-key web-readiness', 0, 0, 0),
(22, 'Eustace Warlow', 'ewarlowl@china.com.cn', 'TgUdXfh7', '2021-10-13', '7397750387', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'optimize plug-and-play convergence', 0, 0, 0),
(23, 'Michael Vesque', 'mvesquem@technorati.com', 'Gsdt2N', '2021-05-22', '1197305559', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'evolve vertical channels', 0, 0, 0),
(24, 'Dinny Stoade', 'dstoaden@economist.com', 'CnZMDHQ9F', '2021-11-12', '3651268991', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'redefine revolutionary relationships', 0, 0, 0),
(25, 'Carolina Horrell', 'chorrello@technorati.com', 'c41u0o1', '2021-01-25', '6766116999', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'streamline best-of-breed mindshare', 0, 0, 0),
(26, 'Tucker De la Barre', 'tdep@fda.gov', 'L7GwK4Azh4', '2021-03-04', '2698707134', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'expedite turn-key bandwidth', 0, 0, 0),
(27, 'Raffaello Stockle', 'rstockleq@alexa.com', 'Hb8PQMcJVP', '2021-03-24', '7048784268', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'e-enable global channels', 0, 0, 0),
(28, 'Grace Muckersie', 'gmuckersier@skyrock.com', 'O0Mnln', '2021-09-10', '9353954278', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAQAAAC1+jfqAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'aggregate integrated communities', 0, 0, 0),
(29, 'Gabriele Chelam', 'gchelams@unc.edu', 'oU5PBkUB3X', '2021-01-05', '3597368218', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'target front-end ROI', 0, 2, 1),
(30, 'Pearl Atwood', 'patwoodt@instagram.com', 'aZMNUZK', '2021-02-07', '4984126776', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'repurpose enterprise action-items', 0, 0, 0),
(31, 'Elwyn Ferris', 'eferrisu@army.mil', 'GYJWEU349qcm', '2021-10-05', '2477860159', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'exploit interactive technologies', 0, 0, 0),
(32, 'Gideon Tanby', 'gtanbyv@mediafire.com', 'kwmb0WER99Jp', '2021-02-03', '3923748730', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'integrate collaborative ROI', 0, 0, 0),
(33, 'Fraze Jermy', 'fjermyw@freewebs.com', 'UuVWAICrUkFt', '2021-04-24', '8282853931', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'unleash innovative synergies', 0, 3, 1),
(34, 'Kendre Richichi', 'krichichix@tamu.edu', 'IUdXhArc', '2021-09-02', '2186964353', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'synergize interactive action-items', 0, 0, 0),
(35, 'Vidovic Mugleston', 'vmuglestony@cnn.com', 'baJO10LGdT9C', '2021-07-19', '2863816313', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'aggregate dynamic action-items', 0, 0, 0),
(36, 'Clemence Slyford', 'cslyfordz@sbwire.com', 'oxcPe4sna', '2021-09-29', '8396976667', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'syndicate interactive portals', 0, 0, 0),
(37, 'Harcourt Vigurs', 'hvigurs10@hostgator.com', 'R3AGWZP9gow', '2021-01-07', '1253024364', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'revolutionize turn-key interfaces', 0, 0, 0),
(38, 'Hedwig Tuckey', 'htuckey11@constantcontact.com', 'SdmKupEKVjML', '2021-10-16', '1269644468', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'architect web-enabled bandwidth', 0, 0, 0),
(39, 'Vanny Omrod', 'vomrod12@gravatar.com', 'I03EHdFG46', '2021-05-08', '1058039604', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'engage back-end solutions', 0, 0, 0),
(40, 'Ealasaid Wybron', 'ewybron13@quantcast.com', 'i4x9jPz', '2021-03-28', '4617953670', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'visualize enterprise interfaces', 0, 2, 1),
(41, 'Miguelita Welbeck', 'mwelbeck14@ehow.com', '5DZPExzYpI', '2021-09-02', '3988564719', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'synthesize clicks-and-mortar vortals', 0, 2, 1),
(42, 'Salome Brussels', 'sbrussels15@aboutads.info', 'UYEUuh9n47A', '2021-09-17', '9756321856', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'engage end-to-end e-services', 0, 0, 0),
(43, 'Kitty Reinert', 'kreinert16@dailymotion.com', 'Ck5VVX', '2021-08-14', '7148036866', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'repurpose virtual web services', 0, 0, 0),
(44, 'Kial Whittet', 'kwhittet17@skype.com', 'TEyPm9tVVioI', '2021-02-25', '6219960824', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'incentivize B2C metrics', 0, 0, 0),
(45, 'Joell Haszard', 'jhaszard18@mtv.com', 'zn1sJIrG4kh', '2021-10-14', '8619989549', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'envisioneer seamless architectures', 0, 0, 0),
(46, 'Hallsy Cranson', 'hcranson19@nationalgeographic.com', 'wxd276', '2021-10-07', '4137473417', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'expedite user-centric supply-chains', 0, 0, 0),
(47, 'Rubia Crotty', 'rcrotty1a@mozilla.org', 'tocaizO7R', '2021-09-06', '1493844849', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'reintermediate vertical deliverables', 0, 0, 0),
(48, 'Nero Saveall', 'nsaveall1b@hc360.com', 'Hl0IcT', '2021-09-06', '5351584318', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'productize killer convergence', 0, 0, 0),
(49, 'Dona Linebarger', 'dlinebarger1c@google.co.jp', 'iSLtr8', '2021-10-18', '9651612330', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'drive out-of-the-box synergies', 0, 0, 0),
(50, 'Blaire Fludgate', 'bfludgate1d@spotify.com', 'IONkkxO4', '2021-08-26', '1459188256', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAQAAAC1+jfqAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'aggregate scalable schemas', 0, 0, 0),
(51, 'Carmen Sothern', 'csothern1e@ucla.edu', 'f4b7tiE', '2021-12-26', '6168829099', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZW', 'revolutionize dot-com e-tailers', 0, 0, 0),
(54, 'habib al', 'emzob8030@gmail.com', '$2y$10$oSnneG02T7pjcwQaStS/wuBy/GGQWnqWYu0v70FlUd3fBkrnO6mKu', '2021-12-28', '', 'avatar-1.png', '', 11, 2, 1),
(55, 'indy ramadhan', 'stonerh49@gmail.com', '$2y$10$lfR.rf4t83nKu2LjTZHfSeHaADCKKMTxnLkxrQ4avdJ4.6TuG1hkC', '2022-01-06', '', 'avatar-1.png', '', 12, 2, 1);

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
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `list_menu`
--
ALTER TABLE `list_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `sosial_media`
--
ALTER TABLE `sosial_media`
  MODIFY `id_sosial_media` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `trabaranabar`
--
ALTER TABLE `trabaranabar`
  MODIFY `id_trabarAnabar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `vidio`
--
ALTER TABLE `vidio`
  MODIFY `id_vidio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
