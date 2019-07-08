CREATE TABLE `notification` (
  `n_id` int(11) NOT NULL AUTO_INCREMENT,
  `notification_name` varchar(250) DEFAULT NULL,
  `content` mediumblob,
  `create_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `modify_datetime` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` int(1) DEFAULT '1',
  `created_by` int(11) DEFAULT '0',
  `dept_id` int(5) DEFAULT '0',
  PRIMARY KEY (`n_id`)
)

