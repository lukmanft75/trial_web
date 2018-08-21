<?php
	include_once "common.php";
	$arr1 = array();
	array_push($arr1,"{host}");
	array_push($arr1,"{bts_27.352}");
	array_push($arr1,"{bts_27.361}");

	$arr2 = array();
	array_push($arr2,"103.253.113.201");
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "951"]));
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "952"]));

	echo str_replace($arr1,$arr2,read_file("htmls_bts/bts_27.html"));
?>