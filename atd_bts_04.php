<?php
	include_once "common.php";
	$arr1 = array();
	array_push($arr1,"{host}");

	
	$arr2 = array();
	array_push($arr2,"103.253.112.201");

	echo str_replace($arr1,$arr2,read_file("htmls_bts/bts_04.html"));
?>