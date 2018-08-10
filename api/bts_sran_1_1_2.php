<?php 
	include_once "header.php";
	$atd_id = $_GET["atd_id"];
	$atr = $db->fetch_all_data("indottech_acceptance_test_rectifier",[],"atd_id='".$atd_id."'")[0];
?>
<center>1.1.2 Antenna Line Configuration</center>
<center><?=$_errormessage;?></center>
<form method="POST" action="?token=<?=$token;?>&atd_id=<?=$atd_id;?>">
<table widht="360">
	<tr>
		<td>
		<table border="1">
			<tr align="center">
				<td>Jumper Length (Meter)</td>
				<td>
					<?=$f->input("customer",$atr["customer"],"placeholder='Sektor 1' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Sektor 2' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Sektor 3' required","classinput");?>
				</td>
			</tr>
			<tr align="center">
				<td>Optical Length (Meter)</td>
				<td>
					<?=$f->input("customer",$atr["customer"],"placeholder='Sektor 1' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Sektor 2' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Sektor 3' required","classinput");?>
				</td>
			</tr>
			<tr align="center">
				<td>Power cable Length SM - RF (Meter)</td>
				<td>
					<?=$f->input("customer",$atr["customer"],"placeholder='Sektor 1' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Sektor 2' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Sektor 3' required","classinput");?>
				</td>
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