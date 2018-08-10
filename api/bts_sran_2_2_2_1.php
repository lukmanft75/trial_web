<?php 
	include_once "header.php";
	$atd_id = $_GET["atd_id"];
	$atr = $db->fetch_all_data("indottech_acceptance_test_rectifier",[],"atd_id='".$atd_id."'")[0];
?>
<center>2.2.2.1 Transmission Link Information</center>
<center><?=$_errormessage;?></center>
<form method="POST" action="?token=<?=$token;?>&atd_id=<?=$atd_id;?>">
<table width="360" BORDER="1">
	<tr>
		<td>TYPE</td>
		<td>
			<input type="checkbox"> Electrial Eth.<br>
			<input type="checkbox"> Optical Eth.
		</td>
	</tr>
		<td>REMARKS<br>(Capacity and Converter type)</td>
		<td><?=$f->input("customer",$atr["customer"],"placeholder='Remaks' required","classinput");?></td>
	</tr>
	<tr>
		<td>Cross connect route information</td>
		<td><?=$f->input("customer",$atr["customer"],"placeholder='Route Information' required","classinput");?></td>
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