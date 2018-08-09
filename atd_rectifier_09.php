<?php
	include_once "common.php";
	function str_replace_first($search, $replace, $subject) {
		return implode($replace, explode($search, $subject, 2));
	}
	
	$arr1 = array();
	array_push($arr1,"{host}");

	
	$fullcontent = read_file("htmls/rectifier_9.html");
	$temp_html = explode("<!--TablePhotos-->",$fullcontent);
	
	$innercontent = "";
	$battery_no_of_bank = $db->fetch_single_data("indottech_acceptance_test_rectifier","battery_no_of_bank",["atd_id" => $_GET["id"]]);
	$subtotal = array();
	for($bank_no=0 ; $bank_no < $battery_no_of_bank ; $bank_no++){
		$_arr1 = array();
		$_arr2 = array();
		for($batt_no = 0; $batt_no<5 ; $batt_no++){
			array_push($_arr1,"{battery_discharge.bank_id_".$batt_no."}"); //01
			array_push($_arr1,"{img_sn_loc_".$batt_no."}"); //02
			array_push($_arr1,"{img_volt_loc_".$batt_no."}"); //03
			
			$val = $db->fetch_single_data("indottech_battery_discharge","id",["atd_id" => $_GET["id"], "bank_no" => $bank_no, "batt_no" => $batt_no , "minute_at" => 30]);
			array_push($_arr2,$val); //01
			$img_sn_loc = $db->fetch_single_data("indottech_battery_discharge_photos","serialnumber",["atd_id" => $_GET["id"], "battery_discharge_id" => $val]);
			array_push($_arr2,$img_sn_loc); //02
			$img_volt_loc = $db->fetch_single_data("indottech_battery_discharge_photos","voltmeter",["atd_id" => $_GET["id"], "battery_discharge_id" => $val]);
			array_push($_arr2,$img_volt_loc); //03
			
			// 01 >>cari id battery discharge
			// 02 >>cari value lokasi gambar serial number berdasarkan id battery discharge
		}
		array_push($_arr1,"{battery_discharge.bank_no}");
		array_push($_arr2,($bank_no+1));
		$innercontent .= str_replace($_arr1,$_arr2,$temp_html[1]);
	}
	
	$fullcontent = $temp_html[0].$innercontent.$temp_html[2];

	
	$arr2 = array();
	array_push($arr2,"localhost");
	
	echo str_replace($arr1,$arr2,$fullcontent);
?>