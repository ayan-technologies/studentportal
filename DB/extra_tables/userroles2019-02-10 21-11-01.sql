CREATE TABLE `userroles` (
  `UserRoleID` int(11) NOT NULL AUTO_INCREMENT,
  `UserRoleName` varchar(255) NOT NULL,
  `UserRoleCreatedBy` int(11) NOT NULL,
  `UserRoleCreatedDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `UserRoleModifiedBy` int(11) DEFAULT NULL,
  `UserRoleModifiedDate` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `UserRoleStatus` int(11) NOT NULL,
  PRIMARY KEY (`UserRoleID`)
)

insert into `userroles`(`UserRoleID`,`UserRoleName`,`UserRoleCreatedBy`,`UserRoleCreatedDate`,`UserRoleModifiedBy`,`UserRoleModifiedDate`,`UserRoleStatus`) values (1,'Super Admin',1,'2019-02-03 12:57:41',0,'2019-02-03 12:57:41',1);
insert into `userroles`(`UserRoleID`,`UserRoleName`,`UserRoleCreatedBy`,`UserRoleCreatedDate`,`UserRoleModifiedBy`,`UserRoleModifiedDate`,`UserRoleStatus`) values (2,'Admin',1,'2019-02-03 12:57:41',0,'2019-02-03 12:57:41',1);
insert into `userroles`(`UserRoleID`,`UserRoleName`,`UserRoleCreatedBy`,`UserRoleCreatedDate`,`UserRoleModifiedBy`,`UserRoleModifiedDate`,`UserRoleStatus`) values (3,'Staff',1,'2019-02-03 12:57:41',0,'2019-02-03 13:22:48',1);
insert into `userroles`(`UserRoleID`,`UserRoleName`,`UserRoleCreatedBy`,`UserRoleCreatedDate`,`UserRoleModifiedBy`,`UserRoleModifiedDate`,`UserRoleStatus`) values (4,'Students',2,'2019-02-03 12:57:41',0,'2019-02-08 21:22:21',1);
