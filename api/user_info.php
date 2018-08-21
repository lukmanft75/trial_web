<?php
	$token = $_GET["token"];
	if($token != ""){		
		$username = $db->fetch_single_data("users","email",["token" => $token]);
		$user_id = $db->fetch_single_data("users","id",["token" => $token]);
		$group_id = $db->fetch_single_data("users","group_id",["token" => $token]);
		$__username = $username;
		$_SESSION["username"] = $username;
		$__user_id = $user_id;
		$__group_id = $group_id;
	}
?>