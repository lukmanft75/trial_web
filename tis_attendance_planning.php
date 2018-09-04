<?php
	include_once "head.php";
	if($_GET["deleting"]){
		$db->addtable("tis_attendance_daily_planing"); $db->where("id",$_GET["deleting"]); $db->delete_();
		?> <script> window.location="?";</script> <?php
	}
	if($_POST["next_trx"]){
		$_SESSION["sesi_txt_working"] = $_POST["txt_working"];
		javascript("window.location='tis_attendance_planning.php?mode=addpersonil&site=".$_POST["sel_site"]."&nopol=".$_POST["txt_nopol"]."';");
	} else if ($_POST["new_trx"]){
		unset($_SESSION["sesi_txt_working"]);
		javascript("window.location='tis_attendance_planning.php?mode=add';");
	} else if ($_POST["add_personil_trx"]){
		if($_POST["sel_user"] >= "1") {
			$tis_att_planing = $db->fetch_single_data ("tis_attendance_daily_planing", "id", ["users_id" => $_POST["sel_user"] , "plan_date" => date("Y-m-d")]);
			if (!$tis_att_planing){
				$sitedetail	= $db->fetch_all_data("indottech_sites", [], "id ='".$_GET["site"]."'")[0];
				$userdetail	= $db->fetch_all_data("users", [], "id ='".$_POST["sel_user"]."'")[0];
				$db->addtable("tis_attendance_daily_planing");
				$db->addfield("plan_date");				$db->addvalue(date("Y-m-d"));
				$db->addfield("sites_id");				$db->addvalue($sitedetail["id"]);
				$db->addfield("sites_name");			$db->addvalue($sitedetail["name"]." [".$sitedetail["kode"]."]");
				$db->addfield("sites_longitude");		$db->addvalue($sitedetail["longitude"]);
				$db->addfield("sites_latitude");		$db->addvalue($sitedetail["latitude"]);
				$db->addfield("plan_nopol");			$db->addvalue($_GET["nopol"]);
				$db->addfield("plan_working");			$db->addvalue($_SESSION["sesi_txt_working"]);
				$db->addfield("users_id");				$db->addvalue($_POST["sel_user"]);
				$db->addfield("users_name");			$db->addvalue($userdetail["name"]);
				$inserting = $db->insert();
					if($inserting["affected_rows"] > 0){
						javascript("alert('Daily Planing Saved');");
					} else {
						javascript("alert('Data Failed to Save');");
					}
			} else {
				javascript("alert('Candidate has been planned, please select other candidate');");
			}
		} else {
				javascript("alert('Please select the candidate');");
		}
	} else if ($_POST["edit_trx"]) {
			$sitedetail	= $db->fetch_all_data("indottech_sites", [], "id ='".$_POST["sel_site"]."'")[0];
			$db->addtable("tis_attendance_daily_planing");
			$db->addfield("sites_id");				$db->addvalue($sitedetail["id"]);
			$db->addfield("sites_name");			$db->addvalue($sitedetail["name"]." [".$sitedetail["kode"]."]");
			$db->addfield("sites_longitude");		$db->addvalue($sitedetail["longitude"]);
			$db->addfield("sites_latitude");		$db->addvalue($sitedetail["latitude"]);
			$db->addfield("plan_nopol");			$db->addvalue($_POST["txt_nopol"]);
			$db->addfield("plan_working");			$db->addvalue($_POST["txt_working"]);
			$db->where("id",$_POST["id_edit"]);
			$inserting = $db->update();
				if($inserting["affected_rows"] > 0){
					javascript("alert('Data Has Updated');");
					javascript("window.location='tis_attendance_planning.php';");
				} else {
					javascript("alert('Data Failed to Update);");
				}
	}
?>

<div class="bo_title">Daily planing Visit to Site</div>
	<div id="bo_expand" onclick="toogle_bo_filter();">[+] View Filter</div>
	<div id="bo_filter">
		<div id="bo_filter_container">
			<?=$f->start("filter","GET");?>
				<?=$t->start();?>
				<?php
					$txt_site_name 			= $f->input("txt_site_name",@$_GET["txt_site_name"]);
					$txt_nopol 				= $f->input("txt_nopol",@$_GET["txt_nopol"]);
					$txt_personil			= $f->input("txt_personil",@$_GET["txt_personil"]);
					$sel_date				= $f->input("sel_date",@$_GET["sel_date"],"type='date'");
				?>
				<?=$t->row(array("Site Name",$txt_site_name));?>
				<?=$t->row(array("No Vehicle",$txt_nopol));?>
				<?=$t->row(array("Personil Name",$txt_personil));?>
				<?=$t->row(array("Date ",$sel_date));?>
				<?=$t->end();?>
				<?=$f->input("page","1","type='hidden'");?>
				<?=$f->input("do_filter","Load","type='submit'");?>
				<?=$f->input("reset","Reset","type='button' onclick=\"window.location='?';\"");?>
			<?=$f->end();?>
		</div>
	</div>
<?php
	$whereclause = "";
	if(@$_GET["txt_site_name"]!="") 	$whereclause .= "sites_name LIKE '"."%".str_replace(" ","%",$_GET["txt_site_name"])."%"."' AND ";
	if(@$_GET["txt_nopol"]!="") 		$whereclause .= "plan_nopol LIKE '"."%".str_replace(" ","%",$_GET["txt_nopol"])."%"."' AND ";
	if(@$_GET["txt_personil"]!="") 		$whereclause .= "users_name LIKE '"."%".str_replace(" ","%",$_GET["txt_personil"])."%"."' AND ";
	if(@$_GET["sel_date"]!="") {
		$whereclause .= "plan_date LIKE '"."%".str_replace(" ","%",$_GET["sel_date"])."%"."' AND ";
	} else {
		$whereclause .= "plan_date LIKE '"."%".str_replace(" ","%",date("Y-m-d")	)."%"."' AND ";
	}

	$db->addtable("tis_attendance_daily_planing");
	if($whereclause != "") $db->awhere(substr($whereclause,0,-4));$db->limit($_max_counting);
	$maxrow = count($db->fetch_data(true));
	$start = getStartRow(@$_GET["page"],$_rowperpage);
	$paging = paging($_rowperpage,$maxrow,@$_GET["page"],"paging");
	
	$db->addtable("tis_attendance_daily_planing");
	if($whereclause != "") $db->awhere(substr($whereclause,0,-4));$db->limit($start.",".$_rowperpage);
	$db->order("id DESC");
	$users = $db->fetch_data(true);
	// echo $db->get_last_query();
?>
	<?php
		if($_GET["mode"] == "add"){
			echo "<h5 align='center'><b>Add Site and No. Kendaraan</b></h5>";
		} else if ($_GET["mode"] == "addpersonil"){
			echo "<h5 align='center'><b>Add Personil</b></h5>";
		} else if ($_GET["mode"] == "edit"){
			unset($_SESSION["sesi_txt_working"]);
			echo "<h5 align='center'><b>Change Site</b></h5>";
		} else {
			unset($_SESSION["sesi_txt_working"]);
			echo $f->input("add","Add","type='button' onclick=\"window.location='tis_attendance_planning.php?mode=add';\"");
			if(!$users) echo "<p align='center' style='color:red'><b>No Plan for Today Yet, Please Adding!</b></p>";
		}
	?>

	<?=$t->start("","data_content");?>
	<?=$t->header(array("No",
						"Plan for Date",
						"Site",
						"No Vehicle",
						"Plan Working",
						"Personil",
						"Planed By",
						"Action"));?>
	
	<?php 
		if($_GET["mode"] == "add" || $_GET["mode"] == "addpersonil" || $_GET["mode"] == "edit"){
			$_txt_date				= date("d M Y");
			$list_sites				= $db->fetch_select_data("indottech_sites","id","concat(name,' [',kode,']')","",["name"],"",true);
				$_sel_site 			= $f->select("sel_site",$list_sites,"","required");
			$_txt_nopol 			= $f->input("txt_nopol","","required style='width:100px;'");
			$_txt_working 			= $f->input("txt_working","","required style='width:300px;'");
			$_txt_planer			= $_SESSION["fullname"];
			$_save_button 			= $f->input("next_trx","Next","type='submit'");
			$_cancel_button			= $f->input("cancel","Cancel","type='button' onclick=\"window.location='tis_attendance_planning.php';\"");
					
				if($_GET["mode"] == "addpersonil"){
				$_sel_site				= $db->fetch_single_data("indottech_sites","concat(name,' [',kode,']')",["id" => $_GET["site"]]);
				$_txt_nopol 			= $_GET["nopol"];
				$_txt_working 			= $_SESSION["sesi_txt_working"];
				$list_user				= $db->fetch_select_data("users","id","concat(name,' [',id,']')",["group_id" => "12"],["id"],"",true); //akan menampilkan candidates_code dan nama kandidates
					$_txt_candidates	= $f->select("sel_user", $list_user,"","");
					// echo $db->get_last_query();
				$_save_button 			= $f->input("add_personil_trx","Add","type='submit'");
				$_save_2_button 		= $f->input("new_trx","New Plan","type='submit'");
				$_cancel_button 		= $f->input("finish","Finish","type='button' onclick=\"window.location='tis_attendance_planning.php';\"");
				}
					if($_GET["mode"] == "edit"){
					$detail_user 			= $db->fetch_all_data("tis_attendance_daily_planing", [], "id = '".$_GET["id"]."'")[0];
					$list_sites				= $db->fetch_select_data("indottech_sites","id","concat(name,' [',kode,']')","",["name"],"",true);
						$_sel_site 			= $f->select("sel_site",$list_sites,$detail_user["sites_id"],"required");
					$_txt_nopol 			= $f->input("txt_nopol",$detail_user["plan_nopol"],"required","classinput");
					$_txt_working 			= $f->input("txt_working",$detail_user["plan_working"],"required","classinput");
					$_txt_candidates	 	= $detail_user["users_name"]." [".$detail_user["users_id"]."]";
					$_save_button 			= $f->input("edit_trx","Update","type='submit'") .$f->input("id_edit",$_GET["id"],"type='hidden'");
					}
			
			$txt_date 		= $_txt_date;
			$sel_site 		= $_sel_site;
			$txt_nopol 		= $_txt_nopol;
			$txt_working	= $_txt_working;
			$txt_planer 	= $_txt_planer;
			$sel_candidate 	= $_txt_candidates;
			$btn_save 		= $_save_button;
			$btn_save_2 	= $_save_2_button;
			$btn_cancel 	= $_cancel_button;
	?>
		<?=$f->start();?>
			<?=$t->row(
				array("",
					$txt_date,
					$sel_site,
					$txt_nopol,
					$txt_working,
					$sel_candidate,
					$txt_planer,
					$btn_save.$btn_save_2 .$btn_cancel),
				array("align='center' valign='top'","","","","","","","","")
			);?>	
		<?=$f->end();?>
	<?php } ?>
		
	<?php foreach($users as $no => $user){
		if ($user["created_by"] = $user["updated_by"]) {$planner = $user["updated_by"];} else {$planner = $user["updated_by"]	;}
		if($_GET["mode"] == "")$actions ="<a href=\"tis_attendance_planning.php?mode=edit&id=".$user["id"]."&site=".$user["sites_id"]."&nopol=".$user["plan_nopol"]."\">Edit Project</a> | <a href='#' onclick=\"if(confirm('Are You sure to delete this data?')){window.location='?deleting=".$user["id"]."';}\">Delete</a>";
	?>
		<?=$t->row(
					array($no+$start+1,
					format_tanggal($user["plan_date"],"d M Y"),
					$user["sites_name"],
					$user["plan_nopol"],
					$user["plan_working"],
					$user["users_name"]." [".$user["users_id"]."]",
					$planner,
					$actions),
					array("align='right' valign='top'","")
				);?>
	<?php } ?>
	
	<?=$t->end();?>
<?php include_once "footer.php";?>