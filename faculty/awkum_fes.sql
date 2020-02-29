-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2020 at 12:27 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `awkum_fes`
--

-- --------------------------------------------------------

--
-- Table structure for table `campus`
--

CREATE TABLE `campus` (
  `srno` int(11) NOT NULL,
  `campus` varchar(100) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campus`
--

INSERT INTO `campus` (`srno`, `campus`, `city`, `address`, `created_by`, `created_at`, `updated_at`) VALUES
(9, 'Abdul Wali Khan University Mardan', 'Mardan', 'Toru Road Mardan', 15, '2020-02-26 19:30:34', '0000-00-00 00:00:00'),
(10, 'Awkum Main Campus', 'Mardan', 'College  Chowk Mardan', 15, '2020-02-27 11:42:51', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `srno` int(11) NOT NULL,
  `course_name` varchar(50) DEFAULT NULL,
  `course_code` varchar(50) DEFAULT NULL,
  `campus_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`srno`, `course_name`, `course_code`, `campus_id`, `department_id`, `program_id`, `semester_id`, `created_by`, `created_at`, `updated_at`) VALUES
(11, 'Theory Of Computation', '2230', 9, 18, 10, 1, 15, '2020-02-26 19:33:20', '2020-02-27 19:29:06'),
(12, 'Advance Wireless Networks', '2224', 9, 18, 10, 1, 15, '2020-02-26 19:34:08', '0000-00-00 00:00:00'),
(13, 'Advance Operating System', '2225', 9, 18, 10, 1, 15, '2020-02-26 19:34:48', '0000-00-00 00:00:00'),
(14, 'Formal Methods', '2225', 9, 18, 10, 1, 15, '2020-02-26 19:35:09', '2020-02-28 15:59:01'),
(15, 'Forensic Psychology', '1122', 10, 19, 9, 1, 15, '2020-02-27 11:46:11', '2020-02-28 15:59:19');

-- --------------------------------------------------------

--
-- Table structure for table `course_semester`
--

CREATE TABLE `course_semester` (
  `srno` int(11) NOT NULL,
  `sem_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `srno` int(11) NOT NULL,
  `campus_id` int(11) DEFAULT NULL,
  `dept_name` varchar(100) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`srno`, `campus_id`, `dept_name`, `created_by`, `created_at`, `updated_at`) VALUES
(18, 9, 'Computer Science', 15, '2020-02-26 19:32:16', '0000-00-00 00:00:00'),
(19, 10, 'Psychology', 15, '2020-02-27 11:43:44', '0000-00-00 00:00:00'),
(20, 10, 'Biology', 18, '2020-02-27 18:33:38', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `dept_program`
--

CREATE TABLE `dept_program` (
  `srno` int(11) NOT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dept_program`
--

INSERT INTO `dept_program` (`srno`, `dept_id`, `program_id`) VALUES
(608, 18, 9),
(609, 18, 10),
(610, 19, 9),
(611, 19, 10),
(612, 20, 9),
(613, 20, 10),
(614, 20, 11);

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE `evaluation` (
  `srno` int(11) NOT NULL,
  `campus_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `q1` int(11) NOT NULL,
  `q2` int(11) NOT NULL,
  `q3` int(11) NOT NULL,
  `q4` int(11) NOT NULL,
  `q5` int(11) NOT NULL,
  `q6` int(11) NOT NULL,
  `q7` int(11) NOT NULL,
  `q8` int(11) NOT NULL,
  `q9` int(11) NOT NULL,
  `q10` int(11) NOT NULL,
  `q11` int(11) NOT NULL,
  `q12` int(11) NOT NULL,
  `q13` int(11) NOT NULL,
  `q14` int(11) NOT NULL,
  `q15` int(11) NOT NULL,
  `q16` int(11) NOT NULL,
  `session` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`srno`, `campus_id`, `department_id`, `program_id`, `semester_id`, `faculty_id`, `course_id`, `student_id`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `q11`, `q12`, `q13`, `q14`, `q15`, `q16`, `session`, `created_at`) VALUES
(37, 9, 18, 10, 1, 13, 11, 8, 1, 1, 1, 2, 3, 1, 3, 3, 1, 3, 2, 2, 2, 2, 2, 2, '2020/2021', '2020-02-26 20:40:48'),
(38, 9, 18, 10, 1, 14, 12, 8, 1, 2, 1, 1, 1, 1, 2, 1, 1, 2, 2, 2, 1, 1, 1, 1, '2020/2021', '2020-02-26 20:43:38'),
(39, 9, 18, 10, 1, 15, 14, 8, 1, 1, 2, 2, 1, 2, 2, 2, 2, 2, 5, 5, 4, 4, 4, 4, '2020/2021', '2020-02-26 20:50:18'),
(43, 9, 18, 10, 1, 16, 13, 8, 1, 1, 2, 2, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, '2020/2021', '2020-02-26 20:57:14'),
(44, 10, 19, 9, 2, 17, 15, 12, 2, 2, 2, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 5, 5, '2020/2021', '2020-02-27 11:50:20'),
(45, 9, 18, 10, 1, 13, 11, 9, 3, 3, 4, 5, 5, 5, 4, 5, 4, 5, 4, 5, 4, 5, 4, 4, '2020/2021', '2020-02-27 12:06:05'),
(46, 9, 18, 10, 1, 13, 11, 10, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, '2020/2021', '2020-02-27 17:18:41');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `srno` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `campus_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`srno`, `name`, `campus_id`, `department_id`, `program_id`, `semester_id`, `course_id`, `designation`, `created_by`, `created_at`, `updated_at`) VALUES
(13, 'Docter Sher Afzal', 9, 18, 10, 1, 11, 'Professor', 15, '2020-02-26 19:33:30', '2020-02-27 19:33:23'),
(14, 'Docter Raheem Khan', 9, 18, 10, 1, 12, 'Assistant Professor', 15, '2020-02-26 19:35:40', '2020-02-27 19:33:07'),
(15, 'Mushtaq Ahmed', 9, 18, 10, 1, 14, 'Professor', 15, '2020-02-26 19:36:03', '2020-02-28 15:53:45');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_department`
--

CREATE TABLE `faculty_department` (
  `srno` int(11) NOT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_semester`
--

CREATE TABLE `faculty_semester` (
  `srno` int(11) NOT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `semester_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `srno` int(11) NOT NULL,
  `campus_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `semester_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `q1` int(11) DEFAULT NULL,
  `q2` int(11) DEFAULT NULL,
  `q3` int(11) DEFAULT NULL,
  `q4` int(11) DEFAULT NULL,
  `q5` int(11) DEFAULT NULL,
  `q6` int(11) DEFAULT NULL,
  `q7` int(11) DEFAULT NULL,
  `q8` int(11) DEFAULT NULL,
  `q9` int(11) DEFAULT NULL,
  `q10` int(11) DEFAULT NULL,
  `q11` int(11) DEFAULT NULL,
  `q12` int(11) DEFAULT NULL,
  `q13` int(11) DEFAULT NULL,
  `q14` int(11) DEFAULT NULL,
  `q15` int(11) DEFAULT NULL,
  `q16` int(11) DEFAULT NULL,
  `sum` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `srno` int(11) NOT NULL,
  `program` varchar(30) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`srno`, `program`, `created_by`, `created_at`, `updated_at`) VALUES
(9, 'BS', 15, '2020-02-26 19:31:10', '0000-00-00 00:00:00'),
(10, 'MS', 15, '2020-02-26 19:31:25', '0000-00-00 00:00:00'),
(11, 'BSc', 15, '2020-02-27 11:44:32', '0000-00-00 00:00:00'),
(13, 'PHD', 18, '2020-02-28 15:45:25', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `program_course`
--

CREATE TABLE `program_course` (
  `srno` int(11) NOT NULL,
  `program_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `program_semester`
--

CREATE TABLE `program_semester` (
  `srno` int(11) NOT NULL,
  `program_id` int(11) DEFAULT NULL,
  `semester_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_semester`
--

INSERT INTO `program_semester` (`srno`, `program_id`, `semester_id`) VALUES
(56, 9, 1),
(57, 9, 2),
(58, 9, 3),
(59, 9, 4),
(60, 9, 5),
(61, 9, 6),
(62, 9, 7),
(63, 9, 8),
(64, 10, 1),
(65, 10, 2),
(66, 10, 3),
(67, 10, 4),
(68, 11, 1),
(69, 11, 2),
(70, 11, 3),
(71, 11, 4),
(72, 11, 5),
(73, 11, 6),
(74, 11, 7),
(75, 11, 8),
(80, 13, 1),
(81, 13, 2),
(82, 13, 3),
(83, 13, 4);

-- --------------------------------------------------------

--
-- Table structure for table `rbac_menu_item`
--

CREATE TABLE `rbac_menu_item` (
  `menu_id` int(11) NOT NULL,
  `menu_title` varchar(200) DEFAULT NULL,
  `page_id` varchar(250) DEFAULT NULL,
  `page_name` varchar(30) NOT NULL,
  `module` varchar(200) DEFAULT NULL,
  `parent_menu` int(11) DEFAULT NULL,
  `is_report` tinyint(4) DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rbac_menu_item`
--

INSERT INTO `rbac_menu_item` (`menu_id`, `menu_title`, `page_id`, `page_name`, `module`, `parent_menu`, `is_report`, `create_by`, `create_date`) VALUES
(1, 'Users List', 'usersList', 'usersList.php', 'Users', 1, 0, 0, '2019-11-25 14:11:50'),
(2, 'Role Permission', 'permissionSetup', 'permissionSetup.php', 'Permissions', 0, 0, 0, '2019-12-07 12:12:53'),
(3, 'Add Role', 'addRole', 'addRole.php', 'Permissions', 0, 0, 0, '2019-12-11 14:12:59'),
(4, 'User Role', 'userRole', 'userRole.php', 'Permissions', 0, 0, 0, '2019-12-11 14:12:02'),
(6, 'Campus', 'Campuses', 'campus.php', 'Add', 0, 0, 0, '2020-02-25 15:02:28'),
(7, 'Department', 'Department', 'department.php', 'Add', 0, 0, 0, '2020-02-25 15:02:55'),
(8, 'Program', 'Program', 'program.php', 'Add', 0, 0, 0, '2020-02-25 15:02:33'),
(9, 'Semester', 'Semesters', 'semesters.php', 'Add', 0, 0, 0, '2020-02-25 15:02:00'),
(10, 'Faculty', 'Faculty', 'faculty.php', 'Add', 0, 0, 0, '2020-02-25 15:02:19'),
(11, 'Courses', 'Courses', 'courses.php', 'Add', 0, 0, 0, '2020-02-25 15:02:36'),
(12, 'Students', 'Students', 'students.php', 'Add', 0, 0, 0, '2020-02-25 15:02:04'),
(13, 'Reports', 'reports', 'reports.php', 'Add', 0, 0, 0, '2020-02-25 15:02:22');

-- --------------------------------------------------------

--
-- Table structure for table `rbac_permissions`
--

CREATE TABLE `rbac_permissions` (
  `perm_id` bigint(20) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `can_access` tinyint(4) DEFAULT NULL,
  `can_create` tinyint(4) DEFAULT NULL,
  `can_edit` tinyint(4) DEFAULT NULL,
  `can_delete` tinyint(4) DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rbac_permissions`
--

INSERT INTO `rbac_permissions` (`perm_id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `create_by`, `create_date`) VALUES
(1, 1, 1, 1, 1, 0, 1, 1, '2019-12-07 15:24:12'),
(2, 1, 2, 1, 1, 1, 1, 0, '2019-12-07 15:24:12'),
(3, 2, 1, 1, 0, 0, 0, 1, '2019-12-09 12:05:12'),
(4, 2, 2, 1, 1, 0, 1, 1, '2019-12-09 12:05:12'),
(5, 3, 1, 1, 1, 1, 1, 1, '2019-12-09 13:19:12'),
(6, 3, 2, 1, 1, 1, 1, 1, '2019-12-09 13:20:12'),
(7, 4, 1, 1, 1, 1, 1, 1, '2019-12-09 13:08:12'),
(8, 4, 2, 1, 1, 1, 1, 1, '2019-12-09 13:09:12'),
(9, 5, 1, 0, 0, 0, 0, 1, '2019-12-11 18:15:22'),
(10, 5, 2, 1, 0, 0, 0, 1, '2019-12-11 18:15:22'),
(11, 5, 3, 0, 0, 0, 0, 1, '2019-12-11 18:15:22'),
(12, 6, 1, 0, 0, 0, 0, 1, '2019-12-11 18:16:55'),
(13, 6, 2, 1, 1, 1, 1, 1, '2019-12-11 18:16:55'),
(14, 6, 3, 1, 1, 1, 0, 1, '2019-12-11 18:16:55'),
(15, 7, 1, 1, 1, 1, 1, 1, '2019-12-11 18:40:02'),
(16, 7, 2, 1, 1, 1, 1, 1, '2019-12-11 18:40:02'),
(17, 7, 3, 1, 1, 1, 1, 1, '2019-12-11 18:40:02'),
(18, 7, 4, 1, 1, 1, 1, 1, '2019-12-11 18:40:02'),
(19, 8, 1, 1, 0, 0, 1, 1, '2019-12-13 20:34:24'),
(20, 8, 2, 1, 1, 1, 1, 1, '2019-12-13 20:34:24'),
(21, 8, 3, 1, 0, 0, 1, 1, '2019-12-13 20:34:24'),
(22, 8, 4, 0, 0, 0, 0, 1, '2019-12-13 20:34:24'),
(23, 9, 1, 1, 1, 1, 1, 1, '2019-12-13 21:15:03'),
(24, 9, 2, 1, 1, 1, 1, 1, '2019-12-13 21:15:03'),
(25, 9, 3, 1, 1, 1, 1, 1, '2019-12-13 21:15:03'),
(26, 9, 4, 1, 1, 1, 1, 1, '2019-12-13 21:15:03'),
(27, 10, 1, 1, 1, 1, 1, 1, '2020-02-25 19:45:30'),
(28, 10, 2, 1, 1, 1, 1, 1, '2020-02-25 19:45:30'),
(29, 10, 3, 1, 1, 1, 1, 1, '2020-02-25 19:45:30'),
(30, 10, 4, 1, 1, 1, 1, 1, '2020-02-25 19:45:30'),
(31, 10, 6, 1, 1, 1, 1, 1, '2020-02-25 19:45:30'),
(32, 10, 7, 1, 1, 1, 1, 1, '2020-02-25 19:45:31'),
(33, 10, 8, 1, 1, 1, 1, 1, '2020-02-25 19:45:31'),
(34, 10, 9, 1, 1, 1, 1, 1, '2020-02-25 19:45:31'),
(35, 10, 10, 1, 1, 1, 1, 1, '2020-02-25 19:45:31'),
(36, 10, 11, 1, 1, 1, 1, 1, '2020-02-25 19:45:31'),
(37, 10, 12, 1, 1, 1, 1, 1, '2020-02-25 19:45:31');

-- --------------------------------------------------------

--
-- Table structure for table `rbac_role`
--

CREATE TABLE `rbac_role` (
  `role_id` int(11) NOT NULL,
  `role_name` text DEFAULT NULL,
  `role_description` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `role_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rbac_role`
--

INSERT INTO `rbac_role` (`role_id`, `role_name`, `role_description`, `created_by`, `date_time`, `role_status`) VALUES
(1, 'Admin', 'asdasd', 0, '2019-12-07 15:12:23', 1),
(2, 'Role User', 'asdasd', 0, '2019-12-09 12:12:05', 1),
(3, 'Users Admin', 'Can add users and User roles', 0, '2019-12-09 13:12:19', 1),
(4, 'Manager', 'asdkjasj', 0, '2019-12-09 13:12:08', 1),
(5, 'New Admin', 'asdasdads', 0, '2019-12-11 14:12:22', 1),
(6, 'New Admin2', 'asdasdasd', 0, '2019-12-11 14:12:54', 1),
(7, 'Super Admin', 'asdadsads', 0, '2019-12-11 14:12:02', 1),
(8, 'Admin123', 'asdasd', 0, '2019-12-13 16:12:24', 1),
(9, 'new 1', 'asdasd', 0, '2019-12-13 17:12:03', 1),
(10, 'New Admin 7', 'asdasdasd', 0, '2020-02-25 15:02:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rbac_role_access_table`
--

CREATE TABLE `rbac_role_access_table` (
  `role_acc_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rbac_role_access_table`
--

INSERT INTO `rbac_role_access_table` (`role_acc_id`, `user_id`, `role_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(5, 5, 6),
(6, 14, 9),
(4, 15, 7),
(7, 17, 10),
(8, 18, 10);

-- --------------------------------------------------------

--
-- Table structure for table `rbac_user`
--

CREATE TABLE `rbac_user` (
  `id` int(11) NOT NULL,
  `shift_id` int(11) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `reset_token` varchar(32) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_logout` datetime DEFAULT NULL,
  `ip_address` varchar(14) DEFAULT NULL,
  `user_type` tinyint(4) NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `is_admin` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rbac_user`
--

INSERT INTO `rbac_user` (`id`, `shift_id`, `firstname`, `lastname`, `about`, `email`, `password`, `reset_token`, `image`, `last_login`, `last_logout`, `ip_address`, `user_type`, `status`, `is_admin`, `created_at`) VALUES
(1, NULL, 'Test', 'Test', 'asdasdasd', 'test@yahoo.com', '912ec803b2ce49e4a541068d495ab570', NULL, '90055641_Bearded_Man-17-512.png', '2019-12-13 21:01:22', '2019-12-13 21:14:15', '::1', 0, 1, NULL, '2019-12-07 15:53:12'),
(2, NULL, 'Test', 'Test3', NULL, 'test@test2.com', '7815696ecbf1c96e6894b779456d330e', NULL, '13429271_Bearded_Man-17-512.png', '2019-12-13 19:24:55', '2019-12-13 20:58:04', '::1', 0, 1, NULL, '2019-12-09 12:39:12'),
(3, NULL, 'Salman', 'Khan', NULL, 'test@test3.com', '7815696ecbf1c96e6894b779456d330e', NULL, '46397657_Bearded_Man-17-512.png', '2019-12-11 18:40:20', '2020-02-28 21:23:17', '::1', 0, 1, NULL, '2019-12-09 13:29:12'),
(4, NULL, 'test', 'test', NULL, 'test@test4.com', '7815696ecbf1c96e6894b779456d330e', NULL, '97654257_Bearded_Man-17-512.png', NULL, '2020-01-11 15:53:14', '::1', 0, 1, NULL, '2019-12-09 13:11:12'),
(5, NULL, 'Test', 'test3', NULL, 'test@test6.com', '7815696ecbf1c96e6894b779456d330e', NULL, '26572730useravatar.jpg', '2019-12-11 18:39:03', '2019-12-11 18:40:11', '::1', 0, 1, NULL, '2019-12-09 21:32:05'),
(6, NULL, 'Asad', 'Khan', NULL, 'abc@test.com', '7815696ecbf1c96e6894b779456d330e', NULL, '18744969_Bearded_Man-17-512.png', '2019-12-13 21:37:47', '2019-12-13 21:36:19', '::1', 0, 1, NULL, '2019-12-11 18:36:33'),
(7, NULL, 'asdasd', 'asdasdasd', '', 'abc2@test.com', '7815696ecbf1c96e6894b779456d330e', NULL, '52619925_Bearded_Man-17-512.png', NULL, NULL, '::1', 0, 1, NULL, '2019-12-11 19:08:23'),
(8, NULL, 'asdasdasd', 'test5', NULL, 'abc1@test.com', '7815696ecbf1c96e6894b779456d330e', NULL, '44289718_Bearded_Man-17-512.png', NULL, NULL, '::1', 0, 1, NULL, '2019-12-11 19:15:23'),
(9, NULL, 'asdasd', 'asdasd', NULL, 'test@test.com', '7815696ecbf1c96e6894b779456d330e', NULL, 'admin-image.png', NULL, '2020-01-14 02:13:17', '::1', 0, 1, NULL, '2019-12-12 21:43:25'),
(10, NULL, 'asdasd', 'asdasd', NULL, 'mansoorbahadur@yahoo.com', '7815696ecbf1c96e6894b779456d330e', NULL, 'admin-image.png', NULL, NULL, '::1', 0, 1, NULL, '2019-12-12 21:43:59'),
(11, NULL, 'asdasd', 'asdasdasdasd', NULL, 'test@test9.com', '7815696ecbf1c96e6894b779456d330e', NULL, '83476141_Bearded_Man-17-512.png', NULL, NULL, '::1', 0, 1, NULL, '2019-12-12 21:45:40'),
(12, NULL, 'asdasdasd', 'test7', '', 'mansoorbahadur123@yahoo.com', '7815696ecbf1c96e6894b779456d330e', NULL, 'admin-image.png', NULL, NULL, '::1', 0, 1, NULL, '2019-12-13 16:42:16'),
(13, NULL, 'asdasd', 'asdasd2222', NULL, 'test@test10.com', '912ec803b2ce49e4a541068d495ab570', NULL, '97069265_Bearded_Man-17-512.png', NULL, NULL, '::1', 0, 1, NULL, '2019-12-13 16:43:45'),
(14, NULL, 'asdasd', 'asdasdasdafccvsfvd', NULL, 'asdaa@gmail.com', '7815696ecbf1c96e6894b779456d330e', NULL, 'admin-image.png', '2020-01-11 16:03:08', '2020-02-06 15:36:03', '::1', 1, 1, NULL, '2019-12-13 21:09:51'),
(15, NULL, 'user', 'user', NULL, 'asdaaxa@yahoo.com', '7815696ecbf1c96e6894b779456d330e', NULL, '43157696_Bearded_Man-17-512.png', '2020-02-27 11:41:03', '2020-02-27 17:25:45', '::1', 1, 1, NULL, '2019-12-28 16:27:15'),
(16, NULL, 'asdasd', 'aaaaa', NULL, 'mansosaaasdorbahadur@yahoo.com', '7815696ecbf1c96e6894b779456d330e', NULL, '31261890_Bearded_Man-17-512.png', NULL, NULL, '::1', 1, 1, NULL, '2020-01-11 15:58:01'),
(17, NULL, 'AdminUser', 'admin', NULL, 'aaaassaaa@yahoo.com', '7815696ecbf1c96e6894b779456d330e', NULL, 'admin-image.png', '2020-02-25 19:48:47', '2020-02-26 11:12:36', '::1', 1, 1, NULL, '2020-02-25 19:47:49'),
(18, NULL, 'Admin', 'super_admin', NULL, 'aaaaasssaaa@yahoo.com', '7815696ecbf1c96e6894b779456d330e', NULL, 'admin-image.png', '2020-02-28 21:23:26', '2020-02-27 17:33:26', '::1', 1, 1, NULL, '2020-02-27 17:25:28');

-- --------------------------------------------------------

--
-- Table structure for table `registration_numbers`
--

CREATE TABLE `registration_numbers` (
  `id` int(11) NOT NULL,
  `number` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `srno` int(11) NOT NULL,
  `semester` varchar(30) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`srno`, `semester`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'First Semester', 4, '2020-01-11 19:41:57', '2020-01-14 00:11:27'),
(2, 'Second Semester', 9, '2020-01-14 00:11:14', NULL),
(3, 'Third Semester', 9, '2020-01-14 00:11:41', NULL),
(4, 'Fourth Semester', 9, '2020-01-14 00:11:59', NULL),
(5, 'Fifth Semester', 9, '2020-01-14 00:12:10', NULL),
(6, 'Sixth Semester', 9, '2020-01-14 00:12:23', NULL),
(7, 'Seventh Semester', 9, '2020-01-14 00:12:38', NULL),
(8, 'Eight Semester', 9, '2020-01-14 00:12:57', NULL),
(9, 'Ninth Semester', 15, '2020-02-10 16:56:14', '2020-02-10 16:56:31'),
(10, 'Tenth Semester', 3, '2020-02-25 18:52:09', '2020-02-25 18:52:14');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `srno` int(11) NOT NULL,
  `campus_id` int(11) DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `semester_id` int(11) DEFAULT NULL,
  `reg_no` varchar(100) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `f_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `address` varchar(150) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`srno`, `campus_id`, `program_id`, `department_id`, `semester_id`, `reg_no`, `name`, `f_name`, `email`, `password`, `contact`, `address`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(8, 9, 10, 18, 1, '1111', 'Umar Khan', 'Hayat Khan', 'umartoru@gmail.com', '7815696ecbf1c96e6894b779456d330e', '03469898999', 'Toru Mardan', 1, 15, '2020-02-26 19:37:16', '0000-00-00 00:00:00'),
(9, 9, 10, 18, 1, '2222', 'Mansoor Bahadur', 'Lal Bahadur', 'mansoorbahadur1234@gmail.com', '7815696ecbf1c96e6894b779456d330e', '03489999999', 'Green Acre Town Mardan', 1, 15, '2020-02-26 19:37:59', '0000-00-00 00:00:00'),
(10, 9, 10, 18, 1, '3333', 'Haroon Khan', 'Ali Khan', 'haroon@gmail.com', '7815696ecbf1c96e6894b779456d330e', '03468888888', 'Mayar Mardan', 1, 15, '2020-02-26 19:38:42', '0000-00-00 00:00:00'),
(11, 9, 10, 18, 1, '4444', 'Abbass Khelji', 'Khelji', 'abbas@gmail.com', '7815696ecbf1c96e6894b779456d330e', '03489988789', 'Peshawar', 1, 15, '2020-02-26 19:39:25', '0000-00-00 00:00:00'),
(12, 10, 9, 19, 2, '9999', 'SHah Hussain', 'Hussain', 'mansoorbahadur55123@gmail.com', '7815696ecbf1c96e6894b779456d330e', '03489600194', 'Mardan', 1, 15, '2020-02-27 11:47:43', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `student_courses`
--

CREATE TABLE `student_courses` (
  `srno` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campus`
--
ALTER TABLE `campus`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`srno`),
  ADD KEY `campus_id` (`campus_id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `program_id` (`program_id`),
  ADD KEY `semester_id` (`semester_id`);

--
-- Indexes for table `course_semester`
--
ALTER TABLE `course_semester`
  ADD PRIMARY KEY (`srno`),
  ADD KEY `FK` (`sem_id`,`course_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`srno`),
  ADD KEY `FK` (`campus_id`);

--
-- Indexes for table `dept_program`
--
ALTER TABLE `dept_program`
  ADD PRIMARY KEY (`srno`),
  ADD KEY `FK` (`dept_id`,`program_id`),
  ADD KEY `program_id` (`program_id`);

--
-- Indexes for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`srno`),
  ADD KEY `campus_id` (`campus_id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `program_id` (`program_id`),
  ADD KEY `semester_id` (`semester_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `faculty_department`
--
ALTER TABLE `faculty_department`
  ADD PRIMARY KEY (`srno`),
  ADD KEY `FK` (`faculty_id`,`department_id`);

--
-- Indexes for table `faculty_semester`
--
ALTER TABLE `faculty_semester`
  ADD PRIMARY KEY (`srno`),
  ADD KEY `FK` (`faculty_id`,`semester_id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`srno`),
  ADD KEY `FK` (`campus_id`,`department_id`,`program_id`,`semester_id`,`student_id`,`faculty_id`,`course_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `program_course`
--
ALTER TABLE `program_course`
  ADD PRIMARY KEY (`srno`),
  ADD KEY `FK` (`program_id`,`course_id`);

--
-- Indexes for table `program_semester`
--
ALTER TABLE `program_semester`
  ADD PRIMARY KEY (`srno`),
  ADD KEY `FK` (`program_id`,`semester_id`),
  ADD KEY `semester_id` (`semester_id`);

--
-- Indexes for table `rbac_menu_item`
--
ALTER TABLE `rbac_menu_item`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `rbac_permissions`
--
ALTER TABLE `rbac_permissions`
  ADD PRIMARY KEY (`perm_id`),
  ADD KEY `FK` (`role_id`,`menu_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `rbac_role`
--
ALTER TABLE `rbac_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `rbac_role_access_table`
--
ALTER TABLE `rbac_role_access_table`
  ADD PRIMARY KEY (`role_acc_id`),
  ADD KEY `FK` (`user_id`,`role_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `rbac_user`
--
ALTER TABLE `rbac_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`shift_id`);

--
-- Indexes for table `registration_numbers`
--
ALTER TABLE `registration_numbers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`srno`),
  ADD KEY `FK` (`campus_id`,`program_id`,`department_id`,`semester_id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `program_id` (`program_id`),
  ADD KEY `semester_id` (`semester_id`);

--
-- Indexes for table `student_courses`
--
ALTER TABLE `student_courses`
  ADD PRIMARY KEY (`srno`),
  ADD KEY `FK` (`student_id`,`course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campus`
--
ALTER TABLE `campus`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `dept_program`
--
ALTER TABLE `dept_program`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=617;

--
-- AUTO_INCREMENT for table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `faculty_department`
--
ALTER TABLE `faculty_department`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faculty_semester`
--
ALTER TABLE `faculty_semester`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `program_course`
--
ALTER TABLE `program_course`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program_semester`
--
ALTER TABLE `program_semester`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `registration_numbers`
--
ALTER TABLE `registration_numbers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student_courses`
--
ALTER TABLE `student_courses`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`campus_id`) REFERENCES `campus` (`srno`),
  ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `department` (`srno`),
  ADD CONSTRAINT `course_ibfk_3` FOREIGN KEY (`program_id`) REFERENCES `programs` (`srno`),
  ADD CONSTRAINT `course_ibfk_4` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`srno`);

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`campus_id`) REFERENCES `campus` (`srno`);

--
-- Constraints for table `dept_program`
--
ALTER TABLE `dept_program`
  ADD CONSTRAINT `dept_program_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`srno`),
  ADD CONSTRAINT `dept_program_ibfk_2` FOREIGN KEY (`program_id`) REFERENCES `programs` (`srno`);

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`campus_id`) REFERENCES `campus` (`srno`),
  ADD CONSTRAINT `faculty_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `department` (`srno`),
  ADD CONSTRAINT `faculty_ibfk_3` FOREIGN KEY (`program_id`) REFERENCES `programs` (`srno`),
  ADD CONSTRAINT `faculty_ibfk_4` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`srno`),
  ADD CONSTRAINT `faculty_ibfk_5` FOREIGN KEY (`course_id`) REFERENCES `course` (`srno`);

--
-- Constraints for table `program_semester`
--
ALTER TABLE `program_semester`
  ADD CONSTRAINT `program_semester_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `programs` (`srno`),
  ADD CONSTRAINT `program_semester_ibfk_2` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`srno`);

--
-- Constraints for table `rbac_permissions`
--
ALTER TABLE `rbac_permissions`
  ADD CONSTRAINT `rbac_permissions_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `rbac_role` (`role_id`),
  ADD CONSTRAINT `rbac_permissions_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `rbac_menu_item` (`menu_id`);

--
-- Constraints for table `rbac_role_access_table`
--
ALTER TABLE `rbac_role_access_table`
  ADD CONSTRAINT `rbac_role_access_table_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `rbac_user` (`id`),
  ADD CONSTRAINT `rbac_role_access_table_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `rbac_role` (`role_id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`campus_id`) REFERENCES `campus` (`srno`),
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `department` (`srno`),
  ADD CONSTRAINT `students_ibfk_3` FOREIGN KEY (`program_id`) REFERENCES `programs` (`srno`),
  ADD CONSTRAINT `students_ibfk_4` FOREIGN KEY (`semester_id`) REFERENCES `semester` (`srno`),
  ADD CONSTRAINT `students_ibfk_5` FOREIGN KEY (`campus_id`) REFERENCES `campus` (`srno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
