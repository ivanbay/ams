/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : ams

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-11-21 14:49:24
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `activity_logs`
-- ----------------------------
DROP TABLE IF EXISTS `activity_logs`;
CREATE TABLE `activity_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activity` text,
  `activity_by` varchar(6) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=304 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of activity_logs
-- ----------------------------
INSERT INTO `activity_logs` VALUES ('1', 'New asset has been added: 444555', '1', '2019-05-02 02:51:41', '2019-05-02 02:51:41');
INSERT INTO `activity_logs` VALUES ('2', 'Added new personnel. Employee ID: 27879', '1', '2019-05-04 07:20:32', '2019-05-04 07:20:32');
INSERT INTO `activity_logs` VALUES ('3', 'Added new personnel. Employee ID: 27879', '1', '2019-05-04 07:21:42', '2019-05-04 07:21:42');
INSERT INTO `activity_logs` VALUES ('4', 'Added new personnel. Employee ID: 27879', '1', '2019-05-04 07:24:18', '2019-05-04 07:24:18');
INSERT INTO `activity_logs` VALUES ('5', 'Added new personnel. Employee ID: 27879', '1', '2019-05-04 07:26:34', '2019-05-04 07:26:34');
INSERT INTO `activity_logs` VALUES ('6', 'Added new personnel. Employee ID: 27879', '1', '2019-05-04 07:27:45', '2019-05-04 07:27:45');
INSERT INTO `activity_logs` VALUES ('7', 'Added new personnel. Employee ID: 27879', '1', '2019-05-04 07:28:56', '2019-05-04 07:28:56');
INSERT INTO `activity_logs` VALUES ('8', 'Added new personnel. Employee ID: 27879', '1', '2019-05-04 07:31:44', '2019-05-04 07:31:44');
INSERT INTO `activity_logs` VALUES ('9', 'Added new personnel. Employee ID: 27879', '1', '2019-05-04 07:32:44', '2019-05-04 07:32:44');
INSERT INTO `activity_logs` VALUES ('10', 'Added new personnel. Employee ID: 27879', '1', '2019-05-04 07:33:13', '2019-05-04 07:33:13');
INSERT INTO `activity_logs` VALUES ('11', 'Added new personnel. Employee ID: 27879', '1', '2019-05-04 07:33:54', '2019-05-04 07:33:54');
INSERT INTO `activity_logs` VALUES ('12', 'Deleted personnel. Employee ID: 27879', '1', '2019-05-04 07:34:01', '2019-05-04 07:34:01');
INSERT INTO `activity_logs` VALUES ('13', 'Added new personnel. Employee ID: 27879', '1', '2019-05-04 08:45:35', '2019-05-04 08:45:35');
INSERT INTO `activity_logs` VALUES ('14', 'Added new personnel. Employee ID: 278793', '1', '2019-05-04 09:25:35', '2019-05-04 09:25:35');
INSERT INTO `activity_logs` VALUES ('15', 'Added new personnel. Employee ID: 27879', '1', '2019-05-04 09:31:10', '2019-05-04 09:31:10');
INSERT INTO `activity_logs` VALUES ('16', 'Added new personnel. Employee ID: 27879', '1', '2019-05-04 09:31:27', '2019-05-04 09:31:27');
INSERT INTO `activity_logs` VALUES ('17', 'Added new personnel. Employee ID: 27879', '1', '2019-05-04 09:31:50', '2019-05-04 09:31:50');
INSERT INTO `activity_logs` VALUES ('18', 'Added new personnel. Employee ID: 27879', '1', '2019-05-04 09:35:06', '2019-05-04 09:35:06');
INSERT INTO `activity_logs` VALUES ('19', 'Added new personnel. Employee ID: 27879', '1', '2019-05-04 09:35:49', '2019-05-04 09:35:49');
INSERT INTO `activity_logs` VALUES ('20', 'Personnel 27879 information was updated.', '1', '2019-05-04 09:40:11', '2019-05-04 09:40:11');
INSERT INTO `activity_logs` VALUES ('21', 'Added new personnel. Employee ID: 234234', '1', '2019-05-04 09:42:00', '2019-05-04 09:42:00');
INSERT INTO `activity_logs` VALUES ('22', 'Personnel 27879 information was updated.', '1', '2019-05-04 09:42:51', '2019-05-04 09:42:51');
INSERT INTO `activity_logs` VALUES ('23', 'Personnel 278793 information was updated.', '1', '2019-05-04 09:42:56', '2019-05-04 09:42:56');
INSERT INTO `activity_logs` VALUES ('24', 'Personnel 27879 information was updated.', '1', '2019-05-04 09:47:03', '2019-05-04 09:47:03');
INSERT INTO `activity_logs` VALUES ('25', 'Added new asset status: Broken - Not Fixable', '1', '2019-05-05 09:54:54', '2019-05-05 09:54:54');
INSERT INTO `activity_logs` VALUES ('26', 'Added new asset status: Lost/Stolen', '1', '2019-05-05 09:55:05', '2019-05-05 09:55:05');
INSERT INTO `activity_logs` VALUES ('27', 'Added new asset status: Out for Repair', '1', '2019-05-05 09:55:31', '2019-05-05 09:55:31');
INSERT INTO `activity_logs` VALUES ('28', 'Added new asset status: Stock', '1', '2019-05-05 09:55:40', '2019-05-05 09:55:40');
INSERT INTO `activity_logs` VALUES ('29', 'Added new asset status: Ready o Deploy', '1', '2019-05-05 09:55:54', '2019-05-05 09:55:54');
INSERT INTO `activity_logs` VALUES ('30', 'Added new asset status: Deployed', '1', '2019-05-05 09:56:44', '2019-05-05 09:56:44');
INSERT INTO `activity_logs` VALUES ('31', 'Added new asset status: For Maintenance', '1', '2019-05-05 17:18:00', '2019-05-05 17:18:00');
INSERT INTO `activity_logs` VALUES ('32', 'Added new personnel. Employee ID: ', '1', '2019-05-06 21:39:59', '2019-05-06 21:39:59');
INSERT INTO `activity_logs` VALUES ('33', 'Added new personnel. Employee ID: ', '1', '2019-05-06 21:40:39', '2019-05-06 21:40:39');
INSERT INTO `activity_logs` VALUES ('34', 'Deleted personnel. Employee ID: 1234313', '1', '2019-05-06 21:40:43', '2019-05-06 21:40:43');
INSERT INTO `activity_logs` VALUES ('35', 'Deleted personnel. Employee ID: 1234314', '1', '2019-05-06 21:40:48', '2019-05-06 21:40:48');
INSERT INTO `activity_logs` VALUES ('36', 'User 12 records was updated.', '1', '2019-05-07 01:02:52', '2019-05-07 01:02:52');
INSERT INTO `activity_logs` VALUES ('37', 'User 2 records was updated.', '1', '2019-05-07 01:03:04', '2019-05-07 01:03:04');
INSERT INTO `activity_logs` VALUES ('38', 'User 12 records was updated.', '1', '2019-05-07 01:03:12', '2019-05-07 01:03:12');
INSERT INTO `activity_logs` VALUES ('39', 'User 14 records was updated.', '1', '2019-05-07 01:03:19', '2019-05-07 01:03:19');
INSERT INTO `activity_logs` VALUES ('40', 'User 14 records was updated.', '1', '2019-05-07 01:03:32', '2019-05-07 01:03:32');
INSERT INTO `activity_logs` VALUES ('41', 'User 1 records was updated.', '1', '2019-05-07 01:08:48', '2019-05-07 01:08:48');
INSERT INTO `activity_logs` VALUES ('42', 'Added new user. User ID: ', '1', '2019-05-07 22:47:27', '2019-05-07 22:47:27');
INSERT INTO `activity_logs` VALUES ('43', 'User 4 records was updated.', '1', '2019-05-07 22:47:39', '2019-05-07 22:47:39');
INSERT INTO `activity_logs` VALUES ('44', 'User 4 records was updated.', '1', '2019-05-07 22:47:47', '2019-05-07 22:47:47');
INSERT INTO `activity_logs` VALUES ('45', 'User 4 records was updated.', '1', '2019-05-07 22:50:07', '2019-05-07 22:50:07');
INSERT INTO `activity_logs` VALUES ('46', 'User 2 records was updated.', '1', '2019-05-07 22:50:28', '2019-05-07 22:50:28');
INSERT INTO `activity_logs` VALUES ('47', 'User 2 records was updated.', '1', '2019-05-07 22:50:48', '2019-05-07 22:50:48');
INSERT INTO `activity_logs` VALUES ('48', 'Updated records of personnel 27879.', '1', '2019-05-08 21:42:23', '2019-05-08 21:42:23');
INSERT INTO `activity_logs` VALUES ('49', 'Updated records of personnel 27879.', '1', '2019-05-08 21:43:33', '2019-05-08 21:43:33');
INSERT INTO `activity_logs` VALUES ('50', 'Updated records of personnel 27879.', '1', '2019-05-08 21:43:46', '2019-05-08 21:43:46');
INSERT INTO `activity_logs` VALUES ('51', 'Updated records of personnel 27879.', '1', '2019-05-08 21:44:31', '2019-05-08 21:44:31');
INSERT INTO `activity_logs` VALUES ('52', 'Updated records of personnel 27879.', '1', '2019-05-08 21:44:54', '2019-05-08 21:44:54');
INSERT INTO `activity_logs` VALUES ('53', 'Added new personnel. Employee ID: 234', '1', '2019-05-08 22:43:03', '2019-05-08 22:43:03');
INSERT INTO `activity_logs` VALUES ('54', 'Deleted personnel. Employee ID: 234', '1', '2019-05-08 22:43:57', '2019-05-08 22:43:57');
INSERT INTO `activity_logs` VALUES ('55', 'Added new personnel. Employee ID: 323', '1', '2019-05-08 22:44:05', '2019-05-08 22:44:05');
INSERT INTO `activity_logs` VALUES ('56', 'Personnel 323 information was updated.', '1', '2019-05-08 22:45:13', '2019-05-08 22:45:13');
INSERT INTO `activity_logs` VALUES ('57', 'Deleted personnel. Employee ID: 323', '1', '2019-05-08 22:45:18', '2019-05-08 22:45:18');
INSERT INTO `activity_logs` VALUES ('58', 'New asset has been added. Asset tag: abc123', '1', '2019-05-08 23:39:51', '2019-05-08 23:39:51');
INSERT INTO `activity_logs` VALUES ('59', 'New asset has been added. Asset tag: abcd12', '1', '2019-05-08 23:41:34', '2019-05-08 23:41:34');
INSERT INTO `activity_logs` VALUES ('60', 'New asset has been added. Asset tag: 123123', '1', '2019-05-09 00:33:08', '2019-05-09 00:33:08');
INSERT INTO `activity_logs` VALUES ('61', 'Added new asset status: Available', '1', '2019-05-09 10:53:34', '2019-05-09 10:53:34');
INSERT INTO `activity_logs` VALUES ('62', 'Added new asset category: Land', '1', '2019-05-09 10:55:22', '2019-05-09 10:55:22');
INSERT INTO `activity_logs` VALUES ('63', 'Added new asset category: Building', '1', '2019-05-09 10:55:30', '2019-05-09 10:55:30');
INSERT INTO `activity_logs` VALUES ('64', 'Added new asset category: Machinery', '1', '2019-05-09 10:55:35', '2019-05-09 10:55:35');
INSERT INTO `activity_logs` VALUES ('65', 'Added new asset category: Equipments', '1', '2019-05-09 10:55:42', '2019-05-09 10:55:42');
INSERT INTO `activity_logs` VALUES ('66', 'Added new asset category: Furniture', '1', '2019-05-09 10:56:26', '2019-05-09 10:56:26');
INSERT INTO `activity_logs` VALUES ('67', 'Added new asset category: Electronic Device', '1', '2019-05-09 10:57:01', '2019-05-09 10:57:01');
INSERT INTO `activity_logs` VALUES ('68', 'Asset 123123 was endorsed to ', '1', '2019-05-09 15:47:10', '2019-05-09 15:47:10');
INSERT INTO `activity_logs` VALUES ('69', 'Asset 123123 was endorsed to Bay, Ivan Paul', '1', '2019-05-09 15:53:16', '2019-05-09 15:53:16');
INSERT INTO `activity_logs` VALUES ('70', 'Asset 123456 was endorsed to asf, asdf', '1', '2019-05-09 15:53:42', '2019-05-09 15:53:42');
INSERT INTO `activity_logs` VALUES ('71', 'Asset 444555 was endorsed to Bay, Ivan Paul', '1', '2019-05-09 15:53:50', '2019-05-09 15:53:50');
INSERT INTO `activity_logs` VALUES ('72', 'Asset abc432 was endorsed to Room #4', '1', '2019-05-09 15:54:00', '2019-05-09 15:54:00');
INSERT INTO `activity_logs` VALUES ('73', 'Asset abcd12 was endorsed to Room #3', '1', '2019-05-09 15:54:09', '2019-05-09 15:54:09');
INSERT INTO `activity_logs` VALUES ('74', 'Updated records of personnel 27879.', '1', '2019-05-09 22:54:50', '2019-05-09 22:54:50');
INSERT INTO `activity_logs` VALUES ('75', 'Asset 444555 was endorsed to Bay, Ivan Paul', '1', '2019-05-09 23:21:56', '2019-05-09 23:21:56');
INSERT INTO `activity_logs` VALUES ('76', 'Pulled-out asset: 444555 from Bay, Ivan Paul', '1', '2019-05-09 23:24:45', '2019-05-09 23:24:45');
INSERT INTO `activity_logs` VALUES ('77', 'Pulled-out asset: 444555 from Bay, Ivan Paul', '1', '2019-05-09 23:28:07', '2019-05-09 23:28:07');
INSERT INTO `activity_logs` VALUES ('78', 'Pulled-out asset: 444555 from Bay, Ivan Paul', '1', '2019-05-09 23:31:39', '2019-05-09 23:31:39');
INSERT INTO `activity_logs` VALUES ('79', 'Pulled-out asset: 444555 from Bay, Ivan Paul', '1', '2019-05-09 23:32:49', '2019-05-09 23:32:49');
INSERT INTO `activity_logs` VALUES ('80', 'Asset 123123 was endorsed to Bay, Ivan Paul', '1', '2019-05-09 23:34:47', '2019-05-09 23:34:47');
INSERT INTO `activity_logs` VALUES ('81', 'Asset 123456 was endorsed to asdf, asdf', '1', '2019-05-09 23:34:55', '2019-05-09 23:34:55');
INSERT INTO `activity_logs` VALUES ('82', 'Asset 444555 was endorsed to Bay, Ivan Paul', '1', '2019-05-10 10:44:48', '2019-05-10 10:44:48');
INSERT INTO `activity_logs` VALUES ('83', 'Pulled-out asset: 444555 from Bay, Ivan Paul', '1', '2019-05-10 10:45:05', '2019-05-10 10:45:05');
INSERT INTO `activity_logs` VALUES ('84', 'Pulled-out asset: 123123 from Bay, Ivan Paul', '1', '2019-05-10 10:45:15', '2019-05-10 10:45:15');
INSERT INTO `activity_logs` VALUES ('85', 'Asset 123123 was endorsed to Bay, Ivan Paul', '1', '2019-05-10 10:46:09', '2019-05-10 10:46:09');
INSERT INTO `activity_logs` VALUES ('86', 'Pulled-out asset: 123123 from Bay, Ivan Paul', '1', '2019-05-10 10:46:29', '2019-05-10 10:46:29');
INSERT INTO `activity_logs` VALUES ('87', 'Asset 123123 was endorsed to Bay, Ivan Paul', '1', '2019-05-10 10:48:02', '2019-05-10 10:48:02');
INSERT INTO `activity_logs` VALUES ('88', 'Pulled-out asset: 123123 from Bay, Ivan Paul', '1', '2019-05-10 10:48:17', '2019-05-10 10:48:17');
INSERT INTO `activity_logs` VALUES ('89', 'Pulled-out asset: 123456 from asdf, asdf', '1', '2019-05-10 10:48:54', '2019-05-10 10:48:54');
INSERT INTO `activity_logs` VALUES ('90', 'Asset 123123 was endorsed to Bay, Ivan Paul', '1', '2019-05-10 15:51:04', '2019-05-10 15:51:04');
INSERT INTO `activity_logs` VALUES ('91', 'Asset 444555 was endorsed to asf, asdf', '1', '2019-05-10 23:56:52', '2019-05-10 23:56:52');
INSERT INTO `activity_logs` VALUES ('92', 'Asset 123456 was endorsed to Room #1', '1', '2019-05-10 23:56:59', '2019-05-10 23:56:59');
INSERT INTO `activity_logs` VALUES ('93', 'New asset has been added. Asset tag: 444323', '1', '2019-05-11 01:23:08', '2019-05-11 01:23:08');
INSERT INTO `activity_logs` VALUES ('94', 'New asset has been added. Asset tag: 234', '1', '2019-05-11 01:24:42', '2019-05-11 01:24:42');
INSERT INTO `activity_logs` VALUES ('95', 'New asset has been added. Asset tag: 124512', '1', '2019-05-11 01:31:45', '2019-05-11 01:31:45');
INSERT INTO `activity_logs` VALUES ('96', 'New asset has been added. Asset tag: T47001', '1', '2019-05-11 02:35:08', '2019-05-11 02:35:08');
INSERT INTO `activity_logs` VALUES ('97', 'Deleted asset. Asset tag: 444555', '1', '2019-05-11 15:31:10', '2019-05-11 15:31:10');
INSERT INTO `activity_logs` VALUES ('98', 'Deleted asset. Asset tag: abcd12', '1', '2019-05-11 15:31:14', '2019-05-11 15:31:14');
INSERT INTO `activity_logs` VALUES ('99', 'Asset T47001 was endorsed to Bay, Ivan Paul', '1', '2019-05-11 15:31:38', '2019-05-11 15:31:38');
INSERT INTO `activity_logs` VALUES ('100', 'Asset T47001 has been updated.', '1', '2019-05-11 23:26:11', '2019-05-11 23:26:11');
INSERT INTO `activity_logs` VALUES ('101', 'Asset T47001 has been updated.', '1', '2019-05-11 23:29:54', '2019-05-11 23:29:54');
INSERT INTO `activity_logs` VALUES ('102', 'Asset T47001 has been updated.', '1', '2019-05-11 23:30:11', '2019-05-11 23:30:11');
INSERT INTO `activity_logs` VALUES ('103', 'Asset 123123 has been updated.', '1', '2019-05-11 23:33:41', '2019-05-11 23:33:41');
INSERT INTO `activity_logs` VALUES ('104', 'Asset T47001 has been updated.', '1', '2019-05-11 23:33:54', '2019-05-11 23:33:54');
INSERT INTO `activity_logs` VALUES ('105', 'Asset 123123 has been updated.', '1', '2019-05-11 23:36:26', '2019-05-11 23:36:26');
INSERT INTO `activity_logs` VALUES ('106', 'Asset 123123 has been updated.', '1', '2019-05-11 23:42:18', '2019-05-11 23:42:18');
INSERT INTO `activity_logs` VALUES ('107', 'Pulled-out asset: T47001 from Bay, Ivan Paul', '1', '2019-05-12 00:12:54', '2019-05-12 00:12:54');
INSERT INTO `activity_logs` VALUES ('108', 'Asset T47001 was endorsed to Bay, Ivan Paul', '1', '2019-05-12 00:13:42', '2019-05-12 00:13:42');
INSERT INTO `activity_logs` VALUES ('109', 'Asset 123123 has been updated.', '1', '2019-05-12 00:17:42', '2019-05-12 00:17:42');
INSERT INTO `activity_logs` VALUES ('110', 'Asset 123123 has been updated.', '1', '2019-05-12 00:18:28', '2019-05-12 00:18:28');
INSERT INTO `activity_logs` VALUES ('111', 'Pulled-out asset: 123123 from Bay, Ivan Paul', '1', '2019-05-12 00:18:49', '2019-05-12 00:18:49');
INSERT INTO `activity_logs` VALUES ('112', 'Asset 123123 has been updated.', '1', '2019-05-12 00:19:08', '2019-05-12 00:19:08');
INSERT INTO `activity_logs` VALUES ('113', 'Asset 124512 has been updated.', '1', '2019-05-12 00:36:44', '2019-05-12 00:36:44');
INSERT INTO `activity_logs` VALUES ('114', 'Asset 124512 was endorsed for maintenance.', '1', '2019-05-12 00:43:23', '2019-05-12 00:43:23');
INSERT INTO `activity_logs` VALUES ('115', 'Asset 123123 has been updated.', '1', '2019-05-12 00:44:32', '2019-05-12 00:44:32');
INSERT INTO `activity_logs` VALUES ('116', 'Asset 123123 was endorsed for maintenance.', '1', '2019-05-12 00:44:32', '2019-05-12 00:44:32');
INSERT INTO `activity_logs` VALUES ('117', 'Asset 123123 was endorsed for maintenance.', '1', '2019-05-12 01:01:06', '2019-05-12 01:01:06');
INSERT INTO `activity_logs` VALUES ('118', 'Asset 123123 was endorsed for maintenance.', '1', '2019-05-12 01:01:18', '2019-05-12 01:01:18');
INSERT INTO `activity_logs` VALUES ('119', 'Asset 123123 was endorsed for maintenance.', '1', '2019-05-12 01:01:45', '2019-05-12 01:01:45');
INSERT INTO `activity_logs` VALUES ('120', 'Asset 124512 was endorsed for maintenance.', '1', '2019-05-12 01:05:47', '2019-05-12 01:05:47');
INSERT INTO `activity_logs` VALUES ('121', 'Asset 123123 was endorsed for maintenance.', '1', '2019-05-12 02:12:25', '2019-05-12 02:12:25');
INSERT INTO `activity_logs` VALUES ('122', 'Asset 124512 was endorsed for maintenance.', '1', '2019-05-12 02:12:51', '2019-05-12 02:12:51');
INSERT INTO `activity_logs` VALUES ('123', 'Asset 124512 was endorsed for maintenance.', '1', '2019-05-12 04:16:22', '2019-05-12 04:16:22');
INSERT INTO `activity_logs` VALUES ('124', 'User 2 records was updated.', '1', '2019-05-16 22:52:50', '2019-05-16 22:52:50');
INSERT INTO `activity_logs` VALUES ('125', 'User 2 records was updated.', '1', '2019-05-16 22:53:36', '2019-05-16 22:53:36');
INSERT INTO `activity_logs` VALUES ('126', 'Added new user. User ID: ', '1', '2019-05-18 00:12:11', '2019-05-18 00:12:11');
INSERT INTO `activity_logs` VALUES ('127', 'Added new user. User ID: allocator', '1', '2019-05-18 00:13:38', '2019-05-18 00:13:38');
INSERT INTO `activity_logs` VALUES ('128', 'User 2 records was updated.', '1', '2019-05-18 00:24:31', '2019-05-18 00:24:31');
INSERT INTO `activity_logs` VALUES ('129', 'Added new user. User ID: ', '1', '2019-05-18 00:25:00', '2019-05-18 00:25:00');
INSERT INTO `activity_logs` VALUES ('130', 'Added new user. User ID: Technician', '1', '2019-05-18 00:25:28', '2019-05-18 00:25:28');
INSERT INTO `activity_logs` VALUES ('131', 'Asset 124512 has been updated.', '1', '2019-05-19 01:12:53', '2019-05-19 01:12:53');
INSERT INTO `activity_logs` VALUES ('132', 'User Adminstrator updated it\'s profile.', '1', '2019-05-19 03:53:34', '2019-05-19 03:53:34');
INSERT INTO `activity_logs` VALUES ('133', 'User Adminstrator updated it\'s profile.', '1', '2019-05-19 03:53:39', '2019-05-19 03:53:39');
INSERT INTO `activity_logs` VALUES ('134', 'User Adminstrator 2 updated it\'s profile.', '1', '2019-05-19 03:53:52', '2019-05-19 03:53:52');
INSERT INTO `activity_logs` VALUES ('135', 'User Adminstrator updated it\'s profile.', '1', '2019-05-19 03:54:01', '2019-05-19 03:54:01');
INSERT INTO `activity_logs` VALUES ('136', 'User Adminstrator updated it\'s profile.', '1', '2019-05-19 03:54:21', '2019-05-19 03:54:21');
INSERT INTO `activity_logs` VALUES ('137', 'User Adminstrator updated it\'s profile.', '1', '2019-05-19 03:54:48', '2019-05-19 03:54:48');
INSERT INTO `activity_logs` VALUES ('138', 'User Adminstrator updated it\'s profile.', '1', '2019-05-19 03:57:09', '2019-05-19 03:57:09');
INSERT INTO `activity_logs` VALUES ('139', 'Asset T47001 has been updated.', '1', '2019-05-20 23:45:10', '2019-05-20 23:45:10');
INSERT INTO `activity_logs` VALUES ('140', 'Asset T47001 has been updated.', '1', '2019-05-20 23:45:47', '2019-05-20 23:45:47');
INSERT INTO `activity_logs` VALUES ('141', 'Asset T47001 has been updated.', '1', '2019-05-20 23:46:58', '2019-05-20 23:46:58');
INSERT INTO `activity_logs` VALUES ('142', 'Asset T47001 has been updated.', '1', '2019-05-20 23:47:11', '2019-05-20 23:47:11');
INSERT INTO `activity_logs` VALUES ('143', 'Asset T47001 has been updated.', '1', '2019-05-20 23:48:59', '2019-05-20 23:48:59');
INSERT INTO `activity_logs` VALUES ('144', 'New asset has been added. Asset tag: T23234', '1', '2019-05-21 22:48:37', '2019-05-21 22:48:37');
INSERT INTO `activity_logs` VALUES ('145', 'Asset T23234 has been updated.', '1', '2019-05-21 22:49:28', '2019-05-21 22:49:28');
INSERT INTO `activity_logs` VALUES ('146', 'Deleted asset. Asset tag: T23234', '1', '2019-05-21 22:52:41', '2019-05-21 22:52:41');
INSERT INTO `activity_logs` VALUES ('147', 'New asset has been added. Asset tag: 117003323', '1', '2019-05-21 22:53:11', '2019-05-21 22:53:11');
INSERT INTO `activity_logs` VALUES ('148', 'New asset has been added. Asset tag: T23234', '1', '2019-05-21 22:54:44', '2019-05-21 22:54:44');
INSERT INTO `activity_logs` VALUES ('149', 'Asset T23234 has been updated.', '1', '2019-05-21 22:56:37', '2019-05-21 22:56:37');
INSERT INTO `activity_logs` VALUES ('150', 'Asset T23234 has been updated.', '1', '2019-05-21 22:56:55', '2019-05-21 22:56:55');
INSERT INTO `activity_logs` VALUES ('151', 'Added new location: Storage Room', '1', '2019-05-21 23:00:55', '2019-05-21 23:00:55');
INSERT INTO `activity_logs` VALUES ('152', 'Asset T23234 has been updated.', '1', '2019-05-21 23:01:17', '2019-05-21 23:01:17');
INSERT INTO `activity_logs` VALUES ('153', 'Asset T47001 has been updated.', '1', '2019-05-21 23:56:58', '2019-05-21 23:56:58');
INSERT INTO `activity_logs` VALUES ('154', 'Asset T47001 has been updated.', '1', '2019-05-22 00:00:37', '2019-05-22 00:00:37');
INSERT INTO `activity_logs` VALUES ('155', 'Asset T47001 has been updated.', '1', '2019-05-22 10:30:57', '2019-05-22 10:30:57');
INSERT INTO `activity_logs` VALUES ('156', 'Asset 123123 was endorsed to Room #4', '1', '2019-05-23 16:38:04', '2019-05-23 16:38:04');
INSERT INTO `activity_logs` VALUES ('157', 'Asset 123123 was endorsed to Room #4', '1', '2019-05-25 15:08:44', '2019-05-25 15:08:44');
INSERT INTO `activity_logs` VALUES ('158', 'Asset 123123 was endorsed to Room #4', '1', '2019-05-25 15:12:29', '2019-05-25 15:12:29');
INSERT INTO `activity_logs` VALUES ('159', 'Asset 123123 was endorsed to Room #4', '1', '2019-05-25 15:13:10', '2019-05-25 15:13:10');
INSERT INTO `activity_logs` VALUES ('160', 'Pulled-out asset: 123123 from 2', '1', '2019-05-25 15:14:40', '2019-05-25 15:14:40');
INSERT INTO `activity_logs` VALUES ('161', 'Pulled-out asset: 123123 from 2', '1', '2019-05-25 15:14:42', '2019-05-25 15:14:42');
INSERT INTO `activity_logs` VALUES ('162', 'Pulled-out asset: 123123 from 2', '1', '2019-05-25 15:17:22', '2019-05-25 15:17:22');
INSERT INTO `activity_logs` VALUES ('163', 'Pulled-out asset: 123123 from 2', '1', '2019-05-25 15:17:48', '2019-05-25 15:17:48');
INSERT INTO `activity_logs` VALUES ('164', 'Pulled-out asset: 123123 from {\"id\":2,\"name\":\"Room #4\",\"created_at\":\"2019-04-21 15:13:08\",\"updated_at\":\"2019-04-27 17:35:08\"}', '1', '2019-05-25 15:21:48', '2019-05-25 15:21:48');
INSERT INTO `activity_logs` VALUES ('165', 'Pulled-out asset: 123123 from {\"id\":2,\"name\":\"Room #4\",\"created_at\":\"2019-04-21 15:13:08\",\"updated_at\":\"2019-04-27 17:35:08\"}', '1', '2019-05-25 15:21:53', '2019-05-25 15:21:53');
INSERT INTO `activity_logs` VALUES ('166', 'Pulled-out asset: 123123 from {\"id\":2,\"name\":\"Room #4\",\"created_at\":\"2019-04-21 15:13:08\",\"updated_at\":\"2019-04-27 17:35:08\"}', '1', '2019-05-25 15:22:04', '2019-05-25 15:22:04');
INSERT INTO `activity_logs` VALUES ('167', 'Pulled-out asset: 123123 from {\"id\":2,\"name\":\"Room #4\",\"created_at\":\"2019-04-21 15:13:08\",\"updated_at\":\"2019-04-27 17:35:08\"}', '1', '2019-05-25 15:22:38', '2019-05-25 15:22:38');
INSERT INTO `activity_logs` VALUES ('168', 'Pulled-out asset: 123123 from {\"id\":2,\"name\":\"Room #4\",\"created_at\":\"2019-04-21 15:13:08\",\"updated_at\":\"2019-04-27 17:35:08\"}', '1', '2019-05-25 15:23:58', '2019-05-25 15:23:58');
INSERT INTO `activity_logs` VALUES ('169', 'Pulled-out asset: 123123 from {\"id\":2,\"name\":\"Room #4\",\"created_at\":\"2019-04-21 15:13:08\",\"updated_at\":\"2019-04-27 17:35:08\"}', '1', '2019-05-25 15:24:43', '2019-05-25 15:24:43');
INSERT INTO `activity_logs` VALUES ('170', 'Pulled-out asset: 123123 from {\"id\":2,\"name\":\"Room #4\",\"created_at\":\"2019-04-21 15:13:08\",\"updated_at\":\"2019-04-27 17:35:08\"}', '1', '2019-05-25 15:24:50', '2019-05-25 15:24:50');
INSERT INTO `activity_logs` VALUES ('171', 'Pulled-out asset: 123123 from {\"id\":2,\"name\":\"Room #4\",\"created_at\":\"2019-04-21 15:13:08\",\"updated_at\":\"2019-04-27 17:35:08\"}', '1', '2019-05-25 15:25:42', '2019-05-25 15:25:42');
INSERT INTO `activity_logs` VALUES ('172', 'Pulled-out asset: 123123 from {\"id\":2,\"name\":\"Room #4\",\"created_at\":\"2019-04-21 15:13:08\",\"updated_at\":\"2019-04-27 17:35:08\"}', '1', '2019-05-25 15:25:57', '2019-05-25 15:25:57');
INSERT INTO `activity_logs` VALUES ('173', 'Pulled-out asset: 123123 from {\"id\":2,\"name\":\"Room #4\",\"created_at\":\"2019-04-21 15:13:08\",\"updated_at\":\"2019-04-27 17:35:08\"}', '1', '2019-05-25 15:26:48', '2019-05-25 15:26:48');
INSERT INTO `activity_logs` VALUES ('174', 'Pulled-out asset: 123123 from Room #4', '1', '2019-05-25 15:27:28', '2019-05-25 15:27:28');
INSERT INTO `activity_logs` VALUES ('175', 'Asset 123123 was endorsed to Room #4', '1', '2019-05-25 15:36:34', '2019-05-25 15:36:34');
INSERT INTO `activity_logs` VALUES ('176', 'Pulled-out asset: 123123 from Room #4', '1', '2019-05-25 15:39:15', '2019-05-25 15:39:15');
INSERT INTO `activity_logs` VALUES ('177', 'Asset 123123 was endorsed to Room #1', '1', '2019-05-25 15:39:36', '2019-05-25 15:39:36');
INSERT INTO `activity_logs` VALUES ('178', 'Pulled-out asset: 123123 from Room #1', '1', '2019-05-25 15:43:55', '2019-05-25 15:43:55');
INSERT INTO `activity_logs` VALUES ('179', 'Asset 123123 was endorsed to Room #1', '1', '2019-05-25 15:44:15', '2019-05-25 15:44:15');
INSERT INTO `activity_logs` VALUES ('180', 'Asset T23234 was endorsed to Bay, Ivan Paul', '4', '2019-05-25 15:45:29', '2019-05-25 15:45:29');
INSERT INTO `activity_logs` VALUES ('181', 'New supplier, Maxim has been added.', '1', '2019-06-03 17:51:32', '2019-06-03 17:51:32');
INSERT INTO `activity_logs` VALUES ('182', 'New supplier, New has been added.', '1', '2019-06-03 17:52:50', '2019-06-03 17:52:50');
INSERT INTO `activity_logs` VALUES ('183', 'Supplier Nestle records was updated.', '1', '2019-06-04 06:55:00', '2019-06-04 06:55:00');
INSERT INTO `activity_logs` VALUES ('184', 'New supplier, nge has been added.', '1', '2019-06-04 06:55:29', '2019-06-04 06:55:29');
INSERT INTO `activity_logs` VALUES ('185', 'New asset has been added. Asset tag: asdfr234e', '1', '2019-06-04 07:46:12', '2019-06-04 07:46:12');
INSERT INTO `activity_logs` VALUES ('186', 'New asset has been added. Asset tag: 11700333', '1', '2019-06-09 23:12:23', '2019-06-09 23:12:23');
INSERT INTO `activity_logs` VALUES ('187', 'New license has been registered. License Key: asd', '1', '2019-06-10 01:08:42', '2019-06-10 01:08:42');
INSERT INTO `activity_logs` VALUES ('188', 'New license has been registered. License Key: test', '1', '2019-06-10 01:10:18', '2019-06-10 01:10:18');
INSERT INTO `activity_logs` VALUES ('189', 'New license has been registered. License Key: test', '1', '2019-06-10 01:31:54', '2019-06-10 01:31:54');
INSERT INTO `activity_logs` VALUES ('190', 'New license has been registered. License Key: test', '1', '2019-06-10 01:32:05', '2019-06-10 01:32:05');
INSERT INTO `activity_logs` VALUES ('191', 'New license has been registered. License Key: test', '1', '2019-06-10 01:32:36', '2019-06-10 01:32:36');
INSERT INTO `activity_logs` VALUES ('192', 'license key test has been updated.', '1', '2019-06-10 01:40:30', '2019-06-10 01:40:30');
INSERT INTO `activity_logs` VALUES ('193', 'license key test has been updated.', '1', '2019-06-10 01:40:46', '2019-06-10 01:40:46');
INSERT INTO `activity_logs` VALUES ('194', 'license key test has been updated.', '1', '2019-06-10 01:41:02', '2019-06-10 01:41:02');
INSERT INTO `activity_logs` VALUES ('195', 'license key test 2 has been updated.', '1', '2019-06-10 01:41:12', '2019-06-10 01:41:12');
INSERT INTO `activity_logs` VALUES ('196', 'license key test 2 has been updated.', '1', '2019-06-10 01:41:25', '2019-06-10 01:41:25');
INSERT INTO `activity_logs` VALUES ('197', 'license key test 2 has been updated.', '1', '2019-06-10 01:43:59', '2019-06-10 01:43:59');
INSERT INTO `activity_logs` VALUES ('198', 'license key test 2 has been updated.', '1', '2019-06-10 01:44:18', '2019-06-10 01:44:18');
INSERT INTO `activity_logs` VALUES ('199', 'license key test 2 has been updated.', '1', '2019-06-10 01:45:09', '2019-06-10 01:45:09');
INSERT INTO `activity_logs` VALUES ('200', 'Asset asdfr234e was endorsed to Room #1', '1', '2019-06-10 16:46:52', '2019-06-10 16:46:52');
INSERT INTO `activity_logs` VALUES ('201', 'Pulled-out asset: 123456 from Room #1', '1', '2019-06-10 16:52:00', '2019-06-10 16:52:00');
INSERT INTO `activity_logs` VALUES ('202', 'New asset has been added. Asset tag: 117003', '1', '2019-06-10 23:36:18', '2019-06-10 23:36:18');
INSERT INTO `activity_logs` VALUES ('203', 'New asset has been added. Asset tag: 117003asdf', '1', '2019-06-10 23:38:10', '2019-06-10 23:38:10');
INSERT INTO `activity_logs` VALUES ('204', 'New asset has been added. Asset tag: 117003yut', '1', '2019-06-10 23:42:05', '2019-06-10 23:42:05');
INSERT INTO `activity_logs` VALUES ('205', 'Asset 117003yut has been updated.', '1', '2019-06-11 00:00:52', '2019-06-11 00:00:52');
INSERT INTO `activity_logs` VALUES ('206', 'Asset 117003yut has been updated.', '1', '2019-06-11 00:02:06', '2019-06-11 00:02:06');
INSERT INTO `activity_logs` VALUES ('207', 'Asset 117003asdf has been updated.', '1', '2019-06-11 00:02:45', '2019-06-11 00:02:45');
INSERT INTO `activity_logs` VALUES ('208', 'License test 2 was endorsed to 117003asdf', '1', '2019-06-11 00:37:15', '2019-06-11 00:37:15');
INSERT INTO `activity_logs` VALUES ('209', 'New license has been registered. License Key: TEDLKjhD098', '1', '2019-06-11 01:10:02', '2019-06-11 01:10:02');
INSERT INTO `activity_logs` VALUES ('210', 'License TEDLKjhD098 was endorsed to 117003asdf', '1', '2019-06-13 00:01:59', '2019-06-13 00:01:59');
INSERT INTO `activity_logs` VALUES ('211', 'Pulled-out license: 4 from 117003asdf', '1', '2019-06-13 00:02:11', '2019-06-13 00:02:11');
INSERT INTO `activity_logs` VALUES ('212', 'License TEDLKjhD098 was endorsed to 117003asdf', '1', '2019-06-13 00:03:21', '2019-06-13 00:03:21');
INSERT INTO `activity_logs` VALUES ('213', 'Pulled-out license: TEDLKjhD098 from 117003asdf', '1', '2019-06-13 00:04:46', '2019-06-13 00:04:46');
INSERT INTO `activity_logs` VALUES ('214', 'New license has been registered. License Key: dasdfsdfg4', '1', '2019-07-16 11:09:28', '2019-07-16 11:09:28');
INSERT INTO `activity_logs` VALUES ('215', 'License dasdfsdfg4 was endorsed to 117003asdf', '1', '2019-07-17 13:25:31', '2019-07-17 13:25:31');
INSERT INTO `activity_logs` VALUES ('216', 'License dasdfsdfg4 was endorsed to 117003yut', '1', '2019-07-17 13:37:46', '2019-07-17 13:37:46');
INSERT INTO `activity_logs` VALUES ('217', 'license key TEDLKjhD098 has been updated.', '1', '2019-07-17 13:55:28', '2019-07-17 13:55:28');
INSERT INTO `activity_logs` VALUES ('218', 'license key TEDLKjhD098 has been updated.', '1', '2019-07-17 13:56:19', '2019-07-17 13:56:19');
INSERT INTO `activity_logs` VALUES ('219', 'license key TEDLKjhD098 has been updated.', '1', '2019-07-17 13:57:59', '2019-07-17 13:57:59');
INSERT INTO `activity_logs` VALUES ('220', 'license key TEDLKjhD098 has been updated.', '1', '2019-07-17 13:58:13', '2019-07-17 13:58:13');
INSERT INTO `activity_logs` VALUES ('221', 'license key test 2 has been updated.', '1', '2019-07-17 13:58:27', '2019-07-17 13:58:27');
INSERT INTO `activity_logs` VALUES ('222', 'license key test 2 has been updated.', '1', '2019-07-17 13:59:00', '2019-07-17 13:59:00');
INSERT INTO `activity_logs` VALUES ('223', 'License test 2 was endorsed to 117003asdf', '1', '2019-07-17 14:03:12', '2019-07-17 14:03:12');
INSERT INTO `activity_logs` VALUES ('224', 'License dasdfsdfg4 was endorsed to 117003yut', '1', '2019-07-17 14:03:26', '2019-07-17 14:03:26');
INSERT INTO `activity_logs` VALUES ('225', 'License dasdfsdfg4 was endorsed to 117003asdf', '1', '2019-07-17 14:10:22', '2019-07-17 14:10:22');
INSERT INTO `activity_logs` VALUES ('226', 'License dasdfsdfg4 was endorsed to 117003asdf', '1', '2019-07-17 14:12:40', '2019-07-17 14:12:40');
INSERT INTO `activity_logs` VALUES ('227', 'License test 2 was endorsed to 117003yut', '1', '2019-07-17 14:13:10', '2019-07-17 14:13:10');
INSERT INTO `activity_logs` VALUES ('228', 'License TEDLKjhD098 was endorsed to 117003asdf', '1', '2019-07-17 14:14:37', '2019-07-17 14:14:37');
INSERT INTO `activity_logs` VALUES ('229', 'License test 2 was endorsed to 117003asdf', '1', '2019-07-17 14:15:52', '2019-07-17 14:15:52');
INSERT INTO `activity_logs` VALUES ('230', 'License test 2 was endorsed to 117003asdf', '1', '2019-07-17 14:17:09', '2019-07-17 14:17:09');
INSERT INTO `activity_logs` VALUES ('231', 'License test 2 was endorsed to 117003asdf', '1', '2019-07-17 14:19:20', '2019-07-17 14:19:20');
INSERT INTO `activity_logs` VALUES ('232', 'License dasdfsdfg4 was endorsed to 117003asdf', '1', '2019-07-17 14:21:16', '2019-07-17 14:21:16');
INSERT INTO `activity_logs` VALUES ('233', 'License dasdfsdfg4 was endorsed to 117003asdf', '1', '2019-07-17 14:24:20', '2019-07-17 14:24:20');
INSERT INTO `activity_logs` VALUES ('234', 'License dasdfsdfg4 was endorsed to 117003yut', '1', '2019-07-17 14:24:29', '2019-07-17 14:24:29');
INSERT INTO `activity_logs` VALUES ('235', 'License dasdfsdfg4 was endorsed to 117003asdf', '1', '2019-07-17 14:29:43', '2019-07-17 14:29:43');
INSERT INTO `activity_logs` VALUES ('236', 'License dasdfsdfg4 was endorsed to 117003yut', '1', '2019-07-17 14:31:56', '2019-07-17 14:31:56');
INSERT INTO `activity_logs` VALUES ('237', 'Pulled-out license: dasdfsdfg4 from 117003asdf', '1', '2019-07-17 15:17:43', '2019-07-17 15:17:43');
INSERT INTO `activity_logs` VALUES ('238', 'License dasdfsdfg4 was endorsed to 117003asdf', '1', '2019-07-17 15:19:51', '2019-07-17 15:19:51');
INSERT INTO `activity_logs` VALUES ('239', 'License dasdfsdfg4 was endorsed to 117003yut', '1', '2019-07-17 15:20:01', '2019-07-17 15:20:01');
INSERT INTO `activity_logs` VALUES ('240', 'License dasdfsdfg4 was endorsed to 117003asdf', '1', '2019-07-17 15:28:06', '2019-07-17 15:28:06');
INSERT INTO `activity_logs` VALUES ('241', 'Pulled-out license: dasdfsdfg4 from 117003asdf', '1', '2019-07-17 15:30:06', '2019-07-17 15:30:06');
INSERT INTO `activity_logs` VALUES ('242', 'Pulled-out license: dasdfsdfg4 from 117003yut', '1', '2019-07-17 15:30:24', '2019-07-17 15:30:24');
INSERT INTO `activity_logs` VALUES ('243', 'New supplier, Microsoft has been added.', '1', '2019-07-19 17:22:41', '2019-07-19 17:22:41');
INSERT INTO `activity_logs` VALUES ('244', 'New license has been registered. License Key: asdfknyun98320973', '1', '2019-07-24 22:36:33', '2019-07-24 22:36:33');
INSERT INTO `activity_logs` VALUES ('245', 'license key asdfknyun98320973 has been updated.', '1', '2019-07-24 22:36:50', '2019-07-24 22:36:50');
INSERT INTO `activity_logs` VALUES ('246', 'license key asdfknyun98320973 has been updated.', '1', '2019-07-24 22:37:50', '2019-07-24 22:37:50');
INSERT INTO `activity_logs` VALUES ('247', 'Asset abc432 has been updated.', '1', '2019-09-18 21:42:44', '2019-09-18 21:42:44');
INSERT INTO `activity_logs` VALUES ('248', 'Asset 117003asdf has been updated.', '1', '2019-09-18 21:45:15', '2019-09-18 21:45:15');
INSERT INTO `activity_logs` VALUES ('249', 'license key dasdfsdfg4 has been updated.', '1', '2019-09-19 08:27:10', '2019-09-19 08:27:10');
INSERT INTO `activity_logs` VALUES ('250', 'license key dasdfsdfg4 has been updated.', '1', '2019-09-19 08:31:46', '2019-09-19 08:31:46');
INSERT INTO `activity_logs` VALUES ('251', 'license key dasdfsdfg4 has been updated.', '1', '2019-09-19 08:32:03', '2019-09-19 08:32:03');
INSERT INTO `activity_logs` VALUES ('252', 'license key dasdfsdfg4 has been updated.', '1', '2019-09-19 08:32:37', '2019-09-19 08:32:37');
INSERT INTO `activity_logs` VALUES ('253', 'license key dasdfsdfg4 has been updated.', '1', '2019-09-19 08:39:03', '2019-09-19 08:39:03');
INSERT INTO `activity_logs` VALUES ('254', 'Asset 117003asdf was endorsed to Bay, Ivan Paul', '1', '2019-11-02 00:08:27', '2019-11-02 00:08:27');
INSERT INTO `activity_logs` VALUES ('255', 'Change settings', '1', '2019-11-08 10:01:54', '2019-11-08 10:01:54');
INSERT INTO `activity_logs` VALUES ('256', 'Change settings', '1', '2019-11-08 10:04:56', '2019-11-08 10:04:56');
INSERT INTO `activity_logs` VALUES ('257', 'Change settings', '1', '2019-11-08 10:11:12', '2019-11-08 10:11:12');
INSERT INTO `activity_logs` VALUES ('258', 'Change settings', '1', '2019-11-08 10:14:22', '2019-11-08 10:14:22');
INSERT INTO `activity_logs` VALUES ('259', 'Change settings', '1', '2019-11-08 10:16:13', '2019-11-08 10:16:13');
INSERT INTO `activity_logs` VALUES ('260', 'Change settings', '1', '2019-11-08 10:17:13', '2019-11-08 10:17:13');
INSERT INTO `activity_logs` VALUES ('261', 'Change settings', '1', '2019-11-08 10:17:20', '2019-11-08 10:17:20');
INSERT INTO `activity_logs` VALUES ('262', 'Change settings', '1', '2019-11-08 10:19:20', '2019-11-08 10:19:20');
INSERT INTO `activity_logs` VALUES ('263', 'Change settings', '1', '2019-11-08 10:24:15', '2019-11-08 10:24:15');
INSERT INTO `activity_logs` VALUES ('264', 'Change settings', '1', '2019-11-08 10:26:10', '2019-11-08 10:26:10');
INSERT INTO `activity_logs` VALUES ('265', 'Change settings', '1', '2019-11-08 10:27:54', '2019-11-08 10:27:54');
INSERT INTO `activity_logs` VALUES ('266', 'Change settings', '1', '2019-11-08 10:35:22', '2019-11-08 10:35:22');
INSERT INTO `activity_logs` VALUES ('267', 'Change settings', '1', '2019-11-08 10:36:30', '2019-11-08 10:36:30');
INSERT INTO `activity_logs` VALUES ('268', 'Change settings', '1', '2019-11-08 10:38:46', '2019-11-08 10:38:46');
INSERT INTO `activity_logs` VALUES ('269', 'Change settings', '1', '2019-11-08 10:38:54', '2019-11-08 10:38:54');
INSERT INTO `activity_logs` VALUES ('270', 'Change settings', '1', '2019-11-08 10:39:06', '2019-11-08 10:39:06');
INSERT INTO `activity_logs` VALUES ('271', 'Change settings', '1', '2019-11-08 10:39:20', '2019-11-08 10:39:20');
INSERT INTO `activity_logs` VALUES ('272', 'Change settings', '1', '2019-11-08 10:40:19', '2019-11-08 10:40:19');
INSERT INTO `activity_logs` VALUES ('273', 'Change settings', '1', '2019-11-08 10:40:32', '2019-11-08 10:40:32');
INSERT INTO `activity_logs` VALUES ('274', 'Change settings', '1', '2019-11-08 10:41:21', '2019-11-08 10:41:21');
INSERT INTO `activity_logs` VALUES ('275', 'Change settings', '1', '2019-11-08 10:41:44', '2019-11-08 10:41:44');
INSERT INTO `activity_logs` VALUES ('276', 'Change settings', '1', '2019-11-08 10:43:02', '2019-11-08 10:43:02');
INSERT INTO `activity_logs` VALUES ('277', 'Change settings', '1', '2019-11-08 10:43:12', '2019-11-08 10:43:12');
INSERT INTO `activity_logs` VALUES ('278', 'Change settings', '1', '2019-11-08 14:44:53', '2019-11-08 14:44:53');
INSERT INTO `activity_logs` VALUES ('279', 'Change settings', '1', '2019-11-08 15:00:45', '2019-11-08 15:00:45');
INSERT INTO `activity_logs` VALUES ('280', 'Change settings', '1', '2019-11-08 15:00:59', '2019-11-08 15:00:59');
INSERT INTO `activity_logs` VALUES ('281', 'Change settings', '1', '2019-11-08 15:01:09', '2019-11-08 15:01:09');
INSERT INTO `activity_logs` VALUES ('282', 'Change settings', '1', '2019-11-08 15:11:35', '2019-11-08 15:11:35');
INSERT INTO `activity_logs` VALUES ('283', 'Change settings', '1', '2019-11-08 15:11:46', '2019-11-08 15:11:46');
INSERT INTO `activity_logs` VALUES ('284', 'Change settings', '1', '2019-11-08 15:11:58', '2019-11-08 15:11:58');
INSERT INTO `activity_logs` VALUES ('285', 'Change settings', '1', '2019-11-08 15:12:18', '2019-11-08 15:12:18');
INSERT INTO `activity_logs` VALUES ('286', 'Change settings', '1', '2019-11-08 15:15:41', '2019-11-08 15:15:41');
INSERT INTO `activity_logs` VALUES ('287', 'Change settings', '1', '2019-11-08 15:16:42', '2019-11-08 15:16:42');
INSERT INTO `activity_logs` VALUES ('288', 'Change settings', '1', '2019-11-08 15:21:01', '2019-11-08 15:21:01');
INSERT INTO `activity_logs` VALUES ('289', 'Change settings', '1', '2019-11-08 15:21:38', '2019-11-08 15:21:38');
INSERT INTO `activity_logs` VALUES ('290', 'Change settings', '1', '2019-11-08 15:22:24', '2019-11-08 15:22:24');
INSERT INTO `activity_logs` VALUES ('291', 'Change settings', '1', '2019-11-08 17:42:42', '2019-11-08 17:42:42');
INSERT INTO `activity_logs` VALUES ('292', 'Change settings', '1', '2019-11-08 23:47:40', '2019-11-08 23:47:40');
INSERT INTO `activity_logs` VALUES ('293', 'Change settings', '1', '2019-11-09 08:55:04', '2019-11-09 08:55:04');
INSERT INTO `activity_logs` VALUES ('294', 'Change settings', '1', '2019-11-09 08:59:57', '2019-11-09 08:59:57');
INSERT INTO `activity_logs` VALUES ('295', 'Change settings', '1', '2019-11-09 09:00:47', '2019-11-09 09:00:47');
INSERT INTO `activity_logs` VALUES ('296', 'Change settings', '1', '2019-11-09 09:17:07', '2019-11-09 09:17:07');
INSERT INTO `activity_logs` VALUES ('297', 'Change settings', '1', '2019-11-09 09:17:31', '2019-11-09 09:17:31');
INSERT INTO `activity_logs` VALUES ('298', 'Change settings', '1', '2019-11-19 14:17:17', '2019-11-19 14:17:17');
INSERT INTO `activity_logs` VALUES ('299', 'New asset has been added. Asset tag: 117003dfad', '1', '2019-11-19 14:59:53', '2019-11-19 14:59:53');
INSERT INTO `activity_logs` VALUES ('300', 'Change settings', '1', '2019-11-19 17:41:17', '2019-11-19 17:41:17');
INSERT INTO `activity_logs` VALUES ('301', 'Change settings', '1', '2019-11-19 17:44:10', '2019-11-19 17:44:10');
INSERT INTO `activity_logs` VALUES ('302', 'Change settings', '1', '2019-11-20 23:18:17', '2019-11-20 23:18:17');
INSERT INTO `activity_logs` VALUES ('303', 'Change settings', '1', '2019-11-21 14:43:17', '2019-11-21 14:43:17');

-- ----------------------------
-- Table structure for `assets`
-- ----------------------------
DROP TABLE IF EXISTS `assets`;
CREATE TABLE `assets` (
  `tag` varchar(10) NOT NULL,
  `category` tinyint(1) DEFAULT NULL,
  `brand` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `serial` varchar(50) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `purchasedDate` datetime DEFAULT NULL,
  `purchasedCost` decimal(10,0) DEFAULT NULL,
  `orderingPoint` tinyint(5) DEFAULT NULL,
  `getOrderNotified` tinyint(4) DEFAULT NULL,
  `supplier_id` tinyint(3) DEFAULT NULL,
  `or_no` int(10) DEFAULT NULL,
  `invoice_no` int(15) DEFAULT NULL,
  `po_no` int(15) DEFAULT NULL,
  `lifespan` int(5) DEFAULT NULL,
  `lifespan_format` varchar(5) DEFAULT NULL,
  `warranty` tinyint(5) DEFAULT NULL,
  `assigned_to` tinyint(5) DEFAULT NULL,
  `location` tinyint(3) DEFAULT NULL,
  `isRequireLicense` tinyint(4) DEFAULT '0',
  `notes` char(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`tag`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of assets
-- ----------------------------
INSERT INTO `assets` VALUES ('117003', '6', null, null, '8', 'asdf', 'as', 'asdf', '2019-05-03 00:00:00', '3423', null, '0', '1', null, null, null, '10', 'year', '12', null, '4', '0', null, '2019-11-19 15:50:14', '2019-11-19 15:50:14');
INSERT INTO `assets` VALUES ('117003323', '6', 'fasd', 'asd', '8', 'ivan.bay', null, 'asdf', '0003-01-09 00:00:00', null, null, '0', null, null, null, null, '10', 'year', null, null, '4', '0', null, '2019-11-19 15:50:15', '2019-11-19 15:50:15');
INSERT INTO `assets` VALUES ('11700333', '6', 'as', 'asd', '1', 'asd', 'asd3', 'asd', '2019-05-03 00:00:00', '3423', null, '0', '1', '423', '234123', '234', '10', 'year', '12', null, '7', '0', 'asdf', '2019-11-19 15:50:15', '2019-11-19 15:50:15');
INSERT INTO `assets` VALUES ('117003asdf', '6', 'Huawei', 'asd', '6', 'ivan.bay', 'asdf', 'asdf', '2002-05-20 00:00:00', '3423', null, '0', '1', null, null, null, '10', 'year', '1', null, '7', '1', null, '2019-11-19 15:50:16', '2019-11-19 15:50:16');
INSERT INTO `assets` VALUES ('117003dfad', '2', 'fasd', 'dfas', '8', 'hhh', 'S02094845UDS3840', 'hhhh', '2019-11-13 00:00:00', '12', null, '0', '4', '423', '234123', '234', '12', 'day', '2', null, '8', '0', 'test', '2019-11-19 17:19:26', '2019-11-19 17:19:26');
INSERT INTO `assets` VALUES ('117003yut', '6', 'Huawei', 'asd', '8', 'ivan.bay', 'asdf', 'asdf', '2002-05-20 00:00:00', '3423', null, '0', '3', null, null, null, '10', 'year', null, null, '3', '1', null, '2019-11-19 15:50:16', '2019-11-19 15:50:16');
INSERT INTO `assets` VALUES ('123123', '3', 'LG', 'LG201920', '6', 'LG Air Conditioner LG201920', 'S02123812987324', 'LG Air Conditioner 1hp', '2002-05-20 00:00:00', '40000', null, '0', null, null, null, null, null, 'year', '12', null, '4', '0', null, '2019-11-19 15:50:17', '2019-11-19 15:50:17');
INSERT INTO `assets` VALUES ('124512', '5', 'brand', 'model', '1', 'asdf', null, 'asdf', '2019-05-08 00:00:00', null, null, '0', null, null, null, null, null, 'year', null, null, '4', '0', null, '2019-11-19 15:50:17', '2019-11-19 15:50:17');
INSERT INTO `assets` VALUES ('234', '6', null, null, '7', 'asdf', null, 'asdf', '2019-05-16 00:00:00', null, null, '0', null, null, null, null, null, 'year', null, null, '7', '0', null, '2019-11-19 15:50:17', '2019-11-19 15:50:17');
INSERT INTO `assets` VALUES ('444323', '6', 'asdf', null, '8', 'asdf', null, 'asdf', '2019-05-16 00:00:00', null, null, '0', null, null, null, null, null, 'year', null, null, '3', '0', 'asdf', '2019-11-19 15:50:18', '2019-11-19 15:50:18');
INSERT INTO `assets` VALUES ('abc432', '1', 'new brand', 'Testing description', '6', 'Testing Name', null, 'asdf', '2019-05-09 00:00:00', null, null, '0', '1', null, null, null, '15', 'year', '2', null, '7', '0', null, '2019-11-19 15:50:18', '2019-11-19 15:50:18');
INSERT INTO `assets` VALUES ('asdfr234e', '5', 'asdf', 'asf', '6', 'asf', 'asf', 'asf', '2019-05-03 00:00:00', '3423', null, '0', '1', '423', '234123', '234', '10', 'year', '12', null, '3', '0', 'asf', '2019-11-19 15:50:18', '2019-11-19 15:50:18');
INSERT INTO `assets` VALUES ('T23234', '6', 'Huawei', 'Mate 20 Pro', '6', 'Huawei Mate 20 Pro', '832347098700H0aBF887', 'Huawei Mate 20 Pro mobile phone', '2019-05-20 00:00:00', '40000', null, '0', null, null, null, null, '10', 'year', '12', null, '8', '0', 'Sample note', '2019-11-19 15:50:19', '2019-11-19 15:50:19');
INSERT INTO `assets` VALUES ('T47001', '6', 'Lenovo', 'T470', '6', 'Laptop Lenovo T470', 'S02094845UDS3840', 'Laptop Lenove T470 Slim', '2019-05-01 00:00:00', '70000', null, '0', null, null, null, null, '12', 'year', '2', null, '4', '0', 'This is a sample test', '2019-11-19 15:50:19', '2019-11-19 15:50:19');

-- ----------------------------
-- Table structure for `asset_categories`
-- ----------------------------
DROP TABLE IF EXISTS `asset_categories`;
CREATE TABLE `asset_categories` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `asset_categories_name_unique` (`name`),
  KEY `idx_id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of asset_categories
-- ----------------------------
INSERT INTO `asset_categories` VALUES ('1', 'Land', '2019-05-09 10:55:22', '2019-05-09 10:55:22');
INSERT INTO `asset_categories` VALUES ('2', 'Building', '2019-05-09 10:55:30', '2019-05-09 10:55:30');
INSERT INTO `asset_categories` VALUES ('3', 'Machinery', '2019-05-09 10:55:35', '2019-05-09 10:55:35');
INSERT INTO `asset_categories` VALUES ('4', 'Equipment', '2019-05-09 10:55:42', '2019-05-09 10:56:09');
INSERT INTO `asset_categories` VALUES ('5', 'Furniture', '2019-05-09 10:56:26', '2019-05-09 10:56:26');
INSERT INTO `asset_categories` VALUES ('6', 'Electronic Device', '2019-05-09 10:57:01', '2019-05-09 10:57:01');

-- ----------------------------
-- Table structure for `asset_locations`
-- ----------------------------
DROP TABLE IF EXISTS `asset_locations`;
CREATE TABLE `asset_locations` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `asset_locations_name_unique` (`name`),
  KEY `idx_id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of asset_locations
-- ----------------------------
INSERT INTO `asset_locations` VALUES ('2', 'Room #4', '2019-04-21 15:13:08', '2019-04-27 17:35:08');
INSERT INTO `asset_locations` VALUES ('3', 'Room #3', '2019-04-22 10:12:16', '2019-04-22 10:12:16');
INSERT INTO `asset_locations` VALUES ('4', 'Room #1', '2019-04-22 10:12:27', '2019-04-22 10:12:27');
INSERT INTO `asset_locations` VALUES ('7', 'Room #2', '2019-04-27 17:34:39', '2019-04-27 17:34:39');
INSERT INTO `asset_locations` VALUES ('8', 'Storage Room', '2019-05-21 23:00:55', '2019-05-21 23:00:55');

-- ----------------------------
-- Table structure for `asset_status`
-- ----------------------------
DROP TABLE IF EXISTS `asset_status`;
CREATE TABLE `asset_status` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `asset_status_name_unique` (`name`),
  KEY `idx_id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of asset_status
-- ----------------------------
INSERT INTO `asset_status` VALUES ('1', 'Broken - Not Fixable (Disposed)', '2019-05-05 09:54:54', '2019-05-05 09:54:54');
INSERT INTO `asset_status` VALUES ('2', 'Lost/Stolen', '2019-05-05 09:55:05', '2019-05-05 09:55:05');
INSERT INTO `asset_status` VALUES ('3', 'Out for Repair', '2019-05-05 09:55:31', '2019-05-05 09:55:31');
INSERT INTO `asset_status` VALUES ('4', 'In Stock', '2019-05-05 09:55:40', '2019-05-09 10:53:17');
INSERT INTO `asset_status` VALUES ('5', 'Ready to Deploy', '2019-05-05 09:55:54', '2019-05-05 09:56:01');
INSERT INTO `asset_status` VALUES ('6', 'Deployed', '2019-05-05 09:56:44', '2019-05-05 09:56:44');
INSERT INTO `asset_status` VALUES ('7', 'For Maintenance', '2019-05-05 17:18:00', '2019-05-05 17:18:00');
INSERT INTO `asset_status` VALUES ('8', 'Available', '2019-05-09 10:53:33', '2019-05-09 10:53:33');

-- ----------------------------
-- Table structure for `assigned_assets`
-- ----------------------------
DROP TABLE IF EXISTS `assigned_assets`;
CREATE TABLE `assigned_assets` (
  `assetTag` varchar(10) NOT NULL,
  `personnel_id` int(5) DEFAULT NULL,
  `location_id` int(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`assetTag`),
  UNIQUE KEY `idx_tag` (`assetTag`),
  KEY `idx_personnel` (`personnel_id`),
  KEY `idx_location` (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of assigned_assets
-- ----------------------------
INSERT INTO `assigned_assets` VALUES ('117003asdf', '27879', null, '2019-11-02 00:08:26', '2019-11-02 00:08:26');
INSERT INTO `assigned_assets` VALUES ('123123', null, '4', '2019-05-25 15:44:15', '2019-05-25 15:44:15');
INSERT INTO `assigned_assets` VALUES ('444555', '234234', null, '2019-05-10 23:56:52', '2019-05-10 23:56:52');
INSERT INTO `assigned_assets` VALUES ('asdfr234e', null, '4', '2019-06-10 16:46:52', '2019-06-10 16:46:52');
INSERT INTO `assigned_assets` VALUES ('T23234', '27879', null, '2019-05-25 15:45:29', '2019-05-25 15:45:29');
INSERT INTO `assigned_assets` VALUES ('T47001', '27879', null, '2019-05-12 00:13:42', '2019-05-12 00:13:42');

-- ----------------------------
-- Table structure for `assigned_assets_history`
-- ----------------------------
DROP TABLE IF EXISTS `assigned_assets_history`;
CREATE TABLE `assigned_assets_history` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `assetTag` varchar(10) DEFAULT NULL,
  `assigned_to_id` int(10) DEFAULT NULL,
  `assigned_to` varchar(15) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of assigned_assets_history
-- ----------------------------
INSERT INTO `assigned_assets_history` VALUES ('1', '123123', '27879', 'personnel', 'Endorsed', '2019-05-09 10:52:32', '2019-05-09 10:52:32');
INSERT INTO `assigned_assets_history` VALUES ('2', '123456', '27879', 'p', 'Endorsed', '2019-05-09 15:26:01', '2019-05-09 15:26:01');
INSERT INTO `assigned_assets_history` VALUES ('3', '444555', '234234', 'p', 'Endorsed', '2019-05-09 15:26:10', '2019-05-09 15:26:10');
INSERT INTO `assigned_assets_history` VALUES ('4', 'abc432', '27879', 'p', 'Endorsed', '2019-05-09 15:43:54', '2019-05-09 15:43:54');
INSERT INTO `assigned_assets_history` VALUES ('5', 'abc432', '27879', 'p', 'Endorsed', '2019-05-09 15:44:51', '2019-05-09 15:44:51');
INSERT INTO `assigned_assets_history` VALUES ('6', '123123', '27879', 'p', 'Endorsed', '2019-05-09 15:47:10', '2019-05-09 15:47:10');
INSERT INTO `assigned_assets_history` VALUES ('7', '123456', '234234', 'p', 'Endorsed', '2019-05-09 15:48:54', '2019-05-09 15:48:54');
INSERT INTO `assigned_assets_history` VALUES ('8', '444555', '27879', 'p', 'Endorsed', '2019-05-09 15:51:59', '2019-05-09 15:51:59');
INSERT INTO `assigned_assets_history` VALUES ('9', '123123', '27879', 'p', 'Endorsed', '2019-05-09 15:53:16', '2019-05-09 15:53:16');
INSERT INTO `assigned_assets_history` VALUES ('10', '123456', '234234', 'p', 'Endorsed', '2019-05-09 15:53:42', '2019-05-09 15:53:42');
INSERT INTO `assigned_assets_history` VALUES ('11', '444555', '27879', 'p', 'Endorsed', '2019-05-09 15:53:50', '2019-05-09 15:53:50');
INSERT INTO `assigned_assets_history` VALUES ('12', 'abc432', '2', 'l', 'Endorsed', '2019-05-09 15:54:00', '2019-05-09 15:54:00');
INSERT INTO `assigned_assets_history` VALUES ('13', 'abcd12', '3', 'l', 'Endorsed', '2019-05-09 15:54:09', '2019-05-09 15:54:09');
INSERT INTO `assigned_assets_history` VALUES ('14', '444555', '27879', 'p', 'Endorsed', '2019-05-09 23:21:56', '2019-05-09 23:21:56');
INSERT INTO `assigned_assets_history` VALUES ('15', '444555', '27879', 'p', 'Pulled Out', '2019-05-09 23:28:07', '2019-05-09 23:28:07');
INSERT INTO `assigned_assets_history` VALUES ('16', '444555', '27879', 'p', 'Pulled Out', '2019-05-09 23:31:39', '2019-05-09 23:31:39');
INSERT INTO `assigned_assets_history` VALUES ('17', '444555', '27879', 'p', 'Pulled Out', '2019-05-09 23:32:49', '2019-05-09 23:32:49');
INSERT INTO `assigned_assets_history` VALUES ('18', '123123', '27879', 'p', 'Endorsed', '2019-05-09 23:34:47', '2019-05-09 23:34:47');
INSERT INTO `assigned_assets_history` VALUES ('19', '123456', '278793', 'p', 'Endorsed', '2019-05-09 23:34:55', '2019-05-09 23:34:55');
INSERT INTO `assigned_assets_history` VALUES ('20', '444555', '27879', 'p', 'Endorsed', '2019-05-10 10:44:48', '2019-05-10 10:44:48');
INSERT INTO `assigned_assets_history` VALUES ('21', '444555', '27879', 'p', 'Pulled Out', '2019-05-10 10:45:05', '2019-05-10 10:45:05');
INSERT INTO `assigned_assets_history` VALUES ('22', '123123', '27879', 'p', 'Pulled Out', '2019-05-10 10:45:15', '2019-05-10 10:45:15');
INSERT INTO `assigned_assets_history` VALUES ('23', '123123', '27879', 'p', 'Endorsed', '2019-05-10 10:46:09', '2019-05-10 10:46:09');
INSERT INTO `assigned_assets_history` VALUES ('24', '123123', '27879', 'p', 'Pulled Out', '2019-05-10 10:46:29', '2019-05-10 10:46:29');
INSERT INTO `assigned_assets_history` VALUES ('25', '123123', '27879', 'p', 'Endorsed', '2019-05-10 10:48:02', '2019-05-10 10:48:02');
INSERT INTO `assigned_assets_history` VALUES ('26', '123123', '27879', 'p', 'Pulled Out', '2019-05-10 10:48:17', '2019-05-10 10:48:17');
INSERT INTO `assigned_assets_history` VALUES ('27', '123456', '278793', 'p', 'Pulled Out', '2019-05-10 10:48:54', '2019-05-10 10:48:54');
INSERT INTO `assigned_assets_history` VALUES ('28', '123123', '27879', 'p', 'Endorsed', '2019-05-10 15:51:04', '2019-05-10 15:51:04');
INSERT INTO `assigned_assets_history` VALUES ('29', '123123', '7', 'l', 'Endorsed', null, null);
INSERT INTO `assigned_assets_history` VALUES ('30', '444555', '234234', 'p', 'Endorsed', '2019-05-10 23:56:52', '2019-05-10 23:56:52');
INSERT INTO `assigned_assets_history` VALUES ('31', '123456', '4', 'l', 'Endorsed', '2019-05-10 23:56:59', '2019-05-10 23:56:59');
INSERT INTO `assigned_assets_history` VALUES ('32', 'T47001', '27879', 'p', 'Endorsed', '2019-05-11 15:31:38', '2019-05-11 15:31:38');
INSERT INTO `assigned_assets_history` VALUES ('33', 'T47001', '27879', 'p', 'Pulled Out', '2019-05-12 00:12:54', '2019-05-12 00:12:54');
INSERT INTO `assigned_assets_history` VALUES ('34', 'T47001', '27879', 'p', 'Endorsed', '2019-05-12 00:13:42', '2019-05-12 00:13:42');
INSERT INTO `assigned_assets_history` VALUES ('35', '123123', '27879', 'p', 'Pulled Out', '2019-05-12 00:18:49', '2019-05-12 00:18:49');
INSERT INTO `assigned_assets_history` VALUES ('36', '123123', '2', 'l', 'Endorsed', '2019-05-23 16:38:04', '2019-05-23 16:38:04');
INSERT INTO `assigned_assets_history` VALUES ('37', '123123', '2', 'l', 'Endorsed', '2019-05-25 15:08:44', '2019-05-25 15:08:44');
INSERT INTO `assigned_assets_history` VALUES ('38', '123123', '2', 'l', 'Endorsed', '2019-05-25 15:12:29', '2019-05-25 15:12:29');
INSERT INTO `assigned_assets_history` VALUES ('39', '123123', '2', 'l', 'Endorsed', '2019-05-25 15:13:10', '2019-05-25 15:13:10');
INSERT INTO `assigned_assets_history` VALUES ('40', '123123', '2', 'l', 'Pulled Out', '2019-05-25 15:21:48', '2019-05-25 15:21:48');
INSERT INTO `assigned_assets_history` VALUES ('41', '123123', '2', 'l', 'Pulled Out', '2019-05-25 15:21:53', '2019-05-25 15:21:53');
INSERT INTO `assigned_assets_history` VALUES ('42', '123123', '2', 'l', 'Pulled Out', '2019-05-25 15:22:04', '2019-05-25 15:22:04');
INSERT INTO `assigned_assets_history` VALUES ('43', '123123', '2', 'l', 'Pulled Out', '2019-05-25 15:22:38', '2019-05-25 15:22:38');
INSERT INTO `assigned_assets_history` VALUES ('44', '123123', '2', 'l', 'Pulled Out', '2019-05-25 15:23:58', '2019-05-25 15:23:58');
INSERT INTO `assigned_assets_history` VALUES ('45', '123123', '2', 'l', 'Pulled Out', '2019-05-25 15:24:43', '2019-05-25 15:24:43');
INSERT INTO `assigned_assets_history` VALUES ('46', '123123', '2', 'l', 'Pulled Out', '2019-05-25 15:24:50', '2019-05-25 15:24:50');
INSERT INTO `assigned_assets_history` VALUES ('47', '123123', '2', 'l', 'Pulled Out', '2019-05-25 15:25:42', '2019-05-25 15:25:42');
INSERT INTO `assigned_assets_history` VALUES ('48', '123123', '2', 'l', 'Pulled Out', '2019-05-25 15:25:57', '2019-05-25 15:25:57');
INSERT INTO `assigned_assets_history` VALUES ('49', '123123', '2', 'l', 'Pulled Out', '2019-05-25 15:26:48', '2019-05-25 15:26:48');
INSERT INTO `assigned_assets_history` VALUES ('50', '123123', '2', 'l', 'Pulled Out', '2019-05-25 15:27:28', '2019-05-25 15:27:28');
INSERT INTO `assigned_assets_history` VALUES ('51', '123123', '2', 'l', 'Endorsed', '2019-05-25 15:36:34', '2019-05-25 15:36:34');
INSERT INTO `assigned_assets_history` VALUES ('52', '123123', '2', 'l', 'Pulled Out', '2019-05-25 15:39:15', '2019-05-25 15:39:15');
INSERT INTO `assigned_assets_history` VALUES ('53', '123123', '4', 'l', 'Endorsed', '2019-05-25 15:39:36', '2019-05-25 15:39:36');
INSERT INTO `assigned_assets_history` VALUES ('54', '123123', '4', 'l', 'Pulled Out', '2019-05-25 15:43:55', '2019-05-25 15:43:55');
INSERT INTO `assigned_assets_history` VALUES ('55', '123123', '4', 'l', 'Endorsed', '2019-05-25 15:44:15', '2019-05-25 15:44:15');
INSERT INTO `assigned_assets_history` VALUES ('56', 'T23234', '27879', 'p', 'Endorsed', '2019-05-25 15:45:29', '2019-05-25 15:45:29');
INSERT INTO `assigned_assets_history` VALUES ('57', 'asdfr234e', '4', 'l', 'Endorsed', '2019-06-10 16:46:52', '2019-06-10 16:46:52');
INSERT INTO `assigned_assets_history` VALUES ('58', '123456', '4', 'l', 'Pulled Out', '2019-06-10 16:52:00', '2019-06-10 16:52:00');
INSERT INTO `assigned_assets_history` VALUES ('59', '117003asdf', '27879', 'p', 'Endorsed', '2019-11-02 00:08:26', '2019-11-02 00:08:26');

-- ----------------------------
-- Table structure for `assigned_licenses`
-- ----------------------------
DROP TABLE IF EXISTS `assigned_licenses`;
CREATE TABLE `assigned_licenses` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `asset_id` varchar(255) NOT NULL,
  `license_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_unique` (`asset_id`,`license_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of assigned_licenses
-- ----------------------------

-- ----------------------------
-- Table structure for `licenses`
-- ----------------------------
DROP TABLE IF EXISTS `licenses`;
CREATE TABLE `licenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `license_type_id` int(2) DEFAULT NULL,
  `manufacturer` varchar(50) DEFAULT NULL,
  `license_key` varchar(50) DEFAULT NULL,
  `number_of_usage` int(2) DEFAULT NULL,
  `cost` double DEFAULT NULL,
  `vendor_id` tinyint(2) DEFAULT NULL,
  `description` text,
  `acquisition_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of licenses
-- ----------------------------
INSERT INTO `licenses` VALUES ('3', '1', 'testasf', 'test 2', '1', '500', '1', 'asdf', '2019-06-01', '2019-06-30', '2019-06-10 01:10:18', '2019-07-17 13:59:00');
INSERT INTO `licenses` VALUES ('4', '2', 'Sony', 'TEDLKjhD098', '2', '25000', '1', 'sony license', '2019-06-11', '2019-06-28', '2019-06-11 01:10:02', '2019-07-17 13:58:13');
INSERT INTO `licenses` VALUES ('5', '1', 'asdffete', 'dasdfsdfg4', '3', '32343', '1', 'dfew', '2019-07-16', '2019-09-26', '2019-07-16 11:09:28', '2019-09-19 08:39:03');
INSERT INTO `licenses` VALUES ('6', '1', 'Maxim', 'asdfknyun98320973', '2', '382839', '1', 'test', '2019-07-24', '2019-07-19', '2019-07-24 22:36:33', '2019-07-24 22:37:50');

-- ----------------------------
-- Table structure for `license_types`
-- ----------------------------
DROP TABLE IF EXISTS `license_types`;
CREATE TABLE `license_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of license_types
-- ----------------------------
INSERT INTO `license_types` VALUES ('1', 'Perpetual', null, null);
INSERT INTO `license_types` VALUES ('2', 'Subscription', null, null);

-- ----------------------------
-- Table structure for `maintenance`
-- ----------------------------
DROP TABLE IF EXISTS `maintenance`;
CREATE TABLE `maintenance` (
  `joborderid` varchar(25) NOT NULL,
  `asset_id` varchar(15) NOT NULL,
  `maintenance_status_id` int(3) NOT NULL,
  `comments` text,
  `date_endorsed` datetime DEFAULT NULL,
  `etc` datetime DEFAULT NULL,
  `date_released` datetime DEFAULT NULL,
  PRIMARY KEY (`asset_id`,`maintenance_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of maintenance
-- ----------------------------
INSERT INTO `maintenance` VALUES ('JOB1905120212', '123123', '5', 'Completed the repair', '2019-05-12 02:12:25', '2019-05-15 00:00:00', '2019-05-12 04:24:12');
INSERT INTO `maintenance` VALUES ('JOB190512041622', '124512', '3', 'this is comment', '2019-05-12 04:16:22', '2019-06-06 00:00:00', null);

-- ----------------------------
-- Table structure for `maintenance_status`
-- ----------------------------
DROP TABLE IF EXISTS `maintenance_status`;
CREATE TABLE `maintenance_status` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of maintenance_status
-- ----------------------------
INSERT INTO `maintenance_status` VALUES ('1', 'On-Queue', '2019-05-12 00:26:00', '2019-05-12 00:26:00');
INSERT INTO `maintenance_status` VALUES ('2', 'Ongoing Maintenance', '2019-05-12 00:26:00', '2019-05-12 00:26:00');
INSERT INTO `maintenance_status` VALUES ('3', 'Ongoing Repair', '2019-05-12 00:26:00', '2019-05-12 00:26:00');
INSERT INTO `maintenance_status` VALUES ('4', 'For Repair', '2019-05-12 00:26:00', '2019-05-12 00:26:00');
INSERT INTO `maintenance_status` VALUES ('5', 'Released', '2019-05-12 00:26:00', '2019-05-12 00:26:00');

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('24', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('25', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('26', '2019_04_17_170035_create_roles_table', '1');
INSERT INTO `migrations` VALUES ('27', '2019_04_17_170223_create_role_user_table', '1');
INSERT INTO `migrations` VALUES ('28', '2019_04_19_050537_create_assetTypes_table', '1');
INSERT INTO `migrations` VALUES ('29', '2019_04_19_053239_create_asset_category_table', '1');
INSERT INTO `migrations` VALUES ('30', '2019_04_19_053713_create_asset_status_table', '1');
INSERT INTO `migrations` VALUES ('31', '2019_04_20_085225_create_asset_locations_table', '1');

-- ----------------------------
-- Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for `personnels`
-- ----------------------------
DROP TABLE IF EXISTS `personnels`;
CREATE TABLE `personnels` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `location` tinyint(5) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=278794 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of personnels
-- ----------------------------
INSERT INTO `personnels` VALUES ('27879', null, 'Ivan Paul', 'Bay', 'test@gmail.com', '09173025624', null, 'Amadeo, Cavite', 'Software Developer', '2019-05-04 08:45:35', '2019-05-08 21:43:46');
INSERT INTO `personnels` VALUES ('234234', null, 'asdf', 'asf', null, '234', null, null, null, '2019-05-04 09:42:00', '2019-05-04 09:42:00');
INSERT INTO `personnels` VALUES ('278793', null, 'asdf', 'asdf', null, '2222', null, null, null, '2019-05-04 09:25:35', '2019-05-04 09:42:56');

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'Administrator', 'Has access to the whole system', '2019-04-20 08:58:10', '2019-05-07 01:08:48');
INSERT INTO `roles` VALUES ('2', 'Allocator', 'User that is capable of allocate asset and view reports', '2019-04-20 08:58:10', '2019-05-07 01:03:04');
INSERT INTO `roles` VALUES ('3', 'Viewer', 'Users that will only capable of viewing', '2019-04-20 08:58:10', '2019-05-18 00:24:31');
INSERT INTO `roles` VALUES ('4', 'Technician', 'User that will only able to access the maintenance section', '2019-05-18 00:25:00', '2019-05-18 00:25:00');

-- ----------------------------
-- Table structure for `role_user`
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of role_user
-- ----------------------------
INSERT INTO `role_user` VALUES ('1', '1', '1');
INSERT INTO `role_user` VALUES ('2', '3', '2');
INSERT INTO `role_user` VALUES ('3', '3', '6');
INSERT INTO `role_user` VALUES ('4', '3', '7');
INSERT INTO `role_user` VALUES ('5', '3', '8');
INSERT INTO `role_user` VALUES ('6', '3', '9');
INSERT INTO `role_user` VALUES ('7', '3', '10');
INSERT INTO `role_user` VALUES ('8', '3', '11');
INSERT INTO `role_user` VALUES ('9', '3', '12');
INSERT INTO `role_user` VALUES ('10', '3', '14');
INSERT INTO `role_user` VALUES ('11', '1', '16');
INSERT INTO `role_user` VALUES ('12', '1', '17');
INSERT INTO `role_user` VALUES ('13', '1', '18');
INSERT INTO `role_user` VALUES ('16', '3', '19');
INSERT INTO `role_user` VALUES ('17', '2', '3');
INSERT INTO `role_user` VALUES ('18', '2', '4');
INSERT INTO `role_user` VALUES ('19', '4', '5');

-- ----------------------------
-- Table structure for `settings`
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `app_name` varchar(100) DEFAULT NULL,
  `key` varchar(100) NOT NULL,
  `value` varchar(500) DEFAULT NULL,
  `default` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES ('user dashboard settings', '1_dashboard', '{\"dashboard_type\":\"bar\",\"total_assets\":\"on\",\"total_deployed\":\"on\",\"for_deployment\":\"on\",\"due_for_maintenance\":\"on\",\"asset_per_category\":\"on\",\"asset_per_status\":\"on\",\"users_per_role\":\"on\",\"asset_maintenance\":\"on\",\"expiring_warranty\":\"on\",\"expiring_licenses\":\"on\",\"recent_activities\":\"on\"}', null);
INSERT INTO `settings` VALUES (null, '2_dashboard', '{\"dashboard_type\":\"numeric\",\"total_assets\":\"on\",\"total_deployed\":\"on\",\"for_deployment\":\"on\",\"due_for_maintenance\":\"on\",\"asset_per_category\":\"on\",\"asset_per_status\":\"on\",\"users_per_role\":\"on\",\"asset_maintenance\":\"on\",\"expiring_warranty\":\"on\",\"expiring_licenses\":\"on\",\"recent_activities\":\"on\"}', null);
INSERT INTO `settings` VALUES (null, 'alert_cc_list', 'aiipee05@gmail.com', null);
INSERT INTO `settings` VALUES (null, 'alert_recipient_list', 'ivan.bay@maximintegrated.com,test@gmail.com', null);
INSERT INTO `settings` VALUES (null, 'branding_format', 'logo_sitename', null);
INSERT INTO `settings` VALUES (null, 'email_alert', '0', null);
INSERT INTO `settings` VALUES (null, 'expiring_alert_threshold', '2', null);
INSERT INTO `settings` VALUES (null, 'footer_text', 'Copyright © 2019 | Asset Management System', 'Copyright © 2019 | Asset Management System');
INSERT INTO `settings` VALUES (null, 'header_bg_color', 'EDEDED', 'EDEDED');
INSERT INTO `settings` VALUES (null, 'login_footer_text', 'Copyright © 2019 | Asset Management System', 'Copyright © 2019 | Asset Management System');
INSERT INTO `settings` VALUES (null, 'repair_alert_threshold', '5', null);
INSERT INTO `settings` VALUES (null, 'sidebar_bg_color', '', null);
INSERT INTO `settings` VALUES (null, 'sitename', 'Asset Mgmt. System', 'Asset Management System');
INSERT INTO `settings` VALUES (null, 'system_name', 'Asset Management System', 'Asset Management System');

-- ----------------------------
-- Table structure for `suppliers`
-- ----------------------------
DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of suppliers
-- ----------------------------
INSERT INTO `suppliers` VALUES ('1', 'Nestle', 'test update', '2019-04-15 12:38:29', '2019-06-04 06:55:00');
INSERT INTO `suppliers` VALUES ('3', 'New', 'new', '2019-06-03 17:52:50', '2019-06-03 17:52:50');
INSERT INTO `suppliers` VALUES ('4', 'Microsoft', 'Vendor of Microsoft Office license', '2019-07-19 17:22:41', '2019-07-19 17:22:41');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', 'admin@gmail.com', 'admin', '$2y$10$ulyNJGUuPQQwJZA0jK3.Je8lqa.y9xl0ReNw1IiFo2S1TgxsubzpS', 'wAOvOTEr1Ck46HmnfYblJC6KOUrBTswf9k2huoYr0DQdEJrB31FaBjBSx0JT', '2019-04-20 08:58:10', '2019-05-19 04:05:01');
INSERT INTO `users` VALUES ('2', 'viewer', 'viewer@example.com', 'viewer', '$2y$10$JMbhNeKR.nls76I7yC6bde7SbxdZV/rv0Hh3LM/3uh1T4GSZM72Hm', 'WRbc8J2nU1yVG0WkC4QEwHY4kf7ZIK5lLJOXnCO6M08AynE5eP9LBj8FaRLl', '2019-04-20 08:58:10', '2019-05-18 00:24:31');
INSERT INTO `users` VALUES ('4', 'allocator', 'alocator@gmail.com', 'allocator', '$2y$10$CSEHhSS5RbeGy0ob1FARDu0ahzS3kJEeBWIrT8NAfaVpTG3WMUtTe', 'xam2gCuLOcPZ6p23FrmSdamGshp28aL1rIv8XCEKYW5oYcDyHaQyUlPjT4TV', '2019-05-18 00:13:38', '2019-05-18 00:13:38');
INSERT INTO `users` VALUES ('5', 'Technician', 'tech@gmail.com', 'technician', '$2y$10$FcHey.LmR6IFnU6Cvzz7le1FvOT6WcpAo2busD/OfaQaJiePFaNwy', 'K3MSp8dfDLUMKo4eQ9pQZ1I3edntrSzIxyVTXe6o61cxTvCizUmFHMdCWLjt', '2019-05-18 00:25:28', '2019-05-18 00:25:28');
