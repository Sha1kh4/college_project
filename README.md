# MIT aurangabad    

## To use the code create 2 databases with names "asd" and "admission"
### in asd database create a table contacts using the following sql code

CREATE TABLE contacts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  subject VARCHAR(20) NOT NULL,
  message VARCHAR(100) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

### in asd database create a table alumni_feedback using the following sql code

CREATE TABLE alumni_feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    batch INT NOT NULL,
    feedback VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);


### in admission database create a table using the following sql code

CREATE TABLE admission (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    batch INT NOT NULL,
    branch VARCHAR(255) NOT NULL,
    phone INT(15) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);
### lastly create a table admin_login in admission database using the following sql code
CREATE TABLE admin_login (
	admin_id varchar(28),
	admin_pass varchar(28)
);
### add values to it
INSERT INTO admin_login (admin_id,admin_pass)
VALUES
('admin','1234');
