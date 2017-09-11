<?php
	include_once "win_head.php";
	
	if($_GET["deleting"]){
		$db->addtable("candidate_infos");
		$db->where("id",$_GET["deleting"]);
		$db->delete_();
		?> <script> window.location="?";</script> <?php
	}
	
	$db->addtable("candidate_infos");
	$db->awhere("candidate_id = '".$_GET["candidate_id"]."'");
	$infos = $db->fetch_data(true);
	
	$_title = "Candidate Info";  
 
?>
<h3><b><?=$_title;?></b></h3>
<?php
	if(count($infos) < 1){
		if($_GET["addnew"]==1 || isset($_POST["saving_new"])){
			include_once "win_candidate_infos_add.php";
		} else {
			echo $f->input("addnew","Add New Info","type='button' onclick=\"window.location='?addnew=1&".$_SERVER["QUERY_STRING"]."';\"");
		}
	} 
	
?>
<br><br>
<?=$t->start("","data_content");?>
<?=$t->header(array("No","Candidate","Info",""));?>
<?php
	foreach($infos as $no => $data){
		$actions = "<a href=\"win_candidate_infos_edit.php?id=".$data["id"]."&".$_SERVER["QUERY_STRING"]."\">Edit</a> |
					<a href='#' onclick=\"if(confirm('Are You sure to delete this data?')){window.location='?deleting=".$data["id"]."';}\">Delete</a>
					";
		$candidate = $db->fetch_single_data("candidates","name",array("id" => $data["candidate_id"]));
	
		echo $t->row(array($no+1,$candidate,$data["info"],$actions),array("align='right' valign='top' ","align='right' valign='top' "));
	}
?>
<?=$t->end();?>