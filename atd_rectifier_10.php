<?php
	$arr1 = array();
	array_push($arr1,"{host}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.date}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.customer}");
	array_push($arr1,"{indottech_acceptance_test_rectifier.site_name}");
	array_push($arr1,"{indottech_photos.896}");
	array_push($arr1,"{indottech_photos.897}");
	array_push($arr1,"{indottech_photos.898}");
	array_push($arr1,"{indottech_photos.899}");
	array_push($arr1,"{indottech_photos.900}");
	array_push($arr1,"{indottech_photos.919}");
	array_push($arr1,"{indottech_photos.901}");
	array_push($arr1,"{indottech_photos.902}");
	array_push($arr1,"{indottech_photos.903}");
	array_push($arr1,"{indottech_photos.904}");
	array_push($arr1,"{indottech_photos.905}");
	array_push($arr1,"{indottech_photos.906}");
	
	$indottech_atr= $db->fetch_all_data("indottech_acceptance_test_rectifier",[],"atd_id='".$_GET["id"]."'")[0];

	$indottech_photos_896 = "";
	$photos_896 = $db->fetch_all_data("indottech_photos",["filename"],"atd_id = '".$_GET["id"]."' AND photo_items_id = '896' ORDER BY seqno");
	foreach($photos_896 as $photo_896){
		$indottech_photos_896 .= "<img height='170' width='170' src='http://localhost/indottech/geophoto/".$photo_896["filename"]."'>&nbsp;";
	}

	$indottech_photos_897 = "";
	$photos_897 = $db->fetch_all_data("indottech_photos",["filename"],"atd_id = '".$_GET["id"]."' AND photo_items_id = '897' ORDER BY seqno");
	foreach($photos_897 as $photo_897){
		$indottech_photos_897 .= "<img height='170' width='170' src='http://localhost/indottech/geophoto/".$photo_897["filename"]."'>&nbsp;";
	}
	
	$indottech_photos_898 = "";
	$photos_898 = $db->fetch_all_data("indottech_photos",["filename"],"atd_id = '".$_GET["id"]."' AND photo_items_id = '898' ORDER BY seqno");
	foreach($photos_898 as $photo_898){
		$indottech_photos_898 .= "<img height='170' width='170' src='http://localhost/indottech/geophoto/".$photo_898["filename"]."'>&nbsp;";
	}
	
	$indottech_photos_899 = "";
	$photos_899 = $db->fetch_all_data("indottech_photos",["filename"],"atd_id = '".$_GET["id"]."' AND photo_items_id = '899' ORDER BY seqno");
	foreach($photos_899 as $photo_899){
		$indottech_photos_899 .= "<img height='170' width='170' src='http://localhost/indottech/geophoto/".$photo_899["filename"]."'>&nbsp;";
	}
	
	$indottech_photos_900 = "";
	$photos_900 = $db->fetch_all_data("indottech_photos",["filename"],"atd_id = '".$_GET["id"]."' AND photo_items_id = '900' ORDER BY seqno");
	foreach($photos_900 as $photo_900){
		$indottech_photos_900 .= "<img height='170' width='170' src='http://localhost/indottech/geophoto/".$photo_900["filename"]."'>&nbsp;";
	}
	
	$indottech_photos_919 = "";
	$photos_919 = $db->fetch_all_data("indottech_photos",["filename"],"atd_id = '".$_GET["id"]."' AND photo_items_id = '919' ORDER BY seqno");
	foreach($photos_919 as $photo_919){
		$indottech_photos_919 .= "<img height='170' width='170' src='http://localhost/indottech/geophoto/".$photo_919["filename"]."'>&nbsp;";
	}
	
	$indottech_photos_901 = "";
	$photos_901 = $db->fetch_all_data("indottech_photos",["filename"],"atd_id = '".$_GET["id"]."' AND photo_items_id = '901' ORDER BY seqno");
	foreach($photos_901 as $photo_901){
		$indottech_photos_901 .= "<img height='170' width='170' src='http://localhost/indottech/geophoto/".$photo_901["filename"]."'>&nbsp;";
	}
	
	$indottech_photos_902 = "";
	$photos_902 = $db->fetch_all_data("indottech_photos",["filename"],"atd_id = '".$_GET["id"]."' AND photo_items_id = '902' ORDER BY seqno");
	foreach($photos_902 as $photo_902){
		$indottech_photos_902 .= "<img height='170' width='170' src='http://localhost/indottech/geophoto/".$photo_902["filename"]."'>&nbsp;";
	}
	
	$indottech_photos_903 = "";
	$photos_903 = $db->fetch_all_data("indottech_photos",["filename"],"atd_id = '".$_GET["id"]."' AND photo_items_id = '903' ORDER BY seqno");
	foreach($photos_903 as $photo_903){
		$indottech_photos_903 .= "<img height='170' width='170' src='http://localhost/indottech/geophoto/".$photo_903["filename"]."'>&nbsp;";
	}
	
	$indottech_photos_904 = "";
	$photos_904 = $db->fetch_all_data("indottech_photos",["filename"],"atd_id = '".$_GET["id"]."' AND photo_items_id = '904' ORDER BY seqno");
	foreach($photos_904 as $photo_904){
		$indottech_photos_904 .= "<img height='170' width='170' src='http://localhost/indottech/geophoto/".$photo_904["filename"]."'>&nbsp;";
	}
	
	$indottech_photos_905 = "";
	$photos_905 = $db->fetch_all_data("indottech_photos",["filename"],"atd_id = '".$_GET["id"]."' AND photo_items_id = '905' ORDER BY seqno");
	foreach($photos_905 as $photo_905){
		$indottech_photos_905 .= "<img height='170' width='170' src='http://localhost/indottech/geophoto/".$photo_905["filename"]."'>&nbsp;";
	}
	
	$indottech_photos_906 = "";
	$photos_906 = $db->fetch_all_data("indottech_photos",["filename"],"atd_id = '".$_GET["id"]."' AND photo_items_id = '906' ORDER BY seqno");
	foreach($photos_906 as $photo_906){
		$indottech_photos_906 .= "<img height='170' width='170' src='http://localhost/indottech/geophoto/".$photo_906["filename"]."'>&nbsp;";
	}
	
	$arr2 = array();
	array_push($arr2,"103.253.112.201");
	array_push($arr2,format_tanggal($indottech_atr["test_at"]));
	array_push($arr2,$indottech_atr["customer"]);
	array_push($arr2,$indottech_atr["site_name"]);
	array_push($arr2,$indottech_photos_896);
	array_push($arr2,$indottech_photos_897);
	array_push($arr2,$indottech_photos_898);
	array_push($arr2,$indottech_photos_899);
	array_push($arr2,$indottech_photos_900);
	array_push($arr2,$indottech_photos_919);
	array_push($arr2,$indottech_photos_901);
	array_push($arr2,$indottech_photos_902);
	array_push($arr2,$indottech_photos_903);
	array_push($arr2,$indottech_photos_904);
	array_push($arr2,$indottech_photos_905);
	array_push($arr2,$indottech_photos_906);
	
	echo str_replace($arr1,$arr2,read_file("htmls/rectifier_10.html"));
?>