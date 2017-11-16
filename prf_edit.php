<?php include_once "head.php";?>
<?php
	$maker_by = $db->fetch_single_data("prf","maker_by",["id" => $_GET["id"]]);
	$checker_by = $db->fetch_single_data("prf","checker_by",["id" => $_GET["id"]]);
	$signer_by = $db->fetch_single_data("prf","signer_by",["id" => $_GET["id"]]);
	$approve_by = $db->fetch_single_data("prf","approve_by",["id" => $_GET["id"]]);
	$forbidden_chr_dashboards = $db->fetch_single_data("users","forbidden_chr_dashboards",["id" => $__user_id]);
	if($forbidden_chr_dashboards == 6){
		if(	$__username != $maker_by 
			&& $__username != $checker_by
			&& $__username != $signer_by
			&& $__username != $approve_by
		){
			?><script> 
				alert("Anda tidak ada kepentingan dengan PRF ini, silakan pilih PRF yang lain!"); 
				window.location = "prf_list.php";
			</script> <?php
			exit();
		}
	}
?>
<?php include_once "prf_js.php";?>
<?php
	$maker_user_email = $db->fetch_single_data("prf","maker_by",["id"=>$_GET["id"]]);
	$maker_user_id = $db->fetch_single_data("users","id",["email"=>$maker_user_email]);
	$projects = array();
	$data = $db->fetch_all_data("indottech_roles",[],"user_id = '".$maker_user_id."' AND module = 'PRF' AND role='maker'");
	if(count($data) > 0){
		$projects[] = "";
		foreach($data as $row){
			$project = $db->fetch_single_data("indottech_projects","name",["id"=>$row["project_id"]]);
			$project .= " -- ".$db->fetch_single_data("indottech_scopes","name",["id"=>$row["scope_id"]]);
			if($row["region_id"] > 0) $project .= " -- ".$db->fetch_single_data("indottech_regions","name",["id"=>$row["region_id"]]);
			$projects[$row["project_id"].":".$row["scope_id"].":".$row["region_id"]] = $project;
		}
	}
	
	if($db->fetch_single_data("prf","paid_by",array("id" => $_GET["id"])) != ""){
		javascript("alert('This PRF has Paid, You`re not allow to edit this PRF');");
		javascript("window.location='prf_list.php';");
	}
	if($__username != $db->fetch_single_data("prf","created_by",array("id"=>$_GET["id"]))){
		javascript("alert('You`re not allow to update this document');");
		javascript("window.location='prf_list.php';");
		exit();
	}
	if(($db->fetch_single_data("prf","checker_at",array("id" => $_GET["id"])) != "0000-00-00" || $db->fetch_single_data("prf","signer_at",array("id" => $_GET["id"])) != "0000-00-00" )
		&& $__username != $db->fetch_single_data("prf","created_by",array("id"=>$_GET["id"]))
	){
		javascript("alert('This PRF has Checked or Signed, You`re not allow to edit this PRF');");
		javascript("window.location='prf_list.php';");
		exit();
	}
?>
<div class="bo_title">Edit PRF</div>
<?php
	if(isset($_POST["save"])){
		$_projects = explode(":",$_POST["project"]);
		if($_projects[2] > 0)	$region_id = $_projects[2]; else $region_id = $_POST["region_id"];
		if($region_id > 0 || true){
			$prf_created_by = $db->fetch_single_data("prf","created_by",array("id"=>$_GET["id"]));
			$last_checker_by = $db->fetch_single_data("prf","checker_by",array("id"=>$_GET["id"]));
			$last_signer_by = $db->fetch_single_data("prf","signer_by",array("id"=>$_GET["id"]));
			$last_approve_by = $db->fetch_single_data("prf","approve_by",array("id"=>$_GET["id"]));
			$db->addtable("prf");			$db->where("id",$_GET["id"]);
			$db->addfield("code");			$db->addvalue($_POST["code"]);
			$db->addfield("cost_center_code");$db->addvalue($_POST["cost_center_code"]);
			$db->addfield("nominal");		$db->addvalue($_POST["nominal"]);
			$db->addfield("deduct_type");	$db->addvalue($_POST["deduct_type"]);
			$db->addfield("deduct_nominal");$db->addvalue($_POST["deduct_nominal"]);
			$db->addfield("payment_method");$db->addvalue($_POST["payment_method"]);
			$db->addfield("payment_to");	$db->addvalue($_POST["payment_to"]);
			$db->addfield("bank_name");		$db->addvalue($_POST["bank_name"]);
			$db->addfield("bank_account");	$db->addvalue($_POST["bank_account"]);
			$db->addfield("purpose");		$db->addvalue($_POST["purpose"]);
			$db->addfield("description");	$db->addvalue($_POST["description"]);
			$db->addfield("prf_mode");		$db->addvalue($_POST["prf_mode"]);
			$db->addfield("maker_at");		$db->addvalue($_POST["maker_at"]);
			if($__username == $prf_created_by){
				if($_POST["checker_by"] != $last_checker_by){
					$db->addfield("checker_by");	$db->addvalue($_POST["checker_by"]);
					$db->addfield("checker_at");	$db->addvalue("0000-00-00");
				}
				if($_POST["signer_by"] != $last_signer_by){
					$db->addfield("signer_by");		$db->addvalue($_POST["signer_by"]);
					$db->addfield("signer_at");		$db->addvalue("0000-00-00");
				}
				if($_POST["approve_by"] != $last_approve_by){
					$db->addfield("approve_by");	$db->addvalue($_POST["approve_by"]);
					$db->addfield("approve_at");	$db->addvalue("0000-00-00");
				}
			}
			$db->addfield("is_rejected");	$db->addvalue(0);
			$db->addfield("updated_at");	$db->addvalue(date("Y-m-d H:i:s"));
			$db->addfield("updated_by");	$db->addvalue($__username);
			$db->addfield("updated_ip");	$db->addvalue($_SERVER["REMOTE_ADDR"]);
			$inserting = $db->update();
			if($inserting["affected_rows"] >= 0){
				$prf_id = $_GET["id"];
				$db->addtable("indottech_prfs");$db->where("prf_id",$prf_id);$db->delete_();
				
				$db->addtable("indottech_prfs");
				$db->addfield("prf_id");		$db->addvalue($prf_id);
				$db->addfield("project_id");	$db->addvalue($_projects[0]);
				$db->addfield("scope_id");		$db->addvalue($_projects[1]);
				$db->addfield("region_id");		$db->addvalue($region_id);
				$db->addfield("created_at");	$db->addvalue(date("Y-m-d H:i:s"));
				$db->addfield("created_by");	$db->addvalue($__username);
				$db->addfield("created_ip");	$db->addvalue($_SERVER["REMOTE_ADDR"]);
				$db->addfield("updated_at");	$db->addvalue(date("Y-m-d H:i:s"));
				$db->addfield("updated_by");	$db->addvalue($__username);
				$db->addfield("updated_ip");	$db->addvalue($_SERVER["REMOTE_ADDR"]);
				$db->insert();
				
				if($_FILES["attachment"]["tmp_name"]){
					$_ext = strtolower(pathinfo($_FILES['attachment']['name'],PATHINFO_EXTENSION));
					$attachment_name = "attachment_".$prf_id."_".rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).".".$_ext;
					move_uploaded_file($_FILES['attachment']['tmp_name'],"prf_attachments/".$attachment_name);
					$db->addtable("prf");			$db->where("id",$prf_id);
					$db->addfield("attachment");	$db->addvalue($attachment_name);
					$db->update();
				}
				
				
				javascript("alert('Data Saved');");
				javascript("window.location='prf_view.php?id=".$_GET["id"]."';");
			} else {
				javascript("alert('Saving data failed');");
			}
		} else {
			javascript("alert('Silakan pilih Region');");
		}
	}
	
	$notallowchange = "";
	if($__username != $db->fetch_single_data("prf","created_by",array("id"=>$_GET["id"]))){
		$notallowchange = " readonly";
	}
	
	$db->addtable("prf");$db->where("id",$_GET["id"]);$db->limit(1);$data = $db->fetch_data();
	$db->addtable("indottech_prfs");$db->where("prf_id",$data["id"]);$db->limit(1);$prfs = $db->fetch_data();
	$project_val = $prfs["project_id"].":".$prfs["scope_id"].":".$prfs["region_id"];
	if(!$projects[$project_val]){
		$project_val = $prfs["project_id"].":".$prfs["scope_id"].":0";
	}
	
	$sel_projects = $f->select("project",$projects,$project_val,"onchange='has_region(this.value);'");
	$sel_region = $f->select("region_id",$db->fetch_select_data("indottech_regions","id","concat('[',initial,'] ',name)",[],[],"",true),$_POST["region_id"],"onchange='load_checker(project.value,this.value);'");
	$sel_cost_center = $f->select("cost_center_code",$db->fetch_select_data("cost_centers","code","concat('[',code,'] ',name)",[],[],"",true),$data["cost_center_code"]);
	
    $txt_code = $f->input("code",$data["code"],"");
    $txt_nominal = $f->input("nominal",$data["nominal"],"type='number'".$notallowchange." onblur='load_checker(project.value,region_id.value,this.value);'");
	$sel_deduct_type = $f->select("deduct_type",array(""=>"","1"=>"PPh 21","2"=>"PPh 23","3"=>"Other"),$data["deduct_type"]);
    $txt_deduct_nominal = $f->input("deduct_nominal",$data["deduct_nominal"],"type='number'");
	$sel_payment_method = $f->select("payment_method",array(""=>"","1"=>"Cheque","2"=>"Bilyet Giro","3"=>"Transfer","4"=>"Cash"),$data["payment_method"]);
	$txt_payment_to = $f->input("payment_to",$data["payment_to"]);
	$txt_bank_name = $f->input("bank_name",$data["bank_name"]);
	$txt_bank_account = $f->input("bank_account",$data["bank_account"]);
	$txt_purpose = $f->textarea("purpose",$data["purpose"],"style='width:400px;height:30px;'".$notallowchange);
	$txt_description = $f->textarea("description",$data["description"],"style='width:400px;height:100px;'".$notallowchange);
	$sel_prf_mode = $f->select("prf_mode",array("1"=>"Normal","2"=>"Reimburse","3"=>"Advance"),$data["prf_mode"]);
	$txt_attachment = "";
	if($data["attachment"] != ""){ $txt_attachment = "<i>".$data["attachment"]."</i><br>"; }
	$txt_attachment .= $f->input("attachment","","type='file'");
	$txt_maker_at = $f->input("maker_at",$data["maker_at"],"type='date' readonly");
?>
<?=$f->start("","POST","","enctype='multipart/form-data'");?>
	<?=$t->start("","editor_content");?>
        <?=$t->row(array("Project",$sel_projects));?>
        <?=$t->row(array("Region","<div id='div_region' style='visibility:hidden;'>".$sel_region."</div>"));?>
        <?=$t->row(array("PRF Code",$txt_code));?>
        <?=$t->row(array("Code Number","<b>".$data["code_number"]."</b>"));?>
        <?=$t->row(array("Cost Center",$sel_cost_center));?>
        <?=$t->row(array("Nominal Amount",$txt_nominal));?>
        <?=$t->row(array("Deduct",$sel_deduct_type." ".$txt_deduct_nominal));?>
        <?=$t->row(array("Payment's Method",$sel_payment_method));?>
        <?=$t->row(array("Payment To",$txt_payment_to));?>
        <?=$t->row(array("Bank Name",$txt_bank_name));?>
        <?=$t->row(array("Bank Account Number (No.Rekening)",$txt_bank_account));?>
        <?=$t->row(array("Payment's Purpose",$txt_purpose));?>
        <?=$t->row(array("Note",$txt_description));?>
        <?=$t->row(array("PRF Mode",$sel_prf_mode));?>
        <?=$t->row(array("Attachment",$txt_attachment));?>
        <?=$t->row(array("Request Date",$txt_maker_at));?>
        <?=$t->row(array("Maker By",$data["maker_by"]));?>
        <?=$t->row(array("Checker By","<div id='div_checker'></div>"));?>
        <?=$t->row(array("Signer By","<div id='div_signer'></div>"));?>
        <?=$t->row(array("Approval By","<div id='div_approve'></div>"));?>
	<?=$t->end();?>
	<br>
	<?=$f->input("save","Save","type='submit'");?> 
	<?=$f->input("back","Back","type='button' onclick=\"window.location='".str_replace("_edit","_list",$_SERVER["PHP_SELF"])."';\"");?>
	<?=$f->input("view","View","type='button' onclick=\"window.location='prf_view.php?id=".$_GET["id"]."';\"");?>
<?=$f->end();?>
<script>
	has_region(project.value);
	region_id.value = "<?=$prfs["region_id"];?>";
	load_checker(project.value,"<?=$prfs["region_id"];?>","<?=$data["nominal"];?>");
</script>
<?php include_once "footer.php";?>
