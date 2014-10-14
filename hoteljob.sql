-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 14, 2014 at 10:12 AM
-- Server version: 5.5.34
-- PHP Version: 5.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hoteljob`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company_scope`
--

CREATE TABLE IF NOT EXISTS `tbl_company_scope` (
  `id` int(11) NOT NULL,
  `from` int(11) DEFAULT NULL,
  `to` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Qui mo cong ty duoc dinh nghia truoc';

-- --------------------------------------------------------

--
-- Table structure for table `tbl_currency`
--

CREATE TABLE IF NOT EXISTS `tbl_currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_curriculum_private`
--

CREATE TABLE IF NOT EXISTS `tbl_curriculum_private` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field` varchar(45) DEFAULT NULL COMMENT 'Field tuong ung trong db duoc hien thi',
  `alias` varchar(100) DEFAULT NULL,
  `published` int(11) DEFAULT NULL COMMENT '0-> Un-published, 1->Published',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Danh sach rieng tu không hien thi ' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_curriculum_vitae`
--

CREATE TABLE IF NOT EXISTS `tbl_curriculum_vitae` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `title` varchar(100) DEFAULT NULL COMMENT 'Tieu de ho so',
  PRIMARY KEY (`id`),
  KEY `fk_tbl_curriculum_vitae_tbl_members1_idx` (`members_id`),
  KEY `fk_tbl_curriculum_vitae_tbl_currency1_idx` (`currency_id`),
  KEY `fk_tbl_curriculum_vitae_tbl_job_major1_idx` (`job_major_id`),
  KEY `fk_tbl_curriculum_vitae_tbl_job_type1_idx` (`job_type_id`),
  KEY `fk_tbl_curriculum_vitae_tbl_job_level1_idx` (`job_level_id`),
  KEY `fk_tbl_curriculum_vitae_tbl_company_scope1_idx` (`company_scope_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faqs_answer`
--

CREATE TABLE IF NOT EXISTS `tbl_faqs_answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `answer` varchar(500) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '0' COMMENT '0: Pending, 1: Actived, 2: De-actived, 3: Deleted',
  `faqs_question_id` int(11) DEFAULT NULL,
  `members_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_faqs_answer_tbl_faqs_question1_idx` (`faqs_question_id`),
  KEY `fk_tbl_faqs_answer_tbl_members1_idx` (`members_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faqs_category`
--

CREATE TABLE IF NOT EXISTS `tbl_faqs_category` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `title_en` varchar(100) DEFAULT NULL,
  `parend_id` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0' COMMENT '0: Unpublished, 1: Published',
  `brief` varchar(255) DEFAULT NULL,
  `brief_en` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faqs_question`
--

CREATE TABLE IF NOT EXISTS `tbl_faqs_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(100) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `viewed` int(11) DEFAULT NULL,
  `brief` varchar(225) DEFAULT NULL,
  `faqs_category_id` int(11) DEFAULT NULL,
  `members_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0: Pending, 1: Approved, 2: Denied, 3: Deleted',
  `jobs_id` int(11) NOT NULL COMMENT 'Cau hoi ve cv cu the khi xem chi tiet (Khong list ra trong "Danh sach hỏi đáp ngoài trang chủ")',
  PRIMARY KEY (`id`),
  KEY `fk_tbl_faqs_question_tbl_faqs_category1_idx` (`faqs_category_id`),
  KEY `fk_tbl_faqs_question_tbl_members1_idx` (`members_id`),
  KEY `fk_tbl_faqs_question_tbl_jobs1_idx` (`jobs_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobs`
--

CREATE TABLE IF NOT EXISTS `tbl_jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_tbl_jobs_tbl_job_level1_idx` (`job_level_id`),
  KEY `fk_tbl_jobs_tbl_job_time1_idx` (`job_time_id`),
  KEY `fk_tbl_jobs_tbl_job_major1_idx` (`job_major_id`),
  KEY `fk_tbl_jobs_tbl_locations1_idx` (`language`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobs_apply`
--

CREATE TABLE IF NOT EXISTS `tbl_jobs_apply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `members_id` int(11) NOT NULL,
  `jobs_id` int(11) NOT NULL,
  `applied_time` datetime DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `candidate_name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `brief` varchar(500) DEFAULT NULL,
  `fitness` int(11) DEFAULT NULL COMMENT 'Năng lực bản thân',
  PRIMARY KEY (`id`),
  KEY `fk_tbl_jobs_apply_tbl_members1_idx` (`members_id`),
  KEY `fk_tbl_jobs_apply_tbl_jobs1_idx` (`jobs_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobs_comment`
--

CREATE TABLE IF NOT EXISTS `tbl_jobs_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `members_id` int(11) NOT NULL,
  `jobs_id` int(11) NOT NULL,
  `vote` int(11) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_tbl_jobs_comment_tbl_members1_idx` (`members_id`),
  KEY `fk_tbl_jobs_comment_tbl_jobs1_idx` (`jobs_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobs_location`
--

CREATE TABLE IF NOT EXISTS `tbl_jobs_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jobs_id` int(11) NOT NULL,
  `locations_id` int(11) NOT NULL COMMENT 'Quan, huyen, tinh thanh cho cv dang tuyen',
  PRIMARY KEY (`id`),
  KEY `fk_tbl_jobs_location_tbl_jobs1_idx` (`jobs_id`),
  KEY `fk_tbl_jobs_location_tbl_locations1_idx` (`locations_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Danh sach cac tinh thanh tuong ung voi cv dang tuyen (1 cv cho phep chon nhieu tinh thanh)' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_level`
--

CREATE TABLE IF NOT EXISTS `tbl_job_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_major`
--

CREATE TABLE IF NOT EXISTS `tbl_job_major` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `title_en` varchar(100) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL COMMENT 'Parent id',
  `pos` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0->Ẩn, 1->Hiển thị',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Lĩnh vực công việc chính' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_salary`
--

CREATE TABLE IF NOT EXISTS `tbl_job_salary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` int(11) DEFAULT NULL,
  `to` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_time`
--

CREATE TABLE IF NOT EXISTS `tbl_job_time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `title_en` varchar(45) DEFAULT NULL,
  `pos` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_type`
--

CREATE TABLE IF NOT EXISTS `tbl_job_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `pos` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Loại hình cv' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_know_me`
--

CREATE TABLE IF NOT EXISTS `tbl_know_me` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) DEFAULT NULL,
  `title_en` varchar(225) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_locations`
--

CREATE TABLE IF NOT EXISTS `tbl_locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `code` varchar(45) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_members`
--

CREATE TABLE IF NOT EXISTS `tbl_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(45) DEFAULT NULL,
  `pwd` varchar(45) DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `birth` datetime DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `email` char(15) DEFAULT NULL,
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
  `know_me_id` int(11) NOT NULL COMMENT 'Biet hotel-job qua dau?',
  `married` int(11) DEFAULT NULL COMMENT '0->Single, 1-> Married',
  `avatar` varchar(225) DEFAULT NULL,
  `nationality` int(11) NOT NULL COMMENT 'Quốc gia',
  PRIMARY KEY (`id`),
  KEY `fk_tbl_members_tbl_members_group1_idx` (`members_group_id`),
  KEY `fk_tbl_members_tbl_security_ques1_idx` (`security_ques_id`),
  KEY `fk_tbl_members_tbl_locations1_idx` (`province_id`),
  KEY `fk_tbl_members_tbl_locations2_idx` (`district_id`),
  KEY `fk_tbl_members_tbl_know_me1_idx` (`know_me_id`),
  KEY `fk_tbl_members_tbl_locations3_idx` (`nationality`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_members_group`
--

CREATE TABLE IF NOT EXISTS `tbl_members_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL COMMENT 'Name tieng viet',
  `alias` varchar(45) DEFAULT NULL,
  `en_name` varchar(45) DEFAULT NULL COMMENT 'Name tieng anh',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_members_log`
--

CREATE TABLE IF NOT EXISTS `tbl_members_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action_name` varchar(100) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `member_name` varchar(45) DEFAULT NULL,
  `members_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_members_log_tbl_members1_idx` (`members_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE IF NOT EXISTS `tbl_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `brief` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `organize_id` int(11) DEFAULT NULL COMMENT 'ID nhà tuyển dụng',
  `content` text,
  `status` int(11) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `public_time` datetime DEFAULT NULL,
  `unpublic_time` datetime DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `counter` int(11) DEFAULT NULL,
  `file` varchar(100) DEFAULT NULL COMMENT 'Link file tài liệu nếu có',
  `title_en` varchar(100) DEFAULT NULL,
  `brief_en` varchar(225) DEFAULT NULL,
  `content_en` text,
  `tag_en` varchar(225) DEFAULT NULL,
  `tag_non_sign` varchar(225) DEFAULT NULL,
  `news_category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_news_tbl_news_category1_idx` (`news_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news_category`
--

CREATE TABLE IF NOT EXISTS `tbl_news_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `name_en` varchar(45) DEFAULT NULL,
  `parent_id` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT '1' COMMENT '1: Publich',
  `type` int(11) DEFAULT '0' COMMENT '0: Danh mục hệ thống, 1: Danh mục của nhà tuyển dụng (organize, recuriter)',
  `members_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_news_category_tbl_members1_idx` (`members_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_organize_data`
--

CREATE TABLE IF NOT EXISTS `tbl_organize_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `members_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_organize_data_tbl_company_scope1_idx` (`company_scope_id`),
  KEY `fk_tbl_organize_data_tbl_members1_idx` (`members_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_organize_library`
--

CREATE TABLE IF NOT EXISTS `tbl_organize_library` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img_link` varchar(255) DEFAULT NULL,
  `members_id` int(11) NOT NULL,
  `created_time` datetime DEFAULT NULL,
  `pos` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_organize_library_tbl_members1_idx` (`members_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_privilege`
--

CREATE TABLE IF NOT EXISTS `tbl_privilege` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `code` varchar(45) DEFAULT NULL,
  `members_group_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_privilege_tbl_members_group_idx` (`members_group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_security_ques`
--

CREATE TABLE IF NOT EXISTS `tbl_security_ques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ques` char(225) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
