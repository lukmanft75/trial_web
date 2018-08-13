<?php 
	include_once "header.php";
	$atd_id = $_GET["atd_id"];
	$bts_sran_2_3_1 = $db->fetch_all_data("indottech_bts_sran_2_3_1",[],"atd_id='".$atd_id."'")[0];
	
	if(isset($_POST["save"])){
		// echo "<pre>";
		// print_r($_POST);
		// echo "</pre>";
		
		$db->addtable("indottech_bts_sran_2_3_1");
		if($bts_sran_2_3_1["id"] > 0) 					$db->where("id",$bts_sran_2_3_1["id"]);
		$db->addfield("atd_id");						$db->addvalue($atd_id);
		$db->addfield("cell_id_no_1");					$db->addvalue($_POST["cell_id_no_1"]);
		$db->addfield("cell_id_no_2");					$db->addvalue($_POST["cell_id_no_2"]);
		$db->addfield("cell_id_no_3");					$db->addvalue($_POST["cell_id_no_3"]);
		$db->addfield("originating_call_1");			$db->addvalue($_POST["originating_call_1"]);
		$db->addfield("originating_call_2");			$db->addvalue($_POST["originating_call_2"]);
		$db->addfield("originating_call_3");			$db->addvalue($_POST["originating_call_3"]);
		$db->addfield("terminating_call_1");			$db->addvalue($_POST["terminating_call_1"]);
		$db->addfield("terminating_call_2");			$db->addvalue($_POST["terminating_call_2"]);
		$db->addfield("terminating_call_3");			$db->addvalue($_POST["terminating_call_3"]);
		$db->addfield("open_browser_1");				$db->addvalue($_POST["open_browser_1"]);
		$db->addfield("open_browser_2");				$db->addvalue($_POST["open_browser_2"]);
		$db->addfield("open_browser_3");				$db->addvalue($_POST["open_browser_3"]);
		if($bts_sran_2_3_1["id"] > 0) $inserting = $db->update();
		else $inserting = $db->insert();
		
		if($inserting["affected_rows"] > 0){
			javascript("alert('Data berhasil disimpan');");
			javascript("window.location=\"bts_sran_2_3_2.php?token=".$token."&atd_id=".$atd_id."\";");
			exit();
		} else {
			$_errormessage = "<font color='red'>Data gagal disimpan!</font>";
		}
	}
?>
<center><b>2.3 Test Call</b></center>
<center>2.3.1 2G Test Call</center>
<center><?=$_errormessage;?></center>
<form method="POST" action="?token=<?=$token;?>&atd_id=<?=$atd_id;?>">
<table width="360">
	<tr>
		<td>
			<br>
			<table align="center" border="1">
				<tr align="center">
					<td><b>Description</b></td>
					<td><b>Cell Number</b></td>
				</tr>
				<tr align="left">
					<td>Cell ID Number</td>
					<td>
						<?=$f->input("cell_id_no_1",$bts_sran_2_3_1["cell_id_no_1"],"required","classinput");?><br>
						<?=$f->input("cell_id_no_2",$bts_sran_2_3_1["cell_id_no_2"],"required","classinput");?><br>
						<?=$f->input("cell_id_no_3",$bts_sran_2_3_1["cell_id_no_3"],"required","classinput");?>
					</td>
				</tr>
				<tr align="left">
					<td>Orginating Call</td>
					<td>
						<?=$f->input("originating_call_1",$bts_sran_2_3_1["originating_call_1"],"required","classinput");?><br>
						<?=$f->input("originating_call_2",$bts_sran_2_3_1["originating_call_2"],"required","classinput");?><br>
						<?=$f->input("originating_call_3",$bts_sran_2_3_1["originating_call_3"],"required","classinput");?>
					</td>
				</tr>
				<tr align="left">
					<td>Terminating Call</td>
					<td>
						<?=$f->input("terminating_call_1",$bts_sran_2_3_1["terminating_call_1"],"required","classinput");?><br>
						<?=$f->input("terminating_call_2",$bts_sran_2_3_1["terminating_call_2"],"required","classinput");?><br>
						<?=$f->input("terminating_call_3",$bts_sran_2_3_1["terminating_call_3"],"required","classinput");?>
					</td>
				</tr>
				<tr align="left">
					<td>Open Browser (GPRS/EDGE)</td>
					<td>
						<?=$f->input("open_browser_1",$bts_sran_2_3_1["open_browser_1"],"required","classinput");?><br>
						<?=$f->input("open_browser_2",$bts_sran_2_3_1["open_browser_2"],"required","classinput");?><br>
						<?=$f->input("open_browser_3",$bts_sran_2_3_1["open_browser_3"],"required","classinput");?>
					</td>
				</tr>
			</table>
			<br>
			<table align="center" border="0">
				<tr>
					<td>Note : Detail other functionality test is part of SSV<br> and SSA document</td>
				</tr>
			</table>
			<table width="100%">
				<tr>
					<td><?=$f->input("back","Back","type='button' onclick='window.location=\"bts_sran_2_2_5.php?token=".$token."&atd_id=".$atd_id."\";'");?></td>
					<td align="right"><?=$f->input("save","Save","type='submit'");?></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</form>	
<script> $("#nbw_no").focus(); </script>
<?php include_once "footer.php";?>