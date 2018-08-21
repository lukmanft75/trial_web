<?php
	include_once "common.php";
	$arr1 = array();
	array_push($arr1,"{host}");
	array_push($arr1,"{bts_33.441}");
	array_push($arr1,"{bts_33.442}");
	array_push($arr1,"{bts_33.443}");
	array_push($arr1,"{bts_33.444}");
	array_push($arr1,"{bts_33.site_name}");

	
	$arr2 = array();
	array_push($arr2,"103.253.113.201");
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "963"]));
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "964"]));
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "965"]));
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "966"]));
	array_push($arr2,$db->fetch_single_data("indottech_acceptance_certificate","site_name","atd_id = '".$_GET["id"]."'"));
	
	echo str_replace($arr1,$arr2,read_file("htmls_bts/bts_33.html"));
?>