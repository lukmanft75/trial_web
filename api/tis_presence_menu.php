<?php 
	include_once "header.php";
	// $atd_id = $_GET["atd_id"]; 
	// $project_name = $db->fetch_single_data("indottech_atd_cover","project_name",["id" => $atd_id]);
	// $site_name = $db->fetch_single_data("indottech_atd_cover","site_name",["id" => $atd_id]);
	// $is_rectifier = $db->fetch_single_data("indottech_atd_cover","id",["id" => $atd_id,"worktype_ids" => "%|3|%:LIKE"]);
	// if(!$is_rectifier) $is_rectifier = $db->fetch_single_data("indottech_atd_cover","id",["id" => $atd_id,"doctype" => "rectifier"]);
	// $is_btssran = $db->fetch_single_data("indottech_atd_cover","id",["id" => $atd_id,"doctype" => "bts_sran"]);
	
	$user = $db->fetch_single_data("users","name",["email" => $_SESSION["username"]]);
?>
<center><h4><b>TIS TEAM PRESENCE</b></h4></center>
<table>
	<tr><td>Welcome, </td><td><?=$user;?></td></tr>
	<tr><td>Date : </td><td><?= date("l") .", ". date("d-m-Y");?></td></tr>
</table>
<button class="big_button" onclick="window.location='tis_presence_add.php?token=<?=$token;?>';">Presence</button>
<br><br>
<button class="big_button" onclick="window.location='tis_presence_leave.php?token=<?=$token;?>';">Leave</button>
<br><br>
<button class="big_button" onclick="window.location='tis_presence_go_home.php?token=<?=$token;?>';">Go Home</button>
<!--
<button class="big_button" onclick="window.location='tis_presence_sick.php?token=<?=$token;?>&atd_id=<?=$atd_id;?>';">Sick</button>
<br><br>
<button class="big_button" onclick="window.location='tis_presence_permission.php?token=<?=$token;?>&atd_id=<?=$atd_id;?>';">Permission</button>
<br><br>
-->
<?php include_once "footer.php";?>