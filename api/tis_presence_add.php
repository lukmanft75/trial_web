<?php 
	include_once "header.php";
	$cost_centers 		= $db->fetch_select_data("cost_centers","code","concat('[',code,'] ',name)","",["id"],"",true);
	$default_project	= $db->fetch_single_data("tis_post_project", "cost_center_id", ["email" =>  "%".$_SESSION["username"]."%:LIKE"]);
	$tis_presence 		= $db->fetch_all_data("tis_presence",[],"atd_id='".$atd_id."'")[0];
	///////PR DISINI//
	if(isset($_POST["save"])){
			$cand_code = $db->fetch_single_data("candidates","code",["email" =>  "%".$_SESSION["username"]."%:LIKE"]);
			if($cand_code != ""){
			$db->addtable("tis_presence");
			$db->addfield("candidates_code");		$db->addvalue($cand_code);
			$db->addfield("status");				$db->addvalue($_POST["status"]);
			$db->addfield("cost_center_id");		$db->addvalue($_POST["project"]);
			$db->addfield("site");					$db->addvalue($_POST["site"]);
			$db->addfield("description");			$db->addvalue($_POST["remark"]);
			$inserting = $db->insert();
			}
			if($inserting["affected_rows"] > 0){
				// javascript("window.location=\"atp_installation_menu.php?token=".$token."&atd_id=".$inserting["insert_id"]."\";");
				$_errormessage = "<font color='blue'>Data berhasil disimpan!</font>";
				// exit();
			} else {
				$_errormessage = "<font color='red'>Data gagal disimpan, anda belum terdaftar di list kandidat!</font>";
			}
	}

?>
	<center><h4><b>TIS TEAM PRESENCE</b></h4></center>
	<center><?=$_errormessage;?></center>
	<table align="center">
		<tr><td>Date : <?= date("l") .", ". date("d-m-Y");?></td></tr>
		<tr><td>Your Default Project : <?= $default_project;?></td></tr>
	</table>
	<br>
	<form method="POST" action="?token=<?=$token;?>&id=<?=$_POST["doctype"];?>">
		<table width="100%" cellpadding="0" cellspacing="0"><tr><td align="center">
			<table>
				<tr><td>Presence</td><td>:</td><td><?=$f->select("status",[""=>"", "1" => "HADIR", "2" => "SAKIT","3" => "IZIN"],"","required","classinput");?></td></tr>
				<tr><td>Project</td><td>:</td><td><?=$f->select("project",$cost_centers,"","required","classinput");?></td></tr>
				<tr><td>Site</td><td>:</td><td><?=$f->input("site","","","classinput");?></td></tr>
				<tr><td>Remark</td><td>:</td><td><?=$f->input("remark","","Xrequired","classinput");?></td></tr>
			</table>
		</table>
		<br>
		<table width="100%">
		<tr>
			<td><?=$f->input("back","Back","type='button' onclick='window.location=\"tis_presence_menu.php?token=".$token."\";'");?></td>
			<td align="right"><?=$f->input("save","Save","type='submit'");?></td>
		</tr>
		</table>
	</form>
<?php include_once "footer.php";?>