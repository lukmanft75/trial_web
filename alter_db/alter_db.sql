DROP TABLE IF EXISTS cost_centers;
CREATE TABLE cost_centers (
	id int not null auto_increment,	
	code varchar(20) NOT NULL,
	departement varchar(50) NOT NULL,
	name varchar(255) NOT NULL,
	created_at datetime NOT NULL,
	created_by varchar(100) NOT NULL,
	created_ip varchar(20) DEFAULT NULL,
	updated_at datetime NOT NULL,
	updated_by varchar(100) NOT NULL,
	updated_ip varchar(20) DEFAULT NULL,
	xtimestamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	primary key(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
ALTER TABLE `cost_centers` ADD UNIQUE(`code`);

INSERT INTO cost_centers (code,departement,name) VALUES ('270911-A','Indottech','SF Phase 1 - 2B');
INSERT INTO cost_centers (code,departement,name) VALUES ('270911-B','Indottech','SF Shooter');
INSERT INTO cost_centers (code,departement,name) VALUES ('270911-C','Indottech','SF Rec. KMS-Leading');
INSERT INTO cost_centers (code,departement,name) VALUES ('270911-D','Indottech','SF Rec. Pancareka');
INSERT INTO cost_centers (code,departement,name) VALUES ('270911-E','Indottech','SF Rec. Dexa');
INSERT INTO cost_centers (code,departement,name) VALUES ('270911-F','Indottech','SF Rec. Ceragon');
INSERT INTO cost_centers (code,departement,name) VALUES ('270911-G','Indottech','SF Rec. Mimo WJ');
INSERT INTO cost_centers (code,departement,name) VALUES ('270911-H','Indottech','SF Rec. Tenc 1');
INSERT INTO cost_centers (code,departement,name) VALUES ('270911-I','Indottech','SF Rec. Nexwave');
INSERT INTO cost_centers (code,departement,name) VALUES ('270911-J','Indottech','SF Rec. Tenc 2');
INSERT INTO cost_centers (code,departement,name) VALUES ('270911-K','Indottech','SF Rec. Mimo Jabo');
INSERT INTO cost_centers (code,departement,name) VALUES ('270911-L','Indottech','SF Phase 2C - Outer');
INSERT INTO cost_centers (code,departement,name) VALUES ('270911-M','Indottech','SF Phase 2D - Outer');
INSERT INTO cost_centers (code,departement,name) VALUES ('270911-N','Indottech','SF Mini CME Batch 1');
INSERT INTO cost_centers (code,departement,name) VALUES ('270911-O','Indottech','SF NMS Jabo & WJ');
INSERT INTO cost_centers (code,departement,name) VALUES ('270911-P','Indottech','Exelcom');
INSERT INTO cost_centers (code,departement,name) VALUES ('270911-Q','Indottech','SF Mini CME Batch 2');
INSERT INTO cost_centers (code,departement,name) VALUES ('270911-R','Indottech','SF Rec. Ceragon Batch 2 ');
INSERT INTO cost_centers (code,departement,name) VALUES ('270911-S','Indottech','SF Phase 2D - Inner');
INSERT INTO cost_centers (code,departement,name) VALUES ('270911-T','Indottech','SF PICO Project');
INSERT INTO cost_centers (code,departement,name) VALUES ('270911-U','Indottech','SF IBS Project');
INSERT INTO cost_centers (code,departement,name) VALUES ('270911-V','Indottech','Gabungan');
INSERT INTO cost_centers (code,departement,name) VALUES ('270911-W','Indottech','SF IP RAN Project');
INSERT INTO cost_centers (code,departement,name) VALUES ('270911-X','Indottech','SF Activation 10 Mhz Project');
INSERT INTO cost_centers (code,departement,name) VALUES ('270911-Y','Indottech','SF New PS & Insert Module');
INSERT INTO cost_centers (code,departement,name) VALUES ('270911-BA','Indottech','H3I Project Surabaya');
INSERT INTO cost_centers (code,departement,name) VALUES ('270911-BB','Indottech','H3I Project Makassar');
INSERT INTO cost_centers (code,departement,name) VALUES ('270911-BC','Indottech','H3I Project UE');
INSERT INTO cost_centers (code,departement,name) VALUES ('270911-BD','Indottech','H3I Project ALU');
INSERT INTO cost_centers (code,departement,name) VALUES ('270911-BE','Indottech','H3I Project Takeover  Palembang');
INSERT INTO cost_centers (code,departement,name) VALUES ('270911-BF','Indottech','H3I Project LTE 496 Bali');
INSERT INTO cost_centers (code,departement,name) VALUES ('270911-BG','Indottech','H3I Project LTE 496 South Sumatera');
INSERT INTO cost_centers (code,departement,name) VALUES ('270911-BH','Indottech','H3I Project LTE 496 Sulawesi');
INSERT INTO cost_centers (code,departement,name) VALUES ('270911-CA','Indottech','Swap Banjarmasin_SGI Nokia Tsel Kalimantan 2017');
INSERT INTO cost_centers (code,departement,name) VALUES ('270911-CB','Indottech','RO Balikpapan_SGI Nokia Tsel Kalimantan 2017');
INSERT INTO cost_centers (code,departement,name) VALUES ('270911-CC','Indottech','Swap Balikpapan_SGI Nokia Tsel Kalimantan 2017');
INSERT INTO cost_centers (code,departement,name) VALUES ('270911-DA','Indottech','H3I Project Direct');
INSERT INTO cost_centers (code,departement,name) VALUES ('270927-A','Indottech','NPO SF JABO 2017');
INSERT INTO cost_centers (code,departement,name) VALUES ('270927-B','Indottech','NPO Tsel Kalimantan 2017');
INSERT INTO cost_centers (code,departement,name) VALUES ('270927-C','Indottech','NPO Tsel Bali 2017');

ALTER TABLE `prf` ADD `cost_center_code` VARCHAR(20) NOT NULL AFTER `departement`, ADD INDEX (`cost_center_code`);
