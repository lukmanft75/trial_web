<?php include_once "head.php";?>
	<div class="bo_title">ATP Installation</div>
	<div id="bo_expand" onclick="toogle_bo_filter();">[+] View Filter</div>
	<div id="bo_filter">
		<div id="bo_filter_container">
			<?=$f->start("filter","GET");?>
				<?=$t->start();?>
				<?php
					$sel_doctype = $f->select("sel_doctype",[],@$_GET["sel_doctype"]);
					//select($name,$values,$selected=null,$attr="",$class="")
					$txt_tagging_at = $f->input("txt_tagging_at",@$_GET["txt_tagging_at"],"type='date'");
					if($_GET["chkFsfl"] == "1") $chkFsflchecked = "checked";
					$sel_fsfl = $f->select("sel_fsfl",["" => "","1" => "Yes","2" => "No"],$_GET["sel_fsfl"],"style='height:20px;'");
					
				?>
				<?=$t->row(array("Site Name",$txt_sitename));?>
				<?=$t->row(array("Tagging At",$txt_tagging_at));?>
				<?=$t->row(array("FSFL",$sel_fsfl));?>
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
		if(@$_GET["sel_fsfl"]=="1") $whereclause .= "indottech_geotagging_req_id IN (SELECT id FROM indottech_geotagging_req WHERE fsfl_mode='1') AND ";
		if(@$_GET["sel_fsfl"]=="2") $whereclause .= "indottech_geotagging_req_id IN (SELECT id FROM indottech_geotagging_req WHERE fsfl_mode='0') AND ";
		
		$db->addtable("indottech_geotagging");
		// if($whereclause != "") $db->awhere(substr($whereclause,0,-4)." GROUP BY user_id,sitename,tagging_at ");
		if($whereclause != "") $db->awhere(substr($whereclause,0,-4)." GROUP BY indottech_geotagging_req_id ");
		if(@$_GET["sort"] == "") $_GET["sort"] = "id DESC";
		if(@$_GET["sort"] != "") $db->order($_GET["sort"]);
		$db->limit(2000);
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
			$indottech_geotagging_req_id = $indottech_geotagging["indottech_geotagging_req_id"];
			$user_id = $indottech_geotagging["user_id"];
			$site_id = $indottech_geotagging["site_id"];

			$fsfl_mode = $db->fetch_single_data("indottech_geotagging_req","fsfl_mode",["id" => $indottech_geotagging_req_id]);
			if($fsfl_mode == 1) $indottech_geotagging["sitename"] .= " <b>[FSFL]</b>";
			$sitename = $indottech_geotagging["sitename"];

			$tagging_at = $indottech_geotagging["tagging_at"];
			$name = $db->fetch_single_data("users","name",["id" => $user_id]);			
			$photo = $db->fetch_single_data("indottech_geotagging","count(0)",["indottech_geotagging_req_id" => $indottech_geotagging_req_id]);
			$photo .= "/".count(photo_items_list(pipetoarray($db->fetch_single_data("indottech_geotagging_req","photo_item_ids",["id" => $indottech_geotagging_req_id]))));
			$dl_url = "geophoto/geotag_".$user_id."_".$site_id."_".$tagging_at.".zip";
			$actions = "<a href=\"indottech_geotagging_view.php?indottech_geotagging_req_id=".$indottech_geotagging_req_id."\">View</a>";
			$actions .= " | <a href='#' onclick='window.open(\"geotag_downloader.php?id=".$indottech_geotagging_req_id."\");'>Download</a>";
			
			$arr_row = array();
			$arr_row[] = $no+$start+1;
			if($is_parent) $arr_row[] = $name;
			$arr_row[] = "[".$site_id."] ".$indottech_geotagging["sitename"];
			$arr_row[] = format_tanggal($indottech_geotagging["tagging_at"],"dMY");
			$arr_row[] = $photo;
			$arr_row[] = $actions;
			echo $t->row($arr_row,array("align='center' valign='top'",""));
		}
	?>
	</table>
	
<?php include_once "footer.php";?>
