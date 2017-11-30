<?php
	include_once "../common.php"; 
	if(isset($_GET["mode"])){ $_mode = $_GET["mode"]; } else { $_mode = ""; }
	if(isset($_GET["project"])){ $project = $_GET["project"]; } else { $project = ""; }
	if(isset($_GET["region_id"])){ $region_id = $_GET["region_id"]; } else { $region_id = ""; }
	if(isset($_GET["nominal"])){ $nominal = $_GET["nominal"]; } else { $nominal = ""; }
	if($_mode == "get_select_checker" || $_mode == "get_select_signer" || $_mode == "get_select_approve"){
		$projects = explode(":",$project);
		$project_id = $projects[0];
		$scope_id = $projects[1];
		if($projects[2] > 0) $region_id = $projects[2];
		else $region_id = $_GET["region_id"];
		
		$whereWithRegion = "";
		if($region_id > 0) $whereWithRegion = " AND (region_id = '".$region_id."' || region_id = '0')";
		
		if($_mode == "get_select_checker"){
			$whereRole = " AND role='checker'";
			$varName = "checker_by";
		}
		if($_mode == "get_select_signer"){
			$whereRole = " AND role='signer'";
			$varName = "signer_by";
		}
		if($_mode == "get_select_approve"){
			$varName = "approve_by";
			if($nominal <= $db->fetch_single_data("indottech_roles","approve_max",[],["approve_max DESC"])){
				$whereRole = " AND role='approver' AND approve_min <= '".$nominal."' AND approve_max >= '".$nominal."'";
			} else {
				$checkers = array();
				$checkers["ahanifah@corphr.com"] = "ahanifah@corphr.com";
				echo $f->select($varName,$checkers,$_POST[$varName]);
				exit();
			}
		}
		
		$checkers = array();
		$data = $db->fetch_all_data("indottech_roles",[],"project_id='".$project_id."' AND scope_id='".$scope_id."' $whereWithRegion $whereRole");
		if(count($data) <= 0) $data = $db->fetch_all_data("indottech_roles",[],"project_id='".$project_id."' AND scope_id='".$scope_id."' $whereRole");
		
		foreach($data as $row){
			$email = $db->fetch_single_data("users","email",["id" => $row["user_id"]]);
			$checkers[$email] = $email;
		}
		echo $f->select($varName,$checkers,$_POST[$varName]);
	}
?>