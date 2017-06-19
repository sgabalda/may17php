CREATE TABLE IF NOT EXISTS ROLES(
	role_id int not null auto_increment,
	name varchar(255),
	PRIMARY KEY (role_id)
);
INSERT INTO ROLES (name) VALUES ('Rol A');
INSERT INTO ROLES (name) VALUES
	('Rol B'),
	('Rol C');

CREATE TABLE IF NOT EXISTS USERS(
	user_id int NOT NULL auto_increment,
	name varchar(255),
	lastname varchar(255),
	email varchar(255),
	bdate date,
	role int,
	PRIMARY KEY (user_id),
	FOREIGN KEY (role) REFERENCES ROLES(role_id)
);

CREATE TABLE IF NOT EXISTS TRANSPORT(
	transport_id int NOT NULL AUTO_INCREMENT,
	name varchar(255),
	PRIMARY KEY (transport_id)
);

CREATE TABLE IF NOT EXISTS USERS_TRANSPORT(
	user_id int NOT NULL,
	transport_id int not null,
	FOREIGN KEY (user_id) REFERENCES USERS(user_id),
	FOREIGN KEY (transport_id) REFERENCES TRANSPORT(transport_id)
);


