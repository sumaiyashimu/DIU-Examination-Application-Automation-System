CREATE TABLE `students` (
	`id` VARCHAR(12) NOT NULL,
	`email` VARCHAR(50) NOT NULL,
	`name` VARCHAR(50) NOT NULL,
	`phone` VARCHAR(15) NOT NULL,
	`batch` INT NOT NULL,
	`password` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `teachers` (
	`employee_id` INT NOT NULL,
	`name` VARCHAR(60) NOT NULL,
	`email` VARCHAR(60) NOT NULL,
	`teacher_init` VARCHAR(5) NOT NULL,
	`password` VARCHAR(20) NOT NULL,
	PRIMARY KEY (`employee_id`)
);
-- view create er query

CREATE VIEW users AS
(SELECT email,password, 1 as type
FROM students)
UNION
(SELECT email,password, 2 as type
FROM teachers)

-- application_table

CREATE TABLE `application` (
	`date` VARCHAR(12),
	`exam` VARCHAR(20),
	`semister` VARCHAR(30) NOT NULL,
	`std_id` VARCHAR(40) NOT NULL,
	`std_section` VARCHAR(10) NOT NULL,
	`ICC` VARCHAR(20) NOT NULL,
	`ICN` VARCHAR(100) NOT NULL,
	`ACC` VARCHAR(20) NOT NULL,
	`ACN` VARCHAR(100) NOT NULL,
	`ITI` VARCHAR(20) NOT NULL,
	`ATI` VARCHAR(20) NOT NULL,
	`advisor` VARCHAR(20) NOT NULL,
	`ITApprove` INT DEFAULT 0,
	`ATApprove` INT DEFAULT 0,
	`AdvisorApprove` INT DEFAULT 0,
	PRIMARY KEY (`semister`,`std_id`,`ICC`)
)

CREATE VIEW improvement AS
(SELECT application.*,students.name,students.email,students.phone,students.batch,teachers.employee_id FROM application 
INNER JOIN students on application.std_id = students.id 
INNER JOIN teachers on teachers.teacher_init = application.ITI)

CREATE VIEW attend AS
(SELECT application.*,students.name,students.email,students.phone,students.batch,teachers.employee_id FROM application 
INNER JOIN students on application.std_id = students.id 
INNER JOIN teachers on teachers.teacher_init = application.ATI)

CREATE VIEW advising AS
(SELECT application.*,students.name,students.email,students.phone,students.batch,teachers.employee_id FROM application 
INNER JOIN students on application.std_id = students.id 
INNER JOIN teachers on teachers.teacher_init = application.advisor)

