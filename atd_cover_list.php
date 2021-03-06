<?php include_once "head.php";?>
	<div class="bo_title">ATP Installation</div>
	<div id="bo_expand" onclick="toogle_bo_filter();">[+] View Filter</div>
	<div id="bo_filter">
		<div id="bo_filter_container">
			<?=$f->start("filter","GET");?>
				<?=$t->start();?>
				<?php
					$sites = $db->fetch_select_data("indottech_sites","id","concat(site_code,' - ',name)",["project_id" => 13],["site_code ASC"],"",true);
					$projectS_name = $db->fetch_select_data("indottech_atd_cover","id","project_name","",["project_name ASC"],"",true);
					$projectS_by = $db->fetch_select_data("indottech_atd_cover","id","created_by","",["created_by ASC"],"",true);
					
					$sel_doctype = $f->select("sel_doctype",["" => "","rectifier" => "RECTIFIER","bts_sran" => "BTS SRAN"],@$_GET["sel_doctype"],"style='height:20px;'");
					$sel_worktype_id = $f->select("sel_worktype_id",["" => "","1" => "CIVIL WORK & INSTALLATION","2" => "RADIO BASE STATION", "3" => "RECTIFIER"],@$_GET["sel_worktype_id"],"style='height:20px;'");
					$sel_site_id = $f->select("sel_site_id",$sites,@$_GET["sel_site_id"],"style='height:20px;'");					
					$sel_proj_name = $f->select("SEL_PROJ_ID",$projectS_name,@$_GET["SEL_PROJ_ID"],"style='height:20px;'");					
					$sel_creat_by = $f->select("SEL_CREAT_BY",$projectS_by,@$_GET["SEL_CREAT_BY"],"style='height:20px;'");					
					$sel_creat_at =	$f->input("sel_creat_at",$_GET["sel_creat_at"],"type='date'");
				?>
				<?=$t->row(array("Doc Type",$sel_doctype));?>
				<?=$t->row(array("Work Type",$sel_worktype_id));?>
				<?=$t->row(array("Site",$sel_site_id));?>
				<?=$t->row(array("Project Name",strtoupper($sel_proj_name)));?>
				<?=$t->row(array("Created By",strtoupper($sel_creat_by)));?>
				<?=$t->row(array("Created At",$sel_creat_at));?>
				<?=$t->end();?>
				<?=$f->input("page","1","type='hidden'");?>
				<?=$f->input("sort",@$_GET["sort"],"type='hidden'");?>
				<?=$f->input("do_filter","Load","type='submit'");?>
				<?=$f->input("reset","Reset","type='button' onclick=\"window.location='?';\"");?>
			<?=$f->end();?>
		</div>
	</div>

	<?php
		if(@$_GET["sel_doctype"]!="") $whereclause .= "(doctype = '".$_GET["sel_doctype"]."') AND ";
		if(@$_GET["sel_worktype_id"]!="") $whereclause .= "(worktype_ids LIKE '%|".$_GET["sel_worktype_id"]."|%') AND ";
		if(@$_GET["sel_site_id"]!="") $whereclause .= "(site_id = '".$_GET["sel_site_id"]."') AND ";
		if(@$_GET["SEL_PROJ_ID"]!="") $whereclause .= "(id = '".$_GET["SEL_PROJ_ID"]."') AND ";
		if(@$_GET["SEL_CREAT_BY"]!="") $whereclause .= "(id = '".$_GET["SEL_CREAT_BY"]."') AND ";
		if(@$_GET["sel_creat_at"]!="") $whereclause .= "created_at LIKE '".$_GET["sel_creat_at"]."%' AND ";
		
		$db->addtable("indottech_atd_cover");
		if($whereclause != "") $db->awhere(substr($whereclause,0,-4));
		if(@$_GET["sort"] == "") $_GET["sort"] = "id DESC";
		if(@$_GET["sort"] != "") $db->order($_GET["sort"]);
		$db->limit(2000);
		$atd_covers = $db->fetch_data(true);
	?>
	<?=$t->start("","data_content");?>
	<?=$t->header(["No","Doc Type", "Work Type", "Vendor Name", "Project Name", "Sites", "Acceptance Date", "Acceptance Status", "Created By", "Created At", "Action"]);?>
	<?php
		$_acceptance_status = ["1" => "PASS, NO PENDING ITEMS","2" => "PASS WITH PENDING ITEMS","3" => "REJECTED BY XL AXIATA"];
		$arrworkTypes = ["1" => "CIVIL WORK & INSTALLATION", "2" => "RADIO BASE STATION", "3" => "RECTIFIER"];
		foreach($atd_covers as $no => $atd_cover){
			$doc_type = ["rectifier" => "RECTIFIER","bts_sran" => "BTS SRAN"];
			$worktypes = "";
			foreach(pipetoarray($atd_cover["worktype_ids"]) as $worktype_id){
				$worktypes .= $arrworkTypes[$worktype_id].", ";
			}
			$worktypes = substr($worktypes,0,-2);
			if($atd_cover["doctype"]=="rectifier"){
				$action = "<a target='_BLANK' href=\"atd_rectifier_download.php?id=".$atd_cover["id"]."\">Download</a>";
			} else {
				$action = "<a target='_BLANK' href=\"atd_bts_download.php?id=".$atd_cover["id"]."\">Download</a>";
			}
			$created_By = $db->fetch_single_data ("users", "name", ["email" => $atd_cover["created_by"]]);
			echo $t->row([
							($no+1),
							$doc_type [$atd_cover["doctype"]],
							$worktypes,
							$atd_cover["vendor"],
							strtoupper($atd_cover["project_name"]),
							$atd_cover["site_id"]." ".$atd_cover["site_name"],
							format_tanggal($atd_cover["acceptance_at"]),
							$_acceptance_status[$atd_cover["acceptance_status"]],
							$created_By,
							format_tanggal($atd_cover["created_at"]),
							$action
						]);
		}
	?>
	</table>
	
<?php include_once "footer.php";?>
