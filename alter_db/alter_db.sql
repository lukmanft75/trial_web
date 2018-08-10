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
	nbw_no varchar(100) NOT NULL,
	pono varchar(100) NOT NULL,
	resv_no varchar(100) NOT NULL,
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
	name varchar(50) NOT NULL,
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
	val double NOT NULL,
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

CREATE TABLE indottech_battery_discharge_photos (
	id int NOT NULL auto_increment,
	battery_discharge_id int NOT NULL,
	atd_id int NOT NULL,
	photo varchar(255),
	created_at datetime DEFAULT NULL,
	created_by varchar(100) NOT NULL,
	created_ip varchar(20) DEFAULT NULL,
	updated_at datetime DEFAULT NULL,
	updated_by varchar(100) NOT NULL,
	updated_ip varchar(20) DEFAULT NULL,
	xtimestamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (id),
	INDEX (battery_discharge_id),
	INDEX (atd_id)
);

ALTER TABLE `indottech_sites` ADD `project_id` INT NOT NULL AFTER `id`, ADD `site_code` VARCHAR(20) NOT NULL AFTER `project_id`, ADD INDEX (`project_id`), ADD INDEX (`site_code`);
ALTER TABLE `indottech_sites` ADD `area` VARCHAR(100) NOT NULL AFTER `name`, ADD `subarea` VARCHAR(100) NOT NULL AFTER `area`, ADD `address` TEXT NOT NULL AFTER `subarea`;

ALTER TABLE `indottech_photo_items` ADD `project_id` INT NOT NULL AFTER `is_childest`, ADD `doctype` VARCHAR(50) NOT NULL AFTER `project_id`, ADD `seqno` INT NOT NULL AFTER `doctype`, ADD INDEX (`project_id`), ADD INDEX (`doctype`), ADD INDEX (`seqno`);

INSERT INTO indottech_sites (project_id,kode,site_code,name,area,subarea,address,latitude,longitude) VALUES 
('13','NewSite-Kupang102','2710100','TELUK MUTIARA SAJA','Flores','Flores Timur','Jl.Lombok Rt 1/3, kadelang, kel. kalabahi timur, teluk mutiara Kab Alor NTT','-8.22097','124.539'),
('13','NewSite-Kupang111','2710109','TELUK MUTIARA','Flores','Flores Timur','Jl. WZ Yohanes Rt 9/4, Kel. mutiara, Kec. Teluk Mutiara, Kab. Alor, NTT','-8.21546','124.54503'),
('13','NewSite-Kupang381','2710379','TIMUR KALABAHI','Flores','Flores Timur','Lipa RT 19 RW 07 Kel. Kalabahi Tengah Kec. Teluk Mutiara Kab. Alor','-8.213444444','124.531866'),
('13','NewSite-Kupang382','2710380','TENGAH KALABAHI','Flores','Flores Timur','Jalan Sawah Lama RT 02 RW 01 Desa Lendola Kecamatan Teluk Mutiara Kab. Alor NTT','-8.210142','124.524622'),
('13','NewSite-Kupang432','2710422','KALABAHI TELUK MUTIARA','Flores','Flores Timur','Tombang, RT008/RW003,Kel. Kalabahi Tengah, Kec. Teluk Mutiara, Kab. Alor','-8.20966','124.535788'),
('13','NewSite-Kupang101','2710099','KALABAHI BARAT','Flores','Flores Timur','Jl. Slamet Riyadi KAI 063 RT1/RW1 Kel.Leai Barat Kec.Teluk Mutiara Kab.Alor Prov.NTTKab. Alor Prov. NTT','-8.22799','124.496'),
('13','NewSite-Kupang110','2710108','MOTONGBANG','Flores','Flores Timur','Jl. Seroja RT 05/03, Desa. MotongbangKec. Teluk Mutiara','-8.21645','124.50939'),
('13','NewSite-Kupang115','2710113','KALABAHI KOTA MUTIARA','Flores','Flores Timur','Jl.Jendral Sudirman RT6/RW3 Kel.Werabua Kec.Teluk Mutiara Kab.Alor Prov.NTT','-8.21728','124.52301'),
('13','NewSite-Kupang335','2710333','ALOR BESAR ALOR BARAT LAUT','Flores','Flores Timur','Sebanjar RT 07 RW 03 Kelurahan Alor Besar Kecamatan Alor Barat Laut  Kab. Alor','-8.22865','124.39949'),
('13','NewSite-Kupang373','2710371','KALABAHI MUTIARA','Flores','Flores Timur','Jalan Kamboja Kelurahan Kalabahi Kota Kecamatan Teluk Mutiara ','-8.2137','124.51575'),
('13','NewSite-Kupang213','2710211','MORU ALOR','Flores','Flores Timur','K.P. RT 03 RW 02 Kelurahan Moru Kecamatan Alor Barat Daya Kabupaten Alor','-8.257944444','124.514611'),
('13','NewSite-Kupang29','2710027','3G_KOKAR PANTAR TIMUR','Flores','Flores Timur','Jl. Sultan Usman Berkat RT 01/01 Desa Ombay Kec Pantai Timur Kab. Alor NTT','-8.27437','124.30057'),
('13','NewSite-Kupang39','2710037','WELAE MUTIARA','Flores','Flores Timur','Mola Rt/Rw 011/005, Desa Welai Timur, Kec. Teluk Mutiara, Kab. Alor, Prop. NTTDesa Welai Timur, Kec. Teluk Mutiara, Kab. Alor, Prop. NTT','-8.20895','124.57'),
('13','NewSite-Kupang90','2710088','FANATING MUTIARA INDAH','Flores','Flores Timur','Jl. Ruilak Rwelai, RT.08 Rw.04 Kel. Welai Barat, Kec. Mutiara Barat Kab. Alor NTT','-8.23675','124.55563'),
('13','NewSite-Kupang35','2710033','3G_BALAURING MESURI','Flores','Flores Timur','RT010 RW005 Dusun Leutoher, desa Hingalamamengi, Kec. Omesuri, Kab. Lembata, Prov. NTT','-8.23017','123.74088'),
('13','NewSite-Kupang374','2710372','BENGKARI LEBATUKAN','Flores','Flores Timur','Jl. Bengkari Desa Lerahinga Kecamatan Lebatukan Kabupaten Lembata Nusa Tenggara Timur','-8.3853','123.568611111111'),
('13','NewSite-Kupang415','2710408','3G LEWOELENG LEMBATA','Flores','Flores Timur','Lewaoweleng RT 01 RW 01 Desa Lewaoweleng Kec. Lebatulang Kab. Lembata NTTDesa Lewoeleng, Kec. Lebatukang','-8.33347','123.62757'),
('13','NewSite-Kupang48','2710046','3G_LEMBATA BUYASARI','Flores','Flores Timur','Jalan Trans Wairiang, Dusun IV, Desa Kalikur, Kec. Buyasuri, Kab. Lembata, Prop. NTT','-8.17274','123.77129'),
('13','NewSite-Kupang51','2710049','LEWOLEBA TIMUR','Flores','Flores Timur','jl. trans lembata RT 17 RW 8 Desa Laranwutun Kec. Ile Ape Kab Lembata Desa Laranwutun, Kec. Ile Ape','-8.358','123.46308'),
('13','NewSite-Kupang375','2710373','LEWOLEBA NUBATKAN','Flores','Flores Timur','Kota Baru RT 014 RW.005 Kel/Desa Lewoleba Tengah Kec. Nubatukan Kab. Lembata NTT','-8.373306','123.421333'),
('13','NewSite-Kupang42','2710040','3G_LAMA ILEAPE TIMUR','Flores','Flores Timur','Jl. Trans ile ape timur RT 01 RW 01 Desa Baolali duli Kec. Ile ape timur Kab. Lembata NTTDesa Baolaliduli, Kec. Ile Ape Timur, Kab. Lembata, Prop. NTT','-8.24283','123.54338'),
('13','NewSite-Kupang428','2710418','LEWOLEBA LEMBATA','Flores','Flores Timur','Jalan Wolo Clause, Bluwa, Kel. Lewoleba Barat, Kec. Nubatukan, Kab. Lembata, Prop. NTT','-8.38099','123.40913'),
('13','NewSite-Kupang46','2710044','3G_BOTO NAGAWUTUNG','Flores','Flores Timur','jl trans wulandoni, desa Labalimut Kec. Nagawutung Kab. Lembata NTTDesa Labalimut, Kec. Nagawutung, Dusun Boto Tengah, Desa Labalimut, Kec. Nagawutung, Kab. Lembata, Prop. NTT','-8.50729','123.37532'),
('13','NewSite-Kupang88','2710086','BAOLANGU NUBATUKAN','Flores','Flores Timur','Jl. Lewoleba Rt. 11/Rw.03 Kel. Lewoleba Barat Kec. Nubatukan Kab. Lembata NTT','-8.36564','123.44302'),
('13','NewSite-Kupang218','2710216','WAEWERANG DATA','Flores','Flores Timur','RT 16 RW 006, Kel. Waiwerang Kota, Kec. Adonara Timur Kab. Flores Timur NTT','-8.38522','123.162'),
('13','NewSite-Kupang271','2710269','Lamawolo ADONARA TIMUR','Flores','Flores Timur','Dsn 03 RT 14 / RW 06 DESA LAMAWOLO KEC. ILEBOLENG KAB Flores Timur NTT','-8.38519','123.25078'),
('13','NewSite-Kupang287','2710285','Lamablawa ADONARA TIMUR','Flores','Flores Timur','Jln. Waiwuring Desa Koringbele Kecamatan Witihama Kab. Flores Timur NTT','-8.29901','123.2681'),
('13','NewSite-Kupang290','2710288','3G_Baobage ADONARA TIMUR','Flores','Flores Timur','RT. 07 RW. 03 Dusun 3 Desa Baubage Kecamatan Witihama Kabupaten Flores Timur','-8.27011','123.293'),
('13','NewSite-Kupang44','2710042','3G_MINGARLOLONG NAGAWUTUNG','Flores','Flores Timur','Tewaowutung RT 02 RW 01 Desa tewaowutung kec. nagawutung kab. lembata NTT Desa Tewaowutung, Kec. Nagawutung,','-8.5441','123.29504'),
('13','NewSite-Kupang14','2710012','3G_FLOTIM ULU MADO','Flores','Flores Timur','Jl. Waiwerang - Tobilota, Lingkungan.2, Desa Pandai Kec Wotan Ulumado Kab. Flores Timur','-8.4016','123.08835'),
('13','NewSite-Kupang166','2710164','HOMA ADONARA BARAT','Flores','Flores Timur','Jl. Duatukan, RT.004/RW.001, Kel. Waintukan, Kec.Adonara Barat, Kab. Flores Timur, Prov. NTT','-8.26357','123.11312'),
('13','NewSite-Kupang288','2710286','3G_KOLI ADONARA TIMUR','Flores','Flores Timur','Jln. LintasSagu Waewerang Dusun Tonuwore Desa Kolimasang Kec. Adonara Kab. Flores Timur NTT','-8.28388','123.1968'),
('13','NewSite-Kupang69','2710067','3G_NARA ADO','Flores','Flores Timur','Desa Sagu, Kec. Adonara, Prov. Nusa Tenggara Timur','-8.24992','123.2181'),
('13','NewSite-Kupang219','2710217','BOTUNG ADONARA','Flores','Flores Timur','Jl. Trans Adonara Desa Wureh Kec. Adonara Barat Kab. Flores Timur - NTT','-8.308333','123.040417'),
('13','NewSite-Kupang272','2710270','Lewoglaran SOLOR TIMUR','Flores','Flores Timur','Desa Lewograran Kecamatan Solor Selatan Kabupaten Flores Timur NTT','-8.47192','123.03131'),
('13','NewSite-Kupang36','2710034','LARANTUKA MANDIRI','Flores','Flores Timur','Jalan Poros Bawah PantaiI, Kel. Weri, Kec. Larantuka, Kab. Flores Timur, NTT','-8.3061','123.02036'),
('13','NewSite-Kupang376','2710374','LARANTUKAVISA','Flores','Flores Timur','Jln Basuki Rahmat  Kelurahan Puken Tobi Wangi Bau Kecamatan Larantuka Kab. Flores timur','-8.3277','123.0034'),
('13','NewSite-Kupang405','2710401','MENANGA SOLOR','Flores','Flores Timur','Dsn. Satu RT 01 RW 01 Desa Lewogeka Kecamatan Solor Timur Kab. Flores Timur NTT','-8.439163','123.079464'),
('13','NewSite-Kupang11','2710009','3G_SOLOR SELATAN','Flores','Flores Timur','Jl.Nusa Dani Kalike, RT.04 / RW.02, Dusun.01, Ds.Suleng Waseng, Kec.Solor Selatan, Kab.Flores Timur.','-8.50834','122.97463'),
('13','NewSite-Kupang275','2710273','Pamakayo SOLOR BARAT','Flores','Flores Timur','Dsn. Subanrian RT 01 RW 01 Ds. Pamakayo Kec. Solor Barat Kab. Flores Timur ','-8.43492','122.9950556'),
('13','NewSite-Kupang433','2710423','BALELA LARANTUKA FLORES','Flores','Flores Timur','Jl. Amagarapati, RT 017/06, kel Amagarapati, kec. LarantukaKel. AmagarapatiKec. Larantuka','-8.33238','122.99435'),
('13','NewSite-Kupang62','2710060','3G_LARANTUKA ILE MANDIRI','Flores','Flores Timur','Waimana I, RT 010/RW III, Dusun III, Desa Watatutu, Kec. Ile Mandiri, Prov. Nusa Tenggara Timur','-8.24845','122.98145'),
('13','NewSite-Kupang12','2710010','3G_SOLOR BARAT','Flores','Flores Timur','Jl.Ritaebang - Daniwato, RT.01 / RW.01, Dusun I, Desa Nusadani, Kecamatan Solor Barat, Kabupaten Flo','-8.49724','122.94894'),
('13','NewSite-Kupang13','2710011','3G_SOLOR RABARAT','Flores','Flores Timur','Jl. Riang Sungai-Nusa Dani Rt 02/02 Dusun Auglaran Kel Ritaebang Kec Solor Barat','-8.53493','122.88293'),
('13','NewSite-Kupang358','2710356','Balela Larantuka','Flores','Flores Timur','RT. 002/004 Kelurahan Balela Kecamatan Larantuka Kab. Flores Timur - NTT','-8.34265','122.979083'),
('13','NewSite-Kupang40','2710038','LEWOLERE TNT','Flores','Flores Timur','Jalan.Latsitarda/Kusuma RT 011/RW 006 , Kel. Waibalun ,Kec. Larantuka ,Kab. Flores Timur , Prov. Nusa Tenggara Timur.','-8.34193','122.95293'),
('13','NewSite-Kupang41','2710039','3G_ILE MANDIRIT','Flores','Flores Timur','Desa riangkemie RT 009/RW 003 kec.ilemandiri,kab.Flores timur, Prop Nusa Tenggara Timur.','-8.28622','122.94907'),
('13','NewSite-Kupang28','2710026','3G_FLOTIM SILA TITEHENA','Flores','Flores Timur','Jl. Jebarus ( Kampung Kanada ) Dusun I RT 002 RW 001 Desa Kobasoma Kec. Titehena Kab. Flores Timur P','-8.42976','122.77152'),
('13','NewSite-Kupang57','2710055','3G_RIONGKOTEK LARANTUKA','Flores','Flores Timur','Jl. raya Trans Flores, Kel. Mokantarak, Kec. Larantuka, Kab. Flores Timur, Prov. NTTKec. Larantuka.','-8.33694','122.91115'),
('13','NewSite-Kupang67','2710065','3G_PEPAKELU WULANGGITANG','Flores','Flores Timur','RT 014 RW 003 Dusun C Desa Hewa kabupaten flores timur kecamatan wulanggitang prov nusa tenggara','-8.59718','122.71024'),
('13','NewSite-Kupang68','2710066','3G_PEPAKELU DEMON PAGONG','Flores','Flores Timur','RT/RW 001 Dusun Lega Wolo desa watolika ile demon Dagong Kab Flores NTT','-8.40467','122.85265'),
('13','NewSite-Kupang27','2710025','3G_TALIBURA WAIGETE','Flores','Flores Timur','Dusun Wodong, Desa Wairterang, Kec. Waigete,Kab Sikka','-8.60728','122.46562'),
('13','NewSite-Kupang299','2710297','kopong KEWAPANTE','Flores','Flores Timur','Jl.Nitakloang,Rt 004/002,Desa Kopong,Kec Kewapante','-8.66766','122.292'),
('13','NewSite-Kupang300','2710298','Geliting KEWAPANTE','Flores','Flores Timur','Jl.Nawangkewa,Rt 003/002,Kel Nawangkewa,Kec Kewapante,Kab Sikka','-8.645888889','122.295'),
('13','NewSite-Kupang308','2710306','Habi Alok','Flores','Flores Timur','Jl.Lokaria RT 011 RW 004, Desa Habi,Kec.Kangae','-8.63474','122.24947'),
('13','NewSite-Kupang70','2710068','3G_MAUMERE  WAIGETE','Flores','Flores Timur','Dusun Lua Rt. 17 Rw. 08 Desa Hoder Kec. Waigete-Maumere','-8.61606','122.3731'),
('13','NewSite-Kupang162','2710160','UNENG INDAH','Flores','Flores Timur','Jl. Wairklau, RT.004/007, Kel. Madawat, Kec. Alok, Kab. Sikka','-8.62684','122.2124'),
('13','NewSite-Kupang168','2710166','FRATERAN MAUMERE','Flores','Flores Timur','Jalan Don juang Rt 02 Rw 03 Kota Uneng Kab.Sikka Nusa Tenggara Timur','-8.61606','122.21404'),
('13','NewSite-Kupang220','2710218','MAUMERE DATA','Flores','Flores Timur','Jl. Dua Toru RT 005 RW 005 Kel. Beru Kec. Alok Timur','-8.631083','122.224389'),
('13','NewSite-Kupang365','2710363','Sikka Alok','Flores','Flores Timur','Jl.Patirangga, Rt 01 Rw 02 Kel Beru,Kec Alok Timur,Kab Sikka,NTT','-8.62255','122.22281'),
('13','NewSite-Kupang434','2710424','Maumere Airport','Flores','Flores Timur','Jl. Jend. Sudirman, RT 020 RW 006, Kel. Waioti, Kec. Alok Timur, Kab. Sikka, NTT','-8.629667','122.238306'),
('13','NewSite-Kupang140','2710138','MALURIWU MAUMERE','Flores','Flores Tengah','Jl. Kolombeke RT/RW 011/004, Kel. Nangalimang, Kec. Alok, Kab. Sikka Nangalimang, Kec. Alok, Kab. SikkaNTT','-8.6449','122.20601'),
('13','NewSite-Kupang221','2710219','WORING ALOK','Flores','Flores Tengah','Jl.Diponegoro,Kelurahan Wolo Marang,Kecamatan Alok Barat,Kabupaten Maumere','-8.603718','122.197613'),
('13','NewSite-Kupang25','2710023','PERUMAUMERE ALOK','Flores','Flores Tengah','Jl. Koliaduk, Kel. Kutauneng, Kec. Alok, Kab. Sikka','-8.61438','122.202'),
('13','NewSite-Kupang393','2710391','WOLOMARANG JAYA','Flores','Flores Tengah','Jl.Wairklau RT.004 RW.008 kel.Madawat Kec.Alok Kab.Sikka - Prov.NTT','-8.62508','122.20789'),
('13','NewSite-Kupang430','2710420','UNENG ALOK SIKKA','Flores','Flores Tengah','Jl.Dusun Batarang,Rt 017/004,Kel Kota Baru,Kec Alok Timur,Kab Sikka,NTT','-8.63125','122.2141389'),
('13','NewSite-Kupang156','2710154','SMP KATOLIK BUNGA FATIMA KOTING','Flores','Flores Tengah','Jl. Depan Gereja Dusun Kode RT.01 RW.01Desa Nelle Wutung Kecamatan Nelle Kabupaten SIkkaDesa Nelle Wutung Kecamatan Nelle Kabupaten SIkka','-8.67895','122.21556'),
('13','NewSite-Kupang298','2710296','3G_Koting MAUMERE','Flores','Flores Tengah','Jl.Gehok Lau,Rt 017/006,Desa Koting D,Kec Koting,Kab Sikka','-8.69048','122.195'),
('13','NewSite-Kupang383','2710381','3G_PRAS PEMANA','Flores','Flores Tengah','Dusun Mawar, Rt004/002,desa pemana kec.alok kab.sikka NTT','-8.350675','122.321095'),
('13','NewSite-Kupang58','2710056','3G_NELLE LELA','Flores','Flores Tengah','Desa lusitada RT 02 Rt 07 desa lutitada kecamatan nita propinsi NTT','-8.69258','122.16072'),
('13','NewSite-Kupang114','2710112','PERUMNAS ENDE','Flores','Flores Tengah','Jl. Anggrek RT.022 RW.011 Kel. Mautapaga Kec. Ende Timur NTT','-8.84243','121.67'),
('13','NewSite-Kupang307','2710305','Bandara Ende','Flores','Flores Tengah','Jalan Kelimutu, Rt 20 / RW 07, Kel. Kelimutu, Kec. Ende Tengah, Kab. Ende, NTT','-8.84647222','121.65916667'),
('13','NewSite-Kupang330','2710328','Paupanda Ende Selatan','Flores','Flores Tengah','Biara ST. Konradus, Jl. Wirajaya RT 001 RW 007, Kel. Paupire, Kec. Ende Tengah,','-8.84024','121.659'),
('13','NewSite-Kupang337','2710335','3G_Wolotopo Timur NDONA','Flores','Flores Tengah','Ngalupolo, RT 03 / RW 03, Desa/Kel. Ngalupolo, Kec. NDONA','-8.87529','121.7365'),
('13','NewSite-Kupang357','2710355','Perumnas Ende 7','Flores','Flores Tengah','Jalan Dr. Prof. WZ Johanes, Rt 004 Rw 004, Kel. Paupire, Kec. Ende Tengah, Kab. Ende','-8.8342','121.66486'),
('13','NewSite-Kupang109','2710107','KEL. PAUPANDA 2','Flores','Flores Tengah','Jl.Udayana RT 014 RW 004 Desa Onekare Kec.Ende Tengah Kab.Ende Prov.NTT','-8.8349','121.648'),
('13','NewSite-Kupang113','2710111','GRAND WISATA ENDE','Flores','Flores Tengah','Jl. WR.Mongisidi RT.01 / RW.04 Kel. Tetandara, Kec. Ende Selatan, Ende, NTT','-8.85456','121.658'),
('13','NewSite-Kupang345','2710343','Pelabuhan Ende Selatan','Flores','Flores Tengah','Jl. Gajahmada, Link. Saraboro, RT 03 / RW 01, Kel. Rukun Lima, Kec. Ende Selatan, Kab. Ende, NTT','-8.85269','121.64467'),
('13','NewSite-Kupang377','2710375','ENDE TRI','Flores','Flores Tengah','Jl. Patimura, RT 003 RW 003, Kel, Potulando, Kec. Ende Tengah, Kab. Ende - NTT','-8.845667','121.649972'),
('13','NewSite-Kupang60','2710058','3G_UTARA ENDE','Flores','Flores Tengah','Jl. Woloare, RT.05/RW.03, Kel. Roworena, Kec. Ende Utara','-8.8244','121.64244'),
('13','NewSite-Kupang239','2710237','Raporendu NANGA PANDA','Flores','Flores Tengah','RT006/RW003 Dn. Basa Kotakori, Ds. Raporendu, Kec. Nanga Panda, Kab. Ende','-8.80563','121.52621'),
('13','NewSite-Kupang385','2710383','3G_Mauronga  Kab End','Flores','Flores Tengah','Penggajawa, Rt.001 / 001 Kelurahan Penggajawa, Kecamatan Nangapanda, Kab. ENDE','-8.79992','121.49665'),
('13','NewSite-Kupang52','2710050','3G_NANGA PANDA ','Flores','Flores Tengah','Jl.Warukasau Rt.001 Rw.001 Kel.Ndoru Rea Kec.Nangapanda, Kab.Ende Kec.Nangapanda Kab.Ende Prov.NTT','-8.79666','121.46836'),
('13','NewSite-Kupang66','2710064','3G_WOLOTOPO ENDE SELATAN','Flores','Flores Tengah','Jl.IkanPaus Rt 09 Rw 04 Kelurahan Tanjung Kec. Ende Selatan Kab.Ende Propinsi Nusa Tenggara Timur','-8.86542','121.63599'),
('13','NewSite-Kupang89','2710087','URONGA NANGAPANDA','Flores','Flores Tengah','Nanga Keo Desa Bheramari Kec,Nanga Panda Kab.ENDE Prov.NTT','-8.79757','121.56405'),
('13','NewSite-Kupang108','2710106','WOLOPOGO BOAWAE','Flores','Flores Tengah','RT 12 RW 05 Desa Nageoga Kec.Boawae Kab.Nagekeo Prov.NTT','-8.76124','121.18607'),
('13','NewSite-Kupang186','2710184','3G_SMPS PATIMURA WUDU','Flores','Flores Tengah','RT. 001. LINGKUNGAN. 01. KELURAHAN REGAKELURAHAN REGA, KECAMATAN BOAWAEKABUPATEN NAGEKEO, NUSA TENGGARA TIMURKELURAHAN REGA, KECAMATAN BOAWAEKABUPATEN NAGEKEO, NUSA TENGGARA TIMUR','-8.77341','121.20603'),
('13','NewSite-Kupang296','2710294','3G_Ratongamobo BOAWAE','Flores','Flores Tengah','RT 007 RW 002, Kel. Ratumangamobo, Kec Boawae, ','-8.7347','121.18667'),
('13','NewSite-Kupang378','2710376','KELINDORA NANGARORO','Flores','Flores Tengah','Desa Ulupulu , RT 05,/ RW- Kelurahan Ulupulu, Kecamatan Nangaroro, Kabupaten Nagekeo','-8.7402','121.323083333333'),
('13','NewSite-Kupang400','2710398','RATONGAMOBO','Flores','Flores Tengah','JL. ENDE BAJAWA RT. 15.KELURAHAN NAGEOGA, KECAMATAN BOAWAE, KABUPATEN NAGEKEO, NUSA TENGGARA TIMURKELURAHAN NAGEOGA, KECAMATAN BOAWAE, KABUPATEN NAGEKEO, NUSA TENGGARA TIMUR','-8.76173','121.176'),
('13','NewSite-Kupang211','2710209','NOGEOGA TNT','Flores','Flores Tengah','Natanage, RT 003 RW 001 Kelurahan Natanage, Kec.Boawae Kabupaten Nagekeo','-8.76683333','121.16694444'),
('13','NewSite-Kupang349','2710347','Nageoga Boawae','Flores','Flores Tengah','Bokodhi, Rt 002, Rw. 001, Kel. Nagesapadhi, Kec. Boawae, ','-8.75457','121.15904'),
('13','NewSite-Kupang65','2710063','3G_BOA WEA ','Flores','Flores Tengah','Jl.Lintas Ende Bajawa Rt03 Desa RowaKec.Boawae Kab.Nagekeo Propinsi Nusa Tenggara Timur','-8.7864','121.12782'),
('13','NewSite-Kupang98','2710096','NAGESAPADHI BOAWAE','Flores','Flores Tengah','RT04 RW03 Desa Rigi Kec.Boawae Kab.Nagekeo Prov.NTT','-8.76889','121.14599'),
('13','NewSite-Kupang164','2710162','LAPE MBAY','Flores','Flores Tengah','Danga, RT 018 Kel. Danga Kec. Aesesa Kab. Nagekeo','-8.56336','121.27187'),
('13','NewSite-Kupang238','2710236','3G_Kobaleba WEWARIA','Flores','Flores Tengah','Dn. 3 RT006/RW003, Ds. Kelitembu, Kec. Wewaria, Kab. Ende','-8.58317','121.60488'),
('13','NewSite-Kupang329','2710327','Mbay AESESASA','Flores','Flores Tengah','Mbay 1, Rt. 016, Kel. Mbay I, Kec. Aesesa, Kab. Nagekeo','-8.53495','121.27383'),
('13','NewSite-Kupang63','2710061','3G_MBAY AESESA','Flores','Flores Tengah','Rt07 Dusun 2 Desa Aeramo Kec. Aesesa Kab. Nagekeo Propinsi Nusa Tenggara Timur','-8.57516','121.32466'),
('13','NewSite-Kupang64','2710062','MBAY5 AESESA','Flores','Flores Tengah','JALAN LINGKUNGAN OLALAPR Rt 03 Rw 01 Kelurahan Lape Kec. Aesesa Kab. Nagekeo Propinsi Nusa Tenggara Timur','-8.57039','121.29311'),
('13','NewSite-Kupang270','2710268','Bukit Sasa  Wogomang','Flores','Flores Tengah','Kampung Dolupore Golo Sasa Desa Mataloko Kecamatan Golewa Kabupaten Ngada','-8.81622','121.05689'),
('13','NewSite-Kupang336','2710334','3G_Ndona MAUPONGO','Flores','Flores Tengah','Rt.004, Dusun Perintis, Jl. Trans Malanuza-Maumbawa, Desa Sadha, Kec. Golewa Selatan, Kab Ngada','-8.85285','121.10542'),
('13','NewSite-Kupang379','2710377','BAJAWA PRAS','Flores','Flores Tengah','RT 009 RW 004, Kel. Ngadukelu, Kec. Bajawa','-8.7876','120.976'),
('13','NewSite-Kupang404','2710403','MANGULEWA WOGOMANG','Flores','Flores Tengah','Desa Wolobobo, RT005/ RW 02, Kelurahan Borani, Kecamatan Bajawa, Kabupaten Ngada','-8.836314','120.983444'),
('13','NewSite-Kupang126','2710124','SUSU BAJWA','Flores','Flores Tengah','RT 02 RW 04 Desa Trikora Kec.Bajawa Kab.Ngada Prov.NTT','-8.78115','120.9669'),
('13','NewSite-Kupang143','2710141','DESA MANGERUDA BAJAWA','Flores','Flores Tengah','JL.TW Mangeruda RT 001 Desa INELIKA Kec . Bajawa Utara','-8.74035','120.99491'),
('13','NewSite-Kupang327','2710325','Bajawa NGADA BAWA','Flores','Flores Tengah','Waelengu RT 001 Kel. Naru Kec.Bajawaw','-8.77295','120.98835'),
('13','NewSite-Kupang435','2710425','UBEDOLUMOLO NGADA','Flores','Flores Tengah','Jl. Suprapto, Kel. Ngadukelu, Kec. Bajawa','-8.785944444','120.9852222'),
('13','NewSite-Kupang122','2710120','PERKANTORAN ENDE BORONG','Flores','Flores Tengah','Jl.Merpati/watuipu RT003/02 Kel.Kotandora Kec.Borong Kab.Manggarai Timur Prov.NTTKEC.BORONG, KAB.MANGGARAI TIMURNUSA TENGGARA TIMUR','-8.81968','120.61693'),
('13','NewSite-Kupang158','2710156','3G_SESO WAE','Flores','Flores Tengah','Dusun C RT. 09 Waepana Kec. Soa Kab. Ngada Prov. NTT','-8.69577','121.03664'),
('13','NewSite-Kupang326','2710324','TANAH RATA KOTAKOMBA','Flores','Flores Tengah','Kelurahan Tanah Rata Kecamatan Kotakomba Kab. Manggarai Timur ','-8.81071','120.66361'),
('13','NewSite-Kupang332','2710330','Lembur Manggarai MBORONG','Flores','Flores Tengah','Jl. Peot RT.04 RW.01 Kel. Satar Peot Kec. Borong Kab. Manggarai Timur','-8.78075','120.6198'),
('13','NewSite-Kupang422','2710409','Mborong Flores','Flores','Flores Tengah','Jl. Wae Reca RT.03 RW.02 Kel.Rana Loba Kec. Borong Kab. Manggarai Timur ','-8.81297222','120.607737'),
('13','NewSite-Kupang295','2710293','Golomongkok MBORONG','Flores','Flores Tengah','Dusun Arjuna Desa. Watu Mori Kec. Rana Mese Kab. Manggarai Timur','-8.7611944','120.5736667'),
('13','NewSite-Kupang328','2710326','Soa BAJAWA','Flores','Flores Tengah','Rt. 03, Dusun Tarawaja I, Desa Tarawali, Kec. Soa, Kab. Ngada','-8.7248','121.04206'),
('13','NewSite-Kupang333','2710331','Kampung Toka KECAMATAN BORONG','Flores','Flores Tengah','Jl. Jati Putih RT.001/001 Desa Golo Kantar Kec. Borong Kab. Manggarai Timur - NTT','-8.8036','120.58498'),
('13','NewSite-Kupang334','2710332','SITA MBORONG','Flores','Flores Tengah','Jl. Raya Trans Flores, Dusun Kaca RT 012 RW 006 Desa Sita, Kec. Rana Mese','-8.73333','120.57109');


ALTER TABLE `indottech_ba_ujiterima` ADD `site_id` INT NOT NULL AFTER `vendor`, ADD INDEX (`site_id`);
ALTER TABLE `indottech_ba_ujiterima` CHANGE `site_no` `site_name` VARCHAR(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;
ALTER TABLE `indottech_atd_cover` ADD `customer` VARCHAR(100) NOT NULL AFTER `project_name`;
ALTER TABLE `indottech_acceptance_test_rectifier` ADD `site_id` INT NOT NULL AFTER `customer`, ADD INDEX (`site_id`);
ALTER TABLE `indottech_acceptance_test_rectifier` CHANGE `rectifier_port1` `connected_ip` VARCHAR(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;
ALTER TABLE `indottech_acceptance_test_rectifier` CHANGE `rectifier_port2` `connected_port` VARCHAR(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;
ALTER TABLE `indottech_battery_discharge_photos` CHANGE `photo` `serialnumber` VARCHAR(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL;
ALTER TABLE `indottech_battery_discharge_photos` ADD `minute_at` INT NOT NULL AFTER `atd_id`, ADD INDEX (`minute_at`);
ALTER TABLE `indottech_battery_discharge_photos` ADD `voltmeter` VARCHAR(255) NOT NULL AFTER `serialnumber`;
ALTER TABLE `indottech_photos` ADD `photo_items_id` INT NOT NULL AFTER `atd_id`, ADD INDEX (`photo_items_id`);
ALTER TABLE `indottech_photos` ADD `filename` VARCHAR(255) NOT NULL AFTER `photo_title`;


INSERT INTO backoffice_menu (id,seqno,parent_id,name,url) VALUES ('121','2', '96','ATP Installation','atd_cover_list.php');
INSERT INTO backoffice_menu_privileges (group_id,backoffice_menu_id,privilege) VALUES
(11,121,1),
(12,121,1),
(13,121,1),
(14,121,1),
(15,121,1),
(16,121,1),
(17,121,1),
(18,121,1),
(11,96,1),
(12,96,1),
(13,96,1),
(14,96,1),
(15,96,1),
(16,96,1),
(17,96,1),
(18,96,1);

--================================2018-08-09==========================
DROP TABLE IF EXISTS indottech_sow;
CREATE TABLE indottech_sow (
	id int NOT NULL auto_increment,
	name varchar(100) NOT NULL,
	created_at datetime DEFAULT NULL,
	created_by varchar(100) NOT NULL,
	created_ip varchar(20) DEFAULT NULL,
	updated_at datetime DEFAULT NULL,
	updated_by varchar(100) NOT NULL,
	updated_ip varchar(20) DEFAULT NULL,
	xtimestamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (id)
);
INSERT INTO indottech_sow (id,name) VALUES 
(NULL,'Add 2100'),
(NULL,'Add LTE 15 MHz'),
(NULL,'Add U900'),
(NULL,'New LTE 15 MHz'),
(NULL,'New LTE 15 MHz + Add U900'),
(NULL,'NEW SITE'),
(NULL,'New Site G/U900 & L1800'),
(NULL,'paket Abis'),
(NULL,'UG BW 15 MHz');

DROP TABLE IF EXISTS indottech_sow_detail;
CREATE TABLE indottech_sow_detail (
	id int NOT NULL auto_increment,
	name varchar(100) NOT NULL,
	created_at datetime DEFAULT NULL,
	created_by varchar(100) NOT NULL,
	created_ip varchar(20) DEFAULT NULL,
	updated_at datetime DEFAULT NULL,
	updated_by varchar(100) NOT NULL,
	updated_ip varchar(20) DEFAULT NULL,
	xtimestamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (id)
);
INSERT INTO indottech_sow_detail (id,name) VALUES 
(NULL,'Assignment Take Over'),
(NULL,'Installation Only'),
(NULL,'Need Confirm Nokia'),
(NULL,'Survey + Installasi'),
(NULL,'Survey + Installasi + cross connect TDM'),
(NULL,'Survey + Installasi + Dismantle'),
(NULL,'Survey Only');

DROP TABLE IF EXISTS indottech_project_types;
CREATE TABLE indottech_project_types (
	id int NOT NULL auto_increment,
	name varchar(100) NOT NULL,
	created_at datetime DEFAULT NULL,
	created_by varchar(100) NOT NULL,
	created_ip varchar(20) DEFAULT NULL,
	updated_at datetime DEFAULT NULL,
	updated_by varchar(100) NOT NULL,
	updated_ip varchar(20) DEFAULT NULL,
	xtimestamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (id)
);
INSERT INTO indottech_project_types (id,name) VALUES 
(NULL,'New site'),
(NULL,'Overlay Capacity'),
(NULL,'Overlay IBS'),
(NULL,'Overlay RED'),
(NULL,'Overlay yellow');

DROP TABLE IF EXISTS indottech_milestone_categories;
CREATE TABLE indottech_milestone_categories (
	id int NOT NULL auto_increment,
	name varchar(100) NOT NULL,
	created_at datetime DEFAULT NULL,
	created_by varchar(100) NOT NULL,
	created_ip varchar(20) DEFAULT NULL,
	updated_at datetime DEFAULT NULL,
	updated_by varchar(100) NOT NULL,
	updated_ip varchar(20) DEFAULT NULL,
	xtimestamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (id)
);
INSERT INTO indottech_milestone_categories (id,name) VALUES (NULL,'Pre Implementation'),(NULL,'Implementation'),(NULL,'Dismantle'),(NULL,'ATP'),(NULL,'WCC');

DROP TABLE IF EXISTS indottech_milestones_valuetypes;
CREATE TABLE indottech_milestones_valuetypes (
	id int NOT NULL auto_increment,
	name varchar(100) NOT NULL,
	created_at datetime DEFAULT NULL,
	created_by varchar(100) NOT NULL,
	created_ip varchar(20) DEFAULT NULL,
	updated_at datetime DEFAULT NULL,
	updated_by varchar(100) NOT NULL,
	updated_ip varchar(20) DEFAULT NULL,
	xtimestamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (id)
);
INSERT INTO indottech_milestones_valuetypes (id,name) VALUES (1,'Date'),(2,'Free Text'),(3,'Select'),(4,'Trigger');

DROP TABLE IF EXISTS indottech_programs;
CREATE TABLE indottech_programs (
	id int NOT NULL auto_increment,
	name varchar(255) NOT NULL,
	created_at datetime DEFAULT NULL,
	created_by varchar(100) NOT NULL,
	created_ip varchar(20) DEFAULT NULL,
	updated_at datetime DEFAULT NULL,
	updated_by varchar(100) NOT NULL,
	updated_ip varchar(20) DEFAULT NULL,
	xtimestamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (id)
);
INSERT INTO indottech_programs (id,name) VALUES 
(NULL,'Change Transport + Packet abis / No Program / No Program / No Program / No Program'),
(NULL,'G900/U900 (333/111)'),
(NULL,'G900/U900/L1800 15 Mhz 4x4 MIMO/L2100 5 Mhz'),
(NULL,'Modernization G900 / No Program / No Program / New U900 / No Porgram'),
(NULL,'Modernization GSM / No Program / No Program / New U900 / New L1800 15 Mhz'),
(NULL,'Modernization GSM + Packet Abis / No Program / No Program / New U900 / New L1800 15 Mhz'),
(NULL,'Modernization GSM + Packet abis / No Program / No Program / New U900 / No Program'),
(NULL,'Modernization RRU + Downgrade TRX / Modernization DCS + Downgrade TRX / No Program / New U900 / New L1800 15 mhz'),
(NULL,'Modernization RRU + Downgrade TRX / No Program / No Program / New U900 / New L1800 15 Mhz'),
(NULL,'Modernization RRU / Modernization RRU / No Program / New U900 / New L1800 15 Mhz'),
(NULL,'Modernization RRU / No Program / No Program / New U900 / New L1800 15 Mhz'),
(NULL,'Modernization RRU / No Program / No Program / New U900 / No Program'),
(NULL,'Modernization RRU + Packet Abis / No Program / No Program / New U900 / New L1800 15 Mhz'),
(NULL,'New G900/-/-/New U900/-'),
(NULL,'New G900/-/-/New U900/New L1800 15 Mhz 4x4 MIMO/New L2100 5 Mhz'),
(NULL,'New G900 / No Program / New U2100 / New U900 / New L1800 15 Mhz'),
(NULL,'New G900 / No Program / No Program / New U900 / New L1800 15 Mhz 4x4 MIMO / New L2100 5 Mhz'),
(NULL,'New G900 / No Program / No Program / New U900 / No Program'),
(NULL,'New Site G/U900 & L1800'),
(NULL,'No Program / Modernization DCS & Downgrade TRX / No Program / No Program / New L1800 15 Mhz'),
(NULL,'No Program / Modernization DCS / No Program / No Program / New L1800 15 Mhz'),
(NULL,'No Program / Modernization DCS / No Program / No Program / Upgrade L1800 15 Mhz'),
(NULL,'No Program / No Program / No Program / No Program / New L1800 15 Mhz'),
(NULL,'No Program / No Program / No Program / No Program / upgrade L1800 to 15 Mhz'),
(NULL,'No Program / Split BCF / No Program / No Program / New L1800 15 Mhz'),
(NULL,'Out doorization + Downgrade TRX / No Program / No Program / New U900 / New L1800 15 Mhz'),
(NULL,'Outdoorization / No Program / No Program / New U900 / No Program'),
(NULL,'Packet Abis / Modernization DCS + Packet Abis / No Program / No Program / New L1800 15 Mhz'),
(NULL,'Packet Abis / No Program / New U2100 / No Program / No Program'),
(NULL,'Packet Abis / No Program / No Program / New U900 / No Program'),
(NULL,'Packet Abis / No Program / No Program / No Program / New L1800 15 Mhz'),
(NULL,'Packet Abis / No Program / No Program / No Program / No Program'),
(NULL,'Packet Abis / Packet Abis / No Program / No Program / New L1800 15 Mhz'),
(NULL,'Packet Abis / Packet Abis / No Program / No Program / upgrade L1800 to 15 Mhz'),
(NULL,'Packet Abis / Split BCF + Packet Abis / No Program / No Program / New L1800 15 Mhz');

DROP TABLE IF EXISTS indottech_project_milestones;
CREATE TABLE indottech_project_milestones (
	id int NOT NULL auto_increment,
	program_id int NOT NULL,
	sow_id int NOT NULL,
	sow_detail_id int NOT NULL,
	need_survey int NOT NULL,
	project_type_id int NOT NULL,
	site_id int NOT NULL,
	created_at datetime DEFAULT NULL,
	created_by varchar(100) NOT NULL,
	created_ip varchar(20) DEFAULT NULL,
	updated_at datetime DEFAULT NULL,
	updated_by varchar(100) NOT NULL,
	updated_ip varchar(20) DEFAULT NULL,
	xtimestamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (id),
	INDEX (program_id),
	INDEX (sow_id),
	INDEX (sow_detail_id),
	INDEX (project_type_id),
	INDEX (site_id)
);

DROP TABLE IF EXISTS indottech_project_milestone_details;
CREATE TABLE indottech_project_milestone_details (
	id int NOT NULL auto_increment,
	project_milestone_id int NOT NULL,
	milestone_category_id int NOT NULL,
	parent_id int NOT NULL,
	name varchar(100) NOT NULL,
	estimation_done_at date NOT NULL,
	percentage double NOT NULL,
	valuetype_ids varchar(100) NOT NULL,
	datevalues date NOT NULL,
	textvalues varchar(100) NOT NULL,
	created_at datetime DEFAULT NULL,
	created_by varchar(100) NOT NULL,
	created_ip varchar(20) DEFAULT NULL,
	updated_at datetime DEFAULT NULL,
	updated_by varchar(100) NOT NULL,
	updated_ip varchar(20) DEFAULT NULL,
	xtimestamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (id),
	INDEX (project_milestone_id),
	INDEX (milestone_category_id),
	INDEX (parent_id),
	INDEX (valuetype_ids),
	INDEX (datevalues),
	INDEX (textvalues)
);

DROP TABLE IF EXISTS indottech_acceptance_certificate;
CREATE TABLE indottech_acceptance_certificate (
	id int NOT NULL auto_increment,
	atd_id int NOT NULL,
	entry_at date NOT NULL,
	po_number varchar(100) NOT NULL,
	site_id int NOT NULL,
	site_code varchar(20) NOT NULL,
	site_name varchar(100) NOT NULL,
	site_address text NOT NULL,
	site_longitude varchar(20) NOT NULL,
	site_latitude varchar(20) NOT NULL,
	worktype_ids varchar(100) NOT NULL,
	sitetype_ids varchar(100) NOT NULL,
	system_module_ids varchar(100) NOT NULL,
	rf_module_ids varchar(100) NOT NULL,
	configuration_ids varchar(100) NOT NULL,
	number_of_system_modul int NOT NULL,
	number_of_rf int NOT NULL,
	number_of_antenna int NOT NULL,
	installation_at date NOT NULL,
	self_assessment_at date NOT NULL,
	onair_at date NOT NULL,
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


DELETE FROM backoffice_menu WHERE id = '122';
INSERT INTO backoffice_menu (id,seqno,parent_id,name,url) VALUES ('122','1', '6','Projects','project_milestones_list.php');

--================================2018-08-10==========================
DELETE FROM indottech_photo_items WHERE project_id='13';
INSERT INTO indottech_photo_items (id,parent_id,itemtype,beforeafter,is_childest,project_id,doctype,seqno,name) VALUES
(894,0,11,0,1,13,'rectifier',1,'Drawing Tower Layout'),
(895,0,11,0,1,13,'rectifier',2,'Drawing Site Layout'),
(896,0,11,0,1,13,'rectifier',3,'Rectifier Open'),
(897,0,11,0,1,13,'rectifier',4,'Rectifier Closed'),
(898,0,11,0,1,13,'rectifier',5,'AC Input Rectifier'),
(899,0,11,0,1,13,'rectifier',6,'MCB Output Rectifier'),
(900,0,11,0,1,13,'rectifier',7,'Rectifier Module'),
(919,0,11,0,1,13,'rectifier',8,'Battery'),
(901,0,11,0,1,13,'rectifier',9,'L1 L2 L3 Alarm/Relay'),
(902,0,11,0,1,13,'rectifier',10,'Rectifier Alarm'),
(903,0,11,0,1,13,'rectifier',11,'Genset'),
(904,0,11,0,1,13,'rectifier',12,'Site All'),
(905,0,11,0,1,13,'rectifier',13,'KWH Panel'),
(906,0,11,0,1,13,'rectifier',14,'ACPDB/COS'),
(907,0,11,0,1,13,'rectifier',15,'Display Rectifier On AC Power'),
(908,0,11,0,1,13,'rectifier',16,'Display Rectifier On Backup Batt'),
(909,0,11,0,1,13,'rectifier',17,'Display Active Alarm'),
(910,0,11,0,1,13,'rectifier',18,'Power Cable Installation'),
(911,0,11,0,1,13,'rectifier',19,'Grounding Rectifier'),
(912,0,11,0,1,13,'rectifier',20,'Network Configuration'),
(913,0,11,0,1,13,'rectifier',21,'Label Network Configuration'),
(914,0,11,0,1,13,'rectifier',22,'Test Network Configuration (Ping Test)'),
(915,0,11,0,1,13,'rectifier',23,'KWH Before'),
(916,0,11,0,1,13,'rectifier',24,'KWH After Outdoorize'),
(917,0,11,0,1,13,'rectifier',25,'Map Location'),
(918,0,11,0,1,13,'rectifier',26,'Location Picture');

ALTER TABLE `indottech_acceptance_test_rectifier` ADD `ac_input_frequency` DOUBLE NOT NULL AFTER `ac_input_phase`;