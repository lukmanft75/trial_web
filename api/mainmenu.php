<?php include_once "head.php";?>
		<center>
			<input type="button" value="My Geotagging" onclick="window.location='geotagging_mine.php?username=<?=$_GET["username"];?>';" style="width:100%;height:60px;font-size:20px;font-weight:bolder;">
			<br><br>
			<input type="button" value="Request Geotagging" onclick="window.location='geotagging_request.php?username=<?=$_GET["username"];?>';" style="width:100%;height:60px;font-size:20px;font-weight:bolder;"><br>
		</center>
	</body>
</html>