<?php include_once "head.php";?>
<?php
	if($db->fetch_single_data("prf","paid_by",array("id" => $_GET["id"])) != ""){
		javascript("alert('This PRF has Paid, You`re not allow to edit this PRF');");
		javascript("window.location='prf_list.php';");
	}
	if($__group_id > 4 && $__username != $db->fetch_single_data("prf","created_by",array("id"=>$_GET["id"]))){
		javascript("alert('You`re not allow to update this document');");
		javascript("window.location='prf_list.php';");
		exit();
	}
	if($__group_id > 4 
		&& ($db->fetch_single_data("prf","checker_at",array("id" => $_GET["id"])) != "0000-00-00" || $db->fetch_single_data("prf","signer_at",array("id" => $_GET["id"])) != "0000-00-00" )
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
		$prf_created_by = $db->fetch_single_data("prf","created_by",array("id"=>$_GET["id"]));
		$db->addtable("prf");			$db->where("id",$_GET["id"]);
		$db->addfield("code");			$db->addvalue($_POST["code"]);
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
		if($__group_id > 4 || $__username == $prf_created_by){
			$db->addfield("checker_by");	$db->addvalue($_POST["checker_by"]);
			$db->addfield("checker_at");	$db->addvalue("0000-00-00");
			$db->addfield("signer_by");		$db->addvalue($_POST["signer_by"]);
			$db->addfield("signer_at");		$db->addvalue("0000-00-00");
		}
		$db->addfield("updated_at");	$db->addvalue(date("Y-m-d H:i:s"));
		$db->addfield("updated_by");	$db->addvalue($__username);
		$db->addfield("updated_ip");	$db->addvalue($_SERVER["REMOTE_ADDR"]);
		$inserting = $db->update();
		if($inserting["affected_rows"] >= 0){
			javascript("alert('Data Saved');");
			javascript("window.location='prf_view.php?id=".$_GET["id"]."';");
		} else {
			javascript("alert('Saving data failed');");
		}
	}
	
	$notallowchange = "";
	if($__group_id <= 4 && $__username != $db->fetch_single_data("prf","created_by",array("id"=>$_GET["id"]))){
		$notallowchange = " readonly";
	}
	
	$db->addtable("prf");$db->where("id",$_GET["id"]);$db->limit(1);$data = $db->fetch_data();
	
    $txt_code = $f->input("code",$data["code"],"");
    $txt_nominal = $f->input("nominal",$data["nominal"],"type='number'".$notallowchange);
	$sel_deduct_type = $f->select("deduct_type",array(""=>"","1"=>"PPh 21","2"=>"PPh 23","3"=>"Other"),$data["deduct_type"]);
    $txt_deduct_nominal = $f->input("deduct_nominal",$data["deduct_nominal"],"type='number'");
	$sel_payment_method = $f->select("payment_method",array(""=>"","1"=>"Cheque","2"=>"Bilyet Giro","3"=>"Transfer","4"=>"Cash"),$data["payment_method"]);
	$txt_payment_to = $f->input("payment_to",$data["payment_to"]);
	$txt_bank_name = $f->input("bank_name",$data["bank_name"]);
	$txt_bank_account = $f->input("bank_account",$data["bank_account"]);
	$txt_purpose = $f->textarea("purpose",$data["purpose"],"style='width:400px;height:30px;'".$notallowchange);
	$txt_description = $f->textarea("description",$data["description"],"style='width:400px;height:100px;'".$notallowchange);
	$sel_prf_mode = $f->select("prf_mode",array("1"=>"Normal","2"=>"Reimburse","3"=>"Advance"),$data["prf_mode"]);
	$txt_maker_at = $f->input("maker_at",$data["maker_at"],"type='date' readonly");
	$sel_checker = $f->select("checker_by",$db->fetch_select_data("users","email","name",array(),array(),"",true),$data["checker_by"]);
	$sel_signer = $f->select("signer_by",$db->fetch_select_data("users","email","name",array(),array(),"",true),$data["signer_by"]);
?>
<?=$f->start("","POST");?>
	<?=$t->start("","editor_content");?>
        <?=$t->row(array("PRF Code",$txt_code));?>
        <?=$t->row(array("Code Number","<b>".$data["code_number"]."</b>"));?>
        <?=$t->row(array("Nominal Amount",$txt_nominal));?>
        <?=$t->row(array("Deduct",$sel_deduct_type." ".$txt_deduct_nominal));?>
        <?=$t->row(array("Payment's Method",$sel_payment_method));?>
        <?=$t->row(array("Payment To",$txt_payment_to));?>
        <?=$t->row(array("Bank Name",$txt_bank_name));?>
        <?=$t->row(array("Bank Account Number (No.Rekening)",$txt_bank_account));?>
        <?=$t->row(array("Payment's Purpose",$txt_purpose));?>
        <?=$t->row(array("Note",$txt_description));?>
        <?=$t->row(array("PRF Mode",$sel_prf_mode));?>
        <?=$t->row(array("Request Date",$txt_maker_at));?>
        <?=$t->row(array("Maker By",$data["maker_by"]));?>
        <?=$t->row(array("Checker",$sel_checker));?>
        <?=$t->row(array("Signer",$sel_signer));?>
	<?=$t->end();?>
	<br>
	<?=$f->input("save","Save","type='submit'");?> 
	<?=$f->input("back","Back","type='button' onclick=\"window.location='".str_replace("_edit","_list",$_SERVER["PHP_SELF"])."';\"");?>
	<?=$f->input("view","View","type='button' onclick=\"window.location='prf_view.php?id=".$_GET["id"]."';\"");?>
<?=$f->end();?>
<?php include_once "footer.php";?>