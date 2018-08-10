<?php 
	include_once "header.php";
	$atd_id = $_GET["atd_id"];
	$atr = $db->fetch_all_data("indottech_acceptance_test_rectifier",[],"atd_id='".$atd_id."'")[0];
?>
<center>2.2.3 Remote Access Test</center>
<center><?=$_errormessage;?></center>
<form method="POST" action="?token=<?=$token;?>&atd_id=<?=$atd_id;?>">
<table width="360" BORDER="1">
	<tr align="center">
		<td><b>TEST</b></td>
		<td><b>OK/NOK</b></td>
	</tr>
		<td>BTS Restart</td>
		<td><?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?></td>
	<tr>
		<td>Launch & connection<br>BTS from WEB browser</td>
		<td><?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?></td>
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