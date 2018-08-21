<?php
	include_once "common.php";
	$arr1 = array();
	array_push($arr1,"{host}");
	array_push($arr1,"{bts_36.471}");
	array_push($arr1,"{bts_36.472}");
	array_push($arr1,"{bts_36.473}");
	array_push($arr1,"{bts_36.474}");
	array_push($arr1,"{bts_36.475}");
	array_push($arr1,"{bts_36.476}");
	array_push($arr1,"{bts_36.site_name}");

	
	$arr2 = array();
	array_push($arr2,"103.253.113.201");
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "978"]));
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "979"]));
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "980"]));
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "981"]));
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "982"]));
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "983"]));
	array_push($arr2,$db->fetch_single_data("indottech_acceptance_certificate","site_name","atd_id = '".$_GET["id"]."'"));
	
	echo str_replace($arr1,$arr2,read_file("htmls_bts/bts_36.html"));
?>