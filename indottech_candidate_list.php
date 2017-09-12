<?php include_once "head.php";?>
<?php include_once "scripts/candidates_js.php";?>
<div class="bo_title">Candidates</div>
<div id="bo_expand" onclick="toogle_bo_filter();">[+] View Filter</div>
<div id="bo_filter">
	<div id="bo_filter_container">
		<?=$f->start("filter","GET");?>
			<?=$t->start();?>
			<?php
				$code = $f->input("code",@$_GET["code"]);
				$name = $f->input("name",@$_GET["name"]);
				$sex = $f->select("sex",array(""=>"","M" => "M", "F" => "F"),@$_GET["sex"],"style='height:25px'");
				$status_id = $f->select("status_id",$db->fetch_select_data("statuses","id","name",array(),array(),"",true),@$_GET["status_id"],"style='height:25px'");
				$ktp = $f->input("ktp",@$_GET["ktp"]);
				$npwp = $f->input("npwp",@$_GET["npwp"]);
				$email = $f->input("email",@$_GET["email"]);
				$join_indohr_at = $f->input("join_indohr_at",@$_GET["join_indohr_at"],"type='date'");
                
			?>
			     <?=$t->row(array("Code",$code));?>
                 <?=$t->row(array("Name",$name));?>
                 <?=$t->row(array("Sex",$sex));?>
                 <?=$t->row(array("Status",$status_id));?>
                 <?=$t->row(array("KTP",$ktp));?>
                 <?=$t->row(array("NPWP",$npwp));?>
                 <?=$t->row(array("Email",$email));?>
           
			<?=$t->end();?>
			<?=$f->input("page","1","type='hidden'");?>
			<?=$f->input("sort",@$_GET["sort"],"type='hidden'");?>
			<?=$f->input("do_filter","Load","type='submit'");?>
			<?=$f->input("reset","Reset","type='button' onclick=\"window.location='?';\"");?>
		<?=$f->end();?>
	</div>
</div>

<?php
	$whereByProject = "";
	$projects = $db->fetch_select_data("projects","id","name",["client_id" => $__main_menu_id]);
	foreach($projects as $project_id => $value){
		$whereByProject .= "project_ids LIKE '%|$project_id|%' OR ";
	}
	$whereByProject = substr($whereByProject,0,-3);
	$whereclause = "id IN (SELECT candidate_id FROM all_data_update WHERE (".$whereByProject.") ) AND ";
    if(@$_GET["code"]!="") $whereclause .= "(code LIKE'%".$_GET["code"]."%') AND ";
	if(@$_GET["name"]!="") $whereclause .= "(name LIKE '%".$_GET["name"]."%') AND ";
    if(@$_GET["birthdate"]!="") $whereclause .= "(birthdate ='".$_GET["birthdate"]."') AND ";
    if(@$_GET["sex"]!="") $whereclause .= "(sex ='".$_GET["sex"]."') AND ";
    if(@$_GET["status_id"]!="") $whereclause .= "(status_id ='".$_GET["status_id"]."') AND ";
    if(@$_GET["ktp"]!="") $whereclause .= "(ktp LIKE '%".$_GET["ktp"]."%') AND ";
    if(@$_GET["npwp"]!="") $whereclause .= "(npwp LIKE '%".$_GET["npwp"]."%') AND ";
    if(@$_GET["email"]!="") $whereclause .= "(email LIKE '%".$_GET["email"]."%') AND ";
   	
	$db->addtable("candidates");
	if($whereclause != "") $db->awhere(substr($whereclause,0,-4));$db->limit($_max_counting);
	$maxrow = count($db->fetch_data(true));
	$start = getStartRow(@$_GET["page"],$_rowperpage);
	$paging = paging($_rowperpage,$maxrow,@$_GET["page"],"paging");
	
	$db->addtable("candidates");
	if($whereclause != "") $db->awhere(substr($whereclause,0,-4));$db->limit($start.",".$_rowperpage);
	if(@$_GET["sort"] != "") $db->order($_GET["sort"]);
	$candidates = $db->fetch_data(true);
?>

	<?=$paging;?>
	<?=$t->start("","data_content");?>
	<?=$t->header(array("No",
						"<div onclick=\"sorting('id');\">ID</div>",
						"<div onclick=\"sorting('code');\">Code</div>",
						"<div onclick=\"sorting('name');\">Name</div>",
						"<div onclick=\"sorting('birthdate');\">Birthdate</div>",
						"<div onclick=\"sorting('sex');\">Sex</div>",
						"<div onclick=\"sorting('status_id');\">Status</div>",
                        "<div onclick=\"sorting('email');\">Email</div>",
						"Last Project",
						"Last Position",
						"End Contract"));?>
	<?php foreach($candidates as $no => $candidate){ ?>
		<?php
			$actions = "<a href=\"indottech_candidate_view.php.php?id=".$candidate["id"]."\">View</a>";
                        
			$status = $db->fetch_single_data("statuses","name",array("id"=>$candidate["status_id"]));
			if($candidate["code"] == ""){
				$candidate["code"] = "<div id='candidate_code_".$candidate["id"]."'>".$f->input("btn_generate_code","Generate","type='button' onclick=\"generate_code('".$candidate["id"]."','candidate_code_".$candidate["id"]."');\"")."</div>";
			} else {
				$candidate["code"] = "<a href=\"indottech_candidate_view.php?id=".$candidate["id"]."\">".$candidate["code"]."</a>";
			}
			$last_project = $db->fetch_single_data("all_data_update","project_ids",["candidate_id"=>$candidate["id"]],["joborder_id DESC"]);
			$last_project = pipetoarray($last_project);$last_project = $last_project[count($last_project)-1];
			$last_project = $db->fetch_single_data("projects","name",["id"=>$last_project]);
			
			$last_position = $db->fetch_single_data("all_data_update","position_ids",["candidate_id"=>$candidate["id"]],["joborder_id DESC"]);
			$last_position = pipetoarray($last_position);$last_position = $last_position[count($last_position)-1];
			$last_position = $db->fetch_single_data("positions","name",["id"=>$last_position]);
			
			$end_contract = $db->fetch_single_data("joborder","join_end",["candidate_id" => $candidate["id"]],["join_end DESC"]);
		?>
		<?=$t->row(
					array($no+$start+1,
						"<a href=\"indottech_candidate_view.php?id=".$candidate["id"]."\">".$candidate["id"]."</a>",
						$candidate["code"],
                        "<a href=\"indottech_candidate_view.php?id=".$candidate["id"]."\">".$candidate["name"]."</a>",
                        format_tanggal($candidate["birthdate"]),
                        $candidate["sex"],
                        $status,
                        $candidate["email"],
						$last_project,
						$last_position,
						format_tanggal($end_contract)),
					array("align='right' valign='top'","")
				);?>
	<?php } ?>
	<?=$t->end();?>
	<?=$paging;?>
<?php include_once "footer.php";?>