ALTER TABLE `member` ADD `status` VARCHAR(10) NOT NULL AFTER `name`;

CREATE TABLE `www_casenumber`.`punch_day` ( `NO` BIGINT NOT NULL AUTO_INCREMENT , `member` VARCHAR(10) NOT NULL , `time` DATETIME NOT NULL , `work_status` VARCHAR(5) NOT NULL , `status` VARCHAR(2)  NOT NULL DEFAULT '0' , UNIQUE (`NO`) ) ENGINE = InnoDB;
ALTER TABLE `punch_day` ADD PRIMARY KEY(`NO`);

ALTER TABLE `user` ADD `member` VARCHAR(1) NOT NULL ;


CREATE TABLE `www_casenumber`.`logbook_log` ( `NO` BIGINT(30) NOT NULL AUTO_INCREMENT , `date` VARCHAR(10) NOT NULL , `content` TEXT NULL , `member` VARCHAR(1) NOT NULL , `caseno` VARCHAR(5)  NULL , `length` INT(2) NOT NULL,`state` VARCHAR(5)  NULL ,`remark` TEXT NOT NULL , PRIMARY KEY (`NO`) ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;


/*--------------------------------------------*/

ALTER TABLE `logbook_log` ADD `remark2` TEXT NOT NULL ;



/*----------------------2016/08/28------------------------*/
ALTER TABLE `logbook_plan` ADD `create_member` VARCHAR(2) NOT NULL AFTER `member`;


/*******************2016/09/17**************************/
ALTER TABLE `caseindex_caseno` ADD `Note` TEXT NOT NULL ;
ALTER TABLE `logbook_plan` ADD `t_ModifyDate` DATETIME NOT NULL ;




ALTER TABLE `logbook_plan` ADD `state2` VARCHAR(2) NOT NULL DEFAULT 'D' AFTER `remark`;