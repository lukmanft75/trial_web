<?php 
	include_once "header.php";
	$user = $db->fetch_single_data("users","name",["email" => $_SESSION["username"]]);
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
			$_errormessage = "<font color='blue'>Jam pulang berhasil disimpan!</font>";
		} else {
			$_errormessage = "<font color='red'>Data gagal disimpan!</font>";
		}
	}
	
	// if($_GET["doctype"] == "rectifier"){ $checked[3] = "checked"; 	}
	// $sites = $db->fetch_select_data("indottech_sites","id","concat(name,' [',site_code,']')",["project_id" => "13"],["name"],"",true);
?>
	<center><?=$_errormessage;?></center>
	<table align="center" width="320px">
		<tr><td><h4>Hello <b><?=$user;?></b>, Thanks for your efforts today</h4></td></tr>
	</table>
	<table width="100%"><tr>
			<td><?=$f->input("back","Back","type='button' onclick='window.location=\"tis_presence_menu.php?token=".$token."\";'");?></td>
	</table>
	<!-- proses insert data jam pulang user ke db -->

<?php include_once "footer.php";?>