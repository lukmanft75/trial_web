<?php 
	include_once "header.php";
	$atd_id = $_GET["atd_id"];
	$bts_sran_7 = $db->fetch_all_data("indottech_bts_sran_7",[],"atd_id='".$atd_id."'")[0];
	
	if(isset($_POST["save"])){
		// echo "<pre>";
		// print_r($_POST);
		// echo "</pre>";
		
		$db->addtable("indottech_bts_sran_7");
		if($bts_sran_7["id"] > 0) 				$db->where("id",$bts_sran_7["id"]);
		$db->addfield("atd_id");				$db->addvalue($atd_id);
		$db->addfield("seqno");					$db->addvalue($_POST["seqno"]);
		$db->addfield("description");			$db->addvalue($_POST["description"]);
		$db->addfield("pic");					$db->addvalue($_POST["cell_id_no_2"]);
		$db->addfield("close_at");				$db->addvalue($_POST["close_at"]);
		if($bts_sran_7["id"] > 0) $inserting = $db->update();
		else $inserting = $db->insert();
		
		if($inserting["affected_rows"] > 0){
			javascript("alert('Data berhasil disimpan');");
			javascript("window.location=\"bts_sran_7.php?token=".$token."&atd_id=".$atd_id."\";");
			exit();
		} else {
			$_errormessage = "<font color='red'>Data gagal disimpan!</font>";
		}
	}
?>
<center><b>7. REMARK</b></center>
<center><?=$_errormessage;?></center>
<form method="POST" action="?token=<?=$token;?>&atd_id=<?=$atd_id;?>">
<table width="360">
	<tr>
		<td>
			<br>
			<table align="center" border="1">
	<tr>
		<td>
			<table border="1">
				<tr align="center">
					<td><b>No</b></td>
					<td><b>Description</b></td>
					<td><b>PIC [Company]</b></td>
					<td><b>Target close [Date]</b></td>
				</tr>
				<tr align="left">
					<td><?=$f->input("seqno",$bts_sran_7["seqno"],"placeholder = 'No.'","classinput");?></td>
					<td><?=$f->input("description",$bts_sran_7["description"],"placeholder = 'Description.'","classinput");?></td>
					<td><?=$f->input("pic",$bts_sran_7["pic"],"placeholder = 'PIC'","classinput");?></td>
					<td><?=$f->input("close_at",$bts_sran_7["close_at"], "type='date'");?></td>
				</tr>
				<tr align="left">
					<td><?=$f->input("seqno",$bts_sran_7["seqno"],"placeholder = 'No.'","classinput");?></td>
					<td><?=$f->input("description",$bts_sran_7["description"],"placeholder = 'Description.'","classinput");?></td>
					<td><?=$f->input("pic",$bts_sran_7["pic"],"placeholder = 'PIC'","classinput");?></td>
					<td><?=$f->input("close_at",$bts_sran_7["close_at"], "type='date'");?></td>
				</tr>
				<tr align="left">
					<td><?=$f->input("seqno",$bts_sran_7["seqno"],"placeholder = 'No.'","classinput");?></td>
					<td><?=$f->input("description",$bts_sran_7["description"],"placeholder = 'Description.'","classinput");?></td>
					<td><?=$f->input("pic",$bts_sran_7["pic"],"placeholder = 'PIC'","classinput");?></td>
					<td><?=$f->input("close_at",$bts_sran_7["close_at"], "type='date'");?></td>
				</tr>
			</table>
		</td>
	</tr>
			</table>
			<table width="100%">
				<tr>
					<td><?=$f->input("back","Back","type='button' onclick='window.location=\"bts_sran_2_3_3.php?token=".$token."&atd_id=".$atd_id."\";'");?></td>
					<td align="right"><?=$f->input("save","Save","type='submit'");?></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</form>	
<script> $("#nbw_no").focus(); </script>
<?php include_once "footer.php";?>