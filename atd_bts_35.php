<?php
	include_once "common.php";
	$arr1 = array();
	array_push($arr1,"{host}");
	array_push($arr1,"{bts_35.461}");
	array_push($arr1,"{bts_35.462}");
	array_push($arr1,"{bts_35.463}");
	array_push($arr1,"{bts_35.464}");
	array_push($arr1,"{bts_35.site_name}");

	
	$arr2 = array();
	array_push($arr2,"103.253.112.201");
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "973"]));
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "974"]));
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "975"]));
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "976"]));
	array_push($arr2,$db->fetch_single_data("indottech_acceptance_certificate","site_name","atd_id = '".$_GET["id"]."'"));
	
	echo str_replace($arr1,$arr2,read_file("htmls_bts/bts_35.html"));
?>