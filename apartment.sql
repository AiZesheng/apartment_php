/*
 Navicat MySQL Data Transfer

 Source Server         : 2016
 Source Server Version : 50718
 Source Host           : localhost
 Source Database       : apartment

 Target Server Version : 50718
 File Encoding         : utf-8

 Date: 05/04/2018 19:47:14 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `t_admin`
-- ----------------------------
DROP TABLE IF EXISTS `t_admin`;
CREATE TABLE `t_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '宿管id',
  `name` varchar(255) DEFAULT NULL COMMENT '管理员姓名',
  `sex` varchar(255) DEFAULT NULL COMMENT '性别',
  `job` varchar(255) DEFAULT NULL COMMENT '职务',
  `idNumber` varchar(255) DEFAULT NULL COMMENT '身份证号',
  `time` varchar(255) DEFAULT NULL COMMENT '入职时间',
  `apartment_id` int(11) DEFAULT NULL COMMENT '宿舍楼id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `t_rooms`
-- ----------------------------
BEGIN;
INSERT INTO `t_rooms` VALUES ('3', '110', '4', '1'), ('4', '111', '4', '1'), ('5', '112', '4', '1'), ('6', '113', '4', '1'), ('7', '114', '4', '1'), ('8', '110', '8', '3'), ('9', '111', '8', '3'), ('10', '112', '8', '3'), ('13', '117', '4', '1'), ('15', '118', '4', '1'), ('16', '119', '4', '1'), ('18', '115', '4', '1'), ('19', '116', '4', '1');
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
  `idNumber` varchar(255) DEFAULT NULL COMMENT '身份证号',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `t_students`
-- ----------------------------
BEGIN;
INSERT INTO `t_students` VALUES ('1', '20145911', '王五', '男', '软件学院', '上海市浦东新区高斯路1122弄7号', '13256784512', '团员', null), ('7', '20145801', '赵月越', '女', '软件学院', '黑龙江省齐齐哈尔市中山路75号', '15898786512', '团员', '230281199510030935'), ('11', '20145802', '张三', '女', '软件学院', '上海市长宁区娄山关路533号', '13546796523', '团员', '230134199608124376'), ('12', '20145803', '张伟', '男', '计算机科学与技术学院', '上海市徐汇区天山西路562弄', '15342869579', '团员', '230281199709238954'), ('13', '20145899', '孙长一', '男', '计算机科学与技术学院', '黑龙江省大庆市江南路123号', '18545912594', '团员', null), ('14', '20145897', '李娟', '女', '计算机科学与技术学院', '上海市清东新区唐镇高科东路川沙路', '13256412356', '党员', null), ('15', '20145805', '张越载', '男', '计算机科学与技术学院', '黑龙江省哈尔滨市南岗区学府路89号', '18978490987', '团员', null), ('16', '20145806', '李城另', '女', '软件学院', '黑龙江大庆市江南路1234号', '19878784653', '党员', null), ('17', '20145807', '王加小', '女', '软件学院', '上海市浦东新区高科东路2354号', '18676530987', '团员', null), ('18', '20145808', '钱啥啥', '女', '计算机科学与技术学院', '上海市浦东新区那个路34号', '18794631837', '党员', null), ('19', '20145809', '李苛苛', '女', '软件学院', '上海市长宁区娄山关路89号', '18593473829', '团员', null), ('21', '20145912', '钱小伟', '男', '软件学院', '上海市浦东新区高科东路川沙路', '18678904378', '团员', null), ('23', '20145810', '孙一铭', '男', '计算机科学与技术学院', '上海市浦东新区亮秀路112号', '18795749023', '团员', null), ('24', '20145811', '李伟', '男', '软件学院', '上海市长宁区娄山关路567号', '13476238904', '团员', null), ('26', '20145804', '周可可', '女', '软件学院', '上海市浦东新区川沙新镇78号', '18794367894', '群众', null), ('27', '20145812', '李卡特', '女', '软件学院', '上海市长宁区娄山关路890号', '18978564321', '团员', null), ('28', '20145813', '郑好男', '女', '计算机科学与技术学院', '上海市长宁区娄山关路56号', '18967439021', '团员', '230281199610049078');
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
--  Records of `t_students_rooms`
-- ----------------------------
BEGIN;
INSERT INTO `t_students_rooms` VALUES ('7', '18'), ('11', '3'), ('12', '3'), ('26', '3'), ('15', '4'), ('16', '4'), ('17', '8'), ('18', '8'), ('19', '8'), ('23', '8'), ('24', '8'), ('27', '8'), ('14', '8'), ('13', '8'), ('1', '10');
COMMIT;

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

-- ----------------------------
--  Table structure for `t_visitor`
-- ----------------------------
DROP TABLE IF EXISTS `t_visitor`;
CREATE TABLE `t_visitor` (
  `apartment_id` int(11) NOT NULL COMMENT '宿舍楼id',
  `visitorName` varchar(255) NOT NULL COMMENT '来访人姓名',
  `visitorType` int(11) NOT NULL COMMENT '来访人身份',
  `matter` text NOT NULL COMMENT '来访事项',
  `visitorTime` varchar(255) NOT NULL COMMENT '来访时间',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `t_visitor`
-- ----------------------------
BEGIN;
INSERT INTO `t_visitor` VALUES ('1', '王博', '2', '查寝', '1523607777000', '2'), ('1', '张某某', '1', '看望学生', '1523323800000', '3'), ('1', '李周二', '1', '看望学生', '1523319600000', '4'), ('2', '王博', '2', '查寝', '1524635705000', '6'), ('1', '张向东', '4', '修水管', '1523433420000', '7'), ('1', '李伟', '3', '检查寝室', '1522720620000', '8'), ('1', '张继', '1', '看学生', '1522980413000', '9'), ('1', '李城', '1', '看学生', '1519873644000', '10'), ('1', '赵之', '1', '看学生', '1518134882000', '11'), ('1', '孙区', '1', '看望学生', '1524132523000', '12');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
