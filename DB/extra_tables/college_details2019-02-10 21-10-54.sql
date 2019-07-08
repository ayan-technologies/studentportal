CREATE TABLE `college_details` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `college_id` varchar(250) DEFAULT '0',
  `college_name` varchar(1000) DEFAULT NULL,
  `created_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `modify_datetime` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cid`)
)

insert into `college_details`(`cid`,`college_id`,`college_name`,`created_date`,`modify_datetime`) values (1,'1234','Test College','2019-01-26 00:00:00','2019-01-26 12:24:40');
