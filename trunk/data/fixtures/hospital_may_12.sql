-- DBTools Manager Professional (Enterprise Edition)
-- Database Dump for: hospital
-- Backup Generated in: 5/12/2011 1:40:02 AM
-- Database Server Version: MySQL 5.1.33

-- USEGO

SET FOREIGN_KEY_CHECKS=0;
-- GO


--
-- Dumping Tables
--

--
-- Table: department
--
CREATE TABLE `department` 
(
	`id` integer (11) NOT NULL AUTO_INCREMENT , 
	`title` varchar (100), 
	`status` varchar (10), 
	`created_at` date, 
	`updated_at` date,
	PRIMARY KEY (`id`)
) TYPE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;
-- GO

--
-- Dumping Table Data: department
--
BEGIN;
-- GO
INSERT INTO `department` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES(1, 'Cardiology...', '1', '2011-05-11', '2011-05-11');
-- GO
COMMIT;
-- GO

--
-- Table: designation
--
CREATE TABLE `designation` 
(
	`id` integer (11) NOT NULL AUTO_INCREMENT , 
	`department_id` integer (11), 
	`title` varchar (100) NOT NULL, 
	`status` varchar (10), 
	`created_at` date, 
	`updated_at` date,
	PRIMARY KEY (`id`)
) TYPE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;
-- GO

--
-- Dumping Table Data: designation
--
BEGIN;
-- GO
INSERT INTO `designation` (`id`, `department_id`, `title`, `status`, `created_at`, `updated_at`) VALUES(1, 1, 'Surgen...', '1', '2011-05-11', '2011-05-11');
-- GO
COMMIT;
-- GO

--
-- Index: FK_designation_department
--
ALTER TABLE `hospital`.`designation` ADD INDEX `FK_designation_department` (`department_id` );
-- GO

--
-- Table: employee
--
CREATE TABLE `employee` 
(
	`id` integer (11) NOT NULL AUTO_INCREMENT , 
	`department_id` integer (11), 
	`designation_id` integer (11), 
	`name` varchar (100), 
	`cnic` varchar (50), 
	`dob` date, 
	`gender` varchar (10), 
	`mail_address` varchar (255), 
	`contact_res` varchar (50), 
	`contact_cell` varchar (50), 
	`contact_off` varchar (50), 
	`emergency_contact` varchar (50), 
	`employment_date` date, 
	`local_resident` varchar (3), 
	`qualification` varchar (1000), 
	`status` varchar (10), 
	`created_at` date, 
	`updated_at` date,
	PRIMARY KEY (`id`)
) TYPE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;
-- GO

--
-- Dumping Table Data: employee
--
BEGIN;
-- GO
INSERT INTO `employee` (`id`, `department_id`, `designation_id`, `name`, `cnic`, `dob`, `gender`, `mail_address`, `contact_res`, `contact_cell`, `contact_off`, `emergency_contact`, `employment_date`, `local_resident`, `qualification`, `status`, `created_at`, `updated_at`) VALUES(1, 1, 1, 'Zeeshan Cheema', '61101-5487541-5', '1980-05-01', 'Male', 'sadfsadf', '654321', '123456', '1111111', '2222222', '2011-05-12', '1', 'hgjghjryfu', '1', '2011-05-12', '2011-05-12');
-- GO
COMMIT;
-- GO

--
-- Index: FK_employee_department
--
ALTER TABLE `hospital`.`employee` ADD INDEX `FK_employee_department` (`department_id` );
-- GO

--
-- Index: FK_employee_designation
--
ALTER TABLE `hospital`.`employee` ADD INDEX `FK_employee_designation` (`designation_id` );
-- GO

--
-- Table: patient
--
CREATE TABLE `patient` 
(
	`id` integer (11) NOT NULL AUTO_INCREMENT , 
	`id_number` varchar (20), 
	`cnic` varchar (25), 
	`name` varchar (100), 
	`dob` date, 
	`gender` varchar (10), 
	`address` varchar (255), 
	`phone` varchar (20), 
	`mobile` varchar (20), 
	`emergency_contact` varchar (20), 
	`email` varchar (100), 
	`blood_group` varchar (5), 
	`disease` varchar (255), 
	`allergy` varchar (255), 
	`drug_allergy` varchar (255), 
	`status` varchar (10), 
	`created_at` date, 
	`updated_at` date,
	PRIMARY KEY (`id`)
) TYPE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;
-- GO

--
-- Dumping Table Data: patient
--
BEGIN;
-- GO
COMMIT;
-- GO

--
-- Table: pharma
--
CREATE TABLE `pharma` 
(
	`id` integer (11) NOT NULL AUTO_INCREMENT , 
	`name` varchar (100), 
	`company` varchar (100), 
	`status` varchar (10), 
	`created_at` date, 
	`updated_at` date,
	PRIMARY KEY (`id`)
) TYPE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;
-- GO

--
-- Dumping Table Data: pharma
--
BEGIN;
-- GO
COMMIT;
-- GO

--
-- Table: user
--
CREATE TABLE `user` 
(
	`id` integer (11) NOT NULL AUTO_INCREMENT , 
	`role_id` integer (11), 
	`username` varchar (50), 
	`password` varchar (50), 
	`status` varchar (10), 
	`created_at` date, 
	`updated_at` date,
	PRIMARY KEY (`id`)
) TYPE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;
-- GO

--
-- Dumping Table Data: user
--
BEGIN;
-- GO
COMMIT;
-- GO

--
-- Dumping Tables Foreign Keys
--

--
-- Foreign Key Constraint: FK_designation_department
--
ALTER TABLE `designation` ADD CONSTRAINT `FK_designation_department` FOREIGN KEY (`department_id`) REFERENCES `department`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;
-- GO

--
-- Foreign Key Constraint: FK_employee_department
--
ALTER TABLE `employee` ADD CONSTRAINT `FK_employee_department` FOREIGN KEY (`department_id`) REFERENCES `department`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;
-- GO

--
-- Foreign Key Constraint: FK_employee_designation
--
ALTER TABLE `employee` ADD CONSTRAINT `FK_employee_designation` FOREIGN KEY (`designation_id`) REFERENCES `designation`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;
-- GO

--
-- Dumping Triggers
--
SET FOREIGN_KEY_CHECKS=1;
-- GO

