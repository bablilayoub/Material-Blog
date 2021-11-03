-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2021 at 03:52 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `type` varchar(100) NOT NULL,
  `code` text NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `name`, `type`, `code`, `status`) VALUES
(1, 'sidebare post page', 'Vertical Responsive\n', '<div style=\"width: 300px; height: 250px; background: #428bca; color: #fff; line-height: 250px; text-align: center; \">\n                  MEDIUM RECTANGLE\n                </div>', '0'),
(2, 'header ad', 'horizontal responsive\n', '<div style=\"width: 728px; height: 90px; background: #428bca; color: #fff; line-height: 90px; text-align: center;\">LEADERBOARD</div>', '0'),
(3, 'footer ad', 'horizontal responsive\n', '<div style=\"width: 728px; height: 90px; background: #428bca; color: #fff; line-height: 90px; text-align: center; \">\nLEADERBOARD\n</div>\n', '0'),
(4, 'post top', 'responsive\n', '<div style=\"width: 468px; height: 60px; background: #428bca; color: #fff; line-height: 60px; text-align: center; \">\nFULL BANNER\n</div>', '0'),
(5, 'post footer', 'responsive\n', '<div style=\"width: 468px; height: 60px; background: #428bca; color: #fff; line-height: 60px; text-align: center; \">\nFULL BANNER\n</div>', '0'),
(6, 'sidebar home page', 'Vertical Responsive\n', '<div style=\"width: 160px; height: 600px; background: #428bca; color: #fff; line-height: 600px; text-align: center;\">SKYSCRAPER</div>', '0');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `slug` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `name` varchar(20) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image` text NOT NULL,
  `userid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `message` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `image` varchar(250) DEFAULT '''1.jpg'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `action` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `slug`, `content`, `description`) VALUES
(1, 'CONTACT US', '/contact', '<p>// dont change anyting on this page</p>', 'this page for contact');

-- --------------------------------------------------------

--
-- Table structure for table `plugins`
--

CREATE TABLE `plugins` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `version` varchar(200) NOT NULL,
  `status` varchar(300) NOT NULL,
  `link` varchar(150) NOT NULL,
  `token` varchar(200) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(300) NOT NULL,
  `forwhow` varchar(30) NOT NULL,
  `category` varchar(100) NOT NULL,
  `post_page` varchar(10) NOT NULL,
  `other_pages` varchar(10) NOT NULL,
  `watermark` varchar(200) NOT NULL,
  `place` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plugins`
--

INSERT INTO `plugins` (`id`, `name`, `image`, `version`, `status`, `link`, `token`, `title`, `description`, `forwhow`, `category`, `post_page`, `other_pages`, `watermark`, `place`) VALUES
(1, 'ADBLOCK BY INDIEXD', 'assets/images/plugins/adblock.png', '1.0', '0', 'adblock.php', '3451967212812', 'Ad blocker detected', 'We work hard to provide the best content for visitors and members, and blocking ads does not help us continue, thank you for your understanding and sorry for the inconvenience.', '0', '', '', '', '', ''),
(2, 'SLIDER BY INDIEXD', 'assets/images/plugins/slider.png', '1.0', '1', 'slider.php', '59784613256', '', '', '', '0', '0', '1', '', ''),
(3, 'WATERMARK BY INDIEXD', 'assets/images/plugins/watermark_by_indiexd.png', '1.0', '1', 'watermark.php', '8741941626541', 'WATERMARK BY INDIEXD', '', '', '', '', '', 'assets/images/plugins/Untitled-1_1634096302.png', '1');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `description` varchar(150) NOT NULL,
  `slug` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `pageview` int(11) NOT NULL DEFAULT 0,
  `publisher` int(11) NOT NULL DEFAULT 1,
  `status` varchar(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `sitename` text NOT NULL,
  `url` text NOT NULL,
  `description` text NOT NULL,
  `theme` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `keywords` text NOT NULL,
  `facebook` text NOT NULL,
  `instagram` text NOT NULL,
  `youtube` text NOT NULL,
  `twitter` text NOT NULL,
  `github` text NOT NULL,
  `post_per_page` int(11) NOT NULL,
  `views` varchar(350) NOT NULL DEFAULT '0',
  `website_email` text NOT NULL,
  `signup` varchar(50) NOT NULL,
  `comments` varchar(50) NOT NULL,
  `interface` varchar(50) NOT NULL,
  `logo` varchar(150) NOT NULL,
  `favicon` varchar(200) NOT NULL,
  `show_description` varchar(100) NOT NULL,
  `check_status` int(11) NOT NULL DEFAULT 1,
  `related_limit` varchar(100) NOT NULL,
  `enable_related` varchar(30) NOT NULL,
  `version` varchar(30) NOT NULL,
  `id` int(11) NOT NULL,
  `css` varchar(500) NOT NULL,
  `js` varchar(500) NOT NULL,
  `analytics` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`sitename`, `url`, `description`, `theme`, `status`, `keywords`, `facebook`, `instagram`, `youtube`, `twitter`, `github`, `post_per_page`, `views`, `website_email`, `signup`, `comments`, `interface`, `logo`, `favicon`, `show_description`, `check_status`, `related_limit`, `enable_related`, `version`, `id`, `css`, `js`, `analytics`) VALUES
('INDIEXD', 'http://localhost', 'BEST BLOG EVER', 'modern', 'live', 'blog, indiexd, php', 'https://facebook.com', 'https://instagram.com', 'https://youtube.com', 'https://twitter.com', 'https://github.com', 10, '0', 'contact@indiexd.com', 'yes', 'yes', 'logo', 'assets/images/upload/logo_1633796479.png', 'assets/images/upload/favicon_1633796479.png', 'yes', 0, '4', '1', '1.0', 1, '', '', 'UA-00000000-0');

-- --------------------------------------------------------

--
-- Table structure for table `submenus`
--

CREATE TABLE `submenus` (
  `id` int(11) NOT NULL,
  `parent_menu_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `action` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobilenumber` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `is_active` enum('0','1') NOT NULL,
  `isAdmin` varchar(1) NOT NULL DEFAULT '0',
  `date_time` date NOT NULL,
  `about` varchar(300) NOT NULL DEFAULT '''Hello, you are reading this text because I haven\\''t changed it yet. I will change it some day''',
  `facebook` varchar(300) NOT NULL DEFAULT '''https://www.facebook.com''',
  `instagram` varchar(300) NOT NULL DEFAULT '''https://www.instagram.com''',
  `youtube` varchar(300) DEFAULT 'https://www.youtube.com',
  `image` varchar(300) DEFAULT '''/assets/images/upload/user.png''',
  `code` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plugins`
--
ALTER TABLE `plugins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submenus`
--
ALTER TABLE `submenus`
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
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `plugins`
--
ALTER TABLE `plugins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `submenus`
--
ALTER TABLE `submenus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
