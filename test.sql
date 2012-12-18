/*
Navicat MySQL Data Transfer

Source Server         : Local
Source Server Version : 50150
Source Host           : localhost:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50150
File Encoding         : 65001

Date: 2012-11-12 16:18:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `posts`
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` text NOT NULL,
  `contenido` text NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  `autor` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_post`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES ('1', 'Post de prueba', 'Contenido de post de prueba', '2012-10-24 12:25:00', '1', 'Jean Rumeau');
INSERT INTO `posts` VALUES ('2', 'Titulo de Prueba', 'Contenido de Prueba', '2012-11-06 16:26:15', '1', 'Robot Escritor');
INSERT INTO `posts` VALUES ('3', 'Titulo de pueba 2', 'Contenido de prueba <strong>test</strong>', '2012-11-06 16:36:17', '1', 'Robot Escritor');
