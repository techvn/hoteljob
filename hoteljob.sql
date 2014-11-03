-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2014 at 10:52 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hoteljob`
--
CREATE DATABASE IF NOT EXISTS `hoteljob` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hoteljob`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company_scope`
--

DROP TABLE IF EXISTS `tbl_company_scope`;
CREATE TABLE IF NOT EXISTS `tbl_company_scope` (
`id` int(11) NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Qui mo cong ty duoc dinh nghia truoc' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_currency`
--

DROP TABLE IF EXISTS `tbl_currency`;
CREATE TABLE IF NOT EXISTS `tbl_currency` (
`id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `symbol` char(5) NOT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_currency`
--

INSERT INTO `tbl_currency` (`id`, `title`, `symbol`, `status`) VALUES
(1, 'Dollar US', '$', 1),
(2, 'Việt Nam Đồng', 'Vnđ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_curriculum_private`
--

DROP TABLE IF EXISTS `tbl_curriculum_private`;
CREATE TABLE IF NOT EXISTS `tbl_curriculum_private` (
`id` int(11) NOT NULL,
  `field` varchar(45) NOT NULL COMMENT 'Field tuong ung trong db duoc hien thi',
  `alias` varchar(100) DEFAULT NULL,
  `alias_en` char(100) DEFAULT NULL,
  `published` int(11) DEFAULT NULL COMMENT '0-> Un-published, 1->Published'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Danh sach rieng tu không hien thi ' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_curriculum_vitae`
--

DROP TABLE IF EXISTS `tbl_curriculum_vitae`;
CREATE TABLE IF NOT EXISTS `tbl_curriculum_vitae` (
`id` int(11) NOT NULL,
  `members_id` int(11) NOT NULL,
  `cv_file` varchar(225) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `experience_year` int(11) DEFAULT NULL COMMENT 'Tổng số năm kinh nghiệm tới nay',
  `private_data` varchar(255) DEFAULT NULL COMMENT 'Danh sach cac field an khi member chon chuc nang private',
  `salary_desired_from` double DEFAULT NULL COMMENT 'Luong mong muon, neu trong khoang thi duo phan cach bang dau -',
  `salary_desired_to` double DEFAULT NULL,
  `currency_id` int(11) NOT NULL,
  `work_from_away` int(11) DEFAULT '0' COMMENT 'Tuy chọn co di lam xa hay khong',
  `job_major_id` int(11) NOT NULL,
  `job_type_id` int(11) NOT NULL,
  `job_level_id` int(11) NOT NULL,
  `company_scope_id` int(11) NOT NULL,
  `published` int(11) DEFAULT '1' COMMENT 'Trạng thái tùy chọn cho phép ẩn hay hiện khi search hồ sơ',
  `title` varchar(100) DEFAULT NULL COMMENT 'Tieu de ho so'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faqs_answer`
--

DROP TABLE IF EXISTS `tbl_faqs_answer`;
CREATE TABLE IF NOT EXISTS `tbl_faqs_answer` (
`id` int(11) NOT NULL,
  `answer` varchar(500) DEFAULT NULL,
  `faqs_question_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '0' COMMENT '0: Pending, 1: Actived, 2: De-actived, 3: Deleted'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faqs_category`
--

DROP TABLE IF EXISTS `tbl_faqs_category`;
CREATE TABLE IF NOT EXISTS `tbl_faqs_category` (
`id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `title_en` varchar(100) DEFAULT NULL,
  `parent_id` int(11) DEFAULT '0',
  `pos` int(11) NOT NULL,
  `brief` varchar(255) DEFAULT NULL,
  `brief_en` varchar(225) DEFAULT NULL,
  `status` int(11) DEFAULT '0' COMMENT '0: Unpublished, 1: Published'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faqs_question`
--

DROP TABLE IF EXISTS `tbl_faqs_question`;
CREATE TABLE IF NOT EXISTS `tbl_faqs_question` (
`id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `question` varchar(100) DEFAULT NULL,
  `faqs_category_id` int(11) DEFAULT NULL,
  `brief` varchar(225) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `job_id` int(11) NOT NULL COMMENT 'Cau hoi ve cv cu the khi xem chi tiet (Khong list ra trong "Danh sach hỏi đáp ngoài trang chủ")',
  `viewed` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0: Pending, 1: Approved, 2: Denied, 3: Deleted'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobs`
--

DROP TABLE IF EXISTS `tbl_jobs`;
CREATE TABLE IF NOT EXISTS `tbl_jobs` (
`id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `tile_en` varchar(45) DEFAULT NULL,
  `code` varchar(45) DEFAULT NULL,
  `job_level_id` int(11) NOT NULL,
  `salary_from` double DEFAULT NULL,
  `salary_to` double DEFAULT NULL,
  `job_time_id` int(11) NOT NULL,
  `require` int(11) DEFAULT NULL COMMENT 'So luong tuyen',
  `job_major_id` int(11) NOT NULL,
  `created_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL COMMENT 'Thoi gian het han dang tuyen',
  `published` int(11) DEFAULT '1' COMMENT 'An, hien cong viec khi ung vien tim kiem phu hop cv',
  `description` text,
  `description_en` text,
  `language` int(11) NOT NULL,
  `tags` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobs_apply`
--

DROP TABLE IF EXISTS `tbl_jobs_apply`;
CREATE TABLE IF NOT EXISTS `tbl_jobs_apply` (
`id` int(11) NOT NULL,
  `members_id` int(11) NOT NULL,
  `jobs_id` int(11) NOT NULL,
  `applied_time` datetime DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `candidate_name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `brief` varchar(500) DEFAULT NULL,
  `fitness` int(11) DEFAULT NULL COMMENT 'Năng lực bản thân'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobs_comment`
--

DROP TABLE IF EXISTS `tbl_jobs_comment`;
CREATE TABLE IF NOT EXISTS `tbl_jobs_comment` (
`id` int(11) NOT NULL,
  `members_id` int(11) NOT NULL,
  `jobs_id` int(11) NOT NULL,
  `vote` int(11) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobs_location`
--

DROP TABLE IF EXISTS `tbl_jobs_location`;
CREATE TABLE IF NOT EXISTS `tbl_jobs_location` (
`id` int(11) NOT NULL,
  `jobs_id` int(11) NOT NULL,
  `locations_id` int(11) NOT NULL COMMENT 'Quan, huyen, tinh thanh cho cv dang tuyen'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Danh sach cac tinh thanh tuong ung voi cv dang tuyen (1 cv cho phep chon nhieu tinh thanh)' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_level`
--

DROP TABLE IF EXISTS `tbl_job_level`;
CREATE TABLE IF NOT EXISTS `tbl_job_level` (
`id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_major`
--

DROP TABLE IF EXISTS `tbl_job_major`;
CREATE TABLE IF NOT EXISTS `tbl_job_major` (
`id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `title_en` varchar(100) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL COMMENT 'Parent id',
  `pos` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0->Ẩn, 1->Hiển thị'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Lĩnh vực công việc chính' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_job_major`
--

INSERT INTO `tbl_job_major` (`id`, `title`, `title_en`, `pid`, `pos`, `status`) VALUES
(1, 'test', 'test', NULL, 1, 1),
(2, 'child test', '', 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_salary`
--

DROP TABLE IF EXISTS `tbl_job_salary`;
CREATE TABLE IF NOT EXISTS `tbl_job_salary` (
`id` int(11) NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) DEFAULT NULL,
  `type` int(11) NOT NULL COMMENT 'ID tiền tệ',
  `status` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Template salary' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_job_salary`
--

INSERT INTO `tbl_job_salary` (`id`, `from`, `to`, `type`, `status`) VALUES
(1, 500, 800, 1, 1),
(2, 800, 1200, 1, 1),
(3, 8000000, 12000000, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_time`
--

DROP TABLE IF EXISTS `tbl_job_time`;
CREATE TABLE IF NOT EXISTS `tbl_job_time` (
`id` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `title_en` varchar(45) DEFAULT NULL,
  `pos` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Template time for job' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_type`
--

DROP TABLE IF EXISTS `tbl_job_type`;
CREATE TABLE IF NOT EXISTS `tbl_job_type` (
`id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `pos` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Loại hình cv' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_know_me`
--

DROP TABLE IF EXISTS `tbl_know_me`;
CREATE TABLE IF NOT EXISTS `tbl_know_me` (
`id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `title_en` varchar(225) DEFAULT NULL,
  `pos` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Template answer for question: How do you know me?' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_know_me`
--

INSERT INTO `tbl_know_me` (`id`, `title`, `title_en`, `pos`, `status`) VALUES
(1, 'Qua internet', 'By internet', 0, 1),
(2, 'Qua bạn bè', 'Know by friends introduction', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_locations`
--

DROP TABLE IF EXISTS `tbl_locations`;
CREATE TABLE IF NOT EXISTS `tbl_locations` (
`id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `pos` int(11) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_locations`
--

INSERT INTO `tbl_locations` (`id`, `name`, `code`, `parent_id`, `pos`) VALUES
(1, 'Viet Nam', 'VI', 0, 0),
(2, 'Hà Nội', 'HN', 1, 0),
(3, 'Bắc Giang', 'BG', 1, 0),
(4, 'TP. Hồ Chí Minh', 'HCM', 1, 0),
(5, 'Việt Yên', 'VY', 3, 0),
(6, 'Tân Yên', 'TY', 3, 0),
(7, 'United Kingdom', 'UK', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_members`
--

DROP TABLE IF EXISTS `tbl_members`;
CREATE TABLE IF NOT EXISTS `tbl_members` (
`id` int(11) NOT NULL,
  `uname` varchar(45) NOT NULL,
  `pwd` varchar(45) NOT NULL,
  `gender` int(11) DEFAULT NULL,
  `birth` datetime DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `email` char(30) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `updated_time` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `gullname` varchar(45) DEFAULT NULL,
  `members_group_id` int(11) DEFAULT NULL,
  `security_ques_id` int(11) DEFAULT NULL,
  `security_ans` char(100) DEFAULT NULL COMMENT 'Tra loi cau hoi bi mat',
  `recieve_mail` int(11) DEFAULT '0' COMMENT 'Accept nhan mail tu hoteljob.vn: 0-> Ko nhan, 1->Co nhan',
  `province_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `know_me_id` int(11) DEFAULT NULL COMMENT 'Biet hotel-job qua dau?',
  `married` int(11) DEFAULT NULL COMMENT '0->Single, 1-> Married',
  `avatar` varchar(225) DEFAULT NULL,
  `nationality` int(11) DEFAULT NULL COMMENT 'Quốc gia'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_members`
--

INSERT INTO `tbl_members` (`id`, `uname`, `pwd`, `gender`, `birth`, `address`, `phone`, `mobile`, `email`, `created_time`, `updated_time`, `status`, `gullname`, `members_group_id`, `security_ques_id`, `security_ans`, `recieve_mail`, `province_id`, `district_id`, `know_me_id`, `married`, `avatar`, `nationality`) VALUES
(1, 'binhnt', 'e99a18c428cb38d5f260853678922e03', 1, '1986-09-30 00:00:00', 'Minh Duc, Viet Yen', '0976529830', '0976529830', 'ntbinh30986@gmail.com', '2014-10-28 00:00:00', NULL, 1, 'Nguyễn Thanh Bình', 0, 0, '', 1, 3, 5, 0, 1, '4524726.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_members_group`
--

DROP TABLE IF EXISTS `tbl_members_group`;
CREATE TABLE IF NOT EXISTS `tbl_members_group` (
`id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL COMMENT 'Name tieng viet',
  `alias` varchar(45) DEFAULT NULL,
  `en_name` varchar(45) DEFAULT NULL COMMENT 'Name tieng anh'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_members_group`
--

INSERT INTO `tbl_members_group` (`id`, `name`, `alias`, `en_name`) VALUES
(1, 'Administrator', NULL, 'Administrator'),
(2, 'Quản trị nội dung', '', 'System Manager'),
(3, 'Quản trị đăng tin việc làm', '', 'Content System'),
(5, 'Quản lý thành viên', '', 'Member Manager');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_members_log`
--

DROP TABLE IF EXISTS `tbl_members_log`;
CREATE TABLE IF NOT EXISTS `tbl_members_log` (
`id` int(11) NOT NULL,
  `action_name` varchar(100) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `member_name` varchar(45) DEFAULT NULL,
  `members_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

DROP TABLE IF EXISTS `tbl_news`;
CREATE TABLE IF NOT EXISTS `tbl_news` (
`id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `brief` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `organize_id` int(11) DEFAULT NULL COMMENT 'ID nhà tuyển dụng',
  `content` text,
  `status` int(11) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `public_time` datetime DEFAULT NULL,
  `unpublic_time` datetime DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `viewed` int(11) DEFAULT NULL COMMENT 'Số lượng viewed',
  `file` varchar(100) DEFAULT NULL COMMENT 'Link file tài liệu nếu có',
  `title_en` varchar(100) DEFAULT NULL COMMENT 'Tiêu đề tiếng anh',
  `brief_en` varchar(225) DEFAULT NULL COMMENT 'Miêu tả bằng tiếng anh',
  `content_en` text,
  `tag_en` varchar(225) DEFAULT NULL COMMENT 'Từ khóa tiếng anh',
  `news_category_id` int(11) NOT NULL COMMENT 'ID danh mục tin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='News of system or organization' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news_category`
--

DROP TABLE IF EXISTS `tbl_news_category`;
CREATE TABLE IF NOT EXISTS `tbl_news_category` (
`id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `name_en` varchar(45) DEFAULT NULL,
  `parent_id` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT '1' COMMENT '1: Publich',
  `type` int(11) DEFAULT '0' COMMENT '0: Danh mục hệ thống, 1: Danh mục của nhà tuyển dụng (organize, recuriter)',
  `members_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_news_category`
--

INSERT INTO `tbl_news_category` (`id`, `name`, `name_en`, `parent_id`, `status`, `type`, `members_id`) VALUES
(1, 'Tin tức công ty', 'Company news', NULL, 1, 1, 1),
(2, 'Chia sẻ nhân ái', '', '1', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_organize_data`
--

DROP TABLE IF EXISTS `tbl_organize_data`;
CREATE TABLE IF NOT EXISTS `tbl_organize_data` (
`id` int(11) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `brand` varchar(45) DEFAULT NULL COMMENT 'Thuong hieu',
  `name` varchar(100) DEFAULT NULL,
  `name_en` varchar(100) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `fax` varchar(15) DEFAULT NULL,
  `tax` varchar(25) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `company_scope_id` int(11) NOT NULL,
  `members_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='More infomation of member if they are organization' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_organize_library`
--

DROP TABLE IF EXISTS `tbl_organize_library`;
CREATE TABLE IF NOT EXISTS `tbl_organize_library` (
`id` int(11) NOT NULL,
  `img_link` varchar(255) DEFAULT NULL,
  `members_id` int(11) NOT NULL,
  `created_time` datetime DEFAULT NULL,
  `pos` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Link meta data of organization' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_privilege`
--

DROP TABLE IF EXISTS `tbl_privilege`;
CREATE TABLE IF NOT EXISTS `tbl_privilege` (
`id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `code` varchar(45) DEFAULT NULL,
  `members_group_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_security_ques`
--

DROP TABLE IF EXISTS `tbl_security_ques`;
CREATE TABLE IF NOT EXISTS `tbl_security_ques` (
`id` int(11) NOT NULL,
  `ques` char(225) NOT NULL,
  `ques_en` char(255) DEFAULT NULL,
  `pos` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Template for security question' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_security_ques`
--

INSERT INTO `tbl_security_ques` (`id`, `ques`, `ques_en`, `pos`, `status`) VALUES
(1, 'Cô giáo đầu tiên của bạn là ai?', '', 0, 1),
(2, 'Trường THCS của bạn ở đâu?', '', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_company_scope`
--
ALTER TABLE `tbl_company_scope`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `tbl_currency`
--
ALTER TABLE `tbl_currency`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_curriculum_private`
--
ALTER TABLE `tbl_curriculum_private`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_curriculum_vitae`
--
ALTER TABLE `tbl_curriculum_vitae`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_tbl_curriculum_vitae_tbl_members1_idx` (`members_id`), ADD KEY `fk_tbl_curriculum_vitae_tbl_currency1_idx` (`currency_id`), ADD KEY `fk_tbl_curriculum_vitae_tbl_job_major1_idx` (`job_major_id`), ADD KEY `fk_tbl_curriculum_vitae_tbl_job_type1_idx` (`job_type_id`), ADD KEY `fk_tbl_curriculum_vitae_tbl_job_level1_idx` (`job_level_id`), ADD KEY `fk_tbl_curriculum_vitae_tbl_company_scope1_idx` (`company_scope_id`);

--
-- Indexes for table `tbl_faqs_answer`
--
ALTER TABLE `tbl_faqs_answer`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_tbl_faqs_answer_tbl_faqs_question1_idx` (`faqs_question_id`), ADD KEY `fk_tbl_faqs_answer_tbl_members1_idx` (`member_id`);

--
-- Indexes for table `tbl_faqs_category`
--
ALTER TABLE `tbl_faqs_category`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `tbl_faqs_question`
--
ALTER TABLE `tbl_faqs_question`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_tbl_faqs_question_tbl_faqs_category1_idx` (`faqs_category_id`), ADD KEY `fk_tbl_faqs_question_tbl_jobs1_idx` (`job_id`);

--
-- Indexes for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_tbl_jobs_tbl_job_level1_idx` (`job_level_id`), ADD KEY `fk_tbl_jobs_tbl_job_time1_idx` (`job_time_id`), ADD KEY `fk_tbl_jobs_tbl_job_major1_idx` (`job_major_id`), ADD KEY `fk_tbl_jobs_tbl_locations1_idx` (`language`);

--
-- Indexes for table `tbl_jobs_apply`
--
ALTER TABLE `tbl_jobs_apply`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_tbl_jobs_apply_tbl_members1_idx` (`members_id`), ADD KEY `fk_tbl_jobs_apply_tbl_jobs1_idx` (`jobs_id`);

--
-- Indexes for table `tbl_jobs_comment`
--
ALTER TABLE `tbl_jobs_comment`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_tbl_jobs_comment_tbl_members1_idx` (`members_id`), ADD KEY `fk_tbl_jobs_comment_tbl_jobs1_idx` (`jobs_id`);

--
-- Indexes for table `tbl_jobs_location`
--
ALTER TABLE `tbl_jobs_location`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_tbl_jobs_location_tbl_jobs1_idx` (`jobs_id`), ADD KEY `fk_tbl_jobs_location_tbl_locations1_idx` (`locations_id`);

--
-- Indexes for table `tbl_job_level`
--
ALTER TABLE `tbl_job_level`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_job_major`
--
ALTER TABLE `tbl_job_major`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_job_salary`
--
ALTER TABLE `tbl_job_salary`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_job_time`
--
ALTER TABLE `tbl_job_time`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_job_type`
--
ALTER TABLE `tbl_job_type`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_know_me`
--
ALTER TABLE `tbl_know_me`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_locations`
--
ALTER TABLE `tbl_locations`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_members`
--
ALTER TABLE `tbl_members`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_tbl_members_tbl_members_group1_idx` (`members_group_id`), ADD KEY `fk_tbl_members_tbl_security_ques1_idx` (`security_ques_id`), ADD KEY `fk_tbl_members_tbl_locations1_idx` (`province_id`), ADD KEY `fk_tbl_members_tbl_locations2_idx` (`district_id`), ADD KEY `fk_tbl_members_tbl_know_me1_idx` (`know_me_id`), ADD KEY `fk_tbl_members_tbl_locations3_idx` (`nationality`);

--
-- Indexes for table `tbl_members_group`
--
ALTER TABLE `tbl_members_group`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_members_log`
--
ALTER TABLE `tbl_members_log`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_tbl_members_log_tbl_members1_idx` (`members_id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_tbl_news_tbl_news_category1_idx` (`news_category_id`);

--
-- Indexes for table `tbl_news_category`
--
ALTER TABLE `tbl_news_category`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_tbl_news_category_tbl_members1_idx` (`members_id`);

--
-- Indexes for table `tbl_organize_data`
--
ALTER TABLE `tbl_organize_data`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_tbl_organize_data_tbl_company_scope1_idx` (`company_scope_id`), ADD KEY `fk_tbl_organize_data_tbl_members1_idx` (`members_id`);

--
-- Indexes for table `tbl_organize_library`
--
ALTER TABLE `tbl_organize_library`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_tbl_organize_library_tbl_members1_idx` (`members_id`);

--
-- Indexes for table `tbl_privilege`
--
ALTER TABLE `tbl_privilege`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_tbl_privilege_tbl_members_group_idx` (`members_group_id`);

--
-- Indexes for table `tbl_security_ques`
--
ALTER TABLE `tbl_security_ques`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_company_scope`
--
ALTER TABLE `tbl_company_scope`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_currency`
--
ALTER TABLE `tbl_currency`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_curriculum_private`
--
ALTER TABLE `tbl_curriculum_private`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_curriculum_vitae`
--
ALTER TABLE `tbl_curriculum_vitae`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_faqs_answer`
--
ALTER TABLE `tbl_faqs_answer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_faqs_category`
--
ALTER TABLE `tbl_faqs_category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_faqs_question`
--
ALTER TABLE `tbl_faqs_question`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_jobs_apply`
--
ALTER TABLE `tbl_jobs_apply`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_jobs_comment`
--
ALTER TABLE `tbl_jobs_comment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_jobs_location`
--
ALTER TABLE `tbl_jobs_location`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_job_level`
--
ALTER TABLE `tbl_job_level`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_job_major`
--
ALTER TABLE `tbl_job_major`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_job_salary`
--
ALTER TABLE `tbl_job_salary`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_job_time`
--
ALTER TABLE `tbl_job_time`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_job_type`
--
ALTER TABLE `tbl_job_type`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_know_me`
--
ALTER TABLE `tbl_know_me`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_locations`
--
ALTER TABLE `tbl_locations`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_members`
--
ALTER TABLE `tbl_members`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_members_group`
--
ALTER TABLE `tbl_members_group`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_members_log`
--
ALTER TABLE `tbl_members_log`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_news_category`
--
ALTER TABLE `tbl_news_category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_organize_data`
--
ALTER TABLE `tbl_organize_data`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_organize_library`
--
ALTER TABLE `tbl_organize_library`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_privilege`
--
ALTER TABLE `tbl_privilege`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_security_ques`
--
ALTER TABLE `tbl_security_ques`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
