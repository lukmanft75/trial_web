<?php
	include_once "common.php";
	$arr1 = array();
	array_push($arr1,"{host}");
	array_push($arr1,"{bts_09.2g_1}");
	array_push($arr1,"{bts_09.2g_2}");
	array_push($arr1,"{bts_09.2g_3}");
	array_push($arr1,"{bts_09.2g_4}");
	array_push($arr1,"{bts_09.2g_5}");
	array_push($arr1,"{bts_09.2g_6}");
	array_push($arr1,"{bts_09.2g_7}");
	array_push($arr1,"{bts_09.2g_8}");
	array_push($arr1,"{bts_09.2g_9}");
	array_push($arr1,"{bts_09.2g_10}");
	array_push($arr1,"{bts_09.2g_11}");
	array_push($arr1,"{bts_09.2g_12}");
	array_push($arr1,"{bts_09.2g_13}");
	array_push($arr1,"{bts_09.2g_14}");
	array_push($arr1,"{bts_09.2g_15}");
	array_push($arr1,"{bts_09.2g_16}");
	array_push($arr1,"{bts_09.2g_17}");
	array_push($arr1,"{bts_09.2g_18}");
	array_push($arr1,"{bts_09.2g_19}");
	array_push($arr1,"{bts_09.2g_20}");
	array_push($arr1,"{bts_09.2g_21}");
	array_push($arr1,"{bts_09.2g_22}");
	array_push($arr1,"{bts_09.2g_23}");
	array_push($arr1,"{bts_09.2g_24}");
	array_push($arr1,"{bts_09.3g_1}");
	array_push($arr1,"{bts_09.3g_2}");
	array_push($arr1,"{bts_09.3g_3}");
	array_push($arr1,"{bts_09.lte_1}");
	array_push($arr1,"{bts_09.lte_2}");
	array_push($arr1,"{bts_09.lte_3}");
	array_push($arr1,"{bts_09.cell_1}");
	array_push($arr1,"{bts_09.cell_2}");
	array_push($arr1,"{bts_09.cell_3}");
	array_push($arr1,"{bts_09.originating_1}");
	array_push($arr1,"{bts_09.originating_2}");
	array_push($arr1,"{bts_09.originating_3}");
	array_push($arr1,"{bts_09.terminating_1}");
	array_push($arr1,"{bts_09.terminating_2}");
	array_push($arr1,"{bts_09.terminating_3}");
	array_push($arr1,"{bts_09.open_1}");
	array_push($arr1,"{bts_09.open_2}");
	array_push($arr1,"{bts_09.open_3}");


	$bts_sran_2_2_5 = $db->fetch_all_data("indottech_bts_sran_2_2_5",[],"atd_id='".$_GET["id"]."'")[0];
	$bts_sran_2_3_1 = $db->fetch_all_data("indottech_bts_sran_2_3_1",[],"atd_id='".$_GET["id"]."'")[0];
	
	$arr2 = array();
	array_push($arr2,"103.253.113.201");
	array_push($arr2,$bts_sran_2_2_5["arfcn_1"]);
	array_push($arr2,$bts_sran_2_2_5["arfcn_2"]);
	array_push($arr2,$bts_sran_2_2_5["arfcn_3"]);
	array_push($arr2,$bts_sran_2_2_5["arfcn_4"]);
	array_push($arr2,$bts_sran_2_2_5["arfcn_5"]);
	array_push($arr2,$bts_sran_2_2_5["arfcn_6"]);
	array_push($arr2,$bts_sran_2_2_5["arfcn_7"]);
	array_push($arr2,$bts_sran_2_2_5["arfcn_8"]);
	array_push($arr2,$bts_sran_2_2_5["arfcn_9"]);
	array_push($arr2,$bts_sran_2_2_5["arfcn_10"]);
	array_push($arr2,$bts_sran_2_2_5["arfcn_11"]);
	array_push($arr2,$bts_sran_2_2_5["arfcn_12"]);
	array_push($arr2,$bts_sran_2_2_5["arfcn_13"]);
	array_push($arr2,$bts_sran_2_2_5["arfcn_14"]);
	array_push($arr2,$bts_sran_2_2_5["arfcn_15"]);
	array_push($arr2,$bts_sran_2_2_5["arfcn_16"]);
	array_push($arr2,$bts_sran_2_2_5["arfcn_17"]);
	array_push($arr2,$bts_sran_2_2_5["arfcn_18"]);
	array_push($arr2,$bts_sran_2_2_5["arfcn_19"]);
	array_push($arr2,$bts_sran_2_2_5["arfcn_20"]);
	array_push($arr2,$bts_sran_2_2_5["arfcn_21"]);
	array_push($arr2,$bts_sran_2_2_5["arfcn_22"]);
	array_push($arr2,$bts_sran_2_2_5["arfcn_23"]);
	array_push($arr2,$bts_sran_2_2_5["arfcn_24"]);
	array_push($arr2,$bts_sran_2_2_5["psc_1"]);
	array_push($arr2,$bts_sran_2_2_5["psc_2"]);
	array_push($arr2,$bts_sran_2_2_5["psc_3"]);
	array_push($arr2,$bts_sran_2_2_5["pci_1"]);
	array_push($arr2,$bts_sran_2_2_5["pci_2"]);
	array_push($arr2,$bts_sran_2_2_5["pci_3"]);
	array_push($arr2,$bts_sran_2_3_1["cell_id_no_1"]);
	array_push($arr2,$bts_sran_2_3_1["cell_id_no_2"]);
	array_push($arr2,$bts_sran_2_3_1["cell_id_no_3"]);
	array_push($arr2,$bts_sran_2_3_1["originating_call_1"]);
	array_push($arr2,$bts_sran_2_3_1["originating_call_2"]);
	array_push($arr2,$bts_sran_2_3_1["originating_call_3"]);
	array_push($arr2,$bts_sran_2_3_1["terminating_call_1"]);
	array_push($arr2,$bts_sran_2_3_1["terminating_call_2"]);
	array_push($arr2,$bts_sran_2_3_1["terminating_call_3"]);
	array_push($arr2,$bts_sran_2_3_1["open_browser_1"]);
	array_push($arr2,$bts_sran_2_3_1["open_browser_2"]);
	array_push($arr2,$bts_sran_2_3_1["open_browser_3"]);

	echo str_replace($arr1,$arr2,read_file("htmls_bts/bts_09.html"));
?>