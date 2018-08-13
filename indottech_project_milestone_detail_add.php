<?php include_once "head.php";?>
<div class="bo_title">Milestone Detail Add</div>
<?php
	$project_milestone_id = $_GET["project_milestone_id"];
	if(isset($_POST["save"])){
		$db->addtable("indottech_project_milestone_details");
		$db->addfield("project_milestone_id");	$db->addvalue($project_milestone_id);
		$db->addfield("milestone_category_id");	$db->addvalue($_POST["milestone_category_id"]);
		$db->addfield("parent_id");				$db->addvalue($_POST["parent_id"]);
		$db->addfield("name");					$db->addvalue($_POST["name"]);
		$db->addfield("estimation_done_at");	$db->addvalue($_POST["estimation_done_at"]);
		$db->addfield("percentage");			$db->addvalue($_POST["percentage"]);
		$inserting = $db->insert();
		if($inserting["affected_rows"] > 0){
			javascript("window.location='project_milestones_edit.php?id=".$_GET["project_milestone_id"]."';");
		} else {
			$_SESSION["errormessage"] = "Penyimpanan data gagal";
		}
	}
	
	$sel_milestone_category_id 	= $f->select("milestone_category_id",$db->fetch_select_data("indottech_milestone_categories","id","name"),$_POST["milestone_category_id"],"","form-control");
	$sel_parent_id 				= $f->select("parent_id",$db->fetch_select_data("indottech_project_milestone_details","id","name",["project_milestone_id" => $project_milestone_id],["name"],"",true),$_POST["sow_id"],"","form-control");
	$txt_name					= $f->input("name",$_POST["name"],"","form-control");
	$txt_estimation_done_at		= $f->input("estimation_done_at",$_POST["estimation_done_at"],"type='date'","form-control");
	$txt_percentage				= $f->input("percentage",$_POST["percentage"],"type='number' step='any'","form-control");
	
?>
<?=$f->start("","POST","","enctype='multipart/form-data'");?>
	<?=$t->start("","editor_content");?>
        <?=$t->row(["<label>Category</label>",$sel_milestone_category_id]);?>
        <?=$t->row(["<label>Parent</label>",$sel_parent_id]);?>
        <?=$t->row(["<label>Mailestone Name</label>",$txt_name]);?>
        <?=$t->row(["<label>Estimation Done At</label>",$txt_estimation_done_at]);?>
        <?=$t->row(["<label>Load Percentage (%)</label>",$txt_percentage]);?>
	<?=$t->end();?>
	<br>
	<?=$f->input("save","Save","type='submit'","btn btn-primary");?> <?=$f->input("back","Back","type='button' onclick=\"window.location='project_milestones_edit.php?id=".$_GET["project_milestone_id"]."';\"","btn btn-warning");?>
<?=$f->end();?>
<?php include_once "footer.php";?>