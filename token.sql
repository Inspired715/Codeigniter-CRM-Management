/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100424
 Source Host           : localhost:3306
 Source Schema         : token

 Target Server Type    : MySQL
 Target Server Version : 100424
 File Encoding         : 65001

 Date: 27/09/2023 04:16:07
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for leads
-- ----------------------------
DROP TABLE IF EXISTS `leads`;
CREATE TABLE `leads`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` int(255) NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `web_site` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `phone_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `modifyed_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `state` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of leads
-- ----------------------------
INSERT INTO `leads` VALUES (1, 'Dylan', 'Rivera', 1, 'Full Stack Developer', 'https://koenajourna..com', '1123456046', '1', NULL, '775 Rd', 'JacksonTownship', 'NJ', 'US', 'mailto:dylanrivera test@mail.com');
INSERT INTO `leads` VALUES (2, 'Track', 'Box', 2, 'Testing title', 'https://koenajourna..com', '1123457898', '2', NULL, '775 Rd', 'JacksonTownship', 'NJ', 'US', 'mailto:dylanrivera test@mail.com');
INSERT INTO `leads` VALUES (3, 'Jacob', 'Dane', 3, 'Gentle man', 'https://koenajourna..com', '5701546975', '1', NULL, '8878 River', 'Jackson', 'OK', 'US', 'mailto:dylanrivera test@mail.com');
INSERT INTO `leads` VALUES (13, 'Track', 'Box', 1, 'Testing title', 'https://koenajourna..com', '4859632514', '3', NULL, '775 Rd', 'JacksonTownship', 'NJ', 'US', 'mailto:dylanrivera test@mail.com');

-- ----------------------------
-- Table structure for publisher
-- ----------------------------
DROP TABLE IF EXISTS `publisher`;
CREATE TABLE `publisher`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `phone_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_date` datetime(0) NULL DEFAULT sysdate,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of publisher
-- ----------------------------
INSERT INTO `publisher` VALUES (1, 'Parias', 'parias@gmail.com', '2132620113', '7334890f1994608a537eb9d94601224eca1ac4e904f33bde2dd6e8d3da5575dc', '2023-09-27 01:43:10');
INSERT INTO `publisher` VALUES (2, 'Kevin', 'kevin@gmail.com', '2012557969', 'b8f9b427e24309dae08e208c0f349dcf665135d797481856229e1ed09d3bf79d', '2023-09-27 01:50:39');
INSERT INTO `publisher` VALUES (3, 'Test', 'amdin@aminl.com', '25689748484', '0b0be6541640ae11f3142ba67dac077484081f215afc1141f33629dda0ac354f', '2023-09-27 03:37:22');

-- ----------------------------
-- Table structure for sub_leads
-- ----------------------------
DROP TABLE IF EXISTS `sub_leads`;
CREATE TABLE `sub_leads`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sub_value` varchar(512) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `lead_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 48 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sub_leads
-- ----------------------------
INSERT INTO `sub_leads` VALUES (1, 'MPC_1', 'camp', 1);
INSERT INTO `sub_leads` VALUES (2, 'MPC_2', '', 1);
INSERT INTO `sub_leads` VALUES (3, 'MPC_4', 'TRACKOX_Source', 1);
INSERT INTO `sub_leads` VALUES (4, 'MPC_3', '', 1);
INSERT INTO `sub_leads` VALUES (5, 'MPC_5', 'null', 1);
INSERT INTO `sub_leads` VALUES (6, 'rd', '2', 1);
INSERT INTO `sub_leads` VALUES (7, 'so', 'AFF_2958116', 1);
INSERT INTO `sub_leads` VALUES (8, 'co', 'BR', 1);
INSERT INTO `sub_leads` VALUES (9, 'code', 'BR', 1);
INSERT INTO `sub_leads` VALUES (10, 'group', '101', 1);
INSERT INTO `sub_leads` VALUES (11, 'campaign', '1', 1);
INSERT INTO `sub_leads` VALUES (12, 'camp', 'null', 1);
INSERT INTO `sub_leads` VALUES (13, 'username', 'mailto:dylanrivera test@mail.com', 1);
INSERT INTO `sub_leads` VALUES (14, 'redirect', '2', 1);
INSERT INTO `sub_leads` VALUES (15, 'prefix', '55', 1);
INSERT INTO `sub_leads` VALUES (16, 'currency', 'usd', 1);
INSERT INTO `sub_leads` VALUES (17, 'sub', '29dbbfa2a6aab3333d0a503', 1);
INSERT INTO `sub_leads` VALUES (18, 'camp', 'null', 2);
INSERT INTO `sub_leads` VALUES (19, 'username', 'mailto:dylanrivera test@mail.com', 2);
INSERT INTO `sub_leads` VALUES (20, 'redirect', '2', 2);
INSERT INTO `sub_leads` VALUES (21, 'prefix', '55', 2);
INSERT INTO `sub_leads` VALUES (22, 'currency', 'usd', 2);
INSERT INTO `sub_leads` VALUES (23, 'sub', '29dbbfa2a6aab3333d0a503', 2);
INSERT INTO `sub_leads` VALUES (24, 'camp', 'null', 3);
INSERT INTO `sub_leads` VALUES (25, 'username', 'mailto:dylanrivera test@mail.com', 3);
INSERT INTO `sub_leads` VALUES (26, 'redirect', '2', 3);
INSERT INTO `sub_leads` VALUES (27, 'prefix', '55', 3);
INSERT INTO `sub_leads` VALUES (28, 'currency', 'usd', 3);
INSERT INTO `sub_leads` VALUES (29, 'sub', '29dbbfa2a6aab3333d0a503', 3);
INSERT INTO `sub_leads` VALUES (31, 'MPC_1', 'camp', 13);
INSERT INTO `sub_leads` VALUES (32, 'MPC_2', '', 13);
INSERT INTO `sub_leads` VALUES (33, 'MPC_4', 'TRACKOX_Source', 13);
INSERT INTO `sub_leads` VALUES (34, 'MPC_3', '', 13);
INSERT INTO `sub_leads` VALUES (35, 'MPC_5', 'null', 13);
INSERT INTO `sub_leads` VALUES (36, 'rd', '2', 13);
INSERT INTO `sub_leads` VALUES (37, 'so', 'AFF_2958116', 13);
INSERT INTO `sub_leads` VALUES (38, 'co', 'BR', 13);
INSERT INTO `sub_leads` VALUES (39, 'code', 'BR', 13);
INSERT INTO `sub_leads` VALUES (40, 'group', '101', 13);
INSERT INTO `sub_leads` VALUES (41, 'campaign', '1', 13);
INSERT INTO `sub_leads` VALUES (42, 'camp', 'null', 13);
INSERT INTO `sub_leads` VALUES (43, 'username', 'mailto:dylanrivera test@mail.com', 13);
INSERT INTO `sub_leads` VALUES (44, 'redirect', '2', 13);
INSERT INTO `sub_leads` VALUES (45, 'prefix', '55', 13);
INSERT INTO `sub_leads` VALUES (46, 'currency', 'usd', 13);
INSERT INTO `sub_leads` VALUES (47, 'sub', '29dbbfa2a6aab3333d0a503', 13);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` int(255) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `role` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', 'Kevin', 'Pineda', 1, '202cb962ac59075b964b07152d234b70', 1);

SET FOREIGN_KEY_CHECKS = 1;
