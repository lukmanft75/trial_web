<?php 
	include_once "head.php";
	$dir = $_GET["dir"];
	if(!$dir) $dir = base64_encode("ohse/");
	$dir = base64_decode($dir);
	$d = dir($dir);
	echo "<div class='bo_title'>OHSE Documents</div>";
	echo "<table id='data_content'>";
	echo "<tr><th style='font-size:18px'>".$dir."</th></tr>";
	while(false !== ($entry = $d->read())) {
		if($entry != "." && $entry != ".."){
			if(is_file($dir.$entry)){
				echo "<tr><td>";
				echo "<tr><td>";
				echo "<a href='".$dir.$entry."' target='_BLANK'>".$entry."</a><br>";
				echo "</td></tr>";
			} else {
				echo "<tr><td>";
				echo "<a href='?dir=".base64_encode($dir.$entry."/")."'>".$entry."</a><br>";
				echo "</td></tr>";
			}
		}
	}
	echo "</table>";
	$d->close();
	
	if($dir != "ohse/") echo $f->input("back","Back","type='button' onclick=\"window.location='?dir=".base64_encode(dirname($dir,1)."/")."';\"");

include_once "footer.php";
?>