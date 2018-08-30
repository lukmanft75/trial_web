<?php 
	include_once "header.php";
	if(isset($_POST["save"])){
		// $worktype_ids = "|".$_POST["worktype_id"]."|";
		// $site_name = $db->fetch_single_data("indottech_sites","concat(name,' [',site_code,']')",["id" => $_POST["site_id"]]);
		
		// $db->addtable("indottech_atd_cover");
		// $db->addfield("doctype");			$db->addvalue($_GET["doctype"]);
		// $db->addfield("worktype_ids");		$db->addvalue($worktype_ids);
		// $db->addfield("vendor");			$db->addvalue($_POST["vendor"]);
		// $db->addfield("project_name");		$db->addvalue($_POST["project_name"]);
		// $db->addfield("customer");			$db->addvalue($_POST["customer"]);
		// $db->addfield("site_id");			$db->addvalue($_POST["site_id"]);
		// $db->addfield("site_name");			$db->addvalue($site_name);
		// $db->addfield("acceptance_at");		$db->addvalue($_POST["acceptance_at"]);
		// $db->addfield("acceptance_status");	$db->addvalue($_POST["acceptance_status"]);
		// $inserting = $db->insert();
		if($_POST["site"] !=""){
		// if($inserting["affected_rows"] > 0){
			// javascript("window.location=\"atp_installation_menu.php?token=".$token."&atd_id=".$inserting["insert_id"]."\";");
			$_errormessage = "<font color='blue'>Data berhasil disimpan!</font>";
		} else {
			$_errormessage = "<font color='red'>Data gagal disimpan!</font>";
		}
	}
	
	// if($_GET["doctype"] == "rectifier"){ $checked[3] = "checked"; 	}
	// $sites = $db->fetch_select_data("indottech_sites","id","concat(name,' [',site_code,']')",["project_id" => "13"],["name"],"",true);
?>
	<center><h4><b>TIS TEAM PRESENCE</b></h4></center>
	<center><h5>LEAVE SUBMISSION</h5></center>
	<center><?=$_errormessage;?></center>
	<table align="center">
		<tr><td>Today : </td><td><?= date("l") .", ". date("d-m-Y");?> </td></td></tr>
	</table>
	<br>
	<form method="POST" action="?token=<?=$token;?>&doctype=<?=$_GET["doctype"];?>">
		<table width="100%" cellpadding="0" cellspacing="0"><tr><td align="center">
			<table>
				<tr><td>From</td><td>:</td><td><?=$f->input("date_from",date("Y-m-d"),"type='date'");?></td></tr>
				<tr><td>Until</td><td>:</td><td><?=$f->input("date_until",date("Y-m-d"),"type='date'");?></td></tr>
				<tr><td>Remark</td><td>:</td><td><?=$f->input("remark","","","classinput");?></td></tr>
			</table>
		</table>
		<br>
		<table width="100%"><tr>
			<td><?=$f->input("back","Back","type='button' onclick='window.location=\"tis_presence_menu.php?token=".$token."\";'");?></td>
			<td align="right"><?=$f->input("save","Save","type='submit'");?></td>
		</tr></table>
	</form>

<?php include_once "footer.php";?>