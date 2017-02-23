/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50548
Source Host           : localhost:3306
Source Database       : booksystem

Target Server Type    : MYSQL
Target Server Version : 50548
File Encoding         : 65001

Date: 2017-02-23 14:02:02
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `adminName` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('4', 'admin', 'heheda.00');

-- ----------------------------
-- Table structure for discate
-- ----------------------------
DROP TABLE IF EXISTS `discate`;
CREATE TABLE `discate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cateName` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of discate
-- ----------------------------
INSERT INTO `discate` VALUES ('1', '内科');
INSERT INTO `discate` VALUES ('2', '儿科');
INSERT INTO `discate` VALUES ('3', '五官科');
INSERT INTO `discate` VALUES ('4', '肠胃科');

-- ----------------------------
-- Table structure for disease
-- ----------------------------
DROP TABLE IF EXISTS `disease`;
CREATE TABLE `disease` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `disName` varchar(45) NOT NULL,
  `cateId` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of disease
-- ----------------------------
INSERT INTO `disease` VALUES ('1', '流行性感冒', '1');
INSERT INTO `disease` VALUES ('2', '糖尿病', '1');
INSERT INTO `disease` VALUES ('3', '胃病', '1');
INSERT INTO `disease` VALUES ('4', '阑尾炎', '1');
INSERT INTO `disease` VALUES ('5', '高血压', '1');
INSERT INTO `disease` VALUES ('6', '心肌梗塞', '1');
INSERT INTO `disease` VALUES ('7', '冠心病', '1');
INSERT INTO `disease` VALUES ('8', '气胸', '1');
INSERT INTO `disease` VALUES ('9', '小儿厌食', '2');
INSERT INTO `disease` VALUES ('10', '小儿多动症', '2');
INSERT INTO `disease` VALUES ('11', '小儿感冒', '2');
INSERT INTO `disease` VALUES ('12', '哮喘', '2');
INSERT INTO `disease` VALUES ('13', '小儿咳嗽', '2');
INSERT INTO `disease` VALUES ('14', '小儿支气管', '2');
INSERT INTO `disease` VALUES ('15', '发烧', '2');
INSERT INTO `disease` VALUES ('16', '白内障', '3');
INSERT INTO `disease` VALUES ('17', '肉鼻息', '3');
INSERT INTO `disease` VALUES ('18', '青光眼', '3');
INSERT INTO `disease` VALUES ('19', '斜视', '3');
INSERT INTO `disease` VALUES ('20', '近视', '3');
INSERT INTO `disease` VALUES ('21', '沙眼', '3');
INSERT INTO `disease` VALUES ('22', '红眼病', '3');
INSERT INTO `disease` VALUES ('27', '整容', '1');

-- ----------------------------
-- Table structure for doctor
-- ----------------------------
DROP TABLE IF EXISTS `doctor`;
CREATE TABLE `doctor` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `docname` varchar(45) NOT NULL,
  `position` varchar(45) NOT NULL,
  `department` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  `disId` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of doctor
-- ----------------------------
INSERT INTO `doctor` VALUES ('3', '李四', '主任医师', '胃炎', '主任医师', '3');
INSERT INTO `doctor` VALUES ('4', '刘六', '医师', '阑尾炎', '刘六医师', '4');
INSERT INTO `doctor` VALUES ('5', '王守印', '医师', '高血压', '简介简介简介', '5');
INSERT INTO `doctor` VALUES ('6', '刘翠花', '副主任医师', '心肌梗塞', '副主任医师', '6');
INSERT INTO `doctor` VALUES ('7', '柳侑绮', '医师', '冠心病', '专治冠心病', '7');
INSERT INTO `doctor` VALUES ('8', '刘峰', '主任医师', '气胸', '气胸病专家', '8');
INSERT INTO `doctor` VALUES ('10', '例子', '主任医师', '小儿多动症', '简介简介简介', '10');
INSERT INTO `doctor` VALUES ('11', '测试', '医师', '小儿感冒', '简介简介简介', '11');
INSERT INTO `doctor` VALUES ('12', '测试', '副主任医师', '小儿哮喘', '简介简介简介', '12');
INSERT INTO `doctor` VALUES ('13', '测试', '主任医师', '小儿咳嗽', '简介简介简介', '13');
INSERT INTO `doctor` VALUES ('14', '测试用例', '医师', '小儿支气管炎', '简介简介简介', '14');
INSERT INTO `doctor` VALUES ('15', '测试用例', '主任医师', '发烧', '简介简介简介', '15');
INSERT INTO `doctor` VALUES ('16', '用例', '副主任医师', '白内障', '简介简介简介', '16');
INSERT INTO `doctor` VALUES ('17', '用例', '主任医师', '鼻息肉', '简介简介简介', '17');
INSERT INTO `doctor` VALUES ('18', '用例', '医师', '青光眼', '简介简介简介', '18');
INSERT INTO `doctor` VALUES ('19', '用例', '主任医师', '斜视', '简介简介简介', '19');
INSERT INTO `doctor` VALUES ('20', '测试用例', '医师', '近视', '简介简介简介', '20');
INSERT INTO `doctor` VALUES ('21', '测试用例', '医师', '沙眼', '简介简介简介', '21');
INSERT INTO `doctor` VALUES ('22', '测试用例', '医师', '红眼病', '简介简介简介', '22');
INSERT INTO `doctor` VALUES ('23', '测试用例', '主任医师', '流行性感冒', '简介简介简介', '1');
INSERT INTO `doctor` VALUES ('24', '例子', '医师', '流行性感冒', '简介简介简介', '1');
INSERT INTO `doctor` VALUES ('25', '测试例子', '副主任医师', '流行性感冒', '简介简介简介', '1');
INSERT INTO `doctor` VALUES ('26', '刘鑫', '医师', '糖尿病', '简介简介简介', '2');
INSERT INTO `doctor` VALUES ('27', '林立', '主任医师', '糖尿病', '简介简介简介', '2');
INSERT INTO `doctor` VALUES ('28', '周鑫', '主任医师', '糖尿病', '简介简介简介', '2');
INSERT INTO `doctor` VALUES ('30', 'testing01', '主任医师', '整容', '整容高手', '27');
INSERT INTO `doctor` VALUES ('31', 'testing02', '副主任医师', '近视', '专治近视', '20');

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `docId` varchar(45) NOT NULL,
  `docname` varchar(45) NOT NULL,
  `docDepartment` varchar(45) NOT NULL,
  `userId` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `bookdate` varchar(45) NOT NULL,
  `timeFrame` varchar(45) NOT NULL,
  `cost` varchar(45) NOT NULL,
  `paystatue` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order
-- ----------------------------
INSERT INTO `order` VALUES ('20', '6', '刘翠花', '心肌梗塞', '2', 'admin', '2017-02-21', '14:30-15:30', '5', '已受理');
INSERT INTO `order` VALUES ('21', '19', '用例', '斜视', '2', 'admin', '2017-02-21', '8:30-9:30', '5', '已受理');
INSERT INTO `order` VALUES ('25', '3', '李四', '胃炎', '1', 'testuser', '2017-02-21', '9:30-10:30', '5', '已受理');
INSERT INTO `order` VALUES ('26', '2', '王五', '糖尿病', '1', 'testuser', '2017-02-22', '8:30-9:30', '5', '已受理');
INSERT INTO `order` VALUES ('27', '2', '王五', '糖尿病', '1', 'testuser', '2017-02-23', '8:30-9:30', '5', '已受理');
INSERT INTO `order` VALUES ('28', '2', '王五', '糖尿病', '1', 'testuser', '2017-02-28', '8:30-9:30', '5', '已缴费');
INSERT INTO `order` VALUES ('29', '5', '王守印', '高血压', '1', 'testuser', '2017-02-23', '14:30-15:30', '5', '未缴费');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `realname` varchar(45) NOT NULL,
  `identity` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'testuser', 'testuser', '李奕成', '445381199502046335', '18825070698');
INSERT INTO `user` VALUES ('2', 'admin', 'heheda.00', '', '', '');
INSERT INTO `user` VALUES ('3', 'admin', 'heheda.00', '小明', '445381199502046335', '11234');
INSERT INTO `user` VALUES ('4', 'admin', 'heheda.00', '查询', '879097878', '223321243');
INSERT INTO `user` VALUES ('5', 'admin', 'heheda.00', 'Yui', '2344134', '123235');
INSERT INTO `user` VALUES ('6', 'admin', 'heheda.00', 'IOP', '3412', '自行车方向');
INSERT INTO `user` VALUES ('7', 'admin', 'heheda.00', '', '', '');
INSERT INTO `user` VALUES ('8', 'admin', 'heheda.00', '', '', '');
INSERT INTO `user` VALUES ('9', 'manager2', 'heheda.00', '会计', '445381199502046335', '18825070698');
INSERT INTO `user` VALUES ('10', 'admin555', '666666', '快快', '445381199502046335', '18825070698');
