INSERT INTO groups (id,name) VALUES ('11','Leader Indottech');
INSERT INTO groups (id,name) VALUES ('12','Team Indottech');
ALTER TABLE `indottech_group` ADD UNIQUE( `user_id`, `parent_user_id`);
INSERT INTO backoffice_menu (seqno,parent_id,name,url) VALUES ('2','6','Geotagging Request','indottech_geotagging_req_list.php');
UPDATE backoffice_menu SET seqno='3' WHERE id='89';
UPDATE backoffice_menu SET seqno='4' WHERE id='67';
UPDATE backoffice_menu SET seqno='5' WHERE id='90';
INSERT INTO backoffice_menu_privileges (group_id,backoffice_menu_id,privilege) VALUES
(11,6,1),
(11,67,1),
(11,87,1),
(11,88,1),
(11,89,1),
(11,90,1),
(11,45,1),
(11,91,1),
(12,6,1),
(12,67,1),
(12,88,1),
(12,89,1),
(12,90,1);
