<?php
	include_once "common.php";
	$arr1 = array();
	array_push($arr1,"{host}");
	array_push($arr1,"{bts_24.3343}");
	array_push($arr1,"{bts_24.3351}");

	$arr2 = array();
	array_push($arr2,"103.253.113.201");
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "945"]));
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "946"]));

	echo str_replace($arr1,$arr2,read_file("htmls_bts/bts_24.html"));
?>