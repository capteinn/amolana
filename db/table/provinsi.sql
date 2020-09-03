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

 Date: 06/08/2019 17:25:48
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for provinsi
-- ----------------------------
DROP TABLE IF EXISTS `provinsi`;
CREATE TABLE `provinsi`  (
  `id_prov` char(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` tinytext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_prov`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of provinsi
-- ----------------------------
INSERT INTO `provinsi` VALUES ('11', 'Aceh');
INSERT INTO `provinsi` VALUES ('12', 'Sumatera Utara');
INSERT INTO `provinsi` VALUES ('13', 'Sumatera Barat');
INSERT INTO `provinsi` VALUES ('14', 'Riau');
INSERT INTO `provinsi` VALUES ('15', 'Jambi');
INSERT INTO `provinsi` VALUES ('16', 'Sumatera Selatan');
INSERT INTO `provinsi` VALUES ('17', 'Bengkulu');
INSERT INTO `provinsi` VALUES ('18', 'Lampung');
INSERT INTO `provinsi` VALUES ('19', 'Kepulauan Bangka Belitung');
INSERT INTO `provinsi` VALUES ('21', 'Kepulauan Riau');
INSERT INTO `provinsi` VALUES ('31', 'DKI Jakarta');
INSERT INTO `provinsi` VALUES ('32', 'Jawa Barat');
INSERT INTO `provinsi` VALUES ('33', 'Jawa Tengah');
INSERT INTO `provinsi` VALUES ('34', 'DI Yogyakarta');
INSERT INTO `provinsi` VALUES ('35', 'Jawa Timur');
INSERT INTO `provinsi` VALUES ('36', 'Banten');
INSERT INTO `provinsi` VALUES ('51', 'Bali');
INSERT INTO `provinsi` VALUES ('52', 'Nusa Tenggara Barat');
INSERT INTO `provinsi` VALUES ('53', 'Nusa Tenggara Timur');
INSERT INTO `provinsi` VALUES ('61', 'Kalimantan Barat');
INSERT INTO `provinsi` VALUES ('62', 'Kalimantan Tengah');
INSERT INTO `provinsi` VALUES ('63', 'Kalimantan Selatan');
INSERT INTO `provinsi` VALUES ('64', 'Kalimantan Timur');
INSERT INTO `provinsi` VALUES ('65', 'Kalimantan Utara');
INSERT INTO `provinsi` VALUES ('71', 'Sulawesi Utara');
INSERT INTO `provinsi` VALUES ('72', 'Sulawesi Tengah');
INSERT INTO `provinsi` VALUES ('73', 'Sulawesi Selatan');
INSERT INTO `provinsi` VALUES ('74', 'Sulawesi Tenggara');
INSERT INTO `provinsi` VALUES ('75', 'Gorontalo');
INSERT INTO `provinsi` VALUES ('76', 'Sulawesi Barat');
INSERT INTO `provinsi` VALUES ('81', 'Maluku');
INSERT INTO `provinsi` VALUES ('82', 'Maluku Utara');
INSERT INTO `provinsi` VALUES ('91', 'Papua Barat');
INSERT INTO `provinsi` VALUES ('92', 'Papua');

SET FOREIGN_KEY_CHECKS = 1;
