-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2019 at 01:18 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `communitydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment` varchar(600) NOT NULL,
  `date` datetime NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment`, `date`, `post_id`, `user_id`) VALUES
(1, 'so good bro', '2019-04-12 08:52:00', 14, 2),
(3, 'lets go', '2019-04-12 08:52:00', 8, 3),
(5, 'second comment ', '2019-04-10 00:00:00', 14, 2),
(15, 'welcome', '2019-04-22 19:32:03', 6, 1),
(20, 'welcome', '2019-04-22 19:41:51', 6, 1),
(23, 'welcome', '2019-04-22 19:52:43', 7, 1),
(35, 'First real comment in this post   ', '2019-04-22 20:37:48', 16, 1),
(41, 'hi', '2019-04-22 21:44:54', 8, 1),
(42, 'tydytd cthdth dttd ', '2019-04-22 21:45:00', 9, 2),
(43, 'Welcome', '2019-04-22 21:54:54', 11, 1),
(44, 'welcome from another side', '2019-04-22 21:59:41', 7, 1),
(49, ',l;', '2019-04-22 23:30:52', 8, 1),
(50, 'Zamalek 0 - 1 Peyramids', '2019-04-24 12:09:29', 7, 1),
(51, 'First comment for this post', '2019-04-24 15:50:45', 18, 1),
(52, 'welcome to the first round boys', '2019-04-24 17:47:21', 6, 1),
(53, 'bad post bro', '2019-04-24 17:48:18', 14, 1),
(54, 'Ù…Ø´ Ø­Ù„Ùˆ Ø®Ø§Ù„Øµ ÙŠØ³Ø·Ø§', '2019-04-24 17:48:26', 14, 1),
(55, 'Hi first comment', '2019-05-02 13:15:59', 17, 1),
(56, 'welcome', '2019-05-02 13:16:30', 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_body` varchar(600) NOT NULL,
  `user_id` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `dislikes` int(11) NOT NULL,
  `privacy` int(11) NOT NULL,
  `post_date` datetime NOT NULL,
  `Rating_state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_body`, `user_id`, `likes`, `dislikes`, `privacy`, `post_date`, `Rating_state`) VALUES
(6, 'post number 1, hello and welcome people', 3, 0, 1, 1, '2019-04-12 17:29:26', 2),
(7, 'post number 2, hello and welcome people', 2, 37, 1, 0, '2019-04-12 17:30:17', 2),
(8, 'post number 3 , hello and welcome people', 1, 1, -1, 1, '2019-04-12 17:30:31', 1),
(9, 'post number 4 , hello and welcome people', 1, 1, 0, 0, '2019-04-12 17:30:42', 1),
(11, 'post number 5, hello and welcome people, do you know that', 2, 3, 0, 1, '2019-04-12 17:31:12', 1),
(12, 'top post ', 2, 1, 0, 1, '2019-04-12 18:40:05', 1),
(13, 'hello peopleeeeeeeeeeeeeeeeeeeeeeeee', 1, 1, 0, 0, '2019-04-12 19:26:32', 1),
(14, 'anothe post from me ahmed nabil', 1, 0, 1, 1, '2019-04-12 19:27:18', 2),
(16, 'hello new posten', 1, 1, 0, 1, '2019-04-21 21:45:24', 1),
(17, 'this is a post', 1, 0, 1, 1, '2019-04-22 10:46:43', 2),
(18, 'hi', 1, 1, 0, 1, '2019-04-24 15:01:25', 1),
(19, 'Ù„Ùˆ Ø­Ø¯ ÙŠØ¹Ø±Ù Ø§Ù„Ø­Ù„ ÙŠØ§Ø±ÙŠØª ÙŠÙ‚ÙˆÙ„... Ø¯Ù„ÙˆÙ‚ØªÙŠ Ø§Ù†Ø§ Ø§Ù„Ù…ÙØ±ÙˆØ¶ Ø¹Ù†Ø¯ÙŠ Ø¹Ø§Ù„Ù„Ø§Ø¨ 4 partitions ÙÙƒÙ†Øª Ø¹Ø§ÙŠØ² Ø§Ù†Ø²Ù„ ÙˆÙŠÙ†Ø¯ÙˆØ² Ø¬Ø¯ÙŠØ¯ ÙÙƒÙ†Øª Ù‡Ø¨Ø¯Ø£ ÙØ§Ù„ØªØ³Ø·ÙŠØ¨ ÙˆØ§ÙØ±Ù…Ø· Ø§Ù„ C Ù„Ù‚ÙŠØªÙ‡ Ù‚Ø§Ø±ÙŠ Ø§Ù† ÙÙŠÙ‡ 2 partition Ø¨Ø³ ÙˆØ¯Ù‡ Ù…Ø´ ØµØ­ Ù‚Ù…Øª Ø®Ø§Ø±Ø¬ Ù…Ù† Ø®Ø§Ù„Øµ Ù…Ù† ØªØ³Ø·ÙŠØ¨ Ø§Ù„ÙˆÙŠÙ†Ø¯ÙˆØ² ÙˆØ¯Ø®Ù„Øª Ø¹Ø§Ù„ÙˆÙŠÙ†Ø¯ÙˆØ² Ø§Ù„Ù…ÙˆØ¬ÙˆØ¯ Ø§ØµÙ„Ø§ Ù…Ù„Ù‚ØªØ´ ØºÙŠØ± Ø§Ù†Ù‡ Ù‚Ø§Ø±ÙŠ 2 partitions Ø¨Ø³ Ø¨Ø±Ø¶Ùˆ ÙˆÙ…Ø´ Ù„Ø§Ù‚ÙŠ Ø§Ù„Ø¨Ø§Ù‚ÙŠÙŠÙ† ÙˆÙ„Ù…Ø§ Ø¯Ø®Ù„Øª Ø¹Ø§Ù„ storage Ù„Ù‚ÙŠØª 277 Ø¬ÙŠØ¬Ø§ ÙØ§Ø¶ÙŠÙŠÙ† ÙØ¥ÙŠÙ‡ Ø§Ù„Ù„ÙŠ Ø­ØµÙ„ Ø§Ù†Ø', 1, 0, 1, 1, '2019-04-24 15:56:22', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `followingCount` int(11) NOT NULL,
  `followers` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `followingCount`, `followers`, `age`, `gender`) VALUES
(1, 'Ahmed Nabil', 'programmer2k18@gmail.com', '123456', 10, 20, 21, 'male'),
(2, 'Mostafa Anwar', 'Mostafa_Anwar@gmail.com', '456789', 50, 100, 21, 'male'),
(3, 'Mohammed Ali', 'Mohammed_Ali@gmail.com', '456123', 60, 40, 21, 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `userIdForiegnKey` (`user_id`),
  ADD KEY `postIdForiegnKey` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `userIdForiegnKey` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `postIdForiegnKey` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `userIdForiegnKey` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
