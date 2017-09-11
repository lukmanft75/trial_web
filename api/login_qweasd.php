<?php
	include_once "../common.php";
	if(login_action($_GET["username"],$_GET["password"]) == "1"){
		$token = session_id().$_GET["username"];
		$user_id = $db->fetch_single_data("users","id",["email" => $_GET["username"]]);
		$db->addtable("users");	$db->where("id",$user_id);
		$db->addfield("token");	$db->addvalue($token);
		$db->update();
		echo $token;
	} else {
		echo "0";
	}
?>
