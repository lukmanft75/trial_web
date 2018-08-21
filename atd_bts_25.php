<?php
	include_once "common.php";
	$arr1 = array();
	array_push($arr1,"{host}");
	array_push($arr1,"{bts_25.3352}");
	array_push($arr1,"{bts_25.3353}");

	$arr2 = array();
	array_push($arr2,"103.253.112.201");
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "947"]));
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "948"]));

	echo str_replace($arr1,$arr2,read_file("htmls_bts/bts_25.html"));
?>