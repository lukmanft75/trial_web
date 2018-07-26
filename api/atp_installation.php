<?php include_once "header.php";?>
<h4><b>ATP Installation</b></h4>
<button onclick="window.location='atp_installation_cover_add.php?token=<?=$token;?>&doctype=rectifier';">New Rectifier Doc</button>
&nbsp;
<button onclick="window.location='atp_installation_cover_add.php?token=<?=$token;?>&doctype=bts_sran';">New BTS SRAN Doc</button>
<br>
<table id="data_content">
	<tr>
		<th>No</th>
		<th>Work Type</th>
		<th>Vendor</th>
		<th>Project Name</th>
		<th>Site Name</th>
		<th nowrap>Acceptance At</th>
		<th>Acceptance Status</th>
	</tr>
	<?php
		if($whereclause)
		$atd_covers = $db->fetch_all_data("indottech_atd_cover",[],$whereclause);
	?>
</table>
<?php include_once "footer.php";?>