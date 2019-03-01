-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2015 at 09:29 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hallabol`
--

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE IF NOT EXISTS `visitors` (
  `visited_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `session_id` varchar(50) NOT NULL,
  `address` varchar(240) NOT NULL,
  `script` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`visited_at`, `session_id`, `address`, `script`) VALUES
('2015-03-18 04:12:11', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/test.php'),
('2015-03-18 04:12:11', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/test.php'),
('2015-03-18 04:12:12', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/test.php'),
('2015-03-18 04:12:13', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/test.php'),
('2015-03-18 04:12:13', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/test.php'),
('2015-03-18 04:40:18', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/test.php'),
('2015-03-18 04:40:19', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/test.php'),
('2015-03-18 04:40:20', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/test.php'),
('2015-03-18 04:40:31', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/test.php'),
('2015-03-18 04:40:32', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/test.php'),
('2015-03-18 04:41:21', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 04:41:23', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 04:42:27', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 04:46:12', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 04:47:49', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 04:48:41', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 04:48:53', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 04:49:08', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 04:50:20', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 04:50:59', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 04:51:19', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 04:51:35', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 04:52:07', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 04:53:08', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 04:53:30', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 04:53:46', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 04:57:14', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 04:58:27', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 04:59:29', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 04:59:53', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 05:00:06', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 05:00:47', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 05:01:11', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 05:01:37', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 05:02:22', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 05:02:37', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 05:02:54', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 05:03:04', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 05:03:16', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 05:03:36', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 05:03:49', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 05:03:55', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 05:04:12', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 05:04:25', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 05:06:46', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 05:07:08', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 05:07:30', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 05:07:50', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 05:07:54', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/about.php'),
('2015-03-18 05:07:58', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/predictor.php'),
('2015-03-18 05:08:03', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/teams.php'),
('2015-03-18 05:08:05', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/games.php'),
('2015-03-18 05:08:13', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/games.php'),
('2015-03-18 05:08:15', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 05:08:33', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 05:11:23', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 05:11:50', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 05:12:43', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/about.php'),
('2015-03-18 05:13:16', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/predictor.php'),
('2015-03-18 05:14:02', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/predictor.php'),
('2015-03-18 05:14:21', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 05:17:57', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 05:18:09', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 05:18:10', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/about.php'),
('2015-03-18 05:18:13', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/fixtures.php'),
('2015-03-18 05:18:16', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/fixtures.php'),
('2015-03-18 05:18:19', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/fixtures.php'),
('2015-03-18 05:19:34', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/login.php'),
('2015-03-18 05:19:45', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/predictor.php'),
('2015-03-18 05:19:46', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/teams.php'),
('2015-03-18 05:19:47', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/games.php'),
('2015-03-18 05:19:52', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/fixtures.php'),
('2015-03-18 05:19:57', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 05:19:58', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/about.php'),
('2015-03-18 08:09:28', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 08:09:50', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 08:09:54', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 08:12:08', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/about.php'),
('2015-03-18 08:12:58', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/login.php'),
('2015-03-18 08:13:02', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 08:13:05', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/register.php'),
('2015-03-18 08:17:37', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/fixtures.php'),
('2015-03-18 08:17:50', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/games.php'),
('2015-03-18 08:18:00', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/teams.php'),
('2015-03-18 08:18:21', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/predictor.php'),
('2015-03-18 08:18:32', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/teams.php'),
('2015-03-18 08:18:33', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/predictor.php'),
('2015-03-18 08:18:56', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 08:23:51', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/fixtures.php'),
('2015-03-18 08:23:51', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/login.php'),
('2015-03-18 08:23:52', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/fixtures.php'),
('2015-03-18 08:23:53', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/games.php'),
('2015-03-18 08:23:55', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/login.php'),
('2015-03-18 08:23:55', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 08:23:57', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/register.php'),
('2015-03-18 08:24:24', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 08:24:33', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/predictor.php'),
('2015-03-18 08:24:57', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/fixtures.php'),
('2015-03-18 08:24:58', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/login.php'),
('2015-03-18 08:24:59', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/index.php'),
('2015-03-18 08:25:01', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/register.php'),
('2015-03-18 08:25:35', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/fixtures.php'),
('2015-03-18 08:25:35', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/games.php'),
('2015-03-18 08:25:36', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/teams.php'),
('2015-03-18 08:25:36', 'unh3cksm7tr749m94vpns6cqm2', '127.0.0.1', '/hallabol15/predictor.php');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
