<?php 
	include_once "header.php";
	$atd_id = $_GET["atd_id"];
	$atr = $db->fetch_all_data("indottech_acceptance_test_rectifier",[],"atd_id='".$atd_id."'")[0];
?>
<center>1.1.3 Antenna lines VSWR value (BTS measurement)</center>
<center><?=$_errormessage;?></center>
<form method="POST" action="?token=<?=$token;?>&atd_id=<?=$atd_id;?>">
<table widht="360">
	<tr>
		<td>
		<table border="1">
			<tr align="center">
				<td>RF MODULE</td>
				<td>Port Ke-</td>
			</tr>
			<tr align="center">
				<td>FXDB#1</td>
				<td>
					<?=$f->input("customer",$atr["customer"],"placeholder='Port 1' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Port 2' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Port 3' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Port 4' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Port 5' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Port 6' required","classinput");?><br>
				</td>
			</tr>
			<tr align="center">
				<td>FXDB#2</td>
				<td>
					<?=$f->input("customer",$atr["customer"],"placeholder='Port 1' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Port 2' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Port 3' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Port 4' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Port 5' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Port 6' required","classinput");?><br>
				</td>
			</tr>
			<tr align="center">
				<td>FXED#1</td>
				<td>
					<?=$f->input("customer",$atr["customer"],"placeholder='Port 1' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Port 2' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Port 3' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Port 4' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Port 5' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Port 6' required","classinput");?><br>
				</td>
			</tr>
			<tr align="center">
				<td>FXED#2</td>
				<td>
					<?=$f->input("customer",$atr["customer"],"placeholder='Port 1' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Port 2' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Port 3' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Port 4' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Port 5' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Port 6' required","classinput");?><br>
				</td>
			</tr>
			<tr align="center">
				<td>FRGU#1</td>
				<td>
					<?=$f->input("customer",$atr["customer"],"placeholder='Port 1' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Port 2' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Port 3' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Port 4' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Port 5' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Port 6' required","classinput");?><br>
				</td>
			</tr>
			<tr align="center">
				<td>FRGU#2</td>
				<td>
					<?=$f->input("customer",$atr["customer"],"placeholder='Port 1' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Port 2' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Port 3' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Port 4' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Port 5' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Port 6' required","classinput");?><br>
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