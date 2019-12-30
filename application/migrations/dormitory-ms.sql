/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100137
 Source Host           : localhost:3306
 Source Schema         : dormitory-ms

 Target Server Type    : MySQL
 Target Server Version : 100137
 File Encoding         : 65001

 Date: 29/06/2019 17:04:35
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `position_id` int(11) NULL DEFAULT NULL,
  `group_id` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `assigned` tinyint(4) NOT NULL,
  PRIMARY KEY (`admin_id`) USING BTREE,
  INDEX `position_id`(`position_id`) USING BTREE,
  INDEX `group_id`(`group_id`) USING BTREE,
  CONSTRAINT `group_id` FOREIGN KEY (`group_id`) REFERENCES `group_user` (`group_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `position_id` FOREIGN KEY (`position_id`) REFERENCES `position` (`position_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (5, 'Tang Ngoc Manh', 'manhmit123@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'media/avatar/avatar_1554872307.jpg', 4, 2, 1554872307, 1, 1);
INSERT INTO `admin` VALUES (6, 'Tran Minh Tu', 'minhtu112@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'media/avatar/avatar_1554884028.jpg', 1, 1, 1554884028, 1, 1);
INSERT INTO `admin` VALUES (7, 'Nguyễn Mạnh Vũ', 'vunguyen12@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'media/avatar/avatar_1556008346.jpg', 4, 2, 1556008346, 1, 1);
INSERT INTO `admin` VALUES (8, 'test manager', 'testm12@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'media/avatar/avatar_1556277911.png', 5, 2, 1556277911, 1, 1);
INSERT INTO `admin` VALUES (9, 'Test manager', 'test123@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'media/avatar/avatar_1556278116.png', 5, 2, 1556278116, 1, 1);
INSERT INTO `admin` VALUES (11, 'Test Adding manager', 'phipham@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'media/avatar/avatar_1556278427.jpg', 5, 2, 1556278427, 1, 1);

-- ----------------------------
-- Table structure for assignment
-- ----------------------------
DROP TABLE IF EXISTS `assignment`;
CREATE TABLE `assignment`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL,
  `building_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `admin_id`(`admin_id`) USING BTREE,
  INDEX `building_assign`(`building_id`) USING BTREE,
  CONSTRAINT `admin_id` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `building_assign` FOREIGN KEY (`building_id`) REFERENCES `building` (`building_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of assignment
-- ----------------------------
INSERT INTO `assignment` VALUES (3, 5, 1);
INSERT INTO `assignment` VALUES (4, 8, 2);
INSERT INTO `assignment` VALUES (14, 7, 3);
INSERT INTO `assignment` VALUES (15, 9, 1);
INSERT INTO `assignment` VALUES (16, 11, 1);

-- ----------------------------
-- Table structure for bill
-- ----------------------------
DROP TABLE IF EXISTS `bill`;
CREATE TABLE `bill`  (
  `bill_id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_type` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `index` int(11) NOT NULL,
  `used` int(11) NOT NULL,
  `total_pay` float(10, 0) NOT NULL,
  `deadline` int(11) NOT NULL,
  `paid` int(11) NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`bill_id`) USING BTREE,
  INDEX `bill_type2`(`bill_type`) USING BTREE,
  INDEX `bill_room`(`room_id`) USING BTREE,
  INDEX `bill_term`(`term_id`) USING BTREE,
  CONSTRAINT `bill_room` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `bill_term` FOREIGN KEY (`term_id`) REFERENCES `term` (`term_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `bill_type2` FOREIGN KEY (`bill_type`) REFERENCES `bill_type` (`type_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of bill
-- ----------------------------
INSERT INTO `bill` VALUES (15, 1, 3, 1, 3, 14, 14, 101129, 0, 1556524161, 1);
INSERT INTO `bill` VALUES (16, 2, 3, 6, 3, 15, 15, 27687, 0, 1556524152, 0);
INSERT INTO `bill` VALUES (17, 2, 4, 6, 3, 15, 15, 27687, 0, 1558326975, 1);
INSERT INTO `bill` VALUES (18, 1, 4, 2, 3, 46, 46, 542575, 0, NULL, 1);
INSERT INTO `bill` VALUES (19, 2, 4, 5, 3, 36, 21, 38762, 0, 1558664974, 1);
INSERT INTO `bill` VALUES (20, 2, 4, 5, 3, 36, 21, 38762, 1557266400, NULL, 1);
INSERT INTO `bill` VALUES (21, 2, 4, 4, 3, 43, 7, 12921, 1559944800, NULL, 1);
INSERT INTO `bill` VALUES (22, 2, 3, 5, 3, 37, 22, 40608, 1557266400, 1559924636, 1);
INSERT INTO `bill` VALUES (23, 1, 3, 2, 3, 27, 13, 93019, 1549580400, NULL, 1);
INSERT INTO `bill` VALUES (24, 2, 3, 6, 3, 46, 46, 84907, 1554674400, NULL, 1);
INSERT INTO `bill` VALUES (25, 2, 2, 4, 3, 49, 49, 90445, 1554674400, 1560166453, 1);

-- ----------------------------
-- Table structure for bill_type
-- ----------------------------
DROP TABLE IF EXISTS `bill_type`;
CREATE TABLE `bill_type`  (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`type_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of bill_type
-- ----------------------------
INSERT INTO `bill_type` VALUES (1, 'water');
INSERT INTO `bill_type` VALUES (2, 'electricity');
INSERT INTO `bill_type` VALUES (3, 'room');

-- ----------------------------
-- Table structure for building
-- ----------------------------
DROP TABLE IF EXISTS `building`;
CREATE TABLE `building`  (
  `building_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`building_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of building
-- ----------------------------
INSERT INTO `building` VALUES (1, 'Nhà A17', 'Số 17, Tạ Quang Bửu, Hai Bà Trưng, Hà Nội', 'media/building/building_1555755927.jpg');
INSERT INTO `building` VALUES (2, 'Test adding image', 'Số 40, Tạ Quang Bửu, Hai Bà Trưng, Hà Nội', 'media/building/building_1554722148.jpg');
INSERT INTO `building` VALUES (3, 'Nhà A15', '', 'media/building/building_1554742012.jpg');

-- ----------------------------
-- Table structure for ethnic
-- ----------------------------
DROP TABLE IF EXISTS `ethnic`;
CREATE TABLE `ethnic`  (
  `ethnic_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`ethnic_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 50 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ethnic
-- ----------------------------
INSERT INTO `ethnic` VALUES (1, 'Kinh');
INSERT INTO `ethnic` VALUES (2, 'Mường');
INSERT INTO `ethnic` VALUES (3, 'Thổ');
INSERT INTO `ethnic` VALUES (4, 'Giáy');
INSERT INTO `ethnic` VALUES (5, 'Lào');
INSERT INTO `ethnic` VALUES (6, 'Lự');
INSERT INTO `ethnic` VALUES (7, 'Nùng');
INSERT INTO `ethnic` VALUES (8, 'Sán Chay');
INSERT INTO `ethnic` VALUES (9, 'Tày');
INSERT INTO `ethnic` VALUES (10, 'Thái');
INSERT INTO `ethnic` VALUES (11, 'Cờ Lao');
INSERT INTO `ethnic` VALUES (12, 'La Chí');
INSERT INTO `ethnic` VALUES (13, 'La Ha');
INSERT INTO `ethnic` VALUES (14, 'Pu Péo');
INSERT INTO `ethnic` VALUES (15, 'Ba Na');
INSERT INTO `ethnic` VALUES (16, 'Bru');
INSERT INTO `ethnic` VALUES (17, 'Chơ Ro');
INSERT INTO `ethnic` VALUES (18, 'Co');
INSERT INTO `ethnic` VALUES (19, 'Cơ Ho');
INSERT INTO `ethnic` VALUES (20, 'Cơ Tu');
INSERT INTO `ethnic` VALUES (21, 'Giả');
INSERT INTO `ethnic` VALUES (22, 'Hrê');
INSERT INTO `ethnic` VALUES (23, 'Kháng');
INSERT INTO `ethnic` VALUES (24, 'Khơ Me');
INSERT INTO `ethnic` VALUES (25, 'Khơ Mú');
INSERT INTO `ethnic` VALUES (26, 'Mạ');
INSERT INTO `ethnic` VALUES (27, 'Mảng');
INSERT INTO `ethnic` VALUES (28, 'M\'Nông');
INSERT INTO `ethnic` VALUES (29, 'Ơ Đu');
INSERT INTO `ethnic` VALUES (30, 'Rơ Măm');
INSERT INTO `ethnic` VALUES (31, 'Tà Ôi');
INSERT INTO `ethnic` VALUES (32, 'Xinh Mun');
INSERT INTO `ethnic` VALUES (33, 'Xơ Đăng');
INSERT INTO `ethnic` VALUES (34, 'X\'Tiêng');
INSERT INTO `ethnic` VALUES (35, 'Dao');
INSERT INTO `ethnic` VALUES (36, 'H\'Mông');
INSERT INTO `ethnic` VALUES (37, 'Pà Thẻn');
INSERT INTO `ethnic` VALUES (38, 'Chăm');
INSERT INTO `ethnic` VALUES (39, 'Chu Ru');
INSERT INTO `ethnic` VALUES (40, 'Ê Đê');
INSERT INTO `ethnic` VALUES (41, 'Gia Rai');
INSERT INTO `ethnic` VALUES (42, 'Hoa');
INSERT INTO `ethnic` VALUES (43, 'Sán Dìu');
INSERT INTO `ethnic` VALUES (44, 'Cống');
INSERT INTO `ethnic` VALUES (45, 'Hà Nhì');
INSERT INTO `ethnic` VALUES (46, 'La Hủ');
INSERT INTO `ethnic` VALUES (47, 'Lô lô');
INSERT INTO `ethnic` VALUES (48, 'Phù Lá');
INSERT INTO `ethnic` VALUES (49, 'Si la');

-- ----------------------------
-- Table structure for floor
-- ----------------------------
DROP TABLE IF EXISTS `floor`;
CREATE TABLE `floor`  (
  `floor_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `building_id` int(11) NOT NULL,
  PRIMARY KEY (`floor_id`) USING BTREE,
  INDEX `building_id`(`building_id`) USING BTREE,
  CONSTRAINT `building_id` FOREIGN KEY (`building_id`) REFERENCES `building` (`building_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of floor
-- ----------------------------
INSERT INTO `floor` VALUES (1, 'Tầng 1', 1);
INSERT INTO `floor` VALUES (2, 'Tầng 2', 1);
INSERT INTO `floor` VALUES (3, 'Tầng 3', 1);
INSERT INTO `floor` VALUES (4, 'Tầng 2', 2);
INSERT INTO `floor` VALUES (5, 'Tầng 1', 2);
INSERT INTO `floor` VALUES (6, 'Tầng 3', 2);
INSERT INTO `floor` VALUES (7, 'Tầng 4', 1);
INSERT INTO `floor` VALUES (8, 'Tầng 1', 3);
INSERT INTO `floor` VALUES (11, 'Tầng 3', 3);
INSERT INTO `floor` VALUES (12, 'Tầng 2', 3);

-- ----------------------------
-- Table structure for group_user
-- ----------------------------
DROP TABLE IF EXISTS `group_user`;
CREATE TABLE `group_user`  (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`group_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of group_user
-- ----------------------------
INSERT INTO `group_user` VALUES (1, 'administrator');
INSERT INTO `group_user` VALUES (2, 'manager');

-- ----------------------------
-- Table structure for notification
-- ----------------------------
DROP TABLE IF EXISTS `notification`;
CREATE TABLE `notification`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `content` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `posted_at` int(11) NOT NULL,
  `noti_type` tinyint(4) NOT NULL,
  `student_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for position
-- ----------------------------
DROP TABLE IF EXISTS `position`;
CREATE TABLE `position`  (
  `position_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`position_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of position
-- ----------------------------
INSERT INTO `position` VALUES (1, 'Giám đốc Trung tâm');
INSERT INTO `position` VALUES (2, 'Phó Giám đốc Trung tâm');
INSERT INTO `position` VALUES (3, 'Cán bộ Văn phòng Trung tâm');
INSERT INTO `position` VALUES (4, 'Cán bộ Quản lý nhà');
INSERT INTO `position` VALUES (5, 'Hỗ trợ kỹ thuật');

-- ----------------------------
-- Table structure for price
-- ----------------------------
DROP TABLE IF EXISTS `price`;
CREATE TABLE `price`  (
  `price_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `price` int(11) NOT NULL,
  `bill_type` int(11) NOT NULL COMMENT '1: water | 2: electricity | 3: room',
  PRIMARY KEY (`price_id`) USING BTREE,
  INDEX `bill_type`(`bill_type`) USING BTREE,
  CONSTRAINT `bill_type` FOREIGN KEY (`bill_type`) REFERENCES `bill_type` (`type_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of price
-- ----------------------------
INSERT INTO `price` VALUES (1, 'Bậc 1', '0 - 50 kWh đầu  ', 1678, 2);
INSERT INTO `price` VALUES (4, 'Bậc 2', '51 - 100 kWh', 1734, 2);
INSERT INTO `price` VALUES (5, 'Mức 1', '10m3 đầu tiên', 5973, 1);
INSERT INTO `price` VALUES (6, 'Mức 2', '10m3 đến 20m3', 7052, 1);
INSERT INTO `price` VALUES (7, 'Bậc 3', '101 - 200 kWh', 2014, 2);
INSERT INTO `price` VALUES (8, 'Bậc 4', '201 - 300 kWh', 2536, 2);
INSERT INTO `price` VALUES (9, 'Bậc 5', '301 - 400 kWh', 2834, 2);
INSERT INTO `price` VALUES (10, 'Bậc 6', '401 kWh trở lên', 2927, 2);
INSERT INTO `price` VALUES (11, 'Mức 3', '20m3 đến 30m3', 8669, 1);
INSERT INTO `price` VALUES (12, 'Mức 4', 'Trên 30m3', 15929, 1);
INSERT INTO `price` VALUES (13, 'Giá phòng', 'Kỳ 20182 đến nay', 50000, 3);

-- ----------------------------
-- Table structure for registration
-- ----------------------------
DROP TABLE IF EXISTS `registration`;
CREATE TABLE `registration`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `registed` int(11) NOT NULL,
  `confirmed` int(11) NULL DEFAULT NULL,
  `status` tinyint(4) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `room_id`(`room_id`) USING BTREE,
  INDEX `student_id`(`student_id`) USING BTREE,
  INDEX `term_id`(`term_id`) USING BTREE,
  CONSTRAINT `room_id` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `student_id` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `term_id` FOREIGN KEY (`term_id`) REFERENCES `term` (`term_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of registration
-- ----------------------------
INSERT INTO `registration` VALUES (2, 4, 2, 3, 1556100203, 1559810473, 1);
INSERT INTO `registration` VALUES (3, 3, 4, 3, 1556100204, NULL, 0);
INSERT INTO `registration` VALUES (4, 2, 1, 3, 1556100203, NULL, 0);
INSERT INTO `registration` VALUES (5, 6, 3, 3, 1561090057, NULL, NULL);

-- ----------------------------
-- Table structure for religion
-- ----------------------------
DROP TABLE IF EXISTS `religion`;
CREATE TABLE `religion`  (
  `religion_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`religion_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 98 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of religion
-- ----------------------------
INSERT INTO `religion` VALUES (1, 'Afghanistan');
INSERT INTO `religion` VALUES (2, 'Ai Cập');
INSERT INTO `religion` VALUES (3, 'Albania');
INSERT INTO `religion` VALUES (4, 'Algérie');
INSERT INTO `religion` VALUES (5, 'Andorra');
INSERT INTO `religion` VALUES (6, 'Angola');
INSERT INTO `religion` VALUES (7, 'United Kingdom');
INSERT INTO `religion` VALUES (8, 'Áo');
INSERT INTO `religion` VALUES (9, 'Ả Rập');
INSERT INTO `religion` VALUES (10, 'Argentina');
INSERT INTO `religion` VALUES (11, 'Ấn Độ');
INSERT INTO `religion` VALUES (12, 'Bahrain');
INSERT INTO `religion` VALUES (13, 'Ba Lan');
INSERT INTO `religion` VALUES (14, 'Bangladesh');
INSERT INTO `religion` VALUES (15, 'Bolivia');
INSERT INTO `religion` VALUES (16, 'Bồ Đào Nha');
INSERT INTO `religion` VALUES (17, 'Bờ Biển Ngà');
INSERT INTO `religion` VALUES (18, 'Brasil');
INSERT INTO `religion` VALUES (19, 'Brunei');
INSERT INTO `religion` VALUES (20, 'Bulgaria');
INSERT INTO `religion` VALUES (21, 'UAE');
INSERT INTO `religion` VALUES (22, 'Campuchia');
INSERT INTO `religion` VALUES (23, 'Canada');
INSERT INTO `religion` VALUES (24, 'Chile');
INSERT INTO `religion` VALUES (25, 'Colombia');
INSERT INTO `religion` VALUES (26, 'Congo');
INSERT INTO `religion` VALUES (27, 'Costa Rica');
INSERT INTO `religion` VALUES (28, 'Croatia');
INSERT INTO `religion` VALUES (29, 'Cuba');
INSERT INTO `religion` VALUES (30, 'Đan Mạch');
INSERT INTO `religion` VALUES (31, 'Đông Timor');
INSERT INTO `religion` VALUES (32, 'Đức');
INSERT INTO `religion` VALUES (33, 'Ecuador');
INSERT INTO `religion` VALUES (34, 'El Salvador');
INSERT INTO `religion` VALUES (35, 'El Salvador');
INSERT INTO `religion` VALUES (36, 'Ethiopia');
INSERT INTO `religion` VALUES (37, 'Gabon');
INSERT INTO `religion` VALUES (38, 'Ghana');
INSERT INTO `religion` VALUES (39, 'Guyana');
INSERT INTO `religion` VALUES (40, 'Hà Lan');
INSERT INTO `religion` VALUES (41, 'Hàn Quốc');
INSERT INTO `religion` VALUES (42, 'Hoa Kỳ');
INSERT INTO `religion` VALUES (43, 'Hungary');
INSERT INTO `religion` VALUES (44, 'Hy Lạp');
INSERT INTO `religion` VALUES (45, 'Iceland');
INSERT INTO `religion` VALUES (46, 'Indonesia');
INSERT INTO `religion` VALUES (47, 'Iran');
INSERT INTO `religion` VALUES (48, 'Iraq');
INSERT INTO `religion` VALUES (49, 'Ireland');
INSERT INTO `religion` VALUES (50, 'Israel');
INSERT INTO `religion` VALUES (51, 'Jordan');
INSERT INTO `religion` VALUES (52, 'Kazakhstan');
INSERT INTO `religion` VALUES (53, 'Kosovo');
INSERT INTO `religion` VALUES (54, 'Lào');
INSERT INTO `religion` VALUES (55, 'Liban');
INSERT INTO `religion` VALUES (56, 'Liberia');
INSERT INTO `religion` VALUES (57, 'Malaysia');
INSERT INTO `religion` VALUES (58, 'Maroc');
INSERT INTO `religion` VALUES (59, 'Mexico');
INSERT INTO `religion` VALUES (60, 'Monaco');
INSERT INTO `religion` VALUES (61, 'Mông Cổ');
INSERT INTO `religion` VALUES (62, 'Myanmar');
INSERT INTO `religion` VALUES (63, 'Sudan');
INSERT INTO `religion` VALUES (64, 'Nam Phi');
INSERT INTO `religion` VALUES (65, 'Na Uy');
INSERT INTO `religion` VALUES (66, 'Nepal');
INSERT INTO `religion` VALUES (67, 'New Zealand');
INSERT INTO `religion` VALUES (68, 'Nigeria');
INSERT INTO `religion` VALUES (69, 'Nga');
INSERT INTO `religion` VALUES (70, 'Nhật Bản');
INSERT INTO `religion` VALUES (71, 'Pakistan');
INSERT INTO `religion` VALUES (72, 'Panama');
INSERT INTO `religion` VALUES (73, 'Paraguay');
INSERT INTO `religion` VALUES (74, 'Pháp');
INSERT INTO `religion` VALUES (75, 'Philippines');
INSERT INTO `religion` VALUES (76, 'Qatar');
INSERT INTO `religion` VALUES (77, 'Romania');
INSERT INTO `religion` VALUES (78, 'Cộng hòa Séc');
INSERT INTO `religion` VALUES (79, 'Singapore');
INSERT INTO `religion` VALUES (80, 'Syria');
INSERT INTO `religion` VALUES (81, 'Tajikistan');
INSERT INTO `religion` VALUES (82, 'Tây Ban Nha');
INSERT INTO `religion` VALUES (83, 'Thái Lan');
INSERT INTO `religion` VALUES (84, 'Thổ Nhĩ Kỳ');
INSERT INTO `religion` VALUES (85, 'Thụy Điển');
INSERT INTO `religion` VALUES (86, 'Thụy Sĩ');
INSERT INTO `religion` VALUES (87, 'Triều Tiên');
INSERT INTO `religion` VALUES (88, 'Trung Quốc');
INSERT INTO `religion` VALUES (89, 'Australia');
INSERT INTO `religion` VALUES (90, 'Ukraina');
INSERT INTO `religion` VALUES (91, 'Uruguay');
INSERT INTO `religion` VALUES (92, 'Uzbekistan');
INSERT INTO `religion` VALUES (93, 'Vatican');
INSERT INTO `religion` VALUES (94, 'Venezuela');
INSERT INTO `religion` VALUES (95, 'Việt Nam');
INSERT INTO `religion` VALUES (96, 'Ý');
INSERT INTO `religion` VALUES (97, 'Yemen');

-- ----------------------------
-- Table structure for report_detail
-- ----------------------------
DROP TABLE IF EXISTS `report_detail`;
CREATE TABLE `report_detail`  (
  `building_id` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `num_paid` int(11) NOT NULL,
  `num_not_paid` int(11) NOT NULL,
  `expected_total` float(10, 0) NOT NULL,
  `actual_total` float(10, 0) NOT NULL,
  `created_at` int(11) NOT NULL,
  `created_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  INDEX `report_id`(`report_id`) USING BTREE,
  CONSTRAINT `report_id` FOREIGN KEY (`report_id`) REFERENCES `reports` (`report_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of report_detail
-- ----------------------------
INSERT INTO `report_detail` VALUES (2, 4, 4, 2, 500000, 450000, 1560178666, '8');
INSERT INTO `report_detail` VALUES (3, 4, 2, 1, 140281, 55374, 1560178789, '7');
INSERT INTO `report_detail` VALUES (1, 4, 2, 1, 140281, 55374, 1560178972, '5');

-- ----------------------------
-- Table structure for reports
-- ----------------------------
DROP TABLE IF EXISTS `reports`;
CREATE TABLE `reports`  (
  `report_id` int(11) NOT NULL AUTO_INCREMENT,
  `month` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `expected_total` float(10, 0) NULL DEFAULT NULL,
  `actual_total` float(10, 0) NULL DEFAULT NULL,
  PRIMARY KEY (`report_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of reports
-- ----------------------------
INSERT INTO `reports` VALUES (1, 3, 3, 0, NULL);
INSERT INTO `reports` VALUES (2, 4, 3, 0, NULL);
INSERT INTO `reports` VALUES (3, 5, 3, 0, NULL);
INSERT INTO `reports` VALUES (4, 6, 3, 920843, 616122);

-- ----------------------------
-- Table structure for room
-- ----------------------------
DROP TABLE IF EXISTS `room`;
CREATE TABLE `room`  (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) NOT NULL COMMENT '0: Male | 1: Female',
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `building_id` int(11) NOT NULL,
  `floor_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`room_id`) USING BTREE,
  INDEX `floor_id`(`floor_id`) USING BTREE,
  CONSTRAINT `floor_id` FOREIGN KEY (`floor_id`) REFERENCES `floor` (`floor_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of room
-- ----------------------------
INSERT INTO `room` VALUES (1, 0, 'P101', 2, 4, 1);
INSERT INTO `room` VALUES (2, 0, 'P001', 3, 8, 1);
INSERT INTO `room` VALUES (3, 1, 'P102', 1, 1, 0);
INSERT INTO `room` VALUES (4, 1, 'P103', 1, 1, 0);
INSERT INTO `room` VALUES (5, 1, 'P104', 1, 1, 0);
INSERT INTO `room` VALUES (6, 0, 'P1055', 1, 1, 0);
INSERT INTO `room` VALUES (7, 0, 'P106', 1, 1, 0);
INSERT INTO `room` VALUES (8, 1, 'P002', 3, 8, 0);
INSERT INTO `room` VALUES (9, 0, 'P201', 1, 2, 0);

-- ----------------------------
-- Table structure for room_pay
-- ----------------------------
DROP TABLE IF EXISTS `room_pay`;
CREATE TABLE `room_pay`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `term_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `total_student` int(11) NOT NULL,
  `total_pay` float(10, 0) NOT NULL,
  `deadline` int(11) NOT NULL,
  `paid` int(11) NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `term`(`term_id`) USING BTREE,
  INDEX `room`(`room_id`) USING BTREE,
  CONSTRAINT `room` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `term` FOREIGN KEY (`term_id`) REFERENCES `term` (`term_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of room_pay
-- ----------------------------
INSERT INTO `room_pay` VALUES (1, 3, 3, 0, 0, 2423423, 1556186747, 0);
INSERT INTO `room_pay` VALUES (2, 3, 3, 0, 0, 1554588000, 1556246607, 1);
INSERT INTO `room_pay` VALUES (3, 3, 3, 3, 150000, 1556143200, 1556523926, 1);
INSERT INTO `room_pay` VALUES (4, 3, 4, 1, 50000, 1556661600, 1558159557, 0);

-- ----------------------------
-- Table structure for student
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student`  (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `student_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `student_card` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `gender` tinyint(4) NOT NULL COMMENT '0: Male | 1: Female',
  `birthday` int(255) NOT NULL,
  `religion_id` int(11) NULL DEFAULT NULL,
  `ethnic_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`student_id`) USING BTREE,
  INDEX `ethnic_id`(`ethnic_id`) USING BTREE,
  INDEX `religion_id`(`religion_id`) USING BTREE,
  CONSTRAINT `ethnic_id` FOREIGN KEY (`ethnic_id`) REFERENCES `ethnic` (`ethnic_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `religion_id` FOREIGN KEY (`religion_id`) REFERENCES `religion` (`religion_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES (1, 'Nguyen Van Quangg', 'quangnguyen@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '792931117', 'media/student/card_1558673000.jpg', 123654789, 'nha 122 ngoc lam A', 0, 799279200, 8, 4, 1);
INSERT INTO `student` VALUES (2, 'Pham Thuy Anh', 'thuyanh11@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '78562', 'media/student/cart_1554960086.jpg', 123654789, 'nha 122 ngoc lam A', 1, 0, 95, 1, 1);
INSERT INTO `student` VALUES (3, 'Nguyen Anh Vu', 'anhvu12@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '29799', 'media/student/cart_1554960612.jpg', 123654789, '123 thach ban', 0, 859932000, 85, 13, 1);
INSERT INTO `student` VALUES (4, 'Nguyen Thuy Linh', 'thuylinh@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '87890', 'media/student/cart_1554968029.jpg', 123654789, '123 thach ban', 1, 829000800, 20, 19, 0);

-- ----------------------------
-- Table structure for term
-- ----------------------------
DROP TABLE IF EXISTS `term`;
CREATE TABLE `term`  (
  `term_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` int(11) NOT NULL,
  PRIMARY KEY (`term_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of term
-- ----------------------------
INSERT INTO `term` VALUES (3, 20182);

SET FOREIGN_KEY_CHECKS = 1;
