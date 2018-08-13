<?php
	if($_GET["export"]){
		$_exportname = "Project_Tracker.xls";
		header("Content-type: application/x-msdownload");
		header("Content-Disposition: attachment; filename=".$_exportname);
		header("Pragma: no-cache");
		header("Expires: 0");
		$_GET["do_filter"]="Load";
		$_isexport = true;
	}
	include_once "head.php";
?>
<?php if(!$_isexport){ ?>
	<div class="bo_title">Project Tracker</div>
	<?=$f->start("filter","GET");?>
	<div id="bo_expand" onclick="toogle_bo_filter();">[+] View Filter</div>
	<div id="bo_filter">
		<div id="bo_filter_container">
				<?=$t->start("","editor_content");?>
				<?php
					$sel_program_id		= $f->select("program_id",$db->fetch_select_data("indottech_programs","id","name",[],["name"],"",true),$_GET["program_id"],"style='height:34px;'","form-control");
					$sel_sow_id 		= $f->select("sow_id",$db->fetch_select_data("indottech_sow","id","name",[],["name"],"",true),$_GET["sow_id"],"style='height:34px;'","form-control");
					$sel_sow_detail_id 	= $f->select("sow_detail_id",$db->fetch_select_data("indottech_sow_detail","id","name",[],["name"],"",true),$_GET["sow_detail_id"],"style='height:34px;'","form-control");
					$sel_need_survey_id = $f->select("need_survey_id",["" => "","1" => "Yes","2" => "No","3" => "Take Over"],$_GET["need_survey_id"],"style='height:34px;'","form-control");
					$sel_project_type_id= $f->select("project_type_id",$db->fetch_select_data("indottech_project_types","id","name",[],["name"],"",true),$_GET["project_type_id"],"style='height:34px;'","form-control");
					$txt_site_kode		= $f->input("site_kode",$_GET["site_kode"],"","form-control");
				?>
				<?=$t->row(["Program",$sel_program_id]);?>
				<?=$t->row(["SOW",$sel_sow_id]);?>
				<?=$t->row(["SOW Detail",$sel_sow_detail_id]);?>
				<?=$t->row(["Need Survey",$sel_need_survey_id]);?>
				<?=$t->row(["Project Type",$sel_project_type_id]);?>
				<?=$t->row(["Kode Site",$txt_site_kode]);?>
				<?=$t->end();?>
				<?=$f->input("page","1","type='hidden'");?>
				<?=$f->input("sort",@$_GET["sort"],"type='hidden'");?>
		</div>
	</div>
	<div class="btn-group">
		<?=$f->input("do_filter","Load","type='submit' style='width:180px;'","btn btn-primary");?>
		<?=$f->input("export","Export to Excel","type='submit' style='width:180px;'","btn btn-success");?>
		<?=$f->input("reset","Reset","type='button' style='width:180px;' onclick=\"window.location='?';\"","btn btn-warning");?>
	</div>
	<?=$f->end();?>
	<br><?=$f->input("add","New Define Project","type='button' onclick=\"window.location='project_milestones_add.php';\"","btn btn-primary");?><br><br>
<?php } else { ?>
	<h2><b>Project Tracker</b></h2>
<?php } ?>
<?php
	$project_milestones = $db->fetch_all_data("indottech_project_milestones",[]);
?>
	<table class="table table-striped table-hover">
		<thead> <?=$t->header(["","Program","SOW","SOW Detail","Need Survey","Project Type","Site"]);?> </thead>
		<?php
			if(count($project_milestones) <= 0){
				?> <tr class="danger"><td colspan="7" align="center"><b>Data Not Found</b></td></tr> <?php
			} else {
				foreach($project_milestones as $project_milestone){
					$need_survey = "";
					if($project_milestone["need_survey"] == "1") $need_survey = "Yes";
					if($project_milestone["need_survey"] == "2") $need_survey = "No";
					if($project_milestone["need_survey"] == "3") $need_survey = "Take Over";
					echo $t->row([
						"<a href='project_milestones_edit.php?id=".$project_milestone["id"]."' class='btn btn-primary'>View</a>",
						$db->fetch_single_data("indottech_programs","name",["id" => $project_milestone["program_id"]]),
						$db->fetch_single_data("indottech_sow","name",["id" => $project_milestone["sow_id"]]),
						$db->fetch_single_data("indottech_sow_detail","name",["id" => $project_milestone["sow_detail_id"]]),
						$need_survey,
						$db->fetch_single_data("indottech_project_types","name",["id" => $project_milestone["project_type_id"]]),
						$db->fetch_single_data("indottech_sites","concat(site_code,' - ',name,' [',kode,']')",["id" => $project_milestone["site_id"]])
					]);
				}
			}
		?>
	</table>
<?php include_once "footer.php";?>