<?php
	include_once "common.php";
	$atd_id = $_GET["id"];
	
	$arr1 = array();
	array_push($arr1,"{host}");
	
	$fullcontent = read_file("htmls_bts/bts_39.html");
	$temp_html = explode("<!--TableRemarks-->",$fullcontent);
	
	$innercontent = "";
	$bts_sran_7s = $db->fetch_all_data("indottech_bts_sran_7",[],"atd_id='".$atd_id."'");
		foreach($bts_sran_7s as $no => $bts_sran_7){
			$_arr1 = array();
			$_arr2 = array();
			array_push($_arr1,"{bts_39.no}");
			array_push($_arr1,"{bts_39.decription}");
			array_push($_arr1,"{bts_39.pic}");
			array_push($_arr1,"{bts_39.date_close}");

			array_push($_arr2,(1+$bts_sran_7["seqno"]));
			array_push($_arr2,$bts_sran_7["description"]);
			array_push($_arr2,$bts_sran_7["pic"]);
			array_push($_arr2,format_tanggal($bts_sran_7["close_at"]));

			$innercontent .= str_replace($_arr1,$_arr2,$temp_html[1]);
		}
	$fullcontent = $temp_html[0].$innercontent.$temp_html[2];
	
	$arr2 = array();
	array_push($arr2,"103.253.112.201");

	echo str_replace($arr1,$arr2,$fullcontent);
?>