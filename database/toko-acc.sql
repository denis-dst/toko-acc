/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 8.0.30 : Database - toko_acc
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`toko_acc` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `toko_acc`;

/*Table structure for table `cache` */

DROP TABLE IF EXISTS `cache`;

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cache` */

/*Table structure for table `cache_locks` */

DROP TABLE IF EXISTS `cache_locks`;

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cache_locks` */

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `categories` */

insert  into `categories`(`id`,`name`,`slug`,`description`,`image`,`status`,`sort_order`,`created_at`,`updated_at`) values 
(1,'Rubber / Karet','rubber-karet','Produk rubber PVC berkualitas presisi, elastis, tahan air, dan awet dengan detail warna tajam 2D maupun 3D.','/images/categories/rubber.jpg',1,1,'2026-09-27 08:59:54','2026-09-27 08:59:54'),
(2,'Medali Custom','medali-custom','Medali cor logam zinc alloy, kuningan finishing antik, dan akrilik cetak UV untuk kejuaraan lomba, event lari, dan wisuda.','/images/categories/medals.jpg',1,2,'2026-09-27 08:59:54','2026-09-27 08:59:54'),
(3,'Gantungan Kunci','gantungan-kunci','Gantungan kunci custom aneka material: rubber PVC, akrilik bening grafir, dan logam solid untuk cinderamata dan merchandise.','/images/categories/keychain.jpg',1,3,'2026-09-27 08:59:54','2026-09-27 08:59:54');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `job_batches` */

DROP TABLE IF EXISTS `job_batches`;

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `job_batches` */

/*Table structure for table `jobs` */

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'0001_01_01_000000_create_users_table',1),
(2,'0001_01_01_000001_create_cache_table',1),
(3,'0001_01_01_000002_create_jobs_table',1),
(4,'2026_09_27_085512_create_categories_table',2),
(5,'2026_09_27_085513_create_products_table',2),
(6,'2026_09_27_085514_create_product_images_table',2),
(7,'2026_09_27_085515_create_portfolios_table',2),
(8,'2026_09_27_085516_create_portfolio_images_table',2),
(9,'2026_09_27_085517_create_testimonials_table',2),
(10,'2026_09_27_085518_create_site_settings_table',2);

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

/*Table structure for table `portfolio_images` */

DROP TABLE IF EXISTS `portfolio_images`;

CREATE TABLE `portfolio_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `portfolio_id` bigint unsigned NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `portfolio_images_portfolio_id_foreign` (`portfolio_id`),
  CONSTRAINT `portfolio_images_portfolio_id_foreign` FOREIGN KEY (`portfolio_id`) REFERENCES `portfolios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `portfolio_images` */

insert  into `portfolio_images`(`id`,`portfolio_id`,`image`,`caption`,`sort_order`,`created_at`,`updated_at`) values 
(1,1,'/images/portfolio/medali-kejuaraan.jpg','Hasil produksi medali logam cor kejuaraan pelajar',1,'2026-09-27 08:59:54','2026-09-27 08:59:54'),
(2,2,'/images/portfolio/rubber-patch-komunitas.jpg','Set patch velcro dan gelang karet hasil pengerjaan workshop',1,'2026-09-27 08:59:54','2026-09-27 08:59:54'),
(3,3,'/images/portfolio/gantungan-kunci-metal.jpg','Gantungan kunci logam dan akrilik cetak laser',1,'2026-09-27 08:59:54','2026-09-27 08:59:54');

/*Table structure for table `portfolios` */

DROP TABLE IF EXISTS `portfolios`;

CREATE TABLE `portfolios` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `portfolios_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `portfolios` */

insert  into `portfolios`(`id`,`title`,`slug`,`description`,`category`,`client_name`,`project_year`,`cover_image`,`status`,`sort_order`,`created_at`,`updated_at`) values 
(1,'Medali Kejuaraan Futsal Regional Pelajar','medali-kejuaraan-futsal-regional','Produksi 150 keping medali emas, perak, dan perunggu berbahan die-cast alloy dengan finishing antique polish serta tali lanyard motif batik kontemporer.','Medali Custom','Panitia Pekan Olahraga Pelajar','2024','/images/portfolio/medali-kejuaraan.jpg',1,1,'2026-09-27 08:59:54','2026-09-27 08:59:54'),
(2,'Rubber Patch & Keychain Komunitas Petualang','rubber-patch-dan-keychain-komunitas-outdoor','Pembuatan 300 pcs patch velcro karet dan 500 pcs gantungan kunci rubber 3D untuk official merchandise ekspedisi alam terbuka.','Rubber / Karet','Komunitas Mountain Expedition','2024','/images/portfolio/rubber-patch-komunitas.jpg',1,2,'2026-09-27 08:59:54','2026-09-27 08:59:54'),
(3,'Merchandise Gantungan Kunci Korporat & Showroom','merchandise-gantungan-kunci-korporat','Paket suvenir eksklusif gantungan kunci logam dengan grafir laser identitas korporat sebanyak 1.000 unit untuk suvenir akhir tahun.','Gantungan Kunci','PT Mitra Otomotif Nusantara','2023','/images/portfolio/gantungan-kunci-metal.jpg',1,3,'2026-09-27 08:59:54','2026-09-27 08:59:54');

/*Table structure for table `product_images` */

DROP TABLE IF EXISTS `product_images`;

CREATE TABLE `product_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_primary` tinyint(1) NOT NULL DEFAULT '0',
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_images_product_id_foreign` (`product_id`),
  CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_images` */

insert  into `product_images`(`id`,`product_id`,`image`,`caption`,`is_primary`,`sort_order`,`created_at`,`updated_at`) values 
(1,1,'/images/products/rubber-keychain-1.jpg','Detail cetak timbul dan kontur warna gantungan kunci rubber',1,1,'2026-09-27 08:59:54','2026-09-27 08:59:54'),
(2,2,'/images/products/custom-medal-1.jpg','Tampilan medali emas, perak, perunggu dengan tali lanyard bermotif',1,1,'2026-09-27 08:59:54','2026-09-27 08:59:54'),
(3,3,'/images/products/rubber-patch-1.jpg','Emblem karet velcro dan wristband cetak timbul',1,1,'2026-09-27 08:59:54','2026-09-27 08:59:54'),
(4,4,'/images/products/metal-acrylic-keychain.jpg','Gantungan kunci akrilik presisi dan pelat logam finishing matte',1,1,'2026-09-27 08:59:54','2026-09-27 08:59:54');

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `material` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `minimum_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `price_label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Konsultasi',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int NOT NULL DEFAULT '0',
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products` */

insert  into `products`(`id`,`category_id`,`name`,`slug`,`short_description`,`description`,`material`,`custom_info`,`minimum_order`,`price`,`price_label`,`featured`,`status`,`sort_order`,`meta_title`,`meta_description`,`created_at`,`updated_at`) values 
(1,1,'Rubber Keychain 3D Custom','rubber-keychain-3d-custom','Gantungan kunci karet PVC cetak timbul 2D atau 3D sesuai bentuk dan desain logo yang Anda inginkan.','Gantungan kunci karet custom diproduksi dengan material PVC food-grade berkualitas tinggi yang lentur, tahan air, dan tidak mudah patah. Sangat ideal untuk cinderamata komunitas, suvenir pernikahan, merchandise brand, atau promosi korporat.\n\nKeunggulan Produksi:\n- Detail timbul tajam dengan pemisahan warna rapi tanpa bleed.\n- Pilihan ring standar atau ring putar berkualitas anti-karat.\n- Bisa custom bagian belakang polos, motif serat, atau cetak tulisan embossed.','Soft PVC Rubber Berkualitas Tinggi','Bebas bentuk custom, opsi 2D atau 3D relief, maksimal 8 warna solid','100 pcs',8500.00,'Mulai dari',1,1,1,'Rubber Keychain 3D Custom | Toko Jaya Promosi Lestari Workshop','Pesan gantungan kunci rubber PVC custom sesuai desain komunitas, sekolah, dan promosi bisnis Anda.','2026-09-27 08:59:54','2026-09-27 08:59:54'),
(2,2,'Medali Kejuaraan Logam Cor Zinc Alloy','medali-kejuaraan-logam-zinc-alloy','Medali logam cor presisi tinggi dengan pilihan finishing emas, perak, dan perunggu antik lengkap dengan tali lanyard printing.','Medali die-cast zinc alloy dirancang untuk ajang kejuaraan resmi, perlombaan olahraga, turnamen esports, dan penghargaan akademis. Memberikan bobot mantap dan kesan prestisius saat dikalungkan.\n\nSpesifikasi Produksi:\n- Ketebalan medali 3 mm sampai 5 mm sesuai kebutuhan.\n- Finishing: Gold shiny, Antique Gold, Silver polished, dan Antique Bronze.\n- Termasuk tali lanyard printing sublimasi full-color lebar 2.5 cm sampai 3 cm.','Zinc Alloy / Logam Cor Padat','Diameter 6 cm - 8 cm, tali lanyard custom motif, ukiran timbul dua sisi','50 pcs',28000.00,'Mulai dari',1,1,2,'Medali Kejuaraan Logam Cor Zinc Alloy | Toko Jaya Promosi Lestari','Produksi medali custom die-cast logam cor untuk perlombaan olahraga, kejuaraan, dan event resmi.','2026-09-27 08:59:54','2026-09-27 08:59:54'),
(3,1,'Rubber Patch Velcro / Emblem Karet','rubber-patch-velcro-emblem','Patch karet timbul dengan jahitan velcro halus untuk seragam, tas taktis, jaket komunitas, dan topi.','Emblem karet dengan backing velcro rekat kuat (hook & loop) siap pasang pada pakaian, topi, rompi, atau tas perlengkapan. Tahan cuaca ekstrem, mudah dibersihkan dari debu atau lumpur cukup dilap air.\n\nSpesifikasi:\n- Dilengkapi list jahitan keliling agar velcro merekat permanen.\n- Tekstur micro-detail dapat mencetak tipografi kecil dengan presisi.','Molded PVC Rubber + Velcro Backing','Bentuk bebas: perisai, lingkaran, persegi panjang atau custom kontur','50 pcs',12500.00,'Mulai dari',1,1,3,'Rubber Patch Velcro Custom | Toko Jaya Promosi Lestari','Bikin patch emblem karet velcro untuk seragam komunitas, rompi, dan tas tactical.','2026-09-27 08:59:54','2026-09-27 08:59:54'),
(4,3,'Gantungan Kunci Metal & Akrilik Grafir','gantungan-kunci-metal-akrilik-presisi','Gantungan kunci berbahan logam zinc alloy elegan dan akrilik bening potong laser dengan grafir presisi tinggi.','Kombinasi modern antara akrilik transparan tebal dengan ring logam premium, atau pelat logam brushed solid dengan grafir laser permanen. Memberikan sentuhan elegan untuk merchandise hotel, suvenir showroom otomotif, atau gift korporat eksklusif.','Akrilik Bening Tebal 4mm & Logam Brushed Alloy','Cetak UV timbal balik atau grafir laser presisi','50 pcs',15000.00,'Mulai dari',0,1,4,'Gantungan Kunci Metal & Akrilik Grafir | Toko Jaya Promosi Lestari','Merchandise gantungan kunci akrilik laser cut dan pelat logam solid untuk suvenir perusahaan.','2026-09-27 08:59:54','2026-09-27 08:59:54');

/*Table structure for table `sessions` */

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sessions` */

insert  into `sessions`(`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) values 
('2zW5slt8dYbbEuT2iov3a712L4AhjY9hYqyr2RbJ',NULL,'127.0.0.1','','eyJfdG9rZW4iOiJCTjRMTjdVQUtkdGlRYzRGb2ZQSnBKTVk1UzBoR29MRTY4c0hzNXZpIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9sb2thc2kiLCJyb3V0ZSI6ImxvY2F0aW9uIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1790500251),
('3Vk6GTirg1pld4XEA1oFmtuyxGE43vnaALGjzx2k',NULL,'127.0.0.1','','eyJfdG9rZW4iOiJaNjBJMFJUZXVvaFlRc3VUN2gzcFdBMFFDSVNkVHViNXZyWDNSc0xoIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9wb3J0b2ZvbGlvIiwicm91dGUiOiJwb3J0Zm9saW9zLmluZGV4In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1790500249),
('7LxzWjHlgSuhKZKjyO2sCs6WFPpKw2QAYUVx4ZUx',NULL,'127.0.0.1','','eyJfdG9rZW4iOiJaeFRaSjNVM2N3VTZtUXFadjBOMExaa01GdWRhZmxsRk1NeENIUTRKIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9rYXRhbG9nIiwicm91dGUiOiJwcm9kdWN0cy5pbmRleCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1790500246),
('7ZdOsjuo1NSxHE2fzTVjeB231TdnRei5KEOHaIyq',NULL,'127.0.0.1','','eyJfdG9rZW4iOiIyamxUaGZGdWdNV2pJbXFObUFvRmRNY3JydWhhNGlKd2J2TUp4YnhFIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9rYXRlZ29yaVwvcnViYmVyLWthcmV0Iiwicm91dGUiOiJwcm9kdWN0cy5jYXRlZ29yeSJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1790500247),
('Dpckeqt4VGETW25MzVjgW4s5pOsgn3qYOGuJvmVR',NULL,'127.0.0.1','','eyJfdG9rZW4iOiJOZVJXZGpOU2RUNXVvWFlxRFE4U0IyUGxJR1B4NU9LT1FDWkczd1Y2IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC90ZW50YW5nLWthbWkiLCJyb3V0ZSI6ImFib3V0In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1790500250),
('GHmmVbI8VPXK8jBVzePB4KIyRr8QYboLzgMGzC7l',NULL,'127.0.0.1','','eyJfdG9rZW4iOiJhdnJHVUVlTG5VQjdoTWZxY0h1bHBQSTZIY1QxYlpqSlVoTFAxZWU1IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC90ZXN0aW1vbmkiLCJyb3V0ZSI6InRlc3RpbW9uaWFscyJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1790500252),
('Gvow6Urd49Y0Ou9U2mdRlgdX6jvm54dt72yFnOtw',NULL,'127.0.0.1','','eyJfdG9rZW4iOiJuWDFqRGJHaWhERW5KRzkxNEpNemdOUUxLQ1Fqaks0Njh3TXI4TnU5IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9rb250YWsiLCJyb3V0ZSI6ImNvbnRhY3QifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1790500252),
('hcd1Ll85n6b6TY8ZpLnUdfJ1KiTn7byBMq476qDk',NULL,'127.0.0.1','','eyJfdG9rZW4iOiJrUjFadDhRWlVCNEs3dmtvS2Z0SlhZNXR1SHpUWW5SWFNzaGtSQkFyIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9hZG1pblwvbG9naW4iLCJyb3V0ZSI6ImFkbWluLmxvZ2luIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1790500253),
('Qz1l4YljKmSSM7HQ2cdx03xTB3M6OddwTyq9V5yY',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:156.0) Gecko/20100101 Firefox/156.0','eyJfdG9rZW4iOiJUVE9jN3VjOUlRb1dTY09UTlVPcGlJbkthQkNsMHVsUUNrOGdCbHliIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL3Rva28tYWNjLnRlc3RcL2thdGFsb2dcL3J1YmJlci1rZXljaGFpbi0zZC1jdXN0b20iLCJyb3V0ZSI6InByb2R1Y3RzLnNob3cifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MSwicGFzc3dvcmRfaGFzaF93ZWIiOiI4NjBlYjczZGMzYmUxN2Q1YzM4MDEwYmNjOWRkM2Q5ZjYyNDYxNGMyNjNmYjM2ZjZmMzdmNjE4M2JhZmZhMzI2In0=',1790502647),
('rC9XIEEUvGgvz0np0UQV7JP2hvUwLXh1kwvP4xRl',NULL,'127.0.0.1','','eyJfdG9rZW4iOiIxRTBmYjJWYlkwWmtGRjlrbVo1d2ZETFlGdVgzOWpSNDN3UGplMmliIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1790500245),
('tJLjehGcW9pyEhNdlmkWX3hmql8DD92pqRvd89ba',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT; Windows NT 10.0; en-US) WindowsPowerShell/5.1.26100.9444','eyJfdG9rZW4iOiJlaUt1Y0pxRmVqdUFTSnZIWVZodmhWU1hJa1NlMU1VVVdQZ2ZBWkNDIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1790500199),
('xF7NVJkfwpyj080b0AVB5yk7WUKdh3aicCgXbfgV',NULL,'127.0.0.1','','eyJfdG9rZW4iOiJRbEVSZjFnN3kwYldTR1I1QUpQMmhNWnFqRFVtVlA1MVd5ckJsM2RmIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9rYXRhbG9nXC9ydWJiZXIta2V5Y2hhaW4tM2QtY3VzdG9tIiwicm91dGUiOiJwcm9kdWN0cy5zaG93In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1790500248),
('XprA2Kya7IRhV2JsS5hvn1eWK6SEajAVlIsG5KTD',NULL,'127.0.0.1','','eyJfdG9rZW4iOiJWV2o1bFBXM3IwcGExRFdoQ2NnNndmQjFRdndJMGRYOHBaaUp0b3BRIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9wb3J0b2ZvbGlvXC9tZWRhbGkta2VqdWFyYWFuLWZ1dHNhbC1yZWdpb25hbCIsInJvdXRlIjoicG9ydGZvbGlvcy5zaG93In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1790500250);

/*Table structure for table `site_settings` */

DROP TABLE IF EXISTS `site_settings`;

CREATE TABLE `site_settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `site_settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `site_settings` */

insert  into `site_settings`(`id`,`key`,`value`,`created_at`,`updated_at`) values 
(1,'site_name','Jaya Promosi Lestari','2026-09-27 08:59:53','2026-09-27 09:50:33'),
(2,'tagline','Spesialis Custom Rubber, Medali & Gantungan Kunci','2026-09-27 08:59:53','2026-09-27 08:59:53'),
(3,'description','Digital showroom dan workshop pembuatan produk custom rubber PVC, medali kejuaraan, dan gantungan kunci suvenir untuk kebutuhan komunitas, event, sekolah, dan perusahaan.','2026-09-27 08:59:53','2026-09-27 08:59:53'),
(4,'whatsapp','6282326170804','2026-09-27 08:59:53','2026-09-27 09:42:43'),
(5,'phone','+62 823-2617-0804','2026-09-27 08:59:53','2026-09-27 09:42:43'),
(6,'email','kontak@tokoacc.com','2026-09-27 08:59:53','2026-09-27 08:59:53'),
(7,'address','Jl. Sayuran Kavling Hiu Macan No. 40 RT 002 RW 008 Desa Cangkuang Kulon, Kec. Dayeuh Kolot, Kabupaten Bandung, Jawa Barat, Indonesia.','2026-09-27 08:59:53','2026-09-27 09:42:43'),
(8,'opening_hours','Senin - Jumat: 08.00 - 17.00 WIB\r\nSabtu: 08.00 - 15.00 WIB\r\nMinggu: Libur / Tutup','2026-09-27 08:59:53','2026-09-27 09:42:43'),
(9,'google_maps_url','https://maps.google.comhttps://maps.app.goo.gl/nk1WTiQheCXuF9ug9','2026-09-27 08:59:53','2026-09-27 09:42:43'),
(10,'google_maps_embed','<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.2648080653157!2d107.58943557405446!3d-6.978049768329252!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e96e616a4fef%3A0xa479cad17299b64b!2sSovenir%20karet%20cahaya%20lestari!5e0!3m2!1sen!2sid!4v1790502156537!5m2!1sen!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"strict-origin-when-cross-origin\"></iframe>','2026-09-27 08:59:53','2026-09-27 09:42:43'),
(11,'instagram','https://instagram.com/tokoacc_custom','2026-09-27 08:59:53','2026-09-27 08:59:53'),
(12,'facebook','https://facebook.com/tokoacc.custom','2026-09-27 08:59:54','2026-09-27 08:59:54'),
(13,'tiktok','https://tiktok.com/@tokoacc.custom','2026-09-27 08:59:54','2026-09-27 08:59:54'),
(14,'youtube',NULL,'2026-09-27 09:42:43','2026-09-27 09:42:43');

/*Table structure for table `testimonials` */

DROP TABLE IF EXISTS `testimonials`;

CREATE TABLE `testimonials` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` tinyint unsigned NOT NULL DEFAULT '5',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `testimonials` */

insert  into `testimonials`(`id`,`name`,`organization`,`photo`,`rating`,`content`,`status`,`sort_order`,`created_at`,`updated_at`) values 
(1,'Bambang Irawan','Ketua Panitia Futsal Cup',NULL,5,'Hasil medali logamnya rapi dan berbobot mantap. Tali lanyard dicetak tajam sesuai file desain kami tanpa kendala warna. Pengiriman tiba 3 hari sebelum jadwal acara.',1,1,'2026-09-27 08:59:54','2026-09-27 08:59:54'),
(2,'Faris Pratama','Koordinator Merchandise Komunitas',NULL,5,'Pengerjaan rubber patch velcro sangat teliti, gradasi warna karet tidak meluber. Tim workshop komunikatif saat verifikasi cetakan sampel lewat WhatsApp.',1,2,'2026-09-27 08:59:54','2026-09-27 08:59:54'),
(3,'Ratna Dewi','Procurement Officer PT Bahana Event',NULL,5,'Sudah 3 kali repeat order untuk suvenir gantungan kunci akrilik dan medali lomba tahunan. Proses diskusi spesifikasi sangat transparan dan estimasi pengerjaan tepat waktu.',1,3,'2026-09-27 08:59:54','2026-09-27 08:59:54');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Admin Toko Jaya Promosi Lestari','admin@tokoacc.com',NULL,'$2y$12$HfVIMXnjWf1NzsFmBQAj3eKZ2wnoAhDzhdwxfthXDXVlVh/domONi',NULL,'2026-09-27 08:59:53','2026-09-27 08:59:53');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
