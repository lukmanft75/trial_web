<?php
	$token = $_GET["token"];
	$username = $db->fetch_single_data("users","email",["token" => $token]);
	$user_id = $db->fetch_single_data("users","id",["token" => $token]);
	$group_id = $db->fetch_single_data("users","group_id",["token" => $token]);
?>