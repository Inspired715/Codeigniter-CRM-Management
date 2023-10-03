/*
 Navicat Premium Data Transfer

 Source Server         : 23.227.199.175
 Source Server Type    : MySQL
 Source Server Version : 100424
 Source Host           : 23.227.199.175:3306
 Source Schema         : token

 Target Server Type    : MySQL
 Target Server Version : 100424
 File Encoding         : 65001

 Date: 03/10/2023 05:23:27
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for campaign
-- ----------------------------
DROP TABLE IF EXISTS `campaign`;
CREATE TABLE `campaign`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campaign` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of campaign
-- ----------------------------
INSERT INTO `campaign` VALUES (1, 'Rodrigo');
INSERT INTO `campaign` VALUES (2, 'MX');
INSERT INTO `campaign` VALUES (3, 'CO');
INSERT INTO `campaign` VALUES (4, 'ZGB');

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
  `created_date` date NOT NULL DEFAULT current_timestamp,
  `ftd_date` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of leads
-- ----------------------------
INSERT INTO `leads` VALUES (17, 'ADIR', 'TEST', 4, 'CRM lead', 'source', '511212345675', '2', '1', '', '', 'GA', 'AR', 'ADIR_TEST@gmail.com', '2023-09-28', NULL);
INSERT INTO `leads` VALUES (18, 'ADIR', 'TEST', 6, 'CRM lead', 'source', '521212345611', '2', '1', '', '', 'LA', 'AR', 'ADIR_TEST@gmail.com', '2023-09-28', '2023-09-28');
INSERT INTO `leads` VALUES (19, 'ADIR', 'TEST', 4, 'CRM lead', 'source', '541212345610', '2', '1', '', '', 'NJ', 'BR', 'ADIR_TEST@gmail.com', '2023-09-29', NULL);
INSERT INTO `leads` VALUES (20, 'Skylar', 'Casey', 6, 'CRM lead', 'TRACKBOX_Source', '551212345678', '2', '1', '', '', 'BR', 'BR', 'skylarcasey_test@gmail.com', '2023-09-29', '2023-09-29');
INSERT INTO `leads` VALUES (22, 'Lucas', 'Harris', 5, '', '', '573336666', '2', '1', '', '', 'CH', 'MX', 'lucas.harris_test@gmail.com', '2023-10-02', '2023-10-02');
INSERT INTO `leads` VALUES (23, 'Kevin', 'Nakamoto', 6, '', '', '5733558877', '2', '1', '', '', 'MX', 'MX', 'lucas.harris_test@gmail.com', '2023-10-02', NULL);

-- ----------------------------
-- Table structure for notification
-- ----------------------------
DROP TABLE IF EXISTS `notification`;
CREATE TABLE `notification`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lead_id` int(11) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  `ftd_date` datetime(0) NULL DEFAULT NULL,
  `updated` int(11) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of notification
-- ----------------------------
INSERT INTO `notification` VALUES (2, 15, 3, '0000-00-00 00:00:00', 0);

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
  `created_date` datetime(0) NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of publisher
-- ----------------------------
INSERT INTO `publisher` VALUES (1, 'Seamotech', 'mp5840836@gmail.com', '2012557619', 'b4df67f651cf35c623d039a35790d43f38ebd29be983cefc8822de2fd3b9c42a', '2023-09-28 00:20:45');
INSERT INTO `publisher` VALUES (2, 'ZGB SL', 'maciej@zgbservices.com', '34690166897', '1023dae71bf18cbd8b93856947b75a0f26bc96bb0be49b29cf922c292a623980', '2023-09-27 06:47:46');

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
) ENGINE = InnoDB AUTO_INCREMENT = 79 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

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
INSERT INTO `sub_leads` VALUES (48, 'MPC_1', 'camp', 14);
INSERT INTO `sub_leads` VALUES (49, 'MPC_2', '', 14);
INSERT INTO `sub_leads` VALUES (50, 'MPC_4', 'TRACKOX_Source', 14);
INSERT INTO `sub_leads` VALUES (51, 'MPC_3', '', 14);
INSERT INTO `sub_leads` VALUES (52, 'MPC_5', 'null', 14);
INSERT INTO `sub_leads` VALUES (53, 'rd', '2', 14);
INSERT INTO `sub_leads` VALUES (54, 'so', 'AFF_2958116', 14);
INSERT INTO `sub_leads` VALUES (55, 'co', 'BR', 14);
INSERT INTO `sub_leads` VALUES (56, 'code', 'BR', 14);
INSERT INTO `sub_leads` VALUES (57, 'group', '101', 14);
INSERT INTO `sub_leads` VALUES (58, 'campaign', '1', 14);
INSERT INTO `sub_leads` VALUES (59, 'camp', 'null', 14);
INSERT INTO `sub_leads` VALUES (60, 'username', 'mailto:dylanrivera test@mail.com', 14);
INSERT INTO `sub_leads` VALUES (61, 'redirect', '2', 14);
INSERT INTO `sub_leads` VALUES (62, 'prefix', '55', 14);
INSERT INTO `sub_leads` VALUES (63, 'currency', 'usd', 14);
INSERT INTO `sub_leads` VALUES (64, 'sub', '29dbbfa2a6aab3333d0a503', 14);
INSERT INTO `sub_leads` VALUES (65, 'MPC_1', 'test mpc', 15);
INSERT INTO `sub_leads` VALUES (66, 'MPC_1', 'test mpc', 16);
INSERT INTO `sub_leads` VALUES (67, 'From', 'Kevin', 16);
INSERT INTO `sub_leads` VALUES (68, 'Prefix', '44', 17);
INSERT INTO `sub_leads` VALUES (69, 'Redirect', '2', 17);
INSERT INTO `sub_leads` VALUES (70, 'Prefix', '44', 18);
INSERT INTO `sub_leads` VALUES (71, 'Redirect', '2', 18);
INSERT INTO `sub_leads` VALUES (72, 'Prefix', '44', 19);
INSERT INTO `sub_leads` VALUES (73, 'Redirect', '2', 19);
INSERT INTO `sub_leads` VALUES (74, 'Perfix', '44', 20);
INSERT INTO `sub_leads` VALUES (75, 'Redirect', '2', 20);
INSERT INTO `sub_leads` VALUES (76, 'Perfix', '52', 21);
INSERT INTO `sub_leads` VALUES (77, 'Redirect', '2', 21);
INSERT INTO `sub_leads` VALUES (78, 'MPC_1', 'mpc1', 23);

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
  `publisher_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', 'Kevin', 'Pineda', 1, '1a61442ae6e5c3d9b1f32742f6e06ba8', 1, 1);
INSERT INTO `users` VALUES (2, 'ZGB', 'ZGB', 'SL', 1, '28265a520bd1cb2856f1688865c72e75', 2, 2);

SET FOREIGN_KEY_CHECKS = 1;
