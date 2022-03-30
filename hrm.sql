-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:8111
-- Generation Time: Jul 23, 2021 at 08:24 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_branch`
--

CREATE TABLE `company_branch` (
  `id` int(11) NOT NULL,
  `location_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `company_branch`
--

INSERT INTO `company_branch` (`id`, `location_name`, `city`, `country`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'golden street', 'lagos', 'Nigeria', 1626725319, 1626725319, 4, 4),
(2, 'Ocean drive', 'liberty', 'USA', 1627060904, 1627060904, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `company_information`
--

CREATE TABLE `company_information` (
  `id` int(11) NOT NULL,
  `organization_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tax_id` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `number_of_employees` int(11) NOT NULL,
  `registration_number` int(11) NOT NULL,
  `phone` int(15) NOT NULL,
  `fax` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `zip_code` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `company_information`
--

INSERT INTO `company_information` (`id`, `organization_name`, `tax_id`, `number_of_employees`, `registration_number`, `phone`, `fax`, `email`, `address`, `city`, `state`, `zip_code`, `country`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'ABC limited', 'TIN-abdmnvvjvjl', 50, 2147483647, 908849494, 'fax', 'abc@mail.com', 'abc avenue ', 'lagos', 'lagos', '97979', 'Nigeria', 1626427852, 1626427852, 4, 4),
(2, 'golden plc', 'Tin-jhchkchakchkl', 20, 2147483647, 2147483647, 'fax', 'golden@mail.com', 'golden strt', 'lagos', 'lagos', '86289', 'Nigeria', 1626428378, 1626428378, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `home_telephone` int(15) DEFAULT NULL,
  `mobile` int(15) NOT NULL,
  `work_telephone` int(15) DEFAULT NULL,
  `work_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `other_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` int(11) NOT NULL,
  `fax` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `zip_code` int(11) DEFAULT NULL,
  `country` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`id`, `employee_id`, `home_telephone`, `mobile`, `work_telephone`, `work_email`, `other_email`, `phone`, `fax`, `email`, `address`, `city`, `state`, `zip_code`, `country`, `created_at`, `updated_at`, `created_by`, `updated_by`, `attachment`) VALUES
(36, 'EMPyKQQcP4A', 2147483647, 2147483647, 2147483647, 'ayosheinde@mail.com', 'ayosheinde@mail.com', 908849494, 'fax', 'ayosheinde@mail.com', 'abc avenue ', 'lagos', 'lagos', 86289, 'Nigeria', 1627055630, 1627055630, 4, 4, NULL),
(37, 'EMP8cerACbF', 908849494, 2147483647, 2147483647, 'abc@mail.com', 'abc@mail.com', 908849494, 'fax', 'abc@mail.com', 'abc avenue', 'lagos', 'lagos', 97979, 'Nigeria', 1627058101, 1627058101, 4, 4, NULL),
(38, 'EMPedBq8vZl', 2147483647, 2147483647, 2147483647, 'ferrerro@mail.com', 'ferrerro@mail.com', 2147483647, 'fax', 'ferrerro@mail.com', 'abc avenue', 'lagos', 'lagos', 97979, 'Nigeria', 1627062177, 1627062177, 4, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `currency_code` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(2, 'Engineering', 1626725277, 1626725277, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emergency_contact`
--

CREATE TABLE `emergency_contact` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `relationship` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `home_telephone` int(15) DEFAULT NULL,
  `mobile` int(15) NOT NULL,
  `work_telephone` int(15) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `emergency_contact`
--

INSERT INTO `emergency_contact` (`id`, `employee_id`, `name`, `relationship`, `home_telephone`, `mobile`, `work_telephone`, `created_at`, `updated_at`, `created_by`, `updated_by`, `attachment`) VALUES
(10, 'EMPyKQQcP4A', 'Mr Ogunseinde', 'father', 908849494, 908849494, 908849494, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `middle_name` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `photograph` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `nationality` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `marital_status` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `employee_id`, `first_name`, `middle_name`, `last_name`, `photograph`, `gender`, `nationality`, `marital_status`, `date_of_birth`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(39, 'EMPyKQQcP4A', 'Ayo', 'sheinde', 'Ogunseinde', '/employeePhotos/q8GjMY_fP1/ayo-ogunseinde-sibVwORYqs0-unsplash.jpg', 'male', '1', 'single', '1989-06-20', 1627055167, 1627055167, 4, 4),
(40, 'EMP8cerACbF', 'Bannon', 'Morrissy', 'Morrissy', '/employeePhotos/u2-6gV6FJm/bannon-morrissy-RxiAV5LC-ww-unsplash.jpg', 'male', '2', 'married', '1889-06-19', 1627057800, 1627057800, 4, 4),
(41, 'EMPedBq8vZl', 'Ferrerro', 'Matheus', 'Matheus', '/employeePhotos/bQ_R7kBWxy/matheus-ferrero-W7b3eDUb_2I-unsplash.jpg', 'female', '2', 'single', '1996-03-31', 1627062069, 1627062069, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `employee_depandant`
--

CREATE TABLE `employee_depandant` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `relationship` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee_depandant`
--

INSERT INTO `employee_depandant` (`id`, `employee_id`, `name`, `relationship`, `date_of_birth`, `created_at`, `updated_at`, `created_by`, `updated_by`, `attachment`) VALUES
(4, 'EMPyKQQcP4A', 'ayo junior', 'son', '2010-08-11', 1627056474, 1627056474, 4, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_education`
--

CREATE TABLE `employee_education` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `level` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `institute` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `major` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `comments` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee_education`
--

INSERT INTO `employee_education` (`id`, `employee_id`, `level`, `institute`, `major`, `year`, `start_date`, `end_date`, `comments`, `created_at`, `updated_at`, `created_by`, `updated_by`, `attachment`) VALUES
(4, 'EMPyKQQcP4A', 'Post Graduate', 'Havard College', 'software Engineering', 2010, '2005-09-07', '2010-09-29', '', 1627055780, 1627055780, 4, 4, NULL),
(5, 'EMP8cerACbF', 'Undergraduate', 'Havard College', 'Marine', 2011, '2000-02-02', '2004-12-01', '', 1627060530, 1627060530, 4, 4, NULL),
(6, 'EMPedBq8vZl', 'Post Graduate', 'Havard College', 'Graphics design', 2019, '2005-09-07', '2010-09-29', '', 1627062275, 1627062275, 4, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_immigration`
--

CREATE TABLE `employee_immigration` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `document_type` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `issued_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `eligible_review_date` date NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee_immigration`
--

INSERT INTO `employee_immigration` (`id`, `employee_id`, `document_type`, `number`, `issued_by`, `eligible_review_date`, `created_at`, `updated_at`, `created_by`, `updated_by`, `attachment`) VALUES
(2, 'EMPyKQQcP4A', 'Visa', '1234567', 'Nigeria gov', '2025-03-13', 1627056264, 1627056264, 4, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_job`
--

CREATE TABLE `employee_job` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `job_title_id` int(11) NOT NULL,
  `employment_status_id` int(11) NOT NULL,
  `job_category_id` int(11) NOT NULL,
  `joined_date` date NOT NULL,
  `department_id` int(11) NOT NULL,
  `company_branch_id` int(11) NOT NULL,
  `contract_start_date` date NOT NULL,
  `contract_end_date` date NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee_job`
--

INSERT INTO `employee_job` (`id`, `employee_id`, `job_title_id`, `employment_status_id`, `job_category_id`, `joined_date`, `department_id`, `company_branch_id`, `contract_start_date`, `contract_end_date`, `created_at`, `updated_at`, `created_by`, `updated_by`, `attachment`) VALUES
(4, 'EMP8cerACbF', 3, 2, 1, '2020-02-19', 2, 2, '2021-05-12', '2021-06-21', 1627060957, 1627060957, 4, 4, NULL),
(6, 'EMPedBq8vZl', 4, 1, 1, '2021-02-17', 2, 1, '2021-07-13', '2021-10-28', 1627062943, 1627062943, 4, 4, NULL),
(7, 'EMPyKQQcP4A', 4, 1, 1, '2020-07-22', 2, 1, '2021-11-24', '2021-06-21', 1627063122, 1627063122, 5, 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_languages`
--

CREATE TABLE `employee_languages` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `language_id` int(11) DEFAULT NULL,
  `fluency` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `competency` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `comments` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee_languages`
--

INSERT INTO `employee_languages` (`id`, `employee_id`, `language_id`, `fluency`, `competency`, `comments`, `created_at`, `updated_at`, `created_by`, `updated_by`, `attachment`) VALUES
(2, 'EMPyKQQcP4A', 1, 'Speaking', 'good', '', 1627056304, 1627056304, 4, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_license`
--

CREATE TABLE `employee_license` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `lincense_id` int(11) DEFAULT NULL,
  `license_number` int(11) NOT NULL,
  `issued_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `comments` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee_license`
--

INSERT INTO `employee_license` (`id`, `employee_id`, `lincense_id`, `license_number`, `issued_date`, `expiry_date`, `comments`, `created_at`, `updated_at`, `created_by`, `updated_by`, `attachment`) VALUES
(2, 'EMPyKQQcP4A', 1, 232334, '2021-11-01', '2024-03-20', '', 1627056384, 1627056384, 4, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_memberships`
--

CREATE TABLE `employee_memberships` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `name` int(11) DEFAULT NULL,
  `reporting_method` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee_memberships`
--

INSERT INTO `employee_memberships` (`id`, `employee_id`, `name`, `reporting_method`, `created_at`, `updated_at`, `created_by`, `updated_by`, `attachment`) VALUES
(2, 'EMPyKQQcP4A', 1, 'Direct', 1627056340, 1627056340, 4, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary`
--

CREATE TABLE `employee_salary` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `pay_grade_id` int(11) NOT NULL,
  `pay_frequency` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee_salary`
--

INSERT INTO `employee_salary` (`id`, `employee_id`, `pay_grade_id`, `pay_frequency`, `currency`, `amount`, `created_at`, `updated_at`, `created_by`, `updated_by`, `attachment`) VALUES
(3, 'EMPyKQQcP4A', 3, 'Monthly', 'Naira', 200000, 1627056067, 1627056067, 4, 4, NULL),
(4, 'EMP8cerACbF', 2, 'Bi weekly', 'Dollar', 30000, 1627060627, 1627060627, 4, 4, NULL),
(5, 'EMPedBq8vZl', 3, 'Semi Monthly', 'Dollar', 30000, 1627062428, 1627062428, 4, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_skills`
--

CREATE TABLE `employee_skills` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `skill_id` int(11) NOT NULL,
  `years_of_experience` int(11) NOT NULL,
  `comments` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee_skills`
--

INSERT INTO `employee_skills` (`id`, `employee_id`, `skill_id`, `years_of_experience`, `comments`, `created_at`, `updated_at`, `created_by`, `updated_by`, `attachment`) VALUES
(3, 'EMPedBq8vZl', 2, 3, '', 1627062129, 1627062129, 4, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_supervisor`
--

CREATE TABLE `employee_supervisor` (
  `id` int(11) NOT NULL,
  `name` int(11) DEFAULT NULL,
  `reporting_method` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `employee_id` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `attachment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_surbodinate`
--

CREATE TABLE `employee_surbodinate` (
  `id` int(11) NOT NULL,
  `name` int(11) DEFAULT NULL,
  `reporting_method` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `employee_id` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `attachment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_user`
--

CREATE TABLE `employee_user` (
  `id` int(11) NOT NULL,
  `username` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `employee_id` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `accessKey` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `authKey` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee_user`
--

INSERT INTO `employee_user` (`id`, `username`, `password`, `employee_id`, `accessKey`, `authKey`) VALUES
(20, 'ayo', '$2y$13$sJhhaNHF9o4uB8PNQsEi5ukUDS3BHdJ4PQhYThJQ/fdxwiapNOxAO', 'EMPyKQQcP4A', 's3psTqCayWpxM6qgeFvhT5_swwux1Owj', 'OqfZfzOxgSODSRfs-IQhaOZ1H_Skcpni'),
(21, 'bannon', '$2y$13$1IcgoM4YXRaoLb/mTy3MgukZSlhiConhP87CyhrxEr4mLTrpS6bQq', 'EMP8cerACbF', 'FUVBPSSunDJZUkYx2_wtW_AJdk1yT6jm', 'EM-trj1Mefa5ug0B00pwrSsTHzlz8Ma0'),
(22, 'ferrerro', '$2y$13$PSNkSy4j9GSthqQ8N4xGleoFLiZiv050r6T1bSgcGKBjZzLbLq4yq', 'EMPedBq8vZl', 'wY40HQYig_XozuIQFGqOmabfcTRp7giu', 'y8sat2EIWAqQRXghx2hLH5UteENKxFsq');

-- --------------------------------------------------------

--
-- Table structure for table `employee_work_experience`
--

CREATE TABLE `employee_work_experience` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `company_name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `job_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `comment` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employee_work_experience`
--

INSERT INTO `employee_work_experience` (`id`, `employee_id`, `company_name`, `job_title`, `start_date`, `end_date`, `comment`, `created_at`, `updated_at`, `created_by`, `updated_by`, `attachment`) VALUES
(4, 'EMPyKQQcP4A', 'SoftLink plc', 'Software Engineer', '2012-06-27', '2016-08-26', '', 1627055915, 1627055915, 4, 4, NULL),
(5, 'EMP8cerACbF', 'ABC and co', 'Marine', '2014-07-23', '2012-07-26', '', 1627060598, 1627060598, 4, 4, NULL),
(6, 'EMPedBq8vZl', 'SoftLink plc', 'Software Engineer', '2021-06-16', '2021-11-22', '', 1627062412, 1627062412, 4, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employment_status`
--

CREATE TABLE `employment_status` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employment_status`
--

INSERT INTO `employment_status` (`id`, `employee_id`, `name`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, '', 'Active', 1626443858, 1626443858, 4, 4),
(2, '', 'Inactive', 1626444033, 1626444033, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `holiday`
--

CREATE TABLE `holiday` (
  `id` int(11) NOT NULL,
  `holiday` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `holiday_date` date NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `holiday`
--

INSERT INTO `holiday` (`id`, `holiday`, `holiday_date`, `description`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(3, 'New Year', '2022-01-01', 'New year holiday', 1627062552, 1627062552, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `job_categories`
--

CREATE TABLE `job_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `job_categories`
--

INSERT INTO `job_categories` (`id`, `name`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Technology', 1626725240, 1626725240, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `job_titles`
--

CREATE TABLE `job_titles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `job_titles`
--

INSERT INTO `job_titles` (`id`, `title`, `description`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(2, 'Project Manager', 'Helps in managing and supervising projects', 1626384624, 1626384624, 4, 4),
(3, 'Marine Engineering', 'Marine ', 1627060777, 1627060777, 4, 4),
(4, 'Software Engineer', 'software Engineer', 1627062890, 1627062890, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'English', 1626708056, 1626708056, 4, 4),
(2, 'spanish', 1626708072, 1626708072, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE `leave` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `leave_type` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `reason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(55) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `leave`
--

INSERT INTO `leave` (`id`, `employee_id`, `leave_type`, `from`, `to`, `reason`, `status`) VALUES
(5, 'EMP8cerACbF', 'paid leave', '2021-02-24', '2021-11-30', 'Paid leave ', 'approved'),
(6, 'EMPyKQQcP4A', 'casual leave', '2021-12-03', '2021-11-23', 'None', 'declined');

-- --------------------------------------------------------

--
-- Table structure for table `licences`
--

CREATE TABLE `licences` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `licences`
--

INSERT INTO `licences` (`id`, `name`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Work Permit', 1626708091, 1626708091, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`id`, `name`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Cooperative Membership', 1626724612, 1626724612, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1626360036),
('m210715_144549_create_Job_Titles_table', 1626360395),
('m210716_005418_create_Pay_Grades_table', 1626398924),
('m210716_010040_create_Employment_Status_table', 1626398926),
('m210716_010259_create_Job_Categories_table', 1626398927),
('m210716_010450_create_Currencies_table', 1626398929),
('m210716_011334_create_Company_Information_table', 1626398930),
('m210716_011733_create_Company_Branch_table', 1626398932),
('m210716_011840_create_Department_table', 1626398934),
('m210716_011926_create_Skills_table', 1626398936),
('m210716_012005_create_Education_table', 1626398937),
('m210716_012042_create_Licences_table', 1626398939),
('m210716_012112_create_Languages_table', 1626398940),
('m210716_012230_create_Memberships_table', 1626398942),
('m210716_012454_create_Nationalities_table', 1626399098),
('m210716_143529_create_Employee_table', 1626461737),
('m210716_144731_create_Contact_Details_table', 1626461739),
('m210716_145124_create_Emergency_Contact_table', 1626461740),
('m210716_152812_create_Employee_Depandant_table', 1626461741),
('m210716_153221_create_Employee_Immigration_table', 1626461743),
('m210716_154636_create_Employee_Job_table', 1626461748),
('m210716_155238_create_Employee_Salary_table', 1626461750),
('m210716_155455_create_Employee_Memberships_table', 1626462079),
('m210716_161018_create_Employee_Work_Experience_table', 1626463822),
('m210716_161331_create_Employee_Skills_table', 1626463824),
('m210716_163105_create_Employee_Languages_table', 1626463826),
('m210716_163350_create_Employee_License_table', 1626463828),
('m210716_185342_create_Employee_Education_table', 1626463830),
('m210716_195833_create_Employee_Surbodinate_table', 1626465527),
('m210716_195933_create_Employee_Supervisor_table', 1626465796),
('m210717_122434_create_Employee_account_table', 1626524804),
('m210717_192946_create_Employee_User_table', 1626550203),
('m210720_183642_create_leave_table', 1626806335),
('m210720_204440_create_holiday_table', 1626814078),
('m210722_183225_create_resignation_table', 1626978850);

-- --------------------------------------------------------

--
-- Table structure for table `nationalities`
--

CREATE TABLE `nationalities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nationalities`
--

INSERT INTO `nationalities` (`id`, `name`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Nigeria', 1626630895, 1626630895, 4, 4),
(2, 'USA', 1627056941, 1627056941, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pay_grades`
--

CREATE TABLE `pay_grades` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `minimum_salary` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `maximum_salary` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pay_grades`
--

INSERT INTO `pay_grades` (`id`, `name`, `currency`, `minimum_salary`, `maximum_salary`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(2, 'Grade-1', 'Naira', '30,0000', '40,0000', 1626443809, 1626443809, 4, 4),
(3, 'Grade-2', 'Naira', '50,000', '100,000', 1627056002, 1627056002, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `resignation`
--

CREATE TABLE `resignation` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `reason` text COLLATE utf8_unicode_ci NOT NULL,
  `letter` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Communication Skill', 1626702910, 1626702910, 4, 4),
(2, 'interpersonal skill', 1626702931, 1626702931, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `authKey` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `accessToken` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `authKey`, `accessToken`) VALUES
(4, 'test', 'test@mail.com', '$2y$13$1zSRUy549W.v6FnQroTuLuP.yHh/MtZqYKIbeLdb61/jKWEQtXenS', '4EGGkuE5BmNluuSNPm2h7VObhxKaBJXf', 'EmHt0mO681tV91D409wunsg0pN8rxQX9'),
(5, 'admin', 'admin@mail.com', '$2y$13$8QiWj1OwRaFt.tMUrJizCO1l2AzKtzazMLQzqQKPycTvgDee8JRvG', 'DTK2xQ1j7bsecDHZXJdFaVlrbb3fBmPf', 'nMWOzHcjivmsBPMiWGheOJI4B4crlzOQ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company_branch`
--
ALTER TABLE `company_branch`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-Company_Branch-created_by` (`created_by`),
  ADD KEY `idx-Company_Branch-updated_by` (`updated_by`);

--
-- Indexes for table `company_information`
--
ALTER TABLE `company_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-Company_Information-created_by` (`created_by`),
  ADD KEY `idx-Company_Information-updated_by` (`updated_by`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-Contact_Details-created_by` (`created_by`),
  ADD KEY `idx-Contact_Details-updated_by` (`updated_by`),
  ADD KEY `fk-Contact_Details-employee_id` (`employee_id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-Currencies-created_by` (`created_by`),
  ADD KEY `idx-Currencies-updated_by` (`updated_by`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-Department-created_by` (`created_by`),
  ADD KEY `idx-Department-updated_by` (`updated_by`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-Education-created_by` (`created_by`),
  ADD KEY `idx-Education-updated_by` (`updated_by`);

--
-- Indexes for table `emergency_contact`
--
ALTER TABLE `emergency_contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-Emergency_Contact-created_by` (`created_by`),
  ADD KEY `idx-Emergency_Contact-updated_by` (`updated_by`),
  ADD KEY `fk-Employee_Contact-employee_id` (`employee_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_id` (`employee_id`),
  ADD KEY `idx-Employee-created_by` (`created_by`),
  ADD KEY `idx-Employee-updated_by` (`updated_by`);

--
-- Indexes for table `employee_depandant`
--
ALTER TABLE `employee_depandant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-Employee_Depandant-created_by` (`created_by`),
  ADD KEY `idx-Employee_Depandant-updated_by` (`updated_by`),
  ADD KEY `fk-Employee_Depandant-employee_id` (`employee_id`);

--
-- Indexes for table `employee_education`
--
ALTER TABLE `employee_education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-Employee_Education-created_by` (`created_by`),
  ADD KEY `idx-Employee_Education-updated_by` (`updated_by`),
  ADD KEY `fk-Employee_Education-employee_id` (`employee_id`);

--
-- Indexes for table `employee_immigration`
--
ALTER TABLE `employee_immigration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-Employee_Immigration-created_by` (`created_by`),
  ADD KEY `idx-Employee_Immigration-updated_by` (`updated_by`),
  ADD KEY `fk-Employee_Immigration-employee_id` (`employee_id`);

--
-- Indexes for table `employee_job`
--
ALTER TABLE `employee_job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-Employee_Job-job_title_id` (`job_title_id`),
  ADD KEY `idx-Employee_Job-employment_status_id` (`employment_status_id`),
  ADD KEY `idx-Employee_Job-job_category_id` (`job_category_id`),
  ADD KEY `idx-Employee_Job-department_id` (`department_id`),
  ADD KEY `idx-Employee_Job-company_branch_id` (`company_branch_id`),
  ADD KEY `idx-Employee_Job-created_by` (`created_by`),
  ADD KEY `idx-Employee_Job-updated_by` (`updated_by`),
  ADD KEY `fk-Employee_Job-employee_id_id` (`employee_id`);

--
-- Indexes for table `employee_languages`
--
ALTER TABLE `employee_languages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-Employee_Languages-language_id` (`language_id`),
  ADD KEY `idx-Employee_Languages-created_by` (`created_by`),
  ADD KEY `idx-Employee_Languages-updated_by` (`updated_by`),
  ADD KEY `fk-Employee_Languages-employee_id` (`employee_id`);

--
-- Indexes for table `employee_license`
--
ALTER TABLE `employee_license`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-Employee_License-lincense_id` (`lincense_id`),
  ADD KEY `idx-Employee_License-created_by` (`created_by`),
  ADD KEY `idx-Employee_License-updated_by` (`updated_by`),
  ADD KEY `fk-Employee_License-employee_id` (`employee_id`);

--
-- Indexes for table `employee_memberships`
--
ALTER TABLE `employee_memberships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-Employee_Memberships-name` (`name`),
  ADD KEY `idx-Employee_Memberships-created_by` (`created_by`),
  ADD KEY `idx-Employee_Memberships-updated_by` (`updated_by`),
  ADD KEY `fk-Employee_Memberships-employee_id` (`employee_id`);

--
-- Indexes for table `employee_salary`
--
ALTER TABLE `employee_salary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-Employee_Salary-pay_grade_id` (`pay_grade_id`),
  ADD KEY `idx-Employee_Salary-created_by` (`created_by`),
  ADD KEY `idx-Employee_Salary-updated_by` (`updated_by`),
  ADD KEY `fk-Employee_Salary-employee_id` (`employee_id`);

--
-- Indexes for table `employee_skills`
--
ALTER TABLE `employee_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-Employee_Skills-skill_id` (`skill_id`),
  ADD KEY `idx-Employee_Skills-created_by` (`created_by`),
  ADD KEY `idx-Employee_Skills-updated_by` (`updated_by`),
  ADD KEY `fk-Employee_Skills-employee_id` (`employee_id`);

--
-- Indexes for table `employee_supervisor`
--
ALTER TABLE `employee_supervisor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-Employee_Supervisor-name` (`name`),
  ADD KEY `idx-Employee_Supervisor-created_by` (`created_by`),
  ADD KEY `idx-Employee_Supervisor-updated_by` (`updated_by`),
  ADD KEY `fk-Employee_Supervisor-employee_id` (`employee_id`);

--
-- Indexes for table `employee_surbodinate`
--
ALTER TABLE `employee_surbodinate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-Employee_Surbodinate-name` (`name`),
  ADD KEY `idx-Employee_Surbodinate-created_by` (`created_by`),
  ADD KEY `idx-Employee_Surbodinate-updated_by` (`updated_by`),
  ADD KEY `fk-Employee_Surbodinate-employee_id` (`employee_id`);

--
-- Indexes for table `employee_user`
--
ALTER TABLE `employee_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_id` (`employee_id`);

--
-- Indexes for table `employee_work_experience`
--
ALTER TABLE `employee_work_experience`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-Employee_Work_Experience-created_by` (`created_by`),
  ADD KEY `idx-Employee_Work_Experience-updated_by` (`updated_by`),
  ADD KEY `fk-Employee_Work_Experience-employee_id` (`employee_id`);

--
-- Indexes for table `employment_status`
--
ALTER TABLE `employment_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-Employment_Status-created_by` (`created_by`),
  ADD KEY `idx-Employment_Status-updated_by` (`updated_by`);

--
-- Indexes for table `holiday`
--
ALTER TABLE `holiday`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-holiday-created_by` (`created_by`),
  ADD KEY `idx-holiday-updated_by` (`updated_by`);

--
-- Indexes for table `job_categories`
--
ALTER TABLE `job_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-Job_Categories-created_by` (`created_by`),
  ADD KEY `idx-Job_Categories-updated_by` (`updated_by`);

--
-- Indexes for table `job_titles`
--
ALTER TABLE `job_titles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-Job_Titles-created_by` (`created_by`),
  ADD KEY `idx-Job_Titles-updated_by` (`updated_by`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-Languages-created_by` (`created_by`),
  ADD KEY `idx-Languages-updated_by` (`updated_by`);

--
-- Indexes for table `leave`
--
ALTER TABLE `leave`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-leave-employee_id` (`employee_id`);

--
-- Indexes for table `licences`
--
ALTER TABLE `licences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-Licences-created_by` (`created_by`),
  ADD KEY `idx-Licences-updated_by` (`updated_by`);

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-Memberships-created_by` (`created_by`),
  ADD KEY `idx-Memberships-updated_by` (`updated_by`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `nationalities`
--
ALTER TABLE `nationalities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-Nationalities-created_by` (`created_by`),
  ADD KEY `idx-Nationalities-updated_by` (`updated_by`);

--
-- Indexes for table `pay_grades`
--
ALTER TABLE `pay_grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-Pay_Grades-created_by` (`created_by`),
  ADD KEY `idx-Pay_Grades-updated_by` (`updated_by`);

--
-- Indexes for table `resignation`
--
ALTER TABLE `resignation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-resignation-employee_id` (`employee_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-Skills-created_by` (`created_by`),
  ADD KEY `idx-Skills-updated_by` (`updated_by`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_branch`
--
ALTER TABLE `company_branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company_information`
--
ALTER TABLE `company_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emergency_contact`
--
ALTER TABLE `emergency_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `employee_depandant`
--
ALTER TABLE `employee_depandant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee_education`
--
ALTER TABLE `employee_education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employee_immigration`
--
ALTER TABLE `employee_immigration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_job`
--
ALTER TABLE `employee_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employee_languages`
--
ALTER TABLE `employee_languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_license`
--
ALTER TABLE `employee_license`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_memberships`
--
ALTER TABLE `employee_memberships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_salary`
--
ALTER TABLE `employee_salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee_skills`
--
ALTER TABLE `employee_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee_supervisor`
--
ALTER TABLE `employee_supervisor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_surbodinate`
--
ALTER TABLE `employee_surbodinate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee_user`
--
ALTER TABLE `employee_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `employee_work_experience`
--
ALTER TABLE `employee_work_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employment_status`
--
ALTER TABLE `employment_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `holiday`
--
ALTER TABLE `holiday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job_categories`
--
ALTER TABLE `job_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_titles`
--
ALTER TABLE `job_titles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leave`
--
ALTER TABLE `leave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `licences`
--
ALTER TABLE `licences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nationalities`
--
ALTER TABLE `nationalities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pay_grades`
--
ALTER TABLE `pay_grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `resignation`
--
ALTER TABLE `resignation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `company_branch`
--
ALTER TABLE `company_branch`
  ADD CONSTRAINT `fk-Company_Branch-created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Company_Branch-updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `company_information`
--
ALTER TABLE `company_information`
  ADD CONSTRAINT `fk-Company_Information-created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Company_Information-updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD CONSTRAINT `fk-Contact_Details-created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Contact_Details-employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Contact_Details-updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `currencies`
--
ALTER TABLE `currencies`
  ADD CONSTRAINT `fk-Currencies-created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Currencies-updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `fk-Department-created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Department-updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `fk-Education-created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Education-updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `emergency_contact`
--
ALTER TABLE `emergency_contact`
  ADD CONSTRAINT `fk-Emergency_Contact-created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Emergency_Contact-updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Employee_Contact-employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `fk-Employee-created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Employee-updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employee_depandant`
--
ALTER TABLE `employee_depandant`
  ADD CONSTRAINT `fk-Employee_Depandant-created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Employee_Depandant-employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Employee_Depandant-updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employee_education`
--
ALTER TABLE `employee_education`
  ADD CONSTRAINT `fk-Employee_Education-created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Employee_Education-employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Employee_Education-updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employee_immigration`
--
ALTER TABLE `employee_immigration`
  ADD CONSTRAINT `fk-Employee_Immigration-created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Employee_Immigration-employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Employee_Immigration-updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employee_job`
--
ALTER TABLE `employee_job`
  ADD CONSTRAINT `fk-Employee_Job-company_branch_id` FOREIGN KEY (`company_branch_id`) REFERENCES `company_branch` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Employee_Job-created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Employee_Job-department_id` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Employee_Job-employee_id_id` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Employee_Job-employment_status_id` FOREIGN KEY (`employment_status_id`) REFERENCES `employment_status` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Employee_Job-job_category_id` FOREIGN KEY (`job_category_id`) REFERENCES `job_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Employee_Job-job_title_id` FOREIGN KEY (`job_title_id`) REFERENCES `job_titles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Employee_Job-updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employee_languages`
--
ALTER TABLE `employee_languages`
  ADD CONSTRAINT `fk-Employee_Languages-created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Employee_Languages-employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Employee_Languages-language_id` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Employee_Languages-updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employee_license`
--
ALTER TABLE `employee_license`
  ADD CONSTRAINT `fk-Employee_License-created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Employee_License-employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Employee_License-lincense_id` FOREIGN KEY (`lincense_id`) REFERENCES `licences` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Employee_License-updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employee_memberships`
--
ALTER TABLE `employee_memberships`
  ADD CONSTRAINT `fk-Employee_Memberships-created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Employee_Memberships-employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Employee_Memberships-name` FOREIGN KEY (`name`) REFERENCES `memberships` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Employee_Memberships-updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employee_salary`
--
ALTER TABLE `employee_salary`
  ADD CONSTRAINT `fk-Employee_Salary-created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Employee_Salary-employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Employee_Salary-pay_grade_id` FOREIGN KEY (`pay_grade_id`) REFERENCES `pay_grades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Employee_Salary-updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employee_skills`
--
ALTER TABLE `employee_skills`
  ADD CONSTRAINT `fk-Employee_Skills-created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Employee_Skills-employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Employee_Skills-skill_id` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Employee_Skills-updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employee_supervisor`
--
ALTER TABLE `employee_supervisor`
  ADD CONSTRAINT `fk-Employee_Supervisor-created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Employee_Supervisor-employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Employee_Supervisor-name` FOREIGN KEY (`name`) REFERENCES `employee` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Employee_Supervisor-updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employee_surbodinate`
--
ALTER TABLE `employee_surbodinate`
  ADD CONSTRAINT `fk-Employee_Surbodinate-created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Employee_Surbodinate-employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Employee_Surbodinate-name` FOREIGN KEY (`name`) REFERENCES `employee` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Employee_Surbodinate-updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employee_work_experience`
--
ALTER TABLE `employee_work_experience`
  ADD CONSTRAINT `fk-Employee_Work_Experience-created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Employee_Work_Experience-employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Employee_Work_Experience-updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employment_status`
--
ALTER TABLE `employment_status`
  ADD CONSTRAINT `fk-Employment_Status-created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Employment_Status-updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `holiday`
--
ALTER TABLE `holiday`
  ADD CONSTRAINT `fk-holiday-created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-holiday-updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_categories`
--
ALTER TABLE `job_categories`
  ADD CONSTRAINT `fk-Job_Categories-created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Job_Categories-updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_titles`
--
ALTER TABLE `job_titles`
  ADD CONSTRAINT `fk-Job_Titles-created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Job_Titles-updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `languages`
--
ALTER TABLE `languages`
  ADD CONSTRAINT `fk-Languages-created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Languages-updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `leave`
--
ALTER TABLE `leave`
  ADD CONSTRAINT `fk-leave-employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE;

--
-- Constraints for table `licences`
--
ALTER TABLE `licences`
  ADD CONSTRAINT `fk-Licences-created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Licences-updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `memberships`
--
ALTER TABLE `memberships`
  ADD CONSTRAINT `fk-Memberships-created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Memberships-updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nationalities`
--
ALTER TABLE `nationalities`
  ADD CONSTRAINT `fk-Nationalities-created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Nationalities-updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pay_grades`
--
ALTER TABLE `pay_grades`
  ADD CONSTRAINT `fk-Pay_Grades-created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Pay_Grades-updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `resignation`
--
ALTER TABLE `resignation`
  ADD CONSTRAINT `fk-resignation-employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE;

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `fk-Skills-created_by` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-Skills-updated_by` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
