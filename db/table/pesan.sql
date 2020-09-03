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

 Date: 06/08/2019 17:25:41
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for pesan
-- ----------------------------
DROP TABLE IF EXISTS `pesan`;
CREATE TABLE `pesan`  (
  `id_pesanan` int(11) NOT NULL AUTO_INCREMENT,
  `id_terapis` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_client` int(255) NULL DEFAULT NULL,
  `kode_pesanan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_pemesan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `price` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_pesan` int(255) NULL DEFAULT NULL,
  `tanggal` date NULL DEFAULT NULL,
  `comment_status` int(11) NULL DEFAULT NULL,
  `status_transfer` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_pesanan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of pesan
-- ----------------------------
INSERT INTO `pesan` VALUES (1, '5', 73, 'BOOK-3340C1', 'suharyadi', 'citra batam', '120000', 0, '2019-08-03', 1, 1);
INSERT INTO `pesan` VALUES (2, '3', 73, 'BOOK-3503020C2', 'suharyadi kedua', 'qwerty', '120000', 0, '2019-08-03', 1, 1);

SET FOREIGN_KEY_CHECKS = 1;
