-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2015 �?06 ??15 ??17:01
-- 伺服器版本: 5.6.17
-- PHP 版本： 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫： `books`
--
CREATE DATABASE IF NOT EXISTS `books` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `books`;

-- --------------------------------------------------------

--
-- 資料表結構 `book`
--
-- 建立時間: 2015 �?06 ??15 ??05:04
--

CREATE TABLE IF NOT EXISTS `book` (
  `bookid` int(11) NOT NULL AUTO_INCREMENT,
  `bname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `bprice` int(11) NOT NULL,
  `bnote` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `bauthor` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `bpublisher` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `bprovider` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `btime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bcategory` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `bstatus` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `bbuyman` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `bimg` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`bookid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- 資料表的匯出資料 `book`
--

INSERT INTO `book` (`bookid`, `bname`, `bprice`, `bnote`, `bauthor`, `bpublisher`, `bprovider`, `btime`, `bcategory`, `bstatus`, `bbuyman`, `bimg`) VALUES
(10, '七把刀弄懂微積分', 560, '', '王富祥', '考用', '110116024', '2015-06-15 11:46:00', '0', '0', '', '0.jpg'),
(11, 'JAVA7教學手冊 第五版', 650, '', '洪維恩', '旗標', '110116024', '2015-06-15 11:47:10', '1', '0', '', '1.jpg'),
(12, 'Android學習手冊', 480, '', 'Marko Gargenta,Masumi Nakamura', '碁峯', '110116024', '2015-06-15 11:48:23', '1', '0', '', '2.jpg'),
(13, '網路概論與實務', 560, '', '楊豐瑞 楊豐任', '旗標', '110116024', '2015-06-15 11:50:18', '2', '0', '', '3.jpg'),
(14, 'ASSEMBLY LANGUAGE FOR INTEL-BASED COMPUTERS FIFTH EDITION', 480, '', 'KIP R. IRVINE', 'PEARSON Education', '110116024', '2015-06-15 11:54:09', '2', '0', '', '4.jpg'),
(15, '網路安全與密碼學概論', 470, '', 'Behrouz A. Forouzan', 'Mc Graw Hill Education', '110116024', '2015-06-15 11:55:59', '2', '0', '', '5.jpg'),
(16, 'Database Systems Sixth Edition', 980, '', 'Ramez Elmasri , Shamkant B. Navathe', 'PEARSON ', '110116024', '2015-06-15 11:58:06', '2', '0', '', '6.jpg'),
(17, '最新C++程式語言', 420, '', '施威銘研究室', '旗標', '110116024', '2015-06-15 11:59:07', '1', '0', '', '7.jpg'),
(18, 'COMPUTER ORGANIZATION AND DESIGN', 870, '', 'David A. Patterson , John L. Hennessy', 'MORGAN KAUFMANN', '110116024', '2015-06-15 12:00:56', '2', '0', '', '8.jpg'),
(19, '感測與定位實戰 ZigBee', 550, '', '劉建源 , 薛文彬', '僑高科技有限公司', '110116024', '2015-06-15 12:02:28', '2', '0', '', '9.gif'),
(20, 'EstiNet網路模擬實驗與應用', 680, '', '王協源 , 陳永昇 , 柯志亨', '旗標', '110116024', '2015-06-15 12:03:34', '2', '0', '', '10.jpg'),
(21, 'Android App 程式設計教本之無痛起步 第2版', 480, '', '施威銘主編', '旗標', '110116024', '2015-06-15 12:05:01', '1', '0', '', '11.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--
-- 建立時間: 2015 �?06 ??14 ??10:37
--

CREATE TABLE IF NOT EXISTS `users` (
  `account` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `encrypted_password` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  UNIQUE KEY `account` (`account`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `users`
--

INSERT INTO `users` (`account`, `name`, `email`, `encrypted_password`, `salt`) VALUES
('110116004', '110116004', '110116004', 'ACNY0R0YJSztynNOu2A6G1mhg701ZGViZThlM2E1', '5debe8e3a5'),
('110116024', '110116024', '110116024', 'BC8SpbX7ajE5qxsheNeUdKwPH/IzNDlkN2EwY2Yx', '349d7a0cf1'),
('123', '123', '123', 'ZHH8RBMQWXkJWZyjuJKMG65n2ao5YzUwOGEyYzNj', '9c508a2c3c'),
('12345678', '12345678', '12345678', 'c+W7+4H0sA5EteLfbe/qXir6s8RlOGQ1MGQ5NjU5', 'e8d50d9659');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
