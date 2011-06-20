-- DBTools Manager Professional (Enterprise Edition)
-- Database Dump for: hospital
-- Backup Generated in: 6/21/2011 1:35:17 AM
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
INSERT INTO `designation` (`id`, `department_id`, `title`, `status`, `created_at`, `updated_at`) VALUES(2, 2, 'Receptionist', '1', '2011-05-17', '2011-06-03');
-- GO
COMMIT;
-- GO

--
-- Index: FK_designation_department
--
ALTER TABLE `hospital`.`designation` ADD INDEX `FK_designation_department` (`department_id` );
-- GO

--
-- Table: duty_place
--
CREATE TABLE `duty_place` 
(
	`id` integer (11) NOT NULL AUTO_INCREMENT , 
	`title` varchar (100), 
	`description` varchar (255), 
	`status` varchar (10), 
	`created_at` date, 
	`updated_at` date,
	PRIMARY KEY (`id`)
) TYPE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;
-- GO

--
-- Dumping Table Data: duty_place
--
BEGIN;
-- GO
INSERT INTO `duty_place` (`id`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES(1, 'Reception', NULL, '1', '2011-06-03', '2011-06-03');
-- GO
INSERT INTO `duty_place` (`id`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES(2, 'Emergency Room', NULL, '1', '2011-06-03', '2011-06-03');
-- GO
INSERT INTO `duty_place` (`id`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES(3, 'Trauma Center', NULL, '1', '2011-06-03', '2011-06-03');
-- GO
COMMIT;
-- GO

--
-- Table: duty_roster
--
CREATE TABLE `duty_roster` 
(
	`id` integer (11) NOT NULL AUTO_INCREMENT , 
	`employee_id` integer (11), 
	`duty_place_id` integer (11), 
	`duty_date` date, 
	`from` varchar (10), 
	`to` varchar (10), 
	`present` varchar (5), 
	`substitute_id` integer (11), 
	`status` varchar (10), 
	`created_at` date, 
	`updated_at` date,
	PRIMARY KEY (`id`)
) TYPE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;
-- GO

--
-- Dumping Table Data: duty_roster
--
BEGIN;
-- GO
INSERT INTO `duty_roster` (`id`, `employee_id`, `duty_place_id`, `duty_date`, `from`, `to`, `present`, `substitute_id`, `status`, `created_at`, `updated_at`) VALUES(1, 1, 1, '2011-06-03', '0730', '1400', NULL, 2, '1', '2011-06-03', '2011-06-03');
-- GO
INSERT INTO `duty_roster` (`id`, `employee_id`, `duty_place_id`, `duty_date`, `from`, `to`, `present`, `substitute_id`, `status`, `created_at`, `updated_at`) VALUES(2, 3, 2, '2011-06-03', '0730', '1400', NULL, 2, '1', '2011-06-03', '2011-06-03');
-- GO
INSERT INTO `duty_roster` (`id`, `employee_id`, `duty_place_id`, `duty_date`, `from`, `to`, `present`, `substitute_id`, `status`, `created_at`, `updated_at`) VALUES(3, 1, 1, '2011-06-17', '0700', '1300', NULL, 2, '1', '2011-06-17', '2011-06-17');
-- GO
COMMIT;
-- GO

--
-- Index: FK_duty_roster_employee
--
ALTER TABLE `hospital`.`duty_roster` ADD INDEX `FK_duty_roster_employee` (`employee_id` );
-- GO

--
-- Index: FK_duty_roster_place
--
ALTER TABLE `hospital`.`duty_roster` ADD INDEX `FK_duty_roster_place` (`duty_place_id` );
-- GO

--
-- Index: FK_duty_roster_substitute
--
ALTER TABLE `hospital`.`duty_roster` ADD INDEX `FK_duty_roster_substitute` (`substitute_id` );
-- GO

--
-- Table: employee
--
CREATE TABLE `employee` 
(
	`id` integer (11) NOT NULL AUTO_INCREMENT , 
	`department_id` integer (11), 
	`designation_id` integer (11), 
	`role_id` integer (11), 
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
INSERT INTO `employee` (`id`, `department_id`, `designation_id`, `role_id`, `emp_category`, `name`, `cnic`, `dob`, `gender`, `mail_address`, `contact_res`, `contact_cell`, `contact_off`, `emergency_contact`, `employment_date`, `local_resident`, `qualification`, `status`, `created_at`, `updated_at`) VALUES(1, 1, 1, 3, 'doc', 'Zeeshan Cheema', '61101-5487541-5', '1980-05-01', 'Male', 'sadfsadf', '654321', '123456', '1111111', '2222222', '2011-05-12', '1', 'hgjghjryfu', '1', '2011-05-12', '2011-05-12');
-- GO
INSERT INTO `employee` (`id`, `department_id`, `designation_id`, `role_id`, `emp_category`, `name`, `cnic`, `dob`, `gender`, `mail_address`, `contact_res`, `contact_cell`, `contact_off`, `emergency_contact`, `employment_date`, `local_resident`, `qualification`, `status`, `created_at`, `updated_at`) VALUES(2, 1, 1, 3, 'doc', 'Kashif Hussain', '61246-58457875-5', '1987-05-17', 'Male', '', '', '', '', '', '2011-05-17', '0', '', '1', '2011-05-17', '2011-05-17');
-- GO
INSERT INTO `employee` (`id`, `department_id`, `designation_id`, `role_id`, `emp_category`, `name`, `cnic`, `dob`, `gender`, `mail_address`, `contact_res`, `contact_cell`, `contact_off`, `emergency_contact`, `employment_date`, `local_resident`, `qualification`, `status`, `created_at`, `updated_at`) VALUES(3, 2, 2, 4, 'staff', 'Fareeha Khan', '', '1988-06-20', 'Female', '', '', '', '', '', NULL, '1', '', '1', '2011-05-17', '2011-05-17');
-- GO
INSERT INTO `employee` (`id`, `department_id`, `designation_id`, `role_id`, `emp_category`, `name`, `cnic`, `dob`, `gender`, `mail_address`, `contact_res`, `contact_cell`, `contact_off`, `emergency_contact`, `employment_date`, `local_resident`, `qualification`, `status`, `created_at`, `updated_at`) VALUES(4, NULL, NULL, 1, '1', 'Super Administrator', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '2011-05-27', '2011-05-27');
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
-- Index: FK_employee_role
--
ALTER TABLE `hospital`.`employee` ADD INDEX `FK_employee_role` (`role_id` );
-- GO

--
-- Table: lab_report
--
CREATE TABLE `lab_report` 
(
	`id` integer (11) NOT NULL AUTO_INCREMENT , 
	`patient_id` integer (11), 
	`visit_id` integer (11), 
	`lab_test_id` integer (11), 
	`description` varchar (1024), 
	`status` varchar (10), 
	`created_at` date, 
	`updated_at` date,
	PRIMARY KEY (`id`)
) TYPE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;
-- GO

--
-- Dumping Table Data: lab_report
--
BEGIN;
-- GO
COMMIT;
-- GO

--
-- Index: FK_lab_report_patient
--
ALTER TABLE `hospital`.`lab_report` ADD INDEX `FK_lab_report_patient` (`patient_id` );
-- GO

--
-- Index: FK_lab_report_visit
--
ALTER TABLE `hospital`.`lab_report` ADD INDEX `FK_lab_report_visit` (`visit_id` );
-- GO

--
-- Index: FK_lab_report_lab_test
--
ALTER TABLE `hospital`.`lab_report` ADD INDEX `FK_lab_report_lab_test` (`lab_test_id` );
-- GO

--
-- Table: lab_test
--
CREATE TABLE `lab_test` 
(
	`id` integer (11) NOT NULL AUTO_INCREMENT , 
	`title` varchar (255), 
	`description` varchar (500), 
	`status` varchar (10), 
	`created_at` date, 
	`updated_at` date,
	PRIMARY KEY (`id`)
) TYPE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;
-- GO

--
-- Dumping Table Data: lab_test
--
BEGIN;
-- GO
INSERT INTO `lab_test` (`id`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES(1, 'Blood CP', NULL, '1', '2011-05-29', '2011-05-29');
-- GO
COMMIT;
-- GO

--
-- Table: patient
--
CREATE TABLE `patient` 
(
	`id` integer (11) NOT NULL AUTO_INCREMENT , 
	`id_number` varchar (20), 
	`cnic` varchar (25), 
	`username` varchar (50), 
	`password` varchar (50), 
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
INSERT INTO `patient` (`id`, `id_number`, `cnic`, `username`, `password`, `name`, `father_name`, `dob`, `gender`, `address`, `contact_res`, `contact_cell`, `emergency_contact`, `email`, `blood_group`, `disease`, `allergy`, `drug_allergy`, `status`, `created_at`, `updated_at`) VALUES(1, '01', '61145-5847592-5', NULL, NULL, 'Nazeer Hussain xz', NULL, '1985-03-08', 'Male', ' kug uy rfuy tf j h', '0515548365', '03122354618', '021835246', NULL, NULL, 'dfgdsfg dfg sdfdsf gsd fgs dfg', 'lk kjuh lk j lkj yg poitg kjh bk', ' lk hiy t hgvkj htr i ygkl ujh ploi yp', '1', '2011-05-17', '2011-05-17');
-- GO
INSERT INTO `patient` (`id`, `id_number`, `cnic`, `username`, `password`, `name`, `father_name`, `dob`, `gender`, `address`, `contact_res`, `contact_cell`, `emergency_contact`, `email`, `blood_group`, `disease`, `allergy`, `drug_allergy`, `status`, `created_at`, `updated_at`) VALUES(2, NULL, '514244-8528483-8', NULL, NULL, 'Shakeela Khanum xz', NULL, '1969-09-15', 'Female', NULL, NULL, '0333-5642147', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2011-05-17', '2011-05-17');
-- GO
INSERT INTO `patient` (`id`, `id_number`, `cnic`, `username`, `password`, `name`, `father_name`, `dob`, `gender`, `address`, `contact_res`, `contact_cell`, `emergency_contact`, `email`, `blood_group`, `disease`, `allergy`, `drug_allergy`, `status`, `created_at`, `updated_at`) VALUES(3, NULL, '25448-5245478-5', NULL, NULL, 'Masood Aslam', NULL, '1967-01-01', 'Male', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2011-06-20', '2011-06-20');
-- GO
INSERT INTO `patient` (`id`, `id_number`, `cnic`, `username`, `password`, `name`, `father_name`, `dob`, `gender`, `address`, `contact_res`, `contact_cell`, `emergency_contact`, `email`, `blood_group`, `disease`, `allergy`, `drug_allergy`, `status`, `created_at`, `updated_at`) VALUES(4, NULL, '21542-5665384-5', NULL, NULL, 'Yahiya Khan', NULL, '1985-08-06', 'Male', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2011-06-20', '2011-06-20');
-- GO
INSERT INTO `patient` (`id`, `id_number`, `cnic`, `username`, `password`, `name`, `father_name`, `dob`, `gender`, `address`, `contact_res`, `contact_cell`, `emergency_contact`, `email`, `blood_group`, `disease`, `allergy`, `drug_allergy`, `status`, `created_at`, `updated_at`) VALUES(5, NULL, '61101-9356487-7', NULL, NULL, 'Tehmina Dawood', NULL, '1992-03-10', 'Female', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2011-06-20', '2011-06-20');
-- GO
INSERT INTO `patient` (`id`, `id_number`, `cnic`, `username`, `password`, `name`, `father_name`, `dob`, `gender`, `address`, `contact_res`, `contact_cell`, `emergency_contact`, `email`, `blood_group`, `disease`, `allergy`, `drug_allergy`, `status`, `created_at`, `updated_at`) VALUES(6, NULL, '20476-5847543-2', NULL, NULL, 'Fatima Baber', NULL, '1982-10-20', 'Female', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '1', '2011-06-20', '2011-06-20');
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
	`type` varchar (50), 
	`strength` varchar (10), 
	`company` varchar (100), 
	`price` integer (6), 
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
INSERT INTO `pharma` (`id`, `name`, `type`, `strength`, `company`, `price`, `status`, `created_at`, `updated_at`) VALUES(1, 'Paracetamol', 'Tab', '100 mg', 'Werrik', NULL, '1', '2011-05-23', '2011-05-23');
-- GO
COMMIT;
-- GO

--
-- Table: role
--
CREATE TABLE `role` 
(
	`id` integer (11) NOT NULL AUTO_INCREMENT , 
	`title` varchar (50), 
	`status` varchar (10),
	PRIMARY KEY (`id`)
) TYPE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;
-- GO

--
-- Dumping Table Data: role
--
BEGIN;
-- GO
INSERT INTO `role` (`id`, `title`, `status`) VALUES(1, 'Super Administrator', '0');
-- GO
INSERT INTO `role` (`id`, `title`, `status`) VALUES(2, 'Administrator', '1');
-- GO
INSERT INTO `role` (`id`, `title`, `status`) VALUES(3, 'Doctor', '1');
-- GO
INSERT INTO `role` (`id`, `title`, `status`) VALUES(4, 'Front Desk', '1');
-- GO
INSERT INTO `role` (`id`, `title`, `status`) VALUES(5, 'Pharma Assistant', '1');
-- GO
INSERT INTO `role` (`id`, `title`, `status`) VALUES(6, 'Employee', '1');
-- GO
COMMIT;
-- GO

--
-- Table: room
--
CREATE TABLE `room` 
(
	`id` integer (11) NOT NULL AUTO_INCREMENT , 
	`title` varchar (50), 
	`description` varchar (255), 
	`status` varchar (10), 
	`created_at` date, 
	`updated_at` date,
	PRIMARY KEY (`id`)
) TYPE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;
-- GO

--
-- Dumping Table Data: room
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
INSERT INTO `user` (`id`, `role_id`, `employee_id`, `user`, `password`, `status`, `created_at`, `updated_at`) VALUES(2, 3, 1, 'zeeshancheema', '4e075844d2e00e4c800c8c62716bed8c', '1', '2011-06-20', '2011-06-20');
-- GO
COMMIT;
-- GO

--
-- Index: FK_user_employee
--
ALTER TABLE `hospital`.`user` ADD INDEX `FK_user_employee` (`employee_id` );
-- GO

--
-- Index: FK_user_role
--
ALTER TABLE `hospital`.`user` ADD INDEX `FK_user_role` (`role_id` );
-- GO

--
-- Table: visit
--
CREATE TABLE `visit` 
(
	`id` integer (11) NOT NULL AUTO_INCREMENT , 
	`patient_id` integer (11), 
	`doctor_id` integer (11), 
	`ward_bed_id` integer (11), 
	`ward_doc_id` integer (11), 
	`visit_type` varchar (10), 
	`medicine` varchar (500), 
	`bp` varchar (10), 
	`temp` varchar (10), 
	`pulse` varchar (10), 
	`injection` varchar (500), 
	`diet` varchar (500), 
	`description` varchar (5000), 
	`time` varchar (10), 
	`visit_date` date, 
	`fee` varchar (10), 
	`fee_paid` varchar (10), 
	`status` varchar (10), 
	`created_at` date, 
	`updated_at` date,
	PRIMARY KEY (`id`)
) TYPE=InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;
-- GO

--
-- Dumping Table Data: visit
--
BEGIN;
-- GO
INSERT INTO `visit` (`id`, `patient_id`, `doctor_id`, `ward_bed_id`, `ward_doc_id`, `visit_type`, `medicine`, `bp`, `temp`, `pulse`, `injection`, `diet`, `description`, `time`, `visit_date`, `fee`, `fee_paid`, `status`, `created_at`, `updated_at`) VALUES(1, 1, 1, NULL, 3, 'Indoor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1350', '2011-06-17', NULL, NULL, '1', '2011-06-17', '2011-06-17');
-- GO
INSERT INTO `visit` (`id`, `patient_id`, `doctor_id`, `ward_bed_id`, `ward_doc_id`, `visit_type`, `medicine`, `bp`, `temp`, `pulse`, `injection`, `diet`, `description`, `time`, `visit_date`, `fee`, `fee_paid`, `status`, `created_at`, `updated_at`) VALUES(2, 1, 1, NULL, 2, 'Indoor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1350', '2011-06-20', NULL, NULL, '1', '2011-06-20', '2011-06-20');
-- GO
INSERT INTO `visit` (`id`, `patient_id`, `doctor_id`, `ward_bed_id`, `ward_doc_id`, `visit_type`, `medicine`, `bp`, `temp`, `pulse`, `injection`, `diet`, `description`, `time`, `visit_date`, `fee`, `fee_paid`, `status`, `created_at`, `updated_at`) VALUES(3, 2, 1, NULL, 2, 'Indoor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1430', '2011-06-20', NULL, NULL, '1', '2011-06-20', '2011-06-20');
-- GO
INSERT INTO `visit` (`id`, `patient_id`, `doctor_id`, `ward_bed_id`, `ward_doc_id`, `visit_type`, `medicine`, `bp`, `temp`, `pulse`, `injection`, `diet`, `description`, `time`, `visit_date`, `fee`, `fee_paid`, `status`, `created_at`, `updated_at`) VALUES(4, 5, 2, NULL, 3, 'Indoor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1500', '2011-06-20', NULL, NULL, '1', '2011-06-20', '2011-06-20');
-- GO
COMMIT;
-- GO

--
-- Index: FK_visit_patient
--
ALTER TABLE `hospital`.`visit` ADD INDEX `FK_visit_patient` (`patient_id` );
-- GO

--
-- Index: FK_visit_doctor
--
ALTER TABLE `hospital`.`visit` ADD INDEX `FK_visit_doctor` (`doctor_id` );
-- GO

--
-- Index: FK_visit_ward_bed
--
ALTER TABLE `hospital`.`visit` ADD INDEX `FK_visit_ward_bed` (`ward_bed_id` );
-- GO

--
-- Index: FK_visit_ward_doc
--
ALTER TABLE `hospital`.`visit` ADD INDEX `FK_visit_ward_doc` (`ward_doc_id` );
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
-- Foreign Key Constraint: FK_duty_roster_employee
--
ALTER TABLE `duty_roster` ADD CONSTRAINT `FK_duty_roster_employee` FOREIGN KEY (`employee_id`) REFERENCES `employee`(`id`);
-- GO

--
-- Foreign Key Constraint: FK_duty_roster_place
--
ALTER TABLE `duty_roster` ADD CONSTRAINT `FK_duty_roster_place` FOREIGN KEY (`duty_place_id`) REFERENCES `duty_place`(`id`);
-- GO

--
-- Foreign Key Constraint: FK_duty_roster_substitute
--
ALTER TABLE `duty_roster` ADD CONSTRAINT `FK_duty_roster_substitute` FOREIGN KEY (`substitute_id`) REFERENCES `employee`(`id`);
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
-- Foreign Key Constraint: FK_employee_role
--
ALTER TABLE `employee` ADD CONSTRAINT `FK_employee_role` FOREIGN KEY (`role_id`) REFERENCES `role`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;
-- GO

--
-- Foreign Key Constraint: FK_lab_report_lab_test
--
ALTER TABLE `lab_report` ADD CONSTRAINT `FK_lab_report_lab_test` FOREIGN KEY (`lab_test_id`) REFERENCES `lab_test`(`id`);
-- GO

--
-- Foreign Key Constraint: FK_lab_report_patient
--
ALTER TABLE `lab_report` ADD CONSTRAINT `FK_lab_report_patient` FOREIGN KEY (`patient_id`) REFERENCES `patient`(`id`);
-- GO

--
-- Foreign Key Constraint: FK_lab_report_visit
--
ALTER TABLE `lab_report` ADD CONSTRAINT `FK_lab_report_visit` FOREIGN KEY (`visit_id`) REFERENCES `visit`(`id`);
-- GO

--
-- Foreign Key Constraint: FK_user_employee
--
ALTER TABLE `user` ADD CONSTRAINT `FK_user_employee` FOREIGN KEY (`employee_id`) REFERENCES `employee`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;
-- GO

--
-- Foreign Key Constraint: FK_user_role
--
ALTER TABLE `user` ADD CONSTRAINT `FK_user_role` FOREIGN KEY (`role_id`) REFERENCES `role`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;
-- GO

--
-- Foreign Key Constraint: FK_visit_doctor
--
ALTER TABLE `visit` ADD CONSTRAINT `FK_visit_doctor` FOREIGN KEY (`doctor_id`) REFERENCES `employee`(`id`);
-- GO

--
-- Foreign Key Constraint: FK_visit_patient
--
ALTER TABLE `visit` ADD CONSTRAINT `FK_visit_patient` FOREIGN KEY (`patient_id`) REFERENCES `patient`(`id`);
-- GO

--
-- Foreign Key Constraint: FK_visit_ward_bed
--
ALTER TABLE `visit` ADD CONSTRAINT `FK_visit_ward_bed` FOREIGN KEY (`ward_bed_id`) REFERENCES `ward_bed`(`id`);
-- GO

--
-- Foreign Key Constraint: FK_visit_ward_doc
--
ALTER TABLE `visit` ADD CONSTRAINT `FK_visit_ward_doc` FOREIGN KEY (`ward_doc_id`) REFERENCES `employee`(`id`);
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

