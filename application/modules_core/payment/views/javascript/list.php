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
		var keyword = jQuery('#keyword').val();
		searchSiswa(keyword);
		//pencarian
		//yang dicari
	});	
	//init currency format
	jQuery('.price').autoNumeric('init', {aSign:'Rp', pSign:'p', aSep:'.', aDec:',' });
	

	
});
</script>

<script type="text/javascript">
// Appends to Invoice Table
jQuery(document).ready(function() {

	//append all items
	jQuery("#invoicePanel tbody").on('click','tr td a.add.all',function(){

		// console.log('shit'); return false;		
		var dethis = $(this);

		var itemTitle	= dethis.prev().text();
		var price		= dethis.next().find('h5 .price').attr("value");
		var detailList	= dethis.next().find('.list-details-items').html();
		var is_editable	= "editable";
		var id 			= dethis.closest('td').find('input.id-invoice').val();
		var need_to_pay = dethis.closest('td').find('input.pay-invoice').val();

		// console.log(id + ' ' +need_to_pay);
		// return false;
		                 			// '<input type="hidden" class="id-invoice" value="'+invoice_id+'">'+
		                 			// '<input type="hidden" class="pay-invoice" value="'+need_to_pay+'">'+


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
     			'<input type="hidden" class="id-invoice-dab" value="'+id+'">'+
     			'<input type="hidden" class="pay-invoice-dab" value="'+need_to_pay+'">'+
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
		dethis.closest('tr.billed').fadeOut(10, function(){
			$(this).remove();	
		});
		
		$('#resultsInvoice tbody').find('.add.all').show();
		updateGrandTotal();
		
		return false;


	});

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

	function searchSiswa(id) {
		var item  = {};
		var num   = 1;
		item[num] = {};
		item[num]['keyword'] = id;

		if (id == '') {
			console.log('tidak boleh kosong');
		   	jQuery('#resultSiswa tbody tr').remove();
            jQuery('#resultSiswa > tbody:first').append(
      			 '<tr>'+
      			 	'<td colspan="2">No result found</td>'+
      			 '</tr>'
			);	
			return false;
		}

		//cari , jika katemu tampilkan pop up, pilih
		
		jQuery('#ajax-loader').show(); 
	    jQuery.ajax({
	    	type: "POST",
	    	url: CI_ROOT+"payment/payments/get_siswa_info",
	    	data: item,
	     	success: function(data)
	     	{
			    if (data.length > 0)
			    {
			   		// console.log(data);
			   		// return false;
			   		//tampilkan list siswanya

				   	jQuery('#resultSiswa tbody tr').remove();
					var nis; var nama; var unit; var grade; var alamat; var current;
		            for (index = 0; index < data.length; ++index) {
		                nis = data[index]['nis'];
		                nama = data[index]['full_name'];
		                unit = data[index]['name'];
		                unit_id = data[index]['unit_id'];
		                alamat = data[index]['living_address'];
		                current = data[index]['current_level'];
		                start = data[index]['start_level'];
		            jQuery('#resultSiswa > tbody:first').append(
		                 '<tr>'+
		                    '<td>'+
		                    	'<input type="hidden" class="nisSiswa" name="nisSiswa" value="'+nis+'">'+
		                    	'<input type="hidden" class="namaSiswa" name="namaSiswa" value="'+nama+'">'+
		                    	'<strong class="text-danger"> '+nama+' ('+nis+') </strong> <br>'+
		                    	unit+'<br>'+
		                    	'Kelas : '+
		                    '</td>'+
		                    '<td>'+
		                    	'<a href="#" class="pilih-siswa">'+
									'<i class="fa fa-plus"></i>'+
								'</a>  '+
							'</td>'+
		                 '</tr>'
						);				               
		            }
				}
				else 
				{
				 	//bila tidak ketemu
				 	console.log('tidak ditemukan');
				   	jQuery('#resultSiswa tbody tr').remove();
		            jQuery('#resultSiswa > tbody:first').append(
	          			 '<tr>'+
	          			 	'<td colspan="2">No result found</td>'+
	          			 '</tr>'
					);				              				
		        }		    
	     	},
		    error: function (data)
		    {
		    	console.log('terjadi error');
		    	console.log(data);
		    }
		});  	
		
		jQuery('#ajax-loader').hide(); 
	    return false;
	}


	function queryInvoice(item) {
		
		jQuery('#ajax-loader').show(); 
	    jQuery.ajax({
	    	type: "POST",
	    	url: CI_ROOT+"payment/payments/get_siswa_invoice",
	    	data: item,
	     	success: function(data)
	     	{
			    if (data.length > 0)
			    {
			   		console.log(data);
			   		// console.log("banyaknya data : "+data.length);
			   		// return false;
			   		//tampilkan list siswanya

				   	jQuery('#resultsInvoice tbody tr').remove();
					var item_name;
		            for (index = 0; index < data.length; ++index) {
		            	invoice_id = data[index]['id'];
		                packet_name = data[index]['packet_name'];
		                item_name = data[index]['item_name'];
		                amount = data[index]['amount'];
		                amount_paid = data[index]['amount_paid'];
		                period_name = data[index]['period_name'];

		                if (period_name != null) {
		                	item_name = item_name + ' Bulan ' + period_name;
		                }
		                need_to_pay = amount - amount_paid;

		            if (index % 2 == 0) {


		            jQuery('#resultsInvoice > tbody:first').append(
	                 		'<tr class="odd billed">'+
	                    		'<td class="items">'+
		                 			'<input type="hidden" class="id-invoice" value="'+invoice_id+'">'+
		                 			'<input type="hidden" class="pay-invoice" value="'+need_to_pay+'">'+
	                    			'<h5>'+item_name+'</h5>'+
										'<a href="#" class="add all">'+
											'<i class="fa fa-plus"></i>'+
										'</a>'+
									'<div class="bills-info">'+
					 	  			   '<div class="panel-group">'+
						            		'<div class="panel">'+
						            			'<h5><span class="price" value="'+need_to_pay+'">'+need_to_pay+'</span></h5>'+
							          		'</div>'+
						          		'</div>'+						          																									
									'</div>'+
			                    '</td>'+
			                    '<td>Billed Invoice</td>'+
			                 '</tr>'
						);			

		            } else {


		            jQuery('#resultsInvoice > tbody:first').append(
	                 		'<tr class="even billed">'+
	                    		'<td class="items">'+
		                 			'<input type="hidden" class="id-invoice" value="'+invoice_id+'">'+
		                 			'<input type="hidden" class="pay-invoice" value="'+need_to_pay+'">'+
	                    			'<h5>'+item_name+'</h5>'+
										'<a href="#" class="add all">'+
											'<i class="fa fa-plus"></i>'+
										'</a>'+
									'<div class="bills-info">'+
					 	  			   '<div class="panel-group">'+
						            		'<div class="panel">'+
						            			'<h5><span class="price" value="'+need_to_pay+'">'+need_to_pay+'</span></h5>'+
							          		'</div>'+
						          		'</div>'+						          																									
									'</div>'+
			                    '</td>'+
			                    '<td>Billed Invoice</td>'+
			                 '</tr>'
						);			
		            }

					    //              	'<a class="details-link" data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#ID-1">'+
					    //                	'Details'+
						// '</a>'+
					    //           '<div id="ID-1" class="details-info panel-collapse collapse">'+
					    //             '<div class="panel-body">'+
						// 	'<dl class="list-details-items">'+
						// 		'<dt>SPP</dd>'+
						// 		'<dd class="price" value="500000">500000</dd>'+
						// 		'<dd class="add-to">'+
						// 			'<a href="#" class="add">'+
						// 				'<i class="fa fa-plus"></i>'+
						// 			'</a>'+
						// 		'</dd>'+
						// 		'<dt>Seragam</dd>'+
						// 		'<dd class="price" value="500000">500000</dd>'+
						// 		'<dd class="add-to">'+
						// 			'<a href="#" class="add">'+
						// 				'<i class="fa fa-plus"></i>'+
						// 			'</a>'+
						// 		'</dd>'+
								
						// 		'<dt>DPP</dd>'+
						// 		'<dd class="price" value="1000000">1000000</dd>'+
						// 		'<dd class="add-to">'+
						// 			'<a href="#" class="add">'+
						// 				'<i class="fa fa-plus"></i>'+
						// 			'</a>'+
						// 		'</dd>'+
						// 	'</ul>'+
					    //             '</div>'+
					    //           '</div>'+
					    //         '</div>'+

		            }

					/* Initialise datatables */
				    var oTable = jQuery('#resultsInvoice').dataTable();

				    /* Add event listener to the dropdown input */
				    $('select#filter').change( function() { 
				    	oTable.fnFilter( $(this).val() );
					});		            
				}	    
	     	},
		    error: function (data)
		    {
		    	console.log('terjadi error');
		    	console.log(data);
		    }
		});  	


		
		jQuery('#ajax-loader').hide(); 
	    return false;
	}


	jQuery("#resultSiswa tbody").on('click','tr td a.pilih-siswa',function(){
		var id = jQuery(this).closest('tr').find('input.nisSiswa').val();
		var nama = jQuery(this).closest('tr').find('input.namaSiswa').val();
		// console.log(id + ' ' + nama);

		//menghilangkan 
        jQuery('#searchPanel').fadeOut(function(){
          jQuery(this).remove();		  

          //query semua invoice yang dimiliki
			var item  = {};
			var num   = 1;
			item[num] = {};
			item[num]['nis'] = id;
			queryInvoice(item);


	      jQuery('#invoicePanel').fadeIn(function(){
	      });          

        });

		return false;
	});

	jQuery("#bayarDab").on('click',function(){

        var items = {};
        var num = 1;
        items[num] = {};

        jQuery("#invoiceTable tbody tr").each(function() {
        /* get Qty and EA Price */
            // console.log(num);
            items[num] = {};
            items[num]['id'] = jQuery(this).find('td input.id-invoice-dab').val();
            items[num]['amount_paid'] = jQuery(this).find('td input.pay-invoice-dab').val();
            items[num]['status'] = 'PAID';
            // console.log(JSON.stringify(items[num]));                        
            num = num + 1;
        });

        // return false;

        //update span
        jQuery.ajax({
          	type: "POST",
          	url: CI_ROOT+"payment/payments/payment_process",
          	data: items,
            success: function(data)
            {                    
            	console.log(data);
                window.location.replace(CI_ROOT + 'payment/payments');
                return false;
            },
            error: function (data)
            {  
            	console.log('pait');
            }
        });        
	});

</script>