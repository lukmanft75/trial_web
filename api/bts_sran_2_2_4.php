<?php 
	include_once "header.php";
	$atd_id = $_GET["atd_id"];
	$atr = $db->fetch_all_data("indottech_acceptance_test_rectifier",[],"atd_id='".$atd_id."'")[0];
?>
<center>2.2.4 External Alarm Test</center>
<center><?=$_errormessage;?></center>
<form method="POST" action="?token=<?=$token;?>&atd_id=<?=$atd_id;?>">
<table width="360" BORDER="1">
	<tr align="center">
		<td><b>NO</b></td>
		<td><b>ENVA</b></td>
		<td><b>OK/NOK</b></td>
		<td><b>NA</b></td>
	</tr>
	<tr>
		<td>1</td>
		<td>L1 FAILURE</td>
		<td><?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?></td>
		<td><?=$f->input("longtitude",$atr["longtitude"],"placeholder ='NA' required","classinput");?></td>
	</tr>
	<tr>
		<td>2</td>
		<td>L2 FAILURE</td>
		<td><?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?></td>
		<td><?=$f->input("longtitude",$atr["longtitude"],"placeholder ='NA' required","classinput");?></td>
	</tr>
	<tr>
		<td>3</td>
		<td>L3 FAILURE</td>
		<td><?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?></td>
		<td><?=$f->input("longtitude",$atr["longtitude"],"placeholder ='NA' required","classinput");?></td>
	</tr>
	<tr>
		<td>4</td>
		<td>DOOR OPEN</td>
		<td><?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?></td>
		<td><?=$f->input("longtitude",$atr["longtitude"],"placeholder ='NA' required","classinput");?></td>
	</tr>
	<tr>
		<td>5</td>
		<td>AC REMOVED<br>(not applicable for outdoor site)</td>
		<td><?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?></td>
		<td><?=$f->input("longtitude",$atr["longtitude"],"placeholder ='NA' required","classinput");?></td>
	</tr>
	<tr>
		<td>6</td>
		<td>FENCE BREAK<br>(not applicable for outdoor site)</td>
		<td><?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?></td>
		<td><?=$f->input("longtitude",$atr["longtitude"],"placeholder ='NA' required","classinput");?></td>
	</tr>
	<tr>
		<td>7</td>
		<td>GENSET RUNNING<br>(only applicable for site with Genset)</td>
		<td><?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?></td>
		<td><?=$f->input("longtitude",$atr["longtitude"],"placeholder ='NA' required","classinput");?></td>
	</tr>
	<tr>
		<td>8</td>
		<td>GENSET FAILURE<br>(only applicable for site with Genset)</td>
		<td><?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?></td>
		<td><?=$f->input("longtitude",$atr["longtitude"],"placeholder ='NA' required","classinput");?></td>
	</tr>
	<tr>
		<td>9</td>
		<td>GENSET LOW FUEL<br>(only applicable for site with Genset)</td>
		<td><?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?></td>
		<td><?=$f->input("longtitude",$atr["longtitude"],"placeholder ='NA' required","classinput");?></td>
	</tr>
	<tr>
		<td>10</td>
		<td>RECTIFIER MAIN FAILURE</td>
		<td><?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?></td>
		<td><?=$f->input("longtitude",$atr["longtitude"],"placeholder ='NA' required","classinput");?></td>
	</tr>
	<tr>
		<td>11</td>
		<td>MEDIUM SURGE PROTECTION<br>FAILURE</td>
		<td><?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?></td>
		<td><?=$f->input("longtitude",$atr["longtitude"],"placeholder ='NA' required","classinput");?></td>
	</tr>
	<tr>
		<td>12</td>
		<td>DC HIGH VOLTAGE</td>
		<td><?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?></td>
		<td><?=$f->input("longtitude",$atr["longtitude"],"placeholder ='NA' required","classinput");?></td>
	</tr>
	<tr>
		<td>13</td>
		<td>DC LOW VOLTAGE</td>
		<td><?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?></td>
		<td><?=$f->input("longtitude",$atr["longtitude"],"placeholder ='NA' required","classinput");?></td>
	</tr>
	<tr>
		<td>14</td>
		<td>GROUNDING CABLE CUT</td>
		<td><?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?></td>
		<td><?=$f->input("longtitude",$atr["longtitude"],"placeholder ='NA' required","classinput");?></td>
	</tr>
	<tr>
		<td>15</td>
		<td>INDOOR TEMPARATURE TOO HIGH<br>(only applicable for indoor site)</td>
		<td><?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?></td>
		<td><?=$f->input("longtitude",$atr["longtitude"],"placeholder ='NA' required","classinput");?></td>
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