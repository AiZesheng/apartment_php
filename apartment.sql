/*
Navicat MySQL Data Transfer

Source Server         : 2018
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : apartment

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-03-19 12:50:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `t_students`
-- ----------------------------
DROP TABLE IF EXISTS `t_students`;
CREATE TABLE `t_students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sno` varchar(255) DEFAULT NULL COMMENT '学号',
  `name` varchar(255) DEFAULT NULL COMMENT '姓名',
  `sex` varchar(255) DEFAULT NULL COMMENT '性别',
  `college` varchar(255) DEFAULT NULL COMMENT '学院',
  `nativePlace` varchar(255) DEFAULT NULL COMMENT '籍贯',
  `phone` varchar(255) DEFAULT NULL COMMENT '手机号',
  `political` varchar(255) DEFAULT NULL COMMENT '政治面貌',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_students
-- ----------------------------
INSERT INTO `t_students` VALUES ('1', '20145911', '王五', '男', '软件学院', '上海市浦东新区高斯路1122弄7号', '13256784512', '团员');
INSERT INTO `t_students` VALUES ('7', '20145801', '赵月越', '女', '软件学院', '黑龙江省齐齐哈尔市中山路752号', '15898786512', '团员');
INSERT INTO `t_students` VALUES ('11', '20145802', '张三', '女', '软件学院', '上海市长宁区娄山关路533号', '13546796523', '团员');
INSERT INTO `t_students` VALUES ('12', '20145803', '张伟', '男', '计算机科学与技术学院', '上海市徐汇区天山西路562弄', '15342869579', '团员');
INSERT INTO `t_students` VALUES ('13', '20145899', '孙长一', '男', '计算机科学与技术学院', '黑龙江省大庆市江南路123号', '18545912594', '团员');
INSERT INTO `t_students` VALUES ('14', '20145897', '李娟', '女', '计算机科学与技术学院', '上海市清东新区唐镇高科东路川沙路1211号', '13256412356', '党员');

-- ----------------------------
-- Table structure for `t_user`
-- ----------------------------
DROP TABLE IF EXISTS `t_user`;
CREATE TABLE `t_user` (
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `password` varchar(255) NOT NULL COMMENT '密码',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_user
-- ----------------------------
INSERT INTO `t_user` VALUES ('admin', 'admin', '1');
INSERT INTO `t_user` VALUES ('张三', '李四', '2');
INSERT INTO `t_user` VALUES ('张三', '李四', '3');
INSERT INTO `t_user` VALUES ('张三', '李四', '4');
