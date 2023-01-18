# for testing user table
CREATE TABLE `TEMPS`.`TestU` (`user_id` INT(10) NOT NULL AUTO_INCREMENT ,
`first_name` VARCHAR(60) NOT NULL ,
`surname` VARCHAR(60) NOT NULL ,
`email` VARCHAR(60) NOT NULL ,
`telephone` VARCHAR(20) NOT NULL ,
`birthday` DATE NOT NULL ,
`address` VARCHAR(50) NOT NULL ,
`role` VARCHAR(15) NOT NULL ,
`password` VARCHAR(120) NOT NULL ,
PRIMARY KEY (`user_id`), UNIQUE `email_user` (`email`)) ENGINE = InnoDB;