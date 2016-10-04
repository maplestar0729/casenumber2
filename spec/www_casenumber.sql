-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016-09-17 07:22:04
-- 伺服器版本: 10.1.16-MariaDB
-- PHP 版本： 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `www_casenumber`
--

-- --------------------------------------------------------

--
-- 資料表結構 `97`
--

CREATE TABLE `97` (
  `NO` int(3) NOT NULL,
  `caseno` char(6) NOT NULL,
  `date` int(4) NOT NULL,
  `no_en` char(2) NOT NULL,
  `no_n` int(5) NOT NULL,
  `name` text NOT NULL,
  `money` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `97`
--

INSERT INTO `97` (`NO`, `caseno`, `date`, `no_en`, `no_n`, `name`, `money`) VALUES
(1, 'B9723', 0, 'B', 9723, '北林-劉正雄', 103000),
(2, 'B9784', 0, 'B', 9784, '碁泰A區', 80260),
(3, 'B9711', 0, 'B', 9711, '鶴岡教會(移至B9815)', 0),
(4, 'B9783', 0, 'B', 9783, '碁泰-林森段12樓', 80000),
(5, 'B9781', 0, 'B', 9781, '碁泰-嘉平段1488農建地', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `98`
--

CREATE TABLE `98` (
  `NO` int(3) NOT NULL,
  `caseno` char(6) NOT NULL,
  `date` int(4) NOT NULL,
  `no_en` char(2) NOT NULL,
  `no_n` int(5) NOT NULL,
  `name` text NOT NULL,
  `money` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `98`
--

INSERT INTO `98` (`NO`, `caseno`, `date`, `no_en`, `no_n`, `name`, `money`) VALUES
(1, 'B9813', 0, 'B', 9813, '鳳林楊秋玲(林正盛)農舍', 130000),
(2, 'B9815', 0, 'B', 9815, '鶴岡教會-第一期(原B711)', 468000),
(4, 'B9826', 0, 'B', 9826, '七星潭-盧敏慧', 151000),
(5, 'B9830', 0, 'B', 9830, '酸菜包裝廠', 35000),
(6, 'B9831', 0, 'B', 9831, '花工-廁所整修', 178818),
(7, 'B9827', 0, 'B', 9827, '老人之家-失智中心', 207841),
(8, 'B9819', 0, 'B', 9819, '長春養護之家-設立規劃', 200000),
(9, 'F9851', 0, 'F', 9851, '中國信託-公園路-變更使用(東花蓮)', 680000),
(10, 'R9801', 0, 'R', 9801, '張貞嬌(鄭招惠)農舍', 176500),
(11, 'R9819', 0, 'R', 9819, '南華國小-變更使用', 120000),
(12, 'R9824', 0, 'R', 9824, '宜昌國中-噪音防治', 85853),
(13, 'R9826', 0, 'R', 9826, '佳民-林守金(梁寶成)', 30000),
(14, 'R9828', 0, 'R', 9828, '和平國小-變更使用', 65000),
(16, 'R9816', 0, 'R', 9816, '壽豐廖先生吳全段農舍(麗琴)', 78000),
(17, 'R9817', 0, 'R', 9817, '玉里-龔文俊-忠孝路', 351100),
(18, 'R9818', 0, 'R', 9818, '壽豐-柯學初', 107112),
(19, 'R9827', 0, 'R', 9827, '東華段-陳先生2戶(麗琴)', 122000),
(20, 'R9830', 0, 'R', 9830, '壽豐-吳全段301號農舍(林萬發)', 118000),
(21, 'F9807', 0, 'F', 9807, '玉里-龔文俊農業生產設施', 370000),
(22, 'B9818', 0, 'B', 9818, '章正琛-瀝青工廠', 80000),
(23, 'L9802', 0, 'L', 9802, '陳忠群農舍', 50000),
(24, 'R9829', 0, 'R', 9829, '公安檢查-長生安養', 8000),
(25, 'B9824', 0, 'B', 9824, '豐山-張相鈞2戶店舖', 22000),
(26, 'B9834', 0, 'B', 9834, '花農-3階段無障礙', 43712),
(27, 'R9806', 0, 'R', 9806, '明義附幼-無障礙', 31780),
(28, 'B9832', 0, 'B', 9832, '四維高中-3階段無障礙概算', 53210),
(29, 'B9820', 0, 'B', 9820, '花工-98年2階無障礙', 74433),
(30, 'B9822', 0, 'B', 9822, '花農-98年2階無障礙', 98500),
(31, 'F9802', 0, 'F', 9802, '富源洪主任自用農舍', 81000),
(32, 'B9833', 0, 'B', 9833, '花工屋頂防漏工程', 98000),
(33, 'R9831', 0, 'R', 9831, '廖本隆-農業生產設施', 38000);

-- --------------------------------------------------------

--
-- 資料表結構 `caseindex_caseno`
--

CREATE TABLE `caseindex_caseno` (
  `id` int(10) NOT NULL,
  `caseno` varchar(6) NOT NULL,
  `year` int(3) NOT NULL,
  `date` varchar(10) NOT NULL,
  `no_en` varchar(6) NOT NULL,
  `no_n` int(4) NOT NULL,
  `name` text NOT NULL,
  `title1_state` int(1) NOT NULL COMMENT '0:無 1:完成 2:不需要',
  `title1` varchar(10) NOT NULL,
  `title2_state` int(1) NOT NULL COMMENT '0:無 1:完成 2:不需要',
  `title2` varchar(10) NOT NULL,
  `title3_state` int(1) NOT NULL COMMENT '0:無 1:完成 2:不需要',
  `title3` varchar(10) NOT NULL,
  `title4_state` int(1) NOT NULL COMMENT '0:無 1:完成 2:不需要',
  `title4` varchar(10) NOT NULL,
  `title5_state` int(1) NOT NULL COMMENT '0:無 1:完成 2:不需要',
  `title5` varchar(10) NOT NULL,
  `title6_state` int(1) NOT NULL COMMENT '0:無 1:完成 2:不需要',
  `title6` varchar(10) NOT NULL,
  `title7_state` int(1) NOT NULL COMMENT '0:無 1:完成 2:不需要',
  `title7` varchar(10) NOT NULL,
  `title8_state` int(1) NOT NULL COMMENT '0:無 1:完成 2:不需要',
  `title8` varchar(10) NOT NULL,
  `title9_state` int(1) NOT NULL COMMENT '0:無 1:完成 2:不需要',
  `title9` varchar(10) NOT NULL,
  `title10_state` int(1) NOT NULL COMMENT '0:無 1:完成 2:不需要',
  `title10` varchar(10) NOT NULL,
  `title11_state` int(1) NOT NULL COMMENT '0:無 1:完成 2:不需要',
  `title11` varchar(10) NOT NULL,
  `title12_state` int(1) NOT NULL COMMENT '0:無 1:完成 2:不需要',
  `title12` varchar(10) NOT NULL,
  `title13_state` int(1) NOT NULL COMMENT '0:無 1:完成 2:不需要',
  `title13` varchar(10) NOT NULL,
  `title14_state` int(1) NOT NULL COMMENT '0:無 1:完成 2:不需要',
  `title14` varchar(10) NOT NULL,
  `title15_state` int(1) NOT NULL COMMENT '0:無 1:完成 2:不需要',
  `title15` varchar(10) NOT NULL,
  `title16_state` int(1) NOT NULL COMMENT '0:無 1:完成 2:不需要',
  `title16` varchar(10) NOT NULL,
  `title17_state` int(1) NOT NULL COMMENT '0:無 1:完成 2:不需要',
  `title17` varchar(10) NOT NULL,
  `title18_state` int(1) NOT NULL COMMENT '0:無 1:完成 2:不需要',
  `title18` varchar(10) NOT NULL,
  `title19_state` int(1) NOT NULL COMMENT '0:無 1:完成 2:不需要',
  `title19` varchar(10) NOT NULL,
  `title20_state` int(1) NOT NULL COMMENT '0:無 1:完成 2:不需要',
  `title20` varchar(10) NOT NULL,
  `Note` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `caseindex_caseno`
--

INSERT INTO `caseindex_caseno` (`id`, `caseno`, `year`, `date`, `no_en`, `no_n`, `name`, `title1_state`, `title1`, `title2_state`, `title2`, `title3_state`, `title3`, `title4_state`, `title4`, `title5_state`, `title5`, `title6_state`, `title6`, `title7_state`, `title7`, `title8_state`, `title8`, `title9_state`, `title9`, `title10_state`, `title10`, `title11_state`, `title11`, `title12_state`, `title12`, `title13_state`, `title13`, `title14_state`, `title14`, `title15_state`, `title15`, `title16_state`, `title16`, `title17_state`, `title17`, `title18_state`, `title18`, `title19_state`, `title19`, `title20_state`, `title20`, `Note`) VALUES
(1, 'A0501', 105, '0000-00-00', 'A', 501, '1234567', 0, '105/3/17', 2, '105/3/22', 0, '105/02/25', 0, '', 0, '', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', '12345'),
(4, 'B0501', 105, '0000-00-00', 'B', 501, 'wrtsfgsjj', 0, '', 0, '', 0, '105/2/24', 0, '105/4/11', 0, '', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', 0, '0000-00-00', ''),
(27, 'Q0509', 105, '', 'Q', 509, 'adfjljlka', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 'daf'),
(21, 'A0401', 104, '', 'A', 401, 'rwar', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', ''),
(25, 'B0502', 105, '', 'B', 502, 'test', 0, '', 0, '', 0, '', 0, '105/3/30', 2, '105/3/29', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', ''),
(22, 'R9501', 95, '', 'R', 9501, 'rwar', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', ''),
(26, 'Q0508', 105, '', 'Q', 508, 'QQQQQ', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 1, '', 'aaaaaa'),
(20, 'A0504', 105, '', 'A', 504, 'tsetrwaraatestet', 0, '', 0, '105/3/16', 0, '', 0, '', 1, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '');

-- --------------------------------------------------------

--
-- 資料表結構 `caseindex_caseno_undecided`
--

CREATE TABLE `caseindex_caseno_undecided` (
  `id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `caseindex_caseno_undecided`
--

INSERT INTO `caseindex_caseno_undecided` (`id`, `year`, `name`) VALUES
(7, 102, 'rwar'),
(6, 105, 'test'),
(5, 104, 'aaaa'),
(8, 98, 'rwar');

-- --------------------------------------------------------

--
-- 資料表結構 `caseindex_title_edit`
--

CREATE TABLE `caseindex_title_edit` (
  `id` int(2) NOT NULL,
  `sort` int(2) NOT NULL,
  `title_name` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `caseindex_title_edit`
--

INSERT INTO `caseindex_title_edit` (`id`, `sort`, `title_name`) VALUES
(0, 2, 'a'),
(1, 0, 'b'),
(2, 1, 'C'),
(3, 3, 'f'),
(4, 4, 'xfgh'),
(5, 5, ''),
(6, 6, 'g'),
(7, 7, 'm'),
(8, 8, 'dghmgh'),
(9, 9, 'sash'),
(10, 10, ''),
(11, 11, ''),
(12, 12, ''),
(13, 13, ''),
(14, 14, ''),
(15, 15, ''),
(16, 16, ''),
(17, 17, ''),
(18, 18, ''),
(19, 19, '');

-- --------------------------------------------------------

--
-- 資料表結構 `head`
--

CREATE TABLE `head` (
  `NO` int(2) NOT NULL,
  `name` char(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `head`
--

INSERT INTO `head` (`NO`, `name`) VALUES
(1, '規費及罰款-建照'),
(2, '規費及罰款-變更設計'),
(3, '晒圖 刻印 影印等'),
(4, '航高'),
(5, '使照-跑照費'),
(6, '使照-規費及罰款'),
(98, '隨案成本'),
(99, '代收轉付'),
(7, '其它應外加費用'),
(8, '複-結構計算'),
(9, '複-結構簽證'),
(10, '複-水電設計'),
(11, '複-水電簽證'),
(12, '建築線規費'),
(13, '稅金'),
(14, '公會規費'),
(15, '其它支出'),
(16, '匯款手續費'),
(19, '建照-跑照費'),
(20, '空污費'),
(21, '複-水電NCC'),
(22, '代書費'),
(23, '稅金-(公會)');

-- --------------------------------------------------------

--
-- 資料表結構 `head97`
--

CREATE TABLE `head97` (
  `NO` char(10) NOT NULL,
  `no_en` char(1) NOT NULL,
  `no_n` int(4) NOT NULL,
  `caseno` char(5) NOT NULL,
  `year` int(3) NOT NULL,
  `date` int(4) NOT NULL,
  `no2` int(3) NOT NULL,
  `head1` int(2) NOT NULL,
  `head2` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `head97`
--

INSERT INTO `head97` (`NO`, `no_en`, `no_n`, `caseno`, `year`, `date`, `no2`, `head1`, `head2`) VALUES
('', 'B', 9723, 'B9723', 98, 1230, 1, 1, 14),
('', 'B', 9723, 'B9723', 98, 1230, 2, 1, 1),
('', 'B', 9723, 'B9723', 98, 1230, 3, 1, 8),
('', 'B', 9723, 'B9723', 99, 101, 5, 1, 10),
('私98-21', 'B', 9723, 'B9723', 98, 814, 7, 2, 1),
('私98-34', 'B', 9723, 'B9723', 98, 1116, 8, 2, 2),
('私99-18', 'B', 9723, 'B9723', 99, 630, 10, 2, 3),
('', 'B', 9784, 'B9784', 99, 322, 1, 1, 13),
('私99-07', 'B', 9784, 'B9784', 99, 210, 3, 2, 1),
('私99-09', 'B', 9784, 'B9784', 99, 322, 4, 2, 2),
('', 'B', 9783, 'B9783', 99, 706, 1, 1, 2),
('', 'B', 9783, 'B9783', 99, 820, 2, 1, 13),
('私99-28', 'B', 9783, 'B9783', 99, 820, 4, 2, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `head98`
--

CREATE TABLE `head98` (
  `NO` char(10) NOT NULL,
  `no_en` char(1) NOT NULL,
  `no_n` int(4) NOT NULL,
  `caseno` char(5) NOT NULL,
  `year` int(3) NOT NULL,
  `date` int(4) NOT NULL,
  `no2` int(3) NOT NULL,
  `head1` int(2) NOT NULL,
  `head2` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `head98`
--

INSERT INTO `head98` (`NO`, `no_en`, `no_n`, `caseno`, `year`, `date`, `no2`, `head1`, `head2`) VALUES
('', 'B', 9813, 'B9813', 98, 1230, 1, 1, 12),
('', 'B', 9813, 'B9813', 98, 1230, 2, 1, 8),
('私98-27', 'B', 9813, 'B9813', 98, 604, 5, 2, 1),
('私98-28', 'B', 9813, 'B9813', 98, 1013, 6, 2, 2),
('私99-16', 'B', 9813, 'B9813', 99, 614, 8, 2, 3),
('', 'B', 9815, 'B9815', 99, 715, 1, 1, 7),
('私97-15', 'B', 9815, 'B9815', 97, 101, 2, 2, 1),
('私98-23', 'B', 9815, 'B9815', 98, 903, 3, 2, 2),
('', 'B', 9815, 'B9815', 100, 819, 4, 1, 15),
('', 'B', 9826, 'B9826', 99, 101, 1, 1, 4),
('', 'B', 9826, 'B9826', 99, 101, 2, 1, 15),
('', 'B', 9826, 'B9826', 99, 301, 4, 1, 7),
('', 'B', 9826, 'B9826', 99, 321, 5, 1, 13),
('', 'B', 9826, 'B9826', 99, 321, 6, 1, 14),
('', 'B', 9826, 'B9826', 99, 322, 7, 1, 14),
('', 'B', 9826, 'B9826', 99, 402, 8, 1, 1),
('', 'B', 9826, 'B9826', 99, 402, 9, 1, 1),
('', 'B', 9826, 'B9826', 99, 406, 10, 3, 0),
('', 'B', 9826, 'B9826', 99, 420, 11, 1, 13),
('', 'B', 9826, 'B9826', 99, 420, 12, 1, 14),
('', 'B', 9826, 'B9826', 99, 421, 13, 1, 8),
('私99-01', 'B', 9826, 'B9826', 99, 202, 16, 2, 1),
('私99-10', 'B', 9826, 'B9826', 99, 407, 18, 2, 2),
('私99-40', 'B', 9830, 'B9830', 99, 1202, 1, 2, 1),
('', 'B', 9831, 'B9831', 99, 517, 1, 1, 13),
('', 'B', 9831, 'B9831', 99, 517, 2, 1, 15),
('公99-08', 'B', 9831, 'B9831', 99, 517, 4, 2, 1),
('', 'B', 9827, 'B9827', 98, 1201, 1, 1, 15),
('', 'B', 9827, 'B9827', 99, 101, 2, 1, 5),
('', 'B', 9827, 'B9827', 99, 708, 3, 1, 15),
('', 'B', 9827, 'B9827', 99, 1001, 5, 1, 15),
('', 'B', 9827, 'B9827', 99, 1117, 6, 1, 13),
('公99-26', 'B', 9827, 'B9827', 99, 1001, 8, 2, 1),
('公99-33', 'B', 9827, 'B9827', 99, 1117, 9, 2, 1),
('私98-35', 'B', 9819, 'B9819', 98, 1118, 1, 2, 1),
('', 'F', 9851, 'F9851', 99, 324, 1, 1, 8),
('', 'F', 9851, 'F9851', 99, 325, 2, 1, 15),
('', 'F', 9851, 'F9851', 99, 325, 3, 1, 15),
('', 'F', 9851, 'F9851', 99, 827, 4, 1, 12),
('', 'F', 9851, 'F9851', 99, 827, 5, 1, 15),
('', 'F', 9851, 'F9851', 99, 930, 6, 1, 1),
('', 'F', 9851, 'F9851', 99, 930, 7, 1, 14),
('', 'F', 9851, 'F9851', 99, 930, 8, 1, 15),
('', 'F', 9851, 'F9851', 99, 1025, 9, 1, 15),
('', 'F', 9851, 'F9851', 99, 1217, 10, 1, 13),
('', 'F', 9851, 'F9851', 99, 1217, 11, 1, 15),
('', 'F', 9851, 'F9851', 99, 1229, 12, 1, 6),
('', 'F', 9851, 'F9851', 99, 1229, 13, 1, 15),
('', 'F', 9851, 'F9851', 99, 1229, 14, 1, 15),
('', 'F', 9851, 'F9851', 99, 1229, 15, 1, 5),
('', 'F', 9851, 'F9851', 99, 1229, 17, 1, 15),
('私99-39', 'F', 9851, 'F9851', 99, 1217, 18, 2, 1),
('', 'R', 9801, 'R9801', 98, 1201, 1, 1, 1),
('', 'R', 9801, 'R9801', 98, 1201, 3, 1, 8),
('', 'R', 9801, 'R9801', 98, 1201, 4, 1, 7),
('', 'R', 9801, 'R9801', 98, 1201, 5, 1, 3),
('', 'R', 9801, 'R9801', 98, 1201, 6, 1, 7),
('', 'R', 9801, 'R9801', 98, 1201, 7, 1, 5),
('', 'R', 9801, 'R9801', 99, 324, 9, 1, 8),
('', 'R', 9801, 'R9801', 99, 726, 11, 1, 7),
('私98-12', 'R', 9801, 'R9801', 98, 303, 12, 2, 2),
('私98-13', 'R', 9801, 'R9801', 98, 303, 13, 2, 3),
('私98-10', 'R', 9801, 'R9801', 98, 504, 14, 2, 1),
('私99-24', 'R', 9801, 'R9801', 99, 726, 18, 2, 4),
('', 'R', 9819, 'R9819', 98, 1201, 1, 1, 11),
('', 'R', 9819, 'R9819', 98, 1201, 2, 1, 5),
('', 'R', 9819, 'R9819', 98, 1201, 3, 1, 15),
('', 'R', 9819, 'R9819', 98, 1201, 4, 1, 15),
('', 'R', 9819, 'R9819', 99, 301, 5, 1, 6),
('', 'R', 9819, 'R9819', 99, 315, 6, 1, 13),
('', 'R', 9819, 'R9819', 99, 315, 7, 1, 15),
('公99-06', 'R', 9819, 'R9819', 99, 315, 9, 2, 1),
('', 'R', 9824, 'R9824', 99, 618, 1, 1, 13),
('公99-09', 'R', 9824, 'R9824', 99, 618, 3, 2, 1),
('', 'R', 9826, 'R9826', 99, 401, 1, 1, 8),
('私99-14', 'R', 9826, 'R9826', 99, 430, 3, 2, 1),
('', 'R', 9828, 'R9828', 99, 1231, 1, 1, 13),
('公99-45', 'R', 9828, 'R9828', 99, 1231, 4, 2, 1),
('', 'R', 9816, 'R9816', 98, 1201, 1, 1, 12),
('', 'R', 9816, 'R9816', 98, 1201, 2, 1, 8),
('私98-31', 'R', 9816, 'R9816', 98, 1105, 4, 2, 1),
('', 'R', 9817, 'R9817', 98, 1201, 1, 1, 15),
('', 'R', 9817, 'R9817', 98, 1201, 2, 1, 12),
('', 'R', 9817, 'R9817', 98, 1201, 3, 1, 9),
('', 'R', 9817, 'R9817', 98, 1201, 4, 1, 14),
('', 'R', 9817, 'R9817', 98, 1201, 6, 1, 13),
('', 'R', 9817, 'R9817', 99, 101, 7, 1, 10),
('', 'R', 9817, 'R9817', 99, 1130, 8, 1, 10),
('', 'R', 9817, 'R9817', 99, 1216, 9, 1, 5),
('', 'R', 9817, 'R9817', 99, 1221, 10, 1, 13),
('', 'R', 9817, 'R9817', 100, 120, 11, 1, 14),
('', 'R', 9817, 'R9817', 100, 120, 12, 1, 13),
('私98-26', 'R', 9817, 'R9817', 98, 930, 13, 2, 1),
('私99-36', 'R', 9817, 'R9817', 99, 1201, 15, 2, 2),
('', 'R', 9818, 'R9818', 98, 1201, 1, 1, 7),
('', 'R', 9818, 'R9818', 98, 1201, 2, 1, 8),
('私98-40', 'R', 9818, 'R9818', 98, 1229, 6, 2, 1),
('', 'R', 9827, 'R9827', 98, 1201, 1, 1, 1),
('', 'R', 9827, 'R9827', 99, 101, 3, 1, 2),
('', 'R', 9827, 'R9827', 99, 101, 4, 1, 8),
('私98-39', 'R', 9827, 'R9827', 98, 1230, 5, 2, 1),
('私100-01', 'R', 9827, 'R9827', 100, 126, 7, 2, 4),
('', 'R', 9830, 'R9830', 99, 504, 1, 1, 1),
('', 'R', 9830, 'R9830', 99, 817, 2, 3, 0),
('私99-27', 'R', 9830, 'R9830', 99, 817, 3, 2, 1),
('', 'F', 9807, 'F9807', 98, 1201, 1, 1, 12),
('', 'F', 9807, 'F9807', 99, 101, 2, 1, 1),
('', 'F', 9807, 'F9807', 99, 706, 3, 1, 15),
('', 'F', 9807, 'F9807', 99, 805, 4, 1, 13),
('', 'F', 9807, 'F9807', 99, 817, 5, 1, 8),
('', 'F', 9807, 'F9807', 99, 823, 6, 1, 15),
('', 'F', 9807, 'F9807', 99, 831, 7, 1, 1),
('', 'F', 9807, 'F9807', 99, 1013, 9, 1, 13),
('私99-20', 'F', 9807, 'F9807', 99, 630, 10, 2, 1),
('私99-29', 'F', 9807, 'F9807', 99, 1001, 11, 2, 2),
('', 'F', 9807, 'F9807', 100, 602, 12, 1, 5),
('私00-09', 'F', 9807, 'F9807', 100, 601, 13, 2, 5),
('', 'F', 9807, 'F9807', 100, 601, 14, 1, 13),
('', 'F', 9807, 'F9807', 100, 601, 15, 3, 0),
('', 'F', 9807, 'F9807', 100, 601, 16, 4, 6),
('', 'B', 9818, 'B9818', 98, 1230, 1, 1, 7),
('', 'B', 9818, 'B9818', 99, 301, 3, 1, 7),
('私99-08', 'B', 9818, 'B9818', 99, 203, 4, 2, 1),
('私99-12', 'B', 9818, 'B9818', 99, 414, 6, 2, 2),
('', 'L', 9802, 'L9802', 99, 120, 1, 1, 5),
('私99-04', 'L', 9802, 'L9802', 99, 120, 3, 2, 1),
('私99-03', 'R', 9829, 'R9829', 99, 131, 1, 2, 1),
('', 'B', 9824, 'B9824', 99, 201, 1, 1, 14),
('', 'B', 9824, 'B9824', 99, 202, 3, 1, 10),
('', 'B', 9824, 'B9824', 99, 202, 4, 1, 11),
('私99-02', 'B', 9824, 'B9824', 99, 202, 6, 2, 1),
('', 'B', 9834, 'B9834', 99, 127, 1, 1, 13),
('公99-05', 'B', 9834, 'B9834', 99, 127, 3, 2, 1),
('', 'R', 9806, 'R9806', 99, 113, 2, 1, 13),
('公99-04', 'R', 9806, 'R9806', 99, 113, 3, 2, 1),
('', 'B', 9832, 'B9832', 99, 115, 2, 1, 13),
('公99-03', 'B', 9832, 'B9832', 99, 115, 3, 2, 1),
('', 'B', 9820, 'B9820', 99, 111, 1, 1, 13),
('', 'B', 9820, 'B9820', 99, 111, 2, 1, 15),
('公99-02', 'B', 9820, 'B9820', 99, 111, 4, 2, 1),
('', 'B', 9822, 'B9822', 99, 108, 2, 1, 13),
('公99-01', 'B', 9822, 'B9822', 99, 108, 3, 2, 1),
('', 'F', 9802, 'F9802', 99, 324, 1, 1, 8),
('', 'F', 9802, 'F9802', 99, 426, 3, 1, 1),
('', 'F', 9802, 'F9802', 99, 426, 4, 1, 15),
('', 'F', 9802, 'F9802', 99, 430, 5, 3, 0),
('私99-13', 'F', 9802, 'F9802', 99, 426, 7, 2, 1),
('', 'F', 9802, 'F9802', 100, 501, 8, 4, 5),
('', 'F', 9802, 'F9802', 100, 501, 9, 3, 0),
('', 'B', 9833, 'B9833', 99, 416, 1, 1, 13),
('公99-07', 'B', 9833, 'B9833', 99, 416, 3, 2, 1),
('', 'R', 9831, 'R9831', 100, 1201, 1, 1, 12),
('', 'R', 9831, 'R9831', 101, 113, 2, 1, 8),
('私01-09', 'R', 9831, 'R9831', 101, 229, 3, 2, 5),
('', 'B', 9815, 'B9815', 101, 806, 5, 1, 14),
('', 'B', 9815, 'B9815', 101, 806, 6, 4, 1),
('', 'B', 9815, 'B9815', 101, 1226, 7, 1, 10),
('', 'B', 9815, 'B9815', 101, 1226, 8, 1, 10);

-- --------------------------------------------------------

--
-- 資料表結構 `incohead`
--

CREATE TABLE `incohead` (
  `NO` int(2) NOT NULL,
  `name` char(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `incohead`
--

INSERT INTO `incohead` (`NO`, `name`) VALUES
(99, '代收轉付'),
(98, '隨案成本'),
(1, '請款一'),
(2, '請款二'),
(3, '請款三'),
(4, '請款四'),
(5, '尾款收入'),
(6, '雜項收入'),
(9, '變更設計收入'),
(10, '無實收');

-- --------------------------------------------------------

--
-- 資料表結構 `logbook_head`
--

CREATE TABLE `logbook_head` (
  `uid` int(11) NOT NULL,
  `sort_no` int(5) NOT NULL,
  `work_content` mediumtext COLLATE utf8_bin NOT NULL,
  `state` varchar(3) COLLATE utf8_bin NOT NULL,
  `type` varchar(3) COLLATE utf8_bin NOT NULL,
  `t_create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `t_create_id` varchar(20) COLLATE utf8_bin NOT NULL,
  `t_update_date` datetime NOT NULL,
  `t_update_id` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 資料表的匯出資料 `logbook_head`
--

INSERT INTO `logbook_head` (`uid`, `sort_no`, `work_content`, `state`, `type`, `t_create_date`, `t_create_id`, `t_update_date`, `t_update_id`) VALUES
(1, 3, 'ttttt222222', 'A', 'W', '2016-07-20 09:41:01', '', '0000-00-00 00:00:00', 'root'),
(2, 1, 'aaaaaa', 'A', 'D', '2016-07-24 10:46:38', '', '0000-00-00 00:00:00', ''),
(3, 22, 'asdfsdaf', 'A', 'W', '2016-07-24 12:00:15', 'root', '0000-00-00 00:00:00', 'root'),
(4, 6, 'aaaaaaaaaaaaaaaaa', 'A', 'W', '2016-07-24 13:36:26', 'root', '0000-00-00 00:00:00', 'root'),
(5, 5, 'wwwwwwwwwwwwww', 'A', 'W', '2016-07-24 13:37:57', 'root', '0000-00-00 00:00:00', 'root');

-- --------------------------------------------------------

--
-- 資料表結構 `logbook_log`
--

CREATE TABLE `logbook_log` (
  `NO` bigint(30) NOT NULL,
  `date` varchar(10) NOT NULL,
  `content` text,
  `member` varchar(1) NOT NULL,
  `caseno` varchar(5) DEFAULT NULL,
  `length` time NOT NULL,
  `type` varchar(5) NOT NULL,
  `remark` text NOT NULL,
  `remark2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `logbook_log`
--

INSERT INTO `logbook_log` (`NO`, `date`, `content`, `member`, `caseno`, `length`, `type`, `remark`, `remark2`) VALUES
(1, '105/05/25', 'testes', 'B', 'A0501', '00:00:05', '', '', ''),
(2, '105/05/15', 'test', 'B', 'A0501', '00:00:08', '', '', ''),
(3, '105/05/28', 'test', 'F', 'A0501', '00:00:05', '', '', ''),
(4, '105/05/20', '105/05/28', 'F', 'A0501', '00:00:08', '', '', ''),
(5, '105/05/29', 'aaa', 'F', 'A0501', '00:00:08', '', '', ''),
(6, '105/05/30', 'testt', 'B', 'A0501', '00:00:08', 'D', '', ''),
(7, '105/05/30', 'aaaa', 'B', 'A0501', '00:00:08', 'W', '', ''),
(8, '105/07/02', 'r', 'B', 'B0501', '00:00:08', 'D', '', ''),
(9, '105/07/02', 'r', 'B', 'A0501', '00:00:02', 'D', '', ''),
(10, '105/07/02', 'a', 'B', 'A0401', '00:00:05', 'D', '', ''),
(11, '105/07/02', 'a', 'B', 'A0504', '00:00:06', 'D', '', ''),
(13, '105/07/24', 'asdfsdaf', 'F', 'A0504', '01:55:00', 'W', '', ''),
(14, '105/07/24', 'aaaaaa', 'F', 'A0504', '01:55:00', 'D', '', ''),
(15, '105/07/24', 'ttttt222222', 'F', 'B0502', '01:20:00', 'W', '', ''),
(16, '105/07/24', 'ssssss', 'F', 'A0504', '01:55:00', 'L', '', ''),
(17, '105/07/24', 'aaaaaa', 'F', NULL, '01:55:00', 'D', '', ''),
(18, '105/07/24', 'ddddd', 'F', '', '01:02:00', 'L', '', ''),
(19, '105/07/24', 'ttttt222222', 'F', 'A0504', '10:02:00', 'W', '', ''),
(20, '105/08/14', 'aaaaaa', 'F', '', '01:02:00', 'D', '', ''),
(21, '105/08/14', 'aaaaaaaaaaaaaaaaa', 'F', 'B0502', '01:55:00', 'W', '', ''),
(22, '105/08/14', 'ttttt222222', 'F', '', '00:00:00', 'W', '', ''),
(23, '105/08/14', 'sss', 'F', '', '01:55:00', 'L', '', '');

-- --------------------------------------------------------

--
-- 資料表結構 `logbook_plan`
--

CREATE TABLE `logbook_plan` (
  `NO` bigint(30) NOT NULL,
  `date` varchar(20) NOT NULL,
  `content` text,
  `member` varchar(1) NOT NULL,
  `CreateID` varchar(2) NOT NULL,
  `caseno` varchar(5) DEFAULT NULL,
  `length` varchar(20) NOT NULL,
  `state` varchar(5) NOT NULL,
  `type` varchar(2) NOT NULL,
  `remark` text NOT NULL,
  `remark2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `logbook_plan`
--

INSERT INTO `logbook_plan` (`NO`, `date`, `content`, `member`, `CreateID`, `caseno`, `length`, `state`, `type`, `remark`, `remark2`) VALUES
(1, '105/08/25', 'test', 'F', 'F', 'R0501', '00:00:00', 'A', 'D', 'tttt', ''),
(2, '105/08/25', 'qqq', 'B', 'F', 'B0502', '', 'D', 'W', 'qqq', ''),
(3, '105/08/25', 'aaaaaa', 'B', 'F', '', '', 'D', 'D', '', ''),
(4, '', '', 'L', 'F', '', '', 'B', 'L', '', ''),
(5, '', 'wwwwwwwwwwwwww', 'Q', 'F', 'B0502', '', 'B', 'W', 't1', ''),
(6, '', 'aaaaaa', 'B', 'F', '', '', 'B', 'D', 'T2', ''),
(7, '', 'ttttt222222', 'B', 'B', '', '', 'D', 'W', '', ''),
(8, '', 'ttttt222222', 'B', 'B', '', '', 'B', 'W', '', '');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `EN` char(2) NOT NULL,
  `name` char(8) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `member`
--

INSERT INTO `member` (`EN`, `name`, `status`) VALUES
('B', '惠智', 'Y'),
('F', '桂芳', 'Y'),
('Q', '典運', 'Y'),
('R', '維玲', 'Y'),
('D', '鑑估及其他', 'O'),
('L', '致寰', 'Y');

-- --------------------------------------------------------

--
-- 資料表結構 `punch_day`
--

CREATE TABLE `punch_day` (
  `NO` bigint(20) NOT NULL,
  `member` varchar(10) NOT NULL,
  `time` datetime NOT NULL,
  `work_status` varchar(5) DEFAULT NULL,
  `status` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `punch_day`
--

INSERT INTO `punch_day` (`NO`, `member`, `time`, `work_status`, `status`) VALUES
(1, 'D', '2016-05-25 15:25:24', '1', '0'),
(2, 'D', '2016-05-25 23:57:20', '1', '0');

-- --------------------------------------------------------

--
-- 資料表結構 `tab_b9711`
--

CREATE TABLE `tab_b9711` (
  `NO` int(3) NOT NULL,
  `incono` char(10) NOT NULL,
  `year` int(3) NOT NULL,
  `date` int(4) NOT NULL,
  `head1` int(3) NOT NULL,
  `head2` int(3) NOT NULL,
  `in` int(10) NOT NULL,
  `out` int(10) NOT NULL,
  `other` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `tab_b9723`
--

CREATE TABLE `tab_b9723` (
  `NO` int(3) NOT NULL,
  `incono` char(10) NOT NULL,
  `year` int(3) NOT NULL,
  `date` int(4) NOT NULL,
  `head1` int(3) NOT NULL,
  `head2` int(3) NOT NULL,
  `in` int(10) NOT NULL,
  `out` int(10) NOT NULL,
  `other` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `tab_b9723`
--

INSERT INTO `tab_b9723` (`NO`, `incono`, `year`, `date`, `head1`, `head2`, `in`, `out`, `other`) VALUES
(1, '', 98, 1230, 1, 14, 0, 1845, ''),
(2, '', 98, 1230, 1, 1, 0, 684, ''),
(3, '', 98, 1230, 1, 8, 0, 2000, ''),
(5, '', 99, 101, 1, 10, 0, 4000, 'NCC-小范'),
(7, '私98-21', 98, 814, 2, 1, 30000, 0, ''),
(8, '私98-34', 98, 1116, 2, 2, 55000, 0, ''),
(10, '私99-18', 99, 630, 2, 3, 18000, 0, '尾款14000+NCC');

-- --------------------------------------------------------

--
-- 資料表結構 `tab_b9781`
--

CREATE TABLE `tab_b9781` (
  `NO` int(3) NOT NULL,
  `incono` char(10) NOT NULL,
  `year` int(3) NOT NULL,
  `date` int(4) NOT NULL,
  `head1` int(3) NOT NULL,
  `head2` int(3) NOT NULL,
  `in` int(10) NOT NULL,
  `out` int(10) NOT NULL,
  `other` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `tab_b9783`
--

CREATE TABLE `tab_b9783` (
  `NO` int(3) NOT NULL,
  `incono` char(10) NOT NULL,
  `year` int(3) NOT NULL,
  `date` int(4) NOT NULL,
  `head1` int(3) NOT NULL,
  `head2` int(3) NOT NULL,
  `in` int(10) NOT NULL,
  `out` int(10) NOT NULL,
  `other` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `tab_b9783`
--

INSERT INTO `tab_b9783` (`NO`, `incono`, `year`, `date`, `head1`, `head2`, `in`, `out`, `other`) VALUES
(1, '', 99, 706, 1, 2, 0, 15000, ''),
(2, '', 99, 820, 1, 13, 0, 8000, ''),
(4, '私99-28', 99, 820, 2, 1, 80000, 0, '變更設計');

-- --------------------------------------------------------

--
-- 資料表結構 `tab_b9784`
--

CREATE TABLE `tab_b9784` (
  `NO` int(3) NOT NULL,
  `incono` char(10) NOT NULL,
  `year` int(3) NOT NULL,
  `date` int(4) NOT NULL,
  `head1` int(3) NOT NULL,
  `head2` int(3) NOT NULL,
  `in` int(10) NOT NULL,
  `out` int(10) NOT NULL,
  `other` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `tab_b9784`
--

INSERT INTO `tab_b9784` (`NO`, `incono`, `year`, `date`, `head1`, `head2`, `in`, `out`, `other`) VALUES
(1, '', 99, 322, 1, 13, 0, 2026, '業主自繳'),
(3, '私99-07', 99, 210, 2, 1, 60000, 0, 'A3 A5變更'),
(4, '私99-09', 99, 322, 2, 2, 20260, 0, '');

-- --------------------------------------------------------

--
-- 資料表結構 `tab_b9813`
--

CREATE TABLE `tab_b9813` (
  `NO` int(3) NOT NULL,
  `incono` char(10) NOT NULL,
  `year` int(3) NOT NULL,
  `date` int(4) NOT NULL,
  `head1` int(3) NOT NULL,
  `head2` int(3) NOT NULL,
  `in` int(10) NOT NULL,
  `out` int(10) NOT NULL,
  `other` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `tab_b9813`
--

INSERT INTO `tab_b9813` (`NO`, `incono`, `year`, `date`, `head1`, `head2`, `in`, `out`, `other`) VALUES
(1, '', 98, 1230, 1, 12, 0, 450, ''),
(2, '', 98, 1230, 1, 8, 0, 5300, ''),
(5, '私98-27', 98, 604, 2, 1, 68000, 0, ''),
(6, '私98-28', 98, 1013, 2, 2, 50000, 0, ''),
(8, '私99-16', 99, 614, 2, 3, 12000, 0, '尾款');

-- --------------------------------------------------------

--
-- 資料表結構 `tab_b9815`
--

CREATE TABLE `tab_b9815` (
  `NO` int(3) NOT NULL,
  `incono` char(10) NOT NULL,
  `year` int(3) NOT NULL,
  `date` int(4) NOT NULL,
  `head1` int(3) NOT NULL,
  `head2` int(3) NOT NULL,
  `in` int(10) NOT NULL,
  `out` int(10) NOT NULL,
  `other` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `tab_b9815`
--

INSERT INTO `tab_b9815` (`NO`, `incono`, `year`, `date`, `head1`, `head2`, `in`, `out`, `other`) VALUES
(1, '', 99, 715, 1, 7, 0, 15000, '東亞測量'),
(2, '私97-15', 97, 101, 2, 1, 93600, 0, ''),
(3, '私98-23', 98, 903, 2, 2, 93600, 0, ''),
(4, '', 100, 819, 1, 15, 0, 15000, '子午測量簽證費'),
(5, '', 101, 806, 1, 14, 0, 4788, ''),
(6, '', 101, 806, 4, 1, 0, 2660, ''),
(7, '', 101, 1226, 1, 10, 0, 40500, '90% 含簽證'),
(8, '', 101, 1226, 1, 10, 0, 4500, '10%稅');

-- --------------------------------------------------------

--
-- 資料表結構 `tab_b9818`
--

CREATE TABLE `tab_b9818` (
  `NO` int(3) NOT NULL,
  `incono` char(10) NOT NULL,
  `year` int(3) NOT NULL,
  `date` int(4) NOT NULL,
  `head1` int(3) NOT NULL,
  `head2` int(3) NOT NULL,
  `in` int(10) NOT NULL,
  `out` int(10) NOT NULL,
  `other` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `tab_b9818`
--

INSERT INTO `tab_b9818` (`NO`, `incono`, `year`, `date`, `head1`, `head2`, `in`, `out`, `other`) VALUES
(1, '', 98, 1230, 1, 7, 0, 20000, '施明仁檢測費'),
(3, '', 99, 301, 1, 7, 0, 500, '結構安全鑑定報告書3本'),
(4, '私99-08', 99, 203, 2, 1, 20000, 0, '章建築師拿來'),
(6, '私99-12', 99, 414, 2, 2, 60000, 0, '繪圖及鑑定報告');

-- --------------------------------------------------------

--
-- 資料表結構 `tab_b9819`
--

CREATE TABLE `tab_b9819` (
  `NO` int(3) NOT NULL,
  `incono` char(10) NOT NULL,
  `year` int(3) NOT NULL,
  `date` int(4) NOT NULL,
  `head1` int(3) NOT NULL,
  `head2` int(3) NOT NULL,
  `in` int(10) NOT NULL,
  `out` int(10) NOT NULL,
  `other` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `tab_b9819`
--

INSERT INTO `tab_b9819` (`NO`, `incono`, `year`, `date`, `head1`, `head2`, `in`, `out`, `other`) VALUES
(1, '私98-35', 98, 1118, 2, 1, 35000, 0, '');

-- --------------------------------------------------------

--
-- 資料表結構 `tab_b9820`
--

CREATE TABLE `tab_b9820` (
  `NO` int(3) NOT NULL,
  `incono` char(10) NOT NULL,
  `year` int(3) NOT NULL,
  `date` int(4) NOT NULL,
  `head1` int(3) NOT NULL,
  `head2` int(3) NOT NULL,
  `in` int(10) NOT NULL,
  `out` int(10) NOT NULL,
  `other` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `tab_b9820`
--

INSERT INTO `tab_b9820` (`NO`, `incono`, `year`, `date`, `head1`, `head2`, `in`, `out`, `other`) VALUES
(1, '', 99, 111, 1, 13, 0, 7443, ''),
(2, '', 99, 111, 1, 15, 0, 30, '匯款匯費'),
(4, '公99-02', 99, 111, 2, 1, 74433, 0, '');

-- --------------------------------------------------------

--
-- 資料表結構 `tab_b9822`
--

CREATE TABLE `tab_b9822` (
  `NO` int(3) NOT NULL,
  `incono` char(10) NOT NULL,
  `year` int(3) NOT NULL,
  `date` int(4) NOT NULL,
  `head1` int(3) NOT NULL,
  `head2` int(3) NOT NULL,
  `in` int(10) NOT NULL,
  `out` int(10) NOT NULL,
  `other` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `tab_b9822`
--

INSERT INTO `tab_b9822` (`NO`, `incono`, `year`, `date`, `head1`, `head2`, `in`, `out`, `other`) VALUES
(2, '', 99, 108, 1, 13, 0, 9850, ''),
(3, '公99-01', 99, 108, 2, 1, 98500, 0, '');

-- --------------------------------------------------------

--
-- 資料表結構 `tab_b9824`
--

CREATE TABLE `tab_b9824` (
  `NO` int(3) NOT NULL,
  `incono` char(10) NOT NULL,
  `year` int(3) NOT NULL,
  `date` int(4) NOT NULL,
  `head1` int(3) NOT NULL,
  `head2` int(3) NOT NULL,
  `in` int(10) NOT NULL,
  `out` int(10) NOT NULL,
  `other` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `tab_b9824`
--

INSERT INTO `tab_b9824` (`NO`, `incono`, `year`, `date`, `head1`, `head2`, `in`, `out`, `other`) VALUES
(1, '', 99, 201, 1, 14, 0, 500, '變更設計'),
(3, '', 99, 202, 1, 10, 0, 8000, '小范NCC送審'),
(4, '', 99, 202, 1, 11, 0, 5000, '小范NCC規費'),
(6, '私99-02', 99, 202, 2, 1, 22000, 0, '變更設計及NCC簽證');

-- --------------------------------------------------------

--
-- 資料表結構 `tab_b9826`
--

CREATE TABLE `tab_b9826` (
  `NO` int(3) NOT NULL,
  `incono` char(10) NOT NULL,
  `year` int(3) NOT NULL,
  `date` int(4) NOT NULL,
  `head1` int(3) NOT NULL,
  `head2` int(3) NOT NULL,
  `in` int(10) NOT NULL,
  `out` int(10) NOT NULL,
  `other` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `tab_b9826`
--

INSERT INTO `tab_b9826` (`NO`, `incono`, `year`, `date`, `head1`, `head2`, `in`, `out`, `other`) VALUES
(1, '', 99, 101, 1, 4, 0, 8000, ''),
(2, '', 99, 101, 1, 15, 0, 15000, '鑑定檢測費'),
(4, '', 99, 301, 1, 7, 0, 940, '安全鑑定書5本'),
(5, '', 99, 321, 1, 13, 0, 4000, '鑑定-公會代扣'),
(6, '', 99, 321, 1, 14, 0, 3600, '安全鑑定'),
(7, '', 99, 322, 1, 14, 0, 500, '第二次審查費'),
(8, '', 99, 402, 1, 1, 0, 1602, '規費'),
(9, '', 99, 402, 1, 1, 0, 36049, '罰款'),
(10, '', 99, 406, 3, 0, 37651, 0, ''),
(11, '', 99, 420, 1, 13, 0, 7400, '公會扣'),
(12, '', 99, 420, 1, 14, 0, 4326, ''),
(13, '', 99, 421, 1, 8, 0, 3720, '馮老師'),
(16, '私99-01', 99, 202, 2, 1, 100000, 0, ''),
(18, '私99-10', 99, 407, 2, 2, 51000, 0, '');

-- --------------------------------------------------------

--
-- 資料表結構 `tab_b9827`
--

CREATE TABLE `tab_b9827` (
  `NO` int(3) NOT NULL,
  `incono` char(10) NOT NULL,
  `year` int(3) NOT NULL,
  `date` int(4) NOT NULL,
  `head1` int(3) NOT NULL,
  `head2` int(3) NOT NULL,
  `in` int(10) NOT NULL,
  `out` int(10) NOT NULL,
  `other` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `tab_b9827`
--

INSERT INTO `tab_b9827` (`NO`, `incono`, `year`, `date`, `head1`, `head2`, `in`, `out`, `other`) VALUES
(1, '', 98, 1201, 1, 15, 0, 725, '報告書'),
(2, '', 99, 101, 1, 5, 0, 100, ''),
(3, '', 99, 708, 1, 15, 0, 21500, '貝侖消防'),
(5, '', 99, 1001, 1, 15, 0, 20174, '室內裝修公會規費'),
(6, '', 99, 1117, 1, 13, 0, 18767, ''),
(8, '公99-26', 99, 1001, 2, 1, 20174, 0, ''),
(9, '公99-33', 99, 1117, 2, 1, 187667, 0, '');

-- --------------------------------------------------------

--
-- 資料表結構 `tab_b9830`
--

CREATE TABLE `tab_b9830` (
  `NO` int(3) NOT NULL,
  `incono` char(10) NOT NULL,
  `year` int(3) NOT NULL,
  `date` int(4) NOT NULL,
  `head1` int(3) NOT NULL,
  `head2` int(3) NOT NULL,
  `in` int(10) NOT NULL,
  `out` int(10) NOT NULL,
  `other` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `tab_b9830`
--

INSERT INTO `tab_b9830` (`NO`, `incono`, `year`, `date`, `head1`, `head2`, `in`, `out`, `other`) VALUES
(1, '私99-40', 99, 1202, 2, 1, 35000, 0, '章建築師支付');

-- --------------------------------------------------------

--
-- 資料表結構 `tab_b9831`
--

CREATE TABLE `tab_b9831` (
  `NO` int(3) NOT NULL,
  `incono` char(10) NOT NULL,
  `year` int(3) NOT NULL,
  `date` int(4) NOT NULL,
  `head1` int(3) NOT NULL,
  `head2` int(3) NOT NULL,
  `in` int(10) NOT NULL,
  `out` int(10) NOT NULL,
  `other` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `tab_b9831`
--

INSERT INTO `tab_b9831` (`NO`, `incono`, `year`, `date`, `head1`, `head2`, `in`, `out`, `other`) VALUES
(1, '', 99, 517, 1, 13, 0, 17882, ''),
(2, '', 99, 517, 1, 15, 0, 210, '花工帳目差'),
(4, '公99-08', 99, 517, 2, 1, 178818, 0, '');

-- --------------------------------------------------------

--
-- 資料表結構 `tab_b9832`
--

CREATE TABLE `tab_b9832` (
  `NO` int(3) NOT NULL,
  `incono` char(10) NOT NULL,
  `year` int(3) NOT NULL,
  `date` int(4) NOT NULL,
  `head1` int(3) NOT NULL,
  `head2` int(3) NOT NULL,
  `in` int(10) NOT NULL,
  `out` int(10) NOT NULL,
  `other` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `tab_b9832`
--

INSERT INTO `tab_b9832` (`NO`, `incono`, `year`, `date`, `head1`, `head2`, `in`, `out`, `other`) VALUES
(2, '', 99, 115, 1, 13, 0, 5321, ''),
(3, '公99-03', 99, 115, 2, 1, 53210, 0, '');

-- --------------------------------------------------------

--
-- 資料表結構 `tab_b9833`
--

CREATE TABLE `tab_b9833` (
  `NO` int(3) NOT NULL,
  `incono` char(10) NOT NULL,
  `year` int(3) NOT NULL,
  `date` int(4) NOT NULL,
  `head1` int(3) NOT NULL,
  `head2` int(3) NOT NULL,
  `in` int(10) NOT NULL,
  `out` int(10) NOT NULL,
  `other` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `tab_b9833`
--

INSERT INTO `tab_b9833` (`NO`, `incono`, `year`, `date`, `head1`, `head2`, `in`, `out`, `other`) VALUES
(1, '', 99, 416, 1, 13, 0, 9800, ''),
(3, '公99-07', 99, 416, 2, 1, 98000, 0, '');

-- --------------------------------------------------------

--
-- 資料表結構 `tab_b9834`
--

CREATE TABLE `tab_b9834` (
  `NO` int(3) NOT NULL,
  `incono` char(10) NOT NULL,
  `year` int(3) NOT NULL,
  `date` int(4) NOT NULL,
  `head1` int(3) NOT NULL,
  `head2` int(3) NOT NULL,
  `in` int(10) NOT NULL,
  `out` int(10) NOT NULL,
  `other` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `tab_b9834`
--

INSERT INTO `tab_b9834` (`NO`, `incono`, `year`, `date`, `head1`, `head2`, `in`, `out`, `other`) VALUES
(1, '', 99, 127, 1, 13, 0, 4371, ''),
(3, '公99-05', 99, 127, 2, 1, 43712, 0, '');

-- --------------------------------------------------------

--
-- 資料表結構 `tab_f9802`
--

CREATE TABLE `tab_f9802` (
  `NO` int(3) NOT NULL,
  `incono` char(10) NOT NULL,
  `year` int(3) NOT NULL,
  `date` int(4) NOT NULL,
  `head1` int(3) NOT NULL,
  `head2` int(3) NOT NULL,
  `in` int(10) NOT NULL,
  `out` int(10) NOT NULL,
  `other` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `tab_f9802`
--

INSERT INTO `tab_f9802` (`NO`, `incono`, `year`, `date`, `head1`, `head2`, `in`, `out`, `other`) VALUES
(1, '', 99, 324, 1, 8, 0, 5000, '王老師'),
(3, '', 99, 426, 1, 1, 0, 1208, '建築師給現金'),
(4, '', 99, 426, 1, 15, 0, 8000, '測量費'),
(5, '', 99, 430, 3, 0, 9208, 0, '結案'),
(7, '私99-13', 99, 426, 2, 1, 81000, 0, ''),
(8, '', 100, 501, 4, 5, 0, 34000, '麗琴'),
(9, '', 100, 501, 3, 0, 34000, 0, '');

-- --------------------------------------------------------

--
-- 資料表結構 `tab_f9807`
--

CREATE TABLE `tab_f9807` (
  `NO` int(3) NOT NULL,
  `incono` char(10) NOT NULL,
  `year` int(3) NOT NULL,
  `date` int(4) NOT NULL,
  `head1` int(3) NOT NULL,
  `head2` int(3) NOT NULL,
  `in` int(10) NOT NULL,
  `out` int(10) NOT NULL,
  `other` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `tab_f9807`
--

INSERT INTO `tab_f9807` (`NO`, `incono`, `year`, `date`, `head1`, `head2`, `in`, `out`, `other`) VALUES
(1, '', 98, 1201, 1, 12, 0, 450, ''),
(2, '', 99, 101, 1, 1, 0, 4507, '規費'),
(3, '', 99, 706, 1, 15, 0, 30000, '麗琴第一期款'),
(4, '', 99, 805, 1, 13, 0, 8000, ''),
(5, '', 99, 817, 1, 8, 0, 25395, '馮老師'),
(6, '', 99, 823, 1, 15, 0, 8500, '施明仁檢測費'),
(7, '', 99, 831, 1, 1, 0, 16530, '罰款'),
(9, '', 99, 1013, 1, 13, 0, 22400, ''),
(10, '私99-20', 99, 630, 2, 1, 80000, 0, ''),
(11, '私99-29', 99, 1001, 2, 2, 224000, 0, ''),
(12, '', 100, 602, 1, 5, 0, 57000, '麗琴'),
(13, '私00-09', 100, 601, 2, 5, 66000, 0, ''),
(14, '', 100, 601, 1, 13, 0, 6600, ''),
(15, '', 100, 601, 3, 0, 1025, 0, ''),
(16, '', 100, 601, 4, 6, 0, 1025, '');

-- --------------------------------------------------------

--
-- 資料表結構 `tab_f9851`
--

CREATE TABLE `tab_f9851` (
  `NO` int(3) NOT NULL,
  `incono` char(10) NOT NULL,
  `year` int(3) NOT NULL,
  `date` int(4) NOT NULL,
  `head1` int(3) NOT NULL,
  `head2` int(3) NOT NULL,
  `in` int(10) NOT NULL,
  `out` int(10) NOT NULL,
  `other` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `tab_f9851`
--

INSERT INTO `tab_f9851` (`NO`, `incono`, `year`, `date`, `head1`, `head2`, `in`, `out`, `other`) VALUES
(1, '', 99, 324, 1, 8, 0, 3000, '王老師'),
(2, '', 99, 325, 1, 15, 0, 20298, '室內裝修圖審一二樓'),
(3, '', 99, 325, 1, 15, 0, 15240, '室內裝修圖審三樓'),
(4, '', 99, 827, 1, 12, 0, 450, ''),
(5, '', 99, 827, 1, 15, 0, 480, '門牌'),
(6, '', 99, 930, 1, 1, 0, 2403, '電梯雜照'),
(7, '', 99, 930, 1, 14, 0, 2700, '電梯雜照公會繳費'),
(8, '', 99, 930, 1, 15, 0, 830, '洗照片'),
(9, '', 99, 1025, 1, 15, 0, 7650, '全益營造-雜照'),
(10, '', 99, 1217, 1, 13, 0, 68000, ''),
(11, '', 99, 1217, 1, 15, 0, 30, '匯費'),
(12, '', 99, 1229, 1, 6, 0, 200, ''),
(13, '', 99, 1229, 1, 15, 0, 500, '無損壞'),
(14, '', 99, 1229, 1, 15, 0, 348, '空污費'),
(15, '', 99, 1229, 1, 5, 0, 150000, ''),
(17, '', 99, 1229, 1, 15, 0, 200, '變使規費'),
(18, '私99-39', 99, 1217, 2, 1, 680000, 0, '');

-- --------------------------------------------------------

--
-- 資料表結構 `tab_r9801`
--

CREATE TABLE `tab_r9801` (
  `NO` int(3) NOT NULL,
  `incono` char(10) NOT NULL,
  `year` int(3) NOT NULL,
  `date` int(4) NOT NULL,
  `head1` int(3) NOT NULL,
  `head2` int(3) NOT NULL,
  `in` int(10) NOT NULL,
  `out` int(10) NOT NULL,
  `other` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `tab_r9801`
--

INSERT INTO `tab_r9801` (`NO`, `incono`, `year`, `date`, `head1`, `head2`, `in`, `out`, `other`) VALUES
(1, '', 98, 1201, 1, 1, 0, 2120, ''),
(3, '', 98, 1201, 1, 8, 0, 10000, ''),
(4, '', 98, 1201, 1, 7, 0, 4500, '代書費'),
(5, '', 98, 1201, 1, 3, 0, 1250, ''),
(6, '', 98, 1201, 1, 7, 0, 7000, '農舍起造人資料申辦'),
(7, '', 98, 1201, 1, 5, 0, 30000, ''),
(9, '', 99, 324, 1, 8, 0, 5000, '王老師'),
(11, '', 99, 726, 1, 7, 0, 5160, '麗琴代墊費用'),
(12, '私98-12', 98, 303, 2, 2, 7000, 0, ''),
(13, '私98-13', 98, 303, 2, 3, 4500, 0, ''),
(14, '私98-10', 98, 504, 2, 1, 90000, 0, ''),
(18, '私99-24', 99, 726, 2, 4, 75000, 0, '尾款');

-- --------------------------------------------------------

--
-- 資料表結構 `tab_r9806`
--

CREATE TABLE `tab_r9806` (
  `NO` int(3) NOT NULL,
  `incono` char(10) NOT NULL,
  `year` int(3) NOT NULL,
  `date` int(4) NOT NULL,
  `head1` int(3) NOT NULL,
  `head2` int(3) NOT NULL,
  `in` int(10) NOT NULL,
  `out` int(10) NOT NULL,
  `other` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `tab_r9806`
--

INSERT INTO `tab_r9806` (`NO`, `incono`, `year`, `date`, `head1`, `head2`, `in`, `out`, `other`) VALUES
(2, '', 99, 113, 1, 13, 0, 3178, ''),
(3, '公99-04', 99, 113, 2, 1, 31780, 0, '後續工程');

-- --------------------------------------------------------

--
-- 資料表結構 `tab_r9816`
--

CREATE TABLE `tab_r9816` (
  `NO` int(3) NOT NULL,
  `incono` char(10) NOT NULL,
  `year` int(3) NOT NULL,
  `date` int(4) NOT NULL,
  `head1` int(3) NOT NULL,
  `head2` int(3) NOT NULL,
  `in` int(10) NOT NULL,
  `out` int(10) NOT NULL,
  `other` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `tab_r9816`
--

INSERT INTO `tab_r9816` (`NO`, `incono`, `year`, `date`, `head1`, `head2`, `in`, `out`, `other`) VALUES
(1, '', 98, 1201, 1, 12, 0, 450, ''),
(2, '', 98, 1201, 1, 8, 0, 3500, ''),
(4, '私98-31', 98, 1105, 2, 1, 78000, 0, '');

-- --------------------------------------------------------

--
-- 資料表結構 `tab_r9817`
--

CREATE TABLE `tab_r9817` (
  `NO` int(3) NOT NULL,
  `incono` char(10) NOT NULL,
  `year` int(3) NOT NULL,
  `date` int(4) NOT NULL,
  `head1` int(3) NOT NULL,
  `head2` int(3) NOT NULL,
  `in` int(10) NOT NULL,
  `out` int(10) NOT NULL,
  `other` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `tab_r9817`
--

INSERT INTO `tab_r9817` (`NO`, `incono`, `year`, `date`, `head1`, `head2`, `in`, `out`, `other`) VALUES
(1, '', 98, 1201, 1, 15, 0, 4800, '檢測費'),
(2, '', 98, 1201, 1, 12, 0, 450, ''),
(3, '', 98, 1201, 1, 9, 0, 50000, ''),
(4, '', 98, 1201, 1, 14, 0, 7095, ''),
(6, '', 98, 1201, 1, 13, 0, 27610, ''),
(7, '', 99, 101, 1, 10, 0, 4500, 'NCC'),
(8, '', 99, 1130, 1, 10, 0, 4000, '小范-電信竣工'),
(9, '', 99, 1216, 1, 5, 0, 90000, '麗琴'),
(10, '', 99, 1221, 1, 13, 0, 7500, ''),
(11, '', 100, 120, 1, 14, 0, 3000, '鑑定規費'),
(12, '', 100, 120, 1, 13, 0, 2700, '鑑定稅金-公會扣'),
(13, '私98-26', 98, 930, 2, 1, 276100, 0, ''),
(15, '私99-36', 99, 1201, 2, 2, 75000, 0, '');

-- --------------------------------------------------------

--
-- 資料表結構 `tab_r9818`
--

CREATE TABLE `tab_r9818` (
  `NO` int(3) NOT NULL,
  `incono` char(10) NOT NULL,
  `year` int(3) NOT NULL,
  `date` int(4) NOT NULL,
  `head1` int(3) NOT NULL,
  `head2` int(3) NOT NULL,
  `in` int(10) NOT NULL,
  `out` int(10) NOT NULL,
  `other` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `tab_r9818`
--

INSERT INTO `tab_r9818` (`NO`, `incono`, `year`, `date`, `head1`, `head2`, `in`, `out`, `other`) VALUES
(1, '', 98, 1201, 1, 7, 0, 7112, '辦起造人規費'),
(2, '', 98, 1201, 1, 8, 0, 4635, ''),
(6, '私98-40', 98, 1229, 2, 1, 107112, 0, '');

-- --------------------------------------------------------

--
-- 資料表結構 `tab_r9819`
--

CREATE TABLE `tab_r9819` (
  `NO` int(3) NOT NULL,
  `incono` char(10) NOT NULL,
  `year` int(3) NOT NULL,
  `date` int(4) NOT NULL,
  `head1` int(3) NOT NULL,
  `head2` int(3) NOT NULL,
  `in` int(10) NOT NULL,
  `out` int(10) NOT NULL,
  `other` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `tab_r9819`
--

INSERT INTO `tab_r9819` (`NO`, `incono`, `year`, `date`, `head1`, `head2`, `in`, `out`, `other`) VALUES
(1, '', 98, 1201, 1, 11, 0, 18000, '消防'),
(2, '', 98, 1201, 1, 5, 0, 35000, '黃惠琴'),
(3, '', 98, 1201, 1, 15, 0, 10000, '室裝圖審'),
(4, '', 98, 1201, 1, 15, 0, 10000, '室裝竣工'),
(5, '', 99, 301, 1, 6, 0, 200, ''),
(6, '', 99, 315, 1, 13, 0, 12000, ''),
(7, '', 99, 315, 1, 15, 0, 3600, '逾期罰款'),
(9, '公99-06', 99, 315, 2, 1, 120000, 0, '');

-- --------------------------------------------------------

--
-- 資料表結構 `tab_r9824`
--

CREATE TABLE `tab_r9824` (
  `NO` int(3) NOT NULL,
  `incono` char(10) NOT NULL,
  `year` int(3) NOT NULL,
  `date` int(4) NOT NULL,
  `head1` int(3) NOT NULL,
  `head2` int(3) NOT NULL,
  `in` int(10) NOT NULL,
  `out` int(10) NOT NULL,
  `other` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `tab_r9824`
--

INSERT INTO `tab_r9824` (`NO`, `incono`, `year`, `date`, `head1`, `head2`, `in`, `out`, `other`) VALUES
(1, '', 99, 618, 1, 13, 0, 8585, ''),
(3, '公99-09', 99, 618, 2, 1, 85853, 0, '');

-- --------------------------------------------------------

--
-- 資料表結構 `tab_r9826`
--

CREATE TABLE `tab_r9826` (
  `NO` int(3) NOT NULL,
  `incono` char(10) NOT NULL,
  `year` int(3) NOT NULL,
  `date` int(4) NOT NULL,
  `head1` int(3) NOT NULL,
  `head2` int(3) NOT NULL,
  `in` int(10) NOT NULL,
  `out` int(10) NOT NULL,
  `other` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `tab_r9826`
--

INSERT INTO `tab_r9826` (`NO`, `incono`, `year`, `date`, `head1`, `head2`, `in`, `out`, `other`) VALUES
(1, '', 99, 401, 1, 8, 0, 4525, '馮老師'),
(3, '私99-14', 99, 430, 2, 1, 30000, 0, '支票');

-- --------------------------------------------------------

--
-- 資料表結構 `tab_r9827`
--

CREATE TABLE `tab_r9827` (
  `NO` int(3) NOT NULL,
  `incono` char(10) NOT NULL,
  `year` int(3) NOT NULL,
  `date` int(4) NOT NULL,
  `head1` int(3) NOT NULL,
  `head2` int(3) NOT NULL,
  `in` int(10) NOT NULL,
  `out` int(10) NOT NULL,
  `other` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `tab_r9827`
--

INSERT INTO `tab_r9827` (`NO`, `incono`, `year`, `date`, `head1`, `head2`, `in`, `out`, `other`) VALUES
(1, '', 98, 1201, 1, 1, 0, 2418, ''),
(3, '', 99, 101, 1, 2, 0, 500, ''),
(4, '', 99, 101, 1, 8, 0, 5802, '馮老師'),
(5, '私98-39', 98, 1230, 2, 1, 122000, 0, ''),
(7, '私100-01', 100, 126, 2, 4, 4000, 0, 'NCC圖及竣');

-- --------------------------------------------------------

--
-- 資料表結構 `tab_r9828`
--

CREATE TABLE `tab_r9828` (
  `NO` int(3) NOT NULL,
  `incono` char(10) NOT NULL,
  `year` int(3) NOT NULL,
  `date` int(4) NOT NULL,
  `head1` int(3) NOT NULL,
  `head2` int(3) NOT NULL,
  `in` int(10) NOT NULL,
  `out` int(10) NOT NULL,
  `other` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `tab_r9828`
--

INSERT INTO `tab_r9828` (`NO`, `incono`, `year`, `date`, `head1`, `head2`, `in`, `out`, `other`) VALUES
(1, '', 99, 1231, 1, 13, 0, 6500, ''),
(4, '公99-45', 99, 1231, 2, 1, 65000, 0, '');

-- --------------------------------------------------------

--
-- 資料表結構 `tab_r9829`
--

CREATE TABLE `tab_r9829` (
  `NO` int(3) NOT NULL,
  `incono` char(10) NOT NULL,
  `year` int(3) NOT NULL,
  `date` int(4) NOT NULL,
  `head1` int(3) NOT NULL,
  `head2` int(3) NOT NULL,
  `in` int(10) NOT NULL,
  `out` int(10) NOT NULL,
  `other` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `tab_r9829`
--

INSERT INTO `tab_r9829` (`NO`, `incono`, `year`, `date`, `head1`, `head2`, `in`, `out`, `other`) VALUES
(1, '私99-03', 99, 131, 2, 1, 8000, 0, '');

-- --------------------------------------------------------

--
-- 資料表結構 `tab_r9830`
--

CREATE TABLE `tab_r9830` (
  `NO` int(3) NOT NULL,
  `incono` char(10) NOT NULL,
  `year` int(3) NOT NULL,
  `date` int(4) NOT NULL,
  `head1` int(3) NOT NULL,
  `head2` int(3) NOT NULL,
  `in` int(10) NOT NULL,
  `out` int(10) NOT NULL,
  `other` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `tab_r9830`
--

INSERT INTO `tab_r9830` (`NO`, `incono`, `year`, `date`, `head1`, `head2`, `in`, `out`, `other`) VALUES
(1, '', 99, 504, 1, 1, 0, 2182, '建照規費'),
(2, '', 99, 817, 3, 0, 2182, 0, ''),
(3, '私99-27', 99, 817, 2, 1, 118000, 0, '');

-- --------------------------------------------------------

--
-- 資料表結構 `tab_r9831`
--

CREATE TABLE `tab_r9831` (
  `NO` int(3) NOT NULL,
  `incono` char(10) NOT NULL,
  `year` int(2) NOT NULL,
  `date` int(4) NOT NULL,
  `head1` int(2) NOT NULL,
  `head2` int(2) NOT NULL,
  `in` int(10) NOT NULL,
  `out` int(10) NOT NULL,
  `other` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `tab_r9831`
--

INSERT INTO `tab_r9831` (`NO`, `incono`, `year`, `date`, `head1`, `head2`, `in`, `out`, `other`) VALUES
(1, '', 100, 1201, 1, 12, 0, 450, ''),
(2, '', 101, 113, 1, 8, 0, 1200, '馮'),
(3, '私01-09', 101, 229, 2, 5, 38000, 0, '');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `NO` int(2) NOT NULL,
  `id` char(20) NOT NULL,
  `pw` char(20) NOT NULL,
  `clas` int(1) NOT NULL,
  `member` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`NO`, `id`, `pw`, `clas`, `member`) VALUES
(0, 'root', '1234', 1, 'F'),
(1, 'test2', '1234', 2, 'B'),
(2, 'test3', '1234', 3, 'B'),
(3, 'fang', '25212521', 1, ''),
(4, 'wl961004', '0000', 2, ''),
(5, 'Linlinlin59', '0000', 2, ''),
(6, 'ken13140502', '0000', 3, ''),
(7, 'f', '00', 1, ''),
(8, 'c', '0', 2, ''),
(11, 'aaaa', '111', 0, 'B'),
(12, 'rrrr', '111', 0, 'B');

-- --------------------------------------------------------

--
-- 資料表結構 `yearindex`
--

CREATE TABLE `yearindex` (
  `year` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `yearindex`
--

INSERT INTO `yearindex` (`year`) VALUES
(97),
(98);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `97`
--
ALTER TABLE `97`
  ADD PRIMARY KEY (`NO`),
  ADD KEY `caseno` (`caseno`),
  ADD KEY `date` (`date`),
  ADD KEY `no_en` (`no_en`,`no_n`);

--
-- 資料表索引 `98`
--
ALTER TABLE `98`
  ADD PRIMARY KEY (`NO`),
  ADD KEY `caseno` (`caseno`),
  ADD KEY `date` (`date`),
  ADD KEY `no_en` (`no_en`,`no_n`);

--
-- 資料表索引 `caseindex_caseno`
--
ALTER TABLE `caseindex_caseno`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `caseno` (`caseno`),
  ADD KEY `id` (`id`);

--
-- 資料表索引 `caseindex_caseno_undecided`
--
ALTER TABLE `caseindex_caseno_undecided`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `caseindex_title_edit`
--
ALTER TABLE `caseindex_title_edit`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `head`
--
ALTER TABLE `head`
  ADD PRIMARY KEY (`NO`);

--
-- 資料表索引 `head97`
--
ALTER TABLE `head97`
  ADD KEY `no_en` (`no_en`,`no_n`),
  ADD KEY `caseno` (`caseno`),
  ADD KEY `date` (`date`),
  ADD KEY `no2` (`no2`),
  ADD KEY `NO` (`NO`),
  ADD KEY `head1` (`head1`);

--
-- 資料表索引 `head98`
--
ALTER TABLE `head98`
  ADD KEY `no_en` (`no_en`,`no_n`),
  ADD KEY `caseno` (`caseno`),
  ADD KEY `date` (`date`),
  ADD KEY `no2` (`no2`),
  ADD KEY `NO` (`NO`),
  ADD KEY `head1` (`head1`);

--
-- 資料表索引 `incohead`
--
ALTER TABLE `incohead`
  ADD PRIMARY KEY (`NO`);

--
-- 資料表索引 `logbook_head`
--
ALTER TABLE `logbook_head`
  ADD PRIMARY KEY (`uid`);

--
-- 資料表索引 `logbook_log`
--
ALTER TABLE `logbook_log`
  ADD PRIMARY KEY (`NO`);

--
-- 資料表索引 `logbook_plan`
--
ALTER TABLE `logbook_plan`
  ADD PRIMARY KEY (`NO`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`EN`),
  ADD KEY `name` (`name`);

--
-- 資料表索引 `punch_day`
--
ALTER TABLE `punch_day`
  ADD PRIMARY KEY (`NO`),
  ADD UNIQUE KEY `NO` (`NO`);

--
-- 資料表索引 `tab_b9711`
--
ALTER TABLE `tab_b9711`
  ADD PRIMARY KEY (`NO`),
  ADD KEY `incono` (`incono`),
  ADD KEY `year` (`year`),
  ADD KEY `date` (`date`),
  ADD KEY `head1` (`head1`),
  ADD KEY `head2` (`head2`);

--
-- 資料表索引 `tab_b9723`
--
ALTER TABLE `tab_b9723`
  ADD PRIMARY KEY (`NO`),
  ADD KEY `incono` (`incono`),
  ADD KEY `year` (`year`),
  ADD KEY `date` (`date`),
  ADD KEY `head1` (`head1`),
  ADD KEY `head2` (`head2`);

--
-- 資料表索引 `tab_b9781`
--
ALTER TABLE `tab_b9781`
  ADD PRIMARY KEY (`NO`),
  ADD KEY `incono` (`incono`),
  ADD KEY `year` (`year`),
  ADD KEY `date` (`date`),
  ADD KEY `head1` (`head1`),
  ADD KEY `head2` (`head2`);

--
-- 資料表索引 `tab_b9783`
--
ALTER TABLE `tab_b9783`
  ADD PRIMARY KEY (`NO`),
  ADD KEY `incono` (`incono`),
  ADD KEY `year` (`year`),
  ADD KEY `date` (`date`),
  ADD KEY `head1` (`head1`),
  ADD KEY `head2` (`head2`);

--
-- 資料表索引 `tab_b9784`
--
ALTER TABLE `tab_b9784`
  ADD PRIMARY KEY (`NO`),
  ADD KEY `incono` (`incono`),
  ADD KEY `year` (`year`),
  ADD KEY `date` (`date`),
  ADD KEY `head1` (`head1`),
  ADD KEY `head2` (`head2`);

--
-- 資料表索引 `tab_b9813`
--
ALTER TABLE `tab_b9813`
  ADD PRIMARY KEY (`NO`),
  ADD KEY `incono` (`incono`),
  ADD KEY `year` (`year`),
  ADD KEY `date` (`date`),
  ADD KEY `head1` (`head1`),
  ADD KEY `head2` (`head2`);

--
-- 資料表索引 `tab_b9815`
--
ALTER TABLE `tab_b9815`
  ADD PRIMARY KEY (`NO`),
  ADD KEY `incono` (`incono`),
  ADD KEY `year` (`year`),
  ADD KEY `date` (`date`),
  ADD KEY `head1` (`head1`),
  ADD KEY `head2` (`head2`);

--
-- 資料表索引 `tab_b9818`
--
ALTER TABLE `tab_b9818`
  ADD PRIMARY KEY (`NO`),
  ADD KEY `incono` (`incono`),
  ADD KEY `year` (`year`),
  ADD KEY `date` (`date`),
  ADD KEY `head1` (`head1`),
  ADD KEY `head2` (`head2`);

--
-- 資料表索引 `tab_b9819`
--
ALTER TABLE `tab_b9819`
  ADD PRIMARY KEY (`NO`),
  ADD KEY `incono` (`incono`),
  ADD KEY `year` (`year`),
  ADD KEY `date` (`date`),
  ADD KEY `head1` (`head1`),
  ADD KEY `head2` (`head2`);

--
-- 資料表索引 `tab_b9820`
--
ALTER TABLE `tab_b9820`
  ADD PRIMARY KEY (`NO`),
  ADD KEY `incono` (`incono`),
  ADD KEY `year` (`year`),
  ADD KEY `date` (`date`),
  ADD KEY `head1` (`head1`),
  ADD KEY `head2` (`head2`);

--
-- 資料表索引 `tab_b9822`
--
ALTER TABLE `tab_b9822`
  ADD PRIMARY KEY (`NO`),
  ADD KEY `incono` (`incono`),
  ADD KEY `year` (`year`),
  ADD KEY `date` (`date`),
  ADD KEY `head1` (`head1`),
  ADD KEY `head2` (`head2`);

--
-- 資料表索引 `tab_b9824`
--
ALTER TABLE `tab_b9824`
  ADD PRIMARY KEY (`NO`),
  ADD KEY `incono` (`incono`),
  ADD KEY `year` (`year`),
  ADD KEY `date` (`date`),
  ADD KEY `head1` (`head1`),
  ADD KEY `head2` (`head2`);

--
-- 資料表索引 `tab_b9826`
--
ALTER TABLE `tab_b9826`
  ADD PRIMARY KEY (`NO`),
  ADD KEY `incono` (`incono`),
  ADD KEY `year` (`year`),
  ADD KEY `date` (`date`),
  ADD KEY `head1` (`head1`),
  ADD KEY `head2` (`head2`);

--
-- 資料表索引 `tab_b9827`
--
ALTER TABLE `tab_b9827`
  ADD PRIMARY KEY (`NO`),
  ADD KEY `incono` (`incono`),
  ADD KEY `year` (`year`),
  ADD KEY `date` (`date`),
  ADD KEY `head1` (`head1`),
  ADD KEY `head2` (`head2`);

--
-- 資料表索引 `tab_b9830`
--
ALTER TABLE `tab_b9830`
  ADD PRIMARY KEY (`NO`),
  ADD KEY `incono` (`incono`),
  ADD KEY `year` (`year`),
  ADD KEY `date` (`date`),
  ADD KEY `head1` (`head1`),
  ADD KEY `head2` (`head2`);

--
-- 資料表索引 `tab_b9831`
--
ALTER TABLE `tab_b9831`
  ADD PRIMARY KEY (`NO`),
  ADD KEY `incono` (`incono`),
  ADD KEY `year` (`year`),
  ADD KEY `date` (`date`),
  ADD KEY `head1` (`head1`),
  ADD KEY `head2` (`head2`);

--
-- 資料表索引 `tab_b9832`
--
ALTER TABLE `tab_b9832`
  ADD PRIMARY KEY (`NO`),
  ADD KEY `incono` (`incono`),
  ADD KEY `year` (`year`),
  ADD KEY `date` (`date`),
  ADD KEY `head1` (`head1`),
  ADD KEY `head2` (`head2`);

--
-- 資料表索引 `tab_b9833`
--
ALTER TABLE `tab_b9833`
  ADD PRIMARY KEY (`NO`),
  ADD KEY `incono` (`incono`),
  ADD KEY `year` (`year`),
  ADD KEY `date` (`date`),
  ADD KEY `head1` (`head1`),
  ADD KEY `head2` (`head2`);

--
-- 資料表索引 `tab_b9834`
--
ALTER TABLE `tab_b9834`
  ADD PRIMARY KEY (`NO`),
  ADD KEY `incono` (`incono`),
  ADD KEY `year` (`year`),
  ADD KEY `date` (`date`),
  ADD KEY `head1` (`head1`),
  ADD KEY `head2` (`head2`);

--
-- 資料表索引 `tab_f9802`
--
ALTER TABLE `tab_f9802`
  ADD PRIMARY KEY (`NO`),
  ADD KEY `incono` (`incono`),
  ADD KEY `year` (`year`),
  ADD KEY `date` (`date`),
  ADD KEY `head1` (`head1`),
  ADD KEY `head2` (`head2`);

--
-- 資料表索引 `tab_f9807`
--
ALTER TABLE `tab_f9807`
  ADD PRIMARY KEY (`NO`),
  ADD KEY `incono` (`incono`),
  ADD KEY `year` (`year`),
  ADD KEY `date` (`date`),
  ADD KEY `head1` (`head1`),
  ADD KEY `head2` (`head2`);

--
-- 資料表索引 `tab_f9851`
--
ALTER TABLE `tab_f9851`
  ADD PRIMARY KEY (`NO`),
  ADD KEY `incono` (`incono`),
  ADD KEY `year` (`year`),
  ADD KEY `date` (`date`),
  ADD KEY `head1` (`head1`),
  ADD KEY `head2` (`head2`);

--
-- 資料表索引 `tab_r9801`
--
ALTER TABLE `tab_r9801`
  ADD PRIMARY KEY (`NO`),
  ADD KEY `incono` (`incono`),
  ADD KEY `year` (`year`),
  ADD KEY `date` (`date`),
  ADD KEY `head1` (`head1`),
  ADD KEY `head2` (`head2`);

--
-- 資料表索引 `tab_r9806`
--
ALTER TABLE `tab_r9806`
  ADD PRIMARY KEY (`NO`),
  ADD KEY `incono` (`incono`),
  ADD KEY `year` (`year`),
  ADD KEY `date` (`date`),
  ADD KEY `head1` (`head1`),
  ADD KEY `head2` (`head2`);

--
-- 資料表索引 `tab_r9816`
--
ALTER TABLE `tab_r9816`
  ADD PRIMARY KEY (`NO`),
  ADD KEY `incono` (`incono`),
  ADD KEY `year` (`year`),
  ADD KEY `date` (`date`),
  ADD KEY `head1` (`head1`),
  ADD KEY `head2` (`head2`);

--
-- 資料表索引 `tab_r9817`
--
ALTER TABLE `tab_r9817`
  ADD PRIMARY KEY (`NO`),
  ADD KEY `incono` (`incono`),
  ADD KEY `year` (`year`),
  ADD KEY `date` (`date`),
  ADD KEY `head1` (`head1`),
  ADD KEY `head2` (`head2`);

--
-- 資料表索引 `tab_r9818`
--
ALTER TABLE `tab_r9818`
  ADD PRIMARY KEY (`NO`),
  ADD KEY `incono` (`incono`),
  ADD KEY `year` (`year`),
  ADD KEY `date` (`date`),
  ADD KEY `head1` (`head1`),
  ADD KEY `head2` (`head2`);

--
-- 資料表索引 `tab_r9819`
--
ALTER TABLE `tab_r9819`
  ADD PRIMARY KEY (`NO`),
  ADD KEY `incono` (`incono`),
  ADD KEY `year` (`year`),
  ADD KEY `date` (`date`),
  ADD KEY `head1` (`head1`),
  ADD KEY `head2` (`head2`);

--
-- 資料表索引 `tab_r9824`
--
ALTER TABLE `tab_r9824`
  ADD PRIMARY KEY (`NO`),
  ADD KEY `incono` (`incono`),
  ADD KEY `year` (`year`),
  ADD KEY `date` (`date`),
  ADD KEY `head1` (`head1`),
  ADD KEY `head2` (`head2`);

--
-- 資料表索引 `tab_r9826`
--
ALTER TABLE `tab_r9826`
  ADD PRIMARY KEY (`NO`),
  ADD KEY `incono` (`incono`),
  ADD KEY `year` (`year`),
  ADD KEY `date` (`date`),
  ADD KEY `head1` (`head1`),
  ADD KEY `head2` (`head2`);

--
-- 資料表索引 `tab_r9827`
--
ALTER TABLE `tab_r9827`
  ADD PRIMARY KEY (`NO`),
  ADD KEY `incono` (`incono`),
  ADD KEY `year` (`year`),
  ADD KEY `date` (`date`),
  ADD KEY `head1` (`head1`),
  ADD KEY `head2` (`head2`);

--
-- 資料表索引 `tab_r9828`
--
ALTER TABLE `tab_r9828`
  ADD PRIMARY KEY (`NO`),
  ADD KEY `incono` (`incono`),
  ADD KEY `year` (`year`),
  ADD KEY `date` (`date`),
  ADD KEY `head1` (`head1`),
  ADD KEY `head2` (`head2`);

--
-- 資料表索引 `tab_r9829`
--
ALTER TABLE `tab_r9829`
  ADD PRIMARY KEY (`NO`),
  ADD KEY `incono` (`incono`),
  ADD KEY `year` (`year`),
  ADD KEY `date` (`date`),
  ADD KEY `head1` (`head1`),
  ADD KEY `head2` (`head2`);

--
-- 資料表索引 `tab_r9830`
--
ALTER TABLE `tab_r9830`
  ADD PRIMARY KEY (`NO`),
  ADD KEY `incono` (`incono`),
  ADD KEY `year` (`year`),
  ADD KEY `date` (`date`),
  ADD KEY `head1` (`head1`),
  ADD KEY `head2` (`head2`);

--
-- 資料表索引 `tab_r9831`
--
ALTER TABLE `tab_r9831`
  ADD PRIMARY KEY (`NO`),
  ADD KEY `year` (`year`),
  ADD KEY `date` (`date`),
  ADD KEY `head1` (`head1`),
  ADD KEY `head2` (`head2`),
  ADD KEY `in` (`in`),
  ADD KEY `out` (`out`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`NO`),
  ADD UNIQUE KEY `id` (`id`);

--
-- 資料表索引 `yearindex`
--
ALTER TABLE `yearindex`
  ADD PRIMARY KEY (`year`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `caseindex_caseno`
--
ALTER TABLE `caseindex_caseno`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- 使用資料表 AUTO_INCREMENT `caseindex_caseno_undecided`
--
ALTER TABLE `caseindex_caseno_undecided`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用資料表 AUTO_INCREMENT `caseindex_title_edit`
--
ALTER TABLE `caseindex_title_edit`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- 使用資料表 AUTO_INCREMENT `logbook_head`
--
ALTER TABLE `logbook_head`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用資料表 AUTO_INCREMENT `logbook_log`
--
ALTER TABLE `logbook_log`
  MODIFY `NO` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- 使用資料表 AUTO_INCREMENT `logbook_plan`
--
ALTER TABLE `logbook_plan`
  MODIFY `NO` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用資料表 AUTO_INCREMENT `punch_day`
--
ALTER TABLE `punch_day`
  MODIFY `NO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用資料表 AUTO_INCREMENT `tab_r9831`
--
ALTER TABLE `tab_r9831`
  MODIFY `NO` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用資料表 AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `NO` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
