<?php
	$odontogram = $rawat['odontogram'];
?>
<div id="svgselect" style="width: 610px; height: 230px; margin-bottom: 100px;">
	<!-- background-color:red -->
	<svg version="1.1" height="140%" width="100%" style="overflow-x: scroll;">
		<g transform="scale(1.5)" id="odontogramdetail"> </g>
	</svg>
</div>

<script>
	var link = '<?php echo base_url() ?>';
</script>
<script>
	var odontogramData = '<?php echo $odontogram; ?>';
</script>

<script src="<?php echo base_url();?>assets/js/apps/rawat-edit-rekam.js"></script>

<script type="text/javascript">
	$(document).ready(function () {
		app_rawat_edit.init();
	});
</script>