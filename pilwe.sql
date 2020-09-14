/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : pilwe

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 14/09/2020 08:48:08
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for bilik_suara
-- ----------------------------
DROP TABLE IF EXISTS `bilik_suara`;
CREATE TABLE `bilik_suara`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bilik_suara` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `flag` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_date` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_date` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bilik_suara
-- ----------------------------
INSERT INTO `bilik_suara` VALUES (1, '01', '1', '2020-09-07 06:36:34', '2020-09-07 06:36:34');
INSERT INTO `bilik_suara` VALUES (2, '02', '1', '2020-09-07 06:36:34', '2020-09-07 06:36:34');
INSERT INTO `bilik_suara` VALUES (3, '03', '1', '2020-09-07 06:36:34', '2020-09-07 06:36:34');

-- ----------------------------
-- Table structure for calon
-- ----------------------------
DROP TABLE IF EXISTS `calon`;
CREATE TABLE `calon`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_warga` int(11) NULL DEFAULT NULL,
  `is_win` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `flag` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_date` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_date` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of calon
-- ----------------------------
INSERT INTO `calon` VALUES (7, 29, NULL, '1', '2020-09-08 23:01:08', '2020-09-08 23:01:08');
INSERT INTO `calon` VALUES (8, 30, NULL, '1', '2020-09-09 00:13:22', '2020-09-09 00:13:22');
INSERT INTO `calon` VALUES (9, 3, NULL, '1', '2020-09-09 09:33:53', '2020-09-09 09:33:53');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for jenis_pendidikan
-- ----------------------------
DROP TABLE IF EXISTS `jenis_pendidikan`;
CREATE TABLE `jenis_pendidikan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `flag` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_date` datetime(0) NULL DEFAULT NULL,
  `updated_date` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jenis_pendidikan
-- ----------------------------
INSERT INTO `jenis_pendidikan` VALUES (1, 'SD', NULL, NULL, NULL);
INSERT INTO `jenis_pendidikan` VALUES (2, 'SMP', NULL, NULL, NULL);
INSERT INTO `jenis_pendidikan` VALUES (3, 'SMA', NULL, NULL, NULL);
INSERT INTO `jenis_pendidikan` VALUES (4, 'S1', NULL, NULL, NULL);
INSERT INTO `jenis_pendidikan` VALUES (5, 'S2', NULL, NULL, NULL);
INSERT INTO `jenis_pendidikan` VALUES (6, 'S3', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2020_09_07_124821_create_model_wargas_table', 2);
INSERT INTO `migrations` VALUES (5, '2020_09_07_125450_create_wargas_table', 3);

-- ----------------------------
-- Table structure for misi
-- ----------------------------
DROP TABLE IF EXISTS `misi`;
CREATE TABLE `misi`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `misi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `id_calon` int(11) NULL DEFAULT NULL,
  `flag` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_date` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_date` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of misi
-- ----------------------------
INSERT INTO `misi` VALUES (1, 'sejahtera', 1, '1', '2020-09-07 06:35:04', '2020-09-07 06:35:04');
INSERT INTO `misi` VALUES (2, 'bermartabat', 1, '1', '2020-09-07 06:35:04', '2020-09-07 06:35:04');
INSERT INTO `misi` VALUES (3, 'berkedudukan', 1, '1', '2020-09-07 06:35:04', '2020-09-07 06:35:04');
INSERT INTO `misi` VALUES (4, 'go interdesa', 2, '1', '2020-09-07 06:35:04', '2020-09-07 06:35:04');
INSERT INTO `misi` VALUES (5, 'go intercamat', 2, '1', '2020-09-07 06:35:04', '2020-09-07 06:35:04');
INSERT INTO `misi` VALUES (6, 'go interkabupaten', 2, '1', '2020-09-07 06:35:04', '2020-09-07 06:35:04');
INSERT INTO `misi` VALUES (7, 'adil', 1, '1', '2020-09-07 06:35:04', '2020-09-07 06:35:04');
INSERT INTO `misi` VALUES (8, 'makmur', 1, '1', '2020-09-07 06:35:04', '2020-09-07 06:35:04');
INSERT INTO `misi` VALUES (9, 'sejahtera', 1, '1', '2020-09-07 06:35:04', '2020-09-07 06:35:04');
INSERT INTO `misi` VALUES (10, 'berhasil sejahtera', 7, '1', '2020-09-09 00:12:41', '2020-09-09 00:12:41');
INSERT INTO `misi` VALUES (11, 'seperti itu', 7, '1', '2020-09-09 00:13:08', '2020-09-09 00:13:08');
INSERT INTO `misi` VALUES (12, 'semarak 45', 8, '1', '2020-09-09 00:14:13', '2020-09-09 00:14:13');

-- ----------------------------
-- Table structure for model_wargas
-- ----------------------------
DROP TABLE IF EXISTS `model_wargas`;
CREATE TABLE `model_wargas`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for pemilihan
-- ----------------------------
DROP TABLE IF EXISTS `pemilihan`;
CREATE TABLE `pemilihan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_warga` int(11) NULL DEFAULT NULL,
  `id_calon` int(11) NULL DEFAULT NULL,
  `id_bilik` int(11) NULL DEFAULT NULL,
  `realization_time` datetime(0) NULL DEFAULT NULL,
  `flag` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `counting` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_date` datetime(0) NULL DEFAULT NULL,
  `updated_date` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pemilihan
-- ----------------------------
INSERT INTO `pemilihan` VALUES (1, 1, 3, 2, '2020-09-12 09:43:54', '1', NULL, '2020-09-12 09:43:46', '2020-09-12 09:43:54');
INSERT INTO `pemilihan` VALUES (2, 3, 3, 2, '2020-09-12 09:44:38', '1', NULL, '2020-09-12 09:44:11', '2020-09-12 09:44:38');
INSERT INTO `pemilihan` VALUES (3, 5, 3, 2, '2020-09-12 09:45:21', '1', NULL, '2020-09-12 09:45:13', '2020-09-12 09:45:21');
INSERT INTO `pemilihan` VALUES (4, 4, 3, 2, '2020-09-12 09:46:04', '1', NULL, '2020-09-12 09:45:50', '2020-09-12 09:46:04');
INSERT INTO `pemilihan` VALUES (5, 7, 29, 2, '2020-09-12 09:46:30', '1', NULL, '2020-09-12 09:46:21', '2020-09-12 09:46:30');
INSERT INTO `pemilihan` VALUES (6, 6, 30, 2, '2020-09-12 09:51:42', '1', NULL, '2020-09-12 09:51:23', '2020-09-12 09:51:42');
INSERT INTO `pemilihan` VALUES (7, 10, 29, 2, '2020-09-12 09:54:46', '1', NULL, '2020-09-12 09:54:37', '2020-09-12 09:54:46');
INSERT INTO `pemilihan` VALUES (8, 8, 3, 2, '2020-09-12 09:55:22', '1', NULL, '2020-09-12 09:55:04', '2020-09-12 09:55:22');
INSERT INTO `pemilihan` VALUES (9, 9, 3, 2, '2020-09-12 09:55:53', '1', NULL, '2020-09-12 09:55:34', '2020-09-12 09:55:53');
INSERT INTO `pemilihan` VALUES (10, 11, 29, 2, '2020-09-12 10:03:30', '1', NULL, '2020-09-12 10:03:16', '2020-09-12 10:03:30');
INSERT INTO `pemilihan` VALUES (11, 14, 30, 2, '2020-09-12 10:09:59', '1', NULL, '2020-09-12 10:09:45', '2020-09-12 10:09:59');
INSERT INTO `pemilihan` VALUES (12, 12, 3, 2, '2020-09-12 10:11:00', '1', NULL, '2020-09-12 10:10:54', '2020-09-12 10:11:00');
INSERT INTO `pemilihan` VALUES (13, 13, 30, 2, '2020-09-12 10:14:26', '1', NULL, '2020-09-12 10:14:10', '2020-09-12 10:14:26');
INSERT INTO `pemilihan` VALUES (14, 16, 3, 2, '2020-09-12 10:15:02', '1', NULL, '2020-09-12 10:14:47', '2020-09-12 10:15:02');
INSERT INTO `pemilihan` VALUES (15, 29, 30, 2, '2020-09-13 03:13:27', '1', NULL, '2020-09-12 10:21:42', '2020-09-13 03:13:27');
INSERT INTO `pemilihan` VALUES (16, 15, 30, 1, '2020-09-13 03:04:20', '1', NULL, '2020-09-12 10:21:52', '2020-09-13 03:04:20');
INSERT INTO `pemilihan` VALUES (18, 17, 3, 1, '2020-09-13 03:04:40', '1', NULL, '2020-09-12 10:22:20', '2020-09-13 03:04:40');
INSERT INTO `pemilihan` VALUES (19, 18, 3, 2, '2020-09-13 03:14:59', '1', NULL, '2020-09-13 03:13:38', '2020-09-13 03:14:59');
INSERT INTO `pemilihan` VALUES (20, 19, 3, 2, '2020-09-13 03:15:18', '1', NULL, '2020-09-13 03:14:46', '2020-09-13 03:15:18');
INSERT INTO `pemilihan` VALUES (21, 20, 3, 2, '2020-09-13 03:16:38', '1', NULL, '2020-09-13 03:16:27', '2020-09-13 03:16:38');
INSERT INTO `pemilihan` VALUES (22, 21, 3, 2, '2020-09-13 03:20:07', '1', NULL, '2020-09-13 03:20:00', '2020-09-13 03:20:07');
INSERT INTO `pemilihan` VALUES (23, 23, 30, 2, '2020-09-13 03:20:28', '1', NULL, '2020-09-13 03:20:18', '2020-09-13 03:20:28');
INSERT INTO `pemilihan` VALUES (25, 22, 29, 1, '2020-09-13 03:31:42', '1', NULL, '2020-09-13 03:31:32', '2020-09-13 03:31:42');
INSERT INTO `pemilihan` VALUES (26, 25, 29, 1, '2020-09-13 03:32:30', '1', NULL, '2020-09-13 03:32:18', '2020-09-13 03:32:30');
INSERT INTO `pemilihan` VALUES (27, 30, 30, 1, '2020-09-13 03:33:23', '1', NULL, '2020-09-13 03:32:58', '2020-09-13 03:33:23');

-- ----------------------------
-- Table structure for rt
-- ----------------------------
DROP TABLE IF EXISTS `rt`;
CREATE TABLE `rt`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rt` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `flag` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_date` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_date` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rt
-- ----------------------------
INSERT INTO `rt` VALUES (1, '001', '1', NULL, NULL);
INSERT INTO `rt` VALUES (2, '002', '1', NULL, NULL);
INSERT INTO `rt` VALUES (6, '003', '1', '2020-09-08 01:05:42', '2020-09-08 01:05:42');

-- ----------------------------
-- Table structure for saksi
-- ----------------------------
DROP TABLE IF EXISTS `saksi`;
CREATE TABLE `saksi`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_saksi` int(11) NULL DEFAULT NULL,
  `id_calon` int(11) NULL DEFAULT NULL,
  `flag` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_date` datetime(0) NULL DEFAULT NULL,
  `updated_date` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of saksi
-- ----------------------------
INSERT INTO `saksi` VALUES (1, 7, 1, '1', '2020-09-07 06:31:34', '2020-09-07 06:31:34');
INSERT INTO `saksi` VALUES (2, 23, 2, '1', '2020-09-07 06:31:34', '2020-09-07 06:31:34');
INSERT INTO `saksi` VALUES (3, 2, 3, '1', '2020-09-07 06:31:34', '2020-09-07 06:31:34');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `id_warga` int(11) NULL DEFAULT NULL,
  `level` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `is_active` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `flag` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_date` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_date` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Admin Pilwe', 'sofian.informatika@gmail.com', NULL, '$2y$10$eIYFlbyS4mljgjGJqTbKYeXaB2ShbhVW.BfwE9on7ZwBxaTFcsDp6', NULL, '2020-09-08 12:26:02', '2020-09-08 12:26:02');

-- ----------------------------
-- Table structure for visi
-- ----------------------------
DROP TABLE IF EXISTS `visi`;
CREATE TABLE `visi`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `visi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `id_calon` int(11) NULL DEFAULT NULL,
  `flag` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_date` datetime(0) NULL DEFAULT NULL,
  `updated_date` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of visi
-- ----------------------------
INSERT INTO `visi` VALUES (1, 'sejahtera', 1, '1', '2020-09-07 06:33:58', '2020-09-07 06:33:58');
INSERT INTO `visi` VALUES (2, 'bermartabat', 1, '1', '2020-09-07 06:33:58', '2020-09-07 06:33:58');
INSERT INTO `visi` VALUES (3, 'berkedudukan', 1, '1', '2020-09-07 06:33:58', '2020-09-07 06:33:58');
INSERT INTO `visi` VALUES (4, 'go interdesa', 2, '1', '2020-09-07 06:33:58', '2020-09-07 06:33:58');
INSERT INTO `visi` VALUES (5, 'go intercamat', 2, '1', '2020-09-07 06:33:59', '2020-09-07 06:33:59');
INSERT INTO `visi` VALUES (6, 'go interkabupaten', 2, '1', '2020-09-07 06:33:59', '2020-09-07 06:33:59');
INSERT INTO `visi` VALUES (7, 'adil', 1, '1', '2020-09-07 06:33:59', '2020-09-07 06:33:59');
INSERT INTO `visi` VALUES (8, 'makmur', 1, '1', '2020-09-07 06:33:59', '2020-09-07 06:33:59');
INSERT INTO `visi` VALUES (9, 'sejahtera', 1, '1', '2020-09-07 06:33:59', '2020-09-07 06:33:59');
INSERT INTO `visi` VALUES (12, 'luar buas', 7, '1', '2020-09-09 00:12:53', '2020-09-09 00:12:53');
INSERT INTO `visi` VALUES (13, 'mantap', 7, '1', '2020-09-09 00:13:01', '2020-09-09 00:13:01');
INSERT INTO `visi` VALUES (14, 'berdikari sejahtera selamanya', 8, '1', '2020-09-09 00:14:06', '2020-09-09 00:14:06');

-- ----------------------------
-- Table structure for warga
-- ----------------------------
DROP TABLE IF EXISTS `warga`;
CREATE TABLE `warga`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tempat_lahir` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `tanggal_lahir` date NULL DEFAULT NULL,
  `id_rt` int(1) NULL DEFAULT NULL,
  `foto` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_pendidikan_terakhir` int(11) NULL DEFAULT 1,
  `flag` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_date` datetime(0) NULL DEFAULT NULL,
  `updated_date` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of warga
-- ----------------------------
INSERT INTO `warga` VALUES (1, '1234', 'A', 'Sumedang', '1988-01-01', 1, 'IMG_1738.PNG', 1, '1', '2020-09-07 06:25:41', '2020-09-08 06:26:01');
INSERT INTO `warga` VALUES (3, '1236', 'EMAN SULAEMAN', 'Sumedang', '1990-09-20', 2, '', 1, '1', '2020-09-07 06:25:41', '2020-09-12 16:43:09');
INSERT INTO `warga` VALUES (4, '1237', 'D', 'Bandung', '1978-01-01', 2, '', 1, '1', '2020-09-07 06:25:41', '2020-09-07 06:25:41');
INSERT INTO `warga` VALUES (5, '1238', 'E', 'Bandung', '1978-01-01', 3, '', 1, '1', '2020-09-07 06:25:41', '2020-09-07 06:25:41');
INSERT INTO `warga` VALUES (6, '1239', 'F', 'Sumedang', '1978-01-01', 1, '', 1, '1', '2020-09-07 06:25:41', '2020-09-07 06:25:41');
INSERT INTO `warga` VALUES (7, '1240', 'Ade Sakim', 'Semarang', '1978-01-01', 2, '', 1, '1', '2020-09-07 21:44:14', '2020-09-09 21:24:08');
INSERT INTO `warga` VALUES (8, '1241', 'H', 'Bandung', '1978-01-01', 3, '', 1, '1', '2020-09-07 06:25:41', '2020-09-07 06:25:41');
INSERT INTO `warga` VALUES (9, '1242', 'I', 'Sumedang', '1978-01-01', 3, '', 1, '1', '2020-09-07 06:25:41', '2020-09-07 06:25:41');
INSERT INTO `warga` VALUES (10, '1243', 'J', 'Bandung', '1978-01-01', 1, '', 1, '1', '2020-09-07 06:25:41', '2020-09-07 06:25:41');
INSERT INTO `warga` VALUES (11, '1244', 'K', 'Sumedang', '1978-01-01', 3, '', 1, '1', '2020-09-07 06:25:41', '2020-09-07 06:25:41');
INSERT INTO `warga` VALUES (12, '1245', 'L', 'Bandung', '1990-01-01', 3, '', 1, '1', '2020-09-07 06:25:41', '2020-09-07 06:25:41');
INSERT INTO `warga` VALUES (13, '1246', 'M', 'Bandung', '1978-01-01', 2, '', 1, '1', '2020-09-07 06:25:41', '2020-09-07 06:25:41');
INSERT INTO `warga` VALUES (14, '1247', 'Ridho Sidik Permana', 'Sumedang', '1978-01-01', 2, '', 1, '1', '2020-09-07 06:25:41', '2020-09-09 21:21:03');
INSERT INTO `warga` VALUES (15, '1248', 'O', 'Sumedang', '1978-01-01', 2, '', 1, '1', '2020-09-07 06:25:41', '2020-09-07 06:25:41');
INSERT INTO `warga` VALUES (16, '1249', 'P', 'Sumedang', '1978-01-01', 3, '', 1, '1', '2020-09-07 06:25:41', '2020-09-07 06:25:41');
INSERT INTO `warga` VALUES (17, '1250', 'Q', 'Sumedang', '1978-01-01', 3, '', 1, '1', '2020-09-07 06:25:41', '2020-09-07 06:25:41');
INSERT INTO `warga` VALUES (18, '1251', 'R', 'Sumedang', '1978-01-01', 1, 'IMG_1558.PNG', 1, '1', '2020-09-07 06:25:41', '2020-09-08 06:34:40');
INSERT INTO `warga` VALUES (19, '1252', 'S', 'Sumedang', '1978-01-01', 1, '', 1, '1', '2020-09-07 06:25:41', '2020-09-07 06:25:41');
INSERT INTO `warga` VALUES (20, '1253', 'IKA SANTIKA', 'Bandung', '1996-01-01', 1, '', 1, '1', '2020-09-07 06:25:41', '2020-09-09 21:26:18');
INSERT INTO `warga` VALUES (21, '1254', 'U', 'Bandung', '1978-01-01', 1, '', 1, '1', '2020-09-07 06:25:41', '2020-09-07 06:25:41');
INSERT INTO `warga` VALUES (22, '1255', 'V', 'Bandung', '1978-01-01', 2, '', 1, '1', '2020-09-07 06:25:41', '2020-09-07 06:25:41');
INSERT INTO `warga` VALUES (23, '1256', 'W', 'Bandung', '1978-01-01', 2, '', 1, '1', '2020-09-07 06:25:41', '2020-09-07 06:25:41');
INSERT INTO `warga` VALUES (24, '1257', 'X', 'Bandung', '1995-01-01', 3, '', 1, '1', '2020-09-07 06:25:41', '2020-09-07 06:25:41');
INSERT INTO `warga` VALUES (25, '1258', 'Y', 'Sumedang', '1978-01-01', 1, '', 1, '1', '2020-09-07 06:25:41', '2020-09-07 06:25:41');
INSERT INTO `warga` VALUES (29, '1283949484994', 'Herman Dzumafo', 'sumedang', '1994-12-01', 2, 'IMG_1738.PNG', 3, '1', '2020-09-08 06:19:36', '2020-09-09 18:01:52');
INSERT INTO `warga` VALUES (30, '29203939', 'duma', 'sumedang', '2020-09-08', 2, 'chadengle.jpg', 2, '1', NULL, '2020-09-09 18:13:19');

-- ----------------------------
-- Table structure for wargas
-- ----------------------------
DROP TABLE IF EXISTS `wargas`;
CREATE TABLE `wargas`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
