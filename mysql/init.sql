-- ============================================================
-- Database: barbershop
-- Demo data voor Dali The Barber
-- ============================================================

CREATE DATABASE IF NOT EXISTS `barbershop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `barbershop`;

-- ------------------------------------------------------------
-- Tabel: settings (algemene instellingen)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key_name` varchar(100) NOT NULL,
  `value` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key_name` (`key_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ------------------------------------------------------------
-- Tabel: services (diensten)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL DEFAULT 'haircut',
  `name` varchar(100) NOT NULL,
  `description` text,
  `price` decimal(6,2) NOT NULL DEFAULT '0.00',
  `duration` int(11) NOT NULL DEFAULT '30',
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `category` (`category`),
  KEY `is_active` (`is_active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ------------------------------------------------------------
-- Tabel: appointments (afspraken)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `appointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `service_id` int(11) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `notes` text,
  `status` enum('pending','confirmed','completed','cancelled') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `service_id` (`service_id`),
  KEY `appointment_date` (`appointment_date`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ------------------------------------------------------------
-- Tabel: contact_messages (contactformulier berichten)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `contact_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `subject` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `is_read` (`is_read`),
  KEY `created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ------------------------------------------------------------
-- Tabel: reviews (klantbeoordelingen)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) NOT NULL,
  `rating` tinyint(1) NOT NULL,
  `comment` text,
  `is_approved` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
  KEY `is_approved` (`is_approved`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================================
-- Seed Data
-- ============================================================

INSERT INTO `settings` (`key_name`, `value`) VALUES
  ('shop_name', 'Dali The Barber'),
  ('tagline', 'Ambacht & Vakmanschap'),
  ('email', 'dalithebarber055@gmail.com'),
  ('phone', '+31618737335'),
  ('address_street', 'Asselsestraat 26a'),
  ('address_city', 'Apeldoorn'),
  ('address_postal', '7311 EL'),
  ('latitude', '52.207402'),
  ('longitude', '5.9302126'),
  ('since_year', '2019'),
  ('rating', '8.4'),
  ('meta_description', 'Welkom bij Dali The Barber in Apeldoorn. Gespecialiseerd in herenkapsels, baardstyling en skinfades. Boek nu je afspraak.'),
  ('meta_keywords', 'barber, kapper, herenhaar, apeldoorn, afspraak maken, haar knippen, baard, barbershop, skinfade, dali');

INSERT INTO `services` (`category`, `name`, `description`, `price`, `duration`, `sort_order`) VALUES
  ('haircut', 'Klassiek Knippen', 'Een tijdloze herenknip met precisie en aandacht voor detail.', 25.00, 30, 1),
  ('haircut', 'Skinfade', 'Ultra strake overgang van de huid met scherpe lijnen en een moderne finish.', 30.00, 35, 2),
  ('haircut', 'Textuur Cut', 'Natuurlijke textuur aan het toppje met volume en movement.', 28.00, 30, 3),
  ('beard', 'Baard Trim', 'Strake baardlijn met scherpe contouren en verzorging.', 15.00, 15, 4),
  ('beard', 'Baard Styling', 'Complete baardbehandeling met was, trim en vormgeving.', 25.00, 30, 5),
  ('styling', 'Hair & Beard Combo', 'Kapsel en baard in één sessie. Het volledige pakket.', 45.00, 55, 6),
  ('color', 'Highlights', 'Subtiele kleuraccenten voor meer diepte en dimensie.', 35.00, 45, 7),
  ('color', 'Kleuring', 'Volledige verandering met een professionele herenkleuring.', 55.00, 60, 8),
  ('styling', 'Kuisen & verzorgen', 'Diep conditionerend voor gezond, glanzend haar.', 20.00, 20, 9);

INSERT INTO `reviews` (`customer_name`, `rating`, `comment`, `is_approved`) VALUES
  ('Mike Jansen', 5, 'Dali weet precies wat goed staat. Mijn skinfade was perfect en de baardstyling was top. Echt vakmanschap!', 1),
  ('David van der Berg', 5, 'Fantastische service en een top resultaat. De sfeer in de shop is ontspannen en Dali neemt echt de tijd voor je. Kom er zeker weer!', 1),
  ('Jason Lee', 5, 'Eerste keer hier geweest en meteen een vaste klant geworden. Precise cut, persoonlijke aandacht en eerlijke prijs.', 1),
  ('Robert de Vries', 5, 'Al maanden klant en nog steeds blij met mijn kapsel. Dali is een echte professional die zijn vak verstaat. Aanrader!', 1),
  ('Thomas Bakker', 5, 'Top barber! Mijn kapsel zit precies zoals ik het wil. De aandacht voor detail is ongekend. Een echte meester in zijn vak.', 1);
