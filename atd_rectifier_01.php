<?php
	include_once "common.php";
	$arr1 = array();
	array_push($arr1,"{host}");
	array_push($arr1,"{indottech_atd_cover.vendor}");
	array_push($arr1,"{indottech_atd_cover.project_name}");
	array_push($arr1,"{indottech_atd_cover.site_name}");
	array_push($arr1,"{indottech_atd_cover.acceptance_at}");
	
	
	$arr2 = array();
	array_push($arr2,"localhost");
	array_push($arr2,$db->fetch_single_data("indottech_atd_cover","vendor",["id" => $_GET["id"]]));
	array_push($arr2,$db->fetch_single_data("indottech_atd_cover","project_name",["id" => $_GET["id"]]));
	array_push($arr2,$db->fetch_single_data("indottech_atd_cover","site_name",["id" => $_GET["id"]]));
	array_push($arr2,format_tanggal($db->fetch_single_data("indottech_atd_cover","acceptance_at",["id" => $_GET["id"]])));
	
	echo str_replace($arr1,$arr2,read_file("htmls/rectifier_1.html"));
?>