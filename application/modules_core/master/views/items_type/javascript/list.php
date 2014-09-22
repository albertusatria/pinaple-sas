<script src="<?php echo base_url();?>bracket/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/modernizr.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/toggles.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.cookies.js"></script>

<script src="<?php echo base_url()?>bracket/js/jquery.datatables.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/chosen.jquery.min.js"></script>
<script src="<?php echo base_url()?>bracket/js/autoNumeric.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/custom.js"></script>
<script type="text/javascript">
  jQuery(document).ready(function() {
    
	// Show aciton upon row hover
	jQuery('.table-hidaction tbody tr').hover(function(){
	  jQuery(this).find('.table-action-hide a').animate({opacity: 1});
	},function(){
	  jQuery(this).find('.table-action-hide a').animate({opacity: 0});
	});
  
    
	// Basic Form
	jQuery("#newItemstype").validate({
		highlight: function(element) {
		  jQuery(element).closest('.form-group').removeClass('has-success').addClass('has-error');
	},
		success: function(element) {
		  jQuery(element).closest('.form-group').removeClass('has-error').css('margin-bottom', '-20px');
		}
	});
  
  });   
</script>
<script type="text/javascript">
  function hapus(no,nama){
    if(confirm('Are you sure to delete '+no+'this item?'))
      window.location = "<?php echo base_url(); ?>master/items_type/delete/"+no;
  }
</script>

