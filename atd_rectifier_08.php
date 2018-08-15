<?php
	function str_replace_first($search, $replace, $subject) {
		return implode($replace, explode($search, $subject, 2));
	}
	$arr1 = array();
	array_push($arr1,"{host}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.batt_type}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.batt_capacity}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.batt_voltage}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.batt_no_bank}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.batt_charging}");
	
	
	$indottech_atr= $db->fetch_all_data("indottech_acceptance_test_rectifier",[],"atd_id='".$_GET["id"]."'")[0];


	$fullcontent = read_file("htmls/rectifier_8.html");
	$temp_html = explode("<!--DischaregeTestTable-->",$fullcontent);
	
	$innercontent = "";
	$battery_no_of_bank = $db->fetch_single_data("indottech_acceptance_test_rectifier","battery_no_of_bank",["atd_id" => $_GET["id"]]);
	$subtotal = array();
	for($bank_no=0 ; $bank_no < $battery_no_of_bank ; $bank_no++){
		$_arr1 = array();
		$_arr2 = array();
		for($batt_no = 0; $batt_no<5 ; $batt_no++){
			for($minute_at = 0; $minute_at<=180 ; $minute_at += 30){
				array_push($_arr1,"{battery_discharge.val.".$batt_no.".".$minute_at."}");
				
				$val = $db->fetch_single_data("indottech_battery_discharge","val",["atd_id" => $_GET["id"], "bank_no" => $bank_no, "batt_no" => $batt_no ,"minute_at" => $minute_at]);
				array_push($_arr2,$val);
				$subtotal[$bank_no][$minute_at] += $val;
			}
		}
		array_push($_arr1,"{battery_discharge.load_current}");
		array_push($_arr1,"{battery_discharge.bank_no}");
		array_push($_arr2,$db->fetch_single_data("indottech_battery_discharge","load_current",["atd_id" => $_GET["id"], "bank_no" => $bank_no]));
		array_push($_arr2,($bank_no+1));
		$innercontent .= str_replace($_arr1,$_arr2,$temp_html[1]);
	}
	
	foreach($subtotal as $bank_no => $arrMinute_at){
		foreach($arrMinute_at as $minute_at => $val){
			$innercontent = str_replace_first("{battery_discharge.val.T.".$minute_at."}",$subtotal[$bank_no][$minute_at],$innercontent);	
		}
	}
	
	$fullcontent = $temp_html[0].$innercontent.$temp_html[2];
	
	
	
	$arr2 = array();
	array_push($arr2,"localhost");
	array_push($arr2,$indottech_atr["battery_type"]);
	array_push($arr2,$indottech_atr["battery_capacity"]);
	array_push($arr2,$indottech_atr["battery_voltage_per_block"]);
	array_push($arr2,$indottech_atr["battery_no_of_bank"]);
	array_push($arr2,$indottech_atr["battery_charging_rate"]);
	
	echo str_replace($arr1,$arr2,$fullcontent);
?>