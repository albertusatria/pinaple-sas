<link href="<?php echo base_url();?>bracket/css/custom.items.type.css" rel="stylesheet">

<script src="<?php echo base_url();?>bracket/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/modernizr.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/toggles.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.cookies.js"></script>

<script src="<?php echo base_url();?>bracket/js/jquery-ui-1.10.3.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.mask.min.js"></script>


<script src="<?php echo base_url()?>bracket/js/jquery.datatables.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/chosen.jquery.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/autoNumeric.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/custom.js"></script>


<script type="text/javascript">



  jQuery(document).ready(function() {
	
	/* validation & mask */
	jQuery("#openingBalanceSetup").validate({
		highlight: function(element) {
			jQuery(element).closest('.form-group').removeClass('has-success').addClass('has-error');
		},
		success: function(element) {
			jQuery(element).closest('.form-group').removeClass('has-error');
		}
	});	
	    
	jQuery("#tgl_opening").mask("99-99-9999");
    jQuery('#tgl_opening').datepicker({ 
      dateFormat: 'dd-mm-yy',
      altField: '#hidden_dob' ,
      altFormat: 'yy-mm-dd'
    });

  });   
</script>

