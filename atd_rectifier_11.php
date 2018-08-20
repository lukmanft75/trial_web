<?php
	$arr1 = array();
	array_push($arr1,"{host}");
	array_push($arr1,"{indottech_photos.907}");
	array_push($arr1,"{indottech_photos.908}");
	array_push($arr1,"{indottech_photos.909}");
	array_push($arr1,"{indottech_photos.910}");
	array_push($arr1,"{indottech_photos.911}");
	array_push($arr1,"{indottech_photos.912}");
	array_push($arr1,"{indottech_photos.913}");
	array_push($arr1,"{indottech_photos.914}");

	$indottech_photos_907 = "";
	$photos_907 = $db->fetch_all_data("indottech_photos",["filename"],"atd_id = '".$_GET["id"]."' AND photo_items_id = '907' ORDER BY seqno");
	foreach($photos_907 as $photo_907){
		$indottech_photos_907 .= "<img height='170' width='170' src='http://localhost/indottech/geophoto/".$photo_907["filename"]."'>&nbsp;";
	}
	$indottech_photos_908 = "";
	$photos_908 = $db->fetch_all_data("indottech_photos",["filename"],"atd_id = '".$_GET["id"]."' AND photo_items_id = '908' ORDER BY seqno");
	foreach($photos_908 as $photo_908){
		$indottech_photos_908 .= "<img height='170' width='170' src='http://localhost/indottech/geophoto/".$photo_908["filename"]."'>&nbsp;";
	}
	$indottech_photos_909 = "";
	$photos_909 = $db->fetch_all_data("indottech_photos",["filename"],"atd_id = '".$_GET["id"]."' AND photo_items_id = '909' ORDER BY seqno");
	foreach($photos_909 as $photo_909){
		$indottech_photos_909 .= "<img height='170' width='170' src='http://localhost/indottech/geophoto/".$photo_909["filename"]."'>&nbsp;";
	}
	$indottech_photos_910 = "";
	$photos_910 = $db->fetch_all_data("indottech_photos",["filename"],"atd_id = '".$_GET["id"]."' AND photo_items_id = '910' ORDER BY seqno");
	foreach($photos_910 as $photo_910){
		$indottech_photos_910 .= "<img height='170' width='170' src='http://localhost/indottech/geophoto/".$photo_910["filename"]."'>&nbsp;";
	}
	$indottech_photos_911 = "";
	$photos_911 = $db->fetch_all_data("indottech_photos",["filename"],"atd_id = '".$_GET["id"]."' AND photo_items_id = '911' ORDER BY seqno");
	foreach($photos_911 as $photo_911){
		$indottech_photos_911 .= "<img height='170' width='170' src='http://localhost/indottech/geophoto/".$photo_911["filename"]."'>&nbsp;";
	}
	$indottech_photos_912 = "";
	$photos_912 = $db->fetch_all_data("indottech_photos",["filename"],"atd_id = '".$_GET["id"]."' AND photo_items_id = '912' ORDER BY seqno");
	foreach($photos_912 as $photo_912){
		$indottech_photos_912 .= "<img height='170' width='170' src='http://localhost/indottech/geophoto/".$photo_912["filename"]."'>&nbsp;";
	}
	$indottech_photos_913 = "";
	$photos_913 = $db->fetch_all_data("indottech_photos",["filename"],"atd_id = '".$_GET["id"]."' AND photo_items_id = '913' ORDER BY seqno");
	foreach($photos_913 as $photo_913){
		$indottech_photos_913 .= "<img height='170' width='170' src='http://localhost/indottech/geophoto/".$photo_913["filename"]."'>&nbsp;";
	}
	$indottech_photos_914 = "";
	$photos_914 = $db->fetch_all_data("indottech_photos",["filename"],"atd_id = '".$_GET["id"]."' AND photo_items_id = '914' ORDER BY seqno");
	foreach($photos_914 as $photo_914){
		$indottech_photos_914 .= "<img height='170' width='170' src='http://localhost/indottech/geophoto/".$photo_914["filename"]."'>&nbsp;";
	}
	
	
	$arr2 = array();
	array_push($arr2,"localhost");
	array_push($arr2,$indottech_photos_907);
	array_push($arr2,$indottech_photos_908);
	array_push($arr2,$indottech_photos_909);
	array_push($arr2,$indottech_photos_910);
	array_push($arr2,$indottech_photos_911);
	array_push($arr2,$indottech_photos_912);
	array_push($arr2,$indottech_photos_913);
	array_push($arr2,$indottech_photos_914);
	
	echo str_replace($arr1,$arr2,read_file("htmls/rectifier_11.html"));
?>