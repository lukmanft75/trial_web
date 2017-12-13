<?php include_once "head.php";?>
<div class="bo_title">Edit Site</div>
<?php
	if(isset($_POST["save"])){
		$db->addtable("indottech_sites");	$db->where("id",$_GET["id"]);
		$db->addfield("kode");				$db->addvalue($_POST["kode"]);
		$db->addfield("name");				$db->addvalue($_POST["name"]);
		$db->addfield("longitude");			$db->addvalue($_POST["longitude"]);
		$db->addfield("latitude");			$db->addvalue($_POST["latitude"]);
		$updating = $db->update();
		if($updating["affected_rows"] >= 0){
			javascript("alert('Data Saved');");
			javascript("window.location='indottech_sites_list.php';");
		} else {
			javascript("alert('Saving data failed');");
		}
	}
	
	$db->addtable("indottech_sites");$db->where("id",$_GET["id"]);$db->limit(1);$indottech_site = $db->fetch_data();
	$txt_kode 		= $f->input("kode",$indottech_site["kode"]);
	$txt_name 		= $f->input("name",$indottech_site["name"]);
	$txt_longitude 	= $f->input("longitude",$indottech_site["longitude"]);
	$txt_latitude 	= $f->input("latitude",$indottech_site["latitude"]);
	
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