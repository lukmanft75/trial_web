<?php 
	include_once "header.php";
	$atd_id = $_GET["atd_id"];
	$atr = $db->fetch_all_data("indottech_acceptance_test_rectifier",[],"atd_id='".$atd_id."'")[0];
?>
<center><h5><b>2.2 Commissioning Record</b></h5></center>
<center>2.2.1 Transmission Information</center>
<center><?=$_errormessage;?></center>
<form method="POST" action="?token=<?=$token;?>&atd_id=<?=$atd_id;?>">
<table widht="360" BORDER="1">
	<tr align="center">
		<td><b>No</b></td>
		<td><b>TRS Information</b></td>
		<td><b>VALUE</b></td>
	</tr>
	<tr>
		<td>1</td>
		<td>Gateway UPlane</td>
		<td><?=$f->input("customer",$atr["customer"],"placeholder='VALUE' required","classinput");?></td>
	</tr>
	<tr>
		<td>2</td>
		<td>Gateway CPlane</td>
		<td><?=$f->input("customer",$atr["customer"],"placeholder='VALUE' required","classinput");?></td>
	</tr>
	<tr>
		<td>3</td>
		<td>Gateway MPlane</td>
		<td><?=$f->input("customer",$atr["customer"],"placeholder='VALUE' required","classinput");?></td>
	</tr>
	<tr>
		<td>4</td>
		<td>Gateway SPlane</td>
		<td><?=$f->input("customer",$atr["customer"],"placeholder='VALUE' required","classinput");?></td>
	</tr>
	<tr>
		<td>5</td>
		<td>OMUSIG IP Address</td>
		<td><?=$f->input("customer",$atr["customer"],"placeholder='VALUE' required","classinput");?></td>
	</tr>
	<tr>
		<td>6</td>
		<td>Ethernet Interface (port IDU)</td>
		<td><?=$f->input("customer",$atr["customer"],"placeholder='VALUE' required","classinput");?></td>
	</tr>
	<tr>
		<td>7</td>
		<td>User plane IP</td>
		<td><?=$f->input("customer",$atr["customer"],"placeholder='VALUE' required","classinput");?></td>
	</tr>
	<tr>
		<td>8</td>
		<td>Control Plane IP</td>
		<td><?=$f->input("customer",$atr["customer"],"placeholder='VALUE' required","classinput");?></td>
	</tr>
	<tr>
		<td>9</td>
		<td>Management Plane IP</td>
		<td><?=$f->input("customer",$atr["customer"],"placeholder='VALUE' required","classinput");?></td>
	</tr>
	<tr>
		<td>10</td>
		<td>Synchronization Plane IP</td>
		<td><?=$f->input("customer",$atr["customer"],"placeholder='VALUE' required","classinput");?></td>
	</tr>
	<tr>
		<td>11</td>
		<td>Neighbour Node Discovery</td>
		<td><?=$f->input("customer",$atr["customer"],"placeholder='VALUE' required","classinput");?></td>
	</tr>
	<tr>
		<td>12</td>
		<td>NTP IP</td>
		<td><?=$f->input("customer",$atr["customer"],"placeholder='VALUE' required","classinput");?></td>
	</tr>
	<tr>
		<td>13</td>
		<td>Timing Over Packet IP</td>
		<td><?=$f->input("customer",$atr["customer"],"placeholder='VALUE' required","classinput");?></td>
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