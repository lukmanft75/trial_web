<?php include_once "head.php";?>
	<?php
		if(isset($_POST["save"])){
			$indottech_geotagging_req_id = $_GET["indottech_geotagging_req_id"];
			foreach($_POST["sn"] as $photo_item_id => $sn){
				$db->addtable("indottech_geotagging");
				$db->where("indottech_geotagging_req_id",$indottech_geotagging_req_id);
				$db->where("photo_item_id",$photo_item_id);
				$db->addfield("serial_number");		$db->addvalue($sn);
				$db->update();
			}
			$message = "<font color='blue'>Data Saved</font><br><br>";
		}
	?>
	<div class="bo_title">Geotagging</div>
	<?=($message != "")?$message:"";?>
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
		$db->order("photo_item_id");
		$indottech_geotaggings = $db->fetch_data(true);
		echo "<form method='POST' action='?indottech_geotagging_req_id=".$indottech_geotagging_req_id."'>";
			echo "<table><tr>";
			foreach($indottech_geotaggings as $indottech_geotagging){
				$photo_item = $db->fetch_single_data("indottech_photo_items","name",["id" => $indottech_geotagging["photo_item_id"]]);
				echo "<td valign='top'>";
				echo "<img src='geophoto/".$indottech_geotagging["filename"]."' width='200' onclick='window.open(\"geophoto/".$indottech_geotagging["filename"]."\");'>";
				if($indottech_geotagging["photo_item_id"] == "618" || $indottech_geotagging["photo_item_id"] == "620"){//photo item S/N SFP SRIO TDD FDD
					echo "<br><b>".$photo_item.":</b>";
					echo "<input name='sn[".$indottech_geotagging["photo_item_id"]."]' value='".$indottech_geotagging["serial_number"]."'>";
				}
				echo "</td>";
			}
			echo "</tr></table>";
			echo "<input type='submit' name='save' value='Save'>";
		echo "</form>";
	?>
	
<?php include_once "footer.php"; ?>