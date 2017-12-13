<?php include_once "head.php";?>
	<div class="bo_title">Geotagging Request</div>
	<style>
	   #map {
		min-height:300px;
		height: 100%;
		width: 100%;
	   }
	</style>
	<?php
	
	if(!isset($_GET["mode"])){//listing
		$db->addtable("indottech_geotagging_req");
		$db->order("status,id DESC");
		$db->limit("200");
		$indottech_geotagging_reqs = $db->fetch_data(true);
		?>
		<table id="data_content">
			<tr>
				<th>Name</th>
				<th>Site ID</th>
				<th>Sitename</th>
				<th>Location</th>
				<th>Request At</th>
				<th>Status</th>
			</tr>
		<?php
			foreach($indottech_geotagging_reqs as $indottech_geotagging_req){
				$trstyle = "";
				$id = $indottech_geotagging_req["id"];
				$lat = $indottech_geotagging_req["latitude"];
				$long = $indottech_geotagging_req["longitude"];
				if($indottech_geotagging_req["status"] == 0){
					$trstyle = "style='background-color:red;'";
					$status = "<input type='button' value='View' onclick='window.location=\"?mode=showmap&token=".$token."&lat=".$lat."&long=".$long."&id=".$id."\"'>";
				}
				if($indottech_geotagging_req["status"] == 1){
					$status = "<a href='?mode=showmap&token=".$token."&lat=".$lat."&long=".$long."&id=".$id."'>Approved</a>";
				}
				if($indottech_geotagging_req["status"] == 2){
					$status = "<b><a href='?mode=showmap&token=".$token."&lat=".$lat."&long=".$long."&id=".$id."'>Approved</a></b>";
				}
				if($indottech_geotagging_req["status"] == -1 || $indottech_geotagging_req["status"] == -2){
					$status = "<b style='color:red;'>Rejected</b>";
				}
				if($indottech_geotagging_req["fsfl_mode"] == 1){
					$indottech_geotagging_req["sitename"] .= " <b>[FSFL]</b>";
				}
		?>
			<tr <?=$trstyle;?>>
				<td nowrap valign="top"><?=$db->fetch_single_data("users","name",["id" => $indottech_geotagging_req["user_id"]]);?></td>
				<td nowrap valign="top"><?=$indottech_geotagging_req["site_id"];?></td>
				<td nowrap valign="top"><?=$indottech_geotagging_req["sitename"];?></td>
				<td valign="top"><a href="?mode=showmap&token=<?=$token;?>&lat=<?=$lat;?>&long=<?=$long;?>&id=<?=$id;?>"><?=$lat;?> ; <?=$long;?></a></td>
				<td nowrap valign="top"><?=format_tanggal($indottech_geotagging_req["created_at"]);?></td>
				<td nowrap valign="top"><?=$status;?></td>
			</tr>
		<?php
			}
		?>
		</table>
<?php
	} else if($_GET["mode"] == "showmap"){
			$id = $_GET["id"];
			$status = $db->fetch_single_data("indottech_geotagging_req","status",["id" => $id]);
			$data = $db->fetch_all_data("indottech_geotagging_req",[],"id='".$id."'")[0];
			if($status == "0") $btn_approve = "Approve";
			else $btn_approve = "View Photo Items";
		?>
			<input type="button" value="Back" onclick="window.location='?';">
			<?php if($status != "-1"){ ?>
			<input type="button" value="<?=$btn_approve;?>" onclick="window.location='indottech_geotagging_approving.php?id=<?=$id;?>&lat=<?=$_GET["lat"];?>&long=<?=$_GET["long"];?>';">
			<?php } ?>
			<?php if($status == "0"){ ?>
				<input type="button" value="Reject" onclick="window.location='indottech_geotagging_approving.php?reject=1&id=<?=$id;?>&lat=<?=$_GET["lat"];?>&long=<?=$_GET["long"];?>';">
			<?php } ?>
			<br><h3><b><?="[".$data["site_id"]."] ".$data["sitename"];?></b></h3>
			<b>Requested By <?=$db->fetch_single_data("users","name",["id" => $data["user_id"]]);?></b>
			<div id="map"></div>
			<script>
			  function initMap() {
				var uluru = {lat: <?=$_GET["lat"];?>, lng: <?=$_GET["long"];?>};
				var map = new google.maps.Map(document.getElementById('map'), {
				  zoom: 14,
				  center: uluru
				});
				var marker = new google.maps.Marker({
				  position: uluru,
				  map: map
				});
			  }
			</script>
			<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHByn7VH9j_uyzwIzM5WMsAJgQ43gdI7Q&callback=initMap">
			</script>
		<?php
	}
	
	?>
<?php include_once "footer.php"; ?>