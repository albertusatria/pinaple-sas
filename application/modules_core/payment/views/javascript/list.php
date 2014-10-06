<link href="<?php echo base_url();?>bracket/css/custom.invoice.css" rel="stylesheet">

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
<script src="<?php echo base_url();?>bracket/js/custom.js"></script>

<script type="text/javascript">
        CI_ROOT = "<?=base_url() ?>";
</script>

<script type="text/javascript">
// General Setting
jQuery(document).ready(function() {
	//find bills from student's NIS/Name
	jQuery('#btnCari').on('click',function(){
		
	});
	
	//init currency format
	jQuery('.price').autoNumeric('init', {aSign:'Rp ', pSign:'p' });
	
	/* Initialise datatables */
    var oTable = jQuery('#resultsInvoice').dataTable();

    /* Add event listener to the dropdown input */
    $('select#filter').change( function() { 
    	oTable.fnFilter( $(this).val() );
	});
	
});
</script>

<script type="text/javascript">
// Appends to Invoice Table
jQuery(document).ready(function() {

	//append all items
	$('.add.all').on('click', function(){
		var dethis = $(this);

		var itemTitle	= dethis.prev().text();
		var price		= dethis.next().find('h5 .price').attr("value");
		var detailList	= dethis.next().find('.list-details-items').html();

		if (detailList == undefined)
		{
			detailList = "";
		}

		$('#invoiceTable tbody:first').append(
			'<tr>'+
			'<td>'+
				'<div class="text-primary"><strong>'+itemTitle+'</strong></div>'+
				'<dl><small>'+detailList+'</small></dl>'+
			'</td>'+
			'<td>1</td>'+
			'<td class="price">'+price+'</td>'+
			'<td class="price">'+price+'</td>'+
			'</tr>'
		);
		
		//remove actions button, not include on details items
		$('#invoiceTable tbody').find('dd.add-to').remove();

		//init currency plugins
		$('.price').autoNumeric('init', {aSign:'Rp ', pSign:'p' });
		
		//remove billed invoice
		dethis.fadeOut(800, function(){
			dethis.closest('tr.billed').remove();	
		});
		
		$('#resultsInvoice tbody').find('.add.all').show();
		return false;
	});
	
});
</script>