<?php 
	include_once "header.php";
	$atd_id = $_GET["atd_id"];
	$atr = $db->fetch_all_data("indottech_acceptance_test_rectifier",[],"atd_id='".$atd_id."'")[0];
?>
<center><b>2.3 Test Call</b></center>
<center>2.3.1 2G Test Call</center>
<center><?=$_errormessage;?></center>
<form method="POST" action="?token=<?=$token;?>&atd_id=<?=$atd_id;?>">
<table widht="360" align="center">
	<tr>
		<td>
		<table border="1">
			<tr align="center">
				<td><b>Description</b></td>
				<td><b>Cell Number</b></td>
			</tr>
			<tr align="left">
				<td>Cell ID Number</td>
				<td>
					<input type="text"><br>
					<input type="text"><br>
					<input type="text"><br>
				</td>
			</tr>
			<tr align="left">
				<td>Orginating Call</td>
				<td>
					<input type="text"><br>
					<input type="text"><br>
					<input type="text"><br>
				</td>
			</tr>
			<tr align="left">
				<td>Terminating Call</td>
				<td>
					<input type="text"><br>
					<input type="text"><br>
					<input type="text"><br>
				</td>
			</tr>
			<tr align="left">
				<td>Open Browser (GPRS/EDGE)</td>
				<td>
					<input type="text"><br>
					<input type="text"><br>
					<input type="text"><br>
				</td>
			</tr>
		</table>
		Note : Detail other functionality test is part of SSV<br> and SSA document
		</td>
	</tr>
</table>
	<br>
	<table width="100%"><tr>
		<td><?=$f->input("back","Back","type='button' onclick='window.location=\"atp_installation_menu.php?token=".$token."&atd_id=".$atd_id."\";'");?></td>
		<td align="right"><?=$f->input("save","Save","type='submit'");?></td>
	</tr></table>
</form>	
<script> $("#nbw_no").focus(); </script>
<?php include_once "footer.php";?>