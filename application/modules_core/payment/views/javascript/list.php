<link href="<?php echo base_url();?>bracket/css/custom.invoice.css" rel="stylesheet">
<link href="<?php echo base_url()?>bracket/js/bootstrap-editable/css/bootstrap-editable.css" rel="stylesheet"/>

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

<script src="<?php echo base_url()?>bracket/js/bootstrap-editable/js/bootstrap-editable.js"></script>
<script src="<?php echo base_url()?>bracket/js/form-editable/invoice.js"></script>
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
	jQuery('.price').autoNumeric('init', {aSign:'Rp', pSign:'p', aSep:'.', aDec:',' });
	
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
		var is_editable	= "editable";

		if (detailList == undefined)
		{
			detailList = "";
		}
		else
		{
			is_editable	= "";
		}
		
		$('#invoiceTable tbody:first').append(
			'<tr>'+
			'<td>'+
				'<div class="text-primary"><strong>'+itemTitle+'</strong></div>'+
				'<dl><small>'+detailList+'</small></dl>'+
			'</td>'+
			'<td><span class="qty '+is_editable+'" data-type="text" data-pk="1" data-original-title="Jumlah Item">1<span></td>'+
			'<td><span class="price each" value='+price+'>'+price+'</span></td>'+
			'<td><span class="price subtotal" value='+price+'>'+price+'</span></td>'+
			'</tr>'
		);

		/*	init editable element with success function to get their updated value
			file location : bracket/js/form-editable/invoice.js
		*/
		FormEditableInvoice.init();
		
		//set currency
		$('.price').autoNumeric('init', {aSign:'Rp', pSign:'p', aSep:'.', aDec:',' });
		
		//remove actions button, not include on details items
		$('#invoiceTable tbody').find('dd.add-to').remove();
		
		//remove billed invoice
		dethis.closest('tr.billed').fadeOut(800, function(){
			$(this).remove();	
		});
		
		$('#resultsInvoice tbody').find('.add.all').show();
		updateGrandTotal();
		
		return false;
	});	
	
});

// update Grand Total
function updateGrandTotal()
{
	var grandTotal = 0;
	
	$("#invoiceTable tbody tr").each(function() {
	    $("td span.subtotal",this).each(function() {
			var dethis = $(this);
			grandTotal += Number(dethis.attr("value"));
	    }); 
	    
		$('.table-total tbody').find('.price').text(grandTotal);
    });

    $('.table-total tbody').find('.price').formatCurrency({region: 'id-ID'});	
}
</script>