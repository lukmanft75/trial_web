<?php include_once "head.php";?>
<div class="bo_title">Add PRF</div>
<?php
	$departement = $db->fetch_single_data("users","job_division",array("id"=>$__user_id));
	if(isset($_POST["save"])){
		$db->addtable("prf");
		$db->addfield("code");			$db->addvalue($_POST["code"]);
		$db->addfield("code_number");	$db->addvalue($_POST["code_number"]);
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
		$db->addfield("created_at");	$db->addvalue(date("Y-m-d H:i:s"));
		$db->addfield("created_by");	$db->addvalue($__username);
		$db->addfield("created_ip");	$db->addvalue($_SERVER["REMOTE_ADDR"]);
		$db->addfield("updated_at");	$db->addvalue(date("Y-m-d H:i:s"));
		$db->addfield("updated_by");	$db->addvalue($__username);
		$db->addfield("updated_ip");	$db->addvalue($_SERVER["REMOTE_ADDR"]);
		$inserting = $db->insert();
		if($inserting["affected_rows"] >= 0){
			$prf_id = $inserting["insert_id"];
			javascript("alert('Data Saved');");
			javascript("window.location='prf_view.php?id=".$prf_id."';");
		} else {
			javascript("alert('Saving data failed');");
		}
	}
	
	$code_number = "%/".date("m/Y");
	$code_number = $db->fetch_single_data("prf","code_number",array("departement"=>$departement,"code_number" => $code_number.":LIKE"),array("code_number DESC"));
	if($code_number == ""){
		$code_number = "001/".date("m/Y");
	} else {
		$code_number = (str_replace(date("m/Y"),"",$code_number) * 1) + 1;
		$code_number = substr("000",0,3 - strlen($code_number)).$code_number."/".date("m/Y");
	}
	
    $txt_code = $f->input("code",$_POST["code"],"");
    $txt_code_number = $f->input("code_number",$code_number,"");
    $txt_nominal = $f->input("nominal",$_POST["nominal"],"type='number'");
	$sel_payment_method = $f->select("payment_method",array(""=>"","1"=>"Cheque","2"=>"Bilyet Giro","3"=>"Transfer","4"=>"Cash"),$_POST["payment_method"]);
	$txt_payment_to = $f->input("payment_to",$_POST["payment_to"]);
	$txt_bank_name = $f->input("bank_name",$_POST["bank_name"]);
	$txt_bank_account = $f->input("bank_account",$_POST["bank_account"]);
	$txt_purpose = $f->textarea("purpose",$_POST["purpose"],"style='width:400px;height:30px;'");
	$txt_description = $f->textarea("description",$_POST["description"],"style='width:400px;height:100px;'");
	$sel_prf_mode = $f->select("prf_mode",array("1"=>"Normal","2"=>"Reimburse","3"=>"Advance"),$_POST["prf_mode"]);
	if($_POST["maker_at"] == "") $_POST["maker_at"] = date("Y-m-d");
	$txt_maker_at = $f->input("maker_at",$_POST["maker_at"],"type='date' readonly");
	$sel_checker = $f->select("checker_by",$db->fetch_select_data("users","email","name",array(),array(),"",true),$_POST["checker_by"]);
	$sel_signer = $f->select("signer_by",$db->fetch_select_data("users","email","name",array(),array(),"",true),$_POST["signer_by"]);
?>
<?=$f->start("","POST");?>
	<?=$t->start("","editor_content");?>
        <?=$t->row(array("PRF Code",$txt_code));?>
        <?=$t->row(array("Code Number",$txt_code_number));?>
        <?=$t->row(array("Nominal Amount",$txt_nominal));?>
        <?=$t->row(array("Payment's Method",$sel_payment_method));?>
        <?=$t->row(array("Payment To",$txt_payment_to));?>
        <?=$t->row(array("Bank Name",$txt_bank_name));?>
        <?=$t->row(array("Bank Account Number (No.Rekening)",$txt_bank_account));?>
        <?=$t->row(array("Payment's Purpose",$txt_purpose));?>
        <?=$t->row(array("Note",$txt_description));?>
        <?=$t->row(array("PRF Mode",$sel_prf_mode));?>
        <?=$t->row(array("Request Date",$txt_maker_at));?>
        <?=$t->row(array("Checker",$sel_checker));?>
        <?=$t->row(array("Signer",$sel_signer));?>
	<?=$t->end();?>
	<br>
	<?=$f->input("save","Save","type='submit'");?> <?=$f->input("back","Back","type='button' onclick=\"window.location='".str_replace("_add","_list",$_SERVER["PHP_SELF"])."';\"");?>
<?=$f->end();?>
<?php include_once "footer.php";?>