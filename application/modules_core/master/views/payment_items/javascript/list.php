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

<script src="<?php echo base_url();?>bracket/js/custom.js"></script>
<script type="text/javascript">
  jQuery(document).ready(function() {
    
    // Show aciton upon row hover
    jQuery('.table-hidaction tbody tr').hover(function(){
      jQuery(this).find('.table-action-hide a').animate({opacity: 1});
    },function(){
      jQuery(this).find('.table-action-hide a').animate({opacity: 0});
    });
  
    
    // Chosen Select
    jQuery("select").chosen({
      'min-width': '100px',
      'white-space': 'nowrap',
      disable_search_threshold: 10
    });
    
	//format currency
	jQuery('td.price').autoNumeric('init', {aSign:'Rp ', pSign:'p' });
  });
</script>
<script type="text/javascript">
  function tambah(){
    var sy_id = document.getElementById('sy_id').value;
    var u_id  = document.getElementById('u_id').value;
    window.location = "<?php echo base_url(); ?>master/payment_items/add/"+sy_id+"/"+u_id;
  }
  function hapus(no,nama){
    if(confirm('Are you sure to delete this item?'))
      window.location = "<?php echo base_url(); ?>master/payment_items/delete/"+no;
  }
</script>

