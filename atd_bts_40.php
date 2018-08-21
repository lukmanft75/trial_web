<?php
	include_once "common.php";
	$arr1 = array();
	array_push($arr1,"{host}");
	array_push($arr1,"{bts_40.po}");
	array_push($arr1,"{bts_40.site_id}");
	array_push($arr1,"{bts_40.site_name}");
	array_push($arr1,"{bts_40.work_type}");
	array_push($arr1,"{bts_40.date}");
	array_push($arr1,"{bts_40.regional_mgr}");
	array_push($arr1,"{bts_40.xl_representative}");

	$acceptance_certificate = $db->fetch_all_data("indottech_acceptance_certificate",[],"atd_id='".$_GET["id"]."'")[0];
	
	$arrworkIds = ["1" => "New Sites", "2" => "Swap BTS, Swap antenna", "3" => "Swap BTS, use antenna Existing", "4" => "Outorization 	"];
		$workTypeIds = "";
		foreach(pipetoarray($acceptance_certificate["worktype_ids"]) as $worktype_id){
			$workTypeIds .= $arrworkIds[$worktype_id].", ";
		}
		$workTypeIds = substr($workTypeIds,0,-2);
	
	$bts_40 = $db->fetch_all_data("indottech_bts_sran_8",[],"atd_id='".$_GET["id"]."'")[0];
	
	$arr2 = array();
	array_push($arr2,"103.253.112.201");
	array_push($arr2,$acceptance_certificate["po_number"]);
	array_push($arr2,$acceptance_certificate["site_id"]);
	array_push($arr2,$acceptance_certificate["site_name"]);
	array_push($arr2,$workTypeIds);
	array_push($arr2,format_tanggal($bts_40["approval_at"]));
	array_push($arr2,$bts_40["regional_manager_name"]);
	array_push($arr2,$bts_40["xl_representative_name"]);

	echo str_replace($arr1,$arr2,read_file("htmls_bts/bts_40.html"));
?>