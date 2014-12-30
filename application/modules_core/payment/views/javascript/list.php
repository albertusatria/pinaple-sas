<link href="<?php echo base_url();?>bracket/css/custom.invoice.css" rel="stylesheet">
<link href="<?php echo base_url()?>bracket/js/bootstrap-editable/css/bootstrap-editable.css" rel="stylesheet"/>
<link href="<?php echo base_url();?>bracket/css/print-css/print.invoice.css" rel="stylesheet" media="print" type="text/css"></script>

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

		return false;
	});	
	//init currency format
	jQuery('.price').autoNumeric('init', {aSign:'Rp', pSign:'p', aSep:'.', aDec:',' });
	jQuery('.dataTables_filter input').attr("placeholder", "enter seach terms here");
	jQuery('#resultsInvoice').dataTable({"paging":false});

});
</script>

<script type="text/javascript">
// Appends to Invoice Table
jQuery(document).ready(function() {

	//append all items
	jQuery("#invoicePanel tbody").on('click','tr td a.add.all',function(){
	
		var dethis = $(this);

		var itemTitle	= dethis.closest('tr').find('td h5 span.judul').text();
		var price		= dethis.next().find('h5 .price').attr("value");
		var detailList	= dethis.next().find('.list-details-items').html();

		var id 			= dethis.closest('td').find('input.id-invoice').val();
		var akun 		= dethis.closest('td').find('input.item-akuntansi').val();
		var is_editable	= '';
		var need_to_pay = dethis.closest('td').find('input.pay-invoice').val();
		var hari_terlambat = dethis.closest('td').find('input.day-terlambat').val();
		var denda_terlambat = dethis.closest('td').find('input.fine-terlambat').val();
		var subtot = Number(price) + Number(denda_terlambat);
		var unit_id = dethis.closest('td').find('input.unit-id').val()
		// console.log(id + ' ' +need_to_pay);
		// return false;
		// '<input type="hidden" class="id-invoice" value="'+invoice_id+'">'+
		// '<input type="hidden" class="pay-invoice" value="'+need_to_pay+'">'+


		var late_info = '';
		if(hari_terlambat > 0)
		{
			var daysOfLate = '';
			if(hari_terlambat > 1)
			{
				daysOfLate = ' days';
			}
			else
			{
				daysOfLate = ' day';
			}		
			
			late_info +=
				'<dt><small>Late for : </dt>'+
				'<dd class="days-late" data-value="'+hari_terlambat+'"><small>'+hari_terlambat+daysOfLate+'</dd>'
		}
		else
		{
			late_info = "";
		}
		
		var more_detail_info = '';
		if (detailList == undefined)
		{
			detailList = "";
			more_detail_info = "";
		}
		else
		{
			is_editable	= "";
			more_detail_info +=
				'<dt><small>Detail information </dt>'+
				'<dd><small>'+detailList+' days</dd>'
			
		}
		var newRow = '';

		newRow += 
			'<tr>'+
			'<td>'+
     			'<input type="hidden" class="akun-invoice-dab" value="'+akun+'">'+
     			'<input type="hidden" class="id-invoice-dab" value="'+id+'">'+
     			'<input type="hidden" class="name-invoice-dab" value="'+itemTitle+'">'+
     			'<input type="hidden" class="init-invoice-dab" value="'+need_to_pay+'">'+
     			'<input type="hidden" class="pay-invoice-dab" value="'+need_to_pay+'">'+
     			'<input type="hidden" class="instalment-invoice-dab" value="0">'+
     			'<input type="hidden" class="day-late-invoice-dab" value="'+hari_terlambat+'">'+
     			'<input type="hidden" class="fine-invoice-dab" value="'+denda_terlambat+'">'+
     			'<input type="hidden" class="bayar-invoice-dab" value="YA">'+
     			'<input type="hidden" class="unit-id-dab" value="'+unit_id+'">'+
				'<div class="text-primary"><strong><b class="is-cicilan"></b>'+itemTitle+'</strong></div>'+
				'<dl>'+late_info+more_detail_info+'</dl>'+
			'</td>';
		if (id == '0') {
			console.log('bisa diedit jumlahnya');
			is_editable	= "editable";
			newRow += 
			// '<td><span class="qty">1<span></td>';
			'<td><span class="qty '+is_editable+'" data-type="text" data-pk="1" data-original-title="Jumlah Item">1<span></td>';
		} else {
			console.log('TIDAK bisa diedit jumlahnya');
			newRow += 
			'<td><span class="qty">1<span></td>';
		}
			newRow += 
			'<td>'+
				'<span class="price each init-price" value='+price+'>'+price+'</span><br/>'+
				'<p class="installment">'+
					'<span class="label-installment">installment : </span><span class="inst-credit" value="0">0</span>'+
			'</p></td>';
			if (denda_terlambat != 0) 
			{
			newRow += 
			'<td>'+
				'<span class="price each denda-price" value='+denda_terlambat+'>'+denda_terlambat+'</span><br/>'+
				'<p class="installment">'+
					'<span class="label-fines">Rp500,00 * </span><span class="days-credit" value="'+hari_terlambat+'">'+hari_terlambat+'</span>'+
			'</p></td>';
			} 
			else 
			{
			newRow +=
			'<td></td>';
			}
			newRow +=
			// '<td><input type="text" class="form-control input-sm fines" value="'+denda_terlambat+'" /></td>'+
			'<td><span class="price subtotal" value='+subtot+'>'+subtot+'</span></td>'+
			'<td><a class="action cancel"><i class="fa fa-minus-square"></i></a></td>'+			
			'</tr>';

		$('#invoiceTable tbody:first').append(newRow);

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
		console.log('ini');
		var dethis = $(this);

		var itemTitle	= dethis.closest('tr').find('td h5 span.judul').text();
		var price		= dethis.next().find('h5 .price').attr("value");
		var detailList	= dethis.next().find('.list-details-items').html();
		var is_editable	= '';
		if (id != '0') {
			is_editable	= "editable";
		}

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
		jQuery('#totalPayment').val(grandTotal)				    
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
			   		console.log(data);
			   		//return false;
			   		//tampilkan list siswanya

				   	jQuery('#resultSiswa tbody tr').remove();
					var nis, nama, unit, grade, alamat, current;
		            for (index = 0; index < data.length; ++index) {
		                nis = data[index]['nis'];
		                nama = data[index]['full_name'];
		                unit = data[index]['name'];
		                unit_id = data[index]['unit_id'];
		                alamat = data[index]['living_address'];
		                current = data[index]['current_level'];
		                start = data[index]['start_level'];
		                kelas = data[index]['class_name'];
		            jQuery('#resultSiswa > tbody:first').append(
		                 '<tr>'+
		                    '<td>'+
		                    	'<input type="hidden" class="nisSiswa" name="nisSiswa" value="'+nis+'">'+
		                    	'<input type="hidden" class="namaSiswa" name="namaSiswa" value="'+nama+'">'+
		                    	'<input type="hidden" class="unitId" name="unitId" value="'+unit_id+'">'+
		                    	'<input type="hidden" class="unitNama" name="unitNama" value="'+unit+'">'+
		                    	'<input type="hidden" class="unitKelas" name="unitKelas" value="'+kelas+'">'+
		                    	'<strong class="text-danger"> '+nama+' </strong>'+
		                    	'<br><small>'+nis+'</small>'+
		                    	'<div class="text-muted"><i class="fa fa-puzzle-piece"></i>'+unit+'</div>'+
		                    	'<div class="text-muted"><i class="fa fa-map-marker"></i>'+kelas+'</div>'+
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

					var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds


					var today = new Date();
					var dd = today.getDate();
					var mm = today.getMonth()+1; //January is 0!
					var yyyy = today.getFullYear();
					if(dd<10) {
					    dd='0'+dd
					} 
					if(mm<10) {
					    mm='0'+mm
					} 
					today = yyyy+'-'+mm+'-'+dd;

					// document.write(today);


					var item_name;
					var invoicelist = '';
					var invoicelistOptional = '';
					var date1;
					var date2;
					var timeDiff;
					var diffDays;	
					var tahun_period;
					var extra_name;
					var kode_akun;
					var unit_id

		            for (index = 0; index < data.length; ++index) {
		            	invoice_id = data[index]['id'];
		                packet_name = data[index]['packet_name'];
		                item_name = data[index]['item_name'];
		                amount = data[index]['amount'];
		                amount_paid = data[index]['amount_paid'];
		                period_name = data[index]['period_name'];
		                deadline = data[index]['payment_deadline'];
		                extra_name = data[index]['extra_name'];
		                kode_akun = data[index]['accounting_code'];
		                unit_id = jQuery('#unitIDPembayar').val();
		                console.log(unit_id);
		                if (extra_name != null) {
		                	item_name = item_name + ' ' + extra_name;
		                }


		                if (period_name != null) {
							date2 = new Date(deadline);
			                tahun_period = date2.getFullYear()
		                	item_name = item_name + ' Bulan ' + period_name + ' ' + tahun_period;
		                }
		                need_to_pay = amount - amount_paid;

		                // console.log('hari ini : '+today)
		                // console.log('deadline : '+deadline);

		                if (deadline != null) {
							date1 = new Date(today);
							date2 = new Date(deadline);
							timeDiff = Math.abs(date2.getTime() - date1.getTime());
							diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
			                if (date1 < date2) {
			                	terlambat = '0';
			                } else {
			                	terlambat = '1';
			                	fine = diffDays * 500;
			                }
		                } else {
		                	diffDays = 'tidak ada';
		                }
		                // console.log('perbedaan : '+diffDays);

			            if (index % 2 == 0) {
		                 	invoicelist += '<tr class="odd billed">';
		                }
		                else {
		                 	invoicelist += '<tr class="even billed">';		
		                }
		                	invoicelist +=
	                    		'<td class="items">'+
		                 			'<input type="hidden" class="id-invoice" value="'+invoice_id+'">'+
		                 			'<input type="hidden" class="pay-invoice" value="'+need_to_pay+'">'+
		                 			'<input type="hidden" class="item-name" value="'+item_name+'">'+
		                 			'<input type="hidden" class="item-akuntansi" value="'+kode_akun+'">'+
		                 			'<input type="hidden" class="unit-id" value="'+unit_id+'">';

                			if (diffDays != 'tidak ada') {
                				if (terlambat == '0') {
				                	invoicelist += '<input type="hidden" class="fine-terlambat" value="0">'+
				                					'<input type="hidden" class="day-terlambat" value="0">';
                				} else {
				                	invoicelist += '<input type="hidden" class="fine-terlambat" value="'+fine+'">'+
				                					'<input type="hidden" class="day-terlambat" value="'+diffDays+'">';
                				}
                			} else {
				                	invoicelist += '<input type="hidden" class="fine-terlambat" value="0">'+
				                					'<input type="hidden" class="day-terlambat" value="0">';                				
                			}

	                    			invoicelist += '<h5><span class="judul">'+item_name+'</span>';

                			if (diffDays != 'tidak ada') {
                				if (terlambat == '0') {
				                	invoicelist += '&nbsp;&nbsp;&nbsp; <span class="label label-success">'+diffDays+' days to go </span></h5>';
                				} else {
				                	invoicelist += '&nbsp;&nbsp;&nbsp; <span class="label label-danger">'+diffDays+' days late </span></h5>';
                				}
                			} else {
			                	invoicelist += '</h5>';                				
                			}

		                	invoicelist +=
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
			                 '</tr>';

		            }

				    jQuery.ajax({
				    	type: "POST",
				    	url: CI_ROOT+"payment/payments/get_optional_payment_option",
				    	async: false,
				    	data: item,
				     	success: function(data)
				     	{
				     		console.log(data);

				            for (index = 0; index < data.length; ++index) {
				                name = data[index]['name'];
				                amount = data[index]['amount'];
				                kode_akun = data[index]['accounting_code'];
				                unit_id = data[index]['unit_id']

					            if (index % 2 == 0) {
				                 	invoicelistOptional += '<tr class="odd billed">';
				                }
				                else {
				                 	invoicelistOptional += '<tr class="even billed">';		
				                }
				                	invoicelistOptional +=
			                    		'<td class="items">'+
				                 			'<input type="hidden" class="id-invoice" value="0">'+
				                 			'<input type="hidden" class="pay-invoice" value="'+amount+'">'+
				                 			'<input type="hidden" class="item-name" value="'+name+'">'+
				                			'<input type="hidden" class="fine-terlambat" value="0">'+
				                 			'<input type="hidden" class="item-akuntansi" value="'+kode_akun+'">'+
				                 			'<input type="hidden" class="unit-id" value="'+unit_id+'">'+
		                					'<input type="hidden" class="day-terlambat" value="0">'+
			                    			'<h5><span class="judul">'+name+'</span> <span class="label label-info">optional</span></h5>';
				                	invoicelistOptional +=
												'<a href="#" class="add all">'+
													'<i class="fa fa-plus"></i>'+
												'</a>'+
											'<div class="bills-info">'+
							 	  			   '<div class="panel-group">'+
								            		'<div class="panel">'+
								            			'<h5><span class="price" value="'+amount+'">'+amount+'</span></h5>'+
									          		'</div>'+
								          		'</div>'+						          																									
											'</div>'+
					                    '</td>'+
					                    '<td>Invoice Accidental</td>'+
					                 '</tr>';		
				            }
			            },
					    error: function (data)
					    {
					    	console.log('terjadi error dalam pengambilan accidental item');
					    	console.log(data);
					    }
					});

		            jQuery('#resultsInvoice > tbody:first').append(invoicelist);					
		            jQuery('#resultsInvoice > tbody:first').append(invoicelistOptional);					

					jQuery('.price').formatCurrency({region: 'id-ID'});

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
		var unit_id = jQuery(this).closest('tr').find('input.unitId').val();
		var unit_nama = jQuery(this).closest('tr').find('input.unitNama').val();
		var kelas = jQuery(this).closest('tr').find('input.unitKelas').val();
		// console.log(id + ' ' + nama);

        jQuery('#nisPembayar').val(id);
        jQuery('#namaPembayar').val(nama);
        jQuery('#unitIDPembayar').val(unit_id);
        jQuery('#unitPembayar').text(unit_nama);
        jQuery('#kelasPembayar').text(kelas);

        // if (unit_id = )


		//menghilangkan 
        jQuery('#searchPanel').fadeOut(function(){
          jQuery(this).remove();		  

          //query semua invoice yang dimiliki
			var item  = {};
			var num   = 1;
			item[num] = {};
			item[num]['nis'] = id;
			item[num]['unit_id'] = unit_id;
			jQuery('#resultsInvoice tbody tr').remove();
			queryInvoice(item);

	      jQuery('#invoicePanel').fadeIn(function(){
	      });          

        });
		return false;
	});

	//disable or cancel an item
	jQuery("#invoiceTable tbody").on('click','.action',function(){
		var dethis = jQuery(this);
		var	priceSubstotal = 0;
		if(dethis.hasClass('cancel'))
		{
			dethis.closest('tr').find('td input.bayar-invoice-dab').val('TIDAK');

			//change the classname of $this
			dethis.removeClass('cancel').addClass('pay');

			//change the icon
			dethis.find('i').removeClass('fa-minus-square').addClass('fa-plus-square');

			//change the value of qty to 0
			var thisQty = dethis.closest('tr').find('.qty');
			thisQty.text('0');
			thisQty.editable('option', 'disabled', true);
			
			//change the value of subtotal to 0 and format the currency
			dethis.closest('tr').find('.subtotal').attr('value','0').text('0').formatCurrency({region: 'id-ID'});
			
			updateGrandTotal();
		}
		else
		{
			dethis.closest('tr').find('td input.bayar-invoice-dab').val('YA');
			//change the classname of $this
			dethis.removeClass('pay').addClass('cancel');

			//change the icon
			dethis.find('i').removeClass('fa-plus-square').addClass('fa-minus-square');

			//change the value of qty to 1
			var thisQty = dethis.closest('tr').find('.qty');
			thisQty.text('1');
			thisQty.editable('option', 'disabled', false);

			//change the value of subtotal
			priceSubstotal = parseInt(dethis.closest('tr').find('.price').attr('value')) * 1;
			dethis.closest('tr').find('.subtotal').attr('value',priceSubstotal).text(priceSubstotal).formatCurrency({region: 'id-ID'});
			updateGrandTotal();			
		}
	});
	
	/* Payment Handling */
	jQuery("#makePayment").on('click',function(){

        jQuery('#konfirmasiNIS').text(jQuery('#nisPembayar').val());
        jQuery('#konfirmasiNama').val(jQuery('#namaPembayar').val());
        jQuery('#konfirmasiKelas').text(jQuery('#kelasPembayar').text());
        jQuery('#konfirmasiUnit').text(jQuery('#unitPembayar').text());

		// var id = jQuery(this).closest('tr').find('input.nisSiswa').val();
		// var nama = jQuery(this).closest('tr').find('input.namaSiswa').val();
		// var unit_id = jQuery(this).closest('tr').find('input.unitId').val();
		// var unit_nama = jQuery(this).closest('tr').find('input.unitNama').val();
		// var kelas = jQuery(this).closest('tr').find('input.unitKelas').val();
		// // console.log(id + ' ' + nama);

		  // jQuery('#nisPembayar').val(id);
		  // jQuery('#namaPembayar').val(nama);
		  // jQuery('#unitPembayar').text(unit_nama);
		  // jQuery('#kelasPembayar').text(kelas);


		jQuery('#confirmationPayment .table-item').find('table').remove();
		jQuery('#invoiceTable').clone().attr('id', 'confirmationTable').prependTo(jQuery('#confirmationPayment .table-item'));
		
		var tbodyCount = jQuery('#confirmationPayment #confirmationTable tbody tr').length;
		if(tbodyCount < 1)
		{
			jQuery('#confirmationPayment #doPayment').addClass('disabled');
		}
		else
		{
			jQuery('#confirmationPayment #doPayment').removeClass('disabled');
		}
		
		jQuery('#confirmationTable .is-cicilan').show();
		jQuery('#confirmationTable .installment').hide();		
	});
	
	
	/* CC / Debet Cards handling */
	jQuery('input[id=cards]').change(function(){
		if (jQuery(this).is(':checked')){
			jQuery('#cardsOption').show();
		}
	});
	jQuery('input[id=cash]').change(function(){
		if (jQuery(this).is(':checked')){
			jQuery('#cardsOption').hide();
		}

		// if (jQuery('input[id=cash]').is(':checked')) 
		// {
		// 	if (jQuery)
		// }

	});	
	
	/* Do 'Pay' and Printing */
	jQuery("#doPayment").on('click',function(){
		// javascript:window.print();
		
		//buat nota
        var item = {};
        var x = 1;
        item[x] = {};
        if (jQuery('#nisPembayar').val() != '') {
	        item[x]['nis'] = jQuery('#nisPembayar').val();
        }
        item[x]['payer_name'] = jQuery('#konfirmasiNama').val();
        item[x]['amount'] = jQuery('#totalPayment').val();
        item[x]['payer_method'] = '0';
        console.log(item[x]);

		var d = new Date();
		var month = new Array();
		month[0] = "01";
		month[1] = "02";
		month[2] = "03";
		month[3] = "04";
		month[4] = "05";
		month[5] = "06";
		month[6] = "07";
		month[7] = "08";
		month[8] = "09";
		month[9] = "10";
		month[10] = "11";
		month[11] = "12";
		var n = month[d.getMonth()];

        //update span
        jQuery.ajax({
          	type: "POST",
          	url: CI_ROOT+"payment/payments/payment_create_nota",
          	data: item,
            success: function(data)
            {                    
            	console.log('berhasil');
            	console.log(data);

		        var items = {};
		        var num = 1;
		        items[num] = {};

		        var itemx = {};
		        itemx[num] = {};

		        var pendapatan = {};
		        pendapatan[num] = {};

		        jQuery("#invoiceTable tbody tr").each(function() {
		        /* get Qty and EA Price */
		        // console.log(jQuery(this).find('td input.bayar-invoice-dab').val());
			        if ( jQuery(this).find('td input.bayar-invoice-dab').val() == 'YA') {

			            itemx[num] = {};
				        itemx[num]['payment_id'] = data;
				        itemx[num]['remark'] = jQuery(this).find('td input.name-invoice-dab').val();
				        itemx[num]['qty'] = jQuery(this).find('td span.qty').text();
				        itemx[num]['amount'] = jQuery(this).find('td input.init-invoice-dab').val();
				        itemx[num]['instalment'] = jQuery(this).find('td input.instalment-invoice-dab').val();
				        itemx[num]['fines'] = jQuery(this).find('td input.fine-invoice-dab').val();
				        if (parseInt(jQuery(this).find('td input.instalment-invoice-dab').val()) == 0) {

				        itemx[num]['subtotal'] = ( parseInt(jQuery(this).find('td input.pay-invoice-dab').val()) 
				        							+ parseInt(jQuery(this).find('td input.fine-invoice-dab').val()) );

				        } else {
				        itemx[num]['subtotal'] = ( parseInt(jQuery(this).find('td input.instalment-invoice-dab').val()) 
				        							+ parseInt(jQuery(this).find('td input.fine-invoice-dab').val()) );
				        }

			            // console.log(num);
			            items[num] = {};
			            items[num]['id'] = jQuery(this).find('td input.id-invoice-dab').val();

			            //jika kurang dari yang harus dibayarkan 
			            // console.log('yang harus dibayarkan : '+jQuery(this).find('td input.pay-invoice-dab').val());
			            // console.log('instalment : '+jQuery(this).find('td input.instalment-invoice-dab').val())
			            if (parseInt(jQuery(this).find('td input.instalment-invoice-dab').val()) == parseInt(jQuery(this).find('td input.pay-invoice-dab').val()) ) 
			            {
				            items[num]['status'] = 'PAID';
				            items[num]['amount_paid'] = parseInt(jQuery(this).find('td input.pay-invoice-dab').val()) + parseInt(jQuery(this).find('td input.fine-invoice-dab').val());
			            } 
			            else if (parseInt(jQuery(this).find('td input.instalment-invoice-dab').val()) == 0) 
			            {
				            items[num]['status'] = 'PAID';
				            items[num]['amount_paid'] = parseInt(jQuery(this).find('td input.pay-invoice-dab').val()) + parseInt(jQuery(this).find('td input.fine-invoice-dab').val());
			            }
			            else if (parseInt(jQuery(this).find('td input.instalment-invoice-dab').val()) < parseInt(jQuery(this).find('td input.pay-invoice-dab').val()) ) 
			            {
				            items[num]['status'] = 'INSTALMENT';
				            items[num]['amount_paid'] = jQuery(this).find('td input.instalment-invoice-dab').val();
			            } 


				        pendapatan[num] = {};
			            //journal data
				        pendapatan[num]['unit_id'] = jQuery(this).find('td input.unit-id-dab').val();
				        pendapatan[num]['accounting_code'] = jQuery(this).find('td input.akun-invoice-dab').val();
				        pendapatan[num]['accounting_period'] = jQuery('#thn_ajaran_id').val();
				        pendapatan[num]['month'] = n ;
				        pendapatan[num]['invoice_id'] = items[num]['id'];
				        pendapatan[num]['transaction_date'] = jQuery('#transaction_date').val(); //today
				        pendapatan[num]['transaction_ref'] = data; //data
				        pendapatan[num]['description'] = itemx[num]['remark'];
				        pendapatan[num]['amount_type'] = 'K';
				        pendapatan[num]['amount'] = items[num]['amount_paid'];

			            // console.log(JSON.stringify(items[num]));                        
			            // console.log(JSON.stringify(itemx[num]));                        
			            console.log(JSON.stringify(pendapatan[num]));      

			            num = num + 1;
			        } else {
			        	console.log('tidak dibayarkan')
			        }

		        });
				// return false;

		       //kas / bank
		        var aktiva = {};
		        var y = 1;
		        aktiva[y] = {}
		        aktiva[y]['accounting_period'] = jQuery('#thn_ajaran_id').val();
		        aktiva[y]['month'] = n ;
		        aktiva[y]['transaction_date'] = jQuery('#transaction_date').val(); //today
		        aktiva[y]['transaction_ref'] = data; //data
		        aktiva[y]['accounting_code'] = jQuery('#paymentMethodOption').val(); //pilihan dari checkbox
		        aktiva[y]['description'] = 'Transaksi Pembayaran';
		        aktiva[y]['amount_type'] = 'D';
		        aktiva[y]['amount'] = jQuery('#totalPayment').val();

		        jQuery.ajax({
		          	type: "POST",
		          	url: CI_ROOT+"payment/payments/save_to_journal",
		          	async:false,
		          	data: aktiva,
		            success: function(data)
		            {                    
		            	console.log(data);
		            },
		            error: function (data)
		            {  
		            	console.log('pait');
		            }
		        });	

				// return false;	
		        // return false;
		        jQuery.ajax({
		          	type: "POST",
		          	url: CI_ROOT+"payment/payments/payment_create_nota_detail",
		          	async:false,
		          	data: itemx,
		            success: function(data)
		            {                    
		            	console.log(data);
				        //update span
				        jQuery.ajax({
				          	type: "POST",
				          	url: CI_ROOT+"payment/payments/payment_process",
				          	async:false,
				          	data: items,
				            success: function(data)
				            {                    
				            	console.log(data);				            	
				            },
				            error: function (data)
				            {  
				            	console.log('pait');
				            }
				        }); 
		            },
		            error: function (data)
		            {  
		            	console.log('pait');
		            }
		        });       

		        jQuery.ajax({
		          	type: "POST",
		          	url: CI_ROOT+"payment/payments/save_to_journal",
		          	async:false,
		          	data: pendapatan,
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

      
            },
            error: function (data)
            {  
            	console.log('gagal');
            	console.log(data);
            }
        });        
        return false;

		//bayar detail

 
	});
	
	jQuery('#no-nis-transaction-mode').on('click',function(){
		jQuery('#namaPembayar').removeAttr('readonly').attr('required','required');
        jQuery('#unitPembayar').remove();
        jQuery('#kelasPembayar').remove();
        jQuery('#infoSiswa').remove();


		jQuery('#konfirmasiNama').removeAttr('readonly').attr('required','required');
        // jQuery('#konfirmasiNIS').hide();
        // jQuery('#konfirmasiNama').show();
        // jQuery('#konfirmasiKelas').hide();
        // jQuery('#konfirmasiUnit').hide();


        jQuery('#searchPanel').fadeOut(function(){
          jQuery(this).remove();		  

          //query semua invoice yang dimiliki
			jQuery('#resultsInvoice tbody tr').remove();

     		var invoicelistOptional = '';

		    jQuery.ajax({
		    	type: "GET",
		    	url: CI_ROOT+"payment/payments/get_optional_payment_option_no_name",
		    	async:false,
		     	success: function(data)
		     	{
		     		console.log(data);

		            for (index = 0; index < data.length; ++index) {
		                name = data[index]['name'];
		                amount = data[index]['amount'];

			            if (index % 2 == 0) {
		                 	invoicelistOptional += '<tr class="odd billed">';
		                }
		                else {
		                 	invoicelistOptional += '<tr class="even billed">';		
		                }
		                	invoicelistOptional +=
	                    		'<td class="items">'+
		                 			'<input type="hidden" class="id-invoice" value="0">'+
		                 			'<input type="hidden" class="pay-invoice" value="'+amount+'">'+
		                 			'<input type="hidden" class="item-name" value="'+name+'">'+
		                			'<input type="hidden" class="fine-terlambat" value="0">'+
		                					'<input type="hidden" class="day-terlambat" value="0">'+
	                    			'<h5><span class="judul">'+name+'</span>';
		                	invoicelistOptional +=
										'<a href="#" class="add all">'+
											'<i class="fa fa-plus"></i>'+
										'</a>'+
									'<div class="bills-info">'+
					 	  			   '<div class="panel-group">'+
						            		'<div class="panel">'+
						            			'<h5><span class="price" value="'+amount+'">'+amount+'</span></h5>'+
							          		'</div>'+
						          		'</div>'+						          																									
									'</div>'+
			                    '</td>'+
			                    '<td>Invoice Accidental</td>'+
			                 '</tr>';		
		            }

			            jQuery('#resultsInvoice > tbody:first').append(invoicelistOptional);					

						jQuery('.price').formatCurrency({region: 'id-ID'});

						/* Initialise datatables */
					    var oTable = jQuery('#resultsInvoice').dataTable({"paging":false});

					    /* Add event listener to the dropdown input */
					    $('select#filter').change( function() { 
					    	oTable.fnFilter( $(this).val() );
						});		            
										
						jQuery('#ajax-loader').hide(); 

				      jQuery('#invoicePanel').fadeIn(function(){
				      });          		            

	            },
			    error: function (data)
			    {
			    	console.log('terjadi error dalam pengambilan accidental item');
			    	console.log(data);
			    }
			});

        });
		return false;	
	});

</script>