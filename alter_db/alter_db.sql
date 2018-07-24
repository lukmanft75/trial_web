CREATE TABLE indottech_atd_cover (
	id int NOT NULL auto_increment,
	doctype varchar(50) NOT NULL,
	worktype_ids varchar(100) NOT NULL,
	vendor varchar(100) NOT NULL,
	project_name varchar(100) NOT NULL,
	site_id int NOT NULL,
	site_name varchar(100) NOT NULL,
	acceptance_at date NOT NULL,
	acceptance_status smallint NOT NULL,
	created_at datetime DEFAULT NULL,
	created_by varchar(100) NOT NULL,
	created_ip varchar(20) DEFAULT NULL,
	updated_at datetime DEFAULT NULL,
	updated_by varchar(100) NOT NULL,
	updated_ip varchar(20) DEFAULT NULL,
	xtimestamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (id)
);
	
CREATE TABLE indottech_ba_ujiterima (
	id int NOT NULL auto_increment,
	atd_id int NOT NULL,
	ba_at date NOT NULL,
	vendor varchar(100) NOT NULL,
	site_no varchar(100) NOT NULL,
	site_address text NOT NULL,
	area varchar(255) NOT NULL,
	nbw_novarchar(100) NOT NULL,
	pono varchar(100) NOT NULL,
	resv_no,varchar(100) NOT NULL,
	created_at datetime DEFAULT NULL,
	created_by varchar(100) NOT NULL,
	created_ip varchar(20) DEFAULT NULL,
	updated_at datetime DEFAULT NULL,
	updated_by varchar(100) NOT NULL,
	updated_ip varchar(20) DEFAULT NULL,
	xtimestamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (id),
	INDEX (atd_id)
);
	
	
CREATE TABLE indottech_photos (
	id int NOT NULL auto_increment,
	atd_id int NOT NULL,
	photo_title varchar(100) NOT NULL,
	seqno int NOT NULL,
	photo_note varchar(255) NOT NULL,
	created_at datetime DEFAULT NULL,
	created_by varchar(100) NOT NULL,
	created_ip varchar(20) DEFAULT NULL,
	updated_at datetime DEFAULT NULL,
	updated_by varchar(100) NOT NULL,
	updated_ip varchar(20) DEFAULT NULL,
	xtimestamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (id),
	INDEX (atd_id)
);
	
CREATE TABLE indottech_breakers (
	id int NOT NULL auto_increment,
	atd_id int NOT NULL,
	seqno int NOT NULL,
	breaker_type varchar(50) NOT NULL,
	breaker_no varchar(50) NOT NULL,
	capacity varchar(10) NOT NULL,
	qty double NOT NULL,
	name varchar(50) NOT NULL,,
	created_at datetime DEFAULT NULL,
	created_by varchar(100) NOT NULL,
	created_ip varchar(20) DEFAULT NULL,
	updated_at datetime DEFAULT NULL,
	updated_by varchar(100) NOT NULL,
	updated_ip varchar(20) DEFAULT NULL,
	xtimestamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (id),
	INDEX (atd_id)
);

CREATE TABLE indottech_acceptance_test_rectifier (
	id int NOT NULL auto_increment,
	atd_id int NOT NULL,
	test_at date NOT NULL,
	customer varchar(100) NOT NULL,
	site_name varchar(100) NOT NULL,
	site_address text NOT NULL,
	power_system_sn varchar(30) NOT NULL,
	sub_rack_sn varchar(30) NOT NULL,
	supervisory_modul_sn varchar(30) NOT NULL,
	rectifier_module_type varchar(30) NOT NULL,
	rectifier1_sn varchar(30) NOT NULL,
	rectifier2_sn varchar(30) NOT NULL,
	rectifier3_sn varchar(30) NOT NULL,
	rectifier4_sn varchar(30) NOT NULL,
	rectifier5_sn varchar(30) NOT NULL,
	rectifier6_sn varchar(30) NOT NULL,
	rectifier7_sn varchar(30) NOT NULL,
	ac_input_vac double NOT NULL,
	ac_input_phase double NOT NULL,
	output_vdc1 double NOT NULL,
	output_vdc2 double NOT NULL,
	float_vdc double NOT NULL,
	equalize_vdc double NOT NULL,
	polarity smallint NOT NULL,
	load_current double NOT NULL,
	load_output_vdc double NOT NULL,
	alarm_low_float smallint NOT NULL,
	alarm_low_load smallint NOT NULL,
	alarm_high_float smallint NOT NULL,
	alarm_high_load smallint NOT NULL,
	alarm_load_fuse_fail smallint NOT NULL,
	alarm_battery_fuse_fail smallint NOT NULL,
	rectifier_system_vdc double NOT NULL,
	rectifier_ipaddr varchar(20) NOT NULL,
	rectifier_subnet varchar(20) NOT NULL,
	rectifier_gateway varchar(20) NOT NULL,
	rectifier_port1 varchar(10) NOT NULL,
	rectifier_port2 varchar(10) NOT NULL,
	battery_type varchar(50) NOT NULL,
	battery_capacity varchar(10) NOT NULL,
	battery_voltage_per_block double NOT NULL,
	battery_no_of_bank int NOT NULL,
	battery_charging_rate varchar(20) NOT NULL,
	created_at datetime DEFAULT NULL,
	created_by varchar(100) NOT NULL,
	created_ip varchar(20) DEFAULT NULL,
	updated_at datetime DEFAULT NULL,
	updated_by varchar(100) NOT NULL,
	updated_ip varchar(20) DEFAULT NULL,
	xtimestamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (id),
	INDEX (atd_id)
);
	
CREATE TABLE indottech_battery_discharge (
	id int NOT NULL auto_increment,
	atd_id int NOT NULL,
	load_current double NOT NULL,
	bank_no int NOT NULL,
	batt_no int NOT NULL,
	minute_at int NOT NULL,
	val double NOT NULL,,
	created_at datetime DEFAULT NULL,
	created_by varchar(100) NOT NULL,
	created_ip varchar(20) DEFAULT NULL,
	updated_at datetime DEFAULT NULL,
	updated_by varchar(100) NOT NULL,
	updated_ip varchar(20) DEFAULT NULL,
	xtimestamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (id),
	INDEX (atd_id)
);

CREATE TABLE indottech_sites (
	id int NOT NULL auto_increment,
	project_id int NOT NULL,
	site_code int NOT NULL,
	name varchar(100) NOT NULL,
	address TEXT NOT NULL,
	latitude varchar(50) NOT NULL,
	longitude varchar(50) NOT NULL,
	created_at datetime DEFAULT NULL,
	created_by varchar(100) NOT NULL,
	created_ip varchar(20) DEFAULT NULL,
	updated_at datetime DEFAULT NULL,
	updated_by varchar(100) NOT NULL,
	updated_ip varchar(20) DEFAULT NULL,
	xtimestamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (id),
	INDEX (project_id),
	INDEX (site_code)
);

ALTER TABLE `indottech_photo_items` ADD `project_id` INT NOT NULL AFTER `is_childest`, ADD `doctype` VARCHAR(50) NOT NULL AFTER `project_id`, ADD `seqno` INT NOT NULL AFTER `doctype`, ADD INDEX (`project_id`), ADD INDEX (`doctype`), ADD INDEX (`seqno`);