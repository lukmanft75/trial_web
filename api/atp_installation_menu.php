<?php 
	include_once "header.php";
	$atd_id = $_GET["atd_id"]; 
	$project_name = $db->fetch_single_data("indottech_atd_cover","project_name",["id" => $atd_id]);
	$site_name = $db->fetch_single_data("indottech_atd_cover","site_name",["id" => $atd_id]);
	$is_rectifier = $db->fetch_single_data("indottech_atd_cover","id",["id" => $atd_id,"worktype_ids" => "%|3|%:LIKE"]);
?>
<center><h4><b>ACCEPTANCE TEST DOCUMENT</b></h4></center>
<table>
	<tr><td>PROJECT NAME</td><td>:</td><td><?=$project_name;?></td></tr>
	<tr><td>SITE</td><td>:</td><td><?=$site_name;?></td></tr>
</table>
<button class="big_button" onclick="window.location='atp_installation_ba.php?token=<?=$token;?>&atd_id=<?=$atd_id;?>';">Berita Acara Uji Terima</button>
<button class="big_button" onclick="window.location='atp_installation_rps.php?token=<?=$token;?>&atd_id=<?=$atd_id;?>';">Acceptance Test Rectifier</button>
<button class="big_button" onclick="window.location='atp_installation_breaker.php?token=<?=$token;?>&atd_id=<?=$atd_id;?>';">Breaker</button>
<?php if($is_rectifier){ ?>
<button class="big_button" onclick="window.location='atp_installation_rps.php?token=<?=$token;?>&atd_id=<?=$atd_id;?>';">Rectifier Power System</button>
<?php } ?>
<button class="big_button" onclick="window.location='atp_installation_batteries.php?token=<?=$token;?>&atd_id=<?=$atd_id;?>';">Batteries</button>
<button class="big_button" onclick="window.location='atp_installation_photos.php?token=<?=$token;?>&atd_id=<?=$atd_id;?>';">Photos</button>
<br><br>
<button class="big_button" onclick="window.location='atp_installation.php?token=<?=$token;?>';">BACK</button>
<?php include_once "footer.php";?>