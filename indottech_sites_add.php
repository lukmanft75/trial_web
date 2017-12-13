<?php include_once "head.php";?>
<div class="bo_title">Add Site</div>
<?php
	if(isset($_POST["save"])){
		$db->addtable("indottech_sites");	
		$db->addfield("kode");				$db->addvalue($_POST["kode"]);
		$db->addfield("name");				$db->addvalue($_POST["name"]);
		$db->addfield("longitude");			$db->addvalue($_POST["longitude"]);
		$db->addfield("latitude");			$db->addvalue($_POST["latitude"]);
		$db->addfield("created_at");		$db->addvalue(date("Y-m-d H:i:s"));
		$db->addfield("created_by");		$db->addvalue($__username);
		$db->addfield("created_ip");		$db->addvalue($_SERVER["REMOTE_ADDR"]);
		$inserting = $db->insert();
		if($inserting["affected_rows"] >= 0){
			javascript("alert('Data Saved');");
			javascript("window.location='indottech_sites_list.php';");
		} else {
			javascript("alert('Saving data failed');");
		}
	}
	
	$txt_kode 		= $f->input("kode",$_POST["kode"]);
	$txt_name 		= $f->input("name",$_POST["name"]);
	$txt_longitude 	= $f->input("longitude",$_POST["longitude"]);
	$txt_latitude 	= $f->input("latitude",$_POST["latitude"]);
	
?>
<?=$f->start();?>
	<?=$t->start("","editor_content");?>
        <?=$t->row(array("Kode",$txt_kode));?>
		<?=$t->row(array("Name",$txt_name));?>
		<?=$t->row(array("Longitude",$txt_longitude));?>
		<?=$t->row(array("Latitude",$txt_latitude));?>
	<?=$t->end();?>
	<?=$f->input("save","Save","type='submit'");?> <?=$f->input("back","Back","type='button' onclick=\"window.location='indottech_sites_list.php';\"");?>
<?=$f->end();?>
<?php include_once "footer.php";?>