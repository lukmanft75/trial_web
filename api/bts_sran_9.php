<?php 
	include_once "header.php";
	$atd_id = $_GET["atd_id"];
	$bts_sran_9 = $db->fetch_all_data("indottech_bts_sran_9",[],"atd_id='".$atd_id."'")[0];
	
	if(isset($_POST["save"])){
		// echo "<pre>";
		// print_r($_POST);
		// echo "</pre>";
		
		$db->addtable("indottech_bts_sran_9");
		if($bts_sran_9["id"] > 0) 					$db->where("id",$bts_sran_9["id"]);
		$db->addfield("atd_id");					$db->addvalue($atd_id);
		$db->addfield("seqno");						$db->addvalue($_POST["seqno"]);
		$db->addfield("description");				$db->addvalue($_POST["description"]);
		$db->addfield("history_at");				$db->addvalue($_POST["history_at"]);
		if($bts_sran_9["id"] > 0) $inserting = $db->update();
		else $inserting = $db->insert();
		
		if($inserting["affected_rows"] > 0){
			javascript("alert('Data berhasil disimpan');");
			javascript("window.location=\"atp_installation.php?token=".$token."&atd_id=".$atd_id."\";");
			exit();
		} else {
			$_errormessage = "<font color='red'>Data gagal disimpan!</font>";
		}
	}
?>
<center><b>9. DOCUMENT HISTORY</b></center>
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
							<td><b>Date</b></td>
							</tr>
						<tr align="left">
							<td>1</td>
							<td>Remove old version<br>hardware from option list</td>
							<td><input type="date"></td>
							</tr>
						<tr align="left">
							<td>2</td>
							<td>Insert list of technology<br>SRAN table</td>
							<td><input type="date"></td>
							</tr>
						<tr align="left">
							<td>3</td>
							<td>Remove old installation<br>check list (BTS cabinet)</td>
							<td><input type="date"></td>
							</tr>
						<tr align="left">
							<td>4</td>
							<td>Update check list from<br>feeder to optic cable (feeder less solution</td>
							<td><input type="date"></td>
							</tr>
						<tr align="left">
							<td>5</td>
							<td>Update template of <br>equipment SRAN BoQ</td>
							<td><input type="date"></td>
							</tr>
						<tr align="left">
							<td>6</td>
							<td>Remove E1 transmission information</td>
							<td><input type="date"></td>
							</tr>
						<tr align="left">
							<td>7</td>
							<td>Additional summary number<br>of SM module, RF module and antenna</td>
							<td><input type="date"></td>
							</tr>
						
					</table>
					</td>
				</tr>
			</table>
			<table width="100%">
				<tr>
					<td><?=$f->input("back","Back","type='button' onclick='window.location=\"bts_sran_8.php?token=".$token."&atd_id=".$atd_id."\";'");?></td>
					<td align="right"><?=$f->input("save","Save","type='submit'");?></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</form>	
<script> $("#nbw_no").focus(); </script>
<?php include_once "footer.php";?>