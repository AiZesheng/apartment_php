/*
Navicat MySQL Data Transfer

Source Server         : 2018
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : apartment

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-05-11 12:20:06
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `t_admin`
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_admin
-- ----------------------------
INSERT INTO `t_admin` VALUES ('2', '张伟', '男', '宿舍楼长', '230281198512145236', '1525190400000', '2');
INSERT INTO `t_admin` VALUES ('3', '懂一', '男', '宿舍楼长', '230152198410020965', '1493222400000', '1');
INSERT INTO `t_admin` VALUES ('4', '李艳', '女', '宿舍阿姨', '230165197311216523', '1525363200000', '1');
INSERT INTO `t_admin` VALUES ('5', '张磊', '男', '宿舍楼长', '230281197910026523', '1521043200000', '3');
INSERT INTO `t_admin` VALUES ('6', '刘英', '女', '宿舍阿姨', '230281197511245632', '1522944000000', '3');
INSERT INTO `t_admin` VALUES ('7', '李洋', '女', '宿舍阿姨', '230154197202234512', '1525795200000', '2');

-- ----------------------------
-- Table structure for `t_apartment`
-- ----------------------------
DROP TABLE IF EXISTS `t_apartment`;
CREATE TABLE `t_apartment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `apartment` varchar(255) NOT NULL COMMENT '宿舍楼名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_apartment
-- ----------------------------
INSERT INTO `t_apartment` VALUES ('1', 'C区17栋');
INSERT INTO `t_apartment` VALUES ('2', 'C区28栋');
INSERT INTO `t_apartment` VALUES ('3', 'A区9栋');
INSERT INTO `t_apartment` VALUES ('4', 'C区26栋');
INSERT INTO `t_apartment` VALUES ('5', 'C区16栋');

-- ----------------------------
-- Table structure for `t_rooms`
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
-- Records of t_rooms
-- ----------------------------
INSERT INTO `t_rooms` VALUES ('3', '110', '4', '1');
INSERT INTO `t_rooms` VALUES ('4', '111', '4', '1');
INSERT INTO `t_rooms` VALUES ('5', '112', '4', '1');
INSERT INTO `t_rooms` VALUES ('6', '113', '4', '1');
INSERT INTO `t_rooms` VALUES ('7', '114', '4', '1');
INSERT INTO `t_rooms` VALUES ('8', '110', '8', '3');
INSERT INTO `t_rooms` VALUES ('9', '111', '8', '3');
INSERT INTO `t_rooms` VALUES ('10', '112', '8', '3');
INSERT INTO `t_rooms` VALUES ('13', '117', '4', '1');
INSERT INTO `t_rooms` VALUES ('15', '118', '4', '1');
INSERT INTO `t_rooms` VALUES ('16', '119', '4', '1');
INSERT INTO `t_rooms` VALUES ('18', '115', '4', '1');
INSERT INTO `t_rooms` VALUES ('19', '116', '4', '1');

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
  `idNumber` varchar(255) DEFAULT NULL COMMENT '身份证号',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_students
-- ----------------------------
INSERT INTO `t_students` VALUES ('1', '20145911', '王五', '男', '软件学院', '上海市浦东新区高斯路1122弄7号', '13256784512', '团员', '230281199605129856');
INSERT INTO `t_students` VALUES ('7', '20145801', '赵月越', '女', '软件学院', '黑龙江省齐齐哈尔市中山路75号', '15856231245', '团员', '230281199510030935');
INSERT INTO `t_students` VALUES ('11', '20145802', '张三', '女', '软件学院', '上海市长宁区娄山关路533号', '13546796523', '团员', '230134199608124376');
INSERT INTO `t_students` VALUES ('12', '20145803', '张伟', '男', '计算机科学与技术学院', '上海市徐汇区天山西路562弄', '15342869579', '团员', '230281199709238954');
INSERT INTO `t_students` VALUES ('13', '20145899', '孙长一', '男', '计算机科学与技术学院', '黑龙江省大庆市江南路123号', '18545912594', '团员', '230215199612102659');
INSERT INTO `t_students` VALUES ('14', '20145897', '李娟', '女', '计算机科学与技术学院', '上海市清东新区唐镇高科东路川沙路', '13256412356', '党员', '230281199612302656');
INSERT INTO `t_students` VALUES ('15', '20145805', '张越载', '男', '计算机科学与技术学院', '黑龙江省哈尔滨市南岗区学府路89号', '18978490987', '团员', '230256199510052356');
INSERT INTO `t_students` VALUES ('16', '20145806', '李城另', '女', '软件学院', '黑龙江大庆市江南路1234号', '19878784653', '党员', '230281199502061298');
INSERT INTO `t_students` VALUES ('17', '20145807', '王加小', '女', '软件学院', '上海市浦东新区高科东路2354号', '18676530987', '团员', '230281199612305623');
INSERT INTO `t_students` VALUES ('18', '20145808', '钱啥啥', '女', '计算机科学与技术学院', '上海市浦东新区那个路34号', '18794631837', '党员', '230281199410224521');
INSERT INTO `t_students` VALUES ('19', '20145809', '李苛苛', '女', '软件学院', '上海市长宁区娄山关路89号', '18593473829', '团员', '230154199512016985');
INSERT INTO `t_students` VALUES ('21', '20145912', '钱小伟', '男', '软件学院', '上海市浦东新区高科东路川沙路', '18678904378', '团员', '230281199310236545');
INSERT INTO `t_students` VALUES ('23', '20145810', '孙一铭', '男', '计算机科学与技术学院', '上海市浦东新区亮秀路112号', '18795749023', '团员', '230281199602302545');
INSERT INTO `t_students` VALUES ('24', '20145811', '李伟', '男', '软件学院', '上海市长宁区娄山关路567号', '13476238904', '团员', '230281199510030965');
INSERT INTO `t_students` VALUES ('26', '20145804', '周可可', '女', '软件学院', '上海市浦东新区川沙新镇78号', '18794367894', '群众', '230156199612124565');
INSERT INTO `t_students` VALUES ('27', '20145812', '李卡特', '女', '软件学院', '上海市长宁区娄山关路890号', '18978564321', '团员', '230281199510022654');
INSERT INTO `t_students` VALUES ('28', '20145813', '郑好男', '女', '计算机科学与技术学院', '上海市长宁区娄山关路56号', '18967439021', '团员', '230281199610049078');

-- ----------------------------
-- Table structure for `t_students_rooms`
-- ----------------------------
DROP TABLE IF EXISTS `t_students_rooms`;
CREATE TABLE `t_students_rooms` (
  `student_id` int(11) NOT NULL COMMENT '学生姓名',
  `room_id` int(11) NOT NULL COMMENT '房间id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_students_rooms
-- ----------------------------
INSERT INTO `t_students_rooms` VALUES ('7', '18');
INSERT INTO `t_students_rooms` VALUES ('11', '3');
INSERT INTO `t_students_rooms` VALUES ('12', '3');
INSERT INTO `t_students_rooms` VALUES ('26', '3');
INSERT INTO `t_students_rooms` VALUES ('15', '4');
INSERT INTO `t_students_rooms` VALUES ('16', '4');
INSERT INTO `t_students_rooms` VALUES ('17', '8');
INSERT INTO `t_students_rooms` VALUES ('18', '8');
INSERT INTO `t_students_rooms` VALUES ('19', '8');
INSERT INTO `t_students_rooms` VALUES ('23', '8');
INSERT INTO `t_students_rooms` VALUES ('24', '8');
INSERT INTO `t_students_rooms` VALUES ('27', '8');
INSERT INTO `t_students_rooms` VALUES ('14', '8');
INSERT INTO `t_students_rooms` VALUES ('13', '8');
INSERT INTO `t_students_rooms` VALUES ('1', '10');

-- ----------------------------
-- Table structure for `t_user`
-- ----------------------------
DROP TABLE IF EXISTS `t_user`;
CREATE TABLE `t_user` (
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `password` varchar(255) NOT NULL COMMENT '密码',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_user
-- ----------------------------
INSERT INTO `t_user` VALUES ('admin', 'admin', '1');
INSERT INTO `t_user` VALUES ('张三', '李四', '2');
INSERT INTO `t_user` VALUES ('张三', '李四', '3');
INSERT INTO `t_user` VALUES ('张三', '李四', '4');
INSERT INTO `t_user` VALUES ('admin2', 'admin', '5');
INSERT INTO `t_user` VALUES ('admin3', 'admin3', '6');
INSERT INTO `t_user` VALUES ('admin4', 'admin4', '7');
INSERT INTO `t_user` VALUES ('adminasdf', 'admin', '8');

-- ----------------------------
-- Table structure for `t_visitor`
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_visitor
-- ----------------------------
INSERT INTO `t_visitor` VALUES ('1', '王博', '2', '查寝', '1523604177000', '2');
INSERT INTO `t_visitor` VALUES ('1', '张某某', '1', '看望学生', '1523323800000', '3');
INSERT INTO `t_visitor` VALUES ('1', '李周二', '1', '看望学生', '1523319600000', '4');
INSERT INTO `t_visitor` VALUES ('2', '王博', '2', '查寝', '1524635705000', '6');
INSERT INTO `t_visitor` VALUES ('1', '张向东', '4', '修水管', '1523433420000', '7');
INSERT INTO `t_visitor` VALUES ('1', '李伟', '3', '检查寝室', '1522720620000', '8');
INSERT INTO `t_visitor` VALUES ('1', '张继', '1', '看学生', '1522980413000', '9');
INSERT INTO `t_visitor` VALUES ('1', '李城', '1', '看学生', '1519873644000', '10');
INSERT INTO `t_visitor` VALUES ('1', '赵之', '1', '看学生', '1518134882000', '11');
INSERT INTO `t_visitor` VALUES ('1', '孙区', '1', '看望学生', '1524132523000', '12');
INSERT INTO `t_visitor` VALUES ('2', '王博', '2', '查寝', '1525435130000', '13');
