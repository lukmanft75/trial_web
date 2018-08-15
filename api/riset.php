<?php
include_once "../common.php";
// echo sel_to_pipe($_POST["major_ids"]);
// echo "<pre>";
// print_r($_POST);
// print_r(["1" => "Male","2"=>"Female"]);
// print_r($db->fetch_select_data("banks","id","concat(name,' [',code,']')"));
// foreach($_POST["major_ids"] as $no => $val){
	// echo "putaran ke $no isinya : ".$_POST["major_ids"][$no]."  <br>";
	// echo "putaran ke $no isinya : ".$val."  <br>";
	// $check_major_id[$val] = "checked";
// }
// print_r($check_major_id);
// echo "</pre>";

//------------------------------------1
//$batteries[battery_ke][menit_ke]=$val;
$batteries["1"]["30"] = "12";
$batteries["1"]["60"] = "11.80";
$batteries["1"]["90"] = "11.70";
$batteries["1"]["120"] = "11.60";
$batteries["2"]["30"] = "12.1";
$batteries["2"]["60"] = "11.81";
$batteries["2"]["90"] = "11.71";
$batteries["2"]["120"] = "11.61";

echo "<pre>";
	print_r ($batteries);
echo "</pre>";

foreach($batteries as $battery_ke => $minutes){
	foreach($minutes as $minute_ke => $val){
		// echo "<br>Battre ke : $battery_ke menit ke $minute_ke nilainya $val";
	}
}
//end------------------------------------1

//------------------------------------2

//$banks[bank_ke][battery_ke][menit_ke]=$val;
// $banks["1"]["1"]["30"] = "15";
// $banks["1"]["1"]["60"] = "14";
// $banks["1"]["1"]["90"] = "13";
// $banks["1"]["1"]["120"] = "12";
// $banks["1"]["2"]["30"] = "25";
// $banks["1"]["2"]["60"] = "24";
// $banks["1"]["2"]["90"] = "23";
// $banks["1"]["2"]["120"] = "22";
// $banks["2"]["1"]["30"] = "15.2";
// $banks["2"]["1"]["60"] = "14.2";
// $banks["2"]["1"]["90"] = "13.2";
// $banks["2"]["1"]["120"] = "12.2";
// $banks["2"]["2"]["30"] = "25.2";
// $banks["2"]["2"]["60"] = "24.2";
// $banks["2"]["2"]["90"] = "23.2";
// $banks["2"]["2"]["120"] = "22.2";

// // print_r ($banks);
// // $nilai=$db->fetch_all_data("indottech_battery_discharge",["bank_no", "batt_no", "minute_at", "val"],"atd_id = '1'");
// // echo $db->get_last_query();
// echo "<pre>";
// print_r ($banks);
// echo "</pre>";



	// foreach($banks as $bank_ke => $batteries){
		// foreach($batteries as $battery_ke => $minutes){
			// foreach($minutes as $minute => $val){
				// // echo "pada bank $bank_ke battery ke $battery_ke saat menit $minute bernilai $val";
				// // echo " ==>";
				// // echo $banks[$bank_ke][$battery_ke][$minute];
				// echo "pada bank $bank_ke battery ke $battery_ke saat menit $minute bernilai :";
				// echo $db->fetch_single_data("indottech_battery_discharge","val",["atd_id" => "1","bank_no" => $bank_ke,"batt_no" => $battery_ke,"minute_at" => $minute]);
				// echo "<br>";
			// }
		// }
	// }
// end------------------------------------2

// echo "<pre>";
	// print_r($batteries);
// echo "</pre>";


//----------------------3
// $a = 1
// echo $a=> 1
// $a .= 3
// echo $a => 13
// $a .= 2
// echo $a => 132
//end----------------------3
?>


<?php

exit();

/* $battery[$bank_ke][$battery_ke][$minutes_ke] = $val;
foreach($battery as $bank_ke => $batteries){
	foreach($batteries as $battery_ke => $minutes){
		foreach($minutes as $minutes_ke => $val){
			//XXXXXX
			$battery[$bank_ke][$battery_ke][$minutes_ke]
			$val
		}
	}
}

foreach($battery as $bank_ke => $batteries){
	foreach($batteries as $battery_ke => $minutes){
		$batteries[$battery_ke][30]
		$battery[$bank_ke][$battery_ke][30]
	}
} */


?>
<form method="POST">
<?=$f->input("fullname","Warih Hadi Suryono");?><br>
<?=$f->select("gender_id",$db->fetch_select_data("banks","id","concat(name,' [',code,']')"),"8");?><br>

<?=$f->input("major_ids[]","1","type='checkbox' ".$check_major_id[1]);?> SD<br>
<?=$f->input("major_ids[]","2","type='checkbox' ".$check_major_id[2]);?> SMP<br>
<?=$f->input("major_ids[]","3","type='checkbox' ".$check_major_id[3]);?> SMA<br>
<?=$f->input("major_ids[]","4","type='checkbox' ".$check_major_id[4]);?> S1<br>
<?=$f->input("major_ids[]","5","type='checkbox' ".$check_major_id[5]);?> S2<br>
<?=$f->input("major_ids[]","6","type='checkbox' ".$check_major_id[6]);?> S3<br>

<input type="submit">
</form>