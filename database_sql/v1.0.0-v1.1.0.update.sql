DROP TABLE `projects-manager`.`peoples`;
CREATE TABLE `projects-manager`.`admin_user_requirement` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `requirement_id` INT NULL,
  `admin_user_id` INT NULL,
  `status` VARCHAR(45) NULL COMMENT '未开始，已完成，进行中，已归档',
  `type` VARCHAR(45) NULL COMMENT '类型，需求讨论、原型设计、后端开发、前端开发、UI设计、部署上线',
  PRIMARY KEY (`id`));
DROP TABLE `projects-manager`.`requirement_people`;
ALTER TABLE `projects-manager`.`requirements` 
ADD COLUMN `module_id` INT NULL AFTER `content`;
