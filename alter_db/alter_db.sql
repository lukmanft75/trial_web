CREATE TABLE storage (
	id int not null auto_increment,
	user_id int not null,
	allowed_user_ids varchar(100) NOT NULL,
	filename varchar(255) NOT NULL,
	physicalname varchar(100) NOT NULL,
	expired_at datetime NOT NULL,
	created_at datetime NOT NULL,
	created_by varchar(100) NOT NULL,
	created_ip varchar(20) DEFAULT NULL,
	updated_at datetime NOT NULL,
	updated_by varchar(100) NOT NULL,
	updated_ip varchar(20) DEFAULT NULL,
	xtimestamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	primary key(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

