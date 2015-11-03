-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.21 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.1.0.4899
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table phptest.b010company
CREATE TABLE IF NOT EXISTS `b010company` (
  `B010CompanyCd` smallint(5) NOT NULL AUTO_INCREMENT,
  `B010CompanyNm` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `B010CompanyAddr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `B010CompanyEmail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `B010CompanyTel` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `B010CreDt` datetime NOT NULL,
  `B010ModDt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`B010CompanyCd`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- Dumping data for table phptest.b010company: ~0 rows (approximately)
/*!40000 ALTER TABLE `b010company` DISABLE KEYS */;
INSERT INTO `b010company` (`B010CompanyCd`, `B010CompanyNm`, `B010CompanyAddr`, `B010CompanyEmail`, `B010CompanyTel`, `B010CreDt`, `B010ModDt`) VALUES
	(3, 'company', '988 street', 'drt', '888888', '2014-03-17 17:14:01', '2015-11-03 16:14:31'),
	(5, 'dfgdfg', '', '', '', '2015-11-03 22:08:05', '2015-11-03 14:08:05'),
	(6, 'dgd', '', '', '', '2015-11-03 22:08:05', '2015-11-03 14:08:05'),
	(8, 'ds', '', '', '', '2015-11-03 22:10:09', '2015-11-03 14:10:09'),
	(9, 'dsfs', '', '', '535', '2015-11-03 22:10:24', '2015-11-03 14:10:24'),
	(10, 'sfs', 'sdfds', '', '', '2015-11-03 22:10:24', '2015-11-03 14:10:24'),
	(11, 'fdg', '', '', '', '2015-11-03 22:19:36', '2015-11-03 14:19:36'),
	(13, '123', '', '', '', '2015-11-03 22:43:52', '2015-11-03 14:43:52');
/*!40000 ALTER TABLE `b010company` ENABLE KEYS */;


-- Dumping structure for table phptest.b010user
CREATE TABLE IF NOT EXISTS `b010user` (
  `B010UserCd` smallint(5) NOT NULL AUTO_INCREMENT,
  `B010UserNm` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `B010Email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `B010Level` set('Admin','User') COLLATE utf8_unicode_ci NOT NULL,
  `B010Status` set('Active','Disabled') COLLATE utf8_unicode_ci NOT NULL,
  `B010CreDt` datetime NOT NULL,
  `B010ModDt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`B010UserCd`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table phptest.b010user: ~2 rows (approximately)
/*!40000 ALTER TABLE `b010user` DISABLE KEYS */;
INSERT INTO `b010user` (`B010UserCd`, `B010UserNm`, `B010Email`, `B010Level`, `B010Status`, `B010CreDt`, `B010ModDt`) VALUES
	(3, 'testuser234d44', 'a@a.com', 'Admin', 'Disabled', '2014-03-17 17:14:01', '2015-11-03 14:34:48'),
	(11, 'sad', 'sada@32', 'User', 'Active', '2015-11-03 13:46:10', '2015-11-03 05:46:10'),
	(12, 'sad', 'sada@32', 'User', 'Active', '2015-11-03 21:32:00', '2015-11-03 13:32:10');
/*!40000 ALTER TABLE `b010user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
