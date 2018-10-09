-- phpMyAdmin SQL Dump
-- version 4.3.1
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生時間： 2018 年 01 月 09 日 13:43
-- 伺服器版本: 5.5.41-MariaDB
-- PHP 版本： 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫： `tiarahuang`
--

-- --------------------------------------------------------

--
-- 資料表結構 `distribution`
--

CREATE TABLE IF NOT EXISTS `distribution` (
  `PlanID` varchar(5) NOT NULL,
  `Planorder` int(2) NOT NULL,
  `Exday` date NOT NULL,
  `Fiday` date DEFAULT NULL,
  `PMconsume` int(6) DEFAULT '0',
  `Finish` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `distribution`
--

INSERT INTO `distribution` (`PlanID`, `Planorder`, `Exday`, `Fiday`, `PMconsume`, `Finish`) VALUES
('R001', 1, '2017-08-03', '2017-08-03', 0, 1),
('R001', 2, '2017-08-05', '2018-01-05', 0, 1),
('R001', 3, '2017-08-07', '2017-08-07', 1422, 1),
('R001', 4, '2017-08-10', '2017-08-10', 0, 1),
('R001', 5, '2017-08-17', '2017-08-17', 0, 1),
('R001', 6, '2017-10-16', '2017-10-16', 0, 1),
('R001', 7, '2017-11-15', '2017-11-15', 0, 1),
('R001', 8, '2017-12-05', NULL, 0, 0),
('R001', 9, '2018-04-04', NULL, 0, 0),
('R001', 10, '2018-04-06', NULL, 0, 0),
('R002', 1, '2017-12-15', '2017-12-15', 0, 1),
('R002', 2, '2017-12-16', '2017-12-16', 0, 1),
('R002', 3, '2017-12-20', '2017-12-20', 1800, 1),
('R002', 4, '2017-12-24', '2018-01-24', 0, 1),
('R002', 5, '2017-12-29', '2017-12-29', 3, 1),
('R002', 6, '2018-03-01', NULL, 0, 0),
('R002', 7, '2018-03-31', NULL, 0, 0),
('R002', 8, '2018-04-10', NULL, 0, 0),
('R002', 9, '2018-05-08', NULL, 0, 0),
('R003', 1, '2017-08-17', '0000-00-00', 0, 1),
('R003', 2, '2017-08-19', '2017-08-19', 12, 1),
('R003', 3, '2017-08-20', '2017-08-20', 4000, 1),
('R003', 4, '2017-08-25', '2017-08-25', 0, 1),
('R003', 5, '2017-09-01', '2017-09-01', 0, 1),
('R003', 6, '2017-10-31', NULL, 0, 0),
('R003', 7, '2017-11-30', NULL, 0, 0),
('R003', 8, '2017-12-14', NULL, 0, 0),
('R003', 9, '2017-12-19', NULL, 0, 0),
('R004', 1, '2017-07-21', '2017-07-21', 0, 1),
('R004', 2, '2017-07-23', '0000-00-00', 0, 1),
('R004', 3, '2017-07-25', '2017-07-26', 2100, 1),
('R004', 4, '2017-07-30', '2017-07-30', 0, 1),
('R004', 5, '2017-09-28', NULL, 0, 0),
('R004', 6, '2017-12-07', NULL, 0, 0),
('R005', 1, '2018-01-25', NULL, 0, 0),
('R005', 2, '2018-01-27', NULL, 0, 0),
('R005', 3, '2018-01-29', NULL, 0, 0),
('R005', 4, '2018-02-05', NULL, 0, 0),
('R005', 6, '2018-02-25', NULL, 0, 0),
('R005', 7, '2018-03-17', NULL, 0, 0),
('R005', 8, '2018-05-21', NULL, 0, 0),
('R005', 9, '2018-05-23', NULL, 0, 0),
('R006', 1, '2017-08-19', '2017-08-20', 0, 1),
('R006', 2, '2017-08-21', '2017-08-21', 7, 1),
('R006', 3, '2017-08-23', '2017-08-23', 525, 1),
('R006', 4, '2017-08-30', '2017-08-30', 0, 1),
('R006', 5, '2017-09-06', '2017-09-06', 0, 1),
('R006', 6, '2017-09-13', '2017-09-13', 0, 1),
('R006', 7, '2017-11-12', '2017-11-13', 0, 1),
('R006', 8, '2017-12-02', NULL, 0, 0),
('R006', 9, '2018-02-10', NULL, 0, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `flower`
--

CREATE TABLE IF NOT EXISTS `flower` (
  `FID` varchar(5) NOT NULL,
  `FName` varchar(10) NOT NULL,
  `Growth` int(3) NOT NULL,
  `Production` int(3) NOT NULL,
  `Season` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `flower`
--

INSERT INTO `flower` (`FID`, `FName`, `Growth`, `Production`, `Season`) VALUES
('FH000', '冰花', 70, 50, 1),
('FH007', '松蟲草', 150, 80, 0),
('FH113', '螢翅花', 100, 30, 1),
('FH125', '翠珠花', 120, 85, 0),
('FH185', '火焰百合', 100, 60, 1),
('FH320', '紅花', 140, 80, 0),
('FH650', '菊花', 110, 25, 1),
('FH661', '伯利恆冬', 150, 80, 0),
('FH662', '伯利恆夏', 120, 60, 1),
('FY049', '南瓜茄', 80, 60, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `harvest`
--

CREATE TABLE IF NOT EXISTS `harvest` (
  `Hardate` date NOT NULL,
  `Hamount` int(3) NOT NULL,
  `Hremain` int(3) DEFAULT NULL,
  `HPlanID` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `harvest`
--

INSERT INTO `harvest` (`Hardate`, `Hamount`, `Hremain`, `HPlanID`) VALUES
('2017-12-01', 200, 200, 'R001'),
('2017-12-02', 100, 300, 'R001'),
('2017-12-03', 90, 290, 'R001'),
('2017-12-03', 120, 120, 'R003'),
('2017-12-05', 100, 270, 'R001'),
('2017-12-05', 110, 230, 'R003'),
('2017-12-05', 114, 114, 'R006'),
('2017-12-06', 119, 349, 'R003'),
('2017-12-07', 240, 354, 'R006'),
('2017-12-09', 96, 445, 'R003'),
('2017-12-09', 111, 225, 'R006'),
('2017-12-10', 200, 200, 'R004'),
('2017-12-11', 52, 252, 'R004'),
('2017-12-12', 85, 530, 'R003'),
('2017-12-12', 300, 414, 'R006'),
('2017-12-13', 140, 490, 'R003'),
('2017-12-14', 110, 24, 'R006'),
('2017-12-15', 300, 500, 'R004'),
('2017-12-16', 180, 235, 'R004'),
('2017-12-20', 200, 285, 'R001'),
('2017-12-23', 155, 238, 'R004');

-- --------------------------------------------------------

--
-- 資料表結構 `land`
--

CREATE TABLE IF NOT EXISTS `land` (
  `LID` varchar(5) NOT NULL,
  `LName` varchar(10) NOT NULL,
  `Area` float NOT NULL,
  `Situation` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `land`
--

INSERT INTO `land` (`LID`, `LName`, `Area`, `Situation`) VALUES
('L01', '阿有', 3.5, 1),
('L02', '蒲珠', 3, 0),
('L03', '阿珠', 2.5, 1),
('L04', '明德', 3.5, 1),
('L05', '大溝', 1.5, 2),
('L06', '阿清', 4, 1),
('L07', '玉芳', 1.5, 2),
('L08', '山邊', 1, 2);

-- --------------------------------------------------------

--
-- 資料表結構 `material`
--

CREATE TABLE IF NOT EXISTS `material` (
  `MID` varchar(5) NOT NULL,
  `MName` varchar(20) NOT NULL,
  `Mamount` int(5) DEFAULT NULL,
  `Munit` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `material`
--

INSERT INTO `material` (`MID`, `MName`, `Mamount`, `Munit`) VALUES
('F001', '台肥1號即溶複合肥料', 88, '包'),
('F002', '台肥43號', 43, '包'),
('F003', '液體肥料', 30, '包'),
('F004', '開花催肥', 1, '包'),
('M000', '無需使用原料', 0, '0'),
('P001', '安滅菌', 3, '瓶'),
('P002', '固殺草', 2, '瓶'),
('P003', '年年春', 1, '瓶'),
('P004', '巴拉刈', 12, '瓶'),
('S000', '冰花種子', 1000, '顆'),
('S007', '松蟲種子', 78, '顆'),
('S049', '南瓜茄幼苗', 475, '顆'),
('S113', '螢翅花種子', 2000, '顆'),
('S125', '翠珠花種籽', 2000, '顆'),
('S185', '火焰百合種子', 900, '顆'),
('S320', '紅花種子', 1900, '顆'),
('S650', '菊花苗', 3000, '顆'),
('S661', '伯利恆球根', 6000, '顆');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `department` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `member`
--

INSERT INTO `member` (`username`, `password`, `department`) VALUES
('kai', 'KAI', 2),
('lily', 'LILY', 3),
('mary', 'MARY', 1),
('tiara', 'TIARA', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `plan`
--

CREATE TABLE IF NOT EXISTS `plan` (
  `PlanID` varchar(5) NOT NULL,
  `PlanFID` varchar(5) NOT NULL,
  `PlanLID` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `plan`
--

INSERT INTO `plan` (`PlanID`, `PlanFID`, `PlanLID`) VALUES
('R001', 'FH007', 'L03'),
('R002', 'FH125', 'L02'),
('R005', 'FH185', 'L05'),
('R004', 'FH320', 'L04'),
('R003', 'FH661', 'L06'),
('R006', 'FY049', 'L01');

-- --------------------------------------------------------

--
-- 資料表結構 `process`
--

CREATE TABLE IF NOT EXISTS `process` (
  `PFID` varchar(5) NOT NULL,
  `Porder` int(2) NOT NULL,
  `Pwork` varchar(5) NOT NULL,
  `Pday` int(3) NOT NULL,
  `Pusage` int(3) NOT NULL DEFAULT '0',
  `PMID` varchar(5) NOT NULL DEFAULT 'M000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `process`
--

INSERT INTO `process` (`PFID`, `Porder`, `Pwork`, `Pday`, `Pusage`, `PMID`) VALUES
('FH000', 1, '耕土', 2, 0, 'M000'),
('FH000', 2, '施肥', 3, 1, 'P001'),
('FH000', 3, '播種', 3, 200, 'S000'),
('FH000', 4, '澆水', 7, 0, 'M000'),
('FH000', 5, '澆水', 7, 0, 'M000'),
('FH000', 6, '補種', 80, 35, 'S000'),
('FH000', 7, '採收', 60, 0, 'M000'),
('FH000', 8, '撿葉', 0, 0, 'M000'),
('FH007', 1, '耕土', 2, 0, 'M000'),
('FH007', 2, '施肥', 2, 2, 'F003'),
('FH007', 3, '播種', 3, 600, 'S007'),
('FH007', 4, '澆水', 7, 0, 'M000'),
('FH007', 5, '澆水', 60, 0, 'M000'),
('FH007', 6, '噴藥', 30, 1, 'P001'),
('FH007', 7, '拉網', 20, 0, 'M000'),
('FH007', 8, '採收', 120, 0, 'M000'),
('FH007', 9, '收網', 2, 0, 'M000'),
('FH007', 10, '耕土', 2, 0, 'M000'),
('FH113', 1, '耕土', 2, 0, 'M000'),
('FH113', 2, '施肥', 2, 2, 'F001'),
('FH113', 3, '播種', 1, 500, 'S113'),
('FH113', 4, '灑肥', 2, 3, 'F002'),
('FH113', 5, '澆水', 2, 0, 'M000'),
('FH113', 6, '澆水', 2, 0, 'M000'),
('FH113', 7, '除蟲', 80, 0, 'M000'),
('FH113', 8, '採花', 60, 0, 'M000'),
('FH113', 9, '整土', 0, 0, 'M000'),
('FH125', 1, '耕土', 2, 0, 'M000'),
('FH125', 2, '施肥', 4, 200, 'F001'),
('FH125', 3, '播種', 4, 600, 'S125'),
('FH125', 4, '澆水', 37, 0, 'M000'),
('FH125', 5, '鋤草', 30, 1, 'P002'),
('FH125', 6, '摘心', 30, 0, 'M000'),
('FH125', 7, '摘心', 10, 0, 'M000'),
('FH125', 8, '採收', 28, 0, 'M000'),
('FH125', 9, '除根', 14, 0, 'M000'),
('FH185', 1, '耕土', 2, 0, 'M000'),
('FH185', 2, '架網', 2, 0, 'M000'),
('FH185', 3, '播種', 7, 100, 'S185'),
('FH185', 4, '施肥', 20, 2, 'F004'),
('FH185', 6, '架網', 20, 0, 'M000'),
('FH185', 7, '採收', 65, 0, 'M000'),
('FH185', 8, '拔莖', 2, 0, 'M000'),
('FH185', 9, '收網', 0, 0, 'M000'),
('FH320', 1, '耕土', 2, 0, 'M000'),
('FH320', 2, '施肥', 2, 3, 'F003'),
('FH320', 3, '播種', 5, 600, 'S320'),
('FH320', 4, '澆水', 60, 0, 'M000'),
('FH320', 5, '採收', 70, 0, 'M000'),
('FH320', 6, '除掉', 0, 0, 'M000'),
('FH650', 1, '耕土', 2, 0, 'M000'),
('FH650', 2, '施肥', 7, 0, 'M000'),
('FH650', 3, '播種', 3, 1000, 'S650'),
('FH650', 4, '澆水', 7, 0, 'M000'),
('FH650', 5, '澆水', 14, 0, 'M000'),
('FH650', 6, '除草', 10, 2, 'P003'),
('FH650', 7, '架燈', 30, 0, 'M000'),
('FH650', 8, '剪芯', 20, 0, 'M000'),
('FH650', 9, '裝套', 7, 0, 'M000'),
('FH650', 10, '採收', 65, 0, 'M000'),
('FH650', 11, '除掉', 0, 0, 'M000'),
('FH661', 1, '耕土', 2, 0, 'M000'),
('FH661', 2, '施肥', 3, 3, 'F001'),
('FH661', 3, '播種', 5, 1000, 'S661'),
('FH661', 4, '澆水', 7, 0, 'M000'),
('FH661', 5, '澆水', 60, 0, 'M000'),
('FH661', 6, '採收', 30, 0, 'M000'),
('FH661', 7, '收種', 14, 0, 'M000'),
('FH661', 8, '割種', 5, 0, 'M000'),
('FH661', 9, '整土', 0, 0, 'M000'),
('FH662', 1, '耕土', 2, 0, 'M000'),
('FH662', 2, '施肥', 2, 3, 'F002'),
('FH662', 3, '播種', 4, 1000, 'S661'),
('FH662', 4, '澆水', 50, 0, 'M000'),
('FH662', 5, '採收', 60, 0, 'M000'),
('FH662', 6, '挖根', 7, 0, 'M000'),
('FH662', 7, '收種', 7, 0, 'M000'),
('FH662', 8, '除葉', 0, 0, 'M000'),
('FY049', 1, '耕土', 2, 0, 'M000'),
('FY049', 2, '施肥', 2, 2, 'F002'),
('FY049', 3, '播種', 7, 150, 'S049'),
('FY049', 4, '澆水', 7, 0, 'M000'),
('FY049', 5, '澆水', 7, 0, 'M000'),
('FY049', 6, '架網', 60, 0, 'M000'),
('FY049', 7, '施肥', 20, 0, 'M000'),
('FY049', 8, '採收', 70, 0, 'M000'),
('FY049', 9, '收網', 0, 0, 'M000');

-- --------------------------------------------------------

--
-- 資料表結構 `replenish`
--

CREATE TABLE IF NOT EXISTS `replenish` (
  `Redate` date NOT NULL,
  `Reprice` int(3) NOT NULL,
  `Reamount` int(3) NOT NULL,
  `ReMID` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `replenish`
--

INSERT INTO `replenish` (`Redate`, `Reprice`, `Reamount`, `ReMID`) VALUES
('2017-08-31', 20, 100, 'S320'),
('2017-09-03', 20, 250, 'S125'),
('2017-10-05', 170, 30, 'P004'),
('2017-10-05', 35, 300, 'S661'),
('2017-11-01', 230, 100, 'F001'),
('2017-11-17', 1, 2000, 'S125'),
('2017-12-13', 125, 3, 'P001');

-- --------------------------------------------------------

--
-- 資料表結構 `ship`
--

CREATE TABLE IF NOT EXISTS `ship` (
  `Shdate` date NOT NULL,
  `Market` varchar(5) NOT NULL,
  `BoxID` int(2) NOT NULL,
  `Grade` varchar(2) NOT NULL,
  `Shamount` int(3) NOT NULL,
  `Shprice` int(3) DEFAULT '0',
  `Shcheck` int(1) DEFAULT '0',
  `ShPlanID` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `ship`
--

INSERT INTO `ship` (`Shdate`, `Market`, `BoxID`, `Grade`, `Shamount`, `Shprice`, `Shcheck`, `ShPlanID`) VALUES
('2017-12-01', '台南', 1, 'B', 30, 0, 0, 'R004'),
('2017-12-01', '台南', 2, 'B', 30, 0, 0, 'R006'),
('2017-12-03', '台北', 1, 'A', 30, 0, 0, 'R003'),
('2017-12-03', '台北', 2, 'A', 30, 0, 0, 'R003'),
('2017-12-03', '台北', 3, 'A', 30, 0, 0, 'R003'),
('2017-12-03', '台北', 4, 'A', 30, 0, 0, 'R003'),
('2017-12-03', '台北', 5, 'A', 30, 0, 0, 'R003'),
('2017-12-03', '台北', 6, 'A', 30, 0, 0, 'R003'),
('2017-12-03', '彰化', 1, 'B', 25, 0, 0, 'R004'),
('2017-12-03', '彰化', 2, 'A', 30, 0, 0, 'R004'),
('2017-12-03', '彰化', 3, 'A', 30, 0, 0, 'R004'),
('2017-12-04', '台北', 1, 'A', 30, 0, 0, 'R006'),
('2017-12-04', '台北', 2, 'A', 25, 0, 0, 'R006'),
('2017-12-04', '台北', 3, 'B', 30, 0, 0, 'R001'),
('2017-12-04', '台北', 5, 'C', 30, 0, 0, 'R004'),
('2017-12-05', '高雄', 1, 'A', 30, 0, 0, 'R001'),
('2017-12-05', '高雄', 2, 'A', 25, 0, 0, 'R006'),
('2017-12-05', '高雄', 3, 'A', 30, 0, 0, 'R004'),
('2017-12-07', '台中', 1, 'A', 30, 0, 0, 'R001'),
('2017-12-07', '台中', 2, 'B', 30, 0, 0, 'R004'),
('2017-12-07', '台中', 3, 'B', 30, 0, 0, 'R001'),
('2017-12-07', '台北', 1, 'A', 25, 0, 0, 'R001'),
('2017-12-11', '台北', 1, 'B', 30, 70, 0, 'R006'),
('2017-12-17', '台北', 1, 'B', 30, 80, 1, 'R006'),
('2017-12-19', '台北', 1, 'A', 30, 105, 1, 'R006'),
('2017-12-20', '台北', 1, 'A', 25, 100, 1, 'R004'),
('2017-12-21', '台北', 1, 'B', 30, 110, 1, 'R004'),
('2017-12-28', '台南', 4, 'A0', 2, 0, 0, 'R004');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `distribution`
--
ALTER TABLE `distribution`
 ADD PRIMARY KEY (`PlanID`,`Planorder`);

--
-- 資料表索引 `flower`
--
ALTER TABLE `flower`
 ADD PRIMARY KEY (`FID`);

--
-- 資料表索引 `harvest`
--
ALTER TABLE `harvest`
 ADD PRIMARY KEY (`Hardate`,`HPlanID`), ADD KEY `HPlanID` (`HPlanID`);

--
-- 資料表索引 `land`
--
ALTER TABLE `land`
 ADD PRIMARY KEY (`LID`);

--
-- 資料表索引 `material`
--
ALTER TABLE `material`
 ADD PRIMARY KEY (`MID`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
 ADD PRIMARY KEY (`username`);

--
-- 資料表索引 `plan`
--
ALTER TABLE `plan`
 ADD PRIMARY KEY (`PlanID`), ADD KEY `PlanFID` (`PlanFID`,`PlanLID`), ADD KEY `plan_ibfk_2` (`PlanLID`);

--
-- 資料表索引 `process`
--
ALTER TABLE `process`
 ADD PRIMARY KEY (`PFID`,`Porder`), ADD KEY `PMID` (`PMID`);

--
-- 資料表索引 `replenish`
--
ALTER TABLE `replenish`
 ADD PRIMARY KEY (`Redate`,`ReMID`), ADD KEY `ReMID` (`ReMID`);

--
-- 資料表索引 `ship`
--
ALTER TABLE `ship`
 ADD PRIMARY KEY (`Shdate`,`Market`,`BoxID`,`Grade`,`ShPlanID`), ADD KEY `ship_ibfk_1` (`ShPlanID`);

--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `distribution`
--
ALTER TABLE `distribution`
ADD CONSTRAINT `distribution_ibfk_1` FOREIGN KEY (`PlanID`) REFERENCES `plan` (`PlanID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `harvest`
--
ALTER TABLE `harvest`
ADD CONSTRAINT `harvest_ibfk_1` FOREIGN KEY (`HPlanID`) REFERENCES `plan` (`PlanID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `plan`
--
ALTER TABLE `plan`
ADD CONSTRAINT `plan_ibfk_1` FOREIGN KEY (`PlanFID`) REFERENCES `process` (`PFID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `plan_ibfk_2` FOREIGN KEY (`PlanLID`) REFERENCES `land` (`LID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `process`
--
ALTER TABLE `process`
ADD CONSTRAINT `process_ibfk_2` FOREIGN KEY (`PMID`) REFERENCES `material` (`MID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `process_ibfk_1` FOREIGN KEY (`PFID`) REFERENCES `flower` (`FID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `replenish`
--
ALTER TABLE `replenish`
ADD CONSTRAINT `replenish_ibfk_1` FOREIGN KEY (`ReMID`) REFERENCES `material` (`MID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `ship`
--
ALTER TABLE `ship`
ADD CONSTRAINT `ship_ibfk_1` FOREIGN KEY (`ShPlanID`) REFERENCES `plan` (`PlanID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
