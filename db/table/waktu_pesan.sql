/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50626
 Source Host           : localhost:3306
 Source Schema         : amolana

 Target Server Type    : MySQL
 Target Server Version : 50626
 File Encoding         : 65001

 Date: 06/08/2019 17:26:18
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for waktu_pesan
-- ----------------------------
DROP TABLE IF EXISTS `waktu_pesan`;
CREATE TABLE `waktu_pesan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `waktu` time(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of waktu_pesan
-- ----------------------------
INSERT INTO `waktu_pesan` VALUES (1, '08:00:00');
INSERT INTO `waktu_pesan` VALUES (2, '08:30:00');
INSERT INTO `waktu_pesan` VALUES (3, '09:00:00');
INSERT INTO `waktu_pesan` VALUES (4, '09:30:00');
INSERT INTO `waktu_pesan` VALUES (5, '10:00:00');
INSERT INTO `waktu_pesan` VALUES (6, '10:30:00');
INSERT INTO `waktu_pesan` VALUES (7, '11:00:00');
INSERT INTO `waktu_pesan` VALUES (8, '11:30:00');
INSERT INTO `waktu_pesan` VALUES (9, '12:00:00');
INSERT INTO `waktu_pesan` VALUES (10, '12:30:00');
INSERT INTO `waktu_pesan` VALUES (11, '13:00:00');
INSERT INTO `waktu_pesan` VALUES (12, '13:30:00');
INSERT INTO `waktu_pesan` VALUES (13, '14:00:00');
INSERT INTO `waktu_pesan` VALUES (14, '14:30:00');
INSERT INTO `waktu_pesan` VALUES (15, '15:00:00');
INSERT INTO `waktu_pesan` VALUES (16, '15:30:00');
INSERT INTO `waktu_pesan` VALUES (17, '16:00:00');
INSERT INTO `waktu_pesan` VALUES (18, '16:30:00');
INSERT INTO `waktu_pesan` VALUES (19, '17:00:00');
INSERT INTO `waktu_pesan` VALUES (20, '17:30:00');
INSERT INTO `waktu_pesan` VALUES (21, '18:00:00');
INSERT INTO `waktu_pesan` VALUES (22, '18:30:00');
INSERT INTO `waktu_pesan` VALUES (23, '19:00:00');
INSERT INTO `waktu_pesan` VALUES (24, '19:30:00');
INSERT INTO `waktu_pesan` VALUES (25, '20:00:00');
INSERT INTO `waktu_pesan` VALUES (26, '20:30:00');
INSERT INTO `waktu_pesan` VALUES (27, '21:00:00');
INSERT INTO `waktu_pesan` VALUES (28, '21:30:00');
INSERT INTO `waktu_pesan` VALUES (30, '22:00:00');

SET FOREIGN_KEY_CHECKS = 1;
