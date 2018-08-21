<?php
	include_once "common.php";
	$arr1 = array();
	array_push($arr1,"{host}");
	array_push($arr1,"{bts_28.362}");
	array_push($arr1,"{bts_28.363}");

	
	$bts_28_363 = "";
	$photos_363 = $db->fetch_all_data("indottech_photos",["filename"],"atd_id = '".$_GET["id"]."' AND photo_items_id = '954' ORDER BY seqno");
	foreach($photos_363 as $photo_363){
		$bts_28_363 .= "<img style='position:relative' width='530' src='http://localhost/indottech/geophoto/".$photo_363["filename"]."'>&nbsp;&nbsp;";
	}
	
	
	$arr2 = array();
	array_push($arr2,"localhost");
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "953"]));
	array_push($arr2,$bts_28_363);

	echo str_replace($arr1,$arr2,read_file("htmls_bts/bts_28.html"));
?>