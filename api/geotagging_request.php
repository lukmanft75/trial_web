<html>
	<head>
		<meta http-equiv="refresh" content="5">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
		<link rel="stylesheet" type="text/css" href="../backoffice.css">
		<style>
		   #map {
			min-height:300px;
			height: 100%;
			width: 100%;
		   }
		</style>
	</head>
	<body id="bodyid" style="margin:0px;">
		<h2>Request List</b></h2>
<?php 
	include_once "../common.php";
	$token = $_GET["token"];
	$username = $db->fetch_single_data("users","email",["token" => $token]);
	$user_id = $db->fetch_single_data("users","id",["token" => $token]);
	if(!isset($_GET["mode"])){//listing
		$db->addtable("indottech_geotagging_req");
		$db->awhere("user_id IN (SELECT user_id FROM indottech_group WHERE parent_user_id='".$user_id."')");
		$db->order("status,id DESC");
		$db->limit("20");
		$indottech_geotagging_reqs = $db->fetch_data(true);
		?>
		<table id="data_content">
			<tr>
				<th>Name</th>
				<th>Sitename</th>
				<th>Location</th>
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
					$status = "<input type='button' value='Approve' onclick='window.location=\"?mode=approving&token=".$token."&id=".$id."\"'>";
				}
				if($indottech_geotagging_req["status"] == 1){
					$status = "Approved";
				}
				if($indottech_geotagging_req["status"] == 2){
					$status = "<b>Approved</b>";
				}
		?>
			<tr <?=$trstyle;?>>
				<td nowrap valign="top"><?=$db->fetch_single_data("users","name",["id" => $indottech_geotagging_req["user_id"]]);?></td>
				<td nowrap valign="top"><?=$indottech_geotagging_req["sitename"];?></td>
				<td valign="top"><a href="?mode=showmap&token=<?=$token;?>&lat=<?=$lat;?>&long=<?=$long;?>&id=<?=$id;?>"><?=$lat;?> ; <?=$long;?></a></td>
				<td nowrap valign="top"><?=$status;?></td>
			</tr>
		<?php
			}
		?>
		</table>
<?php
	} else if($_GET["mode"] == "approving"){
		$id = $_GET["id"];
		$db->addtable("indottech_geotagging_req");
		$db->where("id",$id);
		$db->addfield("status");		$db->addvalue("1");
		$db->addfield("approved_by");	$db->addvalue($username);
		$db->addfield("approved_at");	$db->addvalue(date("Y-m-d H:i:s"));
		$db->addfield("approved_ip");	$db->addvalue($_SERVER["REMOTE_ADDR"]);
		$db->update();
		?><script> window.location="?token=<?=$token;?>"; </script><?php
	} else if($_GET["mode"] == "showmap"){
			$id = $_GET["id"];
			$status = $db->fetch_single_data("indottech_geotagging_req","status",["id" => $id]);
		?>
			<input type="button" value="Back" style="width:100%;height:50px;font-size:20px;font-weight:bolder;" onclick="window.location='?token=<?=$token;?>';"><br>
			<?php if($status == "0"){ ?>
				<input type="button" value="Approve" style="width:100%;height:50px;font-size:20px;font-weight:bolder;" onclick="window.location='?mode=approving&token=<?=$token;?>&id=<?=$id;?>';">
			<?php } ?>
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
	</body>
</html>