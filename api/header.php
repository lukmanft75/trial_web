<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
		<script src="../scripts/jquery-1.10.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../backoffice.css">
		<link rel="stylesheet" type="text/css" href="forms.css">
	</head>
	<body>
<?php 
	include_once "../common.php";
	include_once "user_info.php";
	include_once "func.photo_items.php";
	if($user_id <= 0){ echo "<h3 style='color:red;'><b>Anda tidak diizinkan untuk mengakses menu ini!</b></h3>"; exit();}
?>