-- DBTools Manager Professional (Enterprise Edition)
-- Database Dump for: hospital
-- Backup Generated in: 5/27/2011 2:18:06 PM
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
INSERT INTO `department` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES(2, 'Front Desk', '1', '2011-05-17', '2011-05-17');
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
INSERT INTO `designation` (`id`, `department_id`, `title`, `status`, `created_at`, `updated_at`) VALUES(2, 2, 'Receptionist', '1', '2011-05-17', '2011-05-17');
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
	`emp_category` varchar (10), 
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
INSERT INTO `employee` (`id`, `department_id`, `designation_id`, `emp_category`, `name`, `cnic`, `dob`, `gender`, `mail_address`, `contact_res`, `contact_cell`, `contact_off`, `emergency_contact`, `employment_date`, `local_resident`, `qualification`, `status`, `created_at`, `updated_at`) VALUES(1, 1, 1, 'doc', 'Zeeshan Cheema', '61101-5487541-5', '1980-05-01', 'Male', 'sadfsadf', '654321', '123456', '1111111', '2222222', '2011-05-12', '1', 'hgjghjryfu', '1', '2011-05-12', '2011-05-12');
-- GO
INSERT INTO `employee` (`id`, `department_id`, `designation_id`, `emp_category`, `name`, `cnic`, `dob`, `gender`, `mail_address`, `contact_res`, `contact_cell`, `contact_off`, `emergency_contact`, `employment_date`, `local_resident`, `qualification`, `status`, `created_at`, `updated_at`) VALUES(2, 1, 1, 'doc', 'Kashif Hussain', '61246-58457875-5', '1987-05-17', 'Male', '', '', '', '', '', '2011-05-17', '0', '', '1', '2011-05-17', '2011-05-17');
-- GO
INSERT INTO `employee` (`id`, `department_id`, `designation_id`, `emp_category`, `name`, `cnic`, `dob`, `gender`, `mail_address`, `contact_res`, `contact_cell`, `contact_off`, `emergency_contact`, `employment_date`, `local_resident`, `qualification`, `status`, `created_at`, `updated_at`) VALUES(3, 2, 2, 'staff', 'Fareeha Khan', '', NULL, 'Male', '', '', '', '', '', NULL, '1', '', '1', '2011-05-17', '2011-05-17');
-- GO
INSERT INTO `employee` (`id`, `department_id`, `designation_id`, `emp_category`, `name`, `cnic`, `dob`, `gender`, `mail_address`, `contact_res`, `contact_cell`, `contact_off`, `emergency_contact`, `employment_date`, `local_resident`, `qualification`, `status`, `created_at`, `updated_at`) VALUES(4, NULL, NULL, '1', 'Administrator', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2011-05-27', '2011-05-27');
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
	`father_name` varchar (50), 
	`dob` date, 
	`gender` varchar (10), 
	`address` varchar (255), 
	`contact_res` varchar (20), 
	`contact_cell` varchar (20), 
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
INSERT INTO `patient` (`id`, `id_number`, `cnic`, `name`, `father_name`, `dob`, `gender`, `address`, `contact_res`, `contact_cell`, `emergency_contact`, `email`, `blood_group`, `disease`, `allergy`, `drug_allergy`, `status`, `created_at`, `updated_at`) VALUES(1, '01', '61145-5847592-5', 'Nazeer Hussain', NULL, '1985-03-08', 'Male', ' kug uy rfuy tf j h', '0515548365', '03122354618', '021835246', NULL, NULL, 'dfgdsfg dfg sdfdsf gsd fgs dfg', 'lk kjuh lk j lkj yg poitg kjh bk', ' lk hiy t hgvkj htr i ygkl ujh ploi yp', '1', '2011-05-17', '2011-05-17');
-- GO
INSERT INTO `patient` (`id`, `id_number`, `cnic`, `name`, `father_name`, `dob`, `gender`, `address`, `contact_res`, `contact_cell`, `emergency_contact`, `email`, `blood_group`, `disease`, `allergy`, `drug_allergy`, `status`, `created_at`, `updated_at`) VALUES(2, NULL, '514244-8528483-8', 'Shakeela Khanum', NULL, '1969-09-15', 'Female', NULL, NULL, '0333-5642147', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2011-05-17', '2011-05-17');
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
	`strength` varchar (10), 
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
INSERT INTO `pharma` (`id`, `name`, `strength`, `company`, `status`, `created_at`, `updated_at`) VALUES(1, 'Paracetamol', '100 mg', 'Werrik', '1', '2011-05-23', '2011-05-23');
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
	`employee_id` integer (11), 
	`user` varchar (50), 
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
INSERT INTO `user` (`id`, `role_id`, `employee_id`, `user`, `password`, `status`, `created_at`, `updated_at`) VALUES(1, 1, 4, 'admin', '4e075844d2e00e4c800c8c62716bed8c', '1', '2011-05-27', '2011-05-27');
-- GO
COMMIT;
-- GO

--
-- Index: FK_user_employee
--
ALTER TABLE `hospital`.`user` ADD INDEX `FK_user_employee` (`employee_id` );
-- GO

--
-- Table: ward
--
CREATE TABLE `ward` 
(
	`id` integer (11) NOT NULL AUTO_INCREMENT , 
	`title` varchar (255), 
	`status` varchar (10),
	PRIMARY KEY (`id`)
) TYPE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;
-- GO

--
-- Dumping Table Data: ward
--
BEGIN;
-- GO
INSERT INTO `ward` (`id`, `title`, `status`) VALUES(1, 'Medical Ward', '1');
-- GO
INSERT INTO `ward` (`id`, `title`, `status`) VALUES(2, 'Surgecial Ward', '1');
-- GO
INSERT INTO `ward` (`id`, `title`, `status`) VALUES(3, 'Burn Center', '1');
-- GO
COMMIT;
-- GO

--
-- Table: ward_bed
--
CREATE TABLE `ward_bed` 
(
	`id` integer (11) NOT NULL AUTO_INCREMENT , 
	`ward_id` integer (11), 
	`bed` varchar (100), 
	`status` varchar (10),
	PRIMARY KEY (`id`)
) TYPE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;
-- GO

--
-- Dumping Table Data: ward_bed
--
BEGIN;
-- GO
INSERT INTO `ward_bed` (`id`, `ward_id`, `bed`, `status`) VALUES(1, 1, 'Medical 1', '1');
-- GO
INSERT INTO `ward_bed` (`id`, `ward_id`, `bed`, `status`) VALUES(2, 2, 'Surgical 1', '1');
-- GO
INSERT INTO `ward_bed` (`id`, `ward_id`, `bed`, `status`) VALUES(3, 1, 'Medical 2', '1');
-- GO
INSERT INTO `ward_bed` (`id`, `ward_id`, `bed`, `status`) VALUES(4, 3, 'Burn 1', '1');
-- GO
COMMIT;
-- GO

--
-- Index: FK_ward_bed_ward
--
ALTER TABLE `hospital`.`ward_bed` ADD INDEX `FK_ward_bed_ward` (`ward_id` );
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
-- Foreign Key Constraint: FK_user_employee
--
ALTER TABLE `user` ADD CONSTRAINT `FK_user_employee` FOREIGN KEY (`employee_id`) REFERENCES `employee`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;
-- GO

--
-- Foreign Key Constraint: FK_ward_bed_ward
--
ALTER TABLE `ward_bed` ADD CONSTRAINT `FK_ward_bed_ward` FOREIGN KEY (`ward_id`) REFERENCES `ward`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;
-- GO

--
-- Dumping Triggers
--
SET FOREIGN_KEY_CHECKS=1;
-- GO

