<html>
	<head>
		<meta http-equiv="refresh" content="5">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
		<link rel="stylesheet" type="text/css" href="../backoffice.css">
<?php 
	include_once "../common.php";
	$token = $_GET["token"];
	$tagging_at = $_GET["tagging_at"];
	$sitename = $_GET["sitename"];
	$fromlist = $_GET["fromlist"];
	$current = $_GET["current"];
	if($_GET["user_id"] == ""){
		$user_id = $db->fetch_single_data("users","id",["token" => $token]);
	} else {
		$user_id = $_GET["user_id"];
		$back = "<input type='button' value='Back' style='width:100%;height:50px;font-size:20px;font-weight:bolder;' onclick=\"window.location='geotagging_mine.php?token=".$token."&sitename=".$sitename."';\">";
	}
		
	$is_parent = false;
	$XXXuser_id = $db->fetch_single_data("users","id",["token" => $token]);
	if($db->fetch_single_data("indottech_group","id",["parent_user_id" => $XXXuser_id]) > 0) $is_parent = true;
	

	if($current || $fromlist){
?>
	<?=$back;?>
	<h2>Site Name : <b><?=$sitename;?></b></h2>
	<?php
		$db->addtable("indottech_geotagging");
		$db->where("user_id",$user_id);
		$db->where("tagging_at",$tagging_at);
		$db->where("sitename",$sitename);
		$indottech_geotaggings = $db->fetch_data(true);
		foreach($indottech_geotaggings as $indottech_geotagging){
			echo "<img src='../geophoto/".$indottech_geotagging["filename"]."' width='80' onclick='window.location=\"geotagging_img_detail.php?user_id=".$_GET["user_id"]."&token=".$token."&sitename=".$sitename."&id=".$indottech_geotagging["id"]."\";'>";
		}
	?>
<?php } else { ?>
	<table id="data_content">
		<tr>
			<?php if($is_parent){ ?>
				<th>Name</th>
			<?php } ?>
			<th>Sitename</th>
			<th>Tagging At</th>
			<th>Photo</th>
			<th>Download</th>
		</tr>
	<?php
		$db->addtable("indottech_geotagging");
		$db->awhere("sitename <>'' AND user_id = '".$user_id."' OR user_id IN (SELECT user_id FROM indottech_group WHERE parent_user_id = '".$user_id."') GROUP BY user_id,sitename,tagging_at ");
		$db->order("id DESC");
		$db->limit("100");
		$indottech_geotaggings = $db->fetch_data(true);
		foreach($indottech_geotaggings as $indottech_geotagging){
			$user_id = $indottech_geotagging["user_id"];
			$sitename = $indottech_geotagging["sitename"];
			$tagging_at = $indottech_geotagging["tagging_at"];
			$name = $db->fetch_single_data("users","name",["id" => $user_id]);
			$photo = $db->fetch_single_data("indottech_geotagging","count(0)",["user_id" => $indottech_geotagging["user_id"],"sitename"=>$sitename,"tagging_at"=>$tagging_at]);
			$download = "<a href='../geophoto/geotag_".$user_id."_site_".$sitename.".zip'>Download</a>";
			
			echo "<tr onclick=\"window.location='?token=".$token."&user_id=".$user_id."&fromlist=1&sitename=".$sitename."&tagging_at=".$tagging_at."'\">";
				if($is_parent){
					echo "<td>".$name."</td>";
				}
				echo "<td>".$indottech_geotagging["sitename"]."</td>";
				echo "<td>".format_tanggal($indottech_geotagging["tagging_at"],"dMY")."</td>";
				echo "<td>".$photo."</td>";
				echo "<td>".$download."</td>";
			echo "</tr>";
		}
	?>
	</table>
<?php } ?>
	</body>
</html>