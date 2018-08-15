<?php

	$arr1 = array();
	array_push($arr1,"{host}");
	array_push($arr1,"{indottech_photos.map_location}");
	array_push($arr1,"{indottech_photos.cordinate}");
	
	
	$arr2 = array();
	array_push($arr2,"localhost");
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "917"]));
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "918"]));
	
	echo str_replace($arr1,$arr2,read_file("htmls/rectifier_13.html"));
?>