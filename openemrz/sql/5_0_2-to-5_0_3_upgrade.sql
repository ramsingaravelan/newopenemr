
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

#IfNotTable doctor
CREATE TABLE `doctor` (
  `id`                 bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Links to forms.form_id',
  `doctor_name`       varchar(255) DEFAULT NULL,
  `specification`       varchar(255) DEFAULT NULL,
  `email`             varchar(255) DEFAULT NULL,
  `phone`               varchar(255) DEFAULT NULL,
  `clinic_name`            varchar(255) DEFAULT NULL,

  PRIMARY KEY `doctor_link` (`id`)

) ENGINE = InnoDB;




#IfMissingColumn facility status
ALTER TABLE `facility` ADD `status` tinyint(1) NOT NULL DEFAULT 1;
#EndIf
#IfMissingColumn doctor datepicker
ALTER TABLE `doctor` ADD `datepicker`  date DEFAULT NULL;
#EndIf


#IfMissingColumn doctor image
ALTER TABLE `doctor` ADD `image`  varchar(255) DEFAULT NULL;
#EndIf

#IfMissingColumn doctor doctor_name_list
ALTER TABLE `doctor` ADD `doctor_name_list`  varchar(255) DEFAULT NULL;
#EndIf

#IfMissingColumn doctor doctor_name_search
ALTER TABLE `doctor` ADD `doctor_name_search`  varchar(255) DEFAULT NULL;
#EndIf
