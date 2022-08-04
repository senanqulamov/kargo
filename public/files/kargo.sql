-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table kargo_com.additional_services
CREATE TABLE IF NOT EXISTS `additional_services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 => des, 2 => box, 3 => product',
  `price` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `show` json DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table kargo_com.additional_services: ~3 rows (approximately)
/*!40000 ALTER TABLE `additional_services` DISABLE KEYS */;
INSERT INTO `additional_services` (`id`, `title`, `slug`, `status`, `price`, `show`, `created_at`, `updated_at`) VALUES
	(1, 'Bubble', 'bubble', 6, '1', NULL, '2022-05-03 20:18:26', '2022-07-14 08:29:10'),
	(2, 'Lent', 'lent', 3, '5.5', NULL, '2022-05-03 20:18:48', '2022-06-30 06:48:52'),
	(4, 'asdasd', 'asdasd', 2, '12', NULL, '2022-07-25 10:38:02', '2022-07-25 10:38:02');
/*!40000 ALTER TABLE `additional_services` ENABLE KEYS */;

-- Dumping structure for table kargo_com.balances
CREATE TABLE IF NOT EXISTS `balances` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `balance` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table kargo_com.balances: ~1 rows (approximately)
/*!40000 ALTER TABLE `balances` DISABLE KEYS */;
INSERT INTO `balances` (`id`, `userID`, `balance`, `created_at`, `updated_at`) VALUES
	(1, 2, '355', '2022-05-15 09:01:53', '2022-05-15 09:01:53');
/*!40000 ALTER TABLE `balances` ENABLE KEYS */;

-- Dumping structure for table kargo_com.blogs
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `description` text COLLATE utf8_turkish_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table kargo_com.blogs: ~2 rows (approximately)
/*!40000 ALTER TABLE `blogs` DISABLE KEYS */;
INSERT INTO `blogs` (`id`, `title`, `slug`, `description`, `img`, `created_at`, `updated_at`) VALUES
	(3, 'TEST BLOG', 'test-blog', '<p>TEST BLOG</p>', '1652257332.jpg', '2022-05-11 08:22:12', '2022-05-11 08:22:12'),
	(4, 'TEST', 'test', '<p>TEST TEST TEST</p>', '1652260065.jpg', '2022-05-11 09:07:45', '2022-05-11 09:07:45');
/*!40000 ALTER TABLE `blogs` ENABLE KEYS */;

-- Dumping structure for table kargo_com.branches
CREATE TABLE IF NOT EXISTS `branches` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `address` text COLLATE utf8_turkish_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `status` int(11) DEFAULT NULL COMMENT '1 => default',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table kargo_com.branches: ~2 rows (approximately)
/*!40000 ALTER TABLE `branches` DISABLE KEYS */;
INSERT INTO `branches` (`id`, `title`, `longitude`, `latitude`, `address`, `country`, `status`, `created_at`, `updated_at`) VALUES
	(7, 'SHIPLOUNGE', '32.66207', '39.96492', 'ŞEKER MH. 1437.CD. NO.20/B ETİMESGUT/ANKARA', 'TR', 1, '2022-05-02 12:21:17', '2022-07-20 05:24:50'),
	(8, 'USA-SHIPLOUNGE', '-74.07109191247923', '40.87912158224169', '258 Columbia Ave Flr 2 /LODİ /NEW JERSEY /07644 /United States', 'US', NULL, '2022-05-04 01:01:37', '2022-07-20 05:24:50');
/*!40000 ALTER TABLE `branches` ENABLE KEYS */;

-- Dumping structure for table kargo_com.careers
CREATE TABLE IF NOT EXISTS `careers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `location` int(11) NOT NULL,
  `experience` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `worktime` varchar(255) COLLATE utf8_turkish_ci NOT NULL COMMENT 'fulltime, parttime, remote, internship',
  `tag` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `finish_time` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `description` text COLLATE utf8_turkish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '2' COMMENT '1 => active, 2 => passive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table kargo_com.careers: ~2 rows (approximately)
/*!40000 ALTER TABLE `careers` DISABLE KEYS */;
INSERT INTO `careers` (`id`, `title`, `slug`, `location`, `experience`, `worktime`, `tag`, `finish_time`, `description`, `status`, `created_at`, `updated_at`) VALUES
	(2, 'Junior Web Developer', 'Junior-web-developer', 25, '4', 'parttime', NULL, '', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>', 1, '2022-04-28 02:23:20', '2022-04-28 02:23:20'),
	(3, 'Frontend Developer', 'frontend-developer', 16, '2.5', 'fulltime', NULL, '2022-04-22T23:50', '<p>this is new vacancy for test</p>', 1, '2022-04-28 19:45:57', '2022-05-15 21:09:26'),
	(4, 'asdsad', 'asdsad', 16, 'asdsada', 'internship', NULL, '2022-06-26T15:05', '<p>asdasdas</p>', 1, '2022-06-03 11:05:58', '2022-07-14 08:31:02');
/*!40000 ALTER TABLE `careers` ENABLE KEYS */;

-- Dumping structure for table kargo_com.career_applies
CREATE TABLE IF NOT EXISTS `career_applies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `careerID` bigint(20) unsigned NOT NULL,
  `fullname` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `message` text COLLATE utf8_turkish_ci NOT NULL,
  `cvFile` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '2' COMMENT '1 => read, 2 => unread',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `career_applies_careerid_foreign` (`careerID`),
  CONSTRAINT `career_applies_careerid_foreign` FOREIGN KEY (`careerID`) REFERENCES `careers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table kargo_com.career_applies: ~2 rows (approximately)
/*!40000 ALTER TABLE `career_applies` DISABLE KEYS */;
INSERT INTO `career_applies` (`id`, `careerID`, `fullname`, `email`, `message`, `cvFile`, `status`, `created_at`, `updated_at`) VALUES
	(1, 2, 'TEST TEST', 'TEST@TEST.COM', 'TEST TEST TEST. HI . NO COMMENT', '1652257184.pdf', 1, '2022-05-11 08:19:45', '2022-05-11 08:20:05'),
	(2, 2, 'TEST TEST', 'TEST@TEST.COM', 'TEST TEST TEST. HI . NO COMMENT', '1652257187.pdf', 1, '2022-05-11 08:19:47', '2022-05-11 08:46:13');
/*!40000 ALTER TABLE `career_applies` ENABLE KEYS */;

-- Dumping structure for table kargo_com.cargo_companies
CREATE TABLE IF NOT EXISTS `cargo_companies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `PSH` int(11) DEFAULT NULL,
  `jet_price` int(11) DEFAULT NULL,
  `emergency` int(11) DEFAULT NULL,
  `kar_marj` int(11) DEFAULT NULL,
  `entegrations` json DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table kargo_com.cargo_companies: ~4 rows (approximately)
/*!40000 ALTER TABLE `cargo_companies` DISABLE KEYS */;
INSERT INTO `cargo_companies` (`id`, `logo`, `name`, `slug`, `PSH`, `jet_price`, `emergency`, `kar_marj`, `entegrations`, `created_at`, `updated_at`) VALUES
	(3, '1652256350.png', 'FEDEX', 'fedex', 2, 2, 36, 2, '["He6ehe7wnh", "7eneusu72nwu7w"]', '2022-07-26 12:09:19', '2022-07-26 12:09:19'),
	(4, '1655964176.jpg', 'Test', 'test', 3, 4, 5, 10, '["He6ehe7wnh", "7eneusu72nwu7w"]', '2022-06-14 16:14:46', '2022-06-23 06:02:56'),
	(5, '1658817611.jpg', 'New Company', 'new-company', 12, 12, 12, 1, '["123124asd12", "sdf12325as1"]', '2022-07-14 07:29:33', '2022-07-26 06:40:19'),
	(6, '1658814838.jpg', 'asdas', 'asdas', 12, 2, 3, 2, '["asdasd1", "2asd12esd"]', '2022-07-26 05:53:58', '2022-07-26 06:20:54');
/*!40000 ALTER TABLE `cargo_companies` ENABLE KEYS */;

-- Dumping structure for table kargo_com.cargo_countries
CREATE TABLE IF NOT EXISTS `cargo_countries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `companyID` int(11) NOT NULL,
  `country` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `zone` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=917 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table kargo_com.cargo_countries: ~238 rows (approximately)
/*!40000 ALTER TABLE `cargo_countries` DISABLE KEYS */;
INSERT INTO `cargo_countries` (`id`, `companyID`, `country`, `zone`, `created_at`, `updated_at`) VALUES
	(679, 3, 'Afghanistan', '11', '2022-05-11 03:09:06', '2022-05-11 03:09:06'),
	(680, 3, 'Åland Islands', '1', '2022-05-11 03:09:06', '2022-05-11 03:09:06'),
	(681, 3, 'Albania', '5', '2022-05-11 03:09:06', '2022-05-11 03:09:06'),
	(682, 3, 'Algeria', '15', '2022-05-11 03:09:06', '2022-05-11 03:09:06'),
	(683, 3, 'American Samoa', '15', '2022-05-11 03:09:06', '2022-05-11 03:09:06'),
	(684, 3, 'AndorrA', '15', '2022-05-11 03:09:06', '2022-05-11 03:09:06'),
	(685, 3, 'Angola', '15', '2022-05-11 03:09:06', '2022-05-11 03:09:06'),
	(686, 3, 'Anguilla', '15', '2022-05-11 03:09:06', '2022-05-11 03:09:06'),
	(687, 3, 'Antarctica', '13', '2022-05-11 03:09:06', '2022-05-11 03:09:06'),
	(688, 3, 'Antigua and Barbuda', '12', '2022-05-11 03:09:06', '2022-05-11 03:09:06'),
	(689, 3, 'Argentina', '15', '2022-05-11 03:09:06', '2022-05-11 03:09:06'),
	(690, 3, 'Armenia', '7', '2022-05-11 03:09:06', '2022-05-11 03:09:06'),
	(691, 3, 'Aruba', '2', '2022-05-11 03:09:06', '2022-05-11 03:09:06'),
	(692, 3, 'Australia', '3', '2022-05-11 03:09:06', '2022-05-11 03:09:06'),
	(693, 3, 'Austria', '15', '2022-05-11 03:09:06', '2022-05-11 03:09:06'),
	(694, 3, 'Azerbaijan', '4', '2022-05-11 03:09:06', '2022-05-11 03:09:06'),
	(695, 3, 'Bahamas', '13', '2022-05-11 03:09:06', '2022-05-11 03:09:06'),
	(696, 3, 'Bahrain', '8', '2022-05-11 03:09:06', '2022-05-11 03:09:06'),
	(697, 3, 'Bangladesh', '15', '2022-05-11 03:09:06', '2022-05-11 03:09:06'),
	(698, 3, 'Barbados', '4', '2022-05-11 03:09:06', '2022-05-11 03:09:06'),
	(699, 3, 'Belarus', '2', '2022-05-11 03:09:06', '2022-05-11 03:09:06'),
	(700, 3, 'Belgium', '8', '2022-05-11 03:09:06', '2022-05-11 03:09:06'),
	(701, 3, 'Belize', '12', '2022-05-11 03:09:06', '2022-05-11 03:09:06'),
	(702, 3, 'Benin', '15', '2022-05-11 03:09:06', '2022-05-11 03:09:06'),
	(703, 3, 'Bermuda', '11', '2022-05-11 03:09:06', '2022-05-11 03:09:06'),
	(704, 3, 'Bhutan', '14', '2022-05-11 03:09:06', '2022-05-11 03:09:06'),
	(705, 3, 'Bolivia', '15', '2022-05-11 03:09:06', '2022-05-11 03:09:06'),
	(706, 3, 'Bosnia and Herzegovina', '15', '2022-05-11 03:09:06', '2022-05-11 03:09:06'),
	(707, 3, 'Botswana', '13', '2022-05-11 03:09:06', '2022-05-11 03:09:06'),
	(708, 3, 'Bouvet Island', '12', '2022-05-11 03:09:06', '2022-05-11 03:09:06'),
	(709, 3, 'Brazil', '14', '2022-05-11 03:09:06', '2022-05-11 03:09:06'),
	(710, 3, 'British Indian Ocean Territory', '14', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(711, 3, 'Brunei Darussalam', '9', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(712, 3, 'Bulgaria', '12', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(713, 3, 'Burkina Faso', '12', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(714, 3, 'Burundi', '15', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(715, 3, 'Cambodia', '14', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(716, 3, 'Cameroon', '15', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(717, 3, 'Canada', '15', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(718, 3, 'Cape Verde', '15', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(719, 3, 'Cayman Islands', '3', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(720, 3, 'Central African Republic', '15', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(721, 3, 'Chad', '13', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(722, 3, 'Chile', '13', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(723, 3, 'China', '14', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(724, 3, 'Christmas Island', '15', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(725, 3, 'Cocos (Keeling) Islands', '15', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(726, 3, 'Colombia', '9', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(727, 3, 'Comoros', '15', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(728, 3, 'Congo', '14', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(729, 3, 'Congo, The Democratic Republic of the', '8', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(730, 3, 'Cook Islands', '13', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(731, 3, 'Costa Rica', '15', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(732, 3, 'Cote D\\\'Ivoire', '14', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(733, 3, 'Croatia', '12', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(734, 3, 'Cuba', '15', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(735, 3, 'Czech Republic', '12', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(736, 3, 'Denmark', '14', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(737, 3, 'Djibouti', '6', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(738, 3, 'Dominica', '7', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(739, 3, 'Dominican Republic', '13', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(740, 3, 'Ecuador', '13', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(741, 3, 'Egypt', '6', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(742, 3, 'El Salvador', '9', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(743, 3, 'Equatorial Guinea', '3', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(744, 3, 'Eritrea', '14', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(745, 3, 'Estonia', '15', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(746, 3, 'Ethiopia', '14', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(747, 3, 'Falkland Islands (Malvinas)', '2', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(748, 3, 'Faroe Islands', '14', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(749, 3, 'Fiji', '14', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(750, 3, 'Finland', '9', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(751, 3, 'France', '15', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(752, 3, 'French Guiana', '15', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(753, 3, 'French Polynesia', '6', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(754, 3, 'French Southern Territories', '8', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(755, 3, 'Gabon', '13', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(756, 3, 'Gambia', '14', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(757, 3, 'Georgia', '15', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(758, 3, 'Germany', '12', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(759, 3, 'Ghana', '12', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(760, 3, 'Greece', '15', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(761, 3, 'Greenland', '8', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(762, 3, 'Grenada', '13', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(763, 3, 'Guadeloupe', '3', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(764, 3, 'Guam', '1', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(765, 3, 'Guatemala', '15', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(766, 3, 'Guernsey', '14', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(767, 3, 'Guinea', '15', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(768, 3, 'Guinea-Bissau', '2', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(769, 3, 'Guyana', '2', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(770, 3, 'Haiti', '2', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(771, 3, 'Heard Island and Mcdonald Islands', '13', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(772, 3, 'Holy See (Vatican City State)', '2', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(773, 3, 'Hong Kong', '2', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(774, 3, 'Hungary', '3', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(775, 3, 'Iceland', '12', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(776, 3, 'India', '9', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(777, 3, 'Indonesia', '2', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(778, 3, 'Iran, Islamic Republic Of', '3', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(779, 3, 'Iraq', '14', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(780, 3, 'Ireland', '13', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(781, 3, 'Isle of Man', '13', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(782, 3, 'Israel', '14', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(783, 3, 'Italy', '15', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(784, 3, 'Jamaica', '14', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(785, 3, 'Japan', '5', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(786, 3, 'Jersey', '15', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(787, 3, 'Jordan', '15', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(788, 3, 'Kazakhstan', '3', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(789, 3, 'Kenya', '12', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(790, 3, 'Kiribati', '4', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(791, 3, 'Korea, Democratic People\\\'S Republic of', '11', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(792, 3, 'Korea, Republic of', '15', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(793, 3, 'Kuwait', '4', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(794, 3, 'Kyrgyzstan', '13', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(795, 3, 'Lao People\\\'S Democratic Republic', '9', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(796, 3, 'Latvia', '15', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(797, 3, 'Lebanon', '9', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(798, 3, 'Lesotho', '14', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(799, 3, 'Liberia', '14', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(800, 3, 'Libyan Arab Jamahiriya', '13', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(801, 3, 'Liechtenstein', '4', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(802, 3, 'Lithuania', '2', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(803, 3, 'Luxembourg', '15', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(804, 3, 'Macao', '11', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(805, 3, 'Macedonia, The Former Yugoslav Republic of', '15', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(806, 3, 'Malawi', '4', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(807, 3, 'Malaysia', '14', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(808, 3, 'Maldives', '6', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(809, 3, 'Mali', '15', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(810, 3, 'Malta', '4', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(811, 3, 'Marshall Islands', '11', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(812, 3, 'Martinique', '2', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(813, 3, 'Mauritania', '2', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(814, 3, 'Mauritius', '13', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(815, 3, 'Mayotte', '15', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(816, 3, 'Mexico', '13', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(817, 3, 'Micronesia, Federated States of', '13', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(818, 3, 'Moldova, Republic of', '14', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(819, 3, 'Monaco', '13', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(820, 3, 'Mongolia', '14', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(821, 3, 'Montserrat', '3', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(822, 3, 'Morocco', '15', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(823, 3, 'Mozambique', '15', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(824, 3, 'Myanmar', '11', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(825, 3, 'Namibia', '15', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(826, 3, 'Nauru', '10', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(827, 3, 'Nepal', '15', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(828, 3, 'Netherlands', '15', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(829, 3, 'Netherlands Antilles', '11', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(830, 3, 'New Caledonia', '14', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(831, 3, 'New Zealand', '14', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(832, 3, 'Nicaragua', '15', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(833, 3, 'Niger', '15', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(834, 3, 'Nigeria', '9', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(835, 3, 'Niue', '11', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(836, 3, 'Norfolk Island', '15', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(837, 3, 'Northern Mariana Islands', '14', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(838, 3, 'Norway', '15', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(839, 3, 'Oman', '15', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(840, 3, 'Pakistan', '13', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(841, 3, 'Palau', '7', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(842, 3, 'Palestinian Territory, Occupied', '13', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(843, 3, 'Panama', '12', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(844, 3, 'Papua New Guinea', '15', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(845, 3, 'Paraguay', '11', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(846, 3, 'Peru', '12', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(847, 3, 'Philippines', '15', '2022-05-11 03:09:07', '2022-05-11 03:09:07'),
	(848, 3, 'Pitcairn', '14', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(849, 3, 'Poland', '15', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(850, 3, 'Portugal', '14', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(851, 3, 'Puerto Rico', '14', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(852, 3, 'Qatar', '2', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(853, 3, 'Reunion', '3', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(854, 3, 'Romania', '15', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(855, 3, 'Russian Federation', '15', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(856, 3, 'RWANDA', '3', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(857, 3, 'Saint Helena', '13', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(858, 3, 'Saint Kitts and Nevis', '15', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(859, 3, 'Saint Lucia', '15', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(860, 3, 'Saint Pierre and Miquelon', '15', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(861, 3, 'Saint Vincent and the Grenadines', '15', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(862, 3, 'Samoa', '15', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(863, 3, 'San Marino', '9', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(864, 3, 'Sao Tome and Principe', '14', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(865, 3, 'Saudi Arabia', '11', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(866, 3, 'Senegal', '8', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(867, 3, 'Serbia and Montenegro', '11', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(868, 3, 'Seychelles', '4', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(869, 3, 'Sierra Leone', '10', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(870, 3, 'Singapore', '2', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(871, 3, 'Slovakia', '15', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(872, 3, 'Slovenia', '13', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(873, 3, 'Solomon Islands', '15', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(874, 3, 'Somalia', '15', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(875, 3, 'South Africa', '15', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(876, 3, 'South Georgia and the South Sandwich Islands', '15', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(877, 3, 'Spain', '15', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(878, 3, 'Sri Lanka', '14', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(879, 3, 'Sudan', '12', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(880, 3, 'Suriname', '15', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(881, 3, 'Svalbard and Jan Mayen', '11', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(882, 3, 'Swaziland', '13', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(883, 3, 'Sweden', '13', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(884, 3, 'Switzerland', '14', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(885, 3, 'Taiwan, Province of China', '15', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(886, 3, 'Tajikistan', '14', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(887, 3, 'Tanzania, United Republic of', '13', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(888, 3, 'Thailand', '15', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(889, 3, 'Timor-Leste', '15', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(890, 3, 'Togo', '13', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(891, 3, 'Tokelau', '2', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(892, 3, 'Tonga', '14', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(893, 3, 'Trinidad and Tobago', '11', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(894, 3, 'Tunisia', '15', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(895, 3, 'Turkey', '15', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(896, 3, 'Turkmenistan', '14', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(897, 3, 'Turks and Caicos Islands', '14', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(898, 3, 'Tuvalu', '15', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(899, 3, 'Uganda', '15', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(900, 3, 'Ukraine', '14', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(901, 3, 'United Arab Emirates', '13', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(902, 3, 'United Kingdom', '3', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(903, 3, 'United States', '14', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(904, 3, 'United States Minor Outlying Islands', '11', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(905, 3, 'Uruguay', '12', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(906, 3, 'Uzbekistan', '12', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(907, 3, 'Vanuatu', '10', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(908, 3, 'Venezuela', '5', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(909, 3, 'Viet Nam', '6', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(910, 3, 'Virgin Islands, British', '2', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(911, 3, 'Virgin Islands, U.S.', '4', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(912, 3, 'Wallis and Futuna', '2', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(913, 3, 'Western Sahara', '3', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(914, 3, 'Yemen', '5', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(915, 3, 'Zambia', '2', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(916, 3, 'Zimbabwe', '10', '2022-05-11 03:09:08', '2022-05-11 03:09:08');
/*!40000 ALTER TABLE `cargo_countries` ENABLE KEYS */;

-- Dumping structure for table kargo_com.cargo_documents
CREATE TABLE IF NOT EXISTS `cargo_documents` (
  `doc_id` varchar(50) COLLATE utf8_bin NOT NULL,
  `cargo_id` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `document` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`doc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table kargo_com.cargo_documents: ~38 rows (approximately)
/*!40000 ALTER TABLE `cargo_documents` DISABLE KEYS */;
INSERT INTO `cargo_documents` (`doc_id`, `cargo_id`, `document`, `type`) VALUES
	('08oce1l5m', '1562c551cc07ead', '41689982.png', 'FDA'),
	('0fu17fy76', '1562aae4a04bb5b', 'cover.png', 'FDA'),
	('0h2o51vic', '1562aacc0a29f22', 'bbburst.svg', 'MSDS'),
	('12dbfd18g', '49154828', 'cargo_request (3) (2) (1).pdf', 'FDA'),
	('15nfil3qn', 'M29665850', '23465895 (1).png', 'FDA'),
	('274b3wdq4', 'M81079666', 'download.png', 'FDA'),
	('2a1nzl6cz', '1562c5743179db4', '60838968.png', 'FDA'),
	('4w17xlzhf', '1562beb1038a388', '11912353.png', 'MSDS'),
	('6yrm0inme', '1562c56a2899b11', '86984994.png', 'FDA'),
	('767eq6a81', '1562a2f487cd140', 'Senan_Qulamov_-_Software_Developer.pdf', 'FDA'),
	('7c6ts3ilf', '1562a83e5d1d8bb', 'kargo.sql', 'FDA'),
	('7mpwqkk34', '1562c53bcbc54df', 'env', 'MSDS'),
	('85wp4l66g', '1562aae8b3b573d', 'profile.png', 'FDA'),
	('8t8pkdu4e', 'M16810153', 'download.png', 'MSDS'),
	('aeny7k0t0', '1562aae17e96fdf', 'kargo.sql', 'FDA'),
	('b2if210al', '1562aae404aa00a', 'cover.png', 'FDA'),
	('berrk57wa', '1562c3d4fc764cc', '29016950.png', 'MSDS'),
	('brq8yemmv', '1562a2f4707b9f6', 'kargo.sql', 'FDA'),
	('ch6t90r8p', '1562beadcc35b27', '989e94e2-ebe1-4d5d-9911-254bdb9767c9.jpeg', 'FDA'),
	('d2j2xt370', '1562bab3190ef4f', '60838968.png', 'MSDS'),
	('d8bevdxik', '1562a2f5e5769c2', 'Verilənlərin strukturu.Alqoritmlər.Müh-ı kurs.doc', 'other'),
	('exc5uhx4l', '1562a2f4707b9f6', 'u66l65_shiplounge (1).sql', 'FDA'),
	('f9ndklykz', '98610888', '41689982.png', 'FDA'),
	('fjpqkzxh2', '1562c54c14be378', '41689982.png', 'FDA'),
	('he1isgk6v', '1562ba9fdaa7807', 'Bulud hesablamaları_Nazim_M_N.docx', 'other'),
	('hmkopmyoq', 'M51651626', '89223487.png', 'FDA'),
	('hq44czszo', 'M30096436', 'Bulud hesablama (1).pdf', 'FDA'),
	('hrjikpki3', '1562c3d4fc764cc', 'cargo_request (3).pdf', 'other'),
	('jlgbkzth9', 'M16810153', 'cargo_request (7).pdf', 'other'),
	('jt62bqcbx', 'M16810153', '1652256350.png', 'FDA'),
	('ldtz7egpf', '1562a2f487cd140', 'IMG_20220520_145538_037.jpg', 'FDA'),
	('m9nf0gkdb', '1562c3d4fc764cc', '89562813.png', 'FDA'),
	('mhrhagje6', '74262758', '57014323.png', 'MSDS'),
	('mibz2yb4v', 'M24400637', 'Group (13).svg', 'FDA'),
	('mms0fb52o', '1562beadcc35b27', '60838968 (1).png', 'FDA'),
	('oh223agqe', 'M35775082', 'download.png', 'other'),
	('op8szt0w7', '1562ba9fdaa7807', 'kargo.sql', 'FDA'),
	('q6mltd8g7', '1562a2f5e5769c2', 'image.jpg', 'MSDS'),
	('qb8jhaw08', '1562ba9fdaa7807', 'Bulud hesablama.pdf', 'MSDS'),
	('r22krevsl', 'M87509090', '23465895.png', 'FDA'),
	('sae6isnod', '1562a83b6960ee6', 'image.jpg', 'MSDS'),
	('sipfvtbul', '1562beb98db39f1', 'cargo_request (2).pdf', 'MSDS'),
	('ssswakxpw', '1562a83b6960ee6', 'The Brothers Karamazov Worlds of the Novel by Robin Feuer Miller (z-lib.org).pdf', 'FDA'),
	('t4f6iqmwj', 'M24400637', 'Bulud hesablama (1).pdf', 'MSDS'),
	('w71g9c5v1', '74262758', 'e4we4m2fx.png', 'FDA'),
	('xt782dtei', '1562c55f66418b0', '41689982.png', 'FDA'),
	('ybuzxi620', '1562c53bcbc54df', 'cargo_request (3) (2).pdf', 'FDA'),
	('zzerys6ad', '1562ab143344ac6', 'default.png', 'FDA');
/*!40000 ALTER TABLE `cargo_documents` ENABLE KEYS */;

-- Dumping structure for table kargo_com.cargo_requests
CREATE TABLE IF NOT EXISTS `cargo_requests` (
  `id` varchar(50) COLLATE utf8_bin NOT NULL,
  `status` int(50) DEFAULT '0',
  `submitted` int(50) DEFAULT '0',
  `cancel_comment` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `order_type` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `tracking_number` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `user_id` varchar(50) COLLATE utf8_bin NOT NULL,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `zipcode` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `total_cargo_price` float DEFAULT NULL,
  `total_volume` float DEFAULT NULL,
  `total_weight` float DEFAULT NULL,
  `total_deci` int(50) DEFAULT NULL,
  `total_count` int(50) DEFAULT NULL,
  `total_worth` int(50) DEFAULT NULL,
  `ioss_number` int(50) DEFAULT NULL,
  `vat_number` int(50) DEFAULT NULL,
  `currency` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `order_info` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `packages` json DEFAULT NULL,
  `additional_services` json DEFAULT NULL,
  `company_value` json DEFAULT NULL,
  `cargo_company` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `battery` varchar(50) COLLATE utf8_bin DEFAULT 'no',
  `liquid` varchar(50) COLLATE utf8_bin DEFAULT 'no',
  `food` varchar(50) COLLATE utf8_bin DEFAULT 'no',
  `dangerous` varchar(50) COLLATE utf8_bin DEFAULT 'no',
  `document` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table kargo_com.cargo_requests: ~36 rows (approximately)
/*!40000 ALTER TABLE `cargo_requests` DISABLE KEYS */;
INSERT INTO `cargo_requests` (`id`, `status`, `submitted`, `cancel_comment`, `order_type`, `tracking_number`, `user_id`, `name`, `country`, `city`, `state`, `address`, `zipcode`, `phone`, `email`, `total_cargo_price`, `total_volume`, `total_weight`, `total_deci`, `total_count`, `total_worth`, `ioss_number`, `vat_number`, `currency`, `order_info`, `packages`, `additional_services`, `company_value`, `cargo_company`, `battery`, `liquid`, `food`, `dangerous`, `document`, `created_at`, `updated_at`) VALUES
	('1562a1ed0dc0fb5', 3, 0, NULL, NULL, NULL, '14', 'Senan', 'Azerbaijan', 'Baku', 'Baku', 'Mehmandarov 72', 'AZ1149', '0555639129', 'ferhad.thl@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 13123, 1231231, 'USD', '123123', '["nz08ox2wn"]', NULL, NULL, '4', 'yes', 'no', 'no', 'no', '["image (1).jpg"]', '2022-05-22 15:30:04', '2022-05-22 15:30:04'),
	('1562a2e3504dbad', 0, 0, NULL, NULL, NULL, '14', 'Alex', 'Åland Islands', NULL, NULL, 'Absheron 123', 'AZ0102', '518215735', 'alex.1618@gmail.com', NULL, 559841, 748225, 748225, 748225, 647214625, 13123, 1231231, 'USD', 'Clock', '["647lgtkic"]', NULL, NULL, '4', 'yes', 'no', 'no', 'no', '["u66l65_shiplounge (1).sql"]', '2022-01-22 15:30:33', '2022-07-27 11:32:16'),
	('1562a2f5e5769c2', 0, 0, NULL, NULL, NULL, '14', 'Somete', 'Antarctica', 'Qax', 'Xirdalan', 'Baku 123', 'AZ5555', '518245511', 'somete@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 123123, 4553, 'USD', 'Zero', '["yadl8yzwq", "r6nkspesf"]', NULL, NULL, '4', 'no', 'yes', 'yes', 'no', '["Veril\\u0259nl\\u0259rin strukturu.Alqoritml\\u0259r.M\\u00fch-\\u0131 kurs.doc","image.jpg"]', '2022-04-22 15:29:41', '2022-06-28 12:37:10'),
	('1562a3314856e54', 3, 0, NULL, NULL, NULL, '14', 'Roshen Alex', 'Azerbaijan', '---', 'Khyrdalan', 'Khyrdalan city Haydar Aliev avenue', 'AZ0102', '518215735', 'rashadalakbaov.1618@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 888888, 2342343, 'USD', NULL, '["d1ni24ut8"]', NULL, NULL, '3', 'no', 'no', 'no', 'no', '["Senan_Qulamov_-_Software_Developer.pdf","u66l65_shiplounge (1).sql","kiber kol1.docx"]', '2022-05-22 15:30:04', '2022-06-28 12:51:18'),
	('1562a83b6960ee6', 3, 0, NULL, NULL, NULL, '14', 'Nermin Nerminli', 'Chad', 'Ucar', 'Aran', 'Ucar Qezyan 12', 'AZ00120', '642342352', 'narmin1990@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 697794, 124441, 'USD', 'Qolbaq , Saat , Sirga ,', '["qvht1m8al", "3qrbj146s"]', NULL, NULL, '4', 'yes', 'no', 'no', 'no', '["The Brothers Karamazov Worlds of the Novel by Robin Feuer Miller (z-lib.org).pdf","image.jpg"]', '2022-03-22 15:30:33', '2022-03-22 15:30:33'),
	('1562a83e5d1d8bb', 0, 0, NULL, NULL, NULL, '14', 'Ayaz Mensimli', 'Wallis and Futuna', 'Ucar', 'Aran', 'Ucar Qezyan 33', 'AZ02450', '+99477723455', 'ayaz12@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 692294, 11245, 'USD', 'Gumus Boyunbaq ,', '["xww6r0f49"]', NULL, NULL, '4', 'no', 'no', 'no', 'yes', '["kargo.sql"]', '2022-03-22 15:30:33', '2022-03-22 15:30:33'),
	('1562aaca6bb8d9f', 0, 0, NULL, NULL, NULL, '14', 'Roshen Alex', 'Austria', 'Baku', 'Khyrdalan', 'Khyrdalan city Haydar Aliev avenue', 'AZ0102', '518215735', 'rashadalakbaov.1618@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 697794, 1231231, 'USD', 'Clock ,', '["2bb1yycmh"]', NULL, NULL, '3', 'no', 'no', 'yes', 'no', '["bbburst.svg"]', '2022-05-22 15:30:04', '2022-07-27 11:28:25'),
	('1562aacb1293fbb', 3, 0, NULL, NULL, NULL, '14', 'Roshen Alex', 'Austria', 'Baku', 'Khyrdalan', 'Khyrdalan city Haydar Aliev avenue', 'AZ0102', '518215735', 'rashadalakbaov.1618@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 697794, 1231231, 'USD', 'Clock ,', '["2bb1yycmh"]', NULL, NULL, '4', 'no', 'no', 'yes', 'no', '["bbburst.svg"]', '2022-02-22 15:30:20', '2022-06-30 13:17:06'),
	('1562aacb423d3de', 0, 0, NULL, NULL, NULL, '14', 'Roshen Alex', 'Austria', 'Baku', 'Khyrdalan', 'Khyrdalan city Haydar Aliev avenue', 'AZ0102', '518215735', 'rashadalakbaov.1618@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 697794, 1231231, 'USD', 'Clock ,', '["2bb1yycmh"]', NULL, NULL, '3', 'no', 'no', 'yes', 'no', '["bbburst.svg"]', '2022-02-22 15:30:20', '2022-02-22 15:30:20'),
	('1562aacbd839cef', 0, 0, NULL, NULL, NULL, '14', 'Roshen Alex', 'Austria', 'Baku', 'Khyrdalan', 'Khyrdalan city Haydar Aliev avenue', 'AZ0102', '518215735', 'rashadalakbaov.1618@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 697794, 1231231, 'USD', 'Clock ,', '["2bb1yycmh"]', NULL, NULL, '4', 'no', 'no', 'yes', 'no', '["bbburst.svg"]', '2022-02-22 15:30:20', '2022-02-22 15:30:20'),
	('1562aacc0a29f22', 3, 0, NULL, NULL, NULL, '14', 'Roshen Alex', 'Austria', 'Baku', 'Khyrdalan', 'Khyrdalan city Haydar Aliev avenue', 'AZ0102', '518215735', 'rashadalakbaov.1618@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 697794, 1231231, 'USD', 'Clock ,', '["2bb1yycmh"]', NULL, NULL, '4', 'no', 'no', 'yes', 'no', '["bbburst.svg"]', '2022-02-22 15:30:20', '2022-02-22 15:30:20'),
	('1562aae17e96fdf', 3, 0, NULL, NULL, NULL, '14', 'JAsdj ALasd', 'Bolivia', 'asdsad', 'sdasdasa', 'dasdasdsa', 'AZ23123', '642342352', 'asdasdsad@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 34124, 12123, 'USD', 'Bar 1 , Bar 2 ,', '["65s5h6jpw", "qti2bv1kd"]', NULL, NULL, '4', 'yes', 'yes', 'no', 'no', '["kargo.sql"]', '2022-03-22 15:30:33', '2022-03-22 15:30:33'),
	('1562aae43473fa0', 0, 0, NULL, NULL, NULL, '14', 'Sindam Xantur', 'Australia', 'Sydney', 'Australia', 'asdasdasd', 'SYD1944', '3242344', 'sindam@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 55622, 44522, 'USD', 'Just Package ,', '["yfn31s8lt"]', NULL, NULL, '3', 'no', 'no', 'yes', 'yes', '["cover.png"]', '2022-04-22 15:29:41', '2022-06-28 12:59:39'),
	('1562aae4a04bb5b', 1, 0, NULL, NULL, NULL, '14', 'Angolica And an', 'Angola', 'Angolandiya', 'AngoCity', 'Aangoo asrd', 'ANG1003', '0555639129', 'angollandor@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 55622, 11234441, 'USD', 'Ango Watch , And Nothing', '["e4we4m2fx"]', NULL, NULL, '3', 'yes', 'yes', 'no', 'yes', '["cover.png"]', '2022-04-22 15:29:41', '2022-07-18 12:13:45'),
	('1562aae8b3b573d', 2, 0, NULL, NULL, NULL, '23', 'Someone Ayazov', 'Afghanistan', 'Afqan city', 'Afqan', 'Af mall in Afqan city', 'AF8893', '25235532', 'someone@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 66673345, 33562, 'USD', 'Ayaz\'s cloth ,', '["dow3ecdr8"]', NULL, NULL, '3', 'no', 'no', 'no', 'yes', '["profile.png"]', '2022-04-22 15:29:41', '2022-07-08 07:47:47'),
	('1562ab143344ac6', 2, 0, NULL, NULL, NULL, '14', 'SSOMMS', 'Bahamas', 'Hawaii', 'Hawaii', 'Hawaii metro 1', 'HW3335', '123124666', 'dasdsds@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 65745, 24344, 'USD', 'Coccoo ,', '["1d6lopkfl"]', NULL, NULL, '4', 'no', 'yes', 'no', 'yes', '["default.png"]', '2022-06-16 11:29:55', '2022-07-08 07:48:14'),
	('1562ba9fdaa7807', 2, 0, NULL, NULL, NULL, '14', 'Haiti Engineer', 'Haiti', 'Haiti', 'Haiti Mosque', 'Haiti 57 street engineer', 'HA1224', '12312313', 'haitiengineer@gmail.com', 3338, NULL, NULL, NULL, NULL, NULL, 554433, 334455, 'EUR', 'Engineering tool , Additional ,', '["35270773", "60838968"]', '["bubble", "lent", "something"]', NULL, '3', 'no', 'yes', 'yes', 'yes', '{"0":"Bulud hesablamalar\\u0131_Nazim_M_N.docx","1":"Bulud hesablama.pdf","3":"kargo.sql"}', '2022-06-28 06:29:46', '2022-07-18 11:17:02'),
	('1562bab3190ef4f', 1, 0, NULL, NULL, NULL, '14', 'Kamran Qasimov', 'Brazilo', 'San Paul', 'Paul', 'San Paul downtown 45 street 57', 'BRZ123', '23423123', 'kamran@gmail.com', 600, NULL, NULL, NULL, NULL, NULL, 123123, 123123, 'EUR', 'Clock ,', '["70259842"]', '["bubble", "lent", "something"]', NULL, '3', 'no', 'no', 'yes', 'yes', '["60838968.png"]', '2022-06-28 07:51:53', '2022-07-28 12:49:27'),
	('1562beadcc35b27', 1, 0, NULL, NULL, NULL, '14', 'Samir', 'American Samoa', 'Samoa', 'American samoa', 'Samo 123e', 'SMA123', '12312321', 'samir@gmail.com', 344, 16, 4, 4, 4, 48, 12131231, 12312312, 'XPF', 'Samoa Clock ,', '["11912353"]', '{"lent": 11, "bubble": 48, "something": 16}', '{"3": 269.082}', '3', 'no', 'no', 'no', 'no', '["989e94e2-ebe1-4d5d-9911-254bdb9767c9.jpeg","60838968 (1).png"]', '2022-07-01 08:18:20', '2022-07-18 07:55:02'),
	('1562beb1038a388', 6, 0, NULL, NULL, NULL, '14', '12asdasda', 'Azerbaijan', 'asdasd', 'asdadasd', 'asdasda', '123asd12', '23123123', 'dasdsad@asda.dasd', 10244, 5200, 40, 76, 40, 40, 533412, 1234124, 'EUR', '2 , 12 ,', '["89562813", "29016950"]', '["bubble", "lent", "something", "insurance"]', NULL, '3', 'no', 'yes', 'yes', 'yes', '["11912353.png"]', '2022-07-01 08:32:03', '2022-07-13 12:09:59'),
	('1562beb98db39f1', 0, 0, NULL, NULL, NULL, '14', 'Samir', 'American Samoa', 'American samoa', 'Samoa', 'Samo 123', 'SMA123', '11000101101', 'samir@gmail.com', 6184, 257, 53, 70, 11, 1053, 545443, 545443, 'EUR', 'Stpa , PTSA , TSTSA ,', '["80675713", "34303720", "42396873"]', '["lent", "something", "insurance"]', NULL, '3', 'yes', 'no', 'no', 'no', '["cargo_request (2).pdf"]', '2022-07-01 09:08:29', '2022-07-14 09:07:50'),
	('1562c3d4fc764cc', 0, 0, NULL, NULL, NULL, '27', 'Papp Balogh', 'Hungary', 'Budapest', 'Nagymező', '065 Budapest, Nagymező utca 32', '1065', '432252345', 'pappbalogh@gmail.com', 8389, 154, 37, 112, 29, 255, 113451, 455652, 'EUR', 'Shirt , Trousers , Hat , Shoes ,', '["11097978", "64382375", "49219242", "51503643"]', '{"lent": "bubble", "bubble": "bubble", "something": "bubble"}', NULL, '4', 'no', 'no', 'no', 'no', '["29016950.png","cargo_request (3).pdf","89562813.png"]', '2022-07-05 06:06:52', '2022-07-06 10:39:49'),
	('1562c53bcbc54df', 0, 1, NULL, NULL, NULL, '14', 'Shiu Shou', 'China', 'Hong Kong', 'Southern China', 'Honk Kong street 3442', 'HK112', NULL, 'shiushou@gmail.com', 2458.96, 0.000679, 31, 37, 11, 1423, 234523, 2345, 'EUR', 'PR Shou , Shou Ko ,', '["97486945", "41689982"]', '{"lent": 22, "asdasd": 84, "bubble": 1423}', '{"3": 929.958}', '3', 'no', 'no', 'no', 'no', '["env","cargo_request (3) (2).pdf"]', '2022-07-06 07:37:47', '2022-07-28 13:19:34'),
	('1562c54c14be378', 6, 0, NULL, NULL, NULL, '14', 'Roshen Alex', 'Azerbaijan', 'Baku', 'Khyrdalan', 'Khyrdalan city Haydar Aliev avenue', 'AZ0102', '518215735', 'rashadalakbaov.1618@gmail.com', 805, 16, 4, 4, 6, 6, 123123, 3123123, 'EUR', 'Kerimcan ,', '["75647411"]', '{"lent": "33.00", "bubble": "216.00"}', NULL, '4', 'no', 'no', 'no', 'no', '["41689982.png"]', '2022-07-06 08:47:16', '2022-07-13 12:10:04'),
	('1562c55f66418b0', 5, 0, 'Jus testing', NULL, NULL, '14', 'Roshen Alex', 'Azerbaijan', 'Baku', 'Khyrdalan', 'Khyrdalan city Haydar Aliev avenue', 'AZ0102', '518215735', 'rashadalakbaov.1618@gmail.com', 2574, 81, 9, 9, 9, 9, NULL, NULL, 'EUR', '3 ,', '["45862185"]', '{"lent": "49.50", "bubble": "324.00", "something": "144.00"}', NULL, '3', 'yes', 'yes', 'no', 'no', '["41689982.png"]', '2022-07-06 10:09:42', '2022-07-18 11:25:27'),
	('1562c56a2899b11', 1, 0, NULL, NULL, NULL, '27', 'Papp Balogh', 'Hungary', 'Nagymező', 'Budapest', '065 Budapest, Nagymező utca 32', '1065', '12312313', 'pappbalogh@gmail.com', 1015, 1209, 30, 30, 3, 3, 4234324, 2342342, 'EUR', 'Pack ,', '["23465895"]', '{"bubble": 36}', NULL, '3', 'no', 'no', 'no', 'no', '["86984994.png"]', '2022-07-06 10:55:36', '2022-07-08 07:54:02'),
	('49154828', 3, 1, NULL, NULL, NULL, '27', 'Papp Balogh', 'Hungary', 'Nagymező', 'Budapest', '065 Budapest, Nagymező utca 32', '1065', NULL, 'pappbalogh@gmail.com', 281, 108, 33, 33, 6, 138, 123123, 4552343, 'EUR', 'Asdasd ,', '["84653631"]', '{"lent": 11, "bubble": 138, "something": 132}', '{"3": 450.846}', '4', 'no', 'no', 'no', 'no', '["cargo_request (3) (2) (1).pdf"]', '2022-07-06 11:45:04', '2022-07-14 09:09:39'),
	('74262758', 0, 1, 'aasdasd', 'Manual Order', NULL, '27', 'Thomas Edison', 'Canada', 'Vancuver', 'Canadian West', 'Vancuver , George street 446', 'VNC1244', '3551125552', 'thomasedison@gmail.com', 4218, 206, 34, 59, 24, 72, 666325, 667226, 'EUR', 'Phone , Watch ,', '["53388635", "94436041"]', '{"lent": 33, "something": 236}', '{"3": 3948.516, "4": 2515.3959999999997}', '3', 'no', 'no', 'no', 'no', '["57014323.png","e4we4m2fx.png"]', '2022-07-07 06:16:01', '2022-07-08 08:02:58'),
	('98610888', 3, 1, NULL, NULL, NULL, '27', 'Papp Balogh', 'Hungary', 'Nagymező', 'Budapest', '065 Budapest, Nagymező utca 32', '1065', '12312312', 'pappbalogh@gmail.com', 86, 144, 16, 16, 16, 64, 1231, 12312312, 'EUR', 'new Pro ,', '["57014323"]', '{"lent": 22, "something": 64}', '{"3": 210.375}', '5', 'no', 'no', 'no', 'no', '["41689982.png"]', '2022-07-06 11:43:11', '2022-07-14 09:15:39'),
	('M16810153', 1, 0, NULL, 'Manual Order', NULL, '4', 'Tria Marcelo', 'Bahamas', 'Bahad', 'Tirana', 'Sothere Tirana 37 street', 'TRSB1124', '1112466', 'triademomail@gmail.com', 6657, 0.111808, 71, 71, 70, 3104, 3366742, 3366742, 'BSD', 'CocoNut , Coco Seeds', '["60838929", "24819946"]', '{"lent": "385.00", "asdasd": "60.00", "bubble": "3104.00", "insurance": "698.40"}', '{"3": "2409.60", "4": "0", "5": "0", "6": "0"}', '3', 'no', 'yes', 'yes', 'yes', '{"0":"download.png","1":"cargo_request (7).pdf","3":"1652256350.png"}', '2022-07-28 10:41:49', '2022-07-28 12:41:55'),
	('M24400637', 0, 0, NULL, 'Manual Order', '123123wswe12', '27', 'Anatoli Varoba', 'Italy', 'Neapol', 'North Italy', 'Neapol CastWay 92', 'IT44776', '224511345', 'anatolidev@gmail.com', 2925.28, 54.9038, 42, 54, 14, 306, 335621356, 11113663, 'ITL', 'Tea Cup , Cup box ,', '["74113963", "94366851"]', '{"lent": 27.5, "bubble": 306}', '{"3": 2591.7839999999997}', '3', 'no', 'no', 'no', 'no', '["Group (13).svg","Bulud hesablama (1).pdf"]', '2022-07-18 11:36:31', '2022-07-26 09:05:38'),
	('M29665850', 0, 0, NULL, 'Manual Order', NULL, '14', 'Roshen Alex', 'Azerbaijan', 'Baku', 'Khyrdalan', 'Khyrdalan city Haydar Aliev avenue', 'AZ0102', '518215735', 'rashadalakbaov.1618@gmail.com', 352, 0.000081, 9, 9, 9, 27, 123123, 123123, 'BSD', 'ASDASdA ,', '["25592187"]', '{"lent": "49.50", "bubble": "27.00", "insurance": "6.08", "something": "36.00"}', '{"3": "233.24", "4": "0", "5": "0"}', '3', 'yes', 'no', 'no', 'no', '["23465895 (1).png"]', '2022-07-18 13:21:53', '2022-07-25 09:14:35'),
	('M30096436', 0, 0, NULL, 'Manual Order', NULL, '27', 'Anatoli Varoba', 'Italy', 'North Italy', 'Neapol', 'Neapol CastWay 92', 'IT44776', '224511345', 'anatolidev@gmail.com', 44, 891000, 9, 178, 9, 27, 123123, 123123, 'BMD', '3 ,', '["59995248"]', '{"lent": 16.5, "bubble": 27}', '[]', '4', 'no', 'no', 'no', 'no', '["Bulud hesablama (1).pdf"]', '2022-07-18 11:43:06', '2022-07-18 12:00:38'),
	('M35775082', 0, 0, NULL, 'Manual Order', NULL, '22', 'Nduwimana Deo', 'Burundi', 'Muyinga', 'Rusisiro', '3rd av.Swahili street, Burundi', 'BR1145', '+0021155335', 'deointhehouse@mail.ru', 21470, 0.192, 300, 300, 9, 117, 7722124, 1131355, 'BIF', 'Banana ,', '["45811361"]', '{"lent": "49.50", "bubble": "117.00", "insurance": "26.32", "something": "1200.00"}', '{"3": "20077.20", "4": "0", "5": "0"}', '3', 'no', 'yes', 'yes', 'no', '["download.png"]', '2022-07-20 06:42:40', '2022-07-20 06:42:40'),
	('M51651626', 0, 0, NULL, 'Manual Order', NULL, '14', 'Roshen Alex', 'Azerbaijan', 'Baku', 'Khyrdalan', 'Khyrdalan city Haydar Aliev avenue', 'AZ0102', '518215735', 'rashadalakbaov.1618@gmail.com', 10973.7, 0.002816, 176, 176, 16, 640, 31123, 31123, 'NAD', 'KDU ,', '["90476756"]', '{"lent": "88.00", "asdasd": "48.00", "bubble": "640.00", "insurance": "144.00"}', '{"3": "10053.65", "4": "0", "5": "0"}', '3', 'no', 'yes', 'yes', 'no', '["89223487.png"]', '2022-07-25 11:57:59', '2022-07-28 13:32:28'),
	('M81079666', 5, 1, 'Something', 'Manual Order', '123s000', '14', 'Shiu Shou', 'Bouvet Island', 'Southern China', 'Hong Kong', 'Honk Kong street 3442', 'HK112', '12313123', 'shiushou@gmail.com', 1802, 0.081, 36, 36, 36, 432, 11221, 122121, 'AZN', 'CHINI , Asdasdasd', '["89223487"]', '{"lent": 66, "bubble": 432}', '{"3": 1304.4240000000002}', '3', 'no', 'no', 'no', 'no', '["download.png"]', '2022-07-20 11:02:17', '2022-07-28 13:34:21'),
	('M87509090', 0, 1, 'asdasd', 'Manual Order', 'asdasd123', '14', 'Somete', 'Antarctica', 'Xirdalan', 'Absheron', 'Baku 1234', 'AZ5555', '518245511', 'somete@gmail.com', 1655.33, 0.000706, 34, 43, 34, 152, 1321213213, 1213213, 'KHR', 'DD , FF , SS', '["53287047", "80629414"]', '{"lent": 44, "bubble": 152}', '{"3": 1459.3340000000003}', '3', 'no', 'no', 'no', 'no', '["23465895.png"]', '2022-07-08 08:13:37', '2022-07-28 13:33:10');
/*!40000 ALTER TABLE `cargo_requests` ENABLE KEYS */;

-- Dumping structure for table kargo_com.cargo_zones
CREATE TABLE IF NOT EXISTS `cargo_zones` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `companyID` int(11) NOT NULL,
  `desi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `zone` json DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=933 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table kargo_com.cargo_zones: ~310 rows (approximately)
/*!40000 ALTER TABLE `cargo_zones` DISABLE KEYS */;
INSERT INTO `cargo_zones` (`id`, `user_id`, `companyID`, `desi`, `zone`, `created_at`, `updated_at`) VALUES
	(621, NULL, 3, '0.5', '[17.3, 17.3, 23.4, 24.4, 17.55, 36.85, 36.15, 27.25, 24.6, 26.6, 29.55, 28.45, 35.65, 91.35, 61.15]', '2022-05-11 03:09:08', '2022-05-11 03:09:08'),
	(622, NULL, 3, '1', '[20.75, 20.75, 25.9, 29.85, 19.1, 52.4, 46, 34.3, 27.3, 31.85, 35.9, 31.6, 41.95, 107.15, 68.8]', '2022-05-11 03:09:09', '2022-05-11 03:09:09'),
	(623, NULL, 3, '1.5', '[23.45, 23.45, 29.55, 34.7, 25.85, 61.25, 51.25, 50.3, 29.85, 37.65, 40.6, 35.05, 47.75, 118.2, 75.3]', '2022-05-11 03:09:09', '2022-05-11 03:09:09'),
	(624, NULL, 3, '2', '[26.05, 26.05, 32.25, 40.75, 30.05, 69.25, 58.3, 56.95, 31.55, 42.15, 46.55, 38.5, 53.1, 134.2, 80.6]', '2022-05-11 03:09:09', '2022-05-11 03:09:09'),
	(625, NULL, 3, '2.5', '[29.25, 29.25, 34.65, 44.95, 36.95, 76.1, 75.15, 75.7, 38.7, 45.85, 54.2, 43.1, 64.65, 137.55, 101.45]', '2022-05-11 03:09:09', '2022-05-11 03:09:09'),
	(626, NULL, 3, '3', '[31.95, 31.95, 37.9, 51.85, 47.3, 82.95, 80.15, 86.45, 41.7, 50.95, 58.95, 46.65, 66.55, 141.5, 112.9]', '2022-05-11 03:09:09', '2022-05-11 03:09:09'),
	(627, NULL, 3, '3.5', '[34.65, 34.65, 40.75, 56.65, 52.35, 93.15, 81.75, 94.75, 44.75, 57.05, 64.4, 50.2, 68.75, 150.9, 124.4]', '2022-05-11 03:09:10', '2022-05-11 03:09:10'),
	(628, NULL, 3, '4', '[36.45, 36.45, 44.1, 66.95, 56.4, 97.2, 97.2, 107, 47.35, 63.15, 67.15, 53.75, 79.6, 152.15, 135.9]', '2022-05-11 03:09:10', '2022-05-11 03:09:10'),
	(629, NULL, 3, '4.5', '[39.3, 39.3, 47.5, 69.3, 61, 105.6, 111.05, 118.15, 49.4, 69.3, 78.3, 57.3, 90.45, 155.85, 147.4]', '2022-05-11 03:09:10', '2022-05-11 03:09:10'),
	(630, NULL, 3, '5', '[41.35, 41.35, 49.85, 79.2, 65.55, 117.4, 114.95, 134, 53.45, 75.4, 89.45, 60.85, 101.3, 159.15, 158.85]', '2022-05-11 03:09:10', '2022-05-11 03:09:10'),
	(631, NULL, 3, '5.5', '[44.15, 44.15, 52.3, 83.55, 69.6, 122.6, 123.1, 135.7, 57, 79.15, 92.75, 63.1, 105.05, 164.8, 164.7]', '2022-05-11 03:09:10', '2022-05-11 03:09:10'),
	(632, NULL, 3, '6', '[47.2, 47.2, 54.7, 86.95, 72.9, 127.05, 127.65, 150.05, 60.55, 83.05, 96.1, 65.4, 108.8, 170.5, 170.65]', '2022-05-11 03:09:11', '2022-05-11 03:09:11'),
	(633, NULL, 3, '6.5', '[48.35, 48.35, 55.55, 89.5, 78.45, 131.5, 139.05, 164.4, 64.05, 86.9, 99.35, 67.6, 112.5, 176.3, 176.4]', '2022-05-11 03:09:11', '2022-05-11 03:09:11'),
	(634, NULL, 3, '7', '[52.55, 52.55, 59.75, 97.95, 79.9, 135.95, 139.55, 178.75, 67.6, 89.8, 102.6, 69.85, 116.25, 181.95, 182.25]', '2022-05-11 03:09:11', '2022-05-11 03:09:11'),
	(635, NULL, 3, '7.5', '[54.55, 54.55, 63.15, 102.85, 86.05, 140.35, 152.8, 193.1, 71.15, 92.7, 105.95, 72.1, 120, 187.7, 188.15]', '2022-05-11 03:09:11', '2022-05-11 03:09:11'),
	(636, NULL, 3, '8', '[56.65, 56.65, 66.55, 106.65, 87.65, 144.85, 153.85, 207.45, 72.9, 95.6, 109.25, 74.35, 123.75, 193.4, 194.05]', '2022-05-11 03:09:11', '2022-05-11 03:09:11'),
	(637, NULL, 3, '8.5', '[58.2, 58.2, 66.7, 110.3, 91.25, 149.3, 165.05, 221.8, 74.65, 98.5, 112.6, 76.6, 127.5, 199.2, 199.95]', '2022-05-11 03:09:12', '2022-05-11 03:09:12'),
	(638, NULL, 3, '9', '[59.8, 59.8, 71.1, 117.8, 92.8, 153.75, 176.25, 236.15, 76.45, 101.45, 115.9, 78.9, 131.3, 204.9, 205.85]', '2022-05-11 03:09:12', '2022-05-11 03:09:12'),
	(639, NULL, 3, '9.5', '[60.2, 60.2, 72.45, 127, 97.45, 158.25, 187.4, 250.5, 78.25, 104.35, 119.25, 81.15, 135, 210.6, 211.75]', '2022-05-11 03:09:12', '2022-05-11 03:09:12'),
	(640, NULL, 3, '10', '[62.85, 62.85, 72.55, 132.1, 100.1, 162.7, 198.6, 264.85, 84, 127.65, 144.6, 99.2, 169.3, 227.25, 217.6]', '2022-05-11 03:09:12', '2022-05-11 03:09:12'),
	(641, NULL, 3, '11', '[68.9, 68.9, 81.8, 146.3, 108.25, 171.7, 210.25, 265.9, 87.9, 134, 152.3, 104.55, 178.35, 239.1, 229.25]', '2022-05-11 03:09:12', '2022-05-11 03:09:12'),
	(642, NULL, 3, '12', '[72.35, 72.35, 87.8, 151.15, 114.45, 180.7, 222.15, 279.55, 91.75, 140.3, 160.15, 109.9, 187.5, 251.1, 241]', '2022-05-11 03:09:13', '2022-05-11 03:09:13'),
	(643, NULL, 3, '13', '[79.6, 79.6, 92.4, 154.85, 123.5, 189.65, 246.55, 293.25, 95.65, 146.7, 167.9, 115.2, 196.6, 263.05, 252.7]', '2022-05-11 03:09:13', '2022-05-11 03:09:13'),
	(644, NULL, 3, '14', '[82.6, 82.6, 101.2, 155.45, 131.15, 198.7, 270.95, 306.9, 99.6, 153.1, 175.65, 120.55, 205.7, 275, 264.4]', '2022-05-11 03:09:13', '2022-05-11 03:09:13'),
	(645, NULL, 3, '15', '[90.05, 90.05, 103.25, 155.75, 139.1, 207.65, 295.35, 320.55, 103.45, 159.45, 183.45, 125.9, 214.8, 286.95, 276.1]', '2022-05-11 03:09:13', '2022-05-11 03:09:13'),
	(646, NULL, 3, '16', '[90.3, 90.3, 106.25, 175.7, 148, 215.9, 319.75, 334.2, 107.25, 165.8, 191.05, 131.1, 223.7, 299.65, 287.55]', '2022-05-11 03:09:13', '2022-05-11 03:09:13'),
	(647, NULL, 3, '17', '[97.15, 97.15, 114.15, 198.9, 154.4, 224.1, 344.15, 347.85, 111.05, 172.15, 198.6, 136.25, 232.55, 312.4, 298.9]', '2022-05-11 03:09:14', '2022-05-11 03:09:14'),
	(648, NULL, 3, '18', '[100.5, 100.5, 120.95, 202.8, 164.05, 232.35, 368.5, 361.55, 114.8, 178.55, 206.2, 141.5, 241.45, 325.1, 310.4]', '2022-05-11 03:09:14', '2022-05-11 03:09:14'),
	(649, NULL, 3, '19', '[102.45, 102.45, 135.25, 204.6, 170.65, 240.5, 392.95, 375.2, 118.6, 184.85, 213.8, 146.7, 250.3, 337.75, 321.75]', '2022-05-11 03:09:14', '2022-05-11 03:09:14'),
	(650, NULL, 3, '20', '[105.3, 105.3, 138.65, 227.45, 177.85, 248.7, 404.75, 388.85, 122.35, 191.2, 221.4, 151.95, 259.25, 350.4, 333.25]', '2022-05-11 03:09:14', '2022-05-11 03:09:14'),
	(651, NULL, 3, '21', '[115.7, 115.7, 143.1, 275.3, 190.1, 256.95, 411.05, 402.55, 138.15, 248.55, 224.25, 165.05, 260.2, 352.7, 344.65]', '2022-05-11 03:09:14', '2022-05-11 03:09:14'),
	(652, NULL, 3, '22', '[120.6, 120.6, 147.6, 278.65, 202.3, 265.15, 421.65, 416.2, 142.35, 256, 226.55, 170.55, 265.65, 360.1, 356.1]', '2022-05-11 03:09:14', '2022-05-11 03:09:14'),
	(653, NULL, 3, '23', '[126.05, 126.05, 152.4, 281.9, 207.95, 273.4, 430.25, 429.85, 146.55, 263.5, 233.85, 176, 274.25, 371.6, 367.55]', '2022-05-11 03:09:15', '2022-05-11 03:09:15'),
	(654, NULL, 3, '24', '[130.25, 130.25, 158, 285.45, 216.75, 281.55, 451.65, 443.5, 150.7, 270.9, 241.1, 181.5, 282.75, 383.15, 378.95]', '2022-05-11 03:09:15', '2022-05-11 03:09:15'),
	(655, NULL, 3, '25', '[135.3, 135.3, 161.55, 289, 223.25, 289.75, 473.05, 457.15, 154.85, 278.45, 248.4, 186.95, 291.25, 394.65, 390.4]', '2022-05-11 03:09:15', '2022-05-11 03:09:15'),
	(656, NULL, 3, '26', '[143.4, 143.4, 167.95, 292.5, 231.85, 297.95, 494.45, 470.85, 159, 285.8, 255.65, 192.4, 299.75, 406.15, 401.8]', '2022-05-11 03:09:15', '2022-05-11 03:09:15'),
	(657, NULL, 3, '27', '[147.55, 147.55, 170, 296.05, 238.45, 306.2, 515.85, 484.5, 163.2, 293.35, 262.9, 197.85, 308.25, 417.65, 413.2]', '2022-05-11 03:09:15', '2022-05-11 03:09:15'),
	(658, NULL, 3, '28', '[152.1, 152.1, 181.5, 299.55, 250, 314.4, 537.25, 498.15, 167.35, 300.75, 270.25, 203.4, 316.9, 429.2, 424.75]', '2022-05-11 03:09:16', '2022-05-11 03:09:16'),
	(659, NULL, 3, '29', '[158.25, 158.25, 186.05, 303.1, 251.1, 325.85, 558.65, 511.85, 171.55, 308.25, 277.45, 208.8, 325.3, 440.7, 436.05]', '2022-05-11 03:09:16', '2022-05-11 03:09:16'),
	(660, NULL, 3, '30', '[165.5, 165.5, 189.35, 306.65, 270.7, 334.15, 580.05, 525.5, 175.7, 315.75, 284.75, 214.3, 333.9, 452.25, 447.55]', '2022-05-11 03:09:16', '2022-05-11 03:09:16'),
	(661, NULL, 3, '31', '[182.9, 182.9, 213.9, 894.35, 314.65000000000003, 370.45, 686.65, 770.35, 261.95, 837, 407.65, 567.3000000000001, 740.9, 548.6999999999999, 1047.8]', '2022-05-11 03:09:16', '2022-05-11 03:09:16'),
	(662, NULL, 3, '32', '[188.8, 188.8, 220.8, 923.2, 324.8, 382.4, 708.8, 795.2, 270.4, 864, 420.8, 585.6, 764.8, 566.4, 1081.6]', '2022-05-11 03:09:16', '2022-05-11 03:09:16'),
	(663, NULL, 3, '33', '[194.7, 194.7, 227.7, 952.05, 334.95, 394.35, 730.9499999999999, 820.0500000000001, 278.84999999999997, 891, 433.95, 603.9, 788.6999999999999, 584.1, 1115.4]', '2022-05-11 03:09:17', '2022-05-11 03:09:17'),
	(664, NULL, 3, '34', '[200.6, 200.6, 234.6, 980.9, 345.1, 406.2999999999999, 753.0999999999999, 844.9000000000001, 287.29999999999995, 918, 447.1, 622.2, 812.5999999999999, 601.8, 1149.1999999999998]', '2022-05-11 03:09:17', '2022-05-11 03:09:17'),
	(665, NULL, 3, '35', '[206.5, 206.5, 241.5, 1009.75, 355.25, 418.25, 775.25, 869.75, 295.75, 945, 460.25, 640.5, 836.5, 619.5, 1183]', '2022-05-11 03:09:17', '2022-05-11 03:09:17'),
	(666, NULL, 3, '36', '[212.4, 212.4, 248.4, 1038.6, 365.4, 430.2, 797.4, 894.6, 304.2, 972, 473.4, 658.8000000000001, 860.4, 637.1999999999999, 1216.8]', '2022-05-11 03:09:17', '2022-05-11 03:09:17'),
	(667, NULL, 3, '37', '[218.3, 218.3, 255.3, 1067.45, 375.55, 442.15, 819.55, 919.45, 312.65, 999, 486.55, 677.1, 884.3, 654.9, 1250.6]', '2022-05-11 03:09:17', '2022-05-11 03:09:17'),
	(668, NULL, 3, '38', '[224.2, 224.2, 262.2, 1096.3, 385.7, 454.1, 841.6999999999999, 944.3, 321.09999999999997, 1026, 499.7, 695.4, 908.2, 672.6, 1284.4]', '2022-05-11 03:09:17', '2022-05-11 03:09:17'),
	(669, NULL, 3, '39', '[230.1, 230.1, 269.1, 1125.15, 395.85, 466.0499999999999, 863.8499999999999, 969.15, 329.54999999999995, 1053, 512.85, 713.7, 932.1, 690.3, 1318.1999999999998]', '2022-05-11 03:09:18', '2022-05-11 03:09:18'),
	(670, NULL, 3, '40', '[236, 236, 276, 1154, 406, 478, 886, 994, 338, 1080, 526, 732, 956, 708, 1352]', '2022-05-11 03:09:18', '2022-05-11 03:09:18'),
	(671, NULL, 3, '41', '[241.9, 241.9, 282.90000000000003, 1182.85, 416.15, 489.95, 908.15, 1018.85, 346.45, 1107, 539.15, 750.3000000000001, 979.9, 725.6999999999999, 1385.8]', '2022-05-11 03:09:18', '2022-05-11 03:09:18'),
	(672, NULL, 3, '42', '[247.8, 247.8, 289.8, 1211.7, 426.3, 501.9, 930.3, 1043.7, 354.9, 1134, 552.3000000000001, 768.6, 1003.8, 743.4, 1419.6]', '2022-05-11 03:09:18', '2022-05-11 03:09:18'),
	(673, NULL, 3, '43', '[253.7, 253.7, 296.7, 1240.55, 436.45, 513.85, 952.45, 1068.55, 363.35, 1161, 565.45, 786.9, 1027.7, 761.1, 1453.4]', '2022-05-11 03:09:18', '2022-05-11 03:09:18'),
	(674, NULL, 3, '44', '[259.6, 259.6, 303.6, 1269.4, 446.6, 525.8, 974.6, 1093.4, 371.7999999999999, 1188, 578.6, 805.2, 1051.6, 778.8, 1487.1999999999998]', '2022-05-11 03:09:19', '2022-05-11 03:09:19'),
	(675, NULL, 3, '45', '[265.5, 265.5, 310.5, 1298.25, 456.75, 537.75, 996.75, 1118.25, 380.24999999999994, 1215, 591.75, 823.5, 1075.5, 796.5, 1520.9999999999998]', '2022-05-11 03:09:19', '2022-05-11 03:09:19'),
	(676, NULL, 3, '46', '[271.40000000000003, 271.40000000000003, 317.40000000000003, 1327.1, 466.9, 549.6999999999999, 1018.9, 1143.1, 388.7, 1242, 604.9, 841.8000000000001, 1099.4, 814.1999999999999, 1554.8]', '2022-05-11 03:09:19', '2022-05-11 03:09:19'),
	(677, NULL, 3, '47', '[277.3, 277.3, 324.3, 1355.95, 477.05, 561.65, 1041.05, 1167.95, 397.15, 1269, 618.0500000000001, 860.1, 1123.3, 831.9, 1588.6]', '2022-05-11 03:09:19', '2022-05-11 03:09:19'),
	(678, NULL, 3, '48', '[283.20000000000005, 283.20000000000005, 331.20000000000005, 1384.8000000000002, 487.2000000000001, 573.5999999999999, 1063.1999999999998, 1192.8000000000002, 405.6, 1296, 631.2, 878.4000000000001, 1147.1999999999998, 849.5999999999999, 1622.4]', '2022-05-11 03:09:19', '2022-05-11 03:09:19'),
	(679, NULL, 3, '49', '[289.1, 289.1, 338.1, 1413.65, 497.35, 585.55, 1085.35, 1217.65, 414.0499999999999, 1323, 644.35, 896.7, 1171.1, 867.3, 1656.1999999999998]', '2022-05-11 03:09:20', '2022-05-11 03:09:20'),
	(680, NULL, 3, '50', '[295, 295, 345, 1442.5, 507.5, 597.5, 1107.5, 1242.5, 422.49999999999994, 1350, 657.5, 915, 1195, 885, 1689.9999999999998]', '2022-05-11 03:09:20', '2022-05-11 03:09:20'),
	(681, NULL, 3, '51', '[300.90000000000003, 300.90000000000003, 351.90000000000003, 1471.35, 517.65, 609.4499999999999, 1129.65, 1267.35, 430.95, 1377, 670.65, 933.3, 1218.9, 902.7, 1723.8]', '2022-05-11 03:09:20', '2022-05-11 03:09:20'),
	(682, NULL, 3, '52', '[306.8, 306.8, 358.8, 1500.2, 527.8000000000001, 621.4, 1151.8, 1292.2, 439.4, 1404, 683.8000000000001, 951.6, 1242.8, 920.4, 1757.6]', '2022-05-11 03:09:20', '2022-05-11 03:09:20'),
	(683, NULL, 3, '53', '[312.70000000000005, 312.70000000000005, 365.7000000000001, 1529.0500000000002, 537.95, 633.3499999999999, 1173.9499999999998, 1317.0500000000002, 447.85, 1431, 696.95, 969.9, 1266.6999999999998, 938.1, 1791.4]', '2022-05-11 03:09:20', '2022-05-11 03:09:20'),
	(684, NULL, 3, '54', '[318.6, 318.6, 372.6, 1557.9, 548.1, 645.3, 1196.1, 1341.9, 456.2999999999999, 1458, 710.1, 988.2, 1290.6, 955.8, 1825.2]', '2022-05-11 03:09:20', '2022-05-11 03:09:20'),
	(685, NULL, 3, '55', '[324.5, 324.5, 379.5, 1586.75, 558.25, 657.25, 1218.25, 1366.75, 464.74999999999994, 1485, 723.25, 1006.5, 1314.5, 973.5, 1859]', '2022-05-11 03:09:21', '2022-05-11 03:09:21'),
	(686, NULL, 3, '56', '[330.40000000000003, 330.40000000000003, 386.4, 1615.6, 568.4, 669.1999999999999, 1240.4, 1391.6, 473.19999999999993, 1512, 736.4, 1024.8, 1338.4, 991.2, 1892.7999999999995]', '2022-05-11 03:09:21', '2022-05-11 03:09:21'),
	(687, NULL, 3, '57', '[336.3, 336.3, 393.3, 1644.45, 578.5500000000001, 681.15, 1262.55, 1416.45, 481.65, 1539, 749.5500000000001, 1043.1, 1362.3, 1008.9, 1926.6]', '2022-05-11 03:09:21', '2022-05-11 03:09:21'),
	(688, NULL, 3, '58', '[342.20000000000005, 342.20000000000005, 400.2000000000001, 1673.3000000000002, 588.7, 693.0999999999999, 1284.6999999999998, 1441.3000000000002, 490.1, 1566, 762.7, 1061.4, 1386.1999999999998, 1026.6, 1960.4]', '2022-05-11 03:09:21', '2022-05-11 03:09:21'),
	(689, NULL, 3, '59', '[348.1, 348.1, 407.1, 1702.15, 598.85, 705.05, 1306.85, 1466.15, 498.5499999999999, 1593, 775.85, 1079.7, 1410.1, 1044.3, 1994.2]', '2022-05-11 03:09:21', '2022-05-11 03:09:21'),
	(690, NULL, 3, '60', '[354, 354, 414, 1731, 609, 717, 1329, 1491, 506.99999999999994, 1620, 789, 1098, 1434, 1062, 2028]', '2022-05-11 03:09:22', '2022-05-11 03:09:22'),
	(691, NULL, 3, '61', '[359.90000000000003, 359.90000000000003, 420.9, 1759.85, 619.15, 728.9499999999999, 1351.15, 1515.85, 515.4499999999999, 1647, 802.15, 1116.3, 1457.9, 1079.7, 2061.7999999999997]', '2022-05-11 03:09:22', '2022-05-11 03:09:22'),
	(692, NULL, 3, '62', '[365.8, 365.8, 427.8, 1788.7, 629.3000000000001, 740.9, 1373.3, 1540.7, 523.9, 1674, 815.3000000000001, 1134.6, 1481.8, 1097.4, 2095.6]', '2022-05-11 03:09:22', '2022-05-11 03:09:22'),
	(693, NULL, 3, '63', '[371.7000000000001, 371.7000000000001, 434.7000000000001, 1817.55, 639.45, 752.8499999999999, 1395.4499999999998, 1565.5500000000002, 532.3499999999999, 1701, 828.45, 1152.9, 1505.6999999999998, 1115.1, 2129.3999999999996]', '2022-05-11 03:09:22', '2022-05-11 03:09:22'),
	(694, NULL, 3, '64', '[377.6, 377.6, 441.6, 1846.4, 649.6, 764.8, 1417.6, 1590.4, 540.8, 1728, 841.6, 1171.2, 1529.6, 1132.8, 2163.2]', '2022-05-11 03:09:22', '2022-05-11 03:09:22'),
	(695, NULL, 3, '65', '[383.5, 383.5, 448.5, 1875.25, 659.75, 776.75, 1439.75, 1615.25, 549.25, 1755, 854.75, 1189.5, 1553.5, 1150.5, 2197]', '2022-05-11 03:09:23', '2022-05-11 03:09:23'),
	(696, NULL, 3, '66', '[389.4, 389.4, 455.4, 1904.1, 669.9, 788.6999999999999, 1461.9, 1640.1, 557.6999999999999, 1782, 867.9, 1207.8, 1577.4, 1168.2, 2230.7999999999997]', '2022-05-11 03:09:23', '2022-05-11 03:09:23'),
	(697, NULL, 3, '67', '[395.3, 395.3, 462.3, 1932.95, 680.0500000000001, 800.65, 1484.05, 1664.95, 566.15, 1809, 881.0500000000001, 1226.1, 1601.3, 1185.9, 2264.6]', '2022-05-11 03:09:23', '2022-05-11 03:09:23'),
	(698, NULL, 3, '68', '[401.2000000000001, 401.2000000000001, 469.2000000000001, 1961.8, 690.2, 812.5999999999999, 1506.1999999999998, 1689.8000000000002, 574.5999999999999, 1836, 894.2, 1244.4, 1625.1999999999998, 1203.6, 2298.3999999999996]', '2022-05-11 03:09:23', '2022-05-11 03:09:23'),
	(699, NULL, 3, '69', '[407.1, 407.1, 476.1, 1990.65, 700.35, 824.55, 1528.35, 1714.65, 583.05, 1863, 907.35, 1262.7, 1649.1, 1221.3, 2332.2]', '2022-05-11 03:09:23', '2022-05-11 03:09:23'),
	(700, NULL, 3, '70', '[413, 413, 483, 2019.5, 710.5, 836.5, 1550.5, 1739.5, 591.5, 1890, 920.5, 1281, 1673, 1239, 2366]', '2022-05-11 03:09:23', '2022-05-11 03:09:23'),
	(701, NULL, 3, '71', '[418.9, 418.9, 489.9, 2048.35, 720.65, 848.4499999999999, 1572.65, 1764.35, 599.9499999999999, 1917, 933.65, 1299.3, 1696.9, 1256.7, 2399.7999999999997]', '2022-05-11 03:09:24', '2022-05-11 03:09:24'),
	(702, NULL, 3, '72', '[424.8, 424.8, 496.8, 2077.2000000000003, 730.8000000000001, 860.4, 1594.8, 1789.2, 608.4, 1944, 946.8, 1317.6, 1720.8, 1274.4, 2433.6]', '2022-05-11 03:09:24', '2022-05-11 03:09:24'),
	(703, NULL, 3, '73', '[430.7000000000001, 430.7000000000001, 503.7000000000001, 2106.05, 740.95, 872.3499999999999, 1616.9499999999998, 1814.05, 616.8499999999999, 1971, 959.95, 1335.9, 1744.6999999999998, 1292.1, 2467.3999999999996]', '2022-05-11 03:09:24', '2022-05-11 03:09:24'),
	(704, NULL, 3, '74', '[436.6, 436.6, 510.6, 2134.9, 751.1, 884.3, 1639.1, 1838.9, 625.3, 1998, 973.1, 1354.2, 1768.6, 1309.8, 2501.2]', '2022-05-11 03:09:24', '2022-05-11 03:09:24'),
	(705, NULL, 3, '75', '[442.5, 442.5, 517.5, 2163.75, 761.25, 896.25, 1661.25, 1863.75, 633.75, 2025, 986.25, 1372.5, 1792.5, 1327.5, 2535]', '2022-05-11 03:09:24', '2022-05-11 03:09:24'),
	(706, NULL, 3, '76', '[448.4, 448.4, 524.4, 2192.6, 771.4, 908.2, 1683.4, 1888.6, 642.1999999999999, 2052, 999.4, 1390.8, 1816.4, 1345.2, 2568.7999999999997]', '2022-05-11 03:09:25', '2022-05-11 03:09:25'),
	(707, NULL, 3, '77', '[454.3, 454.3, 531.3000000000001, 2221.4500000000003, 781.5500000000001, 920.15, 1705.55, 1913.45, 650.65, 2079, 1012.55, 1409.1, 1840.3, 1362.9, 2602.6]', '2022-05-11 03:09:25', '2022-05-11 03:09:25'),
	(708, NULL, 3, '78', '[460.2000000000001, 460.2000000000001, 538.2, 2250.3, 791.7, 932.1, 1727.6999999999998, 1938.3, 659.0999999999999, 2106, 1025.7, 1427.4, 1864.2, 1380.6, 2636.3999999999996]', '2022-05-11 03:09:25', '2022-05-11 03:09:25'),
	(709, NULL, 3, '79', '[466.1, 466.1, 545.1, 2279.15, 801.85, 944.05, 1749.85, 1963.15, 667.55, 2133, 1038.85, 1445.7, 1888.1, 1398.3, 2670.2]', '2022-05-11 03:09:25', '2022-05-11 03:09:25'),
	(710, NULL, 3, '80', '[472, 472, 552, 2308, 812, 956, 1772, 1988, 676, 2160, 1052, 1464, 1912, 1416, 2704]', '2022-05-11 03:09:25', '2022-05-11 03:09:25'),
	(711, NULL, 3, '81', '[477.9, 477.9, 558.9, 2336.85, 822.15, 967.95, 1794.15, 2012.85, 684.4499999999999, 2187, 1065.15, 1482.3, 1935.9, 1433.7, 2737.7999999999997]', '2022-05-11 03:09:26', '2022-05-11 03:09:26'),
	(712, NULL, 3, '82', '[483.8, 483.8, 565.8000000000001, 2365.7000000000003, 832.3000000000001, 979.9, 1816.3, 2037.7, 692.9, 2214, 1078.3, 1500.6, 1959.8, 1451.4, 2771.6]', '2022-05-11 03:09:26', '2022-05-11 03:09:26'),
	(713, NULL, 3, '83', '[489.7000000000001, 489.7000000000001, 572.7, 2394.55, 842.45, 991.85, 1838.45, 2062.55, 701.3499999999999, 2241, 1091.45, 1518.9, 1983.7, 1469.1, 2805.3999999999996]', '2022-05-11 03:09:26', '2022-05-11 03:09:26'),
	(714, NULL, 3, '84', '[495.6, 495.6, 579.6, 2423.4, 852.6, 1003.8, 1860.6, 2087.4, 709.8, 2268, 1104.6, 1537.2, 2007.6, 1486.8, 2839.2]', '2022-05-11 03:09:26', '2022-05-11 03:09:26'),
	(715, NULL, 3, '85', '[501.50000000000006, 501.50000000000006, 586.5, 2452.25, 862.75, 1015.75, 1882.75, 2112.25, 718.2499999999999, 2295, 1117.75, 1555.5, 2031.5, 1504.5, 2872.9999999999995]', '2022-05-11 03:09:26', '2022-05-11 03:09:26'),
	(716, NULL, 3, '86', '[507.4, 507.4, 593.4, 2481.1, 872.9, 1027.7, 1904.9, 2137.1, 726.6999999999999, 2322, 1130.9, 1573.8, 2055.4, 1522.2, 2906.7999999999997]', '2022-05-11 03:09:26', '2022-05-11 03:09:26'),
	(717, NULL, 3, '87', '[513.3000000000001, 513.3000000000001, 600.3000000000001, 2509.9500000000003, 883.0500000000001, 1039.65, 1927.05, 2161.9500000000003, 735.15, 2349, 1144.05, 1592.1, 2079.2999999999997, 1539.9, 2940.6]', '2022-05-11 03:09:27', '2022-05-11 03:09:27'),
	(718, NULL, 3, '88', '[519.2, 519.2, 607.2, 2538.8, 893.2, 1051.6, 1949.2, 2186.8, 743.5999999999999, 2376, 1157.2, 1610.4, 2103.2, 1557.6, 2974.3999999999996]', '2022-05-11 03:09:27', '2022-05-11 03:09:27'),
	(719, NULL, 3, '89', '[525.1, 525.1, 614.1, 2567.65, 903.35, 1063.55, 1971.35, 2211.65, 752.05, 2403, 1170.35, 1628.7, 2127.1, 1575.3, 3008.2]', '2022-05-11 03:09:27', '2022-05-11 03:09:27'),
	(720, NULL, 3, '90', '[531, 531, 621, 2596.5, 913.5, 1075.5, 1993.5, 2236.5, 760.4999999999999, 2430, 1183.5, 1647, 2151, 1593, 3041.9999999999995]', '2022-05-11 03:09:27', '2022-05-11 03:09:27'),
	(721, NULL, 3, '91', '[536.9, 536.9, 627.9, 2625.35, 923.65, 1087.45, 2015.65, 2261.35, 768.9499999999999, 2457, 1196.65, 1665.3, 2174.9, 1610.7, 3075.7999999999997]', '2022-05-11 03:09:27', '2022-05-11 03:09:27'),
	(722, NULL, 3, '92', '[542.8000000000001, 542.8000000000001, 634.8000000000001, 2654.2000000000003, 933.8, 1099.4, 2037.8, 2286.2000000000003, 777.4, 2484, 1209.8, 1683.6, 2198.7999999999997, 1628.4, 3109.6]', '2022-05-11 03:09:28', '2022-05-11 03:09:28'),
	(723, NULL, 3, '93', '[548.7, 548.7, 641.7, 2683.05, 943.95, 1111.35, 2059.95, 2311.05, 785.8499999999999, 2511, 1222.95, 1701.9, 2222.7, 1646.1, 3143.3999999999996]', '2022-05-11 03:09:28', '2022-05-11 03:09:28'),
	(724, NULL, 3, '94', '[554.6, 554.6, 648.6, 2711.9, 954.1, 1123.3, 2082.1, 2335.9, 794.3, 2538, 1236.1, 1720.2, 2246.6, 1663.8, 3177.2]', '2022-05-11 03:09:28', '2022-05-11 03:09:28'),
	(725, NULL, 3, '95', '[560.5, 560.5, 655.5, 2740.75, 964.25, 1135.25, 2104.25, 2360.75, 802.7499999999999, 2565, 1249.25, 1738.5, 2270.5, 1681.5, 3210.9999999999995]', '2022-05-11 03:09:28', '2022-05-11 03:09:28'),
	(726, NULL, 3, '96', '[566.4000000000001, 566.4000000000001, 662.4000000000001, 2769.6000000000004, 974.4, 1147.1999999999998, 2126.3999999999996, 2385.6000000000004, 811.1999999999999, 2592, 1262.4, 1756.8000000000002, 2294.3999999999996, 1699.1999999999998, 3244.7999999999997]', '2022-05-11 03:09:28', '2022-05-11 03:09:28'),
	(727, NULL, 3, '97', '[572.3000000000001, 572.3000000000001, 669.3000000000001, 2798.4500000000003, 984.55, 1159.15, 2148.5499999999997, 2410.4500000000003, 819.65, 2619, 1275.55, 1775.1, 2318.2999999999997, 1716.9, 3278.6]', '2022-05-11 03:09:29', '2022-05-11 03:09:29'),
	(728, NULL, 3, '98', '[578.2, 578.2, 676.2, 2827.3, 994.7, 1171.1, 2170.7, 2435.3, 828.0999999999999, 2646, 1288.7, 1793.4, 2342.2, 1734.6, 3312.3999999999996]', '2022-05-11 03:09:29', '2022-05-11 03:09:29'),
	(729, NULL, 3, '99', '[584.1, 584.1, 683.1, 2856.15, 1004.85, 1183.05, 2192.85, 2460.15, 836.55, 2673, 1301.85, 1811.7, 2366.1, 1752.3, 3346.2]', '2022-05-11 03:09:29', '2022-05-11 03:09:29'),
	(730, NULL, 3, '100', '[590, 590, 690, 2885, 1015, 1195, 2215, 2485, 844.9999999999999, 2700, 1315, 1830, 2390, 1770, 3379.9999999999995]', '2022-05-11 03:09:29', '2022-05-11 03:09:29'),
	(731, NULL, 3, '101', '[595.9000000000001, 595.9000000000001, 696.9000000000001, 2913.8500000000004, 1025.15, 1206.9499999999998, 2237.1499999999996, 2509.8500000000004, 853.4499999999999, 2727, 1328.15, 1848.3, 2413.8999999999996, 1787.6999999999998, 3413.7999999999997]', '2022-05-11 03:09:29', '2022-05-11 03:09:29'),
	(732, NULL, 3, '102', '[601.8000000000001, 601.8000000000001, 703.8000000000001, 2942.7000000000003, 1035.3, 1218.9, 2259.2999999999997, 2534.7000000000003, 861.9, 2754, 1341.3, 1866.6, 2437.7999999999997, 1805.4, 3447.6]', '2022-05-11 03:09:29', '2022-05-11 03:09:29'),
	(733, NULL, 3, '103', '[607.7, 607.7, 710.7, 2971.55, 1045.45, 1230.85, 2281.45, 2559.55, 870.3499999999999, 2781, 1354.45, 1884.9, 2461.7, 1823.1, 3481.3999999999996]', '2022-05-11 03:09:30', '2022-05-11 03:09:30'),
	(734, NULL, 3, '104', '[613.6, 613.6, 717.6, 3000.4, 1055.6, 1242.8, 2303.6, 2584.4, 878.8, 2808, 1367.6, 1903.2, 2485.6, 1840.8, 3515.2]', '2022-05-11 03:09:30', '2022-05-11 03:09:30'),
	(735, NULL, 3, '105', '[619.5, 619.5, 724.5, 3029.25, 1065.75, 1254.75, 2325.75, 2609.25, 887.2499999999999, 2835, 1380.75, 1921.5, 2509.5, 1858.5, 3548.9999999999995]', '2022-05-11 03:09:30', '2022-05-11 03:09:30'),
	(736, NULL, 3, '106', '[625.4000000000001, 625.4000000000001, 731.4000000000001, 3058.1000000000004, 1075.9, 1266.6999999999998, 2347.8999999999996, 2634.1000000000004, 895.6999999999999, 2862, 1393.9, 1939.8, 2533.3999999999996, 1876.2, 3582.7999999999997]', '2022-05-11 03:09:30', '2022-05-11 03:09:30'),
	(737, NULL, 3, '107', '[631.3000000000001, 631.3000000000001, 738.3000000000001, 3086.9500000000003, 1086.05, 1278.65, 2370.0499999999997, 2658.9500000000003, 904.15, 2889, 1407.05, 1958.1, 2557.2999999999997, 1893.9, 3616.6]', '2022-05-11 03:09:30', '2022-05-11 03:09:30'),
	(738, NULL, 3, '108', '[637.2, 637.2, 745.2, 3115.8, 1096.2, 1290.6, 2392.2, 2683.8, 912.6, 2916, 1420.2, 1976.4, 2581.2, 1911.6, 3650.4]', '2022-05-11 03:09:31', '2022-05-11 03:09:31'),
	(739, NULL, 3, '109', '[643.1, 643.1, 752.1, 3144.65, 1106.35, 1302.55, 2414.35, 2708.65, 921.05, 2943, 1433.35, 1994.7, 2605.1, 1929.3, 3684.2]', '2022-05-11 03:09:31', '2022-05-11 03:09:31'),
	(740, NULL, 3, '110', '[649, 649, 759, 3173.5, 1116.5, 1314.5, 2436.5, 2733.5, 929.5, 2970, 1446.5, 2013, 2629, 1947, 3717.999999999999]', '2022-05-11 03:09:31', '2022-05-11 03:09:31'),
	(741, NULL, 3, '111', '[654.9000000000001, 654.9000000000001, 765.9000000000001, 3202.3500000000004, 1126.65, 1326.4499999999998, 2458.6499999999996, 2758.3500000000004, 937.95, 2997, 1459.65, 2031.3, 2652.8999999999996, 1964.7, 3751.8]', '2022-05-11 03:09:31', '2022-05-11 03:09:31'),
	(742, NULL, 3, '112', '[660.8000000000001, 660.8000000000001, 772.8000000000001, 3231.2000000000003, 1136.8, 1338.4, 2480.7999999999997, 2783.2000000000003, 946.4, 3024, 1472.8, 2049.6, 2676.7999999999997, 1982.4, 3785.599999999999]', '2022-05-11 03:09:31', '2022-05-11 03:09:31'),
	(743, NULL, 3, '113', '[666.7, 666.7, 779.7, 3260.05, 1146.95, 1350.35, 2502.95, 2808.05, 954.85, 3051, 1485.95, 2067.9, 2700.7, 2000.1, 3819.4]', '2022-05-11 03:09:31', '2022-05-11 03:09:31'),
	(744, NULL, 3, '114', '[672.6, 672.6, 786.6, 3288.9, 1157.1, 1362.3, 2525.1, 2832.9, 963.3, 3078, 1499.1, 2086.2000000000003, 2724.6, 2017.8, 3853.2]', '2022-05-11 03:09:32', '2022-05-11 03:09:32'),
	(745, NULL, 3, '115', '[678.5, 678.5, 793.5, 3317.75, 1167.25, 1374.25, 2547.25, 2857.75, 971.75, 3105, 1512.25, 2104.5, 2748.5, 2035.5, 3886.999999999999]', '2022-05-11 03:09:32', '2022-05-11 03:09:32'),
	(746, NULL, 3, '116', '[684.4000000000001, 684.4000000000001, 800.4000000000001, 3346.6000000000004, 1177.4, 1386.1999999999998, 2569.3999999999996, 2882.6000000000004, 980.2, 3132, 1525.4, 2122.8, 2772.3999999999996, 2053.2, 3920.8]', '2022-05-11 03:09:32', '2022-05-11 03:09:32'),
	(747, NULL, 3, '117', '[690.3000000000001, 690.3000000000001, 807.3000000000001, 3375.4500000000003, 1187.55, 1398.15, 2591.5499999999997, 2907.4500000000003, 988.65, 3159, 1538.55, 2141.1, 2796.2999999999997, 2070.9, 3954.599999999999]', '2022-05-11 03:09:32', '2022-05-11 03:09:32'),
	(748, NULL, 3, '118', '[696.2, 696.2, 814.2, 3404.3, 1197.7, 1410.1, 2613.7, 2932.3, 997.1, 3186, 1551.7, 2159.4, 2820.2, 2088.6, 3988.4]', '2022-05-11 03:09:32', '2022-05-11 03:09:32'),
	(749, NULL, 3, '119', '[702.1, 702.1, 821.1, 3433.15, 1207.85, 1422.05, 2635.85, 2957.15, 1005.55, 3213, 1564.85, 2177.7000000000003, 2844.1, 2106.2999999999997, 4022.2]', '2022-05-11 03:09:33', '2022-05-11 03:09:33'),
	(750, NULL, 3, '120', '[708, 708, 828, 3462, 1218, 1434, 2658, 2982, 1014, 3240, 1578, 2196, 2868, 2124, 4055.999999999999]', '2022-05-11 03:09:33', '2022-05-11 03:09:33'),
	(751, NULL, 3, '121', '[713.9000000000001, 713.9000000000001, 834.9000000000001, 3490.8500000000004, 1228.15, 1445.9499999999998, 2680.1499999999996, 3006.8500000000004, 1022.45, 3267, 1591.15, 2214.3, 2891.8999999999996, 2141.7, 4089.8]', '2022-05-11 03:09:33', '2022-05-11 03:09:33'),
	(752, NULL, 3, '122', '[719.8000000000001, 719.8000000000001, 841.8000000000001, 3519.7000000000003, 1238.3, 1457.9, 2702.2999999999997, 3031.7000000000003, 1030.9, 3294, 1604.3, 2232.6, 2915.7999999999997, 2159.4, 4123.599999999999]', '2022-05-11 03:09:33', '2022-05-11 03:09:33'),
	(753, NULL, 3, '123', '[725.7, 725.7, 848.7, 3548.55, 1248.45, 1469.85, 2724.45, 3056.55, 1039.35, 3321, 1617.45, 2250.9, 2939.7, 2177.1, 4157.4]', '2022-05-11 03:09:33', '2022-05-11 03:09:33'),
	(754, NULL, 3, '124', '[731.6, 731.6, 855.6, 3577.4, 1258.6, 1481.8, 2746.6, 3081.4, 1047.8, 3348, 1630.6, 2269.2000000000003, 2963.6, 2194.7999999999997, 4191.2]', '2022-05-11 03:09:34', '2022-05-11 03:09:34'),
	(755, NULL, 3, '125', '[737.5, 737.5, 862.5, 3606.25, 1268.75, 1493.75, 2768.75, 3106.25, 1056.25, 3375, 1643.75, 2287.5, 2987.5, 2212.5, 4225]', '2022-05-11 03:09:34', '2022-05-11 03:09:34'),
	(756, NULL, 3, '126', '[743.4000000000001, 743.4000000000001, 869.4000000000001, 3635.1, 1278.9, 1505.6999999999998, 2790.8999999999996, 3131.1000000000004, 1064.6999999999998, 3402, 1656.9, 2305.8, 3011.3999999999996, 2230.2, 4258.799999999999]', '2022-05-11 03:09:34', '2022-05-11 03:09:34'),
	(757, NULL, 3, '127', '[749.3000000000001, 749.3000000000001, 876.3000000000001, 3663.95, 1289.05, 1517.65, 2813.0499999999997, 3155.9500000000003, 1073.15, 3429, 1670.05, 2324.1, 3035.2999999999997, 2247.9, 4292.599999999999]', '2022-05-11 03:09:34', '2022-05-11 03:09:34'),
	(758, NULL, 3, '128', '[755.2, 755.2, 883.2, 3692.8, 1299.2, 1529.6, 2835.2, 3180.8, 1081.6, 3456, 1683.2, 2342.4, 3059.2, 2265.6, 4326.4]', '2022-05-11 03:09:34', '2022-05-11 03:09:34'),
	(759, NULL, 3, '129', '[761.1, 761.1, 890.1, 3721.65, 1309.35, 1541.55, 2857.35, 3205.65, 1090.05, 3483, 1696.35, 2360.7000000000003, 3083.1, 2283.2999999999997, 4360.2]', '2022-05-11 03:09:34', '2022-05-11 03:09:34'),
	(760, NULL, 3, '130', '[767, 767, 897, 3750.5, 1319.5, 1553.5, 2879.5, 3230.5, 1098.5, 3510, 1709.5, 2379, 3107, 2301, 4394]', '2022-05-11 03:09:35', '2022-05-11 03:09:35'),
	(761, NULL, 3, '131', '[772.9000000000001, 772.9000000000001, 903.9, 3779.35, 1329.65, 1565.4499999999998, 2901.6499999999996, 3255.3500000000004, 1106.9499999999998, 3537, 1722.65, 2397.3, 3130.8999999999996, 2318.7, 4427.799999999999]', '2022-05-11 03:09:35', '2022-05-11 03:09:35'),
	(762, NULL, 3, '132', '[778.8000000000001, 778.8000000000001, 910.8, 3808.2, 1339.8, 1577.4, 2923.7999999999997, 3280.2000000000003, 1115.4, 3564, 1735.8, 2415.6, 3154.7999999999997, 2336.4, 4461.599999999999]', '2022-05-11 03:09:35', '2022-05-11 03:09:35'),
	(763, NULL, 3, '133', '[784.7, 784.7, 917.7, 3837.05, 1349.95, 1589.35, 2945.95, 3305.05, 1123.85, 3591, 1748.95, 2433.9, 3178.7, 2354.1, 4495.4]', '2022-05-11 03:09:35', '2022-05-11 03:09:35'),
	(764, NULL, 3, '134', '[790.6, 790.6, 924.6, 3865.9, 1360.1, 1601.3, 2968.1, 3329.9, 1132.3, 3618, 1762.1, 2452.2000000000003, 3202.6, 2371.7999999999997, 4529.2]', '2022-05-11 03:09:35', '2022-05-11 03:09:35'),
	(765, NULL, 3, '135', '[796.5, 796.5, 931.5, 3894.75, 1370.25, 1613.25, 2990.25, 3354.75, 1140.75, 3645, 1775.25, 2470.5, 3226.5, 2389.5, 4563]', '2022-05-11 03:09:36', '2022-05-11 03:09:36'),
	(766, NULL, 3, '136', '[802.4000000000001, 802.4000000000001, 938.4, 3923.6, 1380.4, 1625.1999999999998, 3012.3999999999996, 3379.6000000000004, 1149.1999999999998, 3672, 1788.4, 2488.8, 3250.3999999999996, 2407.2, 4596.799999999999]', '2022-05-11 03:09:36', '2022-05-11 03:09:36'),
	(767, NULL, 3, '137', '[808.3000000000001, 808.3000000000001, 945.3, 3952.45, 1390.55, 1637.15, 3034.5499999999997, 3404.4500000000003, 1157.65, 3699, 1801.55, 2507.1, 3274.2999999999997, 2424.9, 4630.599999999999]', '2022-05-11 03:09:36', '2022-05-11 03:09:36'),
	(768, NULL, 3, '138', '[814.2, 814.2, 952.2, 3981.3, 1400.7, 1649.1, 3056.7, 3429.3, 1166.1, 3726, 1814.7, 2525.4, 3298.2, 2442.6, 4664.4]', '2022-05-11 03:09:36', '2022-05-11 03:09:36'),
	(769, NULL, 3, '139', '[820.1, 820.1, 959.1, 4010.15, 1410.85, 1661.05, 3078.85, 3454.15, 1174.55, 3753, 1827.85, 2543.7000000000003, 3322.1, 2460.2999999999997, 4698.2]', '2022-05-11 03:09:36', '2022-05-11 03:09:36'),
	(770, NULL, 3, '140', '[826, 826, 966, 4039, 1421, 1673, 3101, 3479, 1183, 3780, 1841, 2562, 3346, 2478, 4732]', '2022-05-11 03:09:37', '2022-05-11 03:09:37'),
	(771, NULL, 3, '141', '[831.9000000000001, 831.9000000000001, 972.9, 4067.85, 1431.15, 1684.9499999999998, 3123.1499999999996, 3503.8500000000004, 1191.4499999999998, 3807, 1854.15, 2580.3, 3369.8999999999996, 2495.7, 4765.799999999999]', '2022-05-11 03:09:37', '2022-05-11 03:09:37'),
	(772, NULL, 3, '142', '[837.8000000000001, 837.8000000000001, 979.8, 4096.7, 1441.3, 1696.9, 3145.2999999999997, 3528.7000000000003, 1199.9, 3834, 1867.3, 2598.6, 3393.7999999999997, 2513.4, 4799.599999999999]', '2022-05-11 03:09:37', '2022-05-11 03:09:37'),
	(773, NULL, 3, '143', '[843.7, 843.7, 986.7, 4125.55, 1451.45, 1708.85, 3167.45, 3553.55, 1208.35, 3861, 1880.45, 2616.9, 3417.7, 2531.1, 4833.4]', '2022-05-11 03:09:37', '2022-05-11 03:09:37'),
	(774, NULL, 3, '144', '[849.6, 849.6, 993.6, 4154.400000000001, 1461.6, 1720.8, 3189.6, 3578.4, 1216.8, 3888, 1893.6, 2635.2000000000003, 3441.6, 2548.7999999999997, 4867.2]', '2022-05-11 03:09:37', '2022-05-11 03:09:37'),
	(775, NULL, 3, '145', '[855.5, 855.5, 1000.5, 4183.25, 1471.75, 1732.75, 3211.75, 3603.25, 1225.25, 3915, 1906.75, 2653.5, 3465.5, 2566.5, 4901]', '2022-05-11 03:09:37', '2022-05-11 03:09:37'),
	(776, NULL, 3, '146', '[861.4000000000001, 861.4000000000001, 1007.4, 4212.1, 1481.9, 1744.6999999999998, 3233.8999999999996, 3628.1, 1233.6999999999998, 3942, 1919.9, 2671.8, 3489.3999999999996, 2584.2, 4934.799999999999]', '2022-05-11 03:09:38', '2022-05-11 03:09:38'),
	(777, NULL, 3, '147', '[867.3000000000001, 867.3000000000001, 1014.3, 4240.95, 1492.05, 1756.65, 3256.0499999999997, 3652.95, 1242.15, 3969, 1933.05, 2690.1, 3513.2999999999997, 2601.9, 4968.599999999999]', '2022-05-11 03:09:38', '2022-05-11 03:09:38'),
	(778, NULL, 3, '148', '[873.2, 873.2, 1021.2, 4269.8, 1502.2, 1768.6, 3278.2, 3677.8, 1250.6, 3996, 1946.2, 2708.4, 3537.2, 2619.6, 5002.4]', '2022-05-11 03:09:38', '2022-05-11 03:09:38'),
	(779, NULL, 3, '149', '[879.1, 879.1, 1028.1, 4298.650000000001, 1512.35, 1780.55, 3300.35, 3702.65, 1259.05, 4023, 1959.35, 2726.7000000000003, 3561.1, 2637.2999999999997, 5036.2]', '2022-05-11 03:09:38', '2022-05-11 03:09:38'),
	(780, NULL, 3, '150', '[885, 885, 1035, 4327.5, 1522.5, 1792.5, 3322.5, 3727.5, 1267.5, 4050, 1972.5, 2745, 3585, 2655, 5070]', '2022-05-11 03:09:38', '2022-05-11 03:09:38'),
	(781, NULL, 3, '151', '[890.9000000000001, 890.9000000000001, 1041.9, 4356.35, 1532.65, 1804.45, 3344.6499999999996, 3752.35, 1275.9499999999998, 4077, 1985.65, 2763.3, 3608.9, 2672.7, 5103.799999999999]', '2022-05-11 03:09:39', '2022-05-11 03:09:39'),
	(782, NULL, 3, '152', '[896.8000000000001, 896.8000000000001, 1048.8, 4385.2, 1542.8, 1816.4, 3366.7999999999997, 3777.2, 1284.4, 4104, 1998.8, 2781.6, 3632.8, 2690.4, 5137.599999999999]', '2022-05-11 03:09:39', '2022-05-11 03:09:39'),
	(783, NULL, 3, '153', '[902.7, 902.7, 1055.7, 4414.05, 1552.95, 1828.35, 3388.95, 3802.05, 1292.85, 4131, 2011.95, 2799.9, 3656.7, 2708.1, 5171.4]', '2022-05-11 03:09:39', '2022-05-11 03:09:39'),
	(784, NULL, 3, '154', '[908.6, 908.6, 1062.6, 4442.900000000001, 1563.1, 1840.3, 3411.1, 3826.9, 1301.3, 4158, 2025.1, 2818.2000000000003, 3680.6, 2725.7999999999997, 5205.2]', '2022-05-11 03:09:39', '2022-05-11 03:09:39'),
	(785, NULL, 3, '155', '[914.5, 914.5, 1069.5, 4471.75, 1573.25, 1852.25, 3433.25, 3851.75, 1309.75, 4185, 2038.25, 2836.5, 3704.5, 2743.5, 5239]', '2022-05-11 03:09:39', '2022-05-11 03:09:39'),
	(786, NULL, 3, '156', '[920.4, 920.4, 1076.4, 4500.6, 1583.4, 1864.2, 3455.3999999999996, 3876.6, 1318.1999999999998, 4212, 2051.4, 2854.8, 3728.4, 2761.2, 5272.799999999999]', '2022-05-11 03:09:39', '2022-05-11 03:09:39'),
	(787, NULL, 3, '157', '[926.3, 926.3, 1083.3, 4529.45, 1593.55, 1876.15, 3477.5499999999997, 3901.45, 1326.65, 4239, 2064.55, 2873.1, 3752.3, 2778.9, 5306.599999999999]', '2022-05-11 03:09:40', '2022-05-11 03:09:40'),
	(788, NULL, 3, '158', '[932.2, 932.2, 1090.2, 4558.3, 1603.7, 1888.1, 3499.7, 3926.3, 1335.1, 4266, 2077.7000000000003, 2891.4, 3776.2, 2796.6, 5340.4]', '2022-05-11 03:09:40', '2022-05-11 03:09:40'),
	(789, NULL, 3, '159', '[938.1, 938.1, 1097.1, 4587.150000000001, 1613.85, 1900.05, 3521.85, 3951.15, 1343.55, 4293, 2090.85, 2909.7000000000003, 3800.1, 2814.2999999999997, 5374.2]', '2022-05-11 03:09:40', '2022-05-11 03:09:40'),
	(790, NULL, 3, '160', '[944, 944, 1104, 4616, 1624, 1912, 3544, 3976, 1352, 4320, 2104, 2928, 3824, 2832, 5408]', '2022-05-11 03:09:40', '2022-05-11 03:09:40'),
	(791, NULL, 3, '161', '[949.9, 949.9, 1110.9, 4644.85, 1634.15, 1923.95, 3566.1499999999996, 4000.85, 1360.4499999999998, 4347, 2117.15, 2946.3, 3847.9, 2849.7, 5441.799999999999]', '2022-05-11 03:09:40', '2022-05-11 03:09:40'),
	(792, NULL, 3, '162', '[955.8, 955.8, 1117.8, 4673.7, 1644.3, 1935.9, 3588.2999999999997, 4025.7, 1368.9, 4374, 2130.3, 2964.6, 3871.8, 2867.4, 5475.599999999999]', '2022-05-11 03:09:41', '2022-05-11 03:09:41'),
	(793, NULL, 3, '163', '[961.7, 961.7, 1124.7, 4702.55, 1654.45, 1947.85, 3610.45, 4050.55, 1377.35, 4401, 2143.4500000000003, 2982.9, 3895.7, 2885.1, 5509.4]', '2022-05-11 03:09:41', '2022-05-11 03:09:41'),
	(794, NULL, 3, '164', '[967.6, 967.6, 1131.6, 4731.400000000001, 1664.6, 1959.8, 3632.6, 4075.4, 1385.8, 4428, 2156.6, 3001.2000000000003, 3919.6, 2902.7999999999997, 5543.2]', '2022-05-11 03:09:41', '2022-05-11 03:09:41'),
	(795, NULL, 3, '165', '[973.5, 973.5, 1138.5, 4760.25, 1674.75, 1971.75, 3654.749999999999, 4100.25, 1394.2499999999998, 4455, 2169.75, 3019.5, 3943.499999999999, 2920.5, 5576.999999999999]', '2022-05-11 03:09:41', '2022-05-11 03:09:41'),
	(796, NULL, 3, '166', '[979.4, 979.4, 1145.4, 4789.1, 1684.9, 1983.7, 3676.9, 4125.1, 1402.6999999999998, 4482, 2182.9, 3037.8, 3967.4, 2938.2, 5610.799999999999]', '2022-05-11 03:09:41', '2022-05-11 03:09:41'),
	(797, NULL, 3, '167', '[985.3, 985.3, 1152.3, 4817.95, 1695.05, 1995.65, 3699.05, 4149.95, 1411.15, 4509, 2196.05, 3056.1, 3991.3, 2955.9, 5644.599999999999]', '2022-05-11 03:09:41', '2022-05-11 03:09:41'),
	(798, NULL, 3, '168', '[991.2, 991.2, 1159.2, 4846.8, 1705.2, 2007.6, 3721.2, 4174.8, 1419.6, 4536, 2209.2000000000003, 3074.4, 4015.2, 2973.6, 5678.4]', '2022-05-11 03:09:42', '2022-05-11 03:09:42'),
	(799, NULL, 3, '169', '[997.1, 997.1, 1166.1, 4875.650000000001, 1715.35, 2019.55, 3743.35, 4199.650000000001, 1428.05, 4563, 2222.35, 3092.7000000000003, 4039.1, 2991.2999999999997, 5712.2]', '2022-05-11 03:09:42', '2022-05-11 03:09:42'),
	(800, NULL, 3, '170', '[1003, 1003, 1173, 4904.5, 1725.5, 2031.5, 3765.499999999999, 4224.5, 1436.4999999999998, 4590, 2235.5, 3111, 4062.999999999999, 3009, 5745.999999999999]', '2022-05-11 03:09:42', '2022-05-11 03:09:42'),
	(801, NULL, 3, '171', '[1008.9, 1008.9, 1179.9, 4933.35, 1735.65, 2043.45, 3787.65, 4249.35, 1444.9499999999998, 4617, 2248.65, 3129.3, 4086.9, 3026.7, 5779.799999999999]', '2022-05-11 03:09:42', '2022-05-11 03:09:42'),
	(802, NULL, 3, '172', '[1014.8, 1014.8, 1186.8, 4962.2, 1745.8, 2055.4, 3809.8, 4274.2, 1453.4, 4644, 2261.8, 3147.6, 4110.8, 3044.4, 5813.599999999999]', '2022-05-11 03:09:42', '2022-05-11 03:09:42'),
	(803, NULL, 3, '173', '[1020.7, 1020.7, 1193.7, 4991.05, 1755.95, 2067.35, 3831.95, 4299.05, 1461.85, 4671, 2274.9500000000003, 3165.9, 4134.7, 3062.1, 5847.4]', '2022-05-11 03:09:43', '2022-05-11 03:09:43'),
	(804, NULL, 3, '174', '[1026.6, 1026.6, 1200.6, 5019.900000000001, 1766.1, 2079.2999999999997, 3854.1, 4323.900000000001, 1470.3, 4698, 2288.1, 3184.2000000000003, 4158.599999999999, 3079.7999999999997, 5881.2]', '2022-05-11 03:09:43', '2022-05-11 03:09:43'),
	(805, NULL, 3, '175', '[1032.5, 1032.5, 1207.5, 5048.75, 1776.25, 2091.25, 3876.249999999999, 4348.75, 1478.7499999999998, 4725, 2301.25, 3202.5, 4182.5, 3097.5, 5914.999999999999]', '2022-05-11 03:09:43', '2022-05-11 03:09:43'),
	(806, NULL, 3, '176', '[1038.4, 1038.4, 1214.4, 5077.6, 1786.4, 2103.2, 3898.4, 4373.6, 1487.1999999999998, 4752, 2314.4, 3220.8, 4206.4, 3115.2, 5948.799999999999]', '2022-05-11 03:09:43', '2022-05-11 03:09:43'),
	(807, NULL, 3, '177', '[1044.3, 1044.3, 1221.3, 5106.45, 1796.55, 2115.15, 3920.55, 4398.45, 1495.65, 4779, 2327.55, 3239.1, 4230.3, 3132.9, 5982.599999999999]', '2022-05-11 03:09:43', '2022-05-11 03:09:43'),
	(808, NULL, 3, '178', '[1050.2, 1050.2, 1228.2, 5135.3, 1806.7, 2127.1, 3942.7, 4423.3, 1504.1, 4806, 2340.7000000000003, 3257.4, 4254.2, 3150.6, 6016.4]', '2022-05-11 03:09:44', '2022-05-11 03:09:44'),
	(809, NULL, 3, '179', '[1056.1, 1056.1, 1235.1, 5164.150000000001, 1816.85, 2139.0499999999997, 3964.85, 4448.150000000001, 1512.55, 4833, 2353.85, 3275.7000000000003, 4278.099999999999, 3168.2999999999997, 6050.2]', '2022-05-11 03:09:44', '2022-05-11 03:09:44'),
	(810, NULL, 3, '180', '[1062, 1062, 1242, 5193, 1827, 2151, 3986.999999999999, 4473, 1520.9999999999998, 4860, 2367, 3294, 4302, 3186, 6083.999999999999]', '2022-05-11 03:09:44', '2022-05-11 03:09:44'),
	(811, NULL, 3, '181', '[1067.9, 1067.9, 1248.9, 5221.85, 1837.15, 2162.95, 4009.15, 4497.85, 1529.4499999999998, 4887, 2380.15, 3312.3, 4325.9, 3203.7, 6117.799999999999]', '2022-05-11 03:09:44', '2022-05-11 03:09:44'),
	(812, NULL, 3, '182', '[1073.8, 1073.8, 1255.8, 5250.7, 1847.3, 2174.9, 4031.3, 4522.7, 1537.9, 4914, 2393.3, 3330.6, 4349.8, 3221.4, 6151.599999999999]', '2022-05-11 03:09:44', '2022-05-11 03:09:44'),
	(813, NULL, 3, '183', '[1079.7, 1079.7, 1262.7, 5279.55, 1857.45, 2186.85, 4053.45, 4547.55, 1546.35, 4941, 2406.4500000000003, 3348.9, 4373.7, 3239.1, 6185.4]', '2022-05-11 03:09:44', '2022-05-11 03:09:44'),
	(814, NULL, 3, '184', '[1085.6, 1085.6, 1269.6, 5308.400000000001, 1867.6, 2198.7999999999997, 4075.6, 4572.400000000001, 1554.8, 4968, 2419.6, 3367.2000000000003, 4397.599999999999, 3256.7999999999997, 6219.2]', '2022-05-11 03:09:45', '2022-05-11 03:09:45'),
	(815, NULL, 3, '185', '[1091.5, 1091.5, 1276.5, 5337.25, 1877.75, 2210.75, 4097.75, 4597.25, 1563.2499999999998, 4995, 2432.75, 3385.5, 4421.5, 3274.5, 6252.999999999999]', '2022-05-11 03:09:45', '2022-05-11 03:09:45'),
	(816, NULL, 3, '186', '[1097.4, 1097.4, 1283.4, 5366.1, 1887.9, 2222.7, 4119.9, 4622.1, 1571.6999999999998, 5022, 2445.9, 3403.8, 4445.4, 3292.2, 6286.799999999999]', '2022-05-11 03:09:45', '2022-05-11 03:09:45'),
	(817, NULL, 3, '187', '[1103.3, 1103.3, 1290.3, 5394.95, 1898.05, 2234.65, 4142.05, 4646.95, 1580.15, 5049, 2459.05, 3422.1, 4469.3, 3309.9, 6320.599999999999]', '2022-05-11 03:09:45', '2022-05-11 03:09:45'),
	(818, NULL, 3, '188', '[1109.2, 1109.2, 1297.2, 5423.8, 1908.2, 2246.6, 4164.2, 4671.8, 1588.6, 5076, 2472.2000000000003, 3440.4, 4493.2, 3327.6, 6354.4]', '2022-05-11 03:09:45', '2022-05-11 03:09:45'),
	(819, NULL, 3, '189', '[1115.1, 1115.1, 1304.1, 5452.650000000001, 1918.35, 2258.5499999999997, 4186.349999999999, 4696.650000000001, 1597.05, 5103, 2485.35, 3458.7000000000003, 4517.099999999999, 3345.2999999999997, 6388.2]', '2022-05-11 03:09:46', '2022-05-11 03:09:46'),
	(820, NULL, 3, '190', '[1121, 1121, 1311, 5481.5, 1928.5, 2270.5, 4208.5, 4721.5, 1605.4999999999998, 5130, 2498.5, 3477, 4541, 3363, 6421.999999999999]', '2022-05-11 03:09:46', '2022-05-11 03:09:46'),
	(821, NULL, 3, '191', '[1126.9, 1126.9, 1317.9, 5510.35, 1938.65, 2282.45, 4230.65, 4746.35, 1613.9499999999998, 5157, 2511.65, 3495.3, 4564.9, 3380.7, 6455.799999999999]', '2022-05-11 03:09:46', '2022-05-11 03:09:46'),
	(822, NULL, 3, '192', '[1132.8000000000002, 1132.8000000000002, 1324.8000000000002, 5539.200000000001, 1948.8, 2294.3999999999996, 4252.799999999999, 4771.200000000001, 1622.4, 5184, 2524.8, 3513.6000000000004, 4588.799999999999, 3398.3999999999996, 6489.599999999999]', '2022-05-11 03:09:46', '2022-05-11 03:09:46'),
	(823, NULL, 3, '193', '[1138.7, 1138.7, 1331.7, 5568.05, 1958.95, 2306.35, 4274.95, 4796.05, 1630.85, 5211, 2537.9500000000003, 3531.9, 4612.7, 3416.1, 6523.4]', '2022-05-11 03:09:46', '2022-05-11 03:09:46'),
	(824, NULL, 3, '194', '[1144.6, 1144.6, 1338.6, 5596.900000000001, 1969.1, 2318.2999999999997, 4297.099999999999, 4820.900000000001, 1639.3, 5238, 2551.1, 3550.2000000000003, 4636.599999999999, 3433.7999999999997, 6557.2]', '2022-05-11 03:09:47', '2022-05-11 03:09:47'),
	(825, NULL, 3, '195', '[1150.5, 1150.5, 1345.5, 5625.75, 1979.25, 2330.25, 4319.25, 4845.75, 1647.7499999999998, 5265, 2564.25, 3568.5, 4660.5, 3451.5, 6590.999999999999]', '2022-05-11 03:09:47', '2022-05-11 03:09:47'),
	(826, NULL, 3, '196', '[1156.4, 1156.4, 1352.4, 5654.6, 1989.4, 2342.2, 4341.4, 4870.6, 1656.1999999999998, 5292, 2577.4, 3586.8, 4684.4, 3469.2, 6624.799999999999]', '2022-05-11 03:09:47', '2022-05-11 03:09:47'),
	(827, NULL, 3, '197', '[1162.3000000000002, 1162.3000000000002, 1359.3000000000002, 5683.450000000001, 1999.55, 2354.1499999999996, 4363.549999999999, 4895.450000000001, 1664.65, 5319, 2590.55, 3605.1, 4708.299999999999, 3486.8999999999996, 6658.599999999999]', '2022-05-11 03:09:47', '2022-05-11 03:09:47'),
	(828, NULL, 3, '198', '[1168.2, 1168.2, 1366.2, 5712.3, 2009.7, 2366.1, 4385.7, 4920.3, 1673.1, 5346, 2603.7000000000003, 3623.4, 4732.2, 3504.6, 6692.4]', '2022-05-11 03:09:47', '2022-05-11 03:09:47'),
	(829, NULL, 3, '199', '[1174.1, 1174.1, 1373.1, 5741.150000000001, 2019.85, 2378.0499999999997, 4407.849999999999, 4945.150000000001, 1681.55, 5373, 2616.85, 3641.7, 4756.099999999999, 3522.2999999999997, 6726.2]', '2022-05-11 03:09:47', '2022-05-11 03:09:47'),
	(830, NULL, 3, '200', '[1180, 1180, 1380, 5770, 2030, 2390, 4430, 4970, 1689.9999999999998, 5400, 2630, 3660, 4780, 3540, 6759.999999999999]', '2022-05-11 03:09:48', '2022-05-11 03:09:48'),
	(831, NULL, 3, '201', '[1185.9, 1185.9, 1386.9, 5798.85, 2040.15, 2401.95, 4452.15, 4994.85, 1698.4499999999998, 5427, 2643.15, 3678.3, 4803.9, 3557.7, 6793.799999999999]', '2022-05-11 03:09:48', '2022-05-11 03:09:48'),
	(832, NULL, 3, '202', '[1191.8000000000002, 1191.8000000000002, 1393.8000000000002, 5827.700000000001, 2050.3, 2413.8999999999996, 4474.299999999999, 5019.700000000001, 1706.9, 5454, 2656.3, 3696.6, 4827.799999999999, 3575.3999999999996, 6827.599999999999]', '2022-05-11 03:09:48', '2022-05-11 03:09:48'),
	(833, NULL, 3, '203', '[1197.7, 1197.7, 1400.7, 5856.55, 2060.4500000000003, 2425.85, 4496.45, 5044.55, 1715.35, 5481, 2669.4500000000003, 3714.9, 4851.7, 3593.1, 6861.4]', '2022-05-11 03:09:48', '2022-05-11 03:09:48'),
	(834, NULL, 3, '204', '[1203.6, 1203.6, 1407.6, 5885.400000000001, 2070.6, 2437.7999999999997, 4518.599999999999, 5069.400000000001, 1723.8, 5508, 2682.6, 3733.2, 4875.599999999999, 3610.8, 6895.2]', '2022-05-11 03:09:48', '2022-05-11 03:09:48'),
	(835, NULL, 3, '205', '[1209.5, 1209.5, 1414.5, 5914.25, 2080.75, 2449.75, 4540.75, 5094.25, 1732.2499999999998, 5535, 2695.75, 3751.5, 4899.5, 3628.5, 6928.999999999999]', '2022-05-11 03:09:49', '2022-05-11 03:09:49'),
	(836, NULL, 3, '206', '[1215.4, 1215.4, 1421.4, 5943.1, 2090.9, 2461.7, 4562.9, 5119.1, 1740.6999999999998, 5562, 2708.9, 3769.8, 4923.4, 3646.2, 6962.799999999999]', '2022-05-11 03:09:49', '2022-05-11 03:09:49'),
	(837, NULL, 3, '207', '[1221.3000000000002, 1221.3000000000002, 1428.3000000000002, 5971.950000000001, 2101.05, 2473.6499999999996, 4585.049999999999, 5143.950000000001, 1749.15, 5589, 2722.05, 3788.1, 4947.299999999999, 3663.9, 6996.599999999999]', '2022-05-11 03:09:49', '2022-05-11 03:09:49'),
	(838, NULL, 3, '208', '[1227.2, 1227.2, 1435.2, 6000.8, 2111.2000000000003, 2485.6, 4607.2, 5168.8, 1757.6, 5616, 2735.2000000000003, 3806.4, 4971.2, 3681.6, 7030.4]', '2022-05-11 03:09:49', '2022-05-11 03:09:49'),
	(839, NULL, 3, '209', '[1233.1, 1233.1, 1442.1, 6029.650000000001, 2121.35, 2497.5499999999997, 4629.349999999999, 5193.650000000001, 1766.05, 5643, 2748.35, 3824.7, 4995.099999999999, 3699.3, 7064.2]', '2022-05-11 03:09:49', '2022-05-11 03:09:49'),
	(840, NULL, 3, '210', '[1239, 1239, 1449, 6058.5, 2131.5, 2509.5, 4651.5, 5218.5, 1774.4999999999998, 5670, 2761.5, 3843, 5019, 3717, 7097.999999999999]', '2022-05-11 03:09:49', '2022-05-11 03:09:49'),
	(841, NULL, 3, '211', '[1244.9, 1244.9, 1455.9, 6087.35, 2141.65, 2521.45, 4673.65, 5243.35, 1782.9499999999998, 5697, 2774.65, 3861.3, 5042.9, 3734.7, 7131.799999999999]', '2022-05-11 03:09:50', '2022-05-11 03:09:50'),
	(842, NULL, 3, '212', '[1250.8000000000002, 1250.8000000000002, 1462.8000000000002, 6116.200000000001, 2151.8, 2533.3999999999996, 4695.799999999999, 5268.200000000001, 1791.4, 5724, 2787.8, 3879.6, 5066.799999999999, 3752.4, 7165.599999999999]', '2022-05-11 03:09:50', '2022-05-11 03:09:50'),
	(843, NULL, 3, '213', '[1256.7, 1256.7, 1469.7, 6145.05, 2161.9500000000003, 2545.35, 4717.95, 5293.05, 1799.85, 5751, 2800.9500000000003, 3897.9, 5090.7, 3770.1, 7199.4]', '2022-05-11 03:09:50', '2022-05-11 03:09:50'),
	(844, NULL, 3, '214', '[1262.6, 1262.6, 1476.6, 6173.900000000001, 2172.1, 2557.2999999999997, 4740.099999999999, 5317.900000000001, 1808.3, 5778, 2814.1, 3916.2, 5114.599999999999, 3787.8, 7233.2]', '2022-05-11 03:09:50', '2022-05-11 03:09:50'),
	(845, NULL, 3, '215', '[1268.5, 1268.5, 1483.5, 6202.75, 2182.25, 2569.25, 4762.25, 5342.75, 1816.75, 5805, 2827.25, 3934.5, 5138.5, 3805.5, 7266.999999999999]', '2022-05-11 03:09:50', '2022-05-11 03:09:50'),
	(846, NULL, 3, '216', '[1274.4, 1274.4, 1490.4, 6231.6, 2192.4, 2581.2, 4784.4, 5367.6, 1825.2, 5832, 2840.4, 3952.8, 5162.4, 3823.2, 7300.799999999999]', '2022-05-11 03:09:51', '2022-05-11 03:09:51'),
	(847, NULL, 3, '217', '[1280.3000000000002, 1280.3000000000002, 1497.3000000000002, 6260.450000000001, 2202.55, 2593.1499999999996, 4806.549999999999, 5392.450000000001, 1833.65, 5859, 2853.55, 3971.1, 5186.299999999999, 3840.9, 7334.599999999999]', '2022-05-11 03:09:51', '2022-05-11 03:09:51'),
	(848, NULL, 3, '218', '[1286.2, 1286.2, 1504.2, 6289.3, 2212.7000000000003, 2605.1, 4828.7, 5417.3, 1842.1, 5886, 2866.7000000000003, 3989.4, 5210.2, 3858.6, 7368.4]', '2022-05-11 03:09:51', '2022-05-11 03:09:51'),
	(849, NULL, 3, '219', '[1292.1, 1292.1, 1511.1, 6318.150000000001, 2222.85, 2617.0499999999997, 4850.849999999999, 5442.150000000001, 1850.55, 5913, 2879.85, 4007.7, 5234.099999999999, 3876.3, 7402.2]', '2022-05-11 03:09:51', '2022-05-11 03:09:51'),
	(850, NULL, 3, '220', '[1298, 1298, 1518, 6347, 2233, 2629, 4873, 5467, 1859, 5940, 2893, 4026, 5258, 3894, 7435.999999999999]', '2022-05-11 03:09:51', '2022-05-11 03:09:51'),
	(851, NULL, 3, '221', '[1303.9, 1303.9, 1524.9, 6375.85, 2243.15, 2640.95, 4895.15, 5491.85, 1867.45, 5967, 2906.15, 4044.3, 5281.9, 3911.7, 7469.799999999999]', '2022-05-11 03:09:52', '2022-05-11 03:09:52'),
	(852, NULL, 3, '222', '[1309.8000000000002, 1309.8000000000002, 1531.8000000000002, 6404.700000000001, 2253.3, 2652.8999999999996, 4917.299999999999, 5516.700000000001, 1875.9, 5994, 2919.3, 4062.6, 5305.799999999999, 3929.4, 7503.599999999999]', '2022-05-11 03:09:52', '2022-05-11 03:09:52'),
	(853, NULL, 3, '223', '[1315.7, 1315.7, 1538.7, 6433.55, 2263.4500000000003, 2664.85, 4939.45, 5541.55, 1884.35, 6021, 2932.4500000000003, 4080.9, 5329.7, 3947.1, 7537.4]', '2022-05-11 03:09:52', '2022-05-11 03:09:52'),
	(854, NULL, 3, '224', '[1321.6, 1321.6, 1545.6, 6462.400000000001, 2273.6, 2676.7999999999997, 4961.599999999999, 5566.400000000001, 1892.7999999999995, 6048, 2945.6, 4099.2, 5353.599999999999, 3964.8, 7571.199999999999]', '2022-05-11 03:09:52', '2022-05-11 03:09:52'),
	(855, NULL, 3, '225', '[1327.5, 1327.5, 1552.5, 6491.25, 2283.75, 2688.75, 4983.75, 5591.25, 1901.25, 6075, 2958.75, 4117.5, 5377.5, 3982.5, 7604.999999999999]', '2022-05-11 03:09:52', '2022-05-11 03:09:52'),
	(856, NULL, 3, '226', '[1333.4, 1333.4, 1559.4, 6520.1, 2293.9, 2700.7, 5005.9, 5616.1, 1909.7, 6102, 2971.9, 4135.8, 5401.4, 4000.2, 7638.799999999999]', '2022-05-11 03:09:53', '2022-05-11 03:09:53'),
	(857, NULL, 3, '227', '[1339.3000000000002, 1339.3000000000002, 1566.3000000000002, 6548.950000000001, 2304.05, 2712.6499999999996, 5028.049999999999, 5640.950000000001, 1918.15, 6129, 2985.05, 4154.1, 5425.299999999999, 4017.9, 7672.599999999999]', '2022-05-11 03:09:53', '2022-05-11 03:09:53'),
	(858, NULL, 3, '228', '[1345.2, 1345.2, 1573.2, 6577.8, 2314.2000000000003, 2724.6, 5050.2, 5665.8, 1926.6, 6156, 2998.2000000000003, 4172.400000000001, 5449.2, 4035.6, 7706.4]', '2022-05-11 03:09:53', '2022-05-11 03:09:53'),
	(859, NULL, 3, '229', '[1351.1, 1351.1, 1580.1, 6606.650000000001, 2324.35, 2736.5499999999997, 5072.349999999999, 5690.650000000001, 1935.0499999999995, 6183, 3011.35, 4190.7, 5473.099999999999, 4053.3, 7740.199999999999]', '2022-05-11 03:09:53', '2022-05-11 03:09:53'),
	(860, NULL, 3, '230', '[1357, 1357, 1587, 6635.5, 2334.5, 2748.5, 5094.5, 5715.5, 1943.5, 6210, 3024.5, 4209, 5497, 4071, 7773.999999999999]', '2022-05-11 03:09:53', '2022-05-11 03:09:53'),
	(861, NULL, 3, '231', '[1362.9, 1362.9, 1593.9, 6664.35, 2344.65, 2760.45, 5116.65, 5740.35, 1951.95, 6237, 3037.65, 4227.3, 5520.9, 4088.7, 7807.799999999999]', '2022-05-11 03:09:53', '2022-05-11 03:09:53'),
	(862, NULL, 3, '232', '[1368.8000000000002, 1368.8000000000002, 1600.8000000000002, 6693.200000000001, 2354.8, 2772.3999999999996, 5138.799999999999, 5765.200000000001, 1960.4, 6264, 3050.8, 4245.6, 5544.799999999999, 4106.4, 7841.599999999999]', '2022-05-11 03:09:54', '2022-05-11 03:09:54'),
	(863, NULL, 3, '233', '[1374.7, 1374.7, 1607.7, 6722.05, 2364.9500000000003, 2784.35, 5160.95, 5790.05, 1968.85, 6291, 3063.9500000000003, 4263.900000000001, 5568.7, 4124.099999999999, 7875.4]', '2022-05-11 03:09:54', '2022-05-11 03:09:54'),
	(864, NULL, 3, '234', '[1380.6, 1380.6, 1614.6, 6750.900000000001, 2375.1, 2796.2999999999997, 5183.099999999999, 5814.900000000001, 1977.2999999999995, 6318, 3077.1, 4282.2, 5592.599999999999, 4141.8, 7909.199999999999]', '2022-05-11 03:09:54', '2022-05-11 03:09:54'),
	(865, NULL, 3, '235', '[1386.5, 1386.5, 1621.5, 6779.75, 2385.25, 2808.25, 5205.25, 5839.75, 1985.75, 6345, 3090.25, 4300.5, 5616.5, 4159.5, 7942.999999999999]', '2022-05-11 03:09:54', '2022-05-11 03:09:54'),
	(866, NULL, 3, '236', '[1392.4, 1392.4, 1628.4, 6808.6, 2395.4, 2820.2, 5227.4, 5864.6, 1994.2, 6372, 3103.4, 4318.8, 5640.4, 4177.2, 7976.799999999999]', '2022-05-11 03:09:54', '2022-05-11 03:09:54'),
	(867, NULL, 3, '237', '[1398.3000000000002, 1398.3000000000002, 1635.3000000000002, 6837.450000000001, 2405.55, 2832.1499999999996, 5249.549999999999, 5889.450000000001, 2002.65, 6399, 3116.55, 4337.1, 5664.299999999999, 4194.9, 8010.599999999999]', '2022-05-11 03:09:55', '2022-05-11 03:09:55'),
	(868, NULL, 3, '238', '[1404.2, 1404.2, 1642.2, 6866.3, 2415.7000000000003, 2844.1, 5271.7, 5914.3, 2011.1, 6426, 3129.7000000000003, 4355.400000000001, 5688.2, 4212.599999999999, 8044.4]', '2022-05-11 03:09:55', '2022-05-11 03:09:55'),
	(869, NULL, 3, '239', '[1410.1, 1410.1, 1649.1, 6895.150000000001, 2425.85, 2856.0499999999997, 5293.849999999999, 5939.150000000001, 2019.5499999999995, 6453, 3142.85, 4373.7, 5712.099999999999, 4230.3, 8078.199999999999]', '2022-05-11 03:09:55', '2022-05-11 03:09:55'),
	(870, NULL, 3, '240', '[1416, 1416, 1656, 6924, 2436, 2868, 5316, 5964, 2028, 6480, 3156, 4392, 5736, 4248, 8111.999999999999]', '2022-05-11 03:09:55', '2022-05-11 03:09:55'),
	(871, NULL, 3, '241', '[1421.9, 1421.9, 1662.9, 6952.85, 2446.15, 2879.95, 5338.15, 5988.85, 2036.45, 6507, 3169.15, 4410.3, 5759.9, 4265.7, 8145.799999999999]', '2022-05-11 03:09:55', '2022-05-11 03:09:55'),
	(872, NULL, 3, '242', '[1427.8000000000002, 1427.8000000000002, 1669.8000000000002, 6981.700000000001, 2456.3, 2891.8999999999996, 5360.299999999999, 6013.700000000001, 2044.9, 6534, 3182.3, 4428.6, 5783.799999999999, 4283.4, 8179.599999999999]', '2022-05-11 03:09:55', '2022-05-11 03:09:55'),
	(873, NULL, 3, '243', '[1433.7, 1433.7, 1676.7, 7010.55, 2466.4500000000003, 2903.85, 5382.45, 6038.55, 2053.35, 6561, 3195.4500000000003, 4446.900000000001, 5807.7, 4301.099999999999, 8213.4]', '2022-05-11 03:09:56', '2022-05-11 03:09:56'),
	(874, NULL, 3, '244', '[1439.6, 1439.6, 1683.6, 7039.400000000001, 2476.6, 2915.7999999999997, 5404.599999999999, 6063.400000000001, 2061.7999999999997, 6588, 3208.6, 4465.2, 5831.599999999999, 4318.8, 8247.199999999999]', '2022-05-11 03:09:56', '2022-05-11 03:09:56'),
	(875, NULL, 3, '245', '[1445.5, 1445.5, 1690.5, 7068.25, 2486.75, 2927.75, 5426.75, 6088.25, 2070.25, 6615, 3221.75, 4483.5, 5855.5, 4336.5, 8281]', '2022-05-11 03:09:56', '2022-05-11 03:09:56'),
	(876, NULL, 3, '246', '[1451.4, 1451.4, 1697.4, 7097.1, 2496.9, 2939.7, 5448.9, 6113.1, 2078.7, 6642, 3234.9, 4501.8, 5879.4, 4354.2, 8314.8]', '2022-05-11 03:09:56', '2022-05-11 03:09:56'),
	(877, NULL, 3, '247', '[1457.3000000000002, 1457.3000000000002, 1704.3000000000002, 7125.950000000001, 2507.05, 2951.6499999999996, 5471.049999999999, 6137.950000000001, 2087.1499999999996, 6669, 3248.05, 4520.1, 5903.299999999999, 4371.9, 8348.599999999999]', '2022-05-11 03:09:56', '2022-05-11 03:09:56'),
	(878, NULL, 3, '248', '[1463.2, 1463.2, 1711.2, 7154.8, 2517.2000000000003, 2963.6, 5493.2, 6162.8, 2095.6, 6696, 3261.2000000000003, 4538.400000000001, 5927.2, 4389.599999999999, 8382.4]', '2022-05-11 03:09:57', '2022-05-11 03:09:57'),
	(879, NULL, 3, '249', '[1469.1, 1469.1, 1718.1, 7183.650000000001, 2527.35, 2975.5499999999997, 5515.349999999999, 6187.650000000001, 2104.0499999999997, 6723, 3274.35, 4556.7, 5951.099999999999, 4407.3, 8416.199999999999]', '2022-05-11 03:09:57', '2022-05-11 03:09:57'),
	(880, NULL, 3, '250', '[1475, 1475, 1725, 7212.5, 2537.5, 2987.5, 5537.5, 6212.5, 2112.5, 6750, 3287.5, 4575, 5975, 4425, 8450]', '2022-05-11 03:09:57', '2022-05-11 03:09:57'),
	(881, NULL, 3, '251', '[1480.9, 1480.9, 1731.9, 7241.35, 2547.65, 2999.45, 5559.65, 6237.35, 2120.95, 6777, 3300.65, 4593.3, 5998.9, 4442.7, 8483.8]', '2022-05-11 03:09:57', '2022-05-11 03:09:57'),
	(882, NULL, 3, '252', '[1486.8000000000002, 1486.8000000000002, 1738.8000000000002, 7270.200000000001, 2557.8, 3011.3999999999996, 5581.799999999999, 6262.200000000001, 2129.3999999999996, 6804, 3313.8, 4611.6, 6022.799999999999, 4460.4, 8517.599999999999]', '2022-05-11 03:09:57', '2022-05-11 03:09:57'),
	(883, NULL, 3, '253', '[1492.7, 1492.7, 1745.7, 7299.05, 2567.9500000000003, 3023.35, 5603.95, 6287.05, 2137.85, 6831, 3326.9500000000003, 4629.900000000001, 6046.7, 4478.099999999999, 8551.4]', '2022-05-11 03:09:58', '2022-05-11 03:09:58'),
	(884, NULL, 3, '254', '[1498.6, 1498.6, 1752.6, 7327.900000000001, 2578.1, 3035.2999999999997, 5626.099999999999, 6311.900000000001, 2146.2999999999997, 6858, 3340.1, 4648.2, 6070.599999999999, 4495.8, 8585.199999999999]', '2022-05-11 03:09:58', '2022-05-11 03:09:58'),
	(885, NULL, 3, '255', '[1504.5, 1504.5, 1759.5, 7356.75, 2588.25, 3047.25, 5648.25, 6336.75, 2154.75, 6885, 3353.25, 4666.5, 6094.5, 4513.5, 8619]', '2022-05-11 03:09:58', '2022-05-11 03:09:58'),
	(886, NULL, 3, '256', '[1510.4, 1510.4, 1766.4, 7385.6, 2598.4, 3059.2, 5670.4, 6361.6, 2163.2, 6912, 3366.4, 4684.8, 6118.4, 4531.2, 8652.8]', '2022-05-11 03:09:58', '2022-05-11 03:09:58'),
	(887, NULL, 3, '257', '[1516.3000000000002, 1516.3000000000002, 1773.3000000000002, 7414.450000000001, 2608.55, 3071.1499999999996, 5692.549999999999, 6386.450000000001, 2171.6499999999996, 6939, 3379.55, 4703.1, 6142.299999999999, 4548.9, 8686.599999999999]', '2022-05-11 03:09:58', '2022-05-11 03:09:58'),
	(888, NULL, 3, '258', '[1522.2, 1522.2, 1780.2, 7443.3, 2618.7000000000003, 3083.1, 5714.7, 6411.3, 2180.1, 6966, 3392.7000000000003, 4721.400000000001, 6166.2, 4566.599999999999, 8720.4]', '2022-05-11 03:09:59', '2022-05-11 03:09:59'),
	(889, NULL, 3, '259', '[1528.1, 1528.1, 1787.1, 7472.150000000001, 2628.85, 3095.0499999999997, 5736.849999999999, 6436.150000000001, 2188.5499999999997, 6993, 3405.85, 4739.7, 6190.099999999999, 4584.3, 8754.199999999999]', '2022-05-11 03:09:59', '2022-05-11 03:09:59'),
	(890, NULL, 3, '260', '[1534, 1534, 1794, 7501, 2639, 3107, 5759, 6461, 2197, 7020, 3419, 4758, 6214, 4602, 8788]', '2022-05-11 03:09:59', '2022-05-11 03:09:59'),
	(891, NULL, 3, '261', '[1539.9, 1539.9, 1800.9, 7529.85, 2649.15, 3118.95, 5781.15, 6485.85, 2205.45, 7047, 3432.15, 4776.3, 6237.9, 4619.7, 8821.8]', '2022-05-11 03:09:59', '2022-05-11 03:09:59'),
	(892, NULL, 3, '262', '[1545.8000000000002, 1545.8000000000002, 1807.8, 7558.700000000001, 2659.3, 3130.8999999999996, 5803.299999999999, 6510.700000000001, 2213.8999999999996, 7074, 3445.3, 4794.6, 6261.799999999999, 4637.4, 8855.599999999999]', '2022-05-11 03:09:59', '2022-05-11 03:09:59'),
	(893, NULL, 3, '263', '[1551.7, 1551.7, 1814.7, 7587.55, 2669.4500000000003, 3142.85, 5825.45, 6535.55, 2222.35, 7101, 3458.4500000000003, 4812.900000000001, 6285.7, 4655.099999999999, 8889.4]', '2022-05-11 03:09:59', '2022-05-11 03:09:59'),
	(894, NULL, 3, '264', '[1557.6, 1557.6, 1821.6, 7616.400000000001, 2679.6, 3154.7999999999997, 5847.599999999999, 6560.400000000001, 2230.7999999999997, 7128, 3471.6, 4831.2, 6309.599999999999, 4672.8, 8923.199999999999]', '2022-05-11 03:10:00', '2022-05-11 03:10:00'),
	(895, NULL, 3, '265', '[1563.5, 1563.5, 1828.5, 7645.25, 2689.75, 3166.75, 5869.75, 6585.25, 2239.25, 7155, 3484.75, 4849.5, 6333.5, 4690.5, 8957]', '2022-05-11 03:10:00', '2022-05-11 03:10:00'),
	(896, NULL, 3, '266', '[1569.4, 1569.4, 1835.4, 7674.1, 2699.9, 3178.7, 5891.9, 6610.1, 2247.7, 7182, 3497.9, 4867.8, 6357.4, 4708.2, 8990.8]', '2022-05-11 03:10:00', '2022-05-11 03:10:00'),
	(897, NULL, 3, '267', '[1575.3000000000002, 1575.3000000000002, 1842.3, 7702.950000000001, 2710.05, 3190.6499999999996, 5914.049999999999, 6634.950000000001, 2256.1499999999996, 7209, 3511.05, 4886.1, 6381.299999999999, 4725.9, 9024.6]', '2022-05-11 03:10:00', '2022-05-11 03:10:00'),
	(898, NULL, 3, '268', '[1581.2, 1581.2, 1849.2, 7731.8, 2720.2000000000003, 3202.6, 5936.2, 6659.8, 2264.6, 7236, 3524.2000000000003, 4904.400000000001, 6405.2, 4743.599999999999, 9058.4]', '2022-05-11 03:10:00', '2022-05-11 03:10:00'),
	(899, NULL, 3, '269', '[1587.1, 1587.1, 1856.1, 7760.650000000001, 2730.35, 3214.5499999999997, 5958.349999999999, 6684.650000000001, 2273.0499999999997, 7263, 3537.35, 4922.7, 6429.099999999999, 4761.3, 9092.2]', '2022-05-11 03:10:01', '2022-05-11 03:10:01'),
	(900, NULL, 3, '270', '[1593, 1593, 1863, 7789.5, 2740.5, 3226.5, 5980.5, 6709.5, 2281.5, 7290, 3550.5, 4941, 6453, 4779, 9126]', '2022-05-11 03:10:01', '2022-05-11 03:10:01'),
	(901, NULL, 3, '271', '[1598.9, 1598.9, 1869.9, 7818.35, 2750.65, 3238.45, 6002.65, 6734.35, 2289.95, 7317, 3563.65, 4959.3, 6476.9, 4796.7, 9159.8]', '2022-05-11 03:10:02', '2022-05-11 03:10:02'),
	(902, NULL, 3, '272', '[1604.8000000000002, 1604.8000000000002, 1876.8, 7847.200000000001, 2760.8, 3250.3999999999996, 6024.799999999999, 6759.200000000001, 2298.3999999999996, 7344, 3576.8, 4977.6, 6500.799999999999, 4814.4, 9193.6]', '2022-05-11 03:10:02', '2022-05-11 03:10:02'),
	(903, NULL, 3, '273', '[1610.7, 1610.7, 1883.7, 7876.05, 2770.9500000000003, 3262.35, 6046.95, 6784.05, 2306.85, 7371, 3589.9500000000003, 4995.900000000001, 6524.7, 4832.099999999999, 9227.4]', '2022-05-11 03:10:02', '2022-05-11 03:10:02'),
	(904, NULL, 3, '274', '[1616.6, 1616.6, 1890.6, 7904.900000000001, 2781.1, 3274.2999999999997, 6069.099999999999, 6808.900000000001, 2315.2999999999997, 7398, 3603.1, 5014.2, 6548.599999999999, 4849.8, 9261.2]', '2022-05-11 03:10:02', '2022-05-11 03:10:02'),
	(905, NULL, 3, '275', '[1622.5, 1622.5, 1897.5, 7933.75, 2791.25, 3286.25, 6091.25, 6833.75, 2323.75, 7425, 3616.25, 5032.5, 6572.5, 4867.5, 9295]', '2022-05-11 03:10:03', '2022-05-11 03:10:03'),
	(906, NULL, 3, '276', '[1628.4, 1628.4, 1904.4, 7962.6, 2801.4, 3298.2, 6113.4, 6858.6, 2332.2, 7452, 3629.4, 5050.8, 6596.4, 4885.2, 9328.8]', '2022-05-11 03:10:03', '2022-05-11 03:10:03'),
	(907, NULL, 3, '277', '[1634.3000000000002, 1634.3000000000002, 1911.3, 7991.450000000001, 2811.55, 3310.1499999999996, 6135.549999999999, 6883.450000000001, 2340.6499999999996, 7479, 3642.55, 5069.1, 6620.299999999999, 4902.9, 9362.6]', '2022-05-11 03:10:03', '2022-05-11 03:10:03'),
	(908, NULL, 3, '278', '[1640.2, 1640.2, 1918.2, 8020.3, 2821.7000000000003, 3322.1, 6157.7, 6908.3, 2349.1, 7506, 3655.7, 5087.400000000001, 6644.2, 4920.599999999999, 9396.4]', '2022-05-11 03:10:03', '2022-05-11 03:10:03'),
	(909, NULL, 3, '279', '[1646.1, 1646.1, 1925.1, 8049.150000000001, 2831.85, 3334.0499999999997, 6179.849999999999, 6933.150000000001, 2357.5499999999997, 7533, 3668.85, 5105.7, 6668.099999999999, 4938.3, 9430.2]', '2022-05-11 03:10:03', '2022-05-11 03:10:03'),
	(910, NULL, 3, '280', '[1652, 1652, 1932, 8078, 2842, 3346, 6202, 6958, 2366, 7560, 3682, 5124, 6692, 4956, 9464]', '2022-05-11 03:10:04', '2022-05-11 03:10:04'),
	(911, NULL, 3, '281', '[1657.9, 1657.9, 1938.9, 8106.85, 2852.15, 3357.95, 6224.15, 6982.85, 2374.45, 7587, 3695.15, 5142.3, 6715.9, 4973.7, 9497.8]', '2022-05-11 03:10:04', '2022-05-11 03:10:04'),
	(912, NULL, 3, '282', '[1663.8000000000002, 1663.8000000000002, 1945.8, 8135.700000000001, 2862.3, 3369.8999999999996, 6246.299999999999, 7007.700000000001, 2382.8999999999996, 7614, 3708.3, 5160.6, 6739.799999999999, 4991.4, 9531.6]', '2022-05-11 03:10:04', '2022-05-11 03:10:04'),
	(913, NULL, 3, '283', '[1669.7, 1669.7, 1952.7, 8164.55, 2872.4500000000003, 3381.85, 6268.45, 7032.55, 2391.35, 7641, 3721.45, 5178.900000000001, 6763.7, 5009.099999999999, 9565.4]', '2022-05-11 03:10:04', '2022-05-11 03:10:04'),
	(914, NULL, 3, '284', '[1675.6, 1675.6, 1959.6, 8193.4, 2882.6, 3393.7999999999997, 6290.599999999999, 7057.400000000001, 2399.7999999999997, 7668, 3734.6, 5197.2, 6787.599999999999, 5026.8, 9599.2]', '2022-05-11 03:10:04', '2022-05-11 03:10:04'),
	(915, NULL, 3, '285', '[1681.5, 1681.5, 1966.5, 8222.25, 2892.75, 3405.75, 6312.75, 7082.25, 2408.25, 7695, 3747.75, 5215.5, 6811.5, 5044.5, 9633]', '2022-05-11 03:10:05', '2022-05-11 03:10:05'),
	(916, NULL, 3, '286', '[1687.4, 1687.4, 1973.4, 8251.1, 2902.9, 3417.7, 6334.9, 7107.1, 2416.7, 7722, 3760.9, 5233.8, 6835.4, 5062.2, 9666.8]', '2022-05-11 03:10:05', '2022-05-11 03:10:05'),
	(917, NULL, 3, '287', '[1693.3000000000002, 1693.3000000000002, 1980.3, 8279.95, 2913.05, 3429.6499999999996, 6357.049999999999, 7131.950000000001, 2425.1499999999996, 7749, 3774.05, 5252.1, 6859.299999999999, 5079.9, 9700.6]', '2022-05-11 03:10:05', '2022-05-11 03:10:05'),
	(918, NULL, 3, '288', '[1699.2, 1699.2, 1987.2, 8308.800000000001, 2923.2000000000003, 3441.6, 6379.2, 7156.8, 2433.6, 7776, 3787.2, 5270.400000000001, 6883.2, 5097.599999999999, 9734.4]', '2022-05-11 03:10:05', '2022-05-11 03:10:05'),
	(919, NULL, 3, '289', '[1705.1, 1705.1, 1994.1, 8337.65, 2933.35, 3453.5499999999997, 6401.349999999999, 7181.650000000001, 2442.0499999999997, 7803, 3800.35, 5288.7, 6907.099999999999, 5115.3, 9768.2]', '2022-05-11 03:10:05', '2022-05-11 03:10:05'),
	(920, NULL, 3, '290', '[1711, 1711, 2001, 8366.5, 2943.5, 3465.5, 6423.5, 7206.5, 2450.5, 7830, 3813.5, 5307, 6931, 5133, 9802]', '2022-05-11 03:10:06', '2022-05-11 03:10:06'),
	(921, NULL, 3, '291', '[1716.9, 1716.9, 2007.9, 8395.35, 2953.65, 3477.45, 6445.65, 7231.35, 2458.95, 7857, 3826.65, 5325.3, 6954.9, 5150.7, 9835.8]', '2022-05-11 03:10:06', '2022-05-11 03:10:06'),
	(922, NULL, 3, '292', '[1722.8000000000002, 1722.8000000000002, 2014.8, 8424.2, 2963.8, 3489.3999999999996, 6467.799999999999, 7256.200000000001, 2467.3999999999996, 7884, 3839.8, 5343.6, 6978.799999999999, 5168.4, 9869.6]', '2022-05-11 03:10:06', '2022-05-11 03:10:06'),
	(923, NULL, 3, '293', '[1728.7, 1728.7, 2021.7, 8453.050000000001, 2973.9500000000003, 3501.35, 6489.95, 7281.05, 2475.85, 7911, 3852.95, 5361.900000000001, 7002.7, 5186.099999999999, 9903.4]', '2022-05-11 03:10:06', '2022-05-11 03:10:06'),
	(924, NULL, 3, '294', '[1734.6, 1734.6, 2028.6, 8481.9, 2984.1, 3513.2999999999997, 6512.099999999999, 7305.900000000001, 2484.2999999999997, 7938, 3866.1, 5380.2, 7026.599999999999, 5203.8, 9937.2]', '2022-05-11 03:10:06', '2022-05-11 03:10:06'),
	(925, NULL, 3, '295', '[1740.5, 1740.5, 2035.5, 8510.75, 2994.25, 3525.25, 6534.25, 7330.75, 2492.75, 7965, 3879.25, 5398.5, 7050.5, 5221.5, 9971]', '2022-05-11 03:10:07', '2022-05-11 03:10:07'),
	(926, NULL, 3, '296', '[1746.4, 1746.4, 2042.4, 8539.6, 3004.4, 3537.2, 6556.4, 7355.6, 2501.2, 7992, 3892.4, 5416.8, 7074.4, 5239.2, 10004.8]', '2022-05-11 03:10:07', '2022-05-11 03:10:07'),
	(927, NULL, 3, '297', '[1752.3000000000002, 1752.3000000000002, 2049.3, 8568.45, 3014.55, 3549.1499999999996, 6578.549999999999, 7380.450000000001, 2509.6499999999996, 8019, 3905.55, 5435.1, 7098.299999999999, 5256.9, 10038.6]', '2022-05-11 03:10:07', '2022-05-11 03:10:07'),
	(928, NULL, 3, '298', '[1758.2, 1758.2, 2056.2000000000003, 8597.300000000001, 3024.7000000000003, 3561.1, 6600.7, 7405.3, 2518.1, 8046, 3918.7, 5453.400000000001, 7122.2, 5274.599999999999, 10072.4]', '2022-05-11 03:10:07', '2022-05-11 03:10:07'),
	(929, NULL, 3, '299', '[1764.1, 1764.1, 2063.1, 8626.15, 3034.85, 3573.0499999999997, 6622.849999999999, 7430.150000000001, 2526.5499999999997, 8073, 3931.85, 5471.7, 7146.099999999999, 5292.3, 10106.2]', '2022-05-11 03:10:07', '2022-05-11 03:10:07'),
	(930, NULL, 3, '300', '[1770, 1770, 2070, 8655, 3045, 3585, 6645, 7455, 2535, 8100, 3945, 5490, 7170, 5310, 10140]', '2022-05-11 03:10:08', '2022-05-11 03:10:08'),
	(931, NULL, 4, '24', '[1770, 1770, 2070, 8655, 3045, 3585, 6645, 7455, 2535, 8100, 3945, 5490, 7170, 5310, 10140]', '2022-06-14 16:25:54', '2022-06-14 16:25:54'),
	(932, NULL, 4, '59', '[359.90000000000003, 359.90000000000003, 420.9, 1759.85, 619.15, 728.9499999999999, 1351.15, 1515.85, 515.4499999999999, 1647, 802.15, 1116.3, 1457.9, 1079.7, 2061.7999999999997]', '2022-07-07 15:17:00', '2022-07-07 15:17:00');
/*!40000 ALTER TABLE `cargo_zones` ENABLE KEYS */;

-- Dumping structure for table kargo_com.comissions
CREATE TABLE IF NOT EXISTS `comissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `comission` int(11) DEFAULT NULL,
  `css_class` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `show_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table kargo_com.comissions: ~4 rows (approximately)
/*!40000 ALTER TABLE `comissions` DISABLE KEYS */;
INSERT INTO `comissions` (`id`, `payment`, `comission`, `css_class`, `show_name`, `image`, `created_at`, `updated_at`) VALUES
	(1, 'PayPal', 12, 'balance__cards-box--2', 'Pay Pal', 'Group (13).svg', '2022-07-25 10:28:54', '2022-07-25 10:28:54'),
	(2, 'banka_hevale', 21, 'balance__cards-box--1', 'BANKA HEVALE / EFT', 'banka_hevale.svg', NULL, '2022-07-13 05:48:46'),
	(3, 'payoneer', 15, 'balance__cards-box--3', 'PAYONEER', 'payoneer.svg', NULL, '2022-06-22 06:09:23'),
	(4, 'asdasd', 45, 'balance__cards-box--1', 'TEST', '84653631 (1).png', '2022-07-14 08:22:05', '2022-07-14 08:25:47');
/*!40000 ALTER TABLE `comissions` ENABLE KEYS */;

-- Dumping structure for table kargo_com.companies
CREATE TABLE IF NOT EXISTS `companies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `logo` varchar(40) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'estate.png',
  `phone` varchar(17) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_turkish_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `description` text COLLATE utf8_turkish_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 => admin, cargo',
  `state` int(11) NOT NULL DEFAULT '1' COMMENT '1 => active, 2 => passive, 3 => waiting',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `companies_phone_unique` (`phone`),
  UNIQUE KEY `companies_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table kargo_com.companies: ~0 rows (approximately)
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` (`id`, `title`, `logo`, `phone`, `email`, `address`, `description`, `status`, `state`, `created_at`, `updated_at`) VALUES
	(1, 'ShipLounge', 'logo.svg', '994515367952', 'info@shiplounge.com', 'Turkish address', 'New Website for Shiplounge', 1, 1, '2022-05-01 06:48:40', '2022-05-01 06:48:40');
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;

-- Dumping structure for table kargo_com.configs
CREATE TABLE IF NOT EXISTS `configs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(40) COLLATE utf8_turkish_ci DEFAULT NULL,
  `type` varchar(40) COLLATE utf8_turkish_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table kargo_com.configs: ~3 rows (approximately)
/*!40000 ALTER TABLE `configs` DISABLE KEYS */;
INSERT INTO `configs` (`id`, `key`, `type`, `value`, `created_at`, `updated_at`) VALUES
	(1, 'favicon', 'favicon', 'Shiplounge.ico', '2022-05-01 06:48:39', '2022-05-01 06:48:39'),
	(2, 'logo', 'logo', 'logo.svg', '2022-05-01 06:48:39', '2022-05-01 06:48:39'),
	(3, 'footer_logo', 'footer_logo', 'footerLogo.svg', '2022-05-01 07:05:09', '2022-05-01 07:05:09');
/*!40000 ALTER TABLE `configs` ENABLE KEYS */;

-- Dumping structure for table kargo_com.contact_services
CREATE TABLE IF NOT EXISTS `contact_services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table kargo_com.contact_services: ~0 rows (approximately)
/*!40000 ALTER TABLE `contact_services` DISABLE KEYS */;
INSERT INTO `contact_services` (`id`, `title`, `created_at`, `updated_at`) VALUES
	(1, 'Vacancies', '2022-05-01 05:45:54', '2022-05-01 05:45:54');
/*!40000 ALTER TABLE `contact_services` ENABLE KEYS */;

-- Dumping structure for table kargo_com.countries
CREATE TABLE IF NOT EXISTS `countries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=244 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table kargo_com.countries: ~243 rows (approximately)
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` (`id`, `code`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'AF', 'Afghanistan', '2022-04-21 03:28:48', '2022-04-21 03:28:48'),
	(2, 'AX', 'Åland Islands', '2022-04-21 03:28:48', '2022-04-21 03:28:48'),
	(3, 'AL', 'Albania', '2022-04-21 03:28:48', '2022-04-21 03:28:48'),
	(4, 'DZ', 'Algeria', '2022-04-21 03:28:48', '2022-04-21 03:28:48'),
	(5, 'AS', 'American Samoa', '2022-04-21 03:28:49', '2022-04-21 03:28:49'),
	(6, 'AD', 'AndorrA', '2022-04-21 03:28:49', '2022-04-21 03:28:49'),
	(7, 'AO', 'Angola', '2022-04-21 03:28:49', '2022-04-21 03:28:49'),
	(8, 'AI', 'Anguilla', '2022-04-21 03:28:49', '2022-04-21 03:28:49'),
	(9, 'AQ', 'Antarctica', '2022-04-21 03:28:49', '2022-04-21 03:28:49'),
	(10, 'AG', 'Antigua and Barbuda', '2022-04-21 03:28:49', '2022-04-21 03:28:49'),
	(11, 'AR', 'Argentina', '2022-04-21 03:28:49', '2022-04-21 03:28:49'),
	(12, 'AM', 'Armenia', '2022-04-21 03:28:49', '2022-04-21 03:28:49'),
	(13, 'AW', 'Aruba', '2022-04-21 03:28:49', '2022-04-21 03:28:49'),
	(14, 'AU', 'Australia', '2022-04-21 03:28:49', '2022-04-21 03:28:49'),
	(15, 'AT', 'Austria', '2022-04-21 03:28:49', '2022-04-21 03:28:49'),
	(16, 'AZ', 'Azerbaijan', '2022-04-21 03:28:49', '2022-04-21 03:28:49'),
	(17, 'BS', 'Bahamas', '2022-04-21 03:28:49', '2022-04-21 03:28:49'),
	(18, 'BH', 'Bahrain', '2022-04-21 03:28:49', '2022-04-21 03:28:49'),
	(19, 'BD', 'Bangladesh', '2022-04-21 03:28:49', '2022-04-21 03:28:49'),
	(20, 'BB', 'Barbados', '2022-04-21 03:28:49', '2022-04-21 03:28:49'),
	(21, 'BY', 'Belarus', '2022-04-21 03:28:49', '2022-04-21 03:28:49'),
	(22, 'BE', 'Belgium', '2022-04-21 03:28:49', '2022-04-21 03:28:49'),
	(23, 'BZ', 'Belize', '2022-04-21 03:28:49', '2022-04-21 03:28:49'),
	(24, 'BJ', 'Benin', '2022-04-21 03:28:49', '2022-04-21 03:28:49'),
	(25, 'BM', 'Bermuda', '2022-04-21 03:28:49', '2022-04-21 03:28:49'),
	(26, 'BT', 'Bhutan', '2022-04-21 03:28:49', '2022-04-21 03:28:49'),
	(27, 'BO', 'Bolivia', '2022-04-21 03:28:49', '2022-04-21 03:28:49'),
	(28, 'BA', 'Bosnia and Herzegovina', '2022-04-21 03:28:49', '2022-04-21 03:28:49'),
	(29, 'BW', 'Botswana', '2022-04-21 03:28:49', '2022-04-21 03:28:49'),
	(30, 'BV', 'Bouvet Island', '2022-04-21 03:28:49', '2022-04-21 03:28:49'),
	(31, 'BR', 'Brazil', '2022-04-21 03:28:49', '2022-04-21 03:28:49'),
	(32, 'IO', 'British Indian Ocean Territory', '2022-04-21 03:28:49', '2022-04-21 03:28:49'),
	(33, 'BN', 'Brunei Darussalam', '2022-04-21 03:28:49', '2022-04-21 03:28:49'),
	(34, 'BG', 'Bulgaria', '2022-04-21 03:28:49', '2022-04-21 03:28:49'),
	(35, 'BF', 'Burkina Faso', '2022-04-21 03:28:49', '2022-04-21 03:28:49'),
	(36, 'BI', 'Burundi', '2022-04-21 03:28:49', '2022-04-21 03:28:49'),
	(37, 'KH', 'Cambodia', '2022-04-21 03:28:49', '2022-04-21 03:28:49'),
	(38, 'CM', 'Cameroon', '2022-04-21 03:28:49', '2022-04-21 03:28:49'),
	(39, 'CA', 'Canada', '2022-04-21 03:28:49', '2022-04-21 03:28:49'),
	(40, 'CV', 'Cape Verde', '2022-04-21 03:28:50', '2022-04-21 03:28:50'),
	(41, 'KY', 'Cayman Islands', '2022-04-21 03:28:50', '2022-04-21 03:28:50'),
	(42, 'CF', 'Central African Republic', '2022-04-21 03:28:50', '2022-04-21 03:28:50'),
	(43, 'TD', 'Chad', '2022-04-21 03:28:50', '2022-04-21 03:28:50'),
	(44, 'CL', 'Chile', '2022-04-21 03:28:50', '2022-04-21 03:28:50'),
	(45, 'CN', 'China', '2022-04-21 03:28:50', '2022-04-21 03:28:50'),
	(46, 'CX', 'Christmas Island', '2022-04-21 03:28:50', '2022-04-21 03:28:50'),
	(47, 'CC', 'Cocos (Keeling) Islands', '2022-04-21 03:28:50', '2022-04-21 03:28:50'),
	(48, 'CO', 'Colombia', '2022-04-21 03:28:50', '2022-04-21 03:28:50'),
	(49, 'KM', 'Comoros', '2022-04-21 03:28:50', '2022-04-21 03:28:50'),
	(50, 'CG', 'Congo', '2022-04-21 03:28:50', '2022-04-21 03:28:50'),
	(51, 'CD', 'Congo, The Democratic Republic of the', '2022-04-21 03:28:50', '2022-04-21 03:28:50'),
	(52, 'CK', 'Cook Islands', '2022-04-21 03:28:50', '2022-04-21 03:28:50'),
	(53, 'CR', 'Costa Rica', '2022-04-21 03:28:50', '2022-04-21 03:28:50'),
	(54, 'CI', 'Cote D\'Ivoire', '2022-04-21 03:28:50', '2022-04-21 03:28:50'),
	(55, 'HR', 'Croatia', '2022-04-21 03:28:50', '2022-04-21 03:28:50'),
	(56, 'CU', 'Cuba', '2022-04-21 03:28:50', '2022-04-21 03:28:50'),
	(57, 'CY', 'Cyprus', '2022-04-21 03:28:50', '2022-04-21 03:28:50'),
	(58, 'CZ', 'Czech Republic', '2022-04-21 03:28:50', '2022-04-21 03:28:50'),
	(59, 'DK', 'Denmark', '2022-04-21 03:28:50', '2022-04-21 03:28:50'),
	(60, 'DJ', 'Djibouti', '2022-04-21 03:28:50', '2022-04-21 03:28:50'),
	(61, 'DM', 'Dominica', '2022-04-21 03:28:50', '2022-04-21 03:28:50'),
	(62, 'DO', 'Dominican Republic', '2022-04-21 03:28:50', '2022-04-21 03:28:50'),
	(63, 'EC', 'Ecuador', '2022-04-21 03:28:50', '2022-04-21 03:28:50'),
	(64, 'EG', 'Egypt', '2022-04-21 03:28:50', '2022-04-21 03:28:50'),
	(65, 'SV', 'El Salvador', '2022-04-21 03:28:50', '2022-04-21 03:28:50'),
	(66, 'GQ', 'Equatorial Guinea', '2022-04-21 03:28:50', '2022-04-21 03:28:50'),
	(67, 'ER', 'Eritrea', '2022-04-21 03:28:50', '2022-04-21 03:28:50'),
	(68, 'EE', 'Estonia', '2022-04-21 03:28:50', '2022-04-21 03:28:50'),
	(69, 'ET', 'Ethiopia', '2022-04-21 03:28:50', '2022-04-21 03:28:50'),
	(70, 'FK', 'Falkland Islands (Malvinas)', '2022-04-21 03:28:50', '2022-04-21 03:28:50'),
	(71, 'FO', 'Faroe Islands', '2022-04-21 03:28:50', '2022-04-21 03:28:50'),
	(72, 'FJ', 'Fiji', '2022-04-21 03:28:50', '2022-04-21 03:28:50'),
	(73, 'FI', 'Finland', '2022-04-21 03:28:50', '2022-04-21 03:28:50'),
	(74, 'FR', 'France', '2022-04-21 03:28:50', '2022-04-21 03:28:50'),
	(75, 'GF', 'French Guiana', '2022-04-21 03:28:50', '2022-04-21 03:28:50'),
	(76, 'PF', 'French Polynesia', '2022-04-21 03:28:50', '2022-04-21 03:28:50'),
	(77, 'TF', 'French Southern Territories', '2022-04-21 03:28:50', '2022-04-21 03:28:50'),
	(78, 'GA', 'Gabon', '2022-04-21 03:28:50', '2022-04-21 03:28:50'),
	(79, 'GM', 'Gambia', '2022-04-21 03:28:50', '2022-04-21 03:28:50'),
	(80, 'GE', 'Georgia', '2022-04-21 03:28:50', '2022-04-21 03:28:50'),
	(81, 'DE', 'Germany', '2022-04-21 03:28:51', '2022-04-21 03:28:51'),
	(82, 'GH', 'Ghana', '2022-04-21 03:28:51', '2022-04-21 03:28:51'),
	(83, 'GI', 'Gibraltar', '2022-04-21 03:28:51', '2022-04-21 03:28:51'),
	(84, 'GR', 'Greece', '2022-04-21 03:28:51', '2022-04-21 03:28:51'),
	(85, 'GL', 'Greenland', '2022-04-21 03:28:51', '2022-04-21 03:28:51'),
	(86, 'GD', 'Grenada', '2022-04-21 03:28:51', '2022-04-21 03:28:51'),
	(87, 'GP', 'Guadeloupe', '2022-04-21 03:28:51', '2022-04-21 03:28:51'),
	(88, 'GU', 'Guam', '2022-04-21 03:28:51', '2022-04-21 03:28:51'),
	(89, 'GT', 'Guatemala', '2022-04-21 03:28:51', '2022-04-21 03:28:51'),
	(90, 'GG', 'Guernsey', '2022-04-21 03:28:51', '2022-04-21 03:28:51'),
	(91, 'GN', 'Guinea', '2022-04-21 03:28:51', '2022-04-21 03:28:51'),
	(92, 'GW', 'Guinea-Bissau', '2022-04-21 03:28:51', '2022-04-21 03:28:51'),
	(93, 'GY', 'Guyana', '2022-04-21 03:28:51', '2022-04-21 03:28:51'),
	(94, 'HT', 'Haiti', '2022-04-21 03:28:51', '2022-04-21 03:28:51'),
	(95, 'HM', 'Heard Island and Mcdonald Islands', '2022-04-21 03:28:51', '2022-04-21 03:28:51'),
	(96, 'VA', 'Holy See (Vatican City State)', '2022-04-21 03:28:51', '2022-04-21 03:28:51'),
	(97, 'HN', 'Honduras', '2022-04-21 03:28:51', '2022-04-21 03:28:51'),
	(98, 'HK', 'Hong Kong', '2022-04-21 03:28:51', '2022-04-21 03:28:51'),
	(99, 'HU', 'Hungary', '2022-04-21 03:28:51', '2022-04-21 03:28:51'),
	(100, 'IS', 'Iceland', '2022-04-21 03:28:51', '2022-04-21 03:28:51'),
	(101, 'IN', 'India', '2022-04-21 03:28:51', '2022-04-21 03:28:51'),
	(102, 'ID', 'Indonesia', '2022-04-21 03:28:51', '2022-04-21 03:28:51'),
	(103, 'IR', 'Iran, Islamic Republic Of', '2022-04-21 03:28:51', '2022-04-21 03:28:51'),
	(104, 'IQ', 'Iraq', '2022-04-21 03:28:51', '2022-04-21 03:28:51'),
	(105, 'IE', 'Ireland', '2022-04-21 03:28:51', '2022-04-21 03:28:51'),
	(106, 'IM', 'Isle of Man', '2022-04-21 03:28:51', '2022-04-21 03:28:51'),
	(107, 'IL', 'Israel', '2022-04-21 03:28:51', '2022-04-21 03:28:51'),
	(108, 'IT', 'Italy', '2022-04-21 03:28:51', '2022-04-21 03:28:51'),
	(109, 'JM', 'Jamaica', '2022-04-21 03:28:51', '2022-04-21 03:28:51'),
	(110, 'JP', 'Japan', '2022-04-21 03:28:51', '2022-04-21 03:28:51'),
	(111, 'JE', 'Jersey', '2022-04-21 03:28:51', '2022-04-21 03:28:51'),
	(112, 'JO', 'Jordan', '2022-04-21 03:28:51', '2022-04-21 03:28:51'),
	(113, 'KZ', 'Kazakhstan', '2022-04-21 03:28:51', '2022-04-21 03:28:51'),
	(114, 'KE', 'Kenya', '2022-04-21 03:28:51', '2022-04-21 03:28:51'),
	(115, 'KI', 'Kiribati', '2022-04-21 03:28:51', '2022-04-21 03:28:51'),
	(116, 'KP', 'Korea, Democratic People\'S Republic of', '2022-04-21 03:28:51', '2022-04-21 03:28:51'),
	(117, 'KR', 'Korea, Republic of', '2022-04-21 03:28:51', '2022-04-21 03:28:51'),
	(118, 'KW', 'Kuwait', '2022-04-21 03:28:51', '2022-04-21 03:28:51'),
	(119, 'KG', 'Kyrgyzstan', '2022-04-21 03:28:51', '2022-04-21 03:28:51'),
	(120, 'LA', 'Lao People\'S Democratic Republic', '2022-04-21 03:28:51', '2022-04-21 03:28:51'),
	(121, 'LV', 'Latvia', '2022-04-21 03:28:51', '2022-04-21 03:28:51'),
	(122, 'LB', 'Lebanon', '2022-04-21 03:28:52', '2022-04-21 03:28:52'),
	(123, 'LS', 'Lesotho', '2022-04-21 03:28:52', '2022-04-21 03:28:52'),
	(124, 'LR', 'Liberia', '2022-04-21 03:28:52', '2022-04-21 03:28:52'),
	(125, 'LY', 'Libyan Arab Jamahiriya', '2022-04-21 03:28:52', '2022-04-21 03:28:52'),
	(126, 'LI', 'Liechtenstein', '2022-04-21 03:28:52', '2022-04-21 03:28:52'),
	(127, 'LT', 'Lithuania', '2022-04-21 03:28:52', '2022-04-21 03:28:52'),
	(128, 'LU', 'Luxembourg', '2022-04-21 03:28:52', '2022-04-21 03:28:52'),
	(129, 'MO', 'Macao', '2022-04-21 03:28:52', '2022-04-21 03:28:52'),
	(130, 'MK', 'Macedonia, The Former Yugoslav Republic of', '2022-04-21 03:28:52', '2022-04-21 03:28:52'),
	(131, 'MG', 'Madagascar', '2022-04-21 03:28:52', '2022-04-21 03:28:52'),
	(132, 'MW', 'Malawi', '2022-04-21 03:28:52', '2022-04-21 03:28:52'),
	(133, 'MY', 'Malaysia', '2022-04-21 03:28:52', '2022-04-21 03:28:52'),
	(134, 'MV', 'Maldives', '2022-04-21 03:28:52', '2022-04-21 03:28:52'),
	(135, 'ML', 'Mali', '2022-04-21 03:28:52', '2022-04-21 03:28:52'),
	(136, 'MT', 'Malta', '2022-04-21 03:28:52', '2022-04-21 03:28:52'),
	(137, 'MH', 'Marshall Islands', '2022-04-21 03:28:52', '2022-04-21 03:28:52'),
	(138, 'MQ', 'Martinique', '2022-04-21 03:28:52', '2022-04-21 03:28:52'),
	(139, 'MR', 'Mauritania', '2022-04-21 03:28:52', '2022-04-21 03:28:52'),
	(140, 'MU', 'Mauritius', '2022-04-21 03:28:52', '2022-04-21 03:28:52'),
	(141, 'YT', 'Mayotte', '2022-04-21 03:28:52', '2022-04-21 03:28:52'),
	(142, 'MX', 'Mexico', '2022-04-21 03:28:52', '2022-04-21 03:28:52'),
	(143, 'FM', 'Micronesia, Federated States of', '2022-04-21 03:28:52', '2022-04-21 03:28:52'),
	(144, 'MD', 'Moldova, Republic of', '2022-04-21 03:28:52', '2022-04-21 03:28:52'),
	(145, 'MC', 'Monaco', '2022-04-21 03:28:52', '2022-04-21 03:28:52'),
	(146, 'MN', 'Mongolia', '2022-04-21 03:28:52', '2022-04-21 03:28:52'),
	(147, 'MS', 'Montserrat', '2022-04-21 03:28:52', '2022-04-21 03:28:52'),
	(148, 'MA', 'Morocco', '2022-04-21 03:28:52', '2022-04-21 03:28:52'),
	(149, 'MZ', 'Mozambique', '2022-04-21 03:28:52', '2022-04-21 03:28:52'),
	(150, 'MM', 'Myanmar', '2022-04-21 03:28:52', '2022-04-21 03:28:52'),
	(151, 'NA', 'Namibia', '2022-04-21 03:28:52', '2022-04-21 03:28:52'),
	(152, 'NR', 'Nauru', '2022-04-21 03:28:52', '2022-04-21 03:28:52'),
	(153, 'NP', 'Nepal', '2022-04-21 03:28:52', '2022-04-21 03:28:52'),
	(154, 'NL', 'Netherlands', '2022-04-21 03:28:52', '2022-04-21 03:28:52'),
	(155, 'AN', 'Netherlands Antilles', '2022-04-21 03:28:52', '2022-04-21 03:28:52'),
	(156, 'NC', 'New Caledonia', '2022-04-21 03:28:52', '2022-04-21 03:28:52'),
	(157, 'NZ', 'New Zealand', '2022-04-21 03:28:52', '2022-04-21 03:28:52'),
	(158, 'NI', 'Nicaragua', '2022-04-21 03:28:52', '2022-04-21 03:28:52'),
	(159, 'NE', 'Niger', '2022-04-21 03:28:52', '2022-04-21 03:28:52'),
	(160, 'NG', 'Nigeria', '2022-04-21 03:28:52', '2022-04-21 03:28:52'),
	(161, 'NU', 'Niue', '2022-04-21 03:28:52', '2022-04-21 03:28:52'),
	(162, 'NF', 'Norfolk Island', '2022-04-21 03:28:52', '2022-04-21 03:28:52'),
	(163, 'MP', 'Northern Mariana Islands', '2022-04-21 03:28:52', '2022-04-21 03:28:52'),
	(164, 'NO', 'Norway', '2022-04-21 03:28:53', '2022-04-21 03:28:53'),
	(165, 'OM', 'Oman', '2022-04-21 03:28:53', '2022-04-21 03:28:53'),
	(166, 'PK', 'Pakistan', '2022-04-21 03:28:53', '2022-04-21 03:28:53'),
	(167, 'PW', 'Palau', '2022-04-21 03:28:53', '2022-04-21 03:28:53'),
	(168, 'PS', 'Palestinian Territory, Occupied', '2022-04-21 03:28:53', '2022-04-21 03:28:53'),
	(169, 'PA', 'Panama', '2022-04-21 03:28:53', '2022-04-21 03:28:53'),
	(170, 'PG', 'Papua New Guinea', '2022-04-21 03:28:53', '2022-04-21 03:28:53'),
	(171, 'PY', 'Paraguay', '2022-04-21 03:28:53', '2022-04-21 03:28:53'),
	(172, 'PE', 'Peru', '2022-04-21 03:28:53', '2022-04-21 03:28:53'),
	(173, 'PH', 'Philippines', '2022-04-21 03:28:53', '2022-04-21 03:28:53'),
	(174, 'PN', 'Pitcairn', '2022-04-21 03:28:53', '2022-04-21 03:28:53'),
	(175, 'PL', 'Poland', '2022-04-21 03:28:53', '2022-04-21 03:28:53'),
	(176, 'PT', 'Portugal', '2022-04-21 03:28:53', '2022-04-21 03:28:53'),
	(177, 'PR', 'Puerto Rico', '2022-04-21 03:28:53', '2022-04-21 03:28:53'),
	(178, 'QA', 'Qatar', '2022-04-21 03:28:53', '2022-04-21 03:28:53'),
	(179, 'RE', 'Reunion', '2022-04-21 03:28:53', '2022-04-21 03:28:53'),
	(180, 'RO', 'Romania', '2022-04-21 03:28:53', '2022-04-21 03:28:53'),
	(181, 'RU', 'Russian Federation', '2022-04-21 03:28:53', '2022-04-21 03:28:53'),
	(182, 'RW', 'RWANDA', '2022-04-21 03:28:53', '2022-04-21 03:28:53'),
	(183, 'SH', 'Saint Helena', '2022-04-21 03:28:53', '2022-04-21 03:28:53'),
	(184, 'KN', 'Saint Kitts and Nevis', '2022-04-21 03:28:53', '2022-04-21 03:28:53'),
	(185, 'LC', 'Saint Lucia', '2022-04-21 03:28:53', '2022-04-21 03:28:53'),
	(186, 'PM', 'Saint Pierre and Miquelon', '2022-04-21 03:28:53', '2022-04-21 03:28:53'),
	(187, 'VC', 'Saint Vincent and the Grenadines', '2022-04-21 03:28:53', '2022-04-21 03:28:53'),
	(188, 'WS', 'Samoa', '2022-04-21 03:28:53', '2022-04-21 03:28:53'),
	(189, 'SM', 'San Marino', '2022-04-21 03:28:53', '2022-04-21 03:28:53'),
	(190, 'ST', 'Sao Tome and Principe', '2022-04-21 03:28:53', '2022-04-21 03:28:53'),
	(191, 'SA', 'Saudi Arabia', '2022-04-21 03:28:53', '2022-04-21 03:28:53'),
	(192, 'SN', 'Senegal', '2022-04-21 03:28:53', '2022-04-21 03:28:53'),
	(193, 'CS', 'Serbia and Montenegro', '2022-04-21 03:28:53', '2022-04-21 03:28:53'),
	(194, 'SC', 'Seychelles', '2022-04-21 03:28:53', '2022-04-21 03:28:53'),
	(195, 'SL', 'Sierra Leone', '2022-04-21 03:28:53', '2022-04-21 03:28:53'),
	(196, 'SG', 'Singapore', '2022-04-21 03:28:53', '2022-04-21 03:28:53'),
	(197, 'SK', 'Slovakia', '2022-04-21 03:28:53', '2022-04-21 03:28:53'),
	(198, 'SI', 'Slovenia', '2022-04-21 03:28:53', '2022-04-21 03:28:53'),
	(199, 'SB', 'Solomon Islands', '2022-04-21 03:28:53', '2022-04-21 03:28:53'),
	(200, 'SO', 'Somalia', '2022-04-21 03:28:54', '2022-04-21 03:28:54'),
	(201, 'ZA', 'South Africa', '2022-04-21 03:28:54', '2022-04-21 03:28:54'),
	(202, 'GS', 'South Georgia and the South Sandwich Islands', '2022-04-21 03:28:54', '2022-04-21 03:28:54'),
	(203, 'ES', 'Spain', '2022-04-21 03:28:54', '2022-04-21 03:28:54'),
	(204, 'LK', 'Sri Lanka', '2022-04-21 03:28:54', '2022-04-21 03:28:54'),
	(205, 'SD', 'Sudan', '2022-04-21 03:28:54', '2022-04-21 03:28:54'),
	(206, 'SR', 'Suriname', '2022-04-21 03:28:54', '2022-04-21 03:28:54'),
	(207, 'SJ', 'Svalbard and Jan Mayen', '2022-04-21 03:28:54', '2022-04-21 03:28:54'),
	(208, 'SZ', 'Swaziland', '2022-04-21 03:28:54', '2022-04-21 03:28:54'),
	(209, 'SE', 'Sweden', '2022-04-21 03:28:54', '2022-04-21 03:28:54'),
	(210, 'CH', 'Switzerland', '2022-04-21 03:28:54', '2022-04-21 03:28:54'),
	(211, 'SY', 'Syrian Arab Republic', '2022-04-21 03:28:54', '2022-04-21 03:28:54'),
	(212, 'TW', 'Taiwan, Province of China', '2022-04-21 03:28:54', '2022-04-21 03:28:54'),
	(213, 'TJ', 'Tajikistan', '2022-04-21 03:28:54', '2022-04-21 03:28:54'),
	(214, 'TZ', 'Tanzania, United Republic of', '2022-04-21 03:28:54', '2022-04-21 03:28:54'),
	(215, 'TH', 'Thailand', '2022-04-21 03:28:54', '2022-04-21 03:28:54'),
	(216, 'TL', 'Timor-Leste', '2022-04-21 03:28:54', '2022-04-21 03:28:54'),
	(217, 'TG', 'Togo', '2022-04-21 03:28:54', '2022-04-21 03:28:54'),
	(218, 'TK', 'Tokelau', '2022-04-21 03:28:54', '2022-04-21 03:28:54'),
	(219, 'TO', 'Tonga', '2022-04-21 03:28:54', '2022-04-21 03:28:54'),
	(220, 'TT', 'Trinidad and Tobago', '2022-04-21 03:28:54', '2022-04-21 03:28:54'),
	(221, 'TN', 'Tunisia', '2022-04-21 03:28:54', '2022-04-21 03:28:54'),
	(222, 'TR', 'Turkey', '2022-04-21 03:28:54', '2022-04-21 03:28:54'),
	(223, 'TM', 'Turkmenistan', '2022-04-21 03:28:54', '2022-04-21 03:28:54'),
	(224, 'TC', 'Turks and Caicos Islands', '2022-04-21 03:28:54', '2022-04-21 03:28:54'),
	(225, 'TV', 'Tuvalu', '2022-04-21 03:28:54', '2022-04-21 03:28:54'),
	(226, 'UG', 'Uganda', '2022-04-21 03:28:54', '2022-04-21 03:28:54'),
	(227, 'UA', 'Ukraine', '2022-04-21 03:28:54', '2022-04-21 03:28:54'),
	(228, 'AE', 'United Arab Emirates', '2022-04-21 03:28:54', '2022-04-21 03:28:54'),
	(229, 'GB', 'United Kingdom', '2022-04-21 03:28:54', '2022-04-21 03:28:54'),
	(230, 'US', 'United States', '2022-04-21 03:28:54', '2022-04-21 03:28:54'),
	(231, 'UM', 'United States Minor Outlying Islands', '2022-04-21 03:28:54', '2022-04-21 03:28:54'),
	(232, 'UY', 'Uruguay', '2022-04-21 03:28:55', '2022-04-21 03:28:55'),
	(233, 'UZ', 'Uzbekistan', '2022-04-21 03:28:55', '2022-04-21 03:28:55'),
	(234, 'VU', 'Vanuatu', '2022-04-21 03:28:55', '2022-04-21 03:28:55'),
	(235, 'VE', 'Venezuela', '2022-04-21 03:28:55', '2022-04-21 03:28:55'),
	(236, 'VN', 'Viet Nam', '2022-04-21 03:28:55', '2022-04-21 03:28:55'),
	(237, 'VG', 'Virgin Islands, British', '2022-04-21 03:28:55', '2022-04-21 03:28:55'),
	(238, 'VI', 'Virgin Islands, U.S.', '2022-04-21 03:28:55', '2022-04-21 03:28:55'),
	(239, 'WF', 'Wallis and Futuna', '2022-04-21 03:28:55', '2022-04-21 03:28:55'),
	(240, 'EH', 'Western Sahara', '2022-04-21 03:28:55', '2022-04-21 03:28:55'),
	(241, 'YE', 'Yemen', '2022-04-21 03:28:55', '2022-04-21 03:28:55'),
	(242, 'ZM', 'Zambia', '2022-04-21 03:28:55', '2022-04-21 03:28:55'),
	(243, 'ZW', 'Zimbabwe', '2022-04-21 03:28:55', '2022-04-21 03:28:55');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;

-- Dumping structure for table kargo_com.courier_requests
CREATE TABLE IF NOT EXISTS `courier_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `courier_id` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `orders` json DEFAULT NULL,
  `customer_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `zipcode` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table kargo_com.courier_requests: ~10 rows (approximately)
/*!40000 ALTER TABLE `courier_requests` DISABLE KEYS */;
INSERT INTO `courier_requests` (`id`, `user_id`, `courier_id`, `status`, `comment`, `orders`, `customer_name`, `phone`, `city`, `country`, `address`, `zipcode`, `note`, `date`) VALUES
	(1, 14, 2, 'accepted', 'asdasd', '["M51651626", "M81079666", "M29665850"]', 'senan', '0515838095', 'Baku', 'Algeria', 'Mehmandarov 72', 'AZ1149', 'asd12easd', '2022-06-30'),
	(2, 14, 4, 'done', 'asdasd', '["M87509090", "1562c53bcbc54df"]', 'Someone', '22355523', 'Xirdalan', 'Bangladesh', 'saasdasdadas', 'Asd23f', 'asdasd3easdas', '2022-07-07'),
	(3, 14, 4, 'cancelled', 'sdasdas', '["M29665850", "1562a83e5d1d8bb", "1562aacb423d3de"]', 'Senan', '11245533', 'Baku', 'Azerbaijan', 'asdqq1d asd31d sqd', 'AsAS@ss134', 'asdasd sdadwq asdqwwsc', '2022-07-08'),
	(4, 14, NULL, 'cancelled', 'assaddsdadas', 'null', 'senan', '0515838095', 'Baku', 'Christmas Island', 'Mehmandarov 72', 'AZ1149', 'ffgf2323f adas', '2022-07-31'),
	(5, 14, NULL, 'pending', NULL, 'null', 'senan', '0515838095', 'Baku', 'Åland Islands', 'Mehmandarov 72', 'AZ1149', '12312312', '2000-02-11'),
	(6, 4, 3, 'pending', NULL, '["M16810153"]', 'Dangelo Marcelo', '1112466', 'Bahad', 'Bahamas', 'Sothere Tirana 37 street', 'TRSB1124', 'just testing', '2022-07-19'),
	(7, 4, NULL, 'pending', 'asdasdas', '["M16810153"]', 'asdasd', '12312', 'asd', 'Bangladesh', 'asd', 'asd', 'asd', '2022-07-05'),
	(8, 4, NULL, 'pending', 'ssasaddsa', '["M16810153"]', 'asdasdas', '112333', 'asdasd', 'Czech Republic', 'asdasd', 'asdasd', 'asdasd', '2022-07-02'),
	(9, 14, NULL, 'pending', NULL, '["1562bab3190ef4f"]', '1562bab3190ef4f', '111111', '1562bab3190ef4f', 'Bahrain', '1562bab3190ef4f', '1562bab3190ef4f', '1562bab3190ef4f', '2022-07-12'),
	(10, 14, NULL, 'done', NULL, '["M87509090"]', 'M87509090', '123123', 'M87509090', 'Bahamas', 'M87509090', 'M87509090', 'M87509090', '2022-06-30');
/*!40000 ALTER TABLE `courier_requests` ENABLE KEYS */;

-- Dumping structure for table kargo_com.credit_cards
CREATE TABLE IF NOT EXISTS `credit_cards` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `cardnumber` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `expired` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `cvv` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `holder` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table kargo_com.credit_cards: ~0 rows (approximately)
/*!40000 ALTER TABLE `credit_cards` DISABLE KEYS */;
INSERT INTO `credit_cards` (`id`, `userID`, `cardnumber`, `expired`, `cvv`, `holder`, `created_at`, `updated_at`) VALUES
	(1, 2, '1254 8568 5825 1882', '18/25', '152', 'Eldora Zemlak', '2022-05-15 14:58:52', '2022-05-15 14:58:52');
/*!40000 ALTER TABLE `credit_cards` ENABLE KEYS */;

-- Dumping structure for table kargo_com.currencies
CREATE TABLE IF NOT EXISTS `currencies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `currency_code` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `currency_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=165 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table kargo_com.currencies: ~164 rows (approximately)
/*!40000 ALTER TABLE `currencies` DISABLE KEYS */;
INSERT INTO `currencies` (`id`, `currency_code`, `currency_name`) VALUES
	(1, 'AFA', 'AFA - Afghan Afghani'),
	(2, 'ALL', 'ALL - Albanian Lek'),
	(3, 'DZD', 'DZD - Algerian Dinar'),
	(4, 'AOA', 'AOA - Angolan Kwanza'),
	(5, 'ARS', 'ARS - Argentine Peso'),
	(6, 'AMD', 'AMD - Armenian Dram'),
	(7, 'AWG', 'AWG - Aruban Florin'),
	(8, 'AUD', 'AUD - Australian Dollar'),
	(9, 'AZN', 'AZN - Azerbaijani Manat'),
	(10, 'BSD', 'BSD - Bahamian Dollar'),
	(11, 'BHD', 'BHD - Bahraini Dinar'),
	(12, 'BDT', 'BDT - Bangladeshi Taka'),
	(13, 'BBD', 'BBD - Barbadian Dollar'),
	(14, 'BYR', 'BYR - Belarusian Ruble'),
	(15, 'BEF', 'BEF - Belgian Franc'),
	(16, 'BZD', 'BZD - Belize Dollar'),
	(17, 'BMD', 'BMD - Bermudan Dollar'),
	(18, 'BTN', 'BTN - Bhutanese Ngultrum'),
	(19, 'BTC', 'BTC - Bitcoin'),
	(20, 'BOB', 'BOB - Bolivian Boliviano'),
	(21, 'BAM', 'BAM - Bosnia-Herzegovina Convertible Mark'),
	(22, 'BWP', 'BWP - Botswanan Pula'),
	(23, 'BRL', 'BRL - Brazilian Real'),
	(24, 'GBP', 'GBP - British Pound Sterling'),
	(25, 'BND', 'BND - Brunei Dollar'),
	(26, 'BGN', 'BGN - Bulgarian Lev'),
	(27, 'BIF', 'BIF - Burundian Franc'),
	(28, 'KHR', 'KHR - Cambodian Riel'),
	(29, 'CAD', 'CAD - Canadian Dollar'),
	(30, 'CVE', 'CVE - Cape Verdean Escudo'),
	(31, 'KYD', 'KYD - Cayman Islands Dollar'),
	(32, 'XOF', 'XOF - CFA Franc BCEAO'),
	(33, 'XAF', 'XAF - CFA Franc BEAC'),
	(34, 'XPF', 'XPF - CFP Franc'),
	(35, 'CLP', 'CLP - Chilean Peso'),
	(36, 'CNY', 'CNY - Chinese Yuan'),
	(37, 'COP', 'COP - Colombian Peso'),
	(38, 'KMF', 'KMF - Comorian Franc'),
	(39, 'CDF', 'CDF - Congolese Franc'),
	(40, 'CRC', 'CRC - Costa Rican ColÃ³n'),
	(41, 'HRK', 'HRK - Croatian Kuna'),
	(42, 'CUC', 'CUC - Cuban Convertible Peso'),
	(43, 'CZK', 'CZK - Czech Republic Koruna'),
	(44, 'DKK', 'DKK - Danish Krone'),
	(45, 'DJF', 'DJF - Djiboutian Franc'),
	(46, 'DOP', 'DOP - Dominican Peso'),
	(47, 'XCD', 'XCD - East Caribbean Dollar'),
	(48, 'EGP', 'EGP - Egyptian Pound'),
	(49, 'ERN', 'ERN - Eritrean Nakfa'),
	(50, 'EEK', 'EEK - Estonian Kroon'),
	(51, 'ETB', 'ETB - Ethiopian Birr'),
	(52, 'EUR', 'EUR - Euro'),
	(53, 'FKP', 'FKP - Falkland Islands Pound'),
	(54, 'FJD', 'FJD - Fijian Dollar'),
	(55, 'GMD', 'GMD - Gambian Dalasi'),
	(56, 'GEL', 'GEL - Georgian Lari'),
	(57, 'DEM', 'DEM - German Mark'),
	(58, 'GHS', 'GHS - Ghanaian Cedi'),
	(59, 'GIP', 'GIP - Gibraltar Pound'),
	(60, 'GRD', 'GRD - Greek Drachma'),
	(61, 'GTQ', 'GTQ - Guatemalan Quetzal'),
	(62, 'GNF', 'GNF - Guinean Franc'),
	(63, 'GYD', 'GYD - Guyanaese Dollar'),
	(64, 'HTG', 'HTG - Haitian Gourde'),
	(65, 'HNL', 'HNL - Honduran Lempira'),
	(66, 'HKD', 'HKD - Hong Kong Dollar'),
	(67, 'HUF', 'HUF - Hungarian Forint'),
	(68, 'ISK', 'ISK - Icelandic KrÃ³na'),
	(69, 'INR', 'INR - Indian Rupee'),
	(70, 'IDR', 'IDR - Indonesian Rupiah'),
	(71, 'IRR', 'IRR - Iranian Rial'),
	(72, 'IQD', 'IQD - Iraqi Dinar'),
	(73, 'ILS', 'ILS - Israeli New Sheqel'),
	(74, 'ITL', 'ITL - Italian Lira'),
	(75, 'JMD', 'JMD - Jamaican Dollar'),
	(76, 'JPY', 'JPY - Japanese Yen'),
	(77, 'JOD', 'JOD - Jordanian Dinar'),
	(78, 'KZT', 'KZT - Kazakhstani Tenge'),
	(79, 'KES', 'KES - Kenyan Shilling'),
	(80, 'KWD', 'KWD - Kuwaiti Dinar'),
	(81, 'KGS', 'KGS - Kyrgystani Som'),
	(82, 'LAK', 'LAK - Laotian Kip'),
	(83, 'LVL', 'LVL - Latvian Lats'),
	(84, 'LBP', 'LBP - Lebanese Pound'),
	(85, 'LSL', 'LSL - Lesotho Loti'),
	(86, 'LRD', 'LRD - Liberian Dollar'),
	(87, 'LYD', 'LYD - Libyan Dinar'),
	(88, 'LTL', 'LTL - Lithuanian Litas'),
	(89, 'MOP', 'MOP - Macanese Pataca'),
	(90, 'MKD', 'MKD - Macedonian Denar'),
	(91, 'MGA', 'MGA - Malagasy Ariary'),
	(92, 'MWK', 'MWK - Malawian Kwacha'),
	(93, 'MYR', 'MYR - Malaysian Ringgit'),
	(94, 'MVR', 'MVR - Maldivian Rufiyaa'),
	(95, 'MRO', 'MRO - Mauritanian Ouguiya'),
	(96, 'MUR', 'MUR - Mauritian Rupee'),
	(97, 'MXN', 'MXN - Mexican Peso'),
	(98, 'MDL', 'MDL - Moldovan Leu'),
	(99, 'MNT', 'MNT - Mongolian Tugrik'),
	(100, 'MAD', 'MAD - Moroccan Dirham'),
	(101, 'MZM', 'MZM - Mozambican Metical'),
	(102, 'MMK', 'MMK - Myanmar Kyat'),
	(103, 'NAD', 'NAD - Namibian Dollar'),
	(104, 'NPR', 'NPR - Nepalese Rupee'),
	(105, 'ANG', 'ANG - Netherlands Antillean Guilder'),
	(106, 'TWD', 'TWD - New Taiwan Dollar'),
	(107, 'NZD', 'NZD - New Zealand Dollar'),
	(108, 'NIO', 'NIO - Nicaraguan CÃ³rdoba'),
	(109, 'NGN', 'NGN - Nigerian Naira'),
	(110, 'KPW', 'KPW - North Korean Won'),
	(111, 'NOK', 'NOK - Norwegian Krone'),
	(112, 'OMR', 'OMR - Omani Rial'),
	(113, 'PKR', 'PKR - Pakistani Rupee'),
	(114, 'PAB', 'PAB - Panamanian Balboa'),
	(115, 'PGK', 'PGK - Papua New Guinean Kina'),
	(116, 'PYG', 'PYG - Paraguayan Guarani'),
	(117, 'PEN', 'PEN - Peruvian Nuevo Sol'),
	(118, 'PHP', 'PHP - Philippine Peso'),
	(119, 'PLN', 'PLN - Polish Zloty'),
	(120, 'QAR', 'QAR - Qatari Rial'),
	(121, 'RON', 'RON - Romanian Leu'),
	(122, 'RUB', 'RUB - Russian Ruble'),
	(123, 'RWF', 'RWF - Rwandan Franc'),
	(124, 'SVC', 'SVC - Salvadoran ColÃ³n'),
	(125, 'WST', 'WST - Samoan Tala'),
	(126, 'SAR', 'SAR - Saudi Riyal'),
	(127, 'RSD', 'RSD - Serbian Dinar'),
	(128, 'SCR', 'SCR - Seychellois Rupee'),
	(129, 'SLL', 'SLL - Sierra Leonean Leone'),
	(130, 'SGD', 'SGD - Singapore Dollar'),
	(131, 'SKK', 'SKK - Slovak Koruna'),
	(132, 'SBD', 'SBD - Solomon Islands Dollar'),
	(133, 'SOS', 'SOS - Somali Shilling'),
	(134, 'ZAR', 'ZAR - South African Rand'),
	(135, 'KRW', 'KRW - South Korean Won'),
	(136, 'XDR', 'XDR - Special Drawing Rights'),
	(137, 'LKR', 'LKR - Sri Lankan Rupee'),
	(138, 'SHP', 'SHP - St. Helena Pound'),
	(139, 'SDG', 'SDG - Sudanese Pound'),
	(140, 'SRD', 'SRD - Surinamese Dollar'),
	(141, 'SZL', 'SZL - Swazi Lilangeni'),
	(142, 'SEK', 'SEK - Swedish Krona'),
	(143, 'CHF', 'CHF - Swiss Franc'),
	(144, 'SYP', 'SYP - Syrian Pound'),
	(145, 'STD', 'STD - São Tomé and Príncipe Dobra'),
	(146, 'TJS', 'TJS - Tajikistani Somoni'),
	(147, 'TZS', 'TZS - Tanzanian Shilling'),
	(148, 'THB', 'THB - Thai Baht'),
	(149, 'TOP', 'TOP - Tongan pa\'anga'),
	(150, 'TTD', 'TTD - Trinidad & Tobago Dollar'),
	(151, 'TND', 'TND - Tunisian Dinar'),
	(152, 'TRY', 'TRY - Turkish Lira'),
	(153, 'TMT', 'TMT - Turkmenistani Manat'),
	(154, 'UGX', 'UGX - Ugandan Shilling'),
	(155, 'UAH', 'UAH - Ukrainian Hryvnia'),
	(156, 'AED', 'AED - United Arab Emirates Dirham'),
	(157, 'UYU', 'UYU - Uruguayan Peso'),
	(158, 'USD', 'USD - US Dollar'),
	(159, 'UZS', 'UZS - Uzbekistan Som'),
	(160, 'VUV', 'VUV - Vanuatu Vatu'),
	(161, 'VEF', 'VEF - Venezuelan BolÃ­var'),
	(162, 'VND', 'VND - Vietnamese Dong'),
	(163, 'YER', 'YER - Yemeni Rial'),
	(164, 'ZMK', 'ZMK - Zambian Kwacha');
/*!40000 ALTER TABLE `currencies` ENABLE KEYS */;

-- Dumping structure for table kargo_com.domestic_companies
CREATE TABLE IF NOT EXISTS `domestic_companies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `customer_code` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table kargo_com.domestic_companies: ~2 rows (approximately)
/*!40000 ALTER TABLE `domestic_companies` DISABLE KEYS */;
INSERT INTO `domestic_companies` (`id`, `name`, `slug`, `logo`, `customer_code`, `created_at`, `updated_at`) VALUES
	(1, 'YURTİÇİ KARGO', 'yurtici-kargo', '1652256528.jpg', '775054862', '2022-05-11 08:08:48', '2022-05-11 08:08:48'),
	(2, 'UPS', 'ups', '1652256779.png', '0793R7', '2022-05-11 08:12:59', '2022-05-11 11:48:27');
/*!40000 ALTER TABLE `domestic_companies` ENABLE KEYS */;

-- Dumping structure for table kargo_com.employees
CREATE TABLE IF NOT EXISTS `employees` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `ip` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employees_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table kargo_com.employees: ~0 rows (approximately)
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` (`id`, `name`, `image`, `email`, `email_verified_at`, `password`, `ip`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'administrator', NULL, 'admin@cargo.com', NULL, '$2y$10$rxIe37dkIVuiTFPLiSzGPu0pywnfxBJ0IZzRnVy3.Wbh8ODOwyOhm', NULL, NULL, NULL, '2022-04-19 15:01:13', '2022-04-19 15:01:13');
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;

-- Dumping structure for table kargo_com.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `connection` text COLLATE utf8_turkish_ci NOT NULL,
  `queue` text COLLATE utf8_turkish_ci NOT NULL,
  `payload` longtext COLLATE utf8_turkish_ci NOT NULL,
  `exception` longtext COLLATE utf8_turkish_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table kargo_com.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table kargo_com.faqs
CREATE TABLE IF NOT EXISTS `faqs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `categoryID` bigint(20) unsigned NOT NULL,
  `question` text COLLATE utf8_turkish_ci NOT NULL,
  `answer` text COLLATE utf8_turkish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `faqs_categoryid_foreign` (`categoryID`),
  CONSTRAINT `faqs_categoryid_foreign` FOREIGN KEY (`categoryID`) REFERENCES `faqs_categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table kargo_com.faqs: ~3 rows (approximately)
/*!40000 ALTER TABLE `faqs` DISABLE KEYS */;
INSERT INTO `faqs` (`id`, `categoryID`, `question`, `answer`, `created_at`, `updated_at`) VALUES
	(8, 8, 'Yurt Dışı Gönderiminde Hacimsel Ağırlık (Desi) Nasıl Hesaplanır?', 'Yayınlanma : 21 Nisan 2021\r\nHacimsel ağırlık (Desi), yurt dışına kargo gönderenler için önemli bir ölçü birimidir. Kargo bedelinin hesaplanmasında kullanılır.\r\n\r\nBu hesaplamada, yük ağırlığı önemli olduğu kadar hacimsel ağırlık da fazlasıyla önemlidir. Örneğin; Türkiye’den ABD’ye gidecek numune gönderiminiz için kargo ücretinizin ne kadar tutacağını merak ediyorsunuz. Öncelikli olarak desi hesaplama formülünü kullanarak ürünün ölçümü yapılmalıdır. Böylelikle ürünün kapladığı alanın ne kadar olduğu belirlenecektir. Akabinde ürünün gerçek ağırlığı (kg) ölçülüp, hangisi daha yüksekse fiyatlandırma ona göre yapılacaktır.\r\n\r\nBuna bağlı olarak şunları söyleyebiliriz ki:\r\nÜrün ölçümleri doğru bir fiyatlandırma için büyük bir önem arz etmekte. Aksi takdirde kolinin; yanlış ölçülmüş boyutları, yanlış tartılmış kg’ı göndericiye de yanlış bir fiyatlandırma ile geri dönecektir.\r\nÜrün gereğinden fazla büyüklükte paketlenirse, ebatları yine çok fazla çıkacak dolayısıyla hacimsel ağırlık da fazla olacaktır. Gereksiz fiyatlardan kaçınmak için bu konuya da dikkat edilmelidir.\r\nPeki, bahsedilen “Hacimsel Ağırlık” Formülü Nedir?\r\n\r\nEN x BOY x YÜKSEKLİK/HACİMSEL BÖLEN (5000)\r\n\r\nÖrnek olarak, Türkiye’den ABD’ye gidecek numune gönderilerinizden bahsetmiştik. Detayları ise;\r\nKg: 10\r\nEbat: 20*35*55 olsun.\r\nVerilen ürün detayları desi hesaplama formülüne uyarlanırsa:\r\n20x35x55 / 5000 = 7,7\r\nSonucu elde edilir.\r\nFiyatlandırma aşamasında yüksek çıkan ağırlığın baz alınacağını belirtmiştik.\r\nGerçek ağırlık 10 kg iken hacimsel ağırlık 7,7’dir. Böylelikle esas alınan değer de 10 kg olacaktır.\r\nDiğer bir örnek ise;\r\nKg: 18\r\nEbat: 70*70*35\r\nVerilen ürün detayları desi hesaplama formülüne uyarlanırsa:\r\n70x70x35 /5000 = 34,3\r\nSonucu elde edilir.\r\nGerçek ağırlık 18kg iken hacimsel ağırlık 34,3’dür. Böylelikle esas alınan değer de 34,3 desi olacaktır.\r\n\r\nSizde yurt dışına göndermek istediğiniz ürünlerin net ölçüleri ile SHIPLOUNGE dan en avantajlı fiyatları elde edebilirsiniz. trkargom.com adresi üzerinden “Hemen Teklif Al” butonunu kullanarak 230 ülkeye anında taşıma teklifi alabilirsiniz.\r\n\r\nSHIPLOUNGE  ekibi tüm kargo sürecinizde size destek olmak için hazır!', '2022-05-02 12:20:02', '2022-05-11 09:11:14'),
	(9, 9, 'TEST', 'TEST', '2022-05-11 09:13:24', '2022-05-11 09:13:24'),
	(10, 10, 'TEST', 'TEST', '2022-05-11 09:14:08', '2022-05-11 09:14:08');
/*!40000 ALTER TABLE `faqs` ENABLE KEYS */;

-- Dumping structure for table kargo_com.faqs_categories
CREATE TABLE IF NOT EXISTS `faqs_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table kargo_com.faqs_categories: ~3 rows (approximately)
/*!40000 ALTER TABLE `faqs_categories` DISABLE KEYS */;
INSERT INTO `faqs_categories` (`id`, `title`, `created_at`, `updated_at`) VALUES
	(8, 'KARGO PAKET', '2022-05-02 12:19:10', '2022-05-11 09:12:26'),
	(9, 'CARGO TRACK', '2022-05-11 09:13:01', '2022-05-11 09:13:01'),
	(10, 'COMMENT', '2022-05-11 09:13:54', '2022-05-11 09:13:54');
/*!40000 ALTER TABLE `faqs_categories` ENABLE KEYS */;

-- Dumping structure for table kargo_com.messages
CREATE TABLE IF NOT EXISTS `messages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `service` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `message` text COLLATE utf8_turkish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1 => unread, 2 => read',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table kargo_com.messages: ~8 rows (approximately)
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` (`id`, `name`, `email`, `phone`, `service`, `subject`, `message`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Tyrell Tillman', 'lauryn07@example.net', '(878) 700-8350', 'Quo fugit quasi id velit facilis voluptates dolor laborum dolores labore excepturi expedita excepturi natus dolorem velit voluptates dolores debitis ut ut illo provident ducimus est aut.', 'Totam ipsam et quas.', 'Vel provident unde eos dignissimos. Pariatur et velit at qui omnis eius voluptatibus. Omnis aut impedit voluptate fuga iste nemo. Sapiente impedit sit recusandae repudiandae.', 2, '2022-04-15 14:58:49', '2022-05-10 01:38:30'),
	(3, 'Brady Weissnat', 'koconnell@example.net', '+1-934-297-9306', 'Iste iure ut pariatur repellendus sit non quae consequuntur magnam ipsa nemo et fugiat sed necessitatibus sed quasi laudantium saepe.', 'Eum optio nihil.', 'Laborum error eligendi unde qui voluptatem ea. Illum dicta voluptatibus omnis voluptatum tempore consequatur facilis aspernatur.', 2, '2022-04-18 14:58:10', '2022-04-19 15:17:42'),
	(4, 'Dora Erdman IV', 'orn.patience@example.org', '815.358.2027', 'Voluptas nostrum qui excepturi magnam dicta placeat laboriosam sapiente voluptas nisi porro quisquam et molestiae explicabo distinctio laboriosam temporibus sit et est illo.', 'Totam animi sunt et.', 'Quae voluptatem quis eos provident rerum cum dolorum. Et officiis eos velit. Id fuga provident et quia. Minima a exercitationem qui voluptates facilis mollitia illum et.', 2, '2022-04-17 11:55:02', '2022-05-06 19:47:04'),
	(5, 'Dandre Gaylord', 'hayes.lucie@example.com', '586.706.3364', 'Corrupti et veritatis dicta tempora dolores maiores enim enim ipsum quia sint fugit explicabo consequatur tempore beatae.', 'Quod aut eum.', 'Et asperiores optio et aut itaque quia explicabo. Temporibus quidem possimus ipsa aut assumenda. Nobis incidunt impedit voluptatem doloribus ullam quo. Et hic cumque qui qui ut sunt.', 2, '2022-04-15 09:31:59', '2022-04-19 15:01:15'),
	(6, 'Joanne Zieme', 'rippin.arden@example.com', '646-219-2589', 'Quod nesciunt corporis sit nihil nisi enim facere ut sed omnis architecto reiciendis non et ut sapiente quia est est ducimus et voluptatem excepturi distinctio iste at rerum.', 'Sunt animi porro.', 'Aut quod non laborum molestiae eius blanditiis minus. Voluptas qui nisi minima temporibus a expedita quia. Qui ea facere quas ad debitis qui. Possimus quos quam repellendus velit perspiciatis unde.', 2, '2022-04-18 23:38:05', '2022-04-19 15:14:01'),
	(8, 'Dr. Tyrique Watsica', 'qauer@example.org', '1-971-909-1651', 'Alias rem nisi sit in possimus voluptas voluptatem fugiat velit possimus esse eos expedita atque similique eveniet autem distinctio et deserunt modi qui.', 'Rerum eligendi.', 'Repellat et laborum nesciunt. In consequatur nulla laboriosam quia. Iste adipisci commodi suscipit laboriosam ipsum. Dolorum voluptatem aut eum qui blanditiis voluptatibus aut.', 2, '2022-04-15 11:54:17', '2022-04-19 15:01:15'),
	(9, 'Edythe Bashirian', 'hodkiewicz.samantha@example.net', '+14636479332', 'Dolor deserunt facilis ipsa ullam ratione nulla quo atque assumenda eos doloribus optio dolor odio animi corrupti qui ullam aut aut omnis.', 'Animi voluptates.', 'Voluptatem ea at rerum eveniet laudantium esse fugiat odit. Qui voluptatem ipsam debitis sunt. Rerum non qui iure omnis dignissimos impedit architecto. Tempore rerum voluptas et dolores.', 2, '2022-04-17 17:55:19', '2022-04-19 15:01:15'),
	(11, 'Rashad Rashad', 'rashad@mail.ru', '0558215673', '1', 'vacancies', 'your message is vacancies', 2, '2022-05-01 02:20:11', '2022-05-06 10:12:53');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;

-- Dumping structure for table kargo_com.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table kargo_com.model_has_permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;

-- Dumping structure for table kargo_com.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table kargo_com.model_has_roles: ~0 rows (approximately)
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;

-- Dumping structure for table kargo_com.money_back_requests
CREATE TABLE IF NOT EXISTS `money_back_requests` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) DEFAULT NULL,
  `user` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `Iban` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table kargo_com.money_back_requests: ~4 rows (approximately)
/*!40000 ALTER TABLE `money_back_requests` DISABLE KEYS */;
INSERT INTO `money_back_requests` (`ID`, `user_id`, `user`, `Iban`, `created_at`, `updated_at`) VALUES
	(1, 14, 'Senan', '1244145125213', '2022-06-22 11:21:36', '2022-06-22 11:21:36'),
	(2, 14, 'Qulamov', 'q1231234fs', '2022-06-22 11:22:40', '2022-06-22 11:22:40'),
	(3, 14, 'asdsadas', 'asdasdas', '2022-06-22 11:24:55', '2022-06-22 11:24:55'),
	(4, 14, 'asdsadas', 'asdasdas', '2022-06-22 11:25:39', '2022-06-22 11:25:39'),
	(5, 14, 'asdasdasd', '3123123', '2022-06-22 12:11:02', '2022-06-22 12:11:02');
/*!40000 ALTER TABLE `money_back_requests` ENABLE KEYS */;

-- Dumping structure for table kargo_com.notifications
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT 'unknown',
  `message` json DEFAULT NULL,
  `status` int(50) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table kargo_com.notifications: ~3 rows (approximately)
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` (`id`, `name`, `message`, `status`, `created_at`, `updated_at`) VALUES
	(3, 'First Notification', '"<h1 style=\\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\\"><u>First Notification</u></h1><h4 style=\\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\\">This is just test note</h4><p><br></p><h6 class=\\"\\" style=\\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\\">asdasdasd</h6><p>asd</p><p>asd</p><p>asdsad</p>"', 1, '2022-07-20 08:06:22', '2022-07-25 10:34:42'),
	(4, 'Second Notification', '"<p><span style=\\"background-color: rgb(255, 255, 0);\\"><font color=\\"#00ffff\\">asdasdasd</font></span></p><p><span style=\\"background-color: rgb(255, 255, 0);\\"><font color=\\"#00ffff\\">asdasdasdasdasdasdasds</font></span></p>"', 1, '2022-07-20 08:28:16', '2022-07-28 06:01:23'),
	(5, 'Third Note', '"<h1 class=\\"\\"><b><u>Salam</u></b></h1><p><img src=\\"data:image/png;base64,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\\" style=\\"width: 191px;\\" data-filename=\\"download.png\\"></p>"', 1, '2022-07-20 08:29:59', '2022-07-25 10:34:47');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;

-- Dumping structure for table kargo_com.order_times
CREATE TABLE IF NOT EXISTS `order_times` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cargo_id` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `action` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table kargo_com.order_times: ~18 rows (approximately)
/*!40000 ALTER TABLE `order_times` DISABLE KEYS */;
INSERT INTO `order_times` (`id`, `cargo_id`, `user_id`, `action`, `time`) VALUES
	(8, 'M24400637', NULL, 'Facility scan', '2022-07-25 12:13:29'),
	(9, 'M24400637', NULL, 'Measurement scan', '2022-07-25 12:16:44'),
	(10, 'M24400637', NULL, 'Worker scan', '2022-07-25 12:17:04'),
	(11, 'M24400637', NULL, 'Measurement scan', '2022-07-26 05:43:07'),
	(12, 'M24400637', NULL, 'Measurement scan', '2022-07-26 05:43:33'),
	(13, 'M24400637', NULL, 'Facility scan', '2022-07-26 05:47:23'),
	(14, 'M16810153', NULL, 'Worker scan', '2022-07-28 12:04:42'),
	(15, 'M16810153', NULL, 'Worker scan', '2022-07-28 12:16:23'),
	(16, 'M51651626', NULL, 'Worker scan', '2022-07-28 12:44:01'),
	(17, '1562bab3190ef4f', NULL, 'Worker scan', '2022-07-28 12:45:55'),
	(18, '1562bab3190ef4f', NULL, 'Worker scan', '2022-07-28 12:48:05'),
	(19, '1562bab3190ef4f', NULL, 'Worker scan', '2022-07-28 12:49:27'),
	(20, 'M87509090', NULL, 'Worker scan', '2022-07-28 12:51:27'),
	(21, 'M87509090', NULL, 'Worker scan', '2022-07-28 12:51:58'),
	(22, 'M87509090', NULL, 'Worker scan', '2022-07-28 12:59:30'),
	(23, 'M87509090', NULL, 'Worker scan', '2022-07-28 13:05:36'),
	(24, '1562c53bcbc54df', NULL, 'Worker scan', '2022-07-28 13:06:17'),
	(25, '1562c53bcbc54df', NULL, 'Worker scan', '2022-07-28 13:06:36'),
	(26, '1562c53bcbc54df', '14', 'Facility scan', '2022-07-28 13:19:34'),
	(27, 'M51651626', '14', 'Courier request denied', '2022-07-28 13:27:11'),
	(28, 'M81079666', '14', 'Courier request denied', '2022-07-28 13:27:11'),
	(29, 'M29665850', '14', 'Courier request denied', '2022-07-28 13:27:11'),
	(30, 'M51651626', '14', 'Courier request accepted', '2022-07-28 13:27:25'),
	(31, 'M81079666', '14', 'Courier request accepted', '2022-07-28 13:27:25'),
	(32, 'M29665850', '14', 'Courier request accepted', '2022-07-28 13:27:25'),
	(33, 'M87509090', '14', 'Cargo Request updated', '2022-07-28 13:29:58'),
	(34, 'M87509090', '14', 'Cargo Request cancelled', '2022-07-28 13:31:41'),
	(35, 'M87509090', '14', 'Cargo Request reverted', '2022-07-28 13:31:48'),
	(36, 'M51651626', '14', 'Cargo Request paused', '2022-07-28 13:32:16'),
	(37, 'M51651626', '14', 'Cargo Request pause removed', '2022-07-28 13:32:28'),
	(38, 'M87509090', '14', 'Cargo Request updated', '2022-07-28 13:33:10'),
	(39, 'M81079666', '14', 'Cargo Request updated', '2022-07-28 13:34:15'),
	(40, 'M81079666', '14', 'Cargo Request updated', '2022-07-28 13:34:22');
/*!40000 ALTER TABLE `order_times` ENABLE KEYS */;

-- Dumping structure for table kargo_com.packages
CREATE TABLE IF NOT EXISTS `packages` (
  `id` varchar(50) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'AUTO_INCREMENT',
  `cargo_id` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `package_count` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `package_type` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `package_length` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `package_width` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `package_height` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `package_weight` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `n_package_length` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `n_package_width` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `n_package_height` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `n_package_weight` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `barcode` text COLLATE utf8_turkish_ci,
  `products` json DEFAULT NULL COMMENT '0 => waiting, 1 => stock',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table kargo_com.packages: ~46 rows (approximately)
/*!40000 ALTER TABLE `packages` DISABLE KEYS */;
INSERT INTO `packages` (`id`, `cargo_id`, `status`, `package_count`, `package_type`, `package_length`, `package_width`, `package_height`, `package_weight`, `n_package_length`, `n_package_width`, `n_package_height`, `n_package_weight`, `barcode`, `products`, `created_at`, `updated_at`) VALUES
	('11097978', '1562c3d4fc764cc', 3, '2', 'box', '3', '3', '3', '3', '3', '3', '3', '7', 'data:image/png;base64,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', NULL, '2022-07-05 06:06:52', '2022-07-05 08:10:39'),
	('11912353', '1562beadcc35b27', 1, '2', 'box', '2', '2', '2', '2', NULL, NULL, NULL, NULL, 'data:image/png;base64,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', NULL, '2022-07-01 08:18:20', '2022-07-18 07:55:02'),
	('14851248', '1562c551cc07ead', 0, '3', 'envelop', '3', '3', '3', '3', NULL, NULL, NULL, NULL, 'data:image/png;base64,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', NULL, '2022-07-06 09:11:40', '2022-07-06 09:11:40'),
	('1d6lopkfl', '1562ab143344ac6', 2, '2', 'box', '3', '2', '2', '2', NULL, NULL, NULL, NULL, 'data:image/png;base64,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ojwpDWrvbNUiNR/p6KOPDqbe4s/VV18dzj333IKESgKyp6TNq3n33Xdrh1977bVF2bT88ssXf48JyM5/6qmnBruWKonacaYW2z4p/NS1eTHiuOEQgICGw7L3mdoI6LfffgunnXZaeOeddwqPZrfddivKKzOZL7zwwuL/l10wU0YHH3xwOOWUU4rFbx2ijz76qOhq2d+OP/74sNpqqzXOt22R/vDDDwUB2phGIDvvvHNYbrnlwocffhguvvji8O233xaG8KabbjolIPOhjAivuuqqsPXWWwdTcGeccUaw67Gx1l9//XkE9PfffxfmspHPvffeW+vGQUC9w2ymTgABzdDtaCOgDz74IOy1116FUjjuuOOms27qglk72zyf1MdUihHCyiuvPO+QNgIqTV8rpfbff//ad1999dWw3377hTvvvLMovUoFZGrIyqd11113eryNYURoJeJ2221XI6AbbrihKB+///77eeTTt6RCAc1QsM9NBQKaoXvSRkDl4o/LizYC2nPPPcP5559fLPIVV1wxfPXVV+GSSy4J77//fnjyySfD5ptvnkVAbQu4NNTNi7r00kunBLThhhvO259UEmT1WoxYzVPaYIMNwpdffln4YbHnAwHNULAONBUIaCAghzhNGwHZxsBDDjlknkHdREClWrr//vvDLrvsUpvaG2+8UZjeXXwSDwEZ6V100UWdCMiIydSdkea+++5bqLRUqWgXlatoco8f4p5yjnYEIKAZipA2AipVg6kE6zaVn7JTtOWWW06VRqlGDjjggMKErr4uM6WkyvO1LdJnn3027LPPPkU3Ky7BrJw68MADi02ONr+yBIsVkHXRzKu66667aiqsNKHt+6+88kphQF9wwQVTU7vpNuUSSu7xMxQaS+1UIKAZurVtBFSSyjrrrBNuueWWwrx97bXXikVqXbFqF+yPP/4o/m4dK2uXWyu8ahbbBkjbHb3eeutllWBWwtneIvsYiWyzzTbFed97772CKOxjBGKkUxKQzfOaa64JNm9Ta0ZeVgbutNNO4bbbbpsqnGoXbK211ip2hBt5nnfeecX/lu396oRzCSX3+BkKjaV2KhDQiLe2LJ/uvvvu5CzKUsn29tiOaSOW6sda4qusssqUFMpnwUwxmRkct8ttcZv6OOigg4rvqDlYt80Wrj2fZerFiME2S/7666+1edh5bU+Tdd9McZUEZF2w+LPtttvO258Ut+GtE2aGtJVhNl8jvvjF54pQcq5txDBYpoeGgEa8/WqB2NSqXo21rm2R33HHHcWsbTOfkYH97bvvvquZvUYW1nq3vTkvvPBCYUJb+XTmmWcW5nO5mNUcqgRkY5p6MmVlKsw6X6nzNhGQbQPYY489wumnn16opOqnaSOiXa8R7qOPPlojN0+5mEuuI4bBMj00BLRM3/5Fd/EpD2jRjciZl0QEIKAl8a4tAXOGgJaAmzQDU4SAZuAmLI1TgICWxrs6/DVBQMNjyhkrD6M2bUQEIBAoEYCAiAUQAIHREICARoOegUEABCAgYgAEQGA0BCCg0aBnYBAAAQiIGAABEBgNAQhoNOgZGARA4D9wf+I2tagw4AAAAABJRU5ErkJggg==', NULL, '2022-06-16 11:29:55', '2022-07-08 07:48:14'),
	('23465895', '1562c56a2899b11', 1, '1', 'envelop', '13', '3', '31', '30', NULL, NULL, NULL, NULL, 'data:image/png;base64,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', NULL, '2022-07-06 10:55:36', '2022-07-08 07:54:02'),
	('24819946', 'M16810153', 1, '1', 'box', '100', '100', '10', '23', NULL, NULL, NULL, NULL, 'data:image/png;base64,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', NULL, '2022-07-28 10:41:49', '2022-07-28 12:15:16'),
	('25592187', 'M29665850', 0, '3', 'box', '3', '3', '3', '3', NULL, NULL, NULL, NULL, 'data:image/png;base64,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', NULL, '2022-07-18 13:21:53', '2022-07-18 13:21:53'),
	('29016950', '1562beb1038a388', 2, '3', 'box', '12', '12', '12', '12', NULL, NULL, NULL, NULL, 'data:image/png;base64,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', NULL, '2022-07-01 08:32:03', '2022-07-08 07:45:10'),
	('34303720', '1562beb98db39f1', 3, '2', 'box', '2', '2', '2', '2', '2', '2', '2', '2', 'data:image/png;base64,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', NULL, '2022-07-01 09:08:29', '2022-07-14 09:07:50'),
	('35270773', '1562ba9fdaa7807', 2, '2', 'box', '23', '32', '23', '2', NULL, NULL, NULL, NULL, 'data:image/png;base64,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', NULL, '2022-06-28 06:29:46', '2022-07-01 08:28:59'),
	('3qrbj146s', '1562a83b6960ee6', 1, '1', 'envelop', '23', '223', '23', '2', NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-14 07:40:25', '2022-06-14 07:40:25'),
	('41689982', '1562c53bcbc54df', 1, '2', 'box', '2', '2', '2', '2', '3', '3', '3', '3', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAALIAAACOCAYAAACVMlK+AAAAAXNSR0IArs4c6QAADINJREFUeF7tXWnoDV8Yfn/2JV9I4guShE+WSGRJWVK2yE6WIkKWZM2+ZIns+75kX5J8IesHkjVJSogkS9ll+/17z71zzcw9577nzP3HvXOfKV/MuTNn3vOc9zzv85yZX1FxcXEx4UAE8jwCRQByno8guq8iACADCLGIAIAci2HEQwDIwEAsIgAgx2IY8RAAMjAQiwgAyLEYRjwEgAwMxCICAHIshhEPYQ3koqKiQLQ8Q9D7/7BBGG7v/VhqZzIaTffxrhs+L7U3/S78/+F+m+4ThlI4Piao2cZRipt0f9f+RI1PuB8SDqR42hrPAHJygkpAMQHOdqAA5GAEbOMJIBsAasoYAHIiMqY42MYHGTkZAVCL4B4uV+oWlQpJ1A9ADk3RbANiC3Rw5MSEkDioiVuDIycjIHFHqaiypQAo9vTs25aDAsjJbcyuSx8ysl3R45oRoVpYloWQ39yWale5S0oIUgIAkAHkjNV61OIJQE5ETqKYEoe3hKf9xnpkZGRkf9Y34QHyG+S3rHRcUAvL3I2MjIyMjOyLgFS02OrEkjwHHdlt4sEQsdyrIAXKdF6SoaAjQ0dWRaXt5wBALdwyHFQLqBbaFCNRBWzjtDNaTHKYtGJmSwmjFqOWJRwysmREQEdO7EMHkENTMduA2BaDUgaXuLctlbIV/PVM9g9ApAklxS1qxjP9Lmp8oCNDR4aOrHECQS2wsV5NDMkCRkbG7rcAUKSlHdQiWjGKjIyMjIysyx62xU+4SLBdukzyj1R0mM6j2HPTvSG/wdnTsgYYIomw2Ko6pniBWoBagFqAWqRnEtd34JCRkZG1S7XEeWFRR1MFbGsYyZCRjCpJ1QG1SEYIQAaQrf6qE1QLNxUA1ALUAtTCFwFpD4ar0YLdb/gap5MKgIyMjIyMjIycigB0ZOjITisInD04e3D2NBvvbbcqSLvzkJGRkZGR4ezB2ZM2a+FLQ8l9zKalR3KIbM9LTmDUgZKWwjDXtJW7JJlNctaiOmdw9rCx3ml3l6ve6zrRAGRLNg1nD86ef7KAWoBaBJKnaVcdMnIiApZ5Ft+1kLipifNKzp10XrougAwga2UnE0cFkIORMRWVUrEpFeFROTwyMnRk6MjQkaEju1IbZGTDrrrwZJJ0YWys11MEW907zNkB5GQEpLdnYYgEixmJq0scNSoHhSECQwSGiG8WgFqAWmRUWaRM7eoY2lrmoBagFgEh3xY4EmBBLUxTNvH/+NMLlvup8V2L4DvKsKhhUQdSCyzq4BfxbSdImqqFP4bj9qcFbOUsWNTJJT9UA4VlPimecPbg7MHZg7MHZw+qBVQLqBa+TCgZY6AWoWUDFjUsanz7zeHvyEkZxFTMuBoXrks7LGrLshCvOuFVJ/9ksZXJQC0E6pCmI4ZUCmm3nGvGgyECQ0RrAISBFF6SJaBK5wFktxXEFH/JOrcdt6jUx5IwwKJ2HShwZL3Rgd1v2P2mNS5cqU/UjGf6nev9AWQAGUD2qUa2RWQatcReC+y18IMCb1ELu9qkYsK2aJCWMGk3mVQkSkUoODI4soqAtEHcFqgSIKFaQLXQmlAwRNyAgW2c+swdXnmlFQ7yG7ZxaotI21evoFokIyBZkxIXlaiDdB7Uwm0FkWqYbClhVHkQGRkZGRlZR5LBkd0yHDgyOHLGYtNW1QC1cJt4oBaWr9NLgYKOnNmYkThqVA4KixqfzApwUAlI2mVGY81Gddak+7tSHagWUC0Cxo+t3CXtwkNGNqWCJBfHXgvstfBDJOqKINUuUVcMyG+Q3yC/QX7Ddy3AkcGRwZF9mVByeLHXIrRs4LsWwYC4viwryaNSsQmOjDdEtFzWdWmPWkxBR4aODB3ZNwuQkZGRkZHxzt6flACODI6Mb785vIIlVdnhognOXsJwisrhYYjAEIEhAkMEhoiraoJiD8Ueij0Ueyj2tAQ0w/ZQW86OjAyLGhY1LOr0D7hImcF0Hq864VUn7WqFl0/dgOH6RgY21gfja9r7YaJS+BO+lu8cum7CAZATkMPut9DUk6gCnD04e3D24OylZgFedcJnZQMpEdQC1CJjsSk5SPg+ciJ8rpzeVFxJRahUlIEjgyNbOX4wRJKZH58DwOcA/JMBHBkcGRxZszzkHLUwLWH4f0QgFyJgbYjkQmfRB0Qga2cPIUQEcjkCyMi5PDrom3UEAGTrUKFhLkcAQM7l0UHfrCMAIFuHCg1zOQIAci6PDvpmHQEA2TpUaJjLEYgFkNlWPXDgAI0aNYo+fvxIV65coZYtW6bF/cOHD7Rnzx5as2YNtW3bllauXEnly5fXjs/v37/p8uXLtGPHDrpw4QI9ffqUOnbsSPv27aMqVaqkfvP69Wvatm0bHTp0iG7dukWVK1dW7SZPnkyNGjUKbCx/9+4dbd68mXbu3EkPHz6kNm3a0MiRI6lnz55UtmzZQD9c2rr0wWvr9aF9+/Y0evRo6tq1K5UqVSqXsZqxb7EA8oMHD2jo0KH07NkzevnyZRqQ3759q8DDAGZA8sEAMgGZQTRr1ixav359IHhhIDMo+DrHjx9PC3LNmjUV6L0J9erVK9X25MmTaW2XLFlCkyZNSgHJpa1LH7w4Xbt2La0Pq1atonHjxhnf6Mh1hOc9kD9//kxTpkyhFy9eUIsWLWjq1KlpQGbATpw4kTp06KAAs2zZMqpTp44WyD9//iQG1tKlSxXwOMszKHXZ6tSpUzRw4EBasWIF9e/fnypWrEjfv3+ns2fPKlAMHz5cTQheMbgPc+bMUW35N7wS8KSbPXu26u/hw4epYcOGTm0ZXLZ94LY8Qfi5unfvrmJVokQJOn/+PI0YMYLq1q1Lu3fvpurVq+c6ZrX9y2sge5SCAcIU4MmTJwokYWpx+/ZtRROGDRtG3759owEDBlCtWrW0QL5//z717t2bhgwZEsiSuugdPHiQJkyYQCdOnKBmzZqlmjx//lwBu0ePHur8+/fvFVhq1KihgOSnEUwx+vTpoyba4MGDndryDW37YELnr1+/1GQ7c+aMula9evUA5L8dAV4q+/XrR2PGjFFA2b9/vxbI/n4xzcgEZKYDTCn4WpyJMx3exPn06RNNnz6dOnfurKjLokWL6PHjx4qPc6bz7tm4cWOaP38+lSxZMnVZ7xxTEAaUS1u+iG0fJCBfvHjR6pn/9hjb3i9vMzJTCs52fPCyzcs6g1CXkV2AzEC7efOmug5nqHPnztGPHz+oU6dOiraEC7hHjx6pbHr69OnUbTizzp07V2V9Pr5+/ar6ypSDeToDnpd1pkO7du1S/e/bt6+iHbzK2LYtV66cur5NH0yA4D4MGjSIeJItXLgwrei0BdK/bpeXQObBZtCuXbtWUYr69eurOGYLZA9wmzZt0o4LZ+gjR45Q06ZNU+e5MGS6wFmcFRM+OLty8dSkSZNU8cQZj+mKV2yGb8DgZW5epkwZcmnL17HtQ/ieXj3Ak9Afx38Nyij3z0sg3717V2VMzpBMLbzN2/8XkLnw4mtzpqpWrZri1UePHqWZM2cq7uvRA09dYP69fPlyVUSxOrJgwQKqVKlSQLXgyXfp0iUFcM7ypUuXpm7duqnfrF69WklxTC34cGnr0gc/QBjEvBJs2bJF/eP75/ORl0D2ACsFfu/evYoP21ILVhwYwG/evKF169YpMHrHly9faPz48YrferKdp4YwF+b78IRiEDKF4AKOebuXZU199Yq9adOmqd9kOnRto/SBVx5eRTgLb9++ndq1a5e3spsXLwA5ZIgwMJgbs8FSu3btFK6YNnBRWaFCBQVkPpgO3Lt3L61I8go2j+74DZRwVmRezPeSFAPOoOG2HhVy6QM/x4wZM5Rsx/w83zNxXgPZlLWypRZ83evXr6vlnvksu3MMQnYE2ZGbN2+eAjHrw55sxVRi8eLF1KtXrzQdmR07XUZmAHKBtnHjRtqwYYPKjlww+tUM7xkztXXtA3NpXnGY4vDztG7dWlrU8uZ8XmZkVyBfvXqVWrVqZRwUv8vHwGGDhQvJ8MFLP6sOVatWVadu3LihAKwr4MLOnkcL7ty5E7gsy3b8j1UX73Bp69IHiZJlcjtzHdEAssauZmlv69atKlsyqJo3b64yNMtqfsDx4LKOy8XasWPHFKDZUOjSpQuNHTs2Jb9xOz84WcJjXsq2eoMGDZQU5z9c2rr0AUDO9emI/hV8BGKVkQt+NAs4AAByAQ9+nB4dQI7TaBbwswDIBTz4cXp0ADlOo1nAzwIgF/Dgx+nRAeQ4jWYBPwuAXMCDH6dHB5DjNJoF/Cz/ASFlazfmnDtoAAAAAElFTkSuQmCC', NULL, '2022-07-06 07:37:48', '2022-07-28 13:06:36'),
	('42396873', '1562beb98db39f1', 2, '3', 'box', '3', '3', '3', '3', NULL, NULL, NULL, NULL, 'data:image/png;base64,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', NULL, '2022-07-01 09:08:30', '2022-07-01 10:35:02'),
	('45811361', 'M35775082', 0, '3', 'envelop', '40', '40', '40', '100', NULL, NULL, NULL, NULL, 'data:image/png;base64,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', NULL, '2022-07-20 06:42:40', '2022-07-20 06:42:40'),
	('45862185', '1562c55f66418b0', 0, '3', 'box', '3', '3', '3', '3', NULL, NULL, NULL, NULL, 'data:image/png;base64,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', NULL, '2022-07-06 10:09:42', '2022-07-06 10:09:42'),
	('49219242', '1562c3d4fc764cc', 2, '4', 'box', '4', '4', '4', '4', '1', '4', '4', '4', 'data:image/png;base64,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', NULL, '2022-07-05 06:06:52', '2022-07-05 10:12:21'),
	('4e8knbc09', '1562a1dee97b863', 0, '12', 'envelop', '9876544', '9876544', '9876544', '9876544', NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-09 11:52:09', '2022-06-09 11:52:09'),
	('51503643', '1562c3d4fc764cc', 3, '1', 'envelop', '1', '1', '1', '1', '1', '1', '12', '1', 'data:image/png;base64,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', NULL, '2022-07-05 06:06:52', '2022-07-05 10:17:13'),
	('53287047', 'M87509090', 1, '3', 'envelop', '3', '3', '3', '3', NULL, NULL, NULL, NULL, 'data:image/png;base64,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', NULL, '2022-07-08 08:13:38', '2022-07-28 13:33:10'),
	('53388635', '74262758', 2, '5', 'box', '5', '5', '5', '5', '5', '1', '5', '5', 'data:image/png;base64,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', NULL, '2022-07-07 06:16:01', '2022-07-08 06:30:26'),
	('57014323', '98610888', 3, '4', 'envelop', '4', '4', '4', '4', '4', '3', '3', '4', 'data:image/png;base64,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', NULL, '2022-07-06 11:43:11', '2022-07-14 09:15:39'),
	('59995248', 'M30096436', 0, '3', 'box', '300', '30', '33', '3', NULL, NULL, NULL, NULL, 'data:image/png;base64,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', NULL, '2022-07-18 11:43:06', '2022-07-18 12:00:38'),
	('60107303', '1562c5743179db4', 1, '3', 'envelop', '3', '3', '3', '3', NULL, NULL, NULL, NULL, 'data:image/png;base64,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', NULL, '2022-07-06 11:38:25', '2022-07-14 07:59:15'),
	('60838929', 'M16810153', 1, '4', 'envelop', '123', '12', '2', '12', NULL, NULL, NULL, NULL, 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAALIAAACOCAYAAACVMlK+AAAAAXNSR0IArs4c6QAADhVJREFUeF7tXVeIVEkbLdOaEFGRXUVQQV1UfDCwYsD4oKKY2DUHRDFiFrOYA6KYs66JXd01i4g+KGZQxLhiAgMoYsac9efU9O2/b/Wt/ur2NDPTw7kwD9NTXbfuV6dOne981T15fvz48UPxYgTSPAJ5COQ0n0EOX0eAQCYQckUECORcMY18CAKZGMgVESCQc8U08iEIZGIgV0SAQM4V08iHIJCJgVwRAQI5V0wjH8IZyHny5PFFyysIeq+bBUKzvffmsO1s/Zj9meOw/W6bctu4pPGacbCNS7pvsvGSxp3ZOHjjlvqxFYil50q2XzOeBHIkIhIgzAmVAGsDuDkBUjvXhSQBTrqPjWikfl3fJz23RAjSnkMgE8iBO20c40V25LCAIyNHzjJRWvjPdNkknsScZORIhKiRMwIhxUGSHNIWa/u7JG0IZMdjnNIESlqOyV6wypOYUoqrpO2lZEpaONICoUa2MH1mGc3mprhKFNvESYwoLXRbskIgZ7hhYbV3nIZ3PY8sTZTEHGRkMnJsBFwJx1EwuJ9HJpCpkZNhTroWdC18W64kbSQtK0kYV60bVgIQyAQygRyjnW05RnQBUyNnhELK/iVGlKQXkz1/BKiRDURIAUl2S3U9QyJtta5uibQFSwuJ0sIxLZQYh65F4kNVZGQyckJ5REYOLmFLcZEWVpxPy7MWwSvRtlWa2XPYrTlVE0hp4Z83qULIY5zGOWcCOdzCl5JUCYAm80qAlHICG5Pb7iONz1H5siBi80/JyGRkHYFks3AyMhk5NgJkZCE5kbZUMjIZmYyc4DSXpBVdF5irJJI0qHQ/yZ+2jSNsMh9We8dpcVb2MkIiJU22iZEmIKzrIgGLnxAxI5TxOz+zF4kLgRy8oMnIgq0WdusJXofxB7LpIwcfVE+2VE8gE8gJcwVXd0Yq/Us7CTWyQYE8axHRYsIX1bgC1LUdgez2n0GokamRfZTFyp7xP3VYEMlgEroW/lOBtp1Icn9sOVJUw9N+o/0WCxIyMhk5cIsmI5ORk9qaab/RfksoQ+ha0LWIrYBKFcawdQJqZOPT1mRkMjIZOSYCPP3mh4NUWJGSRBNcroTDY5w8xunLMViijiwlamRqZGrkmH1FKrm6lm5djfVkmYjSgtIioW1GIPsBIi00KV48NBTZKVnZY2WPlb2YswQSc5hSIKzPaLNUpOxXYjxpXNJzSf4nK3us7LGyl+AjWK4LULLNbLaY+brUD+03fkFLpnIKamRqZB/pSICwSSFKi+AcI6x0lOKYsFrHD5/+PzwEshsgwwJOOpeerGSJkz50Leha0LWgayH+Wy26FnQt6FrQtYj74hybVuaHTyORoUamRtYRkAoHku9p8zPDbs1SgUQqrJjZtvRcUvITdvySrysdaLclT8kWhmzxkMZB18JgyLBAIJB5sD6hVcdjnBHjnV/QEpi7sLLHyh4re/yn6vwSQylJlQoOkianRuaXGCZlH0rAkpIsJntCMZsamRo51p2SFhRdC7oWPkpxtf8kCUD7LRIhMjIZmYwcwzESw5iFE/rIwf+iVyowpcpPl5jeNg5KC0oLSosExGdL5XjWwlg4NgayMQxL1BmRYUGEBREWRFgQYUGEBZFIEs5PiARvjfymIb8alSqElBaUFpQWlBaUFpQWlBZONpfke9O1oGvhtKWyIMKCiM07jn2dPjJ95IQ7Eyt7PMaZcMdxLcW7ShsJcDw0FIkQDw1Fkgp+1ClwgdJ+o/3mlCtIJXIysm0pGQqbjExGjj1TwYP1If/VL10LuhZ0LRJUjMzgSIUFaWuXdizbZEhJGJM9/0K2xZH2G+032m+IgOvhGtNusjGcqy1la5eqT0a4Phcre6zsOWXr1MjUyNTI1MhxO6YrMZjg4TFOIyJS8kJp4Q+YFC8pSZUAKCW9kj9tk4xhpaMk0SRWZrLHZI/JHpO9+PPQmd1RJIaUChH8yiyBuyWfVNoC6VoEB5g+cvD3OUuSJU7D8zN7wfYR7Tc/VCStzUNDPDTkZEPakicmexmRYbLHZI/JHpM9JnuSlrX51q4VWMfDmWRkKQmVkljJ/3QtQEgTTmmR2I2gtKC0oLSgtKC0oLSIREDaUsNuza7ay7XwQGkRcQUi7pIkpeL8XUdXKmy/9JEtUkuysSSNKhWMbAqPBREWRDQ2JAaWgMJkz7/EpMJGWOZ03XHD9ktGJiMnTP8J5JAfKrVt1SZDUiPzYH1i442VvYS2E89a+OHDsxbGcpJcADJyYs3KY5zB/MyCCAsiLIiwIMKCCAsiLIgE2oeuhRpX21DSttL9zKQ8rE1G+y3igtC1oGuRUtfCpTO2YQSyKwLOyV52DZD3ZQRcIkAgu0SJbXJ8BAjkHD9FHKBLBAhklyixTY6PAIGc46eIA3SJAIHsEiW2yfERIJBz/BRxgC4RIJBdosQ2OT4CaQ/k79+/q5MnT6qNGzeqY8eOqfv376sWLVqov/76S5UqVSo6AZ8+fVK7d+9WS5YsUWfPnlW//vqrGjRokOrXr58qWrSob6KePn2qNmzYoP7991918eJFVbJkSd3nmDFjVM2aNX3fOXzlyhXd5759+9SXL19UgwYNdJ9t2rRRBQsWTKpfvOnFixdq7dq1atOmTermzZuqcePGasCAAapjx47Wfr22zZs3V4MHD1Zt27ZV+fPn940hTL85Hr0xA0xrIGNSpkyZolauXOmLuQnkr1+/qoULF6rx48fHzQ0mfP78+VEwA8QAzJ49e+Lali9fXi8QgBXX8+fPVffu3dXhw4fj2i5evFgNGzYsCvow/T5+/FiPAYvDvObNm6dGjx4dBej169dVnz599OI0L3MMYfpNJxBjrGkLZIATkwoQYtIHDhyoADSTgfCQJ06cUF26dFFNmjRRs2bNUhUrVtTMPXHiRHXgwAG1detW1a5dOz13+/fvVz169NDA79atmwb458+f1aFDhzQw+/btqxcPrpcvX+qdoH379qpChQr6tf/++0+NGDFCFSlSRPdbokSJUP3iUM6iRYvUtGnT9BgwlsKFC6tHjx6pqVOnqlOnTqkdO3ao6tWr634BTsQAY6hXr57KmzevOnr0qN4VKleurLZs2aLKlCmjP9sYpl8COYsicO3aNfXHH3+o3r17+xjKvP23b9808A4ePKj++ecfLSm8C1t2586dVbNmzfSi+Omnn3SbkSNHqr1796rffvst2vbBgwca2B06dNB/t10AzPTp0xXGt379elW8eHHd1LXfV69eaRCWLVtWAzRWnnjjHTVqlOrVq5d1DEHPnIp+s2hqk7pN2jIytnhIir///lszse0Ca/bs2VNVqVIlCla0BcNB26KP+vXrRzX1vXv3NAu+fftWM3arVq00e8+ZM0fduXNHsyyYLugCc4MN8T7o6a5du0alhWu/nlypVauWmjlzpsqXL1/0Vt7fIG28XSFoHB6Qjx8/Ho1PKvpNCmFZ9Ka0BTIm+cKFCxp0YLsjR47oZKtly5ZaC3tJGUAIJsXrmPx3797pJAoSAxobV+3atdX27dtVpUqV9O+3b99WYD3IDu8CA4JpPQnhvf7hwwfN0GvWrNEvYVEtXbpUJ3vY5mMvl369/iBlli1bphcS+nn48KHavHmzlgeQSZAdhQoVCoQJ2mLxYjHMnj1bs3oq+s0iTCZ1m7QEsgke88kBpp07d6o6derojB/yAUD85Zdf1IwZM/RrNWrUUBMmTFBPnjzROjdWdgDg2NbB1m/evNHdgwWRPAH0sWekg8YCl2PFihX6vrFtXfsFk0IyYREGXVg4nhQy/+7lDliEeK6qVatGm2Sm36TQlYVvSmsgI+kB+4J9fv75Z/Xx40e1a9cuNXnyZM3CYG1P2545c0aHFSDD3/v3768Tublz5+r3eIzsZfaw9BYsWKCTKNhaYPBixYr5XIsgEMGuQ/9YLN5iQrsw/UJnI0HFwsFOU6BAAZ2MYixge1hxQdICIAZjr1u3Tv+gXeyVbL9ZiMekb5WWQIYWBYCfPXummQ8A867379+r4cOHa22JScXvsMgAZFhtsK5Kly6tm3v93Lp1K+ow4D2QFdDCeB8YFQDAVg+GRSJmY0NvDAAz2sJlQB+4UtGvt7tgJ0H/sRd2BuwiYOE///xTNW3a1LcbJEJIon6TRlYWvzEtgewBA3Jg27Zt2k7zLkiBIUOGaPsL4AGgAXoA2Wx79+5dnZAh2QM4kSRh27569WpcEuklS7iPWWwx5+zGjRuqU6dOaty4cRrInvzITL+eF45nMN0XPPOkSZO0dQgdbTJxIkwl6jeLsZip26UtkM+dO6e3WmhJOASo4r1+/VonctDBADE8X1woLEB+oD3ch3LlymnJAXcBNhuKH6iGedk+pAQkx++//x7nI6OylkifwtmAB3zp0qWo35uZfrEIkCSuXr1arVq1SrMudgzPzYDuxkKFFMGzN2rUyAkQUr9OneSgRmkLZEzE2LFj1fLly+PCiW0XGb8nIeBUoK1ZAcQbzUrZ+fPnNYCDEi2zsnf69GnVsGHDuPsHJXth+vW2+suXL/v6xsLDT2xJHbsDnBvbhWIRFjWKKmH6zUEYdRpK2gIZTweAougApsIk1a1bVzM0HArz/ERQW2jpoLML8HyRVOFsBgCNIkrr1q3V0KFDffabCWRYfmiHncC06TBe135jAYc+oXdRhq5WrVqcpZcskKV+ndCTgxqlNZBzUBw5lGyOAIGczRPA26cmAgRyauLIXrI5AgRyNk8Ab5+aCBDIqYkje8nmCBDI2TwBvH1qIkAgpyaO7CWbI0AgZ/ME8PapiQCBnJo4spdsjgCBnM0TwNunJgL/AzIJuTeysh9WAAAAAElFTkSuQmCC', NULL, '2022-07-28 10:41:49', '2022-07-28 12:41:55'),
	('60838968', '1562ba9fdaa7807', 2, '3', 'box', '2', '2', '2', '2', NULL, NULL, NULL, NULL, 'data:image/png;base64,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', NULL, '2022-06-28 06:29:46', '2022-07-08 07:50:36'),
	('64382375', '1562c3d4fc764cc', 0, '3', 'envelop', '2', '2', '2', '2', NULL, NULL, NULL, NULL, 'data:image/png;base64,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', NULL, '2022-07-05 06:06:52', '2022-07-05 06:06:52'),
	('647lgtkic', '1562a2e3504dbad', 1, '865', 'box', '865', '865', '865', '865', NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-10 06:23:12', '2022-06-10 06:23:12'),
	('65s5h6jpw', '1562aae17e96fdf', 3, '2', 'box', '2', '2', '2', '2', NULL, NULL, NULL, NULL, 'data:image/png;base64,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Y8KGG24Ybr755rDiiisuqUuFK6+8Mlx22WVhn332CY888khYc801l9i1OHB3CJCAusM+ufLXX38dHnzwwTB//vzw6quvxr89/PDDMeGrlyTiscceW5zx66+/HnbcccdGd2MdtykBWe4tnzgVUKOlnHYfIgF1vGTy0N5LL70UzjrrrPDRRx8ls5nuBOS5t46XgZfvCAESUEfAV5f94IMPwlFHHRWWW265cPnll4eddtoprLrqqsVZiVJ56KGHxt6SWMf1KiDPvXW8DLx8RwiQgDoCXi77999/hyuuuCIsWLAg3HfffWHTTTcdORsrUVSDfPrpp+G2224LTz/9dPjss8/CHnvsES688MKw++67h6WWWipp7SzEVhHQZpttFhWbjC3zXmWVVaJRfPLJJw98Ic+9/frrr/Hzd91119D9z5s3L/GbqjlIuzlnzpzoFT311FNDc5D7Pfroo8Pxxx8fZIzSS64nbe+jjz4aNthggw4jYXIvTQLqcO2/+eabcNxxx4W99947JiB6eQjo448/jmMvWrQoGXaLLbYIjz/+eNh4440bE5DsSP3www/hjTfeSMa+5557wty5c+PvPPfWhIDk6evvv/9+6P6uv/76cM4554SffvopnHTSSWHzzTcPl156aRFaIS/BR8h39dVXR/Dz70sAARLQEgDVOqR4PkceeWQ45ZRTYjI98cQT4Z133onkIL+TBFp55ZUToqib0FtuuWXYbbfd4vs22WST5CsUhKxEXUmF33bbbePfvvrqq/DMM8+EvfbaK2y00UbucSv1IZ6VKJCbbropbL311uG9996L2+XbbLNNuPXWW8NKK60U/SzPveWYae1efQ5C3FdddVXYaqutgqi9M844I/z888+xRV1jjTXCueeeG1Wm7NgtvfTSUf2tsMIKUTX9+eef8e/ykvuQ3/P1/yNAAvr/MR9cURSEeD7aSxJEEmz55ZePb9F2q6R9eOCBB8Iuu+wyGOr555+PO2aylS1kViey/HrWcavkF/VTbxkrBSMkUG2Ze+/NS0CiwkRxrb322gmRyr1KS7vddttFonn33Xfj+/7444/Ykv31119xjquttlo488wzw/rrr68qpA5DY2IuTQLqcKmrJN1///3DeeedF5Nm2WWXDZ988km45JJLwptvvhmefPLJ2EbkL9lh+u6778Jjjz0WLrroonheRhKtMrBFCVx99dXxR9SAGN2HHXZY2H777QeEVrr1UeNqqmQUATW5N5kXUkCls0gVntWRBCGa+++/P3o8n3/+ebjxxhvDL7/8Es4///yoGOWIg7Sp9aMOHYbDRF6aBNThsr/11lvhgAMOiOpF2qL6S87BiKJB53skoaSSf/HFF0O7Y0ImYsZKaydGtPgd0jrde++9iQdUgqA0roeA2t7bOAhICOm0006Lntcrr7wSb1POJEmLeMghh0Tiueaaa8LOO+/cYRRM9qVJQB2uf7VTc+ihh0YTuv61li+//HI0pxEBiXckxq+0GKPM1H/++Se89tprsR07+OCDY3sivoj2Ko3rIaC29+YlICFb8XruvPPOgWr88MMPY9t1ww03hGeffTbumv3222/Rp5L29oILLog7eSWF2WFYTNSlSUAdLvfvv/8e2wE5+SxJIepEtsfffvvtcPHFFwchDTGR11lnnaFZyt/Ec7njjjti4t1yyy3RhK1I7O677w7rrbde2GGHHWJbJgkq7z/99NPjlrNmvI4a10NAbe7N0oKtu+664brrrgtrrbVWkBZQtuKlbRVTXjARz+vLL7+MKmffffcN77//frxnIeoTTzwx7LrrrvHUObfgO0wAz/+G73aaM/fq0iZIkohiqL/Et5Fqfvjhh8dfj9qqlhZMzOq60Vw9S5UjJ2d2RCkddNBB7nE9BCSDW++ttLpIAclOXP6aPXt2Yo7/+OOPcYdQfDTxyQQT2RWT3TDxzmT3jFvw3eYWFVC3+EdlIlvv1157bXjxxRejCS3kIKQirUGlaHICEoKSg4VyyE68ovxpcfE6xOuptvZF9ey5555RATUd10tA1nsbRUBy6FGwkZPidWVUJyA5trDffvvFexNzunqJ2hGyEYX43HPPhQMPPDD+SXYIBeP8kGPHoTCRlycBTeSyT/2bFgIV/0YM4vpBQu/jIFP/Tid7hiSgyV7/KXH3smMm53XEHJcTyaL25EFcMYplG112rKoXCWhKLNnYJkECGhuUHKgpAtqhRfHGbr/99uQxCRJQU5Sn5udIQFNzXSZqVrJj9sILL8SdQDkqII+YHHHEEfHhVvG66i8S0MwKDRLQzFpP3g0RmFYIkICm1XJxskRgZiFAAppZ68m7IQLTCgES0LRaLk6WCMwsBEhAM2s9eTdEYFohQAKaVsvFyRKBmYXAv6TNQkWMqYl/AAAAAElFTkSuQmCC', NULL, '2022-06-16 07:53:34', '2022-06-16 07:53:34'),
	('70259842', '1562bab3190ef4f', 1, '2', 'envelop', '2', '2', '2', '2', NULL, NULL, NULL, NULL, 'data:image/png;base64,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', NULL, '2022-06-28 07:51:53', '2022-07-28 12:49:27'),
	('74113963', 'M24400637', 2, '3', 'box', '4', '4', '4', '4', '4', '5', '4', '4', 'data:image/png;base64,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', NULL, '2022-07-18 11:36:31', '2022-07-26 09:05:38'),
	('75647411', '1562c54c14be378', 0, '2', 'envelop', '2', '2', '2', '2', NULL, NULL, NULL, NULL, 'data:image/png;base64,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', NULL, '2022-07-06 08:47:16', '2022-07-06 08:47:16'),
	('80629414', 'M87509090', 1, '5', 'box', '5', '5', '5', '5', NULL, NULL, NULL, NULL, 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAALIAAACOCAYAAACVMlK+AAAAAXNSR0IArs4c6QAADctJREFUeF7tXVeoFEkUvbq6JvxRZE0YMOEu+2FAMWAEA4IJxXVdFQPqKioGxIg5YMCcs2vOiog/ihlcFiMiKphQxIw563LqvR5merrmVr/5cGbeaXgfvqlXU33r3HPPvbe6zfP9+/fvwosWSHML5CGQ03wHuXxjAQKZQMgICxDIGbGNvAkCmRjICAsQyBmxjbwJApkYyAgLEMgZsY28CQKZGMgICxDIGbGNvAlnIOfJkyfGWl5D0Pu9v0HoH+/9sW1cTufT5rVtsa2h6b8f7d/++W3jtXW42jGsncPug2ZP/z7Zxnu/175fs5dr45lA9iFMA64NcP6Ns224H9BhHZhADqYEAplAzmrxWiKuq4NqEc7VgbV12CIbgUwgE8jRnhw25Gme7jqfpuk0beqqcTUJoN2Ptg5q5KxDmGRk32lUW5LhmpzYgEuNHA5wTPaSBCaBHAw41wjmWl1yJQZq5GwLhAVm2PGaNKC0yCq/svyWjRRXT6dGzjKYphldQ7eNEf0OrDE2gUwgB+Z7GtMTyG5P4rH8xvJbKOYnI5ORychRFtCqQloSGVc2dX34lGctYqsAWieLLepgje8HKM9a+Fwy2eSQVYvgQ2GaXTTmdE1Gw0oWMrJF4mgbpiVl2t8H6oqAcpbmkNrnNsZj1SLbApQWlBasIweIfI3BXJlHq3tqTBgXorJPgWnJCDVyYiliq09TI/uOGYYNldp4V8fiWQuetTBYYWcv1qU07c2GCBsiNlUR6FBkZFYtEjKtFtK1R4s0rUWNHAtAVi0S8pf98IrrgXANcGFDrKuDMNlLDHQbUbhKQNu+agSkJdPavHFJOjt7sSbRIgSTPSZ7TPYCwkPYSORaltRa5No8ZOTszdJak67JlRaiNMlCaUFpEYMBdvbY2Ysun2plQY2AqJEtFKuFSi05dI0Q1MjUyNTI1MgRC5CRycgJJR/ryKwjGwuw/JYFBFYtWLWIAYLrawlcG0uuuQDLbxZmZtWCVQtWLaKcwzVkuTIP68g8a2EkIVvUsSGIGpkaOVQ27Vq31QrrZGQyMhk5IB8gI5ORycgJyne26iYPDeXs5Yh+e1Ij+yxCRiYjk5HJyHGBRzsFyTcN+UyWbLnONfnkoSEeGgrV+kwWmK4dtTitxfdahNonW9VIqzbx0JAla0oW+GRkPkWd0IP9uGNnL9YirFqwahGDCDJyYgdxJRStwWQ7jKS9Qsz2/Uz2mOwZC7hWBQjkbAvw9BtPvwEKZORsh6BGpkYOcoiwDsLOnsWhWLVg1YJViyh60JIX16THVod1TWr5hIilTkuNTI1MjRzlHNTI1MjUyJZoEW0YW0jWyk/UyNTI1MjUyHGvD9AIhWctLKzsmgTZOldkZDIyGZmMTEbWnsjQQpSNYXmMM/jcsKu9XJNy1wjnWnZ0fcsnGyJsiDhFUAI5GyjaYRZXTUpGdtOuGuNpVRuNCbVGD0+/KU9kEMgEcoKqa+QjPkXts5Km2fnMHp/ZS6jNwj4pETZUauNdpQ6BTCATyAExMqwDu9bLeWjIIkh4aIiHhgCNsOeGtaQ/p0kky28sv7H8Fu0FYUOiVojP6XzavLaMVysXaWcBwv69tg6+sT6c9iYjk5HJyGTk+P8sJ44ZLHVxMnKsBbSIZ4u0Njuyjsw6srEAO3s+BtI6ca49fNcyEzUy31hvHJH/h0gsJbOzl2UPV8LRJADLb9+zsliN4cnIZGQyckDmQEYmIzsxqGvIokbOMqdrEub3SbaoLfUNtqjZoo7WzpqDaZKQ5TeLoyXL4H7Da4ZmZy/xOWkCOWQ5j8kekz0me0z2rFUh11yG5bdsC2hVAi1EkZHJyGRkMjIZOafHLl1DVrLJG99rwfdaBNYFWH5j+Y3ltyjXICPH8kTYyOYaqdgQYUPEWIB15OCzLnxmL9tByMhkZBei0Mp6fr7lMU6fRbRyIN9rEe7ZOh7j5DFO42LamQZXoPgZTNParpFTY07X9YWVLGRki8ThWQu3d8yFBRyBTEYmIwc8qWKpRfBRp7gQpbwdlBqZGjmmrOUaynnWwi3k2zSwFtpt9qVGzrZMWAOGbQyETV608a6ORUYmI5ORAwReWAfWqg3+KkJYQrFVIXL6skHt+3M6L6sWrFokJBQC2bHK4Kq9XJlHM7wtyw37qJLGnJo00dbBlxiGkyxkZDIyGTnaCzSG0rSRxmBk5CwLsbMXe3iJdWSfBSgtEr/JyVUC2qSdVjbVThdq81JaUFpQWlBa8P3IPGthYULt2KQWoli14FPUJpdwfa2sTWTz97RAKliAQE6FXeAakrYAgZy0CTlBKliAQE6FXeAakrYAgZy0CTlBKliAQE6FXeAakrYAgZy0CTlBKliAQE6FXeAakrYAgZy0CTlBKlggrYH85MkTWbt2rezcuVMuXLggxYoVk5YtW8rIkSOlRo0aMSfHPn78KHv37pWFCxfKuXPnpFq1avL3339L3759pUiRInF78e3bNzl16pSsX79ejh8/Lnfv3jVzb9myRYoXLx4Z761hw4YNcv36dWnevLkMHDhQ2rZtK/ny5YuZ9/nz57Jq1SrxxjZu3Fj69+8vHTt2lAIFCgTiAS3hbdu2yYABA+T169dy+vRpadCgQdzYV69eyT///COLFy+WJk2ayPz586VQoUJWjLnOmwogdVlD2gIZAAII9u3bF3ef5cuXN4DzNvzLly8yb948GT16dNxYgG727NkxYAbgJkyYIMuWLYsZ7wfytWvXpFevXsYx/NeCBQtkyJAhEWd69OiRWe+BAwfixs6aNUtGjBgRB3wM9L7j3r178vDhwzggP3v2zDgGAAxnw4Xv0YCszesCnlQak7ZAPnjwoPz1118GoH/++acB4qdPn+TIkSMGQH369DFgxHXy5En5448/DFNNmzZNKlasaDZ97NixcujQIcNk7dq1M2MBegAL4AYgwIRwDD+7YizAiXHt27eXevXqSd68eeXYsWOG5atUqSKbNm2SUqVKmRciAliTJk0y68W6wZYA5sSJEw04d+3aJb/99lsMNt6+fSujRo2SBw8emPnhiH5GxrzDhw+XFi1aGGeYM2eOVKpUKSGQXeZNJZC6rCVtgbxjxw4ZNmyY7N+/X+rUqRO51/v37xtgd+jQwXz+9etXA+jDhw8L/gaSwrsgBbp06SLNmjUz4P3555/l6tWr0rlzZ+nZs6eVJRMZNuj7Xr58acBdunRpA/xoGeGtAWDs0aNHZGov9AP8kDd37twxDuAH8sWLF40E6t27t3z48EG6desmFSpUsALZdV4X8KTSmLQFsrexb968MczaunVrw7IzZsyQW7duGZYFK7548UK6d+8uVatWjYAVGwA2hF6GfKhfv35E+0KS4Hdbt241TBz28oB84sSJyBwI/wBYzZo1ZerUqfLTTz9FpvU+gwzyIognKbp27SqDBg0yToD1BAE5en3eXImADEkRdt6wNvgR49MWyDDWzZs3TViFPPAusNrkyZMNK+ECuMHQrVq1MkBBWEXCBYkBLYyrVq1asn37dqlcubIB2vnz5w1owOBHjx6Vz58/m79HaPcnkf5NgwyA4wC006dPN+z7/v17Ex0ge6Bl4XSQIRi7ceNGw56QPpAdBQsWNGvEeFz4DLIJDpYskHM6748AZtjvTGsgA4gI1WBQZPS4wGxItABOnHX2QjcAXrJkSZkyZYr53e+//y5jxoyRx48fm9AN0JYrV84AaOXKlYF2BEPv3r1bateuHfi5p6/hWJizevXqkXFgaMgVLyHzT4DvhbzJnz+/Ae2SJUti5kgWyJAUOZ03LKh+xPi0BbJXBYA+nDt3rkm4kL2DaYsWLRqpWniMfPbsWWNflOjGjx8v/fr1M0w3c+ZM2bNnj2HkMmXKGCAj8QL7gll/+eUXoz0xBn8HdvfLA8wLEIM9V69ebX5QWou+ACQknXAysDwAiwQT6160aJEZj4hx+fJlw7z4fkgA78GDZIGczLw/AphhvzNtgexl69DC0J/YcIAF4RsJHHQlGA5Mjc8BZJTakNmXKFHC2AlVDgDmxo0bRlMD2Pj306dPZenSpcYhvOvdu3cydOhQo2/9pS1IB0QGsPC6deukadOmcU8/2zbGixiIDli3B1htIzdv3mzuK/pKpJGTmVdbSyp8npZA9jTnlStX4pIybzNhXGwewAhwAshoLKD05l23b982rIdkz6taAKSQGf6xcAgkXoULF44BMn4/btw4QTkQetfPxIk22atv47u8ikoygCOQU8GlQqzBqwxASkAadOrUKa6OjG6ZB040ISATEMZR1ShbtqygTIdqB8p3aKqgI4fr33//NeOgZ9EhRBcPXTMkiNDXADpq1Lig0eEkkAz4vFGjRk53AUdEorpixQpZvny5YXMkrdHVDP9EyUoL28Jc5nW6qR88KC0ZGTb777//DICDkid/Z89rAPg7dZjH31UDyNCEQLLlvxD6UXXwpInGntEdNk9CXLp0KWZaOBN+gtrk0QNtgDtz5ow0bNjQCiOty0cg/2APxNejloxECWcoAGg0O9q0aSODBw+OlN+8ZQLMa9asMQwIUNWtW9do3qBzDkFjwdCofEQDLqdARgkPOhrt7V9//dWU4rSLQE5sobRlZG3j+XnusgCBnLv2O2PvlkDO2K3NXTdGIOeu/c7YuyWQM3Zrc9eNEci5a78z9m4J5Izd2tx1YwRy7trvjL1bAjljtzZ33RiBnLv2O2Pv9n8JKFw3R8HTLAAAAABJRU5ErkJggg==', NULL, '2022-07-08 08:13:38', '2022-07-28 13:33:10'),
	('80675713', '1562beb98db39f1', 2, '2', 'box', '2', '2', '20', '20', NULL, NULL, NULL, NULL, 'data:image/png;base64,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', NULL, '2022-07-01 09:08:29', '2022-07-04 13:06:04'),
	('84653631', '49154828', 3, '3', 'box', '4', '3', '3', '11', '4', '3', '3', '11', 'data:image/png;base64,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', NULL, '2022-07-06 11:45:04', '2022-07-14 09:09:39'),
	('89223487', 'M81079666', 3, '3', 'box', '30', '30', '30', '12', '30', '30', '30', '12', 'data:image/png;base64,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', NULL, '2022-07-20 11:02:17', '2022-07-25 11:55:06'),
	('89562813', '1562beb1038a388', 2, '2', 'box', '2', '2', '2', '2', '2', '2', '2', '2', 'data:image/png;base64,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', NULL, '2022-07-01 08:32:03', '2022-07-08 06:30:39'),
	('90476756', 'M51651626', 1, '4', 'box', '44', '4', '4', '44', NULL, NULL, NULL, NULL, 'data:image/png;base64,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', NULL, '2022-07-25 11:57:59', '2022-07-28 12:44:01'),
	('94366851', 'M24400637', 0, '2', 'envelop', '302', '303', '300', '15', NULL, NULL, NULL, NULL, 'data:image/png;base64,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', NULL, '2022-07-18 11:36:32', '2022-07-26 09:05:38'),
	('94436041', '74262758', 1, '3', 'envelop', '3', '3', '3', '3', '3', '3', '3', '3', 'data:image/png;base64,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', NULL, '2022-07-07 06:16:01', '2022-07-08 08:02:58'),
	('97486945', '1562c53bcbc54df', 2, '5', 'box', '5', '5', '5', '5', NULL, NULL, NULL, NULL, 'data:image/png;base64,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', NULL, '2022-07-06 07:37:47', '2022-07-28 13:19:34'),
	('d1ni24ut8', '1562a3314856e54', 1, NULL, 'box', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-10 11:55:52', '2022-06-10 11:55:52'),
	('dow3ecdr8', '1562aae8b3b573d', 2, '3', 'box', '3', '32', '3', '3', NULL, NULL, NULL, NULL, 'data:image/png;base64,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', NULL, '2022-06-16 08:24:19', '2022-07-08 07:47:47'),
	('e4we4m2fx', '1562aae4a04bb5b', 1, '4', 'box', '4', '3', '3', '4', NULL, NULL, NULL, NULL, 'data:image/png;base64,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UiaptzJNS+J5E0EdhwLyvf4i6r3RgtGCLejKr4jFmzAQEATU5tV4FzNKZnoprrxeW1S5sgrGw6ghU1+1OqW/NwPbO05UATcD2kvo3uuwCsYqWChhokyvKkgpwL2JhwIa/TVGtftJFKF5cacFowWjBRtguaiknRYvTBFG7edGAfneqhAtzLRglTt3o0CjgGYQm2scIKDRr91Qii3qAarC5FV+Xd83PCA8oFBL6w3AUmDxRsT2FkcRvtej8o4TLczzVgGVAo1/BwEQAIFaBNzvA6q9AOeBAAiAwNgtGBCCAAiAQNcIoIC6RpTxQAAE3AhAQG6oOBAEQKBrBCCgrhFlPBAAATcCEJAbKg4EARDoGgEIqGtEGQ8EQMCNAATkhooD5yMC33//fbrlllvSk08+mT777LM8xZNPPjndeOONadVVV52PU2ZOAwhAQFMaDt9++21OtOeee25iCdflHP7999/01ltvpZtvvjm99tpraZ111kkHHnhgOuuss9KGG27Yepd+/PHH/Nmfeuqpob9DQNMT1BDQ9Nyr/kz//vvvdP3116cbbrgh/f777+nwww//3yt+l3PojXXBBRcsczd22mmn9PDDD6dNNtlkmb+98sorae+9906XXnppOvvss9Oaa645hXdz+Z4yBDSF99+UwoknnphOPfXU9OKLL6ZNN930fyegLudgzz898cQT6auvvkpHHXVUWnfddZOpm4suuijdcccd6Z577klLlixZ5k498sgj6dprr83nbrHFFlN4J5kyBDQPYuDzzz9PV1xxRXrmmWfybPbff/905plnpm222ab/tHpvmr22x9qS888/P51wwglZHfQ8jy+++CIroqOPPjq3J20/d911V3rwwQfTo48+mjbeeON8SJdzsPEuu+yyTCg2h3PPPTd99913ya5rD1GeccYZaeWVV0733nvvSOL46KOP0sEHH5xJ6eKLLw4T0HvvvZfPN5Vk+Ky++up5DFNcV111Vbr99tuzutpjjz3mQRQsn1OAgCZ83z/55JN03HHHpXfffXdoJkYMDzzwQNptt92GWi9LnNdffz099NBDaZVVVklHHHHEEAH99NNPmZSMvNqStkcOdj0bY+21105dz2HwGn/88Uf2dOzH5vr111+nN954I/9uJGUqp/TkfY+ATOmZF9Q755JLLhl5195+++1krZspK1NJRmD2We36di3D78gjj8wkf84556SVVlppwlGw/F4eAprgvTf/xhLrww8/zBV6hx12SCussEL64IMPcmJusMEG6dZbb+1Xbkuc0047LVduq9o//PDDMgRkCW9J9c8//+QxV1xxxWTeipGVJfxff/2V/24/5iNZknY9h0GiMDVnXtWVV16ZWylrHY0YLfmt1SqtVtm87PjLL788Pf3002n77bcPE5Cd8Ouvv6bzzjsvvfPOO+mxxx7LhGsEvXjx4rx6hm80wQSw91F5vxl1stNcmFe3ZeNDDjkkWUW3FZ/BH2uRbEXo8ccfT5tttln65ptvcuLssssu/ardRkC95Df1YAn8559/5pbM2g5TA2uttVZO/o022igTwVzOwfwZIw+bs5HcSy+9lH/feuut+4qmRECmyg477LD8X0mleD0gay9N8Wy++eZpvfXWS2+++Wa677770lZbbbUwA2uKPhUENMGbZVV55513Ls5g/fXXTy+88ELadttt80rPxx9/nH0USyL7KRGQJeb999+fPZ4vv/wyXXfddem3337LSmDLLbfMqsnaEvv/XM3B1JaNbXNZbbXVMuEYEQz+bp+hjYCMFM10ts99zTXX9BVgEygvAdl5vbbrl19+SXfffXc69NBDJ3jnuXQPAQhogrHgTX4zmY0sXn755ZGz3WeffXKCf/rpp+n000/Pq0NW7e3HNuwZEZjSsrGsJdp1113dBBSdg7WJNQT0/vvv57lvt9126eqrr05rrLFG8TN7CcjaOWu/TjnllPTzzz9nAjI1qb5gYIKhsdxcGgKa4K3umay33XZb2muvvYoz6SkdLwEZ2VjbZS3Qs88+m4499thk3tBNN92U2xlbPbP2zozquZpDlICMJGxp30hizz33HKl8ekB5Cahnshv5midm3k/T4J9gGCzXl4aAJnj7ba+LtRpmlJrpvOOOO+blae9PqQWzlSZTOfvuu29u28xsNi/o+OOPT7vvvntu63pL8HM1h0gLZga5+UO22nXAAQdk47m3ZD4KCw8BGRnbVgDbaW3tq5n8g7/32lkv5hzXLQIQULd4hkezqn/MMcck27/T/FGPFJQIqLcUb4bvhRdemFe/bFXMVsPM1Lb2prcEb9ecizlECMj8KdVi9pbWBzFSBNTbYW3Kb3C/T88POuigg7LS4pmxcNh2dgIE1BmUdQNZ62FtkLUFr7766hAR1RKQqR0jGzN47Vmx/fbbL0/u+eefz5scm+POxRzmAwEZ2Z500knZfDc8evt9ehsRjXzuvPPOvNKGH1QXv+OeBQGNiyDngwAIVCMAAVVDx4kgAALjIgABjYsg54MACFQjAAFVQ8eJIAAC4yIAAY2LIOeDAAhUIwABVUPHiSAAAuMiAAGNiyDngwAIVCMAAVVDx4kgAALjIgABjYsg54MACFQjAAFVQ8eJIAAC4yLwH06kyjZLzJbJAAAAAElFTkSuQmCC', NULL, '2022-06-16 08:06:56', '2022-07-04 13:07:39'),
	('nz08ox2wn', '1562a1ed0dc0fb5', 0, '123', 'envelop', '123', '123', '123', '123', NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-09 12:52:29', '2022-06-09 12:52:29'),
	('ohiis3j26', '1562a1e6a683caf', 3, '12', 'envelop', '12', '12', '12', '122', NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-09 12:25:10', '2022-06-09 12:25:10'),
	('pf30yib1q', '1562a1dd1ca5ada', 1, '123123', 'envelop', '123123', '123123', '123123', '123123', NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-09 11:44:28', '2022-06-09 11:44:28'),
	('qti2bv1kd', '1562aae17e96fdf', 3, '3', 'envelop', '3', '3', '3', '3', NULL, NULL, NULL, NULL, 'data:image/png;base64,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TcJGG20Uyy37WDl0zz33JE+zzz77lDwR80eOPvro/vFbb711JJrNN9/cdccff/xxOPTQQyMpXXrppSUC2nnnncNxxx0XbrnlljjmYnwnnXRS9IWM1MxbsVLqhRdeCNtvv33pmp9++mksH0844YR4X3///Xe44447wu677x7v/dFHH41jz1FAn332WVi0aFG8jpHmlltu2b+m4XvbbbeFF198MSpIK0P//fffsO++++IBuaJhcgdBQJPD1nVmM1NNYVhiVD8nn3xyTJAuCejUU0/tG7ZFCbbSSisFM3JfeeWV0pCvu+66cM4554TlllsuvPfee+Hggw+OpWJh+BYHP/DAA5HUnn322bDjjjsO3XdBnl4CMtI+7bTTwk8//RQefPDBsMUWW/TPaUR67LHHho8++iiJb1dmuitA5vlBEFCHE/z777+H008/Pbz77rvh+uuvD6ZiVlhhhfDDDz/EpF1ttdWGVugmJZgltJ3fq4BMwZiKuPrqq8OTTz4Zdthhh5ICevnll8Pee+8df7/ddtsFUxhnnnlmsPuxa6233nrxv+3efvvtt3iu1VdfPZ6j+Ln99+233x5WWWWVsQjIPCwjaiMfI7ZBhZfC14z5Cy+8MGLNLliHCWAvkONh1O4moChzTCVYOVK8o2fUNvE0CMjKmSOPPDL+c+6554bll1++RED2/0Yq6667bh88Ix5TS6aKrESzj5VnRkKDZVhRfl111VVxp63u41VAZp5bifrdd98NkY+d9/333w8HHHBAsF2zwseyn7MN313MV68MAXU4F6+++mpUEtVSo0sCMoKzZDXPyEqqQYUyahes6DcavJcvv/wykpjt2hVlmKmU++67L26zm8fVlICee+65sMEGG4QvvvgiekaDnk9xzib4dhgOy+SlIaAOp91KoiOOOGKpISBTDOalWFl17bXXxt2owU8uAZnRawrFFJUpJlNOpoist+jyyy+PXlFTAiq8M1OP5jVZOVgt55rg22E4LJOXhoA6nPZCNTz11FOlcqTY0dlmm22SHtDChQuHzN3UrSgPyDwfa0S0re+99tprSPkU500RULHrdffdd0fPaKuttuoPxe7RuqftHs28tnHfeeedteZz8SVvCWY9Sq+99lokzQsuuKBULtq5CnxNLR144IH9MY3Ct8NwWCYvDQF1OO1F/8vaa68dt+HNvH3jjTdiMtmuTbELNrhLY36HJfSKK64Yv7PZZpv1vaMmBGTk8dJLL0X/JqUkqgRk4zSFZOP+66+/4vfNhN5jjz2GjGXrKbKSbrfddos9RkZEVoatscYaSeS9BGTHWde2lXNW4p133nnx34Vn1QTfDsNhmbw0BNThtFuJYj7LxRdfXBrFQQcdFBPUSKa6S/Pnn3/GJkEzYAc/g31AhYeU6hsaPLZQNbazlfoUvs6oY3faaaehLfDifEY4tuVuu0777bdfyRC2Y9R47ZhBb6n6KEbRzW1lmKkw853M0Dd8rbvaCH3wYyrM1Jh92AXrMAHYBesWfLu6bRVbw571r9jHGvBOPPHEcM011yQT5Jdffgn33ntvfLq96B+aBgEZ+T3//PNxd+uDDz6I17Zt7/333z+cddZZpefGBpEtdr6MgOpaAcYloAJHI5rHH388NjWa8W0kZPja/1vZZx9rlrRS035m3d8QULc5gALqFv/aq7NNvBROCkOaCAIQ0ERgHe+kENB4+PHt2UEAAloK5woCWgonhSFNBAEIaCKwjndSCGg8/Pj27CAAAc3OXDFSEJh3CEBA825KuSEQmB0EIKDZmStGCgLzDgEIaN5NKTcEArODAAQ0O3PFSEFg3iEAAc27KeWGQGB2EPgfO2LoNtuaB8YAAAAASUVORK5CYII=', NULL, '2022-06-16 07:53:34', '2022-06-16 07:53:34'),
	('qvht1m8al', '1562a83b6960ee6', 1, '2', 'box', '65', '3', '4', '4', NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-14 07:40:25', '2022-06-14 07:40:25'),
	('r6nkspesf', '1562a2f5e5769c2', 1, '50000', 'box', '50000', '50000', '50000', '50000', NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-10 07:42:29', '2022-06-10 07:42:29'),
	('unwq11uyv', '1562a1dd1ca5ada', 2, '897', 'envelop', '897', '897', '897', '897', NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-09 11:44:28', '2022-06-09 11:44:28'),
	('xvt5a3ygf', '1562a1dd1ca5ada', 1, '765', 'envelop', '765', '765', '765', '765', NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-09 11:44:28', '2022-06-09 11:44:28'),
	('xww6r0f49', '1562a83e5d1d8bb', 1, '2', 'box', '3', '3', '3', '3', NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-14 07:53:01', '2022-06-14 07:53:01'),
	('yadl8yzwq', '1562a2f5e5769c2', 1, '00000', 'box', '00000', '00000', '00000', '00000', NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-10 07:42:29', '2022-06-10 07:42:29'),
	('yfn31s8lt', '1562aae43473fa0', 1, '2', 'box', '2', '2', '2', '2', NULL, NULL, NULL, NULL, 'data:image/png;base64,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gPrFc6G09txzz4WddtopnH/++eG0004Lyy67bKf7Nif0sDEjlfvuu29EQkYSr732Wrj66qvDE088MbpnHwT00EMPhWOOOSb88ssvY5/lxBNPDJdffnmrsrO+X3HFFRMVkCnE/fffP5x55pnh4IMP7oQVF/eLAATUL54LpTXPpMvpyJNPPhkWXXTRsO2220alYYro1ltvjeRmxGCT1/598cUX4aCDDgoffvhhOO+888IyyywTjjvuuM4K6Keffooq5/fffw9XXXVVWHfddePDrl9++WVULm+99VaSYDxYQEA51bBw3wsBLVy8R3ezh0MtrzEb89RTT4VNN9201pOPPvoo2gWbmKeeemrt+4LUpPvuu+/iSr/NNtuEAw88MFx66aXhsccei4RhbZnSUDnRxx9/HPbbb79w8cUXhz322CP27c8//ww33nhjbNfs0QMPPBCzmEkK6PPPPw/XX399ePzxxyOBbb/99uHss8+OdmiRRRaJ7ZqlPPTQQ8Paa68dlc5iiy0WXzeMbr755qjC7F5rrLHG2GilsDAys896yy23JEd45513Dnb9SiutNKMq4LYQ0Axr4J133gm77757OOOMM8ZI5o477ohqwHKeDTbYIFx00UVRdUz6NySCIQH99ttv4eeffw7vv/9+7bLbb789HHnkka1N2aQ35XHttdeGTz/9NE7gVVZZpfW9Q+uWIiC73ojFcqXqv2ZobPc0kjrllFPC8ccfH7FYeeWVI2ldeOGF4YQTTohqzFRa8x8ENMMC7uHWEFAPIJY2YVbH8g2zIEY4K6ywQmzKchCbdPb/Q0VQQkDPPvtszIouu+yysPHGG0frZKHuZpttFq677rqw5JJLjrr+6quvhq233nr0/0cffXQkvRT52BsVAdnfzUJZwL355ptHFffNN9/E/GjHHXcM66yzzuh+f/31V7jtttvCueeeGwNo+2dhuJHu3nvvPVJFXgKqvg8LVlqh078OApo+xhPvYKv8EUccEZ555pnRTtIHH3wQDjjggLjNbpYld9INFdCPP/4Y7rzzzrD++uvHJoa2xGxR03o0CcjebxbQ+lCqgCxbMotmJGLKprqT1fxMpoJefPHFaM/efvvt+GezjBYcm/pJXavsqLUDAc24yCfcHgKa8dh89dVX4bDDDou5yjnnnBNVgmVDL7/8ck0VVbupJt2QgGwLvXouaBIBVdu3TMYUmdkfy4suueSSVgWiFJApPMuf7L8VV1wx5lH77LNP2GKLLWrtGfnYdr4F2jvssENUfWYdbZfv6aefjiqRXbAZF+qUbg8BTQlYb7N///13tCmvv/56tCqLL754zGfsHE4qp5k2AVnfzRIZIVp+lApqFQFZO0YuFj7bgUlTe5YH2fa+Edzw4OBwd80sp+VTq666aoTPFNzJJ58cnn/++dagfmgD2Yb3Vtv8ex8ENA/GxLaZbcfJJqXZjrPOOitap7XWWqu1dwuDgIw4jBjfeOONTgRU/QB2jsiUndmxvfbaK2ZMFiwP7Z+dL7IAuqn2zMbZTljbGR6FRdWCWf7VbH8eDP9/ugsQ0DwY/mEYvfTSS8dDhTYpzX607fp4Vv2uFsxCcTsaYIGw2cNUX5QCslB59dVXD1tuuWVYbrnlohqy/MlOWNuWuu3ymeKzzMusme2OmV2z7fjqOSCzYW1HFTxY2HtsV8/Iy7b3bbdteM5oHgz9f74LENA8KQGbzKYMjIRs633Sow1q1c8hoEnnZZohtOdsTXVLPrVzZyrv3nvvDXvuuWdE/48//oh2zwip7V81A1J9aDvbk2qfc0CzL34IaPZjEHvw2WefxZB2tdVWS4bPw65Ok4AsLLadN+vLLrvsUguL1eS3/lUJyB6YNVtp+c+7774bVY+FzKaANtxww9rhSiMJUzrDZ8GMpIyE7SDmbrvtNuqH6kOKVGxr305333XXXaOHdyGg2Rc/BDT7MYg9GG69n3766cnweZ50lW6AQG8IQEC9QVnWkAWzdu7FiGf55Zev7QKVtchVIPD/gwAENKOxaloJsyf2dRh2Hoh/IPBfQQACmtFIDwnIAmfLIux5MHvAU/3E8Yy6y21BYCoIQEBTgZVGQQAEPAhAQB6UeA8IgMBUEICApgIrjYIACHgQgIA8KPEeEACBqSAAAU0FVhoFARDwIAABeVDiPSAAAlNB4H+yhr42z1NQQwAAAABJRU5ErkJggg==', NULL, '2022-06-16 08:05:08', '2022-06-16 08:05:08'),
	('zdew0xb9u', '1562aae404aa00a', 1, '3', 'box', '3', '3', '3', '3', NULL, NULL, NULL, NULL, 'data:image/png;base64,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OqrfyXH+8847L7br4YcfDiuttFJ466234r4bbrhhbNdss80Wj//333+Hc845J1x11VXh1ltvDeuvv34oCGi11VYLe+yxR7RW9913X9wf+dbee+/dz7YeeuihqH4eeOCBSHjFBmV05plnhhdeeCG2db755usft54tFbgDn9tuuy3MM888HVbB+D61CKjD+88ICB36wAMP7Lfwgw8+iGTx/vvvj2o1CKRMQB6rBELZa6+9IiHVia44wemnnx7t1i233BKefPLJSAgFyRSE8txzz4Xjjz8+vPnmm5FUECiDENC5d9555/hdfAbSe/bZZ8NOO+0UifCII44IM8wwQ58oZp555kjKOE95A7kdfvjhkfBwzFNPPTXcc889sd3lDX87//zzw1133RUmTpwoAuqwtr2nFgF5kRqj/X799deoLrCh4xXKAZ+DjF599dXYyRC6zjTTTOG7774LRx99dPz/goAKYnvvvffiZyuvvHK0Su+8804kioUWWihcccUVsUODBKBgsB/+jTAZRADiQcCMv2O78MILw9VXXx1zHnTwpZZaKrz77rvR7jzyyCN9dBBOIwzGVlzLyy+/HHMbWDMQHhQHyHWOOeaI+xUK6IknnoiKCUpmxRVXDFAoBx98cDwOyAXtxrE22WSTsN1220UiWnDBBSNp4fMLLrggvPLKK5HAoKYsaycFNEbF7DiNCMgB0ljtAnuCjg6SgfWZf/75+6d+++23w+abbx6JYc899+x/3pQBwZptu+224aSTTgpbbbVVpfmwU5dddlm48847Y36C40FZXXfddeHPP/+MlgztQIefc845o1JZZJFFokLCvk899VQkCOyPY80+++zRaqFNyIFgqcpqCiQCxbPkkkvG63n++edHBcUFUUAN4bgLLLBAv81ox3777dcnlYLUYOGaNhBSodBEQGNVufnnEQHlYzf0byK/OOWUU2I+Up/JQceHOnjppZfCmmuuOZCAoAbWWmsts33lTooOfuONN8bc5Kuvvooq4rfffosqbOmll47WCTYK/4VKghUqts022yyqEEy/f/bZZ1GVIJguFFCxX2G7fvnllzBp0qS4X3kbFEIX11K+7h9++CEeB+0G2WL2CyQHxVYoNFmwoZfnFDmgCGiKwJp+UGQ2+++/fySgpqls2B503GETEDr4AQccEG0V1Ak22LpZZ501qicQz9lnnx3WXnvtqIrQ0WHpYLWgdmDtsBUKDSQF9VVs9WlzEAdsWPmVn6kE1IRuEUK/9tprMXOC3ZMCSq/Dsf6GCGisEW8437fffhttBqwMppib3sdbKIEHH3wwbLHFFv2jFGHz8ssv38+AYKlwrCuvvDJssMEGA6/w448/jrYLuRJmlnbbbbfwxx9/hEsvvTTmP8iXYNkQ+BYkc+SRR8YwuvzaUBAP1FM5oMaJi/aBzJAxIfuprxeyiAKkguNec801jaFz+cKK80CVIedC26zjfvrpp3EmDbmZZsG67QAioG7x7we1yFmKWaGmJhVT5pheBiEgkIW1gVXCrFh5FuzHH3+MmQzyEnRGBLLobE3bN998E1UOgt0PP/wwZlDIgjAdvu6660ZCgT3DQkMcF+d54403YkBe5EuYMkc71ltvvRhuF8E5lBT2//fff2OmBbVU/neRcRVEgWs699xz4xQ62oD1Rgih68ctrgPHxXcRXoP8EJ5D/SBvwlbkY1BFOD+UG4J5WEQE1QjyRUDddgARUIf4Y/bpoosu6s961ZtS7iDWvrvuumvseNjK0/DIk/A3EFd9K5NVMRWPaW10TATNOBdmwxBUYzaqsDQ4jnXc+irkIlCHkirW++D7RR6ErAgkhmfXyrNg9bY2rW5GGxGwl7flllsuztKtvvrqlc+vv/76aPnq+2IGDjZTBNRhB8Av5np/GbXbZv5/np2tA6qP0FA0sFXFDBAW6MFK4LOvv/66QkCwL7BisDxPP/10hYjKBASlAbIBeZXtHRb8YeFifX0RjovpdywmhEKZccYZY/B83HHHVZ7DAnmhfVBGOD5muLAVCxFBPrBWsJxoA84HJYVjI1hGiLzpppuGQw89NCy88MKVAigICM+ArbHGGvEYsF7FtH55Z2CM3AnXh0c3irZCNd1///0ioI67lgio4xug0wuB8YyACGg8331duxDoGAERUMc3QKcXAuMZARHQeL77unYh0DECIqCOb4BOLwTGMwIioPF893XtQqBjBERAHd8AnV4IjGcEREDj+e7r2oVAxwiIgDq+ATq9EBjPCIiAxvPd17ULgY4R+B/xQWNFEqFcvwAAAABJRU5ErkJggg==', NULL, '2022-06-16 08:04:20', '2022-06-16 08:04:20');
/*!40000 ALTER TABLE `packages` ENABLE KEYS */;

-- Dumping structure for table kargo_com.package_statuses
CREATE TABLE IF NOT EXISTS `package_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL DEFAULT '0',
  `status_name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table kargo_com.package_statuses: ~6 rows (approximately)
/*!40000 ALTER TABLE `package_statuses` DISABLE KEYS */;
INSERT INTO `package_statuses` (`id`, `status`, `status_name`) VALUES
	(1, 0, 'Pending'),
	(2, 1, 'Courier collected'),
	(3, 2, 'At the facility'),
	(4, 4, 'On the way to the destination'),
	(5, 5, 'Cancelled'),
	(7, 3, 'Ready to delivery'),
	(9, 6, 'On Waiting'),
	(10, 7, 'Delivered');
/*!40000 ALTER TABLE `package_statuses` ENABLE KEYS */;

-- Dumping structure for table kargo_com.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table kargo_com.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table kargo_com.payments
CREATE TABLE IF NOT EXISTS `payments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL DEFAULT '0',
  `deny_message` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `method` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL COMMENT 'payment, paypal',
  `money_type` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `amount` float NOT NULL DEFAULT '0',
  `comission` float NOT NULL DEFAULT '0',
  `kur` float DEFAULT NULL,
  `document` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `payment_comment` json DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table kargo_com.payments: ~13 rows (approximately)
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` (`id`, `userID`, `payment_status`, `deny_message`, `method`, `money_type`, `amount`, `comission`, `kur`, `document`, `payment_comment`, `created_at`, `updated_at`) VALUES
	(1, 14, 2, NULL, 'PayPal', 'usd', 124, 120, NULL, 'photo_2022-06-19_01-59-46.jpg', NULL, '2022-06-20 10:30:36', '2022-07-20 06:55:06'),
	(2, 14, 1, '312sasda', 'payoneer', 'tl', 1412, 1200, NULL, 'photo_2022-06-19_01-59-46.jpg', NULL, '2022-06-20 10:31:07', '2022-07-13 13:44:14'),
	(3, 14, 1, 'asdasdas', 'PayPal', 'euro', 556, 584, NULL, 'photo_2022-06-19_01-59-46.jpg', '"asdasd"', '2022-06-20 10:34:14', '2022-07-20 07:30:50'),
	(5, 14, 1, 'Nothing', 'PayPal', 'tl', 100, 0, NULL, 'photo_2022-06-19_01-59-46.jpg', '"asdadasasda"', '2022-06-20 12:31:17', '2022-06-20 12:58:37'),
	(6, 14, 1, 'asdasdas', 'payoneer', 'euro', 4123, 0, NULL, '1d6lopkfl.png', '"Note"', '2022-06-20 12:57:07', '2022-07-13 13:48:31'),
	(7, 14, 2, NULL, 'banka_hevale', 'euro', 123, 49, NULL, '84653631 (1).png', '"sdasdasdasd"', '2022-07-08 12:53:46', '2022-07-13 10:16:27'),
	(8, 14, 2, NULL, 'banka_hevale', 'tl', 33, 26, NULL, 'cargo_request (4).pdf', '"asdasd"', '2022-07-13 11:40:04', '2022-07-13 12:51:06'),
	(9, 14, 1, 'Test', 'payoneer', 'tl', 2000, 1700, NULL, '84653631 (1).png', '"Testing"', '2022-07-13 13:49:45', '2022-07-13 13:50:29'),
	(10, 14, 2, NULL, 'PayPal', 'euro', 12, 10.8, NULL, '53287047 (1).png', '"asdasdasdas"', '2022-07-18 12:18:30', '2022-07-25 07:19:52'),
	(11, 22, 2, NULL, 'payoneer', 'tl', 300, 14.15, 18.0153, 'Bulud hesablama (1).pdf', '"Kur testi"', '2022-07-20 05:42:12', '2022-07-20 06:54:55'),
	(12, 22, 2, NULL, 'banka_hevale', 'tl', 4000, 3600, 18.0153, 'download.png', '"Banana payment"', '2022-07-20 06:47:14', '2022-07-20 07:25:58'),
	(13, 22, 0, NULL, 'PayPal', 'tl', 3333, 166.51, 18.0153, 'download.png', '"asdasdasdasdasd"', '2022-07-20 07:31:25', '2022-07-20 07:31:25'),
	(14, 22, 0, NULL, 'payoneer', 'tl', 4500, 212.32, 18.0153, 'download.png', '"oiuyhgtrfed"', '2022-07-20 10:21:48', '2022-07-20 10:21:48'),
	(15, 10, 2, NULL, 'banka_hevale', 'tl', 120, 52, 18.0254, '89223487.png', '"asdasdasdas"', '2022-07-22 09:37:14', '2022-07-25 07:22:20'),
	(16, 8, 1, 'asdasd', 'PayPal', 'euro', 4455, 4009.5, 18.0254, '72292385.png', '"asdasdasd"', '2022-07-22 09:39:52', '2022-07-25 10:02:30'),
	(17, 14, 0, NULL, 'banka_hevale', 'tl', 1200, 52.47, 18.0682, '89223487.png', '"asdsdaasdasdasds"', '2022-07-25 11:34:45', '2022-07-25 11:34:45'),
	(18, 4, 2, NULL, 'PayPal', 'euro', 2000, 1760, 18.1885, '12 Düzbucaqlılar düsturu..pdf', '"Just testing payment"', '2022-07-28 10:45:12', '2022-07-28 10:52:25');
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;

-- Dumping structure for table kargo_com.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table kargo_com.permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Dumping structure for table kargo_com.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `token` varchar(64) COLLATE utf8_turkish_ci NOT NULL,
  `abilities` text COLLATE utf8_turkish_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table kargo_com.personal_access_tokens: ~7 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
	(1, 'App\\Models\\User', 7, 'token', '3b2ec441a82438dcf6e1f01badc1da14336b7231ad049861c97e33ebf3bc5c46', '["*"]', '2022-04-24 19:58:03', '2022-04-24 19:53:22', '2022-04-24 19:58:03'),
	(2, 'App\\Models\\User', 8, 'token', '161e0ef291c1d0551572ff081cdebfe3503e5a8487880613da75d8d793e0f663', '["*"]', NULL, '2022-04-24 21:15:32', '2022-04-24 21:15:32'),
	(3, 'App\\Models\\User', 8, 'token', 'c2ce9ac7e852a7b6297819576eb2b5e21904b711b4d9eb36a5811ecd0c412bb8', '["*"]', NULL, '2022-04-24 21:50:23', '2022-04-24 21:50:23'),
	(4, 'App\\Models\\User', 8, 'token', '6742fa6e3ce923690b1a2fda4dcfe80a10ea1f2aeb60708d06735f265ecc481a', '["*"]', NULL, '2022-04-28 17:29:05', '2022-04-28 17:29:05'),
	(5, 'App\\Models\\User', 8, 'token', '79163bccbac42bfda9301d5106616dd6aa882f4f388449ebb7ba8000310f500a', '["*"]', NULL, '2022-04-29 06:40:38', '2022-04-29 06:40:38'),
	(6, 'App\\Models\\User', 8, 'token', '985e3ed2465e6a02c46a12fd19286736091a7ac5faf26a38160a6d254ffeaf82', '["*"]', NULL, '2022-05-06 12:57:10', '2022-05-06 12:57:10'),
	(7, 'App\\Models\\User', 8, 'token', '45f63167fa8c81a4647cd78a0e4e19ab564b5878f072d8119874e1455951d103', '["*"]', NULL, '2022-05-06 13:02:17', '2022-05-06 13:02:17');
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table kargo_com.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cargo_id` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `package_id` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `sku_code` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `product` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `count` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `weight` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `gtip_code` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table kargo_com.products: ~51 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `cargo_id`, `package_id`, `sku_code`, `product`, `count`, `weight`, `price`, `gtip_code`, `created_at`, `updated_at`) VALUES
	(50, '1562a1dd1ca5ada', 'pf30yib1q', '000123', 'asdasd', '000123', '000123', '000123', '000123', '2022-06-09 11:44:28', '2022-06-09 11:44:28'),
	(51, '1562a1dd1ca5ada', 'pf30yib1q', '12300123', 'Smth', '12300123', '12300123', '12300123', '12300123', '2022-06-09 11:44:28', '2022-06-09 11:44:28'),
	(52, '1562a1dd1ca5ada', 'xvt5a3ygf', '765', '765', '765', '765', '765', '765', '2022-06-09 11:44:28', '2022-06-09 11:44:28'),
	(53, '1562a1dd1ca5ada', 'unwq11uyv', '897', '897', '897', '897', '897', '897', '2022-06-09 11:44:29', '2022-06-09 11:44:29'),
	(54, '1562a1dee97b863', '4e8knbc09', '34545', '34545', '34545', '34545', '34545', '34545', '2022-06-09 11:52:09', '2022-06-09 11:52:09'),
	(55, '1562a1dee97b863', '4e8knbc09', '9876544', '9876544', '9876544', '9876544', '9876544', '9876544', '2022-06-09 11:52:09', '2022-06-09 11:52:09'),
	(56, '1562a1e6a683caf', 'ohiis3j26', '12', '12', '12', '12', '12', '12', '2022-06-09 12:25:10', '2022-06-09 12:25:10'),
	(57, '1562a1ed0dc0fb5', 'nz08ox2wn', '65', 'asdasd', '65', '65', '65', '65', '2022-06-09 12:52:29', '2022-06-09 12:52:29'),
	(58, '1562a2e3504dbad', '647lgtkic', '865', 'Saat', '865', '865', '865', '865', '2022-06-10 06:23:12', '2022-06-10 06:23:12'),
	(59, '1562a2f5e5769c2', 'yadl8yzwq', '000002', 'Zero Two', '000002', '000002', '000002', '000002', '2022-06-10 07:42:29', '2022-06-10 07:42:29'),
	(60, '1562a2f5e5769c2', 'yadl8yzwq', '000001', 'Zero One', '000001', '000001', '000001', '000001', '2022-06-10 07:42:29', '2022-06-10 07:42:29'),
	(61, '1562a2f5e5769c2', 'r6nkspesf', '50001', 'Five Zero One', '50001', '50001', '50001', '50001', '2022-06-10 07:42:29', '2022-06-10 07:42:29'),
	(62, '1562a3314856e54', 'd1ni24ut8', NULL, NULL, NULL, '222', NULL, NULL, '2022-06-10 11:55:52', '2022-06-10 11:55:52'),
	(63, '1562a83b6960ee6', 'qvht1m8al', '776884', 'Qolbaq', '3', '4', '23', '88662', '2022-06-14 07:40:25', '2022-06-14 07:40:25'),
	(64, '1562a83b6960ee6', 'qvht1m8al', '121551', 'Saat', '3', '2', '12', '123', '2022-06-14 07:40:25', '2022-06-14 07:40:25'),
	(65, '1562a83b6960ee6', '3qrbj146s', '000521', 'Sirga', '2', '12', '12', '33124', '2022-06-14 07:40:26', '2022-06-14 07:40:26'),
	(66, '1562a83e5d1d8bb', 'xww6r0f49', '23551', 'Gumus Boyunbaq', '4', '4', '456', '4412325', '2022-06-14 07:53:01', '2022-06-14 07:53:01'),
	(67, '1562aacc0a29f22', '2bb1yycmh', '3', 'Clock', '12', '2', '12', '1231', '2022-06-16 06:22:02', '2022-06-16 06:22:02'),
	(68, '1562aae17e96fdf', '65s5h6jpw', '2', 'Bar 1', '2', '2', '2', '2', '2022-06-16 07:53:34', '2022-06-16 07:53:34'),
	(69, '1562aae17e96fdf', 'qti2bv1kd', '23424', 'Bar 2', NULL, NULL, NULL, NULL, '2022-06-16 07:53:34', '2022-06-16 07:53:34'),
	(70, '1562aae404aa00a', 'zdew0xb9u', '5657', 'Just Package', '2', '12', '123', '7878', '2022-06-16 08:04:20', '2022-06-16 08:04:20'),
	(71, '1562aae43473fa0', 'yfn31s8lt', '2', 'Just Package', '2', '2', '2', '2', '2022-06-16 08:05:08', '2022-06-16 08:05:08'),
	(72, '1562aae4a04bb5b', 'e4we4m2fx', '15651', 'Ango Watch', '3', '3', '344', '26236', '2022-06-16 08:06:56', '2022-06-16 08:06:56'),
	(73, '1562aae8b3b573d', 'dow3ecdr8', '67722', 'Ayaz\'s cloth', '2', '2', '34', '22561', '2022-06-16 08:24:19', '2022-06-16 08:24:19'),
	(74, '1562ab143344ac6', '1d6lopkfl', '3133', 'Coccoo', '2', '2', '2', '2', '2022-06-16 11:29:55', '2022-06-16 11:29:55'),
	(75, '1562ba9fdaa7807', '35270773', '12356', 'Engineering tool', '3', '33', '34', NULL, '2022-06-28 06:29:46', '2022-06-28 06:29:46'),
	(76, '1562ba9fdaa7807', '60838968', '12', 'Additional', '1', '23', '23', NULL, '2022-06-28 06:29:47', '2022-06-28 06:29:47'),
	(77, '1562bab3190ef4f', '70259842', '123123', 'Clock', '2', '2', '2', '1234', '2022-06-28 07:51:53', '2022-06-28 07:51:53'),
	(78, '1562beadcc35b27', '11912353', '2', 'Samoa Clock', '2', '12', '12', '12', '2022-07-01 08:18:20', '2022-07-01 08:18:20'),
	(79, '1562beb1038a388', '89562813', '2', '2', '2', NULL, '2', '2', '2022-07-01 08:32:03', '2022-07-01 08:32:03'),
	(80, '1562beb1038a388', '29016950', '12', '12', '12', '1', '12', '12', '2022-07-01 08:32:04', '2022-07-01 08:32:04'),
	(81, '1562beb98db39f1', '80675713', '545443', 'Stpa', '2', '12', '123', '545443', '2022-07-01 09:08:30', '2022-07-01 09:08:30'),
	(82, '1562beb98db39f1', '34303720', '545443', 'PTSA', '2', '3', '123', '545443', '2022-07-01 09:08:30', '2022-07-01 09:08:30'),
	(83, '1562beb98db39f1', '42396873', '545443', 'TSTSA', '1', '2', '23', '545443', '2022-07-01 09:08:30', '2022-07-01 09:08:30'),
	(84, '1562c3d4fc764cc', '11097978', '312', 'Shirt', '3', '3', '32', '2355', '2022-07-05 06:06:52', '2022-07-05 06:06:52'),
	(85, '1562c3d4fc764cc', '64382375', '2352', 'Trousers', '2', '2', '21', '77633', '2022-07-05 06:06:52', '2022-07-05 06:06:52'),
	(86, '1562c3d4fc764cc', '49219242', '41231', 'Hat', '4', '4', '4', '4234', '2022-07-05 06:06:52', '2022-07-05 06:06:52'),
	(87, '1562c3d4fc764cc', '51503643', '1245', 'Shoes', '1', '1', '112', '55331', '2022-07-05 06:06:52', '2022-07-05 06:06:52'),
	(88, '1562c53bcbc54df', '97486945', '123', 'PR Shou', '1', '5', '5', '67673', '2022-07-06 07:37:48', '2022-07-06 07:37:48'),
	(89, '1562c53bcbc54df', '41689982', '23423', 'Shou Ko', '3', '3', '233', '66432', '2022-07-06 07:37:48', '2022-07-06 07:37:48'),
	(90, '1562c54c14be378', '75647411', '123112', 'Kerimcan', '3', '3', '3', '543454', '2022-07-06 08:47:16', '2022-07-06 08:47:16'),
	(91, '1562c551cc07ead', '14851248', '12', 'asd', '3', '3', '3', '3', '2022-07-06 09:11:40', '2022-07-06 09:11:40'),
	(92, '1562c55f66418b0', '45862185', '3', '3', '3', '3', '3', '3', '2022-07-06 10:09:42', '2022-07-06 10:09:42'),
	(93, '1562c56a2899b11', '23465895', '3', 'Pack', '3', '3', '3', '3', '2022-07-06 10:55:36', '2022-07-06 10:55:36'),
	(94, '1562c5743179db4', '60107303', '3', 'Test', '3', '3', '3', '3', '2022-07-06 11:38:25', '2022-07-06 11:38:25'),
	(95, '98610888', '57014323', '4', 'new Pro', '4', '4', '4', '4', '2022-07-06 11:43:11', '2022-07-06 11:43:11'),
	(96, '49154828', '84653631', '231412', 'Asdasd', '2', '2', '23', '23534', '2022-07-06 11:45:04', '2022-07-06 11:45:04'),
	(97, '74262758', '53388635', '1145', 'Phone', '3', '3', '3', '7742', '2022-07-07 06:16:01', '2022-07-07 06:16:01'),
	(98, '74262758', '94436041', '5662', 'Watch', '3', '3', '3', '5572', '2022-07-07 06:16:01', '2022-07-07 06:16:01'),
	(99, 'M87509090', '53287047', '3', 'DD', '3', '3', '3', '3', '2022-07-08 08:13:38', '2022-07-08 08:13:38'),
	(100, 'M87509090', '80629414', '5', 'FF', '5', '5', '5', '5', '2022-07-08 08:13:38', '2022-07-08 08:13:38'),
	(101, 'M24400637', '74113963', '33115', 'Tea Cup', '4', '2', '22', '5672', '2022-07-18 11:36:32', '2022-07-18 11:36:32'),
	(102, 'M24400637', '94366851', '11234', 'Cup box', '1', '2', '21', '56612', '2022-07-18 11:36:32', '2022-07-18 11:36:32'),
	(103, 'M30096436', '59995248', '3', '3', '3', '3', '3', '3', '2022-07-18 11:43:06', '2022-07-18 11:43:06'),
	(104, 'M29665850', '25592187', '3', 'ASDASdA', '3', '3', '3', '3', '2022-07-18 13:21:53', '2022-07-18 13:21:53'),
	(105, 'M35775082', '45811361', '44562', 'Banana', '3', '3', '13', '1235', '2022-07-20 06:42:40', '2022-07-20 06:42:40'),
	(106, 'M81079666', '89223487', '12441', 'CHINI', '12', '122', '12', '12441', '2022-07-20 11:02:18', '2022-07-20 11:02:18'),
	(107, 'M51651626', '90476756', '31123', 'KDU', '4', '4', '40', '31123', '2022-07-25 11:57:59', '2022-07-25 11:57:59'),
	(108, 'M16810153', '60838929', '3366742', 'CocoNut', '12', '34', '50', '3366742', '2022-07-28 10:41:49', '2022-07-28 10:41:49'),
	(109, 'M16810153', '24819946', '3366742', 'Coco Seeds', '22', '2', '32', '3366742', '2022-07-28 10:41:49', '2022-07-28 10:41:49');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table kargo_com.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table kargo_com.roles: ~2 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'Super Admin', 'web', '2022-04-19 15:01:14', '2022-04-19 15:01:14'),
	(2, 'Administrator', 'web', '2022-04-19 15:01:14', '2022-04-19 15:01:14');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table kargo_com.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table kargo_com.role_has_permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;

-- Dumping structure for table kargo_com.shelves
CREATE TABLE IF NOT EXISTS `shelves` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `wardrobeID` int(11) NOT NULL,
  `description` text COLLATE utf8_turkish_ci,
  `count` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table kargo_com.shelves: ~3 rows (approximately)
/*!40000 ALTER TABLE `shelves` DISABLE KEYS */;
INSERT INTO `shelves` (`id`, `title`, `wardrobeID`, `description`, `count`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'TEST', 1, 'TESST', 0, 0, '2022-05-12 19:47:21', '2022-05-12 19:47:21'),
	(3, 'A2', 4, NULL, 0, 0, '2022-05-13 02:33:08', '2022-05-13 23:38:05'),
	(4, 'A1-1', 2, 'Yeni bolme', 0, 0, '2022-05-13 03:16:31', '2022-06-03 10:47:28');
/*!40000 ALTER TABLE `shelves` ENABLE KEYS */;

-- Dumping structure for table kargo_com.transactions
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(50) DEFAULT NULL,
  `payment_id` int(50) DEFAULT NULL,
  `old_balance` int(50) DEFAULT '0',
  `new_balance` int(50) DEFAULT '0',
  `transfer_method` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table kargo_com.transactions: ~42 rows (approximately)
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` (`id`, `user_id`, `payment_id`, `old_balance`, `new_balance`, `transfer_method`, `created_at`, `updated_at`) VALUES
	(1, 14, NULL, 166, 722, 'Payment Approval', '2022-07-13 13:31:49', '2022-07-13 13:31:49'),
	(2, 14, 3, 722, 1278, 'Payment Approval', '2022-07-13 13:36:51', '2022-07-13 13:36:51'),
	(3, 14, 3, 1278, 722, 'Payment Approval', '2022-07-13 13:42:39', '2022-07-13 13:42:39'),
	(4, 14, 2, 722, 2134, 'Payment Approval', '2022-07-13 13:43:10', '2022-07-13 13:43:10'),
	(5, 14, 2, 2134, 722, 'Payment Approval', '2022-07-13 13:43:18', '2022-07-13 13:43:18'),
	(6, 14, 2, 722, 2134, 'Payment Approval', '2022-07-13 13:43:32', '2022-07-13 13:43:32'),
	(7, 14, 2, 2134, 3546, 'Payment Approval', '2022-07-13 13:43:40', '2022-07-13 13:43:40'),
	(8, 14, 2, 3546, 2134, 'Payment Approval', '2022-07-13 13:43:51', '2022-07-13 13:43:51'),
	(9, 14, 2, 2134, 722, 'Payment Deny', '2022-07-13 13:44:14', '2022-07-13 13:44:14'),
	(10, 14, 6, 17214, 21337, 'Payment Approval', '2022-07-13 13:48:07', '2022-07-13 13:48:07'),
	(11, 14, 6, 21337, 17214, 'Payment Deny', '2022-07-13 13:48:31', '2022-07-13 13:48:31'),
	(12, 14, 9, 2000, 4000, 'Payment Approval', '2022-07-13 13:50:16', '2022-07-13 13:50:16'),
	(13, 14, 9, 4000, 2000, 'Payment Deny', '2022-07-13 13:50:29', '2022-07-13 13:50:29'),
	(14, 22, 12, 0, 4000, 'Payment Approval', '2022-07-20 06:48:20', '2022-07-20 06:48:20'),
	(15, 22, 11, 4000, 4300, 'Payment Approval', '2022-07-20 06:54:55', '2022-07-20 06:54:55'),
	(16, 14, 1, 597, 721, 'Payment Approval', '2022-07-20 06:55:06', '2022-07-20 06:55:06'),
	(17, 22, 12, 4300, 700, 'Payment Deny', '2022-07-20 06:56:57', '2022-07-20 06:56:57'),
	(18, 22, 12, 700, 4300, 'Payment Approval', '2022-07-20 06:57:06', '2022-07-20 06:57:06'),
	(19, 14, NULL, 2000, 54, 'Order Charged after Measurement', '2022-07-21 13:12:33', '2022-07-21 13:12:33'),
	(20, 14, NULL, 54, -1892, 'Order Charged after Measurement', '2022-07-21 13:15:24', '2022-07-21 13:15:24'),
	(21, 14, NULL, -1892, 54, 'Cargo payment returned for cancel', '2022-07-21 13:15:39', '2022-07-21 13:15:39'),
	(22, 14, NULL, -1892, 54, 'Cargo payment returned for cancel', '2022-07-21 13:18:13', '2022-07-21 13:18:13'),
	(23, 14, NULL, 54, -1892, 'Cargo payment charged after revert', '2022-07-21 13:18:24', '2022-07-21 13:18:24'),
	(24, 14, NULL, -1892, 54, 'Cargo payment returned for cancel', '2022-07-21 13:39:21', '2022-07-21 13:39:21'),
	(25, 10, 15, 0, 52, 'Payment Approval', '2022-07-22 09:39:25', '2022-07-22 09:39:25'),
	(26, 8, 16, 0, 4010, 'Payment Approval', '2022-07-22 09:40:01', '2022-07-22 09:40:01'),
	(27, 14, 10, 54, 65, 'Payment Approval', '2022-07-25 07:19:53', '2022-07-25 07:19:53'),
	(28, 8, 16, 4010, 1, 'Payment Deny', '2022-07-25 07:20:47', '2022-07-25 07:20:47'),
	(29, 8, 16, 1, 4011, 'Payment Approval', '2022-07-25 07:21:27', '2022-07-25 07:21:27'),
	(30, 10, 15, 52, 0, 'Payment Deny', '2022-07-25 07:22:13', '2022-07-25 07:22:13'),
	(31, 10, 15, 0, 52, 'Payment Approval', '2022-07-25 07:22:20', '2022-07-25 07:22:20'),
	(32, 8, 16, 4011, 2, 'Payment Deny', '2022-07-25 07:23:31', '2022-07-25 07:23:31'),
	(33, 8, 16, 2, 4012, 'Payment Approval', '2022-07-25 07:23:39', '2022-07-25 07:23:39'),
	(34, 8, 16, 4012, 8022, 'Payment Approval', '2022-07-25 07:23:45', '2022-07-25 07:23:45'),
	(35, 8, 16, 8022, 4013, 'Payment Deny', '2022-07-25 09:10:51', '2022-07-25 09:10:51'),
	(36, 14, NULL, 65, -1881, 'Cargo payment charged after revert', '2022-07-25 09:16:36', '2022-07-25 09:16:36'),
	(37, 14, NULL, -1881, 65, 'Cargo payment returned for cancel', '2022-07-25 09:16:43', '2022-07-25 09:16:43'),
	(38, 8, 16, 4013, 8023, 'Payment Approval', '2022-07-25 09:56:54', '2022-07-25 09:56:54'),
	(39, 8, 16, 8023, 4014, 'Payment Deny', '2022-07-25 09:57:56', '2022-07-25 09:57:56'),
	(40, 8, 16, 4014, 8024, 'Payment Approval', '2022-07-25 10:02:12', '2022-07-25 10:02:12'),
	(41, 8, 16, 8024, 4015, 'Payment Deny', '2022-07-25 10:02:30', '2022-07-25 10:02:30'),
	(42, 4, 18, 0, 1760, 'Payment Approval', '2022-07-28 10:52:25', '2022-07-28 10:52:25'),
	(43, 14, NULL, 65, 1720, 'Cargo payment returned for cancel', '2022-07-28 13:31:41', '2022-07-28 13:31:41'),
	(44, 14, NULL, 1720, 65, 'Cargo payment charged after revert', '2022-07-28 13:31:48', '2022-07-28 13:31:48');
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;

-- Dumping structure for table kargo_com.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `phone_verified_at` timestamp NULL DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8_turkish_ci DEFAULT 'none',
  `status` int(11) DEFAULT '0' COMMENT '1 => active, NULL => passive',
  `is_admin` int(11) DEFAULT '0',
  `user_role` int(11) DEFAULT '0',
  `membership` varchar(255) COLLATE utf8_turkish_ci DEFAULT 'personal',
  `shipment` int(11) DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `postcode` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `address_2` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `indetification_number` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `tax_adminstration` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `tax_number` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `balance` int(11) DEFAULT '0',
  `Iban` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `balance_name` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `user_market` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `from_where` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `promotion_code` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `average_requests` int(50) DEFAULT '0',
  `integration` json DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_phone_unique` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table kargo_com.users: ~18 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `image`, `email`, `email_verified_at`, `password`, `phone`, `phone_verified_at`, `gender`, `status`, `is_admin`, `user_role`, `membership`, `shipment`, `city`, `country`, `postcode`, `remember_token`, `address`, `address_2`, `indetification_number`, `company_name`, `tax_adminstration`, `tax_number`, `balance`, `Iban`, `balance_name`, `user_market`, `from_where`, `promotion_code`, `average_requests`, `integration`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'Rashad Alakbarov', NULL, 'rashadalakbarov@gmail.com', NULL, 'rashadalakbarov@gmail.com', '994558215673', NULL, 'none', 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1000, '0', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-04-22 17:49:11', '2022-07-13 08:57:55'),
	(2, 'eldora.zemlak', NULL, 'wlubowitz@example.org', '2022-04-22 17:49:14', '$2y$10$iNXzKCdP0LAWXXi91CjnfeG0wfH/59LqbVAuiBSgUeB4O6eBuklda', '(513) 951-0842', NULL, 'none', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, 'TupmhnXDLsKd741c0K20VH0G6kh1IM1crEAD4ChY2q36mGnP9IWyEN10KKvK', NULL, NULL, NULL, NULL, NULL, NULL, 2000, '0', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-04-22 17:49:17', '2022-07-28 08:10:53'),
	(3, 'hand.cecelia', NULL, 'ferry.kianna@example.org', '2022-04-22 17:49:14', '$2y$10$iti.MslxMUHHFZF4DRHfy.ZRWpOZbbFfSq4YXW7x5ndeHTXAJ621u', '+1-657-214-4894', NULL, 'none', NULL, 1, 2, NULL, NULL, NULL, NULL, NULL, 'o1to3Os85s', NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-04-22 17:49:17', '2022-04-22 17:49:17'),
	(4, 'dangelo141', NULL, 'darien50@example.com', '2022-04-22 17:49:16', '$2y$10$PxyNozYpIrGlBOsxhrQpIOVGi6S3m7J2xQorszzZVu9/jHiQq5h4O', '115511', NULL, 'none', 0, 1, 2, 'personal', NULL, NULL, NULL, NULL, 'nqpeNDPSg0XJQVQN3yRKZtzl7Nxt0C7pqxpoJ2ezaHHojHrxl7BG22osDNSv', NULL, NULL, 'asdasd123123asd', NULL, 'asdasdsad1213', NULL, 1760, 'asdasd21wdas', NULL, NULL, NULL, NULL, 0, '{"api_key": "ass1145fgnh2", "market_name": "aliexpress", "private_key": "ass1145fgnh2"}', NULL, '2022-04-22 17:49:17', '2022-07-28 11:09:56'),
	(5, 'fgibson', NULL, 'catherine.yundt@example.net', '2022-04-22 17:49:16', '$2y$10$uNERg4XaGIjrWOgBqycS/OCaqtSbmATpLO2/UEG3BUSZsWiSXsw2e', '+1-774-233-1196', NULL, 'none', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 'r3sWWWoBpm', NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-04-22 17:49:17', '2022-04-22 17:49:17'),
	(6, 'barton.fritz', NULL, 'mitchell.dangelo@example.org', '2022-04-22 17:49:16', '$2y$10$YNETxqfhTn7St0QUeAQp6u026c/UJ0/nplGyxReSftZNHe3kR2QQi', '430-740-2716', NULL, 'none', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 'p1wyJy49Jz', NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-04-22 17:49:17', '2022-04-22 17:49:17'),
	(7, 'cassin.alyce', NULL, 'keaton39@example.com', '2022-04-22 17:49:17', '$2y$10$CTC3F7h9ndHy.GmGHPYSIO2AeRZo/OZU8/vMbRPHpgb5fU3cCBGVC', '+1.973.300.9920', NULL, 'none', 1, 0, 0, NULL, NULL, NULL, NULL, NULL, 'PHSc7m6JPe', NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-04-22 17:49:17', '2022-04-24 19:53:22'),
	(8, 'oschmeler', NULL, 'dare.mackenzie@example.org', '2022-04-22 17:49:17', '$2y$10$2qwE4xRXXvKXT2KcBwtBGOoXrs9T5ln4GG6JCYJpdoGQ2en0mgHz6', '845.525.8515', NULL, 'none', 1, 0, 0, NULL, NULL, NULL, NULL, NULL, 'ckWczrhhYC', NULL, NULL, NULL, NULL, NULL, NULL, 4015, '0', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-04-22 17:49:17', '2022-07-25 10:02:30'),
	(9, 'glang', NULL, 'vconn@example.org', '2022-04-22 17:49:17', '$2y$10$hKL6N/rJkhKzDedllej.a.GoYZATFpZ68bekwiUZMaz8Bfp4RDzeq', '+19155575834', NULL, 'none', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 'P12rRQZYlt', NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-04-22 17:49:18', '2022-04-22 17:49:18'),
	(10, 'lina.ruecker', NULL, 'providenci36@example.net', '2022-04-22 17:49:17', '$2y$10$gK5g3V7OHqriGrLqP/AXrO.QL29D8oC26JiHqaoVrA7Iw/BDCqET2', '+1-814-201-9479', NULL, 'none', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 'Mqz1LHhsTG', NULL, NULL, NULL, NULL, NULL, NULL, 52, '0', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-04-22 17:49:18', '2022-07-25 07:22:20'),
	(11, 'drake.spencer', NULL, 'wpacocha@example.net', '2022-04-22 17:49:17', '$2y$10$/1NoT.uzUwY55HM7dt4lVetuon.I11WI4KOdkR5ljWj.W8/DpFnnG', '+1-865-299-1818', NULL, 'none', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 'q61WqmtWi8', NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-04-22 17:49:18', '2022-04-22 17:49:18'),
	(12, 'kamran', NULL, 'kamran@mail.ru', NULL, '$2y$10$PzLN.DXfpZx0R2eNyZNJbu.vFVf3zkKviAL0b6DGHe8bqYoYflWRS', '2312312312', NULL, 'none', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-05-31 12:16:16', '2022-05-31 12:16:16'),
	(14, 'Senan', '1654498491.jpg', 'qulamovsenan@gmail.com', '2022-06-16 16:01:37', '$2y$10$QR2UbE5ahaVAzutyYRipau6BVXmnrJCZwNaRRdvtXzvU/pFpDv8Za', '0515838095', NULL, 'none', 1, 1, 1, 'company', NULL, 'Baku', 'Azerbaijan', 'AZE1147', NULL, 'asdad', 'asdasdas12312', 'asdasd123123asd', 'azsxasd', 'asdasdsad1213', '1231231', 65, 'asd122es', '1111111', NULL, NULL, NULL, 0, '{"api_key": "asdas11adsd", "market_name": "aliexpress", "private_key": "asdas12sd1"}', NULL, '2022-05-31 11:14:58', '2022-07-28 13:31:47'),
	(18, 'Qabil', NULL, 'ayaz@gmail.com', NULL, '$2y$10$xY6CySFAwz5xd4IaBTDwnOMkFZ.Z8u6qDvpjXG22QXKG5lFPJpqKy', '123123123', NULL, 'none', NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-01 07:10:12', '2022-06-01 07:10:12'),
	(22, 'JustOscar', '1658295481.jpeg', 'oscarfromdesert@gmail.com', NULL, '$2y$10$K9zkryvGkQexfX0xWdt6WOS2hYk3zZUEcSDkncrlk7Kq5cr2BmaFu', '1231023', NULL, 'none', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4300, '0', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-06-01 07:46:58', '2022-07-20 06:57:06'),
	(27, 'Senan Qulamov', NULL, 'senanqulamov8@gmail.com', '2022-07-04 07:11:18', '$2y$10$u2egLddQ/S/e7FDcUOCTPeeSpPu28WgtZmYfDrT2jvcqPEb4bpJNy', '56687686', NULL, 'none', 0, 0, 0, 'personal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, -3234, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-04 07:11:12', '2022-07-14 09:11:01'),
	(28, 'Admin', '1657397980.jpg', 'admin@admin.com', '2022-07-10 00:18:02', '$2y$10$XtlQhs2GHZo8Akv40yXWbeSJ9l.CIvyuEQlNRV2vu9n1/5G4kTXDO', '333111343', NULL, 'none', 0, 1, 1, 'personal', NULL, 'Neftchala', 'United Kingdom', '123sd', NULL, 'aasde12as', 'da12123s', '123123s', 'asdasd', 'asdsad', '11231', -1223, 'asd1223', NULL, NULL, NULL, NULL, 0, NULL, NULL, '2022-07-09 20:17:21', '2022-07-13 09:04:39'),
	(29, 'Ayaz Ayazov', NULL, 'ayazayazov@gmail.com', '2022-07-21 17:49:14', '$2y$10$rzwo/cyEhFWyrjC4E2MAre2.a/YVxUo2mBY7h18g5QKY3WKqC/8ya', '0984446262', NULL, 'man', 0, 0, 0, 'personal', NULL, NULL, 'Azerbaijan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 'etsy', 'other', NULL, NULL, NULL, NULL, '2022-07-21 10:04:46', '2022-07-21 10:04:46');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table kargo_com.user_addresses
CREATE TABLE IF NOT EXISTS `user_addresses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `userID` bigint(20) unsigned NOT NULL,
  `country` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `zipcode` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_addresses_userid_foreign` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table kargo_com.user_addresses: ~38 rows (approximately)
/*!40000 ALTER TABLE `user_addresses` DISABLE KEYS */;
INSERT INTO `user_addresses` (`id`, `userID`, `country`, `state`, `city`, `address`, `zipcode`, `name`, `phone`, `email`, `created_at`, `updated_at`) VALUES
	(1, 7, 'Azerbaijan', 'Baku', 'Khyrdalan', 'Khyrdalan city Haydar Aliev avenue', 'AZ0102', 'Roshen Alex', '518215735', 'rashadalakbaov.1618@gmail.com', '2022-04-24 19:58:03', '2022-04-24 19:58:03'),
	(2, 5, 'UK', 'Californiya', 'Norway', '25-ci məhəllə, ev 30, mənzil 34', 'AZ0100s', 'Ferhad ddasd', '0555639129', 'ferhad.thl@gmail.com', '2022-04-24 20:48:26', '2022-04-24 20:48:26'),
	(3, 5, 'UK', 'Californiya', 'Norway', '25-ci məhəllə, ev 30, mənzil 34', 'AZ0100s', 'Ferhad ddasd', '0555639129', 'ferhad.thl@gmail.com', '2022-04-24 20:48:27', '2022-04-24 20:48:27'),
	(4, 5, 'UK', 'Californiya', 'Norway', '25-ci məhəllə, ev 30, mənzil 34', 'AZ0100s', 'Ferhad ddasd', '0555639129', 'ferhad.thl@gmail.com', '2022-04-24 20:48:32', '2022-04-24 20:48:32'),
	(5, 5, 'UK', 'Californiya', 'Norway', '25-ci məhəllə, ev 30, mənzil 34', 'AZ0100s', 'Ferhad ddasd', '0555639129', 'ferhad.thl@gmail.com', '2022-04-24 20:48:33', '2022-04-24 20:48:33'),
	(6, 5, 'UK', 'Californiya', 'Norway', '25-ci məhəllə, ev 30, mənzil 34', 'AZ0100s', 'Ferhad ddasd', '0555639129', 'ferhad.thl@gmail.com', '2022-04-24 20:48:45', '2022-04-24 20:48:45'),
	(7, 5, 'UK', 'Californiya', 'Norway', '25-ci məhəllə, ev 30, mənzil 34', 'AZ0100s', 'Ferhad ddasd', '0555639129', 'ferhad.thl@gmail.com', '2022-04-24 20:48:46', '2022-04-24 20:48:46'),
	(8, 5, 'UK', 'Californiya', 'Norway', '25-ci məhəllə, ev 30, mənzil 34', 'AZ0100s', 'Ferhad ddasd', '0555639129', 'ferhad.thl@gmail.com', '2022-04-24 20:48:55', '2022-04-24 20:48:55'),
	(9, 5, 'UK', 'Californiya', 'Norway', '25-ci məhəllə, ev 30, mənzil 34', 'AZ0100s', 'Ferhad ddasd', '0555639129', 'ferhad.thl@gmail.com', '2022-04-24 20:48:56', '2022-04-24 20:48:56'),
	(10, 5, 'UK', 'Californiya', 'Norway', '25-ci məhəllə, ev 30, mənzil 34', 'AZ0100s', 'Ferhad ddasd', '0555639129', 'ferhad.thl@gmail.com', '2022-04-24 20:49:01', '2022-04-24 20:49:01'),
	(11, 5, 'UK', 'Californiya', 'Norway', '25-ci məhəllə, ev 30, mənzil 34', 'AZ0100s', 'Ferhad ddasd', '0555639129', 'ferhad.thl@gmail.com', '2022-04-24 20:49:05', '2022-04-24 20:49:05'),
	(12, 5, 'UK', 'Californiya', 'Norway', '25-ci məhəllə, ev 30, mənzil 34', 'AZ0100s', 'Ferhad ddasd', '0555639129', 'ferhad.thl@gmail.com', '2022-04-24 20:49:06', '2022-04-24 20:49:06'),
	(13, 5, 'UK', 'Californiya', 'Norway', '25-ci məhəllə, ev 30, mənzil 34', 'AZ0100s', 'Ferhad ddasd', '0555639129', 'ferhad.thl@gmail.com', '2022-04-24 20:49:08', '2022-04-24 20:49:08'),
	(14, 5, 'UK', 'Californiya', 'Norway', '25-ci məhəllə, ev 30, mənzil 34', 'AZ0100s', 'Ferhad ddasd', '0555639129', 'ferhad.thl@gmail.com', '2022-04-24 20:49:10', '2022-04-24 20:49:10'),
	(15, 5, 'Norway', 'UK', 'UK', '25-ci məhəllə, ev 30, mənzil 34', 'AZxvxcv', 'Ferhad', '0555639129', 'ferhad.thl@gmail.com', '2022-04-24 20:49:47', '2022-04-24 20:49:47'),
	(16, 5, 'Norway', 'UK', 'UK', '25-ci məhəllə, ev 30, mənzil 34', 'AZxvxcv', 'Ferhad', '0555639129', 'ferhad.thl@gmail.com', '2022-04-24 20:49:54', '2022-04-24 20:49:54'),
	(17, 5, 'Norway', 'UK', 'UK', '25-ci məhəllə, ev 30, mənzil 34', 'AZxvxcv', 'Ferhad', '0555639129', 'ferhad.thl@gmail.com', '2022-04-24 20:50:04', '2022-04-24 20:50:04'),
	(18, 5, 'Norway', 'UK', 'UK', '25-ci məhəllə, ev 30, mənzil 34', 'AZxvxcv', 'Ferhad', '0555639129', 'ferhad.thl@gmail.com', '2022-04-24 20:50:06', '2022-04-24 20:50:06'),
	(19, 5, 'Norway', 'UK', 'UK', '25-ci məhəllə, ev 30, mənzil 34', 'AZxvxcv', 'Ferhad', '0555639129', 'ferhad.thl@gmail.com', '2022-04-24 20:50:09', '2022-04-24 20:50:09'),
	(20, 5, 'Norway', 'UK', 'UK', '25-ci məhəllə, ev 30, mənzil 34', 'AZxvxcv', 'Ferhad', '0555639129', 'ferhad.thl@gmail.com', '2022-04-24 20:50:10', '2022-04-24 20:50:10'),
	(21, 5, 'UK', 'Norway', 'UK', '25-ci məhəllə, ev 30, mənzil 34', 'AZxvxcv', 'Ferhad', '0555639129', 'ferhad.thl@gmail.com', '2022-04-24 20:54:00', '2022-04-24 20:54:00'),
	(22, 5, 'UK', 'UK', 'Norway', '25-ci məhəllə, ev 30, mənzil 34', 'AZxvxcv', 'Ferhad', '0555639129', 'ferhad.thl@gmail.com', '2022-04-24 20:54:19', '2022-04-24 20:54:19'),
	(23, 5, 'UK', 'UK', 'Norway', '25-ci məhəllə, ev 30, mənzil 34', 'AZxvxcv', 'Ferhad', '0555639129', 'ferhad.thl@gmail.com', '2022-04-24 20:54:19', '2022-04-24 20:54:19'),
	(24, 5, 'UK', 'UK', 'Norway', '25-ci məhəllə, ev 30, mənzil 34', 'AZ', 'Ferhad', '0555639129', 'ferhad.thl@gmail.com', '2022-04-24 21:34:11', '2022-04-24 21:34:11'),
	(25, 5, 'UK', 'UK', 'Norway', '25-ci məhəllə, ev 30, mənzil 34', 'AZ', 'Ferhad', '0555639129', 'ferhad.thl@gmail.com', '2022-04-24 21:34:11', '2022-04-24 21:34:11'),
	(26, 5, 'Norway', 'UK', 'UK', '25-ci məhəllə, ev 30, mənzil 34', 'AZ', 'Ferhad', '0555639129', 'ferhad.thl@gmail.com', '2022-04-24 21:37:46', '2022-04-24 21:37:46'),
	(27, 5, 'Norway', 'UK', 'UK', '25-ci məhəllə, ev 30, mənzil 34', 'AZ', 'Ferhad', '0555639129', 'ferhad.thl@gmail.com', '2022-04-24 21:37:47', '2022-04-24 21:37:47'),
	(28, 5, 'Norway', 'UK', 'UK', '25-ci məhəllə, ev 30, mənzil 34', 'AZ', 'Ferhad', '0555639129', 'ferhad.thl@gmail.com', '2022-04-24 21:37:51', '2022-04-24 21:37:51'),
	(29, 5, 'Norway', 'UK', 'UK', '25-ci məhəllə, ev 30, mənzil 34', 'AZ', 'Ferhad', '0555639129', 'ferhad.thl@gmail.com', '2022-04-24 21:37:51', '2022-04-24 21:37:51'),
	(30, 5, 'Norway', 'UK', 'UK', '25-ci məhəllə, ev 30, mənzil 34', 'AZ', 'Ferhad', '0555639129', 'ferhad.thl@gmail.com', '2022-04-24 21:39:27', '2022-04-24 21:39:27'),
	(31, 5, 'Norway', 'UK', 'UK', '25-ci məhəllə, ev 30, mənzil 34', 'AZ180', 'Ferhad', '0555639129', 'ferhad.thl@gmail.com', '2022-04-24 21:39:38', '2022-04-24 21:39:38'),
	(32, 5, 'Norway', 'UK', 'UK', '25-ci məhəllə, ev 30, mənzil 34', 'AZ180', 'Ferhad', '0555639129', 'ferhad.thl@gmail.com', '2022-04-24 21:39:39', '2022-04-24 21:39:39'),
	(35, 14, 'Azerbaijan', 'Baku', 'Khyrdalan', 'Khyrdalan city Haydar Aliev avenue', 'AZ0102', 'Roshen Alex', '518215735', 'rashadalakbaov.1618@gmail.com', '2022-04-28 17:31:22', '2022-07-27 11:53:29'),
	(38, 14, 'Antarctica', 'Xirdalan', 'Absheron', 'Baku 123', 'AZ5555', 'Somete', '518245511', 'somete@gmail.com', '2022-06-10 07:42:29', '2022-07-27 10:44:50'),
	(39, 14, 'Chad', 'Aran', 'Ucar', 'Ucar Qezyan 12', 'AZ00120', 'Nermin Nerminli', '642342352', 'narmin1990@gmail.com', '2022-06-14 07:38:22', '2022-06-14 07:38:22'),
	(40, 14, 'Angola', 'AngoCity', 'Angolandiya', 'Aangoo asrd', 'ANG1003', 'Angolica Data', '0555639129', 'angollandor@gmail.com', '2022-06-16 08:06:56', '2022-07-27 10:52:36'),
	(41, 23, 'Afghanistan', 'Afqan', 'Afqan city', 'Af mall in Afqan city', 'AF8893', 'Someone Ayazov', '25235532', 'someone@gmail.com', '2022-06-16 08:24:19', '2022-06-16 08:24:19'),
	(42, 14, 'Bahamas', 'Hawaii', 'Hawaii', 'Hawaii metro 1', 'HW3335', 'asdasd', '123124', 'dasdsds@gmail.com', '2022-06-16 11:29:55', '2022-06-16 11:29:55'),
	(43, 14, 'Haiti', 'Haiti', 'Haiti', 'Haiti 57 street engineer', 'HA1224', 'Haiti Engineer', '+3305123443', 'haitiengineer@gmail.com', '2022-06-28 06:29:47', '2022-06-28 06:29:47'),
	(44, 14, 'Brazil', 'Paul', 'San Paul', 'San Paul downtown 45 street 57', 'BRZ123', 'Kamran Qasimov', '+1231232', 'kamran@gmail.com', '2022-06-28 07:51:53', '2022-07-27 10:45:19'),
	(45, 14, 'American Samoa', 'American samoa', 'Samoa', 'Samo 123', 'SMA123', 'Samir', '12312321', 'samir@gmail.com', '2022-07-01 08:18:20', '2022-07-01 08:18:20'),
	(46, 14, 'Azerbaijan', 'asdadasd', 'asdasd', 'asdasda', '123asd12', '12asdasda', '23123123', 'dasdsad@asda.dasd', '2022-07-01 08:32:04', '2022-07-01 08:32:04'),
	(47, 27, 'Hungary', 'Nagymező', 'Budapest', '065 Budapest, Nagymező utca 32', '1065', 'Papp Balogh', '+8923123124', 'pappbalogh@gmail.com', '2022-07-05 06:06:53', '2022-07-05 06:06:53'),
	(48, 14, 'China', 'Southern China', 'Hong Kong', 'Honk Kong street 3442', 'HK112', 'Shiu Shou', '+88933442252', 'shiushou@gmail.com', '2022-07-06 07:37:48', '2022-07-06 07:37:48'),
	(49, 27, 'Canada', 'Canadian West', 'Vancuver', 'Vancuver , George street 446', 'VNC1244', 'Thomas Edison', '3551125552', 'thomasedison@gmail.com', '2022-07-07 06:16:02', '2022-07-07 06:16:02'),
	(50, 27, 'Italy', 'North Italy', 'Neapol', 'Neapol CastWay 92', 'IT44776', 'Anatoli Varoba', '224511345', 'anatolidev@gmail.com', '2022-07-18 11:36:32', '2022-07-18 11:36:32'),
	(51, 22, 'Burundi', 'Rusisiro', 'Muyinga', '3rd av.Swahili street, Burundi', 'BR1145', 'Nduwimana Deo', '+0021155335', 'deointhehouse@mail.ru', '2022-07-20 06:42:40', '2022-07-20 06:42:40'),
	(53, 4, 'Bahamas', 'Tirana', 'Bahad', 'Sothere Tirana 37 street', 'TRSB1124', 'Tria Marcelo', '1112466', 'triademomail@gmail.com', '2022-07-28 10:41:49', '2022-07-28 10:41:49');
/*!40000 ALTER TABLE `user_addresses` ENABLE KEYS */;

-- Dumping structure for table kargo_com.user_roles
CREATE TABLE IF NOT EXISTS `user_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL DEFAULT '0',
  `role_name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table kargo_com.user_roles: ~3 rows (approximately)
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
INSERT INTO `user_roles` (`id`, `role_id`, `role_name`) VALUES
	(1, 0, 'Normal User'),
	(2, 1, 'Admin'),
	(3, 2, 'Courier');
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;

-- Dumping structure for table kargo_com.wardrobes
CREATE TABLE IF NOT EXISTS `wardrobes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_turkish_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table kargo_com.wardrobes: ~4 rows (approximately)
/*!40000 ALTER TABLE `wardrobes` DISABLE KEYS */;
INSERT INTO `wardrobes` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'TEST', 'TEST', '2022-05-12 19:46:58', '2022-05-12 19:46:58'),
	(2, 'A1', NULL, '2022-05-13 02:26:15', '2022-05-13 02:26:15'),
	(4, 'A3', 'A2nin yaninda yerlesir', '2022-05-13 02:29:37', '2022-05-13 02:30:34'),
	(5, 'A4', NULL, '2022-05-13 03:17:03', '2022-05-13 03:17:03');
/*!40000 ALTER TABLE `wardrobes` ENABLE KEYS */;

-- Dumping structure for table kargo_com.warehouses
CREATE TABLE IF NOT EXISTS `warehouses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_turkish_ci NOT NULL COMMENT '1 => company, 2 => local',
  `address` text COLLATE utf8_turkish_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `zipcode` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `ordinal_number` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `shelf_number` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `column` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `height` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `width` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `weight` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL COMMENT '1 => public, 2 => private',
  `domestic_company` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table kargo_com.warehouses: ~0 rows (approximately)
/*!40000 ALTER TABLE `warehouses` DISABLE KEYS */;
/*!40000 ALTER TABLE `warehouses` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
