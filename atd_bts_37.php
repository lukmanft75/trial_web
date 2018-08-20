<?php
	include_once "common.php";
	$arr1 = array();
	array_push($arr1,"{host}");
	array_push($arr1,"{bts_37.50}");
	array_push($arr1,"{bts_37.pt_auta}");
	array_push($arr1,"{bts_37.xl}");

	
	$arr2 = array();
	array_push($arr2,"localhost");
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "984"]));
	array_push($arr2,$db->fetch_single_data("indottech_bts_sran_8","regional_manager_name","atd_id =" .$_GET["id"] ));
	array_push($arr2,$db->fetch_single_data("indottech_bts_sran_8","xl_representative_name","atd_id =" .$_GET["id"] ));

	echo str_replace($arr1,$arr2,read_file("htmls_bts/bts_37.html"));
?>