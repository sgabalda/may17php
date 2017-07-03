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
	FOREIGN KEY (user_id) REFERENCES USERS(user_id) ON DELETE CASCADE,
	FOREIGN KEY (transport_id) REFERENCES TRANSPORT(transport_id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS HOBBIES(
	hobby_id int not null auto_increment,
	name varchar(255),
	PRIMARY KEY (hobby_id)
);

CREATE TABLE IF NOT EXISTS USERS_HOBBIES(
	user_id int not null,
	hobby_id int not null,
	FOREIGN KEY (user_id) REFERENCES USERS(user_id) ON DELETE CASCADE,
	FOREIGN KEY (hobby_id) REFERENCES HOBBIES(hobby_id) ON DELETE CASCADE
);

INSERT INTO TRANSPORT (name) values ('car'),('motorbike'),('bike');
INSERT INTO HOBBIES (name) values ('beer'),('sports'),('ioga');

INSERT INTO USERS (name, lastname, email, bdate, role)
values ('sergi', 'gabalda', 'sergigabol@gmail.com',
	'1982-11-21', 1
);
INSERT INTO USERS_TRANSPORT (user_id,transport_id)
values (1,1),(1,3);

INSERT INTO USERS (name, lastname, email, bdate, role)
values ('fulano', 'de tal', 'prueba@prueba.com',
	'1981-11-21', 2
);
INSERT INTO USERS_TRANSPORT (user_id,transport_id)
values (2,1);
INSERT INTO USERS_HOBBIES (user_id,hobby_id)
values (2,1),(2,2);

INSERT INTO USERS (name, lastname, email, bdate, role)
values ('Mengano', 'de cual', 'prueba2@prueba2.com',
	'1980-11-21', 2
);
INSERT INTO USERS_TRANSPORT (user_id,transport_id)
values (3,3);
INSERT INTO USERS_HOBBIES (user_id,hobby_id)
values (2,1),(2,3);

INSERT INTO USERS (name, lastname, email, bdate, role)
values ('Mengano2', 'de cual', 'prueba2@prueba2.com',
	'1998-11-21', 2
);

ALTER TABLE USERS ADD passwd varchar(255);
