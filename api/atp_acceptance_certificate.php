<?php 
	include_once "header.php";
	$atd_id = $_GET["atd_id"];
	$atr = $db->fetch_all_data("indottech_acceptance_test_rectifier",[],"atd_id='".$atd_id."'")[0];
?>
<center><h4><b>SITE ACCEPTANCE CERTIFICATE</b></h4></center>
<center><?=$_errormessage;?></center>
<form method="POST" action="?token=<?=$token;?>&atd_id=<?=$atd_id;?>">
	<table>
		<tr><td>PO Number</td><td>:</td><td><?=$f->input("po_number",$atr["po_number"],"required","classinput");?></td></tr>
		<tr><td>Site</td><td>:</td><td><?=$f->select("site_id",$sites,$atr["site_id"],"required","classinput");?></td></tr>
		<tr><td valign="top">Site Address</td><td valign="top">:</td><td valign="top"><?=$f->textarea("site_address",$atr["site_address"],"required","classinput");?></td></tr>
	</table>
	<table>
		<tr>
			<td><u>Cordinate</u> </td>
			<td>
				Longitude :<br>
				Latitude :
			</td>
			<td>
				<?=$f->input("longtitude",$atr["longtitude"],"required","classinput");?><br>
				<?=$f->input("Latitude",$atr["Latitude"],"required","classinput");?>
			</td>
		</tr>
	</table>
	<table border="1">
		<tr>
			<td>Work Type :</td>
			<td>
				<input type="checkbox"> New Site<br>
				<input type="checkbox"> Swap BTS, Swap antenna<br>
				<input type="checkbox"> Swap BTS, use antenna Existing<br>
				<input type="checkbox"> Outorization
			</td>
			</td>
		</tr>
		<tr>
			<td>Site Type :</td>
			<td>
				<input type="checkbox"> Green Field Indoor<br>
				<input type="checkbox"> Green Field Outdoor<br>
				<input type="checkbox"> Inbuilding Coverage<br>
				<input type="checkbox"> Rooftop<br>
				<input type="checkbox"> 3rd Party Building Tower
			</td>
			</td>
		</tr>
		<tr>
			<td>BTS <b>System Module</b><br>Installation Type :</td>
			<td>
				<input type="checkbox"> Stack type in shelter<br>
				<input type="checkbox"> Stack type shelter less<br>
				<input type="checkbox"> Wall Mounted<br>
				<input type="checkbox"> Pole Mounted<br>
				<input type="checkbox"> Leg Tower Mounted
			</td>
			</td>
		</tr>
		<tr>
			<td>BTS <b>RF Module</b> :</td>
			<td>
				<input type="checkbox"> Stack type<br>
				<input type="checkbox"> Rack<br>
				<input type="checkbox"> Wall Mounted<br>
				<input type="checkbox"> Pole Mounted<br>
				<input type="checkbox"> Leg Tower Mounted
			</td>
			</td>
		</tr>
		<tr>
			<td>BTS Configuration :</td>
			<td>
				<input type="checkbox"> G900<br>
				<input type="checkbox"> G1800<br>
				<input type="checkbox"> U900<br>
				<input type="checkbox"> U2100<br>
				<input type="checkbox"> LTE1800
			</td>
			</td>
		</tr>
		<tr>
			<td>Number of <b>System <br>Module</b> [Units]</td><td><?=$f->input("longtitude",$atr["longtitude"],"required","classinput");?></td>
		</tr>
		<tr>
			<td>Number of RF [Units]</td><td><?=$f->input("longtitude",$atr["longtitude"],"required","classinput");?></td>
		</tr>
		<tr>
			<td>Installation Date : </td>
			<td><?=$f->input("intall_at",$name_db["install_at"],"type='date'");?></td>
		</tr>
		<tr>
			<td>Self-Assessment Date : </td>
			<td><?=$f->input("intall_at",$name_db["install_at"],"type='date'");?></td>
		</tr>
		<tr>
			<td>On Air Date : </td>
			<td><?=$f->input("intall_at",$name_db["install_at"],"type='date'");?></td>
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