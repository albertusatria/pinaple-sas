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
				'<td class="acct-id">'+acc_code+
				'<td><label class="">'+acc_name+'</label>'+
				'</td>'+
				'<td class="activa-debit" data-value="0"><span class="editable editable-click">0</span></td>'+
				'<td class="activa-credit" data-value="0"><span class="editable editable-click">0</span></td>'+
			'</tr>'
			);
			initEditable();
		});	

	}

	var initEditable = function() {
		jQuery('#tableJournalList .editable').editable({
			success: function(response, newValue) {
				var dethis = jQuery(this);
				console.log(newValue);
				dethis.closest('td').attr('data-value',newValue);
				if(dethis.closest('td').hasClass('activa-debit'))
				{
					totalDebet();
				}
				else if(dethis.closest('td').hasClass('activa-credit'))
				{
					totalKredit();
				}
				else
				{
					alert('Error! Missing classname to do calculate.');
				}
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