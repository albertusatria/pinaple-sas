var FormEditableInvoice = function () {

    var initEditables = function () {
		var subTotal = "";
		var invoiceTable = $('#invoiceTable');
		var price = parseInt(invoiceTable.find('.price.each').attr('value'));
        //set editable element with success function to get their updated value
		$('.qty.editable').editable({
			success: function(response, newValue) {
				var dethis = $(this);
				//update subtotal on the row
				subTotal = parseInt(newValue) * price;
				dethis.closest('tr').find('span.subtotal').text(subTotal).attr('value',subTotal);
				dethis.closest('tr').find('span.subtotal').formatCurrency({region: 'id-ID'});
				updateGrandTotal();
			}		
		});
		
		$('.inst-credit').editable({
            validate: function(value) {
                var dethis = $(this);
                if (parseInt(value) > parseInt(dethis.closest('tr').find('td input.pay-invoice-dab').val())) {
                    value = dethis.closest('tr').find('td input.pay-invoice-dab').val();
                    return "maksimum cicilan : " + value;
                }
            },

			success: function(response, newValue){
				var dethis = $(this);

				dethis.closest('tr').find('td input.instalment-invoice-dab').val(newValue);					
				console.log(dethis.closest('tr').find('td input.instalment-invoice-dab').val());				

				if (parseInt(dethis.closest('tr').find('td input.instalment-invoice-dab').val()) > parseInt(dethis.closest('tr').find('td input.pay-invoice-dab').val()) ) 
				{
					console.log('lebih dari yang seharusnya dibayar')
					dethis.closest('tr').find('td input.instalment-invoice-dab').val(newValue);					
				}
				else 
				{
					console.log('kurang dari yang seharusnya dibayar')
				}


				var denda = 0;
				var valx = dethis.closest('tr').find('span.denda-price').attr('value');
				if (typeof valx === 'undefined') {
					denda = 0;
				} else {
					denda = dethis.closest('tr').find('span.denda-price').attr('value');					
				}
				// console.log(dethis.closest('tr').find('span.denda-price').attr('value'));
				console.log('denda : ' + denda);
				if (newValue > 0)
				{
					invoiceTable.find('span.init-price').addClass('off-price');
					var qty = dethis.closest('tr').find('span.qty').text();
					subTotal = (parseInt(newValue) * qty) + parseInt(denda);
					dethis.closest('tr').find('span.inst-credit').formatCurrency({region: 'id-ID'});					
					dethis.closest('tr').find('.is-cicilan').text('CICILAN ');
				}
				else
				{
					price = parseInt(dethis.closest('tr').find('.init-price').attr('value'));
					invoiceTable.find('span.init-price').removeClass('off-price');
					subTotal = (1 * price) + parseInt(denda);
				}
												
				dethis.closest('tr').find('td input.instalment-invoice-dab').val(newValue);					
				dethis.closest('tr').find('span.subtotal').text(subTotal).attr('value',subTotal);
				dethis.closest('tr').find('span.subtotal').formatCurrency({region: 'id-ID'});
				updateGrandTotal();				
			}
			
		});

		$('.days-credit').editable({
			success: function(response, newValue){
				var dethis = $(this);	
				var denda = Number(newValue) * Number(500);

				dethis.closest('tr').find('td input.day-late-invoice-dab').val(newValue);	
				dethis.closest('tr').find('td input.fine-invoice-dab').val(denda);			


				var qty = dethis.closest('tr').find('span.qty').text();
				var price = 0;
				if (dethis.closest('tr').find('span.inst-credit').val() == 0) {
					console.log('bukan cicilan');
					console.log(dethis.closest('tr').find('span.init-price').attr('value'));
					price = dethis.closest('tr').find('span.init-price').attr('value');
				} else {
					console.log('cicilan');
					console.log(dethis.closest('tr').find('span.inst-credit').attr('value'));
					price = dethis.closest('tr').find('span.inst-credit').attr('value');
				}
				// console.log('jumlah hari denda' +newValue);
				// console.log('denda yang harus dibayar : '+denda);		
				// console.log('harga' +price);
				// console.log('qty : '+qty);		

				subTotal = parseInt(denda) + (qty * parseInt(price));

				dethis.closest('tr').find('td input.day-late-invoice-dab').val(newValue);					
				dethis.closest('tr').find('td input.fine-invoice-dab').val(denda);					
													


				dethis.closest('tr').find('span.denda-price').text(denda).attr('value',denda);
				dethis.closest('tr').find('span.denda-price').formatCurrency({region: 'id-ID'});

				var daysOfLate = '';
				if(newValue > 1)
				{
					daysOfLate = ' days';
				}
				else
				{
					daysOfLate = ' day';
				}
				
				dethis.closest('tr').find('.days-late').attr('data-value',newValue);
				dethis.closest('tr').find('.days-late small').text(newValue+daysOfLate);

				dethis.closest('tr').find('span.subtotal').text(subTotal).attr('value',subTotal);
				dethis.closest('tr').find('span.subtotal').formatCurrency({region: 'id-ID'});
				updateGrandTotal();				
			}
			
		});
		
    }

    return {
        //main function to initiate the module
        init: function () {

            // init editable elements
            initEditables();
        }

    };

}();