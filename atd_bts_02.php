<?php
	include_once "common.php";
	$arr1 = array();
	array_push($arr1,"{host}");
	array_push($arr1,"{indottech_acceptance_certificate.po_number}");
	array_push($arr1,"{indottech_acceptance_certificate.site_id}");
	array_push($arr1,"{indottech_acceptance_certificate.site_name}");
	array_push($arr1,"{indottech_acceptance_certificate.site_address}");
	array_push($arr1,"{indottech_acceptance_certificate.longitude}");
	array_push($arr1,"{indottech_acceptance_certificate.latitude}");
	array_push($arr1,"{indottech_acceptance_certificate.wt_1}");
	array_push($arr1,"{indottech_acceptance_certificate.wt_2}");
	array_push($arr1,"{indottech_acceptance_certificate.wt_3}");
	array_push($arr1,"{indottech_acceptance_certificate.wt_4}");
	array_push($arr1,"{indottech_acceptance_certificate.st_1}");
	array_push($arr1,"{indottech_acceptance_certificate.st_2}");
	array_push($arr1,"{indottech_acceptance_certificate.st_3}");
	array_push($arr1,"{indottech_acceptance_certificate.st_4}");
	array_push($arr1,"{indottech_acceptance_certificate.st_5}");
	array_push($arr1,"{indottech_acceptance_certificate.sm_1}");
	array_push($arr1,"{indottech_acceptance_certificate.sm_2}");
	array_push($arr1,"{indottech_acceptance_certificate.sm_3}");
	array_push($arr1,"{indottech_acceptance_certificate.sm_4}");
	array_push($arr1,"{indottech_acceptance_certificate.sm_5}");
	array_push($arr1,"{indottech_acceptance_certificate.rm_1}");
	array_push($arr1,"{indottech_acceptance_certificate.rm_2}");
	array_push($arr1,"{indottech_acceptance_certificate.rm_3}");
	array_push($arr1,"{indottech_acceptance_certificate.rm_4}");
	array_push($arr1,"{indottech_acceptance_certificate.rm_5}");
	array_push($arr1,"{indottech_acceptance_certificate.bc_1}");
	array_push($arr1,"{indottech_acceptance_certificate.bc_2}");
	array_push($arr1,"{indottech_acceptance_certificate.bc_3}");
	array_push($arr1,"{indottech_acceptance_certificate.bc_4}");
	array_push($arr1,"{indottech_acceptance_certificate.bc_5}");
	array_push($arr1,"{indottech_acceptance_certificate.number_sys}");
	array_push($arr1,"{indottech_acceptance_certificate.number_rf}");
	array_push($arr1,"{indottech_acceptance_certificate.number_antenna}");
	array_push($arr1,"{indottech_acceptance_certificate.install_date}");
	array_push($arr1,"{indottech_acceptance_certificate.self_date}");
	array_push($arr1,"{indottech_acceptance_certificate.on_air_date}");

	$acceptance_certificate = $db->fetch_all_data("indottech_acceptance_certificate",[],"atd_id='".$_GET["id"]."'")[0];

	$array = pipetoarray($acceptance_certificate["worktype_ids"]);
	if (in_array('1', $array)){
		$work_1 = "kotak_isi.jpg";
	} else {
		$work_1 = "kotak_kosong.jpg";
	}
	if (in_array('2', $array)){
		$work_2 = "kotak_isi.jpg";
	} else {
		$work_2 = "kotak_kosong.jpg";
	}
	if (in_array('3', $array)){
		$work_3 = "kotak_isi.jpg";
	} else {
		$work_3 = "kotak_kosong.jpg";
	}
	if (in_array('4', $array)){
		$work_4 = "kotak_isi.jpg";
	} else {
		$work_4 = "kotak_kosong.jpg";
	}
	
	$array = pipetoarray($acceptance_certificate["sitetype_ids"]);
	if (in_array('1', $array)){
		$site_1 = "kotak_isi.jpg";
	} else {
		$site_1 = "kotak_kosong.jpg";
	}
	if (in_array('2', $array)){
		$site_2 = "kotak_isi.jpg";
	} else {
		$site_2 = "kotak_kosong.jpg";
	}
	if (in_array('3', $array)){
		$site_3 = "kotak_isi.jpg";
	} else {
		$site_3 = "kotak_kosong.jpg";
	}
	if (in_array('4', $array)){
		$site_4 = "kotak_isi.jpg";
	} else {
		$site_4 = "kotak_kosong.jpg";
	}
	if (in_array('5', $array)){
		$site_5 = "kotak_isi.jpg";
	} else {
		$site_5 = "kotak_kosong.jpg";
	}
	
	$array = pipetoarray($acceptance_certificate["system_module_ids"]);
	if (in_array('1', $array)){
		$sys_mod_1 = "kotak_isi.jpg";
	} else {
		$sys_mod_1 = "kotak_kosong.jpg";
	}
	if (in_array('2', $array)){
		$sys_mod_2 = "kotak_isi.jpg";
	} else {
		$sys_mod_2 = "kotak_kosong.jpg";
	}
	if (in_array('3', $array)){
		$sys_mod_3 = "kotak_isi.jpg";
	} else {
		$sys_mod_3 = "kotak_kosong.jpg";
	}
	if (in_array('4', $array)){
		$sys_mod_4 = "kotak_isi.jpg";
	} else {
		$sys_mod_4 = "kotak_kosong.jpg";
	}
	if (in_array('5', $array)){
		$sys_mod_5 = "kotak_isi.jpg";
	} else {
		$sys_mod_5 = "kotak_kosong.jpg";
	}
	
	$array = pipetoarray($acceptance_certificate["rf_module_ids"]);
	if (in_array('1', $array)){
		$rf_mod_1 = "kotak_isi.jpg";
	} else {
		$rf_mod_1 = "kotak_kosong.jpg";
	}
	if (in_array('2', $array)){
		$rf_mod_2 = "kotak_isi.jpg";
	} else {
		$rf_mod_2 = "kotak_kosong.jpg";
	}
	if (in_array('3', $array)){
		$rf_mod_3 = "kotak_isi.jpg";
	} else {
		$rf_mod_3 = "kotak_kosong.jpg";
	}
	if (in_array('4', $array)){
		$rf_mod_4 = "kotak_isi.jpg";
	} else {
		$rf_mod_4 = "kotak_kosong.jpg";
	}
	if (in_array('5', $array)){
		$rf_mod_5 = "kotak_isi.jpg";
	} else {
		$rf_mod_5 = "kotak_kosong.jpg";
	}
	
	$array = pipetoarray($acceptance_certificate["configuration_ids"]);
	if (in_array('1', $array)){
		$config_1 = "kotak_isi.jpg";
	} else {
		$config_1 = "kotak_kosong.jpg";
	}
	if (in_array('2', $array)){
		$config_2 = "kotak_isi.jpg";
	} else {
		$config_2 = "kotak_kosong.jpg";
	}
	if (in_array('3', $array)){
		$config_3 = "kotak_isi.jpg";
	} else {
		$config_3 = "kotak_kosong.jpg";
	}
	if (in_array('4', $array)){
		$config_4 = "kotak_isi.jpg";
	} else {
		$config_4 = "kotak_kosong.jpg";
	}
	if (in_array('5', $array)){
		$config_5 = "kotak_isi.jpg";
	} else {
		$config_5 = "kotak_kosong.jpg";
	}
	
	$arr2 = array();
	array_push($arr2,"localhost");
	array_push($arr2,$acceptance_certificate["po_number"]);
	array_push($arr2,$acceptance_certificate["site_id"]);
	array_push($arr2,$acceptance_certificate["site_name"]);
	array_push($arr2,$acceptance_certificate["site_address"]);
	array_push($arr2,$acceptance_certificate["site_longitude"]);
	array_push($arr2,$acceptance_certificate["site_latitude"]);
	array_push($arr2,$work_1);
	array_push($arr2,$work_2);
	array_push($arr2,$work_3);
	array_push($arr2,$work_4);
	array_push($arr2,$site_1);
	array_push($arr2,$site_2);
	array_push($arr2,$site_3);
	array_push($arr2,$site_4);
	array_push($arr2,$site_5);
	array_push($arr2,$sys_mod_1);
	array_push($arr2,$sys_mod_2);
	array_push($arr2,$sys_mod_3);
	array_push($arr2,$sys_mod_4);
	array_push($arr2,$sys_mod_5);
	array_push($arr2,$rf_mod_1);
	array_push($arr2,$rf_mod_2);
	array_push($arr2,$rf_mod_3);
	array_push($arr2,$rf_mod_4);
	array_push($arr2,$rf_mod_5);
	array_push($arr2,$config_1);
	array_push($arr2,$config_2);
	array_push($arr2,$config_3);
	array_push($arr2,$config_4);
	array_push($arr2,$config_5);
	array_push($arr2,$acceptance_certificate["number_of_system_modul"]);
	array_push($arr2,$acceptance_certificate["number_of_rf"]);
	array_push($arr2,$acceptance_certificate["number_of_antenna"]);
	array_push($arr2,format_tanggal($acceptance_certificate["installation_at"]));
	array_push($arr2,format_tanggal($acceptance_certificate["self_assessment_at"]));
	array_push($arr2,format_tanggal($acceptance_certificate["onair_at"]));
	

	echo str_replace($arr1,$arr2,read_file("htmls_bts/bts_02.html"));
?>