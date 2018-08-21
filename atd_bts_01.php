<?php
	include_once "common.php";
	$arr1 = array();
	array_push($arr1,"{host}");
	array_push($arr1,"{indottech_atd_cover.worktype_1}");
	array_push($arr1,"{indottech_atd_cover.worktype_2}");
	array_push($arr1,"{indottech_atd_cover.worktype_3}");
	array_push($arr1,"{indottech_atd_cover.vendor}");
	array_push($arr1,"{indottech_atd_cover.project_name}");
	array_push($arr1,"{indottech_atd_cover.site_name}");
	array_push($arr1,"{indottech_atd_cover.acceptance_at}");
	array_push($arr1,"{indottech_atd_cover.acceptance_status_1}");
	array_push($arr1,"{indottech_atd_cover.acceptance_status_2}");
	array_push($arr1,"{indottech_atd_cover.acceptance_status_3}");
	
	
	$arr2 = array();
	array_push($arr2,"103.253.113.201");
	$worktype = $db->fetch_single_data("indottech_atd_cover","doctype",["id" => $_GET["id"]]);
	if ($worktype == "bts_sran") {
		$worktype_2 = "kotak_isi.jpg";
	} else {
		$worktype_2 = "kotak_kosong.jpg";
	}
	if ($worktype == "rectifier") {
		$worktype_3 = "kotak_isi.jpg";
	} else {
		$worktype_3 = "kotak_kosong.jpg";
	}
	$worktype_1 = "kotak_kosong.jpg";
	array_push($arr2,$worktype_1);
	array_push($arr2,$worktype_2);
	array_push($arr2,$worktype_3);

	array_push($arr2,$db->fetch_single_data("indottech_atd_cover","vendor",["id" => $_GET["id"]]));
	array_push($arr2,$db->fetch_single_data("indottech_atd_cover","project_name",["id" => $_GET["id"]]));
	array_push($arr2,$db->fetch_single_data("indottech_atd_cover","site_name",["id" => $_GET["id"]]));
	array_push($arr2,format_tanggal($db->fetch_single_data("indottech_atd_cover","acceptance_at",["id" => $_GET["id"]])));
	$acceptance_status = $db->fetch_single_data("indottech_atd_cover","acceptance_status",["id" => $_GET["id"]]);
	if ($acceptance_status == "1") {
		$val_1 = "kotak_isi.jpg";
	} else {
		$val_1 = "kotak_kosong.jpg";
	}
	if ($acceptance_status == "2") {
		$val_2 = "kotak_isi.jpg";
	} else {
		$val_2 = "kotak_kosong.jpg";
	}
	if ($acceptance_status == "3") {
		$val_3 = "kotak_isi.jpg";
	} else {
		$val_3 = "kotak_kosong.jpg";
	}
	array_push($arr2,$val_1);
	array_push($arr2,$val_2);
	array_push($arr2,$val_3);
	
	echo str_replace($arr1,$arr2,read_file("htmls_bts/bts_01.html"));
?>