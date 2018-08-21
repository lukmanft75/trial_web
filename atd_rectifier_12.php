<?php
	$arr1 = array();
	array_push($arr1,"{host}");
	array_push($arr1,"{indottech_photos.915}");
	array_push($arr1,"{indottech_photos.916}");

	$indottech_photos_915 = "";
	$photos_915 = $db->fetch_all_data("indottech_photos",["filename"],"atd_id = '".$_GET["id"]."' AND photo_items_id = '915' ORDER BY seqno");
	foreach($photos_915 as $photo_915){
		$indottech_photos_915 .= "<img height='170' width='170' src='http://localhost/indottech/geophoto/".$photo_915["filename"]."'>&nbsp;";
	}
	$indottech_photos_916 = "";
	$photos_916 = $db->fetch_all_data("indottech_photos",["filename"],"atd_id = '".$_GET["id"]."' AND photo_items_id = '916' ORDER BY seqno");
	foreach($photos_916 as $photo_916){
		$indottech_photos_916 .= "<img height='170' width='170' src='http://localhost/indottech/geophoto/".$photo_916["filename"]."'>&nbsp;";
	}
	
	$arr2 = array();
	array_push($arr2,"103.253.113.201");
	array_push($arr2,$indottech_photos_915);
	array_push($arr2,$indottech_photos_916);
	
	echo str_replace($arr1,$arr2,read_file("htmls/rectifier_12.html"));
?>