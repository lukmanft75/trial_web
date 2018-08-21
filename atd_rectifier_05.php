<?php
	$arr1 = array();
	array_push($arr1,"{host}");
	array_push($arr1,"{indottech_breakers.prio_kps}");
	array_push($arr1,"{indottech_breakers.prio_qty}");
	array_push($arr1,"{indottech_breakers.prio_name}");
	array_push($arr1,"{indottech_breakers.non_prio_kps}");
	array_push($arr1,"{indottech_breakers.non_prio_qty}");
	array_push($arr1,"{indottech_breakers.non_prio_name}");
	array_push($arr1,"{indottech_breakers.load_kps}");
	array_push($arr1,"{indottech_breakers.load_qty}");
	array_push($arr1,"{indottech_breakers.load_name}");
	
	$arr2 = array();
	array_push($arr2,"103.253.112.201");
	array_push($arr2,$db->fetch_single_data("indottech_breakers","capacity",["atd_id" => $_GET["id"],"seqno" => "0"]));
	array_push($arr2,$db->fetch_single_data("indottech_breakers","qty",["atd_id" => $_GET["id"],"seqno" => "0"]));
	array_push($arr2,ucwords($db->fetch_single_data("indottech_breakers","name",["atd_id" => $_GET["id"],"seqno" => "0"])));
	array_push($arr2,$db->fetch_single_data("indottech_breakers","capacity",["atd_id" => $_GET["id"],"seqno" => "1"]));
	array_push($arr2,$db->fetch_single_data("indottech_breakers","qty",["atd_id" => $_GET["id"],"seqno" => "1"]));
	array_push($arr2,ucwords($db->fetch_single_data("indottech_breakers","name",["atd_id" => $_GET["id"],"seqno" => "1"])));
	array_push($arr2,$db->fetch_single_data("indottech_breakers","capacity",["atd_id" => $_GET["id"],"seqno" => "2"]));
	array_push($arr2,$db->fetch_single_data("indottech_breakers","qty",["atd_id" => $_GET["id"],"seqno" => "2"]));
	array_push($arr2,ucwords($db->fetch_single_data("indottech_breakers","name",["atd_id" => $_GET["id"],"seqno" => "2"])));

	echo str_replace($arr1,$arr2,read_file("htmls/rectifier_5.html"));
?>