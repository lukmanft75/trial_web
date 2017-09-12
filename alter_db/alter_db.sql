UPDATE `backoffice_menu` SET name='Indottech' WHERE id='6';
INSERT INTO backoffice_menu (seqno,parent_id,name,url) VALUES ('0','6','Team','indottech_teams_list.php');
INSERT INTO backoffice_menu (seqno,parent_id,name,url) VALUES ('1','6','Geotagging','indottech_geotagging_list.php');
INSERT INTO backoffice_menu (seqno,parent_id,name,url) VALUES ('2','6','Candidate','indottech_candidate_list.php');
UPDATE `backoffice_menu` SET seqno='3' WHERE id='67';
INSERT INTO backoffice_menu (seqno,parent_id,name,url) VALUES ('4','6','PRF','prf_list.php');