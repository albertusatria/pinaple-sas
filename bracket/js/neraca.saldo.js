var neracaSaldo = function () {

	var addRow = function(){
		jQuery('.editable-label').editable(); 		
	}
	var setValue = function(){
		jQuery('.editable').editable({
			success: function(response, newValue) {
				var dethis = jQuery(this);
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
		jQuery('.add-row').on('click',function(){
			jQuery('.table-journal tr:last').after(
			'<tr>'+
				'<td class="acct-id"><span class="editable-label editable-click">{kode}</span></td>'+
				'<td class="name">'+
					'<label class="editable-label editable-click">{input nama journal}</label>'+
				'</td>'+
				'<td class="activa-debit" data-value="0"><span class="editable editable-click">0</span></td>'+
				'<td class="activa-credit" data-value="0"><span class="editable editable-click">0</span></td>'+
			'</tr>'
			);
			addRow();
			return false;
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
			jQuery(".table-total .out-balance").css('color','#cc00000');
		}
		else if(outBalance > 0)
		{
			jQuery(".table-total .out-balance").css('color','#58B535');			
		}
		else
		{
			jQuery(".table-total .out-balance").css('color','#636e7b');
		}
		return false;
    }

    return {
        //main function to initiate the module
        init: function () {
        	setValue();
        	addRow();
        }

    };
}();