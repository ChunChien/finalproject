-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-06-06 21:13:52
-- 伺服器版本： 10.4.22-MariaDB
-- PHP 版本： 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `project`
--

-- --------------------------------------------------------

--
-- 資料表結構 `hospital`
--

CREATE TABLE `hospital` (
  `uNo` int(11) NOT NULL,
  `account` varchar(10) NOT NULL,
  `psw` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `county` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `uName` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `hospital`
--

INSERT INTO `hospital` (`uNo`, `account`, `psw`, `county`, `uName`, `email`) VALUES
(6, 'kl123', 'kl123', '屏東縣', '國仁醫院', 'a0961151089@gmail.com'),
(9, 'long123', 'long123', '高雄市', '高雄榮民總醫院', 'a1074350@mail.nuk.edu.tw'),
(10, '671d7b', '59ffe4c5', '屏東縣', '晨安診所', 'chienforgame@gmail.com'),
(11, 'tseng', '123', '屏東縣', '曾競鋒診所', 'a1074350@mail.nuk.edu.tw'),
(13, 'ce0e85', '0000', '屏東縣', '寶健醫院', 'a0961151089@gmail.com');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`uNo`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `hospital`
--
ALTER TABLE `hospital`
  MODIFY `uNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
