<link href="<?php echo base_url();?>bracket/css/dataTables.bootstrap3.css" rel="stylesheet">
<link href="<?php echo base_url();?>bracket/css/custom.profile.student.css" rel="stylesheet">

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

<script src="<?php echo base_url();?>bracket/js/custom.js"></script>

<script src="<?php echo base_url();?>bracket/js/management/student.management.js"></script>
<script type="text/javascript">
        CI_ROOT = "<?=base_url() ?>";
</script>

<script type="text/javascript">
// General Setting
jQuery(document).ready(function() {
	Management.init();
	jQuery(".chosen-select").chosen({'width':'100%','white-space':'nowrap'});

	jQuery("#tgl_lahir").mask("99-99-9999");
	jQuery("#tgl_lahir_wali").mask("99-99-9999");

	jQuery('#tgl_lahir').datepicker({ 
      dateFormat: 'dd-mm-yy',
      altField: '#hidden_dob' ,
      altFormat: 'yy-mm-dd'
    });

  	jQuery('#tgl_lahir_ayah').datepicker({ 
      dateFormat: 'dd-mm-yy',
      altField: '#hidden_dob_ayah' ,
      altFormat: 'yy-mm-dd'
    });

    jQuery('#tgl_lahir_ibu').datepicker({ 
      dateFormat: 'dd-mm-yy',
      altField: '#hidden_dob_ibu' ,
      altFormat: 'yy-mm-dd'
    });
});

function stopPropagation(evt) {
	if (evt.stopPropagation !== undefined) {
		evt.stopPropagation();
	} else {
		evt.cancelBubble = true;
	}
}
</script>