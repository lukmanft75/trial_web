<?php 
	include_once "header.php";
	$atd_id = $_GET["atd_id"];
	$bts_sran_2_2_2_1 = $db->fetch_all_data("indottech_bts_sran_2_2_2_1",[],"atd_id='".$atd_id."'")[0];
	
	if(isset($_POST["save"])){
		// echo "<pre>";
		// print_r($_POST);
		// echo "</pre>";
		
		$type_ids = "|".$_POST["type_id"]."|";
		
		$db->addtable("indottech_bts_sran_2_2_2_1");
		if($bts_sran_2_2_2_1["id"] > 0) 					$db->where("id",$bts_sran_2_2_2_1["id"]);
		$db->addfield("atd_id");							$db->addvalue($atd_id);
		$db->addfield("v_type");							$db->addvalue($type_ids);
		$db->addfield("remarks");							$db->addvalue($_POST["remarks"]);
		$db->addfield("info");								$db->addvalue($_POST["info"]);
		if($bts_sran_2_2_2_1["id"] > 0) $inserting = $db->update();
		else $inserting = $db->insert();
		
		if($inserting["affected_rows"] > 0){
			javascript("alert('Data berhasil disimpan');");
			javascript("window.location=\"bts_sran_2_2_3.php?token=".$token."&atd_id=".$atd_id."\";");
			exit();
		} else {
			$_errormessage = "<font color='red'>Data gagal disimpan!</font>";
		}
	}
?>
<center>2.2.2.1 Transmission Link Information</center>
<center><?=$_errormessage;?></center>
<form method="POST" action="?token=<?=$token;?>&atd_id=<?=$atd_id;?>">
<table width="320"align="center">
	<tr>
		<td>
			<br>
			<table align="center" border="1">
				<tr>
					<td>TYPE</td>
					<td>
						<?=$f->input("type_id[0]","1","style='height:13px;' type='checkbox'".$checked[1]);?> Electrial Eth.<br>
						<?=$f->input("type_id[1]","2","style='height:13px;' type='checkbox'".$checked[2]);?> Optical Eth.
					</td>
				</tr>
					<td>REMARKS<br>(Capacity and Converter type)</td>
					<td><?=$f->textarea("remarks",$bts_sran_2_2_2_1["remarks"],"required","classinput");?></td>
				</tr>
				<tr>
					<td>Cross connect route information</td>
					<td><?=$f->textarea("info",$bts_sran_2_2_2_1["info"],"required","classinput");?></td>
				</tr>
			</table>
			<br>
			<table width="100%">
				<tr>
					<td><?=$f->input("back","Back","type='button' onclick='window.location=\"bts_sran_2_2_2.php?token=".$token."&atd_id=".$atd_id."\";'");?></td>
					<td align="right"><?=$f->input("save","Save","type='submit'");?></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</form>	
<script> $("#nbw_no").focus(); </script>
<?php include_once "footer.php";?>