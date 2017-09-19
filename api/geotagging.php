<?php
	include_once "../common.php";
	include_once "user_info.php";
	include_once "func.photo_items.php";
	
	if($_GET["requesting"] == "1"){
		include_once "func.sendingmail_v2.php";
		$lat = $_GET["lat"];
		$long = $_GET["long"];
		$sitename = $_GET["sitename"];
		$site_id = $_GET["site_id"];
		$name = $db->fetch_single_data("users","name",["token" => $token]);
		if($db->fetch_single_data("indottech_geotagging_req","id",["user_id" => $user_id,"site_id" => $site_id,"created_at" => date("Y-m-d")."%:LIKE"]) <= 0){
			$db->addtable("indottech_geotagging_req");
			$db->addfield("user_id");	$db->addvalue($user_id);
			$db->addfield("site_id");	$db->addvalue($site_id);
			$db->addfield("sitename");	$db->addvalue($sitename);
			$db->addfield("latitude");	$db->addvalue($lat);
			$db->addfield("longitude");	$db->addvalue($long);
			$db->addfield("status");	$db->addvalue(0);
			$db->addfield("created_at");$db->addvalue(date("Y-m-d H:i:s"));
			$db->addfield("created_by");$db->addvalue($username);
			$db->addfield("created_ip");$db->addvalue($_SERVER["REMOTE_ADDR"]);
			$db->addfield("updated_at");$db->addvalue(date("Y-m-d H:i:s"));
			$db->addfield("updated_by");$db->addvalue($username);
			$db->addfield("updated_ip");$db->addvalue($_SERVER["REMOTE_ADDR"]);
			$db->insert();
			
			$teamleaders = $db->fetch_all_data("users",[],"group_id = '11' AND forbidden_chr_dashboards='6'");
			foreach($teamleaders as $teamleader){	
				$address = $teamleader["email"];
				$address = "warih@corphr.com";
				$replyto = $db->fetch_single_data("users","email",["id" => $user_id]);
				$body = "<b>GeoTagging Request From ".$name." Sitename: [".$site_id."] ".$sitename."</b><br>";
				$body .= "<a href='http://103.253.113.201/indottech/indottech_geotagging_req_list.php' target='_BLANK'>";
				$body .= "Please visit Indottech - Dasboards or Indottech Apps for Approving this request!";
				$body .= "</a>";
				//sendingmail("GeoTagging Request From ".$name." Sitename: [".$site_id."] ".$sitename,$address,$body,$replyto);
				//sendingmail($teamleader["email"]." GeoTagging Request From ".$name." Sitename: [".$site_id."] ".$sitename,$address,$body,$replyto);
			}
		}
		echo "1";
	}
	if($_GET["wait_approving"] == "1"){
		$site_id = $_GET["site_id"];
		$indottech_geotagging_req_id = $db->fetch_single_data("indottech_geotagging_req","id",["user_id" => $user_id,"site_id" => $site_id,"created_at" => date("Y-m-d")."%:LIKE"]);
		if($indottech_geotagging_req_id > 0){
			$db->addtable("indottech_geotagging_req"); 
			$db->where("id",$indottech_geotagging_req_id);
			$db->addfield("status");	$db->addvalue("2");
			$db->addfield("updated_at");$db->addvalue(date("Y-m-d H:i:s"));
			$db->addfield("updated_by");$db->addvalue($username);
			$db->addfield("updated_ip");$db->addvalue($_SERVER["REMOTE_ADDR"]);
			$db->update();
			
			$photo_item_ids = pipetoarray($db->fetch_single_data("indottech_geotagging_req","photo_item_ids",["id" => $indottech_geotagging_req_id]));
			echo "geotagging_approved||".next_photo_item($photo_item_ids)."||".get_complete_name(next_photo_item($photo_item_ids))."||".$indottech_geotagging_req_id;
		}
	}
?>