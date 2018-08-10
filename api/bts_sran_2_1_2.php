<?php 
	include_once "header.php";
	$atd_id = $_GET["atd_id"];
	$atr = $db->fetch_all_data("indottech_acceptance_test_rectifier",[],"atd_id='".$atd_id."'")[0];
?>
<center>2.1.2 Antenna Line Information</center>
<center><?=$_errormessage;?></center>
<form method="POST" action="?token=<?=$token;?>&atd_id=<?=$atd_id;?>">
<table widht="360" BORDER="1">
	<tr align="center">
		<td><b>ITEM</b></td>
		<td><b>DESCRIPTION</b></td>
		<td><b>OK/NOK</b></td>
	</tr>
	<tr>
		<td><b>1</b></td>
		<td><b>PREPARATION</b></td>
		<td></td>
	</tr>
	<tr>
		<td>1.1</td>
		<td>Delivery checked,<br>any shortcomings are recorded</td>
		<td><?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?></td>
	</tr>
	<tr>
		<td>1.2</td>
		<td>Any damages are recorded</td>
		<td><?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?></td>
	</tr>
	<tr>
		<td>1.3</td>
		<td>Equipment layout checked,<br>differences to the drawings recorded</td>
		<td><?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?></td>
	</tr>
	<tr>
		<td>1.4</td>
		<td>Cabling routes checked,<br>cable trays & ladders installed</td>
		<td><?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?></td>
	</tr>
	<tr>
		<td>1.5</td>
		<td>Antenna tower/pole grounding checked</td>
		<td><?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?></td>
	</tr>
	<tr align="center">
		<td><b>2</b></td>
		<td><b>ANTENNA INSTALLATION</b></td>
		<td></td>
	</tr>
	<tr>
		<td>2.1</td>
		<td>Antenna mounted according<br>to Site Specific Documents</td>
		<td><?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?></td>
	</tr>
	<tr>
		<td>2.2</td>
		<td>Mounting height checked according<br>to Final Site Configuration</td>
		<td><?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?></td>
	</tr>
	<tr>
		<td>2.3</td>
		<td>Antenna direction checked according<br>to Final Site Configuration</td>
		<td><?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?></td>
	</tr>
	<tr>
		<td>2.4</td>
		<td>Mechanical tilting angle checked<br>according to Final Site Configuration</td>
		<td><?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?></td>
	</tr>
	<tr>
		<td>2.5</td>
		<td>Electrical tilting angle checked<br>according to Final Site Configuration</td>
		<td><?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?></td>
	</tr>
	<tr>
		<td>2.6</td>
		<td>Antenna mounting clamps checked,<br>all screws tightened</td>
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