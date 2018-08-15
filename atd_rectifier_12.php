<?php
	$arr1 = array();
	array_push($arr1,"{host}");
	array_push($arr1,"{indottech_photos.kwh_before}");
	array_push($arr1,"{indottech_photos.kwh_after}");
	
	
	$arr2 = array();
	array_push($arr2,"localhost");
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "915"]));
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "916"]));
	
	echo str_replace($arr1,$arr2,read_file("htmls/rectifier_12.html"));
?>