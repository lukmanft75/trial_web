DROP TABLE IF EXISTS indottech_prfs;
CREATE TABLE indottech_prfs (
	id int not null auto_increment,	
	prf_id int NOT NULL,	
	project_id int NOT NULL,	
	scope_id int NOT NULL,	
	region_id int NOT NULL,
	created_at datetime NOT NULL,
	created_by varchar(100) NOT NULL,
	created_ip varchar(20) DEFAULT NULL,
	updated_at datetime NOT NULL,
	updated_by varchar(100) NOT NULL,
	updated_ip varchar(20) DEFAULT NULL,
	xtimestamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	primary key(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;