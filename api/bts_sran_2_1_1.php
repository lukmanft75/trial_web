<?php 
	include_once "header.php";
	$atd_id = $_GET["atd_id"];
	$atr = $db->fetch_all_data("indottech_acceptance_test_rectifier",[],"atd_id='".$atd_id."'")[0];
?>
<center><h4><b>2. EQUIPMENT INSTALLATION & COMMISSIONING RECORD</b></h4></center>
<center><h5><b>2.1 BTS Installation Record</b></h5></center>
<center>2.1.1 BTS Information</center>
<center><?=$_errormessage;?></center>
<form method="POST" action="?token=<?=$token;?>&atd_id=<?=$atd_id;?>">
<table widht="360" BORDER="1">
	<tr align="center">
		<td><b>ITEM</b></td>
		<td><b>DESCRIPTION</b></td>
		<td><b>OK/NOK</b></td>
	</tr>
	<tr align="center">
		<td><b>1</b></td>
		<td colspan="2"><b>PREPARATION</b></td>
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
		<td>2.1</td>
		<td>Equipment layout checked,<br>as planned</td>
		<td><?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?></td>
	</tr>
	<tr>
		<td>2.2</td>
		<td>Cabling routes checked</td>
		<td><?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?></td>
	</tr>
	<tr>
		<td>2.3</td>
		<td>Installation of main grounding<br>busbar (connection to building earth) checked</td>
		<td><?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?></td>
	</tr>
	<tr align="center">
		<td><b>2</b></td>
		<td colspan="2"><b>BTS INSTALLATION</b></td>
	</tr>
	<tr>
		<td>2.1</td>
		<td>BTS System module installed<br>and fixed to base frame as plan</td>
		<td><?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?></td>
	</tr>
	<tr>
		<td>2.2</td>
		<td>BTS RF module installed and<br>fixed to bracket at tower leg</td>
		<td><?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?></td>
	</tr>
	<tr>
		<td>2.3</td>
		<td>BTS system module and RF<br>module are grounded properly</td>
		<td><?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?></td>
	</tr>
	<tr align="center">
		<td><b>3</b></td>
		<td colspan="2"><b>BTS CABLING</b></td>
	</tr>
	<tr>
		<td>3.1</td>
		<td>Power cables are installed and tidy</td>
		<td><?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?></td>
	</tr>
	<tr>
		<td>3.2</td>
		<td>Optic cables are installed and tidy</td>
		<td><?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?></td>
	</tr>
	<tr>
		<td>3.3</td>
		<td>Alarm cables are installed and tidy</td>
		<td><?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?></td>
	</tr>
	<tr>
		<td>3.4</td>
		<td>All cables are labelling preperly</td>
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