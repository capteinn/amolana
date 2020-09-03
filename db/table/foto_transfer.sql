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

 Date: 06/08/2019 17:25:13
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for foto_transfer
-- ----------------------------
DROP TABLE IF EXISTS `foto_transfer`;
CREATE TABLE `foto_transfer`  (
  `id_foto` int(11) NOT NULL AUTO_INCREMENT,
  `kode_pesanan_foto` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `file_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `file_size` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_foto`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of foto_transfer
-- ----------------------------
INSERT INTO `foto_transfer` VALUES (10, 'BOOK-3340C1', 'Aminem.JPG', '12464');
INSERT INTO `foto_transfer` VALUES (11, 'BOOK-3503020C2', 'Puji.JPG', '13401');

SET FOREIGN_KEY_CHECKS = 1;
