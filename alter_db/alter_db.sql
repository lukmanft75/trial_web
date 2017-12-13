INSERT INTO indottech_photo_items (id,parent_id,itemtype,is_childest,name) VALUES ('615','0','9','0','FSFL Dokumentasi');
INSERT INTO indottech_photo_items (id,parent_id,itemtype,is_childest,name) VALUES ('616','615','9','1','FSFL Photo 1');
INSERT INTO indottech_photo_items (id,parent_id,itemtype,is_childest,name) VALUES ('617','615','9','1','FSFL Photo 2');
INSERT INTO indottech_photo_items (id,parent_id,itemtype,is_childest,name) VALUES ('618','615','9','1','FSFL Photo 3');
INSERT INTO indottech_photo_items (id,parent_id,itemtype,is_childest,name) VALUES ('619','615','9','1','FSFL Photo 4');

CREATE TABLE indottech_sites (
	id int not null auto_increment,
	kode varchar(20) NOT NULL,
	name varchar(255) NOT NULL,
	longitude varchar(20) NOT NULL,
	latitude varchar(20) NOT NULL,
	created_at datetime NOT NULL,
	created_by varchar(100) NOT NULL,
	created_ip varchar(20) DEFAULT NULL,
	xtimestamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	primary key(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO indottech_sites (kode,name,longitude,latitude) VALUES 
('001','Kebayoran Lama','34343242','3432432432'),
('002','Kebayoran Baru','34343242','3432432432'),
('003','Mampang','34343242','3432432432'),
('004','Kuningan','34343242','3432432432'),
('005','Pancoran','34343242','3432432432'),
('006','Bandung','34343242','3432432432'),
('007','Jogjakarta','34343242','3432432432'),
('008','Tangerang','34343242','3432432432'),
('009','Bekasi','34343242','3432432432'),
('010','Depok','34343242','3432432432');
	
INSERT INTO users (group_id,email,password,name,job_title,job_division,forbidden_chr_dashboards) VALUES (12,'user1','MTIzNDU2','User 1','Indottech Admin','Indottech','6');
INSERT INTO users (group_id,email,password,name,job_title,job_division,forbidden_chr_dashboards) VALUES (12,'user2','MTIzNDU2','User 2','Indottech Admin','Indottech','6');
INSERT INTO users (group_id,email,password,name,job_title,job_division,forbidden_chr_dashboards) VALUES (12,'user3','MTIzNDU2','User 3','Indottech Admin','Indottech','6');
INSERT INTO users (group_id,email,password,name,job_title,job_division,forbidden_chr_dashboards) VALUES (12,'user4','MTIzNDU2','User 4','Indottech Admin','Indottech','6');
INSERT INTO users (group_id,email,password,name,job_title,job_division,forbidden_chr_dashboards) VALUES (12,'user5','MTIzNDU2','User 5','Indottech Admin','Indottech','6');

ALTER TABLE `indottech_geotagging_req` ADD `fsfl_mode` SMALLINT NOT NULL DEFAULT '0' AFTER `photo_item_ids`, ADD `siteIdSelected` INT NOT NULL AFTER `fsfl_mode`, ADD INDEX (`fsfl_mode`), ADD INDEX (`siteIdSelected`);