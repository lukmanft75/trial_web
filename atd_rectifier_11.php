<?php
	$arr1 = array();
	array_push($arr1,"{host}");
	array_push($arr1,"{indottech_photos.ac_power}");
	array_push($arr1,"{indottech_photos.backup_batt}");
	array_push($arr1,"{indottech_photos.active_alarm}");
	array_push($arr1,"{indottech_photos.cable_inst}");
	array_push($arr1,"{indottech_photos.grounding}");
	array_push($arr1,"{indottech_photos.net_config}");
	array_push($arr1,"{indottech_photos.label_network}");
	array_push($arr1,"{indottech_photos.ping_tes}");
	
	
	$arr2 = array();
	array_push($arr2,"localhost");
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "907"]));
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "908"]));
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "909"]));
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "910"]));
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "911"]));
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "912"]));
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "913"]));
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "914"]));
	
	echo str_replace($arr1,$arr2,read_file("htmls/rectifier_11.html"));
?>