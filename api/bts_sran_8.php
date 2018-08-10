<?php 
	include_once "header.php";
	$atd_id = $_GET["atd_id"];
	$atr = $db->fetch_all_data("indottech_acceptance_test_rectifier",[],"atd_id='".$atd_id."'")[0];
?>
<center><b>8. ATP APROVAL SHEET</b></center>
<center><?=$_errormessage;?></center>
<form method="POST" action="?token=<?=$token;?>&atd_id=<?=$atd_id;?>">
<table widht="360" align="center">
	<tr>
		<td>
		<table border="1">
			<tr align="left">
				<td>PO Number</td>
				<td><input type="text"><br></td>
				</tr>
			<tr align="left">
				<td>Site ID</td>
				<td><input type="text"><br></td>
				</tr>
			<tr align="left">
				<td>Site Name</td>
				<td><input type="text"><br></td>
				</tr>
			<tr align="left">
				<td>Work type</td>
				<td><input type="text"><br></td>
				</tr>
			<tr align="left">
				<td>Regional Manager Alita</td>
				<td><input type="text"><br></td>
				</tr>
			<tr align="left">
				<td>XL Representative</td>
				<td><input type="text"><br></td>
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