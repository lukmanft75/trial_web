<?php include_once "head.php";?>
	<div class="bo_title">Geotagging</div>
	<?php
		$indottech_geotagging_req_id = $_GET["indottech_geotagging_req_id"];
		$user_id = $db->fetch_single_data("indottech_geotagging_req","user_id",["id" => $indottech_geotagging_req_id]);
		$name = $db->fetch_single_data("users","name",["id" => $user_id]);
		$site_id = $db->fetch_single_data("indottech_geotagging_req","site_id",["id" => $indottech_geotagging_req_id]);
		$sitename = $db->fetch_single_data("indottech_geotagging_req","sitename",["id" => $indottech_geotagging_req_id]);
		$tagging_at = $db->fetch_single_data("indottech_geotagging","tagging_at",["indottech_geotagging_req_id" => $indottech_geotagging_req_id]);
	?>
	Name : <b><?=$name;?></b><br>
	Site Name : <b><?=$sitename;?></b><br>
	Tagging At: <b><?=format_tanggal($tagging_at,"dMY");?></b><br>
	<br>
	<?=$f->input("download","Download All","type='button' onclick='window.open(\"geotag_downloader.php?id=".$indottech_geotagging_req_id."\");'");?>
	<?=$f->input("back","Back","type='button' onclick='window.location=\"indottech_geotagging_list.php\";'");?>
	<br>
	<br>
	<?php
		$db->addtable("indottech_geotagging");
		$db->where("indottech_geotagging_req_id",$indottech_geotagging_req_id);
		$indottech_geotaggings = $db->fetch_data(true);
		foreach($indottech_geotaggings as $indottech_geotagging){
			echo "<img src='geophoto/".$indottech_geotagging["filename"]."' width='200' onclick='window.open(\"geophoto/".$indottech_geotagging["filename"]."\");'>";
		}
	?>
	
<?php include_once "footer.php"; ?>