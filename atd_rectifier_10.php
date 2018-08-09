<?php
	include_once "common.php";
	$hari = ["1" => "Senin","2" => "Selasa","3" => "Rabu", "4" => "kamis", "5" => "Jum'at", "6" => "Sabtu", "7" => "Minggu"];
	$bulan = ["1" => "Januari","2" => "Februari","3" => "Maret", "4" => "April", "5" => "Mei", "6" => "Juni", "7" => "Juli", "8" => "Agustus", "9" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember"];
	$arr1 = array();
	array_push($arr1,"{host}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.date}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.customer}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.site_name}");
	array_push($arr1,"{indottech_photos.rectifier_open}");
	array_push($arr1,"{indottech_photos.rectifier_close}");
	array_push($arr1,"{indottech_photos.ac_input}");
	array_push($arr1,"{indottech_photos.mcb_output}");
	array_push($arr1,"{indottech_photos.rectifier_module}");
	array_push($arr1,"{indottech_photos.battery}"); //tidak ada di tabel indottech_photos
	array_push($arr1,"{indottech_photos.alarm}");
	array_push($arr1,"{indottech_photos.rectifier_alarm}");
	array_push($arr1,"{indottech_photos.genset}");
	array_push($arr1,"{indottech_photos.site_all}");
	array_push($arr1,"{indottech_photos.kwh_panel}");
	array_push($arr1,"{indottech_photos.acpdb}");
	
	$indottech_atr= $db->fetch_all_data("indottech_acceptance_test_rectifier",[],"atd_id='".$_GET["id"]."'")[0];
	
	$arr2 = array();
	array_push($arr2,"localhost");
	array_push($arr2,format_tanggal($indottech_atr["test_at"]));
	array_push($arr2,$indottech_atr["customer"]);
	array_push($arr2,$indottech_atr["site_name"]);
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "896"]));
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "897"]));
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "898"]));
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "899"]));
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "900"]));
	array_push($arr2,"Belum_terdefinisikan_lokasi_gambar_battery");
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "901"]));
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "902"]));
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "903"]));
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "904"]));
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "905"]));
	array_push($arr2,$db->fetch_single_data("indottech_photos","filename",["atd_id" => $_GET["id"],"photo_items_id" => "906"]));
	
	echo str_replace($arr1,$arr2,read_file("htmls/rectifier_10.html"));
?>