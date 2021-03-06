-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2014 at 09:06 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hoteljob`
--
CREATE DATABASE IF NOT EXISTS `hoteljob` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `hoteljob`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_academic`
--

DROP TABLE IF EXISTS `tbl_academic`;
CREATE TABLE IF NOT EXISTS `tbl_academic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` char(255) NOT NULL,
  `title_en` char(255) DEFAULT NULL,
  `pos` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Quản lý danh sách bằng cấp mẫu' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

DROP TABLE IF EXISTS `tbl_banner`;
CREATE TABLE IF NOT EXISTS `tbl_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` char(255) NOT NULL,
  `title_en` char(255) NOT NULL,
  `type` enum('CANDIDATE','STORE','STORE_DETAIL','') NOT NULL,
  `like` char(255) NOT NULL,
  `banner` char(255) NOT NULL,
  `member_id` int(11) NOT NULL,
  `pos` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company_scope`
--

DROP TABLE IF EXISTS `tbl_company_scope`;
CREATE TABLE IF NOT EXISTS `tbl_company_scope` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` char(100) NOT NULL,
  `to` char(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Qui mo cong ty duoc dinh nghia truoc' AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_company_scope`
--

INSERT INTO `tbl_company_scope` (`id`, `from`, `to`) VALUES
(1, '< 10', ''),
(2, '10', '40'),
(3, '40', '100'),
(4, '100', '500'),
(5, '500', '1000'),
(6, '< 1000', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_currency`
--

DROP TABLE IF EXISTS `tbl_currency`;
CREATE TABLE IF NOT EXISTS `tbl_currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `language_code` char(20) DEFAULT NULL COMMENT 'Sử dụng xác định hiển thị loại tiền tệ chuẩn theo hệ thống PHP',
  `symbol` char(5) NOT NULL,
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_currency`
--

INSERT INTO `tbl_currency` (`id`, `title`, `language_code`, `symbol`, `status`) VALUES
(1, 'Dollar US', 'en_US', '$', 1),
(2, 'Việt Nam Đồng', 'vi_VN', 'Vnđ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_curriculumvitae_degree`
--

DROP TABLE IF EXISTS `tbl_curriculumvitae_degree`;
CREATE TABLE IF NOT EXISTS `tbl_curriculumvitae_degree` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `curriculum_id` int(11) NOT NULL,
  `diploma` int(11) NOT NULL,
  `school_name` int(11) NOT NULL,
  `major` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `province` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Danh sách trường đã học' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_curriculumvitae_experience_working`
--

DROP TABLE IF EXISTS `tbl_curriculumvitae_experience_working`;
CREATE TABLE IF NOT EXISTS `tbl_curriculumvitae_experience_working` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `curriculum_id` int(11) NOT NULL COMMENT 'ID cv cá nhân',
  `position` int(11) NOT NULL COMMENT 'Vị trí',
  `competence` char(255) NOT NULL COMMENT 'Chức danh',
  `occupation` int(11) NOT NULL COMMENT 'Ngành nghề',
  `company_name` char(255) NOT NULL COMMENT 'Tên công ty',
  `country` int(11) NOT NULL,
  `province` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `des` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Kinh nghiem  lam viec' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_curriculumvitae_job_wish`
--

DROP TABLE IF EXISTS `tbl_curriculumvitae_job_wish`;
CREATE TABLE IF NOT EXISTS `tbl_curriculumvitae_job_wish` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `curriculum_id` int(11) NOT NULL,
  `job_major` int(11) NOT NULL,
  `job_level` int(11) NOT NULL,
  `job_type` int(11) NOT NULL,
  `job_salary` int(11) NOT NULL,
  `work_far` tinyint(4) NOT NULL COMMENT 'Đi làm xa',
  `company_scope` int(11) NOT NULL,
  `location` int(11) NOT NULL COMMENT 'Nơi làm việc mong muốn',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_curriculumvitae_other_skill`
--

DROP TABLE IF EXISTS `tbl_curriculumvitae_other_skill`;
CREATE TABLE IF NOT EXISTS `tbl_curriculumvitae_other_skill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `curriculum_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_curriculumvitae_skill_language`
--

DROP TABLE IF EXISTS `tbl_curriculumvitae_skill_language`;
CREATE TABLE IF NOT EXISTS `tbl_curriculumvitae_skill_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `curriculum_id` int(11) DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_curriculum_private`
--

DROP TABLE IF EXISTS `tbl_curriculum_private`;
CREATE TABLE IF NOT EXISTS `tbl_curriculum_private` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field` varchar(45) NOT NULL COMMENT 'Field tuong ung trong db duoc hien thi',
  `alias` varchar(100) DEFAULT NULL,
  `alias_en` char(100) DEFAULT NULL,
  `published` int(11) DEFAULT NULL COMMENT '0-> Un-published, 1->Published',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Danh sach rieng tu không hien thi ' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_curriculum_private`
--

INSERT INTO `tbl_curriculum_private` (`id`, `field`, `alias`, `alias_en`, `published`) VALUES
(1, 'email', 'Địa chỉ hòm thư', '', 1),
(2, 'married', 'Tình trạng hôn nhân', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_curriculum_vitae`
--

DROP TABLE IF EXISTS `tbl_curriculum_vitae`;
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

DROP TABLE IF EXISTS `tbl_faqs_answer`;
CREATE TABLE IF NOT EXISTS `tbl_faqs_answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `answer` varchar(500) DEFAULT NULL,
  `faqs_question_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '0' COMMENT '0: Pending, 1: Actived, 2: De-actived, 3: Deleted',
  PRIMARY KEY (`id`),
  KEY `fk_tbl_faqs_answer_tbl_faqs_question1_idx` (`faqs_question_id`),
  KEY `fk_tbl_faqs_answer_tbl_members1_idx` (`member_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faqs_category`
--

DROP TABLE IF EXISTS `tbl_faqs_category`;
CREATE TABLE IF NOT EXISTS `tbl_faqs_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `title_en` varchar(100) DEFAULT NULL,
  `parent_id` int(11) DEFAULT '0',
  `pos` int(11) NOT NULL,
  `brief` varchar(255) DEFAULT NULL,
  `brief_en` varchar(225) DEFAULT NULL,
  `status` int(11) DEFAULT '0' COMMENT '0: Unpublished, 1: Published',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faqs_question`
--

DROP TABLE IF EXISTS `tbl_faqs_question`;
CREATE TABLE IF NOT EXISTS `tbl_faqs_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) DEFAULT NULL,
  `question` varchar(100) DEFAULT NULL,
  `faqs_category_id` int(11) DEFAULT NULL,
  `brief` varchar(225) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `job_id` int(11) NOT NULL COMMENT 'Cau hoi ve cv cu the khi xem chi tiet (Khong list ra trong "Danh sach hỏi đáp ngoài trang chủ")',
  `viewed` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0: Pending, 1: Approved, 2: Denied, 3: Deleted',
  PRIMARY KEY (`id`),
  KEY `fk_tbl_faqs_question_tbl_faqs_category1_idx` (`faqs_category_id`),
  KEY `fk_tbl_faqs_question_tbl_jobs1_idx` (`job_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobs`
--

DROP TABLE IF EXISTS `tbl_jobs`;
CREATE TABLE IF NOT EXISTS `tbl_jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `title_en` varchar(45) DEFAULT NULL,
  `code` varchar(45) NOT NULL,
  `job_level_id` int(11) DEFAULT NULL,
  `salary_from` double DEFAULT NULL,
  `salary_to` double DEFAULT NULL,
  `salary_type` int(11) NOT NULL COMMENT 'Dinh gia tien luong theo quoc gia',
  `job_time_id` int(11) NOT NULL,
  `require` int(11) NOT NULL COMMENT 'So luong tuyen',
  `job_major_id` int(11) NOT NULL,
  `job_type_id` int(11) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL COMMENT 'Thoi gian het han dang tuyen',
  `published` int(11) DEFAULT '1' COMMENT 'An, hien cong viec khi ung vien tim kiem phu hop cv',
  `description` text,
  `description_en` text,
  `language` int(11) DEFAULT NULL COMMENT 'CV language require',
  `tags` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT '1' COMMENT 'Pending, Approved, Denied, Deleted',
  PRIMARY KEY (`id`),
  KEY `fk_tbl_jobs_tbl_job_level1_idx` (`job_level_id`),
  KEY `fk_tbl_jobs_tbl_job_time1_idx` (`job_time_id`),
  KEY `fk_tbl_jobs_tbl_job_major1_idx` (`job_major_id`),
  KEY `fk_tbl_jobs_tbl_locations1_idx` (`language`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='List jobs of organizations' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_jobs`
--

INSERT INTO `tbl_jobs` (`id`, `title`, `title_en`, `code`, `job_level_id`, `salary_from`, `salary_to`, `salary_type`, `job_time_id`, `require`, `job_major_id`, `job_type_id`, `created_time`, `end_time`, `published`, `description`, `description_en`, `language`, `tags`, `status`) VALUES
(1, 'Phó Tổng Giám đốc Điều hành', '', 'TGM132', 1, 800, 1500, 1, 2, 2, 4, 2, '2014-11-05 00:00:00', '2014-11-26 00:00:00', 1, '<p><strong>M&ocirc; tả c&ocirc;ng việc:&nbsp;</strong>&nbsp;&nbsp;<br />\r\n- Quản l&yacute; hoạt động của Kh&aacute;ch sạn theo bảng ph&acirc;n c&ocirc;ng nhiệm vụ do HĐQT v&agrave; Tổng Gi&aacute;m đốc Kh&aacute;ch sạn ban h&agrave;nh.<br />\r\n- C&aacute;c c&ocirc;ng việc sẽ trao đổi cụ thể khi phỏng vấn.<br />\r\n<br />\r\n<strong>Quyền lợi được hưởng:</strong>&nbsp;&nbsp;&nbsp;<br />\r\n- Được tham gia BHXH, BHYT theo Quy định của Nh&agrave; nước.<br />\r\n- Mức lương hấp dẫn, ph&ugrave; hợp với năng lực (Mức lương: tr&ecirc;n 30 triệu).<br />\r\n- C&aacute;c chế độ đ&atilde;i ngộ tốt.<br />\r\n<br />\r\n<strong>Y&ecirc;u cầu:</strong><br />\r\n- Số năm kinh nghiệm: 5 năm<br />\r\n- Y&ecirc;u cầu bằng cấp: Đại học<br />\r\n- Y&ecirc;u cầu giới t&iacute;nh: Nam<br />\r\n- Y&ecirc;u cầu độ tuổi: 35 -tuổi<br />\r\n<br />\r\n<strong>Y&ecirc;u cầu kh&aacute;c:&nbsp;&nbsp;&nbsp; </strong><br />\r\n- Nam tuổi từ 30 - 45<br />\r\n- Tốt nghiệp Đại học chuy&ecirc;n ng&agrave;nh Quản trị KD, Quản l&yacute; Nh&agrave; h&agrave;ng - Kh&aacute;ch sạn.<br />\r\n- C&oacute; &iacute;t nhất 05 năm trong lĩnh vực Quản l&yacute; Kh&aacute;ch sạn.<br />\r\n- Khả năng giao tiếp v&agrave; đ&agrave;m ph&aacute;n tốt.<br />\r\n- Tiếng Anh giao tiếp tốt, kỹ năng giải quyết vấn đề, xử l&yacute; t&igrave;nh huống, đ&agrave;o tạo v&agrave; huấn luyện nh&acirc;n vi&ecirc;n tốt.<br />\r\n- Trung thực, nhanh nhẹn, chịu được &aacute;p lực c&ocirc;ng việc.<br />\r\n<br />\r\n<strong>Hồ sơ bao gồm:&nbsp;&nbsp;&nbsp; </strong><br />\r\n- Một bộ hồ sơ đầy đủ.<br />\r\n- Chấp nhận hồ sơ ph&ocirc; t&ocirc;.<br />\r\n- Sẽ bổ sung hồ sơ gốc ngay khi tr&uacute;ng tuyển.<br />\r\n- Chỉ li&ecirc;n hệ trong giờ h&agrave;nh ch&iacute;nh.<br />\r\n- H&igrave;nh thức nộp hồ sơ: Trực tiếp.</p>\r\n\r\n<p><em><strong>Lưu &yacute;: Ứng vi&ecirc;n gửi CV bằng Tiếng Anh + Tiếng Việt tới email: hcnshl@gmail.com</strong></em></p>\r\n', '', 1, 'giám đốc điều hành', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobs_apply`
--

DROP TABLE IF EXISTS `tbl_jobs_apply`;
CREATE TABLE IF NOT EXISTS `tbl_jobs_apply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `members_id` int(11) NOT NULL,
  `jobs_id` int(11) NOT NULL,
  `applied_time` datetime DEFAULT NULL,
  `title` varchar(100) NOT NULL COMMENT 'Tiêu đề gửi tới nhà ứng dụng',
  `candidate_name` varchar(45) DEFAULT NULL COMMENT 'Name of candidate (ứng viên)',
  `email` varchar(45) NOT NULL,
  `brief` varchar(500) DEFAULT NULL,
  `fitness` text COMMENT 'Năng lực bản thân',
  `cv_link` char(255) DEFAULT NULL COMMENT 'Description about candidate in this file',
  PRIMARY KEY (`id`),
  KEY `fk_tbl_jobs_apply_tbl_members1_idx` (`members_id`),
  KEY `fk_tbl_jobs_apply_tbl_jobs1_idx` (`jobs_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Curriculum of member for job that they attend' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_jobs_apply`
--

INSERT INTO `tbl_jobs_apply` (`id`, `members_id`, `jobs_id`, `applied_time`, `title`, `candidate_name`, `email`, `brief`, `fitness`, `cv_link`) VALUES
(1, 1, 1, '2014-11-19 00:00:00', 'Ứng tuyển vị trí giám độc điều hành', 'Binh Nguyen', 'techvn2012@gmail.com', 'test', '<p>good</p>\r\n', 'BUGS.docx'),
(2, 1, 1, '2014-11-18 00:00:00', 'test 2', 'd', 'techvn2012@gmail.com', 'a', '<p>b</p>\r\n', 'bugs Cava-bien.docx');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobs_comment`
--

DROP TABLE IF EXISTS `tbl_jobs_comment`;
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

DROP TABLE IF EXISTS `tbl_jobs_location`;
CREATE TABLE IF NOT EXISTS `tbl_jobs_location` (
  `jobs_id` int(11) NOT NULL,
  `locations_id` int(11) NOT NULL COMMENT 'Quan, huyen, tinh thanh cho cv dang tuyen',
  UNIQUE KEY `jobs_id` (`jobs_id`,`locations_id`),
  KEY `fk_tbl_jobs_location_tbl_jobs1_idx` (`jobs_id`),
  KEY `fk_tbl_jobs_location_tbl_locations1_idx` (`locations_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Danh sach cac tinh thanh tuong ung voi cv dang tuyen (1 cv cho phep chon nhieu tinh thanh)';

--
-- Dumping data for table `tbl_jobs_location`
--

INSERT INTO `tbl_jobs_location` (`jobs_id`, `locations_id`) VALUES
(1, 3),
(1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_level`
--

DROP TABLE IF EXISTS `tbl_job_level`;
CREATE TABLE IF NOT EXISTS `tbl_job_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `pos` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_job_level`
--

INSERT INTO `tbl_job_level` (`id`, `title`, `title_en`, `pos`, `status`) VALUES
(1, 'Tổng giám đốc/PTGD/Giám đốc/PGD', '', 0, 1),
(2, 'Trợ lý, thứ ký', '', 0, 1),
(3, 'Trưởng ca, giám sát', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_major`
--

DROP TABLE IF EXISTS `tbl_job_major`;
CREATE TABLE IF NOT EXISTS `tbl_job_major` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `title_en` varchar(100) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL COMMENT 'Parent id',
  `pos` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0->Ẩn, 1->Hiển thị',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Lĩnh vực công việc chính' AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_job_major`
--

INSERT INTO `tbl_job_major` (`id`, `title`, `title_en`, `pid`, `pos`, `status`) VALUES
(3, 'Quản lý điều hành', '', 0, NULL, 1),
(4, 'Sale / Maketing / Guest Relationship', '', 0, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_salary`
--

DROP TABLE IF EXISTS `tbl_job_salary`;
CREATE TABLE IF NOT EXISTS `tbl_job_salary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` int(11) NOT NULL,
  `to` int(11) DEFAULT NULL,
  `type` int(11) NOT NULL COMMENT 'ID tiền tệ',
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Template salary' AUTO_INCREMENT=6 ;

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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) NOT NULL,
  `title_en` varchar(225) DEFAULT NULL,
  `pos` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Template time for job' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_job_time`
--

INSERT INTO `tbl_job_time` (`id`, `title`, `title_en`, `pos`, `status`) VALUES
(1, 'Hành chính', 'Fulltime', 1, '1'),
(2, 'Ca sáng', 'Parttime - AM', 2, '0'),
(3, 'Ca chiều', 'Parttime - PM', 3, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_type`
--

DROP TABLE IF EXISTS `tbl_job_type`;
CREATE TABLE IF NOT EXISTS `tbl_job_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `pos` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Loại hình cv' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_job_type`
--

INSERT INTO `tbl_job_type` (`id`, `title`, `title_en`, `pos`, `status`) VALUES
(1, 'Khách sạn / Chung cư', '', 1, 1),
(2, 'Resort / Khu du  lịch', '', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_know_me`
--

DROP TABLE IF EXISTS `tbl_know_me`;
CREATE TABLE IF NOT EXISTS `tbl_know_me` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(225) NOT NULL,
  `title_en` varchar(225) DEFAULT NULL,
  `pos` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Template answer for question: How do you know me?' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_know_me`
--

INSERT INTO `tbl_know_me` (`id`, `title`, `title_en`, `pos`, `status`) VALUES
(1, 'Qua internet', 'By internet', 0, 1),
(2, 'Qua bạn bè', 'Know by friends introduction', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_language_skill`
--

DROP TABLE IF EXISTS `tbl_language_skill`;
CREATE TABLE IF NOT EXISTS `tbl_language_skill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `pos` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_language_skill`
--

INSERT INTO `tbl_language_skill` (`id`, `title`, `title_en`, `pos`) VALUES
(1, 'Tiếng Anh', 'English', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_locations`
--

DROP TABLE IF EXISTS `tbl_locations`;
CREATE TABLE IF NOT EXISTS `tbl_locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `pos` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_locations`
--

INSERT INTO `tbl_locations` (`id`, `name`, `code`, `parent_id`, `pos`) VALUES
(1, 'Viet Nam', 'vi_VN', 0, 0),
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(45) NOT NULL,
  `pwd` varchar(45) NOT NULL,
  `gender` int(11) DEFAULT NULL,
  `birth` datetime DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `email` char(30) DEFAULT NULL,
  `created_time` datetime DEFAULT NULL,
  `fullname` varchar(45) DEFAULT NULL,
  `level` enum('MEMBER','MODERATE','ADMINISTRATOR') DEFAULT NULL,
  `members_group_id` int(11) DEFAULT NULL,
  `security_ques_id` int(11) DEFAULT NULL,
  `security_ans` char(100) DEFAULT NULL COMMENT 'Tra loi cau hoi bi mat',
  `recieve_mail` int(11) DEFAULT '0' COMMENT 'Accept nhan mail tu hoteljob.vn: 0-> Ko nhan, 1->Co nhan',
  `province_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `married` int(11) DEFAULT NULL COMMENT '0->Single, 1-> Married',
  `avatar` varchar(225) DEFAULT NULL,
  `nationality` int(11) DEFAULT NULL COMMENT 'Quốc gia',
  `know_me_id` int(11) DEFAULT NULL COMMENT 'Biet hotel-job qua dau?',
  `updated_time` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_members_tbl_members_group1_idx` (`members_group_id`),
  KEY `fk_tbl_members_tbl_security_ques1_idx` (`security_ques_id`),
  KEY `fk_tbl_members_tbl_locations1_idx` (`province_id`),
  KEY `fk_tbl_members_tbl_locations2_idx` (`district_id`),
  KEY `fk_tbl_members_tbl_know_me1_idx` (`know_me_id`),
  KEY `fk_tbl_members_tbl_locations3_idx` (`nationality`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_members`
--

INSERT INTO `tbl_members` (`id`, `uname`, `pwd`, `gender`, `birth`, `address`, `phone`, `mobile`, `email`, `created_time`, `fullname`, `level`, `members_group_id`, `security_ques_id`, `security_ans`, `recieve_mail`, `province_id`, `district_id`, `married`, `avatar`, `nationality`, `know_me_id`, `updated_time`, `status`) VALUES
(1, 'binhnt', 'e99a18c428cb38d5f260853678922e03', 1, '1986-09-30 00:00:00', 'Minh Duc, Viet Yen', '0976529830', '0976529830', 'ntbinh30986@gmail.com', '2014-11-05 00:00:00', 'Nguyễn Thanh Bình', 'ADMINISTRATOR', 0, 0, '', 1, 3, 5, 1, '4524726.png', 1, 0, NULL, 1),
(11, 'admin', 'd6b0ab7f1c8ab8f514db9a6d85de160a', 1, '2014-11-06 00:00:00', '', '', '', '', '2014-11-06 00:00:00', '', 'ADMINISTRATOR', 0, 0, '', 0, 0, 0, 0, NULL, 0, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_members_group`
--

DROP TABLE IF EXISTS `tbl_members_group`;
CREATE TABLE IF NOT EXISTS `tbl_members_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL COMMENT 'Name tieng viet',
  `alias` varchar(45) DEFAULT NULL,
  `en_name` varchar(45) DEFAULT NULL COMMENT 'Name tieng anh',
  PRIMARY KEY (`id`)
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

DROP TABLE IF EXISTS `tbl_news`;
CREATE TABLE IF NOT EXISTS `tbl_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `news_category_id` int(11) NOT NULL COMMENT 'ID danh mục tin',
  PRIMARY KEY (`id`),
  KEY `fk_tbl_news_tbl_news_category1_idx` (`news_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='News of system or organization' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news_category`
--

DROP TABLE IF EXISTS `tbl_news_category`;
CREATE TABLE IF NOT EXISTS `tbl_news_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `name_en` varchar(45) DEFAULT NULL,
  `parent_id` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT '1' COMMENT '1: Publich',
  `type` int(11) DEFAULT '0' COMMENT '0: Danh mục hệ thống, 1: Danh mục của nhà tuyển dụng (organize, recuriter)',
  `members_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_news_category_tbl_members1_idx` (`members_id`)
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `name_en` varchar(100) DEFAULT NULL,
  `members_id` int(11) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `brand` varchar(45) DEFAULT NULL COMMENT 'Thuong hieu',
  `tel` char(50) DEFAULT NULL,
  `phone` char(50) DEFAULT NULL,
  `fax` varchar(15) DEFAULT NULL,
  `tax` varchar(25) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `company_scope_id` int(11) NOT NULL,
  `address` char(255) DEFAULT NULL COMMENT 'Địa chỉ',
  `province` int(11) DEFAULT NULL COMMENT 'Tỉnh thành',
  `district` int(11) DEFAULT NULL COMMENT 'Quận huyện',
  `description` varchar(500) DEFAULT NULL,
  `description_en` text,
  `created_time` datetime DEFAULT NULL COMMENT 'Ngày khởi tạo nhà tuyển dụng',
  `ended_time` datetime DEFAULT NULL COMMENT 'Ngày kết thúc hiệu lực',
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_tbl_organize_data_tbl_company_scope1_idx` (`company_scope_id`),
  KEY `fk_tbl_organize_data_tbl_members1_idx` (`members_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='More infomation of member if they are organization' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_organize_data`
--

INSERT INTO `tbl_organize_data` (`id`, `name`, `name_en`, `members_id`, `website`, `brand`, `tel`, `phone`, `fax`, `tax`, `email`, `logo`, `contact`, `company_scope_id`, `address`, `province`, `district`, `description`, `description_en`, `created_time`, `ended_time`, `status`) VALUES
(1, 'Trung tâm giáo dục và công nghệ toàn cầu', 'Education Technology - Global', 11, 'http://www.tech24h.com.vn', '', '0976529830', '0240 535 875', '', '12358452', 'hotmail@tech24h.com.vn', 'free_nature_background_1920x1080_.jpg', 'Trần Văn Bình - Trưởng phòng IT', 1, '114, Trần Hưng Đạo, phường Nghĩa Đàn, tp Bắc Giang', 3, 5, '<p>test</p>\r\n', '<p>test ok</p>\r\n', '2014-11-06 10:24:50', '2014-11-28 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_organize_library`
--

DROP TABLE IF EXISTS `tbl_organize_library`;
CREATE TABLE IF NOT EXISTS `tbl_organize_library` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img_link` varchar(255) DEFAULT NULL,
  `members_id` int(11) NOT NULL,
  `created_time` datetime DEFAULT NULL,
  `pos` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbl_organize_library_tbl_members1_idx` (`members_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Link meta data of organization' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_partner`
--

DROP TABLE IF EXISTS `tbl_partner`;
CREATE TABLE IF NOT EXISTS `tbl_partner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logo` char(255) DEFAULT NULL,
  `name` char(100) NOT NULL,
  `link` char(255) DEFAULT NULL,
  `pos` int(11) DEFAULT NULL,
  `created_time` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_partner`
--

INSERT INTO `tbl_partner` (`id`, `logo`, `name`, `link`, `pos`, `created_time`, `status`) VALUES
(1, 'Afghanistan.png', 'tét', 'http://host.hoteljob.com/test', 1, '2014-12-14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_privilege`
--

DROP TABLE IF EXISTS `tbl_privilege`;
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
-- Table structure for table `tbl_school`
--

DROP TABLE IF EXISTS `tbl_school`;
CREATE TABLE IF NOT EXISTS `tbl_school` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` char(255) NOT NULL,
  `title_en` char(255) NOT NULL,
  `post` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_security_ques`
--

DROP TABLE IF EXISTS `tbl_security_ques`;
CREATE TABLE IF NOT EXISTS `tbl_security_ques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ques` char(225) NOT NULL,
  `ques_en` char(255) DEFAULT NULL,
  `pos` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Template for security question' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_security_ques`
--

INSERT INTO `tbl_security_ques` (`id`, `ques`, `ques_en`, `pos`, `status`) VALUES
(1, 'Cô giáo đầu tiên của bạn là ai?', '', 0, 1),
(2, 'Trường THCS của bạn ở đâu?', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_skill`
--

DROP TABLE IF EXISTS `tbl_skill`;
CREATE TABLE IF NOT EXISTS `tbl_skill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` char(255) NOT NULL,
  `title_en` char(255) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL COMMENT 'Danh mục cha',
  `pos` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Skill with computer template' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_skill`
--

INSERT INTO `tbl_skill` (`id`, `title`, `title_en`, `pid`, `pos`, `status`) VALUES
(1, 'Kỹ năng phần cứng', 'Hardware skill', NULL, 1, 1),
(2, 'Kỹ năng phần mềm', 'Soft skill', 0, 2, 1),
(3, 'Lập trình C#', 'C# Programming', 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_skill_level`
--

DROP TABLE IF EXISTS `tbl_skill_level`;
CREATE TABLE IF NOT EXISTS `tbl_skill_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `pos` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_skill_level`
--

INSERT INTO `tbl_skill_level` (`id`, `title`, `title_en`, `pos`) VALUES
(1, 'Giỏi', 'Best', 1),
(2, 'Khá', 'Good', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
