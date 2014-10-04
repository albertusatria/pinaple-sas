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
        CI_ROOT = "<?=base_url() ?>";
</script>

<script type="text/javascript">
  jQuery(document).ready(function() {
    
	// Show aciton upon row hover
	jQuery('.table-hidaction tbody tr').hover(function(){
	  jQuery(this).find('.table-action-hide a').animate({opacity: 1});
	},function(){
	  jQuery(this).find('.table-action-hide a').animate({opacity: 0});
	});
  
    
	// Basic Form
	jQuery("#newPacket").validate({
		highlight: function(element) {
		  jQuery(element).closest('.form-group').removeClass('has-success').addClass('has-error');
	},
		success: function(element) {
		  jQuery(element).closest('.form-group').removeClass('has-error').css('margin-bottom', '-20px');
		}
	});

	jQuery('#priceTable tbody tr td input.price').on('focus',function(){
      if (jQuery(this).val() == 0 ) {
        jQuery(this).val('');
      }
	});

	jQuery('#priceTable tbody tr td input.price').on('blur',function(){
      if (jQuery(this).val() == "" ) {
        jQuery(this).val('0');
      }	
	});

	jQuery("#inputName").on('change',function(){

	    var item = {};
	    var number = 1;
	    item[number] = {};
	    item[number]['id'] = jQuery(this).val();
	    console.log(item[number]);
	    //update span
	    jQuery.ajax({
	      type: "POST",
	      url: CI_ROOT+"master/invoice_packet/get_detail_of_payment_item",
	      data: item,
	       success: function(data)
	       {  
	       	  if (data['type'] == 'MONTHLY PAYMENT')
	       	  {
	       	  	jQuery("#inputType").val(data['type']);
	       	  } 
	       	  else 
	       	  {
	       	  	jQuery("#inputType").val('');	       	  	
	       	  }
	          //berhasil kembalikan hasil        
	          console.log(data); 
	       },
	       error: function (data)
	       {  
	          //gagal
	          console.log('pait');
	       }
	    });            		
	    return false;
	});
  
  });   




</script>
<script type="text/javascript">
  function hapus(no,nama,id){
    if(confirm('Are you sure to delete '+nama+' item?'))
      window.location = "<?php echo base_url(); ?>master/invoice_packet/delete_item/"+no+"/"+id;
  }
</script>

