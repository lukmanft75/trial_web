<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
		<script src="../scripts/jquery-1.10.1.min.js"></script>
		<script src="../scripts/bootstrap.min.js"></script>
		<script src="../scripts/bootstrap-slider.js"></script>

		<link rel="stylesheet" type="text/css" href="../backoffice.css">
		<link rel="stylesheet" type="text/css" href="forms.css">
		<link rel="stylesheet" type="text/css" href="../styles/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../styles/bootstrap-slider.css">

	</head>
	<body>
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content" style="top:100px;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title" id="modalTitle"></h4>
					</div>
					<div class="modal-body" id="modalBody"></div>
					<div class="modal-footer" id="modalFooter"></div>
				</div>
			</div>
		</div>
<?php 
	include_once "../common.php";
	include_once "user_info.php";
	include_once "func.photo_items.php";
	if($user_id <= 0){ echo "<h3 style='color:red;'><b>Anda tidak diizinkan untuk mengakses menu ini!</b></h3>"; exit();}
?>