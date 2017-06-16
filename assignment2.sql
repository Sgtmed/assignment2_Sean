USE gc200362901;

DROP TABLE tbl_users;

CREATE TABLE tbl_users(
	fname VARCHAR(50)			NOT NULL,
    lname VARCHAR(50)			NOT NULL,
	email VARCHAR(120) 			NOT NULL PRIMARY KEY,
    username VARCHAR(100)		NOT NULL,
    password VARCHAR(255)		NOT NULL
);

SELECT * FROM tbl_users;

CREATE TABLE tbl_logos(
	logoID 						INT AUTO_INCREMENT PRIMARY KEY,
	logo VARCHAR(50)
);

SELECT * FROM tbl_logos;