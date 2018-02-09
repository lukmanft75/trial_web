CREATE TABLE storage (
	id int not null auto_increment,
	user_id int not null,
	allowed_user_ids TEXT NOT NULL,
	filename varchar(255) NOT NULL,
	physicalname varchar(100) NOT NULL,
	expired_at date NOT NULL,
	created_at datetime NOT NULL,
	created_by varchar(100) NOT NULL,
	created_ip varchar(20) DEFAULT NULL,
	updated_at datetime NOT NULL,
	updated_by varchar(100) NOT NULL,
	updated_ip varchar(20) DEFAULT NULL,
	xtimestamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	primary key(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
ALTER TABLE `storage` ADD UNIQUE(`physicalname`);
ALTER TABLE `storage` ADD INDEX(`expired_at`);

INSERT INTO backoffice_menu (id,seqno,parent_id,name,url) VALUES ('114','4','99','Storage','storage_list.php');
INSERT INTO backoffice_menu_privileges (group_id,backoffice_menu_id,privilege) VALUES ('3','114','1');
INSERT INTO backoffice_menu_privileges (group_id,backoffice_menu_id,privilege) VALUES ('4','114','1');
INSERT INTO backoffice_menu_privileges (group_id,backoffice_menu_id,privilege) VALUES ('11','114','1');
INSERT INTO backoffice_menu_privileges (group_id,backoffice_menu_id,privilege) VALUES ('12','114','1');
INSERT INTO backoffice_menu_privileges (group_id,backoffice_menu_id,privilege) VALUES ('13','114','1');
INSERT INTO backoffice_menu_privileges (group_id,backoffice_menu_id,privilege) VALUES ('14','114','1');
INSERT INTO backoffice_menu_privileges (group_id,backoffice_menu_id,privilege) VALUES ('15','114','1');
INSERT INTO backoffice_menu_privileges (group_id,backoffice_menu_id,privilege) VALUES ('16','114','1');
INSERT INTO backoffice_menu_privileges (group_id,backoffice_menu_id,privilege) VALUES ('17','114','1');
INSERT INTO backoffice_menu_privileges (group_id,backoffice_menu_id,privilege) VALUES ('18','114','1');