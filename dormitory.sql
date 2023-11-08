/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : dormitory

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 25/06/2023 21:37:31
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for dormitories
-- ----------------------------
DROP TABLE IF EXISTS `dormitories`;
CREATE TABLE `dormitories`  (
  `dorm_number` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `building_number` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `total_beds` int(11) NOT NULL,
  `remaining_beds` int(11) NOT NULL,
  `status` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`dorm_number`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dormitories
-- ----------------------------
INSERT INTO `dormitories` VALUES ('101', 'A', 8, 1, '可用');
INSERT INTO `dormitories` VALUES ('102', 'A', 8, 2, '可用');
INSERT INTO `dormitories` VALUES ('103', 'A', 8, 0, '已满');

-- ----------------------------
-- Table structure for dormitory_managers
-- ----------------------------
DROP TABLE IF EXISTS `dormitory_managers`;
CREATE TABLE `dormitory_managers`  (
  `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `duty_time` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dormitory_managers
-- ----------------------------
INSERT INTO `dormitory_managers` VALUES (2, '张三', '13625281087', '技术员', '周一至周五(10:00-11:00)');
INSERT INTO `dormitory_managers` VALUES (1, '张六', '13625281087', '巡查', '周一至周五(10:00-11:00)');
INSERT INTO `dormitory_managers` VALUES (7, '张五', '12381273981273', '水电工', '周一(7:00-11:00)');
INSERT INTO `dormitory_managers` VALUES (6, '张六', '13625281087', '巡查', '周一至周五(10:00-11:00)');

-- ----------------------------
-- Table structure for students
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `student_name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `major` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dormitory_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `checkin_time` date NOT NULL,
  `status` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of students
-- ----------------------------
INSERT INTO `students` VALUES (4, '1', 'Mark', '男', '信息工程学院', '计应', '11111', '101', '2023-06-10', '已入住');
INSERT INTO `students` VALUES (2, '2', 'Lucy', '女', '计算机科学', '计算机科学', '22222', '102', '2020-01-01', '已入住');
INSERT INTO `students` VALUES (3, '1', 'Mark', '男', '信息工程学院', '计应', '11111', '101', '2023-05-31', '已入住');
INSERT INTO `students` VALUES (5, '1', 'Mark', '男', '信息工程学院', '计应', '11111', '101', '2020-01-01', '已入住');

SET FOREIGN_KEY_CHECKS = 1;
