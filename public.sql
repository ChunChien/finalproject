-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-06-06 21:13:59
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
-- 資料表結構 `public`
--

CREATE TABLE `public` (
  `uNo` int(11) NOT NULL,
  `county` varchar(100) NOT NULL,
  `member` varchar(100) NOT NULL,
  `date1` date NOT NULL,
  `uName` text NOT NULL,
  `gender` text NOT NULL,
  `age` int(11) NOT NULL,
  `tel` text NOT NULL,
  `place` varchar(100) NOT NULL,
  `height` int(11) NOT NULL,
  `uweight` int(11) NOT NULL,
  `date2` date NOT NULL,
  `glucose` float NOT NULL,
  `rice` int(11) NOT NULL,
  `drink` int(11) NOT NULL,
  `sugar` int(11) NOT NULL,
  `snack` int(11) NOT NULL,
  `cake` int(11) NOT NULL,
  `sport` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `public`
--

INSERT INTO `public` (`uNo`, `county`, `member`, `date1`, `uName`, `gender`, `age`, `tel`, `place`, `height`, `uweight`, `date2`, `glucose`, `rice`, `drink`, `sugar`, `snack`, `cake`, `sport`) VALUES
(1, '高雄市', '高雄榮民總醫院', '2022-04-29', '曾淳謙', '女', 21, '0961151089', '屏東縣屏東市廣勝路391巷26號', 165, 56, '2022-04-29', 88, 2, 2, 2, 2, 2, 2),
(3, '屏東縣', '國仁醫院', '2022-05-17', '曾淳謙', '女', 22, '0961151089', '屏東縣屏東市廣勝路391巷26號', 165, 55, '2022-05-09', 89, 3, 3, 2, 3, 4, 3),
(4, '屏東縣', '國仁醫院', '2022-05-18', '大餅', '男', 45, '0987654321', '總A的家', 178, 85, '2022-05-16', 90, 5, 2, 0, 2, 2, 5),
(5, '屏東縣', '國仁醫院', '2022-05-26', '凱凱', '男', 21, '0978657456', '二壘可愛動物區', 168, 79, '2022-05-24', 89, 4, 4, 2, 2, 2, 5),
(6, '屏東縣', '國仁醫院', '2022-05-31', 'A蝦嘎痛', '男', 33, '1234567', 'asdfg', 177, 130, '2022-05-31', 130, 5, 4, 3, 5, 4, 2),
(7, '屏東縣', '國仁醫院', '2022-05-17', '王曉明', '男', 78, '2351297683', 'asdgji', 176, 90, '2022-05-21', 128, 5, 4, 5, 4, 3, 5),
(8, '屏東縣', '曾競鋒診所', '2022-06-02', '梅花2', '男', 24, '1234567', '中外野里長辦公室', 173, 89, '2022-06-01', 100, 5, 4, 3, 2, 2, 3);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `public`
--
ALTER TABLE `public`
  ADD PRIMARY KEY (`uNo`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `public`
--
ALTER TABLE `public`
  MODIFY `uNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
