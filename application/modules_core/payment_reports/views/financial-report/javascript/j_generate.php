<link href="<?php echo base_url()?>bracket/css/generate.report.css" rel="stylesheet"/>
<link href="<?php echo base_url()?>bracket/js/bootstrap-editable/css/bootstrap-editable.css" rel="stylesheet"/>
<link href="<?php echo base_url();?>bracket/css/print-css/print.invoice.css" rel="stylesheet" media="print" type="text/css"></script>

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
<script src="<?php echo base_url()?>bracket/js/bootstrap-wizard.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/dropzone.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/autoNumeric.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.formatCurrency-1.4.0.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.formatCurrency.id-ID.js"></script>

<script src="<?php echo base_url();?>bracket/js/custom.js"></script>

<script type="text/javascript">
        CI_ROOT = "<?=base_url() ?>";
</script>

<script type="text/javascript">
jQuery(document).ready(function() {
	// Date Picker
    jQuery('.datepicker-daily').datepicker({ 
      dateFormat: 'dd-mm-yy',
      altFormat: 'yy-mm-dd'
    });
    
    jQuery('.datepicker-monthly-to').datepicker({ 
      dateFormat: 'dd-mm-yy',
      altFormat: 'yy-mm-dd'
    });

    jQuery('.datepicker-monthly-from').datepicker({ 
      dateFormat: 'dd-mm-yy',
      altFormat: 'yy-mm-dd'
    });
    
    jQuery('.datepicker-yearly-to').datepicker({ 
      dateFormat: 'yy',
      altFormat: 'yy'
    });    

    jQuery('.datepicker-yearly-from').datepicker({ 
      dateFormat: 'yy',
      altFormat: 'yy'
    });    
    
	//init currency format
	jQuery('.price').autoNumeric('init', {aSign:'Rp', pSign:'p', aSep:'.', aDec:',' });

});
</script>