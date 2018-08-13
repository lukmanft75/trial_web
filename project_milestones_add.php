<?php include_once "head.php";?>
<div class="bo_title">New Define Project</div>
<?php
	if(isset($_POST["save"])){
		$db->addtable("indottech_project_milestones");
		$db->addfield("program_id");	$db->addvalue($_POST["program_id"]);
		$db->addfield("sow_id");		$db->addvalue($_POST["sow_id"]);
		$db->addfield("sow_detail_id");	$db->addvalue($_POST["sow_detail_id"]);
		$db->addfield("need_survey");	$db->addvalue($_POST["need_survey_id"]);
		$db->addfield("project_type_id");$db->addvalue($_POST["project_type_id"]);
		$db->addfield("site_id");		$db->addvalue($_POST["site_id"]);
		$inserting = $db->insert();
		if($inserting["affected_rows"] > 0){
			$project_milestone_id = $inserting["insert_id"];
			javascript("window.location='project_milestones_edit.php?id=".$project_milestone_id."';");
		} else {
			$_SESSION["errormessage"] = "Penyimpanan data gagal";
		}
	}
	
	$sel_program_id		= $f->select("program_id",$db->fetch_select_data("indottech_programs","id","name",[],["name"],"",true),$_POST["program_id"],"","form-control");
	$sel_sow_id 		= $f->select("sow_id",$db->fetch_select_data("indottech_sow","id","name",[],["name"],"",true),$_POST["sow_id"],"","form-control");
	$sel_sow_detail_id 	= $f->select("sow_detail_id",$db->fetch_select_data("indottech_sow_detail","id","name",[],["name"],"",true),$_POST["sow_detail_id"],"","form-control");
	$sel_need_survey_id = $f->select("need_survey_id",["" => "","1" => "Yes","2" => "No","3" => "Take Over"],$_POST["need_survey_id"],"","form-control");
	$sel_project_type_id= $f->select("project_type_id",$db->fetch_select_data("indottech_project_types","id","name",[],["name"],"",true),$_POST["project_type_id"],"","form-control");
	$sel_site_id		= $f->select("site_id",$db->fetch_select_data("indottech_sites","id","concat(name,' [',kode,']')",["name" => ":<>"],["name"],"",true),$_POST["site_id"],"","form-control");
?>
<?=$f->start("","POST","","enctype='multipart/form-data'");?>
	<?=$t->start("","editor_content");?>
        <?=$t->row(["<label>Program</label>",$sel_program_id]);?>
        <?=$t->row(["<label>SOW</label>",$sel_sow_id]);?>
        <?=$t->row(["<label>SOW Detail</label>",$sel_sow_detail_id]);?>
        <?=$t->row(["<label>Need Survey</label>",$sel_need_survey_id]);?>
        <?=$t->row(["<label>Project Type</label>",$sel_project_type_id]);?>
        <?=$t->row(["<label>Site</label>",$sel_site_id]);?>
	<?=$t->end();?>
	<br>
	<?=$f->input("save","Save","type='submit'","btn btn-primary");?> <?=$f->input("back","Back","type='button' onclick=\"window.location='".str_replace("_add","_list",$_SERVER["PHP_SELF"])."';\"","btn btn-warning");?>
<?=$f->end();?>
<?php include_once "footer.php";?>