var neracaSaldo = function () {

	var addRow = function(){
		
		var acc_code,acc_name,acc_tipe,include;
		jQuery('.add-row').on('click',function(){
		    jQuery.ajax({
		    	type: "GET",
		    	url: CI_ROOT+"master/accounts/get_accounting_code",
		     	success: function(data)
		     	{
		     		// console.log(data);

		     		jQuery('#tableAccountingReference tbody tr').remove();
		     		for (index = 0; index < data.length; ++index) {
		     			acc_code = data[index]['accounting_id'];
		     			acc_name = data[index]['name'];
		     			acc_tipe = data[index]['tipe'];

		     			include = false;
						jQuery("#tableJournalList tbody tr").each(function() {
							if (jQuery(this).find('td.acct-id').text() == acc_code) {
								//if code already in the use list
								include = true;
							}
					    });		     			

						if (include == false) {
			     			jQuery('#tableAccountingReference > tbody:first').append(
			     				'<tr>'+
			     					'<td style="font-size:12px" class="option-code">'+acc_code+'</td>'+
			     					'<td style="font-size:12px" class="option-name">'+acc_name+'</td>'+
			     					'<td style="text-align:center;font-size:12px">'+acc_tipe+'</td>'+
			     					'<td style="font-size:12px"><a class="commit-row" data-dismiss="modal">add</a></td>'+
			     				'</tr>'
			     				);							
						} else {
			     			jQuery('#tableAccountingReference > tbody:first').append(
			     				'<tr>'+
			     					'<td style="font-size:12px;" class="option-code text text-danger">'+acc_code+'</td>'+
			     					'<td style="font-size:12px" class="option-name text text-danger">'+acc_name+'</td>'+
			     					'<td style="text-align:center;font-size:12px" class="text text-danger">'+acc_tipe+'</td>'+
			     					'<td style="font-size:12px"></td>'+
			     				'</tr>'
			     				);							
						}
		     		}
		     	},
			    error: function (data)
			    {
			    	console.log('terjadi error');
			    	console.log(data);
			    }
			});  	
		});		

		jQuery('#tableAccountingReference').on('click','tbody tr td a.commit-row',function(){
			console.log('commit');
			acc_code = jQuery(this).closest('tr').find('td.option-code').text();
			acc_name = jQuery(this).closest('tr').find('td.option-name').text();

			// '<span class="editable-label editable-click">{kode}</span></td>'+
			jQuery('#tableJournalList tr:last').before(
			'<tr>'+
				'<td class="acct-id" style="vertical-align:middle">'+acc_code+'</td>'+
				'<td style="vertical-align:middle" >'+
				'<label>'+acc_name+'</label>'+
				'</td>'+
				'<td class="activa-debit" data-value="0" style="vertical-align:middle"><span class="editable editable-click">0</span></td>'+
				'<td class="activa-credit" data-value="0" style="vertical-align:middle"><span class="editable editable-click">0</span></td>'+
				'<td width="5%" style="vertical-align:middle"><a href="" class="delete-row"><i class="fa fa-times text-danger"></i></a></td>'+
			'</tr>'
			);
			initEditable();
		});	

		jQuery('#tableJournalList').on('click','tbody tr td a.delete-row',function(){
			jQuery(this).closest('tr').remove();
			return false;			
		});

		var item,number;		
		jQuery('#entry-record').on('click',function(){
			item = {};
			number = 1;


			jQuery("#tableJournalList tbody tr").each(function() {
				if (jQuery(this).find('td.acct-id').text() != "") {
					item[number] = {};
					item[number]['accounting_period'] = jQuery('#accounting-period').val();
					// item[number]['month'] = '12';
					item[number]['transaction_date'] = jQuery('#journal-date').val();
					item[number]['accounting_code'] = jQuery(this).find('td.acct-id').text();
					item[number]['description'] = jQuery('#journal-memo').val();
					item[number]['journal_ref'] = jQuery('#journal-ref').val();
					if (jQuery(this).find('td.activa-debit').attr("data-value") != 0) {
						item[number]['amount_type'] = 'D';
						item[number]['amount'] = jQuery(this).find('td.activa-debit').attr("data-value");
					} else {
						item[number]['amount_type'] = 'K';					
						item[number]['amount'] = jQuery(this).find('td.activa-credit').attr("data-value");
					}
					item[number]['unit_id'] = jQuery('#journal-unit').val();
					item[number]['is_transfer'] = jQuery('#journal-type').val();
		            console.log(JSON.stringify(item[number]));      
		            number = number + 1;
				}
			});
			// return false;
		    jQuery.ajax({
		    	type: "POST",
		    	url: CI_ROOT+"expenses/journal_entry/save_entry",
		    	data:item,
		     	success: function(data)
		     	{
		     		console.log('berhasil');
	                window.location.replace(CI_ROOT + 'expenses/journal_entry');
	                return false;
		     	},
			    error: function (data)
			    {
			    	console.log('terjadi error');
			    	console.log(data);
			    }
			});  	


			return false;
		});
	}

	var initEditable = function() {
		jQuery('#tableJournalList .editable').editable({
			success: function(response, newValue) {
				var dethis = jQuery(this);
				console.log(newValue);

				//reset all
				dethis.closest('tr').find('td.activa-credit').attr('data-value','0');
				dethis.closest('tr').find('td.activa-credit span.editable').text('0');
				dethis.closest('tr').find('td.activa-debit').attr('data-value','0');
				dethis.closest('tr').find('td.activa-debit span.editable').text('0');
				// dethis.closest('tr').find('td').attr('data-value','0');
				// dethis.closest('td').attr('data-value','0');
				dethis.closest('td').attr('data-value',newValue);

				totalDebet();
				totalKredit();

				// if(dethis.closest('td').hasClass('activa-debit'))
				// {
				// 	totalDebet();
				// }
				// else if(dethis.closest('td').hasClass('activa-credit'))
				// {
				// 	totalKredit();
				// }
				// else
				// {
				// 	alert('Error! Missing classname to do calculate.');
				// }
				outOfBalance();
			}		
		});		
	}
	
	
	var totalDebet = function () {
		var grandTotal = 0;
		if((".table-total tbody").length){
			jQuery(".table-journal tbody tr").each(function() {
			    jQuery(".activa-debit",this).each(function() {
					var dethis = jQuery(this);
					grandTotal += Number(dethis.attr("data-value"));
			    }); 

				jQuery(".table-total .total-debit").text(grandTotal).formatCurrency({region: 'id-ID'}).attr("data-value", grandTotal);
		    });		
		}
		return false;
    }
    
    var totalKredit = function () {
		var grandTotal = 0;
		if((".table-total tbody").length){
			jQuery(".table-journal tbody tr").each(function() {
			    jQuery(".activa-credit",this).each(function() {
					var dethis = jQuery(this);
					grandTotal += Number(dethis.attr("data-value"));
			    }); 
			
				jQuery(".table-total .total-credit").text(grandTotal).formatCurrency({region: 'id-ID'}).attr("data-value", grandTotal);
		    });		
		}
		return false;
    }

    var outOfBalance = function () {
		var totalDebit = Number(jQuery('.table-total .total-debit').attr('data-value'));
		var totalCredit = Number(jQuery('.table-total .total-credit').attr('data-value'));		

		var outBalance = totalDebit - totalCredit;	
		jQuery(".table-total .out-balance").text(outBalance).formatCurrency({region: 'id-ID'}).attr("data-value", outBalance);
		
		if(outBalance < 0)
		{
			jQuery('#entry-record').attr('disabled','disabled');
			jQuery(".table-total .out-balance").css('color','#cc00000');
		}
		else if(outBalance > 0)
		{
			jQuery('#entry-record').attr('disabled','disabled');
			jQuery(".table-total .out-balance").css('color','#58B535');			
		}
		else
		{
			jQuery('#entry-record').removeAttr('disabled');
			jQuery(".table-total .out-balance").css('color','#636e7b');
		}
		return false;
    }

    return {
        //main function to initiate the module
        init: function () {
        	addRow();
        	initEditable();
        }

    };
}();