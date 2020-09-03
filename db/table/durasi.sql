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

 Date: 06/08/2019 17:25:00
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for durasi
-- ----------------------------
DROP TABLE IF EXISTS `durasi`;
CREATE TABLE `durasi`  (
  `id_durasi` int(11) NOT NULL AUTO_INCREMENT,
  `kode_pesanan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_terapis` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `durasi` time(0) NULL DEFAULT NULL,
  `status_durasi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tanggal` date NULL DEFAULT NULL,
  `id_client` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id_durasi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of durasi
-- ----------------------------
INSERT INTO `durasi` VALUES (2, 'BOOK-3340C1', '5', '20:00:00', '0', '2019-08-03', 73);
INSERT INTO `durasi` VALUES (3, 'BOOK-3340C1', '5', '20:30:00', '0', '2019-08-03', 73);
INSERT INTO `durasi` VALUES (4, 'BOOK-3340C1', '5', '21:00:00', '0', '2019-08-03', 73);
INSERT INTO `durasi` VALUES (5, 'BOOK-3340C1', '5', '21:30:00', '0', '2019-08-03', 73);
INSERT INTO `durasi` VALUES (6, 'BOOK-3340C1', '5', '22:00:00', '0', '2019-08-03', 73);
INSERT INTO `durasi` VALUES (7, 'BOOK-3503020C2', '3', '16:00:00', '0', '2019-08-03', 73);
INSERT INTO `durasi` VALUES (8, 'BOOK-3503020C2', '3', '16:30:00', '0', '2019-08-03', 73);
INSERT INTO `durasi` VALUES (9, 'BOOK-3503020C2', '3', '17:00:00', '0', '2019-08-03', 73);
INSERT INTO `durasi` VALUES (10, 'BOOK-3503020C2', '3', '17:30:00', '0', '2019-08-03', 73);
INSERT INTO `durasi` VALUES (11, 'BOOK-3503020C2', '3', '18:00:00', '0', '2019-08-03', 73);

SET FOREIGN_KEY_CHECKS = 1;
