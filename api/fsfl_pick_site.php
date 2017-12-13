<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
		<link rel="stylesheet" type="text/css" href="../backoffice.css">
	</head>
	<body>
		<style>
			a{
				text-decoration:none;
				color:#43579C;
			}
		</style>
<?php 
	include_once "../common.php";
	include_once "user_info.php";
	include_once "func.photo_items.php";
	
	$message = "";
	if($_GET["siteIdSelected"] != ""){
		$action = "";
		$message = "<font color='red'><b>Getting Location Coordinate, Please Wait...</b></font>";
	}
?>
		<h4><b>Pilih Site:</b></h4>
		<?=$message;?><br>
		<table width="100%"><tr><td nowrap>
		<b>Search : </b><input style="border:2px solid black;" id="search" value="<?=$_GET["search"];?>"><input type="button" value="LOAD" onclick="window.location='?token=<?=$_GET["token"];?>&search='+document.getElementById('search').value;">
		</td></tr></table>
		<br>
		<table id="data_content">
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Long</th>
				<th>Lat</th>
			</tr>
			<?php
				$whereclause = "";
				if($_GET["search"]!="") $whereclause = "kode LIKE '%".$_GET["search"]."%' OR name LIKE '%".$_GET["search"]."%'";
				$sites = $db->fetch_all_data("indottech_sites",[],$whereclause);
				foreach($sites as $site){
					if($_GET["siteIdSelected"] == ""){
						$action = "onclick='window.location=\"?token=".$_GET["token"]."&search=".$_GET["search"]."&siteIdSelected=".$site["id"]."|".$site["kode"]."|".str_replace(" ","_",$site["name"])."\";'";
					} else {
						$action = "";
					}
					?>
					<tr style="height:30px;" <?=$action;?>>
						<td><?=$site["kode"];?></td>
						<td><?=$site["name"];?></td>
						<td><?=$site["longitude"];?></td>
						<td><?=$site["latitude"];?></td>
					</tr>
					<?php
				}
			?>
		</table>
	</body>
</html>
