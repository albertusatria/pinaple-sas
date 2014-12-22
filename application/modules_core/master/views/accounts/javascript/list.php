<link href="<?php echo base_url();?>bracket/css/custom.items.type.css" rel="stylesheet">

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

	jQuery('#form-add-sub').on('click','button.save-new-sub',function(){
		// jQuery('#form-add-sub').validate();
		// if (jQuery('#form-add-sub').valid() == true) {
		// 	console.log('stasfas');
		// } else {

		// }
		// return false;		
	});
  
});   
</script>
<script type="text/javascript">
  function hapus(no,nama){
    if(confirm('Are you sure to delete this account: '+no+'?'))
      window.location = "<?php echo base_url(); ?>master/accounts/delete/"+no;
  }
  function new_submenu(parent_id,parent_name,tipe) {
  	jQuery("#add-sub-parent-code").val(parent_id);
  	jQuery("#add-sub-parent-name").val(parent_name);
  	jQuery("#add-sub-tipe").val(tipe);
  	jQuery("#add-sub-code").val('');
  	jQuery("#add-sub-name").val('');
  	jQuery("#add-sub-description").val('');
  }
  function new_account(tipe) {
  	jQuery("#add-new-tipe").val(tipe);
  	jQuery("#add-new-code").val('');
  	jQuery("#add-new-name").val('');
  	jQuery("#add-new-description").val('');
  }

</script>

