<?php
	include_once "common.php";
	$arr1 = array();
	array_push($arr1,"{host}");
	array_push($arr1,"{bts_34.451}");
	array_push($arr1,"{bts_34.452}");
	array_push($arr1,"{bts_34.453}");
	array_push($arr1,"{bts_34.454}");
	array_push($arr1,"{bts_34.site_name}");

	
	$arr2 = array();
	array_push($arr2,"localhost");
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "968"]));
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "969"]));
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "970"]));
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "971"]));
	array_push($arr2,$db->fetch_single_data("indottech_acceptance_certificate","site_name","atd_id = '".$_GET["id"]."'"));

	echo str_replace($arr1,$arr2,read_file("htmls_bts/bts_34.html"));
?>