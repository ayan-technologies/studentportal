CREATE TABLE `department` (
  `DepartmentID` int(11) NOT NULL AUTO_INCREMENT,
  `DepartmentName` varchar(255) NOT NULL,
  `DepartmentCreatedBy` int(11) NOT NULL,
  `DepartmentCreatedDate` datetime NOT NULL,
  `DepartmentModifiedBy` int(11) NOT NULL,
  `DepartmentModifiedDate` datetime NOT NULL,
  `DepartmentStatus` int(11) NOT NULL,
  PRIMARY KEY (`DepartmentID`)
)

insert into `department`(`DepartmentID`,`DepartmentName`,`DepartmentCreatedBy`,`DepartmentCreatedDate`,`DepartmentModifiedBy`,`DepartmentModifiedDate`,`DepartmentStatus`) values (1,'Management',1,'2017-11-21 00:00:00',0,null,1);
insert into `department`(`DepartmentID`,`DepartmentName`,`DepartmentCreatedBy`,`DepartmentCreatedDate`,`DepartmentModifiedBy`,`DepartmentModifiedDate`,`DepartmentStatus`) values (2,'Administration',1,'2017-11-21 00:00:00',0,null,1);
insert into `department`(`DepartmentID`,`DepartmentName`,`DepartmentCreatedBy`,`DepartmentCreatedDate`,`DepartmentModifiedBy`,`DepartmentModifiedDate`,`DepartmentStatus`) values (3,'Staff',1,'2017-11-21 00:00:00',0,'2019-02-08 00:00:00',1);
insert into `department`(`DepartmentID`,`DepartmentName`,`DepartmentCreatedBy`,`DepartmentCreatedDate`,`DepartmentModifiedBy`,`DepartmentModifiedDate`,`DepartmentStatus`) values (4,'Lab Assistance',1,'2017-11-21 00:00:00',0,'2019-02-08 00:00:00',1);
insert into `department`(`DepartmentID`,`DepartmentName`,`DepartmentCreatedBy`,`DepartmentCreatedDate`,`DepartmentModifiedBy`,`DepartmentModifiedDate`,`DepartmentStatus`) values (5,'Student',1,'2018-10-05 00:00:00',0,'2019-02-08 00:00:00',1);
insert into `department`(`DepartmentID`,`DepartmentName`,`DepartmentCreatedBy`,`DepartmentCreatedDate`,`DepartmentModifiedBy`,`DepartmentModifiedDate`,`DepartmentStatus`) values (6,'BCA',2,'2018-06-27 00:00:00',0,'2019-01-24 00:00:00',1);
