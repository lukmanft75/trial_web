<?php
	include_once "common.php";
	$arr1 = array();
	array_push($arr1,"{host}");
	array_push($arr1,"{bts_28.362}");

	
	$fullcontent = read_file("htmls_bts/bts_28.html");
	$temp_html = explode("<!--Photo363-->",$fullcontent);
	
	$innercontent = "";
	$bts_sran_28s = $db->fetch_all_data("indottech_photos",[],["atd_id" => $_GET["id"],"photo_items_id" => "954"]);
		foreach($bts_sran_28s as $no => $bts_sran_28){
			$_arr1 = array();
			$_arr2 = array();
			array_push($_arr1,"{bts_28.363}");

			array_push($_arr2,$bts_sran_28s["filename"]);
			$innercontent .= str_replace($_arr1,$_arr2,$temp_html[1]);
		}
	$fullcontent = $temp_html[0].$innercontent.$temp_html[2];
	
	$arr2 = array();
	array_push($arr2,"localhost");
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "953"]));

	echo str_replace($arr1,$arr2,$fullcontent);
?>