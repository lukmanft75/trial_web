<?php 
	include_once "header.php";
	$atd_id = $_GET["atd_id"];
	$bts_sran_9 = $db->fetch_all_data("indottech_bts_sran_9",[],"atd_id='".$atd_id."' ORDER BY seqno");
	
	if(isset($_POST["save"])){
		foreach($_POST["description"] as $seqno => $description){			
			$db->addtable("indottech_bts_sran_9");
			if($bts_sran_9[$seqno]["id"] > 0) 			$db->where("id",$bts_sran_9[$seqno]["id"]);
			$db->addfield("atd_id");					$db->addvalue($atd_id);
			$db->addfield("seqno");						$db->addvalue($seqno);
			$db->addfield("description");				$db->addvalue($description);
			$db->addfield("history_at");				$db->addvalue($_POST["history_at"][$seqno]);
			if($bts_sran_9[$seqno]["id"] > 0) $inserting = $db->update();
			else $inserting = $db->insert();
		}
		javascript("alert('Data berhasil disimpan');");
		javascript("window.location=\"atp_installation_menu.php?token=".$token."&atd_id=".$atd_id."\";");
		exit();
	}
?>
<center><b>9. DOCUMENT HISTORY</b></center>
<center><?=$_errormessage;?></center>
<form method="POST" action="?token=<?=$token;?>&atd_id=<?=$atd_id;?>">
<table width="320"align="center">
	<tr>
		<td>
			<br>
			<table align="center">
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
								<input type="hidden" name="description[0]" value="Remove old version hardware from option list">
								<td><input type="date" name="history_at[0]" value="<?=$bts_sran_9[0]["history_at"];?>"></td>
								</tr>
							<tr align="left">
								<td>2</td>
								<td>Insert list of technology<br>SRAN table</td>
								<input type="hidden" name="description[1]" value="Insert list of technology SRAN table">
								<td><input type="date" name="history_at[1]" value="<?=$bts_sran_9[1]["history_at"];?>"></td>
								</tr>
							<tr align="left">
								<td>3</td>
								<td>Remove old installation<br>check list (BTS cabinet)</td>
								<input type="hidden" name="description[2]" value="Remove old installation check list (BTS cabinet)">
								<td><input type="date" name="history_at[2]" value="<?=$bts_sran_9[2]["history_at"];?>"></td>
								</tr>
							<tr align="left">
								<td>4</td>
								<td>Update check list from<br>feeder to optic cable (feeder less solution)</td>
								<input type="hidden" name="description[3]" value="Update check list from feeder to optic cable (feeder less solution)">
								<td><input type="date" name="history_at[3]" value="<?=$bts_sran_9[3]["history_at"];?>"></td>
								</tr>
							<tr align="left">
								<td>5</td>
								<td>Update template of <br>equipment SRAN BoQ</td>
								<input type="hidden" name="description[4]" value="Update template of equipment SRAN BoQ">
								<td><input type="date" name="history_at[4]" value="<?=$bts_sran_9[4]["history_at"];?>"></td>
								</tr>
							<tr align="left">
								<td>6</td>
								<td>Remove E1 transmission information</td>
								<input type="hidden" name="description[5]" value="Remove E1 transmission information">
								<td><input type="date" name="history_at[5]" value="<?=$bts_sran_9[5]["history_at"];?>"></td>
								</tr>
							<tr align="left">
								<td>7</td>
								<td>Additional summary number<br>of SM module, RF module and antenna</td>
								<input type="hidden" name="description[6]" value="Additional summary number of SM module, RF module and antenna">
								<td><input type="date" name="history_at[6]" value="<?=$bts_sran_9[6]["history_at"];?>"></td>
							</tr>
							
						</table>
					</td>
				</tr>
			</table>
			<table width="100%">
				<tr>
					<td><?=$f->input("back","Back","type='button' onclick='window.location=\"atp_installation_menu.php?token=".$token."&atd_id=".$atd_id."\";'");?></td>
					<td align="right"><?=$f->input("save","Save","type='submit'");?></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</form>	
<script> $("#nbw_no").focus(); </script>
<?php include_once "footer.php";?>