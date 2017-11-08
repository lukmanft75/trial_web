<?php include_once "head.php";?>
<?php
	if($_GET["deleting"]){
		if($db->fetch_single_data("prf","approve_at",array("id" => $_GET["deleting"])) == "0000-00-00"){
			$db->addtable("prf");
			$db->where("id",$_GET["deleting"]);
			$db->where("created_by",$__username);
			$db->delete_();
			?> <script> window.location="?";</script> <?php
		}else{
			?> <script> alert('This PRF has Approved, You`re not allow to delete this PRF'); </script> <?php
		}
	}
?>
<div class="bo_title">PRF</div>
<div id="bo_expand" onclick="toogle_bo_filter();">[+] View Filter</div>
<div id="bo_filter">
	<div id="bo_filter_container">
		<?=$f->start("filter","GET");?>
			<?=$t->start();?>
			<?php
                $maker_at = $f->input("maker_at",@$_GET["maker_at"],"type='date'");
                $created_by = $f->input("created_by",@$_GET["created_by"]);
                $checker_by = $f->input("checker_by",@$_GET["checker_by"]);
                $signer_by = $f->input("signer_by",@$_GET["signer_by"]);
                $approve_by = $f->input("approve_by",@$_GET["approve_by"]);
                $paid = $f->select("paid",[""=>"","1"=>"paid","2"=>"unpaid"],@$_GET["paid"],"style='height:20px;'");
			?>
			<?=$t->row(array("Maker Date",$maker_at));?>
			<?=$t->row(array("Created By",$created_by));?>
			<?=$t->row(array("Checker By",$checker_by));?>
			<?=$t->row(array("Signer By",$signer_by));?>
			<?=$t->row(array("Approve By",$approve_by));?>
			<?=$t->row(array("Is Paid",$paid));?>
			<?=$t->end();?>
			<?=$f->input("page","1","type='hidden'");?>
			<?=$f->input("sort",@$_GET["sort"],"type='hidden'");?>
			<?=$f->input("do_filter","Load","type='submit'");?>
			<?=$f->input("reset","Reset","type='button' onclick=\"window.location='?';\"");?>
		<?=$f->end();?>
	</div>
</div>

<?php	
	$whereclause = "(created_by = '".$__username."' OR checker_by = '".$__username."' OR signer_by = '".$__username."' OR approve_by = '".$__username."') AND ";
	if(@$_GET["maker_at"]!="")	$whereclause .= "(maker_at LIKE '%".$_GET["maker_at"]."%') AND ";
	if(@$_GET["created_by"]!="")$whereclause .= "(created_by LIKE '%".$_GET["created_by"]."%') AND ";
	if(@$_GET["paid"]=="1") 	$whereclause .= "(paid_by <> '') AND ";
	if(@$_GET["paid"]=="2") 	$whereclause .= "(paid_by = '') AND ";
	if(@$_GET["checker_by"]!="")$whereclause .= "(checker_by LIKE '".$_GET["checker_by"]."') AND ";
	if(@$_GET["signer_by"]!="") $whereclause .= "(signer_by LIKE '".$_GET["signer_by"]."') AND ";
	if(@$_GET["approve_by"]!="") $whereclause .= "(approve_by LIKE '".$_GET["approve_by"]."') AND ";
	
	$db->addtable("prf");
	if($whereclause != "") $db->awhere(substr($whereclause,0,-4));$db->limit($_max_counting);
	$maxrow = count($db->fetch_data(true));
	$start = getStartRow(@$_GET["page"],$_rowperpage);
	$paging = paging($_rowperpage,$maxrow,@$_GET["page"],"paging");
	
	$db->addtable("prf");
	if($whereclause != "") $db->awhere(substr($whereclause,0,-4));$db->limit($start.",".$_rowperpage);
	if(@$_GET["sort"] != "") $db->order($_GET["sort"]);
	$prfs = $db->fetch_data(true);
?>
	<script>
		function unpaid(){
			document.getElementById("paid").value=2;
			document.getElementById('checker_by').value='';
			document.getElementById('signer_by').value='';
			document.getElementById('approve_by').value='';
			document.getElementById("do_filter").click();
		}
		function checker_by_me(){
			document.getElementById("paid").value='';
			document.getElementById('checker_by').value='<?=$__username;?>';
			document.getElementById('signer_by').value='';
			document.getElementById('approve_by').value='';
			document.getElementById('do_filter').click();
		}
		function signer_by_me(){
			document.getElementById("paid").value='';
			document.getElementById('checker_by').value='';
			document.getElementById('signer_by').value='<?=$__username;?>';
			document.getElementById('approve_by').value='';
			document.getElementById('do_filter').click();
		}
		function approve_by_me(){
			document.getElementById("paid").value='';
			document.getElementById('checker_by').value='';
			document.getElementById('signer_by').value='';
			document.getElementById('approve_by').value='<?=$__username;?>';
			document.getElementById('do_filter').click();
		}
	</script>

	<?=$f->input("add","Add","type='button' onclick=\"window.location='prf_add.php';\"");?>
	<?=$f->input("unpaid","Show Unpaid","type='button' onclick=\"unpaid();\"");?>
	<?=$f->input("mychecker","Checker By Me","type='button' onclick=\"checker_by_me();\"");?>
	<?=$f->input("mysigner","Signer By Me","type='button' onclick=\"signer_by_me();\"");?>
	<?=$f->input("myapprove","Approve By Me","type='button' onclick=\"approve_by_me();\"");?>
	<?=$paging;?>
	<?=$t->start("","data_content");?>
	<?=$t->header(array("No",
						"",
						"<div onclick=\"sorting('code');\">Code</div>",
                        "<div onclick=\"sorting('maker_at');\">Maker Date</div>",
                        "<div onclick=\"sorting('created_by');\">Created By</div>",
                        "<div onclick=\"sorting('purpose');\">Purpose</div>",
                        "<div onclick=\"sorting('nominal');\">Nominal</div>",
                        "<div onclick=\"sorting('checker_at');\">Checked</div>",
                        "<div onclick=\"sorting('signer_at');\">Signed</div>",
                        "<div onclick=\"sorting('approve_by');\">Approve By</div>",
                        "<div onclick=\"sorting('approve_at');\">Approve At</div>",
                        "<div onclick=\"sorting('paid_by');\">Paid</div>"));?>
	<?php foreach($prfs as $no => $prf){ ?>
		<?php
			$actions = "<a href=\"prf_view.php?id=".$prf["id"]."\">View</a>|<a href=\"prf_edit.php?id=".$prf["id"]."\">Edit</a>|<a href='#' onclick=\"if(confirm('Are You sure to delete this data?')){window.location='?deleting=".$prf["id"]."';}\">Delete</a>";
			if($prf["attachment"] != ""){
				$actions .= "|<a target='_BLANK' href=\"prf_attachments/".$prf["attachment"]."\">Attachment</a>";
			}
            $checked = ($prf["checker_at"] != "0000-00-00" && $prf["checker_at"] != "") ? "Yes":"No";
            $signed = ($prf["signer_at"] != "0000-00-00" && $prf["signer_at"] != "") ? "Yes":"No";
            $paid = ($prf["paid_by"] != "") ? "Yes":"No";
			$approved_by = "";
			if($prf["approve_at"] != "0000-00-00"){
				$approved_by = $prf["approve_by"];
			}
		?>
		<?=$t->row(
					array($no+$start+1,
						$actions,
						"<a href=\"prf_view.php?id=".$prf["id"]."\">".$prf["code"]."</a>",
                        format_tanggal($prf["maker_at"],"dMY"),
						$prf["created_by"],
						$prf["purpose"],
						format_amount($prf["nominal"]),
						$checked,
						$signed,
						$approved_by,
						format_tanggal($prf["approve_at"],"dMY"),
						$paid),
					array("align='right' valign='top'","width='110' nowrap","","","","","align='right'","","","")
				);?>
	<?php } ?>
	<?=$t->end();?>
	<?=$paging;?>
<?php include_once "footer.php";?>