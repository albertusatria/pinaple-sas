<link href="<?php echo base_url();?>bracket/js/bootstrap-editable/css/bootstrap-editable.css" rel="stylesheet"/>
<link href="<?php echo base_url();?>bracket/css/custom.journal.book.css" rel="stylesheet">

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

<script src="<?php echo base_url()?>bracket/js/autoNumeric.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.formatCurrency-1.4.0.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.formatCurrency.id-ID.js"></script>
<script src="<?php echo base_url();?>bracket/js/bootstrap-editable/js/bootstrap-editable.js"></script>
<script src="<?php echo base_url()?>bracket/js/neraca.saldo.js"></script>

<script type="text/javascript">
        CI_ROOT = "<?=base_url() ?>";
</script>

<script>
  jQuery(document).ready(function() {
    


    /* mask & init picker */
	jQuery('input[name="journal_date"]').mask('99-99-9999');
    jQuery('input[name="journal_date"]').datepicker({ 
      dateFormat: 'dd-mm-yy',
      altField: '#hidden_dob' ,
      altFormat: 'yy-mm-dd'
    });  
    
    jQuery('.price').autoNumeric('init', {pSign:'p', aSep:'.', aDec:',' });

    /* init function */
	neracaSaldo.init();   
  });
</script>
