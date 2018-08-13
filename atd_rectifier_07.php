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
	array_push($arr1,"{indottech_acceptance_test_rectifier.polarity_1}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.polarity_2}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.load_current}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.output_volt}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.lf_1}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.lf_2}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.ld_1}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.ld_2}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.hf_1}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.hf_2}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.hd_1}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.hd_2}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.lff_1}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.lff_2}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.bff_1}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.bff_2}");
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
	array_push($arr2,$indottech_atr["ac_input_frequency"]);
	array_push($arr2,$indottech_atr["output_vdc1"]);
	array_push($arr2,$indottech_atr["output_vdc2"]);
	array_push($arr2,$indottech_atr["float_vdc"]);
	array_push($arr2,$indottech_atr["equalize_vdc"]);
		$polarity = $indottech_atr["polarity"];
		if ($polarity == "1") {
			$polarity_1 = "kotak_isi.jpg";
		} else {
			$polarity_1 = "kotak_kosong.jpg";
		}
		if ($polarity == "2") {
			$polarity_2 = "kotak_isi.jpg";
		} else {
			$polarity_2 = "kotak_kosong.jpg";
		}
	array_push($arr2,$polarity_1);
	array_push($arr2,$polarity_2);
	array_push($arr2,$indottech_atr["load_current"]);
	array_push($arr2,$indottech_atr["load_output_vdc"]);
		$lf = $indottech_atr["alarm_low_float"];
		if ($lf == "1") {
			$lf_1 = "kotak_isi.jpg";
		} else {
			$lf_1 = "kotak_kosong.jpg";
		}
		if ($lf == "2") {
			$lf_2 = "kotak_isi.jpg";
		} else {
			$lf_2 = "kotak_kosong.jpg";
		}
	array_push($arr2,$lf_1);
	array_push($arr2,$lf_2);
		$ld = $indottech_atr["alarm_low_load"];
		if ($ld == "1") {
			$ld_1 = "kotak_isi.jpg";
		} else {
			$ld_1 = "kotak_kosong.jpg";
		}
		if ($ld == "2") {
			$ld_2 = "kotak_isi.jpg";
		} else {
			$ld_2 = "kotak_kosong.jpg";
		}
	array_push($arr2,$ld_1);
	array_push($arr2,$ld_2);
		$hf = $indottech_atr["alarm_high_float"];
		if ($hf == "1") {
			$hf_1 = "kotak_isi.jpg";
		} else {
			$hf_1 = "kotak_kosong.jpg";
		}
		if ($hf == "2") {
			$hf_2 = "kotak_isi.jpg";
		} else {
			$hf_2 = "kotak_kosong.jpg";
		}
	array_push($arr2,$hf_1);
	array_push($arr2,$hf_2);
		$hd = $indottech_atr["alarm_high_load"];
		if ($hd == "1") {
			$hd_1 = "kotak_isi.jpg";
		} else {
			$hd_1 = "kotak_kosong.jpg";
		}
		if ($hd == "2") {
			$hd_2 = "kotak_isi.jpg";
		} else {
			$hd_2 = "kotak_kosong.jpg";
		}
	array_push($arr2,$hd_1);
	array_push($arr2,$hd_2);
		$lff = $indottech_atr["alarm_load_fuse_fail"];
		if ($lff == "1") {
			$lff_1 = "kotak_isi.jpg";
		} else {
			$lff_1 = "kotak_kosong.jpg";
		}
		if ($lff == "2") {
			$lff_2 = "kotak_isi.jpg";
		} else {
			$lff_2 = "kotak_kosong.jpg";
		}
	array_push($arr2,$lff_1);
	array_push($arr2,$lff_2);
		$bff = $indottech_atr["alarm_battery_fuse_fail"];
		if ($bff == "1") {
			$bff_1 = "kotak_isi.jpg";
		} else {
			$bff_1 = "kotak_kosong.jpg";
		}
		if ($bff == "2") {
			$bff_2 = "kotak_isi.jpg";
		} else {
			$bff_2 = "kotak_kosong.jpg";
		}
	array_push($arr2,$bff_1);
	array_push($arr2,$bff_2);
	array_push($arr2,$indottech_atr["rectifier_system_vdc"]);
	array_push($arr2,$indottech_atr["rectifier_ipaddr"]);
	array_push($arr2,$indottech_atr["rectifier_subnet"]);
	array_push($arr2,$indottech_atr["rectifier_gateway"]);
	array_push($arr2,$indottech_atr["connected_ip"]);
	array_push($arr2,$indottech_atr["connected_port"]);
	
	echo str_replace($arr1,$arr2,read_file("htmls/rectifier_7.html"));
?>