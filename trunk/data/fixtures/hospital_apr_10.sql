-- DBTools Manager Professional (Enterprise Edition)
-- Database Dump for: hospital
-- Backup Generated in: 4/10/2011 11:37:01 PM
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
	`id` integer (11) UNSIGNED  NOT NULL AUTO_INCREMENT , 
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
COMMIT;
-- GO

--
-- Table: designation
--
CREATE TABLE `designation` 
(
	`id` integer (11) UNSIGNED  NOT NULL AUTO_INCREMENT , 
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
COMMIT;
-- GO

--
-- Table: patient
--
CREATE TABLE `patient` 
(
	`id` integer (11) UNSIGNED  NOT NULL AUTO_INCREMENT , 
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
-- Table: staff
--
CREATE TABLE `staff` 
(
	`id` integer (11) UNSIGNED  NOT NULL AUTO_INCREMENT , 
	`department_id` integer (11), 
	`designation_id` integer (11), 
	`role_id` integer (11), 
	`name` varchar (100), 
	`cnic` varchar (50), 
	`dob` date, 
	`gender` varchar (10), 
	`permanent_address` varchar (255), 
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
-- Dumping Table Data: staff
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
	`id` integer (11) UNSIGNED  NOT NULL AUTO_INCREMENT , 
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
-- Dumping Triggers
--
SET FOREIGN_KEY_CHECKS=1;
-- GO

