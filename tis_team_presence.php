<?php include_once "head.php";?>
<div class="bo_title">TIS Team Presence</div>
<?=$error_messages;?>


<div id="bo_expand" onclick="toogle_bo_filter();">[+] View Filter</div>
<div id="bo_filter">
	<div id="bo_filter_container">
		<?=$f->start("filter","GET");?>
			<?=$t->start();?>
			<?php
				$group = $f->select("group",["" => "", "11" => "Leader Indottech", "12" => "Team Indottech", "18" => "Indottech Admin 2"],@$_GET["group"],"style='height:25px'");
				$txt_email = $f->input("txt_email",@$_GET["txt_email"]);
				$txt_name = $f->input("txt_name",@$_GET["txt_name"]);
				$txt_job_title = $f->input("txt_job_title",@$_GET["txt_job_title"]);
				$cost_centers = $db->fetch_select_data("cost_centers","code","concat('[',code,'] ',name)","",["id"],"",true);
					$team_post_project = $f->select("cc_id",$cost_centers,@$_GET["cc_id"],"style='height:30px'");
			?>
			
			<?=$t->row(array("Name",$txt_name));?>
			<?=$t->end();?>
			<?=$f->input("page","1","type='hidden'");?>
			<?=$f->input("sort",@$_GET["sort"],"type='hidden'");?>
			<?=$f->input("do_filter","Load","type='submit'");?>
			<?=$f->input("reset","Reset","type='button' onclick=\"window.location='?';\"");?>
		<?=$f->end();?>
	</div>
</div>


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
	
	$D_1 ="17-08-2018"; //fungsi hari kemarin
	$D_0 ="18-08-2018"; //fungsi today
	
?>
	<?=$t->start("","data_content");?>
	<?=$t->header(array("No", "Nama", "Job Title", $D_1." - Status", $D_1." - Project", $D_0." - Status", $D_0." - Project", "Action"));?>
	<!--?=$t->header(array("No",
						"<div onclick=\"sorting('name');\">Name</div>",
						"<div onclick=\"sorting('email');\">Email</div>",
						"<div onclick=\"sorting('group_id');\">Group Names</div>",
						"<div onclick=\"sorting('job_title');\">Job Title</div>",
						"<div onclick=\"sorting('cost_center_id');\">Project</d	iv>",
						"Action"));?-->
	
		
	<?php foreach($users as $no => $user){ ?>
		<?php
			
			// $actions = 	"<a href=\"tis_team.php?id=".$user["id"]."&mode=edit\">Edit Project</a>";
			
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
					// $project,
					// $actions),
					// array("align='right' valign='top'","")
				);?>
	<?php } ?>
		
	<?=$t->end();?>
<?php include_once "footer.php";?>