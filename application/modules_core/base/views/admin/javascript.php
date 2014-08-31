		<script type="text/javascript" src="<?php echo base_url(); ?>resource/js/jquery/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>resource/js/jquery/jquery-ui-1.9.2.custom.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>resource/themes/masterbackend/js/raphael-min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>resource/themes/masterbackend/js/bootstrap.js"></script>
		<script type="text/javascript" src='<?php echo base_url(); ?>resource/themes/masterbackend/js/sparkline.js'></script>
		<script type="text/javascript" src='<?php echo base_url(); ?>resource/themes/masterbackend/js/morris.min.js'></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>resource/themes/masterbackend/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>resource/themes/masterbackend/js/jquery.masonry.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>resource/themes/masterbackend/js/jquery.imagesloaded.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>resource/themes/masterbackend/js/jquery.facybox.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>resource/themes/masterbackend/js/jquery.elfinder.min.html"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>resource/themes/masterbackend/js/jquery.alertify.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>resource/themes/masterbackend/js/jquery.gritter.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>resource/themes/masterbackend/js/realm.js"></script>

		<!-- checkbox -->
		<script type="text/javascript">
			$(function() {
				$(".all").click(function(){
					var status = $(this).is(":checked");
					if(status == true){
						$(".menu" + $(this).val()).prop('checked', true);
					} else {
						$(".menu" + $(this).val()).prop('checked', false);
					}
				});
			})
		</script>

		<script type="text/javascript">
			$(function() {
				$(".sub").click(function(){
					var status = $(this).is(":checked");
					if(status == true){
						$(".menu" + $(this).val()).prop('checked', true);
					} else {
						$(".menu" + $(this).val()).prop('checked', false);
					}
				});
			})
		</script>
		<!-- end of checkbox -->
