<?php 
	include_once "../common.php";
	include_once "user_info.php";
	$user_id = $_GET["user_id"];
	$sitename = $_GET["sitename"];
	$site_id = $_GET["site_id"];
	$dl_url = $_GET["dl_url"];
	$tagging_at = $db->fetch_single_data("indottech_geotagging","tagging_at",["id" => $_GET["id"]]);
	echo "<input type='button' value='Back' style='width:100%;height:50px;font-size:20px;font-weight:bolder;' onclick=\"window.location='geotagging_mine.php?fromlist=1&user_id=".$user_id."&token=".$token."&site_id=".$site_id."&sitename=".$sitename."&tagging_at=".$tagging_at."&dl_url=".$dl_url."';\">";
	echo "<img src='../geophoto/".$db->fetch_single_data("indottech_geotagging","filename",["id" => $_GET["id"]])."'' style='width:100%;'><br>";
?>