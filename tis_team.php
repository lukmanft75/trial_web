<?php
//PR nya membuat fungsi edit data, delete dengan update id tbl_tis_post_project
	include_once "head.php";
	if($_GET["deleting"]){
		$db->addtable("tis_post_project"); $db->where("id",$_GET["deleting"]); $db->delete_();
		?> <script> window.location="?mode=view";</script> <?php
	}
	
	if($_POST["save_trx"] || $_POST["edit_trx"]){

		$_data_user = $db->fetch_all_data("users",[],"id='".$_POST["sel_id_user"]."'")[0];
		$cek_mail = $db->fetch_single_data("tis_post_project", "id", ["email" => $_data_user["email"]]);
		$db->addtable("tis_post_project");
		$db->addfield("candidate_code");		$db->addvalue(strtoupper($_POST["candidate_code"]));
		$db->addfield("name");					$db->addvalue(ucwords($_data_user["name"]));
		$db->addfield("email");					$db->addvalue($_data_user["email"]);
		$db->addfield("job_title");				$db->addvalue($_data_user["job_title"]);
		$db->addfield("group_id");				$db->addvalue($_data_user["group_id"]);
		$db->addfield("cost_center_id");		$db->addvalue($_POST["sel_project"]);
		// if($_POST["edit_trx"]) {
			// $db->where("id",$_POST["id"]);
			// $inserting = $db->update();
		// } else {
			if(!$cek_mail) {
			$db->addfield("created_by");	$db->addvalue($__username);
			$db->addfield("created_ip");	$db->addvalue($_SERVER["REMOTE_ADDR"]);
			$db->addfield("created_at");	$db->addvalue(date("Y-m-d H:i:s"));
			$inserting = $db->insert();
			} else {
			$error_messages = "<font style='color:red;'><b><h3>Email sudah terdaftar</h3></b></font>";
			}
		// }
		if($inserting["affected_rows"] > 0){
			javascript("alert('Data berhasil disimpan');");
			javascript("window.location=\tis_team.php?");
		} else {
			javascript("alert('Data gagal disimpan');");
			javascript("window.location=\tis_team.php?mode=add");
		}
	}
?>
<div class="bo_title">TIS Team</div>
<?=$error_messages;?>

<div id="bo_expand" onclick="toogle_bo_filter();">[+] View Filter</div>
<div id="bo_filter">
	<div id="bo_filter_container">
		<?=$f->start("filter","GET");?>
			<?=$t->start();?>
			<?php
				$txt_code 				= $f->input("txt_code",@$_GET["txt_code"]);
				$txt_name 				= $f->input("txt_name",@$_GET["txt_name"]);
				$txt_email 				= $f->input("txt_email",@$_GET["txt_email"]);
				$txt_job_title			= $f->input("txt_job_title",@$_GET["txt_job_title"]);
				$groups					= $db->fetch_select_data("groups","id","name","",["name"],"",true);
					$sel_group			= $f->select("sel_group",$groups,@$_GET["sel_group"],"style='height:30px'");
				$cost_centers			= $db->fetch_select_data("cost_centers","code","concat('[',code,'] ',name)","",["id"],"",true);
					$sel_post_project 	= $f->select("cc_id",$cost_centers,@$_GET["cc_id"],"style='height:30px'");
			?>
			
			<?=$t->row(array("User ID",$txt_code));?>
			<?=$t->row(array("Name",$txt_name));?>
			<?=$t->row(array("Email",$txt_email));?>
			<?=$t->row(array("Job Title",$txt_job_title));?>
			<?=$t->row(array("Group Name",$sel_group));?>
			<?=$t->row(array("Project",$sel_post_project));?>
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
	if(@$_GET["txt_code"]!="") 			$whereclause .= "candidate_code LIKE '"."%".str_replace(" ","%",$_GET["txt_code"])."%"."' AND ";
	if(@$_GET["txt_name"]!="") 			$whereclause .= "name LIKE '"."%".str_replace(" ","%",$_GET["txt_name"])."%"."' AND ";
	if(@$_GET["txt_email"]!="") 		$whereclause .= "email LIKE '"."%".str_replace(" ","%",$_GET["txt_email"])."%"."' AND ";
	if(@$_GET["txt_job_title"]!="") 	$whereclause .= "job_title LIKE '"."%".str_replace(" ","%",$_GET["txt_job_title"])."%"."' AND ";
	if(@$_GET["sel_group"]!="") 		$whereclause .= "group_id LIKE '"."%".str_replace(" ","%",$_GET["sel_group"])."%"."' AND ";
	if(@$_GET["cc_id"]!="") 			$whereclause .= " cost_center_id LIKE '"."%".str_replace(" ","%",$_GET["cc_id"])."%"."' AND ";

	$db->addtable("tis_post_project");
	if($whereclause != "") $db->awhere(substr($whereclause,0,-4));$db->limit($_max_counting);
	$maxrow = count($db->fetch_data(true));
	$start = getStartRow(@$_GET["page"],$_rowperpage);
	$paging = paging($_rowperpage,$maxrow,@$_GET["page"],"paging");
	
	$db->addtable("tis_post_project");
	if($whereclause != "") $db->awhere(substr($whereclause,0,-4));$db->limit($start.",".$_rowperpage);
	if(@$_GET["sort"] != "") $db->order($_GET["sort"]);
	$users = $db->fetch_data(true);
?>
	<?php
		if($_GET["mode"] == "add"){
			echo "<h5><b>Add TIS Team</b></h5>";
		} else if ($_GET["mode"] == "edit"){
			echo "<b><h5>Edit Project TIS Team</b></h5>";
		} else {
		echo $f->input("add","Add","type='button' onclick=\"window.location='tis_team.php?mode=add';\"");
		}
	?>

	<?=$t->start("","data_content");?>
	<?=$t->header(array("No",
						"<div onclick=\"sorting('candidate_code');\">User ID</div>",
						"<div onclick=\"sorting('name');\">Name</div>",
						"<div onclick=\"sorting('email');\">Email</div>",
						"<div onclick=\"sorting('job_title');\">Job Title</div>",
						"<div onclick=\"sorting('group_id');\">Group Name</div>",
						"<div onclick=\"sorting('cost_center_id');\">Project</d	iv>",
						"Action"));?>
	
	<?php
		if($_GET["mode"] == "add" || $_GET["mode"] == "edit"){
			$input_code 		= $f->input("candidate_code","","required","");
			$list_user 			= $db->fetch_select_data("users","id","email","",["email"],"",true);
			// echo $db->get_last_query();
				$sel_user 		= $f->select("sel_id_user",$list_user,"","required style='height:30px'");
			$cost_centers 		= $db->fetch_select_data("cost_centers","code","concat('[',code,'] ',name)","",["id"],"",true);
				$sel_project	= $f->select("sel_project",$cost_centers,"","required style='height:30px'");
			$_save_button 		= "save_trx";
			$txt_nama			= "";
			$xt_JT				= "";
			$txt_JT				= "";
			if($_GET["mode"] == "edit"){
				// $_data_user = $db->fetch_all_data("users",[],"id='".$_POST["sel_id_user"]."'")[0];
				$edit_view			= $db->fetch_all_data("tis_post_project", [], "id = '".$_GET["id"]."'")[0];
				$input_code 		= $edit_view["candidate_code"];
				$sel_user	 		= $edit_view["email"];
				$cost_centers 		= $db->fetch_select_data("cost_centers","code","concat('[',code,'] ',name)","",["id"],"",true);
					$sel_project	= $f->select("sel_project",$cost_centers,$edit_view["cost_center_id"],"style='height:30px'");
				$_save_button 		= "edit_trx";
				$txt_nama			= $edit_view["name"];
				$xt_JT				= $edit_view["job_title"];
				$txt_JT				= $db->fetch_single_data("groups", "name", ["id" => $edit_view["group_id"]]);
				// $info = "<b>TIS Change Personil Post Project</b>";
				// $sel_candidate 		= $db->fetch_single_data("tis_post_project","name",["id" => $_GET["id"]]);
				// $old_project		= $db->fetch_single_data("tis_post_project","cost_center_id",["id" => $_GET["id"]]);
				// $cost_centers		= $db->fetch_select_data("cost_centers","code","concat('[',code,'] ',name)","",["id"],"",true);
					// $sel_project	= $f->select("sel_project",$cost_centers,"","style='height:30px'");
				// $_save_button = "edit_trx";
			}
			
			$txt_code 			= $input_code;
			$list_email_user	= $sel_user;
			$list_project 		= $sel_project;
			$_save_button 		= $f->input($_save_button,"Save","type='submit'");
			$_cancel_button 	= $f->input("cancel","Cancel","type='button' onclick=\"window.location='tis_team.php';\"");
			$_txt_nama			= $txt_nama;
			$_txt_JT			= $txt_JT;
			$_txt_group			= $txt_JT;
	?>
	
		<?=$f->start();?>
		<?=$t->row(
			array("",
			$txt_code,
			$_txt_nama,
			$list_email_user,
			$_txt_JT,
			$_txt_group,
			$list_project,
			$_save_button." ".$_cancel_button),
			array("align='right' valign='top'","")
		);?>
	<?php } ?>
		
	<?php foreach($users as $no => $user){ ?>
		<?php
			
			$cc_id = $user["cost_center_id"];
			$cc_name = $db->fetch_single_data("cost_centers","name",["code"=>$cc_id]);
			if($cc_name!="") $project= "[".$cc_id."] ".$cc_name;
			$actions = 	"<a href=\"tis_team.php?id=".$user["id"]."&mode=edit\">Edit Project</a> | <a href='#' onclick=\"if(confirm('Are You sure to delete this data?')){window.location='?deleting=".$user["id"]."';}\">Delete</a>";
			$group_name = $db->fetch_single_data("groups", "name", ["id" => $user["group_id"]]);
		?>
		<?=$t->row(
					array($no+$start+1,
					$user["candidate_code"],
					$user["name"],
					$user["email"],
					$user["job_title"],
					$group_name,
					$project,
					$actions),
					array("align='right' valign='top'","")
				);?>
	<?php } ?>
		
	<?=$t->end();?>
<?php include_once "footer.php";?>