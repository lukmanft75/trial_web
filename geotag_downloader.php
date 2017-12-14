<?php 
	include_once "common.php";
	$indottech_geotagging_req_id = $_GET["id"];
	$db->addtable("indottech_geotagging");	$db->where("indottech_geotagging_req_id",$indottech_geotagging_req_id);
	$geotags = $db->fetch_data(true);
	$files = "";
	$tagging_at = "";
	foreach($geotags as $geotag){
		$files .= "geophoto/".$geotag["filename"]." ";
		if($tagging_at == "" && $geotag["tagging_at"] != "0000-00-00") $tagging_at = $geotag["tagging_at"];
	}
	$user_id_site_id = $db->fetch_single_data("indottech_geotagging_req","concat(user_id,'_',site_id)",["id" => $indottech_geotagging_req_id]);
	$filezip = "geophoto/geotag_".$user_id_site_id."_".$tagging_at.".zip";
	$zipping = "zip ".$filezip." ".$files;
	exec("rm ".$filezip);
	exec($zipping);
	if(file_exists($filezip)){
		?> <script>  window.location="<?=$filezip;?>"; </script> <?php
	} else {
		?> <script> alert("Failed archiving files!"); window.close(); </script> <?php
	}
?>