<?php include_once "head.php";?>
<?php include_once "prf_js.php";?>
<div class="bo_title">Add PRF</div>
<?php
	$projects = array();
	$data = $db->fetch_all_data("indottech_roles",[],"user_id = '".$__user_id."' AND module = 'PRF' AND role='maker'");
	if(count($data) > 0){
		$projects[] = "";
		foreach($data as $row){
			$project = $db->fetch_single_data("indottech_projects","name",["id"=>$row["project_id"]]);
			$project .= " -- ".$db->fetch_single_data("indottech_scopes","name",["id"=>$row["scope_id"]]);
			if($row["region_id"] > 0) $project .= " -- ".$db->fetch_single_data("indottech_regions","name",["id"=>$row["region_id"]]);
			$projects[$row["project_id"].":".$row["scope_id"].":".$row["region_id"]] = $project;
		}
	} else {
		?>
			<script> 
				alert("Anda tidak memilik akses untuk membuat PRF"); 
				window.location = "prf_list.php";
			</script>
		<?php
		exit();
	}
	
	$departement = $db->fetch_single_data("users","job_division",array("id"=>$__user_id));
	if(isset($_POST["save"])){
		$_projects = explode(":",$_POST["project"]);
		if($project[2] > 0)	$region_id = $_projects[1]; else $region_id = $_POST["region_id"];
		if($region_id > 0){
			$project = $db->fetch_single_data("indottech_projects","initial",["id" => $_projects[0]]);
			$scope = $db->fetch_single_data("indottech_scopes","initial",["id" => $_projects[1]]);
			$region = $db->fetch_single_data("indottech_regions","initial",["id" => $region_id]);
		
			$temp_code = "%/".$project."/".$scope."/".$region."/".integerToRoman(date("m") * 1)."/".date("Y");
			$code_number = $db->fetch_single_data("prf","code",array("code" => $temp_code.":LIKE"),array("code DESC"));
			if($code_number == ""){
				$_code = "001";
			} else {
				$_code = (str_replace($temp_code,"",$code_number) * 1) + 1;
				$_code = substr("000",0,3 - strlen($_code)).$_code;
			}
			echo $code_number = str_replace("%",$_code,$temp_code);
			
			$db->addtable("prf");
			$db->addfield("code_number");	$db->addvalue($code_number);
			$db->addfield("departement");	$db->addvalue($departement);
			$db->addfield("nominal");		$db->addvalue($_POST["nominal"]);
			$db->addfield("payment_method");$db->addvalue($_POST["payment_method"]);
			$db->addfield("payment_to");	$db->addvalue($_POST["payment_to"]);
			$db->addfield("bank_name");		$db->addvalue($_POST["bank_name"]);
			$db->addfield("bank_account");	$db->addvalue($_POST["bank_account"]);
			$db->addfield("purpose");		$db->addvalue($_POST["purpose"]);
			$db->addfield("description");	$db->addvalue($_POST["description"]);
			$db->addfield("prf_mode");		$db->addvalue($_POST["prf_mode"]);
			$db->addfield("maker_at");		$db->addvalue($_POST["maker_at"]);
			$db->addfield("maker_by");		$db->addvalue($__username);
			$db->addfield("checker_by");	$db->addvalue($_POST["checker_by"]);
			$db->addfield("checker_at");	$db->addvalue("0000-00-00");
			$db->addfield("signer_by");		$db->addvalue($_POST["signer_by"]);
			$db->addfield("signer_at");		$db->addvalue("0000-00-00");
			$db->addfield("approve_by");	$db->addvalue($_POST["approve_by"]);
			$db->addfield("approve_at");	$db->addvalue("0000-00-00");
			$db->addfield("created_at");	$db->addvalue(date("Y-m-d H:i:s"));
			$db->addfield("created_by");	$db->addvalue($__username);
			$db->addfield("created_ip");	$db->addvalue($_SERVER["REMOTE_ADDR"]);
			$db->addfield("updated_at");	$db->addvalue(date("Y-m-d H:i:s"));
			$db->addfield("updated_by");	$db->addvalue($__username);
			$db->addfield("updated_ip");	$db->addvalue($_SERVER["REMOTE_ADDR"]);
			$inserting = $db->insert();
			if($inserting["affected_rows"] >= 0){
				$prf_id = $inserting["insert_id"];
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
					$attachment_name = $prf_id.".".$_ext;
					move_uploaded_file($_FILES['attachment']['tmp_name'],"prf_attachments/".$attachment_name);
					$db->addtable("prf");			$db->where("id",$prf_id);
					$db->addfield("attachment");	$db->addvalue($attachment_name);
					$db->update();
				}
				
				javascript("alert('Data Saved');");
				javascript("window.location='prf_view.php?id=".$prf_id."';");
			} else {
				javascript("alert('Saving data failed');");
			}
		} else {
			javascript("alert('Silakan pilih Region');");
		}
	}
	
	$sel_projects = $f->select("project",$projects,$_POST["project"],"onchange='has_region(this.value);'");
	$sel_region = $f->select("region_id",$db->fetch_select_data("indottech_regions","id","concat('[',initial,'] ',name)",[],[],"",true),$_POST["region_id"],"onchange='load_checker(project.value,this.value);'");
	
    $txt_nominal = $f->input("nominal",$_POST["nominal"],"type='number' onblur='load_checker(project.value,region_id.value,this.value);'");
	$sel_payment_method = $f->select("payment_method",array(""=>"","1"=>"Cheque","2"=>"Bilyet Giro","3"=>"Transfer","4"=>"Cash"),$_POST["payment_method"]);
	$txt_payment_to = $f->input("payment_to",$_POST["payment_to"]);
	$txt_bank_name = $f->input("bank_name",$_POST["bank_name"]);
	$txt_bank_account = $f->input("bank_account",$_POST["bank_account"]);
	$txt_purpose = $f->textarea("purpose",$_POST["purpose"],"style='width:400px;height:30px;'");
	$txt_description = $f->textarea("description",$_POST["description"],"style='width:400px;height:100px;'");
	$sel_prf_mode = $f->select("prf_mode",array("1"=>"Normal","2"=>"Reimburse","3"=>"Advance"),$_POST["prf_mode"]);
	$txt_attachment = $f->input("attachment","","type='file'");
	if($_POST["maker_at"] == "") $_POST["maker_at"] = date("Y-m-d");
	$txt_maker_at = $f->input("maker_at",$_POST["maker_at"],"type='date' readonly");
?>

<?=$f->start("","POST","","enctype='multipart/form-data'");?>
	<?=$t->start("","editor_content");?>
        <?=$t->row(array("Project",$sel_projects));?>
        <?=$t->row(array("Region","<div id='div_region' style='visibility:hidden;'>".$sel_region."</div>"));?>
        <?=$t->row(array("Code Number","<i>Auto generate</i>"));?>
        <?=$t->row(array("Nominal Amount",$txt_nominal));?>
        <?=$t->row(array("Payment's Method",$sel_payment_method));?>
        <?=$t->row(array("Payment To",$txt_payment_to));?>
        <?=$t->row(array("Bank Name",$txt_bank_name));?>
        <?=$t->row(array("Bank Account Number (No.Rekening)",$txt_bank_account));?>
        <?=$t->row(array("Payment's Purpose",$txt_purpose));?>
        <?=$t->row(array("Note",$txt_description));?>
        <?=$t->row(array("PRF Mode",$sel_prf_mode));?>
        <?=$t->row(array("Attachment",$txt_attachment));?>
        <?=$t->row(array("Request Date",$txt_maker_at));?>
        <?=$t->row(array("Checker By","<div id='div_checker'></div>"));?>
        <?=$t->row(array("Signer By","<div id='div_signer'></div>"));?>
        <?=$t->row(array("Approval By","<div id='div_approve'></div>"));?>
	<?=$t->end();?>
	<br>
	<?=$f->input("save","Save","type='submit'");?> <?=$f->input("back","Back","type='button' onclick=\"window.location='".str_replace("_add","_list",$_SERVER["PHP_SELF"])."';\"");?>
<?=$f->end();?>
<?php include_once "footer.php";?>