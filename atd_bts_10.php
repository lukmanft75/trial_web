<?php
	include_once "common.php";
	$arr1 = array();
	array_push($arr1,"{host}");
	array_push($arr1,"{bts_10.cell_1}");
	array_push($arr1,"{bts_10.cell_2}");
	array_push($arr1,"{bts_10.cell_3}");
	array_push($arr1,"{bts_10.originating_1}");
	array_push($arr1,"{bts_10.originating_2}");
	array_push($arr1,"{bts_10.originating_3}");
	array_push($arr1,"{bts_10.terminating_1}");
	array_push($arr1,"{bts_10.terminating_2}");
	array_push($arr1,"{bts_10.terminating_3}");
	array_push($arr1,"{bts_10.open_1}");
	array_push($arr1,"{bts_10.open_2}");
	array_push($arr1,"{bts_10.open_3}");
	array_push($arr1,"{bts_10.lte_cell_1}");
	array_push($arr1,"{bts_10.lte_cell_2}");
	array_push($arr1,"{bts_10.lte_cell_3}");
	array_push($arr1,"{bts_10.network_a_1}");
	array_push($arr1,"{bts_10.network_a_2}");
	array_push($arr1,"{bts_10.network_a_3}");
	array_push($arr1,"{bts_10.network_d_1}");
	array_push($arr1,"{bts_10.network_d_2}");
	array_push($arr1,"{bts_10.network_d_3}");
	array_push($arr1,"{bts_10.dl_1}");
	array_push($arr1,"{bts_10.dl_2}");
	array_push($arr1,"{bts_10.dl_3}");
	array_push($arr1,"{bts_10.ul_1}");
	array_push($arr1,"{bts_10.ul_2}");
	array_push($arr1,"{bts_10.ul_3}");

	
	$bts_sran_2_3_2 = $db->fetch_all_data("indottech_bts_sran_2_3_2",[],"atd_id='".$_GET["id"]."'")[0];
	$bts_sran_2_3_3 = $db->fetch_all_data("indottech_bts_sran_2_3_3",[],"atd_id='".$_GET["id"]."'")[0];
	
	$arr2 = array();
	array_push($arr2,"103.253.112.201");
	array_push($arr2,$bts_sran_2_3_2["cell_id_no_1"]);
	array_push($arr2,$bts_sran_2_3_2["cell_id_no_2"]);
	array_push($arr2,$bts_sran_2_3_2["cell_id_no_3"]);
	array_push($arr2,$bts_sran_2_3_2["originating_call_1"]);
	array_push($arr2,$bts_sran_2_3_2["originating_call_2"]);
	array_push($arr2,$bts_sran_2_3_2["originating_call_3"]);
	array_push($arr2,$bts_sran_2_3_2["terminating_call_1"]);
	array_push($arr2,$bts_sran_2_3_2["terminating_call_2"]);
	array_push($arr2,$bts_sran_2_3_2["terminating_call_3"]);
	array_push($arr2,$bts_sran_2_3_2["open_browser_1"]);
	array_push($arr2,$bts_sran_2_3_2["open_browser_2"]);
	array_push($arr2,$bts_sran_2_3_2["open_browser_3"]);
	array_push($arr2,$bts_sran_2_3_3["cell_id_no_1"]);
	array_push($arr2,$bts_sran_2_3_3["cell_id_no_2"]);
	array_push($arr2,$bts_sran_2_3_3["cell_id_no_3"]);
	array_push($arr2,$bts_sran_2_3_3["network_attached_1"]);
	array_push($arr2,$bts_sran_2_3_3["network_attached_2"]);
	array_push($arr2,$bts_sran_2_3_3["network_attached_3"]);
	array_push($arr2,$bts_sran_2_3_3["network_detached_1"]);
	array_push($arr2,$bts_sran_2_3_3["network_detached_2"]);
	array_push($arr2,$bts_sran_2_3_3["network_detached_3"]);
	array_push($arr2,$bts_sran_2_3_3["dl_1"]);
	array_push($arr2,$bts_sran_2_3_3["dl_2"]);
	array_push($arr2,$bts_sran_2_3_3["dl_3"]);
	array_push($arr2,$bts_sran_2_3_3["ul_1"]);
	array_push($arr2,$bts_sran_2_3_3["ul_2"]);
	array_push($arr2,$bts_sran_2_3_3["ul_3"]);

	echo str_replace($arr1,$arr2,read_file("htmls_bts/bts_10.html"));
?>