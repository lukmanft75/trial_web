<?php include_once "head.php";?>
<?php
	if($_GET["deleting"]){
		$db->addtable("indottech_sites");
		$db->where("id",$_GET["deleting"]);
		$db->delete_();
		?> <script> window.location="?";</script> <?php
	}
?>
<div class="bo_title">Sites</div>
<div id="bo_expand" onclick="toogle_bo_filter();">[+] View Filter</div>
<div id="bo_filter">
	<div id="bo_filter_container">
		<?=$f->start("filter","GET");?>
			<?=$t->start();?>
			<?php
				$txt_kode = $f->input("txt_kode",@$_GET["txt_kode"]);
				$txt_name = $f->input("txt_name",@$_GET["txt_name"]);
			?>
			<?=$t->row(array("Kode",$txt_kode));?>
			<?=$t->row(array("Name",$txt_name));?>
			<?=$t->end();?>
			<?=$f->input("page","1","type='hidden'");?>
			<?=$f->input("sort",@$_GET["sort"],"type='hidden'");?>
			<?=$f->input("do_filter","Load","type='submit'");?>
			<?=$f->input("reset","Reset","type='button' onclick=\"window.location='?';\"");?>
		<?=$f->end();?>
	</div>
</div>

<?php
	$whereclause = "";
	if(@$_GET["txt_kode"]!="") $whereclause .= "kode LIKE '"."%".str_replace(" ","%",$_GET["txt_kode"])."%"."' AND ";
	if(@$_GET["txt_name"]!="") $whereclause .= "ename LIKE '"."%".str_replace(" ","%",$_GET["txt_name"])."%"."' AND ";
	
	$db->addtable("indottech_sites");
	if($whereclause != "") $db->awhere(substr($whereclause,0,-4));$db->limit($_max_counting);
	$maxrow = count($db->fetch_data(true));
	$start = getStartRow(@$_GET["page"],$_rowperpage);
	$paging = paging($_rowperpage,$maxrow,@$_GET["page"],"paging");
	
	$db->addtable("indottech_sites");
	if($whereclause != "") $db->awhere(substr($whereclause,0,-4));$db->limit($start.",".$_rowperpage);
	if(@$_GET["sort"] != "") $db->order($_GET["sort"]);
	$indottech_sites = $db->fetch_data(true);
?>
	<?=$f->input("add","Add","type='button' onclick=\"window.location='indottech_sites_add.php';\"");?>
	<?=$paging;?>
	<?=$t->start("","data_content");?>
	<?=$t->header(array("No",
						"<div onclick=\"sorting('kode');\">Kode</div>",
						"<div onclick=\"sorting('name');\">Site Name</div>",
						"<div onclick=\"sorting('longitude');\">Longitude</div>",
						"<div onclick=\"sorting('latitude');\">Latitude</div>",
						""));?>
	<?php foreach($indottech_sites as $no => $indottech_site){ ?>
		<?php
			
			$actions = 	"<a href=\"indottech_sites_edit.php?id=".$indottech_site["id"]."\">Edit</a>";
			$actions .= " | <a href='#' onclick=\"if(confirm('Are You sure to delete this data?')){window.location='?deleting=".$indottech_site["id"]."';}\">Delete</a>";
		?>
		<?=$t->row(
					array($no+$start+1,
					$indottech_site["kode"],
					$indottech_site["name"],
					$indottech_site["longitude"],
					$indottech_site["latitude"],
					$actions),
					array("align='right' valign='top'","")
				);?>
	<?php } ?>
	<?=$t->end();?>
	<?=$paging;?>
	
<?php include_once "footer.php";?>