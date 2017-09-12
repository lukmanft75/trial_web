<?php include_once "head.php";?>
	<div class="bo_title">Geotagging List</div>
	<?php
		$is_parent = false;
		if($db->fetch_single_data("indottech_group","id",["parent_user_id" => $__user_id]) > 0) $is_parent = true;
	?>
	<div id="bo_expand" onclick="toogle_bo_filter();">[+] View Filter</div>
	<div id="bo_filter">
		<div id="bo_filter_container">
			<?=$f->start("filter","GET");?>
				<?=$t->start();?>
				<?php
					if($is_parent){
						$users = $db->fetch_select_data("users","id","concat(email,' -- ',name)",["forbidden_chr_dashboards" => $__main_menu_id],[],"",true);
						$sel_user_id = $f->select("sel_user_id",$users,@$_GET["sel_user_id"],"style='height:20px;'");
					}
					$txt_sitename = $f->input("txt_sitename",@$_GET["txt_sitename"]);
					$txt_tagging_at = $f->input("txt_tagging_at",@$_GET["txt_tagging_at"],"type='date'");
					
				?>
				<?php if($is_parent){ ?>
					<?=$t->row(array("User",$sel_user_id));?>
				<?php } ?>
				<?=$t->row(array("Site Name",$txt_sitename));?>
				<?=$t->row(array("Tagging At",$txt_tagging_at));?>
				<?=$t->end();?>
				<?=$f->input("page","1","type='hidden'");?>
				<?=$f->input("sort",@$_GET["sort"],"type='hidden'");?>
				<?=$f->input("do_filter","Load","type='submit'");?>
				<?=$f->input("reset","Reset","type='button' onclick=\"window.location='?';\"");?>
			<?=$f->end();?>
		</div>
	</div>

	<?php
		if($is_parent){
			$whereclause = "1=1 AND ";
		} else {
			$whereclause = "user_id = '".$__user_id."' AND ";
		}
		if(@$_GET["sel_user_id"]!="") $whereclause .= "(user_id = '".$_GET["sel_user_id"]."') AND ";
		if(@$_GET["txt_sitename"]!="") $whereclause .= "(sitename LIKE '%".$_GET["txt_sitename"]."%') AND ";
		if(@$_GET["txt_tagging_at"]!="") $whereclause .= "(tagging_at LIKE '%".$_GET["txt_tagging_at"]."%') AND ";
		
		$db->addtable("indottech_geotagging");
		if($whereclause != "") $db->awhere(substr($whereclause,0,-4)." GROUP BY user_id,sitename,tagging_at ");
		if(@$_GET["sort"] == "") $_GET["sort"] = "id DESC";
		if(@$_GET["sort"] != "") $db->order($_GET["sort"]);
		$db->limit(200);
		$indottech_geotaggings = $db->fetch_data(true);
		$arrheader[] = "No";
		if($is_parent) $arrheader[] = "<div onclick=\"sorting('user_id');\">Name</div>";
		$arrheader[] = "<div onclick=\"sorting('sitename');\">Sitename</div>";
		$arrheader[] = "<div onclick=\"sorting('tagging_at');\">Tagging At</div>";
		$arrheader[] = "Photo";
		$arrheader[] = "";
	?>
	<?=$t->start("","data_content");?>
	<?=$t->header($arrheader);?>
	<?php
		foreach($indottech_geotaggings as $no => $indottech_geotagging){
			$user_id = $indottech_geotagging["user_id"];
			$sitename = $indottech_geotagging["sitename"];
			$tagging_at = $indottech_geotagging["tagging_at"];
			$name = $db->fetch_single_data("users","name",["id" => $user_id]);
			$photo = $db->fetch_single_data("indottech_geotagging","count(0)",["user_id" => $indottech_geotagging["user_id"],"sitename"=>$sitename,"tagging_at"=>$tagging_at]);
			$dl_url = "geophoto/geotag_".$user_id."_site_".$sitename."_".$tagging_at.".zip";
			$actions = "<a href=\"indottech_geotagging_view.php?user_id=".$user_id."&sitename=".$sitename."&tagging_at=".$tagging_at."\">View</a>";
			$actions .= " | <a target='_BLANK' href='".$dl_url."'>Download</a>";
			
			$arr_row = array();
			$arr_row[] = $no+$start+1;
			if($is_parent) $arr_row[] = $name;
			$arr_row[] = $indottech_geotagging["sitename"];
			$arr_row[] = format_tanggal($indottech_geotagging["tagging_at"],"dMY");
			$arr_row[] = $photo;
			$arr_row[] = $actions;
			echo $t->row($arr_row,array("align='center' valign='top'",""));
		}
	?>
	</table>
	
<?php include_once "footer.php";?>