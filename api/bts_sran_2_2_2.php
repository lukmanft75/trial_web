<?php 
	include_once "header.php";
	$atd_id = $_GET["atd_id"];
	$atr = $db->fetch_all_data("indottech_acceptance_test_rectifier",[],"atd_id='".$atd_id."'")[0];
?>
<center>2.2.2 BTS Information</center>
<center><?=$_errormessage;?></center>
<form method="POST" action="?token=<?=$token;?>&atd_id=<?=$atd_id;?>">
<table widht="360" BORDER="1">
	<tr align="center">
		<td><b>No</b></td>
		<td><b>BTS Information</b></td>
		<td><b>VALUE</b></td>
	</tr>
	<tr>
		<td>1</td>
		<td>Tower ID</td>
		<td><?=$f->input("customer",$atr["customer"],"placeholder='VALUE' required","classinput");?></td>
	</tr>
	<tr>
		<td>2</td>
		<td>BTS Name</td>
		<td><?=$f->input("customer",$atr["customer"],"placeholder='VALUE' required","classinput");?></td>
	</tr>
	<tr>
		<td>3</td>
		<td>BTS Profile</td>
		<td><?=$f->input("customer",$atr["customer"],"placeholder='VALUE' required","classinput");?></td>
	</tr>
	<tr>
		<td>4</td>
		<td>SBTS ID</td>
		<td><?=$f->input("customer",$atr["customer"],"placeholder='VALUE' required","classinput");?></td>
	</tr>
	<tr>
		<td>5</td>
		<td>Site ID G900</td>
		<td><?=$f->input("customer",$atr["customer"],"placeholder='VALUE' required","classinput");?></td>
	</tr>
	<tr>
		<td>6</td>
		<td>Site ID G1800</td>
		<td><?=$f->input("customer",$atr["customer"],"placeholder='VALUE' required","classinput");?></td>
	</tr>
	<tr>
		<td>7</td>
		<td>Site ID 3G1800</td>
		<td><?=$f->input("customer",$atr["customer"],"placeholder='VALUE' required","classinput");?></td>
	</tr>
	<tr>
		<td>8</td>
		<td>Site ID 3G2100</td>
		<td><?=$f->input("customer",$atr["customer"],"placeholder='VALUE' required","classinput");?></td>
	</tr>
	<tr>
		<td>9</td>
		<td>Site ID LTE1800</td>
		<td><?=$f->input("customer",$atr["customer"],"placeholder='VALUE' required","classinput");?></td>
	</tr>
	<tr>
		<td>10</td>
		<td>SW Load</td>
		<td><?=$f->input("customer",$atr["customer"],"placeholder='VALUE' required","classinput");?></td>
	</tr>
	<tr>
		<td>11</td>
		<td>BSC Name</td>
		<td><?=$f->input("customer",$atr["customer"],"placeholder='VALUE' required","classinput");?></td>
	</tr>
	<tr>
		<td>12</td>
		<td>BSC ID</td>
		<td><?=$f->input("customer",$atr["customer"],"placeholder='VALUE' required","classinput");?></td>
	</tr>
	<tr>
		<td>13</td>
		<td>RNC Name</td>
		<td><?=$f->input("customer",$atr["customer"],"placeholder='VALUE' required","classinput");?></td>
	</tr>
	<tr>
		<td>14</td>
		<td>RNC ID</td>
		<td><?=$f->input("customer",$atr["customer"],"placeholder='VALUE' required","classinput");?></td>
	</tr>
	<tr>
		<td>15</td>
		<td>MME Name</td>
		<td><?=$f->input("customer",$atr["customer"],"placeholder='VALUE' required","classinput");?></td>
	</tr>
	<tr>
		<td>16</td>
		<td>MME ID</td>
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