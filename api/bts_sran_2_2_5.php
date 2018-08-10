<?php 
	include_once "header.php";
	$atd_id = $_GET["atd_id"];
	$atr = $db->fetch_all_data("indottech_acceptance_test_rectifier",[],"atd_id='".$atd_id."'")[0];
?>
<center>2.2.5 TRX/Carrier Configuration</center>
<center><?=$_errormessage;?></center>
<form method="POST" action="?token=<?=$token;?>&atd_id=<?=$atd_id;?>">
<table width="360" BORDER="1">
	<tr align="center">
		<td colspan="4"><b>2G</b></td>
	</tr>
	<tr align="center">
		<td><b>GSM</b></td>
		<td>
			<?=$f->input("longtitude",$atr["longtitude"],"placeholder ='ARFCN 1' required","classinput");?><br>
			<?=$f->input("longtitude",$atr["longtitude"],"placeholder ='ARFCN 2' required","classinput");?><br>
			<?=$f->input("longtitude",$atr["longtitude"],"placeholder ='ARFCN 3' required","classinput");?><br>
			<?=$f->input("longtitude",$atr["longtitude"],"placeholder ='ARFCN 4' required","classinput");?><br>
			<?=$f->input("longtitude",$atr["longtitude"],"placeholder ='ARFCN 5' required","classinput");?><br>
			<?=$f->input("longtitude",$atr["longtitude"],"placeholder ='ARFCN 6' required","classinput");?><br>
			<?=$f->input("longtitude",$atr["longtitude"],"placeholder ='ARFCN 7' required","classinput");?><br>
			<?=$f->input("longtitude",$atr["longtitude"],"placeholder ='ARFCN 8' required","classinput");?><br>
			<?=$f->input("longtitude",$atr["longtitude"],"placeholder ='ARFCN 9' required","classinput");?><br>
			<?=$f->input("longtitude",$atr["longtitude"],"placeholder ='ARFCN 10' required","classinput");?><br>
			<?=$f->input("longtitude",$atr["longtitude"],"placeholder ='ARFCN 11' required","classinput");?><br>
			<?=$f->input("longtitude",$atr["longtitude"],"placeholder ='ARFCN 12' required","classinput");?>
		</td>
		<td><b>DCS TRX</b></td>
		<td>
			<?=$f->input("longtitude",$atr["longtitude"],"placeholder ='ARFCN 13' required","classinput");?><br>
			<?=$f->input("longtitude",$atr["longtitude"],"placeholder ='ARFCN 14' required","classinput");?><br>
			<?=$f->input("longtitude",$atr["longtitude"],"placeholder ='ARFCN 15' required","classinput");?><br>
			<?=$f->input("longtitude",$atr["longtitude"],"placeholder ='ARFCN 16' required","classinput");?><br>
			<?=$f->input("longtitude",$atr["longtitude"],"placeholder ='ARFCN 17' required","classinput");?><br>
			<?=$f->input("longtitude",$atr["longtitude"],"placeholder ='ARFCN 18' required","classinput");?><br>
			<?=$f->input("longtitude",$atr["longtitude"],"placeholder ='ARFCN 19' required","classinput");?><br>
			<?=$f->input("longtitude",$atr["longtitude"],"placeholder ='ARFCN 20' required","classinput");?><br>
			<?=$f->input("longtitude",$atr["longtitude"],"placeholder ='ARFCN 21' required","classinput");?><br>
			<?=$f->input("longtitude",$atr["longtitude"],"placeholder ='ARFCN 22' required","classinput");?><br>
			<?=$f->input("longtitude",$atr["longtitude"],"placeholder ='ARFCN 23' required","classinput");?><br>
			<?=$f->input("longtitude",$atr["longtitude"],"placeholder ='ARFCN 24' required","classinput");?>
		</td>
	</tr>
</table>
<br>
<table width="360" BORDER="1">
	<tr align="center">
		<td colspan="2"><b>3G</b></td>
	</tr>
	<tr align="center">
		<td><b>CELL No</b></td>
		<td>
			<?=$f->input("longtitude",$atr["longtitude"],"placeholder ='cell 1 psc' required","classinput");?><br>
			<?=$f->input("longtitude",$atr["longtitude"],"placeholder ='cell 2 psc' required","classinput");?><br>
			<?=$f->input("longtitude",$atr["longtitude"],"placeholder ='cell 3 psc' required","classinput");?><br>
		</td>
	</tr>
</table>
<br>
<table width="360" BORDER="1">
	<tr align="center">
		<td colspan="2"><b>LTE</b></td>
	</tr>
	<tr align="center">
		<td><b>CELL No</b></td>
		<td>
			<?=$f->input("longtitude",$atr["longtitude"],"placeholder ='cell 1 psc' required","classinput");?><br>
			<?=$f->input("longtitude",$atr["longtitude"],"placeholder ='cell 2 psc' required","classinput");?><br>
			<?=$f->input("longtitude",$atr["longtitude"],"placeholder ='cell 3 psc' required","classinput");?><br>
		</td>
	</tr>
</table>
<br>
<table>
	<tr><td><b>Note:</b></td></tr>
	<tr><td><b>ARFCN:</b> Absolute Radio Frequency Channel Number</td></tr>
	<tr><td><b>PSC:</b> Primary scrambling code</td></tr>
	<tr><td><b>PCI:</b> Physical Cell ID</td></tr>
</table>
	<br>
	<table width="100%"><tr>
		<td><?=$f->input("back","Back","type='button' onclick='window.location=\"atp_installation_menu.php?token=".$token."&atd_id=".$atd_id."\";'");?></td>
		<td align="right"><?=$f->input("save","Save","type='submit'");?></td>
	</tr></table>
</form>	
<script> $("#nbw_no").focus(); </script>
<?php include_once "footer.php";?>