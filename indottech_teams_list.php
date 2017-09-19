<?php include_once "head.php";?>
<?php
	if($_GET["deleting"]){
		$db->addtable("indottech_group"); $db->where("id",$_GET["deleting"]); $db->delete_();
	}
	
	if($_POST["save_team"] || $_POST["edit_team"]){
		$db->addtable("indottech_group");
		$db->addfield("user_id");		$db->addvalue($_POST["user_id"]);
		$db->addfield("parent_user_id");$db->addvalue($_POST["parent_user_id"]);
		if($_POST["edit_team"]) {
			$db->where("id",$_POST["id"]);
			$db->addfield("updated_at");	$db->addvalue(date("Y-m-d H:i:s"));
			$db->addfield("updated_by");	$db->addvalue($__username);
			$db->addfield("updated_ip");	$db->addvalue($_SERVER["REMOTE_ADDR"]);
			$inserting = $db->update();
		} else {
			$db->addfield("created_at");	$db->addvalue(date("Y-m-d H:i:s"));
			$db->addfield("created_by");	$db->addvalue($__username);
			$db->addfield("created_ip");	$db->addvalue($_SERVER["REMOTE_ADDR"]);
			$db->addfield("updated_at");	$db->addvalue(date("Y-m-d H:i:s"));
			$db->addfield("updated_by");	$db->addvalue($__username);
			$db->addfield("updated_ip");	$db->addvalue($_SERVER["REMOTE_ADDR"]);
			$inserting = $db->insert();
		}
		if($inserting["affected_rows"] > 0){
			$error_messages = "<font style='color:green;'><b><h3>Team Saved</h3></b></font>";
			$_GET["mode"] = "";
		}
		
	}
?>
<div class="bo_title">Team</div>
<?=$error_messages;?>
<div id="bo_expand" onclick="toogle_bo_filter();">[+] View Filter</div>
<div id="bo_filter">
	<div id="bo_filter_container">
		<?=$f->start("filter","GET");?>
			<?=$t->start();?>
			<?php
				$users = $db->fetch_select_data("users","id","concat(email,' -- ',name)",["forbidden_chr_dashboards" => $__main_menu_id],["email"],"",true);
				$sel_user_id = $f->select("sel_user_id",$users,@$_GET["sel_user_id"],"style='height:20px;'");
				$sel_parent_user_id = $f->select("sel_parent_user_id",$users,@$_GET["sel_parent_user_id"],"style='height:20px;'");
			?>
			<?=$t->row(array("Leader",$sel_parent_user_id));?>
			<?=$t->row(array("User",$sel_user_id));?>
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
	if(@$_GET["sel_user_id"]!="") $whereclause .= "(user_id = '".$_GET["sel_user_id"]."') AND ";
	if(@$_GET["sel_parent_user_id"]!="") $whereclause .= "(parent_user_id = '".$_GET["sel_parent_user_id"]."') AND ";
	
	$db->addtable("indottech_group");
	if($whereclause != "") $db->awhere(substr($whereclause,0,-4));
	if(@$_GET["sort"] == "") $_GET["sort"] = "id";
	if(@$_GET["sort"] != "") $db->order($_GET["sort"]);
	$indottech_groups = $db->fetch_data(true);
?>

	<?=$f->input("add","Add Team","type='button' onclick=\"window.location='?mode=add';\"");?>
	<?=$f->input("add","Add User","type='button' onclick=\"window.location='users_add.php';\"");?>
	<?=$t->start("","data_content");?>
	<?=$t->header(array("No",
						"<div onclick=\"sorting('parent_user_id');\">Leader</div>",
						"<div onclick=\"sorting('user_id');\">Team</div>",
						""));?>
	<?php 
		if($_GET["mode"] == "add" || $_GET["mode"] == "edit"){
			$_save_button = "save_team";
			if($_GET["mode"] == "edit"){
				$db->addtable("indottech_group");$db->where("id",$_GET["id"]);$db->limit(1);
				$data = $db->fetch_data();
				$_parent_user_id = $data["parent_user_id"];
				$_user_id = $data["user_id"];
				$_save_button = "edit_team";
			}
			
			$sel_user_id = $f->select("user_id",$users,$_user_id,"style='height:20px;'");
			$sel_parent_user_id = $f->select("parent_user_id",$users,$_parent_user_id,"style='height:20px;'");
			$btn_save = $f->input($_save_button,"Save","type='submit'");
			if($_GET["mode"] == "edit"){
				$btn_save .= $f->input("id",$_GET["id"],"type='hidden'");
			}
	?>
		<?=$f->start();?>
			<?=$t->row(
				array("",
					$sel_parent_user_id,
					$sel_user_id,
					$btn_save),
				array("align='center' valign='top'","","","")
			);?>
		<?=$f->end();?>
	<?php } ?>
	
	<?php 
		$total = 0;
		foreach($indottech_groups as $no => $indottech_group){ ?>
		<?php
			$actions = "<a href=\"?mode=edit&id=".$indottech_group["id"]."\">Edit</a> |
						<a href='#' onclick=\"if(confirm('Are You sure to delete this data?')){window.location='?deleting=".$indottech_group["id"]."';}\">Delete</a>
						";
			$parent_user = $db->fetch_single_data("users","concat(email,' -- ',name)",["id" => $indottech_group["parent_user_id"]]);
			$parent_user = "<a href='users_edit.php?id=".$indottech_group["parent_user_id"]."'>".$parent_user."</a>";
			$user = $db->fetch_single_data("users","concat(email,' -- ',name)",["id" => $indottech_group["user_id"]]);
			$user = "<a href='users_edit.php?id=".$indottech_group["user_id"]."'>".$user."</a>";
		?>	
		<?=$t->row(
					array($no+$start+1,
						$parent_user,
						$user,
						$actions),
					array("align='center' valign='top'","","","","","align='right'","","align='right'","align='right'","")
				);?>
	<?php } ?>
	<?=$t->end();?>
<?php include_once "footer.php";?>