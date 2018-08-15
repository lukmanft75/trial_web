<?php for($bank_ke = 0; $bank_ke < 3;$bank_ke++){ ?>
	<b> Bank <?=$bank_ke+1;?>
	<table border=1>
		<?=$t->row(["<b>Batt</b>","<b>0</b>","<b>30</b>","<b>60</b>","<b>90</b>","<b>120</b>","<b>180</b>"]);?>
		<?php for($batt_ke = 0; $batt_ke < 4;$batt_ke++){ ?>
			<?=$t->row([
				$batt_ke+1,
				$bank_ke."_".$batt_ke."_0",
				$db->fetch_single_data("indottech_battery_discharge","val",["atd_id" => "1","bank_no" => $bank_ke,"batt_no" => $batt_ke,"minute_at" => 30])."<br>".$db->get_last_query(),
				$db->fetch_single_data("indottech_battery_discharge","val",["atd_id" => "1","bank_no" => $bank_ke,"batt_no" => $batt_ke,"minute_at" => 60]),
				$db->fetch_single_data("indottech_battery_discharge","val",["atd_id" => "1","bank_no" => $bank_ke,"batt_no" => $batt_ke,"minute_at" => 90]),
				$db->fetch_single_data("indottech_battery_discharge","val",["atd_id" => "1","bank_no" => $bank_ke,"batt_no" => $batt_ke,"minute_at" => 120]),
				$db->fetch_single_data("indottech_battery_discharge","val",["atd_id" => "1","bank_no" => $bank_ke,"batt_no" => $batt_ke,"minute_at" => 180])
				]);?>
		<?php } ?>
	</table>
	<?php } ?>
	
	<!--batterai array 3D -->