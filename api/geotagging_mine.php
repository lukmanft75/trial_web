<?php
$fromlist = $_GET["fromlist"];
$current = $_GET["current"];
?>
<html>
	<head>
		<?php if(!$current && !$fromlist){ ?>
		<meta http-equiv="refresh" content="5">
		<?php } ?>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
		<link rel="stylesheet" type="text/css" href="../backoffice.css">
<?php 
	include_once "../common.php";
	include_once "user_info.php";
	include_once "func.photo_items.php";
	$tagging_at = $_GET["tagging_at"];
	$sitename = $_GET["sitename"];
	$site_id = $_GET["site_id"];
	if($_GET["user_id"] != ""){
		$user_id = $_GET["user_id"];
		$back = "<input type='button' value='Back' style='width:100%;height:50px;font-size:20px;font-weight:bolder;' onclick=\"window.location='geotagging_mine.php?token=".$token."&sitename=".$sitename."&site_id=".$site_id."';\">";
	}
		
	$is_parent = false;
	$XXXuser_id = $db->fetch_single_data("users","id",["token" => $token]);
	$XXXgroup_id = $db->fetch_single_data("users","group_id",["id" => $XXXuser_id]);
	if($db->fetch_single_data("indottech_group","id",["parent_user_id" => $XXXuser_id]) > 0) $is_parent = true;
	if($XXXgroup_id == 13 || $XXXgroup_id == 11 || $XXXgroup_id < 4) $is_parent = true;

	if($current || $fromlist){
?>
	<?=$back;?>
	<h4>Site Name : <b>[<?=$site_id;?>] <?=$sitename;?></b></h4>
	<?php
		$db->addtable("indottech_geotagging");
		$db->where("user_id",$user_id);
		$db->where("tagging_at",$tagging_at);
		$db->where("site_id",$site_id);
		$indottech_geotaggings = $db->fetch_data(true);
		echo "<ul>";
		foreach($indottech_geotaggings as $indottech_geotagging){
			echo "<li>";
			echo "<img src='../icons/cam.png' width='20' onclick='window.location=\"geotagging_img_detail.php?user_id=".$_GET["user_id"]."&token=".$token."&sitename=".$sitename."&site_id=".$site_id."&id=".$indottech_geotagging["id"]."\";'> ".get_complete_name($indottech_geotagging["photo_item_id"]);
			echo "</li>";
		}
		echo "</ul>";
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
		</tr>
	<?php
		$db->addtable("indottech_geotagging");
		if($XXXgroup_id == 13 || $XXXgroup_id == 11 || $XXXgroup_id < 4){
			$db->awhere("1=1 GROUP BY user_id,site_id,tagging_at ");
		} else {
			$db->awhere("site_id <>'' AND user_id = '".$user_id."' OR user_id IN (SELECT user_id FROM indottech_group WHERE parent_user_id = '".$user_id."') GROUP BY user_id,site_id,tagging_at ");
		}
		$db->order("id DESC");
		$db->limit("100");
		$indottech_geotaggings = $db->fetch_data(true);
		foreach($indottech_geotaggings as $indottech_geotagging){
			$user_id = $indottech_geotagging["user_id"];
			$site_id = $indottech_geotagging["site_id"];
			$sitename = $indottech_geotagging["sitename"];
			$tagging_at = $indottech_geotagging["tagging_at"];
			$name = $db->fetch_single_data("users","name",["id" => $user_id]);
			$photo = $db->fetch_single_data("indottech_geotagging","count(0)",["user_id" => $indottech_geotagging["user_id"],"site_id"=>$site_id,"tagging_at"=>$tagging_at]);
			$dl_url = "../geophoto/geotag_".$user_id."_".$site_id."_".$tagging_at.".zip";
			
			echo "<tr onclick=\"window.location='?token=".$token."&user_id=".$user_id."&fromlist=1&sitename=".$sitename."&site_id=".$site_id."&tagging_at=".$tagging_at."&dl_url=".$dl_url."'\">";
				if($is_parent){
					echo "<td>".$name."</td>";
				}
				echo "<td>[".$site_id."] ".$sitename."</td>";
				echo "<td>".format_tanggal($indottech_geotagging["tagging_at"],"dMY")."</td>";
				echo "<td>".$photo."</td>";
			echo "</tr>";
		}
	?>
	</table>
<?php } ?>
	</body>
</html>
