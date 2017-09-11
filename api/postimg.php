<?php
	include_once "../common.php";
	$data = file_get_contents('php://input');
	$token = $_GET["token"];
	$username = $db->fetch_single_data("users","email",["token" => $token]);
	$user_id = $db->fetch_single_data("users","id",["token" => $token]);
	$sitename = $_GET["sitename"];
	$tagging_at = $_GET["tagging_at"];
	$basefilename = "geotag_".$user_id."_site_".$sitename."_".date("ymd_his").".jpg";
	$basezipfile = "geotag_".$user_id."_site_".$sitename.".zip";
	$filename = "../geophoto/".$basefilename;
	$zipfile = "../geophoto/".$basezipfile;
	if (!(file_put_contents($filename,$data) === FALSE)){
		$db->addtable("indottech_geotagging");
		$db->addfield("user_id");	$db->addvalue($user_id);
		$db->addfield("sitename");	$db->addvalue($sitename);
		$db->addfield("tagging_at");$db->addvalue(date("Y-m-d"));
		$db->addfield("filename");	$db->addvalue($basefilename);
		$db->addfield("created_at");$db->addvalue(date("Y-m-d H:i:s"));
		$db->addfield("created_by");$db->addvalue($username);
		$db->addfield("created_ip");$db->addvalue($_SERVER["REMOTE_ADDR"]);
		$db->insert();
		$zip = new ZipArchive;
		if(true === ($zip->open($zipfile, ZipArchive::CREATE | ZipArchive::OVERWRITE))){
			$zip->addFile($filename, $basefilename);
			$zip->close();
		}
		echo "File Transfered"; 
	} else {
		echo "File Failed Transfered"; 
	}
?>