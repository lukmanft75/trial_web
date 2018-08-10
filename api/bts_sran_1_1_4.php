<?php 
	include_once "header.php";
	$atd_id = $_GET["atd_id"];
	$atr = $db->fetch_all_data("indottech_acceptance_test_rectifier",[],"atd_id='".$atd_id."'")[0];
?>
<center>1.1.4 Supply Voltages Information</center>
<center><?=$_errormessage;?></center>
<form method="POST" action="?token=<?=$token;?>&atd_id=<?=$atd_id;?>">
<table widht="360">
	<tr>
		<td>
		<table border="1" align="center">
			<tr align="center">
				<td>Measurement</td>
				<td>Expected (V)</td>
				<td>Actual (V)</td>
			</tr>
			<tr align="center">
				<td>DC Measured Voltage (Rectifier Output)</td>
				<td>48</td>
				<td><?=$f->input("customer",$atr["customer"],"placeholder='Actual' required","classinput");?><br></td>
			</tr>
			<tr align="center">
				<td>AC Measured Voltage (PLN Output)</td>
				<td>220</td>
				<td><?=$f->input("customer",$atr["customer"],"placeholder='Actual' required","classinput");?><br></td>
			</tr>
		</table>
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