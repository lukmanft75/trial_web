<?php
	include_once "common.php";
	function str_replace_first($search, $replace, $subject) {
		return implode($replace, explode($search, $subject, 2));
	}
	$hari = ["1" => "Senin","2" => "Selasa","3" => "Rabu", "4" => "kamis", "5" => "Jum'at", "6" => "Sabtu", "7" => "Minggu"];
	$bulan = ["1" => "Januari","2" => "Februari","3" => "Maret", "4" => "April", "5" => "Mei", "6" => "Juni", "7" => "Juli", "8" => "Agustus", "9" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember"];
	$arr1 = array();
	array_push($arr1,"{host}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.date}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.customer}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.site_name}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.site_address}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.power_system}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.sub_rack}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.supervisory}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.rectifier}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.rect_1_sn}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.rect_2_sn}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.rect_3_sn}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.rect_4_sn}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.rect_5_sn}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.rect_6_sn}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.rect_7_sn}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.ac_vac}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.ac_phase}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.ac_hz}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.out_vdc_to}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.out_vdc}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.float}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.equalize}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.load_current}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.output_volt}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.rectifier_system}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.ip}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.subnet}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.gateway}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.physical_port}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.port}");
	
	$indottech_atr= $db->fetch_all_data("indottech_acceptance_test_rectifier",[],"atd_id='".$_GET["id"]."'")[0];
	
	$arr2 = array();
	array_push($arr2,"localhost");
	array_push($arr2,format_tanggal($indottech_atr["test_at"]));
	array_push($arr2,$indottech_atr["customer"]);
	array_push($arr2,$indottech_atr["site_name"]);
	array_push($arr2,$indottech_atr["site_address"]);
	array_push($arr2,$indottech_atr["power_system_sn"]);
	array_push($arr2,$indottech_atr["sub_rack_sn"]);
	array_push($arr2,$indottech_atr["supervisory_modul_sn"]);
	array_push($arr2,$indottech_atr["rectifier_module_type"]);
	array_push($arr2,$indottech_atr["rectifier1_sn"]);
	array_push($arr2,$indottech_atr["rectifier2_sn"]);
	array_push($arr2,$indottech_atr["rectifier3_sn"]);
	array_push($arr2,$indottech_atr["rectifier4_sn"]);
	array_push($arr2,$indottech_atr["rectifier5_sn"]);
	array_push($arr2,$indottech_atr["rectifier6_sn"]);
	array_push($arr2,$indottech_atr["rectifier7_sn"]);
	array_push($arr2,$indottech_atr["ac_input_vac"]);
	array_push($arr2,$indottech_atr["ac_input_phase"]);
	array_push($arr2,$indottech_atr["ac_input_phase"]);
	array_push($arr2,$indottech_atr["output_vdc1"]);
	array_push($arr2,$indottech_atr["output_vdc2"]);
	array_push($arr2,$indottech_atr["float_vdc"]);
	array_push($arr2,$indottech_atr["equalize_vdc"]);
	array_push($arr2,$indottech_atr["load_current"]);
	array_push($arr2,$indottech_atr["load_output_vdc"]);
	array_push($arr2,$indottech_atr["rectifier_system_vdc"]);
	array_push($arr2,$indottech_atr["rectifier_ipaddr"]);
	array_push($arr2,$indottech_atr["rectifier_subnet"]);
	array_push($arr2,$indottech_atr["rectifier_gateway"]);
	array_push($arr2,$indottech_atr["connected_ip"]);
	array_push($arr2,$indottech_atr["connected_port"]);
	
	echo str_replace($arr1,$arr2,read_file("htmls/rectifier_7.html"));
?>