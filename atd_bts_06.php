<?php
	include_once "common.php";
	$arr1 = array();
	array_push($arr1,"{host}");
	array_push($arr1,"{bts_06.1_1_ok}");
	array_push($arr1,"{bts_06.1_1_nok}");
	array_push($arr1,"{bts_06.1_2_ok}");
	array_push($arr1,"{bts_06.1_2_nok}");
	array_push($arr1,"{bts_06.1_3_ok}");
	array_push($arr1,"{bts_06.1_3_nok}");
	array_push($arr1,"{bts_06.1_4_ok}");
	array_push($arr1,"{bts_06.1_4_nok}");
	array_push($arr1,"{bts_06.1_5_ok}");
	array_push($arr1,"{bts_06.1_5_nok}");
	array_push($arr1,"{bts_06.2_1_ok}");
	array_push($arr1,"{bts_06.2_1_nok}");
	array_push($arr1,"{bts_06.2_2_ok}");
	array_push($arr1,"{bts_06.2_2_nok}");
	array_push($arr1,"{bts_06.2_3_ok}");
	array_push($arr1,"{bts_06.2_3_nok}");
	array_push($arr1,"{bts_06.3_1_ok}");
	array_push($arr1,"{bts_06.3_1_nok}");
	array_push($arr1,"{bts_06.3_2_ok}");
	array_push($arr1,"{bts_06.3_2_nok}");
	array_push($arr1,"{bts_06.3_3_ok}");
	array_push($arr1,"{bts_06.3_3_nok}");
	array_push($arr1,"{bts_06.3_4_ok}");
	array_push($arr1,"{bts_06.3_4_nok}");
	array_push($arr1,"{bts_06.t2_1_1_ok}");
	array_push($arr1,"{bts_06.t2_1_1_nok}");
	array_push($arr1,"{bts_06.t2_1_2_ok}");
	array_push($arr1,"{bts_06.t2_1_2_nok}");
	array_push($arr1,"{bts_06.t2_1_3_ok}");
	array_push($arr1,"{bts_06.t2_1_3_nok}");
	array_push($arr1,"{bts_06.t2_1_4_ok}");
	array_push($arr1,"{bts_06.t2_1_4_nok}");
	array_push($arr1,"{bts_06.t2_1_5_ok}");
	array_push($arr1,"{bts_06.t2_1_5_nok}");
	array_push($arr1,"{bts_06.t2_2_1_ok}");
	array_push($arr1,"{bts_06.t2_2_1_nok}");
	array_push($arr1,"{bts_06.t2_2_2_ok}");
	array_push($arr1,"{bts_06.t2_2_2_nok}");
	array_push($arr1,"{bts_06.t2_2_3_ok}");
	array_push($arr1,"{bts_06.t2_2_3_nok}");
	array_push($arr1,"{bts_06.t2_2_4_ok}");
	array_push($arr1,"{bts_06.t2_2_4_nok}");
	array_push($arr1,"{bts_06.t2_2_5_ok}");
	array_push($arr1,"{bts_06.t2_2_5_nok}");
	array_push($arr1,"{bts_06.t2_2_6_ok}");
	array_push($arr1,"{bts_06.t2_2_6_nok}");

	$bts_sran_2_1_1 = $db->fetch_all_data("indottech_bts_sran_2_1_1",[],"atd_id='".$_GET["id"]."'")[0];
	if ($bts_sran_2_1_1["v1_1"]=="1"){
		$_1_1_ok = "OK";
		$_1_1_nok = "-";
	} else {
		$_1_1_nok = "NOK";
		$_1_1_ok = "-";
	}
	if ($bts_sran_2_1_1["v1_2"]=="1"){
		$_1_2_ok = "OK";
		$_1_2_nok = "-";
	} else {
		$_1_2_nok = "NOK";
		$_1_2_ok = "-";
	}
	if ($bts_sran_2_1_1["v1_3"]=="1"){
		$_1_3_ok = "OK";
		$_1_3_nok = "-";
	} else {
		$_1_3_nok = "NOK";
		$_1_3_ok = "-";
	}
	if ($bts_sran_2_1_1["v1_4"]=="1"){
		$_1_4_ok = "OK";
		$_1_4_nok = "-";
	} else {
		$_1_4_nok = "NOK";
		$_1_4_ok = "-";
	}
	if ($bts_sran_2_1_1["v1_5"]=="1"){
		$_1_5_ok = "OK";
		$_1_5_nok = "-";
	} else {
		$_1_5_nok = "NOK";
		$_1_5_ok = "-";
	}
	
		if ($bts_sran_2_1_1["v2_1"]=="1"){
			$_2_1_ok = "OK";
			$_2_1_nok = "-";
		} else {
			$_2_1_nok = "NOK";
			$_2_1_ok = "-";
		}
		if ($bts_sran_2_1_1["v2_2"]=="1"){
			$_2_2_ok = "OK";
			$_2_2_nok = "-";
		} else {
			$_2_2_nok = "NOK";
			$_2_2_ok = "-";
		}
		if ($bts_sran_2_1_1["v2_3"]=="1"){
			$_2_3_ok = "OK";
			$_2_3_nok = "-";
		} else {
			$_2_3_nok = "NOK";
			$_2_3_ok = "-";
		}
		
			if ($bts_sran_2_1_1["v3_1"]=="1"){
				$_3_1_ok = "OK";
				$_3_1_nok = "-";
			} else {
				$_3_1_nok = "NOK";
				$_3_1_ok = "-";
			}
			if ($bts_sran_2_1_1["v3_2"]=="1"){
				$_3_2_ok = "OK";
				$_3_2_nok = "-";
			} else {
				$_3_2_nok = "NOK";
				$_3_2_ok = "-";
			}
			if ($bts_sran_2_1_1["v3_3"]=="1"){
				$_3_3_ok = "OK";
				$_3_3_nok = "-";
			} else {
				$_3_3_nok = "NOK";
				$_3_3_ok = "-";
			}
			if ($bts_sran_2_1_1["v3_4"]=="1"){
				$_3_4_ok = "OK";
				$_3_4_nok = "-";
			} else {
				$_3_4_nok = "NOK";
				$_3_4_ok = "-";
			}
			
	$bts_sran_2_1_2 = $db->fetch_all_data("indottech_bts_sran_2_1_2",[],"atd_id='".$_GET["id"]."'")[0];
	if ($bts_sran_2_1_2["v1_1"]=="1"){
		$t2_1_1_ok = "OK";
		$t2_1_1_nok = "-";
	} else {
		$t2_1_1_nok = "NOK";
		$t2_1_1_ok = "-";
	}
	if ($bts_sran_2_1_2["v1_2"]=="1"){
		$t2_1_2_ok = "OK";
		$t2_1_2_nok = "-";
	} else {
		$t2_1_2_nok = "NOK";
		$t2_1_2_ok = "-";
	}
	if ($bts_sran_2_1_2["v1_3"]=="1"){
		$t2_1_3_ok = "OK";
		$t2_1_3_nok = "";
	} else {
		$t2_1_3_nok = "NOK";
		$t2_1_3_ok = "-";
	}
	if ($bts_sran_2_1_2["v1_4"]=="1"){
		$t2_1_4_ok = "OK";
		$t2_1_4_nok = "-";
	} else {
		$t2_1_4_nok = "NOK";
		$t2_1_4_ok = "-";
	}
	if ($bts_sran_2_1_2["v1_5"]=="1"){
		$t2_1_5_ok = "OK";
		$t2_1_5_nok = "-";
	} else {
		$t2_1_5_nok = "NOK";
		$t2_1_5_ok = "-";
	}
	
		if ($bts_sran_2_1_2["v2_1"]=="1"){
			$t2_2_1_ok = "OK";
			$t2_2_1_nok = "-";
		} else {
			$t2_2_1_nok = "NOK";
			$t2_2_1_ok = "-";
		}
		if ($bts_sran_2_1_2["v2_2"]=="1"){
			$t2_2_2_ok = "OK";
			$t2_2_2_nok = "-";
		} else {
			$t2_2_2_nok = "NOK";
			$t2_2_2_ok = "-";
		}
		if ($bts_sran_2_1_2["v2_3"]=="1"){
			$t2_2_3_ok = "OK";
			$t2_2_3_nok = "-";
		} else {
			$t2_2_3_nok = "NOK";
			$t2_2_3_ok = "-";
		}
		if ($bts_sran_2_1_2["v2_4"]=="1"){
			$t2_2_4_ok = "OK";
			$t2_2_4_nok = "-";
		} else {
			$t2_2_4_nok = "NOK";
			$t2_2_4_ok = "-";
		}
		if ($bts_sran_2_1_2["v2_5"]=="1"){
			$t2_2_5_ok = "OK";
			$t2_2_5_nok = "-";
		} else {
			$t2_2_5_nok = "NOK";
			$t2_2_5_ok = "-";
		}
		if ($bts_sran_2_1_2["v2_6"]=="1"){
			$t2_2_6_ok = "OK";
			$t2_2_6_nok = "-";
		} else {
			$t2_2_6_nok = "NOK";
			$t2_2_6_ok = "-";
		}
	
	$arr2 = array();
	array_push($arr2,"localhost");
	array_push($arr2,$_1_1_ok);
	array_push($arr2,$_1_1_nok);
	array_push($arr2,$_1_2_ok);
	array_push($arr2,$_1_2_nok);
	array_push($arr2,$_1_3_ok);
	array_push($arr2,$_1_3_nok);
	array_push($arr2,$_1_4_ok);
	array_push($arr2,$_1_4_nok);
	array_push($arr2,$_1_5_ok);
	array_push($arr2,$_1_5_nok);
	array_push($arr2,$_2_1_ok);
	array_push($arr2,$_2_1_nok);
	array_push($arr2,$_2_2_ok);
	array_push($arr2,$_2_2_nok);
	array_push($arr2,$_2_3_ok);
	array_push($arr2,$_2_3_nok);
	array_push($arr2,$_3_1_ok);
	array_push($arr2,$_3_1_nok);
	array_push($arr2,$_3_2_ok);
	array_push($arr2,$_3_2_nok);
	array_push($arr2,$_3_3_ok);
	array_push($arr2,$_3_3_nok);
	array_push($arr2,$_3_4_ok);
	array_push($arr2,$_3_4_nok);
	array_push($arr2,$t2_1_1_ok);
	array_push($arr2,$t2_1_1_nok);
	array_push($arr2,$t2_1_2_ok);
	array_push($arr2,$t2_1_2_nok);
	array_push($arr2,$t2_1_3_ok);
	array_push($arr2,$t2_1_3_nok);
	array_push($arr2,$t2_1_4_ok);
	array_push($arr2,$t2_1_4_nok);
	array_push($arr2,$t2_1_5_ok);
	array_push($arr2,$t2_1_5_nok);
	array_push($arr2,$t2_2_1_ok);
	array_push($arr2,$t2_2_1_nok);
	array_push($arr2,$t2_2_2_ok);
	array_push($arr2,$t2_2_2_nok);
	array_push($arr2,$t2_2_3_ok);
	array_push($arr2,$t2_2_3_nok);
	array_push($arr2,$t2_2_4_ok);
	array_push($arr2,$t2_2_4_nok);
	array_push($arr2,$t2_2_5_ok);
	array_push($arr2,$t2_2_5_nok);
	array_push($arr2,$t2_2_6_ok);
	array_push($arr2,$t2_2_6_nok);

	echo str_replace($arr1,$arr2,read_file("htmls_bts/bts_06.html"));
?>