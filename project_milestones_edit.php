<?php include_once "head.php";?>
<div class="bo_title">New Define Project</div>
<?php
	if(isset($_POST["save"])){
		$db->addtable("indottech_project_milestones");
		$db->where("id",$_GET["id"]);
		$db->addfield("program_id");	$db->addvalue($_POST["program_id"]);
		$db->addfield("sow_id");		$db->addvalue($_POST["sow_id"]);
		$db->addfield("sow_detail_id");	$db->addvalue($_POST["sow_detail_id"]);
		$db->addfield("need_survey");	$db->addvalue($_POST["need_survey_id"]);
		$db->addfield("project_type_id");$db->addvalue($_POST["project_type_id"]);
		$db->addfield("site_id");		$db->addvalue($_POST["site_id"]);
		$updating = $db->update();
		if($updating["affected_rows"] > 0){
			$_SESSION["message"] = "Penyimpanan data Berhasil";
		} else {
			$_SESSION["errormessage"] = "Penyimpanan data gagal";
		}
	}
	
	$_POST = $db->fetch_all_data("indottech_project_milestones",[],"id = '".$_GET["id"]."'")[0];
	
	$sel_program_id		= $f->select("program_id",$db->fetch_select_data("indottech_programs","id","name",[],["name"],"",true),$_POST["program_id"],"style='height:25px;'");
	$sel_sow_id 		= $f->select("sow_id",$db->fetch_select_data("indottech_sow","id","name",[],["name"],"",true),$_POST["sow_id"],"style='height:25px;'");
	$sel_sow_detail_id 	= $f->select("sow_detail_id",$db->fetch_select_data("indottech_sow_detail","id","name",[],["name"],"",true),$_POST["sow_detail_id"],"style='height:25px;'");
	$sel_need_survey 	= $f->select("need_survey",["" => "","1" => "Yes","2" => "No","3" => "Take Over"],$_POST["need_survey"],"style='height:25px;'");
	$sel_project_type_id= $f->select("project_type_id",$db->fetch_select_data("indottech_project_types","id","name",[],["name"],"",true),$_POST["project_type_id"],"style='height:25px;'");
	$sel_site_id		= $f->select("site_id",$db->fetch_select_data("indottech_sites","id","concat(name,' [',kode,']')",["name" => ":<>"],["name"],"",true),$_POST["site_id"],"style='height:25px;'");
?>
<?=$f->start("","POST","","enctype='multipart/form-data'");?>
	<?=$t->start("","editor_content");?>
        <?=$t->row(["Program",$sel_program_id]);?>
        <?=$t->row(["SOW",$sel_sow_id]);?>
        <?=$t->row(["SOW Detail",$sel_sow_detail_id]);?>
        <?=$t->row(["Need Survey",$sel_need_survey]);?>
        <?=$t->row(["Project Type",$sel_project_type_id]);?>
        <?=$t->row(["Site",$sel_site_id]);?>
	<?=$t->end();?>
	<br>
	<?=$f->input("save","Save","type='submit'");?> <?=$f->input("back","Back","type='button' onclick=\"window.location='".str_replace("_edit","_list",$_SERVER["PHP_SELF"])."';\"");?>
<?=$f->end();?>
<h3><b>MileStones</b></h3>
<?php
	echo $f->input("add_milestones","Add Milestones","type='button'");
?>
<?php include_once "footer.php";?>