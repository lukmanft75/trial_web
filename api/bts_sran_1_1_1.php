<?php 
	include_once "header.php";
	$atd_id = $_GET["atd_id"];
	$atr = $db->fetch_all_data("indottech_acceptance_test_rectifier",[],"atd_id='".$atd_id."'")[0];
?>
<center><h4><b>SITE SPECIFIC INTSALLATION DATA</b></h4></center>
<center><h5><b>1.1 Antenna and Antenna Line General Information</b></h5></center>
<center>1.1.1 Antenna Configuration</center>
<center><?=$_errormessage;?></center>
<form method="POST" action="?token=<?=$token;?>&atd_id=<?=$atd_id;?>">
<table widht="360">
	<tr>
		<td>
		<table border="1">
			<tr align="center">
				<td></td>
				<td>
					<b>PLAN (DRM) - VALUE</b>
				</td>
				<td>
					<b>ACTUAL - [OK / NOK]</b>
				</td>
			</tr>
			<tr align="center">
				<td>Antenna Type</td>
				<td>
					<?=$f->input("customer",$atr["customer"],"placeholder='Sektor 1' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Sektor 2' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Sektor 3' required","classinput");?>
				</td>
				<td>
					<?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?><br>
					<?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?><br>
					<?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?>
				</td>
			</tr>
			<tr align="center">
				<td>Serial No</td>
				<td>
					<?=$f->input("customer",$atr["customer"],"placeholder='Sektor 1' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Sektor 2' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Sektor 3' required","classinput");?>
				</td>
				<td>
					<?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?><br>
					<?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?><br>
					<?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?>
				</td>
			</tr>
			<tr align="center">
				<td>Direction</td>
				<td>
					<?=$f->input("customer",$atr["customer"],"placeholder='Sektor 1' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Sektor 2' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Sektor 3' required","classinput");?>
				</td>
				<td>
					<?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?><br>
					<?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?><br>
					<?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?>
				</td>
			</tr>
			<tr align="center">
				<td>Mechanical Tilt</td>
				<td>
					<?=$f->input("customer",$atr["customer"],"placeholder='Sektor 1' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Sektor 2' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Sektor 3' required","classinput");?>
				</td>
				<td>
					<?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?><br>
					<?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?><br>
					<?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?>
				</td>
			</tr>
			<tr align="center">
				<td>Electrical Tilt</td>
				<td>
					<?=$f->input("customer",$atr["customer"],"placeholder='Sektor 1' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Sektor 2' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Sektor 3' required","classinput");?>
				</td>
				<td>
					<?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?><br>
					<?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?><br>
					<?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?>
				</td>
			</tr>
			<tr align="center">
				<td>Antenna Height</td>
				<td>
					<?=$f->input("customer",$atr["customer"],"placeholder='Sektor 1' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Sektor 2' required","classinput");?><br>
					<?=$f->input("customer",$atr["customer"],"placeholder='Sektor 3' required","classinput");?>
				</td>
				<td>
					<?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?><br>
					<?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?><br>
					<?=$f->select("polarity",[""=>"","1" => "OK","2" => "NOK"],$atr["polarity"]);?>
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