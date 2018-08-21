<?php
	include_once "common.php";
	$arr1 = array();
	array_push($arr1,"{host}");
	array_push($arr1,"{bts_32.431}");
	array_push($arr1,"{bts_32.432}");
	array_push($arr1,"{bts_32.433}");
	array_push($arr1,"{bts_32.434}");
	array_push($arr1,"{bts_31.site_name}");

	$arr2 = array();
	array_push($arr2,"103.253.113.201");
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "958"]));
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "959"]));
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "960"]));
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "960"]));
	array_push($arr2,$db->fetch_single_data("indottech_acceptance_certificate","site_name","atd_id = '".$_GET["id"]."'"));

	echo str_replace($arr1,$arr2,read_file("htmls_bts/bts_32.html"));
?>