/*
 Navicat MySQL Data Transfer

 Source Server         : 2016
 Source Server Version : 50718
 Source Host           : localhost
 Source Database       : apartment

 Target Server Version : 50718
 File Encoding         : utf-8

 Date: 04/10/2018 17:35:00 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `t_apartment`
-- ----------------------------
DROP TABLE IF EXISTS `t_apartment`;
CREATE TABLE `t_apartment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `apartment` varchar(255) NOT NULL COMMENT '宿舍楼名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `t_apartment`
-- ----------------------------
BEGIN;
INSERT INTO `t_apartment` VALUES ('1', 'C区17栋'), ('2', 'C区28栋'), ('3', 'A区9栋');
COMMIT;

-- ----------------------------
--  Table structure for `t_rooms`
-- ----------------------------
DROP TABLE IF EXISTS `t_rooms`;
CREATE TABLE `t_rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roomNo` varchar(255) NOT NULL COMMENT '房间号',
  `roomType` varchar(255) NOT NULL COMMENT '房间类型',
  `apartment_id` int(11) NOT NULL COMMENT '宿舍楼id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `t_rooms`
-- ----------------------------
BEGIN;
INSERT INTO `t_rooms` VALUES ('3', '110', '4', '1'), ('4', '111', '4', '1'), ('5', '112', '4', '1'), ('6', '113', '4', '1'), ('7', '114', '4', '1'), ('8', '110', '8', '3'), ('9', '111', '8', '3'), ('10', '112', '8', '3');
COMMIT;

-- ----------------------------
--  Table structure for `t_students`
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `t_students`
-- ----------------------------
BEGIN;
INSERT INTO `t_students` VALUES ('1', '20145911', '王五', '男', '软件学院', '上海市浦东新区高斯路1122弄7号', '13256784512', '团员'), ('7', '20145801', '赵月越', '女', '软件学院', '黑龙江省齐齐哈尔市中山路752号', '15898786512', '团员'), ('11', '20145802', '张三', '女', '软件学院', '上海市长宁区娄山关路533号', '13546796523', '团员'), ('12', '20145803', '张伟', '男', '计算机科学与技术学院', '上海市徐汇区天山西路562弄', '15342869579', '团员'), ('13', '20145899', '孙长一', '男', '计算机科学与技术学院', '黑龙江省大庆市江南路123号', '18545912594', '团员'), ('14', '20145897', '李娟', '女', '计算机科学与技术学院', '上海市清东新区唐镇高科东路川沙路1211号', '13256412356', '党员'), ('15', '20145805', '张越载', '男', '计算机科学与技术学院', '黑龙江大庆那啥', '18978490987', '团员'), ('16', '20145806', '李城另', '女', '软件学院', '黑龙江大庆市江南路1234号', '19878784653', '党员'), ('17', '20145807', '王加小', '女', '软件学院', '上海市浦东新区高科东路2354号', '18676530987', '团员'), ('18', '20145808', '钱啥啥', '女', '计算机科学与技术学院', '上海市浦东新区那个路34号', '18794631837', '党员'), ('19', '20145809', '李苛苛', '女', '软件学院', '上海市长宁区娄山关路89号', '18593473829', '团员'), ('20', '20145810', '孙那一', '女', '软件学院', '黑龙江省哈尔滨市香坊区各种路2345号', '13476890912', '群众'), ('21', '20145912', '钱小伟', '男', '软件学院', '上海市浦东新区高科东路川沙路', '18678904378', '团员'), ('22', '20145811', '张新新', '女', '计算机科学与技术学院', '黑龙江省哈尔滨市南岗区学府路2345号', '13456872309', '团员');
COMMIT;

-- ----------------------------
--  Table structure for `t_students_rooms`
-- ----------------------------
DROP TABLE IF EXISTS `t_students_rooms`;
CREATE TABLE `t_students_rooms` (
  `student_id` int(11) NOT NULL COMMENT '学生姓名',
  `room_id` int(11) NOT NULL COMMENT '房间id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `t_user`
-- ----------------------------
DROP TABLE IF EXISTS `t_user`;
CREATE TABLE `t_user` (
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `password` varchar(255) NOT NULL COMMENT '密码',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `t_user`
-- ----------------------------
BEGIN;
INSERT INTO `t_user` VALUES ('admin', 'admin', '1'), ('张三', '李四', '2'), ('张三', '李四', '3'), ('张三', '李四', '4');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
