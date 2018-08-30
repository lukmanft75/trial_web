<?php include_once "head.php";?>
	<script>
	// function totalsum(){
		// var qty = document.getElementById("qty").value * 1;
		// var price = document.getElementById("price").value * 1;
		// document.getElementById("total").value = qty * price;
	// }
// </script>
<?php
	if($_POST["save_trx"] || $_POST["edit_trx"]){
		// $_POST["periode"] = $_POST["periode"]."-01";
		// $db->addtable("tis_post_project");
		// $db->addfield("periode");		$db->addvalue($_POST["periode"]);
		// $db->addfield("item");			$db->addvalue($_POST["item"]);
		// $db->addfield("esiro");			$db->addvalue($_POST["esiro"]);
		// $db->addfield("qty");			$db->addvalue($_POST["qty"]);
		// $db->addfield("unit");			$db->addvalue($_POST["unit"]);
		// $db->addfield("price");			$db->addvalue($_POST["price"]);
		// $db->addfield("total");			$db->addvalue($_POST["total"]);
		// if($_POST["edit_trx"]) {
			// $db->where("id",$_POST["id"]);
			// $inserting = $db->update();
		// } else {
			// $db->addfield("created_at");	$db->addvalue(date("Y-m-d H:i:s"));
			// $db->addfield("created_by");	$db->addvalue($__username);
			// $db->addfield("created_ip");	$db->addvalue($_SERVER["REMOTE_ADDR"]);
			// $inserting = $db->insert();
		// }
		// if($inserting["affected_rows"] > 0){
			// $error_messages = "<font style='color:green;'><b><h3>Data Saved</h3></b></font>";
			// $_GET["mode"] = "";
			// $_GET["trx_periode"] = $_POST["periode"];
		// }
		
	}
?>
<div class="bo_title">Set Public Holidays for TIS Team</div>
<?=$error_messages;?>

<?php
	// $whereclause = "";
	// if(@$_GET["group"]=="") {$whereclause .= "(group_id = 11 OR group_id = 12 OR group_id = 18) AND ";} else {$whereclause .= "group_id = '".$_GET["group"]."' AND ";}
	// if(@$_GET["txt_email"]!="") $whereclause .= "email LIKE '"."%".str_replace(" ","%",$_GET["txt_email"])."%"."' AND ";
	// if(@$_GET["txt_name"]!="") $whereclause .= "name LIKE '"."%".str_replace(" ","%",$_GET["txt_name"])."%"."' AND ";
	// if(@$_GET["txt_job_title"]!="") $whereclause .= "job_title LIKE '"."%".str_replace(" ","%",$_GET["txt_job_title"])."%"."' AND ";
	// if(@$_GET["cc_id"]!="") $whereclause .= " cost_center_id LIKE '"."%".str_replace(" ","%",$_GET["cc_id"])."%"."' AND ";

	// $db->addtable("tis_post_project");
	// if($whereclause != "") $db->awhere(substr($whereclause,0,-4));$db->limit($_max_counting);
	// $maxrow = count($db->fetch_data(true));
	// $start = getStartRow(@$_GET["page"],$_rowperpage);
	// $paging = paging($_rowperpage,$maxrow,@$_GET["page"],"paging");
	
	// $db->addtable("tis_post_project");
	// if($whereclause != "") $db->awhere(substr($whereclause,0,-4));$db->limit($start.",".$_rowperpage);
	// if(@$_GET["sort"] != "") $db->order($_GET["sort"]);
	// $users = $db->fetch_data(true);
	// echo $db->get_last_query();
?>

	<?=$f->input("add","Add","type='button' onclick=\"window.location='tis_off_day.php?mode=add';\"");?>

	<?php 
		if($_GET["mode"] == "add" || $_GET["mode"] == "edit"){
			$info = "<b>Add Public Holidays</b>";
			$candidates = $db->fetch_select_data("candidates","code","concat(code,' - ',name)","",["code"],"",true);
				$sel_candidate = $f->select("sel_candidate",$candidates,"","style='height:30px'");
			$cost_centers = $db->fetch_select_data("cost_centers","code","concat('[',code,'] ',name)","",["id"],"",true);
				$sel_project = $f->select("sel_project",$cost_centers,"","style='height:30px'");
			$_save_button = "save_trx";
			if($_GET["mode"] == "edit"){
				$info = "<b>edit Public Holidays</b>";
				$sel_candidate = $db->fetch_single_data("tis_post_project","name",["id" => $_GET["id"]]);
				$old_project		 = $db->fetch_single_data("tis_post_project","cost_center_id",["id" => $_GET["id"]]);
				$cost_centers		 = $db->fetch_select_data("cost_centers","code","concat('[',code,'] ',name)","",["id"],"",true);
					$sel_project	 = $f->select("sel_project",$cost_centers,$old_project,"style='height:30px'");
				$_save_button = "edit_trx";
			}
			
			$header_info = $info;
			$list_candidate = $sel_candidate;
			$list_project = $sel_project;
			$_save_button = $f->input($_save_button,"Save","type='submit'");
			$_cancel_button = $f->input("cancel","Cancel","type='button' onclick=\"window.location='tis_off_day.php';\"");;
	?>
	
		<?=$f->start();?>
		<?=$t->start("","editor_content");?>
			<?=$t->row(array("",$header_info));?>
			<?=$t->row(array("Date",$list_candidate));?>
			<?=$t->row(array("Detail",$list_project));?>
			<?=$t->row(array($_save_button, $_cancel_button));?>
		<?=$t->end();?>
	<?php } ?>
	
	
	<?=$t->start("","data_content");?>
	<?=$t->header(array("No",
						"<div onclick=\"sorting('name');\">Date</div>",
						"<div onclick=\"sorting('email');\">Detail</div>",
						"Action"));?>
	
		
	<?php foreach($users as $no => $user){ ?>
		<?php
			
			// $actions = 	"<a href=\"tis_off_day.php?id=".$user["id"]."&mode=edit\">Edit Project</a>";
			
			// $group = $db->fetch_single_data("groups","name",array("id"=>$user["group_id"]));
			// $cc_id = $user["cost_center_id"];
			// $cc_name = $db->fetch_single_data("cost_centers","name",["code"=>$cc_id]);
			// if($cc_name!="") $project= "[".$cc_id."] ".$cc_name;
			
		?>
		<?=$t->row(
					// array($no+$start+1,
					// $user["name"],
					// $user["email"],
					// $group,
					// $user["job_title"],
					// $project,
					// $actions),
					// array("align='right' valign='top'","")
				);?>
	<?php } ?>
		
	<?=$t->end();?>
<?php include_once "footer.php";?>