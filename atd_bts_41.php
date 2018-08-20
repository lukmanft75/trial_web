<?php
	include_once "common.php";
	$arr1 = array();
	array_push($arr1,"{host}");
	array_push($arr1,"{bts_41.no_1}");
	array_push($arr1,"{bts_41.no_2}");
	array_push($arr1,"{bts_41.no_3}");
	array_push($arr1,"{bts_41.no_4}");
	array_push($arr1,"{bts_41.no_5}");
	array_push($arr1,"{bts_41.no_6}");
	array_push($arr1,"{bts_41.no_7}");

	// $val_1 = $db->fetch_single_data("indottech_bts_sran_9","history_at",["id" => $_GET["id"]]);
	// $val_1 = "tr";
	
	$arr2 = array();
	array_push($arr2,"localhost");
	for($no=0; $no<7; $no++){
		$val = $db->fetch_single_data("indottech_bts_sran_9","history_at",["atd_id" => $_GET["id"], "seqno" => $no]);
		array_push($arr2, format_tanggal($val));
		// echo $val;
	}

	echo str_replace($arr1,$arr2,read_file("htmls_bts/bts_41.html"));
?>