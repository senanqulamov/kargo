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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table kargo_com.additional_services: ~3 rows (approximately)
/*!40000 ALTER TABLE `additional_services` DISABLE KEYS */;
INSERT INTO `additional_services` (`id`, `title`, `slug`, `status`, `price`, `show`, `created_at`, `updated_at`) VALUES
	(1, 'Bubble', 'bubble', 1, '25.6', NULL, '2022-05-03 20:18:26', '2022-05-03 20:18:26'),
	(2, 'Lent', 'lent', 1, '56.52', NULL, '2022-05-03 20:18:48', '2022-05-03 20:18:48'),
	(3, 'Nothing much', 'nothing-much', 1, '22', NULL, '2022-05-28 08:00:08', '2022-06-23 06:06:16');
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
	(7, 'SHIPLOUNGE', '32.66207', '39.96492', 'ŞEKER MH. 1437.CD. NO.20/B ETİMESGUT/ANKARA', 'TR', NULL, '2022-05-02 12:21:17', '2022-06-03 11:03:04'),
	(8, 'USA-SHIPLOUNGE', '-74.07109191247923', '40.87912158224169', '258 Columbia Ave Flr 2 /LODİ /NEW JERSEY /07644 /United States', 'US', 1, '2022-05-04 01:01:37', '2022-06-03 11:03:04');
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
	(4, 'asdsad', 'asdsad', 16, 'asdsada', 'internship', NULL, '2022-06-26T15:05', '<p>asdasdas</p>', 2, '2022-06-03 11:05:58', '2022-06-03 11:06:06');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table kargo_com.cargo_companies: ~0 rows (approximately)
/*!40000 ALTER TABLE `cargo_companies` DISABLE KEYS */;
INSERT INTO `cargo_companies` (`id`, `logo`, `name`, `slug`, `PSH`, `jet_price`, `emergency`, `kar_marj`, `entegrations`, `created_at`, `updated_at`) VALUES
	(3, '1652256350.png', 'FEDEX', 'fedex', 2, 36, 50, 10, '["He6ehe7wnh", "7eneusu72nwu7w"]', '2022-04-24 06:05:50', '2022-05-11 08:05:50'),
	(4, '1655964176.jpg', 'Test', 'test', 3, 4, 5, 10, '["He6ehe7wnh", "7eneusu72nwu7w"]', '2022-06-14 16:14:46', '2022-06-23 06:02:56');
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

-- Dumping data for table kargo_com.cargo_documents: ~15 rows (approximately)
/*!40000 ALTER TABLE `cargo_documents` DISABLE KEYS */;
INSERT INTO `cargo_documents` (`doc_id`, `cargo_id`, `document`, `type`) VALUES
	('0fu17fy76', '1562aae4a04bb5b', 'cover.png', 'FDA'),
	('0h2o51vic', '1562aacc0a29f22', 'bbburst.svg', 'MSDS'),
	('767eq6a81', '1562a2f487cd140', 'Senan_Qulamov_-_Software_Developer.pdf', 'FDA'),
	('7c6ts3ilf', '1562a83e5d1d8bb', 'kargo.sql', 'FDA'),
	('85wp4l66g', '1562aae8b3b573d', 'profile.png', 'FDA'),
	('aeny7k0t0', '1562aae17e96fdf', 'kargo.sql', 'FDA'),
	('b2if210al', '1562aae404aa00a', 'cover.png', 'FDA'),
	('brq8yemmv', '1562a2f4707b9f6', 'kargo.sql', 'FDA'),
	('d8bevdxik', '1562a2f5e5769c2', 'Verilənlərin strukturu.Alqoritmlər.Müh-ı kurs.doc', 'other'),
	('exc5uhx4l', '1562a2f4707b9f6', 'u66l65_shiplounge (1).sql', 'FDA'),
	('ldtz7egpf', '1562a2f487cd140', 'IMG_20220520_145538_037.jpg', 'FDA'),
	('q6mltd8g7', '1562a2f5e5769c2', 'image.jpg', 'MSDS'),
	('sae6isnod', '1562a83b6960ee6', 'image.jpg', 'MSDS'),
	('ssswakxpw', '1562a83b6960ee6', 'The Brothers Karamazov Worlds of the Novel by Robin Feuer Miller (z-lib.org).pdf', 'FDA'),
	('zzerys6ad', '1562ab143344ac6', 'default.png', 'FDA');
/*!40000 ALTER TABLE `cargo_documents` ENABLE KEYS */;

-- Dumping structure for table kargo_com.cargo_requests
CREATE TABLE IF NOT EXISTS `cargo_requests` (
  `id` varchar(50) COLLATE utf8_bin NOT NULL,
  `user_id` varchar(50) COLLATE utf8_bin NOT NULL,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `zipcode` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `ioss_number` int(50) DEFAULT NULL,
  `vat_number` int(50) DEFAULT NULL,
  `currency` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `order_info` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `packages` json DEFAULT NULL,
  `additional_services` json DEFAULT NULL,
  `cargo_company` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `extra_bubble` varchar(50) COLLATE utf8_bin DEFAULT 'off',
  `insure_order` varchar(50) COLLATE utf8_bin DEFAULT 'off',
  `other_additional` varchar(50) COLLATE utf8_bin DEFAULT 'off',
  `battery` varchar(50) COLLATE utf8_bin DEFAULT 'no',
  `liquid` varchar(50) COLLATE utf8_bin DEFAULT 'no',
  `food` varchar(50) COLLATE utf8_bin DEFAULT 'no',
  `dangerous` varchar(50) COLLATE utf8_bin DEFAULT 'no',
  `document` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table kargo_com.cargo_requests: ~16 rows (approximately)
/*!40000 ALTER TABLE `cargo_requests` DISABLE KEYS */;
INSERT INTO `cargo_requests` (`id`, `user_id`, `name`, `country`, `city`, `state`, `address`, `zipcode`, `phone`, `email`, `ioss_number`, `vat_number`, `currency`, `order_info`, `packages`, `additional_services`, `cargo_company`, `extra_bubble`, `insure_order`, `other_additional`, `battery`, `liquid`, `food`, `dangerous`, `document`, `created_at`, `updated_at`) VALUES
	('1562a1ed0dc0fb5', '14', 'Senan', 'Azerbaijan', 'Baku', 'Baku', 'Mehmandarov 72', 'AZ1149', '0555639129', 'ferhad.thl@gmail.com', 13123, 1231231, 'USD', '123123', '["nz08ox2wn"]', NULL, NULL, 'off', 'off', NULL, 'yes', 'no', 'no', 'no', '["image (1).jpg"]', '2022-05-22 15:30:04', '2022-05-22 15:30:04'),
	('1562a2e3504dbad', '14', 'Alex', 'Åland Islands', NULL, 'Absheron', 'Absheron 123', 'AZ0102', '518215735', 'alex.1618@gmail.com', 13123, 1231231, 'USD', 'Clock', '["647lgtkic"]', NULL, NULL, 'off', 'off', NULL, 'yes', 'no', 'no', 'no', '["u66l65_shiplounge (1).sql"]', '2022-01-22 15:30:33', '2022-01-22 15:30:33'),
	('1562a2f5e5769c2', '14', 'Somete', 'Antarctica', 'Qax', 'Xirdalan', 'Baku 123', 'AZ5555', '518245511', 'somete@gmail.com', 0, 0, 'USD', 'Zero', '["yadl8yzwq", "r6nkspesf"]', NULL, NULL, 'off', 'off', NULL, 'no', 'yes', 'yes', 'no', '["Veril\\u0259nl\\u0259rin strukturu.Alqoritml\\u0259r.M\\u00fch-\\u0131 kurs.doc","image.jpg"]', '2022-04-22 15:29:41', '2022-04-22 15:29:41'),
	('1562a3314856e54', '14', 'Roshen Alex', 'Azerbaijan', NULL, 'Khyrdalan', 'Khyrdalan city Haydar Aliev avenue', 'AZ0102', '518215735', 'rashadalakbaov.1618@gmail.com', NULL, NULL, 'USD', NULL, '["d1ni24ut8"]', NULL, NULL, 'on', 'on', 'on', 'no', 'no', 'no', 'no', '["Senan_Qulamov_-_Software_Developer.pdf","u66l65_shiplounge (1).sql","kiber kol1.docx"]', '2022-05-22 15:30:04', '2022-05-22 15:30:04'),
	('1562a83b6960ee6', '14', 'Nermin Nerminli', 'Chad', 'Ucar', 'Aran', 'Ucar Qezyan 12', 'AZ00120', '642342352', 'narmin1990@gmail.com', 697794, 124441, 'USD', 'Qolbaq , Saat , Sirga ,', '["qvht1m8al", "3qrbj146s"]', NULL, NULL, NULL, 'on', 'on', 'yes', 'no', 'no', 'no', '["The Brothers Karamazov Worlds of the Novel by Robin Feuer Miller (z-lib.org).pdf","image.jpg"]', '2022-03-22 15:30:33', '2022-03-22 15:30:33'),
	('1562a83e5d1d8bb', '14', 'Ayaz Mensimli', 'Wallis and Futuna', 'Ucar', 'Aran', 'Ucar Qezyan 33', 'AZ02450', '+99477723455', 'ayaz12@gmail.com', 692294, 11245, 'USD', 'Gumus Boyunbaq ,', '["xww6r0f49"]', NULL, NULL, 'on', 'on', NULL, 'no', 'no', 'no', 'yes', '["kargo.sql"]', '2022-03-22 15:30:33', '2022-03-22 15:30:33'),
	('1562aaca6bb8d9f', '14', 'Roshen Alex', 'Austria', 'Baku', 'Khyrdalan', 'Khyrdalan city Haydar Aliev avenue', 'AZ0102', '518215735', 'rashadalakbaov.1618@gmail.com', 697794, 1231231, 'USD', 'Clock ,', '["2bb1yycmh"]', NULL, NULL, NULL, 'on', NULL, 'no', 'no', 'yes', 'no', '["bbburst.svg"]', '2022-05-22 15:30:04', '2022-05-22 15:30:04'),
	('1562aacb1293fbb', '14', 'Roshen Alex', 'Austria', 'Baku', 'Khyrdalan', 'Khyrdalan city Haydar Aliev avenue', 'AZ0102', '518215735', 'rashadalakbaov.1618@gmail.com', 697794, 1231231, 'USD', 'Clock ,', '["2bb1yycmh"]', NULL, NULL, NULL, 'on', NULL, 'no', 'no', 'yes', 'no', '["bbburst.svg"]', '2022-02-22 15:30:20', '2022-02-22 15:30:20'),
	('1562aacb423d3de', '14', 'Roshen Alex', 'Austria', 'Baku', 'Khyrdalan', 'Khyrdalan city Haydar Aliev avenue', 'AZ0102', '518215735', 'rashadalakbaov.1618@gmail.com', 697794, 1231231, 'USD', 'Clock ,', '["2bb1yycmh"]', NULL, NULL, NULL, 'on', NULL, 'no', 'no', 'yes', 'no', '["bbburst.svg"]', '2022-02-22 15:30:20', '2022-02-22 15:30:20'),
	('1562aacbd839cef', '14', 'Roshen Alex', 'Austria', 'Baku', 'Khyrdalan', 'Khyrdalan city Haydar Aliev avenue', 'AZ0102', '518215735', 'rashadalakbaov.1618@gmail.com', 697794, 1231231, 'USD', 'Clock ,', '["2bb1yycmh"]', NULL, NULL, NULL, 'on', NULL, 'no', 'no', 'yes', 'no', '["bbburst.svg"]', '2022-02-22 15:30:20', '2022-02-22 15:30:20'),
	('1562aacc0a29f22', '14', 'Roshen Alex', 'Austria', 'Baku', 'Khyrdalan', 'Khyrdalan city Haydar Aliev avenue', 'AZ0102', '518215735', 'rashadalakbaov.1618@gmail.com', 697794, 1231231, 'USD', 'Clock ,', '["2bb1yycmh"]', NULL, NULL, NULL, 'on', NULL, 'no', 'no', 'yes', 'no', '["bbburst.svg"]', '2022-02-22 15:30:20', '2022-02-22 15:30:20'),
	('1562aae17e96fdf', '14', 'JAsdj ALasd', 'Bolivia', 'asdsad', 'sdasdasa', 'dasdasdsa', 'AZ23123', '642342352', 'asdasdsad@gmail.com', 34124, 12123, 'USD', 'Bar 1 , Bar 2 ,', '["65s5h6jpw", "qti2bv1kd"]', NULL, NULL, 'on', 'on', NULL, 'yes', 'yes', 'no', 'no', '["kargo.sql"]', '2022-03-22 15:30:33', '2022-03-22 15:30:33'),
	('1562aae43473fa0', '14', 'Sindam Xantur', 'Australia', 'Sydney', 'Australia', NULL, 'SYD1944', '+99123343', 'sindam@gmail.com', 55622, 44522, 'USD', 'Just Package ,', '["yfn31s8lt"]', NULL, '3', 'on', 'on', 'on', 'no', 'no', 'yes', 'yes', '["cover.png"]', '2022-04-22 15:29:41', '2022-04-22 15:29:41'),
	('1562aae4a04bb5b', '14', 'Angolica And an', 'Angola', 'Angolandiya', 'AngoCity', 'Aangoo asrd', 'ANG1003', '0555639129', 'angollandor@gmail.com', 55622, 11234441, 'USD', 'Ango Watch , And Nothing', '["e4we4m2fx"]', NULL, '3', 'on', 'on', 'on', 'yes', 'yes', 'no', 'yes', '["cover.png"]', '2022-04-22 15:29:41', '2022-04-22 15:29:41'),
	('1562aae8b3b573d', '23', 'Someone Ayazov', 'Afghanistan', 'Afqan city', 'Afqan', 'Af mall in Afqan city', 'AF8893', '25235532', 'someone@gmail.com', 66673345, 33562, 'USD', 'Ayaz\'s cloth ,', '["dow3ecdr8"]', NULL, '3', 'on', 'on', 'on', 'no', 'no', 'no', 'yes', '["profile.png"]', '2022-04-22 15:29:41', '2022-04-22 15:29:41'),
	('1562ab143344ac6', '14', 'SSOMMS', 'Bahamas', 'Hawaii', 'Hawaii', 'Hawaii metro 1', 'HW3335', '123124666', 'dasdsds@gmail.com', 65745, 24344, 'USD', 'Coccoo ,', '["1d6lopkfl"]', NULL, '4', NULL, 'on', 'on', 'no', 'yes', 'no', 'yes', '["default.png"]', '2022-06-16 11:29:55', '2022-06-16 12:50:46');
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
) ENGINE=InnoDB AUTO_INCREMENT=932 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

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
	(931, NULL, 4, '24', '[1770, 1770, 2070, 8655, 3045, 3585, 6645, 7455, 2535, 8100, 3945, 5490, 7170, 5310, 10140]', '2022-06-14 16:25:54', '2022-06-14 16:25:54');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table kargo_com.comissions: ~3 rows (approximately)
/*!40000 ALTER TABLE `comissions` DISABLE KEYS */;
INSERT INTO `comissions` (`id`, `payment`, `comission`, `css_class`, `show_name`, `image`, `created_at`, `updated_at`) VALUES
	(1, 'PayPal', 10, 'balance__cards-box--2', 'Pay Pal', NULL, NULL, '2022-06-22 05:41:35'),
	(2, 'banka_hevale', 60, 'balance__cards-box--1', 'BANKA HEVALE / EFT', NULL, NULL, '2022-06-22 06:09:29'),
	(3, 'payoneer', 15, 'balance__cards-box--3', 'PAYONEER', NULL, NULL, '2022-06-22 06:09:23');
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

-- Dumping structure for table kargo_com.packages
CREATE TABLE IF NOT EXISTS `packages` (
  `id` varchar(50) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'AUTO_INCREMENT',
  `cargo_id` varchar(50) COLLATE utf8_turkish_ci DEFAULT NULL,
  `package_count` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `package_type` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `package_length` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `package_width` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `package_height` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `package_weight` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_turkish_ci DEFAULT '1',
  `barcode` text COLLATE utf8_turkish_ci,
  `products` json DEFAULT NULL COMMENT '0 => waiting, 1 => stock',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table kargo_com.packages: ~18 rows (approximately)
/*!40000 ALTER TABLE `packages` DISABLE KEYS */;
INSERT INTO `packages` (`id`, `cargo_id`, `package_count`, `package_type`, `package_length`, `package_width`, `package_height`, `package_weight`, `status`, `barcode`, `products`, `created_at`, `updated_at`) VALUES
	('1d6lopkfl', '1562ab143344ac6', '2', 'box', '3', '2', '2', '2', '1', 'data:image/png;base64,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ojwpDWrvbNUiNR/p6KOPDqbe4s/VV18dzj333IKESgKyp6TNq3n33Xdrh1977bVF2bT88ssXf48JyM5/6qmnBruWKonacaYW2z4p/NS1eTHiuOEQgICGw7L3mdoI6LfffgunnXZaeOeddwqPZrfddivKKzOZL7zwwuL/l10wU0YHH3xwOOWUU4rFbx2ijz76qOhq2d+OP/74sNpqqzXOt22R/vDDDwUB2phGIDvvvHNYbrnlwocffhguvvji8O233xaG8KabbjolIPOhjAivuuqqsPXWWwdTcGeccUaw67Gx1l9//XkE9PfffxfmspHPvffeW+vGQUC9w2ymTgABzdDtaCOgDz74IOy1116FUjjuuOOms27qglk72zyf1MdUihHCyiuvPO+QNgIqTV8rpfbff//ad1999dWw3377hTvvvLMovUoFZGrIyqd11113eryNYURoJeJ2221XI6AbbrihKB+///77eeTTt6RCAc1QsM9NBQKaoXvSRkDl4o/LizYC2nPPPcP5559fLPIVV1wxfPXVV+GSSy4J77//fnjyySfD5ptvnkVAbQu4NNTNi7r00kunBLThhhvO259UEmT1WoxYzVPaYIMNwpdffln4YbHnAwHNULAONBUIaCAghzhNGwHZxsBDDjlknkHdREClWrr//vvDLrvsUpvaG2+8UZjeXXwSDwEZ6V100UWdCMiIydSdkea+++5bqLRUqWgXlatoco8f4p5yjnYEIKAZipA2AipVg6kE6zaVn7JTtOWWW06VRqlGDjjggMKErr4uM6WkyvO1LdJnn3027LPPPkU3Ky7BrJw68MADi02ONr+yBIsVkHXRzKu66667aiqsNKHt+6+88kphQF9wwQVTU7vpNuUSSu7xMxQaS+1UIKAZurVtBFSSyjrrrBNuueWWwrx97bXXikVqXbFqF+yPP/4o/m4dK2uXWyu8ahbbBkjbHb3eeutllWBWwtneIvsYiWyzzTbFed97772CKOxjBGKkUxKQzfOaa64JNm9Ta0ZeVgbutNNO4bbbbpsqnGoXbK211ip2hBt5nnfeecX/lu396oRzCSX3+BkKjaV2KhDQiLe2LJ/uvvvu5CzKUsn29tiOaSOW6sda4qusssqUFMpnwUwxmRkct8ttcZv6OOigg4rvqDlYt80Wrj2fZerFiME2S/7666+1edh5bU+Tdd9McZUEZF2w+LPtttvO258Ut+GtE2aGtJVhNl8jvvjF54pQcq5txDBYpoeGgEa8/WqB2NSqXo21rm2R33HHHcWsbTOfkYH97bvvvquZvUYW1nq3vTkvvPBCYUJb+XTmmWcW5nO5mNUcqgRkY5p6MmVlKsw6X6nzNhGQbQPYY489wumnn16opOqnaSOiXa8R7qOPPlojN0+5mEuuI4bBMj00BLRM3/5Fd/EpD2jRjciZl0QEIKAl8a4tAXOGgJaAmzQDU4SAZuAmLI1TgICWxrs6/DVBQMNjyhkrD6M2bUQEIBAoEYCAiAUQAIHREICARoOegUEABCAgYgAEQGA0BCCg0aBnYBAAAQiIGAABEBgNAQhoNOgZGARA4D9wf+I2tagw4AAAAABJRU5ErkJggg==', NULL, '2022-06-16 11:29:55', '2022-06-16 11:29:55'),
	('3qrbj146s', '1562a83b6960ee6', '1', '3', '23', '223', '23', '2', '1', NULL, NULL, '2022-06-14 07:40:25', '2022-06-14 07:40:25'),
	('4e8knbc09', '1562a1dee97b863', '12', '2', '9876544', '9876544', '9876544', '9876544', '0', NULL, NULL, '2022-06-09 11:52:09', '2022-06-09 11:52:09'),
	('647lgtkic', '1562a2e3504dbad', '865', '1', '865', '865', '865', '865', '1', NULL, NULL, '2022-06-10 06:23:12', '2022-06-10 06:23:12'),
	('65s5h6jpw', '1562aae17e96fdf', '2', '1', '2', '2', '2', '2', '3', 'data:image/png;base64,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Y8KGG24Ybr755rDiiisuqUuFK6+8Mlx22WVhn332CY888khYc801l9i1OHB3CJCAusM+ufLXX38dHnzwwTB//vzw6quvxr89/PDDMeGrlyTiscceW5zx66+/HnbcccdGd2MdtykBWe4tnzgVUKOlnHYfIgF1vGTy0N5LL70UzjrrrPDRRx8ls5nuBOS5t46XgZfvCAESUEfAV5f94IMPwlFHHRWWW265cPnll4eddtoprLrqqsVZiVJ56KGHxt6SWMf1KiDPvXW8DLx8RwiQgDoCXi77999/hyuuuCIsWLAg3HfffWHTTTcdORsrUVSDfPrpp+G2224LTz/9dPjss8/CHnvsES688MKw++67h6WWWipp7SzEVhHQZpttFhWbjC3zXmWVVaJRfPLJJw98Ic+9/frrr/Hzd91119D9z5s3L/GbqjlIuzlnzpzoFT311FNDc5D7Pfroo8Pxxx8fZIzSS64nbe+jjz4aNthggw4jYXIvTQLqcO2/+eabcNxxx4W99947JiB6eQjo448/jmMvWrQoGXaLLbYIjz/+eNh4440bE5DsSP3www/hjTfeSMa+5557wty5c+PvPPfWhIDk6evvv/9+6P6uv/76cM4554SffvopnHTSSWHzzTcPl156aRFaIS/BR8h39dVXR/Dz70sAARLQEgDVOqR4PkceeWQ45ZRTYjI98cQT4Z133onkIL+TBFp55ZUToqib0FtuuWXYbbfd4vs22WST5CsUhKxEXUmF33bbbePfvvrqq/DMM8+EvfbaK2y00UbucSv1IZ6VKJCbbropbL311uG9996L2+XbbLNNuPXWW8NKK60U/SzPveWYae1efQ5C3FdddVXYaqutgqi9M844I/z888+xRV1jjTXCueeeG1Wm7NgtvfTSUf2tsMIKUTX9+eef8e/ykvuQ3/P1/yNAAvr/MR9cURSEeD7aSxJEEmz55ZePb9F2q6R9eOCBB8Iuu+wyGOr555+PO2aylS1kViey/HrWcavkF/VTbxkrBSMkUG2Ze+/NS0CiwkRxrb322gmRyr1KS7vddttFonn33Xfj+/7444/Ykv31119xjquttlo488wzw/rrr68qpA5DY2IuTQLqcKmrJN1///3DeeedF5Nm2WWXDZ988km45JJLwptvvhmefPLJ2EbkL9lh+u6778Jjjz0WLrroonheRhKtMrBFCVx99dXxR9SAGN2HHXZY2H777QeEVrr1UeNqqmQUATW5N5kXUkCls0gVntWRBCGa+++/P3o8n3/+ebjxxhvDL7/8Es4///yoGOWIg7Sp9aMOHYbDRF6aBNThsr/11lvhgAMOiOpF2qL6S87BiKJB53skoaSSf/HFF0O7Y0ImYsZKaydGtPgd0jrde++9iQdUgqA0roeA2t7bOAhICOm0006Lntcrr7wSb1POJEmLeMghh0Tiueaaa8LOO+/cYRRM9qVJQB2uf7VTc+ihh0YTuv61li+//HI0pxEBiXckxq+0GKPM1H/++Se89tprsR07+OCDY3sivoj2Ko3rIaC29+YlICFb8XruvPPOgWr88MMPY9t1ww03hGeffTbumv3222/Rp5L29oILLog7eSWF2WFYTNSlSUAdLvfvv/8e2wE5+SxJIepEtsfffvvtcPHFFwchDTGR11lnnaFZyt/Ec7njjjti4t1yyy3RhK1I7O677w7rrbde2GGHHWJbJgkq7z/99NPjlrNmvI4a10NAbe7N0oKtu+664brrrgtrrbVWkBZQtuKlbRVTXjARz+vLL7+MKmffffcN77//frxnIeoTTzwx7LrrrvHUObfgO0wAz/+G73aaM/fq0iZIkohiqL/Et5Fqfvjhh8dfj9qqlhZMzOq60Vw9S5UjJ2d2RCkddNBB7nE9BCSDW++ttLpIAclOXP6aPXt2Yo7/+OOPcYdQfDTxyQQT2RWT3TDxzmT3jFvw3eYWFVC3+EdlIlvv1157bXjxxRejCS3kIKQirUGlaHICEoKSg4VyyE68ovxpcfE6xOuptvZF9ey5555RATUd10tA1nsbRUBy6FGwkZPidWVUJyA5trDffvvFexNzunqJ2hGyEYX43HPPhQMPPDD+SXYIBeP8kGPHoTCRlycBTeSyT/2bFgIV/0YM4vpBQu/jIFP/Tid7hiSgyV7/KXH3smMm53XEHJcTyaL25EFcMYplG112rKoXCWhKLNnYJkECGhuUHKgpAtqhRfHGbr/99uQxCRJQU5Sn5udIQFNzXSZqVrJj9sILL8SdQDkqII+YHHHEEfHhVvG66i8S0MwKDRLQzFpP3g0RmFYIkICm1XJxskRgZiFAAppZ68m7IQLTCgES0LRaLk6WCMwsBEhAM2s9eTdEYFohQAKaVsvFyRKBmYXAv6TNQkWMqYl/AAAAAElFTkSuQmCC', NULL, '2022-06-16 07:53:34', '2022-06-16 07:53:34'),
	('d1ni24ut8', '1562a3314856e54', NULL, 'box', NULL, NULL, NULL, NULL, '1', NULL, NULL, '2022-06-10 11:55:52', '2022-06-10 11:55:52'),
	('dow3ecdr8', '1562aae8b3b573d', '3', 'box', '3', '32', '3', '3', '2', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASAAAACOCAYAAACR4tWqAAAAAXNSR0IArs4c6QAAE+1JREFUeF7tnWWoNdUXxtdrJxiIha2oH2xExcRusbsbW7GwsMXuFuzAwP5gK4qFYgcKFuoHwcSO98/a585xZu7ss9aeOXNH/uc3ny5nYs88e+1nP+tZe+ZOmjx58mRhAwEQAIEOEJgEAXWAOk2CAAgEBCAgAgEEQKAzBCCgzqCnYRAAAQiIGAABEOgMAQioM+hpGARAAAIiBkAABDpDAALqDHoaBgEQgICIARAAgc4QgIA6g56GQQAE3AQ0adKkAlrZAurs9/KC6tjvZcibHpd6X1n75fPK9xV7Pu955Xa8eGXnWXjG7iP1POv42BCp22+x/orhldp+ajxY8Rtrv9yf3viJxZ+3H7zx532u2IsQVnyVr2/1a7QfvSuhh9WxEFCPyGMBBwFV4+ONm2HFaepAh4CqBYql8VBAEYRQQINfEUQB9fBJVQoooOKAg4AgoAICdYnFmypZUr1p+yigIjGmKm3LovBOzN533CEgCAgCcqTEVopl7U8lAq+HM+x2IaAIIXg7xDJ7LYDLHoxltsUCIGaqpj6HdZ267Xu9Jq+y8R6HAuohVReHVG8qlfis8YECKn2+KFVyWwBDQM1M4DIRWQTurf5Y17W8FYv4rYFqKQ1rv3V9Lw4Q0BjSltJomsu3FXAQ0OBqRdv9VnfmbyseLGKKKTvK8MWJyurXqEKmDF8NjVdq1k2Bms6IVvXFm7p5Z14vAVjHWYHalABTFTEEVF3ttOIrVdlCQCUE6kpZ73kWAUBAPYSGTYAQEFWwgslmleMmesYjBSMFy89FKCAUUOVMaEn5uqYjBAQBQUD/IsCrGGPvmNVVSqmSGwKCgCAgCKiPAClYD4pUc9YyCS0PKts/bA/GUq6pzxk1LyMTV+qERApGCkYKBgF1NiFBQBAQBAQBQUCRBbZWtbSsEL3r82IK2LIovMtTLEul3w7rgKpFvhfoWABYKZAVWFZqRAqW9lkTS+lY/WENdGu/dX2rvy1iKBOK9bwQ0BgCeEB4QB5T2PKWYgPUqwgsgrAIxtpvXR8Cirl9JaJIZVpLikFAEBAE5F+Q6V0IiwJqWF5va8ZrKmW9AUAKViTW2LtT3pm/rXjwDlRL4Vj7UUDVCofvAUWUHx4QX0QclBTwMiovo4b4SF33gQJiIaIn5fMqXasY4FVYXiWYel+pyssaH96J2bJe+u1QBaue57xAx6Q3KRgpWH6CTCUCL3ENO/WDgCK619shVtXDAtgy2b0zEAQEAUFAg5LYsfhAAaGAPCmJ1wS2juNVjCIxlye82MTVdOKMnc/LqA2rZXhAxSFveQltEwAE1EPAUuJ1+8GrwFMzhli/eVM863liWogqWAQZPCCqYIMSCKpgVMFCfKCAUEBVKaTl5Q071fEqBW8q5FUww27XSvW8EzNVMCO1qytlvefFAtwbWKmplNdLsKRy05XppGCkYPkUdJCKDAICE7oaIi/Tx2YgCKiHQJnQ2ibAVEXsnRAspWHtpwxfPc4gIDygAgIooCJxxmZwPCA8IDygitGRmrpZx8cGYF2iQgFVE5y3H7wWgFfZUYanDD+QSK1Urm4K6PWMICBfik4KNvgVn2gc4QH5AsyS3N4BXXdmsryU1Pa9x0NAvviAgCCgEAPWArCyovDm+BBQESlSsOI/AISAICAIyPGfRtv2YMoD0VJuXu/Dum5sYrEmJK8itQjG2k8VrHqqpwoWkUCU4VkJHVPHVUobAkIBoYBQQMkr41FA/FueAnGkmp6pC8/wgPggWT7GICAICALi/4L1OaGuuY0H1EPA63nFqqDWBO21JngXjHfBQixNtAlsmcVtm+CpihgFhAJCAaGAUED8Z9RBnn/6Zy+aSmlrJq0ruS2JWZamloKIVT/K7TSVxt77sMrabSsQq9/abh8FVFyflFr+t8YHKVhkprCIIzYwYrTrBRoCSivXQ0C9iKmLA++CjY0474xumVFNlVLqjGcxvEVk3gBAARUHWmwluaXYYhOE17upG6fefo4d5203ZgZ7ny82AXrP52VUXkatNSNagW8RYGrgW6mVlyjqzvze9lMnJO9AtQa6tT81FRrWfaW2a03Q3szAEh79dngZtXroeIEmBSMFq4ogFNDguICAxpQXHlAxUJqmxJZSQQHhAeVjhHfBIgyEAkpTNqRgRQRQQCigEBGpJhsmdPFTm15i8R6HAkIBoYAqyqBeE9FbHbFM4FRzkHVAxR7ymrReJWL1hxUf1n7r+t5qoDf+UvGJpc7e57ImlugEhQmNCV2YkRpWJfGAegh4ia+suGMTV/n3VO8ydn5qhuC1JqiC8S5YiDlLOXlnXotYSMHwgPIIQEAQEASUoESsFMlKRaz91vW9EwEp2BjSXolpMWHTsm/qwrOmUtYbAHhAPQQmWoGlxoPXK7EIxtoPAVVrZMrwkdzBm+vGAg8CgoCqCNjrxQyLGFOJz5qgvePCEh79djChqxnICzQElLZeyKqWTLQiHtZARwHxTegQA1ZqaDF8th8CSiMWTGhMaExoCGjcwsuJ9mDKRDTR7eMB8T2gSvPRO0OmHpcacCggPkqfjzFSMD7JWkidIKAeAlZZls9xVL8ykjohQUAQEARU4wt5EBAEVDVZWx6oVQSwMgSvN0oVjIWIlamwFYBNq1B4QEUF61VYluK1iMEqnnjL/1Y7EBDfhC4QS91lAOWALQeeNYPVJaq2CZAUDBMaEzrHCrEqUOoCMaua5CWUtgkABYQCqvIwo94uCxGrofFKzboKBALyme1tFyW8KVKsny0vznt9UrBYT4/9Pixpa82QbQecleNauTTvgvUQIgUrpjoWQTWdcJrGLR5QhFnqBrIFqHVdL5F4U5/UFKhpQFozb8zTIQXzfQM7NT4gIF7FCDFglSGbziTewLQIAAIiBcuTFikYKVgBATwg3gUbNCTK8YECQgGhgGqsoPbOvMPy7tpOAYflVXqVrpUKY0IPVjZ8DyiCDwoIBYQCGo+Ad1xY68j6FgVl+Oow8wIdk954QNXVMhRQERdv8aKpd2kVbWIK15taWv0aI3MUEAqogIBVPYwRazTASq/EWIHatH1SMFZCh1hsGkhezyE14JrOJF5vAAWEAho0DuoSsTf+6npP1vjwZgakYLyMWjkR1A1874RgHdd2+6kTknegWqmItb/psguLGMqpnPe5YkSRaq5b/UoKVkKg7kziPQ8FhAJCAcVo59/f8YDwgPCABixfiA0h1gEVv8eEAhqLFFZCD37VwAqUtr27ttsnBcOExoTOTZvlAV03N49dJ+Y9WClg2TOIHR/N3Wv+D3kIqJiapvaD1wKoG2eW14QJzQfJCgQPAVUrvlRT1jKJLZPZ2m9d37siHQJypjptS/kYU5OCkYLlycCKB69SsAjG2g8BVWtpTGhMaExoTOhxo4AyfAkS70xlzXhWjmtJd68EtjyYpjOiFSBW+6neQzlC6ypcPCA8oHwsoYBQQCggFBAKyFq6jQIavO7Cq2jaViCWUmq7fcrwlOELVZq6xGIFMiZ08QNQENDg1MaawKyU2DKZrf3W9amCRVKRugO9rkcQuw0rgCzvJkZosfa86x1igWd5ME0DEg+I/4xaFbuWB2opUMsj9Y4LS3j02+F7QNUU5AUaAkr7cJk1AJpOXKRgpGCkYDlWYiV02jtDEFAxlbSU8rBTPxRQJCciBcOELpRvI6+CoIBQQCggFFAfAesdNq/52lZRwjuxWUrD2m8pGS8O3nVo3ufie0A1X2qsa45bEtMys70BgAldnUrgARVxKcdbLG6axq01XrxFGq83ignNFxErlWjbBGAplbbbJwUjBSMFIwUjBRv7akPdVMh73rBTP0tpoYD4HEeB4GMBaKWAqdLfUjaR2sG4f06AAiIFKxQTWAdUPXS8TF+XAJqakixEZCFiVeSyEHEMlabrObwzbmrOb0lMTOjqge3tD+s4FBAKCAWU+79lsdQBBZS2wpkUrIhAUyWCB1SKqFSlgQIqznTDDkhSMFKwkUrBYjMcv4MACIBAXQTcHySr2wDngQAIgEA0RfdWwYAQBEAABIaNAApo2IhyPRAAATcCEJAbKg4EARAYNgIQ0LAR5XogAAJuBCAgN1QcCAIgMGwEIKBhI8r1QAAE3AhAQG6oJu7AX3/9VY444ojQ4EUXXSTTTz/9xDX+H2oJHP5DndHSrUBALQHb5LITPfB+/vlnufnmm+Wmm26Sl19+WRZffHHZZJNN5JBDDpEFF1ywyaM0OncYOPzzzz/y7LPPylVXXSVPPvmkfPvtt7LccsvJ7rvvLvvss4/MOOOMje6Rk5shAAE1w6+Vs4cx8FJu7LbbbpNddtll3Cmrrrqq3HrrrZ2R0DBwuPPOO2W//faTn376adzzHXzwwXLuueeOrMJMiZG2joWA2kK2wXWHMfBSmn/wwQdlyimnlLXWWisoAlVE1157rRx55JGiA3j77bdPudzQjm2Kww8//BBUjl7nggsukMUWWyx8n+irr76SU089VV555RW56667guJj6wYBCKgb3Autfvrpp3LZZZfJI488Ih9++KEsvPDC8vfff8uGG25Y8ID0hda33npLLrnkEnnggQfkzz//FFUp++67r2y++eYy1VRTyWeffSY77bST7LbbbrL//vtXPt0111wTUq7bb79dFlhggcpjPvjgA9luu+3kjDPOCNfOb3q/Z511ltx7773h5y222EIOO+wwWXrppfsfIMuOz1KgSy+9NKRAU089tWy99dZy0kknyXzzzVcLB1Vst9xyS1BnH3/8sZx55pny8MMPy+qrry7nnHOOrLLKKuE+vvvuO9l1111lkUUWCUpn2mmnDe0pjldffXU4fxAG/4HQ+L+/BQio4y5WQlGyePPNN8fdiRJI3oRWL0O9CyWZ8qYD76ijjgrqRWd9JQMd5FXb6aefHrweHcSzzjpr4RAdnKoQLr74Yvnoo49EyWrOOefsH/P+++/LnnvuGc7Pb0pk6iGtueaa/Z//+uuvcP/aXjkFOu200wr3l4KDEpDelxK0Pnf+2iuttJLccccdstBCCwWiUeI7/PDD5cADDwzG/hxzzCH33XefaPsHHXRQUHmq/ti6QQAC6gb30KqShfoQL774opx33nmywQYbyDTTTCPffPONHHvsseHvjIC+/vrrQFS6T2fztddeW6aYYgp5/fXX5YQTTpAvvvhC7r777jDbKxGpgtJzdXAdd9xxMt100wUiUNWk+3XTtER/1+2FF16Q1VZbrY+Gqio9Pk8+WUr0xhtvhGuvuOKKhXuYZ5555PLLL+8bu88995zssMMOstRSSwUlpeavbkpi77zzjuy4447JOOgJmWc188wzy8knnxw8nplmmikQ6h577FFIG5UEr7vuOjnxxBODAa2bplx6niqxTBV1GAYj3TQE1GH3v/baa7LZZpuFgb733nv376TK+3j88cdl/fXXD2nPVlttVbhrTW223HLLUOnZeeedw/VUUVx//fXyxx9/hJRMB6IO3FlmmSWkS/PPP39BgZQJSBvYdtttQ2qYkZCmh+oH6eAt34OmdKo21DNadNFFAwGqAnv00UeDIllyySWjSKfgkBGQKhpNo5TEsm8jZfd39NFHBxx0UxX09NNPBxJ+9dVXw29KXHqMqh+qYB0OAP0wIG/Dd9cBGak8//zzwcvJtioCUvJQlVRlmma+j6YkOuj12BtvvDH4G59//rmcf/758ssvv8gxxxwjSyyxRBic6o1kg7SMgHonN9xwQ0hTVF2ox6JKoYqk8ufOPffc8tBDD8kKK6wQ0iJNcWaYYQZzLVMKDhkBxbDI34+Sj5LfAQccIOuuu25Qjj/++KOccsopwTOiCtZd7GctQ0Ad9oGSiaYowyKgTTfdVI4//vhAFDr49frPPPNMeEJN3ZQMVLko8Zx99tmyxhprRJ9eFZOmdupNKaHNPvvsSQSUVaD0PGsxZQoOKQSUEbP6XKoG55prrvC833//vRx66KHyxBNP9AmzwzAY6aYhoA67P1MUWtHKV5oyo3fZZZftD14tlWu1qSoFe+yxx2SbbbYJVR29jlawNO1SlXD//fcHX+S3334L1TP1f9Rf0nRJjerYpupBS9UvvfRSn4A0rdN2rrjiCllvvfUGIqftaVv6LOrNzDvvvNHjU3BIIaDsuhdeeGF/ZXl2E5mPpJjFlGCHoTEyTUNAHXZ1NkNrZUYJQU3cp556KqRKqjzyVbBPPvmkb9rmDWD1NTJTOVs0qFUsHVQbbbSRvPvuu8FsVi9or732Cmt9NE0aVH5W9aLHqHGrxremLGpma2qmXpWa56qOVl555WCUxzZN47Qipz6Nkpka5Lq999578vbbb/efJwWHFALKCHOZZZYJywa0/fw6IE3DspSxwzAY6aYhoA67X41anZ2VcPKbltqz6lSWvuT9jHJJe7bZZguqRA1iHWBZ+nPPPfeElExNaW1LjVg1iZdffvl+CT7zm7SsXd7KJrTuH7QUoLxsQIlKn+3KK68cd+18GT4FhxQC+v333wNRKgFXbXhAHQb/WNMQUMd9oINUySMbpGr6qmmqv3355ZcF/6RqUV/VIkBVO0o2Sl759C5L4/JEUSYgJbN11lknqJONN954XJk6Wwyp1TH1UPJrksoEpNBm75mpz6PkpeuF1IfSNTn5hYgpOAwy5MvdqSSkSid7F0wrYGr4qzJTz4wyfLcDAALqFn9aB4GRRgACGunu5+FBoFsEIKBu8ad1EBhpBCCgke5+Hh4EukUAAuoWf1oHgZFGAAIa6e7n4UGgWwQgoG7xp3UQGGkEIKCR7n4eHgS6RQAC6hZ/WgeBkUYAAhrp7ufhQaBbBP4HyhgbRVg0oSMAAAAASUVORK5CYII=', NULL, '2022-06-16 08:24:19', '2022-06-16 08:24:19'),
	('e4we4m2fx', '1562aae4a04bb5b', '4', 'box', '4', '3', '3', '4', '3', 'data:image/png;base64,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UiaptzJNS+J5E0EdhwLyvf4i6r3RgtGCLejKr4jFmzAQEATU5tV4FzNKZnoprrxeW1S5sgrGw6ghU1+1OqW/NwPbO05UATcD2kvo3uuwCsYqWChhokyvKkgpwL2JhwIa/TVGtftJFKF5cacFowWjBRtguaiknRYvTBFG7edGAfneqhAtzLRglTt3o0CjgGYQm2scIKDRr91Qii3qAarC5FV+Xd83PCA8oFBL6w3AUmDxRsT2FkcRvtej8o4TLczzVgGVAo1/BwEQAIFaBNzvA6q9AOeBAAiAwNgtGBCCAAiAQNcIoIC6RpTxQAAE3AhAQG6oOBAEQKBrBCCgrhFlPBAAATcCEJAbKg4EARDoGgEIqGtEGQ8EQMCNAATkhooD5yMC33//fbrlllvSk08+mT777LM8xZNPPjndeOONadVVV52PU2ZOAwhAQFMaDt9++21OtOeee25iCdflHP7999/01ltvpZtvvjm99tpraZ111kkHHnhgOuuss9KGG27Yepd+/PHH/Nmfeuqpob9DQNMT1BDQ9Nyr/kz//vvvdP3116cbbrgh/f777+nwww//3yt+l3PojXXBBRcsczd22mmn9PDDD6dNNtlkmb+98sorae+9906XXnppOvvss9Oaa645hXdz+Z4yBDSF99+UwoknnphOPfXU9OKLL6ZNN930fyegLudgzz898cQT6auvvkpHHXVUWnfddZOpm4suuijdcccd6Z577klLlixZ5k498sgj6dprr83nbrHFFlN4J5kyBDQPYuDzzz9PV1xxRXrmmWfybPbff/905plnpm222ab/tHpvmr22x9qS888/P51wwglZHfQ8jy+++CIroqOPPjq3J20/d911V3rwwQfTo48+mjbeeON8SJdzsPEuu+yyTCg2h3PPPTd99913ya5rD1GeccYZaeWVV0733nvvSOL46KOP0sEHH5xJ6eKLLw4T0HvvvZfPN5Vk+Ky++up5DFNcV111Vbr99tuzutpjjz3mQRQsn1OAgCZ83z/55JN03HHHpXfffXdoJkYMDzzwQNptt92GWi9LnNdffz099NBDaZVVVklHHHHEEAH99NNPmZSMvNqStkcOdj0bY+21105dz2HwGn/88Uf2dOzH5vr111+nN954I/9uJGUqp/TkfY+ATOmZF9Q755JLLhl5195+++1krZspK1NJRmD2We36di3D78gjj8wkf84556SVVlppwlGw/F4eAprgvTf/xhLrww8/zBV6hx12SCussEL64IMPcmJusMEG6dZbb+1Xbkuc0047LVduq9o//PDDMgRkCW9J9c8//+QxV1xxxWTeipGVJfxff/2V/24/5iNZknY9h0GiMDVnXtWVV16ZWylrHY0YLfmt1SqtVtm87PjLL788Pf3002n77bcPE5Cd8Ouvv6bzzjsvvfPOO+mxxx7LhGsEvXjx4rx6hm80wQSw91F5vxl1stNcmFe3ZeNDDjkkWUW3FZ/BH2uRbEXo8ccfT5tttln65ptvcuLssssu/ardRkC95Df1YAn8559/5pbM2g5TA2uttVZO/o022igTwVzOwfwZIw+bs5HcSy+9lH/feuut+4qmRECmyg477LD8X0mleD0gay9N8Wy++eZpvfXWS2+++Wa677770lZbbbUwA2uKPhUENMGbZVV55513Ls5g/fXXTy+88ELadttt80rPxx9/nH0USyL7KRGQJeb999+fPZ4vv/wyXXfddem3337LSmDLLbfMqsnaEvv/XM3B1JaNbXNZbbXVMuEYEQz+bp+hjYCMFM10ts99zTXX9BVgEygvAdl5vbbrl19+SXfffXc69NBDJ3jnuXQPAQhogrHgTX4zmY0sXn755ZGz3WeffXKCf/rpp+n000/Pq0NW7e3HNuwZEZjSsrGsJdp1113dBBSdg7WJNQT0/vvv57lvt9126eqrr05rrLFG8TN7CcjaOWu/TjnllPTzzz9nAjI1qb5gYIKhsdxcGgKa4K3umay33XZb2muvvYoz6SkdLwEZ2VjbZS3Qs88+m4499thk3tBNN92U2xlbPbP2zozquZpDlICMJGxp30hizz33HKl8ekB5Cahnshv5midm3k/T4J9gGCzXl4aAJnj7ba+LtRpmlJrpvOOOO+blae9PqQWzlSZTOfvuu29u28xsNi/o+OOPT7vvvntu63pL8HM1h0gLZga5+UO22nXAAQdk47m3ZD4KCw8BGRnbVgDbaW3tq5n8g7/32lkv5hzXLQIQULd4hkezqn/MMcck27/T/FGPFJQIqLcUb4bvhRdemFe/bFXMVsPM1Lb2prcEb9ecizlECMj8KdVi9pbWBzFSBNTbYW3Kb3C/T88POuigg7LS4pmxcNh2dgIE1BmUdQNZ62FtkLUFr7766hAR1RKQqR0jGzN47Vmx/fbbL0/u+eefz5scm+POxRzmAwEZ2Z500knZfDc8evt9ehsRjXzuvPPOvNKGH1QXv+OeBQGNiyDngwAIVCMAAVVDx4kgAALjIgABjYsg54MACFQjAAFVQ8eJIAAC4yIAAY2LIOeDAAhUIwABVUPHiSAAAuMiAAGNiyDngwAIVCMAAVVDx4kgAALjIgABjYsg54MACFQjAAFVQ8eJIAAC4yLwH06kyjZLzJbJAAAAAElFTkSuQmCC', NULL, '2022-06-16 08:06:56', '2022-06-16 08:06:56'),
	('nz08ox2wn', '1562a1ed0dc0fb5', '123', '1', '123', '123', '123', '123', '1', NULL, NULL, '2022-06-09 12:52:29', '2022-06-09 12:52:29'),
	('ohiis3j26', '1562a1e6a683caf', '12', '2', '12', '12', '12', '122', '4', NULL, NULL, '2022-06-09 12:25:10', '2022-06-09 12:25:10'),
	('pf30yib1q', '1562a1dd1ca5ada', '123123', '3', '123123', '123123', '123123', '123123', '1', NULL, NULL, '2022-06-09 11:44:28', '2022-06-09 11:44:28'),
	('qti2bv1kd', '1562aae17e96fdf', '3', '3', '3', '3', '3', '3', '3', 'data:image/png;base64,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TcJGG20Uyy37WDl0zz33JE+zzz77lDwR80eOPvro/vFbb711JJrNN9/cdccff/xxOPTQQyMpXXrppSUC2nnnncNxxx0XbrnlljjmYnwnnXRS9IWM1MxbsVLqhRdeCNtvv33pmp9++mksH0844YR4X3///Xe44447wu677x7v/dFHH41jz1FAn332WVi0aFG8jpHmlltu2b+m4XvbbbeFF198MSpIK0P//fffsO++++IBuaJhcgdBQJPD1nVmM1NNYVhiVD8nn3xyTJAuCejUU0/tG7ZFCbbSSisFM3JfeeWV0pCvu+66cM4554TlllsuvPfee+Hggw+OpWJh+BYHP/DAA5HUnn322bDjjjsO3XdBnl4CMtI+7bTTwk8//RQefPDBsMUWW/TPaUR67LHHho8++iiJb1dmuitA5vlBEFCHE/z777+H008/Pbz77rvh+uuvD6ZiVlhhhfDDDz/EpF1ttdWGVugmJZgltJ3fq4BMwZiKuPrqq8OTTz4Zdthhh5ICevnll8Pee+8df7/ddtsFUxhnnnlmsPuxa6233nrxv+3efvvtt3iu1VdfPZ6j+Ln99+233x5WWWWVsQjIPCwjaiMfI7ZBhZfC14z5Cy+8MGLNLliHCWAvkONh1O4moChzTCVYOVK8o2fUNvE0CMjKmSOPPDL+c+6554bll1++RED2/0Yq6667bh88Ix5TS6aKrESzj5VnRkKDZVhRfl111VVxp63u41VAZp5bifrdd98NkY+d9/333w8HHHBAsF2zwseyn7MN313MV68MAXU4F6+++mpUEtVSo0sCMoKzZDXPyEqqQYUyahes6DcavJcvv/wykpjt2hVlmKmU++67L26zm8fVlICee+65sMEGG4QvvvgiekaDnk9xzib4dhgOy+SlIaAOp91KoiOOOGKpISBTDOalWFl17bXXxt2owU8uAZnRawrFFJUpJlNOpoist+jyyy+PXlFTAiq8M1OP5jVZOVgt55rg22E4LJOXhoA6nPZCNTz11FOlcqTY0dlmm22SHtDChQuHzN3UrSgPyDwfa0S0re+99tprSPkU500RULHrdffdd0fPaKuttuoPxe7RuqftHs28tnHfeeedteZz8SVvCWY9Sq+99lokzQsuuKBULtq5CnxNLR144IH9MY3Ct8NwWCYvDQF1OO1F/8vaa68dt+HNvH3jjTdiMtmuTbELNrhLY36HJfSKK64Yv7PZZpv1vaMmBGTk8dJLL0X/JqUkqgRk4zSFZOP+66+/4vfNhN5jjz2GjGXrKbKSbrfddos9RkZEVoatscYaSeS9BGTHWde2lXNW4p133nnx34Vn1QTfDsNhmbw0BNThtFuJYj7LxRdfXBrFQQcdFBPUSKa6S/Pnn3/GJkEzYAc/g31AhYeU6hsaPLZQNbazlfoUvs6oY3faaaehLfDifEY4tuVuu0777bdfyRC2Y9R47ZhBb6n6KEbRzW1lmKkw853M0Dd8rbvaCH3wYyrM1Jh92AXrMAHYBesWfLu6bRVbw571r9jHGvBOPPHEcM011yQT5Jdffgn33ntvfLq96B+aBgEZ+T3//PNxd+uDDz6I17Zt7/333z+cddZZpefGBpEtdr6MgOpaAcYloAJHI5rHH388NjWa8W0kZPja/1vZZx9rlrRS035m3d8QULc5gALqFv/aq7NNvBROCkOaCAIQ0ERgHe+kENB4+PHt2UEAAloK5woCWgonhSFNBAEIaCKwjndSCGg8/Pj27CAAAc3OXDFSEJh3CEBA825KuSEQmB0EIKDZmStGCgLzDgEIaN5NKTcEArODAAQ0O3PFSEFg3iEAAc27KeWGQGB2EPgfO2LoNtuaB8YAAAAASUVORK5CYII=', NULL, '2022-06-16 07:53:34', '2022-06-16 07:53:34'),
	('qvht1m8al', '1562a83b6960ee6', '2', 'box', '65', '3', '4', '4', '1', NULL, NULL, '2022-06-14 07:40:25', '2022-06-14 07:40:25'),
	('r6nkspesf', '1562a2f5e5769c2', '50000', 'box', '50000', '50000', '50000', '50000', '1', NULL, NULL, '2022-06-10 07:42:29', '2022-06-10 07:42:29'),
	('unwq11uyv', '1562a1dd1ca5ada', '897', '3', '897', '897', '897', '897', '2', NULL, NULL, '2022-06-09 11:44:28', '2022-06-09 11:44:28'),
	('xvt5a3ygf', '1562a1dd1ca5ada', '765', '2', '765', '765', '765', '765', '1', NULL, NULL, '2022-06-09 11:44:28', '2022-06-09 11:44:28'),
	('xww6r0f49', '1562a83e5d1d8bb', '2', 'box', '3', '3', '3', '3', '1', NULL, NULL, '2022-06-14 07:53:01', '2022-06-14 07:53:01'),
	('yadl8yzwq', '1562a2f5e5769c2', '00000', 'box', '00000', '00000', '00000', '00000', '1', NULL, NULL, '2022-06-10 07:42:29', '2022-06-10 07:42:29'),
	('yfn31s8lt', '1562aae43473fa0', '2', 'box', '2', '2', '2', '2', '1', 'data:image/png;base64,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gPrFc6G09txzz4WddtopnH/++eG0004Lyy67bKf7Nif0sDEjlfvuu29EQkYSr732Wrj66qvDE088MbpnHwT00EMPhWOOOSb88ssvY5/lxBNPDJdffnmrsrO+X3HFFRMVkCnE/fffP5x55pnh4IMP7oQVF/eLAATUL54LpTXPpMvpyJNPPhkWXXTRsO2220alYYro1ltvjeRmxGCT1/598cUX4aCDDgoffvhhOO+888IyyywTjjvuuM4K6Keffooq5/fffw9XXXVVWHfddePDrl9++WVULm+99VaSYDxYQEA51bBw3wsBLVy8R3ezh0MtrzEb89RTT4VNN9201pOPPvoo2gWbmKeeemrt+4LUpPvuu+/iSr/NNtuEAw88MFx66aXhsccei4RhbZnSUDnRxx9/HPbbb79w8cUXhz322CP27c8//ww33nhjbNfs0QMPPBCzmEkK6PPPPw/XX399ePzxxyOBbb/99uHss8+OdmiRRRaJ7ZqlPPTQQ8Paa68dlc5iiy0WXzeMbr755qjC7F5rrLHG2GilsDAys896yy23JEd45513Dnb9SiutNKMq4LYQ0Axr4J133gm77757OOOMM8ZI5o477ohqwHKeDTbYIFx00UVRdUz6NySCIQH99ttv4eeffw7vv/9+7bLbb789HHnkka1N2aQ35XHttdeGTz/9NE7gVVZZpfW9Q+uWIiC73ojFcqXqv2ZobPc0kjrllFPC8ccfH7FYeeWVI2ldeOGF4YQTTohqzFRa8x8ENMMC7uHWEFAPIJY2YVbH8g2zIEY4K6ywQmzKchCbdPb/Q0VQQkDPPvtszIouu+yysPHGG0frZKHuZpttFq677rqw5JJLjrr+6quvhq233nr0/0cffXQkvRT52BsVAdnfzUJZwL355ptHFffNN9/E/GjHHXcM66yzzuh+f/31V7jtttvCueeeGwNo+2dhuJHu3nvvPVJFXgKqvg8LVlqh078OApo+xhPvYKv8EUccEZ555pnRTtIHH3wQDjjggLjNbpYld9INFdCPP/4Y7rzzzrD++uvHJoa2xGxR03o0CcjebxbQ+lCqgCxbMotmJGLKprqT1fxMpoJefPHFaM/efvvt+GezjBYcm/pJXavsqLUDAc24yCfcHgKa8dh89dVX4bDDDou5yjnnnBNVgmVDL7/8ck0VVbupJt2QgGwLvXouaBIBVdu3TMYUmdkfy4suueSSVgWiFJApPMuf7L8VV1wx5lH77LNP2GKLLWrtGfnYdr4F2jvssENUfWYdbZfv6aefjiqRXbAZF+qUbg8BTQlYb7N///13tCmvv/56tCqLL754zGfsHE4qp5k2AVnfzRIZIVp+lApqFQFZO0YuFj7bgUlTe5YH2fa+Edzw4OBwd80sp+VTq666aoTPFNzJJ58cnn/++dagfmgD2Yb3Vtv8ex8ENA/GxLaZbcfJJqXZjrPOOitap7XWWqu1dwuDgIw4jBjfeOONTgRU/QB2jsiUndmxvfbaK2ZMFiwP7Z+dL7IAuqn2zMbZTljbGR6FRdWCWf7VbH8eDP9/ugsQ0DwY/mEYvfTSS8dDhTYpzX607fp4Vv2uFsxCcTsaYIGw2cNUX5QCslB59dVXD1tuuWVYbrnlohqy/MlOWNuWuu3ymeKzzMusme2OmV2z7fjqOSCzYW1HFTxY2HtsV8/Iy7b3bbdteM5oHgz9f74LENA8KQGbzKYMjIRs633Sow1q1c8hoEnnZZohtOdsTXVLPrVzZyrv3nvvDXvuuWdE/48//oh2zwip7V81A1J9aDvbk2qfc0CzL34IaPZjEHvw2WefxZB2tdVWS4bPw65Ok4AsLLadN+vLLrvsUguL1eS3/lUJyB6YNVtp+c+7774bVY+FzKaANtxww9rhSiMJUzrDZ8GMpIyE7SDmbrvtNuqH6kOKVGxr305333XXXaOHdyGg2Rc/BDT7MYg9GG69n3766cnweZ50lW6AQG8IQEC9QVnWkAWzdu7FiGf55Zev7QKVtchVIPD/gwAENKOxaloJsyf2dRh2Hoh/IPBfQQACmtFIDwnIAmfLIux5MHvAU/3E8Yy6y21BYCoIQEBTgZVGQQAEPAhAQB6UeA8IgMBUEICApgIrjYIACHgQgIA8KPEeEACBqSAAAU0FVhoFARDwIAABeVDiPSAAAlNB4H+yhr42z1NQQwAAAABJRU5ErkJggg==', NULL, '2022-06-16 08:05:08', '2022-06-16 08:05:08'),
	('zdew0xb9u', '1562aae404aa00a', '3', 'box', '3', '3', '3', '3', '1', 'data:image/png;base64,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OqrfyXH+8847L7br4YcfDiuttFJ466234r4bbrhhbNdss80Wj//333+Hc845J1x11VXh1ltvDeuvv34oCGi11VYLe+yxR7RW9913X9wf+dbee+/dz7YeeuihqH4eeOCBSHjFBmV05plnhhdeeCG2db755usft54tFbgDn9tuuy3MM888HVbB+D61CKjD+88ICB36wAMP7Lfwgw8+iGTx/vvvj2o1CKRMQB6rBELZa6+9IiHVia44wemnnx7t1i233BKefPLJSAgFyRSE8txzz4Xjjz8+vPnmm5FUECiDENC5d9555/hdfAbSe/bZZ8NOO+0UifCII44IM8wwQ58oZp555kjKOE95A7kdfvjhkfBwzFNPPTXcc889sd3lDX87//zzw1133RUmTpwoAuqwtr2nFgF5kRqj/X799deoLrCh4xXKAZ+DjF599dXYyRC6zjTTTOG7774LRx99dPz/goAKYnvvvffiZyuvvHK0Su+8804kioUWWihcccUVsUODBKBgsB/+jTAZRADiQcCMv2O78MILw9VXXx1zHnTwpZZaKrz77rvR7jzyyCN9dBBOIwzGVlzLyy+/HHMbWDMQHhQHyHWOOeaI+xUK6IknnoiKCUpmxRVXDFAoBx98cDwOyAXtxrE22WSTsN1220UiWnDBBSNp4fMLLrggvPLKK5HAoKYsaycFNEbF7DiNCMgB0ljtAnuCjg6SgfWZf/75+6d+++23w+abbx6JYc899+x/3pQBwZptu+224aSTTgpbbbVVpfmwU5dddlm48847Y36C40FZXXfddeHPP/+MlgztQIefc845o1JZZJFFokLCvk899VQkCOyPY80+++zRaqFNyIFgqcpqCiQCxbPkkkvG63n++edHBcUFUUAN4bgLLLBAv81ox3777dcnlYLUYOGaNhBSodBEQGNVufnnEQHlYzf0byK/OOWUU2I+Up/JQceHOnjppZfCmmuuOZCAoAbWWmsts33lTooOfuONN8bc5Kuvvooq4rfffosqbOmll47WCTYK/4VKghUqts022yyqEEy/f/bZZ1GVIJguFFCxX2G7fvnllzBp0qS4X3kbFEIX11K+7h9++CEeB+0G2WL2CyQHxVYoNFmwoZfnFDmgCGiKwJp+UGQ2+++/fySgpqls2B503GETEDr4AQccEG0V1Ak22LpZZ501qicQz9lnnx3WXnvtqIrQ0WHpYLWgdmDtsBUKDSQF9VVs9WlzEAdsWPmVn6kE1IRuEUK/9tprMXOC3ZMCSq/Dsf6GCGisEW8437fffhttBqwMppib3sdbKIEHH3wwbLHFFv2jFGHz8ssv38+AYKlwrCuvvDJssMEGA6/w448/jrYLuRJmlnbbbbfwxx9/hEsvvTTmP8iXYNkQ+BYkc+SRR8YwuvzaUBAP1FM5oMaJi/aBzJAxIfuprxeyiAKkguNec801jaFz+cKK80CVIedC26zjfvrpp3EmDbmZZsG67QAioG7x7we1yFmKWaGmJhVT5pheBiEgkIW1gVXCrFh5FuzHH3+MmQzyEnRGBLLobE3bN998E1UOgt0PP/wwZlDIgjAdvu6660ZCgT3DQkMcF+d54403YkBe5EuYMkc71ltvvRhuF8E5lBT2//fff2OmBbVU/neRcRVEgWs699xz4xQ62oD1Rgih68ctrgPHxXcRXoP8EJ5D/SBvwlbkY1BFOD+UG4J5WEQE1QjyRUDddgARUIf4Y/bpoosu6s961ZtS7iDWvrvuumvseNjK0/DIk/A3EFd9K5NVMRWPaW10TATNOBdmwxBUYzaqsDQ4jnXc+irkIlCHkirW++D7RR6ErAgkhmfXyrNg9bY2rW5GGxGwl7flllsuztKtvvrqlc+vv/76aPnq+2IGDjZTBNRhB8Av5np/GbXbZv5/np2tA6qP0FA0sFXFDBAW6MFK4LOvv/66QkCwL7BisDxPP/10hYjKBASlAbIBeZXtHRb8YeFifX0RjovpdywmhEKZccYZY/B83HHHVZ7DAnmhfVBGOD5muLAVCxFBPrBWsJxoA84HJYVjI1hGiLzpppuGQw89NCy88MKVAigICM+ArbHGGvEYsF7FtH55Z2CM3AnXh0c3irZCNd1///0ioI67lgio4xug0wuB8YyACGg8331duxDoGAERUMc3QKcXAuMZARHQeL77unYh0DECIqCOb4BOLwTGMwIioPF893XtQqBjBERAHd8AnV4IjGcEREDj+e7r2oVAxwiIgDq+ATq9EBjPCIiAxvPd17ULgY4R+B/xQWNFEqFcvwAAAABJRU5ErkJggg==', NULL, '2022-06-16 08:04:20', '2022-06-16 08:04:20');
/*!40000 ALTER TABLE `packages` ENABLE KEYS */;

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
  `amount` int(11) NOT NULL DEFAULT '0',
  `comission` int(11) NOT NULL DEFAULT '0',
  `document` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `payment_comment` json DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table kargo_com.payments: ~5 rows (approximately)
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` (`id`, `userID`, `payment_status`, `deny_message`, `method`, `money_type`, `amount`, `comission`, `document`, `payment_comment`, `created_at`, `updated_at`) VALUES
	(1, 14, 1, 'Just testing', 'paypal', 'usd', 124, 120, 'photo_2022-06-19_01-59-46.jpg', NULL, '2022-06-20 10:30:36', '2022-06-22 05:55:19'),
	(2, 14, 2, NULL, 'payoneer', 'tl', 1412, 1610, 'photo_2022-06-19_01-59-46.jpg', NULL, '2022-06-20 10:31:07', '2022-06-20 12:18:11'),
	(3, 14, 2, NULL, 'banka_hevale', 'euro', 556, 584, 'photo_2022-06-19_01-59-46.jpg', '"asdasd"', '2022-06-20 10:34:14', '2022-06-20 12:17:57'),
	(5, 14, 1, 'Nothing', 'paypal', 'tl', 100, 0, 'photo_2022-06-19_01-59-46.jpg', '"asdadasasda"', '2022-06-20 12:31:17', '2022-06-20 12:58:37'),
	(6, 14, 2, NULL, 'payoneer', 'euro', 4123, 0, '1d6lopkfl.png', '"Note"', '2022-06-20 12:57:07', '2022-06-20 12:59:33');
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
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table kargo_com.products: ~24 rows (approximately)
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
	(74, '1562ab143344ac6', '1d6lopkfl', '3133', 'Coccoo', '2', '2', '2', '2', '2022-06-16 11:29:55', '2022-06-16 11:29:55');
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

-- Dumping structure for table kargo_com.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `phone_verified_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT '0' COMMENT '1 => active, NULL => passive',
  `is_admin` int(11) DEFAULT '0',
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
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_phone_unique` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table kargo_com.users: ~16 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `image`, `email`, `email_verified_at`, `password`, `phone`, `phone_verified_at`, `status`, `is_admin`, `membership`, `shipment`, `city`, `country`, `postcode`, `remember_token`, `address`, `address_2`, `indetification_number`, `company_name`, `tax_adminstration`, `tax_number`, `balance`, `Iban`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'Rashad Alakbarov', NULL, 'rashadalakbarov@gmail.com', NULL, '$2y$10$v77kJ/K.t8hW4f6yF2jJpuw9MMkZxo6opWWCYAYUUpHspnQdWOTEm', '994558215673', NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', NULL, '2022-04-22 17:49:11', '2022-04-22 17:50:58'),
	(2, 'eldora.zemlak', NULL, 'wlubowitz@example.org', '2022-04-22 17:49:14', '$2y$10$8jD/LkQ7Ixw7SV1Z61RuBuxgAIoRYHEUoSUuRSaaEfsa3jbmDL2/.', '(513) 951-0842', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '6gZhGSgt1s', NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', NULL, '2022-04-22 17:49:17', '2022-04-24 18:28:57'),
	(3, 'hand.cecelia', NULL, 'ferry.kianna@example.org', '2022-04-22 17:49:14', '$2y$10$iti.MslxMUHHFZF4DRHfy.ZRWpOZbbFfSq4YXW7x5ndeHTXAJ621u', '+1-657-214-4894', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'o1to3Os85s', NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', NULL, '2022-04-22 17:49:17', '2022-04-22 17:49:17'),
	(4, 'dangelo14', NULL, 'darien50@example.com', '2022-04-22 17:49:16', '$2y$10$jh98EmYqmtXyGnsOhN3b6uyGKofumJ9oPo0YV48AvSjnKk..BXXMm', '+1 (409) 618-6980', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'HxAxNG1nCL', NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', NULL, '2022-04-22 17:49:17', '2022-04-22 17:49:17'),
	(5, 'fgibson', NULL, 'catherine.yundt@example.net', '2022-04-22 17:49:16', '$2y$10$uNERg4XaGIjrWOgBqycS/OCaqtSbmATpLO2/UEG3BUSZsWiSXsw2e', '+1-774-233-1196', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'r3sWWWoBpm', NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', NULL, '2022-04-22 17:49:17', '2022-04-22 17:49:17'),
	(6, 'barton.fritz', NULL, 'mitchell.dangelo@example.org', '2022-04-22 17:49:16', '$2y$10$YNETxqfhTn7St0QUeAQp6u026c/UJ0/nplGyxReSftZNHe3kR2QQi', '430-740-2716', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'p1wyJy49Jz', NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', NULL, '2022-04-22 17:49:17', '2022-04-22 17:49:17'),
	(7, 'cassin.alyce', NULL, 'keaton39@example.com', '2022-04-22 17:49:17', '$2y$10$CTC3F7h9ndHy.GmGHPYSIO2AeRZo/OZU8/vMbRPHpgb5fU3cCBGVC', '+1.973.300.9920', NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 'PHSc7m6JPe', NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', NULL, '2022-04-22 17:49:17', '2022-04-24 19:53:22'),
	(8, 'oschmeler', NULL, 'dare.mackenzie@example.org', '2022-04-22 17:49:17', '$2y$10$2qwE4xRXXvKXT2KcBwtBGOoXrs9T5ln4GG6JCYJpdoGQ2en0mgHz6', '845.525.8515', NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 'ckWczrhhYC', NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', NULL, '2022-04-22 17:49:17', '2022-04-24 21:15:32'),
	(9, 'glang', NULL, 'vconn@example.org', '2022-04-22 17:49:17', '$2y$10$hKL6N/rJkhKzDedllej.a.GoYZATFpZ68bekwiUZMaz8Bfp4RDzeq', '+19155575834', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'P12rRQZYlt', NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', NULL, '2022-04-22 17:49:18', '2022-04-22 17:49:18'),
	(10, 'lina.ruecker', NULL, 'providenci36@example.net', '2022-04-22 17:49:17', '$2y$10$gK5g3V7OHqriGrLqP/AXrO.QL29D8oC26JiHqaoVrA7Iw/BDCqET2', '+1-814-201-9479', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'Mqz1LHhsTG', NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', NULL, '2022-04-22 17:49:18', '2022-04-22 17:49:18'),
	(11, 'drake.spencer', NULL, 'wpacocha@example.net', '2022-04-22 17:49:17', '$2y$10$/1NoT.uzUwY55HM7dt4lVetuon.I11WI4KOdkR5ljWj.W8/DpFnnG', '+1-865-299-1818', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'q61WqmtWi8', NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', NULL, '2022-04-22 17:49:18', '2022-04-22 17:49:18'),
	(12, 'kamran', NULL, 'kamran@mail.ru', NULL, '$2y$10$PzLN.DXfpZx0R2eNyZNJbu.vFVf3zkKviAL0b6DGHe8bqYoYflWRS', '2312312312', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', NULL, '2022-05-31 12:16:16', '2022-05-31 12:16:16'),
	(14, 'Senan', '1654498491.jpg', 'qulamovsenan@gmail.com', '2022-06-16 16:01:37', '$2y$10$fOmNfmD.kPJ49JXlRRUJ6eDsmkrXSBixgiIoBoeTdy17tXrfUYd46', '0515838095', NULL, 1, 1, 'personal', NULL, 'Baku', 'Azerbaijan', 'AZE1146', NULL, 'asdad', 'asdasdas12312', 'asdasd123123asd', NULL, 'asdasdsad1213', '1231231', 247, '3123123', NULL, '2022-05-31 11:14:58', '2022-06-22 12:11:16'),
	(18, 'Qabil', NULL, 'ayaz@gmail.com', NULL, '$2y$10$xY6CySFAwz5xd4IaBTDwnOMkFZ.Z8u6qDvpjXG22QXKG5lFPJpqKy', '123123123', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', NULL, '2022-06-01 07:10:12', '2022-06-01 07:10:12'),
	(22, 'JustOscar', NULL, 'oscarfromdesert@gmail.com', NULL, '$2y$10$c2rg7gJxpdCfGVs/gNJvteYo03j/Vmwo7Iq89mmD407PUaNM5BaSm', '1231023', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', NULL, '2022-06-01 07:46:58', '2022-06-01 10:25:14'),
	(23, 'Ayaz Ayazov', NULL, 'ayazayazov@gmail.com', NULL, '$2y$10$fIizB1bH8maL3wQBJAsXOuyYUE6/FNojl1lWiQv9Pq7oG3Zr56Qea', '+009951124', NULL, 0, 0, 'personal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', NULL, '2022-06-16 08:21:25', '2022-06-16 08:24:58');
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
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- Dumping data for table kargo_com.user_addresses: ~37 rows (approximately)
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
	(35, 14, 'Azerbaijan', 'Baku', 'Khyrdalan', 'Khyrdalan city Haydar Aliev avenue', 'AZ0102', 'Roshen Alex', '518215735', 'rashadalakbaov.1618@gmail.com', '2022-04-28 17:31:22', '2022-04-28 17:31:22'),
	(36, 14, 'UK', 'Absheron', 'Baku', 'Mehmandarov 72', 'AZ1149', 'senan', '0555639129', 'ferhad.thl@gmail.com', '2022-04-29 06:41:35', '2022-04-29 06:41:35'),
	(37, 14, 'Åland Islands', 'Absheron', 'Baku', 'Absheron 123', 'AZ0102', 'Alex', '518215735', 'alex.1618@gmail.com', '2022-06-10 06:23:12', '2022-06-10 06:23:12'),
	(38, 14, 'Antarctica', 'Xirdalan', 'Absheron', 'Baku 123', 'AZ5555', 'Somete', '518245511', 'somete@gmail.com', '2022-06-10 07:42:29', '2022-06-10 07:42:29'),
	(39, 14, 'Chad', 'Aran', 'Ucar', 'Ucar Qezyan 12', 'AZ00120', 'Nermin Nerminli', '642342352', 'narmin1990@gmail.com', '2022-06-14 07:38:22', '2022-06-14 07:38:22'),
	(40, 14, 'Angola', 'AngoCity', 'Angolandiya', 'Aangoo asrd', 'ANG1003', 'Angolica', '0555639129', 'angollandor@gmail.com', '2022-06-16 08:06:56', '2022-06-16 08:06:56'),
	(41, 23, 'Afghanistan', 'Afqan', 'Afqan city', 'Af mall in Afqan city', 'AF8893', 'Someone Ayazov', '25235532', 'someone@gmail.com', '2022-06-16 08:24:19', '2022-06-16 08:24:19'),
	(42, 14, 'Bahamas', 'Hawaii', 'Hawaii', 'Hawaii metro 1', 'HW3335', 'asdasd', '123124', 'dasdsds@gmail.com', '2022-06-16 11:29:55', '2022-06-16 11:29:55');
/*!40000 ALTER TABLE `user_addresses` ENABLE KEYS */;

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
