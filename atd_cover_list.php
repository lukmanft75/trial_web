<?php include_once "head.php";?>
	<div class="bo_title">ATP Installation</div>
	<div id="bo_expand" onclick="toogle_bo_filter();">[+] View Filter</div>
	<div id="bo_filter">
		<div id="bo_filter_container">
			<?=$f->start("filter","GET");?>
				<?=$t->start();?>
				<?php
					$sites = $db->fetch_select_data("indottech_sites","id","concat(site_code,' - ',name)",["project_id" => 13],"","",true);
					$sel_doctype = $f->select("sel_doctype",["" => "","rectifier" => "Rectifier","btssran" => "BTS SRAN"],@$_GET["sel_doctype"],"style='height:20px;'");
					$sel_worktype_id = $f->select("sel_worktype_id",["" => "","1" => "CIVIL WORK & INSTALLATION","2" => "RADIO BASE STATION", "3" => "RECTIFIER"],@$_GET["sel_worktype_id"],"style='height:20px;'");
					$sel_site_id = $f->select("sel_site_id",$sites,@$_GET["sel_site_id"],"style='height:20px;'");					
				?>
				<?=$t->row(array("Doc Type",$sel_doctype));?>
				<?=$t->row(array("Work Type",$sel_worktype_id));?>
				<?=$t->row(array("Site",$sel_site_id));?>
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
		
		$db->addtable("indottech_atd_cover");
		if($whereclause != "") $db->awhere(substr($whereclause,0,-4));
		if(@$_GET["sort"] == "") $_GET["sort"] = "id DESC";
		if(@$_GET["sort"] != "") $db->order($_GET["sort"]);
		$db->limit(2000);
		$atd_covers = $db->fetch_data(true);
	?>
	<?=$t->start("","data_content");?>
	<?=$t->header(["No","Doc Type", "Work Type", "Vendor Name", "Sites", "Acceptance Date", "Acceptance Status",""]);?>
	<?php
		$_acceptance_status = ["1" => "PASS, NO PENDING ITEMS","2" => "PASS WITH PENDING ITEMS","3" => "REJECTED BY XL AXIATA"];
		$arrworkTypes = ["1" => "CIVIL WORK & INSTALLATION", "2" => "RADIO BASE STATION", "3" => "RECTIFIER"];
		foreach($atd_covers as $no => $atd_cover){
			$doc_type = ["rectifier" => "RECTIFIER","bts_sran" => "BTS_SRAN"];
			$worktypes = "";
			foreach(pipetoarray($atd_cover["worktype_ids"]) as $worktype_id){
				$worktypes .= $arrworkTypes[$worktype_id].", ";
			}
			$worktypes = substr($worktypes,0,-2);
			$action = "<a target='_BLANK' href=\"atd_rectifier_download.php?id=".$atd_cover["id"]."\">Download</a>";
		
			echo $t->row([
							($no+1),
							$doc_type [$atd_cover["doctype"]],
							$worktypes,
							$atd_cover["vendor"],
							$atd_cover["site_id"]." ".$atd_cover["site_name"],
							format_tanggal($atd_cover["acceptance_at"]),
							$_acceptance_status[$atd_cover["acceptance_status"]],
							$action
						]);
		}
	?>
	</table>
	
<?php include_once "footer.php";?>
