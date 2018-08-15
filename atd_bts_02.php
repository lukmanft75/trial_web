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
	// array_push($arr1,"{indottech_acceptance_certificate.wt_1}");
	// array_push($arr1,"{indottech_acceptance_certificate.wt_2}");
	// array_push($arr1,"{indottech_acceptance_certificate.wt_3}");
	// array_push($arr1,"{indottech_acceptance_certificate.wt_4}");
	// array_push($arr1,"{indottech_acceptance_certificate.st_1}");
	// array_push($arr1,"{indottech_acceptance_certificate.st_2}");
	// array_push($arr1,"{indottech_acceptance_certificate.st_3}");
	// array_push($arr1,"{indottech_acceptance_certificate.st_4}");
	// array_push($arr1,"{indottech_acceptance_certificate.st_5}");
	// array_push($arr1,"{indottech_acceptance_certificate.sm_1}");
	// array_push($arr1,"{indottech_acceptance_certificate.sm_2}");
	// array_push($arr1,"{indottech_acceptance_certificate.sm_3}");
	// array_push($arr1,"{indottech_acceptance_certificate.sm_4}");
	// array_push($arr1,"{indottech_acceptance_certificate.sm_5}");
	// array_push($arr1,"{indottech_acceptance_certificate.rm_1}");
	// array_push($arr1,"{indottech_acceptance_certificate.rm_2}");
	// array_push($arr1,"{indottech_acceptance_certificate.rm_3}");
	// array_push($arr1,"{indottech_acceptance_certificate.rm_4}");
	// array_push($arr1,"{indottech_acceptance_certificate.rm_5}");
	// array_push($arr1,"{indottech_acceptance_certificate.bc_1}");
	// array_push($arr1,"{indottech_acceptance_certificate.bc_2}");
	// array_push($arr1,"{indottech_acceptance_certificate.bc_3}");
	// array_push($arr1,"{indottech_acceptance_certificate.bc_4}");
	// array_push($arr1,"{indottech_acceptance_certificate.bc_5}");
	array_push($arr1,"{indottech_acceptance_certificate.number_sys}");
	array_push($arr1,"{indottech_acceptance_certificate.number_rf}");
	array_push($arr1,"{indottech_acceptance_certificate.number_antenna}");
	array_push($arr1,"{indottech_acceptance_certificate.install_date}");
	array_push($arr1,"{indottech_acceptance_certificate.self_date}");
	array_push($arr1,"{indottech_acceptance_certificate.on_air_date}");
	
	$acceptance_certificate = $db->fetch_all_data("indottech_acceptance_certificate",[],"atd_id='".$_GET["id"]."'")[0];
	$worktype = $db->fetch_single_data("indottech_acceptance_certificate","worktype_ids",["atd_id" => $_GET["id"]]);
	echo "<pre>";
	// echo pipetoarray ($worktype);
	echo $worktype;
	echo "</pre>";
	
	$arr2 = array();
	array_push($arr2,"localhost");
	array_push($arr2,$acceptance_certificate["po_number"]);
	array_push($arr2,$acceptance_certificate["site_id"]);
	array_push($arr2,$acceptance_certificate["site_name"]);
	array_push($arr2,$acceptance_certificate["site_address"]);
	array_push($arr2,$acceptance_certificate["site_longitude"]);
	array_push($arr2,$acceptance_certificate["site_latitude"]);
	array_push($arr2,$acceptance_certificate["number_of_system_modul"]);
	array_push($arr2,$acceptance_certificate["number_of_rf"]);
	array_push($arr2,$acceptance_certificate["number_of_antenna"]);
	array_push($arr2,format_tanggal($acceptance_certificate["installation_at"]));
	array_push($arr2,format_tanggal($acceptance_certificate["self_assessment_at"]));
	array_push($arr2,format_tanggal($acceptance_certificate["onair_at"]));
	

	echo str_replace($arr1,$arr2,read_file("htmls_bts/bts_02.html"));
?>