<?php
	include_once "common.php";
	$arr1 = array();
	array_push($arr1,"{host}");
	array_push($arr1,"{bts_08.type_1}");
	array_push($arr1,"{bts_08.type_2}");
	array_push($arr1,"{bts_08.remark}");
	array_push($arr1,"{bts_08.info}");
	array_push($arr1,"{bts_08.t2_1_ok}");
	array_push($arr1,"{bts_08.t2_1_nok}");
	array_push($arr1,"{bts_08.t2_2_ok}");
	array_push($arr1,"{bts_08.t2_2_nok}");
	array_push($arr1,"{bts_08.L1_ok}");
	array_push($arr1,"{bts_08.L1_nok}");
	array_push($arr1,"{bts_08.L2_ok}");
	array_push($arr1,"{bts_08.L2_nok}");
	array_push($arr1,"{bts_08.L3_ok}");
	array_push($arr1,"{bts_08.L3_nok}");
	array_push($arr1,"{bts_08.door_ok}");
	array_push($arr1,"{bts_08.door_nok}");
	array_push($arr1,"{bts_08.ac_ok}");
	array_push($arr1,"{bts_08.ac_nok}");
	array_push($arr1,"{bts_08.fence_ok}");
	array_push($arr1,"{bts_08.fence_nok}");
	array_push($arr1,"{bts_08.running_ok}");
	array_push($arr1,"{bts_08.running_nok}");
	array_push($arr1,"{bts_08.failure_ok}");
	array_push($arr1,"{bts_08.failure_nok}");
	array_push($arr1,"{bts_08.low_ok}");
	array_push($arr1,"{bts_08.low_nok}");
	array_push($arr1,"{bts_08.rectifier_ok}");
	array_push($arr1,"{bts_08.rectifier_nok}");
	array_push($arr1,"{bts_08.medium_ok}");
	array_push($arr1,"{bts_08.medium_nok}");
	array_push($arr1,"{bts_08.high_ok}");
	array_push($arr1,"{bts_08.high_nok}");
	array_push($arr1,"{bts_08.low_ok}");
	array_push($arr1,"{bts_08.low_nok}");
	array_push($arr1,"{bts_08.grounding_ok}");
	array_push($arr1,"{bts_08.grounding_nok}");
	array_push($arr1,"{bts_08.indoor_ok}");
	array_push($arr1,"{bts_08.indoor_nok}");

	$bts_sran_2_2_2_1 = $db->fetch_all_data("indottech_bts_sran_2_2_2_1",[],"atd_id='".$_GET["id"]."'")[0];
	$v_types=$bts_sran_2_2_2_1["v_type"];
	if ($v_types == "1"){
		$vtype_1 = "kotak_isi.jpg";
		$vtype_2 = "kotak_kosong.jpg";
		
	} else {
		$vtype_1 = "kotak_kosong.jpg";
		$vtype_2 = "kotak_isi.jpg";
	}
	
	
	$bts_sran_2_2_3 = $db->fetch_all_data("indottech_bts_sran_2_2_3",[],"atd_id='".$_GET["id"]."'")[0];
		$table_2_1=$bts_sran_2_2_3["bts_restart"];
		if ($table_2_1 == "1"){
			$t2_1_ok = "OK";
			$t2_1_nok = "-";
			
		} else {
			$t2_1_ok = "-";
			$t2_1_nok = "NOK";
		}
	
		$table_2_2=$bts_sran_2_2_3["launch"];
		if ($table_2_2 == "1"){
			$t2_2_ok = "OK";
			$t2_2_nok = "-";
			
		} else {
			$t2_2_ok = "-";
			$t2_2_nok = "NOK";
		}
	
	
	$bts_sran_2_2_4 = $db->fetch_all_data("indottech_bts_sran_2_2_4",[],"atd_id='".$_GET["id"]."'")[0];
		$table_3_1=$bts_sran_2_2_4["v1"];
		if ($table_3_1 == "1"){
			$t3_1_ok = "OK";
			$t3_1_nok = "-";
			
		} else {
			$t3_1_ok = "-";
			$t3_1_nok = "NOK";
		}
		
		$table_3_2=$bts_sran_2_2_4["v2"];
		if ($table_3_2 == "1"){
			$t3_2_ok = "OK";
			$t3_2_nok = "-";
			
		} else {
			$t3_2_ok = "-";
			$t3_2_nok = "NOK";
		}
		
		$table_3_3=$bts_sran_2_2_4["v3"];
		if ($table_3_3 == "1"){
			$t3_3_ok = "OK";
			$t3_3_nok = "-";
			
		} else {
			$t3_3_ok = "-";
			$t3_3_nok = "NOK";
		}
		
		$table_3_4=$bts_sran_2_2_4["v4"];
		if ($table_3_4 == "1"){
			$t3_4_ok = "OK";
			$t3_4_nok = "-";
			
		} else {
			$t3_4_ok = "-";
			$t3_4_nok = "NOK";
		}
		
		$table_3_5=$bts_sran_2_2_4["v5"];
		if ($table_3_5 == "1"){
			$t3_5_ok = "OK";
			$t3_5_nok = "-";
			
		} else {
			$t3_5_ok = "-";
			$t3_5_nok = "NOK";
		}
		
		$table_3_6=$bts_sran_2_2_4["v6"];
		if ($table_3_6 == "1"){
			$t3_6_ok = "OK";
			$t3_6_nok = "-";
			
		} else {
			$t3_6_ok = "-";
			$t3_6_nok = "NOK";
		}
		
		$table_3_7=$bts_sran_2_2_4["v7"];
		if ($table_3_7 == "1"){
			$t3_7_ok = "OK";
			$t3_7_nok = "-";
			
		} else {
			$t3_7_ok = "-";
			$t3_7_nok = "NOK";
		}
		
		$table_3_8=$bts_sran_2_2_4["v8"];
		if ($table_3_8 == "1"){
			$t3_8_ok = "OK";
			$t3_8_nok = "-";
			
		} else {
			$t3_8_ok = "-";
			$t3_8_nok = "NOK";
		}
		
		$table_3_9=$bts_sran_2_2_4["v9"];
		if ($table_3_9 == "1"){
			$t3_9_ok = "OK";
			$t3_9_nok = "-";
			
		} else {
			$t3_9_ok = "-";
			$t3_9_nok = "NOK";
		}
		
		$table_3_10=$bts_sran_2_2_4["v10"];
		if ($table_3_10 == "1"){
			$t3_10_ok = "OK";
			$t3_10_nok = "-";
			
		} else {
			$t3_10_ok = "-";
			$t3_10_nok = "NOK";
		}
		
		$table_3_11=$bts_sran_2_2_4["v11"];
		if ($table_3_11 == "1"){
			$t3_11_ok = "OK";
			$t3_11_nok = "-";
			
		} else {
			$t3_11_ok = "-";
			$t3_11_nok = "NOK";
		}
		
		$table_3_12=$bts_sran_2_2_4["v12"];
		if ($table_3_12 == "1"){
			$t3_12_ok = "OK";
			$t3_12_nok = "-";
			
		} else {
			$t3_12_ok = "-";
			$t3_12_nok = "NOK";
		}
		
		$table_3_13=$bts_sran_2_2_4["v13"];
		if ($table_3_13 == "1"){
			$t3_13_ok = "OK";
			$t3_13_nok = "-";
			
		} else {
			$t3_13_ok = "-";
			$t3_13_nok = "NOK";
		}
		
		$table_3_14=$bts_sran_2_2_4["v14"];
		if ($table_3_14 == "1"){
			$t3_14_ok = "OK";
			$t3_14_nok = "-";
			
		} else {
			$t3_14_ok = "-";
			$t3_14_nok = "NOK";
		}
		
		$table_3_15=$bts_sran_2_2_4["v15"];
		if ($table_3_15 == "1"){
			$t3_15_ok = "OK";
			$t3_15_nok = "-";
			
		} else {
			$t3_15_ok = "-";
			$t3_15_nok = "NOK";
		}
	
	
	$arr2 = array();
	array_push($arr2,"localhost");
	array_push($arr2,$vtype_1);
	array_push($arr2,$vtype_2);
	array_push($arr2,$bts_sran_2_2_2_1["remarks"]);
	array_push($arr2,$bts_sran_2_2_2_1["info"]);
	array_push($arr2,$t2_1_ok);
	array_push($arr2,$t2_1_nok);
	array_push($arr2,$t2_2_ok);
	array_push($arr2,$t2_2_nok);
	array_push($arr2,$t3_1_ok);
	array_push($arr2,$t3_1_nok);
	array_push($arr2,$t3_2_ok);
	array_push($arr2,$t3_2_nok);
	array_push($arr2,$t3_3_ok);
	array_push($arr2,$t3_3_nok);
	array_push($arr2,$t3_4_ok);
	array_push($arr2,$t3_4_nok);
	array_push($arr2,$t3_5_ok);
	array_push($arr2,$t3_5_nok);
	array_push($arr2,$t3_6_ok);
	array_push($arr2,$t3_6_nok);
	array_push($arr2,$t3_7_ok);
	array_push($arr2,$t3_7_nok);
	array_push($arr2,$t3_8_ok);
	array_push($arr2,$t3_8_nok);
	array_push($arr2,$t3_9_ok);
	array_push($arr2,$t3_9_nok);
	array_push($arr2,$t3_10_ok);
	array_push($arr2,$t3_10_nok);
	array_push($arr2,$t3_11_ok);
	array_push($arr2,$t3_11_nok);
	array_push($arr2,$t3_12_ok);
	array_push($arr2,$t3_12_nok);
	array_push($arr2,$t3_13_ok);
	array_push($arr2,$t3_13_nok);
	array_push($arr2,$t3_14_ok);
	array_push($arr2,$t3_14_nok);
	array_push($arr2,$t3_15_ok);
	array_push($arr2,$t3_15_nok);

	echo str_replace($arr1,$arr2,read_file("htmls_bts/bts_08.html"));
?>