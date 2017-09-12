<?php include_once "head.php";?>
	<div class="bo_title">Geotagging</div>
	<?php
		$user_id = $_GET["user_id"];
		$name = $db->fetch_single_data("users","name",["id" => $user_id]);
		$sitename = $_GET["sitename"];
		$tagging_at = $_GET["tagging_at"];
	?>
	Name : <b><?=$name;?></b><br>
	Site Name : <b><?=$sitename;?></b><br>
	Tagging At: <b><?=format_tanggal($tagging_at,"dMY");?></b><br>
	<br>
	<?=$f->input("download","Download All","type='button' onclick='window.open(\"geophoto/geotag_".$user_id."_site_".$sitename."_".$tagging_at.".zip\");'");?>
	<?=$f->input("back","Back","type='button' onclick='window.location=\"indottech_geotagging_list.php\";'");?>
	<br>
	<br>
	<?php
		$db->addtable("indottech_geotagging");
		$db->where("user_id",$user_id);
		$db->where("tagging_at",$tagging_at);
		$db->where("sitename",$sitename);
		$indottech_geotaggings = $db->fetch_data(true);
		foreach($indottech_geotaggings as $indottech_geotagging){
			echo "<img src='geophoto/".$indottech_geotagging["filename"]."' width='200' onclick='window.open(\"geophoto/".$indottech_geotagging["filename"]."\");'>";
		}
	?>
	
<?php include_once "footer.php"; ?>