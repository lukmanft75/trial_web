<?php 
	include_once "header.php";
	$atd_id = $_GET["atd_id"];
	$atr = $db->fetch_all_data("indottech_acceptance_test_rectifier",[],"atd_id='".$atd_id."'")[0];
?>
<center><b>9. DOCUMENT HISTORY</b></center>
<center><?=$_errormessage;?></center>
<form method="POST" action="?token=<?=$token;?>&atd_id=<?=$atd_id;?>">
<table widht="360" align="center">
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
	<br>
	<table width="100%"><tr>
		<td><?=$f->input("back","Back","type='button' onclick='window.location=\"atp_installation_menu.php?token=".$token."&atd_id=".$atd_id."\";'");?></td>
		<td align="right"><?=$f->input("save","Save","type='submit'");?></td>
	</tr></table>
</form>	
<script> $("#nbw_no").focus(); </script>
<?php include_once "footer.php";?>