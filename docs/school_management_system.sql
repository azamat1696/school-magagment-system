-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 04, 2023 at 06:10 AM
-- Server version: 5.7.36
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_years`
--

DROP TABLE IF EXISTS `academic_years`;
CREATE TABLE IF NOT EXISTS `academic_years` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `BaslamaTarihi` date NOT NULL,
  `BitisTarihi` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `academic_years`
--

INSERT INTO `academic_years` (`id`, `BaslamaTarihi`, `BitisTarihi`, `status`, `created_at`, `updated_at`) VALUES
(2, '2022-12-01', '2024-01-05', 1, '2022-12-30 19:06:04', '2022-12-30 19:06:04');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

DROP TABLE IF EXISTS `attendances`;
CREATE TABLE IF NOT EXISTS `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `section_id` bigint(20) NOT NULL,
  `student_id` bigint(20) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `assigned_date` date NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attendances_section_id_foreign` (`section_id`),
  KEY `attendances_user_id_foreign` (`user_id`),
  KEY `attendances_course_id_foreign` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Türkmenistan', '2022-12-30 19:52:20', '2022-12-30 19:52:20');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `courses_department_id_foreign` (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `course_no`, `description`, `department_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ders 1', 'ABC1212', 'Bu ders fizik ve matamatik ağırlıklıdır', 2, 1, '2022-12-31 11:20:28', '2022-12-31 11:36:04'),
(3, 'Ders 2', 'DD12120', 'Ders açıklama', 3, 1, '2023-01-02 08:42:38', '2023-01-02 08:42:38');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `budget` bigint(20) DEFAULT NULL,
  `first_letter` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `description`, `department_no`, `status`, `budget`, `first_letter`, `created_at`, `updated_at`) VALUES
(2, 'Kuaförlük', 'tes açıklama', 'ABCD1234', 1, NULL, 'K', '2022-12-30 21:40:46', '2022-12-30 21:40:46'),
(3, 'Erkek Berberlik', 'Erkeke berberi test açıklama', 'ABC3232', 1, NULL, 'E', '2022-12-31 11:37:10', '2022-12-31 11:37:10');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

DROP TABLE IF EXISTS `grades`;
CREATE TABLE IF NOT EXISTS `grades` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` bigint(20) NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `semester_id` bigint(20) NOT NULL,
  `grade` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `grades_student_id_foreign` (`student_id`),
  KEY `grades_course_id_foreign` (`course_id`),
  KEY `grades_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
CREATE TABLE IF NOT EXISTS `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `invoice_no` bigint(20) NOT NULL,
  `transaction_id` bigint(20) NOT NULL,
  `price` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invoices_transaction_id_foreign` (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_12_10_114452_create_permission_tables', 1),
(6, '2022_12_18_083601_create_countries_table', 1),
(7, '2022_12_25_123327_create_departments_table', 1),
(10, '2022_12_25_123331_create_attendances_table', 1),
(12, '2022_12_25_123333_create_grades_table', 1),
(15, '2022_12_25_123336_create_academic_years_table', 1),
(16, '2022_12_25_123337_create_student_course_records_table', 1),
(18, '2022_12_25_123339_create_invoices_table', 1),
(19, '2022_12_25_123340_create_receipts_table', 1),
(22, '2022_12_25_123334_create_semesters_table', 3),
(25, '2022_12_25_123328_create_courses_table', 4),
(27, '2022_12_25_123329_create_sections_table', 5),
(30, '2022_12_25_123332_create_students_table', 6),
(34, '2022_12_25_123341_create_qualifications_table', 7),
(37, '2022_12_25_123338_create_student_records_table', 8),
(42, '2022_12_25_123335_create_transactions_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 2),
(4, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Create Student', 'web', '2022-12-26 21:18:21', '2022-12-26 21:18:21'),
(2, 'Delete Student', 'web', '2022-12-26 21:18:21', '2022-12-26 21:18:21'),
(3, 'Update Student', 'web', '2022-12-26 21:18:21', '2022-12-26 21:18:21'),
(4, 'Read Student', 'web', '2022-12-26 21:18:21', '2022-12-26 21:18:21');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qualifications`
--

DROP TABLE IF EXISTS `qualifications`;
CREATE TABLE IF NOT EXISTS `qualifications` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `qualification_start_date` date DEFAULT NULL,
  `departmnent_id` bigint(20) UNSIGNED NOT NULL,
  `ic_denetim_tarih` datetime DEFAULT NULL,
  `ic_denetim_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `depart_imza_end_date` date DEFAULT NULL,
  `diplom_req_date` date DEFAULT NULL,
  `diplom_confirm_date` date DEFAULT NULL,
  `diplom_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `islem_sira_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_status` enum('Aktif','Pasif','OnKayitli','KaydiSilinmis','KayitDondurma') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'OnKayitli',
  `ogr_hakk` enum('HakkiVar','HakkiYok') COLLATE utf8mb4_unicode_ci NOT NULL,
  `not_sistemi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'listeden seçilecek',
  `ayrilma_tarihi` date DEFAULT NULL,
  `ayrilma_nedeni` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '1.',
  `register_date` date DEFAULT NULL,
  `hazirlik_okudum` tinyint(1) DEFAULT NULL,
  `hazirlik_donem_sayi` tinyint(4) DEFAULT NULL,
  `giris_turu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'sinavsız_gecis' COMMENT '(Def. Value “2-Sınavsız Geçiş”)',
  `giris_puan_turu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `giris_puan` bigint(20) DEFAULT NULL,
  `genel_not_ortalama` bigint(20) DEFAULT NULL,
  `diploma_tur` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diploma_not` bigint(20) DEFAULT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `qualifications_student_id_foreign` (`student_id`),
  KEY `qualifications_departmnent_id_foreign` (`departmnent_id`),
  KEY `qualifications_user_id_foreign` (`user_id`),
  KEY `qualifications_ic_denetim_user_id_foreign` (`ic_denetim_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `qualifications`
--

INSERT INTO `qualifications` (`id`, `student_id`, `qualification_start_date`, `departmnent_id`, `ic_denetim_tarih`, `ic_denetim_user_id`, `depart_imza_end_date`, `diplom_req_date`, `diplom_confirm_date`, `diplom_no`, `islem_sira_no`, `student_no`, `student_status`, `ogr_hakk`, `not_sistemi`, `ayrilma_tarihi`, `ayrilma_nedeni`, `register_date`, `hazirlik_okudum`, `hazirlik_donem_sayi`, `giris_turu`, `giris_puan_turu`, `giris_puan`, `genel_not_ortalama`, `diploma_tur`, `diploma_not`, `notes`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 2, '2023-01-07', 3, NULL, NULL, '2023-01-07', NULL, NULL, NULL, 'SD32322323', 'AB2323', 'OnKayitli', 'HakkiVar', 'Deneme1', NULL, NULL, '2023-01-07', 1, 2, '1', 'T', 12, 50, NULL, NULL, 'Adress test açıkalma', 1, 2, '2023-01-07 16:10:38', '2023-01-07 16:10:38'),
(3, 2, '1970-01-01', 3, NULL, NULL, '1970-01-01', '1970-01-01', '1970-01-01', NULL, 'ASsddsd233232', 'Test1212', 'Aktif', 'HakkiVar', 'Deneme1', '1970-01-01', NULL, '2023-01-08', 0, 2, '1', NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, '2023-01-08 15:59:37', '2023-01-08 16:01:43'),
(4, 1, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'ASsddsd2332322323', 'AB2323', 'Aktif', 'HakkiVar', 'Deneme1', NULL, NULL, '2023-01-10', 0, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, '2023-01-10 05:35:30', '2023-01-10 05:35:30');

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

DROP TABLE IF EXISTS `receipts`;
CREATE TABLE IF NOT EXISTS `receipts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `receipt_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_id` bigint(20) NOT NULL,
  `transaction_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `receipts_invoice_id_foreign` (`invoice_id`),
  KEY `receipts_transaction_id_foreign` (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super-Admin', 'web', '2022-12-26 21:18:21', '2022-12-26 21:18:21'),
(2, 'Operator', 'web', '2022-12-26 21:18:21', '2022-12-26 21:18:21'),
(3, 'Internal-Audit', 'web', '2022-12-26 21:18:21', '2022-12-26 21:18:21'),
(4, 'Teacher', 'web', '2022-12-26 21:18:21', '2022-12-26 21:18:21');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

DROP TABLE IF EXISTS `sections`;
CREATE TABLE IF NOT EXISTS `sections` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `instructor_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `theory_start_date` date DEFAULT NULL,
  `theory_end_date` date DEFAULT NULL,
  `practice_start_date` date DEFAULT NULL,
  `practice_end_date` date DEFAULT NULL,
  `ic_denetim_tarih` datetime DEFAULT NULL,
  `ic_denetim_user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ders_imza_end_date` date DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'en son işlem yapan kişi',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sections_course_id_foreign` (`course_id`),
  KEY `sections_instructor_user_id_foreign` (`instructor_user_id`),
  KEY `sections_ic_denetim_user_id_foreign` (`ic_denetim_user_id`),
  KEY `sections_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `description`, `section_no`, `course_id`, `instructor_user_id`, `theory_start_date`, `theory_end_date`, `practice_start_date`, `practice_end_date`, `ic_denetim_tarih`, `ic_denetim_user_id`, `ders_imza_end_date`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sınıf 1', 'deneme sınıf', 'A1212', 1, 3, '2023-01-02', '2023-02-06', '2023-01-02', '2023-03-06', NULL, NULL, '2023-01-04', 2, 1, '2023-01-02 08:05:02', '2023-01-02 08:05:02'),
(2, 'Sınıf 3', 'Sınıf 3 açıklama', 'D1212', 3, 4, '2023-01-02', '2023-01-02', '2023-01-02', '2023-01-02', NULL, NULL, '2023-01-02', 2, 1, '2023-01-02 08:28:07', '2023-01-02 09:00:56');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

DROP TABLE IF EXISTS `semesters`;
CREATE TABLE IF NOT EXISTS `semesters` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `academic_years_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `semesters_academic_years_id_foreign` (`academic_years_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `name`, `academic_years_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Dönem 1', 2, 1, '2023-01-03 22:33:57', '2023-01-03 22:33:57');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_names` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identity_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('Male','Female','others') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'others',
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `blood_group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `place_of_birth` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `student_photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `students_country_id_foreign` (`country_id`),
  KEY `students_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `surname`, `other_names`, `identity_no`, `passport_no`, `gender`, `country_id`, `blood_group`, `birth_date`, `place_of_birth`, `mother_name`, `father_name`, `email`, `phone_no`, `phone_no_1`, `phone_no_2`, `address`, `notes`, `user_id`, `student_photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mekan', 'Hemdemov', NULL, '3523545435', 'A786876', 'Male', 1, 'A-', '1996-09-07', 'Lebap', 'Gülayım', 'Hemdem', 'mekan.hemdemov@gmail.com', '3545345345', NULL, NULL, 'İstanbul Bağcılar', 'Adress test açıkalma', 2, 'mekan-62737.jpg', 1, '2023-01-06 20:24:57', '2023-01-08 07:08:11'),
(2, 'Azamat', 'Yadygerov', NULL, '121234345656', 'A0331005', 'Male', 1, 'AB+', '1996-03-16', 'Lebap', 'Gulshat', 'Yadyger', 'azamat1696@gmail.com', '054883216241', NULL, NULL, 'Lefkoşa gönyeli alpay 36', 'Yeni kayıt öğrenci açıklama', 2, 'azamat-29994.jpg', 1, '2023-01-07 15:23:37', '2023-01-07 15:29:40');

-- --------------------------------------------------------

--
-- Table structure for table `student_course_records`
--

DROP TABLE IF EXISTS `student_course_records`;
CREATE TABLE IF NOT EXISTS `student_course_records` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` bigint(20) NOT NULL,
  `section_id` bigint(20) NOT NULL,
  `semester_id` bigint(20) NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `student_course_records_student_id_foreign` (`student_id`),
  KEY `student_course_records_section_id_foreign` (`section_id`),
  KEY `student_course_records_semester_id_foreign` (`semester_id`),
  KEY `student_course_records_course_id_foreign` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_records`
--

DROP TABLE IF EXISTS `student_records`;
CREATE TABLE IF NOT EXISTS `student_records` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `academic_year_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `student_records_academic_year_id_foreign` (`academic_year_id`),
  KEY `student_records_semester_id_foreign` (`semester_id`),
  KEY `student_records_student_id_foreign` (`student_id`),
  KEY `student_records_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_records`
--

INSERT INTO `student_records` (`id`, `academic_year_id`, `semester_id`, `student_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 1, 2, 1, '2023-01-08 06:46:09', '2023-01-10 05:33:16'),
(2, 2, 2, 2, 2, 1, '2023-01-08 07:00:31', '2023-01-08 07:00:31'),
(3, 2, 2, 2, 2, 1, '2023-01-08 07:08:21', '2023-01-08 07:27:37'),
(4, 2, 2, 2, 2, 1, '2023-01-08 07:10:26', '2023-01-08 07:27:42');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `transaction_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `qualification_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'en son işlem yapan',
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` bigint(20) UNSIGNED NOT NULL,
  `currency_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `islem_tarih` date DEFAULT NULL,
  `vade_tarih` date DEFAULT NULL,
  `transaction_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `amount_payed` decimal(8,2) NOT NULL COMMENT 'evrak tutarı',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transactions_student_id_foreign` (`student_id`),
  KEY `transactions_qualification_id_foreign` (`qualification_id`),
  KEY `transactions_department_id_foreign` (`department_id`),
  KEY `transactions_semester_id_foreign` (`semester_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `transaction_no`, `description`, `student_id`, `qualification_id`, `user_id`, `department_id`, `semester_id`, `currency_type`, `islem_tarih`, `vade_tarih`, `transaction_type`, `status`, `amount_payed`, `created_at`, `updated_at`) VALUES
(1, 'AA21212', 'fsdsdsdsdsdsd', 2, 3, 2, 3, 2, 'EUROS', '2023-01-09', '2023-01-10', 'deduction', 0, '2323.00', '2023-01-09 18:22:36', '2023-01-09 18:32:18'),
(2, 'asasas', 'sasasas', 1, 4, 2, 2, 2, 'TL', '2023-01-10', NULL, 'invoice', 1, '1.00', '2023-01-10 18:06:40', '2023-01-10 18:06:40'),
(3, 'dsdadsad', 'sdasdadss', 1, 4, 2, 3, 2, 'TL', '2023-01-10', '2023-01-11', 'invoice', 0, '3.00', '2023-01-10 18:09:13', '2023-01-10 18:10:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ProfilResim` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Cinsiyet` enum('Erkek','Kadin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Erkek',
  `KullaniciKodu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Statu` tinyint(1) NOT NULL DEFAULT '1',
  `TelefonNo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DogumTarihi` date DEFAULT NULL,
  `Adres` longtext COLLATE utf8mb4_unicode_ci,
  `KullaniciTipi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_country_id_foreign` (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `ProfilResim`, `Cinsiyet`, `KullaniciKodu`, `Statu`, `TelefonNo`, `DogumTarihi`, `Adres`, `KullaniciTipi`, `country_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Test User', 'test@example.com', NULL, '$2y$10$eHdJNx2kma979DRshX53N.szgqaxqsQroqvURIBvT5h.qFK9yYq3O', 'test-user-94409.jpg', 'Erkek', 'ABD2323', 1, '05488321631', '1996-12-01', 'Gönyeli lefkoşa', 'Super-Admin', NULL, 'vawc7rgQ3l0Puz8dflLyhyBuBxeu7Cwf9eGUtA3n2pK1h08aWbtptqfxrDp5', '2022-12-26 21:10:25', '2022-12-31 07:14:06'),
(3, 'Azamat Yadygerov', 'azamat1696@gmail.com', NULL, '$2y$10$z6VI7OimqiKPet7SR/5pgOTGYKTKVkscv3ZfabIR1de.Eu4WZ8YyG', '202301020949-Screenshot 2022-11-03 at 09-59-07 Car Hire Company.png', 'Erkek', 'T123', 1, '23424243', '1996-10-07', 'Gönyeli', 'Teacher', NULL, NULL, '2023-01-02 07:49:37', '2023-01-02 07:49:37'),
(4, 'Aziz Azizov', 'azamat1696@gmai.com', NULL, '$2y$10$AumFswVh6WkTWhXGwmpdD.eGpUL1LJksZMeC838cJ7CaoeNkFGlv6', '202301021041-6b81a9bfd11144fd2b616cceef683139--facebook-website(2).jpg', 'Erkek', 'T32323', 1, '435543534', '1996-01-01', 'test öğretmen address', 'Teacher', NULL, NULL, '2023-01-02 08:41:54', '2023-01-02 08:41:54');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `attendances_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `section` (`id`),
  ADD CONSTRAINT `attendances_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `grades_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`),
  ADD CONSTRAINT `grades_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `qualifications`
--
ALTER TABLE `qualifications`
  ADD CONSTRAINT `qualifications_departmnent_id_foreign` FOREIGN KEY (`departmnent_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `qualifications_ic_denetim_user_id_foreign` FOREIGN KEY (`ic_denetim_user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `qualifications_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `qualifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `receipts`
--
ALTER TABLE `receipts`
  ADD CONSTRAINT `receipts_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`id`),
  ADD CONSTRAINT `receipts_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `sections_ic_denetim_user_id_foreign` FOREIGN KEY (`ic_denetim_user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `sections_instructor_user_id_foreign` FOREIGN KEY (`instructor_user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `sections_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `semesters`
--
ALTER TABLE `semesters`
  ADD CONSTRAINT `semesters_academic_years_id_foreign` FOREIGN KEY (`academic_years_id`) REFERENCES `academic_years` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `student_course_records`
--
ALTER TABLE `student_course_records`
  ADD CONSTRAINT `student_course_records_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`),
  ADD CONSTRAINT `student_course_records_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `section` (`id`),
  ADD CONSTRAINT `student_course_records_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`id`),
  ADD CONSTRAINT `student_course_records_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

--
-- Constraints for table `student_records`
--
ALTER TABLE `student_records`
  ADD CONSTRAINT `student_records_academic_year_id_foreign` FOREIGN KEY (`academic_year_id`) REFERENCES `academic_years` (`id`),
  ADD CONSTRAINT `student_records_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`),
  ADD CONSTRAINT `student_records_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `student_records_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `transactions_qualification_id_foreign` FOREIGN KEY (`qualification_id`) REFERENCES `qualifications` (`id`),
  ADD CONSTRAINT `transactions_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`),
  ADD CONSTRAINT `transactions_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
