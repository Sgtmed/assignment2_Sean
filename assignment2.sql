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
DESC tbl_users;


DROP TABLE tbl_logos;

CREATE TABLE tbl_logos(
	logoID 						INT AUTO_INCREMENT PRIMARY KEY,
	logo VARCHAR(50)
);

SELECT * FROM tbl_logos;

DROP TABLE tbl_pages;

CREATE TABLE tbl_pages(
pageID INT AUTO_INCREMENT PRIMARY KEY,
pageTitle VARCHAR(30) NOT NULL,
pageHeading VARCHAR(30),
pageContent VARCHAR(500)
);

SELECT * FROM tbl_pages;