CREATE TABLE `designation` (
  `DesignationID` int(11) NOT NULL AUTO_INCREMENT,
  `DesignationDepartment` int(5) DEFAULT '0',
  `DesignationName` varchar(255) NOT NULL,
  `DesignationCreatedBy` int(11) NOT NULL,
  `DesignationCreatedDate` datetime NOT NULL,
  `DesignationModifiedBy` int(11) NOT NULL,
  `DesignationModifiedDate` datetime NOT NULL,
  `DesignationStatus` int(11) NOT NULL,
  PRIMARY KEY (`DesignationID`)
)

insert into `designation`(`DesignationID`,`DesignationDepartment`,`DesignationName`,`DesignationCreatedBy`,`DesignationCreatedDate`,`DesignationModifiedBy`,`DesignationModifiedDate`,`DesignationStatus`) values (1,1,'Super Admin',1,'2019-01-24 13:09:28',0,'2019-01-26 00:00:00',1);
insert into `designation`(`DesignationID`,`DesignationDepartment`,`DesignationName`,`DesignationCreatedBy`,`DesignationCreatedDate`,`DesignationModifiedBy`,`DesignationModifiedDate`,`DesignationStatus`) values (2,2,'Admin',1,'2019-01-24 13:09:36',0,'2019-01-26 00:00:00',1);
insert into `designation`(`DesignationID`,`DesignationDepartment`,`DesignationName`,`DesignationCreatedBy`,`DesignationCreatedDate`,`DesignationModifiedBy`,`DesignationModifiedDate`,`DesignationStatus`) values (3,3,'HOD',1,'2019-01-24 13:09:48',0,'2019-01-26 00:00:00',1);
insert into `designation`(`DesignationID`,`DesignationDepartment`,`DesignationName`,`DesignationCreatedBy`,`DesignationCreatedDate`,`DesignationModifiedBy`,`DesignationModifiedDate`,`DesignationStatus`) values (4,4,'Staff',1,'2019-01-24 13:09:59',0,'2019-01-26 00:00:00',1);
insert into `designation`(`DesignationID`,`DesignationDepartment`,`DesignationName`,`DesignationCreatedBy`,`DesignationCreatedDate`,`DesignationModifiedBy`,`DesignationModifiedDate`,`DesignationStatus`) values (5,5,'Student',1,'2019-01-24 13:10:11',0,'2019-01-26 00:00:00',1);
