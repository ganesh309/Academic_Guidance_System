-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2025 at 07:19 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `academic_guidance_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `academics`
--

CREATE TABLE `academics` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `academics`
--

INSERT INTO `academics` (`id`, `name`) VALUES
(1, 'Undergraduate Programmes'),
(2, 'Postgraduate Programmes'),
(3, 'Ph.D Programmes');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'e86f78a8a3caf0b60d8e74e5942aa6d86dc150cd3c03338aef25b7d2d7e3acc7');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) NOT NULL,
  `student_id` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `subject_id` bigint(20) NOT NULL,
  `attendance` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `student_id`, `date`, `subject_id`, `attendance`) VALUES
(1, 1, '2025-01-01', 1, 1),
(2, 1, '2025-01-01', 2, 0),
(3, 1, '2025-01-01', 3, 0),
(4, 1, '2025-01-01', 4, 0),
(5, 1, '2025-01-01', 5, 0),
(6, 1, '2025-01-02', 1, 1),
(7, 1, '2025-01-02', 2, 1),
(8, 1, '2025-01-02', 3, 1),
(9, 1, '2025-01-02', 4, 1),
(10, 1, '2025-01-02', 5, 1),
(11, 1, '2025-01-03', 1, 1),
(12, 1, '2025-01-03', 2, 0),
(13, 1, '2025-01-03', 4, 1),
(14, 1, '2025-02-03', 1, 1),
(15, 1, '2025-02-03', 2, 0),
(16, 1, '2025-02-03', 3, 1),
(17, 1, '2025-02-03', 4, 1),
(18, 1, '2025-02-03', 5, 0),
(19, 1, '2025-02-04', 1, 0),
(20, 1, '2025-02-04', 2, 1),
(21, 1, '2025-02-04', 3, 1),
(22, 1, '2025-02-04', 4, 0),
(23, 1, '2025-02-04', 5, 1),
(24, 1, '2025-03-10', 1, 0),
(25, 1, '2025-03-10', 2, 1),
(26, 1, '2025-03-10', 3, 1),
(27, 1, '2025-03-10', 4, 1),
(28, 1, '2025-03-10', 5, 1),
(29, 1, '2025-03-11', 1, 1),
(30, 1, '2025-03-11', 2, 0),
(31, 1, '2025-03-11', 3, 0),
(32, 1, '2025-03-11', 4, 0),
(33, 1, '2025-03-11', 5, 0),
(34, 1, '2025-03-12', 1, 1),
(35, 1, '2025-03-12', 2, 1),
(36, 1, '2025-04-01', 1, 0),
(37, 1, '2025-04-01', 2, 0),
(38, 1, '2025-04-01', 3, 0),
(39, 1, '2025-04-01', 4, 0),
(40, 1, '2025-04-01', 5, 0),
(41, 1, '2025-04-02', 1, 1),
(42, 1, '2025-04-02', 2, 1),
(43, 1, '2025-04-02', 3, 1),
(44, 1, '2025-04-02', 4, 0),
(45, 1, '2025-04-02', 5, 0),
(46, 1, '2025-04-03', 1, 0),
(47, 1, '2025-04-03', 2, 0),
(48, 1, '2025-04-03', 3, 0),
(49, 1, '2025-04-03', 4, 1),
(50, 1, '2025-04-03', 5, 1),
(51, 1, '2025-05-01', 1, 0),
(52, 1, '2025-05-01', 2, 1),
(53, 1, '2025-05-01', 3, 0),
(54, 1, '2025-05-01', 4, 1),
(55, 1, '2025-05-01', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `name`) VALUES
(1, '2020-2024'),
(2, '2021-2025'),
(3, '2022-2026'),
(4, '2023-2027');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
(1, 'India');

-- --------------------------------------------------------

--
-- Table structure for table `degrees`
--

CREATE TABLE `degrees` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `school_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `degrees`
--

INSERT INTO `degrees` (`id`, `name`, `school_id`) VALUES
(1, 'B.Tech in Robotics and Automation', 1),
(2, 'B.Tech in CSE (Cyber Security)', 1),
(3, 'B.Tech in CSE (Data Science)', 1),
(4, 'B.Tech in CSE (AI & ML)', 1),
(5, 'Bachelor of Computer Application (BCA)', 1),
(6, 'B.Sc. (Hons.) in Biotechnology', 1),
(7, 'B.Sc. (Hons.) in Microbiology', 1),
(8, 'B.Sc. Nursing', 7);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `state_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `state_id`) VALUES
(1, 'Anantapur', 1),
(2, 'Chittoor', 1),
(3, 'East Godavari', 1),
(4, 'Guntur', 1),
(5, 'Kadapa', 1),
(6, 'Krishna', 1),
(7, 'Kurnool', 1),
(8, 'Nellore', 1),
(9, 'Prakasam', 1),
(10, 'Srikakulam', 1),
(11, 'Tawang', 2),
(12, 'West Kameng', 2),
(13, 'East Kameng', 2),
(14, 'Papum Pare', 2),
(15, 'Kurung Kumey', 2),
(16, 'Lower Subansiri', 2),
(17, 'Upper Subansiri', 2),
(18, 'West Siang', 2),
(19, 'East Siang', 2),
(20, 'Dibang Valley', 2),
(21, 'Baksa', 3),
(22, 'Barpeta', 3),
(23, 'Biswanath', 3),
(24, 'Bongaigaon', 3),
(25, 'Cachar', 3),
(26, 'Charaideo', 3),
(27, 'Darrang', 3),
(28, 'Dhemaji', 3),
(29, 'Dhubri', 3),
(30, 'Dibrugarh', 3),
(31, 'Alipurduar', 4),
(32, 'South 24 pgs', 4),
(33, 'East Medinipur', 4),
(34, 'Kolkata', 4),
(35, 'Dakshin Dinajpur', 4),
(36, 'Darjeeling', 4),
(37, 'Hooghly', 4),
(38, 'Howrah', 4),
(39, 'Jalpaiguri', 4),
(40, 'West Medinipur', 4),
(41, 'Balod', 5),
(42, 'Baloda Bazar', 5),
(43, 'Balrampur', 5),
(44, 'Bastar', 5),
(45, 'Bemetara', 5),
(46, 'Bijapur', 5),
(47, 'Bilaspur', 5),
(48, 'Dantewada', 5),
(49, 'Dhamtari', 5),
(50, 'Durg', 5),
(51, 'North Goa', 6),
(52, 'South Goa', 6),
(53, 'Ponda', 6),
(54, 'Mormugao', 6),
(55, 'Bicholim', 6),
(56, 'Sattari', 6),
(57, 'Dharbandora', 6),
(58, 'Canacona', 6),
(59, 'Pernem', 6),
(60, 'Salcete', 6),
(61, 'Ahmedabad', 7),
(62, 'Amreli', 7),
(63, 'Anand', 7),
(64, 'Aravalli', 7),
(65, 'Banaskantha', 7),
(66, 'Bharuch', 7),
(67, 'Bhavnagar', 7),
(68, 'Botad', 7),
(69, 'Chhota Udaipur', 7),
(70, 'Dahod', 7),
(71, 'Ambala', 8),
(72, 'Bhiwani', 8),
(73, 'Charkhi Dadri', 8),
(74, 'Faridabad', 8),
(75, 'Fatehabad', 8),
(76, 'Gurugram', 8),
(77, 'Hisar', 8),
(78, 'Jhajjar', 8),
(79, 'Jind', 8),
(80, 'Kaithal', 8),
(81, 'Bilaspur', 9),
(82, 'Chamba', 9),
(83, 'Hamirpur', 9),
(84, 'Kangra', 9),
(85, 'Kinnaur', 9),
(86, 'Kullu', 9),
(87, 'Lahaul and Spiti', 9),
(88, 'Mandi', 9),
(89, 'Shimla', 9),
(90, 'Sirmaur', 9),
(91, 'Bokaro', 10),
(92, 'Chatra', 10),
(93, 'Deoghar', 10),
(94, 'Dhanbad', 10),
(95, 'Dumka', 10),
(96, 'East Singhbhum', 10),
(97, 'Garhwa', 10),
(98, 'Giridih', 10),
(99, 'Godda', 10),
(100, 'Gumla', 10);

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` varchar(255) DEFAULT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `gender_id` bigint(20) NOT NULL,
  `school_id` bigint(20) NOT NULL,
  `country_id` bigint(20) NOT NULL,
  `state_id` bigint(20) NOT NULL,
  `district_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `uid`, `fname`, `lname`, `email`, `mobile`, `gender_id`, `school_id`, `country_id`, `state_id`, `district_id`) VALUES
(1, 'TNU-F-001', 'Dr. A.', 'Maity', 'ganeshghorai42@gmail.com', '7585088672', 1, 1, 1, 4, 34),
(2, 'TNU-F-002', 'P.', 'Mukherjee', 'saphuipratik09@gmail.com', '9867543458', 2, 1, 1, 1, 2),
(3, 'TNU-F-003', 'S.', 'Mondal', 'ghoraiganesh205@gmail.com', '7856435678', 1, 1, 1, 4, 34),
(4, 'TNU-F-006', 'R.', 'Sarkar', 'rajesh.maity@tnu.in', '7643566545', 2, 7, 1, 4, 32);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `name`) VALUES
(1, 'Female'),
(2, 'Male'),
(3, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `interactions`
--

CREATE TABLE `interactions` (
  `id` bigint(20) NOT NULL,
  `mentee_id` bigint(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `attendance` varchar(1000) NOT NULL,
  `interaction` varchar(1000) DEFAULT NULL,
  `problem_understood` varchar(2000) DEFAULT NULL,
  `remedy` varchar(2000) DEFAULT NULL,
  `observation` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `interactions`
--

INSERT INTO `interactions` (`id`, `mentee_id`, `date`, `attendance`, `interaction`, `problem_understood`, `remedy`, `observation`) VALUES
(1, 1, '2025-05-28', 'Present', 'abcd', 'abcd', 'abcde', 'abcd'),
(2, 2, '2025-06-03', 'Present', 'asdfghjkl;\'asdfghjkl', 'asdfghjkl;\'/', 'sdfghjkl;/', 'sdfghjkm,.'),
(3, 4, '2025-06-03', 'Present', 'asdfghjkl;dfghjkl', 'sdfghjkl', 'asdfghjkl', 'aaaaaaaaaaaaaaaaa');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mentees`
--

CREATE TABLE `mentees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(512) NOT NULL,
  `password_updated` tinyint(1) NOT NULL DEFAULT 0,
  `otp` varchar(255) DEFAULT NULL,
  `token` varchar(512) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mentor_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mentees`
--

INSERT INTO `mentees` (`id`, `student_id`, `email`, `password`, `password_updated`, `otp`, `token`, `created_at`, `updated_at`, `mentor_id`) VALUES
(4, 1, 'ganeshghorai444@gmail.com', '76410d90e8add481bdae860506f0ad17b2e0868aafc3b88d3e061cd5f1a36f47', 1, NULL, NULL, '2025-06-03 04:35:57', '2025-06-03 04:39:21', 3),
(5, 2, 'pratik.saphui@tnu.in', 'b8909e9d355b9156af2d0290f5c6fe3ac35a157fface3f27f1be43c5292e7874', 0, NULL, NULL, '2025-06-03 04:36:13', '2025-06-03 04:36:31', 3);

-- --------------------------------------------------------

--
-- Table structure for table `mentors`
--

CREATE TABLE `mentors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(512) NOT NULL,
  `password_updated` tinyint(1) NOT NULL DEFAULT 0,
  `otp` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mentors`
--

INSERT INTO `mentors` (`id`, `faculty_id`, `email`, `password`, `password_updated`, `otp`, `token`, `created_at`, `updated_at`) VALUES
(3, 1, 'ganeshghorai42@gmail.com', '76410d90e8add481bdae860506f0ad17b2e0868aafc3b88d3e061cd5f1a36f47', 1, NULL, NULL, '2025-06-03 04:35:57', '2025-06-03 04:37:24'),
(4, 2, 'saphuipratik09@gmail.com', '0a345aa8bcaaf04723743545ce3d65778722863d5de85f7fcb56b1a282c844a8', 0, NULL, NULL, '2025-06-03 04:36:13', '2025-06-03 04:36:13');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `academic_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `academic_id`) VALUES
(1, 'School of Science & Technology', 1),
(2, 'School of Maritime Studies', 1),
(3, 'School Of Agriculture & Allied Sciences', 1),
(4, 'School of Health Sciences', 1),
(5, 'School of Pharmacy', 1),
(6, 'School Of Humanities, Management & Social Sciences', 1),
(7, 'Institute of Nursing', 1),
(8, 'School of Hospitality and Culinary Art', 1),
(9, 'School of Legal Studies', 1),
(10, 'B.Voc', 1),
(11, 'School of Science & Technology', 2),
(12, 'School of Health Sciences', 2),
(13, 'School of Pharmacy', 2),
(14, 'School Of Humanities, Management & Social Sciences', 2),
(15, 'School of Science & Technology', 3),
(16, 'School Of Agriculture & Allied Sciences', 3),
(17, 'School of Health Sciences', 3),
(18, 'School of Pharmacy', 3),
(19, 'School Of Humanities, Management & Social Sciences', 3);

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `name`) VALUES
(1, '1st'),
(2, '2nd'),
(3, '3rd'),
(4, '4th'),
(5, '5th'),
(6, '6th'),
(7, '7th'),
(8, '8th');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('PizpS5qdpG6vl9piQovHzDUxznD7XDqAUjvKwvPJ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRDZldDBQbk9PRHZLRk1oTkhRREc4MjV1eFRTQVZhWGx1Rkc0WmhZRSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tZW50ZWVzLWxpc3QiO31zOjE1OiJhZG1pbl9sb2dnZWRfaW4iO2I6MTt9', 1744568950),
('S0DYsaF2kf2oEHPLZgrc07XIbxLZkaIXpziFjAgj', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaEhZb3BmRFN4WmkxOGRkZTZ4dEdwMnFsV0ZsOVFJUHRNdWF1dDM2ZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1744374041);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `country_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`) VALUES
(1, 'Andhra Pradesh', 1),
(2, 'Arunachal Pradesh', 1),
(3, 'Assam', 1),
(4, 'West Bengal', 1),
(5, 'Chhattisgarh', 1),
(6, 'Goa', 1),
(7, 'Gujarat', 1),
(8, 'Haryana', 1),
(9, 'Himachal Pradesh', 1),
(10, 'Jharkhand', 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) NOT NULL,
  `registration_no` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) NOT NULL,
  `uid` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `batch_id` varchar(255) DEFAULT NULL,
  `semester_id` bigint(20) DEFAULT NULL,
  `sgpa` decimal(4,2) DEFAULT NULL,
  `gender_id` bigint(20) DEFAULT NULL,
  `academic_id` bigint(20) DEFAULT NULL,
  `school_id` bigint(20) DEFAULT NULL,
  `degree_id` bigint(20) DEFAULT NULL,
  `country_id` bigint(20) DEFAULT NULL,
  `state_id` bigint(20) DEFAULT NULL,
  `district_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `registration_no`, `fname`, `lname`, `uid`, `email`, `mobile`, `batch_id`, `semester_id`, `sgpa`, `gender_id`, `academic_id`, `school_id`, `degree_id`, `country_id`, `state_id`, `district_id`) VALUES
(1, 'Reg20211234', 'Ganesh', 'Ghorai', 'TNU2021020100035', 'ganeshghorai444@gmail.com', '8967228774', '1', 1, 4.99, 2, 1, 1, 2, 1, 4, 33),
(2, 'Reg20211243', 'Pratik', 'Saphui', 'TNU2021020100011', 'pratik.saphui@tnu.in', '9641929005', '1', 1, 4.47, 2, 1, 1, 2, 1, 4, 32),
(3, 'Reg2021357', 'Anupam', 'Bardhan', 'TNU2021020100036', 'anupam.bardhan@tnu.in', '8167000981', '1', 1, 3.09, 2, 1, 1, 2, 1, 4, 40),
(4, 'Reg2021175', 'Sankar', 'Rajak', 'TNU2021020100055', 'sankar.rajak@tnu.in', '9330741654', '1', 1, 3.00, 2, 1, 1, 2, 1, 4, 34),
(5, 'Reg20212343', 'Sneham', 'Sebak', 'TNU2021020100029', 'sneham.sebak@tnu.in', '8767987856', '1', 2, 5.00, 2, 1, 1, 2, 1, 4, 32),
(6, 'Reg2021345', 'Jeet', 'Mondal', 'TNU2021020100030', 'jeet.mondal@tnu.in', '7865456789', '1', 1, 4.10, 2, 1, 7, 8, 1, 4, 34);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `degree_id` bigint(20) NOT NULL,
  `semester_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `degree_id`, `semester_id`) VALUES
(1, 'Basic Electrical and Electronics Engineering', 2, 1),
(2, 'Python', 2, 1),
(3, 'Environmental Science', 2, 1),
(4, 'C programming', 2, 1),
(5, 'Engineering graphics and design', 2, 1),
(6, 'Network Security', 2, 2),
(7, 'Introduction to Cyber Security', 2, 2),
(8, 'Cryptography', 2, 2),
(9, 'Ethical Hacking', 2, 2),
(10, 'Computer Networks', 2, 2),
(11, 'Computer programming', 4, 1),
(12, 'Artificial intelligence', 4, 1),
(13, 'Natural language processing', 4, 1),
(14, 'Deep learning', 4, 1),
(15, 'Machine learning', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academics`
--
ALTER TABLE `academics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`email`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `degrees`
--
ALTER TABLE `degrees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`),
  ADD KEY `district_id` (`district_id`),
  ADD KEY `gender_id` (`gender_id`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interactions`
--
ALTER TABLE `interactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mentees`
--
ALTER TABLE `mentees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `fk_mentor_id` (`mentor_id`);

--
-- Indexes for table `mentors`
--
ALTER TABLE `mentors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_faculty` (`faculty_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`),
  ADD KEY `academic_id` (`academic_id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_uid` (`uid`),
  ADD KEY `academics_id` (`academic_id`),
  ADD KEY `degree_id` (`degree_id`),
  ADD KEY `gender_id` (`gender_id`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `semester_id` (`semester_id`),
  ADD KEY `country_id` (`country_id`),
  ADD KEY `state_id` (`state_id`),
  ADD KEY `district_id` (`district_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `degree_id` (`degree_id`),
  ADD KEY `semester_id` (`semester_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academics`
--
ALTER TABLE `academics`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `degrees`
--
ALTER TABLE `degrees`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `interactions`
--
ALTER TABLE `interactions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mentees`
--
ALTER TABLE `mentees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mentors`
--
ALTER TABLE `mentors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attendances_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `degrees`
--
ALTER TABLE `degrees`
  ADD CONSTRAINT `degrees_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`);

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculties`
--
ALTER TABLE `faculties`
  ADD CONSTRAINT `faculties_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faculties_ibfk_2` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faculties_ibfk_3` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faculties_ibfk_4` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faculties_ibfk_5` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mentees`
--
ALTER TABLE `mentees`
  ADD CONSTRAINT `fk_mentor_id` FOREIGN KEY (`mentor_id`) REFERENCES `mentors` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `mentees_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mentors`
--
ALTER TABLE `mentors`
  ADD CONSTRAINT `fk_faculty` FOREIGN KEY (`faculty_id`) REFERENCES `faculties` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `schools`
--
ALTER TABLE `schools`
  ADD CONSTRAINT `schools_ibfk_1` FOREIGN KEY (`academic_id`) REFERENCES `academics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`academic_id`) REFERENCES `academics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`degree_id`) REFERENCES `degrees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_ibfk_3` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_ibfk_4` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_ibfk_5` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_ibfk_6` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_ibfk_7` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_ibfk_8` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`degree_id`) REFERENCES `degrees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subjects_ibfk_2` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
