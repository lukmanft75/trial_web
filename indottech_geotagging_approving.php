<?php include_once "head.php";?>
<?php 
	if($__group_id == "12") { ?> <script> window.location="index.php"; </script> <?php } 
	if(isset($_POST["approved"]) && count($_POST["chk"]) > 0){
		$id = $_GET["id"];
		$db->addtable("indottech_geotagging_req");
		$db->where("id",$id);
		$db->addfield("status");		$db->addvalue("1");
		$db->addfield("photo_item_ids");$db->addvalue(sel_to_pipe($_POST["chk"]));
		$db->addfield("approved_by");	$db->addvalue($username);
		$db->addfield("approved_at");	$db->addvalue(date("Y-m-d H:i:s"));
		$db->addfield("approved_ip");	$db->addvalue($_SERVER["REMOTE_ADDR"]);
		$db->update();
		?><script> window.location="indottech_geotagging_req_list.php"; </script><?php
	}
	$data = $db->fetch_all_data("indottech_geotagging_req",[],"id='".$_GET["id"]."'")[0];
?>
<h3><b>Approving Geotagging</b></h3>
<table>
	<?=$t->row(["<b>Site ID</b>",":",$data["site_id"]]);?>
	<?=$t->row(["<b>Site Name</b>",":",$data["sitename"]]);?>
	<?=$t->row(["<b>Position</b>",":",$data["latitude"]." : ".$data["longitude"]]);?>
	<?=$t->row(["<b>Requested By</b>",":",$db->fetch_single_data("users","name",["id" => $data["user_id"]])]);?>
	<?=$t->row(["<b>Approve List</b>",":"]);?>
</table>
<form method="POST">
<?php
	$indottech_photo_items = $db->fetch_all_data("indottech_photo_items",[],"parent_id='0'");
	foreach($indottech_photo_items as $indottech_photo_item){
		echo $f->input("chk[]",$indottech_photo_item["id"],"type='checkbox'").$indottech_photo_item["name"]."<br>";
	}
	echo "<br>";
	echo $f->input("approved","Approved","type='submit'");
	echo "&nbsp;&nbsp;&nbsp;";
	echo $f->input("back","Back","type='button' onclick=\"window.location='indottech_geotagging_req_list.php?mode=showmap&lat=".$data["latitude"]."&long=".$data["longitude"]."&id=".$_GET["id"]."';\"");
?>
</form>
<?php include_once "footer.php";?>