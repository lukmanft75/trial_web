<?php
	include_once "common.php";
	$arr1 = array();
	array_push($arr1,"{host}");
	array_push($arr1,"{indottech_photos.photo_site}");

	$arr2 = array();

	array_push($arr2,"localhost");
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "895"]));
	
	echo str_replace($arr1,$arr2,read_file("htmls/rectifier_4.html"));
?>