CREATE DATABASE EMS;

 USE ems;
 
  CREATE TABLE employee
    (
    user_type VARCHAR(255) default 'NORMAL USER',
    emp_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    emp_firstname VARCHAR(255) NOT NULL,
    emp_lastname VARCHAR(255) NOT NULL,
    mobile_num VARCHAR(10) NOT NULL,
    date_of_birth DATE NOT NULL,
    gender VARCHAR(10)  NOT NULL,
    comm_address VARCHAR(255) NOT NULL,
    city VARCHAR(255) NOT NULL,
    userName varchar(255) NOT NULL UNIQUE,
    user_password VARCHAR(255) NOT NULL UNIQUE
    );

  CREATE TABle issue
  (
    issue_id  INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    issue_type VARCHAR(255) NOT NULL,
    issue_desc VARCHAR(255) NOT NULL,
    emp_id INT NOT NULL,
    issue_status VARCHAR(255) NOT NULL,
    FOREIGN KEY (emp_id) REFERENCES employee(emp_id) ON DELETE CASCADE
  );

  CREATE TABLE project 
  (
    proj_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    proj_name VARCHAR(255) NOT NULL,
    proj_desc VARCHAR(255) NOT NULL,
    proj_startdate DATE NOT NULL,
    proj_enddate DATE NOT NULL
  );

CREATE Table emp_proj
(
  emp_proj_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  emp_id INT NOT NULL,
  proj_id INT NOT NULL,
  proj_manager INT NOT NULL,
  FOREIGN KEY (emp_id) REFERENCES employee(emp_id) ON DELETE CASCADE,
  FOREIGN KEY (proj_id) REFERENCES project(proj_id) ON DELETE CASCADE,
  FOREIGN KEY (proj_manager) REFERENCES employee(emp_id) ON DELETE CASCADE
);
