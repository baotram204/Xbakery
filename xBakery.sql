-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for xbakery
CREATE DATABASE IF NOT EXISTS `xbakery` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `xbakery`;

-- Dumping structure for table xbakery.admins
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table xbakery.admins: ~1 rows (approximately)
INSERT INTO `admins` (`id`, `user_name`, `password`) VALUES
	(2, 'xiu', '123');

-- Dumping structure for table xbakery.carts
CREATE TABLE IF NOT EXISTS `carts` (
  `cart_id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `total_money` decimal(10,2) DEFAULT NULL,
  `payment_id` int DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `customer_id` (`customer_id`),
  KEY `payment_id` (`payment_id`),
  CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table xbakery.carts: ~0 rows (approximately)

-- Dumping structure for table xbakery.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `item_id` int DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table xbakery.categories: ~4 rows (approximately)
INSERT INTO `categories` (`category_id`, `item_id`, `title`) VALUES
	(1, 1, 'breads'),
	(2, 2, 'cookies'),
	(3, 3, 'pastries'),
	(4, 4, 'sandwiches');

-- Dumping structure for table xbakery.customers
CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `delivery` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `comment` text,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table xbakery.customers: ~0 rows (approximately)

-- Dumping structure for table xbakery.items
CREATE TABLE IF NOT EXISTS `items` (
  `item_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `category_id` int DEFAULT NULL,
  `description` text,
  `ingredients` text,
  `price` decimal(10,2) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table xbakery.items: ~0 rows (approximately)

-- Dumping structure for table xbakery.order_items
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `item_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `cart_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `item_id` (`item_id`),
  KEY `cart_id` (`cart_id`),
  CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`cart_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table xbakery.order_items: ~0 rows (approximately)

-- Dumping structure for table xbakery.payment
CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int NOT NULL AUTO_INCREMENT,
  `cash` int NOT NULL,
  `card_number` varchar(20) DEFAULT NULL,
  `card_fullname` varchar(255) DEFAULT NULL,
  `birthday` varchar(20) DEFAULT '',
  `total_money` decimal(10,2) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`payment_id`),
  CONSTRAINT `check_cash` CHECK ((`cash` in (0,1)))
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table xbakery.payment: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
