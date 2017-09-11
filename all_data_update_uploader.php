<?php	
	set_time_limit(0);
	ini_set('memory_limit', '-1');
?>
<?php include_once "head.php";?>
<?php include_once "classes/simplexlsx.class.php";?>
<?php include_once "func.convert_number_to_words.php";?>
<?php
	function position_names($position){
		$arr = explode("=>",$position);
		foreach($arr as $key => $_position){
			$x = explode("(",$_position);
			$return[] = trim($x[0]);
		}
		return $return;
	}
	
	function  month_to_num($month){
		$month = strtolower(str_replace(array(" ",chr(10),chr(13)),"",$month));
		if(substr($month,0,3) == "jan") return "01";
		if(substr($month,0,3) == "feb" || substr($month,0,3) == "peb") return "02";
		if(substr($month,0,3) == "mar") return "03";
		if(substr($month,0,3) == "apr") return "04";
		if(substr($month,0,3) == "mei" || substr($month,0,3) == "may") return "05";
		if(substr($month,0,3) == "jun") return "06";
		if(substr($month,0,3) == "jul") return "07";
		if(substr($month,0,3) == "aug" || substr($month,0,3) == "agt") return "08";
		if(substr($month,0,3) == "sep") return "09";
		if(substr($month,0,1) == "o") return "10";
		if(substr($month,0,1) == "n") return "11";
		if(substr($month,0,2) == "de") return "12";
	}
	
	if(isset($_POST["step2"])) {
		$project_id = $_POST["project_id"];
		$client_id = $db->fetch_single_data("projects","client_id",array("id"=>$project_id));
		$year = $_POST["year"];
		$sheet = $_POST["sheet"];
		$file_name = $_POST["file_name"];
		$xlsx = new SimpleXLSX("upload_files/".$file_name);
		$contents = $xlsx->rows($_POST["sheet"]);
		//////////////$contents_ex = $xlsx->rowsEx($_POST["sheet"]);
		
		$col = array();
		foreach($contents as $key1 => $rowdata){
			if($rowdata[2] != "" && $rowdata[4] != ""){//penentuan kolom dari header
				foreach($rowdata as $key => $header){
					if(preg_match("/(no)/",strtolower($header)) 							&& !isset($col["no"]))				$col["no"] = $key;
					if(preg_match("/(code)/",strtolower($header)) 							&& !isset($col["code"]))			$col["code"] = $key;
					
					if(strtolower(str_replace(array(" ",chr(10),chr(13),"-"),"",$header)) == "cc"
						&& !isset($col["cc"]))																					$col["cc"] = $key;
					
					if(preg_match("/(indohr)*(referral)/",strtolower($header)) 				&& !isset($col["indohr_referral"]))	$col["indohr_referral"] = $key;
					if(preg_match("/(nam[a,e])/",strtolower($header)) 						&& !isset($col["name"]))			$col["name"] = $key;
					if(preg_match("/(date)*(birth)/",strtolower($header)) 					&& !isset($col["date_of_birth"]))	$col["date_of_birth"] = $key;
					if(preg_match("/(educat)/",strtolower($header)) 				&& !isset($col["educational_background"]))	$col["educational_background"] = $key;
					if(preg_match("/(sex)/",strtolower($header)) 							&& !isset($col["sex"]))				$col["sex"] = $key;
					if(preg_match("/(status)/",strtolower($header)) 						&& !isset($col["status_pajak"]))	$col["status_pajak"] = $key;
					
					if(preg_match("/(asuransi)/",strtolower($header)) 
						&& !isset($col["position"]) 	
						&& !isset($col["status_asuransi"]))																		$col["status_asuransi"] = $key;
						
					if(strpos(" ".strtolower(str_replace(array(" ",chr(10),chr(13)),"",$header)),"homebase") > 0
						&& isset($col["code"])
						&& !isset($col["homebase"]))																			$col["homebase"] = $key;
					
					if(preg_match("/(project)/",strtolower($header)) 						&& !isset($col["project"]))			$col["project"] = $key;
					if(preg_match("/(position)/",strtolower($header))						&& !isset($col["position"]))		$col["position"] = $key;
					if(preg_match("/(actual|original).*(board|date)/",strtolower($header))	&& !isset($col["join_date"]))		$col["join_date"] = $key;
					if(preg_match("/(permanent).*(by).*/",strtolower($header))				&& !isset($col["join_date"]))		$col["join_date"] = $key;
					if(preg_match("/(user|manager)/",strtolower($header)) 					&& !isset($col["user"]))			$col["user"] = $key;
					if(preg_match("/(pkwt.*i)/",strtolower($header)))															$col["pkwt"][] = $key;
					
					if((strpos(" ".strtolower(str_replace(array(" ",chr(10),chr(13)),"",$header)),"pkwtnew") > 0
						||strpos(" ".strtolower(str_replace(array(" ",chr(10),chr(13)),"",$header)),"pkwt") > 0)
						&& isset($col["pkwt"][2]) && $col["pkwt"][2]!= $key)													$col["pkwt"][] = $key;
					
					if(preg_match("/(pkwt.*zen)|(break.*zen)/",strtolower($header)))											$col["break"][count($col["pkwt"])-1] = $key;
					if(preg_match("/(amandemen)/",strtolower($header)))															$col["amandemen"][count($col["pkwt"])-1] = $key;
					if(preg_match("/(extend.*)|(extension.*)/",strtolower($header)))											$col["extension"][count($col["pkwt"])-1] = $key;
					if(preg_match("/(least.*day)/",strtolower($header))					&& !isset($col["leastday"]))			$col["leastday"] = $key;
					if(preg_match("/(remarks)/",strtolower($header))					&& !isset($col["remarks"]))				$col["remarks"] = $key;
					if(preg_match("/(thp)/",strtolower($header))						&& !isset($col["thp"]))					$col["thp"] = $key;
					
					if(preg_match("/(salary)/",strtolower($header))
						&& !preg_match("/(thp)/",strtolower($header))
						&& !isset($col["salary"]))																				$col["salary"] = $key;
					
					if((strtolower(str_replace(array(" ",chr(10),chr(13)),"",$header)) == "ot"
						|| strtolower(str_replace(array(" ",chr(10),chr(13)),"",$header)) == "overtime")
						&& !isset($col["overtime"]))																			$col["overtime"] = $key;
						
					if(strtolower(str_replace(array(" ",chr(10),chr(13)),"",$header)) == "thr"
						&& !isset($col["thr"]))																					$col["thr"] = $key;
						
					if(strtolower(str_replace(array(" ",chr(10),chr(13)),"",$header)) == "asuransi"
						&& !isset($col["asuransi"])
						&& isset($col["status_asuransi"])
						&& $col["status_asuransi"] != $key)																		$col["asuransi"] = $key;
						
					if(strtolower(str_replace(array(" ",chr(10),chr(13)),"",$header)) == "remarks"
						&& !isset($col["remarks2"])
						&& isset($col["remarks"])
						&& $col["remarks"] != $key)																				$col["remarks2"] = $key;
						
					if((strtolower(str_replace(array(" ",chr(10),chr(13)),"",$header)) == "shift"
						|| strtolower(str_replace(array(" ",chr(10),chr(13)),"",$header)) == "benefit")
						&& !isset($col["benefit"]))																				$col["benefit"] = $key;
					
					if(strtolower(str_replace(array(" ",chr(10),chr(13)),"",$header)) == "address"
						&& !isset($col["address"]))																				$col["address"] = $key;
					
					if((substr(strtolower(str_replace(array(" ",chr(10),chr(13)),"",$header)),0,5) == "phone"
						|| strpos(" ".strtolower(str_replace(array(" ",chr(10),chr(13)),"",$header)),"telp") > 0)
						&& !isset($col["phone"]))																				$col["phone"] = $key;
						
					if(strpos(" ".strtolower(str_replace(array(" ",chr(10),chr(13)),"",$header)),"account") > 0
						&& isset($col["phone"])
						&& !isset($col["bank_account"]))																		$col["bank_account"] = $key;
						
					if(strpos(" ".strtolower(str_replace(array(" ",chr(10),chr(13)),"",$header)),"ktp") > 0
						&& isset($col["phone"])
						&& !isset($col["ktp"]))																					$col["ktp"] = $key;
						
					if(strpos(" ".strtolower(str_replace(array(" ",chr(10),chr(13)),"",$header)),"npwp") > 0
						&& isset($col["phone"])
						&& !isset($col["npwp"]))																				$col["npwp"] = $key;
						
					if(strpos(" ".strtolower(str_replace(array(" ",chr(10),chr(13)),"",$header)),"jamsostek") > 0
						&& isset($col["phone"])
						&& !isset($col["jamsostek"]))																			$col["jamsostek"] = $key;
						
					if(strpos(" ".strtolower(str_replace(array(" ",chr(10),chr(13)),"",$header)),"bpjs") > 0
						&& isset($col["phone"])
						&& !isset($col["bpjs"]))																				$col["bpjs"] = $key;
						
					if(strpos(" ".strtolower(str_replace(array(" ",chr(10),chr(13),"-"),"",$header)),"email") > 0
						&& isset($col["phone"])
						&& !isset($col["email"]))																				$col["email"] = $key;
						
					if(strpos(" ".strtolower(str_replace(array(" ",chr(10),chr(13)),"",$header)),"reasonoftermination") > 0
						&& isset($col["phone"])
						&& !isset($col["reason_of_termination"]))																$col["reason_of_termination"] = $key;
						
					
				}
				//cari allowances antara salary/thp - OT
				if(isset($col["thp"])) $_start_allow = $col["thp"];
				if(isset($col["salary"])) $_start_allow = $col["salary"];
				for($xx = ($_start_allow + 1) ; $xx < $col["reason_of_termination"]; $xx ++){
					if(!in_array($xx,$col)) $col["allowances"][$xx] = $rowdata[$xx];
				}					
				
				//cari amandemen yg tidak ada headernya
				foreach($col["pkwt"] as $key => $_col){
					if(str_replace(array(" ",chr(10),chr(13)),"",$rowdata[$_col + 2]) == "") $col["amandemen"][$key] = $_col + 2;
				}
				break;
			}
		}		
		$xls_headers = array();
		$xls_headers[""] = "---";
		foreach($contents[$key1] as $headerindex => $headername){ $xls_headers[$headerindex] = $headername." (".$headerindex.")";}
		?>
		<table width="100%"><tr><td align="center">
			<table width="100"><tr><td nowrap>
				<?=$f->start();?>
					<?=$f->input("client_id",$client_id,"type='hidden'");?>
					<?=$f->input("project_id",$project_id,"type='hidden'");?>
					<?=$f->input("year",$year,"type='hidden'");?>
					<?=$f->input("sheet",$sheet,"type='hidden'");?>
					<?=$f->input("header_index","$key1","type='hidden'");?>
					<fieldset>
						<table>
							<tr><td>Client</td><td> : <?=$db->fetch_single_data("clients","name",array("id" => $client_id));?></td></tr>
							<tr><td>Project</td><td> : <?=$db->fetch_single_data("projects","name",array("id" => $project_id));?></td></tr>
							<tr><td>Year</td><td> : <?=$year;?></td></tr>
							<tr><td>Sheet</td><td> : <?=$xlsx->sheetNames()[$sheet];?></td></tr>
						</table>
						<hr>
						<table>
							<tr><td><b>Chr Dashboards</b></td><td><b>Index Kolom di Excell</b></td></tr>
							<?php 
								foreach($col as $headername => $headerindex){
									if(is_array($headerindex)){
										echo "<tr><td>$headername</td><td></td></tr>";
										foreach($headerindex as $headername1 => $headerindex1){
											if($headername != "allowances"){
												$sel_headers = $f->select("sel_header[$headername][$headername1]",$xls_headers,$headerindex1);
												if($headername == "pkwt"){
													if(stripos($xls_headers[$headerindex1],"i") > 0) $_pkwt_ke = 0;
													if(stripos($xls_headers[$headerindex1],"ii") > 0) $_pkwt_ke = 1;
													if(stripos($xls_headers[$headerindex1],"iii") > 0) $_pkwt_ke = 2;
													$sel_headers .= " ".$f->select("sel_header[pkwt_ke][$headername1]",["0" => "1","1" => "2","2" => "3"],$_pkwt_ke);
												}
												if($headername == "break"){
													$sel_headers .= " ".$f->select("sel_header[break_ke][$headername1]",["0" => "1","1" => "2"],$_break_ke);
													$_break_ke++;
												}
												echo "<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$headername1</td><td>$sel_headers</td></tr>";
											} else {
												$sel_allowances = $f->select("sel_allowances[$headername1]",$db->fetch_select_data("allowances","id","name",array(),array(),"",true));
												echo "<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$headerindex1</td><td>$sel_allowances</td></tr>";
											}
										}
									} else {
										$sel_headers = $f->select("sel_header[$headername]",$xls_headers,$headerindex);
										echo "<tr><td>$headername</td><td>$sel_headers</td></tr>";
									}
								} 
							?>
						</table>
						<?=$f->input("step3","Next","type='submit'","btn_sign");?>
					</fieldset>
					<?=$f->input("file_name",$file_name,"type='hidden'");?>
				<?=$f->end();?>
			</td></tr></table>	
		</td></tr></table>	
		<?php
	}
	
	if(isset($_POST["step3"])) {
		$client_id = $_POST["client_id"];
		$project_id = $_POST["project_id"];
		$year = $_POST["year"];
		$sheet = $_POST["sheet"];
		$header_index = $_POST["header_index"];
		$file_name = $_POST["file_name"];
		$sel_header = $_POST["sel_header"];
		$xlsx = new SimpleXLSX("upload_files/".$file_name);
		$contents = $xlsx->rows($sheet);
		
		$xls_headers = array();
		$xls_headers[""] = "---";
		foreach($contents[$header_index] as $headerindex => $headername){ $xls_headers[$headerindex] = $headername." (".$headerindex.")";}
		
		function insert_jo($joborder_id,$is_amandemen,$pkwt_for,$position_id,$user,$candidate_id,$pkwt_from,$pkwt_to,$status_category_id,$remarks2,$thp,$basic_salary,$overtime,$thr,$asuransi){
			global $db,$__now,$__username,$__remoteaddr,$client_id;
			$db->addtable("joborder");
			$db->addfield("joborder_id");			$db->addvalue($joborder_id);
			$db->addfield("is_amandemen");			$db->addvalue($is_amandemen);
			$db->addfield("pkwt_for");				$db->addvalue($pkwt_for);
			$db->addfield("client_id");				$db->addvalue($client_id);
			$db->addfield("position_id");			$db->addvalue($position_id);
			$db->addfield("report_to");				$db->addvalue($user);
			$db->addfield("candidate_id");			$db->addvalue($candidate_id);
			$db->addfield("join_start");			$db->addvalue($pkwt_from);
			$db->addfield("join_end");				$db->addvalue($pkwt_to);
			$db->addfield("status_category_id");	$db->addvalue($status_category_id);
			$db->addfield("w_hours_start");			$db->addvalue("08:00");
			$db->addfield("w_hours_end");			$db->addvalue("17:00");
			$db->addfield("remarks");				$db->addvalue($remarks2);
			$db->addfield("thp");					$db->addvalue($thp);
			$db->addfield("basic_salary");			$db->addvalue($basic_salary);
			$db->addfield("overtime");				$db->addvalue($overtime);
			$db->addfield("thr");					$db->addvalue($thr);
			$db->addfield("asuransi");				$db->addvalue($asuransi);
			$db->addfield("contract_status");		$db->addvalue(1);
			$db->addfield("created_at");			$db->addvalue($__now);
			$db->addfield("created_by");			$db->addvalue($__username);
			$db->addfield("created_ip");			$db->addvalue($__remoteaddr);
			$db->addfield("updated_at");			$db->addvalue($__now);
			$db->addfield("updated_by");			$db->addvalue($__username);
			$db->addfield("updated_ip");			$db->addvalue($__remoteaddr);
			return $db->insert();
		}
		
		$num_candidates = 0;
		$num_joborders = 0;
		$num_allowances = 0;
		$num_positions = 0;
		$num_alldataupdates = 0;
		$started = false;
		$is_terminated = 0;
		foreach($contents as $key1 => $rowdata){
			// if($started && $rowdata[$sel_header["code"]] == "" && $rowdata[$sel_header["no"]] == "" && $rowdata[$sel_header["name"]] == ""){
			if($is_terminated == 1 && $rowdata[$sel_header["name"]] == ""){
				break;
			}
			
			if(strtoupper($rowdata[$sel_header["no"]]) == "ENDFILE") break;
			if(strtoupper($rowdata[$sel_header["no"]]) == "TERMINATED") $is_terminated = 1;
			
			if("OS" == substr($rowdata[$sel_header["code"]],0,2) && $rowdata[$sel_header["name"]] != ""){
				// echo "<hr>";
				$started = true;
				
				$no							= $rowdata[$sel_header["no"]];
				$code						= $rowdata[$sel_header["code"]];//
				$name						= $rowdata[$sel_header["name"]];//
				$date_of_birth				= $rowdata[$sel_header["date_of_birth"]];
				$birth 						= explode(",",$date_of_birth);
				if(is_numeric(substr($date_of_birth,0,1))){//jika birthdate tidak diawali dengan birthplace
					$birth[1] 				= $birth[0];
					$birthplace				= "";
				}else{
					$birthplace				= $birth[0];
				}
				$birthdate					= (substr($birth[1],0,1) == " ") ? substr($birth[1],1,strlen($birth[1])-1) : $birth[1];//
				$birthdate					= explode(" ",$birthdate);//
				$birthdate					= $birthdate[2]."-".month_to_num($birthdate[1])."-".$birthdate[0];//
				
				$sex						= $rowdata[$sel_header["sex"]];//
				$status_pajak				= $rowdata[$sel_header["status_pajak"]];//
				$status_asuransi			= $rowdata[$sel_header["status_asuransi"]];//
				$homebase					= $rowdata[$sel_header["homebase"]];
				$project					= $rowdata[$sel_header["project"]];
				$position					= $rowdata[$sel_header["position"]];//
				$join_date					= xls_date($rowdata[$sel_header["join_date"]]);//
				$user						= $rowdata[$sel_header["user"]];//
				$leastday					= $rowdata[$sel_header["leastday"]];
				$remarks					= $rowdata[$sel_header["remarks"]];
				$thp						= $rowdata[$sel_header["thp"]];//
				$basic_salary				= $rowdata[$sel_header["salary"]];//
				$overtime					= (strtolower($rowdata[$sel_header["overtime"]]) == "no") ? "2" : "1";//
				$thr						= (strtolower($rowdata[$sel_header["thr"]]) == "no") ? "2" : "1";//
				$asuransi					= (strtolower($rowdata[$sel_header["asuransi"]]) == "no") ? "2" : "1";//
				$remarks2					= $rowdata[$sel_header["remarks2"]];//
				$benefit					= $rowdata[$sel_header["benefit"]];
				$address					= $rowdata[$sel_header["address"]];//
				$phones						= explode("/",$rowdata[$sel_header["phone"]]);//
				$banks						= explode(":",$rowdata[$sel_header["bank_account"]]);//
				$ktp						= $rowdata[$sel_header["ktp"]];//
				$npwp						= $rowdata[$sel_header["npwp"]];//
				$jamsostek					= $rowdata[$sel_header["jamsostek"]];
				$bpjs						= $rowdata[$sel_header["bpjs"]];
				$email						= $rowdata[$sel_header["email"]];//
				$reason_of_termination		= $rowdata[$sel_header["reason_of_termination"]];//
				$cc							= $rowdata[$sel_header["cc"]];
				$indohr_referral			= $rowdata[$sel_header["indohr_referral"]];//
				$educational_background		= $rowdata[$sel_header["educational_background"]];//
				$pkwt_s						= $sel_header["pkwt"];//
				$break_s					= $sel_header["break"];//
				$amandemens					= $sel_header["amandemen"];//
				$extensions					= $sel_header["extension"];//				
				
				//CANDIDATES
				$candidate_id = $db->fetch_single_data("candidates","id",array("code"=>$code));
				$status_pajak_id = $db->fetch_single_data("statuses","id",array("name"=>$status_pajak));
				$status_asuransi_id = $db->fetch_single_data("statuses","id",array("name"=>$status_asuransi));
				
				if($candidate_id > 0){
					$db->addtable("joborder");$db->where("candidate_id",$candidate_id);$db->where("client_id",$client_id);$db->delete_();
					$db->addtable("joborder_allowances");$db->awhere("joborder_id IN (SELECT id FROM joborder WHERE client_id='".$client_id."' AND candidate_id='".$candidate_id."')");$db->delete_();
					$db->addtable("all_data_update");$db->awhere("joborder_id IN (SELECT id FROM joborder WHERE client_id='".$client_id."' AND candidate_id='".$candidate_id."')");$db->delete_();
				}
				
				$db->addtable("candidates");
				if($candidate_id > 0) 			$db->where("id",$candidate_id);
				
				$db->addfield("code");			$db->addvalue($code);
				$db->addfield("name");			$db->addvalue($name);
				$db->addfield("birthdate");		$db->addvalue($birthdate);
				$db->addfield("sex");			$db->addvalue(strtoupper($sex));
				$db->addfield("status_id");		$db->addvalue($status_pajak_id);
				$db->addfield("address");		$db->addvalue($address);
				$db->addfield("phone");			$db->addvalue(str_replace(array(" ",chr(13),chr(10)),"",$phones[0]));
				$db->addfield("phone_2");		$db->addvalue(str_replace(array(" ",chr(13),chr(10)),"",$phones[1]));
				$db->addfield("ktp");			$db->addvalue($ktp);
				$db->addfield("email");			$db->addvalue($email);
				$db->addfield("bank_name");		$db->addvalue(str_replace(array(" ",chr(13),chr(10)),"",$banks[0]));
				$db->addfield("bank_account");	$db->addvalue(str_replace(array(" ",chr(13),chr(10)),"",$banks[1]));
				$db->addfield("npwp");			$db->addvalue($npwp);
				$db->addfield("join_indohr_at");$db->addvalue($join_date);
				$db->addfield("updated_at");	$db->addvalue($__now);
				$db->addfield("updated_by");	$db->addvalue($__username);
				$db->addfield("updated_ip");	$db->addvalue($__remoteaddr);
				if(!$candidate_id){
					$db->addfield("created_at");	$db->addvalue($__now);
					$db->addfield("created_by");	$db->addvalue($__username);
					$db->addfield("created_ip");	$db->addvalue($__remoteaddr);
					$inserting = $db->insert();
					// echo "<br> Insert Candidate $code";
				} else {
					$inserting = $db->update();
					// echo "<br> Update Candidate $code";
				}
				
				if($inserting["affected_rows"] > 0){
					$num_candidates++;
					if(!$candidate_id) $candidate_id = $inserting["insert_id"];
					
					$candidate_educations_id = $db->fetch_single_data("candidate_educations","id",array("candidate_id"=>$candidate_id));
					if($educational_background && !$candidate_educations_id){
						$degree_id = "";
						$educational = strtolower(str_replace(array(" ","-","/",chr(10),chr(13)),"",$educational_background));
						if(strpos(" ".$educational,"senior") > 0 && $degree_id == "") $degree_id = 1;
						if(strpos(" ".$educational,"menengah") > 0 && $degree_id == "") $degree_id = 1;
						if(strpos(" ".$educational,"smu") > 0 && $degree_id == "") $degree_id = 1;
						if(strpos(" ".$educational,"sma") > 0 && $degree_id == "") $degree_id = 1;
						if(strpos(" ".$educational,"smk") > 0 && $degree_id == "") $degree_id = 1;
						if(strpos(" ".$educational,"stm") > 0 && $degree_id == "") $degree_id = 1;
						if(strpos(" ".$educational,"d1") > 0 && $degree_id == "") $degree_id = 2;
						if(strpos(" ".$educational,"d2") > 0 && $degree_id == "") $degree_id = 2;
						if(strpos(" ".$educational,"d3") > 0 && $degree_id == "") $degree_id = 2;
						if(strpos(" ".$educational,"diploma") > 0 && $degree_id == "") $degree_id = 2;
						if(strpos(" ".$educational,"s1") > 0 && $degree_id == "") $degree_id = 3;
						if(strpos(" ".$educational,"s2") > 0 && $degree_id == "") $degree_id = 4;
						if(strpos(" ".$educational,"s3") > 0 && $degree_id == "") $degree_id = 5;
						if($degree_id){
							$db->addtable("candidate_educations");
							$db->addfield("candidate_id");	$db->addvalue($candidate_id);
							$db->addfield("degree_id");		$db->addvalue($degree_id);
							$db->addfield("created_at");	$db->addvalue($__now);
							$db->addfield("created_by");	$db->addvalue($__username);
							$db->addfield("created_ip");	$db->addvalue($__remoteaddr);
							$db->addfield("updated_at");	$db->addvalue($__now);
							$db->addfield("updated_by");	$db->addvalue($__username);
							$db->addfield("updated_ip");	$db->addvalue($__remoteaddr);
							$db->insert();
							// echo "<br> Insert Candidate Education $code / $degree_id";
						}
					}
				}
				
				//INSERT JOB ORDER		
				$arrposition_id	= array();
				foreach(position_names($position) as $key => $_position){
					$position_id = $db->fetch_single_data("positions","id",array("name"=>$_position.":LIKE"));
					if($position_id <=0 ){
						$db->addtable("positions");
						$db->addfield("name");				$db->addvalue($_position);
						$db->addfield("created_at");		$db->addvalue($__now);
						$db->addfield("created_by");		$db->addvalue($__username);
						$db->addfield("created_ip");		$db->addvalue($__remoteaddr);
						$db->addfield("updated_at");		$db->addvalue($__now);
						$db->addfield("updated_by");		$db->addvalue($__username);
						$db->addfield("updated_ip");		$db->addvalue($__remoteaddr);
						$inserting = $db->insert();
						if($inserting["affected_rows"] > 0){
							$num_positions++;
							$position_id = $inserting["insert_id"];
						}
					}
					$arrposition_id[] = $position_id;
				}
				
				$position_id = sel_to_pipe($arrposition_id);
				
				$first_joborder_id = 0;
				
				foreach($pkwt_s as $_pkwt_for => $pkwt_index){
					$pkwt_for = $sel_header["pkwt_ke"][$_pkwt_for];
					/* foreach($break_s as $break_for => $break_index){
						if($pkwt_index > $break_index) $pkwt_for = 0; // asumsi hanya ada 1 pkwt setelah break
						if(stripos(" ".$xls_headers[$pkwt_index],"iii") > 0) $pkwt_for = 2;
					} */
					$pkwt_from = xls_date($rowdata[$pkwt_index]);
					$pkwt_to = xls_date($rowdata[$pkwt_index+1]);
					if($pkwt_for == 0) $status_category_id = 1; else $status_category_id = 2;
					if(strpos(" ".strtolower($indohr_referral),"indohr") > 0) $status_category_id = 6;
					if(strpos(" ".strtolower($indohr_referral),"refer") > 0) $status_category_id = 5;
					
					if($pkwt_from || $pkwt_to){
						$inserting = insert_jo(0,0,$pkwt_for,$position_id,$user,$candidate_id,$pkwt_from,$pkwt_to,$status_category_id,$remarks2,$thp,$basic_salary,$overtime,$thr,$asuransi);
						if($inserting["affected_rows"] > 0){
							// echo "<br> Insert Job Order $code / ".$inserting["insert_id"];
							if(!$first_joborder_id) $first_joborder_id = $inserting["insert_id"];
							$num_joborders++;
						}
					}
				}
				
				foreach($break_s as $break_for => $break_index){
					$break_ke = $sel_header["break_ke"][$break_for];
					$break_ke = "";
					$pkwt_from = xls_date($rowdata[$break_index]);
					$pkwt_to = xls_date($rowdata[$break_index+1]);
					if($break_for == 0) $status_category_id = 1; else $status_category_id = 2;
					if(strpos(" ".strtolower($indohr_referral),"indohr") > 0) $status_category_id = 6;
					if(strpos(" ".strtolower($indohr_referral),"refer") > 0) $status_category_id = 5;
					
					if($pkwt_from || $pkwt_to){
						$inserting = insert_jo(0,0,"break".$break_ke,$position_id,$user,$candidate_id,$pkwt_from,$pkwt_to,$status_category_id,$remarks2,$thp,$basic_salary,$overtime,$thr,$asuransi);
						if($inserting["affected_rows"] > 0){
							// echo "<br> Insert Job Order (Break) $code / ".$inserting["insert_id"];
							$num_joborders++;
						}
					}
				}
				
				foreach($amandemens as $pkwt_for => $amandemen_index){
					$looping = true;
					$pkwt_index = $_POST["sel_header"]["pkwt"][$pkwt_for];
					foreach($break_s as $break_for => $break_index){
						if($pkwt_index > $break_index) $pkwt_for = 0; // asumsi hanya ada 1 pkwt setelah break
					}
					$pkwt_from = xls_date($rowdata[$pkwt_index]);
					$joborder_id = $db->fetch_single_data("joborder","id",array("pkwt_for"=>$pkwt_for,"client_id"=>$client_id,"candidate_id"=>$candidate_id,"join_start"=>$pkwt_from.":<="),array("id DESC"));
					$xx = $amandemen_index;
					while($looping){
						$amandemen = xls_date($rowdata[$xx]);
						if($pkwt_from && $amandemen){
							$inserting = insert_jo($joborder_id,1,"amandemen",$position_id,$user,$candidate_id,$pkwt_from,$amandemen,0,$remarks2,$thp,$basic_salary,$overtime,$thr,$asuransi);
							if($inserting["affected_rows"] > 0){
								// echo "<br> Insert Job Order (Amandemen) $code / ".$joborder_id." / ".$inserting["insert_id"];
								$num_joborders++;
							}
						}
						
						$xx++;
						
						if(in_array($xx,$_POST["sel_header"]) 
							|| in_array($xx,$_POST["sel_header"]["pkwt"]) 
							|| in_array($xx,$_POST["sel_header"]["break"]) 
							|| $xx > 100) $looping = false;
					}
				}
				
				foreach($extensions as $pkwt_for => $extension_index){
					$looping = true;
					$pkwt_index = $_POST["sel_header"]["pkwt"][$pkwt_for];
					foreach($break_s as $break_for => $break_index){
						if($pkwt_index > $break_index) $pkwt_for = 0; // asumsi hanya ada 1 pkwt setelah break
					}
					$pkwt_from = xls_date($rowdata[$pkwt_index]);
					$joborder_id = $db->fetch_single_data("joborder","id",array("pkwt_for"=>$pkwt_for,"client_id"=>$client_id,"candidate_id"=>$candidate_id,"join_start"=>$pkwt_from.":<="),array("id DESC"));
					$xx = $extension_index;
					while($looping){
						$extension = xls_date($rowdata[$xx]);
						if($pkwt_from && $extension){
							$inserting = insert_jo($joborder_id,0,"extension",$position_id,$user,$candidate_id,$pkwt_from,$extension,0,$remarks2,$thp,$basic_salary,$overtime,$thr,$asuransi);
							if($inserting["affected_rows"] > 0){
								// echo "<br> Insert Job Order (Extension) $code / ".$joborder_id." / ".$inserting["insert_id"];
								$num_joborders++;
							}
						}
						
						$xx++;
						if(in_array($xx,$_POST["sel_header"]) 
							|| in_array($xx,$_POST["sel_header"]["pkwt"]) 
							|| in_array($xx,$_POST["sel_header"]["break"]) 
							|| $xx > 100) $looping = false;
					}
				}
				
				$joborder_id = $db->fetch_single_data("joborder","id",array("pkwt_for"=>"0","client_id"=>$client_id,"candidate_id"=>$candidate_id),array("id DESC"));
				$joborder_ids = $db->fetch_select_data("joborder","id","concat(id) as id2",array("client_id"=>$client_id,"candidate_id"=>$candidate_id));
				
				foreach($_POST["sel_allowances"] as $all_index => $allowance_id){
					$price = $rowdata[$all_index] * 1;
					if($price > 0){
						foreach($joborder_ids as $jo_id){
							$db->addtable("joborder_allowances");
							$db->addfield("joborder_id");	$db->addvalue($jo_id);
							$db->addfield("allowance_id");	$db->addvalue($allowance_id);
							$db->addfield("price");			$db->addvalue($price);
							$inserting = $db->insert();
							if($inserting["affected_rows"] > 0){
								// echo "<br> Insert Allowance $code / ".$joborder_id." / ".$allowance_id." / ".$price;
								$num_allowances++;
							}
						}
					}
				}
				
				//INSERT ALL DATA UPDATE
				$db->addtable("all_data_update");
				$db->addfield("joborder_id");			$db->addvalue($first_joborder_id);
				$db->addfield("candidate_id");			$db->addvalue($candidate_id);
				$db->addfield("tax_status_id");			$db->addvalue($status_pajak_id);
				$db->addfield("medical_status_id");		$db->addvalue($status_asuransi_id);
				$db->addfield("original_join_date");	$db->addvalue($join_date);
				$db->addfield("code");					$db->addvalue($code);
				// $db->addfield("homebase_ids");			$db->addvalue($homebase_ids);
				$db->addfield("position_ids");			$db->addvalue($position_id);
				$db->addfield("user");					$db->addvalue($user);
				$db->addfield("project_ids");			$db->addvalue("|".$project_id."|");
				$db->addfield("salary_thp");			$db->addvalue($thp);
				$db->addfield("remarks");				$db->addvalue($remarks2);
				$db->addfield("is_terminated");			$db->addvalue($is_terminated);
				$db->addfield("reason_of_termination");	$db->addvalue($reason_of_termination);
				$db->addfield("created_at");			$db->addvalue($__now);
				$db->addfield("created_by");			$db->addvalue($__username);
				$db->addfield("created_ip");			$db->addvalue($__remoteaddr);
				$db->addfield("updated_at");			$db->addvalue($__now);
				$db->addfield("updated_by");			$db->addvalue($__username);
				$db->addfield("updated_ip");			$db->addvalue($__remoteaddr);
				$inserting = $db->insert();
				if($inserting["affected_rows"] > 0){
					$num_alldataupdates++;
				}
			}
		}
		echo "<b>";
		echo "<font color='blue'>Data Uploaded</font><br><br>";
		echo "Candidate : ".$num_candidates."<br>";
		echo "Job Order : ".$num_joborders."<br>";
		echo "Allowance : ".$num_allowances."<br>";
		echo "Positions : ".$num_positions."<br>";
		echo "All Data Update : ".$num_alldataupdates."<br>";
		echo "</b>";
		echo $f->input("refresh","Refresh","type='button' onclick=\"window.location='?';\"","btn_sign");
		unlink("upload_files/".$file_name);
	}
	
	if(isset($_POST["step1"])) {
		$file_name = date("YmdHis").".xlsx";
		move_uploaded_file($_FILES['xlsx']['tmp_name'],"upload_files/".$file_name);
		$xlsx = new SimpleXLSX("upload_files/".$file_name);
?>
	<table width="100%"><tr><td align="center">
		<table width="100"><tr><td nowrap>
			<?=$f->start();?>
				<fieldset>
					Choose Sheet: <?=$f->select("sheet",$xlsx->sheetNames());?><br>
					Project : <?=$f->select("project_id",$db->fetch_select_data("projects","id","name",array(),array(),"",true));?><br>
					<?php for($year = date("Y");$year > 2010 ; $year--){$years[$year] = $year;} ?>
					Year : <?=$f->select("year",$years);?><br><br>
					<?=$f->input("step2","Next","type='submit'","btn_sign");?>
				</fieldset>
				<?=$f->input("file_name",$file_name,"type='hidden'");?>
			<?=$f->end();?>
		</td></tr></table>	
	</td></tr></table>	
<?php	
	}
?>

<?php if(!isset($_POST["step1"]) && !isset($_POST["step2"]) && !isset($_POST["step3"])) { ?>
	<table width="100%"><tr><td align="center">
		<table width="100"><tr><td nowrap>
		<?=$f->start("","POST","","enctype=\"multipart/form-data\"");?>
			Choose File for Upload : <?=$f->input("xlsx","","type='file' accept='.xlsx'");?>
			<br><br>
			<?=$f->input("step1","Upload","type='submit'","btn_sign");?>
		<?=$f->end();?>
		</td></tr></table>	
	</td></tr></table>	
<?php } ?>
<?php include_once "footer.php";?>