/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : pilwe

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 18/09/2020 22:04:49
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
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of calon
-- ----------------------------
INSERT INTO `calon` VALUES (7, 29, NULL, '1', '2020-09-08 23:01:08', '2020-09-08 23:01:08');
INSERT INTO `calon` VALUES (8, 30, NULL, '1', '2020-09-09 00:13:22', '2020-09-09 00:13:22');
INSERT INTO `calon` VALUES (9, 3, NULL, '1', '2020-09-09 09:33:53', '2020-09-09 09:33:53');

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
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pemilihan
-- ----------------------------
INSERT INTO `pemilihan` VALUES (1, 1, 29, 1, '2020-09-18 01:17:35', '1', '1', '2020-09-18 01:17:24', '2020-09-18 01:17:35');
INSERT INTO `pemilihan` VALUES (2, 3, 29, 1, '2020-09-18 02:13:03', '1', '1', '2020-09-18 02:12:57', '2020-09-18 02:13:03');
INSERT INTO `pemilihan` VALUES (3, 4, 30, 1, '2020-09-18 02:13:25', '1', '1', '2020-09-18 02:13:15', '2020-09-18 02:13:25');
INSERT INTO `pemilihan` VALUES (4, 5, 3, 1, '2020-09-18 02:13:50', '1', '1', '2020-09-18 02:13:44', '2020-09-18 02:13:50');
INSERT INTO `pemilihan` VALUES (5, 6, 29, 1, '2020-09-18 02:14:17', '1', '1', '2020-09-18 02:14:08', '2020-09-18 02:14:17');
INSERT INTO `pemilihan` VALUES (6, 7, 30, 1, '2020-09-18 13:16:57', '1', '1', '2020-09-18 13:13:59', '2020-09-18 13:16:57');
INSERT INTO `pemilihan` VALUES (7, 8, 30, 1, '2020-09-18 13:18:48', '1', '1', '2020-09-18 13:18:42', '2020-09-18 13:18:48');
INSERT INTO `pemilihan` VALUES (8, 9, 3, 1, '2020-09-18 13:19:26', '1', '1', '2020-09-18 13:19:21', '2020-09-18 13:19:26');
INSERT INTO `pemilihan` VALUES (9, 10, 29, 1, '2020-09-18 13:19:48', '1', '1', '2020-09-18 13:19:42', '2020-09-18 13:19:48');
INSERT INTO `pemilihan` VALUES (10, 11, 29, 1, '2020-09-18 13:20:16', '1', '1', '2020-09-18 13:20:11', '2020-09-18 13:20:16');
INSERT INTO `pemilihan` VALUES (11, 32, 29, 1, '2020-09-18 13:21:54', '1', '1', '2020-09-18 13:21:47', '2020-09-18 13:21:54');

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
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rt
-- ----------------------------
INSERT INTO `rt` VALUES (1, '001', '1', NULL, NULL);
INSERT INTO `rt` VALUES (2, '002', '1', NULL, NULL);
INSERT INTO `rt` VALUES (7, '003', '1', '2020-09-18 10:07:43', '2020-09-18 03:07:43');

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
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of saksi
-- ----------------------------
INSERT INTO `saksi` VALUES (2, 20, 7, '1', '2020-09-18 14:01:01', '2020-09-18 14:01:01');
INSERT INTO `saksi` VALUES (3, 7, 8, '1', '2020-09-18 14:01:14', '2020-09-18 14:01:14');
INSERT INTO `saksi` VALUES (4, 14, 9, '1', '2020-09-18 14:01:29', '2020-09-18 14:01:29');

-- ----------------------------
-- Table structure for system
-- ----------------------------
DROP TABLE IF EXISTS `system`;
CREATE TABLE `system`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `system_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `version` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `demo` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `limit_counting` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `limit_quick_count` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '5',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of system
-- ----------------------------
INSERT INTO `system` VALUES (1, 'PilWe', '0.1', '1', '2', '5');

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
) ENGINE = InnoDB AUTO_INCREMENT = 34 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of warga
-- ----------------------------
INSERT INTO `warga` VALUES (1, '111123', 'A', 'Sumedang', '1988-01-01', 1, 'IMG_1738.PNG', 1, '1', '2020-09-07 06:25:41', '2020-09-18 09:24:42');
INSERT INTO `warga` VALUES (3, '1236', 'PRABOWO SUBIANTO', 'Sumedang', '1990-09-20', 2, 'prabowo.jpg', 1, '1', '2020-09-07 06:25:41', '2020-09-17 17:45:02');
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
INSERT INTO `warga` VALUES (29, '1283949484994', 'BJ HABIBIE', 'sumedang', '1994-12-01', 2, 'bj habiebie.jpg', 3, '1', '2020-09-08 06:19:36', '2020-09-17 17:45:43');
INSERT INTO `warga` VALUES (30, '29203939', 'JOKO WIDODO', 'sumedang', '2020-09-08', 2, 'Joko-Widodo.jpg', 2, '1', NULL, '2020-09-17 17:45:18');
INSERT INTO `warga` VALUES (31, '1111111111111111', 'ABCDE', 'SUMEDANG', '2020-09-18', 1, NULL, 1, '1', NULL, '2020-09-18 19:06:40');
INSERT INTO `warga` VALUES (32, '12312312312312', 'ABCDEF', 'SUMEDANG', '2020-09-18', 1, NULL, 1, NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
