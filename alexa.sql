/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : alexa

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-05-01 23:36:38
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `albo_banner`
-- ----------------------------
DROP TABLE IF EXISTS `albo_banner`;
CREATE TABLE `albo_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `header` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `subheader` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `details` text COLLATE utf8_bin,
  `image` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `publish` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of albo_banner
-- ----------------------------
INSERT INTO `albo_banner` VALUES ('1', 'banner 1', '  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s ', 0x62616E6E657220312064657461696C73, '1410877933-bg.jpg', '1', '1');
INSERT INTO `albo_banner` VALUES ('2', 'banner 2', 'ttt', 0x62616E6E657220322064657461696C73, '1411477663-7089-place.jpg', '2', '0');
INSERT INTO `albo_banner` VALUES ('3', 'Welcome to Alexa Boostop', 'ttttttttttt', 0x4C6F72656D20497073756D2069732073696D706C792064756D6D792074657874206F6620746865207072696E74696E6720616E64207479706573657474696E6720696E6475737472792E204C6F72656D20497073756D20686173206265656E2074686520696E6475737472792773207374616E646172642064756D6D79207465787420657665722073696E636520746865203135303073, '1411477925-7089-place.jpg', '3', '1');

-- ----------------------------
-- Table structure for `albo_blog`
-- ----------------------------
DROP TABLE IF EXISTS `albo_blog`;
CREATE TABLE `albo_blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `user_id` int(255) DEFAULT NULL,
  `post` text,
  `image` varchar(255) DEFAULT NULL,
  `publish` tinyint(4) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `slug` varchar(255) NOT NULL,
  `sort` int(11) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_id` (`cat_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `albo_blog_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `albo_blog_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `albo_blog_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `albo_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of albo_blog
-- ----------------------------

-- ----------------------------
-- Table structure for `albo_blog_category`
-- ----------------------------
DROP TABLE IF EXISTS `albo_blog_category`;
CREATE TABLE `albo_blog_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of albo_blog_category
-- ----------------------------
INSERT INTO `albo_blog_category` VALUES ('6', 'Category One', '1', 'category-one');
INSERT INTO `albo_blog_category` VALUES ('7', 'Category Two', '2', 'category-two');
INSERT INTO `albo_blog_category` VALUES ('8', 'Category Three', '3', 'category-three');
INSERT INTO `albo_blog_category` VALUES ('9', 'Category Four', '4', 'category-four');
INSERT INTO `albo_blog_category` VALUES ('10', 'Category Five', '5', 'category-five');

-- ----------------------------
-- Table structure for `albo_blog_comment`
-- ----------------------------
DROP TABLE IF EXISTS `albo_blog_comment`;
CREATE TABLE `albo_blog_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `approve` tinyint(4) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blog_id` (`blog_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `albo_blog_comment_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `albo_blog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `albo_blog_comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `albo_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of albo_blog_comment
-- ----------------------------

-- ----------------------------
-- Table structure for `albo_errormessage`
-- ----------------------------
DROP TABLE IF EXISTS `albo_errormessage`;
CREATE TABLE `albo_errormessage` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `error_home` varchar(255) NOT NULL,
  `error_homeactive` tinyint(2) NOT NULL,
  `error_image` varchar(255) NOT NULL,
  `error_prev` varchar(255) NOT NULL,
  `error_prevactive` tinyint(255) NOT NULL,
  `error_subhead` longtext NOT NULL,
  `error_heading` longtext NOT NULL,
  `error_message` varchar(255) NOT NULL,
  `error_body` longtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_id` (`id`),
  KEY `index_id` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of albo_errormessage
-- ----------------------------
INSERT INTO `albo_errormessage` VALUES ('1', 'go to home page', '1', '9780-broken_plate.jpg', 'retuen to previous page', '1', '<p>​</p><h4><span>Please try again.                        For more information please try our <span></span>help section<span></span></span></h4><p></p>', '<p>                    </p><h2><p><span>Sorry, something has gone wrong</span></p></h2><p></p>', '<p></p><h4>We Can Help!</h4>                        <h5>You can also inform us of the problem if it repeats itself</h5><p></p>', '<p></p><h5>Thank you for your feedback, we will do our best to solve the problem as soon as possible.</h5><p></p>');

-- ----------------------------
-- Table structure for `albo_faq`
-- ----------------------------
DROP TABLE IF EXISTS `albo_faq`;
CREATE TABLE `albo_faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `answer` text COLLATE utf8_bin NOT NULL,
  `active` varchar(255) COLLATE utf8_bin NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of albo_faq
-- ----------------------------
INSERT INTO `albo_faq` VALUES ('1', 'Youtube Video Scraping', 0x416C77617973204920776F6E646572656420746F20646973706C617920796F757475626520766964656F732062656C6F77206D7920706F737473206F7220666F7220736F6D65206F7468657220707572706F73652E2042757420616C776179732068616420746F2075736520736F6D6520706C7567696E73206F7220736F6D6520636F6D706C69636174656420736372697074732E20536F2066696E616C6C7920636F64656420666F7220796F752070656F706C65206120736D616C6C2066756E6374696F6E2077686963682077696C6C206665746368206F72207363726170652E2E2E, '1', '1');
INSERT INTO `albo_faq` VALUES ('2', 'WordPress Multiple Category Search', 0x53696E6365207768656E2049207374617274656420776F726470726573732C2049206861642061207175657374696F6E20696E206D79206D696E642C2077687920776F7264707265737320646F65736E27742067697665206D756C7469706C6520736561726368206F7074696F6E3F204920676F6F676C65642061206C6F742C2062757420636F756C646E27742066696E64206120706C7567696E206F7220636F64652077686963682065786163746C7920776F726B732E20536F2066696E616C6C79206465636964656420746F20676F206D6F726520696E746F2E2E2E, '1', '2');

-- ----------------------------
-- Table structure for `albo_features`
-- ----------------------------
DROP TABLE IF EXISTS `albo_features`;
CREATE TABLE `albo_features` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `home_image` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `inner_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of albo_features
-- ----------------------------
INSERT INTO `albo_features` VALUES ('1', 'Multiple Websites', 'feature 1 discription', '1411541628-1409639366-alexalogo-header.920f192e91775bdb6af0d01f18454360.png', 'yellow', null, '1411554867-tour5.png');
INSERT INTO `albo_features` VALUES ('2', 'feature 2', 'feature 2 Description', '1411541214-list.jpg', 'red', null, '1411554883-tour4.png');
INSERT INTO `albo_features` VALUES ('3', 'Purchase Points', 'feature 2  Description', '1411545817-f-icon4.png', 'green', null, '1411554904-tour4.png');
INSERT INTO `albo_features` VALUES ('4', 'Support System', '', '1411629393-f-icon4.png', 'violet', '1', '1411629393-tour4.png');
INSERT INTO `albo_features` VALUES ('5', 'REFErrals', '', '1411629417-f-icon5.png', 'orange', '2', '1411629417-tour5.png');

-- ----------------------------
-- Table structure for `albo_feedback`
-- ----------------------------
DROP TABLE IF EXISTS `albo_feedback`;
CREATE TABLE `albo_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `content` text COLLATE utf8_bin,
  `email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `vote` tinyint(4) DEFAULT '0',
  `num_of_votes` decimal(10,0) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of albo_feedback
-- ----------------------------
INSERT INTO `albo_feedback` VALUES ('1', 'Subject one', 0x546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420, 'test@omsolutions.com', '1', '4', '1');

-- ----------------------------
-- Table structure for `albo_how_work`
-- ----------------------------
DROP TABLE IF EXISTS `albo_how_work`;
CREATE TABLE `albo_how_work` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of albo_how_work
-- ----------------------------
INSERT INTO `albo_how_work` VALUES ('3', 'how work 1', 'how work 1   Description', '1411542684-free-surf.png', null);
INSERT INTO `albo_how_work` VALUES ('4', 'how work 1', 'how work 1 Description', '1411542854-free-reg.png', null);
INSERT INTO `albo_how_work` VALUES ('6', 'How it Works 3', 'How it Works 3  Description', '1411546250-earn-points.png', null);

-- ----------------------------
-- Table structure for `albo_order`
-- ----------------------------
DROP TABLE IF EXISTS `albo_order`;
CREATE TABLE `albo_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `price` decimal(10,2) DEFAULT '0.00',
  `order_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `points` decimal(10,0) DEFAULT NULL,
  `status_id` int(11) DEFAULT '1',
  `sort` int(11) DEFAULT NULL,
  `payer_id` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `package_id` (`package_id`),
  KEY `status_id` (`status_id`),
  CONSTRAINT `albo_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `albo_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `albo_order_ibfk_2` FOREIGN KEY (`package_id`) REFERENCES `albo_package` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `albo_order_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `albo_order_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of albo_order
-- ----------------------------
INSERT INTO `albo_order` VALUES ('1', '11', '1', 'EC-4DC69137Y56366115', '5.00', '2014-09-29 15:36:35', '5000', '1', '1', null);

-- ----------------------------
-- Table structure for `albo_order_status`
-- ----------------------------
DROP TABLE IF EXISTS `albo_order_status`;
CREATE TABLE `albo_order_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of albo_order_status
-- ----------------------------
INSERT INTO `albo_order_status` VALUES ('1', 'Pending', '1');
INSERT INTO `albo_order_status` VALUES ('2', 'Cancelled', '2');
INSERT INTO `albo_order_status` VALUES ('3', 'Completed', '3');

-- ----------------------------
-- Table structure for `albo_package`
-- ----------------------------
DROP TABLE IF EXISTS `albo_package`;
CREATE TABLE `albo_package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `points` decimal(10,0) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of albo_package
-- ----------------------------
INSERT INTO `albo_package` VALUES ('1', 'Package one', '5000', '5.00', '1');
INSERT INTO `albo_package` VALUES ('2', 'Pckage Two', '10000', '9.99', '2');
INSERT INTO `albo_package` VALUES ('3', 'Package3', '15000', '14.99', '3');
INSERT INTO `albo_package` VALUES ('4', 'Package4', '20000', '19.99', '4');
INSERT INTO `albo_package` VALUES ('5', 'Package5', '25000', '24.99', '5');
INSERT INTO `albo_package` VALUES ('6', 'Package6', '30000', '29.99', '6');

-- ----------------------------
-- Table structure for `albo_pages`
-- ----------------------------
DROP TABLE IF EXISTS `albo_pages`;
CREATE TABLE `albo_pages` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `intro` text,
  `details` text,
  `image` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `publish` int(255) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `layout` int(11) DEFAULT '1' COMMENT '1 => one column, 2 => two columns, 3 => three columns',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_id` (`id`),
  KEY `index_id2` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of albo_pages
-- ----------------------------
INSERT INTO `albo_pages` VALUES ('1', 'About Us', '', '<p class=\"blog-parag\">\r\n	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<p class=\"blog-parag\">\r\n	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<p class=\"blog-parag\">\r\n	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n', '1411370263-blog-img.png', '', '1', '1', 'about-us', '1');
INSERT INTO `albo_pages` VALUES ('2', 'Privacy Policy', '', '<p class=\"blog-parag\">\r\n	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<p class=\"blog-parag\">\r\n	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<p class=\"blog-parag\">\r\n	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n', '1411370309-blog-img.png', '', '1', '2', 'privacy-policy', '1');
INSERT INTO `albo_pages` VALUES ('3', 'Terms & Conditions', '', '<p class=\"blog-parag\">\r\n	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<p class=\"blog-parag\">\r\n	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<p class=\"blog-parag\">\r\n	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n', '1411370357-blog-img.png', '', '1', '3', 'terms-conditions', '3');

-- ----------------------------
-- Table structure for `albo_rank`
-- ----------------------------
DROP TABLE IF EXISTS `albo_rank`;
CREATE TABLE `albo_rank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of albo_rank
-- ----------------------------
INSERT INTO `albo_rank` VALUES ('5', 'Completely Free 1', 'Completely Free 1  Description', '1411543812-icon1.png', null);
INSERT INTO `albo_rank` VALUES ('6', 'Completely Free  2', 'Completely Free  2    Description', '1411544558-icon3.png', null);
INSERT INTO `albo_rank` VALUES ('7', 'Completely Free 3', 'Completely Free 3   Description', '1411544771-icon2.png', null);

-- ----------------------------
-- Table structure for `albo_referrals`
-- ----------------------------
DROP TABLE IF EXISTS `albo_referrals`;
CREATE TABLE `albo_referrals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `referral_id` int(11) DEFAULT NULL,
  `active` tinyint(4) DEFAULT '0',
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `referral_id` (`referral_id`),
  CONSTRAINT `albo_referrals_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `albo_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `albo_referrals_ibfk_2` FOREIGN KEY (`referral_id`) REFERENCES `albo_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of albo_referrals
-- ----------------------------

-- ----------------------------
-- Table structure for `albo_settings`
-- ----------------------------
DROP TABLE IF EXISTS `albo_settings`;
CREATE TABLE `albo_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facebook` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `support_email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `paypal_email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `api_username` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `api_password` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `signature` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `paypal_live` tinyint(4) DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `user_intial_points` decimal(10,0) DEFAULT NULL,
  `auto_surfing_points` decimal(10,0) DEFAULT NULL,
  `referral_points` decimal(10,0) DEFAULT NULL,
  `surfing_period` decimal(10,0) DEFAULT NULL,
  `cost_of_5k_points` decimal(10,2) DEFAULT NULL,
  `business_hours` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `slider_min_points` int(11) DEFAULT '0',
  `slider_max_points` int(11) DEFAULT '0',
  `youtube` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `google` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `default_site_num` int(11) DEFAULT '0',
  `how_work_video` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `alexa_ranking` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `alexa_features` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `alexa_take_tour` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of albo_settings
-- ----------------------------
INSERT INTO `albo_settings` VALUES ('1', 'http://www.facebook.com/', 'http://twitter.com/', 'website@website.com', 'support@website.com ', 'website@website.com', 'prosel_1355392367_biz_api1.omsolutions.com', '1355392425', 'A3wB9wrrNWpacpiQQX9SVBFeXSFJALS5DGVJQ4H9X99K1efvyNjmnZGs', 'Testing Address', '0', '1409574963-alexalogo-header.920f192e91775bdb6af0d01f18454360.png', '1000', '1', '1000', '10', '5.00', 'All Days, From 9 am to 10 pm', '5000', '100000', '', '', '3', 'http://www.youtube.com/embed', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', '');

-- ----------------------------
-- Table structure for `albo_subscribe_package`
-- ----------------------------
DROP TABLE IF EXISTS `albo_subscribe_package`;
CREATE TABLE `albo_subscribe_package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `traffic_ratio` decimal(10,0) DEFAULT '100',
  `points` int(11) DEFAULT '0',
  `num_of_sites` int(11) DEFAULT '1',
  `price` decimal(10,2) DEFAULT '0.00',
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of albo_subscribe_package
-- ----------------------------
INSERT INTO `albo_subscribe_package` VALUES ('1', 'Silver', '70', '5000', '5', '9.99', null);
INSERT INTO `albo_subscribe_package` VALUES ('2', 'Premium', '100', '30000', '15', '24.99', null);
INSERT INTO `albo_subscribe_package` VALUES ('3', 'Premium Lite', '80', '10000', '4', '17.99', null);

-- ----------------------------
-- Table structure for `albo_support`
-- ----------------------------
DROP TABLE IF EXISTS `albo_support`;
CREATE TABLE `albo_support` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `content` text COLLATE utf8_bin,
  `email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of albo_support
-- ----------------------------
INSERT INTO `albo_support` VALUES ('1', 'Subject one', 0x546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420546573742054657374205465737420, 'testt@omsolutions.com', '', '1');
INSERT INTO `albo_support` VALUES ('2', 'aa', 0x6D657373616765, 'test@jjs.com', '1412001348-tour5.png,1412001348-tour4.png,1412001348-tour3.png', '2');

-- ----------------------------
-- Table structure for `albo_user`
-- ----------------------------
DROP TABLE IF EXISTS `albo_user`;
CREATE TABLE `albo_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(90) COLLATE utf8_bin DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `details` text COLLATE utf8_bin,
  `groups_id` int(11) DEFAULT NULL COMMENT '0 trainer  1  vendor   2 company  3 employee  4 stuff(EHR linked stuff)     6 Admin',
  `active` tinyint(1) DEFAULT '0',
  `pass_reset` tinyint(4) DEFAULT '0' COMMENT '1 requested reset password',
  `pass_code` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `last_login` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `sort` int(255) NOT NULL,
  `points` decimal(10,0) DEFAULT NULL,
  `active_code` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `subscribed_package_id` int(11) DEFAULT NULL,
  `subscribed_package_renewal_date` datetime DEFAULT NULL,
  `subscribe_status` tinyint(4) DEFAULT '0' COMMENT '0=not subscribed, 1=pending, 3=completed, 2=cancelled',
  `subscription_token` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `paypal_profile_id` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_ibfk_1` (`groups_id`),
  KEY `subscribed_package_id` (`subscribed_package_id`) USING BTREE,
  CONSTRAINT `albo_user_ibfk_1` FOREIGN KEY (`groups_id`) REFERENCES `albo_user_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `albo_user_ibfk_2` FOREIGN KEY (`subscribed_package_id`) REFERENCES `albo_subscribe_package` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of albo_user
-- ----------------------------
INSERT INTO `albo_user` VALUES ('1', 'superadmin', 'superadmin@omsloutions.com', 'GyAYtNO6XVtVbsnayx9ubQ==', 'admin', 'user', '', 0x7468652073757065722061646D696E2075736572, '1', '1', '0', '', '2014-08-17 16:33:27', '4', '100', '', null, '0000-00-00 00:00:00', '0', '', '');
INSERT INTO `albo_user` VALUES ('2', 'admin', 'admin@admin.com', 'GyAYtNO6XVtVbsnayx9ubQ==', 'super', 'admin', '', 0x74657374, '2', '1', '0', '', '2018-05-01 21:35:39', '2', '86', '', null, '0000-00-00 00:00:00', '0', '', '');
INSERT INTO `albo_user` VALUES ('11', 'user', 'teacher@omsolutions.com', 'GyAYtNO6XVtVbsnayx9ubQ==', 'test', 'uk', '', 0x6D6D6D6D, '3', '1', '0', '', '2014-09-29 16:36:23', '3', '15039', '', '3', '2019-10-24 17:54:40', '3', 'EC-09T34158J2889625M', '99887');
INSERT INTO `albo_user` VALUES ('14', 'test', 'test@omsol.com', 'GyAYtNO6XVtVbsnayx9ubQ==', 'test', 'Last Test', '', null, '3', '0', '0', '', '', '1', '25', '', null, '0000-00-00 00:00:00', '0', '', '');
INSERT INTO `albo_user` VALUES ('15', 'tes@tes.tes', 'tes@tes.tes', 'GyAYtNO6XVtVbsnayx9ubQ==', null, null, null, null, '3', '1', '0', null, '2018-05-01 21:33:40', '5', '1000', 'bTm7McRjJ3', null, null, '0', null, null);
INSERT INTO `albo_user` VALUES ('16', 'asd@asd.asd', 'asd@asd.asd', 'GyAYtNO6XVtVbsnayx9ubQ==', null, null, null, null, '3', '0', '0', null, null, '6', '1000', '8EpRezBhnX', null, null, '0', null, null);

-- ----------------------------
-- Table structure for `albo_user_groups`
-- ----------------------------
DROP TABLE IF EXISTS `albo_user_groups`;
CREATE TABLE `albo_user_groups` (
  `id` int(11) NOT NULL,
  `group_title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of albo_user_groups
-- ----------------------------
INSERT INTO `albo_user_groups` VALUES ('1', 'Super Admin ');
INSERT INTO `albo_user_groups` VALUES ('2', 'Admin');
INSERT INTO `albo_user_groups` VALUES ('3', 'Normal User');

-- ----------------------------
-- Table structure for `albo_user_points`
-- ----------------------------
DROP TABLE IF EXISTS `albo_user_points`;
CREATE TABLE `albo_user_points` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `used` decimal(10,0) DEFAULT '0',
  `gained` decimal(10,0) DEFAULT '0',
  `date_time` date DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `albo_user_points_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `albo_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of albo_user_points
-- ----------------------------
INSERT INTO `albo_user_points` VALUES ('1', '11', '0', '39', '2014-09-29', '1');
INSERT INTO `albo_user_points` VALUES ('2', '2', '14', '0', '2014-09-29', '2');
INSERT INTO `albo_user_points` VALUES ('3', '14', '25', '0', '2014-09-29', '3');
INSERT INTO `albo_user_points` VALUES ('4', '15', '0', '0', '2018-05-01', '4');

-- ----------------------------
-- Table structure for `albo_website`
-- ----------------------------
DROP TABLE IF EXISTS `albo_website`;
CREATE TABLE `albo_website` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `fav_icon` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `limit_points` decimal(10,0) DEFAULT '0',
  `hide_referrals` tinyint(4) DEFAULT '0',
  `active` tinyint(4) DEFAULT '0',
  `today_points` decimal(10,0) DEFAULT '0',
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `website_ibfk_1` (`user_id`),
  CONSTRAINT `albo_website_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `albo_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of albo_website
-- ----------------------------
INSERT INTO `albo_website` VALUES ('1', 'http://www.omsolutions.com', null, '14', '0', '0', '1', '11', null);
INSERT INTO `albo_website` VALUES ('2', 'http://google.com', null, '14', '0', '1', '1', '14', null);
INSERT INTO `albo_website` VALUES ('3', 'http://yahoo.com', null, '14', '0', '0', '0', '0', null);
INSERT INTO `albo_website` VALUES ('4', 'http://test.com', null, '11', '0', '0', '1', '0', null);
INSERT INTO `albo_website` VALUES ('5', 'http://test2.com', null, '11', '100', '0', '1', '0', null);
INSERT INTO `albo_website` VALUES ('6', 'http://aa.com', null, '2', '0', '1', '1', '14', null);
