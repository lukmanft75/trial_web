
CREATE TABLE tis_attendance_daily_planing (
	id int NOT NULL auto_increment,
	plan_date date NOT NULL,
	sites_id int (11) NOT NULL,
	sites_name varchar (255) NOT NULL,
	sites_longitude varchar (20) NOT NULL,
	sites_latitude varchar (20) NOT NULL,
	plan_nopol varchar (10) NOT NULL,
	users_id int (11) NOT NULL,
	users_name varchar (100),
	created_at datetime DEFAULT NULL,
	created_by varchar(100) NOT NULL,
	created_ip varchar(20) DEFAULT NULL,
	updated_at datetime DEFAULT NULL,
	updated_by varchar(100) NOT NULL,
	updated_ip varchar(20) DEFAULT NULL,
	xtimestamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (id)
);
CREATE TABLE tis_attendace_personil (
	id int NOT NULL auto_increment,
	att_date date NOT NULL,
	users_id int (11) NOT NULL,
	attendance_status varchar(20) NOT NULL,
	actual_sites_id int (11) NOT NULL,
	cost_centers_code varchar(20) NOT NULL,
	description varchar (255) NOT NULL,
	created_at datetime DEFAULT NULL,
	created_by varchar(100) NOT NULL,
	created_ip varchar(20) DEFAULT NULL,
	updated_at datetime DEFAULT NULL,
	updated_by varchar(100) NOT NULL,
	updated_ip varchar(20) DEFAULT NULL,
	xtimestamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (id)
);

Note:
..db indottech_sites perlu field cost_centers_code untuk perhitungan berapa persentase dari site-site yang dikunjungi untuk CC tersebut
..db users perlu field candidates_code 
