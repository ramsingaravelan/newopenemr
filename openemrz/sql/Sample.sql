
#IfNotTable pat
CREATE TABLE `pat` (
  `id`                 bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Links to forms.form_id',
  `patient_name`       varchar(255) DEFAULT NULL,
  `heart_rate`         bigint(20)   DEFAULT NULL,
  `Height`             bigint(20)   DEFAULT NULL,
  `cm`               varchar(255) DEFAULT NULL,
  `weight`             bigint(20)   DEFAULT NULL,
  `kg`               varchar(255) DEFAULT NULL,
 `extra_notes`          varchar(255) DEFAULT NULL,

  PRIMARY KEY `pat_link` (`id`)

) ENGINE = InnoDB;

#IfNotTable select_pt
CREATE TABLE `select_pt`(
    `id`            bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Links to forms.form_id',
    `cm`               varchar(255) DEFAULT NULL,
)

#IfMissingColumn facility status
ALTER TABLE `facility` ADD `status` tinyint(1) NOT NULL DEFAULT 1;
#EndIf

#IfMissingColumn pat patient_name_list
ALTER TABLE `pat` ADD `patient_name_list`  varchar(255) DEFAULT NULL;
#EndIf

#IfNotTable reg
CREATE TABLE `reg` (
  `id`                 bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Links to forms.form_id',
  `patient_name`       varchar(255) DEFAULT NULL,
  `age`         bigint(20)   DEFAULT NULL,
  `address`              varchar(255) DEFAULT NULL,
  `phone`               varchar(255) DEFAULT NULL,
  `gender`              varchar(255) DEFAULT NULL,

 `university`          varchar(255) DEFAULT NULL,
 `blood_group`          varchar(255) DEFAULT NULL,
 `height`          varchar(255) DEFAULT NULL,
 `weight`          varchar(255) DEFAULT NULL,
 `father_name`          varchar(255) DEFAULT NULL,
 `mother_name`          varchar(255) DEFAULT NULL,
  PRIMARY KEY `reg_link` (`id`)

) ENGINE = InnoDB;

#IfMissingColumn reg qualification
ALTER TABLE `reg` ADD `qualification`  varchar(255) DEFAULT NULL;
#EndIf
#IfMissingColumn reg datepicker
ALTER TABLE `reg` ADD `datepicker`  date DEFAULT NULL;
#EndIf


#IfNotTable querytable
CREATE TABLE `querytable` (
  `t_id`                 bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Links to forms.form_id',

  `name`       varchar(255) DEFAULT NULL,
  `age`         bigint(20)   DEFAULT NULL,
  `phone`              varchar(255) DEFAULT NULL,

  PRIMARY KEY `test_table_link` (`t_id`)

) ENGINE = InnoDB;


#IfMissingColumn querytable id
ALTER TABLE `querytable` ADD `id`  bigint(20) NOT NULL;
#EndIf
