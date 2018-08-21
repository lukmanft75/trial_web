<?php
	$hari = ["1" => "Senin","2" => "Selasa","3" => "Rabu", "4" => "kamis", "5" => "Jum'at", "6" => "Sabtu", "7" => "Minggu"];
	$bulan = ["1" => "Januari","2" => "Februari","3" => "Maret", "4" => "April", "5" => "Mei", "6" => "Juni", "7" => "Juli", "8" => "Agustus", "9" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember"];
	$arr1 = array();
	array_push($arr1,"{host}");
	array_push($arr1,"{indottech_ba_ujiterima.ba_vendor}");
	array_push($arr1,"{indottech_ba_ujiterima.ba_at.day}");
	array_push($arr1,"{indottech_ba_ujiterima.ba_at.date}");
	array_push($arr1,"{indottech_ba_ujiterima.ba_at.month}");
	array_push($arr1,"{indottech_ba_ujiterima.ba_at.year}");
	array_push($arr1,"{indottech_ba_ujiterima.ba_site_name}");
	array_push($arr1,"{indottech_ba_ujiterima.ba_site_address}");
	array_push($arr1,"{indottech_ba_ujiterima.ba_area}");
	array_push($arr1,"{indottech_ba_ujiterima.ba_nbw_no}");
	array_push($arr1,"{indottech_ba_ujiterima.ba_po}");
	array_push($arr1,"{indottech_ba_ujiterima.ba_resv}");
	
	
	$ba_ujiterima = $db->fetch_all_data("indottech_ba_ujiterima",[],"atd_id='".$_GET["id"]."'")[0];

	$arr2 = array();
	array_push($arr2,"103.253.112.201");
	array_push($arr2,$ba_ujiterima["vendor"]);
	$ba_created_at = explode("-",substr($ba_ujiterima["ba_at"],0,10));
	array_push($arr2,$hari[date("N",mktime(0,0,0,$ba_created_at[1],$ba_created_at[2],$ba_created_at[0]))]);
	array_push($arr2,$ba_created_at[2]);
	array_push($arr2,$bulan[date("n",mktime(0,0,0,$ba_created_at[1],$ba_created_at[2],$ba_created_at[0]))]);
	array_push($arr2,$ba_created_at[0]);
	array_push($arr2,$ba_ujiterima["site_name"]);
	array_push($arr2,$ba_ujiterima["site_address"]);
	array_push($arr2,$ba_ujiterima["area"]);
	array_push($arr2,$ba_ujiterima["nbw_no"]);
	array_push($arr2,$ba_ujiterima["pono"]);
	array_push($arr2,$ba_ujiterima["resv_no"]);
	
	echo str_replace($arr1,$arr2,read_file("htmls/rectifier_2.html"));
?>