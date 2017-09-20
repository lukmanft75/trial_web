<?php
	include_once "../common.php";
	include_once "user_info.php";
	include_once "func.photo_items.php";
	$data = file_get_contents('php://input');
	$site_id = $_GET["site_id"];
	$sitename = $_GET["sitename"];
	$photo_item_id = $_GET["photo_item_id"];
	$indottech_geotagging_req_id = $_GET["indottech_geotagging_req_id"];
	$sitename = $db->fetch_single_data("indottech_geotagging_req","sitename",["id" => $indottech_geotagging_req_id]);
	$photo_item_name = get_complete_name($photo_item_id);
	
	$tagging_at = $_GET["tagging_at"];
	$basefilename = "tag_".$user_id."_".$site_id."_".$tagging_at."_".$photo_item_name.".jpg";
	$basezipfile = "geotag_".$user_id."_".$site_id."_".$tagging_at.".zip";
	$filename = "../geophoto/".$basefilename;
	$zipfile = "../geophoto/".$basezipfile;
	if (!(file_put_contents($filename,$data) === FALSE)){
		if(filesize($filename) > 3*1024*1024){
			echo "oversize||";
			exit();
		}
		$db->addtable("indottech_geotagging"); 
		$db->where("indottech_geotagging_req_id",$indottech_geotagging_req_id);
		$db->where("photo_item_id",$photo_item_id);
		$db->delete_();
		
		$db->addtable("indottech_geotagging");
		$db->addfield("indottech_geotagging_req_id");	$db->addvalue($indottech_geotagging_req_id);
		$db->addfield("user_id");						$db->addvalue($user_id);
		$db->addfield("site_id");						$db->addvalue($site_id);
		$db->addfield("sitename");						$db->addvalue($sitename);
		$db->addfield("tagging_at");					$db->addvalue($tagging_at);
		$db->addfield("photo_item_id");					$db->addvalue($photo_item_id);
		$db->addfield("filename");						$db->addvalue($basefilename);
		$db->addfield("created_at");					$db->addvalue(date("Y-m-d H:i:s"));
		$db->addfield("created_by");					$db->addvalue($username);
		$db->addfield("created_ip");					$db->addvalue($_SERVER["REMOTE_ADDR"]);
		$db->insert();
		$zip = new ZipArchive;
		if(true === ($zip->open($zipfile, ZipArchive::CREATE))){
			$zip->addFile($filename, $basefilename);
			$zip->close();
		}
		
		$photo_item_ids = pipetoarray($db->fetch_single_data("indottech_geotagging_req","photo_item_ids",["id" => $indottech_geotagging_req_id]));
		echo "File Transfered||".next_photo_item($photo_item_ids,$photo_item_id)."||".get_complete_name(next_photo_item($photo_item_ids,$photo_item_id));
	} else {
		echo "File Failed Transfered||"; 
	}
?>
