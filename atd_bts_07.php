<?php
	include_once "common.php";
	$arr1 = array();
	array_push($arr1,"{host}");
	array_push($arr1,"{bts_07.uplane}");
    array_push($arr1,"{bts_07.cplane}");
	array_push($arr1,"{bts_07.mplane}");
	array_push($arr1,"{bts_07.splane}");
	array_push($arr1,"{bts_07.omusig}");
    array_push($arr1,"{bts_07.ethernet}");
	array_push($arr1,"{bts_07.user_plan}");
	array_push($arr1,"{bts_07.control_plane}");
    array_push($arr1,"{bts_07.management_plane}");
    array_push($arr1,"{bts_07.sync_plane}");
    array_push($arr1,"{bts_07.neighbour}");
    array_push($arr1,"{bts_07.ntp}");
    array_push($arr1,"{bts_07.timing}");
	array_push($arr1,"{bts_07.tower}");
	array_push($arr1,"{bts_07.bts_name}");
	array_push($arr1,"{bts_07.bts_profile}");
	array_push($arr1,"{bts_07.sbts}");
	array_push($arr1,"{bts_07.g900}");
	array_push($arr1,"{bts_07.g1800}");
	array_push($arr1,"{bts_07.3g1800}");
	array_push($arr1,"{bts_07.3g2100}");
	array_push($arr1,"{bts_07.lte}");
	array_push($arr1,"{bts_07.sw}");
	array_push($arr1,"{bts_07.bsc_name}");
	array_push($arr1,"{bts_07.bsc_id}");
	array_push($arr1,"{bts_07.rnc_name}");
	array_push($arr1,"{bts_07.rnc_id}");
	array_push($arr1,"{bts_07.mme_name}");
	array_push($arr1,"{bts_07.mme_id}");

	$bts_sran_2_2_1 = $db->fetch_all_data("indottech_bts_sran_2_2_1",[],"atd_id='".$_GET["id"]."'")[0];
	$bts_sran_2_2_2 = $db->fetch_all_data("indottech_bts_sran_2_2_2",[],"atd_id='".$_GET["id"]."'")[0];
	
	$arr2 = array();
	array_push($arr2,"localhost");
	array_push($arr2,$bts_sran_2_2_1["v1"]);
	array_push($arr2,$bts_sran_2_2_1["v2"]);
	array_push($arr2,$bts_sran_2_2_1["v3"]);
	array_push($arr2,$bts_sran_2_2_1["v4"]);
	array_push($arr2,$bts_sran_2_2_1["v5"]);
	array_push($arr2,$bts_sran_2_2_1["v6"]);
	array_push($arr2,$bts_sran_2_2_1["v7"]);
	array_push($arr2,$bts_sran_2_2_1["v8"]);
	array_push($arr2,$bts_sran_2_2_1["v9"]);
	array_push($arr2,$bts_sran_2_2_1["v10"]);
	array_push($arr2,$bts_sran_2_2_1["v11"]);
	array_push($arr2,$bts_sran_2_2_1["v12"]);
	array_push($arr2,$bts_sran_2_2_1["v13"]);
	array_push($arr2,$bts_sran_2_2_2["v1"]);
	array_push($arr2,$bts_sran_2_2_2["v2"]);
	array_push($arr2,$bts_sran_2_2_2["v3"]);
	array_push($arr2,$bts_sran_2_2_2["v4"]);
	array_push($arr2,$bts_sran_2_2_2["v5"]);
	array_push($arr2,$bts_sran_2_2_2["v6"]);
	array_push($arr2,$bts_sran_2_2_2["v7"]);
	array_push($arr2,$bts_sran_2_2_2["v8"]);
	array_push($arr2,$bts_sran_2_2_2["v9"]);
	array_push($arr2,$bts_sran_2_2_2["v10"]);
	array_push($arr2,$bts_sran_2_2_2["v11"]);
	array_push($arr2,$bts_sran_2_2_2["v12"]);
	array_push($arr2,$bts_sran_2_2_2["v13"]);
	array_push($arr2,$bts_sran_2_2_2["v14"]);
	array_push($arr2,$bts_sran_2_2_2["v15"]);
	array_push($arr2,$bts_sran_2_2_2["v16"]);

	echo str_replace($arr1,$arr2,read_file("htmls_bts/bts_07.html"));
?>