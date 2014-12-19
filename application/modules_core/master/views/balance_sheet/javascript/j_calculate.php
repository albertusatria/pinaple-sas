<link href="<?php echo base_url();?>bracket/css/balance.sheet.css" rel="stylesheet">

<script src="<?php echo base_url();?>bracket/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/modernizr.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/toggles.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/retina.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.cookies.js"></script>

<script src="<?php echo base_url();?>bracket/js/custom.js"></script>
<script src="<?php echo base_url()?>bracket/js/autoNumeric.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.formatCurrency-1.4.0.min.js"></script>
<script src="<?php echo base_url();?>bracket/js/jquery.formatCurrency.id-ID.js"></script>
<script src="<?php echo base_url()?>bracket/js/neraca.saldo.js"></script>
<script>
  jQuery(document).ready(function() {
    jQuery('.price').autoNumeric('init', {pSign:'p', aSep:'.', aDec:',' });
	neracaSaldo.init();

	jQuery('.btn-success.btn-lg.btn-block').on('click',function(){
		var itemsd = {};
		var itemsc = {};
		var x = 0;

		jQuery(".neraca table.table-debet tr.group-content").each(function(){
			itemsd[x] ={};
			itemsd[x]['id']=jQuery(this).find('input.account-id').attr('data-value');
			itemsd[x]['amount']=jQuery(this).find('input.value-activa.price').attr('data-value');
			console.log(itemsd[x]['id']);
			console.log(itemsd[x]['amount']);
			x++;
		});
		//console.log('-----------------------');
		jQuery(".neraca table.table-credit tr.group-content").each(function(){
			itemsc[x] ={};
			itemsc[x]['id']=jQuery(this).find('input.account-id').attr('data-value');
			itemsc[x]['amount']=jQuery(this).find('input.value-activa.price').attr('data-value');
			console.log(itemsc[x]['id']);
			console.log(itemsc[x]['amount']);
			x++;
		});
		alert("Save Successfully!!");		
/*
		jQuery.ajax({
	    	type: "POST",
	    	url: CI_ROOT+"master/balance_sheet/save_process",
	    	async:false,
	    	data: item,
	     	success: function(data)
	     	{
				console.log('success masuk');
		    	console.log(data);	 
	     	},
		    error: function (data)
		    {
		    	console.log('terjadi error');
		    	console.log(data);
		    }
		});  	
*/
	    return false;
	});

  });
</script>