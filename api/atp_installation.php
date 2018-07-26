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
		$atd_covers = $db->fetch_all_data("indottech_atd_cover",[],$whereclause);
		foreach($atd_covers as $no => $atd_cover){ 
			if($atd_cover["acceptance_status"] == 0) $acceptance_status = "";
			if($atd_cover["acceptance_status"] == 1) $acceptance_status = "PASS, NO PENDING ITEMS";
			if($atd_cover["acceptance_status"] == 2) $acceptance_status = "PASS WITH PENDING ITEMS";
			if($atd_cover["acceptance_status"] == 3) $acceptance_status = "REJECTED BY XL AXIATA";
			$onclick = "onclick=\"window.location='atp_installation_menu.php?token=".$token."&atd_id=".$atd_cover["id"]."';\"";
	?>
		<tr <?=$onclick;?>>
			<td align="right"><?=($no+1);?></td>
			<td><?=ucwords($atd_cover["doctype"]);?></td>
			<td><?=$atd_cover["vendor"];?></td>
			<td><?=$atd_cover["project_name"];?></td>
			<td><?=$atd_cover["site_name"];?></td>
			<td><?=format_tanggal($atd_cover["acceptance_at"]);?></td>
			<td><?=$acceptance_status;?></td>
		</tr>
	<?php } ?>
</table>
<?php include_once "footer.php";?>