<?php include_once "head.php";?>
<div class="bo_title">Photo Items</div>
<div id="bo_expand" onclick="toogle_bo_filter();">[+] View Filter</div>
<div id="bo_filter">
	<div id="bo_filter_container">
		<?=$f->start("filter","GET");?>
			<?=$t->start();?>
			<?php
				$itemtypes = ["" => "","1"=>"Survey","2"=>"Installation","3"=>"Dismantle","4"=>"HS"];
				$sel_parent_id = $f->select("sel_parent_id",$db->fetch_select_data("indottech_photo_items","id","name",["is_childest" => "0"],[],"",true),@$_GET["sel_parent_id"],"style='height:20px'");
				$sel_itemtype= $f->select("sel_itemtype",$itemtypes,@$_GET["sel_itemtype"],"style='height:20px'");
				$txt_name = $f->input("txt_name",@$_GET["txt_name"]);
			?>
			<?=$t->row(array("Group",$sel_parent_id));?>
			<?=$t->row(array("Type",$sel_itemtype));?>
			<?=$t->row(array("Name",$txt_name));?>
			<?=$t->end();?>
			<?=$f->input("page","1","type='hidden'");?>
			<?=$f->input("sort",@$_GET["sort"],"type='hidden'");?>
			<?=$f->input("do_filter","Load","type='submit'");?>
			<?=$f->input("reset","Reset","type='button' onclick=\"window.location='?';\"");?>
		<?=$f->end();?>
	</div>
</div>

<?php
	$whereclause = "";
	if(@$_GET["sel_parent_id"]!="") $whereclause .= "parent_id = '".$_GET["sel_parent_id"]."' AND ";
	if(@$_GET["sel_itemtype"]!="") $whereclause .= "itemtype = '".$_GET["sel_itemtype"]."' AND ";
	if(@$_GET["txt_name"]!="") $whereclause .= "name LIKE '"."%".str_replace(" ","%",$_GET["txt_name"])."%"."' AND ";
	
	$db->addtable("indottech_photo_items");
	if($whereclause != "") $db->awhere(substr($whereclause,0,-4));$db->limit($_max_counting);
	$maxrow = count($db->fetch_data(true));
	$start = getStartRow(@$_GET["page"],$_rowperpage);
	$paging = paging($_rowperpage,$maxrow,@$_GET["page"],"paging");
	
	$db->addtable("indottech_photo_items");
	if($whereclause != "") $db->awhere(substr($whereclause,0,-4));$db->limit($start.",".$_rowperpage);
	if(@$_GET["sort"] != "") $db->order($_GET["sort"]);
	$indottech_photo_items = $db->fetch_data(true);
?>
	<?=$f->input("add","Add","type='button' onclick=\"window.location='indottech_photo_items_add.php';\"");?>
	<?=$paging;?>
	<?=$t->start("","data_content");?>
	<?=$t->header(["No",
						"<div onclick=\"sorting('itemtype');\">Type</div>",
						"<div onclick=\"sorting('parent_id');\">Group</div>",
						"<div onclick=\"sorting('name');\">Name</div>",
						""]);?>
	<?php foreach($indottech_photo_items as $no => $indottech_photo_item){ ?>
		<?php
			//$actions = 	"<a href=\"indottech_photo_items_edit.php?id=".$indottech_photo_item["id"]."\">Edit</a>";
			if($indottech_photo_item["itemtype"] == "1") $itemtype = "Survey";
			if($indottech_photo_item["itemtype"] == "2") $itemtype = "Installation";
			if($indottech_photo_item["itemtype"] == "3") $itemtype = "Dismantle";
			if($indottech_photo_item["itemtype"] == "4") $itemtype = "HS";
			$group = $db->fetch_single_data("indottech_photo_items","name",["id" => $indottech_photo_item["parent_id"]]);
			$group_parent_id = $db->fetch_single_data("indottech_photo_items","parent_id",["id" => $indottech_photo_item["parent_id"]]);
			if($group_parent_id > 0) $group = $db->fetch_single_data("indottech_photo_items","name",["id" => $group_parent_id])." -- ".$group;
		?>
		<?=$t->row(
					[$no+$start+1,$itemtype,
					$group,
					$indottech_photo_item["name"],
					$actions],
					array("align='right' valign='top'","")
				);?>
	<?php } ?>
	<?=$t->end();?>
	<?=$paging;?>
	
<?php include_once "footer.php";?>