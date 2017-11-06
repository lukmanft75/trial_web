
<script>
	function has_region(id){
		if(id.substring(id.length - 2) == ":0"){
			div_region.style.visibility = "visible";
		} else {
			div_region.style.visibility = "hidden";
		}
		load_checker(id,0);
	}
	
	function load_checker(project,region_id,nominal){
		nominal = nominal || 0;
		region_id = region_id || 0;
		$.get( "ajax/prf_ajax.php?mode=get_select_checker&project="+project+"&region_id="+region_id, function(data) {
			$("#div_checker").html(data);
		});
		$.get( "ajax/prf_ajax.php?mode=get_select_signer&project="+project+"&region_id="+region_id, function(data) {
			$("#div_signer").html(data);
		});
		if(nominal > 0){
			$.get( "ajax/prf_ajax.php?mode=get_select_approve&project="+project+"&region_id="+region_id+"&nominal="+nominal, function(data) {
				$("#div_approve").html(data);
			});
		}
	}
</script>