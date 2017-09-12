<?php
	include_once "../common.php";
	$token = $_GET["token"];
	$username = $db->fetch_single_data("users","email",["token" => $token]);
	$user_id = $db->fetch_single_data("users","id",["token" => $token]);
	if($_GET["requesting"] == "1"){
		$lat = $_GET["lat"];
		$long = $_GET["long"];
		$sitename = $_GET["sitename"];
		$name = $db->fetch_single_data("users","name",["token" => $token]);
		$parent_user_id = $db->fetch_single_data("indottech_group","parent_user_id",["user_id" => $user_id]);
		$db->addtable("indottech_geotagging_req");
		$db->addfield("user_id");	$db->addvalue($user_id);
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
		
		$db->addtable("indottech_group");
		$db->addfield("parent_user_id");
		$db->where("user_id",$user_id);
		$parent_user_ids = $db->fetch_data(true);
		foreach($parent_user_ids as $indottech_group){		
			$db->addtable("indottech_notifications");
			$db->addfield("user_id");	$db->addvalue($indottech_group["parent_user_id"]);
			$db->addfield("message");	$db->addvalue("GeoTagging Request From ".$name);
			$db->addfield("status");	$db->addvalue("0");
			$db->addfield("created_at");$db->addvalue(date("Y-m-d H:i:s"));
			$db->addfield("created_by");$db->addvalue($username);
			$db->addfield("created_ip");$db->addvalue($_SERVER["REMOTE_ADDR"]);
			$db->addfield("updated_at");$db->addvalue(date("Y-m-d H:i:s"));
			$db->addfield("updated_by");$db->addvalue($username);
			$db->addfield("updated_ip");$db->addvalue($_SERVER["REMOTE_ADDR"]);
			$db->insert();
			//kirim email
		}
		echo "1";
	}
	if($_GET["wait_approving"] == "1"){
		$indottech_geotagging_req_id = $db->fetch_single_data("indottech_geotagging_req","id",["user_id" => $user_id,"status" => "1"]);
		if($indottech_geotagging_req_id > 0){
			$db->addtable("indottech_geotagging_req"); 
			$db->where("id",$indottech_geotagging_req_id);
			$db->addfield("status");	$db->addvalue("2");
			$db->addfield("updated_at");$db->addvalue(date("Y-m-d H:i:s"));
			$db->addfield("updated_by");$db->addvalue($username);
			$db->addfield("updated_ip");$db->addvalue($_SERVER["REMOTE_ADDR"]);
			$db->update();
			echo "geotagging_approved";
		}
	}
?>