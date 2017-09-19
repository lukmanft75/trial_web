<?php include_once "head.php";?>
<div class="bo_title">Add User</div>
<?php
	if(isset($_POST["save"])){
		$db->addtable("users");
		$db->addfield("group_id");				$db->addvalue(@$_POST["group_id"]);
		$db->addfield("forbidden_chr_dashboards");$db->addvalue($__main_menu_id);
		$db->addfield("email");					$db->addvalue(@$_POST["email"]);
		$db->addfield("password");				$db->addvalue(base64_encode(@$_POST["password"]));
		$db->addfield("name");					$db->addvalue(@$_POST["name"]);
		$db->addfield("job_title");				$db->addvalue(@$_POST["job_title"]);
		$db->addfield("job_division");			$db->addvalue(@$_POST["job_division"]);
		$db->addfield("created_at");			$db->addvalue(date("Y-m-d H:i:s"));
		$db->addfield("created_by");			$db->addvalue($__username);
		$db->addfield("created_ip");			$db->addvalue($_SERVER["REMOTE_ADDR"]);
		$db->addfield("updated_at");			$db->addvalue(date("Y-m-d H:i:s"));
		$db->addfield("updated_by");			$db->addvalue($__username);
		$db->addfield("updated_ip");			$db->addvalue($_SERVER["REMOTE_ADDR"]);
		$inserting = $db->insert();
		if($inserting["affected_rows"] >= 0){
			$insert_id = $inserting["insert_id"];
			if($_POST["sel_parent_user_id"] != ""){
				$db->addtable("indottech_group");
				$db->addfield("user_id");		$db->addvalue($insert_id);
				$db->addfield("parent_user_id");$db->addvalue($_POST["sel_parent_user_id"]);
				$db->insert();
			}
			javascript("alert('Data Saved');");
			javascript("window.location='users_list.php';");
		} else {
			echo $inserting["error"];
			javascript("alert('Saving data failed');");
		}
	}
	
	$txt_email 			= $f->input("email",@$_POST["email"]);
	$sel_group 			= $f->select("group_id",$db->fetch_select_data("groups","id","name",["id" => $__group_app.":IN"],array("name")),@$_POST["group_id"]);
	$txt_password 		= $f->input("password","","type='password' autocomplete='new-password'");
	$txt_name 			= $f->input("name",@$_POST["name"]);
	$txt_job_title 		= $f->input("job_title",@$_POST["job_title"]);
	$txt_job_division 	= $f->input("job_division",@$_POST["job_division"]);
	$parents 			= $db->fetch_select_data("users","id","concat(email,' -- ',name)",["forbidden_chr_dashboards" => $__main_menu_id],["email"],"",true);
	$sel_parent_user_id = $f->select("sel_parent_user_id",$parents,@$_POST["sel_parent_user_id"],"style='height:20px;'");
?>
<?=$f->start();?>
	<?=$t->start("","editor_content");?>
        <?=$t->row(array("Group",$sel_group));?>
		<?=$t->row(array("Email",$txt_email));?>
		<?=$t->row(array("Password",$txt_password));?>
		<?=$t->row(array("Name",$txt_name));?>
		<?=$t->row(array("Job Title",$txt_job_title));?>
		<?=$t->row(array("Job Division",$txt_job_division));?>
		<?=$t->row(array("Team Leader",$sel_parent_user_id));?>
	<?=$t->end();?>
	<?=$f->input("save","Save","type='submit'");?> <?=$f->input("back","Back","type='button' onclick=\"window.location='users_list.php';\"");?>
<?=$f->end();?>
<?php include_once "footer.php";?>