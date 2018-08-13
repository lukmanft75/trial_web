<?php include_once "head.php";?>
<div class="bo_title">Project Tracker</div>
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
	
	$sel_program_id		= $f->select("program_id",$db->fetch_select_data("indottech_programs","id","name",[],["name"],"",true),$_POST["program_id"],"","form-control");
	$sel_sow_id 		= $f->select("sow_id",$db->fetch_select_data("indottech_sow","id","name",[],["name"],"",true),$_POST["sow_id"],"","form-control");
	$sel_sow_detail_id 	= $f->select("sow_detail_id",$db->fetch_select_data("indottech_sow_detail","id","name",[],["name"],"",true),$_POST["sow_detail_id"],"","form-control");
	$sel_need_survey 	= $f->select("need_survey",["" => "","1" => "Yes","2" => "No","3" => "Take Over"],$_POST["need_survey"],"","form-control");
	$sel_project_type_id= $f->select("project_type_id",$db->fetch_select_data("indottech_project_types","id","name",[],["name"],"",true),$_POST["project_type_id"],"","form-control");
	$sel_site_id		= $f->select("site_id",$db->fetch_select_data("indottech_sites","id","concat(name,' [',kode,']')",["name" => ":<>"],["name"],"",true),$_POST["site_id"],"","form-control");
?>
<?=$f->start("","POST","","enctype='multipart/form-data'");?>
	<?=$t->start("","editor_content");?>
        <?=$t->row(["<label>Program</label>",$sel_program_id]);?>
        <?=$t->row(["<label>SOW</label>",$sel_sow_id]);?>
        <?=$t->row(["<label>SOW Detail</label>",$sel_sow_detail_id]);?>
        <?=$t->row(["<label>Need Survey</label>",$sel_need_survey]);?>
        <?=$t->row(["<label>Project Type</label>",$sel_project_type_id]);?>
        <?=$t->row(["<label>Site</label>",$sel_site_id]);?>
	<?=$t->end();?>
	<br>
	<?=$f->input("save","Save","type='submit'","btn btn-primary");?> <?=$f->input("back","Back","type='button' onclick=\"window.location='".str_replace("_edit","_list",$_SERVER["PHP_SELF"])."';\"","btn btn-warning");?>
<?=$f->end();?>
<h3><b>MileStones</b></h3>
<?php
	echo "<a href='indottech_project_milestone_detail_add.php?project_milestone_id=".$_GET["id"]."' class='btn btn-primary'>Add Milestones</a>";
	$project_milestone_details = $db->fetch_all_data("indottech_project_milestone_details",[],"project_milestone_id = '".$_GET["id"]."'");
?>
	<table class="table table-striped table-hover">
		<thead> <?=$t->header(["Category","","Milestone Name","Load Percentage(%)","Estimation Done At","Actual Done At","Status"]);?> </thead>
		<?php
			if(count($project_milestone_details) <= 0){
				?> <tr class="danger"><td colspan="7" align="center"><b>Data Not Found</b></td></tr> <?php
			} else {
				foreach($project_milestone_details as $project_milestone_detail){
					echo $t->row([
						$db->fetch_single_data("indottech_milestone_categories","name",["id" => $project_milestone_detail["milestone_category_id"]]),
						$db->fetch_single_data("indottech_project_milestone_details","name",["id" => $project_milestone_detail["parent_id"]]),
						$project_milestone_detail["name"],
						$project_milestone_detail["percentage"],
						format_tanggal($project_milestone_detail["estimation_done_at"]),
						$f->input("datevalues",$project_milestone_detail["datevalues"],"type='date'","form-control"),
						$f->select("status",["0" => "Open","1" => "Done", "2" => "Reject", "3" => "Partial Reject"],$project_milestone_detail["status"],"","form-control")
					]);
				}
			}
		?>
	</table>
<?php include_once "footer.php";?>