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

 Date: 06/08/2019 17:25:55
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for terapis
-- ----------------------------
DROP TABLE IF EXISTS `terapis`;
CREATE TABLE `terapis`  (
  `id_terapis` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_terapis` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama_terapis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `umur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `no_telepon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `agama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jenis_kelamin` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `provinsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kabupaten` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tempat_lahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tanggal_lahir` date NULL DEFAULT NULL,
  `file_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `file_size` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id_terapis`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of terapis
-- ----------------------------
INSERT INTO `terapis` VALUES (2, 'TRP-22030N1', '', 'Sunarti', '44', '', 'Islam', 'Wanita', 'Tiban Lama', '21', '2171', 'Tulung Agung', '2019-06-08', 'Sunarti.jpg', '11457', '2019-07-24 21:50:04');
INSERT INTO `terapis` VALUES (3, 'TRP-030027N3', '', 'Puji Astutik', '57', '', 'Islam', 'Wanita', 'Komp. Lumbung Rezeki Blok A no. 4', '21', '2171', 'Surabaya', '1967-06-06', 'Puji.JPG', '13401', '2019-07-24 21:49:49');
INSERT INTO `terapis` VALUES (4, 'TRP-20222N4', '', 'Gamiati', '49', '', 'Islam', 'Wanita', 'Bengkong Bengkel', '21', '2171', 'Tulung Agung', '1970-06-21', 'Gamiati.JPG', '11786', '2019-07-24 21:48:25');
INSERT INTO `terapis` VALUES (5, 'TRP-03082N5', '', 'Dewi Risma', '58', '', 'Islam', 'Wanita', 'Bukit Senyum', '21', '2171', 'Tulung Agung', '1961-12-23', 'Dewi Risma.JPG', '12240', '2019-07-31 15:19:30');

SET FOREIGN_KEY_CHECKS = 1;
